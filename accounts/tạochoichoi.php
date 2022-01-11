
<?php
    include('header.php');
?>
<body style="background-image: url(image/slide-banner.jpg)">
<?php
    require('connect.php');

    if(isset($_GET["id"])){
        $userID = $_GET['id'];
    }
    $sql = "SELECT * FROM user WHERE id = $userID";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) == 0) { 
        echo "No required user";
    } else {
        $row = mysqli_fetch_assoc($result);?>
        
    <?php
        include('navbar.php');
    ?>
        <div class="container">

        <div class="table_box">
        <div id="add-user">
            <div class="row text-center">
                <h2>Edit User</h2>
            </div>
            <form method="post" id="form-update" name="form-update" class="form-horizontal" action="" role="form" style="padding: 20px;">
                    <div class="form-group">
                        <label class="container control-label">ID</label>
                        <div class="container">
                        <input type="text" class="form-control" name="id" id="id" value="<?php echo $row["ID"];?>" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="container control-label">Username</label>
                        <div class="container">
                        <input type="text" class="form-control" name="username" id="username" value="<?php echo $row["username"];?>">
                        <label class="notifyerror" style="visibility: hidden; height: 0px" id="usernameerror">The account name only includes characters a-z, A-Z and number</label>
                        </div>
                    </div>
                    <!-- dont have to get value of password from db -->
                    <div class="form-group">
                        <label class="container control-label">New Password</label>
                        <div class="container">
                        <input type="password" class="form-control" name="password2" id="password2" value="">
                        <label class="notifyerror" style="visibility: hidden; height: 0px" id="password1error">Password must include lowercase letters, uppercase letters and numbers, minimum length 8 characters</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="container control-label">Confirm password</label>
                        <div class="container">
                        <input type="password" class="form-control" name="password" id="password1" value="">
                        <label class="notifyerror" style="visibility: hidden; height: 0px" id="password2error1">Password must match the password above</label>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="container control-label">Full name</label>
                        <div class="container">
                            <input type="text" class="form-control" name="fullname" id="fullname" value="<?php echo $row["fullname"];?>">
                            <label class="notifyerror" style="visibility: hidden; height: 0px" id="fullnameerror">Names consist of letters only</label>  
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="container control-label">Email</label>
                        <div class="container"><input type="email" class="form-control" name="email" id="email" value="<?php echo $row["email"];?>">
                            <label class="notifyerror" style="visibility: hidden; height: 0px" id="emailerror">Invalid email format name@domain</label>  
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="container control-label">Number phone</label>
                        <div class="container"><input type="text" class="form-control" name="phone" id="phone" value="<?php echo $row["phone"];?>"> 
                        </div>
                    </div>    
                    <div class="form-group">
                        <label class="container control-label">Giới tính</label>
                        <div class="container">
                            <label class="checkbox-inline">
                            <input type="radio" name="gender" id="update-gender-male" value="male" <?php if($row["sex"] == "male") echo "checked";?>> male
                            </label>
                            <label class="checkbox-inline">
                            <input type="radio" name="gender" id="update-gender-female" value="female" <?php if($row["sex"] == "female") echo "checked";?>> female
                            </label>
                        </div>
                    </div>
                    
                    <div class="col-offset-3 container">
                        <div class="container"></div>
                        <div class="container">
                            <button type="submit" class="btn btn-primary" id="button_update" name="button_update"> SAVE </button>
                            </div>
                    </div>

                    <div class="clear"></div>
                </form>
            
        </div>  
    </div>
    <script language="javascript">
        var username = document.getElementById("username");
        var password1 = document.getElementById("password1");
        var password2 = document.getElementById("password2");
        var fullname = document.getElementById("fullname");
        var email = document.getElementById("email");
        var phone = document.getElementById("phone");
        var button_update = document.getElementById("button_update");

        var usernameerror = document.getElementById("usernameerror");
        //var passworderror = document.getElementById("passworderror");
        var password1error =  document.getElementById("password1error");
        var password2error1 =  document.getElementById("password2error1");
        var fullnameerror = document.getElementById("fullnameerror");
        var emailerror =  document.getElementById("emailerror");
        //var phoneerror =  document.getElementById("phoneerror");

        var regUsername = /^[A-Za-z0-9]+$/;
        var regFullname = /^[A-Za-z ]+$/;
        var regEmail = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        // var regPhone =  /^\d{10}$/;
        var regPassword = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/

        //var errorPasswordDefault = (passworderror.innerText || passworderror.textContent);

        username.onchange = function(){
            checkname();
        }
        phone.onchange = function(){
            checknumber();
        }
        password1.onchange = function(){
            checkNewpassword();
        }

        password2.onchange = function(){
            checkNewpassword2();
        }

        fullname.onchange = function(){
            checkfullname();
        }

        email.onchange = function(){
            checkemail();
        }

        button_update.onclick = function(){
            if(username.value.toString().length <= 0){
            alert("You have not entered your account name");
            checkname();
            return false;
            }

            if(fullname.value.toString().length <= 0){
            alert("You have not entered your name");
            checkname();
            return false;
            }
            if(phone.value.toString().length <= 0){
            alert("You have not entered your number phone");
            checknumber();
            return false;
            }
            if(email.value.toString().length <= 0){
            alert("You have not entered your email");
            checkemail();
            return false;
            }

            var validName = checkname();

            var validNewPass1 = true;
            var validNewPass2 = true;

            if(password1.value.toString().length > 0 || password2.value.toString().length > 0){
            validNewPass1 = checkNewpassword();
            validNewPass2 = checkNewpassword2();
            }
            var validFullname = checkfullname();
            var validEmail = checkemail();

            if(validName && validNewPass1 && validNewPass2 && validFullname && validEmail){
            return true;
            }
            return false;
        }
        function checkNewpassword(){
            if(!regPassword.test(password1.value)){
            password1error.style.visibility = 'visible';
            password1error.style.height = 'auto';
            return false;
            }
            else{
            password1error.style.visibility = 'hidden';
            password1error.style.height = '0px';
            
            if(password2.value.toString().length > 0){
                if(password2.value.localeCompare(password1.value) == 0){
                password2error1.style.visibility = 'hidden';
                password2error1.style.height = '0px';
                return true;
                }
                else{
                password2error1.innerHTML = "password incorrect";
                password2error1.style.visibility = 'visible';
                password2error1.style.height = 'auto';
                return false;
                }
            }   
            return true;
            }
        }

        function checkname(){
            if(!regUsername.test(username.value)){
            usernameerror.style.visibility = 'visible';
            usernameerror.style.height = 'auto';
            return false;
            }
            else{
            usernameerror.style.visibility = 'hidden';
            usernameerror.style.height = '0px';
            return true;
            }
        }

        function checkpass(){
            if(!regPassword.test(password.value)){
            passworderror.style.visibility = 'visible';
            passworderror.style.height = 'auto';
            return false;
            }
            else{
            passworderror.style.visibility = 'hidden';
            passworderror.style.height = '0px';
            return true;
            }
        }

        function checkemail(){
            if(!regEmail.test(email.value)){
            emailerror.style.visibility = 'visible';
            emailerror.style.height = 'auto';
            return false;
            }
            else{
            emailerror.style.visibility = 'hidden';
            emailerror.style.height = '0px';
            return true;
            }
        }

        function checkfullname(){
            if(!regFullname.test(fullname.value)){
            fullnameerror.style.visibility = 'visible';
            fullnameerror.style.height = 'auto';
            return false;
            }
            else{
            fullnameerror.style.visibility = 'hidden';
            fullnameerror.style.height = '0px';
            return true;
            }
        }

        function checkNewpassword2(){
            if(!regPassword.test(password2.value)){
            //password2error1.innerHTML = errorPasswordDefault;
            password2error1.style.visibility = 'visible';
            password2error1.style.height = 'auto';
            return false;
            }
            else{
            if(password1.value.toString().length > 0){
                if(password2.value.localeCompare(password1.value) == 0){
                password2error1.style.visibility = 'hidden';
                password2error1.style.height = '0px';
                return true;
                }
                else{
                password2error1.innerHTML = "password incorrect";
                password2error1.style.visibility = 'visible';
                password2error1.style.height = 'auto';
                return false;
                }
            }
            else{
                password2error1.style.visibility = 'hidden';
                password2error1.style.height = '0px';
                return true;
            }
            }
        }
    </script>

    <?php
        require_once("connect.php");
        if(isset($_POST["button_update"])){
            $username = $_POST["username"];
            $password = $_POST["password"];
            $hash = password_hash($password, PASSWORD_BCRYPT);
            $email = $_POST["email"];
            $fullName = $_POST["fullname"];
            $phone = $_POST["phone"];
            $gender = $_POST["gender"];

            //thực hiện việc lưu trữ dữ liệu vào db 
            // edit != insert
            $sql = "SELECT * FROM user WHERE ID = '$userID'";
            $check = mysqli_query($conn,$sql);
            print_r(mysqli_num_rows($check));
            if(mysqli_num_rows($check) <= 0){ ?>
                <script>
                    alert('Account with ID <?php echo $userID;?> does not exist yet');
                </script>";
                <?php
            }
            else{
                $sql = "UPDATE user SET username='$username', password='$hash', fullname='$fullName', email='$email', phone='$phone', sex='$gender' WHERE id = $userID";
                $result = mysqli_query($conn,$sql); 

                if ($result){?>
                    <script>
                        alert("Edit user successfully!");
                        window.history.go(-1);                     
                    </script>
                <?php 
                } 
                else{ 
                ?>
                    <script>
                        alert("Edit user fail!"); -->
                    </script>
                <?php
                }
            }
        }
    ?>
    <?php }
        mysqli_close($conn);
    ?>

</body>
</html>

        
    


