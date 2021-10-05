@extends('layouts.perfil')

@section('perfilcontent')

                    <!-- RIGHT -->
                    <div class="col-md-12 margin-top:20px;">
                             <center>
                            @include('flash::message')
                            @if($errors->count()>0)
                                <br/>
                                 <div class="col-md-8 col-md-offset-2">
                                        <div class="alert alert-danger" role="alert">
                                            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <strong>{{ trans('app.api.please') }},</strong> {{ trans('app.api.chequee') }}
                                        </div>
                               </div>
                               <br/>
                            @endif
                        </center>
                        <ul class="nav nav-tabs nav-top-border wow fadeInLeft">
                            <li class="active"><a href="#info" data-toggle="tab">{{ trans('app.api.pi') }}</a></li>
                            <li><a href="#avatar" data-toggle="tab">{{ trans('app.api.img') }}</a></li>
                            <li><a href="#password" data-toggle="tab">{{ trans('app.api.contra') }}</a></li>
                        </ul>

                        <div class="tab-content margin-top-20 wow fadeInRight">

                            <!-- PERSONAL INFO TAB -->
                            <div class="tab-pane fade in active" id="info">

                                {!! Form::model($user,['route'=>['front.edit.user',$user],'method'=>'PUT']) !!}
                                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                        <label>{{ trans('app.api.nombre') }}</label>
                                        {!! Form::text('name',null,['class'=>'form-control']) !!}
                                         @if ($errors->has('name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
                                        <label>{{ trans('app.api.firstname') }}</label>
                                        {!! Form::text('firstname',null,['class'=>'form-control']) !!}
                                         @if ($errors->has('firstname'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('firstname') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
                                        <label>{{ trans('app.api.lastname') }}</label>
                                        {!! Form::text('lastname',null,['class'=>'form-control']) !!}
                                         @if ($errors->has('lastname'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('lastname') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                      <div class="form-group{{ $errors->has('about') ? ' has-error' : '' }}">
                                        <label>{{ trans('app.api.aboutdos') }}</label>
                                        @if(App::getLocale()=='es')
                                            {!! Form::textarea('about',null,['class'=>'form-control','placeholder'=>'Sobre mí...','style'=>'height:150px;']) !!}
                                        @else
                                            {!! Form::textarea('about',null,['class'=>'form-control','placeholder'=>'About me...','style'=>'height:150px;']) !!}
                                        @endif
                                        @if ($errors->has('about'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('about') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    

                                    <div class="margiv-top10">
                                        <a href="#" ></a>
                                        <button class="btn btn-primary"><i class="fa fa-check"></i> {{ trans('app.api.accept') }} </button>
                                    </div>
                                {!! Form::close() !!}

                            </div>
                            <!-- /PERSONAL INFO TAB -->

                            <!-- AVATAR TAB -->
                            <div class="tab-pane fade" id="avatar">

                                {!! Form::model($user,['route'=>['front.edit.image',$user],'method'=>'PUT','files'=>true]) !!}
                                    <div class="form-group">

                                        <div class="row">

                                            <div class="col-md-3 col-sm-4">

                                                <div class="thumbnail">
                                                     @if($user->path)
                                                    <img class="img-responsive" src="{{ asset('images/avatars/'.$user->path) }}" alt="{{ $user->name }}" width="60" height="80" />
                                                     @endif
                                                </div>

                                            </div>

                                            <div class="col-md-9 col-sm-8">

                                                <div class="sky-form nomargin form-group {{ $errors->has('path') ? ' has-error' : '' }}">
                                                    <label class="label">{{ trans('app.api.simg') }}</label>

                                                    <label for="file" class="input input-file">
                                                        <div class="button">
                                                            {!! Form::file('path',['id'=>'file','onchange'=>'this.parentNode.nextSibling.value = this.value']) !!}
                                                            <i class="fa fa-search"></i> {{ trans('app.api.search') }}
                                                        </div><input  id="only" type="text" @if($errors->has('path'))style="border: 2px solid darkred"@endif>
                                                    </label>
                                                    @if ($errors->has('path'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('path') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>

                                                <a href="#" id="elim" class="btn btn-danger btn-xs noradius"><i class="fa fa-times"></i> {{ trans('app.api.ei') }}</a>

                                                <div class="clearfix margin-top-20">
                                                    <span class="label label-warning">{{ trans('app.api.note2') }}! </span>
                                                    <p>
                                                       {{ trans('app.api.upload') }}
                                                    </p>
                                                </div>

                                            </div>

                                        </div>

                                    </div>


                                    <div class="margiv-top10">
                                        <button class="btn btn-primary"><i class="fa fa-check"></i> {{ trans('app.api.accept') }}</button>
                                    </div>

                                {!! Form::close() !!}

                            </div>
                            <!-- /AVATAR TAB -->

                            <!-- PASSWORD TAB -->
                            <div class="tab-pane fade" id="password">

                                {!! Form::model($user,['route'=>['front.edit.password',$user],'method'=>'PUT']) !!}

                                 <div class="form-group{{ $errors->has('act_password') ? ' has-error' : '' }}">
                                        <label>{{ trans('app.api.acp') }}</label>
                                        {!! Form::password('act_password',['class'=>'form-control','placeholder'=>'***********']) !!}
                                        @if ($errors->has('act_password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('act_password') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                   <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                        <label>{{ trans('app.api.np') }}</label>
                                        {!! Form::password('password',['class'=>'form-control','placeholder'=>'***********']) !!}
                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                       <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                        <label>{{ trans('app.api.rp') }}</label>
                                        {!! Form::password('password_confirmation',['class'=>'form-control','placeholder'=>'***********']) !!}
                                        @if ($errors->has('password_confirmation'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="margiv-top10">
                                        <button class="btn btn-primary"><i class="fa fa-check"></i> {{ trans('app.api.change') }}</button>
                                    </div>

                                {!! Form::close() !!}

                            </div>
                            <!-- /PASSWORD TAB -->

                            

                        </div>

                    </div>


@endsection

@section('scripts')
        
        <script type="text/javascript">
                
                $(document).ready(function(){
                    
                    $('#elim').click(function(e){
                        e.preventDefault();
                        $('#only').val(null);
                        $('#file').val(null);
                    });

                });

        </script>

@endsection