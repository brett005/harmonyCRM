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

Route::get('/afficher_filtre', function(){
    return view('Admin.administration.filtre.afficher-filtre');
});
Route::get('/ajouter_filtre', function(){
    return view('Admin.administration.filtre.ajouter-filtre');
});

Route::get('/ajouter_agent_distant', function(){
    return view('Admin.administration.agent.ajouter-agent-distant');
});

Route::get('/ajouter-groupe', function(){
    return view('Admin.administration.groupe.ajouter-groupe');
});
Route::get('/afficher-groupe', function(){
    return view('Admin.administration.groupe.afficher-groupe');
});
Route::get('/Statistiques horaires du groupe', function(){
    return view('Admin.administration.groupe.Statistiques horaires du groupe');
});
Route::get('/modifier-groupe', function(){
    return view('Admin.administration.groupe.modifier-groupe');
});
Route::get('/liste-groupe', function(){
    return view('Admin.administration.Entrant.liste-groupe');
});

Route::get('/ajouter-groupe-entrant', function(){
    return view('Admin.administration.Entrant.ajouter-groupe-entrant');
});

Route::get('/ajouter-groupe-messagerie', function(){
    return view('Admin.administration.Entrant.ajouter-groupe-messagerie');
});
Route::get('/ajouter-groupe-discussion', function(){
    return view('Admin.administration.Entrant.ajouter-groupe-discussion');
});

Route::get('/ajouter-did', function(){
    return view('Admin.administration.Entrant.ajouter-did');
});
Route::get('/entrant6', function(){
    return view('Admin.administration.Entrant.ajouter-menu');
});

Route::get('/entrant7', function(){
    return view('Admin.administration.Entrant.ajouter-groupe-telephone');
});
Route::get('/copier-entrant', function(){
    return view('Admin.administration.Entrant.copier-entrant');
});
Route::get('/entrant9', function(){
    return view('Admin.administration.Entrant.copier-email');
});
Route::get('/panel', function(){
    return view('agent.panel');
});

Route::get('/copier-discussion', function(){
    return view('Admin.administration.Entrant.copier-discussion');
});
Route::get('/entrant11', function(){
    return view('Admin.administration.Entrant.copier-menu');
});
Route::get('/entrant12', function(){
    return view('Admin.administration.Entrant.copier-SDA');
});
Route::get('/entrant13', function(){
    return view('Admin.administration.Entrant.aficher-menu');
});
Route::get('/afficher_serveur', function(){
    return view('Admin/administration.carriers.show_carriere');
});

Route::get('/ajouter_carriere', function(){
    return view('Admin/administration.carriers.ajouter_carriere');
});
Route::get('/copy_carriere', function(){
    return view('Admin/administration.carriers.copy_carriere');
});

Route::get('/ajouter_cid', function(){
    return view('Admin/administration.Cid groupe.ajouter_CID');
});

Route::get('/copy_shift', function(){
    return view('Admin/administration.shift.ajouter_shift');
});

Route::get('/afficher_serveur', function(){
    return view('Admin/administration.serveur.afficher_serveur');
});

Route::get('/modifier_serveur', function(){
    return view('Admin/administration.serveur.modifier_serveur');
});
Route::get('/ajouter_serveur', function(){
    return view('Admin/administration.serveur.ajouter_serveur');
});

Route::get('/modifier_template', function(){
    return view('Admin/administration.template.modifier_template');
});
Route::get('/ajouter_template', function(){
    return view('Admin/administration.template.ajouter_template');
});

Route::get('/modifier_call', function(){
    return view('Admin/.administration.call_time.modifier_call');
});
Route::get('/parametre', function(){
    return view('Admin/administration.systeme.parametre');
});
Route::get('/admin', function(){
    return view('Admin/cpanel.admin');
});
Route::get('/ajouter_enregistrement', function(){
    return view('Admin/script.ajouter_enregistrement');
});
Route::get('/enregistrement', function(){
    return view('Admin/script.modifier_enregistrement');
});
Route::get('/liste_conference', function(){
    return view('Admin.administration.conferance.liste_conference');
});
Route::get('/ajouter_conference', function(){
    return view('Admin.administration.conferance.ajouter_conference');
});
Route::get('/admin', function(){
    return view('Admin/cpanel.admin');
});
Route::get('/parametre', function(){
    return view('Admin/administration.systeme.parametre');
});

Route::get('/ajouter_script', function(){
    return view('Admin/script.ajouter-script');
});
Route::get('ajouter_shift', function(){
    return view('Admin.administration.shift.ajouter-shift');
});
Route::get('ajouter_temps', function(){
    return view('Admin.administration.shift.afficher_shift');
});

Route::get('ajouter_temps', function(){
    return view('Admin.administration.call_time.ajouter-temps');
});
Route::get('liste_temps', function(){
    return view('Admin.administration.call_time.liste-temps');
});

Route::get('report', function(){
    return view('Admin.Reporting');
});
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

/** Search recording **/
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
