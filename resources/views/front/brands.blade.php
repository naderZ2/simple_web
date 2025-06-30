@extends('front.layouts.master')
@section('front_content')

<section class="map-back">
      <div class="container">
        <h1 class="title">{{ __('s_brands') }}</h1>
        <ul class="maplink">
          <li> <a href="{{route('home',app()->getLocale())}}">{{ __('s_home') }}</a></li>
          <li>{{ __('s_brands') }}</li>
        </ul>
      </div>
    </section><!-- End Section panner Top -->

    <section class="brands">
      <div class="container">
        <h2 class="title"> {{ __('s_brands') }} </h2>
        <p class="text-center">
                      {!! app()->getLocale() == "en" ? strip_tags($result_brand_details->details_en) : strip_tags($result_brand_details->details) !!}  </p>
        <div class="row">

          @foreach($result_brands as $result_brand)
          <div class="col-sm-3 item">
            <div class="brand-item">
                <a class="photo" href="{{route('brand_details',[app()->getLocale(), $result_brand->id])}}" title='{{app()->getLocale() == "en" ? $result_brand->name_en : $result_brand->name}}'>
                <img src="{{url('uploads/brands/'.$result_brand->picture)}}" alt='{{app()->getLocale() == "en" ? $result_brand->name_en : $result_brand->name}}' title='{{app()->getLocale() == "en" ? $result_brand->name_en : $result_brand->name}}'></a>
                <div class="title-it">{{app()->getLocale() == "en" ? $result_brand->name_en : $result_brand->name}}</div>
                <a class="fas fa-angle-double-down bottom" href="{{route('brand_details',[app()->getLocale(), $result_brand->id])}}" title='{{app()->getLocale() == "en" ? $result_brand->name_en : $result_brand->name}}'> </a>
            </div>
            </div>
            @endforeach
   
        {{ $result_brands->links('pagination::default') }}

      </div>
    </section>

@endsection
