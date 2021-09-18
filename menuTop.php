<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
  <div class="container-fluid">
    <!-- <button class="btn btn-primary" id="sidebarToggle"><i class="fas fa-bars"></i> เมนู</button> -->
    <button class="navbar-toggler rounded collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
        <li class="nav-item active"><span class="nav-link" href="#!">ระบบ สำรวจการฉีดวัคซีนนักเรียนนักศึกษา วิทยาลัยเทคนิคชลบุรี</span></li>
        <?php if (empty($_SESSION["status"])) { ?>
          <li class="nav-item active"><a class="nav-link" href="index.php"><i class="fas fa-sign-in-alt"></i> เข้าสู่ระบบ</a></li>
        <?php } else { ?>
          <li class="nav-item active"><a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt"></i> ออกจากระบบ</a></li>
          <?php if ($_SESSION["status"] == "admin") { ?>
            <li class="nav-item active"><a class="nav-link" href="manageData.php"><i class="fas fa-tasks"></i> จัดการข้อมูล</a></li>
          <?php } ?>
          <?php if ($_SESSION["status"] == "officer" || $_SESSION["status"] == "teacher") { ?>
            <li class="nav-item active"><a class="nav-link" href="show_sum_group.php"><i class="fas fa-file"></i> รายงานสรุป</a></li>
          <?php } ?>
        <?php } ?>

        <!-- <li class="nav-item"><a class="nav-link" href="#!">Link</a></li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#!">Action</a>
            <a class="dropdown-item" href="#!">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#!">Something else here</a>
          </div>
        </li> -->
      </ul>
    </div>
  </div>
</nav>