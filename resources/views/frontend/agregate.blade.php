 <!-- news item --> 
 @forelse($comments as $comment)
<div class="inews-item">
  
    @if(Auth::user())
    <a class="inews-thumbnail" href="{{ route('front.verperfil',$comment->user) }}" >
        <img class="img-responsive col-md-offset-2" src="{{ asset('images/avatars/'.$comment->user->path) }}" alt="{{ $comment->user->name }}" style="width:145px;height:180px;border-radius:15px;" />
    </a>
    @else
    <a class="inews-thumbnail registuser" href="{{ url('/login') }}" >
        <img class="img-responsive col-md-offset-2" src="{{ asset('images/avatars/'.$comment->user->path) }}" alt="{{ $comment->user->name }}" style="width:145px;height:180px;border-radius:15px;" />
    </a>
    @endif

    <div class="inews-item-content">

        <div class="inews-date-wrapper">
            <span class="inews-date-day">{{ $comment->created_at->format('d') }}</span>
            <span class="inews-date-month" >{{ $comment->created_at->format('M') }}</span>

            <span class="inews-date-year" >{{ $comment->created_at->format('Y') }}</span>
        </div>

        <div class="inews-content-inner ">

            <h3 class="size-20"><span>{{ $comment->title }}</span></h3>
            <ul class="blog-post-info list-inline noborder margin-bottom-20 nopadding">
                <li>
                    @if(Auth::user())
                    <a href="{{ route('front.verperfil',$comment->user) }}">
                        <i class="fa fa-user"></i>
                        <span class="font-lato">Por: {{ $comment->user->name }}</span>
                    </a>
                    @else
                     <a href="{{ url('/login') }}" class="registuser">
                        <i class="fa fa-user"></i>
                        <span class="font-lato">Por: {{ $comment->user->name }}</span>
                    </a>
                    @endif
                </li>

            </ul>


            <p class="minews">
                {{ $comment->body }}
            </p>
            <span class="pull-right">  
                @if(Auth::user())
                 @if(($comment->likes->where('user_id',Auth::user()->id)->where('like',1)->count())>0)
                    <a href="{{ route('front.like',$comment) }}" class='like minegreen'><i class="fa fa-thumbs-o-up fa-lg"></i></a>
                    @else
                    <a href="{{ route('front.like',$comment) }}" class='like' style='color:black'><i class="fa fa-thumbs-o-up fa-lg"></i></a>
                @endif   
           @else
                <a style="color: black;" href="{{ url('/login') }}" class="registrate"><i class="fa fa-thumbs-o-up fa-lg"></i></a>
           @endif
                {{ $comment->likes->where('like',1)->count() }}
            @if(Auth::user())
               @if(($comment->likes->where('user_id',Auth::user()->id)->where('like',0)->count())>0)
                 <a href="{{ route('front.dislike',$comment) }}" style="color: #d9534f;" class='like'><i class="fa fa-thumbs-o-down fa-flip-horizontal fa-lg"></i></a>
                 @else
                   <a href="{{ route('front.dislike',$comment) }}" style="color: black" class='like'><i class="fa fa-thumbs-o-down fa-flip-horizontal fa-lg"></i></a>
                @endif
            @else
                  <a  style="color: black;" href="{{ url('/login') }}" class="registrate"><i class="fa fa-thumbs-o-down fa-flip-horizontal fa-lg"></i></a>
            @endif
            </span>
        </div>


    </div>
</div>
@empty
<div class="col-md-8" style="margin-bottom:30%;">
      <center>
            <div class="alert alert-danger margin-bottom-30" ><!-- DANGER -->
                 {{ trans('app.api.ncs') }} <i class="fa fa-comments"></i>
            </div>
      </center>
</div>
@endforelse

<!-- /news item -->
<div class="">
    {{ $comments->links()  }}
