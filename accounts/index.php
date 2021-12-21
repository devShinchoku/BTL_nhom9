<?php
    if(!$_SESSION['isLogin'])
        header("location:../");
    else
        header("location:sign-in/");
?>