<?php
session_start();
if(isset($_SESSION['user'])):
    header("location:menu/");
    exit();
else:
    header("location:login/");
    exit();
endif
?>