@extends('layouts.backend')

@section('content')


 
 <!-- START BREADCRUMB -->
    <ul class="breadcrumb">
        <li><a href="{{ route('admin') }}">Inicio</a></li>
        <li><a href="{{ route('shoes.bussine.index') }}">Listado de negocios</a></li>
        <li><a class="active">Editar Negocio</a></li>
    </ul>
<!-- END BREADCRUMB -->         

             
        <div class="row">
            <div class="col-md-12">
                 <div class="panel panel-danger">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Editar negocio</h3>
                                </div>
                               
                                <div class="panel-body">
                                           
                                               {!! Form::model($bussine,['route'=>['shoes.bussine.update',$bussine->id],'method'=>'PUT','files'=>true]) !!}
                                               <div class="col-md-6">
                                                 @if($bussine->logo)
                                                            <img src="{{ asset('images/logos/'.$bussine->logo) }}" alt="" height="100px;" width="100px;" class="minelogo"/>
                                                    @endif

                                                  <div class="form-group {{ $errors->has('path') ? 'has-error' : '' }}">
                                                                {!! Form::label('logo','Logo:') !!}
                                                                {!! Form::file('logo',['class'=>'file']) !!}
                                                                @if($errors->has('logo'))
                                                                <span class="help-block">
                                                                    <ul>
                                                                        <li>
                                                                            {{ $errors->first('logo') }}
                                                                        </li>
                                                                    </ul>
                                                                </span>
                                                            @endif
                                                        </div>

                                                        
                                                     <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                                        {!! Form::label('name','Nombre:') !!}
                                                        {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'ej: Hotel Plaza']) !!}
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
                                                 <div class="form-group">
                                                        {!! Form::label('slogan','Slogan:') !!}
                                                        {!! Form::text('slogan',null,['class'=>'form-control','placeholder'=>'ej: Su mejor opción']) !!}
                                                </div>

                                           
                                                        
                                                    <div class="form-group {{ $errors->has('municipality_id') ? 'has-error' : '' }}">
                                                        {!! Form::label('municipality_id','Municipio:') !!}
                                                        {!! Form::select('municipality_id',$municipalities,null,['class'=>'form-control select','data-live-search'=>'true','placeholder'=>'Seleccione...']) !!}
                                                        @if($errors->has('municipality_id'))
                                                                <span class="help-block">
                                                                    <ul>
                                                                        <li>
                                                                            {{ $errors->first('municipality_id') }}
                                                                        </li>
                                                                    </ul>
                                                                </span>
                                                            @endif
                                                </div>

                                                   <div class="form-group {{ $errors->has('subcategory_id') ? 'has-error' : '' }}">
                                                        {!! Form::label('subcategory_id','Subcategoría:') !!}
                                                        {!! Form::select('subcategory_id',$subcategories,null,['class'=>'form-control select','data-live-search'=>'true','placeholder'=>'Seleccione...']) !!}
                                                        @if($errors->has('subcategory_id'))
                                                                <span class="help-block">
                                                                    <ul>
                                                                        <li>
                                                                            {{ $errors->first('subcategory_id') }}
                                                                        </li>
                                                                    </ul>
                                                                </span>
                                                            @endif
                                                </div>

                                                <div class="form-group {{ $errors->has('slug') ? 'has-error' : '' }}">
                                                        {!! Form::label('slug','Slug:') !!}
                                                        {!! Form::text('slug',null,['class'=>'form-control','placeholder'=>'ej: republica-dominicana']) !!}
                                                        @if($errors->has('slug'))   
                                                                <span class="help-block">
                                                                    <ul>
                                                                        <li>
                                                                            {{ $errors->first('slug') }}
                                                                        </li>
                                                                    </ul>
                                                                </span>
                                                            @endif
                                                </div>
                                                
                                                    <div class="container">
                                                  <div class="row" >
                                                        <div class="col-md-4 text-center" >
                                                        <div>{!! Form::label('ranking','Ranking:') !!}</div>
                                                        <input class="knob" data-width="150" data-min="0" data-max="5" data-fgColor="#61C0E6" data-displayPrevious=true value="{{ $bussine->ranking }}" name="ranking" id="ranking"/>
                                                        </div>
                                                    </div>
                                               </div>


                                               
                                                </div>  


                                                 <div class="col-md-6">

                                                 <div class="form-group {{ $errors->has('lang_id') ? 'has-error' : '' }}">
                                                            {!! Form::label('lang_id','Idioma:') !!}
                                                            {!! Form::select('lang_id',$langs,null,['class'=>'form-control select','data-live-search'=>'true','placeholder'=>'Seleccione...']) !!}
                                                            @if($errors->has('lang_id'))
                                                                <span class="help-block">
                                                                    <ul>
                                                                        <li>
                                                                            {{ $errors->first('lang_id') }}
                                                                        </li>
                                                                    </ul>
                                                                </span>
                                                            @endif
                                                        </div>

                                                 <div class="form-group">
                                                        {!! Form::label('address','Dirección:') !!}
                                                        {!! Form::textarea('address',null,['class'=>'form-control','placeholder'=>'ej: Carlos Roloff % Primera y Parque...','style'=>'height:100px;']) !!}
                                                 </div>

                                                 <div class="form-group">
                                                        {!! Form::label('description','Descripción:') !!}
                                                        {!! Form::textarea('description',null,['class'=>'form-control','placeholder'=>'ej: Nos dedicamos a la renta de habitaciones...','style'=>'height:100px;']) !!}
                                                </div>


                                                  <div class="form-group">
                                                        {!! Form::label('characteristics','Características:') !!}
                                                        {!! Form::textarea('characteristics',null,['class'=>'form-control','placeholder'=>'ej: Tenemos wifi 24 horas gratuita...','style'=>'height:100px;']) !!}
                                                </div>


                                              <div class="form-group">

                                                    {!! Form::label('banner','Seleccione si pertenece al banner:') !!}
                                                    <label class="switch switch-small">
                                                        {!! Form::checkbox('banner',null,null,null) !!}
                                                        <span></span>
                                                    </label>
                                                </div>  
                                             
                                                </div>  
                                                <div class="col-md-12" style="margin-top: 18px;border-top: 1px solid lightgray">
                                                <br>
                                                        <div class="form-group">
                                                            <center>
                                                                <button type="submit" class="btn btn-rounded btn-success" onClick="$.mpb('show',{value: [0,100],speed: -10,state: 'success'});"><span class="fa fa-check"></span>&nbsp;Editar&nbsp;</button>
                                                                &nbsp;
                                                                <a href="{{ route('shoes.bussine.index') }}" class="btn btn-rounded btn-danger" onClick="$.mpb('show',{value: [0,100],speed: -10,state: 'danger'});"><span class="fa fa-times"></span>Cancelar</a>
                                                            </center>
                                                    </div>
                                                </div>

                                            {!! Form::close() !!}
                                            
                                            
                              
                                </div>    
                    </div> 
            </div>
        </div>


                            
                    
                   


@endsection


