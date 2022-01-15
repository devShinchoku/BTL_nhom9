<?php
session_start();
if (!isset($_SESSION['user_id'])) {
  header('location:../accounts/');
} else {
  if ($_SESSION['permission'] > 1) {
    header('location:../');
  } else {
    require '../template/header2.php';
    
?>
<link rel="stylesheet" href="../css/admin.css">
        <ul class="list-unstyled">
          <li class="mb-1">
            <button class="btn category-list selected menu-item" id="btnDashboard" data-tab="0">Tổng quan</button>
          </li>
          <li class="mb-1">
            <button class="btn category-list menu-item" id="btnOder" data-tab="1">Danh sách hóa đơn</button>
          </li>
          <li class="mb-1">
            <button class="btn category-list menu-item" id="btnCate" data-tab="2">Danh sách chủ đề Tour</button>
          </li>
          <li class="mb-1">
            <button class="btn category-list menu-item" id="btnTour" data-tab="3">Danh sách Tour</button>
          </li>
          <li class="mb-1">
            <button class="btn category-list menu-item" id="btnCreateCate" data-tab="4">Tạo chủ đề Tour</button>
          </li>
          <li class="mb-1">
            <button class="btn category-list menu-item" id="btnCreatetour" data-tab="5">Tạo Tour</button>
          </li>
          <?php
          if($_SESSION['permission'] == 0){
          ?>
          <hr>
          <li class="mb-1">
            <button class="btn category-list menu-item" id="btnAccount" data-tab="6">Quản lý tài khoản</button>
          </li>
          <?php
          }
          ?>
        </ul>
      </div>
      <main class="container mt-5">
        <div class="main" style="margin-top: 7rem!important;">
          <div id="tabload"></div>
        </div>
      </main>

      <script>
        var host_id = <?php echo $_SESSION['user_id']; ?>;
      </script>
      <script src="../js/manage.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    </body>

    </html>
<?php
  }
}
?>