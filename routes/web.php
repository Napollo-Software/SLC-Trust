<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\claimsController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FollowupController;
use App\Http\Controllers\ForgotController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\PrintController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ArchiveController;
use App\Http\Controllers\AdjustmentController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\CreateChequeController;
use App\Http\Controllers\DropboxController;
use App\Http\Controllers\DeveloperController;
use App\Http\Controllers\EmergencyController;
use App\Http\Controllers\PayeeController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\MedicaidController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SMSController;
use App\Http\Controllers\TypesController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\ReferralController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\LeadReportController;
use App\Http\Controllers\ReleaseNotesController;
use App\Models\EmergencyContacts;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// app()->bind('Game',function(){
//     return "Football";
// });
// app()->bind("Football",function(){
//     return new Game();
// });
// dd(app()->make('Game'));

Route::group(['prefix' => 'artisan'], function () {
    Route::get('/clear', function () {
        Artisan::call('view:clear');
        Artisan::call('cache:clear');
        Artisan::call('route:clear');
        Artisan::call('config:clear');
        Artisan::call('config:cache');
        Artisan::call('view:cache');
        Artisan::call('route:cache');
        Artisan::call('storage:link');
        return 'Successfully Cleared !';
    });
});

Route::group(['prefix' => 'developer'], function () {
    Route::get('/welcome-email', [DeveloperController::class, 'welcomeEmail']);
    Route::get('/import-payee', [DeveloperController::class, 'ImportPayee']);
    Route::post('/save-imported-payee', [DeveloperController::class, 'saveImportedPayee']);
    Route::get('/create-bills', [DeveloperController::class, 'create_recurring_bills']);
    Route::get('/email-documents', [DeveloperController::class, 'EmailDoc']);
    Route::get('/create-documents', [DeveloperController::class, 'makeAcutualDocument']);
    Route::get('/set_recurring_day', [DeveloperController::class, 'set_recurring_day']);
});

Route::group(['prefix' => 'payees', 'middleware' => 'isLoggedIn'], function () {
    Route::get('/list', [PayeeController::class, 'index'])->name('payee.list');
    Route::post('/store-payee', [PayeeController::class, 'store'])->name('store.payee');
});

Route::group(['prefix' => 'roles', 'middleware' => 'isLoggedIn', 'Roles&Permissions'], function () {
    Route::get('/', [RoleController::class, 'index'])->name('roles.list');
    Route::get('/edit/{id}', [RoleController::class, 'edit'])->name('roles.edit');
    Route::post('/update', [RoleController::class, 'update'])->name('roles.update');
    Route::post('/delete-role', [RoleController::class, 'delete'])->name('delete.role');
    Route::get('/create', [RoleController::class, 'create'])->name('createView.role');
    Route::post('/create-role', [RoleController::class, 'createRole'])->name('roles.create');
});

Route::group(['prefix' => 'types', 'middleware' => ['isLoggedIn', 'permission:Manage Types']], function () {
    Route::get('/', [TypesController::class, 'index'])->name('types.list');
    Route::post('/add', [TypesController::class, 'store'])->name('store.type');
    Route::get('/edit/{id}', [TypesController::class, 'edit'])->name('show.type');
    Route::get('/view/{id}', [TypesController::class, 'view'])->name('view.type');
    Route::post('/delete/{id}', [TypesController::class, 'destroy'])->name('delete.type');
    Route::post('/update', [TypesController::class, 'update'])->name('update.type');
});

Route::group(['prefix' => 'vendors', 'middleware' => 'isLoggedIn'], function () {
    Route::get('/', [VendorController::class, 'index'])->name('vendors.list')->middleware('permission:View Account');
    Route::get('/add', [VendorController::class, 'create'])->name('add.vendors');
    Route::post('/add', [VendorController::class, 'store'])->name('store.vendors');
    Route::get('/view/{id}', [VendorController::class, 'view'])->name('view.vendors');
    Route::get('/edit/{id}', [VendorController::class, 'edit'])->name('edit.vendors');
    Route::post('/edit/{id}', [VendorController::class, 'update'])->name('update.vendors');
});

Route::group(['prefix' => 'contact', 'middleware' => ['isLoggedIn']], function () {
    Route::get('list', [ContactController::class, 'index'])->name('contact.list');
    Route::post('store', [ContactController::class, 'store'])->name('contact.store');
    Route::post('edit', [ContactController::class, 'edit'])->name('contact.edit');
    Route::post('update', [ContactController::class, 'update'])->name('contact.update');
    Route::post('delete', [ContactController::class, 'delete'])->name('contact.delete');
});

