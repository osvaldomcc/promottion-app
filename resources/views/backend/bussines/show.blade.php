@extends('layouts.backend')

@section('content')


 
 <!-- START BREADCRUMB -->
    <ul class="breadcrumb">
        <li><a href="{{ route('admin') }}">Inicio</a></li>
        <li><a href="{{ route('shoes.bussine.index') }}">Listado de negocios</a></li>
        <li><a class="active">Ver Negocio</a></li>
    </ul>
<!-- END BREADCRUMB -->         

             
        <div class="row">
            <div class="col-md-12">
                 <div class="panel panel-danger">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Observar negocio</h3>
                                </div>
                               
                                <div class="panel-body">
                                           
                                           <div class="table-responsive">
                                                <table class="table table-bordered table-striped table-actions">
                                                    @if($bussine->logo)
                                                        <tr>
                                                        <th>
                                                            Logo
                                                        </th>
                                                        <td>
                                                            <img src="{{ asset('images/logos/'.$bussine->logo) }}" alt="" height="100px;" width="100px;" class="minelogo"/>
                                                        </td>
                                                    </tr>
                                                    @endif
                                                     <tr>
                                                        <th>
                                                            Nombre
                                                        </th>
                                                        <td>
                                                            {{ $bussine->name }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            Slug    
                                                        </th>
                                                        <td>
                                                            {{ $bussine->slug }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            Slogan
                                                        </th>
                                                        <td>
                                                            {{ $bussine->slogan }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            Municipio
                                                        </th>
                                                        <td>
                                                            {{ $bussine->municipality->name }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            Ciudad
                                                        </th>
                                                        <td>
                                                            {{ $bussine->municipality->city->name }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            País
                                                        </th>
                                                        <td>
                                                            {{ $bussine->municipality->city->country->name }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            Categoría
                                                        </th>
                                                        <td>
                                                            {{ $bussine->subcategory->name }}
                                                        </td>
                                                    </tr>
                                                     <tr>
                                                        <th>
                                                            Ranking
                                                        </th>
                                                         <td>
                                                         @if($bussine->ranking==0)
                                                        <i class="fa fa-star"></i>
                                                         <i class="fa fa-star"></i>
                                                         <i class="fa fa-star"></i>
                                                         <i class="fa fa-star"></i>
                                                         <i class="fa fa-star"></i>
                                                         @elseif($bussine->ranking==1)
                                                        <i class="fa fa-star" style="color: #fea223"></i>
                                                         <i class="fa fa-star"></i>
                                                         <i class="fa fa-star"></i>
                                                         <i class="fa fa-star"></i>
                                                         <i class="fa fa-star"></i>
                                                         @elseif($bussine->ranking==2)
                                                         <i class="fa fa-star" style="color: #fea223"></i>
                                                         <i class="fa fa-star" style="color: #fea223"></i>
                                                         <i class="fa fa-star"></i>
                                                         <i class="fa fa-star"></i>
                                                         <i class="fa fa-star"></i>
                                                         @elseif($bussine->ranking==3)
                                                         <i class="fa fa-star" style="color: #fea223"></i>
                                                         <i class="fa fa-star" style="color: #fea223"></i>
                                                         <i class="fa fa-star" style="color: #fea223"></i>
                                                         <i class="fa fa-star"></i>
                                                         <i class="fa fa-star"></i>
                                                         @elseif($bussine->ranking==4)
                                                         <i class="fa fa-star" style="color: #fea223"></i>
                                                         <i class="fa fa-star" style="color: #fea223"></i>
                                                         <i class="fa fa-star" style="color: #fea223"></i>
                                                         <i class="fa fa-star" style="color: #fea223"></i>
                                                         <i class="fa fa-star"></i>
                                                         @else
                                                          <i class="fa fa-star" style="color: #fea223"></i>
                                                         <i class="fa fa-star" style="color: #fea223"></i>
                                                         <i class="fa fa-star" style="color: #fea223"></i>
                                                         <i class="fa fa-star" style="color: #fea223"></i>
                                                         <i class="fa fa-star" style="color: #fea223"></i>
                                                         @endif
                                                    </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            Dirección
                                                        </th>
                                                        <td>
                                                            {{ $bussine->address }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            Descripción
                                                        </th>
                                                        <td>
                                                            {{ $bussine->description }}
                                                        </td>
                                                    </tr>
                                                      <tr>
                                                        <th>
                                                            Características
                                                        </th>
                                                        <td>
                                                            {{ $bussine->characteristics }}
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
                                    <h3 class="panel-title">Observar negocio</h3>
                                </div>
                               
                                <div class="panel-body">
                                           
                                          
                                                    
                                          <div class="col-md-2">
                                                    <a href="{{ route('shoes.bussine.index') }}" class="btn btn-rounded btn-info" onClick="$.mpb('show',{value: [0,100],speed: -10,state: 'info'});"><span class="fa fa-reply"></span> Regresar</a>
                                            </div>
                                            
                                                <div class="col-md-2">
                                                       <a href="{{ route('shoes.bussine.edit',$bussine->id) }}" class="btn btn-rounded btn-warning" onClick="$.mpb('show',{value: [0,100],speed: -10,state: 'warning'});"><span class="fa fa-edit"></span> Editar</a>
                                                </div>  
                                            
                                              

                                                <div class="col-md-2">
                                                     {!! Form::open(['route'=>['shoes.bussine.destroy',$bussine],'method'=>'DELETE']) !!}
                                                       <button type="submit" class="btn btn-rounded btn-danger" onClick="$.mpb('show',{value: [0,100],speed: -10,state: 'danger'});"><span class="fa fa-times"></span> Eliminar</button>
                                                     {!! Form::close() !!} 
                                                </div>

                                            </div>
                                          
                              
                                </div>    
                </div> 

                  

            </div>


                            
                    
                   


@endsection

