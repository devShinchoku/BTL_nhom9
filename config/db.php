<?php 
    //Start Sessio
    if (session_id() === '')
    session_start();

    //Create Constants to Store Non Repeating Values
    define('SITEURL', 'http://localhost/BTL_NHOM9/');
    define('LOCALHOST', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'tour');
    
    $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD,DB_NAME) or die(mysqli_error());
?>