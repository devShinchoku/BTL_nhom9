<?php
    $path='../../img/tour/';
    if(isset($_POST['btnUpload']) && !$_FILES['ipAvatar']['name']){
        echo( basename($_FILES['ipAvatar']['name']));
        $file = basename($_FILES['ipAvatar']['name']);
        $targetPath = $path . $file;
    }
?>