Route::group(['prefix' => 'follow-up', 'middleware' => ['isLoggedIn']], function () {
    Route::get('list', [FollowupController::class, 'index'])->name('follow_up.list');
    Route::post('store', [FollowupController::class, 'store'])->name('follow_up.store');
    Route::get('edit/{id}', [FollowupController::class, 'edit'])->name('follow_up.edit');
    Route::post('update', [FollowupController::class, 'update'])->name('follow_up.update');
    Route::post('delete/{id}', [FollowupController::class, 'delete'])->name('follow_up.delete');
});

Route::group(['prefix' => 'leads', 'middleware' => ['isLoggedIn']], function () {
    Route::get('/', [LeadController::class, 'index'])->name('lead.list');
    Route::get('/add_lead', [LeadController::class, 'create'])->name('add.lead');
    Route::post('/store', [LeadController::class, 'store'])->name('store.lead');
    Route::get('/edit/{id}', [LeadController::class, 'edit'])->name('edit.lead');
    Route::get('/view/{id}', [LeadController::class, 'view'])->name('view.lead');
    Route::post('/update/{id}', [LeadController::class, 'update'])->name('update.lead');
});

Route::group(['prefix' => 'referral', 'middleware' => ['isLoggedIn']], function () {
    Route::get('/', [ReferralController::class, 'index'])->name('referral.list');
    Route::get('/create', [ReferralController::class, 'create'])->name('create.referral');
    Route::post('/store', [ReferralController::class, 'store'])->name('store.referral');
    Route::get('/edit/{id}', [ReferralController::class, 'edit'])->name('edit.referral');
    Route::post('/editEmergency', [EmergencyController::class, 'emergencyEdit'])->name('edit.emergency');
    Route::post('/update', [ReferralController::class, 'update'])->name('update.referral');
    Route::post('/updateChecklist', [ReferralController::class, 'updateCheckList'])->name('update.checkList');
    Route::get('/view/{id}', [ReferralController::class, 'view'])->name('view.referral');
    Route::get('/delete/{id}', [ReferralController::class, 'delete'])->name('delete.referral');
    Route::get('emergency/{id}', [EmergencyController::class, 'index'])->name('emergency.referral');
    Route::post('/status/{id}', [ReferralController::class, 'status'])->name('update-status');
    Route::post('/email/{id}', [ReferralController::class, 'documentStatus'])->name('email');
    Route::post('/email-status/{id}', [ReferralController::class, 'emailStatus'])->name('email-status');
    Route::post('/referralDocument/{id}', [ReferralController::class, 'referralDocument'])->name('referralDocument');
    Route::post('/upload-document', [DocumentController::class, 'uploadDocument'])->name('upload.document');
    Route::post('/trust', [ReferralController::class, 'UserTrust'])->name('referral.trust');
    Route::get('/preview-document/{filename}', [DocumentController::class, 'previewDocument'])->name('preview.document');
    Route::post('/convert-to-customer', [ReferralController::class, 'convert_to_customer'])->name('convert.to.referral');
});

Route::group(['prefix' => 'medicaid', 'middleware' => ['isLoggedIn']], function () {
    Route::get('/', [MedicaidController::class, 'index'])->name('medicaid.list');
    Route::get('/create', [MedicaidController::class, 'create'])->name('create.medicaid');
    Route::post('/store', [MedicaidController::class, 'store'])->name('store.medicaid');
    Route::get('/edit/{id}', [MedicaidController::class, 'edit'])->name('edit.medicaid');
    Route::post('/update', [MedicaidController::class, 'update'])->name('update.medicaid');
    Route::get('/view/{id}', [MedicaidController::class, 'view'])->name('view.medicaid');
    Route::get('emergency/{id}', [EmergencyController::class, 'index'])->name('emergency.medicaid');
});

