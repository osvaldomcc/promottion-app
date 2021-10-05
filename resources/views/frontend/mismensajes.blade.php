@extends('layouts.perfil')

@section('perfilcontent')
    
                    <div class="box-light"><!-- .box-light OR .box-dark -->

                            <div class="box-inner">
                                <center>
                                    @include('flash::message')
                                </center>
                                <div class="timeline"><!-- .timeline-inverse = right position [left on RTL] -->
                              
                                   @forelse($mensajes as $ms)
                                         <!-- ITEM -->
                                        <div class="timeline-item timeline-item-bordered wow fadeInRight">
                                            <!-- timeline entry -->
                                            <div class="timeline-entry rounded"><!-- .rounded = entry -->
                                                {{ $ms->created_at->format('d') }}<span> {{ $ms->created_at->format('M') }}</span>
                                                <div class="timeline-vline"><!-- vertical line --></div>
                                            </div>
                                            <!-- /timeline entry -->       
                                              {!! Form::open(['route'=>['front.message.elim',$ms->id],'method'=>'DELETE']) !!}
                                              <span class="pull-right" style="color:#d9534f">
                                                   <button class="rounded mineclosedos fa fa-times fa-lg pull-right" data-toggle="tooltip" data-placement="top" title="{{ trans('app.api.eliminar') }}"></button>
                                            </span>
                                            {!! Form::close() !!}                                      
                                          <h2 class="uppercase"> 
                                           <a href="{{ route('front.verperfil',$ms->user) }}">
                                                 @if($ms->user->path)
                                                  <img src="{{ asset('images/avatars/'.$ms->user->path) }}" class="img-responsive rounded" width="40" height="20">
                                              @endif
                                           </a>
                                              &nbsp;
                                              Por:
                                           <a href="{{ route('front.verperfil',$ms->user) }}">
                                                <span class="minegreen">
                                                {{ $ms->user->name }}
                                                @if($ms->user->firstname)
                                                    {{ $ms->user->firstname }}
                                                @endif
                                            </span>
                                           </a>           
                                           &nbsp;
                                            <span class="minetime">
                                                <i class="fa fa-calendar"></i> {{ $ms->created_at->diffforhumans() }}
                                            </span>                             
                                           
                                             
                                            </h2>
                                            <p class="mine-justify">
                                                    {{ $ms->body }}
                                            </p>

                                        </div>
                                        <!-- /ITEM -->
                                   @empty
                                    
                                      <center>
                                            <div class="alert alert-danger" ><!-- DANGER -->                                                 
                                                 {{ trans('app.api.nms') }}
                                                 <i class="fa fa-commenting"></i>
                                            </div>
                                      </center>
                                
                                   @endforelse                                  


                                   <center>
                                       {{ $mensajes->links() }}
                                   </center>
                                    
                                </div>

                            </div>

                        </div>
    
@endsection