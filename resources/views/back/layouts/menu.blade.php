<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar direction">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="treeview @if($dpage_id == 1) active @endif">
          <a href="#">
            <i class="fas fa-th-large"></i> <span>الاقسام </span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('service_department.create') }}"><i class="far fa-dot-circle"></i> اضف قسم </a></li>
            <li><a href="{{ route('service_department.index') }}"><i class="far fa-dot-circle"></i> عرض اقسام   </a></li>
          </ul>
        </li>

        <li class="treeview @if($dpage_id == 2) active @endif">
          <a href="#">
            <i class="fa fa-th"></i> <span> الخدمات</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('products.create') }}"><i class="far fa-dot-circle"></i> اضف خدمة </a></li>
            <li><a href="{{ route('products.index') }}"><i class="far fa-dot-circle"></i> عرض الخدمات  </a></li>
          </ul>
        </li>

          <li class="treeview @if($dpage_id == 3) active @endif">
              <a href="#">
                  <i class="fab fa-slideshare"></i> <span>الاخبار</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                  <li><a href="{{ route('news.create') }}"><i class="far fa-dot-circle"></i> اضف خبر </a></li>
                  <li><a href="{{ route('news.index') }}"><i class="far fa-dot-circle"></i> عرض الاخبار  </a></li>
              </ul>
          </li>

          <li class="treeview @if($dpage_id == 4) active @endif">
          <a href="#">
            <i class="fa fa-th"></i> <span> العملاء</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('clients.create') }}"><i class="far fa-dot-circle"></i> اضف عميل </a></li>
            <li><a href="{{ route('clients.index') }}"><i class="far fa-dot-circle"></i> عرض العملاء  </a></li>
          </ul>
        </li>

        <li class="treeview @if($dpage_id == 8) active @endif">
          <a href="#">
            <i class="fab fa-slideshare"></i> <span>السليدر</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('slider.create') }}"><i class="far fa-dot-circle"></i> اضف سليدر </a></li>
            <li><a href="{{ route('slider.index') }}"><i class="far fa-dot-circle"></i> عرض السليدر  </a></li>
          </ul>
        </li>


        <li class="treeview @if($dpage_id == 9) active @endif">
          <a href="#">
            <i class="far fa-copy"></i> <span>الصفحات</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('page.index') }}"><i class="far fa-dot-circle"></i> عرض الصفحات  </a></li>
          </ul>
        </li>

        <li class="@if($dpage_id == 11) active @endif"><a href="{{ route('message.index') }}"><i class="fa fa-envelope"></i> <span>الرسائل الداخلية</span> </a></li>
        <li class="@if($dpage_id == 11) active @endif"><a href="{{ route('qoute.index') }}"><i class="fa fa-envelope"></i> <span> qoutes</span> </a></li>
        
        <li class="@if($dpage_id == 12) active @endif"><a href="{{ route('maillist.index') }}"><i class="fa fa-envelope"></i> <span>القائمة البريدية</span> </a></li>

        <li class="@if($dpage_id == 13) active @endif"><a href="{{ route('social.index') }}"><i class="fa fa-laptop"></i> <span>وسائل التواصل الاجتماعى</span></a></li>

        <li class="@if($dpage_id == 14) active @endif"><a href="{{route('setting.edit',1)}}"><i class="fab fa-elementor"></i> <span>اعدادات الموقع</span> </a></li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
