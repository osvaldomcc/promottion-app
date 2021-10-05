@extends('layouts.backend')

@section('content')


 
 <!-- START BREADCRUMB -->
    <ul class="breadcrumb">
        <li><a href="{{ route('admin') }}">Inicio</a></li>
        <li><a href="{{ route('shoes.city.index') }}">Listado de ciudades</a></li>
        <li><a class="active">Ver Ciudad</a></li>
    </ul>
<!-- END BREADCRUMB -->         

             
        <div class="row">
            <div class="col-md-12">
                 <div class="panel panel-danger">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Observar ciudad</h3>
                                </div>
                               
                                <div class="panel-body">
                                           
                                           <div class="table-responsive">
                                                <table class="table table-bordered table-striped table-actions">
                                                
                                                     @if($city->path)
                                                     <tr>
                                                        <th>
                                                            Imagen
                                                        </th>
                                                        <td>
                                                            <img src="{{ asset('images/cities/'.$city->path) }}" width="150" height:"30">
                                                        </td>
                                                    </tr>
                                                     @endif
                                                    <tr>
                                                        <th>
                                                            Nombre
                                                        </th>
                                                        <td>
                                                            {{ $city->name }}
                                                        </td>
                                                    </tr>
                                                      <tr>
                                                        <th>
                                                            Slug
                                                        </th>
                                                        <td>
                                                            {{ $city->slug }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            País
                                                        </th>
                                                        <td>
                                                            {{ $city->country->name }}
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                            
                              
                                </div>    
                </div> 
                </div>

                <div class="col-md-12">
                <div class="panel panel-danger">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Observar ciudad</h3>
                                </div>
                               
                                <div class="panel-body">
                                           
                                          
                                                    
                                          <div class="col-md-2">
                                                    <a href="{{ route('shoes.city.index') }}" class="btn btn-rounded btn-info" onClick="$.mpb('show',{value: [0,100],speed: -10,state: 'info'});"><span class="fa fa-reply"></span> Regresar</a>
                                            </div>
                                            
                                                <div class="col-md-2">
                                                       <a href="{{ route('shoes.city.edit',$city->id) }}" class="btn btn-rounded btn-warning" onClick="$.mpb('show',{value: [0,100],speed: -10,state: 'warning'});"><span class="fa fa-edit"></span> Editar</a>
                                                </div>  
                                            
                                              

                                                <div class="col-md-2">
                                                     {!! Form::open(['route'=>['shoes.city.destroy',$city],'method'=>'DELETE']) !!}
                                                       <button type="submit" class="btn btn-rounded btn-danger" onClick="$.mpb('show',{value: [0,100],speed: -10,state: 'danger'});"><span class="fa fa-times"></span> Eliminar</button>
                                                     {!! Form::close() !!} 
                                                </div>

                                            </div>
                                          
                              
                                </div>    
                </div> 

                  

            </div>


                            
                    
                   


@endsection

