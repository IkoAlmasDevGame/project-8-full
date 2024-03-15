<?php 
namespace model;

class View {
    protected $db;
    public function __construct($db)
    {
        $this->db = $db;
    }

    public function LihatReservasi($nama){
        if(!empty(array($nama))){
            $sql = "SELECT * FROM tb_reservasi WHERE nama = ? and access='approve' order by id asc";
            $row = $this->db->prepare($sql);
        }else{
            $sql = "SELECT * FROM tb_reservasi WHERE nama = ? and access='not_approve' order by id asc";
            $row = $this->db->prepare($sql);
        }
        $n = array($nama);
        $row->execute($n);
        $hasil = $row->fetchAll();
        return $hasil;
    }

    public function AdminReservasi(){
        $table = "tb_reservasi";
        $sql = "SELECT * FROM $table WHERE access='not_approve'";
        $row = $this->db->prepare($sql);
        $row->execute();
        return $row;
    }

    public function TambahReservasi(){
        $table = "tb_reservasi";
        
        $nama = $_POST['nama'];
        $tanggal = $_POST['tanggal_input'];
        $jam = $_POST['jam_input'];
        $access = $_POST['access'];

        $sql = "INSERT INTO $table (nama,tanggal_input,jam_input,access) VALUES (?,?,?,?)";
        $row = $this->db->prepare($sql);
        $row->execute(array($nama,$tanggal,$jam,$access));
        header("location:../ui/header.php?page=reservasi&nama=".$nama);
    }

    public function EditReservasi(){
        $table = "tb_reservasi";
        
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $tanggal = $_POST['tanggal_input'];
        $jam = $_POST['jam_input'];
        $access = $_POST['access'];

        $sql = "UPDATE $table SET nama = ?, tanggal_input = ?, jam_input = ?, access = ? WHERE id = ?";
        $row = $this->db->prepare($sql);
        $row->execute(array($nama,$tanggal,$jam,$access,$id));
        header("location:../ui/header.php?page=reservasi&nama=".$nama);
    }

    public function AcceptReservsai(){
        $table = "tb_reservasi";
        
        $nama = $_POST['nama'];
        $access = $_POST['access'];
        
        $sql = "UPDATE $table SET access = ? WHERE nama = ?";
        $row = $this->db->prepare($sql);
        $row->execute(array($access, $nama));
        header("location:../ui/header.php?page=histori&nama=".$nama);
    }

    /* Message By Non PHPEmailer */
    public function lihatPesanMasuk($email){
        $sql = "SELECT * FROM tb_pesan WHERE toTo = ? order by id asc";
        $row = $this->db->prepare($sql);
        $row->execute(array($email));
        $hasil = $row->fetchAll();
        return $hasil;
    }

    public function lihatPesanKeluar($email){
        $sql = "SELECT * FROM tb_pesan WHERE toFrom = ? order by id asc";
        $row = $this->db->prepare($sql);
        $row->execute(array($email));
        $hasil = $row->fetchAll();
        return $hasil;
    }
}
?>