<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;


use App\Exports\Users;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\DocumentESign;
use App\Models\Lead;
use App\Models\Documents;
use App\Models\Referral;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;
use App\Jobs\sendEmailJob;
use App\Jobs\DocumentJob;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Mail;

class DocumentController extends Controller
{
    public function index()
    {
        $docs = DocumentESign::all();
        $document = DocumentESign::all();
        $referral = Referral::all();
        $lead = Lead::all();

        $data = compact('document', 'lead', 'referral', 'docs');

        return view('document.index', $data)->with('printData', $data);
    }

    public function uploadDocument(Request $request)
    {
        $request->validate([
            'pdf_file' => 'required|mimes:pdf|max:2048',
        ]);
        $uploadedPdf = $request->file('pdf_file');
        $filename = uniqid() . '.' . $uploadedPdf->getClientOriginalExtension();
        $request->pdf_file->move(public_path('/recievedDocuments'), $filename);
        $approved = Session::get("loginId");
        $document = Documents::where('referral_id', $request->getRefId)->where('id', $request->getDocId)->first();
        $document->status = "Recieved";
        $document->uploaded_url = "/recievedDocuments/$filename";
        $document->approved_by = $approved;
        $document->save();
        $newDocument = url('/recievedDocuments/' . $filename);


        return response()->json(['id' => $request->getDocId, 'url' => $newDocument, 'success' => 'Document was successfully uploaded', 'docId' => $request->getDocId]);
    }

    public function previewDocument($filename)
    {
        $filePath = public_path('recievedDocuments/' . $filename);

        if (file_exists($filePath)) {
            return response()->file($filePath);
        }
    }

    public function view($id)
    {
        $documetDetail = DocumentESign::find($id);
        return view('document.view', compact('documetDetail'));
    }

    public function uploadDocs(Request $request)
    {
        $userId = Session::get("loginId");

        foreach ($request->file as $k => $item) {
            $attachment = time() . $item->getClientOriginalName();
            $item->move(public_path('/docs'), $attachment);
            $data = new DocumentESign();
            $data->file = $attachment;
            $data->name = $userId;
            $data->status = 'Pending';
            $data->save();
        }
        return response()->json('File added successfully');
    }


    public function generatePDF()
    {
        $referrals = Referral::where('status', 'Pending')->get();
        $message = "Emails sent successfully";
        foreach ($referrals as $referral) {
            $pdfPath = 'pdfs/' . $referral->first_name . 'invoice.pdf';
            $data = [
                'referral_name' => $referral->first_name,
                'content' => 'This is the content of my PDF document.',
            ];
            $pdf = PDF::loadView('document.print', $data);
            Storage::disk('public')->put($pdfPath, $pdf->output());
            $pdfUrl = '/signature';
            $recipientEmail = $referral->email;
            $subject = "Document By Intruspit";
            $name = $referral->first_name . ' ' . $referral->last_name;
            $email_message = "Intrustpit has sent a document to sign. Please use the button below to find the details of your document:";
            $url = $pdfUrl;
            try {
                SendEmailJob::dispatch($recipientEmail, $subject, $name, $email_message, $url);
            } catch (\Exception $e) {
                $message = "Emails could not be sent. Error: " . $e->getMessage();
                Alert::error('Error', $message);
                return back();
            }
        }
        Alert::success('Success', $message);
        return back();
    }

    public function deleteDoc($id)
    {
        $document = DocumentESign::find($id);
        if ($document) {
            Storage::delete('docs/' . $document->file);
            $document->delete();
            return response()->json(['message' => 'Document deleted successfully'], 200);
        } else {
            return response()->json(['message' => 'Document not found'], 404);
        }
    }

    public function updateDoc(Request $request, $id)
    {
        $userId = Session::get("loginId");

        $document = DocumentESign::findOrFail($id);
        $document->approved = $userId;
        $document->status = $request->status;
        $document->save();
        return response()->json(['message' => 'Document updated successfully']);
    }

