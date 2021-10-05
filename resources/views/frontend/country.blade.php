@extends('layouts.app')

@section('categorias')

    @include('frontend.partials.categories')
    
@endsection

@section('revolution')

    @include('frontend.partials.revolution')
    
@endsection


@section('content')

	
                    
                    @if($hotels->count()>0)
                         <!-- RECENT NEWS -->
                            <section class="wow fadeInUp" data-wow-delay="0.2ms" style="border-bottom:1px solid transparent">
                                <div class="container">

                                    <header class="text-center margin-bottom-60">
                                        <h1 class="uppercase weight-300">{{ trans('app.api.hotel') }} {{ $country->name }} </h1>
                                        <h2 class="weight-300 letter-spacing-1 size-20"><span>{{ trans('app.api.hotelsub') }}</span></h2>
                                        <hr/>
                                        <h2 class="col-sm-10 col-sm-offset-1 margin-bottom-60 weight-400 size-25">{{ trans('app.api.view') }} 
                                        <span class="countTo" data-speed="1000" style="color:black">{{ $hotelspartial }}</span>
                                          {{ trans('app.api.of') }}                                         
                                        <span class="countTo" data-speed="1000" style="color:black">{{ $hotelstotal }} </span>
                                        @if($hotelspartial != $hotelstotal)
                                            @if(App::getLocale()=='es')
                                                | <a href="{{ route('front.categorycountry',[$country->slug,'hoteles']) }}"> <i class='fa fa-eye'></i> {{ trans('app.api.more') }}</a>
                                            @else
                                                | <a href="{{ route('front.categorycountry',[$country->slug,'hotels']) }}"> <i class='fa fa-eye'></i> {{ trans('app.api.more') }}</a>
                                            @endif
                                        @endif
                                        </h2> 
                                    </header>



                                    <!-- 
                                        controlls-over      = navigation buttons over the image 
                                        buttons-autohide    = navigation buttons visible on mouse hover only
                                        
                                        data-plugin-options:
                                            "singleItem": true
                                            "autoPlay": true (or ms. eg: 4000)
                                            "navigation": true
                                            "pagination": true
                                            "items": "4"

                                        owl-carousel item paddings
                                            .owl-padding-0
                                            .owl-padding-3
                                            .owl-padding-6
                                            .owl-padding-10
                                            .owl-padding-15
                                            .owl-padding-20
                                    -->
                                    <div class="owl-carousel owl-padding-10 buttons-autohide controlls-over " data-plugin-options='{"singleItem": false, "items":"4", "autoPlay": 12000, "navigation": true, "pagination": false}' >
                                        
                                        @forelse($hotels as $hotel)
                                            @if($hotel->pictures->count()>0)
                                                @php
                                                    $name=$hotel->slug;
                                                @endphp
                                            <div class="img-hover">
                                            <a href="{{ route('front.bussine',[$hotel->municipality->city->country->slug,$hotel->municipality->city->slug,$hotel->municipality->slug,$hotel->slug]) }}">
                                                <img class="img-responsive" src="{{ asset('images/bussines/'.$name.'/'.$hotel->pictures[0]->path) }}" alt="$hotel->name">
                                            </a>
                                            <h4 class="text-left margin-top-20"><a href="{{ route('front.bussine',[$hotel->municipality->city->country->slug,$hotel->municipality->city->slug,$hotel->municipality->slug,$hotel->slug]) }}">{{ $hotel->name }}</a></h4>
                                            <p class="minetext" style='height: 150px;overflow: hidden;'> {{ $hotel->description }} </p>
                                            <ul class="text-left size-12 list-inline list-separator" style="margin-bottom:2px;">
                                                <li>
                                                    <i class="fa fa-map-marker"></i> 
                                                    <a href="{{ route('front.municipio',[$hotel->municipality->city->country->slug,$hotel->municipality->city->slug,$hotel->municipality->slug]) }}" style="color:gray;">{{ $hotel->municipality->name }}</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('front.bussine',[$hotel->municipality->city->country->slug,$hotel->municipality->city->slug,$hotel->municipality->slug,$hotel->slug]) }}">
                                                        <i class="fa fa-comments"></i> 
                                                        <span class="countTo" data-speed="1000">{{ $hotel->comments->count() }}</span>
                                                        </a>
                                                </li>
                                                
                                            </ul>   
                                            <div class="col-md-8" style="margin-left:-15px;">
                                                <div  class="rating rating-{{ $hotel->ranking }}"></div>
                                            </div>                          
                                                    
                                            
                                            </div>
                                            @endif
                                        @empty
                                        @endforelse

                                    </div>

                                </div>
                            </section>
                            <!-- /RECENT NEWS -->
                    


            
               @if($restaurants->count()==0 and $populars->count()==0 and  $entertainments->count()==0)
                    @elseif($restaurants->count()==0 and $populars->count()>0 and $entertainments->count()==0)
                   @else
                     <!-- Parallax -->
                <section class="parallax parallax-2" style='background-image: url("{{ asset('frontend/images/demo/thematics/restaurant/slider_3-min.jpg') }}");' >
                    <div class="overlay dark-5"><!-- dark overlay [1 to 9 opacity] --></div>

                    <div class="container" >

                        <div class="col-md-2 col-md-offset-2 wow fadeInUp" data-wow-delay='0.1s' >
                            <img  src="{{ asset('frontend/images/plane.png') }}" alt="" width='135' height='130' />
                        </div>
                        <div class="col-md-6">
                            <h3 class="font-khausan-script nomargin weight-300 wow fadeInLeft" data-wow-delay='0.2s'><span>I'M COMING</span></h3>
                            <p class="font-lato weight-300 lead nomargin-top wow bounceIn" data-wow-delay='0.3s'>
                            {{ trans('app.api.facil') }}
                            </p>
                            
                        </div>
                        

                    </div>
                </section>
                <!-- /Parallax -->
               @endif
            

