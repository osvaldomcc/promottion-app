@extends('layouts.backend')

@section('content')


 
 <!-- START BREADCRUMB -->
    <ul class="breadcrumb">
        <li><a href="{{ route('admin') }}">Inicio</a></li>
        <li><a href="{{ route('shoes.subcategory.index') }}">Listado de subcategorías</a></li>
        <li><a class="active">Crear Categoría</a></li>
    </ul>
<!-- END BREADCRUMB -->         

             
    
        <div class="row">
            <div class="col-md-12">
                 <div class="panel panel-danger">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Crear nueva subcategoría</h3>
                                </div>
                               
                                <div class="panel-body">
                                           
                                               {!! Form::open(['route'=>'shoes.subcategory.store','method'=>'POST']) !!}
                                                    
                                                    <div class="col-md-6 col-md-offset-3">
                                                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                                            {!! Form::label('name','Nombre:') !!}
                                                            {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'ej: Hotel']) !!}
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
                                                    

                                                    
                                                        <div class="form-group {{ $errors->has('category_id') ? 'has-error' : '' }}">
                                                            {!! Form::label('category_id','Categoría:') !!}
                                                            {!! Form::select('category_id',$categories,null,['class'=>'form-control select','data-live-search'=>'true','placeholder'=>'Seleccione...']) !!}
                                                            @if($errors->has('category_id'))
                                                                <span class="help-block">
                                                                    <ul>
                                                                        <li>
                                                                            {{ $errors->first('category_id') }}
                                                                        </li>
                                                                    </ul>
                                                                </span>
                                                            @endif
                                                        </div>

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

                                                          <div class="form-group {{ $errors->has('icono') ? 'has-error' : '' }}">
                                                            {!! Form::label('icono','Icono:') !!}
                                                            {!! Form::text('icono',null,['class'=>'form-control','placeholder'=>'ej: fa fa-user']) !!}
                                                             @if($errors->has('icono'))
                                                                <span class="help-block">
                                                                    <ul>
                                                                        <li>
                                                                            {{ $errors->first('icono') }}
                                                                        </li>
                                                                    </ul>
                                                                </span>
                                                            @endif
                                                        </div>
                                                        
                                                    </div>  
                                                
                                                <div class="col-md-12" style="margin-top: 40px;border-top: 1px solid lightgray">
                                                <br>
                                                        <div class="form-group">
                                                            <center>
                                                                <button type="submit" class="btn btn-rounded btn-success" onClick="$.mpb('show',{value: [0,100],speed: -10,state: 'success'});"><span class="fa fa-check"></span>&nbsp;Crear&nbsp;</button>
                                                                &nbsp;
                                                                <a href="{{ route('shoes.subcategory.index') }}" class="btn btn-rounded btn-danger" onClick="$.mpb('show',{value: [0,100],speed: -10,state: 'danger'});"><span class="fa fa-times"></span>Cancelar</a>
                                                            </center>
                                                    </div>
                                                </div>

                                            {!! Form::close() !!}
                                            
                                            
                              
                                </div>    
                    </div> 
            </div>
        </div>
    


                            
                    
                   


@endsection