    public function sendSelectedEmail(Request $request)
    {
        dd($request->all());
        $message = "Emails sent successfully";
        $selectedUsers = $request->input('selected_users');
        $referrals = Referral::whereIn('id', $selectedUsers)->where('status', 'Pending')->get();
        foreach ($referrals as $index => $referral) {
            $recipientEmail = $referral->email;
            $pdfPath = 'pdfs/' . $index . 'invoice.pdf';
            $data = [
                'referral_name' => $referral->first_name,
                'content' => 'This is the content of my PDF document.',
            ];
            $pdf = PDF::loadView('document.print', $data);
            Storage::disk('public')->put($pdfPath, $pdf->output());
            $pdfUrl = '/signature';
            $subject = "Document";
            $name = $referral->first_name . ' ' . $referral->last_name;
            $email_message = "Your document has been approved. Please use the button below to find the details of your document:";
            $url = $pdfUrl;
            try {
                SendEmailJob::dispatch($recipientEmail, $subject, $name, $email_message, $url);
            } catch (\Exception $e) {
                $message = "Emails could not be sent. Error: " . $e->getMessage();
                Alert::error('Error', $message);
                return back();
            }
        }
        Alert::success('Success', $message);
        return back();
    }

    public function sendReferralEmail(Request $request)
    {

        $referral = Referral::find($request->referral_id);
        $referralId = Crypt::encryptString($referral->id);
        $documentMappings = [
            '1-Joinder Agreement.pdf' => 'joinder',
            '2-DOH-960 Hipaa.pdf' => 'hippa',
            '3-MAP-751e - Authorization to Release Medical Information.pdf' => 'map',
            '4-DOH 5173-Hipaa State.pdf' => 'hippa_state',
            '5- DOH -5139 Disability FILLABLE Questionnaire.pdf' => 'disability',
            '6-DOH-5143.pdf' => 'doh',
        ];
        $selected_documents = $request->selected_documents;
        $filtered_names = [];
        $filtered_links = [];
        foreach ($selected_documents as $doc) {
            if (isset($documentMappings[$doc])) {
                $filtered_names[] = $doc;
                $filtered_links[] = URL::to("$documentMappings[$doc]?referralId=$referralId");
            }
        }

        Documents::whereIn('name', $selected_documents)->where('referral_id', $referral->id)->update(['status' => 'Sent']);
        $name = $referral->full_name();
        $email_message = 'Please fill the following documents and share it on intrurpit@gmail.com';

        DocumentJob::dispatch($referral->email, $name, $email_message, $filtered_links, $filtered_names, $referralId);
        return response()->json(['success' => 'Documents sent to ' . $referral->full_name() . ' successfully!', 'filtered_links' => $filtered_links, 'filtered_names' => $filtered_names, 'referralId' => $referralId]);
    }

    public function signature(Request $request)
    {
        $userId = Session::get("loginId");

        $user = User::where('id', '=', Session::get('loginId'))->first();
        $signatureData = '';
        return view('document.signature', compact('user', 'signatureData'));
    }


    public function generateSignature(Request $request)
    {

        $url = url()->previous();
        $routeName = app('router')->getRoutes($url)->match(app('request')->create($url))->getName();
        dd($routeName);
        $data = [
            'content' => 'This is the content of my PDF document.',
            'request' => $request->first_name,
        ];
        if ($routeName == "hippa_state.signature") {
            $pdf = PDF::loadView('document.hippa_state', $data);
        } else if ($routeName == "hippa.signature") {
            $pdf = PDF::loadView('document.hippa', $data);
        } else if ($routeName == "doh.signature") {
            $pdf = PDF::loadView('document.doh', $data);
        } else if ($routeName == "disability") {
            $pdf = PDF::loadView('document.doh', $data);
        } else if ($routeName == "joinder.signature") {
            $pdf = PDF::loadView('document.joinder', $data);
        } else if ($routeName == "map.signature") {
            $pdf = PDF::loadView('document.joinder', $data);
        }
        $pdfFilename = 'document.pdf';

        return $pdf->download($pdfFilename);
    }

