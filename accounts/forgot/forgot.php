<?php
include_once '../../config/db.php';
if(isset($_POST['ok']))
{
    $email = $_POST['email'];
    $result = mysqli_query($conn,"SELECT * FROM db_user where email='" . $_POST['email'] . "'");
    $row = mysqli_fetch_assoc($result);
	$account_id=$row['email'];
    $last_name=$row['last_name'];
	if($email==$account_id) {
            require '../sign-up/mail.php';
            $passbam = generatePassword();
            $last_name = "$last_name";
                $subject = "Password";
                $body = "Your password is : $passbam";
                sendmail($email,$last_name,$subject,$body);

                $pass_hash = password_hash($passbam,PASSWORD_DEFAULT);
                $sql02 = "UPDATE db_user SET password ='$pass_hash' WHERE email='$email'";
                $result02 = mysqli_query($conn,$sql02);
                header("location:setnewpass.php");
			}
				else{
					// echo 'invalid userid';
                    header("location:index.php");
				}
}
?>


