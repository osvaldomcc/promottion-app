@extends('layouts.app')

@section('content')

 @php
    $var=$bussine->videos->reverse()->splice(4);
@endphp
                <div class="container wow fadeInUp">
                    <div class="row">
                             <div class="minespace">
                                 @forelse($var as $video)
                                  <div class="col-md-3">
                                      <video class="minevideo"  controls="true" src="{{ $video->path }}" width="280" height="245"></video>
                                  </div>
                                 @empty
                                 @endforelse
                             </div>
                    </div>
            </div>
           
@endsection


