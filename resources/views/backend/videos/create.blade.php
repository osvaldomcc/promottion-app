@extends('layouts.backend')

@section('content')

 <!-- START BREADCRUMB -->
    <ul class="breadcrumb">
        <li><a href="{{ route('admin') }}">Inicio</a></li>
        <li><a href="{{ route('shoes.video.index') }}">Listado de videos</a></li>
        <li><a class="active">Crear Video</a></li>
    </ul>
<!-- END BREADCRUMB -->         

             
    
        <div class="row">
            <div class="col-md-12">
                 <div class="panel panel-danger">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Crear nuevo video</h3>
                                </div>
                               
                                <div class="panel-body">
                                           
                                               {!! Form::open(['route'=>'shoes.video.store','method'=>'POST']) !!}
                                                    
                                                  <div class="col-md-6 col-md-offset-3">
                                                          <div class="form-group {{ $errors->has('path') ? 'has-error' : '' }}">
                                                                {!! Form::label('path','Url:') !!}
                                                                {!! Form::text('path',null,['class'=>'form-control','placeholder'=>'ej: http://youtube.com/sad65.mp4']) !!}
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
                                                         <div class="form-group {{ $errors->has('bussine_id') ? 'has-error' : '' }}">
                                                                {!! Form::label('bussine_id','Negocio:') !!}
                                                                {!! Form::select('bussine_id',$bussines,null,['class'=>'form-control select','data-live-search'=>'true','placeholder'=>'Seleccione...']) !!}
                                                                 @if($errors->has('bussine_id'))
                                                                <span class="help-block">
                                                                    <ul>
                                                                        <li>
                                                                            {{ $errors->first('bussine_id') }}
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
                                                                <a href="{{ route('shoes.video.index') }}" class="btn btn-rounded btn-danger" onClick="$.mpb('show',{value: [0,100],speed: -10,state: 'danger'});"><span class="fa fa-times"></span>Cancelar</a>
                                                            </center>
                                                    </div>
                                                </div>

                                            {!! Form::close() !!}
                                            
                                            
                              
                                </div>    
                    </div> 
            </div>
        </div>
    


                            
                    
                   


@endsection