@endif
                
            @if($restaurants->count()>0)
                 <!-- Welcome -->
                    <section class="wow bounceInLeft" data-wow-delay='0.5ms' style="border-bottom:1px solid transparent;">
                        <div class="container">

                            <div class="text-center nomargin-top margin-bottom-100 clearfix">
                                <h1 class="font-khausan-script size-35 weight-300 nomargin-bottom">{{ trans('app.api.princ') }} <span class="uppercase" style="color:#414141;">{{ $country->name }}</span><br><h2 class="weight-300 letter-spacing-1 size-20"><span>{{ trans('app.api.click') }}</span></h2>.</h1>
                                <hr />
                                <h2 class="col-sm-10 col-sm-offset-1 nomargin-bottom weight-400 size-25">{{ trans('app.api.view') }}
                                <span class="countTo" data-speed="1000" style="color:black">{{ $restaurantspartial }} </span>
                                {{ trans('app.api.of') }}
                                <span class="countTo" data-speed="1000" style="color:black">{{ $restaurantstotal }}  </span>
                                @if($restaurantspartial != $restaurantstotal )
                                    @if(App::getLocale()=='es')
                                        | <a href="{{ route('front.categorycountry',[$country->slug,'restaurantes']) }}"> <i class='fa fa-eye'></i> {{ trans('app.api.more') }}</a>
                                    @else
                                        | <a href="{{ route('front.categorycountry',[$country->slug,'restaurants']) }}"> <i class='fa fa-eye'></i> {{ trans('app.api.more') }}</a>
                                    @endif
                                @endif
                                </h2> 

                            </div>

                            <div class="row">
                                
                                @forelse($restaurants as $restaurant)
                                @if($restaurant->pictures->count()>0)
                                      @php
                                            $name=$restaurant->slug;
                                     @endphp
                                <div class="col-sm-4 " style="margin-bottom:65px;">
                                    <a href="{{ route('front.bussine',[$restaurant->municipality->city->country->slug,$restaurant->municipality->city->slug,$restaurant->municipality->slug,$restaurant->slug]) }}">
                                    <img class="img-responsive" src="{{ asset('images/bussines/'.$name.'/'.$restaurant->pictures[0]->path) }}" alt="$restaurant->name" />
                                    <h3 class="margin-top-10">{{ $restaurant->name }}</h3>
                                    </a>
                                    <p class="minetext" style="height: 165px;overflow: hidden; ">
                                    {{ $restaurant->description }}
                                    <br/>
                                    <center>
                                        <i class="fa fa-map-marker"></i> 
                                        <a href="{{ route('front.municipio',[$restaurant->municipality->city->country->slug,$restaurant->municipality->city->slug,$restaurant->municipality->slug]) }}" style="color:gray;">{{ $restaurant->municipality->name }}</a>
                                        &nbsp;/&nbsp; <a href="{{ route('front.bussine',[$restaurant->municipality->city->country->slug,$restaurant->municipality->city->slug,$restaurant->municipality->slug,$restaurant->slug]) }}"><i class="fa fa-comments"></i> 
                                        <span class="countTo" data-speed="1000">{{ $restaurant->comments->count() }}</span>
                                        </a>
                                    </center>
                                    <div class="col-md-6 col-md-offset-3">
                                        <div class="rating rating-{{ $restaurant->ranking }}"></div>
                                    </div>
                                    </p>
                                    <br/>
                                    <center>
                                    <hr/>
                                    <a href="{{ route('front.bussine',[$restaurant->municipality->city->country->slug,$restaurant->municipality->city->slug,$restaurant->municipality->slug,$restaurant->slug]) }}" class="minebtn">
                                            <span class="mineup">{{ trans('app.api.ver') }}</span>
                                            <!-- /word rotator -->
                                            <span class="word-rotator" data-delay="3000">
                                                <span class="items">
                                                    <span>RESTAURANT</span>
                                                    <span>{{ trans('app.api.ahora') }}</span>
                                                </span>
                                            </span><!-- /word rotator -->
                                            <i class="glyphicon glyphicon-menu-right size-12"></i>
                                    </a>
                                    </center>
                                </div>
                                @endif
                                @empty
                                @endforelse
                            

                        </div>
                    </section>
                    <!-- /Welcome -->
            @endif
            
            


           @if($entertainments->count()>0)
             <!-- Healthy -->
            <section class="alternate" style="border-bottom:1px solid transparent">
                <div class="container" >

                    <div class="row">
                    
                        <div class="col-sm-6 text-center-xs wow fadeInUp" >

                            <h2 class="font-khausan-script size-40 weight-300 nomargin-bottom "><span>{{ trans('app.api.entertainment') }}</span>
                            <br/>
                            <span class="uppercase" style="font-size:30px;">{{ $country->name }}</span></h2>
                            
                            <p class="minetext">
                            {{ trans('app.api.propa') }} 
                            <span class="minegreen">{{ trans('app.api.com') }}</span>
                             {{ trans('app.api.ult') }}
                            </p>
                          
                            <p class="size-11"><b>{{ trans('app.api.note') }}:</b> {{ trans('app.api.join') }}</p>
                            <hr/>
                            <h2 class="col-sm-10  nomargin-bottom weight-400 size-19">{{ trans('app.api.view') }} 
                            <span class="countTo" data-speed="1000" style="color:black">{{ $entertainmentspartial }}</span>
                            {{ trans('app.api.of') }} 
                            <span class="countTo" data-speed="1000" style="color:black">{{ $entertainmentstotal }}</span>
                             @if($entertainmentspartial != $entertainmentstotal )
                              @if(App::getLocale()=='es')
                                        | <a href="{{ route('front.categorycountry',[$country->slug,'entretenimientos']) }}"> <i class='fa fa-eye'></i> {{ trans('app.api.more') }}</a>
                                    @else
                                        | <a href="{{ route('front.categorycountry',[$country->slug,'entertainments']) }}"> <i class='fa fa-eye'></i> {{ trans('app.api.more') }}</a>
                                    @endif
                             @endif
                             </h2> 
                    
                        </div>
                                                
                        <div class="col-sm-6 wow fadeInDown" style="margin-top:-40px;">
                            
                            <div class="row lightbox" data-plugin-options='{"delegate": "t", "gallery": {"enabled": true}}'>

                                @forelse($entertainments as $entertainment)
                                    @if($entertainment->pictures->count()>0)
                                        @php
                                            $name=$entertainment->slug;
                                        @endphp
                                        <div class="col-sm-6 col-xs-12">
                                            <t class="thumbnail mine" href="{{ asset('images/bussines/'.$name.'/'.$entertainment->pictures[0]->path) }}">
                                            <img class="img-responsive" src="{{ asset('images/bussines/'.$name.'/'.$entertainment->pictures[0]->path) }}" alt="{{ $entertainment->name }}" />
                                            </t>
                                            
                                                <center>
                                                <a href="{{ route('front.bussine',[$entertainment->municipality->city->country->slug,$entertainment->municipality->city->slug,$entertainment->municipality->slug,$entertainment->slug]) }}">{{ $entertainment->name }}</a>
                                                <span class="rating rating-{{ $entertainment->ranking }} size-12"></span>
                                                <p><i class="fa fa-map-marker"></i> 
                                                <a href="{{ route('front.municipio',[$entertainment->municipality->city->country->slug,$entertainment->municipality->city->slug,$entertainment->municipality->slug]) }}" style="color:gray;">{{ $entertainment->municipality->name }}</a>
                                                 / <a href="{{ route('front.bussine',[$entertainment->municipality->city->country->slug,$entertainment->municipality->city->slug,$entertainment->municipality->slug,$entertainment->slug]) }}"><i class="fa fa-comments"></i>
                                                  <span class="countTo" data-speed="1000">{{ $entertainment->comments->count() }}</span>
                                                  </a></p> 
                                                 </center>
                                            
                                        </div>
                                    @endif
                                @empty
                                    
                                          <img class="img-responsive" src="{{ asset('frontend/images/demo/1200x800/26-min.jpg') }}"  />
                                            <hr/>
                                            <br>
                                            <h2><center>No hay entretenimientos que mostrar</center></h2>
                                @endforelse

                            </div>
                            
                        </div>

                    </div>

                </div>
            </section>
            <!-- /Healthy -->
           @endif


          @if($populars->count()>0)
              <!-- CALLOUT -->
            <section id="hplans" class="callout-dark heading-title heading-arrow-bottom">
                <div class="container">

                    <header class="text-center">
                        <h1 class="weight-300 size-40 wow rotateInUpLeft">{{ trans('app.api.visited') }}</h1>
                        <h2 class="weight-300 letter-spacing-1 size-20 wow rotateInUpRight"><span>{{ trans('app.api.best') }}</span></h2>
                    </header>

                </div>
            </section>
            <!-- /CALLOUT -->



            <!-- PORTFOLIO -->
            <section style="border-bottom:none;">
                <div class="container wow fadeInLeft">

                    <div class="heading-title heading-dotted text-center">
                        <h2>{{ trans('app.api.pop') }} <span class="uppercase">{{ $country->name }}</span></h2>
                    </div>
                        <div class="col-md-12">
                            <hr/>
                        <center>
                            <h2 class="margin-bottom-60 weight-400 size-25" >{{ trans('app.api.view') }}
                             <span class="countTo" data-speed="1000" style="color:black">{{ $popularspartial }}</span>
                              {{ trans('app.api.of') }}
                              <span class="countTo" data-speed="1000" style="color:black">{{ $popularstotal }}</span>
                               @if($popularspartial != $popularstotal)
                                | <a href="{{ route('front.populares',$country->slug) }}"> <i class='fa fa-eye'></i> {{ trans('app.api.more') }}</a>
                               @endif
                               </h2> 
                        </center>
                        </div>

                    <div class="text-center">
                        <ul class="nav nav-pills mix-filter margin-bottom-60">
                            <li data-filter="all" class="filter active"><a href="#">{{ trans('app.api.all') }}</a></li>
                            @forelse($subtitlespopulars as $popular)
                                        <li data-filter="{{ $popular }}" class="filter"><a href="#">{{ $popular }}</a></li>
                            @empty
                            @endforelse
                        </ul>
                    </div>

                </div>

                <div id="portfolio" class="portfolio-nogutter wow fadeInRight" >

                        <div class="row mix-grid ">

                            @forelse($populars as $popular)
                                <div class="col-md-3 col-sm-3 mix {{ $popular->subcategory->category->name }}" ><!-- item -->
                                      @php
                                            $name=$popular->slug;
                                       @endphp
                                <div class="item-box">
                                    <figure>
                                        <span class="item-hover">
                                            <span class="overlay dark-5"></span>
                                            <span class="inner">

                                                <!-- lightbox -->
                                                <a class="ico-rounded lightbox" href="{{ asset('images/bussines/'.$name.'/'.$popular->pictures[0]->path) }}" data-plugin-options='{"type":"image"}'>
                                                    <span class="fa fa-search size-20"></span>
                                                </a>

                                                <!-- details -->
                                                <a class="ico-rounded" href="{{ route('front.bussine',[$popular->municipality->city->country->slug,$popular->municipality->city->slug,$popular->municipality->slug,$popular->slug]) }}">
                                                    <span class="fa fa-link size-20"></span>
                                                </a>

                                            </span>
                                        </span>

                                        <img class="img-responsive" src="{{ asset('images/bussines/'.$name.'/'.$popular->pictures[0]->path) }}" width="600" height="399" alt="$popular->name">
                                    </figure>

                                    <div class="item-box-desc">
                                        <a href="{{ route('front.bussine',[$popular->municipality->city->country->slug,$popular->municipality->city->slug,$popular->municipality->slug,$popular->slug]) }}"><h3>{{ $popular->name }}</h3></a>
                                        <ul class="text-left size-14 list-inline list-separator" style="margin-bottom:2px;">
                                            <li>
                                                <i class="fa fa-map-marker"></i> 
                                                <a href="{{ route('front.municipio',[$popular->municipality->city->country->slug,$popular->municipality->city->slug,$popular->municipality->slug]) }}" style="color:gray;">{{ $popular->municipality->name }}</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('front.bussine',[$popular->municipality->city->country->slug,$popular->municipality->city->slug,$popular->municipality->slug,$popular->slug]) }}">
                                                    <i class="fa fa-comments"></i> 
                                                    <span class="countTo" data-speed="1000">{{ $popular->comments->count() }}</span>
                                                    
                                                </a>
                                            </li>
                                            
                                        </ul>   
                                        <div class="col-md-8" style="margin-left:-15px;">
                                            <div  class="rating rating-{{ $popular->ranking }}"></div>
                                        </div>  
                                    </div>

                                </div>

                            </div><!-- /item -->
                            @empty
                            @endforelse


                         


                        </div>


                </div>
            </section>
            <!-- /PORTFOLIO -->
          @endif



                    <!-- 
    controlls-over      = navigation buttons over the image 
    buttons-autohide    = navigation buttons visible on mouse hover only
    
    data-plugin-options:
        "singleItem": true
        "autoPlay": true (or ms. eg: 4000)
        "navigation": true
        "pagination": true
        "items": "5"

    owl-carousel item paddings
        .owl-padding-0
        .owl-padding-3
        .owl-padding-6
        .owl-padding-10
        .owl-padding-15
        .owl-padding-20
