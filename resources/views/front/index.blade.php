@extends('front.layouts.master')
@section('front_content')

<div class="slider">
    <div class="tp-banner-container">
        <div class="tp-banner">
            <ul>
                @foreach($result_banners as $result_banner)
                <li data-transition="fade" data-slotamount="7" data-masterspeed="700" data-saveperformance="on">
                    <img
                        src=""
                        alt="{{ app()->getLocale() == "en" ? $result_banner->name_en : $result_banner->name }}"
                        data-lazyload="{{ url('public/uploads/sliders/'.$result_banner->picture) }}"
                        data-bgposition="center top"
                        data-bgfit="cover"
                        data-bgrepeat="no-repeat"
                        style="background-size: contain; @media (min-width: 768px) { background-size: cover; }"
                    >
                    <div class="container">
                        <!-- Your other content goes here -->
                    </div>
                </li>
                @endforeach
            </ul>
            <div class="tp-bannertimer"></div>
        </div>
    </div>
</div><!-- End Slider -->
 @if($data->products ==1)    
 <section class="brands">
    <div class="container">

        <!--<h2 class="title">{!! app()->getLocale() == "en" ? strip_tags($result_brand_details->name_en) : strip_tags($result_brand_details->name) !!} </h2>-->
        <h2 class="title">{{ __('s_our_services') }} </h2>
        <p class="text-center">
        {!! app()->getLocale() == "en" ? strip_tags($result_brand_details->details_en) : strip_tags($result_brand_details->details) !!} 
        </p>
        <div class="brands-slider">
            @foreach($result_dept_services as $result_dept_service)
            <div class="brand-item">
                <a class="photo" href="{{route('brand_details',[app()->getLocale(), $result_dept_service->id])}}" title='{{app()->getLocale() == "en" ? $result_dept_service->name_en : $result_dept_service->name}}'>
                <img src="{{url('uploads/brands/'.$result_dept_service->picture)}}" alt='{{app()->getLocale() == "en" ? $result_dept_service->name_en : $result_dept_service->name}}' title='{{app()->getLocale() == "en" ? $result_dept_service->name_en : $result_dept_service->name}}' style="background-size:contain"></a>
                <div class="title-it">{{app()->getLocale() == "en" ? $result_dept_service->name_en : $result_dept_service->name}}</div>
                <a class="fas fa-angle-double-down bottom" href="{{route('brand_details',[app()->getLocale(), $result_dept_service->id])}}" title='{{app()->getLocale() == "en" ? $result_dept_service->name_en : $result_dept_service->name}}'> </a>
            </div>
            @endforeach
        </div>
    </div>
</section><!--End min-brands-->
@endif
 @if($data->statistics ==1)    
    <section class="counter">
    <div class="container">
        <h2 class="title">{{ __('s_success_number') }}</h2>
        <div class="row">
            @foreach($result_successes as $result_success)
                <div class="col-sm-4 count-it">
                    <h3 class="timer title-number" data-to='{{app()->getLocale() == "en" ? (int)strip_tags($result_success->details_en) : (int)strip_tags($result_success->details)}}' data-speed="20000"></h3>
                    <p class="count-text">{{app()->getLocale() == "en" ? $result_success->name_en : $result_success->name}} </p>
                </div>
            @endforeach
        </div>
    </div>
</section><!--End counter-->
@endif

 @if($data->happy_clients ==1) 
<section class="clients">
    <div class="container">
        <h2 class="title">{!! app()->getLocale() == "en" ? strip_tags($result_client_details->name_en) : strip_tags($result_client_details->name) !!} </h2>
        <!--<h2 class="title">{{ __('s_happy_clients')}}</h2>-->
        <p class="text-center">
        {!! app()->getLocale() == "en" ? strip_tags($result_client_details->details_en) : strip_tags($result_client_details->details) !!} 
        </p>
        <div class="clients-slider">
            @foreach($result_clients as $result_client)
            <div class="client-item">
                <a class="photo" href="{{route('client_details',[app()->getLocale(), $result_client->id])}}" title='{{app()->getLocale() == "en" ? $result_client->name_en : $result_client->name}}'> 
                    <img src="{{url('uploads/clients/'.$result_client->picture)}}" alt='{{app()->getLocale() == "en" ? $result_client->name_en : $result_client->name}}' title='{{app()->getLocale() == "en" ? $result_client->name_en : $result_client->name}}'>
                </a>
                <div class="title-it">{{app()->getLocale() == "en" ? $result_client->name_en : $result_client->name}}</div>
                <p class="text">
                {!! app()->getLocale() == "en" ? strip_tags(Str::words($result_client->details_en, $words = 30, $end = '')) : strip_tags(Str::words($result_client->details, $words = 30, $end = '')) !!}
                </p>
                <a class="bottom" href="{{route('client_details',[app()->getLocale(), $result_client->id])}}" title='{{app()->getLocale() == "en" ? $result_client->name_en : $result_client->name}}'><i class="fas fa-chevron-right"></i>{{ __('s_more')}}</a>
            </div>
          @endforeach
        </div>
    </div>
</section><!--End min-clients-->
@endif

 @if($data->news ==1) 
<section class="news">
    <div class="container">
        <h2 class="title"> {{ __('s_news')}}</h2>
        <!--<p class="text-center">{{ __('s_news_details')}}</p>-->
        <div class="news-slider">
            @foreach($result_newses as $result_news)
            <div class="news-itme">
                <div class="hovereffect"><img src="{{url('uploads/news/'.$result_news->picture)}}" alt='{{app()->getLocale() == "en" ? $result_news->name_en : $result_news->name}}' title='{{app()->getLocale() == "en" ? $result_news->name_en : $result_news->name}}'>
                    <div class="overlay"><a href="{{route('news_details',[app()->getLocale(), $result_news->id])}}" title='{{app()->getLocale() == "en" ? $result_news->name_en : $result_news->name}}'> {{ __('s_more') }} </a> </div>
                </div>
                <a class="title-it" href="{{route('news_details',[app()->getLocale(), $result_news->id])}}">{{app()->getLocale() == "en" ? $result_news->name_en : $result_news->name}}</a>
                <p>{!! app()->getLocale() == "en" ? strip_tags(Str::words($result_news->details_en, $words = 30, $end = '')) : strip_tags(Str::words($result_news->details, $words = 30, $end = '')) !!}</p>
            </div>
            @endforeach
        </div>
    </div>
</section><!--End minnews-->
@endif
@endsection
