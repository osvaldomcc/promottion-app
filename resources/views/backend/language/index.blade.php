@extends('layouts.backend')

@section('content')


 
 <!-- START BREADCRUMB -->
    <ul class="breadcrumb">
        <li><a href="{{ route('admin') }}">Inicio</a></li>
        <li><a class="active">Listado de idiomas</a></li>
    </ul>
<!-- END BREADCRUMB -->         

             
        <div class="row">
            <div class="col-md-12">
                 <div class="panel panel-danger">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Listado de idiomas</h3>
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
                                    
                                   </div>
                                   
                                    


                                <div class="panel-body">
                                           
                                          
                                    
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped table-actions" id="customers2">
                                            <thead>
                                                <th>
                                                    Nombre
                                                </th>
                                                <th>
                                                    Creado
                                                </th>
                                                <th>
                                                    Acciones
                                                </th>
                                            </thead>
                                            <tbody>
                                                @forelse($languages as $language)
                                                <tr>
                                                    <td>
                                                         {{ $language->language }}
                                                    </td>
                                                    <td>
                                                        {{ $language->created_at->format('d-m-Y h:i:s A') }}
                                                    </td>
                                                     <td>

                                                        {!! Form::open(['route'=>['shoes.language.destroy',$language],'method'=>'DELETE']) !!}
                                                          <a class="btn btn-warning btn-rounded btn-condensed btn-sm" href="{{ route('shoes.language.edit',$language->id) }}" data-toggle="tooltip" data-placement="top" title="Editar" onClick="$.mpb('show',{value: [0,100],speed: -10,state: 'warning'});"><span class="fa fa-edit"></span></a>

                                                        <button type="submit" class="btn btn-danger btn-rounded btn-condensed btn-sm" href="{{ route('shoes.language.edit',$language->id) }}" data-toggle="tooltip" data-placement="top" title="Eliminar" onClick="return confirm('Desea eliminar el idioma');$.mpb('show',{value: [0,100],speed: -10,state: 'warning'});"><span class="fa fa-trash"></span></button>
                                                        {!! Form::close() !!}

                                                    </td>
                                                </tr>
                                                @empty
                                                <tr>
                                                    <td colspan="6">
                                                        <center>
                                                           <div class="col-md-8 col-md-offset-2">
                                                                <div class="alert alert-danger" role="alert">
                                                            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                            <strong>Atención!</strong> No hay países creados.
                                                            </div>
                                                           </div>
                                                        </center>
                                                    </td>
                                                </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                                    {{ $languages->links() }}
                                    </div>
                                </div>     
                                 <div class="panel-footer">
                                    <a class="btn btn-rounded btn-primary" onClick="$.mpb('show',{value: [0,100],speed: -10,state: 'info'});" href="{{ route('shoes.language.create') }}"><span class="fa fa-plus"></span>Añadir un nuevo idioma</a>
                                </div>    
                    </div> 
            </div>
        </div>

@endsection


@section('scripts')

    @include('backend.partials.script')


@endsection