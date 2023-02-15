<?php
require_once "db_config.php";
session_start();
date_default_timezone_set('America/Sao_Paulo');
ini_set('default_charset', 'utf-8');
if (isset($_SESSION['logado'])) :
else :
  header("Location: index.php");
endif;
error_reporting(~E_ALL); // avoid notice


if (isset($_GET['delete_id'])) {
  // it will delete an actual record from db
  $stmt_delete = $DB_con->prepare('DELETE FROM usuarios WHERE id =:uid');
  $stmt_delete->bindParam(':uid', $_GET['delete_id']);
  $stmt_delete->execute();

  header("Location: sistema.php");
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Associados - MOVE PIAUÍ</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="./assets/img/logo.png" rel="icon">
  <link href="./assets/img/logo.png" rel="apple-touch-icon">


  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>
  <?php include "components/nav.php" ?>
  <?php include "components/sidebar.php" ?>

  <main id="main" class="main">

    <div class="pagetitle">
      <div class="d-flex justify-content-between">
        <h1 class="text-white">Associados MOVE</h1>
        <a href="https://movepiaui.com.br/admin/config/adicionar_associado.php">
          <button class="btn btn-light"><i class="bi bi-plus-circle-fill"></i> Adicionar Associado</button>
        </a>
      </div>
      <div class="d-flex justify-content-between">
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="sistema.php">Home</a></li>
          </ol>
        </nav>

      </div>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <?php
        $stmt = $DB_con->prepare('SELECT * FROM usuarios where tipo=2 ORDER BY id DESC');
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
          while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
        ?>

            <div class="col-lg-3">
              <div class="card">
                <div class="card-body">
                  <h5 style="font-weight: 600;" class="card-title text-center"><?php echo $nome; ?></h5>
                  <img style="height:200px;width:100%" class="img-fluid rounded" src="https://movepiaui.com.br/admin/uploads/associados/<?php echo $row['img']; ?>" onerror="this.src='./assets/img/semperfil.png'">
                  <div class="d-flex justify-content-between pt-2 mt-3">
                    <a href="https://movepiaui.com.br/admin/config/perfil_associado.php?id=<?php echo $row['id']; ?>">
                      <button type="button" class="btn btn-success">Visualizar</button>
                    </a>
                    <a href="?delete_id=<?php echo $row['id']; ?>">
                      <button type="button" class="btn btn-danger">Excluir</button>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          <?php
          }
        } else {
          ?>
          <div class="bg-yellow-500 px-4 py-4 rounded">
            <div>
              <p class="text-blueGray-600 font-bold">Sem Usuários Cadastrado ...</p>
            </div>
          </div>
        <?php
        }
        ?>
      </div>
    </section>

  </main><!-- End #main -->

  <?php include "components/footer.php"; ?>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>