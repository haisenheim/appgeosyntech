<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= asset('/plugins/fontawesome-free/css/all.min.css') ?>">

  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= asset('dist/css/adminlte.min.css') ?>">
  <!-- Google Font: Source Sans Pro -->

</head>
<body style="background: url('<?= asset('img/logo-obac.png') ?>'); background-size: cover" class="hold-transition login-page">
<div class="login-box" style="background: #FFFFFF">
  <div class="login-logo">
        <div style="width: 200px; margin: 15px auto;">
            <img src="<?= asset('img/logo-obac.png') ?>" alt="" style="width: 150px; height: 150px; border-radius: 50%"/>
        </div>
  </div>
  <!-- /.login-logo -->
  <div class="card" style="border: 1px solid #007bff">
    <div style="border-radius: 5%;" class="card-body login-card-body">
      <p class="login-box-msg">ACCEDEZ A VOTRE ESPACE</p>

      <form action="../../index3.html" method="post">
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Mot de passe">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">

          <!-- /.col -->
          <div class="col-12">
            <button type="submit" style="border-radius: 5%" class="btn btn-outline-primary btn-block">CONNEXION</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center mb-3">
        <p>- OU -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Se connecter par Facebook
        </a>

      </div>
      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="#">J'ai oublié mon mot de passe</a>
      </p>
      <p class="mb-0">
        <a href="/regiter" class="text-center">Créer un nouveau compte</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?= asset('plugins/jquery/jquery.min.js') ?>"></script>
<!-- Bootstrap 4 -->
<script src="<?= asset('plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

</body>
</html>