</div>
<span class="hidden" id="comentarun">{{ trans('app.api.comentarun') }}</span>
<span class="hidden" id="canceled">{{ trans('app.api.canceled') }}</span>
<span class="hidden" id="tocancel">{{ trans('app.api.cancel') }}</span>
<span class="hidden" id="toaccess">{{ trans('app.api.access') }}</span>
<span class="hidden" id="accessing">{{ trans('app.api.accessing') }}</span>
<span class="hidden" id="takingyou">{{ trans('app.api.takingyou') }}</span>
<span class="hidden" id="notable">{{ trans('app.api.notable') }}</span>
<span class="hidden" id="seeprof">{{ trans('app.api.seeprof') }}</span>
<span class="hidden" id="noseeprof">{{ trans('app.api.noseeprof') }}</span>

 <script type="text/javascript">
        $(document).ready(function(){
            var comen=$('#comentarun').html();
            var cancela=$('#canceled').html();
            var tocancel=$('#tocancel').html();
            var toaccess=$('#toaccess').html();
            var accessing=$('#accessing').html();
            var takingyou=$('#takingyou').html();
            var notable=$('#notable').html();
            var seeprof=$('#seeprof').html();
            var noseeprof=$('#noseeprof').html();

            $('.pagination li a').click(function(e){
                e.preventDefault();
                var url = $(this).attr('href');
                $.get(url,function(data){
                    $('#agregadora').html(data);
                });
         });

         $('.like').click(function(e){
                e.preventDefault();
                var change=$('.pagination li a').attr('href');
                var url=$(this).attr('href');
                $.get(url,function(data){
                    if(change!=undefined){
                        pag(e);
                    }else{
                        inicio();
                    }
                });
                
         });

               function inicio()
                {
                    var url = $('#ruta').attr('href');
                    $.get(url,function(data){
                       $('#agregadora').html(data);
                    });
                }

            function pag(e)
            {
                e.preventDefault();
                var urlfull = $('.pagination li a').attr('href');
                var pag = $('.pagination li.active span').html();
                var url = urlfull.split('=')[0]+'='+pag;
                $.get(url,function(data){
                    $('#agregadora').html(data);
                });
            }

            $('.registrate').click(function(e){
                    e.preventDefault();
                    var url=$(this).attr('href');
                    
                      swal({
                                    title: comen,
                                     type: "warning",
                                     showCancelButton: true,
                                     confirmButtonColor: '#F63F1C',
                                     confirmButtonText: toaccess,
                                     showLoaderOnConfirm: true,
                                     cancelButtonText: tocancel,
                                     closeOnConfirm: false,
                                     closeOnCancel: false,
                                 },

                                 function(isConfirm){
                                     if (isConfirm){
                                                window.location.assign(url);
                                                     setTimeout(function(){
                                                     }, 2000);
                                         swal({
                                                     title: accessing,
                                                     text: takingyou,
                                                     type: "success",
                                                     closeOnConfirm: false,
                                                     showLoaderOnConfirm: true
                                                 });
                                                 
                                     } else {
                                         swal(cancela, notable, "error");
                                     }
                                 });
            });

          $('.registuser').click(function(e){
                e.preventDefault();
                var url=$(this).attr('href');
                  swal({
                                title: seeprof,
                                 type: "warning",
                                 showCancelButton: true,
                                 confirmButtonColor: '#F63F1C',
                                 confirmButtonText: toaccess,
                                 showLoaderOnConfirm: true,
                                 cancelButtonText: tocancel,
                                 closeOnConfirm: false,
                                 closeOnCancel: false,
                             },

                             function(isConfirm){
                                 if (isConfirm){
                                            window.location.assign(url);
                                                 setTimeout(function(){
                                                 }, 2000);
                                      swal({
                                                     title: accessing,
                                                     text: takingyou,
                                                     type: "success",
                                                     closeOnConfirm: false,
                                                     showLoaderOnConfirm: true
                                                 });
                                             
                                 } else {
                                     swal(cancela, noseeprof, "error");
                                 }
                             });
        });











    });
    </script>
   