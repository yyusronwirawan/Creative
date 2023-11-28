<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/ico" href="{{asset('images/favicon.png?v.1')}}"/>

    {{-- Encrypted CSRF token for Laravel, in order for Ajax requests to work --}}
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>
      LakuCreative - Admin Panel
    </title>

    @yield('before_styles')

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/bower_components/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/bower_components/Ionicons/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/bower_components/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/AdminLTE.min.css') }}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/skins/_all-skins.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/bower_components/morris.js/morris.css') }}">

    <link rel="stylesheet" href="{{ asset('vendor/adminlte/plugins/pace/pace.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/bower_components/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/backpack/pnotify/pnotify.custom.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">

    <!-- BackPack Base CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/backpack/base/backpack.base.css') }}">

    <style type="text/css">
      .box-header.with-border {text-transform:uppercase;font-weight:600;}
    </style>
    @yield('after_styles')

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="hold-transition {{ config('backpack.base.skin') }} sidebar-mini">
	<script type="text/javascript">
		/* Recover sidebar state */
		(function () {
			if (Boolean(sessionStorage.getItem('sidebar-toggle-collapsed'))) {
				var body = document.getElementsByTagName('body')[0];
				body.className = body.className + ' sidebar-collapse';
			}
		})();
	</script>
    <!-- Site wrapper -->
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="{{ url('/lakucreative-admin') }}" class="logo" style="background-color: {{ $color->header }}">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b><img src="{{asset('images/favicon.png?v.1')}}" width="70%"></b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b><img src="{{ asset('images/logo.png?v.1') }}" width="100%"></b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top css-header" role="navigation" style="background-color: {{ $color->header }}">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button" style="color: black;">
            <span class="sr-only">{{ trans('backpack::base.toggle_navigation') }}</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>

          @include('backpack::inc.menu')
        </nav>
      </header>

      <!-- =============================================== -->

      @include('backpack::inc.sidebar')

      <!-- =============================================== -->

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
         @yield('header')

        <!-- Main content -->
        <section class="content">

          @yield('content')

        </section>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->

      <footer class="main-footer">
        <!-- @if (config('backpack.base.show_powered_by'))
            <div class="pull-right hidden-xs">
              {{ trans('backpack::base.powered_by') }} <a target="_blank" href="http://backpackforlaravel.com?ref=panel_footer_link">Backpack for Laravel</a>
            </div>
        @endif
        {{ trans('backpack::base.handcrafted_by') }} <a target="_blank" href="{{ config('backpack.base.developer_link') }}">{{ config('backpack.base.developer_name') }}</a>. -->
      </footer>
    </div>
    <!-- ./wrapper -->
   <!--  <style type="text/css">
      .css-header {
        background-color: white !important;
      }
      .css-header a.sidebar-toggle:hover {
        background-color: white !important;
      }
    </style> -->

    @yield('before_scripts')

    <!-- jQuery 2.2.0 -->
    <script src="{{ asset('vendor/adminlte/bower_components/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="{{ asset('vendor/adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendor/adminlte/bower_components/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('vendor/adminlte/bower_components/morris.js/morris.min.js') }}"></script>
    <script src="{{ asset('vendor/adminlte/plugins/pace/pace.min.js') }}"></script>
    <script src="{{ asset('vendor/adminlte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('vendor/adminlte/bower_components/fastclick/lib/fastclick.js') }}"></script>

    <script src="{{ asset('vendor/adminlte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('vendor/adminlte/dist/js/adminlte.min.js') }}"></script>
    <script src="{{ asset('vendor/adminlte/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('vendor/adminlte/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}"></script>
    <!-- Tiny MCE -->
    <script src="{{ asset('vendor/adminlte/bower_components/tinymce/js/tinymce/jquery.tinymce.min.js') }}"></script>
    <script src="{{ asset('vendor/adminlte/bower_components/tinymce/js/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('vendor/adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendor/adminlte/bower_components/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('vendor/adminlte/bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
   <!--  <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script> -->
    <script>tinymce.init({ selector:'textarea.tinymce' });</script>
    <!-- Select2 -->
    <script>
      $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()

        $('#datepicker').datepicker({
          autoclose: true,
          format: 'yyyy-mm-dd'
        })

        $('.datepicker').datepicker({
          autoclose: true,
          format: 'yyyy-mm-dd'
        })

        $('.datepicker_promo').datepicker({
          autoclose: true,
          format: 'yyyy-mm-dd',
          startDate: '-0d',
        })
        $('.my-colorpicker1').colorpicker()
        var dateToday = new Date(); 
        $('.reservationtime').daterangepicker({ timePicker: true, minDate: dateToday, timePickerIncrement: 30, locale: { format: 'MM/DD/YYYY hh:mm A' }})
        $('#dashboarddate').daterangepicker()
        $('.my-colorpicker1').colorpicker()
      })
    </script>
     <script>
        var editor_config = {
          path_absolute : "/",
          selector: "textarea.my-editor",
          plugins: [
            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime media nonbreaking save table contextmenu directionality",
            "emoticons template paste textcolor colorpicker textpattern"
          ],
          toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media | fontsizeselect",
          relative_urls: false,
          
          remove_script_host : false,

          convert_urls : true,
          file_browser_callback : function(field_name, url, type, win) {
            var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
            var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

            var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
            if (type == 'image') {
              cmsURL = cmsURL + "&type=Images";
            } else {
              cmsURL = cmsURL + "&type=Files";
            }

            tinyMCE.activeEditor.windowManager.open({
              file : cmsURL,
              title : 'Filemanager',
              width : x * 0.8,
              height : y * 0.8,
              resizable : "yes",
              close_previous : "no"
            });
          }
        };

        tinymce.init(editor_config);
      </script>
      <script>
        $('#discount_type').on('change', function() {
        if(this.value == 1){
          $('.discount_field').show();
          $('.nominal_field').hide();
        }else if( this.value == 2){
          $('.nominal_field').show();
          $('.discount_field').hide();
        }else{
          $('.discount_field').hide();
          $('.nominal_field').hide();
        }
      });

      $('#product_featured').on('change', function() {
          if(this.value == 1){
            $('.influencer_name').show();
          }else{
            $('.influencer_name').hide();
          }
      });

      $('#coupon_type').on('change', function() {

        if(this.value == 'Percentage Discount'){
          $('#percentage_type').show();
          $('#nominal_type').hide();
        }else{  
          $('#nominal_type').show();
          $('#percentage_type').hide();
        }
      });

      var url = window.location;

      // for sidebar menu entirely but not cover treeview
      $('ul.sidebar-menu a').filter(function() {
         return this.href == url;
      }).parent().addClass('active');

      // for treeview
      $('ul.treeview-menu a').filter(function() {
         return this.href == url;
      }).parentsUntil(".sidebar-menu > .treeview-menu").addClass('active');

      $('#dataTable').DataTable({
        'paging'      : true,
        'lengthChange': false,
        'searching'   : true,
        'ordering'    : false,
        'info'        : true,
        'autoWidth'   : false
      })
      </script>

    <!-- page script -->

    @include('backpack::inc.alerts')

    @yield('after_scripts')

    <!-- JavaScripts -->
</body>
</html>
