<?php
session_start();
unset($_SESSION['ROLE']);
unset($_SESSION['USER_ID']);
unset($_SESSION['NOM_USER']);
unset($_SESSION['PRENOM_USER']);
header('location:index.php');
die();
?>