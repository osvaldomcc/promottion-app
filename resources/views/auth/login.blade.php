@extends('layouts.app')

@section('content')
           
    <!-- -->
            <section style="background:url('assets/images/demo/wall2.jpg')">
            
                <div class="display-table">
                    <div class="display-table-cell vertical-align-middle">
                        
                        <div class="container">
                            
                            <div class="row">

                                <div class="col-xs-12 col-sm-5 col-md-5 col-lg-4 col-md-push-7 col-lg-push-8 col-sm-push-7" style="margin-top:-40px;">

                                <div class="toggle toggle-transparent toggle-accordion toggle-noicon">

                                <div class="toggle active">
                                    <label class="size-18"><i class="fa fa-users"></i> &nbsp; {{ trans('app.api.login') }}</label>
                               


                                        <!-- ALERT -->
                                        <div class=" hidden alert alert-mini alert-danger margin-bottom-30">
                                            <strong>Oh snap!</strong> Login Incorrect!
                                        </div><!-- /ALERT -->


                                        <!-- login form -->
                                    <form role="form" method="POST" action="{{ url('/login') }}" class="sky-form boxed" >
                                        
                                        <fieldset class="nomargin"> 
                                              {{ csrf_field() }}

                                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                                <label for="password" class="margin-top-20  control-label">{{ trans('app.api.correo') }}</label>
                                               <label class="input">
                                                <i class="ico-append fa fa-envelope"></i>
                                                <input id="email" type="email" class="form-control" name="email" placeholder="ej: pedro@gmail.com" value="{{ old('email') }}" @if($errors->has('email'))style="border: 2px solid darkred"@endif>
                                                <span class="tooltip tooltip-top-right">{{ trans('app.api.correo') }}</span>
                                                 @if ($errors->has('email'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('email') }}</strong>
                                                        </span>
                                                    @endif
                                             </label>
                                            </div>

                                              <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                                <label for="password" class="margin-top-20  control-label">{{ trans('app.api.contra') }}</label>
                                               <label class="input">
                                                <i class="ico-append fa fa-lock"></i>
                                                <input id="password" type="password" class="form-control" name="password" placeholder="ej: **************" value="{{ old('password') }}" @if($errors->has('password'))style="border: 2px solid darkred"@endif>
                                                <span class="tooltip tooltip-top-right">{{ trans('app.api.contra') }}</span>
                                                 @if ($errors->has('password'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('password') }}</strong>
                                                        </span>
                                                    @endif
                                            </label>
                                            </div>

                                               <div class="form-group">
                                                <div class="col-md-12">
                                                        <label class="switch switch-primary switch-round">
                                                             <input type="checkbox" name="remember"> {{ trans('app.api.remember') }}
                                                             &nbsp;
                                                             <span class="switch-label" data-on="{{ trans('app.api.si') }}" data-off="{{ trans('app.api.no') }}"></span>
                                                             
                                                             
                                                        </label>
                                                </div>
                                            </div>
                                        
                                        </fieldset>

                                        <footer class="celarfix">
                                            <button type="submit" class="btn btn-primary noradius pull-right"><i class="fa fa-check"></i> {{ trans('app.api.login') }} </button>
                                            <div class="login-forgot-password pull-left" >
                                                <a href="{{ url('/password/reset') }}">{{ trans('app.api.forgot') }}</a>
                                                <br/>
                                                <br/>
                                                {{ trans('app.api.noaccount') }}, <a href="{{ url('/register') }}"> {{ trans('app.api.create') }}</a>.

                                            </div>
                                        </footer>
                                    </form>
                                    <!-- /login form -->


                                    </div>
                                </div>

                              
                            
                                    

                                    

                                </div>

                                <div class="col-xs-12 col-md-7 col-sm-7 col-lg-8 col-lg-pull-4 col-md-pull-5 col-sm-pull-5">


                                    <img src="{{ asset('frontend/images/demo/laptop.png') }}" class="img-responsive wow fadeIn">

                                </div>

                            </div>

                        </div>

                    </div>
                </div>

            </section>
            <!-- -->



          
            
@endsection




