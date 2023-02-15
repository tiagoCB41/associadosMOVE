<aside id="sidebar" class="sidebar">
  <ul class="sidebar-nav" id="sidebar-nav">
    <?php
    if ($_SESSION['tipo'] == 1 || $_SESSION['tipo'] == 2 || $_SESSION['tipo'] == 3 || $_SESSION['tipo'] == 4) {
    ?>
      <li class="nav-item">
        <a class="nav-link collapsed " href="sistema.php">
          <i class="bi bi-grid"></i>
          <span>Sistema</span>
        </a>
      </li><!-- End Dashboard Nav -->
    <?php } ?>
    <li class="nav-heading">Configurações</li>
    <li class="nav-item">
      <a class="nav-link collapsed" href="logout.php">
        <i class="bi bi-box-arrow-right"></i>
        <span>Sair</span>
      </a>
    </li><!-- End F.A.Q Page Nav -->
  </ul>

</aside><!-- End Sidebar-->