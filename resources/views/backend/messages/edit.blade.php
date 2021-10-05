@extends('layouts.backend')

@section('content')


 
 <!-- START BREADCRUMB -->
    <ul class="breadcrumb">
        <li><a href="{{ route('admin') }}">Inicio</a></li>
        <li><a href="{{ route('shoes.category.index') }}">Listado de categorías</a></li>
        <li><a class="active">Editar Categoría</a></li>
    </ul>
<!-- END BREADCRUMB -->         

             
    
        <div class="row">
            <div class="col-md-12">
                 <div class="panel panel-danger">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Editar categoría</h3>
                                </div>
                               
                                <div class="panel-body">
                                           
                                               {!! Form::model($category,['route'=>['shoes.category.update',$category->id],'method'=>'PUT']) !!}
                                                    
                                                    <div class="col-md-6 col-md-offset-3">
                                                        <div class="form-group">
                                                            {!! Form::label('name','Nombre:') !!}
                                                            {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'ej: Hotel']) !!}
                                                        </div>
                                                    </div>  
                                                
                                                <div class="col-md-12" style="margin-top: 40px;border-top: 1px solid lightgray">
                                                <br>
                                                        <div class="form-group">
                                                            <center>
                                                                <button type="submit" class="btn btn-rounded btn-success" onClick="$.mpb('show',{value: [0,100],speed: -10,state: 'success'});"><span class="fa fa-check"></span>&nbsp;Editar&nbsp;</button>
                                                                &nbsp;
                                                                <a href="{{ route('shoes.category.index') }}" class="btn btn-rounded btn-danger" onClick="$.mpb('show',{value: [0,100],speed: -10,state: 'danger'});"><span class="fa fa-times"></span>Cancelar</a>
                                                            </center>
                                                    </div>
                                                </div>

                                            {!! Form::close() !!}
                                            
                                            
                              
                                </div>    
                    </div> 
            </div>
        </div>
    


                            
                    
                   


@endsection

