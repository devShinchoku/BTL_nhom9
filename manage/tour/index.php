<?php
session_start();
if (!isset($_SESSION['user_id'])) {
  header('location:../../accounts/');
} else {
  if ($_SESSION['permission'] > 1) {
    header('location:../../');
  } else {
    if (isset($_GET['id'])) {
    require '../../template/header2.php';

?>
          <ul class="list-unstyled" style="font-size: 1rem;">
            <li class="mb-1" style="font-size: 1.25rem;">
              <a class="btn category-list menu-item" href="../">Quay lại</a>
            </li>
            <li class="mb-1">
              <button class="btn category-list selected menu-item" data-tab="0">Chung</button>
            </li>
            <li class="mb-1">
              <button class="btn category-list menu-item" data-tab="1">Chặng</button>
            </li>
            <li class="mb-1">
              <button class="btn category-list menu-item" data-tab="2">Dịch vụ</button>
            </li>
            <li class="mb-1">
              <button class="btn category-list menu-item" data-tab="3">Thiết lập</button>
            </li>
          </ul>
        </div>
        <main>
          <div class="container mt-5 p-2" style="margin-top: 7rem!important;">
            <div id="tour-info">

            </div>
          </div>
        </main>
        <script>
          var id = <?php echo $_GET['id']; ?>;
        </script>
        <script src="../../js/tour.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
      </body>

      </html>
<?php
    }
  }
}
?>