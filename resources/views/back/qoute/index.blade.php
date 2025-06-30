@extends('back.layouts.menu')
@section('menu_content')
@endsection

@extends('back.layouts.master')
@section('back_content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <small>{!! $title !!}</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('home.index') }}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li class="active">{!! $view_title !!}</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">

          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">{!! $view_title !!}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table direction table-bordered table-striped">
                <thead>
                <tr>
                  <th style="width: 5%">م</th>
                  <th style="width: 15%">الاسم</th>
                  <th style="width: 15%">الهاتف </th>
                  <th style="width: 15%">رقم الواتس </th>
                  <th style="width: 20%">التفاصيل</th>
                  <th style="width: 10%">الملف</th>
                  <th style="width: 10%">صور السيارة</th>
                  <th style="width: 5%">صور الرخص</th>
                  <th style="width: 5%">صور الهوية</th>
                  <!--<th style="width: 10%"></th>-->
                </tr>
                </thead>
                <tbody>
                
			@php($x=1)
				@foreach($result as $result_page)
				<tr>
                  <td>{{ $x++ }}</td>
                  <td>{{ $result_page->name }}</td>
                  <td>{{ $result_page->phone }}</td>
                  <td>{{ $result_page->customer_whats_app_phone }}</td>
                  <td>{{ $result_page->description }}</td>
                  <td>
                  
                  <a class="btn btn-primary" href="{{ asset($result_page->file) }}" download>Download </a>
                  
                 @if(!is_null($result_page->criminal_record))
                      <a class="btn btn-primary" href="{{ asset($result_page->criminal_record) }}" download>criminal record</a>
                  @endif
                  @if(!is_null($result_page->blood_test))
                      <a class="btn btn-primary" href="{{ asset($result_page->blood_test) }}" download>blood test </a>
                
                  @endif
                

                  </td>
                  <td>
                        @if(!is_null($result_page->car_back_image))
                        <a class="btn btn-primary" href="{{ asset($result_page->car_back_image) }}" download>back image</a>
                        
                      @endif
                    @if(!is_null($result_page->car_front_image))
                      <a class="btn btn-primary" href="{{ asset($result_page->car_front_image) }}" download>front image</a>
                    @endif
                      
                  </td>
                  <td>
                      @if(!is_null($result_page->car_license))
                        <a class="btn btn-primary" href="{{ asset($result_page->car_license) }}" download>car license</a>
                         @endif
                    @if(!is_null($result_page->private_license))
                      <a class="btn btn-primary" href="{{ asset($result_page->private_license) }}" download>private license </a>
                       @endif
                    </td>
                     <td>
                          @if(!is_null($result_page->id_back))
                           <a class="btn btn-primary" href="{{ asset($result_page->id_back) }}" download>id back </a>
                            @endif
                     @if(!is_null($result_page->id_front))
                  <a class="btn btn-primary" href="{{ asset($result_page->id_front) }}" download>id front</a>
                   @endif
                         
                     </td>
                  <!--<td>-->
                  <!--<a href="javascript:void(0)" onclick="if(confirm('هل انت متأكد من الحذف؟')){event.preventDefault();document.getElementById('delete-form-{{$result_page->id}}').submit();}else{event.preventDefault();}" class="btn btn-danger btn-sm">حذف</a>-->
					  
                  <!--<form id="delete-form-{{$result_page->id}}" method="post" action="{{ route('message.destroy',$result_page->id) }}">-->
                  <!--@method('DELETE')-->
                  <!--@csrf-->
                  <!--</form>-->
                  <!--</td>-->
        </tr>
				@endforeach
         
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection


