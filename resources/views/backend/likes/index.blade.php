@extends('layouts.backend')

@section('content')


 
 <!-- START BREADCRUMB -->
    <ul class="breadcrumb">
        <li><a href="{{ route('admin') }}">Inicio</a></li>
        <li><a class="active">Listado de categorías</a></li>
    </ul>
<!-- END BREADCRUMB -->         

             
        <div class="row">
            <div class="col-md-12">
                 <div class="panel panel-danger">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Listado de categorías</h3>
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
                                   
                                    
                                   
                              {!! Form::open(['route'=>'shoes.like.index','method'=>'GET']) !!}
                                <div class="col-md-3 pull-right" >
                                <div class="input-group">
                                  {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Nombre']) !!}
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
                                                    ¿Le gusta?
                                                </th>
                                                 <th>
                                                    Like
                                                </th>
                                                <th>
                                                    Creado por
                                                </th>
                                                <th>
                                                    Creado
                                                </th>
                                            </thead>
                                            <tbody>
                                                @forelse($likes as $like)
                                                <tr>
                                                    <td>
                                                        {{ $like->user->email }}
                                                    </td>
                                                    <td>
                                                        <center>
                                                            @if($like->like == 0)
                                                            <i class="fa fa-times" style="color: #b64645;font-size: 20px;"></i>
                                                            @else
                                                            <i class="fa fa-check" style="color: #95b75d;font-size: 20px;"></i>
                                                            @endif
                                                        </center>
                                                    </td>
                                                     <td>
                                                        <a href="{{ route('shoes.comment.show',$like->comment->id) }}">{{ $like->comment->user->email }}</a>
                                                    </td>
                                                     
                                                    <td>
                                                        {{ $like->created_at->format('d-m-Y h:i:s A') }}
                                                    </td>
                                                </tr>
                                                @empty
                                                <tr>
                                                    <td colspan="6">
                                                        <center>
                                                           <div class="col-md-8 col-md-offset-2">
                                                                <div class="alert alert-danger" role="alert">
                                                            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                            <strong>Atención!</strong> No hay likes creados.
                                                            </div>
                                                           </div>
                                                        </center>
                                                    </td>
                                                </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                                    {{ $likes->links() }}
                                    </div>
                                </div>     
                    </div> 
            </div>
        </div>


                            
                    
                   


@endsection


