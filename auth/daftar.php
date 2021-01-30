<?php if(!isset($_SESSION)){session_start();}
    require_once('../controller/script.php');
    $_SESSION['auth']=4;
    if(!isset($_SESSION['id-user'])){
        $_SESSION['v']=3;
    }
?>
<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <?php require_once("../application/akses/header.php")?>
        <title>Berkat Usaha</title>
    </head>
    <body id="page-top">
        <?php require_once('../application/templates/navbar.php');?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3 m-auto text-center">
                    <h1 class="mt-5 text-dark">Daftar</h1>
                    <p class="d-inline-flex text-dark">Sudah punya akun? silakan <a class="nav-link mt-n2 ml-n2 mr-n2 mb-5" href="masuk.php">masuk</a>!</p>
                    <form action="" method="POST">
                        <div class="form-group">
                            <input type="text" name="nama" placeholder="Nama Kamu" class="form-control text-center" required>
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" placeholder="Email" class="form-control text-center" required>
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" placeholder="Kata Sandi" class="form-control text-center" required>
                        </div>
                        <div class="form-group">
                            <input type="text" name="alamat" placeholder="Alamat" class="form-control text-center" required>
                        </div>
                        <div class="form-group">
                            <input type="number" name="no-hp" placeholder="No Telepon/HP" class="form-control text-center" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="daftar" class="btn btn-sm text-white shadow" style="background: #0981C9">Daftar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php require_once("../application/akses/footer.php")?>
    </body>
</html>