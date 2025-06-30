@extends('front.layouts.master')
@section('front_content')

<section class="map-back">
      <div class="container">
        <h1 class="title">{{ __('s_about') }}</h1>
        <ul class="maplink">
          <li> <a href="index.html">{{ __('s_home') }}</a></li>
          <li>{{ __('s_about') }}</li>
        </ul>
      </div>
    </section><!-- End Section panner Top -->

    <section class="aboutus"> 
      <div class="container">
        <div class="row">
          <div class="col-sm-6 item"><img src="{{url('uploads/'.$result_details->picture)}}" alt="Jegt Co" title="Jegt Co"></div>
          <div class="col-sm-6 item text-contant">
            <div class="inner-ab">
              <h3 class="title">{{ app()->getLocale() == "en" ? $result_details->name_en : $result_details->name }}</h3>
              <p class="text">
              {!! app()->getLocale() == "en" ? strip_tags($result_details->details_en) : strip_tags($result_details->details) !!}
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="counter">
    <div class="container">
        <h2 class="title">{{ __('s_success_number') }}</h2>
        <div class="row">
            @foreach($result_successes as $result_success)
                <div class="col-sm-4 count-it">
                    <h3 class="timer title-number" data-to="{{app()->getLocale() == "en" ? (int)strip_tags($result_success->details_en) : (int)strip_tags($result_success->details)}}" data-speed="20000"></h3>
                    <p class="count-text">{{app()->getLocale() == "en" ? $result_success->name_en : $result_success->name}} </p>
                </div>
            @endforeach
        </div>
    </div>
</section><!--End counter-->

@endsection
