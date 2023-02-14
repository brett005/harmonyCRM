@extends('base')
@section('css')
<link rel="stylesheet" href="{{asset('assets/agents/index.css')}}">

<link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" rel="stylesheet">
<link rel='stylesheet' href='https://unpkg.com/@fullcalendar/core@4.3.1/main.min.css'/>
<link rel='stylesheet' href='https://unpkg.com/@fullcalendar/daygrid@4.3.0/main.min.css' />
<link rel='stylesheet' href='https://unpkg.com/@fullcalendar/timegrid@4.3.0/main.min.css' />
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{asset('assets/agents/metro-all.min.css')}}">
<style type="text/css">
    td.sorting_desc_disabled {
    cursor: pointer;
    position: relative;
    padding-right: 20px;
    }
    .container .card {
      max-width: 1100px;
      height: 6000px;
      background-color: white;
      margin: 0 auto;
    }
    .content {
      margin: 0px auto;
      text-align: left;
      color: #666;
      font-size: 13px;
      line-height: 20px;
      position: relative;
      height: 1000px;
      box-shadow: 0 2px 3px rgba(10, 10, 10, 0.1), 0 0 0 1px rgba(10, 10, 10, 0.1);
      display: block;
      padding: 0.5rem;
      z-index: -2;
    }
    /* style 1 */
    .sidebar.top {
        left: 0;
        right: 0;
        top: -1000000px;
        background: #fff;
        display: none;
    }

    .sidebars>.sidebar {
        box-shadow: 5px 0 5px rgba(0, 0, 0, 0.64);
        position: fixed;
        z-index: 9999;
    }
    /* style 2 */
    #all-time{
        font-family: 'Jazz LET';
        font-size: 45px;
        margin: 10px auto;
        width: 305px;
        text-align: left;
        padding: 0px;
        animation: flux 2s linear infinite;
        -moz-animation: flux 0.9s linear infinite;
        -webkit-animation: flux 0.9s linear infinite;
        -o-animation: flux 0.9s linear infinite;
        }

    @keyframes flux {
    0%,
    100% {
        text-shadow: 0 0 1vw #1041FF, 0 0 0vw #1041FF, 0 0 0vw #1041FF, 0 0 0vw #1041FF, 0 0 .4vw #8BFDFE, .5vw .5vw .9vw #147280;
        color: #28D7FE;
    }
    50% {
        text-shadow: 0 0 .5vw #082180, 0 0 1.5vw #082180, 0 0 5vw #082180, 0 0 5vw #082180, 0 0 .2vw #082180, .5vw .5vw .9vw #0A3940;
        color: #146C80;
    }
    }

    #extra-min {
        margin-left: 1%;
    }
    /* style 3 */
    .col { float: left; width: 20%; min-width: 100px; text-align: center }
    .clear { clear: both; }

</style>
@endsection
@section('title')
ACCUEIL
@endsection
@section('content')


           
<!-- BEGIN QUICK SIDEBAR -->
<aside class="app-sidebar">
    <div class="app-sidebar__logo">
     <a class="header-brand" href="index">
     <img src="{{ asset('assets/images/brand/aa.png')}}" class="header-brand-img desktop-lgo" alt="">
           <img src="{{ asset('assets/images/brand/aa.png')}}" class="header-brand-img dark-logo" alt="">
           <img src="{{ asset('assets/images/brand/aa.png')}}" class="header-brand-img mobile-logo" alt="">
          <img src="{{ asset('assets/images/brand/aa.png')}}" class="header-brand-img darkmobile-logo" alt="">
     </a>
   </div>
<a href="javascript:;" class="page-quick-sidebar-toggler">
    <i class="icon-bubbles"></i>
</a>
<div class="app-sidebar3">
  <div class="main-menu">
        <div class="app-sidebar__user">
            <div class="dropdown user-pro-body text-center">
                <div class="user-pic">
                  <img src="{{ asset('images/agent.jpg')}}" alt="user-img" class="avatar-xxl rounded-circle mb-1">
                 </div>

                <!-- BEGIN PROFILE SIDEBAR -->
    
                    <!-- PORTLET MAIN -->
               
                        <!-- SIDEBAR USERPIC -->
                      

                        <!-- END SIDEBAR USERPIC -->
                        <!-- SIDEBAR USER TITLE -->
                        <div class="profile-usertitle">
                            <div class="profile-usertitle-name"> {{Session::get('user')}} </div>
                            <div class="profile-usertitle-job">
                                <p><i class="icon-earphones-alt"></i> Poste : {{Session::get('phone_login')}}</p>
                                <p><i class="icon-user-following"></i> Compagne : {{Session::get('campaign')}}</p>
                                <div style="margin-left: 50px;" id="timePAUSED"></div> 

                            </div>
                         

                        </div>
                        <!-- END SIDEBAR USER TITLE -->
                        <!-- SIDEBAR BUTTONS -->
                        <div class="profile-userbuttons">
                            <button type="button" data-value="PAUSED"
                                    class="btn btn-circle green-haze btn-sm  agentStatusButton">Démarrer la production
                            </button>
                        </div>
            </div>
      </div>    
   </div>
