@extends('layouts.backend')

@section('content')


 
 <!-- START BREADCRUMB -->
    <ul class="breadcrumb">
        <li><a href="{{ route('admin') }}">Inicio</a></li>
        <li><a href="{{ route('shoes.subcategory.index') }}">Listado de subcategorías</a></li>
        <li><a class="active">Ver Subcategoría</a></li>
    </ul>
<!-- END BREADCRUMB -->         

             
        <div class="row">
            <div class="col-md-12">
                 <div class="panel panel-danger">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Observar subcategoría</h3>
                                </div>
                               
                                <div class="panel-body">
                                           
                                           <div class="table-responsive">
                                                <table class="table table-bordered table-striped table-actions">
                                                    <tr>
                                                        <th>
                                                            Nombre
                                                        </th>
                                                        <td>
                                                            {{ $subcategory->name }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            Slug
                                                        </th>
                                                        <td>
                                                            {{ $subcategory->slug }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            Categoría
                                                        </th>
                                                        <td>
                                                            {{ $subcategory->category->name }}
                                                        </td>
                                                    </tr>
                                                     <tr>
                                                        <th>
                                                            Icono
                                                        </th>
                                                        <td>
                                                            <i class="{{ $subcategory->icono }}"></i>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            Creado
                                                        </th>
                                                        <td>
                                                            {{ $subcategory->created_at }}
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
                                    <h3 class="panel-title">Observar categoría</h3>
                                </div>
                               
                                <div class="panel-body">
                                           
                                          
                                                    
                                          <div class="col-md-2">
                                                    <a href="{{ route('shoes.subcategory.index') }}" class="btn btn-rounded btn-info" onClick="$.mpb('show',{value: [0,100],speed: -10,state: 'info'});"><span class="fa fa-reply"></span> Regresar</a>
                                            </div>
                                            
                                                <div class="col-md-2">
                                                       <a href="{{ route('shoes.subcategory.edit',$subcategory->id) }}" class="btn btn-rounded btn-warning" onClick="$.mpb('show',{value: [0,100],speed: -10,state: 'warning'});"><span class="fa fa-edit"></span> Editar</a>
                                                </div>  
                                            
                                              

                                                <div class="col-md-2">
                                                     {!! Form::open(['route'=>['shoes.subcategory.destroy',$subcategory],'method'=>'DELETE']) !!}
                                                       <button type="submit" class="btn btn-rounded btn-danger" onClick="$.mpb('show',{value: [0,100],speed: -10,state: 'danger'});"><span class="fa fa-times"></span> Eliminar</button>
                                                     {!! Form::close() !!} 
                                                </div>

                                            </div>
                                          
                              
                                </div>    
                </div> 

                  

            </div>


                            
                    
                   


@endsection

