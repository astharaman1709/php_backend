<?php
session_start();
session_destroy();
// unset($_SESSION['unuser']);
echo "<script>window.location.href='index.php';</script>";
?>