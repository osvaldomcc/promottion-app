@extends('layouts.app')

@section('content')

 @php
    $name=$bussine->slug;
@endphp

	<!-- 
                PAGE HEADER 
                
                CLASSES:
                    .page-header-xs = 20px margins
                    .page-header-md = 50px margins
                    .page-header-lg = 80px margins
                    .page-header-xlg= 130px margins
                    .dark           = dark page header

                    .shadow-before-1    = shadow 1 header top
                    .shadow-after-1     = shadow 1 header bottom
                    .shadow-before-2    = shadow 2 header top
                    .shadow-after-2     = shadow 2 header bottom
                    .shadow-before-3    = shadow 3 header top
                    .shadow-after-3     = shadow 3 header bottom
            -->
            <section class="page-header page-header-xs">
                <div class="container">
                    <br>
                    <div class="col-md-9 col-md-offset-2">
                            <center>
                                @include('flash::message')
                            </center>
                    </div>    
                    
                    <div class="col-md-12">
                      
                    @if($bussine->logo)
                        <img src="{{ asset('images/logos/'.$bussine->logo) }}" alt="" height="100px;" width="100px;" class="pull-left minelogo"/>
                    @endif
                      
                    <h1>
                        {{ $bussine->name }} 

                         @if($bussine->ranking==0)
                         @elseif($bussine->ranking==1)
                        <i class="fa fa-star" style="color: #fea223"></i>
                         @elseif($bussine->ranking==2)
                         <i class="fa fa-star" style="color: #fea223"></i>
                         <i class="fa fa-star" style="color: #fea223"></i>
                         @elseif($bussine->ranking==3)
                         <i class="fa fa-star" style="color: #fea223"></i>
                         <i class="fa fa-star" style="color: #fea223"></i>
                         <i class="fa fa-star" style="color: #fea223"></i>
                         @elseif($bussine->ranking==4)
                         <i class="fa fa-star" style="color: #fea223"></i>
                         <i class="fa fa-star" style="color: #fea223"></i>
                         <i class="fa fa-star" style="color: #fea223"></i>
                         <i class="fa fa-star" style="color: #fea223"></i>
                         @else
                          <i class="fa fa-star" style="color: #fea223"></i>
                         <i class="fa fa-star" style="color: #fea223"></i>
                         <i class="fa fa-star" style="color: #fea223"></i>
                         <i class="fa fa-star" style="color: #fea223"></i>
                         <i class="fa fa-star" style="color: #fea223"></i>
                         @endif
                    </h1>    

                    <span class="font-lato size-18 hidden-xs">{{ $bussine->slogan }} </span>


                        
                    <!-- Tooltip Top >-->
                   @if(Auth::user())
                         <br/>
                          @php 
                                  $user=Auth::user();
                                  $variable=DB::table('bussine_user')->join('bussines','bussines.id','=','bussine_user.bussine_id')
                                    ->where('user_id',$user->id)
                                    ->where('bussines.slug',$bussine->slug)
                                    ->count();
                          @endphp
                        @if($variable>0)
                             <p class="minemarcador">
                                {{ trans('app.api.already') }} <i class="fa fa-thumbs-o-up"></i>
                                <a data-toggle="tooltip" data-placement="top" title="{{ trans('app.api.mm') }}">
                                <i style="color:#a94442"  class="fa fa-bookmark" ></i>
                                </a>
                            </p>
                        @else
                             <p class="minemarcador">
                                {{ trans('app.api.addm') }} <i class="fa fa-hand-o-right"></i>
                                <a href="{{ route('front.agregar',$bussine) }}" data-toggle="tooltip" data-placement="top" title="{{ trans('app.api.add') }}"><i  class="fa fa-bookmark"></i></a>
                            </p>
                        @endif 
                   @endif
                   </div>


                </div>
            </section>
            <!-- /PAGE HEADER -->
            

            @if(count($bussine->videos)==1)
                <center style="margin-top:20px;">
                    <video class="minevideo" poster="{{ asset('frontend/images/demo/video/siren.jpg') }}" autoplay controls="true" height="10%" width="70%" src="{{ $bussine->videos[0]->path }}">
                        
                    </video>
                </center>
                @elseif(count($bussine->videos)>1)
                <!--
                    image-hover-icon supports two classes:
                        image-hover-dark - dark hover background
                        image-hover-light - light hover background
                -->
                <br/>
                 <div class="heading-title heading-border-bottom wow fadeInLeft">
                        <center>
                            <h3><span><i class="fa fa-youtube-play"></i> Videos</span> 
                            @if(count($bussine->videos)>4)
                            | <a href="{{ route('front.videos',$bussine) }}"> <i class='fa fa-eye'></i> {{ trans('app.api.more') }}</a>
                            @endif
                            </h3>
                        </center>
                </div>

                   <div class="container wow fadeInRight">
                        <div class="row">
                         @forelse($bussine->videos->reverse()->take(4) as $video)
                              <div class="col-md-3">
                                  <video class="minevideo"  controls="true" src="{{ $video->path }}" width="285" height="245"></video>
                              </div>
                         @empty
                         @endforelse
                         <div class="clearfix"></div>
                    </div>
                   </div>
            

            @endif

    

        


            <!-- GALLERY -->
            <section id="gallery" style="border-bottom: 0px solid transparent;">
                <div class="container wow fadeInRightBig">

                    <div class="row" >

                        <div class="col-sm-4">
                            <h3 class="weight-300"> <span>{{ trans('app.api.desc') }}</span></h3>
                            <p style="text-align: justify">
                                {{ $bussine->description }}
                            </p>
                            <hr/>
                            <p>
                                <i class="fa fa-map-marker"></i> {{ $bussine->address }}
                            </p>

                            
                            <div class="col-md-12 col-sm-12">
                        
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    @php
                                       $arre=$bussine->getCharacteristics();
                                    @endphp
                                    <ul class="portfolio-detail-list list-unstyled nomargin">
                                         @for($i=0;$i<count($arre);$i+=2)
                                            <li><i class="{{ $arre[$i+1] }}"></i>: {{ $arre[$i] }} </li>
                                        @endfor
                                    </ul>

                                </div>
                                
                                

                            </div>
                             @if(count($bussine->pictures)>12)
                            <a href="{{ route('front.imagenes',$bussine) }}"><i class="fa fa-eye"></i> {{ trans('app.api.smi') }}</a>    
                            @endif
                        </div>
                        </div>

                        <div class="col-sm-7 col-sm-offset-1 wow fadeInUp" >

                        @if($bussine->pictures->count()>0)
                            <div class="thumbnail margin-bottom-6" >
                                <!--
                                    IMAGE ZOOM 
                                    
                                    data-mode="mouseover|grab|click|toggle"
                                -->
                                <figure id="zoom-primary" class="zoom" data-mode="click" >
                                    <!-- 
                                        zoom buttton
                                        
                                        positions available:
                                            .bottom-right
                                            .bottom-left
                                            .top-right
                                            .top-left
                                    -->
                                    @php
                                        $var=$bussine->pictures->reverse();
                                    @endphp
                                    <a class="lightbox bottom-right" href="{{ asset('images/bussines/'.$name.'/'.$var->max()->path) }}" data-plugin-options='{"type":"image"}'>
                                        <i class="glyphicon glyphicon-search"></i>
                                    </a>

                                    <!-- 
                                        image

                                        Extra: add .image-bw class to force black and white!
                                    -->
                                    <img class="img-responsive" src="{{ asset('images/bussines/'.$name.'/'.$var->max()->path) }}" width="1200" height="1200" alt="" />
                                </figure>

                            </div>

                            <!-- 
                                Thumbnails (required height:100px) 
                                
                                data-for = figure image id match
                            -->
                            <div data-for="zoom-primary" class="zoom-more owl-carousel owl-padding-3 featured" data-plugin-options='{"singleItem": false, "items":8, "autoPlay": false, "navigation": true, "pagination": false}'>
                                
                               @forelse($bussine->pictures->reverse()->take(12) as $picture)
                                 <a class="thumbnail active" href="{{ asset('images/bussines/'.$name.'/'.$picture->path) }}">
                                    <img src="{{ asset('images/bussines/'.$name.'/'.$picture->path) }}" height="100" alt="$bussine->name" />
                                </a>
                               @empty
                               @endforelse
                            </div>
                            <!-- /Thumbnails -->
                            @endif
                        </div>
                    
                    </div>


                </div>
            </section>
            <!-- /GALLERY -->

       


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

                                  @if(count($others)>0)
                                          <div class="other wow bounceIn">
                                              <div class="heading-title heading-border-bottom">
                                                <center>
                                                    <h3><i class="fa fa-plus-square"></i> {{ trans('app.api.sc') }} <span>{{ $bussine->municipality->city->country->name }}</span></h3>
                                                </center>
                                        </div>
                                    <div class="owl-carousel owl-padding-10 buttons-autohide controlls-over " data-plugin-options='{"singleItem": false, "items":"4", "autoPlay": 12000, "navigation": true, "pagination": false}' >
                                            


                                        @forelse($others as $other)
                                            @if($other->pictures->count()>0)
                                                @php
                                                    $name=$other->slug;
                                                @endphp
                                            <div class="img-hover">
                                            <a href="{{ route('front.bussine',[$other->municipality->city->country->slug,$other->municipality->city->slug,$other->municipality->slug,$other->slug]) }}">
                                                <img class="img-responsive" src="{{ asset('images/bussines/'.$name.'/'.$other->pictures[0]->path) }}" alt="">
                                            </a>

                                            <h4 class="text-left margin-top-20"><a href="{{ route('front.bussine',[$other->municipality->city->country->slug,$other->municipality->city->slug,$other->municipality->slug,$other->slug]) }}">{{ $other->name }}</a></h4>
                                            <p class="minetext" style='height: 150px;overflow: hidden;'> {{ $other->description }} </p>
                                            <ul class="text-left size-12 list-inline list-separator" style="margin-bottom:2px;">
                                                <li>
                                                    <i class="fa fa-map-marker"></i> 
                                                    <a href="{{ route('front.municipio',[$other->municipality->city->country->slug,$other->municipality->city->slug,$other->municipality->slug]) }}" style="color:gray;">{{ $other->municipality->name }}</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('front.bussine',[$other->municipality->city->country->slug,$other->municipality->city->slug,$other->municipality->slug,$other->slug]) }}">
                                                        <i class="fa fa-comments"></i> 
                                                        <span class="countTo" data-speed="1000">{{ $other->comments->count() }}</span>
                                                        </a>
                                                </li>
                                                
                                            </ul>   
                                            <div class="col-md-8" style="margin-left:-15px;">
                                                <div  class="rating rating-{{ $other->ranking }}"></div>
                                            </div>                          
                                                    
                                            
                                            </div>
                                            @endif
                                        @empty
                                        @endforelse

                                    </div>
                                          </div>
                                  @endif

            <div class="comentario wow shake">
                <div class="container" style="margin-top:50px;">
                <div class="row">
                    <div class="col-md-12">
                        <div class="divider divider-circle divider-color divider-center"><!-- divider -->
                            <i class="fa fa-comments"></i>
                        </div>
                    </div>
                </div>
            </div>


            <section id="news" style="margin-top:-70px;">
                <div class="container">

                    @if(Auth::guest())
                        <div class="heading-title heading-border">
                            <h3> <span>{{ trans('app.api.comentarios') }}</span></h3>
                            <p class="font-lato size-14"> {{ trans('app.api.forcom') }} <a href="{{ url('/login') }}">{{ trans('app.api.here') }}</a></p>
                        </div>
                    @endif

                    <div class="row">
                        
                        @if(Auth::user())
                        <div class="col-md-9 col-md-offset-2">

                            <div class="alert alert-success margin-bottom-30 minetext">
                                <p>
                                        {{ trans('app.api.brevedad') }}
                                    
                                </p>
                            </div>
                        </div>

                         

                            <div class="col-md-6">
                           
                           <center style="display: none;" id="exitomsj">
                                <div class="alert alert-primary" role="alert" >
                                 {{ trans('app.api.success') }}
                               </div>
                            </center>                   

                            <center style="display:none" id="errormsj">
                                <div class="alert alert-danger" role="alert" >
                                
                                {{ trans('app.api.danger') }}
                               </div>
                            </center>                      
                            
                            {!! Form::open(['route'=>'front.commentcreate','class'=>'mineform','method'=>'POST','id'=>'formajax']) !!}

                                <input type="text" name="bussine_id" id="bussine_id" value="{{ $bussine->id }}" class="hidden">

                                <div class="form-group">
                                    <div class="fancy-form">
                                        <i class="fa fa-user"></i>

                                        @if(App::getLocale()=='es')
                                            {!! Form::text('title',null,['class'=>'form-control','placeholder'=>'ej: Es un fantástico lugar...','id'=>'titleajax']) !!}
                                        @else
                                            {!! Form::text('title',null,['class'=>'form-control','placeholder'=>'ex: Amazing place...','id'=>'titleajax']) !!}
                                        @endif

                                        <!-- tooltip - optional, bootstrap tooltip can be used instead -->
                                        <span class="fancy-tooltip top-left"> <!-- positions: .top-left | .top-right -->
                                            <em>{{ trans('app.api.asu') }}!</em>
                                        </span>
                                    </div>
                                </div>
                                        <div class="form-group has-error">
                                            <ul class="help-block" id="requesttitle">
                                            </ul>
                                            </div>
                                <div class="form-group">
                                    <div class="fancy-form">

                                         @if(App::getLocale()=='es')
                                              {!! Form::textarea('body',null,['class'=>'form-control word-count','data-maxlength'=>200,'data-info'=>'textarea-words-info','placeholder'=>'ej: Tiene unos bellos paisajes...','style'=>'height:150px;','id'=>'bodyajax']) !!}
                                        @else
                                              {!! Form::textarea('body',null,['class'=>'form-control word-count','data-maxlength'=>200,'data-info'=>'textarea-words-info','placeholder'=>'ex: The most beautiful landscapes...','style'=>'height:150px;','id'=>'bodyajax']) !!}
                                        @endif
                                        <i class="fa fa-comments"><!-- icon --></i>

                                        <span class="fancy-tooltip top-left"> <!-- positions: .top-left | .top-right -->
                                            <em>{{ trans('app.api.asu') }}!</em>
                                        </span>

                                    </div>
                                </div>
                                        <div class="form-group has-error">
                                            <ul class="help-block" id="requestbody">
                                            </ul>
                                            </div>

                                <div class="form-group">
                                    <button class="btn btn-primary">{{ trans('app.api.comente') }}</button>
                                    <img  class="hidden" src="{{ asset('frontend/images/loaders/10.gif') }}" id="loader">
                                    &nbsp;&nbsp;<i class='' style="color:#8ab933;" id="exito"></i>
                                    <i class='' style="color:darkred;" id="error"></i>
                                </div>
                            {!! Form::close() !!}
                        </div>
                        @endif
                        

                        <!-- RIGHT -->
                        <div class="{{ Auth::user() ? 'col-md-6' : 'col-md-7 col-md-offset-3' }}">

                            <h2>{{ trans('app.api.comente') }} <span class="size-18">/ {{ trans('app.api.sobre') }} <strong>"{{ $bussine->name }}"</strong>!</span></h2>

                            <a id="ruta" href="{{ route('front.commentbussine',$bussine) }}" class="hidden"></a>

                           <div id="agregadora">
                               
                           </div>
                    </div>
                        </div>


                    </div>

                </div>
            </section>
            <!-- /News -->
            </div>
           
