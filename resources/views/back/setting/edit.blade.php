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
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">{!! $view_title !!}</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="{{ route('setting.update',$result_page->id) }}" method="post" enctype="multipart/form-data">
            @method('PUT')
            @csrf
              <div class="box-body">
              <div class="form-group">
                  <label for="exampleInputEmail1">البريد الالكترونى</label>
                  <input type="email" class="form-control" name="page_email" value="{{$result_page->email}}" placeholder="البريد الالكترونى" required>
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">كلمة المرور</label>
                  <input type="text" class="form-control" name="page_password" placeholder="كلمة المرور" required>
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">اسم الموقع</label>
                  <input type="text" class="form-control" name="page_title" value="{{$result_page->title}}" placeholder="اسم الموقع" required>
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Site title</label>
                  <input type="text" class="form-control" name="page_title_en" value="{{$result_page->title_en}}" placeholder="Site title" required>
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">البريد الالكترونى الخاص المراسلات</label>
                  <input type="email" class="form-control" name="page_message_email" value="{{$result_page->message_email}}" placeholder="البريد الالكترونى الخاص المراسلات" required>
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">الوصف</label>
                  <textarea name="page_description" placeholder="الوصف" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required> {{$result_page->description}}</textarea>
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Descrition</label>
                  <textarea name="page_description_en" placeholder="Description" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required> {{$result_page->description_en}}</textarea>
                </div>
                
                 </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">اللوجو</label>
                  <input type="file" class="form-control" name="logo" >
                </div>
                
                <div class="col-md-6 mb-3">
                    <label for="validationCustom03">News Section</label>

                    <select class="js-example-placeholder-multiple col-sm-12"  id="validationCustom03"  name="news" required>
                        @if($result_page->news)
                            <option value="1" selected>AVAILABLE</option>
                            <option value="0">hidden</option>
                        @else
                           <option value="1" >AVAILABLE</option>
                            <option value="0" selected >Hidden</option>
                        @endif
                        
                  
                    </select>
                 

                </div>
                <div class="col-md-6 mb-3">
                    <label for="validationCustom03">products Section</label>

                    <select class="js-example-placeholder-multiple col-sm-12"  id="validationCustom03"  name="products" required>
                        @if($result_page->products)
                            <option value="1" selected>AVAILABLE</option>
                            <option value="0">hidden</option>
                        @else
                           <option value="1" >AVAILABLE</option>
                            <option value="0" selected >Hidden</option>
                        @endif
                        
                  
                    </select>
                    

                </div>
                <div class="col-md-6 mb-3">
                    <label for="validationCustom03">happy clients Section</label>

                    <select class="js-example-placeholder-multiple col-sm-12"  id="validationCustom03"  name="happy_clients" required>
                        @if($result_page->happy_clients)
                            <option value="1" selected>AVAILABLE</option>
                            <option value="0">hidden</option>
                        @else
                           <option value="1" >AVAILABLE</option>
                            <option value="0" selected >Hidden</option>
                        @endif
                        
                  
                    </select>
                 

                </div>
                <div class="col-md-6 mb-3">
                    <label for="validationCustom03">statistics Section</label>

                    <select class="js-example-placeholder-multiple col-sm-12"  id="validationCustom03"  name="statistics" required>
                        @if($result_page->statistics)
                            <option value="1" selected>AVAILABLE</option>
                            <option value="0">hidden</option>
                        @else
                           <option value="1" >AVAILABLE</option>
                            <option value="0" selected >Hidden</option>
                        @endif
                        
                  
                    </select>
                    

                </div>
                
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">حفظ</button>
              </div>
            </form>
          </div>
          <!-- /.box -->

        </div>
        <!--/.col (left) -->

      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection


