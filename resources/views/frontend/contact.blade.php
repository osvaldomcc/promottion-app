@extends('layouts.app')

@section('content')
        

            <!-- -->
            <section>
                <div class="container">
                    
                    <div class="row">


                        <!-- FORM -->
                        <div class="col-md-8 col-sm-8">

                            <h3 class="col-md-offset-1">{{ trans('app.api.drop') }} <strong><em>{{ trans('app.api.hi') }}!</em></strong></h3>
                            
                           <div class="row">
                                <div class="form-group">
                                    <div class="col-md-9 col-md-offset-1">
                                       <center>
                                           @include('flash::message')
                                       </center>
                                    </div>
                                </div>
                            </div>

                            {!! Form::open(['route'=>'front.contactoform','method'=>'POST']) !!}
                                <fieldset>
                                    <div class="row">
                                        <div class="form-group {{ $errors->has('correo') ? 'has-error' : '' }}">
                                            <div class="col-md-9 col-md-offset-1">
                                                <label for="correo" class="margin-top-20  control-label">{{ trans('app.api.correo') }}</label>
                                                {!! Form::email('correo',null,['class'=>'form-control','placeholder'=>'pedro@gmail.com']) !!}
                                                 @if ($errors->has('correo'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('correo') }}</strong>
                                                        </span>
                                                    @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top:-20px;">
                                        <div class="form-group {{ $errors->has('body') ? 'has-error' : '' }}">
                                            <div class="col-md-9 col-md-offset-1">
                                                <label for="password" class="margin-top-20  control-label">{{ trans('app.api.msj') }}</label>
                                                   @if(App::getLocale()=='es')
                                                    {!! Form::textarea('body',null,['class'=>'form-control','rows'=>6,'placeholder'=>'Deje su mensaje aquí...']) !!}
                                                   @else
                                                   {!! Form::textarea('body',null,['class'=>'form-control','rows'=>6,'placeholder'=>'Leave your message...']) !!}
                                                   @endif
                                                    @if ($errors->has('body'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('body') }}</strong>
                                                        </span>
                                                    @endif
                                            </div>
                                        </div>
                                    </div>

                                </fieldset>

                                <div class="row">
                                    <div class="col-md-9 col-md-offset-1">
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> {{ trans('app.api.sendm') }}</button>
                                    </div>
                                </div>
                            {!! Form::close() !!}

                        </div>
                        <!-- /FORM -->


                        <!-- INFO -->
                        <div class="col-md-4 col-sm-4">

                            <h2>{{ trans('app.api.visit') }}</h2>

                            <p class="minetext">
                                {{ trans('app.api.about') }}
                            </p>

                            <hr />

                            <p>
                                <span class="block"><strong><i class="fa fa-map-marker"></i>
                                 {{ trans('app.api.dir') }}:</strong> Street Name, City Name, Country</span>
                                <span class="block"><strong><i class="fa fa-phone"></i>
                                 {{ trans('app.api.tel') }}:</strong> <a >1800-555-1234</a></span>
                                <span class="block"><strong><i class="fa fa-envelope"></i> 
                                {{ trans('app.api.correo') }}:</strong> <a href="mailto:imcoming@gmail.com">imcoming@gmail.com</a></span>
                            </p>

                            <hr />

                            <h4 class="font300">{{ trans('app.api.bh') }}</h4>
                            <p>
                                <span class="block"><strong>{{ trans('app.api.days') }}:</strong> 8am a 6pm</span>
                                <span class="block"><strong>{{ trans('app.api.sat') }}:</strong> 8am a 12pm</span>
                                <span class="block"><strong>{{ trans('app.api.sun') }}:</strong> {{ trans('app.api.close') }} </span>
                            </p>

                        </div>
                        <!-- /INFO -->

                    </div>

                </div>
            </section>
            <!-- / -->


@endsection