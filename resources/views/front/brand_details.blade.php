@extends('front.layouts.master')
@section('front_content')

<section class="map-back">
      <div class="container">
        <h1 class="title">{{ __('s_brands') }}</h1>
        <ul class="maplink">
          <li> <a href="{{route('home',app()->getLocale())}}">{{ __('s_home') }}</a></li>
          <li><a href="{{route('brands',app()->getLocale())}}">{{ __('s_brands') }}</a></li>
          <li>{{ app()->getLocale() == "en" ? $result_service_dept->name_en : $result_service_dept->name }}</li>
        </ul>
      </div>
    </section><!-- End Section panner Top -->

    <section class="brand-details">
      <div class="container">
        <div class="inner">
          <div class="row">
            <div class="col-sm-4 item-details">
              <div class="slider-prod">
                <div class="sample1">
                  <div class="carousel">
                    <ul> 
                      <li> 
                          <a class="elem" href="{{url('uploads/brands/'.$result_service_dept->picture)}}" title='{{ app()->getLocale() == "en" ? $result_service_dept->name_en : $result_service_dept->name }}' data-lcl-txt="" data-lcl-author="" data-lcl-thumb="images/teknopanel_logo2.jpg">
                            <span style="background-image: url({{url('uploads/brands/'.$result_service_dept->picture)}});"></span>
                          </a>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="thumbnails">
                  <ul> 
                    <li><img src="{{url('uploads/brands/'.$result_service_dept->picture)}}" alt='{{ app()->getLocale() == "en" ? $result_service_dept->name_en : $result_service_dept->name }}' title='{{ app()->getLocale() == "en" ? $result_service_dept->name_en : $result_service_dept->name }}'></li>
                  </ul>
                </div>
              </div>
            </div>
            <!--<div class="col-sm-7 item-details"><span class="feature">  {{ __('s_brand_shipping')}}  </span>-->
            <!--  <h3 class="title">{{ app()->getLocale() == "en" ? $result_service_dept->name_en : $result_service_dept->name }}</h3>-->
              <!--<div class="item-rat">-->
              <!--  <div class="last-rat">-->
              <!--    <ul class="rating">-->
              <!--      <li class="fas fa-star active"></li>-->
              <!--      <li class="fas fa-star active"> </li>-->
              <!--      <li class="fas fa-star active"></li>-->
              <!--      <li class="fas fa-star"></li>-->
              <!--      <li class="fas fa-star">    </li>-->
              <!--    </ul>-->
              <!--    <p><b>3.5</b>  </p>-->
              <!--  </div>-->
              <!--</div>-->
              <!--<div class="description">-->
                <p>
              {!! app()->getLocale() == "en" ? $result_service_dept->details_en : $result_service_dept->details !!}

                
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    @if($result_products != "[]")
    <section class="brands products">
      <div class="container">
        <h2 class="title"> {{ __('s_products')}}</h2>
        <p class="text-center">{{ __('s_products_details')}}</p>
        <div class="row">

        @foreach($result_products as $result_product)
          <div class="col-sm-3 item">
            <div class="brand-item"> 
                <a class="photo" href="{{route('product_details',[app()->getLocale(), $result_product->id])}}" title='{{ app()->getLocale() == "en" ? $result_product->name_en : $result_product->name }}'> 
                    <img src="{{url('uploads/products/'.$result_product->picture)}}" alt='{{ app()->getLocale() == "en" ? $result_product->name_en : $result_product->name }}' title='{{ app()->getLocale() == "en" ? $result_product->name_en : $result_product->name }}'>
                </a>
              <div class="title-it">{{ app()->getLocale() == "en" ? $result_product->name_en : $result_product->name }}</div>
              <a class="bottom" href="{{route('product_details',[app()->getLocale(), $result_product->id])}}" title='{{ app()->getLocale() == "en" ? $result_product->name_en : $result_product->name }}'>
                  <i class="fas fa-chevron-right"></i>  {{ __('s_more')}}
                </a>
            </div>
          </div>
        @endforeach

        </div>
      </div>
    </section>
    @endif

@endsection
