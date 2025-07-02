<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LogController;
use App\Http\Controllers\SMSController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PayeeController;
use App\Http\Controllers\PrintController;
use App\Http\Controllers\TypesController;
use App\Http\Controllers\claimsController;
use App\Http\Controllers\ForgotController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\ArchiveController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DropboxController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\FollowupController;
use App\Http\Controllers\MedicaidController;
use App\Http\Controllers\ReferralController;
use App\Http\Controllers\DeveloperController;
use App\Http\Controllers\EmergencyController;
use App\Http\Controllers\AdjustmentController;
use App\Http\Controllers\LeadReportController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\CreateCheckController;
use App\Http\Controllers\ReleaseNotesController;

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


Route::get('/logout', [AuthController::class, 'logout']);

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
    Route::post('store', [FollowupController::class, 'store'])->name('follow_up.store');
    Route::get('edit/{id}', [FollowupController::class, 'edit'])->name('follow_up.edit');
    Route::post('update', [FollowupController::class, 'update'])->name('follow_up.update');
    Route::post('delete/{id}', [FollowupController::class, 'delete'])->name('follow_up.delete');
    Route::post('/toggle-completed', [FollowupController::class, 'toggleCompleted'])->name('followup.toggleCompleted');
    Route::get('list', [FollowupController::class, 'index'])->name('follow_up.index');
});

Route::group(['prefix' => 'notes', 'middleware' => ['isLoggedIn']], function () {
    Route::get('list', [FollowupController::class, 'index'])->name('follow_up.list');
});

Route::post('note', [FollowupController::class, 'noteStore'])->name('note.store');

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
    Route::get('/create/{lead_id?}', [ReferralController::class, 'create'])->name('create.referral');
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

Route::get('/submit-forms', [CreateCheckController::class, 'submitForms'])->name('submit.forms');

Route::post('/update-physician', [MedicaidController::class, 'updatePhysician'])->name('update-physician');
Route::post('/update-medicaid', [MedicaidController::class, 'updateMedicaid'])->name('update-medicaid');
Route::post('/update-bank-info', [MedicaidController::class, 'updateBankInfo'])->name('update-bank-info');
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
Route::get('/client_acknowledgement', [DocumentController::class, 'clientAcknowledgement'])->name('client_acknowledgement.signature');
Route::post('signature/upload', [DocumentController::class, 'generateSignature'])->name('signaturepad.upload');
Route::post('/save-joinder', [DocumentController::class, 'saveJoinder'])->name('save.joinder');
Route::post('/save-hippa', [DocumentController::class, 'saveHippa'])->name('save.hippa');
Route::post('/save-hippa-state', [DocumentController::class, 'saveHippaState'])->name('save.hippaState');
Route::post('/save-map', [DocumentController::class, 'saveMap'])->name('save.map');
Route::post('/save-doh', [DocumentController::class, 'saveDoh'])->name('save.doh');
Route::post('/save-disability', [DocumentController::class, 'saveDisability'])->name('save.disability');
Route::post('/save-client-acknowledgement', [DocumentController::class, 'saveClientAcknowledgement'])->name('save.client_acknowledgement');

Route::post('/upload-multiple-documents', [DocumentController::class, 'uploadMultipleDocuments'])->name('upload.multiple.documents');


Route::post('/submit-balance', [ReportController::class, 'storeClosingBalance'])->name('save.balance');

Route::post('/login-user', [AuthController::class, 'loginUser'])->name('login-user')->middleware('UserVerificationAuthC');

Route::get('/', [AuthController::class, 'login'])->middleware('loggedInuser')->name('login');

Route::get('/registration', [AuthController::class, 'registration'])->middleware('loggedInuser');

Route::post('/register-user', [AuthController::class, 'registerUser'])->name('register-user');

Route::get('/view_user/{id}', [AuthController::class, 'view_user'])->name('view_user')->middleware(['isLoggedIn', 'permission:Deposit']);

Route::get('/show_user/{id}', [AuthController::class, 'show_user'])->name('show_user')->middleware(['isLoggedIn',]);

Route::get('/edit_user/{id}', [AuthController::class, 'edit_user_details'])->name('edit_user')->middleware(['isLoggedIn',]);

Route::post('/add_user_balance/{id}', [AuthController::class, 'add_user_balance'])->name('add_user_balance')->middleware('isLoggedIn');

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

Route::get('/approval-letter/{id}', [AuthController::class, 'approvalLetter'])->name('approval-letter');

Route::get('/manage_roles', [AuthController::class, 'manage_roles'])->middleware('isLoggedIn');

Route::get('/profile_setting', [AuthController::class, 'profile_setting'])->middleware('isLoggedIn', 'permission:Profile Setting')->name('profile.setting');

Route::match(['GET', 'POST'], '/main', [AuthController::class, 'bill_reports'])->name('bill_reports')->middleware('isLoggedIn', );

Route::match(['GET', 'POST'], '/filter-transactions/{module}', [TransactionController::class, 'filterTransactions'])->name('filter.transactions')->middleware('isLoggedIn', );

Route::get('/notifications/{id?}', [AuthController::class, 'notifications'])->name('notifications')->middleware('isLoggedIn', 'permission:Notification View');

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
Route::get('/checks', [ReportController::class, 'check'])->name('checks');
Route::get('/export-check', [ReportController::class, 'exportCheck'])->name('export.check');
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
Route::post('/get-filter-vod-report', [AuthController::class, 'getFilterVodReport']);

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
Route::get('zip-details', [ReferralController::class, 'getZipDetails']);

