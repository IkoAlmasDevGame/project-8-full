<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard Bebas 3 Admin</title>
        <?php 
            session_start();

            use controller\Controller;
            use model\View;

            require_once("../../../database/koneksi.php");
            require_once("../../../config/auth.php");
            require_once("../../../config/config.php");
            require_once("../../../controller/view.php");
            require_once("../../../model/model.php");

            $model = new view($configs);
            $lihat = new controller($configs);

            if(!isset($_GET["page"])){
            
            }else{
                switch ($_GET["page"]) {
                    case 'beranda':
                        require_once("../dashboard/index.php");
                        break;
                    
                    case 'histori':
                        require_once("../histori/index.php");
                        break;
                    
                    case 'pesan':
                        require_once("../pesan/index.php");
                        break;
                    
                    case 'settings':
                        require_once("../settings/index.php");
                        break;
                    
                    case 'keluar':
                        if(isset($_GET['aksi'])){
                        $aksi = $_GET['aksi'];
                        if($aksi == "keluar"){
                            if(isset($_SESSION['status'])){
                                unset($_SESSION['status']);
                                session_unset();
                                session_destroy();
                                $_SESSION = array();
                            }
                            header("location:../index.php");
                            exit(0);
                        }
                    }
                    break;
                    
                    default:
                        require_once("../dashboard/index.php");
                    break;
                }
            }

            if(!isset($_GET['act'])){

            }else{
                switch ($_GET['act']) {                    
                    case 'edit-access':
                        $model->AcceptReservsai()();
                        break;
                    
                    default:
                        require_once("../dashboard/index.php");
                        break;
                }
            }
        ?>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    </head>

    <body>