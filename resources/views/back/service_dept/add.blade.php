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
            <form role="form" action="{{ route('service_department.store') }}" method="post" enctype="multipart/form-data">
			  @csrf
              <div class="box-body">

                  <div class="form-group col-md-6">
                      <label for="exampleInputEmail1">الاسم</label>
                      <input type="text" class="form-control" name="page_name" placeholder="الاسم" required>
                  </div>

                  <div class="form-group col-md-6">
                      <label for="exampleInputEmail1">Name</label>
                      <input type="text" class="form-control" name="page_name_en" placeholder="Name">
                  </div>

                  <div class="form-group col-md-6">
                      <label for="exampleInputPassword1">التفاصيل</label>
                      <textarea class="textarea" name="page_details" placeholder="التفاصيل" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                  </div>

                  <div class="form-group col-md-6">
                      <label for="exampleInputPassword1">Details</label>
                      <textarea class="textarea" name="page_details_en" placeholder="Details" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"> </textarea>
                  </div>

                  <div class="form-group col-md-6">
                      <label for="exampleInputPassword1">الوصف</label>
                      <textarea name="page_description" placeholder="الوصف" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"> </textarea>
                  </div>

                  <div class="form-group col-md-6">
                      <label for="exampleInputPassword1">Descrition</label>
                      <textarea name="page_description_en" placeholder="Description" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"> </textarea>
                  </div>
				  
                <div class="form-group">
                  <label for="exampleInputFile">الصورة</label>
					        <br>
                  <input type="file" name="page_picture" style="float: right">
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


