@section('css-sidebar')
<style>

.app-sidebar__user .user-pic {
    margin: -14px 2px -7px 0;
}
</style>
                    <div class="sticky">
                        <aside class="app-sidebar">
                            <div class="app-sidebar__logo">
                                <a class="header-brand" href="{{ url('index') }}">
                                    <img src="{{url('images/aa.png')}}">
                                </a>
                            </div>
                            <div class="app-sidebar3">
                                <div class="slide-left disabled" id="slide-left"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24"><path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"/></svg></div>
                                <div class="main-menu">
                                <div class="app-sidebar__user">
                                    <div class="dropdown user-pro-body text-center">
                                        <div class="user-pic">
                                            <img src="{{ asset('images/agent.jpg')}}" alt="user-img" class="avatar-xxl rounded-circle mb-1" >
                                        </div>
                                        <div class="user-info">
                                            <!--<h5 class=" mb-2">poste 1</h5>-->
                                            <!--<h5 class=" mb-2">Groupe d'agent :</h5>-->
                                            <div class="profile-userbuttons">
                                              <span class="badge bg-success-transparent">Active</span>
                                            


                                            </div>
                                            
                                            
                                                <!--<a href="about.html">Journal des appels</a>-->
                                            </div>
                                        
                                            
                                        </div>
                                    </div>
                                </div>
                        
                                    <ul class="side-menu">

                                        <li class="side-item side-item-category mt-4">Dashboards</li>
                                        <li class="slide">
                                            <a class="side-menu__item"  href="{{ route('statistics') }}">
                                                <i class="feather feather-airplay sidemenu_icon"></i>
                                                <span class="side-menu__label">Statistiques </span>
                                            </a>
                                        </li>
                                        <li class="slide">
                                            <a class="side-menu__item"  href="{{ url('agents_logged_in') }}">
                                                <i class="feather feather-airplay sidemenu_icon"></i>
                                                <span class="side-menu__label">Cpanel </span>
                                            </a>
                                        </li>
                                        <!--  <li class="slide">
                                            <a class="side-menu__item"  href="{{ url('admin') }}">
                                                <i class="feather feather-server sidemenu_icon"></i>
                                                <span class="side-menu__label">Cpanel detaillé</span>
                                            </a>
                                        </li>
 -->

                                      <!--  <li class="slide">
                                            <a class="side-menu__item"  href="{{ url('rapport') }}">
                                                <i class="feather feather-message-square sidemenu_icon"></i>
                                                <span class="side-menu__label">Rapports</span>
                                            </a>
                                        </li>-->
                                        

                                        <li class="slide">

                                            <a class="side-menu__item" data-bs-toggle="slide"  href="">
                                            <i class="feather feather-home  sidemenu_icon"></i>
                                            <span class="side-menu__label">Compagnes</span><i class="angle fa fa-angle-right"></i></a>
                                            <ul class="slide-menu">

                                                 <li class="sub-slide">
                                                    <a class="sub-side-menu__item" data-bs-toggle="sub-slide"  href="{{ url('ajouter-compagne') }}">
                                                        <span class="sub-side-menu__label">Ajouter une compagne<span class="nav-list"></span></span><i class="sub-angle fa fa-angle-right"></i>
                                                    </a>
                                                </li>

                                                <li class="sub-slide">
                                                    <a class="sub-side-menu__item" data-bs-toggle="sub-slide"  href="{{ url('liste-compagne') }}">
                                                        <span class="sub-side-menu__label">Liste des compagnes </span><i class="sub-angle fa fa-angle-right"></i>
                                                    </a>
                                                </li>

                                            </ul>
                                        </li>



                                        <li class="slide">
                                            <a class="side-menu__item" data-bs-toggle="slide"  href="javascript:void(0);">
                                                <i class="feather feather-lock sidemenu_icon"></i>
                                                <span class="side-menu__label">utilisateur<span class="nav-list"> </span></span><i class="angle fa fa-angle-right"></i>
                                            </a>
                                            <ul class="slide-menu">
                                            <li class="side-menu-label1"><a  href="javascript:void(0);">Support System</a></li>
                                                <li class="sub-slide">
                                                    <a class="sub-side-menu__item" data-bs-toggle="sub-slide"  href="{{ url('ajouter-utilisateur') }}"><span class="sub-side-menu__label">Ajouter un  utilisateur</span><i class="sub-angle fa fa-angle-right"></i></a>

                                                </li>
                                                <li class="sub-slide">
                                                    <a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="{{ url('copier-utilisateur') }}" ><span class="sub-side-menu__label">Copier un  utilisateur</span><i class="sub-angle fa fa-angle-right"></i></a>



                                                </li>
                                                
                                            

                                                </li>
                                               

                                                <li class="sub-slide">
                                                    <a class="sub-side-menu__item" data-bs-toggle="sub-slide"  href="{{ url('afficher-utilisateur') }}"><span class="sub-side-menu__label">Liste des utilisateurs</span><i class="sub-angle fa fa-angle-right"></i></a>

                                                </li>

                                                              

                                            </ul>

                                        </li>

                                        <li class="slide">

                                            <a class="side-menu__item" data-bs-toggle="slide"  href="">
                                                <i class="feather feather-home  sidemenu_icon"></i>
                                                <span class="side-menu__label">Phones</span><i class="angle fa fa-angle-right"></i></a>
                                            <ul class="slide-menu">

                                                <li class="sub-slide">
                                                    <a class="sub-side-menu__item" data-bs-toggle="sub-slide"  href="{{ url('ajouter-phone') }}">
                                                        <span class="sub-side-menu__label">Ajouter un téléphone<span class="nav-list"></span></span><i class="sub-angle fa fa-angle-right"></i>
                                                    </a>
                                                </li>

                                                <li class="sub-slide">
                                                    <a class="sub-side-menu__item" data-bs-toggle="sub-slide"  href="{{ url('liste-phone') }}">
                                                        <span class="sub-side-menu__label">Liste des phone </span><i class="sub-angle fa fa-angle-right"></i>
                                                    </a>
                                                </li>

                                            </ul>
                                        </li>

                                        <li class="slide">
                                            <a class="side-menu__item" data-bs-toggle="slide" >
                                               <i class="feather feather-layers sidemenu_icon"></i>
                                                <span class="side-menu__label">Listes</span><i class="angle fa fa-angle-right"></i>
                                            </a>
                                            <ul class="slide-menu">
                                                <li class="side-menu-label1"><a >Listes</a></li>
                                                <li><a href="{{ url('afficher-liste') }}" class="slide-item">Afficher liste</a></li>
                                                <li><a href="{{ url('ajouter-liste') }}" class="slide-item">Ajouter une nouvelle liste</a></li>
                                                <li><a href="{{ url('load_list') }}" class="slide-item">Load New Leads</a></li>
                                                <li><a href="{{ url('recherche-prospect') }}" class="slide-item">Rechercher un prospect </a></li>
                                                <li><a href="{{ url('ajouter-lead') }}" class="slide-item"> Ajouter un nouveau prospect </a></li>
                                       
                                                <li><a href="{{ url('charger-prospect') }}" class="slide-item">Charger de nouveaux prospects</a></li>
                                              
                                            </ul>
                                        </li>

                                      <!--  <li class="side-item side-item-category">Apps</li>
                                        <li class="slide">
                                            <a class="side-menu__item" data-bs-toggle="slide" >
                                                <i class="feather feather-codepen sidemenu_icon"></i>
                                                <span class="side-menu__label">Scenario</span><i class="angle fa fa-angle-right"></i>
                                            </a>
                                            <ul class="slide-menu">
                                            <li class="side-menu-label1"><a >Scénario</a></li>
                                                <li><a href="{{ url('ajouter-script') }}" class="slide-item">Ajouter un script</a></li>
                                                <li><a href="{{ url('afficher-script') }}" class="slide-item">Afficher un script </a></li>

                                            </ul>
                                         </li>-->


                                      <!-- <li class="slide">
                                            <a class="side-menu__item" data-bs-toggle="slide" >
                                            <i class="feather feather-server sidemenu_icon"></i>
                                            <span class="side-menu__label">Filtres</span><i class="angle fa fa-angle-right"></i></a>
                                            <ul class="slide-menu">
                                            <li class="side-menu-label1"><a >Filtres</a></li>
                                                <li class="sub-slide">
                                                     <li><a href="{{{ url('ajouter-filtre') }}}" class="slide-item">Ajouter un script</a></li>
                                                <li><a href="{{ url('afficher-filtre') }}" class="slide-item">Afficher un script </a></li>

                                                    </ul>
                                                </li>-->




                                        <li class="slide">
                                            <a class="side-menu__item" data-bs-toggle="slide" >
                                                <i class="feather feather-codepen sidemenu_icon"></i>
                                                <span class="side-menu__label">Scenario</span><i class="angle fa fa-angle-right"></i>
                                            </a>
                                            <ul class="slide-menu">
                                            <li class="side-menu-label1"><a >Scénario</a></li>
                                                <li><a href="{{ url('ajouter-script') }}" class="slide-item">Ajouter un script</a></li>
                                                <li><a href="{{ url('afficher-script') }}" class="slide-item">Afficher un script </a></li>

                                            </ul>
                                        </li>
                                        <li class="slide">
                                            <a class="side-menu__item" data-bs-toggle="slide" >
                                                <i class="feather feather-codepen sidemenu_icon"></i>
                                                <span class="side-menu__label">Filtre</span><i class="angle fa fa-angle-right"></i>
                                            </a>
                                            <ul class="slide-menu">
                                            <li class="side-menu-label1"><a >Filtre</a></li>
                                                <li><a href="{{ url('ajouter_filtre') }}" class="slide-item">Ajouter un Filtre</a></li>
                                                <li><a href="{{ url('afficher_filtre') }}" class="slide-item">Afficher un Filtre </a></li>

                                            </ul>
                                         </li>
                                          

                                         
                                        <li class="side-item side-item-category">Administration</li>
                                        <li class="slide">
                                            <a class="side-menu__item" data-bs-toggle="slide" >
                                                <i class="feather feather-codepen sidemenu_icon"></i>
                                                <span class="side-menu__label">Call time</span><i class="angle fa fa-angle-right"></i>
                                            </a>
                                            <ul class="slide-menu">
                                            <li class="side-menu-label1"><a >Call time</a></li>
                                                <li><a href="{{ url('ajouter_temps') }}" class="slide-item">Ajouter un temps</a></li>
                                                <li><a href="{{ url('liste_temps') }}" class="slide-item">Afficher temps </a></li>

                                            </ul>
                                        </li>

                                        <li class="slide">
                                            <a class="side-menu__item" data-bs-toggle="slide" >
                                                <i class="feather feather-codepen sidemenu_icon"></i>
                                                <span class="side-menu__label">Carriere</span><i class="angle fa fa-angle-right"></i>
                                            </a>
                                            <ul class="slide-menu">
                                            <li class="side-menu-label1"><a >Carriere</a></li>
                                                <li><a href="{{ url('ajouter_carriere') }}" class="slide-item">Ajouter carriere</a></li>
                                                <li><a href="{{ url('liste_carriere') }}" class="slide-item">Liste_carriere </a></li>
                                                <li><a href="{{ url('liste_carriere') }}" class="slide-item">copier_carriere </a></li>

                                            </ul>
                                        </li>

                                        <li class="slide">
                                            <a class="side-menu__item" data-bs-toggle="slide" >
                                                <i class="feather feather-codepen sidemenu_icon"></i>
                                                <span class="side-menu__label">Conference</span><i class="angle fa fa-angle-right"></i>
                                            </a>
                                            <ul class="slide-menu">
                                            <li class="side-menu-label1"><a >Conference</a></li>
                                                <li><a href="{{ url('ajouter_conference') }}" class="slide-item">Ajouter une Conference</a></li>
                                                <li><a href="{{ url('liste_conference') }}" class="slide-item">Afficher une Conference </a></li>

                                            </ul>
                                        </li>

                                        <li class="slide">
                                            <a class="side-menu__item" data-bs-toggle="slide" >
                                                <i class="feather feather-codepen sidemenu_icon"></i>
                                                <span class="side-menu__label">Serveur</span><i class="angle fa fa-angle-right"></i>
                                            </a>
                                            <ul class="slide-menu">
                                            <li class="side-menu-label1"><a >Serveur</a></li>
                                                <li><a href="{{ url('ajouter_serveur') }}" class="slide-item">Ajouter un serveur</a></li>
                                                <li><a href="{{ url('afficher_serveur') }}" class="slide-item">Afficher serveur </a></li>

                                            </ul>
                                        </li>
                                        <li class="slide">
                                            <a class="side-menu__item" data-bs-toggle="slide" >
                                                <i class="feather feather-codepen sidemenu_icon"></i>
                                                <span class="side-menu__label">shift</span><i class="angle fa fa-angle-right"></i>
                                            </a>
                                            <ul class="slide-menu">
                                            <li class="side-menu-label1"><a >Shift</a></li>
                                                <li><a href="{{ url('ajouter_shift') }}" class="slide-item">Ajouter shift</a></li>
                                              

                                            </ul>
                                        </li>
                                        <li class="slide">
                                            <a class="side-menu__item" data-bs-toggle="slide" >
                                                <i class="feather feather-codepen sidemenu_icon"></i>
                                                <span class="side-menu__label">Systeme</span><i class="angle fa fa-angle-right"></i>
                                            </a>
                                            <ul class="slide-menu">
                                            <li class="side-menu-label1"><a >Systeme</a></li>
                                                <li><a href="{{ url('parametre') }}" class="slide-item">Settings</a></li>
                                              

                                            </ul>
                                        </li>
                                        <li class="slide">
                                            <a class="side-menu__item" data-bs-toggle="slide" >
                                                <i class="feather feather-codepen sidemenu_icon"></i>
                                                <span class="side-menu__label">Template</span><i class="angle fa fa-angle-right"></i>
                                            </a>
                                            <ul class="slide-menu">
                                            <li class="side-menu-label1"><a >Template</a></li>
                                                <li><a href="{{ url('ajouter_template') }}" class="slide-item">Ajouter template</a></li>
                                              

                                            </ul>
                                        </li>
                                        

                                    <li class="side-item side-item-category">Entrant</li>
                                    <li class="slide">
                                        <a class="side-menu__item" data-bs-toggle="slide" >
                                        <i class="feather feather-layers sidemenu_icon"></i>
                                        <span class="side-menu__label">Groupes entrants </span><i class="angle fa fa-angle-right"></i></a>
                                        <ul class="slide-menu">
                                        <li class="side-menu-label1"><a >Entrant</a></li>
                                        <li class="sub-slide">
                                            <a href="liste-groupe" class="slide-item"><span class="sub-side-menu__label">Afficher les groupes</span></a>
                                            <ul class="sub-slide-menu">
                                                
                                            </ul>
                                        </li>
                                        <li class="sub-slide">
                                            <a href="ajouter-groupe-entrant" class="slide-item"><span class="sub-side-menu__label">Ajouter un nouveau groupe </span></a>
                                            <ul class="sub-slide-menu">
                                                
                                            </ul>
                                        </li>
                                        <li class="sub-slide">
                                            <a href="copier-entrant" class="slide-item"><span class="sub-side-menu__label">copier dans le groupe</span></a>
                                            <ul class="sub-slide-menu">
                                                
                                            </ul>
                                        </li>
                                        

                                        </ul>
                                    </li>
                                    
                                    <li class="slide">
                                        <a class="side-menu__item" data-bs-toggle="slide" >
                                        <i class="feather feather-layers sidemenu_icon"></i>
                                        <span class="side-menu__label">Groupe messagerie </span><i class="angle fa fa-angle-right"></i></a>
                                        <ul class="slide-menu">
                                        <li class="side-menu-label1"><a >Groupe</a></li>
                                        <li class="sub-slide">
                                           <a href="" class="slide-item"><span class="sub-side-menu__label">Afficher les groupes de messagerie</span></a>
                                            <ul class="sub-slide-menu">
                                                
                                            </ul>
                                        </li>
                                        <li class="sub-slide">
                                            <a href="ajouter-groupe-messagerie" class="slide-item"><span class="sub-side-menu__label">Ajouter un nouveau groupe de messagerie</span></a>
                                            <ul class="sub-slide-menu">
                                                
                                            </ul>
                                        </li>
                                        <li class="sub-slide">
                                            <a href="entrant9" class="slide-item"><span class="sub-side-menu__label">Copier dans le groupe</span></a>
                                            <ul class="sub-slide-menu">
                                                
                                            </ul>
                                        </li>
                                        

                                        </ul>
                                    </li>
                                    <li class="slide">
                                        <a class="side-menu__item" data-bs-toggle="slide" >
                                        <i class="feather feather-layers sidemenu_icon"></i>
                                        <span class="side-menu__label">Groupe discussion</span><i class="angle fa fa-angle-right"></i></a>
                                        <ul class="slide-menu">
                                        <li class="side-menu-label1"><a >Groupe</a></li>
                                        <li class="sub-slide">
                                            <a href="liste" class="slide-item"><span class="sub-side-menu__label">Afficher les groupes de discussion</span></a>
                                            <ul class="sub-slide-menu">
                                                
                                            </ul>
                                        </li>
                                        <li class="sub-slide">
                                            <a href="ajouter-groupe-discussion" class="slide-item"><span class="sub-side-menu__label">Ajouter un nouveau groupe de discussion </span></a>
                                            <ul class="sub-slide-menu">
                                                
                                            </ul>
                                        </li>
                                        <li class="sub-slide">
                                           <a href="copier-discussion" class="slide-item"><span class="sub-side-menu__label">Copier dans le groupe de discussion</span></a>
                                            <ul class="sub-slide-menu">
                                                
                                            </ul>
                                        </li>
                                        

                                        </ul>
                                    </li>
                                    <li class="slide">
                                        <a class="side-menu__item" data-bs-toggle="slide" >
                                        <i class="feather feather-layers sidemenu_icon"></i>
                                        <span class="side-menu__label">les DID</span><i class="angle fa fa-angle-right"></i></a>
                                        <ul class="slide-menu">
                                        <li class="side-menu-label1"><a >Groupe</a></li>
                                        <li class="sub-slide">
                                           <a href="" class="slide-item"><span class="sub-side-menu__label">Afficher les DID</span></a>
                                            <ul class="sub-slide-menu">
                                                
                                            </ul>
                                        </li>
                                        <li class="sub-slide">
                                            <a href="ajouter-did" class="slide-item"><span class="sub-side-menu__label">Ajouter un nouveau groupe DID</span></a>
                                            <ul class="sub-slide-menu">
                                                
                                            </ul>
                                        </li>
                                        <li class="sub-slide">
                                             <a href="entrant12" class="slide-item"><span class="sub-side-menu__label">Copier dans le groupe DID</span></a>
                                            <ul class="sub-slide-menu">
                                                
                                            </ul>
                                        </li>
                                        

                                        </ul>
                                    </li>
                                    <li class="slide">
                                        <a class="side-menu__item" data-bs-toggle="slide" >
                                        <i class="feather feather-layers sidemenu_icon"></i>
                                        <span class="side-menu__label">Les Menus d'appel</span><i class="angle fa fa-angle-right"></i></a>
                                        <ul class="slide-menu">
                                        <li class="side-menu-label1"><a >Groupe</a></li>
                                        <li class="sub-slide">
                                             <a href="entrant13" class="slide-item"><span class="sub-side-menu__label">Afficher les menus d'appels</span></a>
                                            <ul class="sub-slide-menu">
                                                
                                            </ul>
                                        </li>
                                        <li class="sub-slide">
                                             <a href="entrant6" class="slide-item"><span class="sub-side-menu__label">Ajouter un nouveau menu d 'appel</span></a>
                                            <ul class="sub-slide-menu">
                                                
                                            </ul>
                                        </li>
                                        <li class="sub-slide">
                                             <a href="entrant11" class="slide-item"><span class="sub-side-menu__label">Copier le menu d 'appel</span></a>
                                            <ul class="sub-slide-menu">
                                                
                                            </ul>
                                        </li>
                                         

                                        </ul>
                                    </li>
                                    <li class="slide">
                                        <a class="side-menu__item" data-bs-toggle="slide" >
                                        <i class="feather feather-layers sidemenu_icon"></i>
                                        <span class="side-menu__label">Les groupes téléphonique</span><i class="angle fa fa-angle-right"></i></a>
                                        <ul class="slide-menu">
                                        <li class="side-menu-label1"><a >Groupe</a></li>
                                        <li class="sub-slide">
                                             <a href="liste" class="slide-item"><span class="sub-side-menu__label">Filtrer les groupes téléphoniques</span></a>
                                            <ul class="sub-slide-menu">
                                                
                                            </ul>
                                        </li>
                                        <li class="sub-slide">
                                             <a href="entrant7" class="slide-item"><span class="sub-side-menu__label">Ajouter un groupe de téléphones de filtrage</span></a>
                                            <ul class="sub-slide-menu">
                                                
                                            </ul>
                                        </li>
                                        <li class="sub-slide">
                                             <a href="ajouter-FPG.blade.php" class="slide-item"><span class="sub-side-menu__label">AJOUTER OU SUPPRIMER DES NUMÉROS DE LA LISTE DES GROUPES DE TÉLÉPHONE FILTRE</span></a>
                                            <ul class="sub-slide-menu">
                                                
                                            </ul>
                                        </li>
                                        




                                        </ul>
                                    </li>
                                    <li class="side-item side-item-category">Groupe d'utilisateurs</li>
                                    <li class="slide">
                                        <a class="side-menu__item" data-bs-toggle="slide" >
                                        <i class="feather feather-layers sidemenu_icon"></i>
                                        <span class="side-menu__label">Groupe d'utilisateurs </span><i class="angle fa fa-angle-right"></i></a>
                                        <ul class="slide-menu">
                                        <li class="side-menu-label1"><a >Groupe</a></li>
                                        <li class="sub-slide">
                                            <a href="afficher-groupe" class="slide-item"><span class="sub-side-menu__label">Afficher les groupes</span></a>
                                            <ul class="sub-slide-menu">
                                                
                                            </ul>
                                        </li>
                                        <li class="sub-slide">
                                            <a href="ajouter-groupe" class="slide-item"><span class="sub-side-menu__label">Ajouter un nouveau groupe </span></a>
                                            <ul class="sub-slide-menu">
                                                
                                            </ul>
                                        </li>
                                        <li class="sub-slide">
                                            <a href="Statistiques horaires du groupe" class="slide-item"><span class="sub-side-menu__label">Rapport horaire du groupe </span></a>
                                            <ul class="sub-slide-menu">
                                                
                                            </ul>
                                        </li>
                                         <li class="sub-slide">
                                            <a href="modifier-groupe" class="slide-item"><span class="sub-side-menu__label">
                                              Modification groupée du groupe d'utilisateurs</span></a>
                                            <ul class="sub-slide-menu">
                                                
                                            </ul>
                                        </li>
                                        


                                        </ul>
                                    </li>
                                       
                                    <!--<li class="side-item side-item-category">Agent distant </li>-->
                                    <li class="slide">
                                        <a class="side-menu__item" data-bs-toggle="slide" >
                                        <i class="feather feather-layers sidemenu_icon"></i>
                                        <span class="side-menu__label">Agent distant</span><i class="angle fa fa-angle-right"></i></a>
                                        <ul class="slide-menu">
                                        <li class="side-menu-label1"><a >Groupe</a></li>
                                       <!-- <li class="sub-slide">
                                            <a href="" class="slide-item"><span class="sub-side-menu__label">Afficher les agent distant</span></a>
                                            <ul class="sub-slide-menu">
                                                
                                            </ul>
                                        </li>-->
                                        <li class="sub-slide">
                                            <a href="ajouter_agent_distant" class="slide-item"><span class="sub-side-menu__label">Ajouter un agent distant</span></a>
                                            <ul class="sub-slide-menu">
                                                
                                            </ul>
                                        </li>
                                       <!-- <li class="sub-slide">
                                            <a href="" class="slide-item"><span class="sub-side-menu__label">Afficher les groupe d'extentions </span></a>
                                            <ul class="sub-slide-menu">
                                                
                                            </ul>
                                        </li>
                                         <li class="sub-slide">
                                            <a href="" class="slide-item"><span class="sub-side-menu__label">
                                              Ajouter un groupe d'extentions</span></a>
                                            <ul class="sub-slide-menu">
                                                
                                            </ul>
                                        </li>-->
                                        


                                        </ul>

                                    </li>

                                    </ul>

                                </div>

                            </div>

                        </aside>
                    </div>
                    <!-- APP-SIDEBAR END-->

                    <!-- APP-CONTENT -->