Route::group(['prefix' => 'document', 'middleware' => ['isLoggedIn']], function () {
    Route::get('/', [DocumentController::class, 'index'])->name('document.list');
    Route::get('/view', [DocumentController::class, 'generatePDF'])->name('document.genratePdf');
    Route::get('/share', [DocumentController::class, 'generatePDF'])->name('document.sahre');
    Route::post('/upload-docs', [DocumentController::class, 'uploadDocs'])->name('upload.docs');
    Route::get('/documnt-view', [DocumentController::class, 'index'])->name('document.view');
    Route::get('/delete/{id}', [DocumentController::class, 'deleteDoc'])->name('delete-doc');
    Route::post('/update/{id}', [DocumentController::class, 'updateDoc'])->name('update-doc');
    Route::post('/send-selected-email', [DocumentController::class, 'sendSelectedEmail'])->name('document.sendSelectedEmail');
    Route::post('/send-referral-email', [DocumentController::class, 'sendReferralEmail'])->name('document.referralEmail');
});

Route::group(['prefix' => 'leadreport', 'middleware' => ['isLoggedIn']], function () {
    Route::get('/', [LeadReportController::class, 'index'])->name('leadreport.list');
    Route::get('/add_report', [LeadReportController::class, 'create'])->name('add.report');
    Route::get('/get-data', [LeadReportController::class, 'getData'])->name('get.data');

});

Route::group(['prefix' => 'reports', 'middleware' => ['isLoggedIn']], function () {
    Route::get('/', [ReportController::class, 'index'])->name('reports.index');
    Route::match(['get', 'post'], '/add-report', [ReportController::class, 'add_report'])->name('reports.add_report');
    Route::get('/upload-file', [ReportController::class, 'upload_file'])->name('reports.upload_file');
    Route::post('/reports/duplicate/{report}', [ReportController::class, 'duplicate'])->name('reports.duplicate');
    Route::get('/get-reports', [ReportController::class, 'getAllReports'])->name('reports.getReports');
    Route::post('/save-report', [ReportController::class, 'saveReport'])->name('reports.save');
    Route::post('/update-report', [ReportController::class, 'updateReport'])->name('reports.update');
    Route::get('/view/{id}', [ReportController::class, 'view'])->name('view.report');

});

Route::group(['prefix' => 'sms', 'middleware' => ['isLoggedIn']], function () {
    Route::get('/', [SMSController::class, 'index'])->name('sms.index');
    Route::post('/send', [SMSController::class, 'sendMessage'])->name('sms.send');
    Route::post('/details', [SMSController::class, 'details'])->name('sms.details');
});
Route::group(['prefix' => 'preview', 'middleware' => ['isLoggedIn']], function () {
    // Route::get('/deposit', [ AuthController::class, 'deposit_preview'])->name('preview.deposit');
});

Route::group(['prefix' => 'release', 'middleware' => ['isLoggedIn']], function () {
    Route::get('/notes', [ReleaseNotesController::class, 'index'])->name('release.notes');
    Route::post('/store', [ReleaseNotesController::class, 'store'])->name('add.release.note');
});

Route::get('/calendar', [CalendarController::class, 'index']);

Route::get('/submit-forms', [CreateChequeController::class, 'submitForms'])->name('submit.forms');

Route::post('/update-physician', [MedicaidController::class, 'updatePhysician'])->name('update-physician');
Route::post('/update-medicaid', [MedicaidController::class, 'updateMedicaid'])->name('update-medicaid');
Route::get('/get-table-columns', [ReportController::class, 'getTableColumns'])->name('get-table-columns');
Route::match(['get', 'post'], '/get-submited-columns', [ReportController::class, 'submitSelectedColumns'])->name('get.submited.columns');


Route::get('/approval', [DocumentController::class, 'approval'])->name('approval.letter');
Route::get('/trusted', [DocumentController::class, 'trusted'])->name('trusted.surplus');

Route::get('/save-signature', [DocumentController::class, 'generateSignature'])->name('save.signature');
Route::get('/hippa_state', [DocumentController::class, 'hippaState'])->name('hippa_state.signature');
Route::get('/hippa', [DocumentController::class, 'hippa'])->name('hippa.signature');
Route::get('/map', [DocumentController::class, 'map'])->name('map.signature');
Route::get('/joinder', [DocumentController::class, 'joinder'])->name('joinder.signature');
Route::get('/doh', [DocumentController::class, 'doh'])->name('doh.signature');
Route::get('/disability', [DocumentController::class, 'disability'])->name('disability.signature');
Route::post('signature/upload', [DocumentController::class, 'generateSignature'])->name('signaturepad.upload');
Route::post('/save-joinder', [DocumentController::class, 'saveJoinder'])->name('save.joinder');
Route::post('/save-hippa', [DocumentController::class, 'saveHippa'])->name('save.hippa');
Route::post('/save-hippa-state', [DocumentController::class, 'saveHippaState'])->name('save.hippaState');
Route::post('/save-map', [DocumentController::class, 'saveMap'])->name('save.map');
Route::post('/save-doh', [DocumentController::class, 'saveDoh'])->name('save.doh');
Route::post('/save-disability', [DocumentController::class, 'saveDisability'])->name('save.disability');