Route::get('join',function(){
    $data = [
        "_token" => "aVWe9Ni73mJYyebwZyz0gv8Qf5L6BnAIXGef8kqm",
        "referral_id" => "1",
        "document_id" => "63",
        "sponsor_first_name" => "Moana",
        "sponsor_middle_name" => "Vanna Hardin",
        "sponsor_last_name" => "Benjamin",
        "sponsor_marital_status1" => "Married",
        "sponsor_gender" => "Qui nulla beatae nec",
        "sponsor_ssn" => "mailto:kureju@mailinator.com",
        "sponsor_dob" => "2020-11-23",
        "sponsor_citizen" => "Test Tes",
        "sponsor_tel_home" => "+1 (379) 997-7616",
        "sponsor_tel_cell" => "+1 (822) 625-7372",
        "prefered_cell" => "Phone",
        "beneficiary_email" => "mailto:nikawe@mailinator.com",
        "sponsor_address" => "Quod quo incididunt",
        "sponsor_apt" => "Proident pariatur",
        "sponsor_city" => "Minima eos dolorum a",
        "sponsor_state" => "Corrupti quisquam e",
        "sponsor_zip" => "54963",
        "d1" => "Amet non tempore a",
        "d2" => "Eiusmod occaecat rer",
        "d3" => "Quo nulla duis conse",
        "auth_beneficiary" => "Beneficiary",
        "auth_rep_one_fname" => "Tatiana Stafford",
        "auth_rep_one_lname" => "Mufutau Conway",
        "auth_rep_one_tel" => "Ut odit molestias mo",
        "auth_rep_one_cell" => "Autem culpa ab et ul",
        "authorized_preferred_cell_form_inp" => "Authorized_1_home",
        "auth_rep_one_email" => "mailto:pixydyvate@mailinator.com",
        "auth_rep_one_relation_beneficiary" => "Expedita et temporib",
        "auth_rep_one_address" => "Distinctio Nam itaq",
        "auth_rep_one_apt" => "Tenetur voluptas ea",
        "auth_rep_one_city" => "Minim delectus aspe",
        "auth_rep_one_state" => "Corporis nostrud inc",
        "auth_rep_one_zip" => "62763",
        "auth_rep_two_fname" => "Suki Haley",
        "auth_rep_two_lname" => "Amanda Baxter",
        "auth_rep_two_tel" => "Et ab repellendus Q",
        "auth_rep_two_cell" => "Cum unde ad non quam",
        "authorized_preferred_cell2" => "Home",
        "auth_rep_two_email" => "mailto:jejuzu@mailinator.com",
        "auth_rep_two_relation_beneficiary" => "Et magna vel culpa",
        "auth_rep_two_address" => "Eaque voluptatem Te",
        "auth_rep_two_apt" => "Aut ratione hic nesc",
        "auth_rep_two_city" => "Veniam explicabo H",
        "auth_rep_two_state" => "Repellendus Neque q",
        "auth_rep_two_zip" => "43051",
        "referring_agency" => "mailto:jyzubemo@mailinator.com",
        "referring_contract" => "mailto:qidajadan@mailinator.com",
        "referring_tel" => "mailto:beteqevi@mailinator.com",
        "referring_email" => "mailto:ranit@mailinator.com",
        "referring_address" => "mailto:sycemej@mailinator.com",
        "referring_apt" => "mailto:lohyvam@mailinator.com",
        "referring_city" => "Sit autem eligendi",
        "referring_state" => "A quaerat exercitati",
        "referring_zip" => "50930",
        "referring_auth1" => "No",
        "account_establishing_reason1" => "Shelter Excess Resources",
        "beneficiary_receive_medicaid_applicant1" => "No",
        "beneficiary_receive_medicaid_spouse1" => "Pending",
        "applicant_medicaid_cin_number" => "mailto:tarinare@mailinator.com",
        "spouse_medicaid_cin_number" => "mailto:numeg@mailinator.com",
        "medicaid_applicant_monthly_spend_down" => "mailto:relel@mailinator.com",
        "medicaid_spouse_monthly_spend_down" => "mailto:wocuxady@mailinator.com",
        "beneficiary_benefits" => "Dignissimos lorem it",
        "spouse_decreased1" => "Yes",
        "applying_together1" => "Yes",
        "spouse_fname" => "Florence Pacheco",
        "spouse_lname" => "Joel Shannon",
        "spouse_applied_for_medicaid_with_beneficiary1" => "Yes",
        "applicant_ssi" => "mailto:duzo@mailinator.com",
        "spouse_ssi" => "mailto:nafajil@mailinator.com",
        "applicant_ssdi" => "mailto:gitap@mailinator.com",
        "spouse_ssdi" => "mailto:kyzykyrok@mailinator.com",
        "applicant_ssa" => "mailto:henukuwo@mailinator.com",
        "spouse_ssa" => "mailto:gukonyqemy@mailinator.com",
        "applicant_va_ben" => "mailto:zici@mailinator.com",
        "spouse_va_ben" => "mailto:dokipaf@mailinator.com",
        "applicant_employee_ben" => "mailto:dorirytaza@mailinator.com",
        "spouse_employee_ben" => "mailto:fecegu@mailinator.com",
        "applicant_survivor_ben" => "mailto:mynudofar@mailinator.com",
        "spouse_survivor_ben" => "mailto:kipiwecyf@mailinator.com",
        "applicant_ira_dist" => "mailto:qyjuros@mailinator.com",
        "spouse_ira_dist" => "mailto:piwupori@mailinator.com",
        "applicant_pension_annuities" => "mailto:gypuma@mailinator.com",
        "spouse_pension_annuities" => "mailto:miwubi@mailinator.com",
        "applicant_interest_dividends" => "mailto:xukota@mailinator.com",
        "spouse_interest_dividends" => "mailto:vyqalab@mailinator.com",
        "applicant_reparations" => "mailto:jofy@mailinator.com",
        "spouse_reparations" => "mailto:sixymak@mailinator.com",
        "applicant_other" => "mailto:liqigibisa@mailinator.com",
        "spouse_other" => "mailto:wysa@mailinator.com",
        "healthcare_b" => "B",
        "supplemental_yes" => "Yes",
        "healthcare_partb_premium" => "Esse dolor facilis",
        "healthcare_partb_plan" => "Enim fugit et eius",
        "funeral_information_body_yes" => "Yes",
        "life_insurance_information_body_yes" => "No",
        "insured_name" => "Fritz Parker",
        "insured_owner" => "Ut ut qui consectetu",
        "insurance_company" => "Gay Pitts Co",
        "insurance_policy_number" => "913",
        "healthcare_plan" => "Exercitationem conse",
        "type_of_policy1" => "Life",
        "healthcare_plan2" => "Velit quia laborum",
        "cash_surrender_value" => "Nulla dolore incidun",
        "living_arrangement1" => "Assisted Living facility",
        "living_arrangement_other" => "Lorem non iusto offi",
        "living_arrangements_yes" => "No",
        "living_arrangements_person" => "Both",
        "living_arrangement_first" => "mailto:qoju@mailinator.com",
        "living_arrangement_last" => "mailto:jajabog@mailinator.com",
        "living_arrangement_primary" => "mailto:mixedowuki@mailinator.com",
        "living_arrangement_email" => "mailto:godewel@mailinator.com",
        "power_fname" => "mailto:cixu@mailinator.com",
        "power_lname" => "mailto:supok@mailinator.com",
        "power_tel_home" => "mailto:lydoxufibo@mailinator.com",
        "power_email" => "mailto:qejujy@mailinator.com",
        "power_address" => "mailto:sehinyzi@mailinator.com",
        "power_apt" => "mailto:huwajywi@mailinator.com",
        "power_city" => "mailto:sibysoga@mailinator.com",
        "power_state" => "mailto:fasaryqogu@mailinator.com",
        "power_zip" => "mailto:bufute@mailinator.com",
        "sole_poa1" => "No",
        "act_seprately1" => "No",
        "power_fname2" => "mailto:magerapacu@mailinator.com",
        "power_lname2" => "mailto:miwovabame@mailinator.com",
        "power_tel_home2" => "mailto:xyte@mailinator.com",
        "power_email2" => "mailto:faxe@mailinator.com",
        "power_address2" => "mailto:jovi@mailinator.com",
        "power_apt2" => "mailto:vumesavoba@mailinator.com",
        "power_city2" => "mailto:racodatare@mailinator.com",
        "power_state2" => "mailto:gowuxexeze@mailinator.com",
        "power_zip2" => "mailto:lagaz@mailinator.com",
        "power_of_attorney2_yes" => "No",
        "power_of_attorney2_authorized_yes" => "Yes",
        "guardian_information_yes" => "Yes",
        "guardian_appointed_for1" => "Person",
        "guardianship_fname" => "mailto:toguqo@mailinator.com",
        "guardianship_lname" => "mailto:suwacix@mailinator.com",
        "guardianship_telephone" => "mailto:jokyvyr@mailinator.com",
        "guardianship_email" => "mailto:bujicac@mailinator.com",
        "beneficiary_service_one" => "mailto:zosazoli@mailinator.com",
        "beneficiary_service_two" => "mailto:kykudupe@mailinator.com",
        "beneficiary_service_three" => "mailto:gujoqyz@mailinator.com",
        "beneficiary_provider_one" => "mailto:zijeqacuwy@mailinator.com",
        "beneficiary_provider_two" => "mailto:pokitysyro@mailinator.com",
        "beneficiary_provider_three" => "mailto:joby@mailinator.com",
        "agreement_signature_beneficiary" => "Beneficiary",
        "joinder_signature_1" => "mailto:e:\project\slc-trust\storage\app/public/codewithan@gmail.com/joinder_signature_120240923_141513.png",
        "joinder_print" => "mailto:zugi@mailinator.com",
        "joinder_date" => "2002-07-15",
        "notary_state_of_ny" => "mailto:pemevaxu@mailinator.com",
        "notary_county_of" => "mailto:ryfy@mailinator.com",
        "notary_on_date" => "mailto:kuze@mailinator.com",
        "notary_year" => "mailto:syzexyc@mailinator.com",
        "notary_appeared" => "mailto:dofyxe@mailinator.com",
        "notary_public" => "mailto:tatylet@mailinator.com",
        "notary_witness_one_name" => "mailto:cajosec@mailinator.com",
        "sig_date1" => "mailto:rygese@mailinator.com",
        "joinder_signature_2" => "mailto:e:\project\slc-trust\storage\app/public/codewithan@gmail.com/joinder_signature_220240923_141513.png",
        "notary_witness_one_full_name" => "mailto:badozefexi@mailinator.com",
        "notary_witness_one_full_address" => "mailto:feqef@mailinator.com",
        "notary_witness_two_name" => "mailto:byhu@mailinator.com",
        "sig_date2" => "mailto:dodudobaji@mailinator.com",
        "joinder_signature_3" => "mailto:e:\project\slc-trust\storage\app/public/codewithan@gmail.com/joinder_signature_320240923_141513.png",
        "notary_witness_two_full_name" => "mailto:wejes@mailinator.com",
        "notary_witness_two_full_address" => "mailto:fodivoma@mailinator.com",
        "joinder_signature_4" => "mailto:e:\project\slc-trust\storage\app/public/codewithan@gmail.com/joinder_signature_420240923_141513.png",
        "office_use_date_approved" => "1988-05-03",
        "office_use_member_id_above" => "mailto:hafufe@mailinator.com",
        "office_use_effective_date" => "mailto:zonuzabojy@mailinator.com",
        "direct_debit_donor_beneficiary" => "mailto:cisyzovi@mailinator.com",
        "direct_debit_representative" => "mailto:sonizib@mailinator.com",
        "direct_debit_bank_name" => "mailto:damyquxihy@mailinator.com",
        "direct_debit_city" => "mailto:vyfovybac@mailinator.com",
        "direct_debit_state" => "mailto:wokonehe@mailinator.com",
        "direct_debit_bank_routing" => "mailto:xucocipuqo@mailinator.com",
        "direct_debit_account_number" => "mailto:juwede@mailinator.com",
        "direct_debit_account_name" => "mailto:tufejiluty@mailinator.com",
        "direct_debit_bank_type1" => "Savings",
        "joinder_signature_5" => "mailto:e:\project\slc-trust\storage\app/public/codewithan@gmail.com/joinder_signature_520240923_141513.png",
        "office_use_account_number" => "959",
        "office_use_member_id_below" => "Sunt velit accusamus",
        "office_use_processed_by" => "Ex exercitationem an",
        "office_use_monthly_debit_amount" => "12",
        "office_use_monthly_debit_date" => "12",
        "office_use_monthly_debit_first_month" => "4",
    ];
    return view('document/joinder-pdf', $data);
});
Route::get('disable',function(){
    $data = [
        "sponsor_first_name" => "Moana",
        "sponsor_middle_name" => "Vanna Hardin",
        "sponsor_last_name" => "Benjamin",
        "sponsor_marital_status1" => "Married",
        "sponsor_gender" => "Qui nulla beatae nec",
        "sponsor_ssn" => "mailto:kureju@mailinator.com",
        "sponsor_dob" => "2020-11-23",
        "sponsor_citizen" => "Test Tes",
        "sponsor_tel_home" => "+1 (379) 997-7616",
        "sponsor_tel_cell" => "+1 (822) 625-7372",
        "_token" => "hfs9oXWPOY55oVDXn01L2U06Q5mdTb0M0QJ7tkKj",
        "referral_id" => "1",
        "document_id" => "67",
        "first_name" => "Imogene",
        "middle_name" => "Zia Heath",
        "last_name" => "Jarvis",
        "ssn_last_4" => "Deleniti voluptatibu",
        "date_of_birth" => "2009-02-04",
        "telephone_number" => "+1 (523) 912-8595",
       "case_number" => "840",
        "client_id_number" => "479",
        "disability_id_number" => "569",
        "medicaid_application" => "1979-02-02",
        "medicaid_waiver_yes" => "yes",
        "medicaid_waiver_no" => "no",
        "waiver_type" => "Quod perspiciatis u",
        "ssa_application_date" => "11-Apr-2000",
        "ssa_decision_date" => "21-Dec-1979",
        "ssa_decision" => "Est sunt quo aut iu",
        "ssa_denial_reason" => "Tempora qui ipsa co",
        "appealed_decision2" => "no",
        "appeal_date" => "30-Apr-2018",
        "medical_conditions" => "Nostrum architecto p",
        "medical_condition_impact" => "Natus harum quaerat",
        "medications" => "Nostrum officiis aut",
        "primary_care_provider_yes" => "yes",
        "primary_care_provider_no" => "no",
        "care_provider_text" => "Dignissimos porro re",
        "primary_care_provider_details" => "Accusamus quidem lab",
        "medical_provider_yes" => "yes",
        "medical_provider_no" => "no",
        "medical_provider_1_name" => "Cruz Mills",
        "medical_provider_1_phone" => "62",
        "medical_provider_1_address" => "Porro aut et vel eni",
        "medical_provider_1_reason" => "Sapiente deserunt pl",
        "medical_provider_2_name" => "Porter Odonnell",
        "medical_provider_2_phone" => "45",
        "medical_provider_2_address" => "Voluptas hic repelle",
        "medical_provider_2_reason" => "Accusamus consequat",
        "medical_provider_3_name" => "Ulysses Huffman",
        "medical_provider_3_phone" => "93",
        "medical_provider_3_address" => "In voluptate in cupi",
        "medical_provider_3_reason" => "Similique ad assumen",
        "got_medicare_yes" => "yes",
        "medicare_rec_1_name" => "Hedwig Juarez",
        "medicare_rec_1_phone" => "14",
        "medicare_rec_1_address" => "Eaque illo facilis s",
        "medicare_rec_1_reason" => "Blanditiis duis reic",
        "medicare_rec_2_name" => "Cassandra Park",
        "medicare_rec_2_phone" => "15",
        "medicare_rec_2_address" => "Anim voluptate volup",
        "medicare_rec_2_reason" => "Dignissimos id sit s",
        "medicare_rec_3_name" => "Madaline Nieves",
        "medicare_rec_3_phone" => "8",
        "medicare_rec_3_address" => "Occaecat dolores mol",
        "medicare_rec_3_reason" => "Atque fuga Nesciunt",
        "agency_assist_yes" => "yes",
        "agency_assist_no" => "no",
        "agency_1_name" => "Devin Murphy",
        "agency_1_phone" => "7",
        "agency_1_address" => "In iure eius labore",
        "agency_1_reason" => "Similique qui molest",
        "agency_2_name" => "Charde Pollard",
        "agency_2_phone" => "64",
        "agency_2_address" => "Porro itaque irure i",
        "agency_2_reason" => "Veritatis duis quaer",
        "agency_3_name" => "Ethan Ryan",
        "agency_3_phone" => "99",
        "agency_3_address" => "Voluptatem Velit n",
        "agency_3_reason" => "Hic laborum Repelle",
        "schooling" => "Sed temporibus delec",
        "school_name" => "Genevieve Franklin",
        "school_address" => "Dolorum laboriosam",
        "special_education_yes" => "yes",
        "special_help_yes" => "yes",
        "special_help_text" => "Et enim tempore rer",
        "vocational_training_yes" => "yes",
        "vocational_training_no" => "no",
        "vocational_training_text" => "Eligendi fuga Cupid",
        "simple_message_yes" => "yes",
        "write_simple_message_yes" => "yes",
        "interpreter_yes" => "yes",
        "interpreter_no" => "no",
        "interpreter_text" => "Rerum asperiores qui",
        "worked_fifteen_yes" => "yes",
        "start_employment_date_one" => "2008-05-16",
        "end_employment_date_one" => "2012-12-19",
        "job_title_one" => "Esse tempora quo eo",
        "hours_one" => "Ut consequat Provid",
        "type_business_one" => "Ut iste voluptatum q",
        "rate_pay_one" => "Tempora illum enim",
        "duties_one" => "Culpa corrupti dolo",
        "day_stand" => "27",
        "day_walk" => "20",
        "day_sit" => "19",
        "lift_one" => "Cumque fugit rerum",
        "lift_pounds_one" => "Amet nisi Nam sunt",
        "leaving_reason_one" => "Officia ratione magn",
        "start_employment_date_two" => "2014-04-14",
        "end_employment_date_two" => "1994-07-08",
        "job_title_two" => "Cillum et eos deseru",
        "hours_two" => "Suscipit mollitia eu",
        "type_business_two" => "Cupidatat quam conse",
        "rate_pay_two" => "Iusto officiis in do",
        "duties_two" => "Nisi deserunt et ani",
        "day_stand_two" => "16",
        "day_walk_two" => "3",
        "day_sit_two" => "4",
        "lift_two" => "Quod totam aute aliq",
        "lift_pounds_two" => "Ut quis et hic quae",
        "leaving_reason_two" => "Ut esse et labore et",
        "start_employment_date_three" => "1994-05-29",
        "end_employment_date_three" => "1984-03-09",
        "job_title_three" => "Eu in velit ducimus",
        "hours_three" => "Nihil dolore proiden",
        "type_business_three" => "Id repellendus Qui",
        "rate_pay_three" => "Optio voluptatem id",
        "duties_three" => "Voluptas fugiat id e",
        "day_stand_three" => "2",
        "day_walk_three" => "6",
        "day_sit_three" => "3",
        "lift_three" => "Aliqua Natus totam",
        "lift_pounds_three" => "Quis et nostrud eius",
        "leaving_reason_three" => "Incidunt voluptatib",
        "start_employment_date_four" => "2006-02-16",
        "end_employment_date_four" => "1993-11-12",
        "job_title_four" => "Aut laborum esse fug",
        "hours_four" => "Eligendi rem ipsum r",
        "type_business_four" => "Quod pariatur Susci",
        "rate_pay_four" => "Ut ex iusto molestia",
        "duties_four" => "Fuga Sunt voluptas",
        "day_stand_four" => "19",
        "day_walk_four" => "26",
        "day_sit_four" => "2",
        "lift_four" => "Quia reprehenderit h",
        "lift_pounds_four" => "Sit tempore a non",
        "leaving_reason_four" => "Quas vitae eum nihil",
        "start_employment_date_five" => "1993-07-06",
        "end_employment_date_five" => "1978-01-18",
        "job_title_five" => "Temporibus fuga Fac",
        "hours_five" => "Tenetur eos in eaqu",
        "type_business_five" => "Odit ex et magni quo",
        "rate_pay_five" => "Ut sed minus in sed",
        "duties_five" => "Laborum in itaque si",
        "day_stand_five" => "19",
        "day_walk_five" => "10",
        "day_sit_five" => "14",
        "lift_five" => "Commodi expedita ut",
        "lift_pounds_five" => "Excepturi amet aliq",
        "leaving_reason_five" => "Veniam nobis expedi",
        "undef" => "Esse aute aperiam ni",
        "person_name" => "Yoshi Reese",
        "form_date" => "1980-02-03",
        "person_tell" => "Commodi adipisci sit",
    ];
    return view('document.disability-pdf', $data);
});
Route::get('hipp',function(){
    $data = [
        "_token" => "lgapP2muQBcp2M7H0D815sEuMkreT1SHsmxfAg9v",
        "referral_id" => "2",
        "document_id" => "72",
        "patient_name" => "Desirae Sears",
        "dob" => "1980-06-16",
        "ssn" => "98",
        "address" => "Excepteur dignissimo",
        "client_id" => "Cillum ut duis sint",
        "disablity_number" => "597",
        "name_address" => "Clare Mosley",
        "released_info" => "medical_other",
        "medical_record_from" => "1981-03-19",
        "medical_record_to" => "1997-11-16",
        "other" => "Possimus laborum R",
        "init" => "Officiis cumque lore",
        "auth_name" => "Natalie Mullen",
        "alcoholDrugTreatment" => "alcoholDrugTreatment",
        "mentalHealthInformation" => "mentalHealthInformation",
        "hivRelatedInformation" => "hivRelatedInformation",
        "other_indiviual_name" => "Savannah Le",
        "person_signing" => "Molestias quae nostr",
        "auth_info" => "Reiciendis in ad qui",
        "hippa_state_signature" => "Error qui eu dolor",
        "hippa_state_sign" => "C:\\xampp\\htdocs\\SLC\\SLC-Trust\\storage\\app/public/alihamza.dev4@gmail.com/hippa_state_sign20241001_081236.png",
        "date_hippa_state" => "1987-01-17"
    ];
    return view('document/hippa-state-pdf', $data);

});

