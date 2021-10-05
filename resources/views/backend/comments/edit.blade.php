@extends('layouts.backend')

@section('content')


 
 <!-- START BREADCRUMB -->
    <ul class="breadcrumb">
        <li><a href="{{ route('admin') }}">Inicio</a></li>
        <li><a href="{{ route('shoes.bussine.index') }}">Listado de comentarios</a></li>
        <li><a class="active">Editar Comentario</a></li>
    </ul>
<!-- END BREADCRUMB -->         

             
        <div class="row">
            <div class="col-md-12">
                 <div class="panel panel-danger">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Editar comentario</h3>
                                </div>
                               
                                <div class="panel-body">
                                           
                                               {!! Form::model($comment,['route'=>['shoes.comment.update',$comment->id],'method'=>'PUT']) !!}
                                                 <div class="col-md-6">

                                                    <div class="form-group">
                                                        {!! Form::label('title','Título:') !!}
                                                        {!! Form::text('title',null,['class'=>'form-control','placeholder'=>'ej: Lo mejor']) !!}
                                                    </div>

                                                   <div class="form-group">
                                                        {!! Form::label('bussine_id','Negocio:') !!}
                                                        {!! Form::select('bussine_id',$bussines,null,['class'=>'form-control','placeholder'=>'Seleccione...']) !!}
                                                    </div>

                                                    <div class="form-group">

                                                    {!! Form::label('like','Es de su agrado:') !!}
                                                    <label class="switch switch-small">
                                                        {!! Form::checkbox('like',null,null,null) !!}
                                                        <span></span>
                                                    </label>
                                                    </div>
                                            </div>
                                            <div class="col-md-6">
                                                    <div class="form-group">
                                                        {!! Form::label('body','Comentario:') !!}
                                                        {!! Form::textarea('body',null,['class'=>'form-control','placeholder'=>'ej: Creo qu está muy bueno...','style'=>'height:100px;']) !!}
                                                    </div>
                                            </div>
                                                
                                                <div class="col-md-12" style="margin-top: 18px;border-top: 1px solid lightgray">
                                                <br>
                                                        <div class="form-group">
                                                            <center>
                                                                <button type="submit" class="btn btn-rounded btn-success" onClick="$.mpb('show',{value: [0,100],speed: -10,state: 'success'});"><span class="fa fa-check"></span>&nbsp;Editar&nbsp;</button>
                                                                &nbsp;
                                                                <a href="{{ route('shoes.comment.index') }}" class="btn btn-rounded btn-danger" onClick="$.mpb('show',{value: [0,100],speed: -10,state: 'danger'});"><span class="fa fa-times"></span>Cancelar</a>
                                                            </center>
                                                    </div>
                                                </div>

                                            {!! Form::close() !!}
                                            
                                            
                              
                                </div>    
                    </div> 
            </div>
        </div>


                            
                    
                   


@endsection


