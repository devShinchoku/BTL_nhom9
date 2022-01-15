<?php
if (isset($_GET['id'])) {
  session_start();
  if (!isset($_SESSION['user_id'])) {
    header('location:../');
  } else {
    if ($_SESSION['permission'] > 1) {
      header('location:../');
    } else {

      require '../../config/db.php';
      require '../../template/header2.php';
      $sql = "SELECT * FROM db_order WHERE order_id = {$_GET['id']}";
      $result = mysqli_query($conn, $sql);
      if (mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_assoc($result);
?>
            <ul class="list-unstyled">
              <li class="mb-1">
                <a class="btn category-list menu-item" href="../">Quay lại</a>
              </li>
            </ul>
          </div>
          <main class="container mt-5">
            <div class="main" style="margin-top: 7rem!important;">
              <form method="post" action="update.php">
                <div class="form-group">
                  <label for="txtOderId">Mã đơn hàng</label>
                  <input type="number" class="form-control" name="txtOderId" id="txtOderId" value="<?php echo ($data['order_id']); ?>" readonly>
                </div>
                <div class="form-group">
                  <label for="txtTotal">Giá trị</label>
                  <input type="text" class="form-control" id="txtTotal" value="<?php echo (number_format($data['total'])); ?>" readonly>
                </div>
                <div class="form-group">
                  <label for="txtOrderDate">Ngày khởi hành</label>
                  <input type="date" class="form-control" id="txtOrderDate" value="<?php echo ($data['order_date']); ?>" readonly>
                </div>
                <div class="form-group">
                  <label for="txtStatus">Trạng thái</label>
                  <select class="mt-3 mb-3" style="with:50%" name="txtStatus" id="txtStatus">
                    <?php $arrStatus = ['Đã Thanh Toán', 'Chờ phục vụ', 'Trong quá trình phục vụ', 'oàn tất', 'Hủy']; ?>
                    <option value="<?php echo ($data['status']); ?>"> <?php echo $arrStatus[$data['status']]; ?></option>
                    <option value="0">Đã Thanh Toán</option>
                    <option value="1">Chờ phục vụ</option>
                    <option value="2">Trong quá trình phục vụ</option>
                    <option value="3">Hoàn tất</option>
                    <option value="4">Hủy</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="txtCusName">Tên khách hàng</label>
                  <input type="text" class="form-control" id="txtCusName" value="<?php echo $data['customer_lname'] . $data['customer_fname'];  ?>" readonly>
                </div>
                <div class="form-group">
                  <label for="txtAddress">Địa chỉ khách hàng</label>
                  <input type="text" class="form-control" id="txtAddress" value="<?php echo ($data['customer_address']) ?>" readonly>
                </div>
                <div class="mt-3">
                  <input type="submit" name="btnSubmit" id="btnSubmit" class="btn btn-primary" value="Lưu">
                </div>
              </form>

            </div>
          </main>
          <script src="../js/manage.js"></script>
          <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
        </body>

        </html>
<?php
      }
    }
  }
}
?>