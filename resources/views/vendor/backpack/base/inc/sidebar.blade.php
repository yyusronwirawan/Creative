
    <!-- Left side column. contains the sidebar -->
    <aside class="main-sidebar" style="background-color: {{ $color->sidebar }}">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
          <div class="pull-left image">
          <br>
          </div>
          <div class="pull-left info">
            <p>Super Admin</p>
            <!-- <a href="#"><i class="fa fa-circle text-success"></i> Online</a> -->
          </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu tree" data-widget="tree">
          <li class="header"></li>


          <li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/dashboard') }}"><i class="fa fa-dashboard"></i> <span>{{ trans('backpack::base.dashboard') }}</span></a></li>
          <li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/banner') }}"><i class="fa fa-image"></i> <span>Banner</span></a></li>
          <li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/tentang_kami') }}"><i class="fa fa-info-circle"></i> <span>Tentang Kami</span></a></li>
          <li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/cara_kerja') }}"><i class="fa fa-building"></i> <span>Cara Kerja</span></a></li>
          <li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/bank') }}"><i class="fa fa-bank"></i> <span>Bank</span></a></li>
          <li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/testimonial') }}"><i class="fa fa-comments"></i> <span>Testimonial</span></a></li>
          <li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/social_media') }}"><i class="fa fa-instagram"></i> <span>Social Media</span></a></li>
          <li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/company_data') }}"><i class="fa fa-building"></i> <span>Company Data</span></a></li>
          <li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/design') }}"><i class="fa fa-file-photo-o"></i> <span>Design</span></a></li>
          <li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/hubungi_kami') }}"><i class="fa fa-headphones"></i> <span>Hubungi Kami</span></a></li>
          <li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/mengapa') }}"><i class="fa fa-question-circle"></i> <span>Mengapa Kami</span></a></li>
            
              <li class="treeview">
                <a href="#">
                  <i class="fa fa-gear"></i>
                  <span>Settings</span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu" style="background: {{ $color->sidebar }}">
                  <li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/metadata') }}"><i class="fa fa-pencil"></i> <span>Metadata</span></a></li>
                  <li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/change-password') }}"><i class="fa fa-lock"></i> <span>Change Password</span></a></li>
                  <li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/admin_color') }}"><i class="fa fa-paint-brush"></i> <span>Change Color</span></a></li>
                </ul>
              </li>

          <!-- ======================================= -->
          <!-- <li class="header">{{ trans('backpack::base.user') }}</li>
          <li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/logout') }}"><i class="fa fa-sign-out"></i> <span>{{ trans('backpack::base.logout') }}</span></a></li> -->
        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>
