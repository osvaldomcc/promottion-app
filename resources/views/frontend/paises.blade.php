@extends('layouts.app')

@section('revolution')

    @include('frontend.partials.revolution')
    
@endsection


@section('content')
    
        <section class=" wow fadeInUp">
                <div class="container">

                    <div class="row">
                        <div class="col-md-12">
                            
                                    <header class="text-center margin-bottom-30 margin-top-20">
                                <h1 class="weight-300"><span>{{ trans('app.api.allc') }}</span></h1>
                            </header>
                            <div class="divider divider-center divider-color"><!-- divider -->
                                <i class="fa fa-chevron-down"></i>
                            </div>
                          </div>
                        
                        @forelse($paises as $pais)
                            <div class="col-sm-4">
                            
                            <ul class="list-unstyled ">

                                <li class="restaurant-menu-item  relative clearfix margin-bottom-40">

                                  
                                    <a class="pull-left thumbnail nomargin-bottom lightbox" href="{{ asset('images/countries/'.$pais->path) }}" data-plugin-options='{"type":"image"}'>
                                        <img class="img-responsive" src="{{ asset('images/countries/'.$pais->path) }}" width="50" alt="" />
                                    </a>
                                                                        
                                    <span class="pull-right size-17">
                                        <div class="shop-item-rating-line">
                                        </div>
                                        <!-- /rating -->
                                    </span>
                                    <h3 class="margin-bottom-3"><span>
                                        <a href="{{ route('front.pais',$pais->slug) }}" >{{ $pais->name }}</a>
                                    </span></h3>
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
                        {{ $paises->links() }}
                </center>


            </section>


           
    
            
@endsection


