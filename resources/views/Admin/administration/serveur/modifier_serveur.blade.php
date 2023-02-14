@extends('Admin.layouts.hr-base')
@section('admin')
@section('css-liste')
<style>
.btn-sm, .btn-group-sm>.btn {
    padding: 0.01rem 0.125rem;
    font-size: 0.01rem;
    border-radius: 0.2rem;
}
.table td {
    padding: 0.1rem;
    vertical-align: middle;
    border-top: 0;
}
.card-body {
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
    margin: 0;
    padding: 0.3rem 1rem 0rem  1rem;
    position: relative;
}
</style>
@endsection
   

    <div class="page-header d-xl-flex d-block">
        <div class="page-leftheader">
            <div class="page-title">Modifier serveur</div>
        </div>
        <div class="page-rightheader ms-md-auto">
            <div class="align-items-end flex-wrap my-auto right-content breadcrumb-right">
                <div class="btn-list">
                    <a href="ajouter-utilisateur" class="btn btn-primary me-3">modifeir serveur </a>
                    <button class="btn btn-light" data-bs-toggle="tooltip" data-bs-placement="top" title="E-mail"><i
                                class="feather feather-mail"></i></button>
                    <button class="btn btn-light" data-bs-placement="top" data-bs-toggle="tooltip" title="Contact"><i
                                class="feather feather-phone-call"></i></button>
                    <button class="btn btn-primary" data-bs-placement="top" data-bs-toggle="tooltip" title="Info"><i
                                class="feather feather-info"></i></button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-12 col-md-12 col-lg-12">
        @if(session()->get('message') != "")
            @if(session()->get('message')[0] == "SUCCESS")
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success: </strong>{{session()->get('message')[1]}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
        @endif

        @if(session()->get('message') != "")
            @if(session()->get('message')[0] == "ERROR")
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session()->get('message')[1] }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
        @endif

        <div class="card">
            <div class="card-header  border-0">
                <h4 class="card-title">Liste des conferences</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table width="900" cellspacing="3">
                        <tbody>
                        <tr>
                        <td>
                        <font face="ARIAL,HELVETICA" color="BLACK" size="2"><br>MODIFY A SERVER RECORD: harmoniecl<form action="/vicidial/admin.php" method="POST">
                        <input type="hidden" name="ADD" value="411111111111">
                        <input type="hidden" name="old_server_id" value="harmoniecl">
                        <input type="hidden" name="old_server_ip" value="213.246.45.222">
                        <input type="hidden" name="DB" value="0">
                        <center><table width="850" cellspacing="3">
                        <tbody><tr ><td align="right">Server ID: </td><td align="left"><input type="text" name="server_id" size="10" maxlength="10" value="harmoniecl"><img src="help.png" onclick="FillAndShowHelpDiv(event, '#servers-server_id')" width="20" height="20" border="0" alt="HELP" align="TOP"></td></tr>
                        <tr ><td align="right">Server Description: </td><td align="left"><input type="text" name="server_description" size="30" maxlength="255" value="HarmonieCall3"><img src="help.png" onclick="FillAndShowHelpDiv(event, '#servers-server_description')" width="20" height="20" border="0" alt="HELP" align="TOP"></td></tr>
                        <tr ><td align="right">Server IP Address: </td><td align="left"><input type="text" name="server_ip" size="20" maxlength="15" value="213.246.45.222"><img src="help.png" onclick="FillAndShowHelpDiv(event, '#servers-server_ip')" width="20" height="20" border="0" alt="HELP" align="TOP"></td></tr>
                        <tr ><td align="right">Active: </td><td align="left"><select size="1" name="active"><option value="Y">Y</option><option value="N">N</option><option value="Y" selected="">Y</option></select><img src="help.png" onclick="FillAndShowHelpDiv(event, '#servers-active')" width="20" height="20" border="0" alt="HELP" align="TOP"></td></tr>
                        <tr ><td align="right">System Load: </td><td align="left">745 - 31% &nbsp; <img src="help.png" onclick="FillAndShowHelpDiv(event, '#servers-sysload')" width="20" height="20" border="0" alt="HELP" align="TOP"></td></tr>
                        <tr ><td align="right">Live Channels: </td><td align="left">704 &nbsp; &nbsp; Agents: 11 &nbsp; <img src="help.png" onclick="FillAndShowHelpDiv(event, '#servers-channels_total')" width="20" height="20" border="0" alt="HELP" align="TOP"></td></tr>
                        <tr ><td align="right">Disk Usage: </td><td align="left"><font size="0">1 - 0% &nbsp; &nbsp; 2 - 0% &nbsp; &nbsp; 3 - 11% &nbsp; &nbsp; 4 - 0% &nbsp; &nbsp; 5 - 91% &nbsp; &nbsp; 6 - 1% &nbsp; &nbsp; 7 - 39% &nbsp; &nbsp; 8 - 6% &nbsp; &nbsp; 9 - 0% &nbsp; &nbsp; </font> &nbsp; <img src="help.png" onclick="FillAndShowHelpDiv(event, '#servers-disk_usage')" width="20" height="20" border="0" alt="HELP" align="TOP"></td></tr>
                        <tr ><td align="right">System Uptime: </td><td align="left">16 days 4:40 &nbsp; <img src="help.png" onclick="FillAndShowHelpDiv(event, '#servers-system_uptime')" width="20" height="20" border="0" alt="HELP" align="TOP"></td></tr>
                        <tr ><td align="right">Admin User Group: </td><td align="left"><select size="1" name="user_group">
                        <option value="---ALL---">All Admin User Groups</option>
                        <option value="ADMIN">ADMIN - VICIDIAL ADMINISTRATORS</option>
                        <option value="agents">agents - agents</option>
                        <option value="call1_unadev">call1_unadev - call1 unadev</option>
                        <option value="call1unicef">call1unicef - call1_unicef</option>
                        <option value="call2unadev">call2unadev - call2 unadev</option>
                        <option value="call2unicef">call2unicef - call2 unicef</option>
                        <option value="test_group">test_group - test_group</option>
                        <option value="Unapie_harmonie">Unapie_harmonie - Unapie_harmonie</option>
                        <option selected="" value="---ALL---">---ALL---</option>
                        </select><img src="help.png" onclick="FillAndShowHelpDiv(event, '#servers-user_group')" width="20" height="20" border="0" alt="HELP" align="TOP"></td></tr>
                        <tr ><td align="right">Asterisk Version: </td><td align="left"><input type="text" name="asterisk_version" size="20" maxlength="20" value="13.38.3-vici"><img src="help.png" onclick="FillAndShowHelpDiv(event, '#servers-asterisk_version')" width="20" height="20" border="0" alt="HELP" align="TOP"></td></tr>
                        <tr ><td align="right">Max Trunks: </td><td align="left"><input type="text" name="max_vicidial_trunks" size="5" maxlength="4" value="2000"><img src="help.png" onclick="FillAndShowHelpDiv(event, '#servers-max_trunks')" width="20" height="20" border="0" alt="HELP" align="TOP"></td></tr>
                        <tr ><td align="right">Max Calls per Second: </td><td align="left"><input type="text" name="outbound_calls_per_second" size="5" maxlength="4" value="150"><img src="help.png" onclick="FillAndShowHelpDiv(event, '#servers-outbound_calls_per_second')" width="20" height="20" border="0" alt="HELP" align="TOP"></td></tr>
                        <tr ><td align="right">Balance Dialing: </td><td align="left"><select size="1" name="vicidial_balance_active"><option value="Y">Y</option><option value="N">N</option><option selected="" value="N">N</option></select><img src="help.png" onclick="FillAndShowHelpDiv(event, '#servers-balance_active')" width="20" height="20" border="0" alt="HELP" align="TOP"></td></tr>
                        <tr ><td align="right">Balance Rank: </td><td align="left"><input type="text" name="vicidial_balance_rank" size="4" maxlength="2" value="0"><img src="help.png" onclick="FillAndShowHelpDiv(event, '#servers-balance_rank')" width="20" height="20" border="0" alt="HELP" align="TOP"></td></tr>
                        <tr ><td align="right">Balance Offlimits: </td><td align="left"><input type="text" name="balance_trunks_offlimits" size="5" maxlength="4" value="0"><img src="help.png" onclick="FillAndShowHelpDiv(event, '#servers-balance_trunks_offlimits')" width="20" height="20" border="0" alt="HELP" align="TOP"></td></tr>
                        <tr ><td align="right">Telnet Host: </td><td align="left"><input type="text" name="telnet_host" size="20" maxlength="20" value="localhost"><img src="help.png" onclick="FillAndShowHelpDiv(event, '#servers-telnet_host')" width="20" height="20" border="0" alt="HELP" align="TOP"></td></tr>
                        <tr ><td align="right">Telnet Port: </td><td align="left"><input type="text" name="telnet_port" size="6" maxlength="5" value="5038"><img src="help.png" onclick="FillAndShowHelpDiv(event, '#servers-telnet_port')" width="20" height="20" border="0" alt="HELP" align="TOP"></td></tr>
                        <tr ><td align="right">Manager User: </td><td align="left"><input type="text" name="ASTmgrUSERNAME" size="20" maxlength="20" value="cron"><img src="help.png" onclick="FillAndShowHelpDiv(event, '#servers-ASTmgrUSERNAME')" width="20" height="20" border="0" alt="HELP" align="TOP"></td></tr>
                        <tr ><td align="right">Manager Secret: </td><td align="left"><input type="text" name="ASTmgrSECRET" size="20" maxlength="20" value="1234"><img src="help.png" onclick="FillAndShowHelpDiv(event, '#servers-ASTmgrSECRET')" width="20" height="20" border="0" alt="HELP" align="TOP"></td></tr>
                        <tr ><td align="right">Manager Update User: </td><td align="left"><input type="text" name="ASTmgrUSERNAMEupdate" size="20" maxlength="20" value="updatecron"><img src="help.png" onclick="FillAndShowHelpDiv(event, '#servers-ASTmgrUSERNAMEupdate')" width="20" height="20" border="0" alt="HELP" align="TOP"></td></tr>
                        <tr ><td align="right">Manager Listen User: </td><td align="left"><input type="text" name="ASTmgrUSERNAMElisten" size="20" maxlength="20" value="listencron"><img src="help.png" onclick="FillAndShowHelpDiv(event, '#servers-ASTmgrUSERNAMElisten')" width="20" height="20" border="0" alt="HELP" align="TOP"></td></tr>
                        <tr ><td align="right">Manager Send User: </td><td align="left"><input type="text" name="ASTmgrUSERNAMEsend" size="20" maxlength="20" value="sendcron"><img src="help.png" onclick="FillAndShowHelpDiv(event, '#servers-ASTmgrUSERNAMEsend')" width="20" height="20" border="0" alt="HELP" align="TOP"></td></tr>
                        <tr ><td align="right">Conf File Secret: </td><td align="left" style="display:table-cell; vertical-align:middle;" nowrap=""><input type="text" id="reg_pass" name="conf_secret" size="40" maxlength="100" value="977igVSTgV8NcbL" onkeyup="return pwdChanged('reg_pass','reg_pass_img','pass_length','0');"><img src="help.png" onclick="FillAndShowHelpDiv(event, '#servers-conf_secret')" width="20" height="20" border="0" alt="HELP" align="TOP"> &nbsp; &nbsp; <font size="1">Strength:</font> <img id="reg_pass_img" src="https://call3.harmoniecrm.com/vicidial/images/medium.png" style="vertical-align:middle;" onload="return pwdChanged('reg_pass','reg_pass_img','pass_length','0');"> &nbsp; <font size="1"> Length: <span id="pass_length" name="pass_length"><font color="black"><b>15</b></font></span></font></td></tr>
                        <tr ><td align="right">Local GMT: </td><td align="left"><select size="1" name="local_gmt"><option>12.75</option><option>12.00</option><option>11.00</option><option>10.00</option><option>9.50</option><option>9.00</option><option>8.00</option><option>7.00</option><option>6.50</option><option>6.00</option><option>5.75</option><option>5.50</option><option>5.00</option><option>4.50</option><option>4.00</option><option>3.50</option><option>3.00</option><option>2.00</option><option>1.00</option><option>0.00</option><option>-1.00</option><option>-2.00</option><option>-3.00</option><option>-3.50</option><option>-4.00</option><option>-5.00</option><option>-6.00</option><option>-7.00</option><option>-8.00</option><option>-9.00</option><option>-10.00</option><option>-11.00</option><option>-12.00</option><option selected="">-5.00</option></select> (Do NOT Adjust for DST)<img src="help.png" onclick="FillAndShowHelpDiv(event, '#servers-local_gmt')" width="20" height="20" border="0" alt="HELP" align="TOP"></td></tr>
                        <tr ><td align="right">VMail Dump Exten: </td><td align="left"><input type="text" name="voicemail_dump_exten" size="20" maxlength="20" value="85026666666666"><img src="help.png" onclick="FillAndShowHelpDiv(event, '#servers-voicemail_dump_exten')" width="20" height="20" border="0" alt="HELP" align="TOP"></td></tr>
                        <tr ><td align="right">VMail Dump Exten NI: </td><td align="left"><input type="text" name="voicemail_dump_exten_no_inst" size="20" maxlength="20" value="85026666666667"><img src="help.png" onclick="FillAndShowHelpDiv(event, '#servers-voicemail_dump_exten_no_inst')" width="20" height="20" border="0" alt="HELP" align="TOP"></td></tr>
                        <tr ><td align="right">auto dial extension: </td><td align="left"><input type="text" name="answer_transfer_agent" size="20" maxlength="20" value="8365"><img src="help.png" onclick="FillAndShowHelpDiv(event, '#servers-answer_transfer_agent')" width="20" height="20" border="0" alt="HELP" align="TOP"> &nbsp; &nbsp; prefix: <input type="text" name="routing_prefix" size="10" maxlength="10" value="13"><img src="help.png" onclick="FillAndShowHelpDiv(event, '#servers-routing_prefix')" width="20" height="20" border="0" alt="HELP" align="TOP"></td></tr>
                        <tr ><td align="right">Default Context: </td><td align="left"><input type="text" name="ext_context" size="20" maxlength="20" value="default"><img src="help.png" onclick="FillAndShowHelpDiv(event, '#servers-ext_context')" width="20" height="20" border="0" alt="HELP" align="TOP"></td></tr>
                        <tr ><td align="right">System Performance: </td><td align="left"><select size="1" name="sys_perf_log"><option value="Y">Y</option><option value="N">N</option><option value="N" selected="">N</option></select><img src="help.png" onclick="FillAndShowHelpDiv(event, '#servers-sys_perf_log')" width="20" height="20" border="0" alt="HELP" align="TOP"></td></tr>
                        <tr ><td align="right">Server Logs: </td><td align="left"><select size="1" name="vd_server_logs"><option value="Y">Y</option><option value="N">N</option><option value="Y" selected="">Y</option></select><img src="help.png" onclick="FillAndShowHelpDiv(event, '#servers-vd_server_logs')" width="20" height="20" border="0" alt="HELP" align="TOP"></td></tr>
                        <tr ><td align="right">AGI Output: </td><td align="left"><select size="1" name="agi_output"><option value="NONE">NONE</option><option value="STDERR">STDERR</option><option value="FILE">FILE</option><option value="BOTH">BOTH</option><option value="FILE" selected="">FILE</option></select><img src="help.png" onclick="FillAndShowHelpDiv(event, '#servers-agi_output')" width="20" height="20" border="0" alt="HELP" align="TOP"></td></tr>
                        <tr ><td align="right">Carrier Logging Active: </td><td align="left"><select size="1" name="carrier_logging_active"><option value="Y">Y</option><option value="N">N</option><option value="Y" selected="">Y</option></select><img src="help.png" onclick="FillAndShowHelpDiv(event, '#servers-carrier_logging_active')" width="20" height="20" border="0" alt="HELP" align="TOP"></td></tr>
                        <tr ><td align="right">Gather Asterisk Output: </td><td align="left"><select size="1" name="gather_asterisk_output"><option value="Y">Y</option><option value="N">N</option><option value="N" selected="">N</option></select><img src="help.png" onclick="FillAndShowHelpDiv(event, '#servers-gather_asterisk_output')" width="20" height="20" border="0" alt="HELP" align="TOP"></td></tr>
                        <tr ><td align="right">Conf Qualify: </td><td align="left"><select size="1" name="conf_qualify"><option value="Y">Y</option><option value="N">N</option><option value="Y" selected="">Y</option></select><img src="help.png" onclick="FillAndShowHelpDiv(event, '#servers-conf_qualify')" width="20" height="20" border="0" alt="HELP" align="TOP"></td></tr>
                        <tr ><td align="right">Recording Web Link: </td><td align="left"><select size="1" name="recording_web_link"><option value="SERVER_IP">SERVER_IP</option><option value="ALT_IP">ALT_IP</option><option value="EXTERNAL_IP">EXTERNAL_IP</option><option value="SERVER_IP" selected="">SERVER_IP</option></select><img src="help.png" onclick="FillAndShowHelpDiv(event, '#servers-recording_web_link')" width="20" height="20" border="0" alt="HELP" align="TOP"></td></tr>
                        <tr ><td align="right">Alternate Recording Server IP: </td><td align="left"><input type="text" name="alt_server_ip" size="30" maxlength="100" value=""><img src="help.png" onclick="FillAndShowHelpDiv(event, '#servers-alt_server_ip')" width="20" height="20" border="0" alt="HELP" align="TOP"></td></tr>
                        <tr ><td align="right">External Server IP: </td><td align="left"><input type="text" name="external_server_ip" size="30" maxlength="100" value="213.246.45.222"><img src="help.png" onclick="FillAndShowHelpDiv(event, '#servers-external_server_ip')" width="20" height="20" border="0" alt="HELP" align="TOP"></td></tr>
                        <tr ><td align="right">Web Socket URL: </td><td align="left"><input type="text" name="web_socket_url" size="30" maxlength="255" value="wss://call3.harmoniecrm.com:8089/ws"><img src="help.png" onclick="FillAndShowHelpDiv(event, '#servers-web_socket_url')" width="20" height="20" border="0" alt="HELP" align="TOP"></td></tr>
                        <tr ><td align="right">External Web Socket URL: </td><td align="left"><input type="text" name="external_web_socket_url" size="30" maxlength="255" value=""><img src="help.png" onclick="FillAndShowHelpDiv(event, '#servers-external_web_socket_url')" width="20" height="20" border="0" alt="HELP" align="TOP"></td></tr>
                        <tr ><td align="right">Active Twin Server IP: </td><td align="left"><input type="text" name="active_twin_server_ip" size="16" maxlength="15" value=""><img src="help.png" onclick="FillAndShowHelpDiv(event, '#servers-active_twin_server_ip')" width="20" height="20" border="0" alt="HELP" align="TOP"></td></tr>
                        <tr 
                        ><td align="right">Conferencing Engine: </td><td align="left"><select size="1" name="conf_engine"><option value="MEETME">MEETME</option><option value="CONFBRIDGE">CONFBRIDGE</option><option selected="" value="MEETME">MEETME</option></select><img src="help.png" onclick="FillAndShowHelpDiv(event, '#servers-conf_engine')" width="20" height="20" border="0" alt="HELP" align="TOP"></td></tr>
                        <tr 
                        ><td align="right">Conf Update Interval: </td><td align="left"><input type="text" name="conf_update_interval" size="5" maxlength="6" value="60"><img src="help.png" onclick="FillAndShowHelpDiv(event, '#servers-conf_update_interval')" width="20" height="20" border="0" alt="HELP" align="TOP"></td></tr>
                        <tr ><td align="right">Active Asterisk Server: </td><td align="left"><select size="1" name="active_asterisk_server"><option value="Y">Y</option><option value="N">N</option><option selected="" value="Y">Y</option></select><img src="help.png" onclick="FillAndShowHelpDiv(event, '#servers-active_asterisk_server')" width="20" height="20" border="0" alt="HELP" align="TOP"></td></tr>
                        <tr 
                        ><td align="right">Auto-Restart Asterisk: </td><td align="left"> &nbsp; &nbsp; <select size="1" name="auto_restart_asterisk"><option value="Y">Y</option><option value="N">N</option><option selected="" value="N">N</option></select><img src="help.png" onclick="FillAndShowHelpDiv(event, '#servers-auto_restart_asterisk')" width="20" height="20" border="0" alt="HELP" align="TOP"></td></tr>
                        <tr 
                        ><td align="right">Temp No-Restart Asterisk: </td><td align="left"> &nbsp; &nbsp; <select size="1" name="asterisk_temp_no_restart"><option value="Y">Y</option><option value="N">N</option><option selected="" value="N">N</option></select><img src="help.png" onclick="FillAndShowHelpDiv(event, '#servers-asterisk_temp_no_restart')" width="20" height="20" border="0" alt="HELP" align="TOP"></td></tr>
                        <tr ><td align="right">Active Agent Server: </td><td align="left"><select size="1" name="active_agent_login_server"><option value="Y">Y</option><option value="N">N</option><option selected="" value="Y">Y</option></select><img src="help.png" onclick="FillAndShowHelpDiv(event, '#servers-active_agent_login_server')" width="20" height="20" border="0" alt="HELP" align="TOP"></td></tr>
                        <tr ><td align="right">Generate conf files: </td><td align="left"><select size="1" name="generate_vicidial_conf"><option value="Y">Y</option><option value="N">N</option><option selected="" value="Y">Y</option></select><img src="help.png" onclick="FillAndShowHelpDiv(event, '#servers-generate_conf')" width="20" height="20" border="0" alt="HELP" align="TOP"></td></tr>
                        <tr ><td align="right">Rebuild conf files: </td><td align="left"><select size="1" name="rebuild_conf_files"><option value="Y">Y</option><option value="N">N</option><option selected="" value="N">N</option></select><img src="help.png" onclick="FillAndShowHelpDiv(event, '#servers-rebuild_conf_files')" width="20" height="20" border="0" alt="HELP" align="TOP"></td></tr>
                        <tr ><td align="right">Rebuild Music On Hold: </td><td align="left"><select size="1" name="rebuild_music_on_hold"><option value="Y">Y</option><option value="N">N</option><option selected="" value="N">N</option></select><img src="help.png" onclick="FillAndShowHelpDiv(event, '#servers-rebuild_music_on_hold')" width="20" height="20" border="0" alt="HELP" align="TOP"></td></tr>
                        <tr ><td align="right">Sounds Update: </td><td align="left"><select size="1" name="sounds_update"><option value="Y">Y</option><option value="N">N</option><option value="N" selected="">N</option></select><img src="help.png" onclick="FillAndShowHelpDiv(event, '#servers-sounds_update')" width="20" height="20" border="0" alt="HELP" align="TOP"></td></tr>
                        <tr ><td align="right">Recording Limit: </td><td align="left"><input type="text" name="vicidial_recording_limit" size="8" maxlength="6" value="60"><img src="help.png" onclick="FillAndShowHelpDiv(event, '#servers-recording_limit')" width="20" height="20" border="0" alt="HELP" align="TOP"></td></tr>
                        <tr ><td align="center" colspan="2">Custom Dialplan Entry: <img src="help.png" onclick="FillAndShowHelpDiv(event, '#servers-custom_dialplan_entry')" width="20" height="20" border="0" alt="HELP" align="TOP"> <textarea name="custom_dialplan_entry" rows="5" cols="80"></textarea></td></tr>
                        <tr ><td align="center" colspan="2"><input style="" type="submit" name="submit" value="SUBMIT" <="" td=""></td></tr>
                        </tbody></table></center></form>
                        <br><br><b>TRUNKS FOR THIS SERVER: &nbsp; <img src="help.png" onclick="FillAndShowHelpDiv(event, '#server_trunks')" width="20" height="20" border="0" alt="HELP" align="TOP"></b><br>
                        <table width="500" cellspacing="3">
                        <tbody><tr><td> CAMPAIGN</td><td> TRUNKS </td><td> RESTRICTION </td><td> </td><td> DELETE </td></tr>
                        </tbody></table>
                        <br><b>ADD NEW SERVER TRUNK RECORD</b><br><form action="/vicidial/admin.php" method="POST">
                        <input type="hidden" name="ADD" value="221111111111">
                        <input type="hidden" name="server_ip" value="213.246.45.222">
                        TRUNKS: <input size="6" maxlength="4" name="dedicated_trunks"><br>
                        CAMPAIGN: <select size="1" name="campaign_id">
                        <option value="1000101">1000101 - call1_unadev</option>
                        <option value="11111">11111 - cpmpagntest</option>
                        <option value="2000202">2000202 - call2_unadev</option>
                        <option value="550051">550051 - RobotCall</option>
                        <option value="55555">55555 - CompagneTechnique</option>
                        1000101 - call1_unadev 
                        11111 - cpmpagntest 
                        2000202 - call2_unadev 
                        550051 - RobotCall 
                        55555 - CompagneTechnique 

                        </select><br>
                        RESTRICTION: <select size="1" name="trunk_restriction"><option value="MAXIMUM_LIMIT">MAXIMUM_LIMIT</option><option value="OVERFLOW_ALLOWED">OVERFLOW_ALLOWED</option></select><br>
                        <input style="" type="submit" name="submit" value="ADD"><br>
                        </form><br>
                        <center>
                        <br><b>CARRIERS WITHIN THIS SERVER:</b><br>
                        <table width="600" cellspacing="3">
                        <tbody><tr><td>CARRIER ID</td><td>NAME</td><td>REGISTRATION</td><td>ACTIVE</td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=341111111111&amp;carrier_id=Kamero55">Kamero55</a></font></td><td><font size="1">9155_kamero</font></td><td><font size="1"></font></td><td><font size="1">Y</font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=341111111111&amp;carrier_id=9177_FlashCall">9177_FlashCall</a></font></td><td><font size="1">9177_FlashCall</font></td><td><font size="1"></font></td><td><font size="1">Y</font></td></tr>
                        </tbody></table></center><br>
                        <center>
                        <br><b>PHONES WITHIN THIS SERVER:</b><br>
                        <table width="400" cellspacing="3">
                        <tbody><tr><td>EXTENSION</td><td>NAME</td><td>ACTIVE</td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111&amp;extension=7001&amp;server_ip=213.246.45.222">7001</a></font></td><td><font size="1"></font></td><td><font size="1">Y</font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111&amp;extension=7010&amp;server_ip=213.246.45.222">7010</a></font></td><td><font size="1">7010</font></td><td><font size="1">Y</font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111&amp;extension=7002&amp;server_ip=213.246.45.222">7002</a></font></td><td><font size="1">7002</font></td><td><font size="1">Y</font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111&amp;extension=7003&amp;server_ip=213.246.45.222">7003</a></font></td><td><font size="1">7003</font></td><td><font size="1">Y</font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111&amp;extension=7004&amp;server_ip=213.246.45.222">7004</a></font></td><td><font size="1">7004</font></td><td><font size="1">Y</font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111&amp;extension=7005&amp;server_ip=213.246.45.222">7005</a></font></td><td><font size="1">7005</font></td><td><font size="1">Y</font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111&amp;extension=7006&amp;server_ip=213.246.45.222">7006</a></font></td><td><font size="1">7006</font></td><td><font size="1">Y</font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111&amp;extension=7007&amp;server_ip=213.246.45.222">7007</a></font></td><td><font size="1">7007</font></td><td><font size="1">Y</font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111&amp;extension=7008&amp;server_ip=213.246.45.222">7008</a></font></td><td><font size="1">7008</font></td><td><font size="1">Y</font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111&amp;extension=7009&amp;server_ip=213.246.45.222">7009</a></font></td><td><font size="1">7009</font></td><td><font size="1">Y</font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111&amp;extension=7011&amp;server_ip=213.246.45.222">7011</a></font></td><td><font size="1">7011</font></td><td><font size="1">Y</font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111&amp;extension=7012&amp;server_ip=213.246.45.222">7012</a></font></td><td><font size="1">7012</font></td><td><font size="1">Y</font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111&amp;extension=7021&amp;server_ip=213.246.45.222">7021</a></font></td><td><font size="1">7021</font></td><td><font size="1">Y</font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111&amp;extension=7016&amp;server_ip=213.246.45.222">7016</a></font></td><td><font size="1">7016</font></td><td><font size="1">Y</font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111&amp;extension=7015&amp;server_ip=213.246.45.222">7015</a></font></td><td><font size="1">7015</font></td><td><font size="1">Y</font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111&amp;extension=6677&amp;server_ip=213.246.45.222">6677</a></font></td><td><font size="1">Maziane</font></td><td><font size="1">Y</font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111&amp;extension=7017&amp;server_ip=213.246.45.222">7017</a></font></td><td><font size="1">7017</font></td><td><font size="1">Y</font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111&amp;extension=7018&amp;server_ip=213.246.45.222">7018</a></font></td><td><font size="1">7018</font></td><td><font size="1">Y</font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111&amp;extension=7019&amp;server_ip=213.246.45.222">7019</a></font></td><td><font size="1">7019</font></td><td><font size="1">Y</font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111&amp;extension=3001&amp;server_ip=213.246.45.222">3001</a></font></td><td><font size="1">3001</font></td><td><font size="1">Y</font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111&amp;extension=3002&amp;server_ip=213.246.45.222">3002</a></font></td><td><font size="1">3002</font></td><td><font size="1">Y</font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111&amp;extension=4455&amp;server_ip=213.246.45.222">4455</a></font></td><td><font size="1">noufel</font></td><td><font size="1">Y</font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111&amp;extension=8899&amp;server_ip=213.246.45.222">8899</a></font></td><td><font size="1">8899</font></td><td><font size="1">Y</font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111&amp;extension=7013&amp;server_ip=213.246.45.222">7013</a></font></td><td><font size="1">7013</font></td><td><font size="1">Y</font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111&amp;extension=7014&amp;server_ip=213.246.45.222">7014</a></font></td><td><font size="1">7014</font></td><td><font size="1">Y</font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111&amp;extension=7788&amp;server_ip=213.246.45.222">7788</a></font></td><td><font size="1">7788</font></td><td><font size="1">Y</font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111&amp;extension=5555&amp;server_ip=213.246.45.222">5555</a></font></td><td><font size="1">5555</font></td><td><font size="1">Y</font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111&amp;extension=7022&amp;server_ip=213.246.45.222">7022</a></font></td><td><font size="1">7022</font></td><td><font size="1">Y</font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111&amp;extension=0000&amp;server_ip=213.246.45.222">0000</a></font></td><td><font size="1">0000</font></td><td><font size="1">Y</font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111&amp;extension=7024&amp;server_ip=213.246.45.222">7024</a></font></td><td><font size="1">7024</font></td><td><font size="1">Y</font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111&amp;extension=7025&amp;server_ip=213.246.45.222">7025</a></font></td><td><font size="1">7025</font></td><td><font size="1">Y</font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111&amp;extension=7026&amp;server_ip=213.246.45.222">7026</a></font></td><td><font size="1">7026</font></td><td><font size="1">Y</font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111&amp;extension=7027&amp;server_ip=213.246.45.222">7027</a></font></td><td><font size="1">7027</font></td><td><font size="1">Y</font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111&amp;extension=7028&amp;server_ip=213.246.45.222">7028</a></font></td><td><font size="1">7028</font></td><td><font size="1">Y</font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111&amp;extension=7029&amp;server_ip=213.246.45.222">7029</a></font></td><td><font size="1">7029</font></td><td><font size="1">Y</font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111&amp;extension=7030&amp;server_ip=213.246.45.222">7030</a></font></td><td><font size="1">7030</font></td><td><font size="1">Y</font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111&amp;extension=1010&amp;server_ip=213.246.45.222">1010</a></font></td><td><font size="1">1010</font></td><td><font size="1">Y</font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111&amp;extension=7023&amp;server_ip=213.246.45.222">7023</a></font></td><td><font size="1">7023</font></td><td><font size="1">Y</font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111&amp;extension=1111&amp;server_ip=213.246.45.222">1111</a></font></td><td><font size="1">1111</font></td><td><font size="1">Y</font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111&amp;extension=2020&amp;server_ip=213.246.45.222">2020</a></font></td><td><font size="1">2020</font></td><td><font size="1">Y</font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111&amp;extension=7020&amp;server_ip=213.246.45.222">7020</a></font></td><td><font size="1">7020</font></td><td><font size="1">Y</font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111&amp;extension=1011&amp;server_ip=213.246.45.222">1011</a></font></td><td><font size="1">1011</font></td><td><font size="1">Y</font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111&amp;extension=3003&amp;server_ip=213.246.45.222">3003</a></font></td><td><font size="1">3003</font></td><td><font size="1">Y</font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111&amp;extension=99999999&amp;server_ip=213.246.45.222">99999999</a></font></td><td><font size="1">99999999</font></td><td><font size="1">Y</font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111&amp;extension=2525256666&amp;server_ip=213.246.45.222">2525256666</a></font></td><td><font size="1">2525256666</font></td><td><font size="1">Y</font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111&amp;extension=5005&amp;server_ip=213.246.45.222">5005</a></font></td><td><font size="1">aissa</font></td><td><font size="1">Y</font></td></tr>
                        </tbody></table></center><br>
                        <center>
                        <br><b>CONFERENCES WITHIN THIS SERVER:</b><br>
                        <table width="400" cellspacing="3">
                        <tbody><tr><td>CONFERENCE</td><td>EXTENSION</td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=3111111111111&amp;conf_exten=8600001&amp;server_ip=213.246.45.222">8600001</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=3111111111111&amp;conf_exten=8600002&amp;server_ip=213.246.45.222">8600002</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=3111111111111&amp;conf_exten=8600003&amp;server_ip=213.246.45.222">8600003</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=3111111111111&amp;conf_exten=8600004&amp;server_ip=213.246.45.222">8600004</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=3111111111111&amp;conf_exten=8600005&amp;server_ip=213.246.45.222">8600005</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=3111111111111&amp;conf_exten=8600006&amp;server_ip=213.246.45.222">8600006</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=3111111111111&amp;conf_exten=8600007&amp;server_ip=213.246.45.222">8600007</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=3111111111111&amp;conf_exten=8600008&amp;server_ip=213.246.45.222">8600008</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=3111111111111&amp;conf_exten=8600009&amp;server_ip=213.246.45.222">8600009</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=3111111111111&amp;conf_exten=8600010&amp;server_ip=213.246.45.222">8600010</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=3111111111111&amp;conf_exten=8600011&amp;server_ip=213.246.45.222">8600011</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=3111111111111&amp;conf_exten=8600012&amp;server_ip=213.246.45.222">8600012</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=3111111111111&amp;conf_exten=8600013&amp;server_ip=213.246.45.222">8600013</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=3111111111111&amp;conf_exten=8600014&amp;server_ip=213.246.45.222">8600014</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=3111111111111&amp;conf_exten=8600015&amp;server_ip=213.246.45.222">8600015</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=3111111111111&amp;conf_exten=8600016&amp;server_ip=213.246.45.222">8600016</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=3111111111111&amp;conf_exten=8600017&amp;server_ip=213.246.45.222">8600017</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=3111111111111&amp;conf_exten=8600018&amp;server_ip=213.246.45.222">8600018</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=3111111111111&amp;conf_exten=8600019&amp;server_ip=213.246.45.222">8600019</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=3111111111111&amp;conf_exten=8600020&amp;server_ip=213.246.45.222">8600020</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=3111111111111&amp;conf_exten=8600021&amp;server_ip=213.246.45.222">8600021</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=3111111111111&amp;conf_exten=8600022&amp;server_ip=213.246.45.222">8600022</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=3111111111111&amp;conf_exten=8600023&amp;server_ip=213.246.45.222">8600023</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=3111111111111&amp;conf_exten=8600024&amp;server_ip=213.246.45.222">8600024</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=3111111111111&amp;conf_exten=8600025&amp;server_ip=213.246.45.222">8600025</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=3111111111111&amp;conf_exten=8600026&amp;server_ip=213.246.45.222">8600026</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=3111111111111&amp;conf_exten=8600027&amp;server_ip=213.246.45.222">8600027</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=3111111111111&amp;conf_exten=8600028&amp;server_ip=213.246.45.222">8600028</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=3111111111111&amp;conf_exten=8600029&amp;server_ip=213.246.45.222">8600029</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=3111111111111&amp;conf_exten=8600030&amp;server_ip=213.246.45.222">8600030</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=3111111111111&amp;conf_exten=8600031&amp;server_ip=213.246.45.222">8600031</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=3111111111111&amp;conf_exten=8600032&amp;server_ip=213.246.45.222">8600032</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=3111111111111&amp;conf_exten=8600033&amp;server_ip=213.246.45.222">8600033</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=3111111111111&amp;conf_exten=8600034&amp;server_ip=213.246.45.222">8600034</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=3111111111111&amp;conf_exten=8600035&amp;server_ip=213.246.45.222">8600035</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=3111111111111&amp;conf_exten=8600036&amp;server_ip=213.246.45.222">8600036</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=3111111111111&amp;conf_exten=8600037&amp;server_ip=213.246.45.222">8600037</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=3111111111111&amp;conf_exten=8600038&amp;server_ip=213.246.45.222">8600038</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=3111111111111&amp;conf_exten=8600039&amp;server_ip=213.246.45.222">8600039</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=3111111111111&amp;conf_exten=8600040&amp;server_ip=213.246.45.222">8600040</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=3111111111111&amp;conf_exten=8600041&amp;server_ip=213.246.45.222">8600041</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=3111111111111&amp;conf_exten=8600042&amp;server_ip=213.246.45.222">8600042</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=3111111111111&amp;conf_exten=8600043&amp;server_ip=213.246.45.222">8600043</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=3111111111111&amp;conf_exten=8600044&amp;server_ip=213.246.45.222">8600044</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=3111111111111&amp;conf_exten=8600045&amp;server_ip=213.246.45.222">8600045</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=3111111111111&amp;conf_exten=8600046&amp;server_ip=213.246.45.222">8600046</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=3111111111111&amp;conf_exten=8600047&amp;server_ip=213.246.45.222">8600047</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=3111111111111&amp;conf_exten=8600048&amp;server_ip=213.246.45.222">8600048</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=3111111111111&amp;conf_exten=8600049&amp;server_ip=213.246.45.222">8600049</a></font></td><td><font size="1"></font></td></tr>
                        </tbody></table></center><br>
                        <center>
                        <br><b>AGENT CONFERENCES WITHIN THIS SERVER:</b><br>
                        <table width="400" cellspacing="3">
                        <tbody><tr><td>VD CONFERENCE</td><td>EXTENSION</td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600051&amp;server_ip=213.246.45.222">8600051</a></font></td><td><font size="1">SIP/7002</font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600052&amp;server_ip=213.246.45.222">8600052</a></font></td><td><font size="1">SIP/7005</font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600053&amp;server_ip=213.246.45.222">8600053</a></font></td><td><font size="1">SIP/7029</font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600054&amp;server_ip=213.246.45.222">8600054</a></font></td><td><font size="1">SIP/7020</font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600055&amp;server_ip=213.246.45.222">8600055</a></font></td><td><font size="1">SIP/7023</font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600056&amp;server_ip=213.246.45.222">8600056</a></font></td><td><font size="1">SIP/7028</font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600057&amp;server_ip=213.246.45.222">8600057</a></font></td><td><font size="1">SIP/7015</font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600058&amp;server_ip=213.246.45.222">8600058</a></font></td><td><font size="1">SIP/7006</font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600059&amp;server_ip=213.246.45.222">8600059</a></font></td><td><font size="1">SIP/7008</font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600060&amp;server_ip=213.246.45.222">8600060</a></font></td><td><font size="1">SIP/7012</font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600061&amp;server_ip=213.246.45.222">8600061</a></font></td><td><font size="1">SIP/3001</font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600062&amp;server_ip=213.246.45.222">8600062</a></font></td><td><font size="1">SIP/7009</font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600063&amp;server_ip=213.246.45.222">8600063</a></font></td><td><font size="1">SIP/7019</font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600064&amp;server_ip=213.246.45.222">8600064</a></font></td><td><font size="1">SIP/7016</font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600065&amp;server_ip=213.246.45.222">8600065</a></font></td><td><font size="1">SIP/7001</font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600066&amp;server_ip=213.246.45.222">8600066</a></font></td><td><font size="1">SIP/7013</font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600067&amp;server_ip=213.246.45.222">8600067</a></font></td><td><font size="1">SIP/7024</font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600068&amp;server_ip=213.246.45.222">8600068</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600069&amp;server_ip=213.246.45.222">8600069</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600070&amp;server_ip=213.246.45.222">8600070</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600071&amp;server_ip=213.246.45.222">8600071</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600072&amp;server_ip=213.246.45.222">8600072</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600073&amp;server_ip=213.246.45.222">8600073</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600074&amp;server_ip=213.246.45.222">8600074</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600075&amp;server_ip=213.246.45.222">8600075</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600076&amp;server_ip=213.246.45.222">8600076</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600077&amp;server_ip=213.246.45.222">8600077</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600078&amp;server_ip=213.246.45.222">8600078</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600079&amp;server_ip=213.246.45.222">8600079</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600080&amp;server_ip=213.246.45.222">8600080</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600081&amp;server_ip=213.246.45.222">8600081</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600082&amp;server_ip=213.246.45.222">8600082</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600083&amp;server_ip=213.246.45.222">8600083</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600084&amp;server_ip=213.246.45.222">8600084</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600085&amp;server_ip=213.246.45.222">8600085</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600086&amp;server_ip=213.246.45.222">8600086</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600087&amp;server_ip=213.246.45.222">8600087</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600088&amp;server_ip=213.246.45.222">8600088</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600089&amp;server_ip=213.246.45.222">8600089</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600090&amp;server_ip=213.246.45.222">8600090</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600091&amp;server_ip=213.246.45.222">8600091</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600092&amp;server_ip=213.246.45.222">8600092</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600093&amp;server_ip=213.246.45.222">8600093</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600094&amp;server_ip=213.246.45.222">8600094</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600095&amp;server_ip=213.246.45.222">8600095</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600096&amp;server_ip=213.246.45.222">8600096</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600097&amp;server_ip=213.246.45.222">8600097</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600098&amp;server_ip=213.246.45.222">8600098</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600099&amp;server_ip=213.246.45.222">8600099</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600100&amp;server_ip=213.246.45.222">8600100</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600101&amp;server_ip=213.246.45.222">8600101</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600102&amp;server_ip=213.246.45.222">8600102</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600103&amp;server_ip=213.246.45.222">8600103</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600104&amp;server_ip=213.246.45.222">8600104</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600105&amp;server_ip=213.246.45.222">8600105</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600106&amp;server_ip=213.246.45.222">8600106</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600107&amp;server_ip=213.246.45.222">8600107</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600108&amp;server_ip=213.246.45.222">8600108</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600109&amp;server_ip=213.246.45.222">8600109</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600110&amp;server_ip=213.246.45.222">8600110</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600111&amp;server_ip=213.246.45.222">8600111</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600112&amp;server_ip=213.246.45.222">8600112</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600113&amp;server_ip=213.246.45.222">8600113</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600114&amp;server_ip=213.246.45.222">8600114</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600115&amp;server_ip=213.246.45.222">8600115</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600116&amp;server_ip=213.246.45.222">8600116</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600117&amp;server_ip=213.246.45.222">8600117</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600118&amp;server_ip=213.246.45.222">8600118</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600119&amp;server_ip=213.246.45.222">8600119</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600120&amp;server_ip=213.246.45.222">8600120</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600121&amp;server_ip=213.246.45.222">8600121</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600122&amp;server_ip=213.246.45.222">8600122</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600123&amp;server_ip=213.246.45.222">8600123</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600124&amp;server_ip=213.246.45.222">8600124</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600125&amp;server_ip=213.246.45.222">8600125</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600126&amp;server_ip=213.246.45.222">8600126</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600127&amp;server_ip=213.246.45.222">8600127</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600128&amp;server_ip=213.246.45.222">8600128</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600129&amp;server_ip=213.246.45.222">8600129</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600130&amp;server_ip=213.246.45.222">8600130</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600131&amp;server_ip=213.246.45.222">8600131</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600132&amp;server_ip=213.246.45.222">8600132</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600133&amp;server_ip=213.246.45.222">8600133</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600134&amp;server_ip=213.246.45.222">8600134</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600135&amp;server_ip=213.246.45.222">8600135</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600136&amp;server_ip=213.246.45.222">8600136</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600137&amp;server_ip=213.246.45.222">8600137</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600138&amp;server_ip=213.246.45.222">8600138</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600139&amp;server_ip=213.246.45.222">8600139</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600140&amp;server_ip=213.246.45.222">8600140</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600141&amp;server_ip=213.246.45.222">8600141</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600142&amp;server_ip=213.246.45.222">8600142</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600143&amp;server_ip=213.246.45.222">8600143</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600144&amp;server_ip=213.246.45.222">8600144</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600145&amp;server_ip=213.246.45.222">8600145</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600146&amp;server_ip=213.246.45.222">8600146</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600147&amp;server_ip=213.246.45.222">8600147</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600148&amp;server_ip=213.246.45.222">8600148</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600149&amp;server_ip=213.246.45.222">8600149</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600150&amp;server_ip=213.246.45.222">8600150</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600151&amp;server_ip=213.246.45.222">8600151</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600152&amp;server_ip=213.246.45.222">8600152</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600153&amp;server_ip=213.246.45.222">8600153</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600154&amp;server_ip=213.246.45.222">8600154</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600155&amp;server_ip=213.246.45.222">8600155</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600156&amp;server_ip=213.246.45.222">8600156</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600157&amp;server_ip=213.246.45.222">8600157</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600158&amp;server_ip=213.246.45.222">8600158</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600159&amp;server_ip=213.246.45.222">8600159</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600160&amp;server_ip=213.246.45.222">8600160</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600161&amp;server_ip=213.246.45.222">8600161</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600162&amp;server_ip=213.246.45.222">8600162</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600163&amp;server_ip=213.246.45.222">8600163</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600164&amp;server_ip=213.246.45.222">8600164</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600165&amp;server_ip=213.246.45.222">8600165</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600166&amp;server_ip=213.246.45.222">8600166</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600167&amp;server_ip=213.246.45.222">8600167</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600168&amp;server_ip=213.246.45.222">8600168</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600169&amp;server_ip=213.246.45.222">8600169</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600170&amp;server_ip=213.246.45.222">8600170</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600171&amp;server_ip=213.246.45.222">8600171</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600172&amp;server_ip=213.246.45.222">8600172</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600173&amp;server_ip=213.246.45.222">8600173</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600174&amp;server_ip=213.246.45.222">8600174</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600175&amp;server_ip=213.246.45.222">8600175</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600176&amp;server_ip=213.246.45.222">8600176</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600177&amp;server_ip=213.246.45.222">8600177</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600178&amp;server_ip=213.246.45.222">8600178</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600179&amp;server_ip=213.246.45.222">8600179</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600180&amp;server_ip=213.246.45.222">8600180</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600181&amp;server_ip=213.246.45.222">8600181</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600182&amp;server_ip=213.246.45.222">8600182</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600183&amp;server_ip=213.246.45.222">8600183</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600184&amp;server_ip=213.246.45.222">8600184</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600185&amp;server_ip=213.246.45.222">8600185</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600186&amp;server_ip=213.246.45.222">8600186</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600187&amp;server_ip=213.246.45.222">8600187</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600188&amp;server_ip=213.246.45.222">8600188</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600189&amp;server_ip=213.246.45.222">8600189</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600190&amp;server_ip=213.246.45.222">8600190</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600191&amp;server_ip=213.246.45.222">8600191</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600192&amp;server_ip=213.246.45.222">8600192</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600193&amp;server_ip=213.246.45.222">8600193</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600194&amp;server_ip=213.246.45.222">8600194</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600195&amp;server_ip=213.246.45.222">8600195</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600196&amp;server_ip=213.246.45.222">8600196</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600197&amp;server_ip=213.246.45.222">8600197</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600198&amp;server_ip=213.246.45.222">8600198</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600199&amp;server_ip=213.246.45.222">8600199</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600200&amp;server_ip=213.246.45.222">8600200</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600201&amp;server_ip=213.246.45.222">8600201</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600202&amp;server_ip=213.246.45.222">8600202</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600203&amp;server_ip=213.246.45.222">8600203</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600204&amp;server_ip=213.246.45.222">8600204</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600205&amp;server_ip=213.246.45.222">8600205</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600206&amp;server_ip=213.246.45.222">8600206</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600207&amp;server_ip=213.246.45.222">8600207</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600208&amp;server_ip=213.246.45.222">8600208</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600209&amp;server_ip=213.246.45.222">8600209</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600210&amp;server_ip=213.246.45.222">8600210</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600211&amp;server_ip=213.246.45.222">8600211</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600212&amp;server_ip=213.246.45.222">8600212</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600213&amp;server_ip=213.246.45.222">8600213</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600214&amp;server_ip=213.246.45.222">8600214</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600215&amp;server_ip=213.246.45.222">8600215</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600216&amp;server_ip=213.246.45.222">8600216</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600217&amp;server_ip=213.246.45.222">8600217</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600218&amp;server_ip=213.246.45.222">8600218</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600219&amp;server_ip=213.246.45.222">8600219</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600220&amp;server_ip=213.246.45.222">8600220</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600221&amp;server_ip=213.246.45.222">8600221</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600222&amp;server_ip=213.246.45.222">8600222</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600223&amp;server_ip=213.246.45.222">8600223</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600224&amp;server_ip=213.246.45.222">8600224</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600225&amp;server_ip=213.246.45.222">8600225</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600226&amp;server_ip=213.246.45.222">8600226</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600227&amp;server_ip=213.246.45.222">8600227</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600228&amp;server_ip=213.246.45.222">8600228</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600229&amp;server_ip=213.246.45.222">8600229</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600230&amp;server_ip=213.246.45.222">8600230</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600231&amp;server_ip=213.246.45.222">8600231</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600232&amp;server_ip=213.246.45.222">8600232</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600233&amp;server_ip=213.246.45.222">8600233</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600234&amp;server_ip=213.246.45.222">8600234</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600235&amp;server_ip=213.246.45.222">8600235</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600236&amp;server_ip=213.246.45.222">8600236</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600237&amp;server_ip=213.246.45.222">8600237</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600238&amp;server_ip=213.246.45.222">8600238</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600239&amp;server_ip=213.246.45.222">8600239</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600240&amp;server_ip=213.246.45.222">8600240</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600241&amp;server_ip=213.246.45.222">8600241</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600242&amp;server_ip=213.246.45.222">8600242</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600243&amp;server_ip=213.246.45.222">8600243</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600244&amp;server_ip=213.246.45.222">8600244</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600245&amp;server_ip=213.246.45.222">8600245</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600246&amp;server_ip=213.246.45.222">8600246</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600247&amp;server_ip=213.246.45.222">8600247</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600248&amp;server_ip=213.246.45.222">8600248</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600249&amp;server_ip=213.246.45.222">8600249</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600250&amp;server_ip=213.246.45.222">8600250</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600251&amp;server_ip=213.246.45.222">8600251</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600252&amp;server_ip=213.246.45.222">8600252</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600253&amp;server_ip=213.246.45.222">8600253</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600254&amp;server_ip=213.246.45.222">8600254</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600255&amp;server_ip=213.246.45.222">8600255</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600256&amp;server_ip=213.246.45.222">8600256</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600257&amp;server_ip=213.246.45.222">8600257</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600258&amp;server_ip=213.246.45.222">8600258</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600259&amp;server_ip=213.246.45.222">8600259</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600260&amp;server_ip=213.246.45.222">8600260</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600261&amp;server_ip=213.246.45.222">8600261</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600262&amp;server_ip=213.246.45.222">8600262</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600263&amp;server_ip=213.246.45.222">8600263</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600264&amp;server_ip=213.246.45.222">8600264</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600265&amp;server_ip=213.246.45.222">8600265</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600266&amp;server_ip=213.246.45.222">8600266</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600267&amp;server_ip=213.246.45.222">8600267</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600268&amp;server_ip=213.246.45.222">8600268</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600269&amp;server_ip=213.246.45.222">8600269</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600270&amp;server_ip=213.246.45.222">8600270</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600271&amp;server_ip=213.246.45.222">8600271</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600272&amp;server_ip=213.246.45.222">8600272</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600273&amp;server_ip=213.246.45.222">8600273</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600274&amp;server_ip=213.246.45.222">8600274</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600275&amp;server_ip=213.246.45.222">8600275</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600276&amp;server_ip=213.246.45.222">8600276</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600277&amp;server_ip=213.246.45.222">8600277</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600278&amp;server_ip=213.246.45.222">8600278</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600279&amp;server_ip=213.246.45.222">8600279</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600280&amp;server_ip=213.246.45.222">8600280</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600281&amp;server_ip=213.246.45.222">8600281</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600282&amp;server_ip=213.246.45.222">8600282</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600283&amp;server_ip=213.246.45.222">8600283</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600284&amp;server_ip=213.246.45.222">8600284</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600285&amp;server_ip=213.246.45.222">8600285</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600286&amp;server_ip=213.246.45.222">8600286</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600287&amp;server_ip=213.246.45.222">8600287</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600288&amp;server_ip=213.246.45.222">8600288</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600289&amp;server_ip=213.246.45.222">8600289</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600290&amp;server_ip=213.246.45.222">8600290</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600291&amp;server_ip=213.246.45.222">8600291</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600292&amp;server_ip=213.246.45.222">8600292</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600293&amp;server_ip=213.246.45.222">8600293</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600294&amp;server_ip=213.246.45.222">8600294</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600295&amp;server_ip=213.246.45.222">8600295</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600296&amp;server_ip=213.246.45.222">8600296</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600297&amp;server_ip=213.246.45.222">8600297</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600298&amp;server_ip=213.246.45.222">8600298</a></font></td><td><font size="1"></font></td></tr>
                        <tr ><td><font size="1"><a href="/vicidial/admin.php?ADD=31111111111111&amp;conf_exten=8600299&amp;server_ip=213.246.45.222">8600299</a></font></td><td><font size="1"></font></td></tr>
                        </tbody></table></center><br>
                        <center>
                        <br><b>AGENT CONFBRIDGES WITHIN THIS SERVER:</b><br>
                        <table width="400" cellspacing="3">
                        <tbody><tr><td>VD CONFBRIDGE</td><td>EXTENSION</td></tr>
                        </tbody></table></center><br>
                        <center><b>
                        This server has 2 active carriers and 0 inactive carriers<br><br>
                        This server has 46 active phones and 0 inactive phones<br><br>
                        This server has 49 active conferences<br><br>
                        This server has 0 active vicidial conferences<br><br>
                        </b></center>
                        <br><br><a href="/vicidial/admin.php?ADD=521111111111&amp;server_id=harmoniecl&amp;server_ip=213.246.45.222">CLEAR ALL AGENT CONFERENCES</a>
                        <br><br><a href="/vicidial/admin.php?ADD=511111111111&amp;server_id=harmoniecl&amp;server_ip=213.246.45.222">DELETE THIS SERVER</a>
                        <br><br><a href="/vicidial/admin.php?ADD=720000000000000&amp;category=SERVERS&amp;stage=harmoniecl">Click here to see Admin changes to this server</a></font><a href="/vicidial/admin.php?ADD=720000000000000&amp;category=SERVERS&amp;stage=harmoniecl">
                        </a></td></tr>
                        </tbody>
                        </table>
               </div>
            </div>
        </div>
    </div>
    </div>
    <!-- END ROW -->




@endsection



