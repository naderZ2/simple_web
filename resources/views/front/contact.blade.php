@extends('front.layouts.master')
@section('front_content')

<section class="map-contact"> 
        
                {!! app()->getLocale() == "en" ? $result_contact->details_en : $result_contact->details !!} 
    </section>

    <section class="contactus">
      <div class="container">
        <div class="row">
          <div class="col-sm-6 item">
            <h2 class="title">{{ __('s_contact') }}</h2>
            
            <div class="map-text">
                <div><a href="#"> <i class='fas fa-{{ app()->getLocale() == "en" ? $result_address_en->icon : $result_address->icon }}'></i> {{ app()->getLocale() == "en" ? $result_address_en->link : $result_address->link }}  </a></div>
            </div>

              @foreach($result_socials_informations as $result_socials_information)
              <div class="map-text">
                <div><a href="#"> <i class="fas fa-{{$result_socials_information->icon}}"></i> {{$result_socials_information->link}}  </a></div>
              </div>
              @endforeach
            
            <nav class="social">
                @foreach($result_socials as $result_social)
                <a class="fab fa-{{$result_social->name}} icon-{{$result_social->icon}}" href="{{$result_social->link}}" target="_blank" title="{{$result_social->name}}"></a>
                @endforeach
            </nav>
          </div>

          <div class="col-sm-6 item formitem">
            <div class="inner">
              <h2 class="title">{{ __('s_contact_information') }}</h2>
              <p class="text">{{ __('s_contact_information_details')}}</p>
              <form action="{{route('contact_withus',app()->getLocale())}}" method="post">
                @csrf
                @if(session('success_message'))
                  <div class="alert alert-success" role="alert"> <i class="fas fa-check"></i> {{session('success_message')}} </div>
                @endif
                <div class="row">
                    <div class="col-sm-12 inpusrach">
                        <input class="form-control" type="text" name="customer_name" placeholder="{{ __('s_name')}}" required>
                    </div>

                    <div class="col-sm-12 inpusrach">
                        <input class="form-control" type="email" name="customer_email" placeholder="{{ __('s_email')}}" required>
                    </div>

                    <div class="col-sm-12 inpusrach">
                        <input class="form-control" type="text" name="customer_subject" placeholder="{{ __('s_subject')}}" required>
                    </div>

                    <div class="col-sm-12 inpusrach">
                        <textarea class="form-control" name="customer_message" placeholder="{{ __('s_message')}}" required></textarea>
                    </div>

                    <div class="col-sm-12 inpusrach">
                        <button class="bottom" type="submit">{{ __('s_send_now')}}</button>
                    </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>

@endsection