Route::get('hipa',function(){

    $data = [
        "_token" => "DUBwDrJfasbPNXhk3gJlWe1E4eWfbD2jZvbFGRuR",
        "referral_id" => "2",
        "document_id" => "70",
        "hippa_name" => "Eagan Mcleod",
        "hippa_dob" => "1998-01-27",
        "hippa_ssn" => null,
        "hippa_address" => "Mollit non ipsa in,Quia sunt quam fugi,New Hampshire,United States of America,88150",
        "health_provider" => null,
        "info_released_from" => null,
        "info_released_to" => null,
        "info_other" => null,
        "authorised_person" => null,
        "authorize" => null,
        "reason_other" => null,
        "person_signing" => null,
        "authority_sign" => null,
        "hippa_signature" => null,
        "hippa_sign" => "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAASwAAACWCAYAAABkW7XSAAAAAXNSR0IArs4c6QAABGlJREFUeF7t1AEJADAMA8HVv9sa2GAuHq4KwqVkdvceR4AAgYDAGKxASyISIPAFDJZHIEAgI2CwMlUJSoCAwfIDBAhkBAxWpipBCRAwWH6AAIGMgMHKVCUoAQIGyw8QIJARMFiZqgQlQMBg+QECBDICBitTlaAECBgsP0CAQEbAYGWqEpQAAYPlBwgQyAgYrExVghIgYLD8AAECGQGDlalKUAIEDJYfIEAgI2CwMlUJSoCAwfIDBAhkBAxWpipBCRAwWH6AAIGMgMHKVCUoAQIGyw8QIJARMFiZqgQlQMBg+QECBDICBitTlaAECBgsP0CAQEbAYGWqEpQAAYPlBwgQyAgYrExVghIgYLD8AAECGQGDlalKUAIEDJYfIEAgI2CwMlUJSoCAwfIDBAhkBAxWpipBCRAwWH6AAIGMgMHKVCUoAQIGyw8QIJARMFiZqgQlQMBg+QECBDICBitTlaAECBgsP0CAQEbAYGWqEpQAAYPlBwgQyAgYrExVghIgYLD8AAECGQGDlalKUAIEDJYfIEAgI2CwMlUJSoCAwfIDBAhkBAxWpipBCRAwWH6AAIGMgMHKVCUoAQIGyw8QIJARMFiZqgQlQMBg+QECBDICBitTlaAECBgsP0CAQEbAYGWqEpQAAYPlBwgQyAgYrExVghIgYLD8AAECGQGDlalKUAIEDJYfIEAgI2CwMlUJSoCAwfIDBAhkBAxWpipBCRAwWH6AAIGMgMHKVCUoAQIGyw8QIJARMFiZqgQlQMBg+QECBDICBitTlaAECBgsP0CAQEbAYGWqEpQAAYPlBwgQyAgYrExVghIgYLD8AAECGQGDlalKUAIEDJYfIEAgI2CwMlUJSoCAwfIDBAhkBAxWpipBCRAwWH6AAIGMgMHKVCUoAQIGyw8QIJARMFiZqgQlQMBg+QECBDICBitTlaAECBgsP0CAQEbAYGWqEpQAAYPlBwgQyAgYrExVghIgYLD8AAECGQGDlalKUAIEDJYfIEAgI2CwMlUJSoCAwfIDBAhkBAxWpipBCRAwWH6AAIGMgMHKVCUoAQIGyw8QIJARMFiZqgQlQMBg+QECBDICBitTlaAECBgsP0CAQEbAYGWqEpQAAYPlBwgQyAgYrExVghIgYLD8AAECGQGDlalKUAIEDJYfIEAgI2CwMlUJSoCAwfIDBAhkBAxWpipBCRAwWH6AAIGMgMHKVCUoAQIGyw8QIJARMFiZqgQlQMBg+QECBDICBitTlaAECBgsP0CAQEbAYGWqEpQAAYPlBwgQyAgYrExVghIgYLD8AAECGQGDlalKUAIEDJYfIEAgI2CwMlUJSoCAwfIDBAhkBAxWpipBCRAwWH6AAIGMgMHKVCUoAQIGyw8QIJARMFiZqgQlQMBg+QECBDICBitTlaAECBgsP0CAQEbAYGWqEpQAAYPlBwgQyAgYrExVghIgYLD8AAECGQGDlalKUAIEDJYfIEAgI2CwMlUJSoCAwfIDBAhkBAxWpipBCRB4yA0/gy//ne4AAAAASUVORK5CYII=",
        "sign_date" => null,
    ];

    return view('document.hippa-pdf', $data);


});

