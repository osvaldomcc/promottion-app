@extends('layouts.app')

@section('revolution')

    @include('frontend.partials.revolution')
    
@endsection

@section('content')
    
        <div class="container">
                <div class="row">
                          <div class="col-md-12">
                            
                            <header class="text-center margin-bottom-30 margin-top-60">
                        <h1 class="weight-300"><span>{{ trans('app.api.rsearch') }}</span></h1>
                    </header>
                    <div class="divider divider-center divider-color"><!-- divider -->
                        <i class="fa fa-chevron-down"></i>
                    </div>
                          </div>
                   
                    @forelse($responses as $res)
                         <div class="col-md-6">
                        <div class="blog-post-item">
                                <!-- OWL SLIDER -->
                                <div class="owl-carousel buttons-autohide controlls-over" data-plugin-options='{"items": 1,"autoHeight": false, "navigation": true, "pagination": true, "transitionStyle":"fadeUp", "progressBar":"false"}'>
                                    <div>
                                        @if($res->country)
                                            <a href="{{ route('front.ciudad',[$res->country->slug,$res->slug]) }}">
                                                <img class="img-responsive" src="{{ asset('images/cities/'.$res->path) }}" alt="{{ $res->name }}">
                                            </a>
                                        @elseif($res->city)
                                            <a href="{{ route('front.municipio',[$res->city->country->slug,$res->city->slug,$res->slug]) }}">
                                                <img class="img-responsive" src="{{ asset('images/municipalities/'.$res->path) }}" alt="{{ $res->name }}">
                                            </a>
                                        @else
                                            <a href="{{ route('front.pais',$res->slug) }}">
                                                <img class="img-responsive" src="{{ asset('images/countries/'.$res->path) }}" alt="{{ $res->name }}">
                                            </a>
                                            
                                        @endif
                                    </div>
                                </div>
                                <!-- /OWL SLIDER -->

                                
                                 @if($res->country)
                                 <h2>
                                    <a href="{{ route('front.ciudad',[$res->country->slug,$res->slug]) }}" >
                                    {{ $res->name }}
                                    </a>
                                    <small>
                                    <a href="{{ route('front.pais',[$res->country->slug]) }}" style="color:gray;">
                                    / {{ $res->country->name }}
                                    </a>
                                    </small>
                                    
                                    </h2>
                                     <a href="{{ route('front.ciudad',[$res->country->slug,$res->slug]) }}" class="btn btn-reveal btn-default">
                                        <i class="fa fa-plus"></i>
                                        <span>{{ trans('app.api.visita') }}</span>
                                    </a>
                                @elseif($res->city)
                                    <h2>
                                    <a href="{{ route('front.municipio',[$res->city->country->slug,$res->city->slug,$res->slug]) }}" >
                                    {{ $res->name }}
                                    </a>
                                    <small>
                                    <a href="{{ route('front.ciudad',[$res->city->country->slug,$res->city->slug]) }}" style="color:gray;">/ {{ $res->city->name }} / </a>
                                    <a href="{{ route('front.pais',[$res->city->country->slug]) }}" style="color:gray;">{{ $res->city->country->name }}</a>
                                    </small>
                                    
                                    </h2>
                                     <a href="{{ route('front.municipio',[$res->city->country->slug,$res->city->slug,$res->slug]) }}" class="btn btn-reveal btn-default">
                                        <i class="fa fa-plus"></i>
                                        <span>{{ trans('app.api.visita') }}</span>
                                    </a>
                                @else
                                    <h2><a href="{{ route('front.pais',$res->slug) }}" >{{ $res->name }}</a></h2>
                                    <a href="{{ route('front.pais',$res->slug) }}" class="btn btn-reveal btn-default">
                                        <i class="fa fa-plus"></i>
                                        <span>{{ trans('app.api.visita') }}</span>
                                    </a>
                                @endif
                                
                                
                                

                            </div>
                    </div>  
                    @empty
                    
                            <div class="col-md-8 col-md-offset-2" style="margin-bottom:30%;">
                                  <center>
                                        <div class="alert alert-danger margin-bottom-30" ><!-- DANGER -->
                                            <strong>{{ trans('app.api.oplace') }}!</strong> {{ trans('app.api.not') }} 
                                        </div>
                                  </center>
                            </div>

                    @endforelse
                    
                        
                    
                </div>
            </div>
	
         
@endsection


