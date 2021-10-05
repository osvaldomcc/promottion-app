@extends('layouts.backend')

@section('content')


 
 <!-- START BREADCRUMB -->
    <ul class="breadcrumb">
        <li><a href="{{ route('admin') }}">Inicio</a></li>
        <li><a href="{{ route('shoes.user.index') }}">Listado de usuarios</a></li>
        <li><a class="active">Crear Usuario</a></li>
    </ul>
<!-- END BREADCRUMB -->         

             
    
        <div class="row">
            <div class="col-md-12">
                 <div class="panel panel-danger">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Crear nuevo usuario</h3>
                                </div>
                               
                                <div class="panel-body">
                                           
                                               {!! Form::open(['route'=>'shoes.user.store','method'=>'POST','files'=>true]) !!}
                                                <div class="col-md-6">
                                                    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                                        {!! Form::label('name','Nombre:') !!}
                                                        {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'ej: Osvaldo']) !!}
                                                         @if($errors->has('name'))
                                                                <span class="help-block">
                                                                    <ul>
                                                                        <li>
                                                                            {{ $errors->first('name') }}
                                                                        </li>
                                                                    </ul>
                                                                </span>
                                                            @endif
                                                </div>
                                                 <div class="form-group {{ $errors->has('firstname') ? 'has-error' : '' }}">
                                                        {!! Form::label('firstname','Primer Apellido:') !!}
                                                        {!! Form::text('firstname',null,['class'=>'form-control','placeholder'=>'ej: Castillo']) !!}
                                                        @if($errors->has('firstname'))
                                                                <span class="help-block">
                                                                    <ul>
                                                                        <li>
                                                                            {{ $errors->first('firstname') }}
                                                                        </li>
                                                                    </ul>
                                                                </span>
                                                            @endif
                                                </div>
                                                  <div class="form-group {{ $errors->has('lastname') ? 'has-error' : '' }}">
                                                        {!! Form::label('lastname','Segundo Apellido:') !!}
                                                        {!! Form::text('lastname',null,['class'=>'form-control','placeholder'=>'ej: Calderón']) !!}
                                                         @if($errors->has('lastname'))
                                                                <span class="help-block">
                                                                    <ul>
                                                                        <li>
                                                                            {{ $errors->first('lastname') }}
                                                                        </li>
                                                                    </ul>
                                                                </span>
                                                            @endif
                                                </div>
                                                 <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                                                        {!! Form::label('email','Correo:') !!}
                                                        {!! Form::email('email',null,['class'=>'form-control','placeholder'=>'ej: osvaldo@gmail.com']) !!}
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
                                                 <div class="form-group {{ $errors->has('about') ? 'has-error' : '' }}">
                                                        {!! Form::label('about','Sobre mí:') !!}
                                                        {!! Form::textarea('about',null,['class'=>'form-control','placeholder'=>'ej: Soy Ingeniero en Ciencias Informáticas...','style'=>'height:100px;']) !!}
                                                         @if($errors->has('about'))
                                                                <span class="help-block">
                                                                    <ul>
                                                                        <li>
                                                                            {{ $errors->first('about') }}
                                                                        </li>
                                                                    </ul>
                                                                </span>
                                                            @endif
                                                </div>
                                                </div>  


                                                 <div class="col-md-6">
                                                    <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                                                        {!! Form::label('password','Contraseña:') !!}
                                                        {!! Form::password('password',['class'=>'form-control','placeholder'=>'ej: ****************']) !!}
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
                                                 <div class="form-group {{ $errors->has('rol') ? 'has-error' : '' }}">
                                                        {!! Form::label('rol','Rol:') !!}
                                                        {!! Form::select('rol',[''=>'Seleccione...','user'=>'Usuario','admin'=>'Administrador','super_admin'=>'Super Administrador'],null,['class'=>'form-control']) !!}
                                                        @if($errors->has('rol'))
                                                                <span class="help-block">
                                                                    <ul>
                                                                        <li>
                                                                            {{ $errors->first('rol') }}
                                                                        </li>
                                                                    </ul>
                                                                </span>
                                                            @endif
                                                </div>
                                                <div class="form-group {{ $errors->has('country_id') ? 'has-error' : '' }}">
                                                        {!! Form::label('country_id','País:') !!}
                                                        {!! Form::select('country_id',$countries,null,['class'=>'form-control','placeholder'=>'Seleccione...']) !!}
                                                           @if($errors->has('country_id'))
                                                                <span class="help-block">
                                                                    <ul>
                                                                        <li>
                                                                            {{ $errors->first('country_id') }}
                                                                        </li>
                                                                    </ul>
                                                                </span>
                                                            @endif
                                                </div>
                                                 <div class="form-group {{ $errors->has('accept_terms') ? 'has-error' : '' }}">

                                                   {!! Form::label('permite_email','Permite email:') !!}
                                                    <label class="switch switch-small">
                                                        {!! Form::checkbox('permite_email',null,null,null) !!}
                                                        <span></span>
                                                    </label>
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                                                    {!! Form::label('accept_terms','Acepta los terminos:') !!}
                                                    <label class="switch switch-small">
                                                        {!! Form::checkbox('accept_terms',null,null,null) !!}
                                                        <span></span>
                                                    </label>
                                                      @if($errors->has('accept_terms'))
                                                                <span class="help-block pull-right">
                                                                    <ul>
                                                                        <li>
                                                                            {{ $errors->first('accept_terms') }}
                                                                        </li>
                                                                    </ul>
                                                                </span>
                                                            @endif
                                                </div>
                                                  <div class="form-group {{ $errors->has('path') ? 'has-error' : '' }}">
                                                        {!! Form::label('path','Foto:') !!}
                                                        {!! Form::file('path',['class'=>'']) !!}
                                                         @if($errors->has('path'))
                                                                <span class="help-block">
                                                                    <ul>
                                                                        <li>
                                                                            {{ $errors->first('path') }}
                                                                        </li>
                                                                    </ul>
                                                                </span>
                                                            @endif
                                                </div>
                                                </div>  
                                                <div class="col-md-12" style="margin-top: 18px;border-top: 1px solid lightgray">
                                                <br>
                                                        <div class="form-group">
                                                            <center>
                                                                <button type="submit" class="btn btn-rounded btn-success" onClick="$.mpb('show',{value: [0,100],speed: -10,state: 'success'});"><span class="fa fa-check"></span>&nbsp;Crear&nbsp;</button>
                                                                &nbsp;
                                                                <a href="{{ route('shoes.user.index') }}" class="btn btn-rounded btn-danger" onClick="$.mpb('show',{value: [0,100],speed: -10,state: 'danger'});"><span class="fa fa-times"></span>Cancelar</a>
                                                            </center>
                                                    </div>
                                                </div>

                                            {!! Form::close() !!}
                                            
                                            
                              
                                </div>    
                    </div> 
            </div>
        </div>
    


                            
                    
                   


@endsection

