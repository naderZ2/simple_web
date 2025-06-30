<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="description" content="{{ __('s_site_name')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="">
    <title>{{ __('s_site_name')}}</title>
    <link rel="stylesheet" href="{{url('front/'.app()->getLocale().'/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('front/'.app()->getLocale().'/css/home.css')}}">
    <link rel="stylesheet" href="{{url('front/'.app()->getLocale().'/css/lc_lightbox.css')}}">
      @if(app()->getLocale() == "ar" )
          <link rel="stylesheet" href="{{url('front/'.app()->getLocale().'/css/home-rtl.css')}}">
      @endif
    <link link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;700;900&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="icon" href="{{asset('uploads/sliders/6429973.png')}}" type="image/png">
    <script src="{{url('front/'.app()->getLocale().'/js/jquery.js')}}"></script>
    <script src="{{url('front/'.app()->getLocale().'/js/popper.min.js')}}"></script>
    <script src="{{url('front/'.app()->getLocale().'/js/bootstrap.min.js')}}"></script>
    <script src="{{url('front/'.app()->getLocale().'/js/jquery.themepunch.plugins.min.js')}}"></script>
    <script src="{{url('front/'.app()->getLocale().'/js/jquery.themepunch.revolution.min.js')}}"></script>
    <script src="{{url('front/'.app()->getLocale().'/js/slick.min.js')}}"></script>
    <script src="{{url('front/'.app()->getLocale().'/js/lightslider.js')}}"></script>
    <script src="{{url('front/'.app()->getLocale().'/js/jquery.light-carousel.js')}}"></script>
    <script src="{{url('front/'.app()->getLocale().'/js/lc_lightbox.lite.js')}}"></script>
    <script src="{{url('front/'.app()->getLocale().'/js/plugin.js')}}">  </script>
    <style>
    .form-control::placeholder {
        color: black;
    }
