@extends('layouts.perfil')

@section('perfilcontent')

                        <div class="box-light"><!-- .box-light OR .box-dark -->
                           
                                        <!-- PROJECT LIS -->
                                    <div class="row">
                                      <br/>
                                      <center>
                                        <h4 class="minegreen box-inner wow bounceIn"> {{ trans('app.api.mark') }}</h4>
                                    </center>
                                    <center>
                                       @include('flash::message')
                                    </center>
                                      @forelse($marks as $mark)

                                       <div class="col-md-6 col-sm-6 wow rotateInDownLeft">
                                            <div class="box-inner margin-top-30" >
                                            @if($mark->pictures->count()>0)
                                                {!! Form::open(['route'=>['front.elim.mark',$mark],'method'=>'DELETE']) !!}
                                                    <button class="rounded mineclose fa fa-times fa-lg pull-right" data-toggle="tooltip" data-placement="top" title="{{ trans('app.api.eliminar') }}"></button>
                                                {!! Form::close() !!}
                                                @php
                                                    $name=$mark->slug;
                                                @endphp
                                       
                                                <a href="{{ route('front.bussine',[$mark->municipality->city->country->slug,$mark->municipality->city->slug,$mark->municipality->slug,$mark->slug]) }}">
                                                    <img class="img-responsive" src="{{ asset('images/bussines/'.$name.'/'.$mark->pictures[0]->path) }}" alt="{{ $mark->name }}" />
                                                </a>
                                            @endif

                                            <h3 class="text-left margin-top-20 bold size-16 elipsis"><a href="{{ route('front.bussine',[$mark->municipality->city->country->slug,$mark->municipality->city->slug,$mark->municipality->slug,$mark->slug]) }}">
                                                {{ $mark->name }}
                                            </a></h3>
                                            
                                              <center>
                                            <ul class="size-12 list-inline list-separator nomargin">
                                               <li>
                                                    <i class="fa fa-map-marker"></i> 
                                                    <a href="{{ route('front.municipio',[$mark->municipality->city->country->slug,$mark->municipality->city->slug,$mark->municipality->slug]) }}" style="color:gray;">{{ $mark->municipality->name }}</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('front.bussine',[$mark->municipality->city->country->slug,$mark->municipality->city->slug,$mark->municipality->slug,$mark->slug]) }}">
                                                        <i class="fa fa-comments"></i> 
                                                        {{ $mark->comments->count() }}
                                                    </a>
                                                </li>
                                                </ul>
                                                <div class="pull right" >
                                                    <div  class="rating rating-{{ $mark->ranking }}"></div>
                                                </div>     
                                              </center>
                                    </div>
                                </div>
                                <!-- /item -->
                                @empty
                                <div class="col-md-8 col-md-offset-2" >
                                      <center>
                                            <div class="alert alert-danger margin-bottom-30" ><!-- DANGER -->                                                 
                                                 {{ trans('app.api.nmark') }}
                                                  <i class="fa fa-bookmark"></i>
                                            </div>
                                      </center>
                                </div>
                                @endforelse
                             

                            </div>
                        <!-- /PROJECTS LIS -->
                                <center>
                                    {{ $marks->links() }}
                                </center>
                            
                            </div>

@endsection