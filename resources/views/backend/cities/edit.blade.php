@extends('layouts.backend')

@section('content')


 
 <!-- START BREADCRUMB -->
    <ul class="breadcrumb">
        <li><a href="{{ route('admin') }}">Inicio</a></li>
        <li><a href="{{ route('shoes.city.index') }}">Listado de ciudades</a></li>
        <li><a class="active">Editar Ciudad</a></li>
    </ul>
<!-- END BREADCRUMB -->         

             
    
        <div class="row">
            <div class="col-md-12">
                 <div class="panel panel-danger">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Editar ciudad</h3>
                                </div>
                               
                                <div class="panel-body">
                                           
                                               {!! Form::model($city,['route'=>['shoes.city.update',$city->id],'method'=>'PUT','files'=>true]) !!}
                                                    
                                                    <div class="col-md-6 col-md-offset-3">
                                                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                                            {!! Form::label('name','Nombre:') !!}
                                                            {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'ej: Cuba']) !!}
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

                                                        <div class="form-group {{ $errors->has('country_id') ? 'has-error' : '' }}">
                                                            {!! Form::label('country_id','País:') !!}
                                                            {!! Form::select('country_id',$countries,null,['class'=>'form-control select','data-live-search'=>'true','placeholder'=>'Seleccione...']) !!}
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

                                                        <div class="form-group {{ $errors->has('slug') ? 'has-error' : '' }}">
                                                            {!! Form::label('slug','Slug:') !!}
                                                            {!! Form::text('slug',null,['class'=>'form-control','placeholder'=>'Seleccione...']) !!}
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

                                                        @if($city->path)
                                                        <img src="{{ asset('images/cities/'.$city->path) }}" width="160" height:"200" id="mineimg">

                                                        @endif
                                                         <div class="form-group {{ $errors->has('path') ? 'has-error' : '' }}">
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
                                                          <div class="form-group {{ $city->path ? ' hidden' : '' }} ">
                                                                {!! Form::label('path','Foto:') !!}
                                                                {!! Form::file('path',['class'=>'']) !!}

                                                        </div>
                                                    </div>  
                                                
                                                <div class="col-md-12" style="margin-top: 40px;border-top: 1px solid lightgray">
                                                <br>
                                                        <div class="form-group">
                                                            <center>
                                                                <button type="submit" class="btn btn-rounded btn-success" onClick="$.mpb('show',{value: [0,100],speed: -10,state: 'success'});"><span class="fa fa-check"></span>&nbsp;Editar&nbsp;</button>
                                                                &nbsp;
                                                                <a href="{{ route('shoes.city.index') }}" class="btn btn-rounded btn-danger" onClick="$.mpb('show',{value: [0,100],speed: -10,state: 'danger'});"><span class="fa fa-times"></span>Cancelar</a>
                                                            </center>
                                                    </div>
                                                </div>

                                            {!! Form::close() !!}
                                            
                                            
                              
                                </div>    
                    </div> 
            </div>
        </div>
    


                            
                    
                   


@endsection

@section('scripts')

       <script type="text/javascript">
         $(document).ready(function(){
            $('#mineimg').click(function(){
                $('#path').click();
            });
        });
   </script>


@endsection