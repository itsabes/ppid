<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= namaweb(); ?> | Cek Email</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Icon -->
  <link rel="icon" type="image/x-icon" href="<?= icon(); ?>">
  <link rel="apple-touch-icon" type="image/x-icon" href="<?= icon(); ?>">
  <link rel="shortcut icon" type="image/png" href="<?= icon(); ?>">
  <!-- Bootstrap 3.3.5 -->
  <link rel="stylesheet" href="<?= base_url() ?>AdminLTE3/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>AdminLTE3/dist/css/AdminLTE.min.css">
  <!-- jQuery 2.1.4 -->
  <script src="<?= base_url() ?>AdminLTE3/plugins/jQuery/jQuery-2.1.4.min.js"></script>

  <style type="text/css">
    .login-page {
      background: url(assets/img/bg-tellow.png) no-repeat center center fixed;
      -webkit-background-size: cover;
      -moz-background-size: cover;
      -o-background-size: cover;
      background-size: cover;
    }

    #main_cont {
      /* background: rgba(255, 255, 255, 0.3);
      padding: 20px;
      width: 420px;
      margin: 0 auto;
      margin-top: 0px; */
      padding: 20px;
      margin-top: 100px;
    }

    .form-box {
      width: 380px;
      margin: auto;
    }

    .form-box .header {
      -webkit-border-top-left-radius: 4px;
      -webkit-border-top-right-radius: 4px;
      -webkit-border-bottom-right-radius: 0;
      -webkit-border-bottom-left-radius: 0;
      -moz-border-radius-topleft: 4px;
      -moz-border-radius-topright: 4px;
      -moz-border-radius-bottomright: 0;
      -moz-border-radius-bottomleft: 0;
      border-top-left-radius: 4px;
      border-top-right-radius: 4px;
      border-bottom-right-radius: 0;
      border-bottom-left-radius: 0;
      background: #4455FF url(assets/img/bg-yellow.png) no-repeat bottom;
      box-shadow: inset 0px -3px 0px rgba(0, 0, 0, 0.2);
      padding: 20px 10px;
      text-align: center;
      font-size: 30px;
      font-weight: 300;
      color: #fff;
    }

    .form-box .body,
    .form-box .footer {
      padding: 10px 20px;
      background: #fff;
      background-color: rgb(255, 255, 255);
      color: #444;
    }

    .bg-gray {
      background-color: #eaeaec !important;
    }

    .left-side {
      /* background: rgba(255, 255, 255, 0.3); */
      width: 50%;
    }
  </style>
</head>

<body class="hold-transition login-page">
  <!-- Bootstrap 3.3.5 -->
  <script src="<?= base_url() ?>AdminLTE3/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

  <script lang="javascript">
    $(document).ready(function() {
      alert('Link reset password di kirim via email, silahkan mengecek email secara berkala');
    });
  </script>
</body>

</html>