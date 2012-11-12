<?php

ob_start(); session_start();

include("functions.php");
adminsayfasi();

include("html/admin.html");
ob_flush();
?>


