@extends('layouts.backend')

@section('content')


 
 <!-- START BREADCRUMB -->
    <ul class="breadcrumb">
        <li><a href="{{ route('admin') }}">Inicio</a></li>
        <li><a class="active">Listado de usuarios</a></li>
    </ul>
<!-- END BREADCRUMB -->         

             
        <div class="row">
            <div class="col-md-12">
                 <div class="panel panel-danger">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Listado de usuarios</h3>
                                </div>
                                <br/><br/>
                                <br/>
                                <br/>
                                 <div class="col-md-5 pull-left">
                                               <div class="btn-group pull-left">
                                        <button class="btn btn-danger dropdown-toggle" data-toggle="dropdown"><i class="fa fa-download"></i> Exportar Tabla</button>
                                        <ul class="dropdown-menu">
                                            <li><a href="#" onClick ="$('#customers2').tableExport({type:'json',escape:'false'});"><img src="{{ asset('backend/img/icons/json.png') }}" width="24"/> JSON</a></li>
                                            <li><a href="#" onClick ="$('#customers2').tableExport({type:'json',escape:'false',ignoreColumn:'[2,3]'});"><img src="{{ asset('backend/img/icons/json.png') }}" width="24"/> JSON (ignoreColumn)</a></li>
                                            <li><a href="#" onClick ="$('#customers2').tableExport({type:'json',escape:'true'});"><img src="{{ asset('backend/img/icons/json.png') }}" width="24"/> JSON (with Escape)</a></li>
                                            <li class="divider"></li>
                                            <li><a href="#" onClick ="$('#customers2').tableExport({type:'xml',escape:'false'});"><img src="{{ asset('backend/img/icons/xml.png') }}" width="24"/> XML</a></li>
                                            <li><a href="#" onClick ="$('#customers2').tableExport({type:'sql'});"><img src="{{ asset('backend/img/icons/sql.png') }}" width="24"/> SQL</a></li>
                                            <li class="divider"></li>
                                            <li><a href="#" onClick ="$('#customers2').tableExport({type:'csv',escape:'false'});"><img src="{{ asset('backend/img/icons/csv.png') }}" width="24"/> CSV</a></li>
                                            <li><a href="#" onClick ="$('#customers2').tableExport({type:'txt',escape:'false'});"><img src="{{ asset('backend/img/icons/txt.png') }}" width="24"/> TXT</a></li>
                                            <li class="divider"></li>
                                            <li><a href="#" onClick ="$('#customers2').tableExport({type:'excel',escape:'false'});"><img src="{{ asset('backend/img/icons/xls.png') }}" width="24"/> XLS</a></li>
                                            <li><a href="#" onClick ="$('#customers2').tableExport({type:'doc',escape:'false'});"><img src="{{ asset('backend/img/icons/word.png') }}" width="24"/> Word</a></li>
                                            <li><a href="#" onClick ="$('#customers2').tableExport({type:'powerpoint',escape:'false'});"><img src="{{ asset('backend/img/icons/ppt.png') }}" width="24"/> PowerPoint</a></li>
                                            <li class="divider"></li>
                                            <li><a href="#" onClick ="$('#customers2').tableExport({type:'png',escape:'false'});"><img src="{{ asset('backend/img/icons/png.png') }}" width="24"/> PNG</a></li>
                                            <li><a href="#" onClick ="$('#customers2').tableExport({type:'pdf',escape:'false'});"><img src="{{ asset('backend/img/icons/pdf.png') }}" width="24"/> PDF</a></li>
                                        </ul>
                                        
                                      
                                    </div>
                                    <div style="margin-top:40px;" >
                                           &nbsp;
                                           <label class="switch switch-small">
                                                        <input type="checkbox" id="everything" />
                                                        <span></span>
                                            </label>
                                           &nbsp;&nbsp;&nbsp;<a onClick="$.mpb('show',{value: [0,100],speed: -10,state: 'info'});" href="{{ route('delete',0) }}" id="delete" class="btn btn-rounded btn-danger">Eliminar</a><p><small>Todo</small></p>
                                      </div>
                                   </div>
                                   
                                    
                                   
                              {!! Form::open(['route'=>'shoes.user.index','method'=>'GET']) !!}
                                <div class="col-md-3 pull-right" >
                                <div class="input-group">
                                  {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Correo o Nombre']) !!}
                                  <span class="input-group-btn">
                                    <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                                  </span>
                                </div><!-- /input-group -->
                              </div>
                             {!! Form::close() !!}




                                <div class="panel-body">
                                           
                                          
                                    
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped table-actions" id="customers2">
                                            <thead>
                                                <th>
                                                    Nombre
                                                </th>
                                                <th>
                                                    Correo
                                                </th>
                                                <th>
                                                    País
                                                </th>
                                                <th>
                                                    Rol
                                                </th>
                                                <th>
                                                    Creado
                                                </th>
                                                <th>
                                                    Acciones
                                                </th>
                                            </thead>
                                            <tbody>
                                                @forelse($users as $user)
                                                <tr>
                                                    <td>
                                                        <label class="switch switch-small">
                                                            <input type="checkbox" class="selected" id="{{ $user->id }}" /> 
                                                            <span></span>
                                                        </label>
                                                        &nbsp; {{ $user->name }}
                                                    </td>
                                                    <td>
                                                        {{ $user->email }}
                                                    </td>
                                                    <td>
                                                        {{ $user->country->name }}
                                                    </td>
                                                    <td>
                                                        @if($user->rol == 'admin')
                                                            Administrador
                                                        @elseif($user->rol == 'super_admin')
                                                            Super Administrador
                                                        @else
                                                            Usuario
                                                        @endif
                                                    </td>
                                                    <td>
                                                        {{ $user->created_at->format('d-m-Y h:i:s A') }}
                                                    </td>
                                                     <td>
                                                        <a class="btn btn-info btn-rounded btn-condensed btn-sm" href="{{ route('shoes.user.show',$user->id) }}" data-toggle="tooltip" data-placement="top" title="Observar" onClick="$.mpb('show',{value: [0,100],speed: -10,state: 'info'});"><span class="fa fa-eye"></span></a>
                                                        <a class="btn btn-warning btn-rounded btn-condensed btn-sm" href="{{ route('shoes.user.edit',$user->id) }}" data-toggle="tooltip" data-placement="top" title="Editar" onClick="$.mpb('show',{value: [0,100],speed: -10,state: 'warning'});"><span class="fa fa-edit"></span></a>
                                                    </td>
                                                </tr>
                                                @empty
                                                <tr>
                                                    <td colspan="6">
                                                        <center>
                                                           <div class="col-md-8 col-md-offset-2">
                                                                <div class="alert alert-danger" role="alert">
                                                            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                            <strong>Atención!</strong> No hay usuarios creados.
                                                            </div>
                                                           </div>
                                                        </center>
                                                    </td>
                                                </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                                    {{ $users->links() }}
                                    </div>
                                </div>     
                                 <div class="panel-footer">
                                    <a class="btn btn-rounded btn-primary" onClick="$.mpb('show',{value: [0,100],speed: -10,state: 'info'});" href="{{ route('shoes.user.create') }}"><span class="fa fa-plus"></span>Añadir un nuevo usuario</a>
                                </div>    
                    </div> 
            </div>
        </div>


                            
                    
                   


@endsection


@section('scripts')

    @include('backend.partials.script')


@endsection