@extends('front.layouts.master')
@section('front_content')

    <section class="news">
      <div class="container">
        <ul class="maplink">
          <li> <a href="{{route('home',app()->getLocale())}}">{{ __('s_home') }}</a></li>
          <li> <a href="{{route('news',app()->getLocale())}}">{{ __('s_news') }}</a></li>
          <li>{{ app()->getLocale() == "en" ? $result_details->name_en : $result_details->name}}</li>
        </ul>
        <div class="photonews">
            <img src="{{url('uploads/news/'.$result_details->picture)}}" alt='{{ app()->getLocale() == "en" ? $result_details->name_en : $result_details->name}}' title='{{ app()->getLocale() == "en" ? $result_details->name_en : $result_details->name}}'></div>
        <div class="contant">
          <h4 class="title-it">{{ app()->getLocale() == "en" ? $result_details->name_en : $result_details->name}}</h4>
          <p>
              {!! app()->getLocale() == "en" ? strip_tags($result_details->details_en) : strip_tags($result_details->details) !!}
          </p>
          
          <div class="a2a_kit a2a_kit_size_32 a2a_default_style"> 
              <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
              <a class="a2a_button_facebook"></a>
              <a class="a2a_button_twitter"></a>
              <a class="a2a_button_email"></a>
              <a class="a2a_button_linkedin"></a>
         </div>
          <script async src="https://static.addtoany.com/menu/page.js"></script>
        </div>
      </div>
    </section>   

@endsection