    //HIPPA-STATE CODE
    public function hippaState(Request $request)
    {
        $referralIdfromUrl = Crypt::decryptString($request->query('referralId'));
        $referral = Referral::find($referralIdfromUrl);
        if (!$referral) {
            return redirect()->route('login');
        }
        $documentId = Documents::where('name', '4-DOH 5173-Hipaa State.pdf')
            ->where('referral_id', $referral->id)
            ->value('id');


        return view('document.hippa_state', compact('referral', 'documentId'));


    }

    //HIPPA CODE
    public function hippa(Request $request)
    {
        $referralIdfromUrl = Crypt::decryptString($request->query('referralId'));
        $referral = Referral::find($referralIdfromUrl);
        if (!$referral) {
            return redirect()->route('login');
        }
        $documentId = Documents::where('name', '2-DOH-960 Hipaa.pdf')
            ->where('referral_id', $referral->id)
            ->value('id');


        return view('document.hippa', compact('referral', 'documentId'));
    }

    //MAP CODE
    public function map(Request $request)
    {
        $referralIdfromUrl = Crypt::decryptString($request->query('referralId'));
        $referral = Referral::find($referralIdfromUrl);
        if (!$referral) {
            return redirect()->route('login');
        }

        $documentId = Documents::where('name', '3-MAP-751e - Authorization to Release Medical Information.pdf')
            ->where('referral_id', $referral->id)
            ->value('id');


        return view('document.map', compact('referral', 'documentId'));

    }

    //DISABILITY
    public function disability(Request $request)
    {
        $referralIdfromUrl = Crypt::decryptString($request->query('referralId'));
        $referral = Referral::find($referralIdfromUrl);
        if (!$referral) {
            return redirect()->route('login');
        }
        $documentId = Documents::where('name', '5- DOH -5139 Disability FILLABLE Questionnaire.pdf')
            ->where('referral_id', $referral->id)
            ->value('id');

        return view('document.disability', compact('referral', 'documentId'));
    }

    //DOH
    public function doh(Request $request)
    {
        $referralIdfromUrl = Crypt::decryptString($request->query('referralId'));
        $referral = Referral::find($referralIdfromUrl);
        if (!$referral) {
            return redirect()->route('login');
        }
        $documentId = $documentId = Documents::where('name', '6-DOH-5143.pdf')
            ->where('referral_id', $referral->id)
            ->value('id');

        return view('document.doh', compact('referral', 'documentId'));


    }
    //JOINDER
    //DOH
    public function joinder(Request $request)
    {
        $referralIdfromUrl = Crypt::decryptString($request->query('referralId'));
        $referral = Referral::find($referralIdfromUrl);
        if (!$referral) {
            return redirect()->route('login');
        }

        $documentId = Documents::where('name', '1-Joinder Agreement.pdf')
            ->where('referral_id', 1)
            ->value('id');


        return view('document.joinder', compact('referral', 'documentId'));
    }

