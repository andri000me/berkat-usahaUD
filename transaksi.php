<?php if(!isset($_SESSION)){session_start();}
    require_once("controller/script.php");
    if(!isset($_SESSION['id-user'])){
        $_SESSION['v']=3;
    }
    if(isset($_SESSION['auth'])){
        unset($_SESSION['auth']);
    }
?>
<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <?php require_once("application/akses/header.php")?>
        <title>Berkat Usaha</title>
    </head>
    <body id="page-top">
        <?php require_once('application/templates/navbar.php');?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card border-0 shadow card-body mt-3" <?= $style_btn?>>
                        <h5 class="text-white font-weight-bold">Detail Pembelian</h5>
                        <?php foreach($laporan as $row):?>
                            <div class="card mb-3" style="max-width: 100%;">
                                <div class="row no-gutters">
                                    <div class="col-md-4">
                                        <img src="assets/img/barang/<?= $row['img']?>" class="card-img" alt="<?= $row['nama_barang']?>" style="height: 100%">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title"><?= $row['nama_barang']?> <span class="badge badge-success">Lunas</span></h5>
                                            <p class="card-text text-dark">Jumlah Beli : <?= $row['jumlah']?></p>
                                            <p class="card-text text-dark">Total Bayar : Rp. <?= number_format($row['total'])?></p>
                                            <p class="card-text text-dark"><small class="text-muted">Tanggal beli <?= $row['tgl_beli']?></small></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach;?>
                    </div>
                </div>
            </div>
        </div>
        <?php require_once("application/akses/footer.php")?>
    </body>
</html>