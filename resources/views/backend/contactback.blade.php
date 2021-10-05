@extends('layouts.backend')

@section('content')
                    @if(count($mensajes)>0)
                      <div class="pull-left">
                        <div class="col-md-12">
                            <h4><span class="text-danger">Cantidad de mensajes:</span> <span class="label label-danger">{{ $mensajes->total() }}</span></h4>
                        </div>
                    </div>
                 {!! Form::open(['route'=>'contactback','method'=>'GET']) !!}
                                <div class="col-md-3 pull-right" >
                                <div class="input-group">
                                  {!! Form::text('email',null,['class'=>'form-control','placeholder'=>'Correo']) !!}
                                  <span class="input-group-btn">
                                    <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                                  </span>
                                </div><!-- /input-group -->
                              </div>
                 {!! Form::close() !!}
                 <br/><br/><br/><br/>
                    @endif

            @forelse($mensajes as $msj)
                    <!-- NEWS WIDGET -->

                        <div class="col-md-12">

                            <div class="panel panel-default">                            
                                <div class="panel-body">
                                    {!! Form::open(['route'=>['front.message.elim',$msj->id],'method'=>'DELETE']) !!}
                                          <span class="pull-right" style="color:#d9534f">
                                               <button class="rounded mineclosedos fa fa-times fa-lg pull-right" data-toggle="tooltip" data-placement="top" title="Eliminar"></button>
                                        </span>
                                        {!! Form::close() !!}  
                                    <h3 ><i class="fa fa-envelope"></i> {{ $msj->em }}</h3>
                                    <p class="minetext">
                                        {{ $msj->cuerpo }}
                                    </p>
                                </div>
                                <div class="panel-footer text-danger ">
                                    <span class="fa fa-clock-o pull"></span> {{ $msj->created_at->diffforhumans() }}
                                    
                                </div>
                            </div>

                        </div>
                        <!-- END NEWS WIDGET -->
            @empty
                 <center>
                       <div class="col-md-8 col-md-offset-2">
                            <div class="alert alert-danger" role="alert">
                        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <strong>Atención!</strong> No hay mensajes creados.
                        </div>
                       </div>
                    </center>
            @endforelse

            
                <div class="col-md-10 col-md-offset-5">
                    {{ $mensajes->links() }}
                </div>
            
                
            


@endsection


