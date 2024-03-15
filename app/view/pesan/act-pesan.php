<?php
require_once("../../database/koneksi.php"); 
if(isset($_POST['kirim'])){
    $from = htmlspecialchars($_POST['toFrom']);
    $to = htmlspecialchars($_POST['toTo']);
    $subject = htmlspecialchars($_POST['toSubject']);
    $message = htmlspecialchars($_POST['toMessage']);

    if($from == "" || $to == "" || $subject == "" || $message == ""){
        header("location:../ui/header.php?page=pesan&email=".$_SESSION['email_pengguna']);
        exit(0);
    }

    $table = "tb_pesan";
    $sql = "INSERT INTO $table (toFrom,toTo,toSubject,toMessage) VALUES (?,?,?,?)";
    $row = $configs->prepare($sql);
    $row->execute(array($from,$to,$subject,$message));
    $response["tb_pesan"] = array($from,$to,$subject,$message);
    array_push($response['tb_pesan'], $from,$to,$subject,$message);
    header("location:../ui/header.php?page=pesan&email=".$_SESSION['email_pengguna']);
    exit(0);
}
?>