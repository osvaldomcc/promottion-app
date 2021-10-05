@extends('layouts.backend')

@section('content')


 
 <!-- START BREADCRUMB -->
    <ul class="breadcrumb">
        <li><a href="{{ route('admin') }}">Inicio</a></li>
        <li><a href="{{ route('shoes.comment.index') }}">Listado de comentarios</a></li>
        <li><a class="active">Ver Comentario</a></li>
    </ul>
<!-- END BREADCRUMB -->         

             
        <div class="row">
            <div class="col-md-12">
                 <div class="panel panel-danger">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Observar comentario</h3>
                                </div>
                               
                                <div class="panel-body">
                                           
                                           <div class="table-responsive">
                                                <table class="table table-bordered table-striped table-actions">
                                                
                                                    
                                                    <tr>
                                                        <th>
                                                            Like
                                                        </th>
                                                         <td>
                                                            @if($comment->like == 0)
                                                            <i class="fa fa-times" style="color: #b64645;font-size: 20px;"></i>
                                                            @else
                                                            <i class="fa fa-check" style="color: #95b75d;font-size: 20px;"></i>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            Usuario
                                                        </th>
                                                        <td>
                                                            {{ $comment->user->name }}
                                                        </td>
                                                    </tr>
                                                     <tr>
                                                        <th>
                                                            Negocio
                                                        </th>
                                                        <td>
                                                            {{ $comment->bussine->name }}
                                                        </td>
                                                    </tr>
                                                     <tr>
                                                        <th>
                                                            Título
                                                        </th>
                                                        <td>
                                                            {{ $comment->title }}
                                                        </td>
                                                    </tr>
                                                     <tr>
                                                        <th>
                                                            Comentario
                                                        </th>
                                                        <td>
                                                            {{ $comment->body }}
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
                                    <h3 class="panel-title">Observar comentario</h3>
                                </div>
                               
                                <div class="panel-body">
                                           
                                          
                                                    
                                          <div class="col-md-2">
                                                    <a href="{{ route('shoes.comment.index') }}" class="btn btn-rounded btn-info" onClick="$.mpb('show',{value: [0,100],speed: -10,state: 'info'});"><span class="fa fa-reply"></span> Regresar</a>
                                            </div>
                                            
                                                <div class="col-md-2">
                                                       <a href="{{ route('shoes.comment.edit',$comment->id) }}" class="btn btn-rounded btn-warning" onClick="$.mpb('show',{value: [0,100],speed: -10,state: 'warning'});"><span class="fa fa-edit"></span> Editar</a>
                                                </div>  
                                            
                                              

                                                <div class="col-md-2">
                                                     {!! Form::open(['route'=>['shoes.comment.destroy',$comment],'method'=>'DELETE']) !!}
                                                       <button type="submit" class="btn btn-rounded btn-danger" onClick="$.mpb('show',{value: [0,100],speed: -10,state: 'danger'});"><span class="fa fa-times"></span> Eliminar</button>
                                                     {!! Form::close() !!} 
                                                </div>

                                            </div>
                                          
                              
                                </div>    
                </div> 

                  

            </div>


                            
                    
                   


@endsection

