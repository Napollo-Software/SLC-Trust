<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

require '../vendor/autoload.php';

$files = [];

if (isset($_FILES["credit_card_front"])) {
    $upload_path = "temp-files/".rand(0,9999999).'-';
    $file_name = $upload_path . basename($_FILES["credit_card_front"]["name"]);
    move_uploaded_file($_FILES["credit_card_front"]["tmp_name"], $file_name);
    array_push($files,$file_name);
}

if (isset($_FILES["credit_card_back"])) {
    $upload_path = "temp-files/".rand(0,9999999).'-';
    $file_name = $upload_path . basename($_FILES["credit_card_back"]["name"]);
    move_uploaded_file($_FILES["credit_card_back"]["tmp_name"], $file_name);
    array_push($files,$file_name);
}

if (isset($_FILES["license_front"])) {
    $upload_path = "temp-files/".rand(0,9999999).'-';
    $file_name = $upload_path . basename($_FILES["license_front"]["name"]);
    move_uploaded_file($_FILES["license_front"]["tmp_name"], $file_name);
    array_push($files,$file_name);
}

if (isset($_FILES["license_back"])) {
    $upload_path = "temp-files/".rand(0,9999999).'-';
    $file_name = $upload_path . basename($_FILES["license_back"]["name"]);
    move_uploaded_file($_FILES["license_back"]["tmp_name"], $file_name);
    array_push($files,$file_name);
}

if (isset($_FILES["insurance_certificate"])) {
    $upload_path = "temp-files/".rand(0,9999999).'-';
    $file_name = $upload_path . basename($_FILES["insurance_certificate"]["name"]);
    move_uploaded_file($_FILES["insurance_certificate"]["tmp_name"], $file_name);
    array_push($files,$file_name);
}

if (isset($_FILES["sales_certificate"])) {
    $upload_path = "temp-files/".rand(0,9999999).'-';
    $file_name = $upload_path . basename($_FILES["sales_certificate"]["name"]);
    move_uploaded_file($_FILES["sales_certificate"]["tmp_name"], $file_name);
    array_push($files,$file_name);
}

// print_r($_POST);

// die;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../assets/icon.png" type="image/png">
    <title>Submitting</title>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/pdf.css?v=<?php echo rand(0,10000)?>">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
</head>