</div>
                            
                            <div class="timePAUSEDDiv">
                                
                            </div>
                                  
                        </div>
                        <!-- END SIDEBAR BUTTONS -->
                        <!-- SIDEBAR MENU -->
                        <div class="profile-usermenu">
                            
                        </div>
                        <!-- END MENU -->
                    </div>
                 

                </div>

                <!-- END BEGIN PROFILE SIDEBAR -->
                <!-- BEGIN PROFILE CONTENT -->
                <div class="page-header d-xl-flex d-block">
                            <div class="page-leftheader">
                                <div class="page-title">Agent<span class="font-weight-normal text-muted ms-2">Dashboard</span></div>
                            </div>
                            <div class="page-rightheader ms-md-auto">
                                <div class="d-flex align-items-end flex-wrap my-auto end-content breadcrumb-end">
                                    <div class="btn-list">
                                        <button  class="btn btn-light" data-bs-toggle="tooltip" data-bs-placement="top" title="E-mail"> <i class="feather feather-mail"></i> </button>
                                        <button  class="btn btn-light" data-bs-placement="top" data-bs-toggle="tooltip" title="Contact"> <i class="feather feather-phone-call"></i> </button>
                                        <button  class="btn btn-primary" data-bs-placement="top" data-bs-toggle="tooltip" title="Info"> <i class="feather feather-info"></i> </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <div class="row">
                     <div class="col-xxl-12 col-xl-3 col-lg-3 col-md-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-8">
                                                <div class="details">
                                                    <div class="number">
                                                        <span data-counter="" data-value=""><span id="nbrArgumente"></span></span>
                                                    </div>
                                                    <div class="desc">Argumenté</div>
                                                </div>
                                                    <span class="more" href="javascript:;">
                                                <span id="prctArgumente"></span>
                                                % des Appels <!--i class="m-icon-swapright m-icon-white"></i-->
                                               </span>
                                          </div>
                                     </div>
                             </div>
                     </div>
                        <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-8">
                                             <div class="details">
                                                <div class="number">
                                                    <span data-counter="" data-value=""><span id="nbrPositif"></span></span>
                                                </div>
                                                  <div class="desc">Positif</div>
                                                </div>
                                </div>
                                                <div class="mt-0 text-start"> <span class="font-weight-semibold">Positif</span>
                                                <h3 class="mb-0 mt-1 text-secondary mb-2">$82,7853</h3> </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="icon1 bg-secondary my-auto  float-end"> <i class="las la-hand-holding-usd"></i> </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-8">
                                                <div class="mt-0 text-start"> <span class="font-weight-semibold">Non Argumenté</span>
                                                    <h3 class="mb-0 mt-1 text-primary mb-2">124</h3>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="icon1 bg-danger my-auto  float-endicon1 bg-danger my-auto  float-end"> <i class="las la-building"></i> </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-8">
                                                <div class="mt-0 text-start"> <span class="font-weight-semibold">Non Argumenté</span>
                                                    <h3 class="mb-0 mt-1 text-primary mb-2">124</h3>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="icon1 bg-danger my-auto  float-endicon1 bg-danger my-auto  float-end"> <i class="las la-building"></i> </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                    <div class="row">

                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 sortable">
                            <div class="dashboard-stat purple">
                                <div class="visual">
                                    <i class="fa fa-clock-o"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        <span data-counter="" data-value="89"></span><span
                                                id="presenceTime"></span>
                                    </div>
                                    <div class="desc">Heure présence</div>
                                </div>
                                <span class="more" href="javascript:;">
                            &nbsp;<!--  View more <i
                                class="m-icon-swapright m-icon-white"></i>-->
                        </span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 sortable">
                            <div class="dashboard-stat blue portlet portlet-sortable">
                                <div class="visual">
                                    <i class="fa fa-users"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        <span data-counter="" data-value=""><span id="debriefTime"></span></span>
                                    </div>
                                    <div class="desc">Debrief</div>
                                </div>
                                <span class="more" href="javascript:;">
                            &nbsp;<!--  View more <i
                                class="m-icon-swapright m-icon-white"></i>-->
                        </span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 ">
                            <div class="dashboard-stat red ui-sortable">
                                <div class="visual">
                                    <i class="fa fa-coffee"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                <span data-counter="" data-value=""><span id="cafeTime"></span>
                                </span>
                                    </div>
                                    <div class="desc">Pauses</div>
                                </div>
                                <span class="more" href="javascript:;">
                            &nbsp;<!--  View more <i
                                class="m-icon-swapright m-icon-white"></i>-->
                        </span>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 sortable">
                            <div class="dashboard-stat green">
                                <div class="visual">
                                    <i class="fa fa-hourglass"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                <span data-counter="counteruppp" data-value="549"><span
                                            id="prodTime"></span></span>
                                    </div>
                                    <div class="desc">Heure production</div>
                                </div>
                                <span class="more" href="javascript:;">
                            &nbsp;<!--  View more <i
                                class="m-icon-swapright m-icon-white"></i>-->
                        </span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="container">
                            <div class="card tabs">
                              <input id="tab-1" type="radio" class="tab tab-selector" checked="checked" name="tab" />
                              <label for="tab-1" class="tab tab-primary">Journal des appels</label>
                              <input id="tab-2" type="radio" class="tab tab-selector" name="tab" />
                              <label for="tab-2" class="tab tab-success">Mes rappels</label>
                              
                              <div class="tabsShadow"></div>
                              <div class="glider"></div>
                              <section class="content">
                                <div class="item" id="content-1">
                                    <div class="portlet-body flip-scroll">
                                        <table id="example" class="table table-striped" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th width="10">ID</th>
                                                    <th width="100">Date/heure</th>
                                                    <th width="10">sec</th>
                                                    <th>Qualification</th>
                                                    <th>Télèphone</th>
                                                    <th>Nom/Prénom</th>
                                                    <th width="50">Compagne</th>
                                                    
                                                    <th width="50">Hangup</th>
                                                    <th style="width: 70px;">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @isset($calllogs)
                                                @foreach($calllogs as $key => $log)
                                                
                                                    <tr style="padding:2px">
                                                        <td width="10">{{$key+1}}</td>
                                                        <td width="100">{{$log->call_date}}</td>
                                                        <td width="10">{{$log->length_in_sec}}</td>
                                                        <td>{{$log->status}}</td>
                                                        <td>{{$log->phone_number}}</td>
                                                        <td>{{$log->first_name.' '.$log->last_name}}</td>
                                                        <td width="50">{{$log->campaign_id}}</td>
                                                       
                                                        <td width="50">{{$log->term_reason}}</td>
                                                        <td>
                                                            <button onclick="ManualDial('{{$log->phone_number}}')" data-phone="{{$log->phone_number}}" class="btn btn-sm btn-success "><i class="fa fa-phone"></i></button>
                                                            <button onclick="getContactInfo('{{$log->lead_id}}')" data-phone="{{$log->phone_number}}" class="btn btn-sm btn-info "><i class="fa fa-eye"></i></button>
                                                            <!-- <a href="{{route('get_lead_info',$log->lead_id)}}" class="btn btn-sm btn-info"><i class="fa fa-eye"></i></a> -->
                                                        </td>

                                                    </tr>
                                                @endforeach
                                                @endisset
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="item" id="content-2">
                                    <div class="col-md-12 col-sm-12 bloc-agenda-rappel">
                                        <div id="calendar"></div>
                                    </div>
                                </div>
                              </section>

                            </div>
                          </div>
                        
                        
                    </div>
                </div>

    <div class="container-login100">
      <div class="wrap">
        <div class="wrap-login100 p-t-50 p-b-90 p-l-50 p-r-50">
                        <h2 class="attente_ppp">En Attente d'un appel..</h2>
                        <br> 
                        <button class="btn btn-default btn-outlined btn-square back-to-menu agentStatusButton"></button>
                    </div>
                    <div class="col-md-6 ">
                        <div id="timeREADY"></div>
                     <main>
                         <article>
                         
                          <div class="flipTimer" id="timeREADY">
                            <div class="hours"></div>
                            <div class="minutes"></div>
                            <div class="seconds"></div>
                          </div> 
                        </article>
                   </main>
                        </div>
                    </div>
                        <div>
                        <img class="fit-picture"
                            src="{{asset('images/15.png')}}"
                            alt="Grapefruit slice atop a pile of other slices">
                            </div>
                    </div> 

              
                <!-- Bloc incall  recever un appele et afficher les donnees de prospect dans les champs 


@endsection
