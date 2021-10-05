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
                            
                            <header class="text-center  margin-top-20" style="margin-bottom:-60px;">
                               <div class="text-center nomargin-top clearfix">
                                <h1 class="weight-300"><span class="uppercase" >{{ $subcategory->name }} {{ trans('app.api.enden') }} {{ $country->name }}</span></h1>
                                </div>
                            </header>
                            <div class="divider divider-center divider-color"><!-- divider -->
                                <i class="fa fa-chevron-down"></i>
                            </div>
                          </div>
                        
                        @forelse($resultados as $result)
                            <div class="col-sm-4">
                            
                            <ul class="list-unstyled ">

                                <li class="restaurant-menu-item  relative clearfix margin-bottom-40">

                                @if($result->pictures->count()>0)
                                @php
                                    $name=$result->slug;
                                @endphp
                                  
                                    <a class="pull-left thumbnail nomargin-bottom lightbox" href="{{ asset('images/bussines/'.$name.'/'.$result->pictures[0]->path) }}" data-plugin-options='{"type":"image"}'>
                                        <img class="img-responsive" src="{{ asset('images/bussines/'.$name.'/'.$result->pictures[0]->path) }}" width="50" alt="" />
                                    </a>
                                    @endif
                                    
                                    <span class="pull-right size-17">
                                        <div class="shop-item-rating-line">
                                            <div class="rating rating-4 size-13"><!-- rating-0 ... rating-5 --></div>
                                        </div>
                                        <!-- /rating -->
                                    </span>
                                    <h4 class="margin-bottom-3"><span>
                                    <a href="{{ route('front.bussine',[$result->municipality->city->country->slug,$result->municipality->city->slug,$result->municipality->slug,$result->slug]) }}" style="color:#8ab933;">{{ $result->name }}</a>
                                    </span></h4>
                                    <i class="fa fa-map-marker"></i> 
                                         <a href="{{ route('front.municipio',[$result->municipality->city->country->slug,$result->municipality->city->slug,$result->municipality->slug]) }}" style="color:gray;">{{ $result->municipality->name }}</a>
                                    &nbsp;/&nbsp;
                                    <a href="{{ route('front.bussine',[$result->municipality->city->country->slug,$result->municipality->city->slug,$result->municipality->slug,$result->slug]) }}"><i class="fa fa-comments"></i> 
                                    {{ $result->comments->count() }}
                                    </a>
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
                        {{ $resultados->links() }}
                </center>


            </section>


           
	
            
@endsection


