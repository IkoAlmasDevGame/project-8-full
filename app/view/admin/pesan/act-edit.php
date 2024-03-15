<?php
require_once("../../../database/koneksi.php"); 
if(isset($_POST['edit'])){
    $id = htmlspecialchars($_POST['id']);
    $from = htmlspecialchars($_POST['toFrom']);
    $to = htmlspecialchars($_POST['toTo']);
    $subject = htmlspecialchars($_POST['toSubject']);
    $message = htmlspecialchars($_POST['toMessage']);

    if($from == "" || $to == "" || $subject == "" || $message == ""){
        header("location:../ui/header.php?page=pesan&email=".$from);
        exit(0);
    }

    $table = "tb_pesan";
    $sql = "UPDATE $table SET toFrom = ?, toTo = ?, toSubject = ?, toMessage = ? where id = ?";
    $row = $configs->prepare($sql)->execute(array($from,$to,$subject,$message,$id));
    $response["tb_pesan"] = array($from,$to,$subject,$message,$id);
    array_push($response['tb_pesan'], $response);
    header("location:../ui/header.php?page=pesan&email=".$from);
    exit(0);
}
?>