    public function saveJoinder(Request $request)
    {

//        dd($request->all());
        set_time_limit(200);
        $referralId = $request->referral_id;
        $referral = Referral::find($referralId);

        if (!$referral) {
            return response()->json(['message' => 'Referral not found'], 404);
        }

        $directory = storage_path('app/public/' . $referral->email);
        if (!is_dir($directory)) {
            mkdir($directory, 0777, true);
        }

        $signatureFields = ['joinder_signature_1', 'joinder_signature_2', 'joinder_signature_3', 'joinder_signature_4', 'joinder_signature_5'];

        foreach ($signatureFields as $fieldName) {
            $imageData = $request->input($fieldName);
            if ($imageData) {
                $imageData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $imageData));
                $filename = $fieldName . date('Ymd_His') . '.png';
                $imagePath = $directory . '/' . $filename;
                file_put_contents($imagePath, $imageData);
                $request->merge([$fieldName => $imagePath]);
            }
        }


        $data = $request->all();
        $pdf = PDF::loadView('document.joinder-pdf', $data)->setPaper('A4', 'portrait');

        $savePath = $directory . '/joinder_' . date('Ymd_His') . '.pdf';
        $pdf->save($savePath);
        $savePathWithoutDirectory = str_replace(storage_path('app/public/'), '', $savePath);
        $document = Documents::find($request->document_id);
        if ($document){
            //delete old file
            if (Storage::exists('public/' . $document->uploaded_url)) {
                Storage::delete('public/' . $document->uploaded_url);
            }
            //delete signature images
            $email = explode('/', $document->uploaded_url)[0];
            $folderPath = 'public/'.$email.'/'; // Adjust the folder path as needed

            // Check if the folder exists
            if (Storage::exists($folderPath)) {
                // Get all files in the folder
                $files = Storage::files($folderPath);

                // Loop through the files and delete only .png files
                foreach ($files as $file) {
                    if (pathinfo($file, PATHINFO_EXTENSION) === 'png') {
                        Storage::delete($file);
                    }
                }
            }
            $document->status = "Received";
            $document->uploaded_url = $savePathWithoutDirectory;

            $document->save();
        }

        return response()->json(['pdf_url' => asset($savePath), 'referralId' => $referralId]);
    }

    public function saveHippa(Request $request)
    {

        set_time_limit(200);
        $referralId = $request->referral_id;
        $referral = Referral::find($referralId);
        $hippa_sign_fieldname = 'hippa_sign';
        if (!$referral) {
            return response()->json(['message' => 'Referral not found'], 404);
        }
        $directory = storage_path('app/public/' . $referral->email);
        if (!is_dir($directory)) {
            mkdir($directory, 0777, true);
        }
        $imageData = $request->input($hippa_sign_fieldname);
        if ($imageData) {
            $imageData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $imageData));
            $filename = $hippa_sign_fieldname . date('Ymd_His') . '.png';
            $imagePath = $directory . '/' . $filename;
            file_put_contents($imagePath, $imageData);
            $request->merge([$hippa_sign_fieldname => $imagePath]);
        }

        $data = $request->all();
        $pdf = PDF::loadView('document.hippa-pdf', $data);


        $savePath = $directory . '/hippa_' . date('Ymd_His') . '.pdf';
        $pdf->save($savePath);
        $savePathWithoutDirectory = str_replace(storage_path('app/public/'), '', $savePath);
        $document = Documents::find($request->document_id);
        if ($document){
            //delete old file
            if (Storage::exists('public/' . $document->uploaded_url)) {
                Storage::delete('public/' . $document->uploaded_url);
            }
            //delete signature images
            $email = explode('/', $document->uploaded_url)[0];
            $folderPath = 'public/'.$email.'/'; // Adjust the folder path as needed

            // Check if the folder exists
            if (Storage::exists($folderPath)) {
                // Get all files in the folder
                $files = Storage::files($folderPath);

                // Loop through the files and delete only .png files
                foreach ($files as $file) {
                    if (pathinfo($file, PATHINFO_EXTENSION) === 'png') {
                        Storage::delete($file);
                    }
                }
            }
            $document->status = "Received";
            $document->uploaded_url = $savePathWithoutDirectory;

            $document->save();
        }

        return response()->json(['pdf_url' => asset($savePath), 'referralId' => $referralId]);
    }


    public
    function saveHippaState(Request $request)
    {


        set_time_limit(200);

        $referralId = $request->referral_id;
        $referral = Referral::find($referralId);
        if (!$referral) {
            return response()->json(['message' => 'Referral not found'], 404);
        }
        $hippa_state_sign_fieldname = 'hippa_state_sign';
        $directory = storage_path('app/public/' . $referral->email);
        if (!is_dir($directory)) {
            mkdir($directory, 0777, true);
        }
        $imageData = $request->input($hippa_state_sign_fieldname);
        if ($imageData) {
            $imageData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $imageData));
            $filename = $hippa_state_sign_fieldname . date('Ymd_His') . '.png';

            $imagePath = $directory . '/' . $filename;
            file_put_contents($imagePath, $imageData);
            $request->merge([$hippa_state_sign_fieldname => $imagePath]);
        }

        $data = $request->all();
        $pdf = PDF::loadView('document.hippa-state-pdf', $data);


        $savePath = $directory . '/hippa_state_' . date('Ymd_His') . '.pdf';

        $pdf->save($savePath);
        $savePathWithoutDirectory = str_replace(storage_path('app/public/'), '', $savePath);
        $document = Documents::find($request->document_id);
        if ($document){
            //delete old file
            if (Storage::exists('public/' . $document->uploaded_url)) {
                Storage::delete('public/' . $document->uploaded_url);
            }
            //delete signature images
            $email = explode('/', $document->uploaded_url)[0];
            $folderPath = 'public/'.$email.'/'; // Adjust the folder path as needed

            // Check if the folder exists
            if (Storage::exists($folderPath)) {
                // Get all files in the folder
                $files = Storage::files($folderPath);

                // Loop through the files and delete only .png files
                foreach ($files as $file) {
                    if (pathinfo($file, PATHINFO_EXTENSION) === 'png') {
                        Storage::delete($file);
                    }
                }
            }
            $document->status = "Received";
            $document->uploaded_url = $savePathWithoutDirectory;

            $document->save();
        }

        return response()->json(['pdf_url' => asset($savePath), 'referralId' => $referralId]);
    }

    public


    function uploadMultipleDocuments(Request $request)
    {
        $request->validate([
            'uploadedfile.*' => 'required|mimes:pdf',
        ]);

        if ($request->uploadedfile != null) {
            foreach ($request->uploadedfile as $item) {
                $attachment = $item->getClientOriginalName();
                $path = $item->move(public_path('documents'), $attachment);
                $data = new Documents();
                $data->actual_url = '/documents/' . $attachment;
                $data->name = $attachment;
                $data->slug = $attachment;
                $data->status = 'Sent';
                $data->referral_id = $request->referral_id;
                $data->save();
                $urls[] = url('/documents/' . $attachment); // Storing document link


            }
            $referral = Referral::find($request->referral_id);
            $recipientEmail = $referral->email;
            $subject = "Document By Intruspit";
            $name = $referral->first_name . ' ' . $referral->last_name;
            $email_message = "Intrustpit has sent the following documents to sign:";
            try {
                SendEmailJob::dispatch($recipientEmail, $subject, $name, $email_message, $urls);
            } catch (\Exception $e) {
                $message = "Emails could not be sent. Error: " . $e->getMessage();
                Alert::error('Error', $message);
                return back();
            }
        } else {

            $message = "Please select a file to upload.";
            return response()->json(['message' => $message], 404);
        }
        return response()->json(['message' => 'Document(s) sent to ' . $name . ' successfully.'], 200);


    }


    public
    function saveDoh(Request $request)
    {
        $referralId = $request->referral_id;
        $referral = Referral::find($referralId);
        if (!$referral) {
            return response()->json(['message' => 'Referral not found'], 404);
        }

        $hippa_state_sign_fieldname = 'doh_sign';
        $directory = storage_path('app/public/' . $referral->email);
        if (!is_dir($directory)) {
            mkdir($directory, 0777, true);
        }
        $imageData = $request->input($hippa_state_sign_fieldname);
        if ($imageData) {
            $imageData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $imageData));
            $filename = $hippa_state_sign_fieldname . date('Ymd_His') . '.png';


            $imagePath = $directory . '/' . $filename;
            file_put_contents($imagePath, $imageData);
            $request->merge([$hippa_state_sign_fieldname => $imagePath]);
        }

        $data = $request->all();
        $pdf = PDF::loadView('document.doh-pdf', $data);


        $savePath = $directory . '/doh_' . date('Ymd_His') . '.pdf';
        $pdf->save($savePath);
        $savePathWithoutDirectory = str_replace(storage_path('app/public/'), '', $savePath);
        $document = Documents::find($request->document_id);
        if ($document){
            //delete old file
            if (Storage::exists('public/' . $document->uploaded_url)) {
                Storage::delete('public/' . $document->uploaded_url);
            }
            //delete signature images
            $email = explode('/', $document->uploaded_url)[0];
            $folderPath = 'public/'.$email.'/'; // Adjust the folder path as needed

            // Check if the folder exists
            if (Storage::exists($folderPath)) {
                // Get all files in the folder
                $files = Storage::files($folderPath);

                // Loop through the files and delete only .png files
                foreach ($files as $file) {
                    if (pathinfo($file, PATHINFO_EXTENSION) === 'png') {
                        Storage::delete($file);
                    }
                }
            }
            $document->status = "Received";
            $document->uploaded_url = $savePathWithoutDirectory;

            $document->save();
        }


        // Return the URL of the saved PDF file
        return response()->json(['pdf_url' => asset($savePath), 'referralId' => $referralId]);
    }

    public
    function saveMap(Request $request)
    {
        set_time_limit(200);


        $referralId = $request->referral_id;
        $referral = Referral::find($referralId);
        if (!$referral) {
            return response()->json(['message' => 'Referral not found'], 404);
        }
        $directory = storage_path('app/public/' . $referral->email);
        if (!is_dir($directory)) {
            mkdir($directory, 0777, true);
        }
        $imageData = $request->input('map_sign');
        if ($imageData) {
            $imageData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $imageData));
            $filename = 'map_sign' . date('Ymd_His') . '.png';
            $imagePath = $directory . '/' . $filename;
            file_put_contents($imagePath, $imageData);
            $request->merge(['map_sign' => $imagePath]);
        }

        $data = $request->all();
        $pdf = PDF::loadView('document.map-pdf', $data);


        $savePath = $directory . '/map_' . date('Ymd_His') . '.pdf';
        // Save the PDF file to the specified location
        $pdf->save($savePath);
        $savePathWithoutDirectory = str_replace(storage_path('app/public/'), '', $savePath);
        $document = Documents::find($request->document_id);
        if ($document){
            //delete old file
            if (Storage::exists('public/' . $document->uploaded_url)) {
                Storage::delete('public/' . $document->uploaded_url);
            }
            //delete signature images
            $email = explode('/', $document->uploaded_url)[0];
            $folderPath = 'public/'.$email.'/'; // Adjust the folder path as needed

            // Check if the folder exists
            if (Storage::exists($folderPath)) {
                // Get all files in the folder
                $files = Storage::files($folderPath);

                // Loop through the files and delete only .png files
                foreach ($files as $file) {
                    if (pathinfo($file, PATHINFO_EXTENSION) === 'png') {
                        Storage::delete($file);
                    }
                }
            }
            $document->status = "Received";
            $document->uploaded_url = $savePathWithoutDirectory;

            $document->save();
        }

        return response()->json(['pdf_url' => asset($savePath), 'referralId' => $referralId]);

    }

    public
    function saveDisability(Request $request)
    {
        set_time_limit(200);

        $referralId = $request->referral_id;
        $referral = Referral::find($referralId);
        if (!$referral) {
            return response()->json(['message' => 'Referral not found'], 404);
        }
        $directory = storage_path('app/public/' . $referral->email);
        if (!is_dir($directory)) {
            mkdir($directory, 0777, true);
        }


        $data = $request->all();
        $pdf = PDF::loadView('document.disability-pdf', $data);


        $savePath = $directory . '/disability_' . date('Ymd_His') . '.pdf';
        // Save the PDF file to the specified location
        $pdf->save($savePath);

        $savePathWithoutDirectory = str_replace(storage_path('app/public/'), '', $savePath);
        $document = Documents::find($request->document_id);
        if ($document){
            //delete old file
            if (Storage::exists('public/' . $document->uploaded_url)) {
                Storage::delete('public/' . $document->uploaded_url);
            }
            $document->status = "Received";
            $document->uploaded_url = $savePathWithoutDirectory;

            $document->save();
        }


        return response()->json(['pdf_url' => asset($savePath), 'referralId' => $referralId]);


    }



    public
    function approval(Request $request)
    {
        return  view('document.approval-letter-pdf');

    }
    public
    function trusted(Request $request)
    {
        return  view('document.trusted-surplus-pdf');

    }
}
