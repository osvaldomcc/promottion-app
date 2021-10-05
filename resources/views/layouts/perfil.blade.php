@extends('layouts.app')


@section('content')
    
     <section>
          <div class="container">
                    
                    <!-- LEFT -->
                    <div class="col-lg-3 col-md-3 col-sm-4">
                    
                        <div class="thumbnail text-center wow fadeInLeft">
                            @if($user->path)
                                <img src="{{ asset('images/avatars/'.$user->path) }}" alt="{{ $user->name }}" />
                            @endif
                            <h2 class="size-18 margin-top-10 margin-bottom-0">
                            {{ $user->name }}
                            @if($user->firstname)
                            {{ $user->firstname }}
                            @endif
                            </h2>
                            <h3 class="size-11 margin-top-0 margin-bottom-10 text-muted"></h3>
                        </div>

                         <!-- completed -->
                    <div class="margin-bottom-30 wow rotateInUpLeft">
                           @if($porciento==100)
                            <label>{{ $porciento }}% {{ trans('app.api.complete') }}</label>
                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="88" aria-valuemin="0" aria-valuemax="100" style="width: {{ $porciento }}%; min-width: 2em;"></div>
                             </div>
                           @elseif($porciento>=80 and $porciento<100)
                            <label>{{ $porciento }}% {{ trans('app.api.complete') }}</label>
                                <div class="progress progress-xxs">
                                    <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="88" aria-valuemin="0" aria-valuemax="100" style="width: {{ $porciento }}%; min-width: 2em;"></div>
                                 </div>
                           @else
                             <label>{{ $porciento }}% {{ trans('app.api.complete') }}</label>
                                <div class="progress progress-xxs">
                                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="88" aria-valuemin="0" aria-valuemax="100" style="width: {{ $porciento }}%; min-width: 2em;"></div>
                                 </div>
                           @endif
                    </div>
                        <!-- /completed -->
                       

                        <!-- SIDE NAV -->
                        <ul class="side-nav list-group margin-bottom-60 wow fadeInRight" id="sidebar-nav">
                            <li class="list-group-item {{ route('front.perfil')==Request()->url() ? 'active' : '' }}"><a href="{{ route('front.perfil') }}"><i class="fa fa-newspaper-o"></i> {{ trans('app.api.new') }} </a></li>
                            <li class="list-group-item {{ route('front.marcadores')==Request()->url() ? 'active' : '' }}"><a href="{{ route('front.marcadores') }}"><i class="fa fa-bookmark"></i> {{ trans('app.api.mark') }} </a></li>
                            <li class="list-group-item {{ route('front.comentarios')==Request()->url() ? 'active' : '' }}"><a href="{{ route('front.comentarios') }}"><i class="fa fa-comments-o"></i> {{ trans('app.api.comment') }} </a></li>
                            <li class="list-group-item {{ route('front.vermensajes')==Request()->url() ? 'active' : '' }}"><a href="{{ route('front.vermensajes') }}"><i class="fa fa-commenting-o"></i> {{ trans('app.api.rec') }}</a></li>
                            <li class="list-group-item {{ route('front.configuracion')==Request()->url() ? 'active' : '' }}"><a href="{{ route('front.configuracion') }}"><i class="fa fa-gears"></i> {{ trans('app.api.conf') }}</a></li>
                        </ul>
                        <!-- /SIDE NAV -->


                        <!-- info -->
                        <div class="box-light margin-bottom-30 wow fadeInLeft" ><!-- .box-light OR .box-light -->
                            <div class="row margin-bottom-20" style="margin-left:-35px;">
                                <div class="col-md-4 col-sm-4 col-xs-4 text-center bold">
                                    <h3 class="size-11 margin-top-0 margin-bottom-10 text-info">{{ trans('app.api.day') }}</h3>
                                    <h2 class="size-30 margin-top-10 margin-bottom-0 font-raleway">{{ date('d') }}</h2>
                                </div>

                                <div class="col-md-4 col-sm-4 col-xs-4 text-center bold">
                                    <h3 class="size-11 margin-top-0 margin-bottom-10 text-info">{{ trans('app.api.month') }}</h3>
                                    <h2 class="size-30 margin-top-10 margin-bottom-0 font-raleway">{{ date('m') }}</h2>
                                </div>

                                <div class="col-md-4 col-sm-4 col-xs-4 text-center bold">
                                    <h3 class="size-11 margin-top-0 margin-bottom-10 text-info">{{ trans('app.api.year') }}</h3>
                                    <h2 class="size-30 margin-top-10 margin-bottom-0 font-raleway">{{ date('Y') }}</h2>
                                </div>
                            </div>
                            <!-- /info -->

                        
                        </div>

                    </div>


                    <!-- RIGHT -->
                    <div class="col-lg-9 col-md-9 col-sm-8">

                        <!-- FLIP BOX -->
                        <div class="box-flip box-icon box-icon-center box-icon-round box-icon-large text-center nomargin">
                   
                            <div class="front ">
                                <div class="box1 noradius wow fadeInDown">
                                    <div class="box-icon-title">

                                        <h2> {{ $user->name }}   @if($user->firstname)  {{ $user->firstname }}    @endif  &ndash; {{ trans('app.api.p') }}   </h2>
                                         @if($user->path)
                                           <center>
                                                <img class="thumbnail rounded" src="{{ asset('images/avatars/'.$user->path) }}" alt="{{ $user->name }}" width="60" height="80" />
                                           </center>
                                         @endif
                                    </div>
                                    <p>{{ trans('app.api.over') }}</p>
                                </div>
                            </div>

                            <div class="back">
                                <div class="box2 noradius">
                                    <h4>{{ trans('app.api.who') }}</h4>
                                    <hr />
                                    <p>
                                        @if($user->about)
                                            {{ $user->about }}
                                        @else
                                        {{ trans('app.api.nfinish') }}
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- /FLIP BOX -->

                      

                        @yield('perfilcontent')

                    

                    </div>
                    
                </div>


     </section>
           
    
            
@endsection


