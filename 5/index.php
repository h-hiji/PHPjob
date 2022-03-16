<?php
if (empty($_SESSION["user_name"])) {
        header("Location: main.php");
        exit;
    }else{
        header("Location: login.php");
        exit;
    }
?>