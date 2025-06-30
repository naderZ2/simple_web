@extends('front.layouts.master')
@section('front_content')

<section class="map-back">
      <div class="container">
        <h1 class="title">{{ __('s_products') }}</h1>
        <ul class="maplink">
          <li> <a href="{{route('home',app()->getLocale())}}">{{ __('s_home') }}</a></li>
          <li><a href="{{route('brands',app()->getLocale())}}">{{ __('s_brands') }}</a></li>
          <li><a href="{{route('brand_details',[app()->getLocale(),$result_product->servicedept_id])}}">{{ app()->getLocale() == "en" ? $result_product->servicedept->name_en : $result_product->servicedept->name }}</a></li>
          <li>{{ app()->getLocale() == "en" ? $result_product->name_en : $result_product->name }}</li>
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
                          <a class="elem" href="{{url('uploads/products/'.$result_product->picture)}}" title='{{ app()->getLocale() == "en" ? $result_product->name_en : $result_product->name }}' data-lcl-txt="" data-lcl-author="" data-lcl-thumb="images/teknopanel_logo2.jpg">
                            <span style="background-image: url({{url('uploads/products/'.$result_product->picture)}});"></span>
                          </a>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="thumbnails">
                  <ul> 
                    <li><img src="{{url('uploads/products/'.$result_product->picture)}}" alt='{{ app()->getLocale() == "en" ? $result_product->name_en : $result_product->name }}' title='{{ app()->getLocale() == "en" ? $result_product->name_en : $result_product->name }}'></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-sm-7 item-details"><span class="feature">  {{ __('s_brand_shipping')}}  </span>
              <h3 class="title">{{ app()->getLocale() == "en" ? $result_product->name_en : $result_product->name }}</h3>
              <div class="item-rat">
                <div class="last-rat">
                  <ul class="rating">
                    <li class="fas fa-star active"></li>
                    <li class="fas fa-star active"> </li>
                    <li class="fas fa-star active"></li>
                    <li class="fas fa-star"></li>
                    <li class="fas fa-star">    </li>
                  </ul>
                  <p><b>3.5</b>  </p>
                </div>
              </div>
              <div class="description">
                <p>

              {!! app()->getLocale() == "en" ? strip_tags($result_product->details_en) : strip_tags($result_product->details) !!}                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="brands products">
      <div class="container">
        <h2 class="title"> {{ __('s_relatet_products')}}</h2>
        <p class="text-center">{{ __('s_products_details')}}</p>
        <div class="row">

        @foreach($result_relatet_products as $result_relatet_product)
          <div class="col-sm-3 item">
            <div class="brand-item"> 
                <a class="photo" href="{{route('product_details',[app()->getLocale(), $result_relatet_product->id])}}" title='{{ app()->getLocale() == "en" ? $result_relatet_product->name_en : $result_relatet_product->name }}'> 
                    <img src="{{url('uploads/products/'.$result_relatet_product->picture)}}" alt='{{ app()->getLocale() == "en" ? $result_relatet_product->name_en : $result_relatet_product->name }}' title='{{ app()->getLocale() == "en" ? $result_relatet_product->name_en : $result_relatet_product->name }}'>
                </a>
              <div class="title-it">{{ app()->getLocale() == "en" ? $result_relatet_product->name_en : $result_relatet_product->name }}</div>
              <a class="bottom" href="{{route('product_details',[app()->getLocale(), $result_relatet_product->id])}}" title='{{ app()->getLocale() == "en" ? $result_relatet_product->name_en : $result_relatet_product->name }}'>
                  <i class='fas fa-chevron-{{ app()->getLocale() == "en" ? "right" : "left" }}'></i>  {{ __('s_more')}}
                </a>
            </div>
          </div>
        @endforeach

        </div>
      </div>
    </section>

@endsection