-->
    @if($cities->count()>0)
        @if(!$country->city)
            <div class="wow fadeInLeft">


            <div class="col-md-10 col-md-offset-1">
                <div class="divider divider-circle divider-color divider-center"><!-- divider -->
                    <i class="fa fa-building-o"></i>
                    <i class="fa fa-building-o"></i>
                    <i class="fa fa-building-o"></i>
                </div>
            </div>

            <header class="margin-bottom-60 margin-top-60 text-center">

        <h2 class="col-md-12 uppercase">{{ trans('app.api.cities') }} {{ $country->name }}</h2>
     
   
    </header>

<div class="text-center">
    <div class="owl-carousel owl-padding-3 buttons-autohide controlls-over margin-bottom-100" data-plugin-options='{"singleItem": false, "items": "5", "autoPlay": true, "navigation": true, "pagination": false}'>
        @forelse($cities as $city)
                @if($city->city)
                  <a class="img-hover" href="{{ route('front.municipio',[$city->city->country->slug,$city->city->slug,$city->slug]) }}">
                    @if($city->path)
                            <img class="img-responsive" src="{{ asset('images/municipalities/'.$city->path) }}" alt="{{ $city->name }}">
                        @endif
                    <br/>
                    <br/>
                    <p class="size-19 minelink">{{ $city->name }}</p>
                </a>
                @else
                <a class="img-hover" href="{{ route('front.ciudad',[$city->country->slug,$city->slug]) }}">
                    @if($city->path)
                        <img class="img-responsive" src="{{ asset('images/cities/'.$city->path) }}" alt="{{ $city->name }}">
                    @endif
                <br/>
                <br/>
                <p class="size-19 minelink">{{ $city->name }}</p>
            </a>
            @endif

        @empty
        @endforelse
        
        
    </div>
</div>
        </div>
        @endif
        
            
            @if($countriesdistinctcuba->count()==0 or $country->country or $country->city)

            @else
                       <!-- 
            Note: remove class="rounded" from the img for squared image!
        -->
        <section class="parallax parallax-3" style="background-image:url('{{ asset("frontend/images/demo/vision-min.jpg") }}')">
            <div class="overlay dark-6"><!-- dark overlay [1 to 9 opacity] --></div>

            <div class="container">

                <div class="text-center">
            <h3 class="nomargin wow shake" data-wow-delay="0.2s">{{ trans('app.api.sigue') }} </h3>
            <p class="font-lato weight-300 lead nomargin-top wow bounce" data-wow-delay="0.3s"><i class="fa fa-map-marker"></i> 
            {{ trans('app.api.social') }}
            </p>
        </div>

        <center>
            <ul class="margin-top-80 social-icons list-unstyled list-inline wow flip" data-wow-delay="0.3s">
            <li>
                <a target="_blank" href="#">
                    <i class="fa fa-facebook"></i>
                    <h4>Facebook</h4>
                    <span>{{ trans('app.api.joinus') }}</span>
                </a>
            </li>
            <li>
                <a target="_blank" href="#">
                    <i class="fa fa-twitter"></i>
                    <h4>Twitter</h4>
                    <span>{{ trans('app.api.sigue') }}</span>
                </a>
            </li>
            <li>
                <a target="_blank" href="#">
                    <i class="fa fa-youtube"></i>
                    <h4>Youtube</h4>
                    <span>{{ trans('app.api.video') }}</span>
                </a>
            </li>
            <li>
                <a target="_blank" href="#">
                    <i class="fa fa-instagram"></i>
                    <h4>Instagram</h4>
                    <span>{{ trans('app.api.pictures') }}</span>
                </a>
            </li>
        </ul>   
        </center>
                    

            </div>
        </section>
        <!-- / -->
            @endif
