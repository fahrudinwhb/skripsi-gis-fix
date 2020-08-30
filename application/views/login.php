<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <!--    new link -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/iCheck/square/blue.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/style.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/sweetalert2.min.css">
    <!--   end new link-->
</head>
<body class="login">
    <div class="login-box h-login">
        <div class="login-logo">
          <img src="<?php echo base_url() ?>assets/logo.png" class="logo-lantas" alt="">
          <h1>Admin</h1>
<!--          <p class="nama-app">Sistem Informasi Pemetaan Kecelakaan Kota Batu</p>-->
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body box-l">
            <p class="login-box-msg"> Silahkan Login Untuk Mendapat Hak Akses Sistem </p>
            <form action="<?php echo site_url('c_akses/login') ?>" method="post">
                <div class="form-group has-feedback">
                  <!-- <label for="username">Username</label> -->
                    <input type="text" class="form-control" id="username" name="username" required>
                    <span class="glyphicon glyphicon-user form-control-feedback"></span> </div>
                <div class="form-group has-feedback">
                  <!-- <label for="password">Password</label> -->
                    <input type="password" class="form-control" id="password" name="kata_sandi" required>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span> </div>
                <div class="row">
                    <!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Login</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
        </div>
        <!-- /.login-box-body -->
    </div>
    <!--   end new login-->
    <!--    new script-->
    <script src="<?php echo base_url() ?>assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
    <script src="<?php echo base_url() ?>assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/iCheck/icheck.min.js"></script>
    <script src="<?php echo base_url() ?>assets/sweetalert2.min.js"></script>
    <script type="text/javascript">

    </script>
    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue'
                , radioClass: 'iradio_square-blue'
                , increaseArea: '20%' // optional
            });
        });
    </script>
    <script>
    <?php if($this->session->flashdata('login') == 'gagal'){
      echo '$( document ).ready(function() {
        swal("Error!", "Cek Username dan Password", "error");
      })';
        // echo 'alert("Login Gagal, Cek Username dan Password anda")';
    }
     ?>
    </script>
    <!--end new script-->
</body>

</html>