</style>
  </head>
  <body>
    <header class="header">
      <div class="min-header">
        <div class="container">
          <nav class="social">
            @foreach($result_socials as $result_social)
              <a class="fab fa-{{$result_social->name}} icon-{{$result_social->icon}}" href="{{$result_social->link}}" target="_blank" title="{{$result_social->name}}"></a>
            @endforeach
          </nav>

          <nav class="linkstop">
              @foreach($result_socials_informations as $result_socials_information)
              <a href="#"> <i class="fas fa-{{$result_socials_information->icon}}"></i> {{$result_socials_information->link}}  </a>
              @endforeach
              <a href='{{app()->getLocale() == "en" ? str_replace("/en","/ar",url()->current()) : str_replace("/ar","/en",url()->current())}}'>{{app()->getLocale()}}</a>
          </nav>
        </div>
      </div>

      <div class="container">
        <div class="logo"><a href="{{route('home',app()->getLocale())}}" title="{{ __('s_site_name') }}"> <img src="{{asset($data->logo)}}" alt="{{ __('s_site_name') }}" title="{{ __('s_site_name') }}"></a></div>
        <div class="menu"> 
          <div id="cssmenu">
            <ul> 
              <li><a class="{{$result_menu_id == 1 ? 'active' : ''}}" href="{{route('home',app()->getLocale())}}" title="{{ __('s_home') }}"> {{ __('s_home') }} </a></li>
              <li><a class="{{$result_menu_id == 2 ? 'active' : ''}}" href="{{route('about',app()->getLocale())}}" title="{{ __('s_about') }}"> {{ __('s_about') }} </a></li>
              <li><a class="{{$result_menu_id == 8 ? 'active' : ''}}" href="{{route('qoute',app()->getLocale())}}" title="{{ __('s_about') }}">  {{ __('s_join_us') }}</a></li>
              
             @if($data->products ==1)
                  <li><a class="{{$result_menu_id == 3 ? 'active' : ''}}" href="{{route('brands',app()->getLocale())}}" title="{{ __('s_brands') }}"> {{ __('s_brands') }}   <i class="fas fa-chevron-down"></i></a>
                    <ul>
                      @foreach($result_brand_menus as $result_brand_menu)
                        <li>
                          <a href="{{route('brand_details',[app()->getLocale(), $result_brand_menu->id])}}" title='{{app()->getLocale() == "en" ? $result_brand_menu->name_en : $result_brand_menu->name}}'> 
                            <span class="mb-3"> 
                              <img src="{{url('uploads/brands/'.$result_brand_menu->picture)}}" alt='{{app()->getLocale() == "en" ? $result_brand_menu->name_en : $result_brand_menu->name}}' title='{{app()->getLocale() == "en" ? $result_brand_menu->name_en : $result_brand_menu->name}}'> 
                            </span>{{app()->getLocale() == "en" ? $result_brand_menu->name_en : $result_brand_menu->name}}
                          </a>
                        </li>
                      @endforeach
                    </ul>
                  </li>
                @endif
            @if($data->happy_clients ==1)
              <li><a class="{{$result_menu_id == 5 ? 'active' : ''}}" href="{{route('clients',app()->getLocale())}}" title="{{ __('s_clients') }}">{{ __('s_clients') }}</a></li>
                 @endif
               @if($data->news ==1)
              <li><a class="{{$result_menu_id == 4 ? 'active' : ''}}" href="{{route('news',app()->getLocale())}}" title="{{ __('s_news') }}">{{ __('s_news') }}</a></li>
              @endif
              <li><a class="{{$result_menu_id == 6 ? 'active' : ''}}" href="{{route('contact',app()->getLocale())}}" title="{{ __('s_contact') }}">{{ __('s_contact') }}</a></li>
            </ul>
          </div><span class="fas fa-search searchicon"></span>
          <!--<a class="bottom" href="#" title="Jegt Co"> {{ __('s_shop_online') }}</a>-->
          <div class="showboxsearch"><span class="cancel-search"></span>
            <div class="innersearch">
              <form class="formsearch" action="#" method="">
                <input class="form-control" type="text" placeholder="Search...">
                <button class=" fas fa-search btn" type="submit"> </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </header><!--End Header-->

    @yield('front_content')

    <footer class="footer">
      <div class="letarnews">
        <div class="container">
          <div class="row">
            <div class="col-sm-6 item">
              <p  style="color:black;"class="title-con" ><b  style="color:black;">  {{ __('s_subscription_title')}}</b> {{ __('s_subscription_details')}} </p>
            </div>
            <div class="col-sm-6 item">
            
                @if(session('errorMessage'))
                  <div class="alert alert-danger">
                      {{ session('errorMessage') }}
                  </div>
                @endif

                @if(session('success_email_message'))
                  <div class="alert alert-success" role="alert"> <i class="fas fa-check"></i> {{session('success_email_message')}} </div>
                @endif

              <form class="sendemail" action="{{route('maillist',app()->getLocale())}}" method="post">
                @csrf                
                <input class="form-control" type="email" name="email" placeholder="{{ __('s_subscription_email')}}" style="color: black;">
                <button class="bottom" type="submit">{{ __('s_subscription')}}</button>
              </form>
            </div>
          </div>
        </div>
      </div>

      <div class="container">
        <div class="row">           
          <div class="col-md-3 boxfot">
            <div class="logo"><img src="{{asset($data->logo)}}" alt="Jegt Co" title="Jegt Co"></div>
            <p class="text">
            {!! app()->getLocale() == "en" ? strip_tags(Str::words($result_about->details_en, $words=30, $end="")) : strip_tags(Str::words($result_about->details, $words=30, $end="")) !!}
            </p>
          </div>

          <div class="col-md-3 boxfot"> 
            <h6 class="title"> {{ __('s_main_menu')}}</h6>
            <nav class="navmenu"> 
              <a href="{{route('home',app()->getLocale())}}" title="{{ __('s_home') }}"> {{ __('s_home') }} </a>
              <a href="{{route('about',app()->getLocale())}}" title="{{ __('s_about') }}"> {{ __('s_about') }} </a>
              <a href="{{route('brands',app()->getLocale())}}" title="{{ __('s_brands') }}"> {{ __('s_brands') }} </a>
              <a href="{{route('clients',app()->getLocale())}}" title="{{ __('s_clients') }}">{{ __('s_clients') }}</a>
              <a href="{{route('news',app()->getLocale())}}" title="{{ __('s_news') }}">{{ __('s_news') }}</a>
              <a href="{{route('contact',app()->getLocale())}}" title="{{ __('s_contact') }}">{{ __('s_contact') }}</a>
            </nav>
          </div>

          <div class="col-md-3 boxfot"> 
            <h6 class="title">{{ __('s_our_brands') }}</h6>
            <nav class="navmenu"> 
            @foreach($result_brand_menus as $result_brand_menu)
                <a href="{{route('brand_details',[app()->getLocale(), $result_brand_menu->id])}}" title='{{app()->getLocale() == "en" ? $result_brand_menu->name_en : $result_brand_menu->name}}'> 
                  {{app()->getLocale() == "en" ? $result_brand_menu->name_en : $result_brand_menu->name}}
                </a>
            @endforeach
            </nav>
          </div>

          <div class="col-md-3 boxfot"> 
            <h6 class="title"> {{ __('s_contact_information')}}</h6>
            <div class="textcontact">
              <p><i class='fas fa-{{ app()->getLocale() == "en" ? $result_address_en->icon : $result_address->icon }}'></i> {{ app()->getLocale() == "en" ? $result_address_en->link : $result_address->link }} </p>
              @foreach($result_socials_informations as $result_socials_information)
              <a href="#"> <i class="fas fa-{{$result_socials_information->icon}}"></i> {{$result_socials_information->link}}  </a>
              @endforeach
            </div>

            <nav class="social">
            @foreach($result_socials as $result_social)
              <a class="fab fa-{{$result_social->name}} icon-{{$result_social->icon}}" href="{{$result_social->link}}" target="_blank" title="{{$result_social->name}}"></a>
            @endforeach
            </nav>

          </div>

        </div>

        <div class="copyright">
          <p class="textcopyright">{{ __('s_copyright')}} <span>{{ __('s_site_name')}}</span>.</p>
        </div>

      </div><a class="scrollToTop bottom" href="#"><i class="fas fa-arrow-up"></i></a>
    </footer><!--End Footer-->
  </body>
</html>
