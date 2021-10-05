@extends('layouts.backend')

@section('content')

 @php
    $name=$picture->bussine->slug;
@endphp
 
 <!-- START BREADCRUMB -->
    <ul class="breadcrumb">
        <li><a href="{{ route('admin') }}">Inicio</a></li>
        <li><a href="{{ route('shoes.picture.index') }}">Listado de imágenes</a></li>
        <li><a class="active">Editar Imágen</a></li>
    </ul>
<!-- END BREADCRUMB -->         
    
             
        <div class="row">
            <div class="col-md-12">
                 <div class="panel panel-danger">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Editar imágen</h3>
                                </div>
                               
                                <div class="panel-body">
                                           
                                               {!! Form::model($picture,['route'=>['shoes.picture.update',$picture],'method'=>'PUT','files'=>true]) !!}
                                                    
                                                    <div class="col-md-6 col-md-offset-3">

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

                                                        @if($picture->path)
                                                            <img src="{{ asset('images/bussines/'.$name.'/'.$picture->path) }}" width="160" height:"200" id="mineimg">
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
                                                          <div class="form-group {{ $picture->path ? 'hidden' : '' }} ">
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
                                                                <a href="{{ route('shoes.picture.index') }}" class="btn btn-rounded btn-danger" onClick="$.mpb('show',{value: [0,100],speed: -10,state: 'danger'});"><span class="fa fa-times"></span>Cancelar</a>
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