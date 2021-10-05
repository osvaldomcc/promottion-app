<!DOCTYPE html>
<!--[if IE 8]>          <html class="ie ie8"> <![endif]-->
<!--[if IE 9]>          <html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->  <html> <!--<![endif]-->
    <head>
        <meta charset="utf-8" />
        <title>I'M COMING</title>
        <meta name="keywords" content="I'AM COMING CUBA,VIAJE,TRIP,FLY,FUN,ENJOY,TRAVEL" />
        <meta name="description" content="I'AM COMING CUBA,VIAJE,TRIP,FLY,FUN,ENJOY,TRAVEL" />
        <meta name="Author" content="Osvaldo Miguel Castillo Calderón" />

        <!-- mobile settings -->
        <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />
        <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->

        <!-- CORE CSS -->
        <link href="{{ asset('frontend/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />

        <!-- REVOLUTION SLIDER -->
        <link href="{{ asset('frontend/plugins/slider.revolution/css/extralayers.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('frontend/plugins/slider.revolution/css/settings.css') }}" rel="stylesheet" type="text/css" />

        <!-- THEME CSS -->
        <link href="{{ asset('frontend/css/essentials.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('frontend/css/layout.css') }}" rel="stylesheet" type="text/css" />

        <!-- PAGE LEVEL SCRIPTS -->
        <link href="{{ asset('frontend/css/header-1.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('frontend/css/color_scheme/green.css') }}" rel="stylesheet" type="text/css" id="color_scheme" />
        <link href="{{ asset('frontend/css/mine.css') }}" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" id="theme" href="{{ asset('backend/css/sweetalert.css') }}"/>
    </head>

    <!--
        AVAILABLE BODY CLASSES:
        
        smoothscroll            = create a browser smooth scroll
        enable-animation        = enable WOW animations

        bg-grey                 = grey background
        grain-grey              = grey grain background
        grain-blue              = blue grain background
        grain-green             = green grain background
        grain-blue              = blue grain background
        grain-orange            = orange grain background
        grain-yellow            = yellow grain background
        
        boxed                   = boxed layout
        pattern1 ... patern11   = pattern background
        menu-vertical-hide      = hidden, open on click
        
        BACKGROUND IMAGE [together with .boxed class]
        data-background="assets/images/boxed_background/1.jpg"
    -->
    <body class="enable-animation smoothscroll">

        


        <!-- wrapper -->
        <div id="wrapper">

            <!-- Top Bar -->
            <div id="topBar">
                <div class="container" style="width: 100%;">

                  @if(Auth::user())
                      <!-- right -->
                    <ul class="top-links list-inline pull-right">
                        <li>
                            <a class="dropdown-toggle no-text-underline" data-toggle="dropdown" href="#"><i class="text-welcome fa fa-user "></i><span class="hidden-xs">{{ trans('app.api.hola') }} </span> imcc,<strong>{{ Auth::user()->name }}</strong></a>
                            <ul class="dropdown-menu pull-right" style="width:100%">
                                <li><a tabindex="-1" href="{{ route('front.perfil') }}"><i class="fa fa-cog"></i> {{ trans('app.api.perfil') }}</a></li>
                                <li class="divider"></li>
                                <li><a tabindex="-1" href="{{ url('/logout') }}"><i class="glyphicon glyphicon-off"></i> {{ trans('app.api.salir') }}</a></li>
                            </ul>
                        </li>
                    </ul>
                  @endif

                  @if(Auth::guest())

                    <ul class="top-links list-inline pull-right">
                        
                        <li>
                            <a class="dropdown-toggle no-text-underline" href="{{ url('/login') }}"><i class="fa fa-lock hidden-xs"></i> {{ trans('app.api.login') }}</a>
                            
                        </li>
                    </ul>
                    @endif


                    <!-- left -->
                    <ul class="top-links list-inline">
                        <li style=""><a href="{{ route('front.contacto') }}">{{ trans('app.api.contacto') }}</a></li>
                        <li>
                            @if(App::getLocale()=='es')
                            <a class="dropdown-toggle no-text-underline c" data-toggle="dropdown" href="#"><img class="flag-lang" src="{{ asset('frontend/images/flags/es.png') }}" width="16" height="11" alt="lang" /> {{ trans('app.api.es') }}</a>
                            @else
                            <a class="dropdown-toggle no-text-underline c" data-toggle="dropdown" href="#"><img class="flag-lang" src="{{ asset('frontend/images/flags/us.png') }}" width="16" height="11" alt="lang" /> {{ trans('app.api.en') }}</a>
                            @endif
                            <ul class="dropdown-langs dropdown-menu">
                                <li>
                                    <a tabindex="-1" href="{{ route('front.lang',['en']) }}" class="f"><img class="flag-lang" src="{{ asset('frontend/images/flags/us.png') }}" width="16" height="11" alt="lang" /> {{ trans('app.api.en') }}</a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a tabindex="-1" href="{{ route('front.lang',['es']) }}" class="f"><img class="flag-lang" src="{{ asset('frontend/images/flags/es.png') }}" width="16" height="11" alt="lang" /> {{ trans('app.api.es') }}</a>
                                </li>
                            </ul>
                        </li>
                    </ul>

                </div>
            </div>
            <!-- /Top Bar -->


            <!-- 
                AVAILABLE HEADER CLASSES

                Default nav height: 96px
                .header-md      = 70px nav height
                .header-sm      = 60px nav height

                .noborder       = remove bottom border (only with transparent use)
                .transparent    = transparent header
                .translucent    = translucent header
                .sticky         = sticky header
                .static         = static header
                .dark           = dark header
                .bottom         = header on bottom
                
                shadow-before-1 = shadow 1 header top
                shadow-after-1  = shadow 1 header bottom
                shadow-before-2 = shadow 2 header top
                shadow-after-2  = shadow 2 header bottom
                shadow-before-3 = shadow 3 header top
                shadow-after-3  = shadow 3 header bottom

                .clearfix       = required for mobile menu, do not remove!

                Example Usage:  class="clearfix sticky header-sm transparent noborder"
            -->
            <div id="header" class="sticky shadow-after-3 clearfix">

                <!-- TOP NAV -->
                <header id="topNav">
                    <div class="container" style="width: 100%;">

                    @if(url('/login')!=Request()->url())
                    @php
                        $url=Request()->session()->get('_previous')['url'];
                        $urlact=Request()->url();
                    @endphp
                     <ul class="pull-right nav nav-pills nav-second-main {{ route('front')==Request()->url() ? 'hidden' : '' }}">
                                <li class="search">
                                    <a href="javascript:history.back();">
                                        <i class="fa fa-reply"></i> {{ trans('app.api.regresar') }}
                                    </a>
                                </li>
                        </ul>
                        @endif

               @if(url('/login')!=Request()->url())
                    @if(url('/register')!=Request()->url())
                        @if(url('/password/reset')!=Request()->url())
                         
                                         


                        <!-- Mobile Menu Button -->
                        <button class="btn btn-mobile" data-toggle="collapse" data-target=".nav-main-collapse">
                            <i class="fa fa-bars"></i>
                        </button>

                        <!-- BUTTONS -->
                        <ul class="pull-right nav nav-pills nav-second-main">

                            <!-- SEARCH -->
                     
                                    <li class="search">
                                        <a href="javascript:;">
                                            <i class="fa fa-search"></i>
                                        </a>
                                        <div class="search-box">
                                            {!! Form::open(['route'=>'search','method'=>'GET']) !!}
                                                <div class="input-group">
                                                    @if(App::getLocale()=='es')
                                                        {!! Form::text('name',null,['placeholder'=>'País o Ciudad','class'=>'form-control']) !!}
                                                    @else
                                                        {!! Form::text('name',null,['placeholder'=>'Country or City','class'=>'form-control']) !!}
                                                    @endif
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-primary" type="submit">{{ trans('app.api.search') }}</button>
                                                    </span>
                                                </div>
                                            {!! Form::close() !!}
                                        </div> 
                                    </li>
                            @endif
                        @endif
                    @endif
                            <!-- /SEARCH -->


                        </ul>
                        <!-- /BUTTONS -->

                      


                        <!-- Logo -->
                        <a class="logo pull-left" href="{{ url('/') }}">
                            <img src="{{ asset('frontend/images/plane.png') }}" alt=""  />
                        </a>

                        <!-- 
                            Top Nav 
                            
                            AVAILABLE CLASSES:
                            submenu-dark = dark sub menu
                        -->
                        <div class="navbar-collapse pull-right nav-main-collapse collapse submenu-dark">
                            <nav class="nav-main">

                                <!--
                                    NOTE
                                    
                                    For a regular link, remove "dropdown" class from LI tag and "dropdown-toggle" class from the href.
                                    Direct Link Example: 

                                    <li>
                                        <a href="#">HOME</a>
                                    </li>
                                -->
                                @yield('categorias')

                            </nav>
                        </div>

                    </div>
                </header>
                <!-- /Top Nav -->

            </div>



           @yield('revolution')



            @yield('content')

            




            <!-- FOOTER -->
            <footer id="footer">
                <div class="container">

                    <div class="row">
                        
                        <div class="col-md-4">
                            <!-- Footer Logo -->
                            
                                <h3>
                                I'M COMING  &nbsp;
                                <img class="hidden" src="{{ asset('frontend/images/flags/cu.png') }}" alt="Cuba" />
                                </h3>

                            

                            <!-- Small Description -->
                            <p>{{ trans('app.api.title') }}.</p>

                            <!-- Contact Address -->
                            <address>
                                <ul class="list-unstyled">
                                    <li class="footer-sprite address">
                                        PO Box 21132<br>
                                        Here Weare St, Melbourne<br>
                                        Vivas 2355 Australia<br>
                                    </li>
                                    <li class="footer-sprite phone">
                                        {{ trans('app.api.tel') }}: 1-800-565-2390
                                    </li>
                                    <li class="footer-sprite email">
                                        <a href="mailto:imcoming@gmail.com">imcoming@gmail.com</a>
                                    </li>
                                </ul>
                            </address>
                            <!-- /Contact Address -->

                        </div>

                        <div class="col-md-4">

                            <!-- Latest Blog Post -->
                            <h4 class="letter-spacing-1">{{ trans('app.api.last') }}</h4>
                            <ul class="footer-posts list-unstyled">
                                @forelse($lastnews as $last)
                                    <li>
                                        <a href="{{ route('front.bussine',[$last->municipality->city->country->slug,$last->municipality->city->slug,$last->municipality->slug,$last->slug]) }}">{{ $last->name }}</a>
                                        <small>{{ $last->created_at->format('d/m/Y') }}</small>
                                    </li>
                                @empty
                                @endforelse
                            </ul>
                            <!-- /Latest Blog Post -->

                        </div>

                      

                        <div class="col-md-4">

                            <!-- Newsletter Form -->
                            <h4 class="letter-spacing-1">{{ trans('app.api.touch') }}</h4>
                            

                            
                            <!-- /Newsletter Form -->

                            <!-- Social Icons -->
                            <div class="margin-top-20">
                                <a href="#" class="social-icon social-icon-border social-facebook pull-left" data-toggle="tooltip" data-placement="top" title="Facebook">

                                    <i class="icon-facebook"></i>
                                    <i class="icon-facebook"></i>
                                </a>

                                <a href="#" class="social-icon social-icon-border social-twitter pull-left" data-toggle="tooltip" data-placement="top" title="Twitter">
                                    <i class="icon-twitter"></i>
                                    <i class="icon-twitter"></i>
                                </a>

                                <a href="#" class="social-icon social-icon-border social-youtube pull-left" data-toggle="tooltip" data-placement="top" title="Youtube">
                                    <i class="icon-youtube"></i>
                                    <i class="icon-youtube"></i>
                                </a>

                                <a href="#" class="social-icon social-icon-border social-instagram pull-left" data-toggle="tooltip" data-placement="top" title="Instagram">
                                    <i class="icon-instagram"></i>
                                    <i class="icon-instagram"></i>
                                </a>

                                                    
                            </div>
                            <!-- /Social Icons -->

                        </div>

                    </div>

                </div>

                <div class="copyright">
                    <div class="container">
                        <ul class="pull-right nomargin list-inline mobile-block">
                            <li id="terms-agree-dos"><a>{{ trans('app.api.term') }} &amp; {{ trans('app.api.con') }}</a></li>
                            <li>&bull;</li>
                            <li id="terms-privacity"><a>{{ trans('app.api.privacy') }}</a></li>
                        </ul>
                        &copy; {{ trans('app.api.reserv') }}, <strong> I'M COMING CUBA</strong>
                    </div>
                </div>
            </footer>
            <!-- /FOOTER -->

        </div>
        <!-- /wrapper -->


                              <!-- MODAL -->
            <div class="modal fade" id="termsModalDos" tabindex="-1" role="dialog" aria-labelledby="myModal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                &times;
                            </button>
                            <h4 class="modal-title" id="myModal">{{ trans('app.api.term') }} &amp; {{ trans('app.api.con') }}</h4>
                        </div>

                        <div class="modal-body modal-short">
                            <h4><b>Introduction</b></h4>
                            <p>These terms and conditions govern your use of this website; by using this website, you accept these terms and conditions in full.   If you disagree with these terms and conditions or any part of these terms and conditions, you must not use this website.</p>
                            <p>[You must be at least [18] years of age to use this website.  By using this website [and by agreeing to these terms and conditions] you warrant and represent that you are at least [18] years of age.]</p>


                            <h4><strong>License to use website</strong></h4>
                            <p>Unless otherwise stated, [NAME] and/or its licensors own the intellectual property rights in the website and material on the website.  Subject to the license below, all these intellectual property rights are reserved.</p>
                            <p>You may view, download for caching purposes only, and print pages [or [OTHER CONTENT]] from the website for your own personal use, subject to the restrictions set out below and elsewhere in these terms and conditions.</p>
                            <p>You must not:</p>
                            <ul>
                                <li>republish material from this website (including republication on another website);</li>
                                <li>sell, rent or sub-license material from the website;</li>
                                <li>show any material from the website in public;</li>
                                <li>reproduce, duplicate, copy or otherwise exploit material on this website for a commercial purpose;]</li>
                                <li>[edit or otherwise modify any material on the website; or]</li>
                                <li>[redistribute material from this website [except for content specifically and expressly made available for redistribution].]</li>
                            </ul>
                            <p>[Where content is specifically made available for redistribution, it may only be redistributed [within your organisation].]</p>

                            <h4><strong>Acceptable use</strong></h4>
                            <p>You must not use this website in any way that causes, or may cause, damage to the website or impairment of the availability or accessibility of the website; or in any way which is unlawful, illegal, fraudulent or harmful, or in connection with any unlawful, illegal, fraudulent or harmful purpose or activity.</p>
                            <p>You must not use this website to copy, store, host, transmit, send, use, publish or distribute any material which consists of (or is linked to) any spyware, computer virus, Trojan horse, worm, keystroke logger, rootkit or other malicious computer software.</p>
                            <p>You must not conduct any systematic or automated data collection activities (including without limitation scraping, data mining, data extraction and data harvesting) on or in relation to this website without [NAME'S] express written consent.</p>
                            <p>[You must not use this website to transmit or send unsolicited commercial communications.]</p>
                            <p>[You must not use this website for any purposes related to marketing without [NAME'S] express written consent.]</p>

                            <h4><strong>Restricted access</strong></h4>
                            <p>[Access to certain areas of this website is restricted.]  [NAME] reserves the right to restrict access to [other] areas of this website, or indeed this entire website, at [NAME'S] discretion.</p>
                            <p>If [NAME] provides you with a user ID and password to enable you to access restricted areas of this website or other content or services, you must ensure that the user ID and password are kept confidential.</p>
                            <p>[[NAME] may disable your user ID and password in [NAME'S] sole discretion without notice or explanation.]</p>

                            <h4><strong>User content</strong></h4>
                            <p>In these terms and conditions, "your user content" means material (including without limitation text, images, audio material, video material and audio-visual material) that you submit to this website, for whatever purpose.</p>
                            <p>You grant to [NAME] a worldwide, irrevocable, non-exclusive, royalty-free license to use, reproduce, adapt, publish, translate and distribute your user content in any existing or future media.  You also grant to [NAME] the right to sub-license these rights, and the right to bring an action for infringement of these rights.</p>
                            <p>Your user content must not be illegal or unlawful, must not infringe any third party's legal rights, and must not be capable of giving rise to legal action whether against you or [NAME] or a third party (in each case under any applicable law).</p>
                            <p>You must not submit any user content to the website that is or has ever been the subject of any threatened or actual legal proceedings or other similar complaint.</p>
                            <p>[NAME] reserves the right to edit or remove any material submitted to this website, or stored on [NAME'S] servers, or hosted or published upon this website.</p>
                            <p>[Notwithstanding [NAME'S] rights under these terms and conditions in relation to user content, [NAME] does not undertake to monitor the submission of such content to, or the publication of such content on, this website.]</p>

                            <h4><strong>No warranties</strong></h4>
                            <p>This website is provided "as is" without any representations or warranties, express or implied.  [NAME] makes no representations or warranties in relation to this website or the information and materials provided on this website.</p>
                            <p>Without prejudice to the generality of the foregoing paragraph, [NAME] does not warrant that:</p>
                            <ul>
                                <li>this website will be constantly available, or available at all; or</li>
                                <li>the information on this website is complete, true, accurate or non-misleading.</li>
                            </ul>
                            <p>Nothing on this website constitutes, or is meant to constitute, advice of any kind.  [If you require advice in relation to any [legal, financial or medical] matter you should consult an appropriate professional.]</p>

                            <h4><strong>Limitations of liability</strong></h4>
                            <p>[NAME] will not be liable to you (whether under the law of contact, the law of torts or otherwise) in relation to the contents of, or use of, or otherwise in connection with, this website:</p>
                            <ul>
                                <li>[to the extent that the website is provided free-of-charge, for any direct loss;]</li>
                                <li>for any indirect, special or consequential loss; or</li>
                                <li>for any business losses, loss of revenue, income, profits or anticipated savings, loss of contracts or business relationships, loss of reputation or goodwill, or loss or corruption of information or data.</li>
                            </ul>
                            <p>These limitations of liability apply even if [NAME] has been expressly advised of the potential loss.</p>

                            <h4><strong>Exceptions</strong></h4>
                            <p>Nothing in this website disclaimer will exclude or limit any warranty implied by law that it would be unlawful to exclude or limit; and nothing in this website disclaimer will exclude or limit [NAME'S] liability in respect of any:</p>
                            <ul>
                                <li>death or personal injury caused by [NAME'S] negligence;</li>
                                <li>fraud or fraudulent misrepresentation on the part of [NAME]; or</li>
                                <li>matter which it would be illegal or unlawful for [NAME] to exclude or limit, or to attempt or purport to exclude or limit, its liability.</li>
                            </ul>

                            <h4><strong>Reasonableness</strong></h4>
                            <p>By using this website, you agree that the exclusions and limitations of liability set out in this website disclaimer are reasonable.</p>
                            <p>If you do not think they are reasonable, you must not use this website.</p>

                            <h4><strong>Other parties</strong></h4>
                            <p>[You accept that, as a limited liability entity, [NAME] has an interest in limiting the personal liability of its officers and employees.  You agree that you will not bring any claim personally against [NAME'S] officers or employees in respect of any losses you suffer in connection with the website.]</p>
                            <p>[Without prejudice to the foregoing paragraph,] you agree that the limitations of warranties and liability set out in this website disclaimer will protect [NAME'S] officers, employees, agents, subsidiaries, successors, assigns and sub-contractors as well as [NAME].</p>

                            <h4><strong>Unenforceable provisions</strong></h4>
                            <p>If any provision of this website disclaimer is, or is found to be, unenforceable under applicable law, that will not affect the enforceability of the other provisions of this website disclaimer.</p>

                            <h4><strong>Indemnity</strong></h4>
                            <p>You hereby indemnify [NAME] and undertake to keep [NAME] indemnified against any losses, damages, costs, liabilities and expenses (including without limitation legal expenses and any amounts paid by [NAME] to a third party in settlement of a claim or dispute on the advice of [NAME'S] legal advisers) incurred or suffered by [NAME] arising out of any breach by you of any provision of these terms and conditions[, or arising out of any claim that you have breached any provision of these terms and conditions].</p>

                            <h4><strong>Breaches of these terms and conditions</strong></h4>
                            <p>Without prejudice to [NAME'S] other rights under these terms and conditions, if you breach these terms and conditions in any way, [NAME] may take such action as [NAME] deems appropriate to deal with the breach, including suspending your access to the website, prohibiting you from accessing the website, blocking computers using your IP address from accessing the website, contacting your internet service provider to request that they block your access to the website and/or bringing court proceedings against you.</p>

                            <h4><strong>Variation</strong></h4>
                            <p>[NAME] may revise these terms and conditions from time-to-time.  Revised terms and conditions will apply to the use of this website from the date of the publication of the revised terms and conditions on this website.  Please check this page regularly to ensure you are familiar with the current version.</p>

                            <h4><strong>Assignment</strong></h4>
                            <p>[NAME] may transfer, sub-contract or otherwise deal with [NAME'S] rights and/or obligations under these terms and conditions without notifying you or obtaining your consent.</p>
                            <p>You may not transfer, sub-contract or otherwise deal with your rights and/or obligations under these terms and conditions.</p>

                            <h4><strong>Severability</strong></h4>
                            <p>If a provision of these terms and conditions is determined by any court or other competent authority to be unlawful and/or unenforceable, the other provisions will continue in effect.  If any unlawful and/or unenforceable provision would be lawful or enforceable if part of it were deleted, that part will be deemed to be deleted, and the rest of the provision will continue in effect.</p>

                            <h4><strong>Entire agreement</strong></h4>
                            <p>These terms and conditions [, together with [DOCUMENTS],] constitute the entire agreement between you and [NAME] in relation to your use of this website, and supersede all previous agreements in respect of your use of this website.</p>

                            <h4><strong>Law and jurisdiction</strong></h4>
                            <p>These terms and conditions will be governed by and construed in accordance with [GOVERNING LAW], and any disputes relating to these terms and conditions will be subject to the [non-]exclusive jurisdiction of the courts of [JURISDICTION].</p>

                            <h4><strong>About these website terms and conditions</strong></h4>
                            <p>
                                We created these website terms and conditions with the help of a free website terms and conditions form developed by Contractology and available at <a href="#">www.yourwebsite.com</a>.
                                Contractology supply a wide variety of commercial legal documents, such as <a href="#">template data protection statements</a>.
                            </p>

                            <h4><strong>Registrations and authorisations</strong></h4>
                            <p>[[NAME] is registered with [TRADE REGISTER].  You can find the online version of the register at [URL].  [NAME'S] registration number is [NUMBER].]</p>
                            <p>[[NAME] is subject to [AUTHORISATION SCHEME], which is supervised by [SUPERVISORY AUTHORITY].]</p>
                            <p>[[NAME] is registered with [PROFESSIONAL BODY].  [NAME'S] professional title is [TITLE] and it has been granted in [JURISDICTION].  [NAME] is subject to the [RULES] which can be found at [URL].]</p>
                            <p>[[NAME] subscribes to the following code[s] of conduct: [CODE(S) OF CONDUCT].  [These codes/this code] can be consulted electronically at [URL(S)].</p>
                            <p>[[NAME'S] [TAX] number is [NUMBER].]]</p>

                            <h4><strong>[NAME'S] details</strong></h4>
                            <p>The full name of [NAME] is [FULL NAME].</p>
                            <p>[[NAME] is registered in [JURISDICTION] under registration number [NUMBER].]</p>
                            <p>[NAME'S] [registered] address is [ADDRESS].</p>
                            <p>You can contact [NAME] by email to [EMAIL].</p>


                            <p class="margin-top30">
                                <strong>By using this  WEBSITE TERMS AND CONDITIONS template document, you agree to the 
                                <a href="#">terms and conditions</a> set out on 
                                <a href="#">yourdomain.com</a>.  You must retain the credit 
                                set out in the section headed "ABOUT THESE WEBSITE TERMS AND CONDITIONS".  Subject to the licensing restrictions, you should 
                                edit the document, adapting it to the requirements of your jurisdiction, your business and your 
                                website.  If you are not a lawyer, we recommend that you take professional legal advice in relation to the editing and 
                                use of the template.</strong>
                            </p>


                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-check"></i> OK </button>
                            
                            <a href="{{ route('front.imprimir') }}" target="_blank" rel="nofollow" class="btn btn-danger pull-left"><i class="fa fa-print"></i><span class="hidden-xs">{{ trans('app.api.imp') }}</span></a>
                        </div>

                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div>
            <!-- /MODAL -->



              <!-- MODAL -->
            <div class="modal fade" id="termsModalTres" tabindex="-1" role="dialog" aria-labelledby="myModal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                &times;
                            </button>
                            <h4 class="modal-title" id="myModal">{{ trans('app.api.privacy') }}</h4>
                        </div>

                        <div class="modal-body modal-short">
                            <h4><b>Introduction</b></h4>
                            <p>These terms and conditions govern your use of this website; by using this website, you accept these terms and conditions in full.   If you disagree with these terms and conditions or any part of these terms and conditions, you must not use this website.</p>
                            <p>[You must be at least [18] years of age to use this website.  By using this website [and by agreeing to these terms and conditions] you warrant and represent that you are at least [18] years of age.]</p>


                            <h4><strong>License to use website</strong></h4>
                            <p>Unless otherwise stated, [NAME] and/or its licensors own the intellectual property rights in the website and material on the website.  Subject to the license below, all these intellectual property rights are reserved.</p>
                            <p>You may view, download for caching purposes only, and print pages [or [OTHER CONTENT]] from the website for your own personal use, subject to the restrictions set out below and elsewhere in these terms and conditions.</p>
                            <p>You must not:</p>
                            <ul>
                                <li>republish material from this website (including republication on another website);</li>
                                <li>sell, rent or sub-license material from the website;</li>
                                <li>show any material from the website in public;</li>
                                <li>reproduce, duplicate, copy or otherwise exploit material on this website for a commercial purpose;]</li>
                                <li>[edit or otherwise modify any material on the website; or]</li>
                                <li>[redistribute material from this website [except for content specifically and expressly made available for redistribution].]</li>
                            </ul>
                            <p>[Where content is specifically made available for redistribution, it may only be redistributed [within your organisation].]</p>

                            <h4><strong>Acceptable use</strong></h4>
                            <p>You must not use this website in any way that causes, or may cause, damage to the website or impairment of the availability or accessibility of the website; or in any way which is unlawful, illegal, fraudulent or harmful, or in connection with any unlawful, illegal, fraudulent or harmful purpose or activity.</p>
                            <p>You must not use this website to copy, store, host, transmit, send, use, publish or distribute any material which consists of (or is linked to) any spyware, computer virus, Trojan horse, worm, keystroke logger, rootkit or other malicious computer software.</p>
                            <p>You must not conduct any systematic or automated data collection activities (including without limitation scraping, data mining, data extraction and data harvesting) on or in relation to this website without [NAME'S] express written consent.</p>
                            <p>[You must not use this website to transmit or send unsolicited commercial communications.]</p>
                            <p>[You must not use this website for any purposes related to marketing without [NAME'S] express written consent.]</p>

                            <h4><strong>Restricted access</strong></h4>
                            <p>[Access to certain areas of this website is restricted.]  [NAME] reserves the right to restrict access to [other] areas of this website, or indeed this entire website, at [NAME'S] discretion.</p>
                            <p>If [NAME] provides you with a user ID and password to enable you to access restricted areas of this website or other content or services, you must ensure that the user ID and password are kept confidential.</p>
                            <p>[[NAME] may disable your user ID and password in [NAME'S] sole discretion without notice or explanation.]</p>

                            <h4><strong>User content</strong></h4>
                            <p>In these terms and conditions, "your user content" means material (including without limitation text, images, audio material, video material and audio-visual material) that you submit to this website, for whatever purpose.</p>
                            <p>You grant to [NAME] a worldwide, irrevocable, non-exclusive, royalty-free license to use, reproduce, adapt, publish, translate and distribute your user content in any existing or future media.  You also grant to [NAME] the right to sub-license these rights, and the right to bring an action for infringement of these rights.</p>
                            <p>Your user content must not be illegal or unlawful, must not infringe any third party's legal rights, and must not be capable of giving rise to legal action whether against you or [NAME] or a third party (in each case under any applicable law).</p>
                            <p>You must not submit any user content to the website that is or has ever been the subject of any threatened or actual legal proceedings or other similar complaint.</p>
                            <p>[NAME] reserves the right to edit or remove any material submitted to this website, or stored on [NAME'S] servers, or hosted or published upon this website.</p>
                            <p>[Notwithstanding [NAME'S] rights under these terms and conditions in relation to user content, [NAME] does not undertake to monitor the submission of such content to, or the publication of such content on, this website.]</p>

                            <h4><strong>No warranties</strong></h4>
                            <p>This website is provided "as is" without any representations or warranties, express or implied.  [NAME] makes no representations or warranties in relation to this website or the information and materials provided on this website.</p>
                            <p>Without prejudice to the generality of the foregoing paragraph, [NAME] does not warrant that:</p>
                            <ul>
                                <li>this website will be constantly available, or available at all; or</li>
                                <li>the information on this website is complete, true, accurate or non-misleading.</li>
                            </ul>
                            <p>Nothing on this website constitutes, or is meant to constitute, advice of any kind.  [If you require advice in relation to any [legal, financial or medical] matter you should consult an appropriate professional.]</p>

                            <h4><strong>Limitations of liability</strong></h4>
                            <p>[NAME] will not be liable to you (whether under the law of contact, the law of torts or otherwise) in relation to the contents of, or use of, or otherwise in connection with, this website:</p>
                            <ul>
                                <li>[to the extent that the website is provided free-of-charge, for any direct loss;]</li>
                                <li>for any indirect, special or consequential loss; or</li>
                                <li>for any business losses, loss of revenue, income, profits or anticipated savings, loss of contracts or business relationships, loss of reputation or goodwill, or loss or corruption of information or data.</li>
                            </ul>
                            <p>These limitations of liability apply even if [NAME] has been expressly advised of the potential loss.</p>

                            <h4><strong>Exceptions</strong></h4>
                            <p>Nothing in this website disclaimer will exclude or limit any warranty implied by law that it would be unlawful to exclude or limit; and nothing in this website disclaimer will exclude or limit [NAME'S] liability in respect of any:</p>
                            <ul>
                                <li>death or personal injury caused by [NAME'S] negligence;</li>
                                <li>fraud or fraudulent misrepresentation on the part of [NAME]; or</li>
                                <li>matter which it would be illegal or unlawful for [NAME] to exclude or limit, or to attempt or purport to exclude or limit, its liability.</li>
                            </ul>

                            <h4><strong>Reasonableness</strong></h4>
                            <p>By using this website, you agree that the exclusions and limitations of liability set out in this website disclaimer are reasonable.</p>
                            <p>If you do not think they are reasonable, you must not use this website.</p>

                            <h4><strong>Other parties</strong></h4>
                            <p>[You accept that, as a limited liability entity, [NAME] has an interest in limiting the personal liability of its officers and employees.  You agree that you will not bring any claim personally against [NAME'S] officers or employees in respect of any losses you suffer in connection with the website.]</p>
                            <p>[Without prejudice to the foregoing paragraph,] you agree that the limitations of warranties and liability set out in this website disclaimer will protect [NAME'S] officers, employees, agents, subsidiaries, successors, assigns and sub-contractors as well as [NAME].</p>

                            <h4><strong>Unenforceable provisions</strong></h4>
                            <p>If any provision of this website disclaimer is, or is found to be, unenforceable under applicable law, that will not affect the enforceability of the other provisions of this website disclaimer.</p>

                            <h4><strong>Indemnity</strong></h4>
                            <p>You hereby indemnify [NAME] and undertake to keep [NAME] indemnified against any losses, damages, costs, liabilities and expenses (including without limitation legal expenses and any amounts paid by [NAME] to a third party in settlement of a claim or dispute on the advice of [NAME'S] legal advisers) incurred or suffered by [NAME] arising out of any breach by you of any provision of these terms and conditions[, or arising out of any claim that you have breached any provision of these terms and conditions].</p>

                            <h4><strong>Breaches of these terms and conditions</strong></h4>
                            <p>Without prejudice to [NAME'S] other rights under these terms and conditions, if you breach these terms and conditions in any way, [NAME] may take such action as [NAME] deems appropriate to deal with the breach, including suspending your access to the website, prohibiting you from accessing the website, blocking computers using your IP address from accessing the website, contacting your internet service provider to request that they block your access to the website and/or bringing court proceedings against you.</p>

                            <h4><strong>Variation</strong></h4>
                            <p>[NAME] may revise these terms and conditions from time-to-time.  Revised terms and conditions will apply to the use of this website from the date of the publication of the revised terms and conditions on this website.  Please check this page regularly to ensure you are familiar with the current version.</p>

                            <h4><strong>Assignment</strong></h4>
                            <p>[NAME] may transfer, sub-contract or otherwise deal with [NAME'S] rights and/or obligations under these terms and conditions without notifying you or obtaining your consent.</p>
                            <p>You may not transfer, sub-contract or otherwise deal with your rights and/or obligations under these terms and conditions.</p>

                            <h4><strong>Severability</strong></h4>
                            <p>If a provision of these terms and conditions is determined by any court or other competent authority to be unlawful and/or unenforceable, the other provisions will continue in effect.  If any unlawful and/or unenforceable provision would be lawful or enforceable if part of it were deleted, that part will be deemed to be deleted, and the rest of the provision will continue in effect.</p>

                            <h4><strong>Entire agreement</strong></h4>
                            <p>These terms and conditions [, together with [DOCUMENTS],] constitute the entire agreement between you and [NAME] in relation to your use of this website, and supersede all previous agreements in respect of your use of this website.</p>

                            <h4><strong>Law and jurisdiction</strong></h4>
                            <p>These terms and conditions will be governed by and construed in accordance with [GOVERNING LAW], and any disputes relating to these terms and conditions will be subject to the [non-]exclusive jurisdiction of the courts of [JURISDICTION].</p>

                            <h4><strong>About these website terms and conditions</strong></h4>
                            <p>
                                We created these website terms and conditions with the help of a free website terms and conditions form developed by Contractology and available at <a href="#">www.yourwebsite.com</a>.
                                Contractology supply a wide variety of commercial legal documents, such as <a href="#">template data protection statements</a>.
                            </p>

                            <h4><strong>Registrations and authorisations</strong></h4>
                            <p>[[NAME] is registered with [TRADE REGISTER].  You can find the online version of the register at [URL].  [NAME'S] registration number is [NUMBER].]</p>
                            <p>[[NAME] is subject to [AUTHORISATION SCHEME], which is supervised by [SUPERVISORY AUTHORITY].]</p>
                            <p>[[NAME] is registered with [PROFESSIONAL BODY].  [NAME'S] professional title is [TITLE] and it has been granted in [JURISDICTION].  [NAME] is subject to the [RULES] which can be found at [URL].]</p>
                            <p>[[NAME] subscribes to the following code[s] of conduct: [CODE(S) OF CONDUCT].  [These codes/this code] can be consulted electronically at [URL(S)].</p>
                            <p>[[NAME'S] [TAX] number is [NUMBER].]]</p>

                            <h4><strong>[NAME'S] details</strong></h4>
                            <p>The full name of [NAME] is [FULL NAME].</p>
                            <p>[[NAME] is registered in [JURISDICTION] under registration number [NUMBER].]</p>
                            <p>[NAME'S] [registered] address is [ADDRESS].</p>
                            <p>You can contact [NAME] by email to [EMAIL].</p>


                            <p class="margin-top30">
                                <strong>By using this  WEBSITE TERMS AND CONDITIONS template document, you agree to the 
                                <a href="#">terms and conditions</a> set out on 
                                <a href="#">yourdomain.com</a>.  You must retain the credit 
                                set out in the section headed "ABOUT THESE WEBSITE TERMS AND CONDITIONS".  Subject to the licensing restrictions, you should 
                                edit the document, adapting it to the requirements of your jurisdiction, your business and your 
                                website.  If you are not a lawyer, we recommend that you take professional legal advice in relation to the editing and 
                                use of the template.</strong>
                            </p>


                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-check"></i> OK </button>
                            
                            <a href="{{ route('front.imprimirpriv') }}" target="_blank" rel="nofollow" class="btn btn-danger pull-left"><i class="fa fa-print"></i><span class="hidden-xs">{{ trans('app.api.imp') }}</span></a>
                        </div>

                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div>
            <!-- /MODAL -->


        <!-- SCROLL TO TOP -->
        <a href="#" id="toTop"></a>


        <!-- PRELOADER -->
        <div id="preloader">
            <div class="inner">
                <span class="loader"></span>
            </div>
        </div><!-- /PRELOADER -->


        <!-- JAVASCRIPT FILES -->
        
        <script type="text/javascript">var plugin_path = "{{ asset('frontend/plugins').'/' }}";</script>
        <script type="text/javascript" src="{{ asset('frontend/plugins/jquery/jquery-2.1.4.min.js') }}"></script>

        <script type="text/javascript" src="{{ asset('frontend/js/scripts.js') }}"></script>
        <script type="text/javascript" src="{{ asset('backend/js/sweetalert.min.js') }}"></script>
        

        <!-- REVOLUTION SLIDER -->
        <script type="text/javascript" src="{{ asset('frontend/plugins/slider.revolution/js/jquery.themepunch.tools.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('frontend/plugins/slider.revolution/js/jquery.themepunch.revolution.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('frontend/js/view/demo.revolution_slider.js') }}"></script>

        @yield('scripts')

        <script type="text/javascript">
            $(document).ready(function(){
                    $('.f').click(function(){
                    $('.c').html($(this).html());
                });
            });

            jQuery("#terms-agree-dos").click(function(){
                jQuery('#termsModalDos').modal('toggle');
            });

            jQuery("#terms-privacity").click(function(){
                jQuery('#termsModalTres').modal('toggle');
            });

        </script>
        
    </body>
</html>