@endif

    @if(count($countriesdistinctcuba)>0)
        @if($country->country)
    @elseif($country->city)
    @else
      <!-- Works -->
            <section class="wow rotateInDownRight">
                <div class="container">

                    <header class="margin-bottom-60 text-center">
                        <h2>{{ trans('app.api.otros') }}</h2>
                        <hr />
                        <h2 class="col-sm-10 col-sm-offset-1 margin-bottom-60 weight-400 size-25">{{ trans('app.api.view') }}
                        <span class="countTo" data-speed="1000" style="color:black;"> {{ $countriesdistinctcubapartial }}</span>
                         {{ trans('app.api.of') }}
                         <span class="countTo" data-speed="1000" style="color:black;">{{ $countriesdistinctcubatotal }}</span>
                          @if( $countriesdistinctcubapartial != $countriesdistinctcubatotal )
                            | <a href="{{ route('front.paises') }}"> <i class='fa fa-eye'></i> {{ trans('app.api.more') }}</a>
                          @endif
                          </h2> 
                    </header>

                    <div class="row mix-grid margin-top-80">

                      
                    @forelse($countriesdistinctcuba as $countries)
                        <div class="col-md-4 col-sm-4 mix design"><!-- item -->

                            <div class="item-box">
                                <figure>
                                    <span class="item-hover">
                                        <span class="overlay dark-5"></span>
                                        <span class="inner">

                                            <!-- lightbox -->
                                            <a class="ico-rounded lightbox" href="{{ asset('images/countries/'.$countries->path) }}" data-plugin-options='{"type":"image"}'>
                                                <span class="fa fa-search size-20"></span>
                                            </a>

                                            <!-- details -->
                                            <a class="ico-rounded" href="{{ route('front.pais',$countries->slug) }}">
                                                <span class="fa fa-link size-20"></span>
                                            </a>

                                        </span>
                                    </span>

                                    <!-- carousel -->
                                        <div>
                                            <img class="img-responsive" src="{{ asset('images/countries/'.$countries->path) }}" width="600" height="399" alt="$countries->name">
                                        </div>
                                    <!-- /carousel -->


                                </figure>

                                <div class="item-box-desc">
                                    <a href="{{ route('front.pais',$countries->slug) }}"><h3>{{ $countries->name }}</h3></a>
                                  
                                </div>

                            </div>

                        </div><!-- /item -->
                    @empty
                    @endforelse

                        


                        

                    </div>

                            
            </section>
            <!-- /Works -->
    @endif
    @endif
          

@endsection


