 <!-- REVOLUTION SLIDER -->
            <div class="slider fullwidthbanner-container roundedcorners">
                <!--
                    Navigation Styles:
                    
                        data-navigationStyle="" theme default navigation
                        
                        data-navigationStyle="preview1"
                        data-navigationStyle="preview2"
                        data-navigationStyle="preview3"
                        data-navigationStyle="preview4"
                        
                    Bottom Shadows
                        data-shadow="1"
                        data-shadow="2"
                        data-shadow="3"
                        
                    Slider Height (do not use on fullscreen mode)
                        data-height="300"
                        data-height="350"
                        data-height="400"
                        data-height="450"
                        data-height="500"
                        data-height="550"
                        data-height="600"
                        data-height="650"
                        data-height="700"
                        data-height="750"
                        data-height="800"
                -->
                <div class="fullwidthbanner" data-height="600" data-shadow="0" data-navigationStyle="preview2">
                    <ul class="hide">

                    @forelse($banners as $banner)
                        @php 
                            $name=$banner->slug;
                        @endphp

                            <!-- 
    Primero de todos

--> 
                        @if($banner->pictures->count()>0)
                        @if($banner->subcategory->name=='HOTELES' or $banner->subcategory->name=='HOTELS')
                        <li data-transition="random" data-slotamount="1" data-masterspeed="1000" data-saveperformance="off" data-title="{{ $banner->name }}">
                            <img src="{{ asset('frontend/images/1x1.png') }}" data-lazyload="{{ asset('images/bussines/'.$name.'/'.$banner->pictures[0]->path) }}" alt="{{ $banner->name }}" data-bgfit="cover" data-bgposition="center bottom" data-bgrepeat="no-repeat" />

                            <div class="overlay dark-1"><!-- dark overlay [1 to 9 opacity] --></div>

                              <div class="tp-caption customin ltl tp-resizeme large_bold_white"
                                data-x="center"
                                data-y="150"
                                data-customin="x:0;y:150;z:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;"
                                data-speed="800"
                                data-start="1200"
                                data-easing="easeOutQuad"
                                data-splitin="none"
                                data-splitout="none"
                                data-elementdelay="0.01"
                                data-endelementdelay="0.1"
                                data-endspeed="1000"
                                data-endeasing="Power4.easeIn" style="z-index: 10;">
                                {{ $banner->name }}
                            </div>

                           <div class="tp-caption customin ltl tp-resizeme text_white"
                                data-x="center"
                                data-y="240"
                                data-customin="x:0;y:150;z:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;"
                                data-speed="800"
                                data-start="1000"
                                data-easing="easeOutQuad"
                                data-splitin="none"
                                data-splitout="none"
                                data-elementdelay="0.01"
                                data-endelementdelay="0.1"
                                data-endspeed="1000"
                                data-endeasing="Power4.easeIn" style="z-index: 10;">
                                <span class="weight-300">
                                @if(count($banner->getCharacteristics())-1>0)
                                        @if(count($banner->getCharacteristics())-1==1)
                                            {{ $banner->getCharacteristics()[0] }}
                                        @else
                                            {{ $banner->getCharacteristics()[0] }} /
                                        @endif
                                @endif

                               @if(count($banner->getCharacteristics())-1>2)
                                        @if(count($banner->getCharacteristics())-1==3)
                                            {{ $banner->getCharacteristics()[2] }}
                                        @else
                                            {{ $banner->getCharacteristics()[2] }} /
                                        @endif
                                @endif

                                  @if(count($banner->getCharacteristics())-1>4)
                                        @if(count($banner->getCharacteristics())-1==5)
                                            {{ $banner->getCharacteristics()[4] }}
                                        @else
                                            {{ $banner->getCharacteristics()[4] }} /
                                        @endif
                                @endif

                                  @if(count($banner->getCharacteristics())-1>6)
                                        @if(count($banner->getCharacteristics())-1==7)
                                            {{ $banner->getCharacteristics()[6] }}
                                        @else
                                            {{ $banner->getCharacteristics()[6] }}
                                        @endif
                                @endif


                                </span>
                            </div>

                            <div class="tp-caption customin ltl tp-resizeme"
                                data-x="center"
                                data-y="330"
                                data-customin="x:0;y:150;z:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;"
                                data-speed="800"
                                data-start="1550"
                                data-easing="easeOutQuad"
                                data-splitin="none"
                                data-splitout="none"
                                data-elementdelay="0.01"
                                data-endelementdelay="0.1"
                                data-endspeed="1000"
                                data-endeasing="Power4.easeIn" style="z-index: 10;">
                                  <a href="{{ route('front.bussine',[$banner->municipality->city->country->slug,$banner->municipality->city->slug,$banner->municipality->slug,$banner->slug]) }}" class="btn btn-default btn-lg">
                                    <span> {{ trans('app.api.visit') }} </span> 
                                </a>
                            </div>

                        </li>
                        
                        




