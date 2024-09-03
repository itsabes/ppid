<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Aplikasi Catatan Atas Laporan Keuangan Kota Serang  |  Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="shortcut icon" type="image/png" href="<?php echo base_url(); ?>assets/img/favicon.png"/>
  <!-- Bootstrap 3.3.5 -->
  <link rel="stylesheet" href="<?php echo base_url()?>AdminLTE3/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url()?>AdminLTE3/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url()?>AdminLTE3/plugins/iCheck/square/blue.css">

  <!-- jQuery 2.1.4 -->
  <script src="<?php echo base_url()?>AdminLTE3/plugins/jQuery/jQuery-2.1.4.min.js"></script>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <!--
  <style type="text/css">
  body {
    background-image: url("<?php echo base_url(); ?>assets/img/gambar_aset.jpg");
  }
  </style>
  -->

</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="<?php echo base_url() ?>"><img src="<?php echo base_url('assets/img/logocalk.png') ?>" width="100px"></a><br>
    <!--<img src="<?php echo base_url(); ?>assets/img/sippla.png" width="200px"><br>-->
    <strong><font size="2">Aplikasi Catatan Atas Laporan Keuangan Kota Serang</font></strong>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <!--<p class="login-box-msg">Login Ke Aplikasi</p>-->

    <?php echo form_open('auth/login','id="form-login"')?>
      <span id="form-pesan">          
      </span>
      <div class="form-group has-feedback">
        <input type="text" name="username" id="username" class="form-control" placeholder="Username">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Remember Me
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" id="btn-submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    <?php echo form_close(); ?>

    <!--
    <div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
        Google+</a>
    </div>-->
    <!-- /.social-auth-links -->
    <!--
    <a href="#">I forgot my password</a><br>
    <a href="register.html" class="text-center">Register a new membership</a>
    -->
    <br>
    <!--
    <div align="center">
      PT. SEMEN INDONESIA BETON
    </div>-->
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->


<!-- Bootstrap 3.3.5 -->
<script src="<?php echo base_url()?>AdminLTE3/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<!-- iCheck -->
<script src="<?php echo base_url()?>AdminLTE3/plugins/iCheck/icheck.min.js"></script>



<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>

<script lang="javascript">
    $(document).ready(function(){
        $('#username').focus();
        
        //Form Login            
        $('#form-login').submit(function(){        
            $.ajax({
                url:"<?php echo site_url()?>auth/login",
                type:"POST",
                data:$('#form-login').serialize(),
                cache: false,
                success:function(respon){
                    var obj = $.parseJSON(respon);
                    if(obj.status==1){
                        window.open("<?php echo site_url()?>dashboard","_self")
                    }else{
                        $('#form-pesan').html(pesan_err(obj.error));
                    }
                }
            });
            return false;
        });
        
        $('#btn-submit').click(function(){
            $('#form-login').submit();
        });
        
        $(document).bind("ajaxSend", function() {
            $("#spinner").show();
        }).bind("ajaxStop", function() {
            $("#spinner").hide();
        }).bind("ajaxError", function() {
            $("#spinner").hide();
        });            
    });
</script>

</body>



</html>
