@extends('layouts.perfil')

@section('perfilcontent')
    
        <div class="box-light"><!-- .box-light OR .box-dark -->

                            <div class="box-inner">
                            
                                @forelse($comments as $comment)
                                    <!-- COMMENT -->
                                <ul class="comment list-unstyled wow fadeInUp">
                                    <li class="comment">

                                        <!-- avatar -->
                                       @if($comment->user->path)
                                         <img class="avatar rounded" src="{{ asset('images/avatars/'.$comment->user->path) }}" width="50" height="60" alt="avatar" />
                                       @endif

                                        <!-- comment body -->
                                        <div class="comment-body"> 
                                            <a class="comment-author">
                                                <small class="text-muted pull-right"> {{ $comment->created_at->diffforhumans() }} </small>
                                                <span>
                                                {{ $comment->user->name }}
                                                @if($comment->user->firstname)
                                                    {{ $comment->user->firstname }}
                                                @endif
                                                </span>
                                            </a>
                                            <p>
                                                {{ $comment->body }}  
                                            </p>
                                        </div><!-- /comment body -->

                                        <!-- options -->
                                        <ul class="list-inline size-11 margin-top-10">
                                            <br/>
                                            <li class="pull-right">
                                                <a href="{{ route('front.bussine',[$comment->bussine->municipality->city->country->slug,$comment->bussine->municipality->city->slug,$comment->bussine->municipality->slug,$comment->bussine->slug]) }}" class="text-info"><i class="fa fa-link"></i> {{ $comment->bussine->name }}</a>
                                            </li>
                                        </ul>
                                    </li><!-- /options -->

                                   
                                </ul>
                                <div class="col-md-12 wow fadeInUp" style="background-color: lightgray;border:2px solid lightgray;"></div>
                                <br/>
                                <!-- /COMMENT -->
                                @empty
                                          <center>
                                                <div class="alert alert-danger margin-bottom-30" ><!-- DANGER -->
                                                     {{ trans('app.api.ncs') }}
                                                     <i class="fa fa-comments-o"></i>
                                                </div>
                                          </center>
                                @endforelse

                                <center>
                                    {{ $comments->links() }}
                                </center>
                            
                            </div>

                        </div>

@endsection