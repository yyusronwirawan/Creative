<div class="navbar-custom-menu pull-left">
    <ul class="nav navbar-nav">
        <!-- =================================================== -->
        <!-- ========== Top menu items (ordered left) ========== -->
        <!-- =================================================== -->

        <!-- <li><a href="{{ url('/') }}"><i class="fa fa-home"></i> <span>Home</span></a></li> -->

        <!-- ========== End of top menu left items ========== -->
    </ul>
</div>


<div class="navbar-custom-menu">
    <ul class="nav navbar-nav">
      <!-- ========================================================= -->
      <!-- ========== Top menu right items (ordered left) ========== -->
      <!-- ========================================================= -->

      <!-- <li><a href="{{ url('/') }}"><i class="fa fa-home"></i> <span>Home</span></a></li> -->
        <?php 
          //dd(session('__ADMINSESSION__'));
          $getUser = session('__ADMINSESSION__');
            if($getUser){ ?>
                <!-- <li><a href="{{ url(config('backpack.base.route_prefix').'/auth/change-password') }}"><i class="fa fa-lock"></i> <span>Change Password</span></a></li> -->
                <li><a href="{{ url(config('backpack.base.route_prefix').'/auth/logout') }}"><i class="fa fa-btn fa-sign-out"></i> <span>{{ trans('backpack::base.logout') }}</span></a></li>
                
            <?php } 
        ?>
        
    </ul>
</div>

<style type="text/css">
  .navbar-nav li a {
    color: black !important;
  }
</style>
