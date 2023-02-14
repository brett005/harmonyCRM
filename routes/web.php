<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Agent\DashboardAgentController;
use App\Http\Controllers\Agent\InfoController;
use App\Http\Controllers\Agent\CallController;
use App\Http\Controllers\Agent\SearchController;
use App\Http\Controllers\Agent\AuthController;
use App\Http\Controllers\Admin\StatController;




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


/***************** Agent Routes **************************************************/



//Route::get('admin/login', [HomeController::class, 'loginAdmin'])->name('admin.login');
Route::get('', [AuthController::class, 'index'])->name('index');
Route::get('agent', [DashboardAgentController::class, 'index'])->name('agent.index');
Route::get('agent/login', [AuthController::class, 'loginAgent'])->name('agent.login');
Route::post('custom_login', [AuthController::class, 'login'])->name('login.custom');
Route::get('/agent/logout', [AuthController::class, 'logout'])->name('agent.logout');




Route::post('get_call_logs', [DashboardAgentController::class, 'getCallLogs'])->name('get_call_logs');
Route::post('get_last_call_logs', [DashboardAgentController::class, 'getLastCallLogs'])->name('get_last_call_logs');
Route::get('get_lenght_sec/{lead_id}', [DashboardAgentController::class, 'getLenghtSec'])->name('get_lenght_sec');
Route::get('activate_webphone', [DashboardAgentController::class, 'activateWebphone'])->name('activate_webphone');
Route::get('get_channel_live', [DashboardAgentController::class, 'getChannelLive'])->name('get_channel_live');
Route::get('get_time_agent', [DashboardAgentController::class, 'getTimeAgent'])->name('get_time_agent');
//// implemente pause code
Route::get('change_pause_code/{pause_code}', [DashboardAgentController::class, 'ChangePauseCode'])->name('change_pause_code');




Route::get('Update_dispo', [InfoController::class, 'UpdateDispo'])->name('Update_dispo');
Route::get('get_lead_info/{lead_id}', [InfoController::class, 'getLeadInfo'])->name('get_lead_info');
Route::post('update_qualif_contact', [InfoController::class, 'updateQualifContact'])->name('update_qualif_contact');
Route::post('register_new_contact_info', [InfoController::class, 'RegisternewInfoContact'])->name('register_new_contact_info');
Route::post('register_new_contact_info_post', [InfoController::class, 'RegisternewInfoContactPost'])->name('register_new_contact_info_post');
Route::get('change_status/{etatAgent}', [InfoController::class, 'ChangeStatus'])->name('change_status');

////serach lead 


Route::get('search_lead', [SearchController::class, 'SearchLead'])->name('search_lead');
Route::get('search_calls', [SearchController::class, 'searchCalls'])->name('search_calls');




Route::get('get_channel', [CallController::class, 'getChannel'])->name('get_channel');
Route::get('refresh_incall', [CallController::class, 'refreshIncall'])->name('refresh_incall');
Route::get('change_to_incall', [CallController::class, 'ChangeIncall'])->name('change_to_incall');
Route::get('hangup', [CallController::class, 'hangup'])->name('hangup');
Route::get('get_status', [CallController::class, 'getAgentStatus'])->name('get_status');
Route::get('get_time_incall/{lead_id}', [CallController::class, 'getTimeIncall'])->name('get_time_incall');
Route::get('manual_dial', [CallController::class, 'ManualDial'])->name('manual_dial');





Route::get('change_status_ajax/{etatAgent}', [DashboardAgentController::class, 'ChangeStatusAjax'])->name('change_status_ajax');
Route::get('get_contact_informations', [DashboardAgentController::class, 'get_contact_informations'])->name('get_contact_informations');






//// get live callback
//Route::get('get_live_callback', [DashboardAgentController::class, 'getLiveCallback'])->name('get_live_callback');


////////////


Route::post('ExportList', [StatController::class, 'ExportList'])->name('ExportList');

Route::post('ExportStat_agent', [StatController::class, 'ExportListStat'])->name('ExportStat_agent');

////Action email sms

//Route::post('recording', [DashboardAgentController::class, 'recording'])->name('recording');
Route::post('mute_recording', [DashboardAgentController::class, 'MuteRecording'])->name('mute_recording');




//////get all channel live for agent connected




//Route::get('get_live_statistic_agent', [DashboardAgentController::class, 'getLiveStatisticAgent'])->name('get_live_statistic_agent');



