<?php
include "koneksi.php";

$id = $_GET['id_akun'];

$delete = mysqli_query($con, "DELETE FROM user WHERE `id_user` = '$id'");
session_start();
session_destroy();
header("Location:index.php");