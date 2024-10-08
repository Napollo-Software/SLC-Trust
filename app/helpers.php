<?php

use App\Models\Documents;
use App\Models\ErrorLog;
use App\Models\Referral;
use Twilio\Rest\Client;
use App\Models\Log;
use App\Models\Type;


if (!class_exists('Company')) {
    class Company
    {
        const Account_id = 7;
        const Account_name = 'SLC TRUST';
        const Account_name_income = 'SLC INCOME';
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
        if($date)
        {
            return date('m-d-Y h:i A', strtotime($date));
        }
        return "N/A";
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
                'name' => '1 Joinder Agreement.pdf',
                'actual_url' => '/documents/1JoinderAgreement.pdf',
                'slug' => '/1JoinderAgreement.pdf',
            ],
            [
                'name' => '2 DOH-960 – HIPAA.pdf',
                'actual_url' => '/documents/2DOH-960–HIPAA.pdf',
                'slug' => '2DOH-960–HIPAA.pdf',
            ],
            [
                'name' => '3 MAP-751E – Authorization to Release Medical Info.pdf',
                'actual_url' => '/documents/3MAP-751E–AuthorizationToReleaseMedicalInfo.pdf',
                'slug' => '3MAP-751E–AuthorizationToReleaseMedicalInfo.pdf',
            ],
            [
                'name' => '4 DOH-5173 – HIPAA.pdf',
                'actual_url' => '/documents/4DOH-5173–HIPAA.pdf',
                'slug' => '4DOH-5173–HIPAA.pdf',
            ],
            [
                'name' => '5 DOH-5139 – Disability Questionnaire.pdf',
                'actual_url' => '/documents/5DOH-5139–DisabilityQuestionnaire.pdf',
                'slug' => '5DOH-5139–DisabilityQuestionnaire.pdf',
            ],
            [
                'name' => '6 DOH-5143 – Medical.pdf',
                'actual_url' => '/documents/6DOH-5143–Medical.pdf',
                'slug' => '6DOH-5143–Medical.pdf',
            ],
        ];

        foreach ($documentsData as $data) {
            $document = new Documents();
            $document->name = $data['name'];
            $document->slug = $data['slug'];
            $document->status = 'pending';
            $document->referral_id = $id;
            $document->actual_url = $data['actual_url'];
            $document->save();

            Referral::find($id);

        }
    }

    if (!function_exists('userBalance')) {
        function userBalance($id)
        {
            $user = \App\Models\User::find($id);

            if($user)
            {
                $credit = $user->transactions()->sum("credit");
                $debit = $user->transactions()->sum("debit");

                return $credit - $debit;
            }
            else {
                return "N/A";
            }
        }
    }

    if (!function_exists('generateTransactionId')) {
        function generateTransactionId()
        {

            $lastTransaction = App\Models\Transaction::orderBy('id', 'desc')->first();

            if ($lastTransaction && !empty($lastTransaction->reference_id)) {
                $lastReferenceId = $lastTransaction->reference_id;

                $lastNumber = intval(substr($lastReferenceId, -8));

                $newNumber = $lastNumber + 1;
            } else {
                $newNumber = 1;
            }
            return "TRX_" . date('Y_m_d') . "_" . str_pad($newNumber, 8, '0', STR_PAD_LEFT);
        }
    }


    if (!class_exists('TransactionType')) {
        class TransactionType
        {
            const Operational = "operational";
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
