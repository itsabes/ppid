<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= namaweb(); ?> | Log in</title>
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
      background: url(assets/img/white-bg.jpg) no-repeat center center fixed;
      -webkit-background-size: cover;
      -moz-background-size: cover;
      -o-background-size: cover;
      background-size: cover;
    }

    #main_cont {
      /* background: rgba(255, 255, 255, 0.3);
      
      width: 420px;
      margin: 0 auto;
      margin-top: 0px; */
      padding: 20px;
      margin-top: 100px;
    }

    .form-box {
      width: 320px;
      margin: 0 auto;
      box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
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
  <div class="col-md-12">
    <div id="main_cont">
      <div class="form-box" style="margin-bottom: 1em;">
        <div class="header">
          <img src="<?= logo() ?>" height="65"><br>
        </div>
        <?= form_open('auth/login', 'id="form-login"') ?>
        <div class="body bg-white">
          <span id="form-pesan" class="text-danger mb-0">
          </span>
          <div class="form-group">
            <input type="text" name="username" id="username" class="usrname form-control" placeholder="Username">
          </div>
          <div class="form-group">
            <input type="password" name="password" class="pass form-control" placeholder="Password">
          </div>
        </div>
        <div class="footer">
          <button type="submit" name="submit" id="submit" class="btn bg-blue btn-block">Masuk</button>
          <div class="text-center" style="margin-top:10px">
            <div class="pull-left">
              <span>Lupa password? <br>
                <a href="<?= base_url() ?>lupaPassword">Reset Password</a>
              </span>
            </div>
            <div class="text-right">
              <span>Belum memiliki akun? <br>
                <a href="<?= base_url() ?>auth/register_pemohon">Registrasi Pemohon</a>
              </span>
            </div>
            <div class="text-center" style="margin-top: 10px;">
              <a href="<?= site_url() ?>">Kembali ke Halaman Depan</a>
            </div>
          </div>
        </div>
        <?= form_close(); ?>
      </div>
    </div>
  </div>

  <!-- Bootstrap 3.3.5 -->
  <script src="<?= base_url() ?>AdminLTE3/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

  <script lang="javascript">
    $(document).ready(function() {
      window.addEventListener("keydown", function(e) {
        // Hanya jalankan kode jika tombol enter ditekan
        if (e.key === "Enter") {
          // Cek apakah elemen input atau textarea yang memiliki fokus saat ini
          var target = e.target;
          if (target.tagName === "INPUT") {
            // Jangan teruskan aksi default submit form
            e.preventDefault();

            // Anda juga dapat menambahkan logika lain di sini jika diperlukan
            // Misalnya, validasi input sebelum mengizinkan submit
          }
        }
      });

      $('#username').focus();

      //Form Login            
      $('#form-login').submit(function() {
        $.ajax({
          url: "<?= site_url() ?>auth/login",
          type: "POST",
          data: $('#form-login').serialize(),
          cache: false,
          success: function(respon) {
            var obj = $.parseJSON(respon);
            if (obj.status == 1) {
              window.open("<?= site_url() ?>dashboard", "_self")
            } else {
              $('#form-pesan').html(obj.error);
            }
          }
        });
        return false;
      });
    });
  </script>
</body>

</html>