<header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="sistema.php" class="logo d-flex align-items-center">
        <img style="width: 150px;" src="assets/img/logo.png" alt="">   
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div>
    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">
        <li style="margin-right: 30px;" class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="uploads/users/<?php echo $_SESSION['img']; ?>" alt="Profile" class="rounded-circle" onerror="this.src='./assets/img/semperfil.png'">
            <span class="d-none d-md-block dropdown-toggle ps-2"></span>
          </a>
          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?php echo $_SESSION['nome']; ?></h6>
              <span>
              <?php
                        if ($_SESSION['tipo'] == 1) {
                          echo "Administrador";
                        }
                        if ($_SESSION['tipo'] == 2) {
                          echo "Associado";
                        }
                        if ($_SESSION['tipo'] == 3) {
                          echo "Marketing";
                        }
                        if ($_SESSION['tipo'] == 4) {
                          echo "Colunista";
                        }
                        ?>
              </span>
            </li>
            <li>
              <a class="dropdown-item d-flex align-items-center" href="logout.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sair</span>
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
  </header>