<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Message</title>
    <?php 
        require_once("../ui/header.php");
    ?>
</head>

<body>
    <?php 
        require_once("../ui/navbar.php");
    ?>
    <div class="col-md-12 col-lg-12">
        <div class="container-fluid p-3 bg-secondary rounded-0" style="height: 90dvh;">
            <div class="container-fluid py-3 bg-light rounded-0" style="height: 90dvh;">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h4 class="panel-title fs-5 text-dark">Dashboard Message</h4>
                        <div class="breadcrumb d-flex justify-content-end align-items-end flex-wrap">
                            <li class="breadcrumb breadcrumb-item">
                                <a href="../ui/header.php?page=beranda&nama=<?=$_SESSION['nama_pengguna']?>" class="text-decoration-none text-primary">Beranda</a>
                            </li>
                            <li class="breadcrumb breadcrumb-item">
                                <a href="../ui/header.php?page=pesan&email=<?=$_SESSION['email_pengguna']?>"
                                    class="text-decoration-none text-primary">Pesan</a>
                            </li>
                        </div>
                    </div>
                </div>
                <div class="border-top border-dark"></div>
                <div class="d-flex justify-content-between align-items-start flex-wrap gap-1 mt-1 mt-lg-1">
                    <?php 
                        if(isset($_GET["editpesan"])){
                            $id = htmlspecialchars($_GET['editpesan']);
                            $tablePesan = "tb_pesan";
                            $sqlPesan = "SELECT * FROM $tablePesan WHERE id = ?";
                            $rowPesan = $configs->prepare($sqlPesan);
                            $rowPesan->execute(array($id));
                            $hasil = $rowPesan->fetchAll();
                            foreach ($hasil as $isi) {
                    ?>
                    <div class="card" style="min-width: 28%; width:325px;">
                        <div class="card-header">
                            <div class="card-header-form text-end">
                                <i class="fa fa-envelope fs-4"></i>
                                <h4 class="card-title fs-5 text-start">
                                    Balas Pesan
                                </h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="../pesan/act-edit.php" method="post" enctype="multipart/form-data">
                                <div class="row form-group input-group
                                    d-flex justify-content-end align-items-end flex-wrap">
                                    <div class="col-md-12 col-lg-12">
                                        <div class="input-group-addon">
                                            <input type="email" name="toFrom" class="form-control"
                                                value="<?=$isi['toFrom']?>" readonly
                                                placeholder="Masukkan Email anda ..." required>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3"></div>
                                <div class="row form-group input-group 
                                    d-flex justify-content-end align-items-end flex-wrap">
                                    <div class="col-md-12 col-lg-12">
                                        <div class="input-group-addon">
                                            <input type="text" name="toTo" value="<?=$isi['toTo']?>"
                                                class="form-control" placeholder="Masukkan Email tujuan ...." required>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3"></div>
                                <div class="row form-group input-group 
                                    d-flex justify-content-end align-items-end flex-wrap">
                                    <div class="col-md-12 col-lg-12">
                                        <div class="input-group-addon">
                                            <input type="text" name="toSubject" value="<?=$isi['toSubject']?>"
                                                class="form-control" placeholder="Masukkan subject baru anda ...."
                                                required>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3"></div>
                                <div class="row form-group input-group 
                                    d-flex justify-content-end align-items-end flex-wrap">
                                    <div class="col-md-12 col-lg-12">
                                        <div class="input-group-addon">
                                            <textarea name="toMessage" class="form-control"
                                                style="height: 100%; min-height:auto;"
                                                placeholder="Ketikkan pesan anda disini ..."
                                                required><?=$isi['toMessage']?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-2"></div>
                                <div class="modal-footer"></div>
                                <p class="text-end">
                                    <button type="submit" name="edit" class="btn btn-danger btn-outline-light">
                                        <i class="fa fa-paper-plane"></i>
                                        <span>Kirim pesan</span>
                                    </button>
                                    <button type="reset" class="btn btn-secondary btn-outline-light">
                                        <i class="fa fa-eraser"></i>
                                        <span>Cancel pesan</span>
                                    </button>
                                </p>
                            </form>
                        </div>
                    </div>
                    <?php
                        }
                    ?>
                    <?php
                        }else if(isset($_GET['balaspesan'])){
                            $id = htmlspecialchars($_GET['balaspesan']);
                            $tablePesan = "tb_pesan";
                            $sqlPesan = "SELECT * FROM $tablePesan WHERE id = ?";
                            $rowPesan = $configs->prepare($sqlPesan);
                            $rowPesan->execute();
                            $hasil = $rowPesan->fetchAll();
                            foreach ($hasil as $isiPesan) {
                    ?>
                    <div class="card" style="min-width: 28%; width:325px;">
                        <div class="card-header">
                            <div class="card-header-form text-end">
                                <i class="fa fa-envelope fs-4"></i>
                            </div>
                            <h4 class="card-title fs-5 text-start">
                                Balas Pesan
                            </h4>
                        </div>
                        <div class="card-body">
                            <form action="../pesan/act-balas.php" method="post" enctype="multipart/form-data">
                                <div class="row form-group input-group
                                    d-flex justify-content-end align-items-end flex-wrap">
                                    <div class="col-md-12 col-lg-12">
                                        <div class="input-group-addon">
                                            <input type="email" name="toFrom" class="form-control"
                                                value="<?=$isiPesan['toTo']?>" readonly
                                                placeholder="Masukkan Email anda ..." required>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3"></div>
                                <div class="row form-group input-group 
                                    d-flex justify-content-end align-items-end flex-wrap">
                                    <div class="col-md-12 col-lg-12">
                                        <div class="input-group-addon">
                                            <input type="text" name="toTo" value="<?=$isiPesan['toFrom']?>"
                                                class="form-control" placeholder="Masukkan Email tujuan ...." required>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3"></div>
                                <div class="row form-group input-group 
                                    d-flex justify-content-end align-items-end flex-wrap">
                                    <div class="col-md-12 col-lg-12">
                                        <div class="input-group-addon">
                                            <input type="text" name="toSubject" value="<?=$isiPesan['toSubject']?>"
                                                class="form-control" placeholder="Masukkan subject baru anda ...."
                                                required>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3"></div>
                                <div class="row form-group input-group 
                                    d-flex justify-content-end align-items-end flex-wrap">
                                    <div class="col-md-12 col-lg-12">
                                        <div class="input-group-addon">
                                            <textarea name="toMessage" class="form-control"
                                                style="height: 100%; min-height:auto;"
                                                placeholder="Ketikkan pesan anda disini ..." required></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-2"></div>
                                <div class="modal-footer"></div>
                                <p class="text-end">
                                    <button type="submit" name="balas" class="btn btn-danger btn-outline-light">
                                        <i class="fa fa-paper-plane"></i>
                                        <span>Kirim pesan</span>
                                    </button>
                                    <button type="reset" class="btn btn-secondary btn-outline-light">
                                        <i class="fa fa-eraser"></i>
                                        <span>Cancel pesan</span>
                                    </button>
                                </p>
                            </form>
                        </div>
                    </div>
                    <?php
                        }
                    ?>
                    <?php
                        }else{
                    ?>
                    <div class="card" style="min-width: 28%; width:325px;">
                        <div class="card-header">
                            <div class="card-header-form text-end">
                                <i class="fa fa-envelope fs-4"></i>
                            </div>
                            <h4 class="card-title fs-5 text-start">
                                Message Blank Paper
                            </h4>
                        </div>
                        <div class="card-body">
                            <form action="../pesan/act-pesan.php" method="post">
                                <div class="row form-group input-group
                                    d-flex justify-content-end align-items-end flex-wrap">
                                    <div class="col-md-12 col-lg-12">
                                        <div class="input-group-addon">
                                            <input type="email" name="toFrom" class="form-control"
                                                value="<?=$_SESSION['email_pengguna']?>" readonly
                                                placeholder="Masukkan Email anda ..." required>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3"></div>
                                <div class="row form-group input-group 
                                    d-flex justify-content-end align-items-end flex-wrap">
                                    <div class="col-md-12 col-lg-12">
                                        <div class="input-group-addon">
                                            <input type="text" name="toTo" class="form-control"
                                                placeholder="Masukkan Email tujuan ...." required>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3"></div>
                                <div class="row form-group input-group 
                                    d-flex justify-content-end align-items-end flex-wrap">
                                    <div class="col-md-12 col-lg-12">
                                        <div class="input-group-addon">
                                            <input type="text" name="toSubject" class="form-control"
                                                placeholder="Masukkan subject baru anda ...." required>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3"></div>
                                <div class="row form-group input-group 
                                    d-flex justify-content-end align-items-end flex-wrap">
                                    <div class="col-md-12 col-lg-12">
                                        <div class="input-group-addon">
                                            <textarea name="toMessage" class="form-control"
                                                style="height: 100%; min-height:auto;"
                                                placeholder="Ketikkan pesan anda disini ..." required></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-2"></div>
                                <div class="modal-footer"></div>
                                <p class="text-end">
                                    <button type="submit" name="kirim" class="btn btn-danger btn-outline-light">
                                        <i class="fa fa-paper-plane"></i>
                                        <span>Kirim pesan</span>
                                    </button>
                                    <button type="reset" class="btn btn-secondary btn-outline-light">
                                        <i class="fa fa-eraser"></i>
                                        <span>Cancel pesan</span>
                                    </button>
                                </p>
                            </form>
                        </div>
                    </div>
                    <?php
                        }
                    ?>
                    <div class="card" style="min-width: 71.5%; width:690px;">
                        <div class="card-header">
                            <p class="text-start">
                                <a href="../ui/header.php?page=pesan&email=<?=$_SESSION['email_pengguna']?>" class="btn btn-warning">
                                    <i class="fa fa-refresh"></i>
                                    <span>refresh halaman</span>
                                </a>
                                <a href="../ui/header.php?page=pesan&keluar=yes&email=<?=$_SESSION['email_pengguna']?>"
                                    class="btn btn-danger">
                                    <i class="fa fa-envelope-open"></i>
                                    <span>Pesan Keluar</span>
                                </a>
                            </p>
                        </div>
                        <?php 
                            if(!empty($_GET['keluar'] == "yes")){
                        ?>
                        <div class="card-body">
                            <div class="table-responsive-md table-responsive-lg">
                                <table class="table table-striped" id="example1">
                                    <thead class="table-head-fixed">
                                        <tr>
                                            <th>No</th>
                                            <th>Email dari</th>
                                            <th>Email kepada</th>
                                            <th>Subject</th>
                                            <th>Pesan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $email = $_SESSION["email_pengguna"];
                                            $hasil = $model->lihatPesanKeluar($email);
                                            $no=1;
                                            foreach ($hasil as $pesan) {
                                        ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $pesan['toFrom'] ?></td>
                                            <td><?php echo $pesan['toTo'] ?></td>
                                            <td><?php echo $pesan['toSubject'] ?></td>
                                            <td>
                                                <textarea style="min-width: 100%; width:250px;" required
                                                    readonly><?php echo $pesan['toMessage'] ?></textarea>
                                            </td>
                                            <td>
                                                <a href="../ui/header.php?page=pesan&keluar=yes&editpesan=<?=$pesan['id']?>&email=<?=$_SESSION['email_pengguna']?>"
                                                    title="edit pesan" aria-current="page" class="btn btn-primary">
                                                    <i class="fa fa-edit"></i>
                                                    <span title="edit pesan"></span>
                                                </a>
                                                <a href="act-hapus.php?hapus=<?=$pesan['id']?>"
                                                    onclick="javascript:return confirm('Apakah kamu ingin menghapus pesan ini ?')"
                                                    title="Hapus pesan" aria-current="page" class="btn btn-danger">
                                                    <i class="fa fa-trash"></i>
                                                    <span title="Hapus pesan"></span>
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
                        <?php
                            }else{
                        ?>
                        <div class="card-body">
                            <div class="table-responsive-md table-responsive-lg">
                                <table class="table table-striped" id="example1">
                                    <thead class="table-head-fixed">
                                        <tr>
                                            <th>No</th>
                                            <th>Email kepada</th>
                                            <th>Subject</th>
                                            <th>Pesan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $email = $_SESSION["email_pengguna"];
                                            $hasil = $model->lihatPesanMasuk($email);
                                            $no=1;
                                            foreach ($hasil as $isi) {
                                        ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $isi['toFrom'] ?></td>
                                            <td><?php echo $isi['toSubject'] ?></td>
                                            <td>
                                                <textarea style="min-width: 100%; width:250px;" required
                                                    readonly><?php echo $isi['toMessage'] ?></textarea>
                                            </td>
                                            <td>
                                                <a href="../ui/header.php?page=pesan&balaspesan=<?=$isi['id']?>&email=<?=$_SESSION['email_pengguna']?>"
                                                    title="Balas pesan" aria-current="page" class="btn btn-secondary">
                                                    <i class="fa fa-paper-plane"></i>
                                                    <span title="Balas pesan"></span>
                                                </a>
                                                <a href="act-hapus.php?hapus=<?=$pesan['id']?>"
                                                    onclick="javascript:return confirm('Apakah kamu ingin menghapus pesan ini ?')"
                                                    title="Hapus pesan" aria-current="page" class="btn btn-danger">
                                                    <i class="fa fa-trash"></i>
                                                    <span title="Hapus pesan"></span>
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
                        <?php
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php 
    require_once("../ui/footer.php");
    ?>