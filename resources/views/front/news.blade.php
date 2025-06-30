@extends('front.layouts.master')
@section('front_content')

<section class="map-back">
      <div class="container">
        <h1 class="title">{{ __('s_news') }}</h1>
        <ul class="maplink">
          <li> <a href="{{route('home',app()->getLocale())}}">{{ __('s_home') }}</a></li>
          <li>{{ __('s_news') }}</li>
        </ul>
      </div>
    </section><!-- End Section panner Top -->

    <section class="news">
      <div class="container">
        <h2 class="title">{{ __('s_news') }}</h2>
        <!--<p class="text-center">{{ __('s_news_details') }}</p>-->
        <div class="row">
        
        @foreach($result_newses as $result_news)
          <div class="col-sm-6 itmenews">
            <div class="news-itme">  
              <div class="hovereffect"><img src="{{url('uploads/news/'.$result_news->picture)}}" alt='{{ app()->getLocale() == "en" ? $result_news->name_en : $result_news->name}}' title='{{ app()->getLocale() == "en" ? $result_news->name_en : $result_news->name}}'>
                <div class="overlay"><a href="{{route('news_details',[app()->getLocale(),$result_news->id])}}" title='{{ app()->getLocale() == "en" ? $result_news->name_en : $result_news->name}}'> {{ __('s_more')}} </a> </div>
              </div><a class="title-it" href="{{route('news_details',[app()->getLocale(),$result_news->id])}}" title='{{ app()->getLocale() == "en" ? $result_news->name_en : $result_news->name}}'>{{ app()->getLocale() == "en" ? $result_news->name_en : $result_news->name}}</a>
              <p>{!! app()->getLocale() == "en" ? strip_tags(Str::words($result_news->details_en, $words=30, $end="")) : strip_tags(Str::words($result_news->details, $words=30, $end="")) !!}
              </p>
            </div>
          </div>
        @endforeach

        </div>

        {{ $result_newses->links('pagination::default') }}

      </div>
    </section><!-- End menus-section -->    

@endsection
