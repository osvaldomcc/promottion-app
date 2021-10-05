@extends('layouts.app')

@section('categorias')

    @include('frontend.partials.categories')
    
@endsection

@section('revolution')

    @include('frontend.partials.revolution')
    
@endsection


@section('content')
    
        <section class=" wow fadeInUp">
                <div class="container">

                    <div class="row">
                        <div class="col-md-12">
                            
                            <header class="text-center margin-top-20" style="margin-bottom:-10px;">
                                <h1 class="weight-300"><span class="uppercase">{{ trans('app.api.pop') }} {{ trans('app.api.enden') }} {{ $country->name }}</span></h1>
                            </header>
                            <div class="divider divider-center divider-color"><!-- divider -->
                                <i class="fa fa-chevron-down"></i>
                            </div>
                          </div>
                        
                        @forelse($populars as $popular)
                            <div class="col-sm-4">
                            
                            <ul class="list-unstyled ">

                                <li class="restaurant-menu-item  relative clearfix margin-bottom-40">

                                @if($popular->pictures->count()>0)
                                @php
                                    $name=$popular->slug;
                                @endphp
                                  
                                    <a class="pull-left thumbnail nomargin-bottom lightbox" href="{{ asset('images/bussines/'.$name.'/'.$popular->pictures[0]->path) }}" data-plugin-options='{"type":"image"}'>
                                        <img class="img-responsive" src="{{ asset('images/bussines/'.$name.'/'.$popular->pictures[0]->path) }}" width="50" alt="" />
                                    </a>
                                    @endif
                                    
                                    <span class="pull-right size-17">
                                        <div class="shop-item-rating-line">
                                            <div class="rating rating-4 size-13"><!-- rating-0 ... rating-5 --></div>
                                        </div>
                                        <!-- /rating -->
                                    </span>
                                    <h4 class="margin-bottom-3"><span>
                                    <a href="{{ route('front.bussine',[$popular->municipality->city->country->slug,$popular->municipality->city->slug,$popular->municipality->slug,$popular->slug]) }}" style="color:#8ab933;">{{ $popular->name }}</a>
                                    </span></h4>
                                    <i class="fa fa-map-marker"></i>
                                     <a href="{{ route('front.municipio',[$popular->municipality->city->country->slug,$popular->municipality->city->slug,$popular->municipality->slug]) }}" style="color:gray;">{{ $popular->municipality->name }}</a>
                                    &nbsp;/&nbsp;
                                    <a href="{{ route('front.bussine',[$popular->municipality->city->country->slug,$popular->municipality->city->slug,$popular->municipality->slug,$popular->slug]) }}"><i class="fa fa-comments"></i> {{ $popular->comments->count() }}</a>
                                    </p>
                                </li>

                                
                            </ul>
                            
                        </div>
                        @empty
                              <div class="col-md-8 col-md-offset-2" style="margin-bottom:30%;">
                                  <center>
                                        <div class="alert alert-danger margin-bottom-30" ><!-- DANGER -->
                                            <strong>Inténtelo con otro lugar!</strong> No se encontraron coincidencias.
                                        </div>
                                  </center>
                            </div>
                        @endforelse


                    </div>
                </div>
               
                     <center>
                        {{ $populars->links() }}
                </center>


            </section>


           
    
            
@endsection


