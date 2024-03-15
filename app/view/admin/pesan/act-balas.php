<?php
require_once("../../../database/koneksi.php"); 
if(isset($_POST['balas'])){
    $from = htmlspecialchars($_POST['toFrom']);
    $to = htmlspecialchars($_POST['toTo']);
    $subject = htmlspecialchars($_POST['toSubject']);
    $message = htmlspecialchars($_POST['toMessage']);

    if($from == "" || $to == "" || $subject == "" || $message == ""){
        header("location:../ui/header.php?page=pesan&email=".$from);
        exit(0);
    }

    $table = "tb_pesan";
    $sql = "INSERT INTO $table (toFrom,toTo,toSubject,toMessage) VALUES (?,?,?,?)";
    $row = $configs->prepare($sql)->execute(array($from,$to,$subject,$message));
    $response["tb_pesan"] = array($from,$to,$subject,$message);
    array_push($response['tb_pesan'], $response);
    header("location:../ui/header.php?page=pesan&email=".$from);
    exit(0);
}
?>