<!-- 
    Segundo de todos
-->


                                   <!-- SLIDE  -->
                        @elseif($banner->subcategory->name=='RESTAURANTES' or $banner->subcategory->name=='RESTAURANTS')
                        <li data-transition="random" data-slotamount="1" data-masterspeed="1000" data-saveperformance="off" data-title="{{ $banner->name }}">

                            <img src="{{ asset('frontend/images/1x1.png') }}" data-lazyload="{{ asset('images/bussines/'.$name.'/'.$banner->pictures[0]->path) }}" alt="{{ $banner->name }}" data-bgfit="cover" data-bgposition="center bottom" data-bgrepeat="no-repeat" />

                            <div class="overlay dark-1"><!-- dark overlay [1 to 9 opacity] --></div>


                            <div class="tp-caption large_bold_white skewfromrightshort customout font-open-sans"
                                data-x="300"
                                data-y="70"
                                data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                data-speed="500"
                                data-start="800"
                                data-easing="Back.easeOut"
                                data-endspeed="500"
                                data-endeasing="Power4.easeIn"
                                data-captionhidden="off"
                                style="z-index: 4; font-weight:bold;">{{ $banner->name }}
                            </div>

                              @if(count($banner->getCharacteristics())-1>0)                    
                            <div class="tp-caption text_white skewfromleftshort customout"
                                data-x="350" data-hoffset="-90"
                                data-y="200"
                                data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                data-speed="500"
                                data-start="1600"
                                data-easing="Back.easeOut"
                                data-endspeed="500"
                                data-endeasing="Power4.easeIn"
                                data-captionhidden="off"
                                style="z-index: 10; text-shadow:none;">
                                {{ $banner->getCharacteristics()[0] }}  

                                
                            </div>
                            @endif

                            @if(count($banner->getCharacteristics())-1>2)
                            <div class="tp-caption green_bold_bg_20 skewfromleftshort customout"
                                data-x="380" data-hoffset="-90"
                                data-y="250"
                                data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                data-speed="500"
                                data-start="1650"
                                data-easing="Back.easeOut"
                                data-endspeed="500"
                                data-endeasing="Power4.easeIn"
                                data-captionhidden="off"
                                style="z-index: 11; text-shadow:none;">
                                
                                    {{ $banner->getCharacteristics()[2] }}  
                                
                            </div>
                            @endif

                            @if(count($banner->getCharacteristics())-1>4)
                            <div class="tp-caption text_white skewfromleftshort customout start font300"
                                data-x="500" data-hoffset="-90"
                                data-y="300"
                                data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                data-speed="500"
                                data-start="1850"
                                data-easing="Back.easeOut"
                                data-endspeed="500"
                                data-endeasing="Power4.easeIn"
                                data-captionhidden="off"
                                style="z-index: 13; text-shadow:none; font-weight:300;">
                                  
                                   + {{ $banner->getCharacteristics()[4] }}  
                                
                            </div>
                            @endif

                            @if(count($banner->getCharacteristics())-1>6)
                            <div class="tp-caption blue_bold_bg_20 skewfromleftshort customout"
                                data-x="550" data-hoffset="-90"
                                data-y="350"
                                data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                data-speed="500"
                                data-start="2300"
                                data-easing="Back.easeOut"
                                data-endspeed="500"
                                data-endeasing="Power4.easeIn"
                                data-captionhidden="off"
                                style="z-index: 21; text-shadow:none;">
                                  
                                    {{ $banner->getCharacteristics()[6] }}  
                                
                            </div>
                            @endif

                            <div class="tp-caption customin ltl tp-resizeme"
                                data-x="center"
                                data-y="430"
                                data-customin="x:0;y:150;z:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;"
                                data-speed="800"
                                data-start="1550"
                                data-easing="easeOutQuad"
                                data-splitin="none"
                                data-splitout="none"
                                data-elementdelay="0.01"
                                data-endelementdelay="0.1"
                                data-endspeed="1000"
                                data-endeasing="Power4.easeIn" style="z-index: 10;">
                               <a href="{{ route('front.bussine',[$banner->municipality->city->country->slug,$banner->municipality->city->slug,$banner->municipality->slug,$banner->slug]) }}" class="btn btn-default btn-lg">
                                    <span> {{ trans('app.api.visit') }} </span> 
                                </a>
                            </div>

                        </li>
                        



<!-- 
    Tercero
