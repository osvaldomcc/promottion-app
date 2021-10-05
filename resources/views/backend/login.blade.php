<!DOCTYPE html>
<html lang="en" class="body-full-height">
    <head>        
        <!-- META SECTION -->
        <title>I'M COMING | ADMIN</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <link rel="icon" href="favicon.ico" type="image/x-icon" />
        <!-- END META SECTION -->
        
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="{{ asset('backend/css/theme-default.css') }}"/>
        <!-- EOF CSS INCLUDE -->                                     
    </head>
    <body>
        
         <div class="login-container lightmode">
        
            <div class="login-box animated fadeInDown">
                <center><h1 style="color:rgba(255,255,255,0.5)">I'M COMING</h1></center>
                <div class="login-body">
                    <div class="login-title"><center><strong>Bienvenido</strong>, Por favor acceda </center></div>
                     {!! Form::open(['route'=>'introadmin','method'=>'POST','class'=>'form-horizontal']) !!}
                         <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                        <div class="col-md-12">
                            {!! Form::email('email',null,['class'=>'form-control','placeholder'=>'admin@gmail.com']) !!}
                            @if($errors->has('email'))
                                <span class="help-block">
                                    <ul>
                                        <li>
                                            {{ $errors->first('email') }}
                                        </li>
                                    </ul>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                        <div class="col-md-12">
                            {!! Form::password('password',['class'=>'form-control','placeholder'=>'***********']) !!}
                             @if($errors->has('password'))
                                <span class="help-block">
                                    <ul>
                                        <li>
                                            {{ $errors->first('password') }}
                                        </li>
                                    </ul>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                            <button class="btn btn-info btn-block" type="submit">Acceder</button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
                 <div class="login-footer">
                    <div class="text-center">
                        &copy; {{ date('Y') }} I'm coming
                    </div>
                </div>
            </div>
            
        </div>
        
    </body>
</html>






