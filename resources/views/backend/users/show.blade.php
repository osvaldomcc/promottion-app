@extends('layouts.backend')

@section('content')


 
 <!-- START BREADCRUMB -->
    <ul class="breadcrumb">
        <li><a href="{{ route('admin') }}">Inicio</a></li>
        <li><a href="{{ route('shoes.user.index') }}">Listado de usuarios</a></li>
        <li><a class="active">Ver Usuario</a></li>
    </ul>
<!-- END BREADCRUMB -->         

             
        <div class="row">
            <div class="col-md-12">
                 <div class="panel panel-danger">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Observar usuario</h3>
                                </div>
                               
                                <div class="panel-body">
                                           
                                           <div class="table-responsive">
                                                <table class="table table-bordered table-striped table-actions">
                                                
                                                     <tr>
                                                        <th>
                                                            Imagen
                                                        </th>
                                                        <td>
                                                            <img src="{{ asset('images/avatars/'.$user->path) }}" width="60" height:"30">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            Nombre
                                                        </th>
                                                        <td>
                                                            {{ $user->name }}
                                                        </td>
                                                    </tr>
                                                     <tr>
                                                        <th>
                                                            Primer Apellido
                                                        </th>
                                                        <td>
                                                            {{ $user->firstname }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            Segundo Apellido
                                                        </th>
                                                        <td>
                                                            {{ $user->lastname }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            Correo
                                                        </th>
                                                        <td>
                                                            {{ $user->email }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            Rol
                                                        </th>
                                                        <td>
                                                             @if($user->rol == 'admin')
                                                                Administrador
                                                            @elseif($user->rol == 'super_admin')
                                                                Super Administrador
                                                            @else
                                                                Usuario
                                                            @endif
                                                        </td>
                                                    </tr>
                                                      <tr>
                                                        <th>
                                                            Descripción
                                                        </th>
                                                        <td>
                                                            {{ $user->about }}
                                                        </td>
                                                    </tr>
                                                     <tr>
                                                        <th>
                                                            País
                                                        </th>
                                                        <td>
                                                            {{ $user->country->name }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            Permite email y Acepta los términos
                                                        </th>
                                                        <td>
                                                            @if($user->permite_email == 0)
                                                                No
                                                            @else
                                                                Si
                                                            @endif  
                                                            &nbsp;&nbsp;&nbsp;
                                                             @if($user->accept_terms == 0)
                                                                No
                                                            @else
                                                                Si
                                                            @endif
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
                                    <h3 class="panel-title">Observar usuario</h3>
                                </div>
                               
                                <div class="panel-body">
                                           
                                          
                                                    
                                          <div class="col-md-2">
                                                    <a href="{{ route('shoes.user.index') }}" class="btn btn-rounded btn-info" onClick="$.mpb('show',{value: [0,100],speed: -10,state: 'info'});"><span class="fa fa-reply"></span> Regresar</a>
                                            </div>
                                            
                                                <div class="col-md-2">
                                                       <a href="{{ route('shoes.user.edit',$user->id) }}" class="btn btn-rounded btn-warning" onClick="$.mpb('show',{value: [0,100],speed: -10,state: 'warning'});"><span class="fa fa-edit"></span> Editar</a>
                                                </div>  
                                            
                                              

                                                <div class="col-md-2">
                                                     {!! Form::open(['route'=>['shoes.user.destroy',$user],'method'=>'DELETE']) !!}
                                                       <button type="submit" class="btn btn-rounded btn-danger" onClick="$.mpb('show',{value: [0,100],speed: -10,state: 'danger'});"><span class="fa fa-times"></span> Eliminar</button>
                                                     {!! Form::close() !!} 
                                                </div>

                                            </div>
                                          
                              
                                </div>    
                </div> 

                  

            </div>


                            
                    
                   


@endsection

