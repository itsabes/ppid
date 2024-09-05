<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= namaweb(); ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Icon -->
  <link rel="icon" type="image/x-icon" href="<?= icon(); ?>">
  <link rel="apple-touch-icon" type="image/x-icon" href="<?= icon(); ?>">
  <link rel="shortcut icon" type="image/png" href="<?= icon(); ?>">
  <!-- Bootstrap 3.3.5 -->
  <link rel="stylesheet" href="<?= base_url(); ?>AdminLTE3/bootstrap/css/bootstrap.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?= base_url(); ?>AdminLTE3/plugins/select2/select2.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url(); ?>AdminLTE3/font-awesome-4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?= base_url(); ?>AdminLTE3/plugins/iCheck/flat/blue.css">
  <link rel="stylesheet" href="<?= base_url(); ?>AdminLTE3/plugins/iCheck/all.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?= base_url(); ?>AdminLTE3/plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?= base_url(); ?>AdminLTE3/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?= base_url(); ?>AdminLTE3/plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?= base_url(); ?>AdminLTE3/plugins/daterangepicker/daterangepicker-bs3.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?= base_url(); ?>AdminLTE3/plugins/datatables/dataTables.bootstrap.css">
  <!-- Ion Slider -->
  <link rel="stylesheet" href="<?= base_url(); ?>AdminLTE3/plugins/ionslider/ion.rangeSlider.css">
  <!-- ion slider Nice -->
  <link rel="stylesheet" href="<?= base_url(); ?>AdminLTE3/plugins/ionslider/ion.rangeSlider.skinNice.css">
  <!-- bootstrap slider -->
  <link rel="stylesheet" href="<?= base_url(); ?>AdminLTE3/plugins/bootstrap-slider/slider.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url(); ?>AdminLTE3/dist/css/AdminLTE.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?= base_url(); ?>AdminLTE3/dist/css/skins/_all-skins.min.css">
  <!-- jQuery 2.1.4 -->
  <script src="<?= base_url(); ?>AdminLTE3/plugins/jQuery/jQuery-2.1.4.min.js"></script>

  <style>
    .table thead {
      background-color: #34495E;
      color: #fff;
    }
  </style>

  <?php
  $app              = $this->access->get_aplikasi();
  $level            = $this->access->get_level();
  $nama             = $this->access->get_nama();
  $foto             = ''; //$this->access->get_foto();
  $id_pegawai       = 0; //$this->access->get_pegawai();

  if ($app == "ppid-dinkes") {
    $colorskin      = "skin-black";
    $appname        = "ppid-dinkes";
    $bgdrop         = "bg-green";
  } else {
    $colorskin      = "skin-black";
  }
  ?>
</head>