Route::post('/upload-multiple-documents', [DocumentController::class, 'uploadMultipleDocuments'])->name('upload.multiple.documents');


Route::post('/submit-balance', [ReportController::class, 'storeClosingBalance'])->name('save.balance');

Route::post('/login-user', [AuthController::class, 'loginUser'])->name('login-user')->middleware('UserVerificationAuthC');

Route::get('/', [AuthController::class, 'login'])->middleware('loggedInuser')->name('login');

Route::get('/registration', [AuthController::class, 'registration'])->middleware('loggedInuser');

Route::post('/register-user', [AuthController::class, 'registerUser'])->name('register-user');

Route::get('/view_user/{id}', [AuthController::class, 'view_user'])->name('view_user')->middleware(['isLoggedIn', 'permission:Deposit']);

Route::get('/show_user/{id}', [AuthController::class, 'show_user'])->name('show_user')->middleware(['isLoggedIn',]);

Route::get('/edit_user/{id}', [AuthController::class, 'edit_user_details'])->name('edit_user')->middleware(['isLoggedIn',]);

Route::get('/add_user_balance/{id}', [AuthController::class, 'add_user_balance'])->name('add_user_balance')->middleware('isLoggedIn');

Route::post('/update_existing_user/{id}', [AuthController::class, 'update_existing_user'])->name('update_existing_user')->middleware('isLoggedIn');

Route::post('/user_bills', [AuthController::class, 'user_bills'])->name('user_bills')->middleware('isLoggedIn');

Route::post('/update_existing_user_profile/{id}', [AuthController::class, 'update_existing_user_profile'])->name('update_existing_user_profile')->middleware('isLoggedIn');

Route::get('/add_user', [AuthController::class, 'add_user'])->name('add_user')->middleware('isLoggedIn', 'permission:Add User');

Route::post('store_user', [AuthController::class, 'registerUser'])->name('store_user')->middleware('isLoggedIn');

Route::get('/logs', [LogController::class, 'index'])->name('logs')->middleware('isLoggedIn');

Route::get('state-fetch-city/{state}', [AuthController::class, 'state_fetch_city'])->name('state.fetch.city');


Route::get('/dashboard', [AuthController::class, 'dashboard'])->middleware('isLoggedIn', )->name('dashboard');

Route::get('/vendor-dashboard', [AuthController::class, 'vendor_dashboard'])->middleware('isLoggedIn', )->name('vendor.dashboard');

Route::get('/all-customers', [VendorController::class, 'all_customers'])->middleware('isLoggedIn', )->name('vendor.all_customers');

Route::get('/signature', [DocumentController::class, 'signature'])->name('document.signature');

Route::get('/nav', [AuthController::class, 'nav'])->middleware('isLoggedIn');

Route::get('/logout', [AuthController::class, 'logout']);

Route::get('/transactions', [AuthController::class, 'transactions'])->middleware('isLoggedIn');

Route::get('/search-bill', [AuthController::class, 'search_claim'])->name('claim.search');

Route::get('/user-search-bill', [AuthController::class, 'search_user_claim'])->name('claim.search.user');

Route::Resource('claims', '\App\Http\Controllers\claimsController')->middleware('isLoggedIn');

Route::get('claim/preview-file', [claimsController::class, 'preview_file'])->name('claim.preview');

Route::post('duplicate-bill', [claimsController::class, 'duplicate_bill'])->name('duplicate.bill');

Route::Post('delete/bill', [claimsController::class, 'destroy'])->name('delete.bill');

Route::Post('restore/bill', [claimsController::class, 'RestoreBill'])->name('restore.bill');

Route::post('search-bills', [claimsController::class, 'index']);

Route::get('edit-bill/{id}', [claimsController::class, 'edit_bill'])->name('edit_bill');

Route::get('edit-recurring-bill/{id}', [claimsController::class, 'edit_recurring_bill']);

Route::post('store-edited-regurring-bill', [claimsController::class, 'store_edited_recurring_bill'])->name('store_edited_recurring_bill');

Route::post('store-edit-bill', [claimsController::class, 'store_edit_bill'])->name('store.edit.bill');

