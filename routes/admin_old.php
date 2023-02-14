<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\StatController;
use App\Http\Controllers\Admin\campaignController;
use App\Http\Controllers\Admin\phoneController;
use App\Http\Controllers\Admin\recordController;



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


/**************************** ADMIN ROUTES ***********************************************/

/** Add User */
Route::get('/ajouter-utilisateur', [recordController::class, 'addUser'])->name('addUser')->middleware('auth');
Route::post('/ajouter-utilisateur', [recordController::class, 'addUser'])->name('addUser')->middleware('auth');

/** Delete User */
Route::get('/supprimer-utilisateur/{agent_user}', [recordController::class, 'deleteUser'])->name('deleteUser')->middleware('auth');

/** Show Users */
Route::get('/afficher-utilisateur', [recordController::class, 'showUsers'])->name('showUsers')->middleware('auth');

/** Copy User */
Route::get('/copier-utilisateur', [recordController::class, 'copyUser'])->name('copyUser')->middleware('auth');
Route::post('/copier-utilisateur', [recordController::class, 'copyUser'])->name('copyUser')->middleware('auth');

/** Update user */
Route::get('/modifier-utilisateur/{user_id}', [recordController::class, 'updateUser'])->name('updateUser')->middleware('auth');
Route::post('/modifier-utilisateur/{user_id}', [recordController::class, 'updateUser'])->name('updateUser')->middleware('auth');

/** Display List */
Route::get('/afficher-liste', [recordController::class, 'displayLists'])->name('displayLists')->middleware('auth');
/** Update Liste */
Route::get('/modifier-liste/{list_id}', [recordController::class, 'updateListe'])->name('updateListe')->middleware('auth');
Route::post('/modifier-liste/{list_id}', [recordController::class, 'updateListe'])->name('updateListe')->middleware('auth');

/** Add List */
Route::get('/ajouter-liste', [recordController::class, 'addList'])->name('addList')->middleware('auth');
Route::post('/ajouter-liste', [recordController::class, 'addList'])->name('addList')->middleware('auth');

/** Delete List */
Route::get('/supprimer-liste/{list_id}', [recordController::class, 'deleteList'])->name('deleteList')->middleware('auth');

/** Load new List */
Route::get('/load_list', [recordController::class, 'loadList'])->name('loadList')->middleware('auth');
Route::post('/import_leads', [recordController::class, 'import_leads'])->name('import_leads')->middleware('auth');
Route::post('/import_thisLeads', [recordController::class, 'import_thisLeads'])->name('import_thisLeads')->middleware('auth');


/** Login **/
Route::get('/admin/login', [recordController::class, 'authenticate'])->name('admin.login');
Route::post('/admin/login', [recordController::class, 'authenticate'])->name('login');

/** Logout **/
Route::get('/admin/logout',[recordController::class, 'logout'])->name('logout')->middleware('auth');

/** Campaigns **/
Route::get('/campaigns', [recordController::class, 'get_campaign'])->name('get_campaign')->middleware('auth');

/** Add Campaign */
Route::get('/ajouter-compagne', [campaignController::class, 'addCampaign'])->name('addCampaign')->middleware('auth');
Route::post('/ajouter-compagne', [campaignController::class, 'addCampaign'])->name('addCampaign')->middleware('auth');

/** Update Campagn */
Route::get('/modifier-compagne/{cpm_id}', [campaignController::class, 'updateCampagn'])->name('updateCampagn')->middleware('auth');
Route::post('modifier-compagne/{cpm_id}', [campaignController::class, 'updateCampagn'])->name('updateCampagn')->middleware('auth');

/** Delete Campaign **/
Route::get('/supprimer-compagne/{cpm_id}', [campaignController::class, 'deleteCampagn'])->name('deleteCampagn')->middleware('auth');

/** List Campaign */
Route::get('/liste-compagne', [campaignController::class, 'showCampaign'])->name('showCampaign')->middleware('auth');

/** List phone */
Route::get('/liste-phone', [phoneController::class, 'showPhone'])->name('showPhone')->middleware('auth');

/** Add phone */
Route::get('/ajouter-phone', [phoneController::class, 'AddPhone'])->name('AddPhone')->middleware('auth');
Route::post('/ajouter-phone', [phoneController::class, 'AddPhone'])->name('AddPhone')->middleware('auth');

