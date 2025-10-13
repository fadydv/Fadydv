<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php"); exit;
}
require 'koneksi.php';

$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM lipsticks WHERE id = $id");

header("Location: dashboard.php");
exit;
?>