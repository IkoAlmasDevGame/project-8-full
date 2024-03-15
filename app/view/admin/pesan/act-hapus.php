<?php 
require_once("../../../database/koneksi.php"); 
if(isset($_POST['hapus'])){
    $hapus = htmlspecialchars($_POST['hapus']);
    $table = "tb_pesan";
    $sql = "DELETE FROM $table WHERE id = ?";
    $configs->prepare($sql)->execute(array($hapus));
    header("location:../ui/header.php?page=pesan&email=".$_SESSION['email_pengguna']);
    exit(0);
}
?>