-->




                                     <!-- SLIDE  -->
                        @elseif($banner->subcategory->name=='ENTRETENIMIENTOS' or $banner->subcategory->name=='ENTERTAINMENTS')      
                                              
                        <li data-transition="random" data-slotamount="1" data-masterspeed="1000" data-saveperformance="off" data-title="{{ $banner->name }}">

                            <img src="{{ asset('frontend/images/1x1.png') }}" data-lazyload="{{ asset('images/bussines/'.$name.'/'.$banner->pictures[0]->path) }}" alt="{{ $banner->name }}" data-bgfit="cover" data-bgposition="center bottom" data-bgrepeat="no-repeat" />

                            <div class="overlay dark-1"><!-- dark overlay [1 to 9 opacity] --></div>

                            <div class="tp-caption block_black sft" 
                                data-x="400" data-hoffset="-70"
                                data-y="137" 
                                data-speed="750" 
                                data-start="1100" 
                                data-easing="easeOutExpo" 
                                data-splitin="none" 
                                data-splitout="none" 
                                data-elementdelay="0.1" 
                                data-endelementdelay="0.1" 
                                data-endspeed="300" 
                                style="z-index: 3; max-width: auto; max-height: auto; white-space: nowrap;">{{ $banner->name }}
                            </div>
                            @if(count($banner->getCharacteristics())-1>0)
                            <div class="tp-caption block_black sfb" 
                                data-x="450" data-hoffset="-70" 
                                data-y="176" 
                                data-speed="750" 
                                data-start="1400" 
                                data-easing="easeOutExpo" 
                                data-splitin="none" 
                                data-splitout="none" 
                                data-elementdelay="0.1" 
                                data-endelementdelay="0.1" 
                                data-endspeed="300" 
                                style="z-index: 4; max-width: auto; max-height: auto; white-space: nowrap;">{{ $banner->getCharacteristics()[0] }}  
                            </div>
                            @endif

                            @if(count($banner->getCharacteristics())-1>2)
                            <div class="tp-caption block_theme_color sft" 
                                data-x="400"  data-hoffset="-70"
                                data-y="239" 
                                data-speed="750" 
                                data-start="1700" 
                                data-easing="easeOutExpo" 
                                data-splitin="none" 
                                data-splitout="none" 
                                data-elementdelay="0.1" 
                                data-endelementdelay="0.1" 
                                data-endspeed="300" 
                                style="z-index: 5; max-width: auto; max-height: auto; white-space: nowrap;">{{ $banner->getCharacteristics()[2] }}  
                            </div>
                            @endif

                            @if(count($banner->getCharacteristics())-1>4)
                            <div class="tp-caption block_theme_color sfb" 
                                data-x="450"  data-hoffset="-70"
                                data-y="278" 
                                data-speed="750" 
                                data-start="2000" 
                                data-easing="easeOutExpo" 
                                data-splitin="none" 
                                data-splitout="none" 
                                data-elementdelay="0.1" 
                                data-endelementdelay="0.1" 
                                data-endspeed="300" 
                                style="z-index: 6; max-width: auto; max-height: auto; white-space: nowrap;">{{ $banner->getCharacteristics()[4] }}  
                            </div>
                            @endif

                            @if(count($banner->getCharacteristics())-1>6)
                            <div class="tp-caption block_black sft" 
                                data-x="400"  data-hoffset="-70"
                                data-y="340" 
                                data-speed="750" 
                                data-start="2300" 
                                data-easing="easeOutExpo" 
                                data-splitin="none" 
                                data-splitout="none" 
                                data-elementdelay="0.1" 
                                data-endelementdelay="0.1" 
                                data-endspeed="300" 
                                style="z-index: 7; max-width: auto; max-height: auto; white-space: nowrap;">{{ $banner->getCharacteristics()[6] }} 
                            </div>
                            @endif

                              <div class="tp-caption customin ltl tp-resizeme"
                                data-x="center"
                                data-y="430"
                                data-customin="x:0;y:150;z:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;"
                                data-speed="800"
                                data-start="1550"
                                data-easing="easeOutQuad"
                                data-splitin="none"
                                data-splitout="none"
                                data-elementdelay="0.01"
                                data-endelementdelay="0.1"
                                data-endspeed="1000"
                                data-endeasing="Power4.easeIn" style="z-index: 10;">
                                <a href="{{ route('front.bussine',[$banner->municipality->city->country->slug,$banner->municipality->city->slug,$banner->municipality->slug,$banner->slug]) }}" class="btn btn-default btn-lg">
                                    <span> {{ trans('app.api.visit') }} </span> 
                                </a>
                            </div>

                        </li>
                            


                        <!-- 
    Cuarto
