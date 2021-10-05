<!DOCTYPE html>
<html>
<head>
    <title>404 error</title>
    <link href="{{ asset('frontend/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('frontend/css/essentials.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('frontend/css/layout.css') }}" rel="stylesheet" type="text/css" />
     <link href="{{ asset('frontend/css/header-1.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('frontend/css/color_scheme/green.css') }}" rel="stylesheet" type="text/css" id="color_scheme" />
</head>
<body style="background: #151515;">
    <section >

                <div class="display-table">
                    <div class="display-table-cell vertical-align-middle">
                        <div class="container">

                            <div class="row err-404-row">
                                <div class="text-center col-md-8 col-xs-12 col-md-offset-2">
                        
                                    <h1 class="fa fa-frown-o size-100 theme-color hidden-xs"></h1>
                                    <h1><strong style="color: white;">404 Página no encontrada</strong></h1>
                                        <p style="color: white;">
                                            La página que ha solicitado no existe,  por favor regrese.
                                        </p>
                                    <h4> <a href="javascript:history.back();" style="color: white;"><i class="fa fa-reply"></i> Regresar</a></h4>

                                </div>
                              
                            </div>
                
                        </div>
                    </div>
                </div>

            </section>
            <!-- / -->
            <!-- PRELOADER -->
        <div id="preloader">
            <div class="inner">
                <span class="loader"></span>
            </div>
        </div><!-- /PRELOADER -->
        <script type="text/javascript" src="{{ asset('frontend/plugins/jquery/jquery-2.1.4.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('frontend/js/scripts.js') }}"></script>
</body>
</html>