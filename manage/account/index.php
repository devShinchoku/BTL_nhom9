<?php
  if(isset($_GET['id'])){
session_start();
if (!isset($_SESSION['user_id'])) {
  header('location:../');
} else {
  if ($_SESSION['permission'] > 1) {
    header('location:../');
  } else {
  require '../../config/db.php';
  require '../../template/header2.php';
  $sql = "SELECT * FROM db_user WHERE user_id = {$_GET['id']}";
  $result=mysqli_query($conn,$sql);
  if(mysqli_num_rows($result)>0){
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
                  <label for="txtUserId">Mã người dùng</label>
                  <input type="number" class="form-control" name="txtUserId" id="txtUserId" value="<?php echo $data['user_id'];?>" readonly>
                </div>
                <div class="form-group">
                  <label for="txtEmail">Email</label>
                  <input type="email" class="form-control" id="txtEmail" value="<?php echo $data['email']; ?>" readonly>
                </div>
                <div class="form-group">
                  <label for="txtPhoneNum">SĐT</label>
                  <input type="text" class="form-control" id="txtPhoneNum" value="<?php echo ($data['phonenum']); ?>" readonly>
                </div>
                <div class="form-group">
                  <label for="txtFName">Họ</label>
                  <input type="text" class="form-control" name="txtFName" id="txtFName" value="<?php echo ($data['first_name']); ?>">
                </div>
                <div class="form-group">
                  <label for="txtLName">Tê</label>
                  <input type="text" class="form-control" name="txtLName" id="txtLName" value="<?php echo $data['last_name']; ?>">
                </div>
                <div class="form-group">
                  <label for="txtPer">Quyền</label><?php $perArr = ['Admin','NCC','user']; ?>
                  <select class="mt-3" style="with:50%" name="txtPer" id="txtPer">
                    <option value="<?php echo ($data['permission']); ?>"> <?php echo $perArr[$data['permission']]; ?></option>
                    <option value="0">Admin</option>
                    <option value="1">Nhà Cung Cáp</option>
                    <option value="2">User</option>
                  </select>
                </div>
                <div class="mt-3">
                  <input type="submit" name="btnSubmit" id="btnSubmit" class="btn btn-primary" value="Lưu">
                </div>
              </form>  
      
      </div>
    </main>
  
    <!-- <script>
      var host_id = <?php echo $_SESSION['user_id']; ?>;
    </script> -->
    <script src="../js/manage.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
  </body>
  
  </html>
  <?php
    }
  }}
  }
  ?> 