Route::get('doh-test',function(){

    $data = [
        "_token" => "DUtutc0ECm2FdXhGXaRoe6G3ANNXXv73jk5rsvli",
        "referral_id" => "2",
        "document_id" => "74",
        "first_name" => "Brittany",
        "address_text" => "Sit consequuntur et",
        "dob" => "2011-08-06",
        "case_number" => "694",
        "client_id" => "Voluptatem reprehend",
        "disability_id" => "Magna nostrum qui ip",
        "ssn_last_four" => "Deserunt rerum nostr",
        "diagnosis" => "Nemo reprehenderit v",
        "last_exam_date" => "2020-01-23",
        "height_ft" => "39",
        "height_in" => "84",
        "weight" => "48",
        "lifting2" => "Max. 10lbs.",
        "lifting5" => ">50lbs.",
        "carrying3" => "Max. 20lbs/freq. 10lbs.",
        "standing1" => "less_than_two",
        "standing2" => "2hrs./day",
        "pushing1" => "Using R arm",
        "pushing4" => "Using L leg",
        "pulling1" => "Using R arm",
        "sensory1" => "No Limitations",
        "sensory3" => "Hearing",
        "sensory4" => "Speaking",
        "postural1" => "No Limitations",
        "postural2" => "Stooping/Bending",
        "postural4" => "Climbing",
        "manipulative1" => "No Limitations",
        "environmental2" => "Tolerating dust, fumes, extremes of temperature",
        "mental4" => "Responding appropriately to supervision, co-workers, work situations",
        "doh_signature" => "Beatae occaecat re",
        "doh_sign" => "C:\xampp\htdocs\SLC\SLC-Trust\storage\app/public/alihamza.dev4@gmail.com/doh_sign20241003_074012.png",
        "print_name" => "Brett Mueller",
        "date_signed" => "1999-03-15",
        "speciallity" => "Ea fugit eum doloru",
        "office_address" => "Velit excepturi reru",
        "office_phone" => "+1 (615) 435-3798",
      ];

    return view('document.doh-pdf', $data);
});