/** Update phone */
Route::get('/modifier-telephone/{phone_login}', [phoneController::class, 'updatePhone'])->name('updatePhone')->middleware('auth');
Route::post('/modifier-telephone/{phone_login}', [phoneController::class, 'updatePhone'])->name('updatePhone')->middleware('auth');

/** Records **/
Route::get('/dashboard', [recordController::class, 'dashboard'])->name('dashboard')->middleware('auth');

/** Search recordind **/
Route::get('/search_recording', [recordController::class, 'recording_search'])->name('recording_search')->middleware('auth');

/** Selected campaigns from select option **/
Route::get('/getSelectedCpms/{selected_cpm}', [recordController::class, 'getSelectedCpms'])->name('getSelectedCpms')->middleware('auth');

/** Agent logged in **/
//Route::get('/agents_logged_in}', [recordController::class, 'agents_logged_in'])->name('agents_logged_in')->middleware('auth');
Route::get('/agents_logged_in', [recordController::class, 'agents_logged_in'])->name('agents_logged_in')->middleware('auth');
Route::get('/agents_logged_in_search_json', [recordController::class, 'agents_logged_in_search_json'])->name('agents_logged_in_search')->middleware('auth');

/** CPanel **/
Route::get('/cpanel', [recordController::class, 'cpanel'])->name('cpanel')->middleware('auth');

/** Chrono live */
Route::get('/chrono_live/{agent_user}', [recordController::class, 'chrono_live'])->name('chrono_live')->middleware('auth');

/** INBOUND/OUTBOUNDS Calls */
Route::get('/prospect_waittting', [recordController::class, 'prospect_waittting'])->name('prospect_waittting')->middleware('auth');

/** COUNT IVR */
Route::get('/countivr', [recordController::class, 'countIVR'])->name('countIVR')->middleware('auth');

/** Calls waitting for agents (LIVE) */
Route::get('/calls_waitting_for_agents_live', [recordController::class, 'liveCallsWaittingForAgents'])->name('liveCallsWaittingForAgents')->middleware('auth');

/**  */
Route::post('/all_call_in_queue', [recordController::class, 'all_call_in_queue'])->name('all_call_in_queue')->middleware('auth');

/** Get webphone */
Route::get('/webphone/{selected_phone}', [recordController::class, 'getwebphone'])->name('getwebphone')->middleware('auth');

/** Hungup call **/
Route::get('/hungup_call/{selected_user}/{function}', [recordController::class, 'hungup_call'])->name('hungup_call')->middleware('auth');

/** Monitoring call **/
Route::get('/blind_monitor/{selected_user}/{session_id}/{web_phone}/{type_monitor}', [recordController::class, 'monitoring_function'])->name('blind_monitor')->middleware('auth');

/** Logout api **/
Route::get('logout_api/{user}',[recordController::class, 'logout_api'])->name('logout_api')->middleware('auth');

/** Download audio **/
Route::post('/getfiles', [recordController::class, 'getfiles'])->name('getfiles')->middleware('auth');

//Route::get('/mailSend', [recordController::class, 'mailSend'])->name('mailSend')->middleware('auth');

/** Send attachement to gmail **/
Route::get('/sendattachfile/{email_input}', [recordController::class, 'sendattachfile'])->name('sendattachfile')->middleware('auth');

Route::get('/uploadFile/', [recordController::class, 'uploadFile'])->name('uploadFile')->middleware('auth');

/*****************************************************************************************/


/***************** Statistics Routes **************************************************/

Route::get('stat', [StatController::class, 'new_statistics'])->name('statistics');
Route::get('new_stat', [StatController::class, 'new_statistics'])->name('new_statistics');
Route::post('new_show_stat_agents', [StatController::class, 'new_show_stat_agents'])->name('new_show_stat_agents');

Route::post('ExportList', [StatController::class, 'ExportList'])->name('ExportList');
Route::post('ExportTimeAgent', [StatController::class, 'ExportTimeAgent'])->name('ExportTimeAgent');
Route::post('show_stat_agents', [StatController::class, 'showStatAgents'])->name('show_stat_agents');