<body class="hold-transition <?= $colorskin ?> sidebar-mini fixed">
  <div class="wrapper">

    <header class="main-header">
      <!-- Logo START -->
      <a href="<?= base_url(); ?>" class="logo" style="background: #254A74;">
        <!-- mini logo for sidebar mini 50x50 pixels START -->
        <span class="logo-mini">
          <img src="<?= logo(); ?>" width="30px">
        </span>
        <!-- mini logo for sidebar mini 50x50 pixels END -->

        <!-- logo for regular state and mobile devices START -->
        <span class="logo-lg">
          <img src="<?= logo(); ?>" height="40px" />
        </span>
        <!-- logo for regular state and mobile devices END -->
      </a>
      <!-- Logo END -->

      <!-- Header Navbar START -->
      <nav class="navbar navbar-static-top" role="navigation" style="background-color: #254A74;">
        <!-- Sidebar toggle button START -->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button" style="color: #fff;">
          <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Sidebar toggle button END -->

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <li class="dropdown user user-menu">

              <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                <?php if (!empty($foto)) { ?>
                  <img src="<?= base_url(); ?>upload/pegawai/<?= $foto; ?>" class="user-image" alt="User Image">
                <?php } else { ?>
                  <img src="<?= base_url(); ?>assets/img/no-image.jpg" class="user-image" alt="User Image">
                <?php } ?>

                <span class="hidden-xs" style="color: #fff;">
                  <?php
                  $nama     = $this->access->get_nama();

                  if (!empty($nama)) {
                    echo $nama;
                  } else {
                    echo 'Administrator';
                  }
                  ?>
                </span>
              </a>

              <ul class="dropdown-menu">
                <!-- Menu Header START -->
                <li class="user-header">
                  <?php if (!empty($foto)) { ?>
                    <img src="<?= base_url(); ?>upload/pegawai/<?= $foto; ?>" class="img-circle" alt="User Image">
                  <?php } else { ?>
                    <img src="<?= base_url(); ?>assets/img/no-image.jpg" class="img-circle" alt="User Image">
                  <?php } ?>

                  <p>
                    <?php
                    $nama     = $this->access->get_nama();

                    if (!empty($nama)) {
                      echo $nama;
                    } else {
                      echo 'Administrator';
                    }
                    ?>
                    <small><?= namaweb(); ?></small>
                  </p>
                </li>
                <!-- Menu Header END -->

                <!-- Menu Body START -->
                <!-- <li class="user-body">
                  <div class="row">
                    <div class="col-xs-4 text-center">
                      <a href="#">Followers</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Sales</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Friends</a>
                    </div>
                  </div>
                </li> -->
                <!-- Menu Body END -->

                <!-- Menu Footer START-->
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="javascript:void(0)" class="btn btn-info btn-flat" id="edit-profile">Profile</a>
                  </div>
                  <div class="pull-right">
                    <a href="<?= site_url() ?>auth/logout" class="btn btn-danger  btn-flat">Sign out</a>
                  </div>
                </li>
                <!-- Menu Footer END-->
              </ul>

            </li>
          </ul>
        </div>
      </nav>
      <!-- Header Navbar END -->
    </header>

    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
          <li class="active treeview">
            <a href="<?= base_url(); ?>dashboard">
              <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            </a>
          </li>

          <?php
          if ($level == 'admin') {
            $menu         = $this->db->query("SELECT * from menu where is_parent=0 and is_active=1 and pos = 1 and (aplikasi='$app' or aplikasi='*') ORDER BY urut ASC");
          } else {
            $menu         = $this->db->query("SELECT * from menu where is_parent=0 and is_active=1 and pos = 1 and (aplikasi='$app' or aplikasi='*') and (level='$level' or level='*') ORDER BY urut ASC");
          }

          foreach ($menu->result() as $m) {
            // chek ada sub menu
            if ($level == 'admin') {
              $submenu    = $this->db->query("SELECT * from menu where is_parent=$m->id and is_active=1 and pos = 1 and (aplikasi='$app' or aplikasi='*') ORDER BY urut ASC");
            } else {
              $submenu    = $this->db->query("SELECT * from menu where is_parent=$m->id and is_active=1 and pos = 1 and (aplikasi='$app' or aplikasi='*') and (level='$level' or level='*') ORDER BY urut ASC");
            }

            if ($submenu->num_rows() > 0) {
              // tampilkan submenu   
              $menusid    = "m" . $m->id;

              echo "<li class='treeview " . $this->session->userdata($menusid) . "'>
                    " . anchor('#',  "<i class='$m->icon'></i><span>" . $m->name . ' </span><i class="fa fa-angle-left pull-right"></i>') . "
                        <ul class='treeview-menu'>";

              foreach ($submenu->result() as $s) {
                $menuid   = "m" . $s->id;

                echo "<li id='" . $s->id . "' class='menus " . $this->session->userdata($menuid) . "'>" . anchor(site_url() . $s->link, "<i class='$s->icon'></i> <span>" . $s->name) . "</span></li>";
              }
              echo "</ul>
                    </li>";
            } else {
              $menusid    = "m" . $m->id;

              echo "<li id='" . $m->id . "' class='menus " . $this->session->userdata($menusid) . "'>" . anchor(site_url() . $m->link, "<i class='$m->icon'></i> <span>" . $m->name) . "</span></li>";
            }
          }
          ?>
        </ul>
        <!-- /.sidebar menu -->

      </section>
      <!-- /.sidebar -->
    </aside>
    <!-- /.Left side column -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <!--<section class="content-header">-->
      <?php
      echo $contents;
      ?>
      <!--</section>-->
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
      <div class="pull-right hidden-xs">
        <b>Version</b> 1.0
      </div>
      <strong>Copyright &copy; <?= date("Y"); ?> <a href="http://dinkes.jakarta.go.id/">Dinas Kesehatan Provinsi DKI Jakarta</a>.</strong>
      Developed By Seksi Data, Informasi dan Hubungan Masyarakat Dinas Kesehatan Provinsi DKI Jakarta
    </footer>

    <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>

  </div>
  <!-- ./wrapper -->

  <!-- jQuery UI 1.11.4 -->
  <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>

  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button);
  </script>

  <!-- Bootstrap 3.3.5 -->
  <script src="<?= base_url(); ?>AdminLTE3/bootstrap/js/bootstrap.min.js"></script>
  <!-- select2 -->
  <script src="<?= base_url(); ?>AdminLTE3/plugins/select2/select2.full.min.js"></script>
  <!-- Morris.js charts -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="<?= base_url(); ?>AdminLTE3/plugins/morris/morris.min.js"></script>
  <!-- ChartJS 1.0.1 -->
  <script src="<?= base_url(); ?>AdminLTE3/plugins/chartjs/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src="<?= base_url(); ?>AdminLTE3/plugins/sparkline/jquery.sparkline.min.js"></script>
  <!-- jvectormap -->
  <script src="<?= base_url(); ?>AdminLTE3/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
  <script src="<?= base_url(); ?>AdminLTE3/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="<?= base_url(); ?>AdminLTE3/plugins/knob/jquery.knob.js"></script>
  <!-- daterangepicker -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
  <script src="<?= base_url(); ?>AdminLTE3/plugins/daterangepicker/daterangepicker.js"></script>
  <!-- datepicker -->
  <script src="<?= base_url(); ?>AdminLTE3/plugins/datepicker/bootstrap-datepicker.js"></script>
  <!-- InputMask -->
  <script src="<?= base_url(); ?>AdminLTE3/plugins/input-mask/jquery.inputmask.js"></script>
  <script src="<?= base_url(); ?>AdminLTE3/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
  <script src="<?= base_url(); ?>AdminLTE3/plugins/input-mask/jquery.inputmask.extensions.js"></script>
  <!-- DataTables -->
  <script src="<?= base_url(); ?>AdminLTE3/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= base_url(); ?>AdminLTE3/plugins/datatables/dataTables.bootstrap.min.js"></script>
  <!-- Slimscroll -->
  <script src="<?= base_url(); ?>AdminLTE3/plugins/slimScroll/jquery.slimscroll.min.js"></script>
  <!-- FastClick -->
  <script src="<?= base_url(); ?>AdminLTE3/plugins/fastclick/fastclick.min.js"></script>
  <!-- AdminLTE3 App -->
  <script src="<?= base_url(); ?>AdminLTE3/dist/js/app.min.js"></script>
  <!-- Ion Slider -->
  <script src="<?= base_url(); ?>AdminLTE3/plugins/ionslider/ion.rangeSlider.min.js"></script>
  <!-- Bootstrap slider -->
  <script src="<?= base_url(); ?>AdminLTE3/plugins/bootstrap-slider/bootstrap-slider.js"></script>
  <script src="<?= base_url(); ?>AdminLTE3/plugins/ckeditor/ckeditor.js"></script>
  <!-- AdminLTE3 dashboard demo (This is only for demo purposes) -->
  <script src="<?= base_url(); ?>AdminLTE3/dist/js/pages/dashboard.js"></script>
  <!-- AdminLTE3 for demo purposes -->
  <script src="<?= base_url(); ?>AdminLTE3/dist/js/demo.js"></script>

  <script>
    $.AdminLTESidebarTweak = {};

    $.AdminLTESidebarTweak.options = {
      EnableRemember: true,
      NoTransitionAfterReload: false
      //Removes the transition after page reload.
    };

    $(document).ready(function() {
      $('.menus').click(function() {
        var idMenu = $(this).attr('id');
        $.post('<?= base_url(); ?>dashboard/currMenu', {
          idMenu: idMenu
        });
      });
    });

    $(function() {
      "use strict";

      $("body").on("collapsed.pushMenu", function() {
        if ($.AdminLTESidebarTweak.options.EnableRemember) {
          document.cookie = "toggleState=closed";
        }
      }).on("expanded.pushMenu", function() {
        if ($.AdminLTESidebarTweak.options.EnableRemember) {
          document.cookie = "toggleState=opened";
        }
      });
    });
  </script>

  <!-- Page script -->
  <script type="text/javascript">
    $(function() {
      //Initialize datepicker3 Elements
      $('.datepicker').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: 'true',
        language: 'id'
      });

      //Initialize Select2 Elements
      $(".select2").select2();

      //Datemask dd/mm/yyyy
      $("#datemask").inputmask("dd/mm/yyyy", {
        "placeholder": "dd/mm/yyyy"
      });

      //Datemask2 mm/dd/yyyy
      $("#datemask2").inputmask("mm/dd/yyyy", {
        "placeholder": "mm/dd/yyyy"
      });

      //Money Euro
      $("[data-mask]").inputmask();

      //Date range picker
      $('#reservation').daterangepicker();

      //Date range picker with time picker
      $('#reservationtime').daterangepicker({
        timePicker: true,
        timePickerIncrement: 30,
        format: 'MM/DD/YYYY h:mm A'
      });

      //Date range as a button
      $('#daterange-btn').daterangepicker({
          ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          },
          startDate: moment().subtract(29, 'days'),
          endDate: moment()
        },
        function(start, end) {
          $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
      );
    });
  </script>
</body>

</html>