Route::get('test-email',function(){

    $data = [
        "name" => "Alamgir Khan",
        "email_message" => "ADDDDDDDDDDDD aDDDDDDDDDD asssss",
        "filtered_names" => [
            0 => "1-Joinder Agreement.pdf",
            1 => "2-DOH-960 Hipaa.pdf",
            2 => "3-MAP-751e - Authorization to Release Medical Information.pdf",
            3 => "4-DOH 5173-Hipaa State.pdf",
            4 => "5- DOH -5139 Disability FILLABLE Questionnaire.pdf",
            5 => "6-DOH-5143.pdf",
        ],
        "filtered_links" => [
        0 => "http://localhost:8000/joinder?referralId=eyJpdiI6Illha2hYNG5qMkxKYjkyNEdjZmROUUE9PSIsInZhbHVlIjoicGFIdzk4RDVCVHVCcWwxS2JrblVLUT09IiwibWFjIjoiOTEzZDI2NjY4ODcxZDc0M2UyOWQwNmYxYWZkYmIxZGQwOWI2ZWZiN2U3YmFkYjAwYzVlNjMwNDNkNmM5MWVkMiIsInRhZyI6IiJ9",
        1 => "http://localhost:8000/hippa?referralId=eyJpdiI6Illha2hYNG5qMkxKYjkyNEdjZmROUUE9PSIsInZhbHVlIjoicGFIdzk4RDVCVHVCcWwxS2JrblVLUT09IiwibWFjIjoiOTEzZDI2NjY4ODcxZDc0M2UyOWQwNmYxYWZkYmIxZGQwOWI2ZWZiN2U3YmFkYjAwYzVlNjMwNDNkNmM5MWVkMiIsInRhZyI6IiJ9",
        2 => "http://localhost:8000/map?referralId=eyJpdiI6Illha2hYNG5qMkxKYjkyNEdjZmROUUE9PSIsInZhbHVlIjoicGFIdzk4RDVCVHVCcWwxS2JrblVLUT09IiwibWFjIjoiOTEzZDI2NjY4ODcxZDc0M2UyOWQwNmYxYWZkYmIxZGQwOWI2ZWZiN2U3YmFkYjAwYzVlNjMwNDNkNmM5MWVkMiIsInRhZyI6IiJ9",
        3 => "http://localhost:8000/hippa_state?referralId=eyJpdiI6Illha2hYNG5qMkxKYjkyNEdjZmROUUE9PSIsInZhbHVlIjoicGFIdzk4RDVCVHVCcWwxS2JrblVLUT09IiwibWFjIjoiOTEzZDI2NjY4ODcxZDc0M2UyOWQwNmYxYWZkYmIxZGQwOWI2ZWZiN2U3YmFkYjAwYzVlNjMwNDNkNmM5MWVkMiIsInRhZyI6IiJ9",
        4 => "http://localhost:8000/disability?referralId=eyJpdiI6Illha2hYNG5qMkxKYjkyNEdjZmROUUE9PSIsInZhbHVlIjoicGFIdzk4RDVCVHVCcWwxS2JrblVLUT09IiwibWFjIjoiOTEzZDI2NjY4ODcxZDc0M2UyOWQwNmYxYWZkYmIxZGQwOWI2ZWZiN2U3YmFkYjAwYzVlNjMwNDNkNmM5MWVkMiIsInRhZyI6IiJ9",
        5 => "http://localhost:8000/doh?referralId=eyJpdiI6Illha2hYNG5qMkxKYjkyNEdjZmROUUE9PSIsInZhbHVlIjoicGFIdzk4RDVCVHVCcWwxS2JrblVLUT09IiwibWFjIjoiOTEzZDI2NjY4ODcxZDc0M2UyOWQwNmYxYWZkYmIxZGQwOWI2ZWZiN2U3YmFkYjAwYzVlNjMwNDNkNmM5MWVkMiIsInRhZyI6IiJ9",
    ]];

    return view('emails.email_documents', $data);

});

