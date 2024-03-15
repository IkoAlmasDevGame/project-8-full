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
                                <a href="../ui/header.php?page=histori&nama=<?=$_SESSION['nama_pengguna']?>" aria-current="page"
                                    class="text-decoration-none text-primary">
                                    Reservasi Jadwal</a>
                            </li>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title"><i class="fas fa-calendar-alt"></i> Jadwal Reservasi</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive-md table-responsive-lg">
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
                                                $hasil = $model->AdminReservasi();
                                                foreach ($hasil as $isi) {
                                            ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $isi['nama'] ?></td>
                                            <td><?php echo $isi['tanggal_input']." : ".$isi['jam_input']; ?></td>
                                            <td>
                                                <form action="../ui/header.php?act=edit-access" method="post">
                                                    <input type="hidden" name="nama" value="<?=$isi['nama']?>" required>
                                                    <input type="submit" role="button" value="Approve" name="access"
                                                        class="btn btn-primary" required>
                                                </form>
                                            </td>
                                            <td>
                                                <a href="" class="btn btn-danger">
                                                    <i class="fa fa-trash-alt"></i>
                                                    <span>Hapus</span>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php
                                                }
                                            ?>
                                    </tbody>
                                </table>
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