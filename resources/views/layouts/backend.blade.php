<!DOCTYPE html>
<html lang="es">
    <head>        
        <!-- META SECTION -->
        <title>I'M COMING CUBA | ADMIN</title>      
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <link rel="icon" href="favicon.ico" type="image/x-icon" />
        <!-- END META SECTION -->
        <link rel="stylesheet" type="text/css" id="theme" href="{{ asset('backend/css/ion/ion.rangeSlider.css') }}"/>
        <link rel="stylesheet" type="text/css" id="theme" href="{{ asset('backend/css/ion/ion.rangeSlider.skinFlat.css') }}"/>
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="{{ asset('backend/css/theme-default.css') }}"/>
        <link rel="stylesheet" type="text/css" id="theme" href="{{ asset('backend/css/sweetalert.css') }}"/>
        <link href="{{ asset('frontend/css/mine.css') }}" rel="stylesheet" type="text/css" />
        <!-- EOF CSS INCLUDE -->                   
    </head>
    <body>
        <!-- START PAGE CONTAINER -->
        <div class="page-container">
            
            <!-- START PAGE SIDEBAR -->
            <div class="page-sidebar">
                <!-- START X-NAVIGATION -->
                <ul class="x-navigation">
                    <li class="xn-logo">
                        <a href="{{ route('admin') }}" onClick="$.mpb('show',{value: [0,100],speed: -10,state: 'info'});"><center style="font-size:19px;">I'M COMING CUBA</center></a>
                        <a href="#" class="x-navigation-control"></a>
                    </li>
                    <li class="xn-profile">
                        <a href="{{ route('verprofile',Auth::user()) }}" class="profile-mini">
                            <img src="{{ asset('images/avatars/'.Auth::user()->path) }}" alt="{{ Auth::user()->name }}"/>
                        </a>
                        <div class="profile">
                            <div class="profile-image">
                                <a href="{{ route('verprofile',Auth::user()) }}">
                                <img src="{{ asset('images/avatars/'.Auth::user()->path) }}" alt="{{ Auth::user()->name }}" />
                                </a>
                            </div>
                            <div class="profile-data">
                                <div class="profile-data-name">{{ Auth::user()->name }}</div>
                                <div class="profile-data-title">
                                    @if(Auth::user()->rol=='admin')
                                        Administrador
                                    @elseif(Auth::user()->rol=='super_admin')
                                        Super Administrador
                                    @else
                                        Usuario
                                    @endif
                                </div>
                            </div>
                        </div>                                                                        
                    </li>
                    <li class="xn-title">Navegación</li>
                     <li class="{{ route('shoes.language.index')==Request()->url() ? 'active' : '' }}">
                        <a onClick="$.mpb('show',{value: [0,100],speed: -10,state: 'info'});" href="{{ route('shoes.language.index') }}"><span class="fa fa-building"></span> <span class="xn-text">Idiomas</span></a>
                    </li> 
                     <li class=" {{ Request()->path() == 'shoes/country' ? 'active' : '' }} ">
                        <a onClick="$.mpb('show',{value: [0,100],speed: -10,state: 'info'});" href="{{ route('shoes.country.index') }}"><span class="fa fa-flag"></span> <span class="xn-text">Países</span></a>
                    </li>     
                    <li class="{{ route('shoes.city.index')==Request()->url() ? 'active' : '' }}">
                        <a onClick="$.mpb('show',{value: [0,100],speed: -10,state: 'info'});" href="{{ route('shoes.city.index') }}"><span class="fa fa-building"></span> <span class="xn-text">Ciudades</span></a>
                    </li> 
                    <li class="{{ route('shoes.municipality.index')==Request()->url() ? 'active' : '' }}">
                        <a onClick="$.mpb('show',{value: [0,100],speed: -10,state: 'info'});" href="{{ route('shoes.municipality.index') }}"><span class="glyphicon glyphicon-tower"></span> <span class="xn-text">Municipios</span></a>
                    </li> 
                    <li class="{{ route('shoes.category.index')==Request()->url() ? 'active' : '' }}">
                        <a onClick="$.mpb('show',{value: [0,100],speed: -10,state: 'info'});" href="{{ route('shoes.category.index') }}"><span class="fa fa-tags"></span> <span class="xn-text">Categorías</span></a>
                    </li> 
                    <li class="{{ route('shoes.subcategory.index')==Request()->url() ? 'active' : '' }}">
                        <a onClick="$.mpb('show',{value: [0,100],speed: -10,state: 'info'});" href="{{ route('shoes.subcategory.index') }}"><span class="glyphicon glyphicon-folder-open"></span> <span class="xn-text">Subcategorías</span></a>
                    </li> 
                    @if(Auth::user()->rol == 'super_admin')
                    <li class="{{ route('shoes.user.index')==Request()->url() ? 'active' : '' }}">
                        <a onClick="$.mpb('show',{value: [0,100],speed: -10,state: 'info'});" href="{{ route('shoes.user.index') }}"><span class="fa fa-users"></span> <span class="xn-text">Usuarios</span></a>
                    </li>
                    @endif
                    <li class="{{ route('shoes.bussine.index')==Request()->url() ? 'active' : '' }}">
                        <a onClick="$.mpb('show',{value: [0,100],speed: -10,state: 'info'});" href="{{ route('shoes.bussine.index') }}"><span class="fa fa-home"></span> <span class="xn-text">Negocios</span></a>
                    </li> 
                    <li class="{{ route('shoes.video.index')==Request()->url() ? 'active' : '' }}">
                        <a onClick="$.mpb('show',{value: [0,100],speed: -10,state: 'info'});" href="{{ route('shoes.video.index') }}"><span class="fa fa-video-camera"></span> <span class="xn-text">Videos</span></a>
                    </li> 
                     <li class="{{ route('shoes.picture.index')==Request()->url() ? 'active' : '' }}">
                        <a onClick="$.mpb('show',{value: [0,100],speed: -10,state: 'info'});" href="{{ route('shoes.picture.index') }}"><span class="fa fa-image"></span> <span class="xn-text">Fotos</span></a>
                    </li> 
                     <li class="{{ route('shoes.comment.index')==Request()->url() ? 'active' : '' }}">
                        <a onClick="$.mpb('show',{value: [0,100],speed: -10,state: 'info'});" href="{{ route('shoes.comment.index') }}"><span class="fa fa-comments"></span> <span class="xn-text">Comentarios</span></a>
                    </li> 
                    <li class="{{ route('shoes.message.index')==Request()->url() ? 'active' : '' }}">
                        <a onClick="$.mpb('show',{value: [0,100],speed: -10,state: 'info'});" href="{{ route('shoes.message.index') }}"><span class="fa fa-envelope"></span> <span class="xn-text">Mensajes</span></a>
                    </li> 
                    <li class="{{ route('shoes.like.index')==Request()->url() ? 'active' : '' }}">
                        <a onClick="$.mpb('show',{value: [0,100],speed: -10,state: 'info'});" href="{{ route('shoes.like.index') }}"><span class="fa fa-thumbs-o-up"></span><span class="xn-text">Likes</span>&nbsp;&nbsp;  <i class="fa fa-thumbs-o-down fa-flip-horizontal fa-lg"></i>Dislikes</a>
                    </li> 
                    <li class="{{ route('shoes.marker.index')==Request()->url() ? 'active' : '' }}">
                        <a onClick="$.mpb('show',{value: [0,100],speed: -10,state: 'info'});" href="{{ route('shoes.marker.index') }}"><span class="fa fa-bookmark"></span> <span class="xn-text">Marcadores</span></a>
                    </li> 
                      <li class="{{ route('contactback')==Request()->url() ? 'active' : '' }}">
                        <a onClick="$.mpb('show',{value: [0,100],speed: -10,state: 'info'});" href="{{ route('contactback') }}"><span class="fa fa-phone-square"></span> <span class="xn-text">Contacto</span></a>
                    </li> 
                     <li>
                        <a target="blank" onClick="$.mpb('show',{value: [0,100],speed: -10,state: 'info'});" href="{{ url('/') }}"><span class="fa fa-link"></span> <span class="xn-text">Ver Sitio</span></a>
                    </li> 
                  

                    
                </ul>
                <!-- END X-NAVIGATION -->
            </div>
            <!-- END PAGE SIDEBAR -->
            
            <!-- PAGE CONTENT -->
            <div class="page-content">
                
                <!-- START X-NAVIGATION VERTICAL -->
                <ul class="x-navigation x-navigation-horizontal x-navigation-panel">
                    <!-- TOGGLE NAVIGATION -->
                    <li class="xn-icon-button">
                        <a href="#" class="x-navigation-minimize"><span class="fa fa-dedent"></span></a>
                    </li>
                    <!-- END TOGGLE NAVIGATION -->
                                    
                    <!-- POWER OFF -->
                    <li class="xn-icon-button pull-right last">
                        <a href="#"><span class="fa fa-power-off"></span></a>
                        <ul class="xn-drop-left animated zoomIn">
                            <li><a href="#" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span> Salir</a></li>
                        </ul>                        
                    </li> 
                    <!-- END POWER OFF -->                    
                
                </ul>
                <!-- END X-NAVIGATION VERTICAL -->                     

                     
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                        
                       
                            <div class="col-md-10 col-md-offset-1">
                                <center>
                                    <br/>
                                    @include('flash::message')
                                </center>
                            </div>
                        

                    @yield('content')                    
                </div>
                <!-- END PAGE CONTENT WRAPPER -->                                
            </div>            
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->

        <!-- MESSAGE BOX-->
        <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-sign-out"></span> <strong>Salir</strong> ?</div>
                    <div class="mb-content">
                        <p>¿Está seguro que desea salir?</p>                    
                    </div>
                    <div class="mb-footer">
                        <div class="pull-right">
                            <a href="{{ route('logoutadmin') }}" class="btn btn-success btn-lg">Sí</a>
                            <button class="btn btn-default btn-lg mb-control-close">No</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MESSAGE BOX-->


        <!-- START PRELOADS -->
        <audio id="audio-alert" src="{{ asset('backend/audio/alert.mp3') }}" preload="auto"></audio>
        <audio id="audio-fail" src="{{ asset('backend/audio/fail.mp3') }}" preload="auto"></audio>
        <!-- END PRELOADS -->                  
        
    <!-- START SCRIPTS -->
        <!-- START PLUGINS -->
        <script type="text/javascript" src="{{ asset('backend/js/plugins/jquery/jquery.min.js') }}"></script>

        <script type="text/javascript" src="{{ asset('backend/js/plugins/jquery/jquery-ui.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('backend/js/plugins/bootstrap/bootstrap.min.js') }}"></script>        
        <!-- END PLUGINS -->

        <!-- START THIS PAGE PLUGINS-->        
        <script type='text/javascript' src="{{ asset('backend/js/plugins/icheck/icheck.min.js') }}"></script>        
        <script type="text/javascript" src="{{ asset('backend/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('backend/js/plugins/scrolltotop/scrolltopcontrol.js') }}"></script>
        
        <script type="text/javascript" src="{{ asset('backend/js/plugins/morris/raphael-min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('backend/js/plugins/morris/morris.min.js') }}"></script>       
        <script type="text/javascript" src="{{ asset('backend/js/plugins/rickshaw/d3.v3.js') }}"></script>
        <script type="text/javascript" src="{{ asset('backend/js/plugins/rickshaw/rickshaw.min.js') }}"></script>
        <script type='text/javascript' src="{{ asset('backend/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
        <script type='text/javascript' src="{{ asset('backend/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>                
        <script type='text/javascript' src="{{ asset('backend/js/plugins/bootstrap/bootstrap-datepicker.js') }}"></script>                
        <script type="text/javascript" src="{{ asset('backend/js/plugins/owl/owl.carousel.min.js') }}"></script>                 
        
        <script type="text/javascript" src="{{ asset('backend/js/plugins/moment.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('backend/js/plugins/daterangepicker/daterangepicker.js') }}"></script>
        <script type="text/javascript" src="{{ asset('backend/js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('backend/js/plugins/tableexport/tableExport.js') }}"></script>
        <script type="text/javascript" src="{{ asset('backend/js/plugins/tableexport/jquery.base64.js') }}"></script>
        <script type="text/javascript" src="{{ asset('backend/js/plugins/tableexport/html2canvas.js') }}"></script>
        <script type="text/javascript" src="{{ asset('backend/js/plugins/tableexport/jspdf/libs/sprintf.js') }}"></script>
        <script type="text/javascript" src="{{ asset('backend/js/plugins/tableexport/jspdf/jspdf.js') }}"></script>
        <script type="text/javascript" src="{{ asset('backend/js/plugins/tableexport/jspdf/libs/base64.js') }}"></script>     
        <script type="text/javascript" src="{{ asset('backend/js/plugins/bootstrap/bootstrap-select.js') }}"></script>
        <script type="text/javascript" src="{{ asset('backend/js/plugins/bootstrap/bootstrap-select.js') }}"></script>
        <script type="text/javascript" src="{{ asset('backend/js/plugins/tagsinput/jquery.tagsinput.min.js') }}"></script>
        <!-- END THIS PAGE PLUGINS-->        

        <!-- START TEMPLATE -->
        
        <script type="text/javascript" src="{{ asset('backend/js/settings.js') }}"></script>
        
        <script type="text/javascript" src="{{ asset('backend/js/plugins.js') }}"></script>        
        <script type="text/javascript" src="{{ asset('backend/js/actions.js') }}"></script>
        
        @yield('scripts')
        
        <script type="text/javascript" src="{{ asset('backend/js/demo_dashboard.js') }}"></script>
        
        <script type="text/javascript" src="{{ asset('backend/js/sweetalert.min.js') }}"></script>
        
        <script type="text/javascript" src="{{ asset('backend/js/plugins/rangeslider/jQAllRangeSliders-min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('backend/js/plugins/knob/jquery.knob.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('backend/js/plugins/ion/ion.rangeSlider.min.js') }}"></script>

        
        
        
       
        <!-- END TEMPLATE -->
    <!-- END SCRIPTS -->         

    </body>
</html>