Route::post('/claims-store', [claimsController::class, 'update'])->name('store.claim');

Route::get('claim/recurring', [claimsController::class, 'RecurringBills'])->name('recurring.bills');

Route::get('trace/recurring', [claimsController::class, 'trace_recurring'])->name('trace.recurring');

Route::get('/log-list', [LogController::class, 'index'])->middleware('isLoggedIn')->name('log.list');

Route::post('claim/remove-from-recurring', [claimsController::class, 'RemoveFromRecurring']);

Route::Resource('category', '\App\Http\Controllers\categoryController')->middleware('isLoggedIn', 'permission:Manage Categories');

Route::post('delete-category', [App\Http\Controllers\categoryController::class, 'delete'])->name('delete.category');

Route::get('/manage_categories', [AuthController::class, 'manage_categories'])->middleware('isLoggedIn');

Route::get('/all_users', [AuthController::class, 'all_users'])->middleware('isLoggedIn', 'CheckUserRole', 'permission:View Users')->name('users.all');

Route::get('/recycle-bin/bills', [claimsController::class, 'deletedbills'])->middleware('isLoggedIn', 'CheckUserRole', 'permission:Recycle')->name('recycle.bills');

//Route::get('/add_user', [AuthController::class, 'add_user'])->middleware('isLoggedIn');

Route::get('/manage_roles', [AuthController::class, 'manage_roles'])->middleware('isLoggedIn');

Route::get('/profile_setting', [AuthController::class, 'profile_setting'])->middleware('isLoggedIn', 'permission:Profile Setting')->name('profile.setting');

Route::match(['GET', 'POST'], '/main', [AuthController::class, 'bill_reports'])->name('bill_reports')->middleware('isLoggedIn', );

Route::get('/notifications', [AuthController::class, 'notifications'])->name('notifications')->middleware('isLoggedIn', 'permission:Notification View');

Route::get('adjustments/index', [AdjustmentController::class, 'index'])->name('adjustment')->middleware('permission:Adjustments');

Route::post('adjustments/save', [AdjustmentController::class, 'store'])->name('adjustment.store')->middleware('permission:Adjustments');

Route::post('/read-notificaion', [AuthController::class, 'read_all_notificaion'])->name('read.all.notificaion');
//forgot password
Route::get('user/sendemail', [ForgotController::class, 'sendEmail'])->name('user.sendmail');
Route::post('/send/mail', [ForgotController::class, 'usersendemail'])->name('send.mail.user');
Route::get('/reset/password/{token}', [ForgotController::class, 'forgotview'])->name('user.forgot-password');
Route::post('user/changepassword', [ForgotController::class, 'changepassworduser'])->name('password.reset.user');
//print page
Route::get('/prnpriview', [PrintController::class, 'prnpriview'])->name('printpage');
//Excel Sheet
Route::post('import', [claimsController::class, 'import'])->name('import.user');
Route::post('deposit', [claimsController::class, 'customerdeposit'])->name('customer.deposit');

Route::match(['GET', 'POST'], '/archive', [ArchiveController::class, 'archive'])->name('archive');
Route::post('import-archive', [ArchiveController::class, 'import_archive'])->name('import.archive');
Route::get('archived-bill', [ArchiveController::class, 'archived_bills'])->name('archived.bills');
//////////////////////Reports///////////////////
Route::get('/transaction-report/{type?}', [ReportController::class, 'transaction'])->name('transaction.report');
Route::get('/reconciliation-report/{type?}', [ReportController::class, 'bank_reconciliation'])->name('reconciliation.report');
Route::get('/cheque', [ReportController::class, 'cheque'])->name('cheque');
Route::get('/export-cheque', [ReportController::class, 'exportCheque'])->name('export.cheque');
Route::post('/filter-user', [ReportController::class, 'filter_user'])->name('customer.filter');
Route::post('/print/transactions', [PrintController::class, 'transactionsprint'])->name('transection.export');
Route::post('/export/transactions', [PrintController::class, 'transactionsexport'])->name('transection.excel.export');
Route::get('/monthly-statement', [ReportController::class, 'monthly_statement'])->name('monthly.statement');
Route::post('/filter-transaction', [ReportController::class, 'monthly_filter'])->name('monthly.filter');
Route::post('/export/monthly', [PrintController::class, 'transactions_monthly_export'])->name('transection.monthly.export');
Route::post('/print/transactions/pdf', [PrintController::class, 'transactionsprintpdf'])->name('transection.monthly.pdf');
Route::get('/monthly-mass-statement/{user_id?}', [ReportController::class, 'monthly_mass_statement'])->name('monthly.mass.statement');
Route::get('/bank-reconciliation', [ReportController::class, 'bank_reconciliation'])->name('bank.reconciliation');
Route::get('/filter-bank-reconciliation', [ReportController::class, 'filter_bank_reconciliation'])->name('bank.reconciliation.filter');
Route::post('/export/bank-reconcilation', [PrintController::class, 'transactions_reconciliation_export'])->name('bank.reconciliation.export');
Route::post('/print/bank-reconciliation/pdf', [PrintController::class, 'reconciliationprintpdf'])->name('bank.reconciliation.pdf');
Route::get('/export/user', [PrintController::class, 'export_user'])->name('export.user.file');
Route::get('/drop-box', [DropboxController::class, 'index'])->name('dropbox');
Route::post('/upload-bills', [DropboxController::class, 'uploadBills'])->name('upload.bills');

