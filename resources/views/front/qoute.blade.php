@extends('front.layouts.master')
@section('front_content')

    <section class="contactus">
      <div class="container">
        <div class="row">
        <div>
            <br>
            <br>
            <br>
            <br>
        </div>
            <center>
            <div class="col-sm-6  item formitem">
            
            <div class="inner" >
                <h2 class="title" style="text-align: center;"> {{ __('s_join_us') }}</h2>
                <p class="text">{{ __('s_contact_information_details')}}</p>
                <form action="{{route('qoute_withus',app()->getLocale())}}" method="post" enctype='multipart/form-data'>
                @csrf
                @if(session('success_message'))
                <div class="alert alert-success" role="alert"> <i class="fas fa-check"></i> {{session('success_message')}} </div>
                @endif
                <div class="row">
                    <div class="col-sm-12 inpusrach">
                        <input class="form-control" type="text" name="customer_name" placeholder="{{ __('s_name')}}" required>
                    </div>
                    <div class="col-sm-6 inpusrach">
                        <input class="form-control" type="text" name="customer_phone" placeholder="phone" required>
                    </div>
                    <div class="col-sm-6 inpusrach">
                        <input class="form-control" type="text" name="customer_whats_app_phone" placeholder="whats app number" required>
                    </div>
                    <div class="col-sm-12 inpusrach">
                        <textarea class="form-control" name="customer_message" placeholder="{{ __('s_message')}}" required></textarea>
                    </div>
                    <div class="col-sm-6 inpusrach">
                                    <label>{{ __('ID_Front') }}</label>
                                    <input class="form-control" type="file" name="id_front" required>
                                </div>
                                <div class="col-sm-6 inpusrach">
                                    <label>{{ __('ID_Back') }}</label>
                                    <input class="form-control" type="file" name="id_back" required>
                                </div>
                                <div class="col-sm-6 inpusrach">
                                    <label>{{ __('Private_License') }}</label>
                                    <input class="form-control" type="file" name="private_license" required>
                                </div>
                                <div class="col-sm-6 inpusrach">
                                    <label>{{ __('Car_License') }}</label>
                                    <input class="form-control" type="file" name="car_license" required>
                                </div>
                                <div class="col-sm-6 inpusrach">
                                    <label>{{ __('Blood_Test') }}</label>
                                    <input class="form-control" type="file" name="blood_test" required>
                                </div>
                                <div class="col-sm-6 inpusrach">
                                    <label>{{ __('Criminal_Record') }}</label>
                                    <input class="form-control" type="file" name="criminal_record" required>
                                </div>
                                <div class="col-sm-6 inpusrach">
                                    <label>{{ __('Car_Front_Image') }}</label>
                                    <input class="form-control" type="file" name="car_front_image" required>
                                </div>
                                <div class="col-sm-6 inpusrach">
                                    <label>{{ __('Car_Back_Image') }}</label>
                                    <input class="form-control" type="file" name="car_back_image" required>
                                </div>

                    <div class="col-sm-12 inpusrach">
                        <input class="form-control" type="file" name="customer_file" placeholder="{{ __('s_subject')}}" required>
                    </div>
                    <div class="col-sm-12 inpusrach">
                        <button class="bottom" type="submit">{{ __('s_send_now')}}</button>
                    </div>
                </div>
              </form>
            </div>
          
          </div>
            </center>
        </div>
      </div>
    </section>

@endsection
