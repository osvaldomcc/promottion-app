@extends('layouts.backend')

@section('content')


 
 <!-- START BREADCRUMB -->
    <ul class="breadcrumb">
        <li><a href="{{ route('admin') }}">Inicio</a></li>
        <li><a href="{{ route('shoes.message.index') }}">Listado de mensajes</a></li>
        <li><a class="active">Ver Mensaje</a></li>
    </ul>
<!-- END BREADCRUMB -->         

             
        <div class="row">
            <div class="col-md-12">
                 <div class="panel panel-danger">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Observar mensaje</h3>
                                </div>
                               
                                <div class="panel-body">
                                           
                                           <div class="table-responsive">
                                                <table class="table table-bordered table-striped table-actions">
                                                    <tr>
                                                        <th>
                                                            Creado por
                                                        </th>
                                                        <td>
                                                            {{ $message->comenter }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            Dirigido a
                                                        </th>
                                                        <td>
                                                            {{ $message->user->email }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            Creado
                                                        </th>
                                                        <td>
                                                            {{ $message->created_at }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            Mensaje
                                                        </th>
                                                        <td>
                                                            {{ $message->body }}
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
                                    <h3 class="panel-title">Observar mensaje</h3>
                                </div>
                               
                                <div class="panel-body">
                                           
                                          
                                                    
                                          <div class="col-md-2">
                                                    <a href="{{ route('shoes.message.index') }}" class="btn btn-rounded btn-info" onClick="$.mpb('show',{value: [0,100],speed: -10,state: 'info'});"><span class="fa fa-reply"></span> Regresar</a>
                                            </div>
                                            
                                              

                                                <div class="col-md-2">
                                                     {!! Form::open(['route'=>['shoes.message.destroy',$message],'method'=>'DELETE']) !!}
                                                       <button type="submit" class="btn btn-rounded btn-danger" onClick="$.mpb('show',{value: [0,100],speed: -10,state: 'danger'});"><span class="fa fa-times"></span> Eliminar</button>
                                                     {!! Form::close() !!} 
                                                </div>

                                            </div>
                                          
                              
                                </div>    
                </div> 

                  

            </div>


                            
                    
                   


@endsection