Route::get('export-pending-bills', [PrintController::class, 'export_pending_bills'])->name('export.pending.bills');
Route::post('update-bill-status', [claimsController::class, 'update_bills_status'])->name('update.bills.status');
Route::get('pdfview', [PrintController::class, 'pdfview'])->name('pdfdownload');
Route::get('export', [PrintController::class, 'export'])->name('export');
Route::get('exportcsv', [PrintController::class, 'exportcsv'])->name('csv');
Route::get('/printuser', [PrintController::class, 'printuser'])->name('printuserpage');
Route::get('pdfuserview', [PrintController::class, 'pdfuserview'])->name('pdfuserdownload');
Route::get('exportuser', [PrintController::class, 'exportuser'])->name('exportuser');
Route::get('exportcsvuser', [PrintController::class, 'exportcsvuser'])->name('csvuser');
Route::get('notifcation/view', [PrintController::class, 'changestatus'])->name('notifcation.change.status');
Route::post('/search', [PrintController::class, 'search'])->name('user.search');
Route::get('/userprint/{id}', [PrintController::class, 'printedit'])->name('print.edit');
Route::get('/claimprint/{id}', [PrintController::class, 'claimprint'])->name('bill.edit.print');
Route::get('/claimviewprint/{id}', [PrintController::class, 'claimviewprint'])->name('claim.view.print');
Route::get('/deletedbill', [PrintController::class, 'alluserprint'])->name('alluser.print');
Route::get('/check', [PrintController::class, 'ckeckcron'])->name('checkcronjob');
Route::get('/search-bill-record', [AuthController::class, 'search_claim_data'])->name('claim.search.data');
Route::get('/setpassword/{token}', [ForgotController::class, 'setPassword'])->name('user.setpassword');
Route::get('deletebillpdf', [PrintController::class, 'deletepdfbill'])->name('deletepdfbill');
Route::get('deletebillexport', [PrintController::class, 'deletebillexport'])->name('deletebillexport');
Route::get('deleteebillcsv', [PrintController::class, 'deletebillcsv'])->name('deletebillcsv');
Route::get('userexport', [PrintController::class, 'userexport'])->name('userexport');
Route::get('userexportcsv', [PrintController::class, 'userexportcsv'])->name('usercsv');
Route::get('/search-transaction', [AuthController::class, 'search_transaction_data'])->name('transaction.data');
Route::get('/print/transaction', [PrintController::class, 'transactionprint'])->name('transactionprintuserpage');

Route::get('pdf/transaction', [PrintController::class, 'pdftransaction'])->name('pdf.transaction.download');
Route::get('exporttrasaction', [PrintController::class, 'exporttrasaction'])->name('exporttrasaction');
Route::get('csvtransaction', [PrintController::class, 'csvtransaction'])->name('csvtransaction');
Route::get('export/trasaction', [PrintController::class, 'exportusertransaction'])->name('exportusertransaction');
Route::get('csv/transaction', [PrintController::class, 'csvusertransaction'])->name('csvusertransaction');
Route::get('/search-user-transaction', [AuthController::class, 'search_transaction_user_data'])->name('transaction.user.data');

/////////Repoerts Section//////////
Route::get('/report', [ReportController::class, 'reports_list'])->name('report.list');
Route::get('/report/new', [ReportController::class, 'create_new_report'])->name('report.new');
Route::post('/report/save-fields', [ReportController::class, 'save_fields'])->name('report.save.fields');
