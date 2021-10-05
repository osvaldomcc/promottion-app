@extends('layouts.app')

@section('content')

 @php
    $var=$bussine->pictures->reverse()->splice(12);
    $name=$bussine->slug;
@endphp
               <div class="container">
                  <div class="row">
                      <div class="minespace masonry-gallery columns-5 clearfix lightbox" data-img-big="1" data-plugin-options='{"delegate": "a", "gallery": {"enabled": true}}'>

                                @forelse($var as $picture)
                                  <a class="image-hover" href="{{ asset('images/bussines/'.$name.'/'.$picture->path) }}">
                                    <img src="{{ asset('images/bussines/'.$name.'/'.$picture->path) }}" alt="$bussine->name">
                                  </a>
                                @empty
                                @endforelse

                  </div>

                  </div>
               </div>
           
@endsection


