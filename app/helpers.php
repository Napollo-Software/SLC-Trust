<?php

use App\Models\Documents;
use App\Models\ErrorLog;
use App\Models\Referral;
use Twilio\Rest\Client;
use App\Models\Log;
use App\Models\Type;


if (!class_exists('Intrustpit')) {
    class Intrustpit
    {
        const Account_id = 7;
        const Account_name = 'SLC TRUST';
    }
}

if (!function_exists('makeAvatar')) {

    function makeAvatar($fontpath, $dest, $char)
    {
        $path = $dest;
        $image = imagecreate(200, 200);
        $red = rand(0, 255);
        $green = rand(0, 255);
        $blue = rand(0, 255);
        imagecolorallocate($image, $red, $green, $blue);
        $textcolor = imagecolorallocate($image, 255, 255, 255);
        imagettftext($image, 100, 0, 40, 150, $textcolor, $fontpath, $char);
        imagepng($image, $path);
        imagedestroy($image);
        return $path;
    }
}

if (!function_exists('caseType')) {
    function caseType($id)
    {
        return Type::where('id', $id)->get();
    }
}

if (!function_exists('us_date_format')) {
    function us_date_format($date)
    {
        return date('m-d-Y h:i A', strtotime($date));
    }
}

if (!function_exists('notify_by_sms')) {

    function notify_by_sms($phone, $message)
    {
        $sid = config('services.twilio.sid');
        $token = config('services.twilio.token');
        $twilio = new Client($sid, $token);
        $fromNumber = config('services.twilio.from');
        $message = $twilio->messages
            ->create(
                $phone,
                [
                    "from" => $fromNumber,
                    "body" => $message
                ]
            );
    }
}

if (!function_exists('notify')) {
    function notify($number, $header, $message, $url)
    {

        $account_sid = getenv("TWILIO_SID");
        $auth_token = getenv("TWILIO_TOKEN");
        $twilio_number = getenv("TWILIO_FROM");
        $client = new Client($account_sid, $auth_token);
        $client->messages->create(
            "+15005550006",
            ['from' => $twilio_number, 'body' => $message]
        );
    }
}

if (!function_exists('checkHoliday')) {

    function checkHoliday($date)
    {
        if (date('l', strtotime($date)) == 'Saturday') {
            return "Saturday";
        } else if (date('l', strtotime($date)) == 'Sunday') {
            return "Sunday";
        } else {
            $receivedDate = date('d M', strtotime($date));
            $holiday = array(
                '01 Jan' => 'New Year Day',
                '18 Jan' => 'Martin Luther King Day',
                '22 Feb' => 'Washington\'s Birthday',
                '05 Jul' => 'Independence Day',
                '11 Nov' => 'Veterans Day',
                '24 Dec' => 'Christmas Eve',
                '25 Dec' => 'Christmas Day',
                '31 Dec' => 'New Year Eve'
            );

            foreach ($holiday as $key => $value) {
                if ($receivedDate == $key) {
                    return $value;
                }
            }
        }
    }
}

if (!function_exists('createLog')) {

    function createLog($type, $from, $to, $description)
    {
        $data = new Log();
        $data->type = $type;
        $data->from = $from;
        $data->to = $to;
        $data->description = $description;
        $data->save();
        return $data->id;
    }
}

if (!function_exists('createDocument')) {

    function createDocument($id)
    {

        $documentsData = [
            [
                'name' => '1-Joinder Agreement.pdf',
                'actual_url' => '/documents/1-Joinder Agreement.pdf',
            ],
            [
                'name' => '2-DOH-960 Hipaa.pdf',
                'actual_url' => '/documents/2-DOH-960 Hipaa.pdf',
            ],
            [
                'name' => '3-MAP-751e - Authorization to Release Medical Information.pdf',
                'actual_url' => '/documents/3-MAP-751e - Authorization to Release Medical Information.pdf',
            ],
            [
                'name' => '4-DOH 5173-Hipaa State.pdf',
                'actual_url' => '/documents/4-DOH 5173-Hipaa State.pdf',
            ],
            [
                'name' => '5- DOH -5139 Disability FILLABLE Questionnaire.pdf',
                'actual_url' => '/documents/5- DOH -5139 Disability FILLABLE Questionnaire.pdf',
            ],
            [
                'name' => '6-DOH-5143.pdf',
                'actual_url' => '/documents/6-DOH-5143.pdf',
            ],
        ];

        // Loop through the document data and create records
        foreach ($documentsData as $data) {
            $document = new Documents();
            $document->name = $data['name'];
            $document->slug = str_replace(' ', '', $data['name']);
            $document->status = 'pending'; // Corrected the status value
            $document->referral_id = $id; // Corrected the status value
            $document->actual_url = $data['actual_url'];
            $document->save();
            //Email document to the referral
            $referral = Referral::find($id);

        }
    }

    if (!function_exists('userBalance')) {
        function userBalance($id)
        {
            $user = \App\Models\User::find($id);

            $credit = $user->transactions()->sum("credit");
            $debit = $user->transactions()->sum("debit");

            $balance = $credit - $debit;

            return $balance;
        }
    }

    if (!function_exists('generateTransactionId')) {
        function generateTransactionId()
        {
            $lastInsertedId = App\Models\Transaction::max('id') + 1;
            return "TRX" . str_pad($lastInsertedId, 10, '0', STR_PAD_LEFT);
        }
    }

    if (!class_exists('TransactionType')) {
        class TransactionType
        {
            const Operational = "perational";
            const TrustedSurplus = "trusted surplus";
        }
    }

    if (!function_exists('errorLogs')) {
        function errorLogs($description)
        {
            ErrorLog::create(["description" => $description]);
        }
    }

    if (!function_exists('ignoreAdminEmails')) {
        function ignoreAdminEmails()
        {
            return [
                'devops@napollo.net',
                'svaldivia@trustedsurplus.org',
                'ldurzieh@trustedsurplus.org',
                'rbauman@trustedsurplus.org'
            ];
        }
    }
}
