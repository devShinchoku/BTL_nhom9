<?php
    if(!$_SESSION['user_id'])
        header("location:../");
    else
        header("location:sign-in/");
?>