<?php
session_start();
session_destroy();
echo 'Logout la';
header('location: home.php');
?>