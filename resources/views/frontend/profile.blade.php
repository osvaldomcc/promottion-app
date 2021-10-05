@extends('layouts.perfil')

@section('perfilcontent')

      <div class="box-light"><!-- .box-light OR .box-dark -->
                            
                                <div class="box-inner">
                                <p class="text-center wow fadeInUp" style="color:#8ab933;">
                                    
                                    
                                    {{ trans('app.api.popular') }}
                                </p>
                                <center>
                                    <h2 class="wow fadeInDown">{{ trans('app.api.last') }} <i class="fa fa-newspaper-o"></i> {{ $cantbussines }} </h2>
                                </center>
                                <!-- PROJECT CAROUSEL -->
                                <div class="owl-carousel buttons-autohide controlls-over nomargin wow fadeInUp" data-plugin-options='{"singleItem": false, "items":"1", "autoPlay": 12000, "navigation": true, "pagination": false}'>

                                      @forelse($bussines as $bussine)
                                        <div class="img-hover" href="#">
                                            @if($bussine->pictures->count()>0)
                                                @php
                                                    $name=$bussine->slug;
                                                @endphp
                                      
                                            <a href="{{ route('front.bussine',[$bussine->municipality->city->country->slug,$bussine->municipality->city->slug,$bussine->municipality->slug,$bussine->slug]) }}">
                                                <img class="img-responsive" src="{{ asset('images/bussines/'.$name.'/'.$bussine->pictures[0]->path) }}" alt="{{ $bussine->name }}">
                                            </a>
                                            @endif

                                            <h2 class="text-left margin-top-20 bold size-16 elipsis">
                                            <a href="{{ route('front.bussine',[$bussine->municipality->city->country->slug,$bussine->municipality->city->slug,$bussine->municipality->slug,$bussine->slug]) }}">
                                                {{ $bussine->name }}
                                            </a></h2>
                                                <p class="minetext" style="height: 150px;overflow: hidden">
                                                 {{ $bussine->description }}
                                              </p>
                                            <center>
                                                 <ul class="size-12 list-inline list-separator" style="margin-bottom:2px;">
                                                <li>
                                                    <i class="fa fa-map-marker"></i> 
                                                    <a href="{{ route('front.municipio',[$bussine->municipality->city->country->slug,$bussine->municipality->city->slug,$bussine->municipality->slug]) }}" style="color:gray;">{{ $bussine->municipality->name }}</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('front.bussine',[$bussine->municipality->city->country->slug,$bussine->municipality->city->slug,$bussine->municipality->slug,$bussine->slug]) }}">
                                                        <i class="fa fa-comments"></i> 
                                                        {{ $bussine->comments->count() }}
                                                    </a>
                                                </li>
                                                
                                            </ul>   
                                            <div class="col-md-8 col-md-offset-2" >
                                                <div  class="rating rating-{{ $bussine->ranking }}"></div>
                                            </div>     
                                            </center>
                                        </div>
                                    <!-- /item -->

                                    @empty
                                    <div class="col-md-8 col-md-offset-2" >
                                      <center>
                                            <div class="alert alert-danger margin-bottom-30" ><!-- DANGER -->
                                                 {{ trans('app.api.public') }} <i class="fa fa-newspaper-o"></i>
                                            </div>
                                      </center>
                                </div>
                                    @endforelse

                                </div>
                                <!-- /PROJECT CAROUSEL -->
                                </div>
                            
                                        <!-- PROJECT LIS -->
                                
                                    <div class="row">
                                      <br/>
                                      <center class="box-inner">
                                        <h2 class="wow bounceIn">{{ trans('app.api.lastpop') }} <i class="fa fa-newspaper-o"></i> {{ $cantpopulars }} </h2>
                                    </center>

                                      @forelse($populars as $popular)

                                       <div class="col-md-6 col-sm-6 wow rotateInUpLeft">
                                            <div class="box-inner margin-top-30" >
                                            @if($popular->pictures->count()>0)
                                                @php
                                                    $name=$popular->slug;
                                                @endphp
                                       
                                                <a href="{{ route('front.bussine',[$popular->municipality->city->country->slug,$popular->municipality->city->slug,$popular->municipality->slug,$popular->slug]) }}">
                                                    <img class="img-responsive" src="{{ asset('images/bussines/'.$name.'/'.$popular->pictures[0]->path) }}" alt="{{ $popular->name }}" />
                                                </a>
                                            @endif

                                            <h3 class="text-left margin-top-20 bold size-16 elipsis"><a href="{{ route('front.bussine',[$popular->municipality->city->country->slug,$popular->municipality->city->slug,$popular->municipality->slug,$popular->slug]) }}">
                                                {{ $popular->name }}
                                            </a></h3>
                                              <p class="minetext" style="height: 110px;overflow: hidden">
                                                 {{ $popular->description }}
                                              </p>
                                              <center>
                                            <ul class="size-12 list-inline list-separator nomargin">
                                               <li>
                                                    <i class="fa fa-map-marker"></i> 
                                                    <a href="{{ route('front.municipio',[$popular->municipality->city->country->slug,$popular->municipality->city->slug,$popular->municipality->slug]) }}" style="color:gray;">{{ $popular->municipality->name }}</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('front.bussine',[$popular->municipality->city->country->slug,$popular->municipality->city->slug,$popular->municipality->slug,$popular->slug]) }}">
                                                        <i class="fa fa-comments"></i> 
                                                        {{ $popular->comments->count() }}
                                                    </a>
                                                </li>
                                                </ul>
                                                <div class="pull right" >
                                                    <div  class="rating rating-{{ $popular->ranking }}"></div>
                                                </div>     
                                              </center>
                                    </div>
                                </div>
                                <!-- /item -->
                                @empty
                                    <div class="col-md-8 col-md-offset-2"  style="margin-top:20px;">
                                      <center>
                                            <div class="alert alert-danger margin-bottom-30" ><!-- DANGER -->
                                                {{ trans('app.api.popularshow') }} 
                                                  <i class="fa fa-newspaper-o"></i>
                                            </div>
                                      </center>
                                </div>
                                @endforelse
                             

                            </div>
                        <!-- /PROJECTS LIS -->
                            
                            </div>

@endsection