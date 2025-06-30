@extends('front.layouts.master')
@section('front_content')

<section class="map-back">
      <div class="container">
        <h1 class="title">{{ __('s_clients') }}</h1>
        <ul class="maplink">
        <li> <a href="{{route('home',app()->getLocale())}}">{{ __('s_home') }}</a></li>
          <li>{{ __('s_clients') }}</li>
        </ul>
      </div>
    </section><!-- End Section panner Top -->

    <section class="happy-clients"> 
      <div class="container">
        <h2 class="title"> {{ __('s_clients') }} </h2>
        <p class="text-center">
        {!! app()->getLocale() == "en" ? strip_tags($result_client_details->details_en) : strip_tags($result_client_details->details) !!} 
        </p>
        <div class="row">
        @foreach($result_clients as $result_client)
          <div class="col-sm-3 item">
            <div class="client-item">
                <a class="photo" href="{{route('client_details',[app()->getLocale(), $result_client->id])}}" title='{{app()->getLocale() == "en" ? $result_client->name_en : $result_client->name}}'> 
                    <img src="{{url('uploads/clients/'.$result_client->picture)}}" alt='{{app()->getLocale() == "en" ? $result_client->name_en : $result_client->name}}' title='{{app()->getLocale() == "en" ? $result_client->name_en : $result_client->name}}'>
                </a>
              <div class="title-it">{{app()->getLocale() == "en" ? $result_client->name_en : $result_client->name}}</div>
              <p class="text">
              {!! app()->getLocale() == "en" ? strip_tags(Str::words($result_client->details_en, $words = 30, $end = '')) : strip_tags(Str::words($result_client->details, $words = 30, $end = '')) !!}
              </p>
              <a class="bottom" href="{{route('client_details',[app()->getLocale(), $result_client->id])}}" title='{{app()->getLocale() == "en" ? $result_client->name_en : $result_client->name}}'><i class='fas fa-chevron-{{app()->getLocale() == "en" ? "right" : "left"}}'></i> {{ __('s_more')}}</a>
            </div>
          </div>
        @endforeach
        
        </div>
        
        {{ $result_clients->links('pagination::default') }}

      </div>
    </section>


@endsection