Route::get('mapp',function(){
    $data = [
        "_token" => "Nm4oLsIJyDrCMv7VbxpJXV8mFVtZd4pMpliVYl9t",
        "referral_id" => "1",
        "document_id" => "65",
        "name_address" => "Breanna Moore sddjsjdk",
        "relationship_disabled" => "Dicta reiciendis ver",
        "source_contact_name_address" => "Vanna Johnson",
        "dob" => "1993-10-06",
        "disabled_id" => "Incididunt ut fugiat",
        "disabled_contact_time" => "Excepteur veniam as",
        "map_signature" => "Quae autem dolore",
        "map_sign" => "D:\Napollo\SLC\SLC-Trust\storage\app/public/bilalkashif360@gmail.com/map_sign20241004_082254.png",
        "disabled_relation_other" => "Aut quia nulla velit",
        "disabled_id_other" => "Magna quia ullam sin",
        "date_map" => "1984-06-10",
        "disabled_relation_street" => "Laborum voluptatem s",
        "disabled_relation_city" => "Ea deserunt consecte",
        "disabled_relation_state" => "Esse omnis amet de",
        "disabled_relation_zip" => "57065",
    ];

    return view('document.map-pdf', $data);

});

Route::get('email',function(){

    $data  = [
        "name" => "afasf asdf",
        "email_message" => "Please click on the document, complete the required information, and submit it. These forms will be automatically sent to the admin for processing. For immediate assistance, please call 718-500-3235",
        "filtered_links" => [
          0 => "http://localhost:8000/joinder?referralId=eyJpdiI6Ijh6WFc4TlcrK2FwT0dvUU5yc1pUR2c9PSIsInZhbHVlIjoiTytlT05sUnlqcThqckFpUFlCWk5ldz09IiwibWFjIjoiNmUzYzEwMzZmYjg5YzUyYTM3YWUxZjExYmQ0YmVlOWRhNmY4OGI5MGQ5NGM3YWJkZTRhNzU2ZTQwYjMyYTM0ZCIsInRhZyI6IiJ9",
          1 => "http://localhost:8000/hippa?referralId=eyJpdiI6Ijh6WFc4TlcrK2FwT0dvUU5yc1pUR2c9PSIsInZhbHVlIjoiTytlT05sUnlqcThqckFpUFlCWk5ldz09IiwibWFjIjoiNmUzYzEwMzZmYjg5YzUyYTM3YWUxZjExYmQ0YmVlOWRhNmY4OGI5MGQ5NGM3YWJkZTRhNzU2ZTQwYjMyYTM0ZCIsInRhZyI6IiJ9",
          2 => "http://localhost:8000/map?referralId=eyJpdiI6Ijh6WFc4TlcrK2FwT0dvUU5yc1pUR2c9PSIsInZhbHVlIjoiTytlT05sUnlqcThqckFpUFlCWk5ldz09IiwibWFjIjoiNmUzYzEwMzZmYjg5YzUyYTM3YWUxZjExYmQ0YmVlOWRhNmY4OGI5MGQ5NGM3YWJkZTRhNzU2ZTQwYjMyYTM0ZCIsInRhZyI6IiJ9",
          3 => "http://localhost:8000/hippa_state?referralId=eyJpdiI6Ijh6WFc4TlcrK2FwT0dvUU5yc1pUR2c9PSIsInZhbHVlIjoiTytlT05sUnlqcThqckFpUFlCWk5ldz09IiwibWFjIjoiNmUzYzEwMzZmYjg5YzUyYTM3YWUxZjExYmQ0YmVlOWRhNmY4OGI5MGQ5NGM3YWJkZTRhNzU2ZTQwYjMyYTM0ZCIsInRhZyI6IiJ9",
          4 => "http://localhost:8000/disability?referralId=eyJpdiI6Ijh6WFc4TlcrK2FwT0dvUU5yc1pUR2c9PSIsInZhbHVlIjoiTytlT05sUnlqcThqckFpUFlCWk5ldz09IiwibWFjIjoiNmUzYzEwMzZmYjg5YzUyYTM3YWUxZjExYmQ0YmVlOWRhNmY4OGI5MGQ5NGM3YWJkZTRhNzU2ZTQwYjMyYTM0ZCIsInRhZyI6IiJ9",
          5 => "http://localhost:8000/doh?referralId=eyJpdiI6Ijh6WFc4TlcrK2FwT0dvUU5yc1pUR2c9PSIsInZhbHVlIjoiTytlT05sUnlqcThqckFpUFlCWk5ldz09IiwibWFjIjoiNmUzYzEwMzZmYjg5YzUyYTM3YWUxZjExYmQ0YmVlOWRhNmY4OGI5MGQ5NGM3YWJkZTRhNzU2ZTQwYjMyYTM0ZCIsInRhZyI6IiJ9",
        ],
        "filtered_names" => [
          0 => "Joinder Agreement",
          1 => "DOH-960 – HIPAA",
          2 => "MAP-751E – Authorization to Release Medical Info",
          3 => "DOH-5173 – HIPAA",
          4 => "DOH-5139 – Disability Questionnaire",
          5 => "DOH-5143 – Medical",
        ],
        "referralId" => "eyJpdiI6Ijh6WFc4TlcrK2FwT0dvUU5yc1pUR2c9PSIsInZhbHVlIjoiTytlT05sUnlqcThqckFpUFlCWk5ldz09IiwibWFjIjoiNmUzYzEwMzZmYjg5YzUyYTM3YWUxZjExYmQ0YmVlOWRhNmY4OGI5MGQ5NGM3YWJkZTRhNzU2ZTQwYjMyYTM0ZCIsInRhZyI6IiJ9",
        ];

    return view("emails.email_documents", $data);

});
