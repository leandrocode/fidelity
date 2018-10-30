<?php include('header.php'); ?>

<?php
session_start();
session_unset();
session_destroy();
header('Location: index.php');
?>

<?php include('footer.php'); ?>