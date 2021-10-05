@extends('layouts.backend')

@section('content')


 
 <!-- START BREADCRUMB -->
    <ul class="breadcrumb">
        <li><a href="{{ route('admin') }}">Inicio</a></li>
        <li><a href="{{ route('shoes.picture.index') }}">Listado de imágenes</a></li>
        <li><a class="active">Ver Imágen</a></li>
    </ul>
<!-- END BREADCRUMB -->         
     @php
        $name=$picture->bussine->slug;
    @endphp
             
        <div class="row">
            <div class="col-md-12">
                 <div class="panel panel-danger">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Observar imágen</h3>
                                </div>
                               
                                <div class="panel-body">
                                           
                                           <div class="table-responsive">
                                                <table class="table table-bordered table-striped table-actions">
                                                
                                                     <tr>
                                                        <th>
                                                            Nombre Negocio
                                                        </th>
                                                        <td>
                                                            {{ $picture->bussine->name }}
                                                        </td>
                                                    </tr>
                                                     <tr>
                                                        <th>
                                                            Creado
                                                        </th>
                                                        <td>
                                                            {{ $picture->created_at->format('d-m-Y h:i:s A') }}
                                                        </td>
                                                    </tr>
                                                    @if($picture->path)
                                                     <tr>
                                                        <th>
                                                            Imagen
                                                        </th>
                                                        <td>
                                                           
                                                            <img src="{{ asset('images/bussines/'.$name.'/'.$picture->path) }}" width="150" height:"30">
                                                        </td>
                                                    </tr>
                                                    @endif
                                                </table>
                                            </div>
                                            
                              
                                </div>    
                </div> 
                </div>

                <div class="col-md-12">
                <div class="panel panel-danger">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Observar imágen</h3>
                                </div>
                               
                                <div class="panel-body">
                                           
                                          
                                                    
                                          <div class="col-md-2">
                                                    <a href="{{ route('shoes.picture.index') }}" class="btn btn-rounded btn-info" onClick="$.mpb('show',{value: [0,100],speed: -10,state: 'info'});"><span class="fa fa-reply"></span> Regresar</a>
                                            </div>
                                            
                                                <div class="col-md-2">
                                                       <a href="{{ route('shoes.picture.edit',$picture->id) }}" class="btn btn-rounded btn-warning" onClick="$.mpb('show',{value: [0,100],speed: -10,state: 'warning'});"><span class="fa fa-edit"></span> Editar</a>
                                                </div>  
                                            
                                              

                                                <div class="col-md-2">
                                                     {!! Form::open(['route'=>['shoes.picture.destroy',$picture],'method'=>'DELETE']) !!}
                                                       <button type="submit" class="btn btn-rounded btn-danger" onClick="$.mpb('show',{value: [0,100],speed: -10,state: 'danger'});"><span class="fa fa-times"></span> Eliminar</button>
                                                     {!! Form::close() !!} 
                                                </div>

                                            </div>
                                          
                              
                                </div>    
                </div> 

                  

            </div>


                            
                    
                   


@endsection

