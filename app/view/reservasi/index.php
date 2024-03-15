<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservasi Jadwal</title>
    <?php 
        require_once("../ui/header.php");
    ?>
</head>

<body>
    <?php 
        require_once("../ui/navbar.php");
    ?>
    <div class="col-md-12 col-lg-12">
        <div class="container-fluid bg-secondary py-4 rounded-0" style="min-height: 88.9dvh; height:100%;">
            <div class="container-fluid bg-light rounded-0" style="min-height: 88.8dvh; height:100%;">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Reservasi Jadwal</h3>
                    </div>
                    <div class="panel-body">
                        <div class="breadcrumb d-flex justify-content-end align-items-end flex-wrap">
                            <li class="breadcrumb breadcrumb-item">
                                <a href="../ui/header.php?page=beranda&nama=<?=$_SESSION['nama_pengguna']?>"
                                    aria-current="page" class="text-decoration-none text-primary">Beranda</a>
                            </li>
                            <li class="breadcrumb breadcrumb-item">
                                <a href="../ui/header.php?page=reservasi&nama=<?=$_SESSION['nama_pengguna']?>" aria-current="page"
                                    class="text-decoration-none text-primary">
                                    Reservasi Jadwal</a>
                            </li>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="d-flex justify-content-between align-items-start flex-wrap gap-2">
                        <?php 
                            if(isset($_GET['edit'])){
                        ?>
                        <div class="card" style="min-width: 25%; width: 360px;">
                            <div class="card-header">
                                <h4 class="card-title fs-5">Edit Reservasi</h4>
                            </div>
                            <div class="card-body">
                                <form action="../ui/header.php?act=edit-reservasi" method="post">
                                    <input type="hidden" name="id" value="<?="";?>">
                                    <table class="table table-striped">
                                        <tr>
                                            <td class="fs-5"><label for="namaInput">Nama</label></td>
                                            <td>
                                                <input type="text" name="nama" value="<?=$_SESSION['nama_pengguna']?>"
                                                    id="namaInput" readonly class="form-control" aria-required="true"
                                                    required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="fs-5">Tanggal & Jam</td>
                                            <td>
                                                <input type="date" name="tanggal_input" class="form-control" required
                                                    aria-required="true">
                                                <input type="time" name="jam_input" class="form-control" required
                                                    aria-required="true">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td hidden>Access</td>
                                            <td hidden>
                                                <input type="hidden" name="access" value="not_approve" required>
                                            </td>
                                        </tr>
                                    </table>
                                    <div class="card-footer">
                                        <p class="text-end">
                                            <button type="submit" class="btn btn-primary">
                                                <i class="fa fa-save"></i>
                                                <span>Simpan</span>
                                            </button>
                                            <button type="reset" class="btn btn-danger">
                                                <i class="fa fa-eraser"></i>
                                                <span>Cancel</span>
                                            </button>
                                        </p>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <?php
                            }else{
                        ?>
                        <div class="card" style="min-width: 25%; width: 360px;">
                            <div class="card-header">
                                <h4 class="card-title">Pembuat Jadwal Reservasi</h4>
                            </div>
                            <div class="card-body">
                                <form action="../ui/header.php?act=tambah-reservasi" method="post">
                                    <table class="table table-striped">
                                        <tr>
                                            <td class="fs-5"><label for="namaInput">Nama</label></td>
                                            <td>
                                                <input type="text" name="nama" value="<?=$_SESSION['nama_pengguna']?>"
                                                    id="namaInput" readonly class="form-control" aria-required="true"
                                                    required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="fs-5">Tanggal & Jam</td>
                                            <td>
                                                <input type="date" name="tanggal_input" class="form-control" required
                                                    aria-required="true">
                                                <input type="time" name="jam_input" class="form-control" required
                                                    aria-required="true">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td hidden>Access</td>
                                            <td hidden>
                                                <input type="hidden" name="access" value="not_approve" required>
                                            </td>
                                        </tr>
                                    </table>
                                    <div class="card-footer">
                                        <p class="text-end">
                                            <button type="submit" class="btn btn-primary">
                                                <i class="fa fa-save"></i>
                                                <span>Simpan</span>
                                            </button>
                                            <button type="reset" class="btn btn-danger">
                                                <i class="fa fa-eraser"></i>
                                                <span>Cancel</span>
                                            </button>
                                        </p>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <?php
                            }
                        ?>
                        <div class="card" style="min-width: 67.5%; width: 728px;">
                            <div class="card-header">
                                <h4 class="card-title"><i class="fas fa-calendar-alt"></i> Jadwal Reservasi</h4>
                                <a href="../ui/header.php?page=reservasi&nama=<?=$_SESSION["nama_pengguna"]?>&edit=yes" class="btn btn-primary">Edit Data</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive-md table-responsive-lg">
                                    <?php 
                                        if(!empty($_GET["edit"]=="yes")){
                                    ?>
                                    <table class="table table-striped" id="example1">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Pengguna</th>
                                                <th>Tanggal & Jam Reservasi</th>
                                                <th>Access</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                $no = 1;
                                                $nama = $_SESSION['nama_pengguna'];
                                                $hasil = $model->LihatReservasi($nama);
                                                foreach ($hasil as $isi) {
                                            ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $isi['nama'] ?></td>
                                                <td><?php echo $isi['tanggal_input']." : ".$isi['jam_input']; ?></td>
                                                <td><?php echo $isi['access']; ?></td>
                                                <td>
                                                    <a href="../ui/header.php?page=reservasi&nama=<?=$_SESSION['nama_pengguna']?>&edit=<?=$isi['id']?>"
                                                        class="btn btn-warning">
                                                        <i class="fas fa-edit"></i>
                                                        <span>Edit</span>
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                    <?php
                                        }else{
                                    ?>
                                    <table class="table table-striped" id="example1">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Pengguna</th>
                                                <th>Tanggal & Jam Reservasi</th>
                                                <th>Access</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                $no = 1;
                                                $nama = $_SESSION['nama_pengguna'];
                                                $hasil = $model->LihatReservasi($nama);
                                                foreach ($hasil as $isi) {
                                            ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $isi['nama'] ?></td>
                                                <td><?php echo $isi['tanggal_input']." : ".$isi['jam_input']; ?></td>
                                                <td><?php echo $isi['access']; ?></td>
                                            </tr>
                                            <?php
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                    <?php
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php 
        require_once("../ui/footer.php");
    ?>