-->


                        @else
                        
                         <li data-transition="random" data-slotamount="1" data-masterspeed="1000" data-saveperformance="off" data-title="{{ $banner->name }}">

                            <img src="{{ asset('frontend/images/1x1.png') }}" data-lazyload="{{ asset('images/bussines/'.$name.'/'.$banner->pictures[0]->path) }}" alt="" data-bgfit="cover" data-bgposition="center bottom" data-bgrepeat="no-repeat" />

                            <div class="overlay dark-1"><!-- dark overlay [1 to 9 opacity] --></div>

                             
                            @if(count($banner->getCharacteristics())-1>0)
                            <div class="tp-caption mediumlarge_light_white lfb tp-resizeme" 
                                data-x="450" data-hoffset="150"
                                data-y="183" 
                                data-speed="1000" 
                                data-start="1400" 
                                data-easing="easeOutExpo" 
                                data-splitin="none" 
                                data-splitout="none" 
                                data-elementdelay="0.1" 
                                data-endelementdelay="0.1" 
                                data-endspeed="300" 
                                style="z-index: 3; max-width: auto; max-height: auto; white-space: nowrap;">+ {{ $banner->getCharacteristics()[0] }}
                            </div>
                            @endif

                            <div class="tp-caption mediumlarge_light_white lft tp-resizeme" 
                                data-x="500" data-hoffset="70"
                                data-y="135" 
                                data-speed="1000" 
                                data-start="1200" 
                                data-easing="easeOutExpo" 
                                data-splitin="none" 
                                data-splitout="none" 
                                data-elementdelay="0.1" 
                                data-endelementdelay="0.1" 
                                data-endspeed="300" 
                                style="z-index: 4; max-width: auto; max-height: auto; white-space: nowrap;">{{ $banner->name }}
                            </div>

                            @if(count($banner->getCharacteristics())-1>2)
                            <div class="tp-caption block_white sfl tp-resizeme" 
                                data-x="350" 
                                data-y="266" 
                                data-speed="750" 
                                data-start="1900" 
                                data-easing="easeOutExpo" 
                                data-splitin="none" 
                                data-splitout="none" 
                                data-elementdelay="0.1" 
                                data-endelementdelay="0.1" 
                                data-endspeed="300" 
                                style="z-index: 5; max-width: auto; max-height: auto; white-space: nowrap;">+ {{ $banner->getCharacteristics()[2] }}  
                            </div>
                            @endif

                            @if(count($banner->getCharacteristics())-1>4)
                            <div class="tp-caption block_theme_color sfr tp-resizeme" 
                                data-x="300" 
                                data-y="310" 
                                data-speed="750" 
                                data-start="2200" 
                                data-easing="easeOutExpo" 
                                data-splitin="none" 
                                data-splitout="none" 
                                data-elementdelay="0.1" 
                                data-endelementdelay="0.1" 
                                data-endspeed="300" 
                                style="z-index: 6; max-width: auto; max-height: auto; white-space: nowrap;">+ {{ $banner->getCharacteristics()[4] }}  
                            </div>
                            @endif

                            @if(count($banner->getCharacteristics())-1>6)
                            <div class="tp-caption block_white sfb tp-resizeme" 
                                data-x="350" 
                                data-y="356" 
                                data-speed="750" 
                                data-start="2500" 
                                data-easing="easeOutExpo" 
                                data-splitin="none" 
                                data-splitout="none" 
                                data-elementdelay="0.1" 
                                data-endelementdelay="0.1" 
                                data-endspeed="300" 
                                style="z-index: 7; max-width: auto; max-height: auto; white-space: nowrap;">+ {{ $banner->getCharacteristics()[6] }}  
                            </div>
                            @endif

                             <div class="tp-caption customin ltl tp-resizeme"
                                data-x="center"
                                data-y="430"
                                data-customin="x:0;y:150;z:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;"
                                data-speed="800"
                                data-start="1550"
                                data-easing="easeOutQuad"
                                data-splitin="none"
                                data-splitout="none"
                                data-elementdelay="0.01"
                                data-endelementdelay="0.1"
                                data-endspeed="1000"
                                data-endeasing="Power4.easeIn" style="z-index: 10;">
                                <a href="{{ route('front.bussine',[$banner->municipality->city->country->slug,$banner->municipality->city->slug,$banner->municipality->slug,$banner->slug]) }}" class="btn btn-default btn-lg">
                                    <span> {{ trans('app.api.visit') }} </span> 
                                </a>
                            </div>

                        </li>                                   
                        
                        @endif  
                        @endif  
                    @empty
                    @endforelse

                    </ul>

                    <div class="tp-bannertimer"><!-- progress bar --></div>
                </div>
            </div>
            <!-- /REVOLUTION SLIDER -->