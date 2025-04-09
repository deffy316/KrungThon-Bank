<?php
include('../includes/config.php');
session_destroy();
echo 'Logout la';
header('location: ../public/home.php');
?>