<body>
    <!-- Testing -->
    <div class="loader" id='loader'>
        <div class="loader-inner">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin: auto; display: block; shape-rendering: auto;" width="200px" height="200px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
                <path d="M10 50A40 40 0 0 0 90 50A40 40.7 0 0 1 10 50" fill="#ffd500" stroke="none">
                <animateTransform attributeName="transform" type="rotate" dur="1s" repeatCount="indefinite" keyTimes="0;1" values="0 50 50.35;360 50 50.35"/>
                </path>
            </svg>
        </div>
        <div class="loading-text">Submitting . . .</div>
    </div>
    <div class="page-wrapper">
        <div class="page-wrapper-inner">
            <div class="page-wrapper-main" id="convert">
                <!-- PDF Page 01 -->
                <div class="pdf-page" id='pdf-page-01'>
                    <div class="top-title-bar">
                        <div class="left">
                            NEW ACCOUNT APPLICATION
                        </div>
                        <div class="right">
                            <span>scheimpflüg</span>
                            <p>162 W. 21st. Street, 6th Floort, New York, NY 10011</p>
                            <p>(212) 244-8300</p>
                        </div>
                    </div>
                    <div class="field-box">
                        <div class="section-title">
                            ACCOUNT INFORMATION
                        </div>
                        <div class="fields-grid">
                            <div class="field-row dual">
                                <div class="field">
                                    <lable class="lable">Today’s Date:</lable>
                                    <div class="field-value">
                                        <?php echo isset($_POST['date']) ? $_POST['date'] : ''?>
                                    </div>
                                </div>
                                <div class="field">
                                    <lable class="lable">How did you hear about us?</lable>
                                    <div class="field-value">
                                        <?php echo isset($_POST['hear_about']) ? $_POST['hear_about'] : ''?>
                                    </div>
                                </div>
                            </div>
                            <div class="field-row single">
                                <div class="field">
                                    <lable class="lable">Account Name:</lable>
                                    <div class="field-value">
                                        <?php echo isset($_POST['account_name']) ? $_POST['account_name'] : ''?>
                                    </div>
                                </div>
                            </div>
                            <div class="field-row dual">
                                <div class="field">
                                    <lable class="lable">Primary Account Holder:</lable>
                                    <div class="field-value">
                                        <?php echo isset($_POST['primary_account_holder']) ? $_POST['primary_account_holder'] : ''?>
                                    </div>
                                </div>
                                <div class="field">
                                    <lable class="lable">Title:</lable>
                                    <div class="field-value">
                                    <?php echo isset($_POST['pa_title']) ? $_POST['pa_title'] : ''?>
                                    </div>
                                </div>
                            </div>
                            <div class="field-row dual">
                                <div class="field">
                                    <lable class="lable">Address:</lable>
                                    <div class="field-value">
                                    <?php echo isset($_POST['pa_address_01']) ? $_POST['pa_address_01'] : ''?>
                                    </div>
                                </div>
                                <div class="field">
                                    <lable class="lable">Primary Phone:</lable>
                                    <div class="field-value">
                                    <?php echo isset($_POST['pa_primary_phone']) ? $_POST['pa_primary_phone'] : ''?>
                                    </div>
                                </div>
                            </div>
                            <div class="field-row dual">
                                <div class="field">
                                    <lable class="lable color-fade">Address:</lable>
                                    <div class="field-value">
                                    <?php echo isset($_POST['pa_address_02']) ? $_POST['pa_address_02'] : ''?>
                                    </div>
                                </div>
                                <div class="field">
                                    <lable class="lable">Cell Phone:</lable>
                                    <div class="field-value">
                                    <?php echo isset($_POST['pa_cell']) ? $_POST['pa_cell'] : ''?>
                                    </div>
                                </div>
                            </div>
                            <div class="field-row dual">
                                <div class="sub-row triple">
                                    <div class="field">
                                        <lable class="lable">City:</lable>
                                        <div class="field-value">
                                        <?php echo isset($_POST['pa_city']) ? $_POST['pa_city'] : ''?>
                                        </div>
                                    </div>
                                    <div class="field">
                                        <lable class="lable">State:</lable>
                                        <div class="field-value">
                                        <?php echo isset($_POST['pa_state']) ? $_POST['pa_state'] : ''?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="field-row dual">
                                <div class="sub-row triple">
                                    <div class="field">
                                        <lable class="lable">Zip Code:</lable>
                                        <div class="field-value">
                                        <?php echo isset($_POST['pa_zipcode']) ? $_POST['pa_zipcode'] : ''?>
                                        </div>
                                    </div>
                                    <div class="field">
                                        <lable class="lable">Country:</lable>
                                        <div class="field-value">
                                        <?php echo isset($_POST['pa_country']) ? $_POST['pa_country'] : ''?>
                                        </div>
                                    </div>
                                </div>
                                <div class="field">
                                    <lable class="lable">Email:</lable>
                                    <div class="field-value">
                                    <?php echo isset($_POST['pa_email']) ? $_POST['pa_email'] : ''?>
                                    </div>
                                </div>
                            </div>
                            <!-- Contacting -->
                            <div class="field-row dual">
                                <div class="field">
                                    <lable class="lable">Accounting Contact:</lable>
                                    <div class="field-value">
                                    <?php echo isset($_POST['accounting_contact']) ? $_POST['accounting_contact'] : ''?>
                                    </div>
                                </div>
                                <div class="field">
                                    <lable class="lable">Phone:</lable>
                                    <div class="field-value">
                                    <?php echo isset($_POST['ac_phone']) ? $_POST['ac_phone'] : ''?>
                                    </div>
                                </div>
                            </div>
                            <div class="field-row dual">
                                <div class="field">
                                    <lable class="lable">Email:</lable>
                                    <div class="field-value">
                                    <?php echo isset($_POST['ac_email']) ? $_POST['ac_email'] : ''?>
                                    </div>
                                </div>
                                <div class="field">
                                    <lable class="lable">Tax Exempt: (Attach certificate)</lable>
                                    <div class="field-value no-b">
                                        <div class="check-boxes">
                                            <label><input type="checkbox" <?php echo (isset($_POST['ac_tax_exempt']) && $_POST['ac_tax_exempt'] == 'on') ? "checked" : "" ;?>> Yes</label>
                                            <label><input type="checkbox" <?php echo (isset($_POST['ac_tax_exempt']) && $_POST['ac_tax_exempt'] == 'off') ? "checked" : "" ;?>> No</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="secondary-title">
                        <div class="top-title-bar">
                            <div class="left">
                                CREDIT CARD AUTHORIZATION
                            </div>
                        </div>
                        <span>(at this time we do not accept debit cards)</span>
                    </div>
                    <div class="field-box">
                        <div class="fields-grid">
                            <div class="field-row single">
                                <div class="field">
                                    <lable class="lable">Cardholder Name:</lable>
                                    <div class="field-value">
                                    <?php echo isset($_POST['card_holder_name']) ? $_POST['card_holder_name'] : ''?>
                                    </div>
                                </div>
                            </div>
                            <div class="field-row dual">
                                <div class="field">
                                    <lable class="lable">Billing Address:</lable>
                                    <div class="field-value">
                                    <?php echo isset($_POST['billing_address']) ? $_POST['billing_address'] : ''?>
                                    </div>
                                </div>
                                <div class="field">
                                    <div class="radio-list">
                                        <div class="custom-radio">
                                            <input type="radio" id="visa" />
                                            <label for="visa">VISA</label>
                                        </div>
                                        <div class="custom-radio">
                                            <input type="radio" id="mc" />
                                            <label for="mc">MC</label>
                                        </div>
                                        <div class="custom-radio">
                                            <input type="radio" id="amex" />
                                            <label for="amex">AMEX</label>
                                        </div>
                                        <div class="custom-radio">
                                            <input type="radio" id="discover" />
                                            <label for="discover">DISCOVER</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="field-row dual">
                                <div class="field">
                                    <div class="field-value">
                                    <?php echo isset($_POST['billing_address']) ? $_POST['billing_address'] : ''?>
                                    </div>
                                </div>
                                <div class="field">
                                    <lable class="lable">Card Number:</lable>
                                    <div class="card-list">
                                        <div class="field-value">
                                        <?php echo isset($_POST['ch_card_number']) ? $_POST['ch_card_number'] : ''?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="field-row triple">
                                <div class="field">
                                    <lable class="lable">City:</lable>
                                    <div class="field-value">
                                    <?php echo isset($_POST['ch_city']) ? $_POST['ch_city'] : ''?>
                                    </div>
                                </div>
                                <div class="field">
                                    <lable class="lable">State:</lable>
                                    <div class="field-value">
                                    <?php echo isset($_POST['ch_state']) ? $_POST['ch_state'] : ''?>
                                    </div>
                                </div>
                                <div class="field">
                                    <lable class="lable">CVV:</lable>
                                    <div class="field-value">
                                    <?php echo isset($_POST['ch_security_code']) ? $_POST['ch_security_code'] : ''?>
                                    </div>
                                </div>
                            </div>
                            <div class="field-row dual">
                                <div class="sub-row triple">
                                    <div class="field">
                                        <lable class="lable">Zip Code:</lable>
                                        <div class="field-value">
                                        <?php echo isset($_POST['ch_zipcode']) ? $_POST['ch_zipcode'] : ''?>
                                        </div>
                                    </div>
                                    <div class="field">
                                        <lable class="lable">Country:</lable>
                                        <div class="field-value">
                                        <?php echo isset($_POST['ch_country']) ? $_POST['ch_country'] : ''?>
                                        </div>
                                    </div>
                                </div>
                                <div class="field">
                                    <lable class="lable">Expiration Date:</lable>
                                    <div class="field-value">
                                    <?php echo isset($_POST['ch_card_expiry']) ? $_POST['ch_card_expiry'] : ''?>
                                    </div>
                                </div>
                            </div>
                            <div class="field-row dual">
                                <div class="field">
                                    <lable class="lable">Identification/DL No.:</lable>
                                    <div class="field-value">
                                    <?php echo isset($_POST['ch_dl_no']) ? $_POST['ch_dl_no'] : ''?>
                                    </div>
                                </div>
                                <div class="field">
                                    <lable class="lable">DL Expiration Date:</lable>
                                    <div class="field-value">
                                    <?php echo isset($_POST['ch_dl_expiry']) ? $_POST['ch_dl_expiry'] : ''?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-line">
                        I AUTHORIZE SCHEIMPFLUG TO CHARGE THE ABOVE CARD FOR ALL INVOICED AMOUNTS, WITHOUT
                        NOTIFICATION TO THE CARDHOLDER
                    </div>
                    <div class="signature-image">
                        <img src="<?php echo isset($_POST['sign_02']) ? $_POST['sign_02'] : ''?>" alt="">
                    </div>

                    <div class="card-row">
                        <div class="text card-sign">
                            Primary account holder signature
                        </div>
                        
                    </div>
                        <!-- New Section -->
                    <div class="setcion-title">
                        PLEASE INCLUDE LEGIBLE FRONT + REAR COPIES OF CREDIT CARD AND CARDHOLDER’S Identification/DL
                    </div>
                    <div class="secondary-title">
                        <div class="top-title-bar">
                            <div class="left">
                                INSURANCE TERMS
                            </div>
                        </div>
                    </div>
                    <div class="field-box">
                        <div class="text-line">
                            A valid Certificate of Insurance must be issued naming Scheimpflug Photo Equipment, LLC as Additional Loss Payee for rented / miscellaneous equipment, all risk, worldwide. Coverage must match or be above the rental order replacement value amount. Scheimpflug must also be listed as Additional Insurded for $1,000,000 USD with respect to General Liability. 
                        </div>
                        <div class="text-line" style="margin: 10px 0;">
                            An example COI for new accounts is available online at www.theflug.com/place-an-order/
                        </div>
                        <div class="fields-grid">
                            <div class="field-row dual">
                                <div class="field">
                                    <lable class="lable">Broker:</lable>
                                    <div class="field-value">
                                    <?php echo isset($_POST['it_broker']) ? $_POST['it_broker'] : ''?>
                                    </div>
                                </div>
                                <div class="field">
                                    <lable class="lable">Phone:</lable>
                                    <div class="field-value w-60">
                                    <?php echo isset($_POST['it_phone']) ? $_POST['it_phone'] : ''?>
                                    </div>
                                </div>
                            </div>
                            <div class="field-row dual">
                                <div class="field">
                                    <lable class="lable">Insurance Company:</lable>
                                    <div class="field-value">
                                    <?php echo isset($_POST['it_insurance_company']) ? $_POST['it_insurance_company'] : ''?>
                                    </div>
                                </div>
                                <div class="field">
                                    <lable class="lable">Policy No.:</lable>
                                    <div class="field-value w-50" style="width: 56%;">
                                    <?php echo isset($_POST['it_policy_no']) ? $_POST['it_policy_no'] : ''?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="setcion-title">
                        In The Absence Of A Valid Certificate Of Insurance, A Hold For The Full Replacement Value Of The Rental Package Will Be Placed On The Account Credit Card Upon Pickup And/or Delivery Of The Order. Scheimpflug Has No Control On When Holds Placed On Charge Cards Are Released By Your Banking Institution.
                    </div>
                    <div class="secondary-title">
                        <div class="top-title-bar">
                            <div class="left">
                                INCLUDED DOCUMENTS CHECKLIST
                            </div>
                        </div>
                    </div>
                    <div class="field-box">
                        <div class="fields-grid">
                            <div class="field-row dual">
                                <div class="field">
                                    <input type="checkbox" name="credit-card" id="credit-card">
                                    <lable class="lable" for="credit-card">Credit Card Front and Rear</lable>
                                </div>
                                <div class="field">
                                    <input type="checkbox" name="certificate-insurance" id="certificate-insurance">
                                    <lable class="lable" for="certificate-insurance">Certificate of Insurance
                                    </lable>
                                </div>
                            </div>
                            <div class="field-row dual">
                                <div class="field">
                                    <input type="checkbox" name="credit-card" id="credit-card">
                                    <lable class="lable" for="credit-card">Cardholder’s Driver’s License (Front and
                                        Rear)</lable>
                                </div>
                                <div class="field">
                                    <input type="checkbox" name="certificate-insurance" id="certificate-insurance">
                                    <lable class="lable" for="certificate-insurance">Sales Exempt Tax Certificate
                                        (if applicable)</lable>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="field-box">
                        <div class="section-title m-b-custom">
                            TRADE REFERENCES
                        </div>
                        <div class="fields-grid">
                            <div class="field-row dual">
                                <div class="field">
                                    <lable class="lable">Name:</lable>
                                    <div class="field-value">
                                    <?php echo isset($_POST['tr_reff_name_01']) ? $_POST['tr_reff_name_01'] : ''?>
                                    </div>
                                </div>
                                <div class="field">
                                    <lable class="lable">Title:</lable>
                                    <div class="field-value w-70">
                                    <?php echo isset($_POST['tr_reff_title_01']) ? $_POST['tr_reff_title_01'] : ''?>
                                    </div>
                                </div>
                            </div>
                            <div class="field-row dual">
                                <div class="field">
                                    <lable class="lable">Phone:</lable>
                                    <div class="field-value">
                                    <?php echo isset($_POST['tr_reff_phone_01']) ? $_POST['tr_reff_phone_01'] : ''?>
                                    </div>
                                </div>
                                <div class="field">
                                    <lable class="lable">Email:</lable>
                                    <div class="field-value">
                                    <?php echo isset($_POST['tr_reff_email_01']) ? $_POST['tr_reff_email_01'] : ''?>
                                    </div>
                                </div>
                            </div>
                            <div class="field-row dual">
                                <div class="field">
                                    <lable class="lable">Name:</lable>
                                    <div class="field-value">
                                    <?php echo isset($_POST['tr_reff_name_02']) ? $_POST['tr_reff_name_02'] : ''?>
                                    </div>
                                </div>
                                <div class="field">
                                    <lable class="lable">Title:</lable>
                                    <div class="field-value w-70">
                                    <?php echo isset($_POST['tr_reff_title_02']) ? $_POST['tr_reff_title_02'] : ''?>
                                    </div>
                                </div>
                            </div>
                            <div class="field-row dual">
                                <div class="field">
                                    <lable class="lable">Phone:</lable>
                                    <div class="field-value">
                                    <?php echo isset($_POST['tr_reff_phone_02']) ? $_POST['tr_reff_phone_02'] : ''?>
                                    </div>
                                </div>
                                <div class="field">
                                    <lable class="lable">Email:</lable>
                                    <div class="field-value">
                                    <?php echo isset($_POST['tr_reff_email_02']) ? $_POST['tr_reff_email_02'] : ''?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="terms-container-grid-innerdata_01_title">
                        <span class="terms-container-grid-innerdata_01_title_span">
                            scheimpflüg
                        </span>
                        <p>
                            Page 1/3
                        </p>
                    </div>
                </div>
                <!-- End Page 01 -->
                <!-- PDF Page 02 -->
                <div class="pdf-page" id='pdf-page-02'>
                    <div class="top-title-bar">
                        <div class="left">
                            NEW ACCOUNT APPLICATION
                        </div>
                        <div class="right">
                            <span>scheimpflüg</span>
                            <p>162 W. 21st. Street, 6th Floort, New York, NY 10011</p>
                            <p>(212) 244-8300</p>
                        </div>
                    </div>
                    <div class="field-box">
                        <div class="section-title  m-b-custom">
                            PRE-AUTHORIZED ACCOUNT CONTACTS
                        </div>
                        <span>(these persons are pre-authorized to place orders with this account.)</span>
                        <div class="fields-grid">
                            <div class="field-row dual">
                                <div class="field">
                                    <lable class="lable">Name:</lable>
                                    <div class="field-value">
                                    <?php echo isset($_POST['paac_reff_name_01']) ? $_POST['paac_reff_name_01'] : ''?>
                                    </div>

                                </div>
                                <div class="field">
                                    <lable class="lable">Title:</lable>
                                    <div class="field-value w-70">
                                    <?php echo isset($_POST['paac_reff_title_01']) ? $_POST['paac_reff_title_01'] : ''?>
                                    </div>
                                </div>
                            </div>
                            <div class="field-row dual">
                                <div class="field">
                                    <lable class="lable">Phone:</lable>
                                    <div class="field-value">
                                    <?php echo isset($_POST['paac_reff_phone_01']) ? $_POST['paac_reff_phone_01'] : ''?>
                                    </div>
                                </div>
                                <div class="field">
                                    <lable class="lable">Email:</lable>
                                    <div class="field-value">
                                    <?php echo isset($_POST['paac_reff_email_01']) ? $_POST['paac_reff_email_01'] : ''?>
                                    </div>
                                </div>
                            </div>
                            <div class="field-row dual">
                                <div class="field">
                                    <lable class="lable">Name:</lable>
                                    <div class="field-value">
                                    <?php echo isset($_POST['paac_reff_name_02']) ? $_POST['paac_reff_name_02'] : ''?>
                                    </div>
                                </div>
                                <div class="field">
                                    <lable class="lable">Title:</lable>
                                    <div class="field-value w-70">
                                    <?php echo isset($_POST['paac_reff_title_02']) ? $_POST['paac_reff_title_02'] : ''?>
                                    </div>
                                </div>
                            </div>
                            <div class="field-row dual">
                                <div class="field">
                                    <lable class="lable">Phone:</lable>
                                    <div class="field-value">
                                    <?php echo isset($_POST['paac_reff_phone_02']) ? $_POST['paac_reff_phone_02'] : ''?>
                                    </div>
                                </div>
                                <div class="field">
                                    <lable class="lable">Email:</lable>
                                    <div class="field-value">
                                    <?php echo isset($_POST['paac_reff_email_02']) ? $_POST['paac_reff_email_02'] : ''?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
					
					<div class="text-line">
						I HAVE CAREFULLY READ AND AGREE TO THE RENTAL AGREEMENT TERMS ON THE FOLLOWING PAGES. I
						AFFIRM ALL INFORMATION PROVIDED IS TRUE AND ACCURATE.
					</div>
					<div class="signature-image">
						<img src="<?php echo isset($_POST['sign_01']) ? $_POST['sign_01'] : ''?>" alt="">

					</div>
					<div class="text">
						Primary account holder signature
					</div>
					<!-- New Section -->
					<div class="setcion-title m-b-custom">
						ACCOUNT APPROVAL MAY REQUIRE UP TO 72 BUSINESS HOURS, CONTINGENT ON SUCCESSFUL VERIFICATION
						OF REFERENCES, INSURANCE, AND CREDIT.
					</div>
					
                    <div class="terms-container">
                        <div class="terms-container-grid">
                            <h1 class="terms-container-head">
                                RENTAL AGREEMENT TERMS
                            </h1>
                            <div class="terms_innerdata custom-fonts">

                                <div class="terms-container-grid-innerdata_01">
                                    <div class="terms-container-grid-innerdata_01_property">
                                        <p class="terms-container-grid-innerdata_01_property_p">
                                            <span class="terms-container-grid-innerdata_01_property_span">
                                                DESCRIPTION OF PROPERTY:
                                            </span>
                                            Te property (“Property”) subject to this Agreement shall be
                                            the specifc items of equipment listed on the Rental Agreement prepared
                                            by Scheimpfug at
                                            the time of delivery of such equipment to or on behalf of the customer,
                                            whose name appears
                                            above (“Customer”). Such Rental Agreement, which specifes the rental
                                            rate, shall be deemed
                                            a part of this Agreement, as if fully incorporated herein. Upon pickup
                                            of the Property by
                                            Customer at Scheimpfug’s place of business, or upon receipt by Customer
                                            after a shipment, it
                                            is Customer’s responsibility to determine that the order is complete and
                                            to immediately notify
                                            Scheimpfug prior to taking delivery, of any discrepancies.
                                        </p>
                                    </div>
                                    <div class="terms-container-grid-innerdata_01_rental">
                                        <p class="terms-container-grid-innerdata_01_rental_p">
                                            <span class="terms-container-grid-innerdata_01_rental_span">
                                                TERM OF RENTAL:
                                            </span>
                                            Unless otherwise specifed in the Rental Agreement, all Property
                                            shall be rented on a day-to-day basis and all rental rates shall apply
                                            to each full day or any
                                            fraction thereof which has elapsed between the time the Property is
                                            delivered to Customer
                                            and the time it is returned to Scheimpfug. Te manner by which “delivery”
                                            and “return” are
                                            to be accomplished are described herein below. Pickup by the Customer
                                            from Scheimpfug
                                            or shipment by Scheimpfug of the Property after 4:00 PM shall not be
                                            deemed a rental
                                            day. Return of the property to Scheimpfug after 10:00 AM will be deemed
                                            an additional
                                            rental day. Where the Property has not been returned to Scheimpfug the
                                            date specifed in the
                                            Rental Agreement, rent shall continue to accrue on the Property on a
                                            day-to-day basis at the
                                            rate contained on the applicable invoice, until such time as the
                                            property has been returned to
                                            Scheimpfug in the manner provided for below. Regardless of the period of
                                            rental specifed in
                                            the Rental Agreement, Scheimpfug, by notice to the customer, cancel any
                                            agreement at any
                                            time during the term of rental if Scheimpfug deems that the customer is
                                            misusing equipment,
                                            the terms of this Agreement are not being met, or customer has breached
                                            this Agreement in
                                            any other manner.
                                        </p>
                                    </div>
                                    <div class="terms-container-grid-innerdata_01_deli">
                                        <p class="terms-container-grid-innerdata_01_deli_p">
                                            <span class="terms-container-grid-innerdata_01_deli_span">
                                                DELIVERY:
                                            </span>
                                            Customer, by signing this agreement acknowledges that the property will
                                            be
                                            deemed “delivered” to it for all purposes when it leaves Scheimpfug
                                            place of business in the
                                            possession of the customer, any agent of the customer or any third party
                                            carrier. Customer
                                            bears full responsibility for all transportation arrangements for the
                                            property (including s of the Cutomer (including, but not limited to, drayage houses, storage facilities and/ or Hotel concierge desks) or any third party carrier shall not be deemed to have been “returned” to Scheimpfug until Scheimpfug has received full replacement value from the Customer or the Customer’s insurer, including payment of any continuing rental charges, or the equipment has been released by the governmental agency or third party and is in the physical condition of Scheimpfug, in an undamaged condition. Under no circumstances shall Scheimpfug be deemed to have accepted return delivery of or otherwise “signed of ” on particular items of equipment until such time as each item has been unpacked from its shipping container, examined by Scheimpfug’s employees and individually bar code scanned into Scheimpfug’s computerized inventory system as returned and undamaged.
                                        </p>
                                    </div>
                                </div>
                                <div class="terms-container-grid-innerdata_02">
                                    <p class="terms-container-grid-innerdata_02_P">
                                        selection of a third party carrier if required), unless other arrangements
                                        are made in a
                                        writing signed by an authorized representative of Scheimpfug. Should the
                                        Customer
                                        fail to specify in writing the exact manner by which transportation and
                                        delivery shall
                                        be accomplished, customer shall be deemed to have authorized Scheimpfug to
                                        employ
                                        methods of delivery that Scheimpfug, in its sole discretion, deems to be
                                        appropriate for
                                        the particular circumstances under which the transportation and/or delivery
                                        will occur,
                                        including the use of any third party carriers, drayage houses, and/or
                                        storage facilities, with
                                        the customer bearing the entire risk of loss and/or damage to any Property
                                        once it has
                                        left Scheimpfug’s place of business. In the event Scheimpfug agrees in
                                        writing to deliver
                                        the Property to a location away from Scheimpfug’s place of business, the
                                        Customer shall
                                        provide Scheimpfug with detailed written instructions for the manner and
                                        location of
                                        such delivery. If the Customer fails to provide such instructions, or if
                                        such instructions
                                        fail to address specifc aspects of the delivery process, Customer shall be
                                        deemed to have
                                        authorized Scheimpfug to accomplish delivery in any manner that Scheimpfug,
                                        in its
                                        sole discretion, deems to be appropriate for the particular circumstances
                                        under which
                                        the delivery will occur, including delivery to a drayage house or storage
                                        facility, with the
                                        Customer bearing the entire risk of loss and/or damage to the Property once
                                        it is no longer
                                        in the physical custody of authorized Scheimpfug’s employees.
                                    </p>
                                    <div class="terms-container-grid-innerdata_01_return">
                                        <p class="terms-container-grid-innerdata_01_return_p_bold">
                                            <span class="terms-container-grid-innerdata_01_return_span">
                                                RETURN:
                                            </span>
                                            <span class="propert_text">
                                                THE PROPERTY SHALL BE DEEMED “RETURNED” TO
                                                SCHEIMPFLUG WHEN IT HAS BEEN DELIVERED TO SCHEIMPFLUG’s
                                                OPERATIONS DEPARTMENT. THE CUSTOMER SHALL CONTINUE TO
                                                BEAR ANY AND ALL RISK OF LOSS AND/OR DAMAGE TO THE PROPERTY
                                                UNTIL RETURN HAS BEEN ACCOMPLISHED IN THIS MANNER.
                                            </span>
                                            <span class="terms-container-grid-innerdata_01_return_span_rest">
                                                Equipment
                                                that has been damaged or destroyed while in the possession of the
                                                Customer, an agent of
                                                the Customer or any third party carrier shall not be deemed to have
                                                been “returned” to
                                                Scheimpfug until such time as it has been repaired (as provided
                                                below) and Customer has
                                                released in writing by an authorized representative of Scheimpfug
                                                from liability for any
                                                further rent, or Scheimpfug has received full replacement value from
                                                the Customer or the
                                                Customer’s insurer, including payment of any unpaid and/or
                                                continuing rental charges.
                                                Likewise, equipment that has been lost, stolen or seized by a
                                                governmental agency while in
                                                the possession of the Customer, an agent date of receipt of the replacement cost by Scheimpfug, including coverage of the Property while in transit. Te customer’s insurance must include rented or leased equipment coverage and must provide coverage during the entire time of rental or lease, including transportation of the equipment to and from Scheimpfug’s place of business, even if such transportation is accomplished by a third party carrier.
                                            </span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="terms-container-grid-innerdata_01_title m-b-custom-1">
                        <span class="terms-container-grid-innerdata_01_title_span">
                            scheimpflüg
                        </span>
                        <p>
                            Page 2/3
                        </p>
                    </div>
                </div>
                <!-- End Page 02 -->
                <!-- PDF Page 03 -->
                <div class="pdf-page" id='pdf-page-03'>
                    <div class="top-title-bar">
                        <div class="left">
                            NEW ACCOUNT APPLICATION
                        </div>
                        <div class="right">
                            <span>scheimpflüg</span>
                            <p>162 W. 21st. Street, 6th Floort, New York, NY 10011</p>
                            <p>(212) 244-8300</p>
                        </div>
                    </div>
                    <div class="terms-container">
                        <div class="terms-container-grid">
                            <div class="terms_innerdata">

                                <div class="terms-container-grid-innerdata_01">
                                    <div class="terms-container-grid-innerdata_01_rental">
                                        <p class="terms-container-grid-innerdata_01_rental_p">
                                            <span class="terms-container-grid-innerdata_01_rental_span">
                                                RATES AND CHARGES:
                                            </span>
                                            Te rent payable for any item of Property shall be that set
                                            forth in the Rental Agreement. Tis rate is ofered to Customer based upon
                                            Customer’s
                                            credit information available to Scheimpfug at the time of rental. Tis
                                            completed Rental
                                            Agreement must be signed and returned to Scheimpfug at least three (3)
                                            days prior to
                                            the frst rental. If this information is incorrect or changes during the
                                            course of a rental,
                                            Scheimpfug may revise the applicable rate without notice. Rent is
                                            payable according to
                                            the terms contained on Scheimpfug’s Rental Agreement and/or Invoice to
                                            the Customer.
                                            If not paid when due, rent shall bear interest at the rate of one and
                                            one-half percent (1
                                            1/2 %) per month from the date rental charges were incurred. Any
                                            discounts granted by
                                            Scheimpfug may be revoked at any time after thirty (30) days.
                                            Scheimpfug’s published
                                            rates are subject to change at any time without notice. All rates are
                                            FOB Scheimpfug, and
                                            Customer is responsible for all shipping and delivery charges.
                                            Scheimpfug may assess an
                                            additional charge in accordance with its then current rate schedule for
                                            pickup and delivery,
                                            early pickup services during non-business hours, and technical support
                                            for the operation
                                            of equipment. Canceled orders will be subject to Scheimpfug’s then
                                            current cancellation
                                            charge. No allowance will be made for items delivered to but not used by
                                            the Customer. Te
                                            Customer shall pay all taxes, transportation charges, duties, broker’s
                                            fees, bonds or other
                                            costs imposed on the rental of the property by the Customer.
                                        </p>
                                    </div>
                                    <div class="terms-container-grid-innerdata_01_deli">
                                        <p class="terms-container-grid-innerdata_01_deli_p">
                                            <span class="terms-container-grid-innerdata_01_deli_span">
                                                LIMITED WARRANTY:
                                            </span>
                                            Scheimpfug warrants that, when delivered to the Customer,
                                            all Property will be operational to accepted manufacturer specifcations.
                                            in the event of
                                            a malfunction, customer must notify Scheimpfug immediately and
                                            Scheimpfug will
                                            have no responsibility for any malfunction reported after termination of
                                            the rental for
                                            such property. customer shall not attempt to service or repair any of
                                            the property and any
                                            attempt by the customer to service or repair the property, will void the
                                            limited warranty
                                            provided herein. Te limited warranty provided herein shall not apply to
                                            any malfunction
                                            resulting from mishandling or improper operation of the property after
                                            delivery to the
                                            customer. scheimpfug shall have no liability arising out of the
                                            customer’s inability to
                                            operate the property in accordance with manufacturer’s instructions and
                                            contemplated use,
                                            except as set forth herein, scheimpfug makes no warranty with respect to
                                            the property and
                                            expressly dis- claims any warranty, implied or otherwise, that the
                                            property is suitable for the
                                            customer’s intended use. scheimpfug productions shall not be liable for
                                            any consequential
                                            damages and its liability for any breach of the warranty granted
                                            hereunder shall be, in
                                            scheimpfug’s discretion, replacement or repair of any defective property
                                            or a refund of any
                                            rent paid by the customer in connection with such property.
                                        </p>
                                    </div>
                                    <div class="terms-container-grid-innerdata_01_deli">
                                        <p class="terms-container-grid-innerdata_01_deli_p">
                                            <span class="terms-container-grid-innerdata_01_deli_span">
                                                DAMAGE AND INSURANCE:
                                            </span>
                                            Te customer acknowledges that when the property is
                                            delivered to the customer, the customer will have examined the property
                                            and found it
                                            to be in good working order. Te customer shall have full responsibility
                                            and liability to
                                            Scheimpfug for the actual cost to repair or replace any property which
                                            during the period
                                            between delivery to the customer and Scheimpfug has been lost, stolen,
                                            or damaged from
                                            any cause whatsoever (other than from a malfunction to which
                                            Scheimpfug’s limited
                                            warranty applies or ordinary wear and tear). Te Customer assumes any and
                                            all risk of loss
                                            once the property leaves Scheimpfug’s place of business until such time
                                            as the property
                                            is returned to scheimpfug in the manner provided herein, except at such
                                            times as the
                                            equipment is in the exclusive control of authorized Scheimpfug
                                            employees. Te customer
                                            shall also be liable to Scheimpfug for any continued rental charges
                                            during a reasonable
                                            time required to repair or replace damaged equipment, to the extent the
                                            customer is
                                            responsible under this agreement for such damage or loss, the customer
                                            shall be liable
                                            to Scheimpfug for the full replacement cost of all property which must
                                            be replaced as a
                                            result of damage, loss or the customer’s failure to return the property
                                            to scheimpfug. Te
                                            liability of customer hereunder is primary and shall only be reduced in
                                            the event and to the
                                            scheimpfug productions actually receives any applicable insurance
                                            proceeds. Acceptance by
                                            Scheimpfug of the return of any Property shall not be deemed a waiver by
                                            Scheimpfug of
                                            any claims which Scheimpfug may have against the Customer under this
                                            paragraph, even
                                            though any damage for which the Customer is liable hereunder is
                                            discovered later. Prior
                                            to taking delivery of the Property, the Customer shall provide to
                                            Scheimpfug a Certifcate
                                            of Insurance acceptable to Scheimpfug, with Scheimpfug named as the loss
                                            payee, in a
                                            form and amount satisfactory to Scheimpfug, evidencing Customer’s
                                            insurance covering
                                            all risk ofoss to the Property at replacement cost value plus any
                                            continuing renal charges
                                            at the same rate set forth on the Rental Agreement (such payments to
                                            continue until the
                                        </p>
                                    </div>
                                </div>
                                <div class="terms-container-grid-innerdata_02">
                                    <div class="terms-container-grid-innerdata_01_return">
                                        <p class="terms-container-grid-innerdata_01_return_p_bold">
                                            <span class="terms-container-grid-innerdata_01_return_span">
                                                USE OF PROPERTY:
                                            </span>
                                            <span class="terms-container-grid-innerdata_01_return_span_rest">
                                                Te Customer shall at all times retain the Property in his own
                                                custody..
                                                Te Customer shall operate the Property in accordance with the
                                                manufacturer’s instructions
                                                and contemplated use and shall not use the Property in any manner
                                                which will subject it to
                                                abnormal or hazardous conditions, including, but not limited to: not
                                                using the Property in
                                                accordance with manufacturer’s instructions and contemplated use,
                                                negligence (defned as,
                                                but not limited to, failure to provide prudent security measures to
                                                prevent theft or carelessness
                                                in maintaining the equipment properly); or misuse (defned as, but
                                                not limited to, improper
                                                use of the equipment causing damage due to the utilization of the
                                                equipment in a manner for
                                                which it is not designed). Te Customer shall not make any
                                                alterations or improvements to
                                                the Property with- out the prior written consent of Scheimpfug and
                                                shall not deface, remove,
                                                or cover any nameplate on the Property showing Scheimpfug ownership.
                                                All Property shall
                                                be operated in accordance with applicable Federal, State or local
                                                law.
                                            </span>
                                        </p>
                                    </div>
                                    <div class="terms-container-grid-innerdata_01_return">
                                        <p class="terms-container-grid-innerdata_01_return_p_bold">
                                            <span class="terms-container-grid-innerdata_01_return_span">
                                                INDEMNIFICATION:
                                            </span>
                                            <span class="terms-container-grid-innerdata_01_return_span_rest">
                                                Te Customer hereby agrees to indemnify and hold Scheimpfug
                                                harmless from and against any and all losses and/or claims,
                                                including attorneys’ fees, arising
                                                out of Customer’s possession, use or operation of the property
                                                during the time between
                                                delivery of the Property to the Customer and its return to
                                                Scheimpfug.
                                            </span>
                                        </p>
                                    </div>
                                    <div class="terms-container-grid-innerdata_01_return">
                                        <p class="terms-container-grid-innerdata_01_return_p_bold">
                                            <span class="terms-container-grid-innerdata_01_return_span">
                                                TITLE MATTERS:
                                            </span>
                                            <span class="terms-container-grid-innerdata_01_return_span_rest">
                                                Tis Agreement constitutes a lease and not a sale of the Property or
                                                the creation of a security interest therein. No part of the rental
                                                payments made under this
                                                Agreement shall be deemed payment towards the purchase of any of the
                                                Property. Title to
                                                the Property shall remain at all times in Scheimpfug. Te Customer
                                                hereby acknowledges
                                                Scheimpfug’s ownership and title in the Property and agrees to keep
                                                the Property free of
                                                all liens, levies, and encumbrances. Tis Agreement constitutes a
                                                lease to the Customer
                                                exclusively and the Customer shall not assign any rights under this
                                                Agreement (or sublease
                                                the Property to any other person or entity). Scheimpfug shall have
                                                the right to assign its
                                                rights and obligations under this Agreement without the consent of
                                                the Customer. In the
                                                event of any such assignment, the Customer waives the right to
                                                assert any claim by the
                                                Customer against Scheimpfug as a defense against any such assignee.
                                            </span>
                                        </p>
                                    </div>
                                    <div class="terms-container-grid-innerdata_01_return">
                                        <p class="terms-container-grid-innerdata_01_return_p_bold">
                                            <span class="terms-container-grid-innerdata_01_return_span">
                                                RIGHT OF ENTRY AND INSPECTION:
                                            </span>
                                            <span class="terms-container-grid-innerdata_01_return_span_rest">
                                                Scheimpfug shall have the right to inspect the
                                                Property at any time during the rental term. Customer shall make any
                                                and all arrangements
                                                necessary to permit a qualifed representative of Scheimpfug’s access
                                                to the location of the
                                                Property. If a breach of any of the provisions of the Rental
                                                Agreement occurs, Scheimpfug
                                                has the right to remove all of the Property without liability to
                                                Customer, and without
                                                prejudice to Scheimpfug’s right to receive rent due or accrued, up
                                                to and including the date
                                                of removal of the Property
                                            </span>
                                        </p>
                                    </div>
                                    <div class="terms-container-grid-innerdata_01_return">
                                        <p class="terms-container-grid-innerdata_01_return_p_bold">
                                            <span class="terms-container-grid-innerdata_01_return_span">
                                                GOVERNING LAW:
                                            </span>
                                            <span class="terms-container-grid-innerdata_01_return_span_rest">
                                                Tis Rental Agreement shall be governed by and construed in
                                                accordance with the laws of the State of New York for all purposes
                                                related to this Agreement.
                                                Te prevailing party in any proceeding shall be entitled to an award
                                                of attorneys’ fees and
                                                litigation costs.
                                            </span>
                                        </p>
                                    </div>
                                    <div class="terms-container-grid-innerdata_01_return">
                                        <p class="terms-container-grid-innerdata_01_return_p_bold">
                                            <span class="terms-container-grid-innerdata_01_return_span">
                                                MISCELLANEOUS:
                                            </span>
                                            <span class="terms-container-grid-innerdata_01_return_span_rest">
                                                Tis Agreement, the Rental Agreement and any extension of the
                                                rental term set forth in the Rental Agreement issued by Scheimpfug
                                                from time to time
                                                shall constitute the entire Agreement of Scheimpfug and the Customer
                                                with respect to
                                                the Property. Tis Agreement may not be modifed without a writing
                                                signed by both the
                                                Customer and an authorized representative of Scheimpfug. All
                                                obligations of the Customer
                                                hereunder shall survive expiration of the rental term set forth on
                                                any Equipment Delivery
                                                Receipt or any extension of the rental term set forth in the Sales
                                                Order. Any notice required
                                                or permitted to be sent under this Agreement shall be deemed sent
                                                (I) when delivered to
                                                the business ofce of the addressee by messenger or express mail
                                                delivery or (II) three (3)
                                                days after deposit in the US Mail with frst class postage prepaid to
                                                the address set forth
                                                on the most recent Equipment Delivery Receipt. Notwithstanding any
                                                prohibition on
                                                assignment, this Agreement shall be binding upon and inure to the
                                                beneft of the successors
                                                and assigns of the parties. Te person signing this Agreement on
                                                behalf of the Customer
                                                warrants that such individual has teen duly authorized to execute
                                                this Agreement and to
                                                bind the Customer to its terms. In the event any provision of this
                                                Agreement is held to be
                                                unenforceable, such provision shall be severed from this Agreement
                                                and the remainder shall
                                                be deemed fully enforceable. Te Customer hereby represents to the
                                                best of its knowledge,
                                                that all information provided is true and correct. By signing this
                                                Account Establishment
                                                Form and accepting delivery of equipment from Scheimpfug, the
                                                Customer agrees to be
                                                bound by all of the Rental Terms and Conditions in efect from time
                                                to time, as set forth
                                                in this document. Further, by signing the agreement on page 1 (one),
                                                the signatory hereby
                                                represents that they are an authorized agent of the Customer or are
                                                otherwise authorized to
                                                bind the Customer to this Agreement. <span
                                                    style="color: red;">END</span>
                                            </span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="terms-container-grid-innerdata_01_title">
                                <span class="terms-container-grid-innerdata_01_title_span">
                                    scheimpflüg
                                </span>
                                <p>
                                    Page 3/3
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Page 03 -->
                </div>
            </div>
        </div>
    <div class="all-canvas">

    </div>
    <input type="hidden" id="name-value" value="<?php echo $_POST['account_name']?>">
    <!-- <script src='assets/js/pdf-converssion.js'></script> -->
    <script>
        var windowHeight = window.innerHeight || document.documentElement.clientHeight || document.body.clientHeight;
        var windowWidth = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
        var element = document.getElementById("loader");
        element.style.width = windowWidth + "px";
        element.style.height = windowHeight + "px";
    </script>
    <script>
$(document).ready(function() {
    var pages = 3;
    async function genrate_canvas(_page,_canvasID) {
        await html2canvas(document.querySelector(_page)).then(canvas => {
            canvas.id = _canvasID
            $(".all-canvas").prepend(canvas);
//              downgradeCanvasDPI(canvas, 150);
        });
    }
    async function initial() {
        // return new Promise(function(resolve) {
            await genrate_canvas("#pdf-page-01","canvas-01");
            await genrate_canvas("#pdf-page-02","canvas-02");
            await genrate_canvas("#pdf-page-03","canvas-03");
            // resolve('Complete');
        // });
    }
    async function init() {
        console.log("sdfdsf")
        await initial();
        // console.log("Init PDF")
        convert_pdf();
    }
    init();
    function generateRandomCode(length) {
        var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        var randomCode = '';
        for (var i = 0; i < length; i++) {
            var randomIndex = Math.floor(Math.random() * characters.length);
            randomCode += characters.charAt(randomIndex);
        }
        return randomCode;
    }
    

    function convert_pdf() {
        console.log("dsdf")
        var page_1 = document.getElementById('canvas-01');
        var page_01_data = page_1.toDataURL();
        var page_2 = document.getElementById('canvas-02');
        var page_02_data = page_2.toDataURL();
        var page_3 = document.getElementById('canvas-03');
        var page_03_data = page_3.toDataURL();
        var user_full_name = $("#name-value").val();
        $.ajax({
            url: './send.php',
            type: 'POST',
            data: {
                page_01 : page_01_data,
                page_02 : page_02_data,
                page_03 : page_03_data,
                // file_name : _fn,
                full_name : user_full_name,
                files : "<?php echo implode(',',$files);?>",
                email : "<?php echo isset($_POST['pa_email']) ? $_POST['pa_email'] : '' ;?>"
            },
            success: function(response) {
                console.log(response);
                console.log('PDF file sent successfully!');
                $(".loading-text").html("Successfuly Submitted")
                setTimeout(function(){
                    $(".loader-inner").hide();
                    window.location.href = "https://www.scheimpflug.com/thank-you";
                }, 2000);
            },
            error: function() {
                console.log('Error sending PDF file.');
            }
        });
    }
});
    </script>

</body>

</html>