@endsection


@section('scripts')

    <script type="text/javascript">
        $(document).ready(function(){
            inicio();

            $('#formajax').submit(function(e){
                e.preventDefault();
                   var method = $(this).attr('method');
                   var pet = $(this).attr('action');
                   var info = $(this).serialize();
                $.ajax({
                    beforeSend: function(){
                        $('#exito').removeClass();
                        $('#error').removeClass();
                        $('#loader').removeClass();
                    },
                    url: pet,
                    type: method,
                    data: info,
                    success: function()
                    {
                        $('#errormsj').hide('slow');
                        $('#exitomsj').hide('slow');
                        $('#exitomsj').show('slow');
                        inicio();
                        $('#titleajax').val(null);
                        $('#bodyajax').val(null);
                        $('#loader').addClass('hidden');
                        $('#exito').addClass('fa fa-check fa-lg');
                        $('#requestbody').empty();
                        $('#requesttitle').empty();
                        
                    },
                    error: function(data)
                    {
                        $('#exitomsj').hide('slow');
                        $('#errormsj').hide('slow');
                        $('#errormsj').show('slow');
                        inicio();
                        $('#loader').addClass('hidden');
                        $('#error').addClass('fa fa-times fa-lg');
                        var errors=data.responseJSON;       
                        console.log(errors);
                        $('#requestbody').empty().html('<li>' + errors.body[0] +'</li>');
                        $('#requesttitle').empty().html('<li>' + errors.title[0] +'</li>');
                    },
                });
            });

            function inicio()
            {
                var url = $('#ruta').attr('href');
                $.get(url,function(data){
                   $('#agregadora').html(data);
                });
            }

        });
    </script>

@endsection