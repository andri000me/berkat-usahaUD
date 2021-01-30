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
                        <?php foreach($pembelian as $row):?>
                            <div class="card mb-3" style="max-width: 100%;">
                                <div class="row no-gutters">
                                    <div class="col-md-4">
                                        <img src="assets/img/barang/<?= $row['img']?>" class="card-img" alt="<?= $row['nama_barang']?>" style="height: 100%">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title"><?= $row['nama_barang']?></h5>
                                            <p class="card-text text-dark">Stok tersedia : <?= $row['stok']?></p>
                                            <?php $jumlah=$row['jumlah']; if($jumlah==0){?>
                                            <form action="" method="POST">
                                                <h6 class="text-dark font-weight-lighter">Masukan inputan berikut untuk melanjutkan pembelian.</h6>
                                                <div class="form-group">
                                                    <textarea name="ket" placeholder="Keterangan" cols="30" rows="3" style="resize: none" class="form-control"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <input type="number" name="jumlah" placeholder="Berapa Banyak" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <input type="hidden" name="id-pembelian" value="<?= $row['id_pembelian']?>">
                                                    <input type="hidden" name="harga" value="<?= $row['harga_jual']?>">
                                                    <button type="submit" name="edit-pembelian" class="btn text-white btn-sm" <?= $style_btn?>>Masukan</button>
                                                </div>
                                            </form>
                                            <?php }else if($jumlah>0){?>
                                            <p class="card-text text-dark">Keterangan : <?= $row['keterangan']?></p>
                                            <p class="card-text text-dark">Jumlah Beli : <?= $row['jumlah']?></p>
                                            <p class="card-text text-dark">Total Bayar : Rp. <?= number_format($row['total_beli'])?></p>
                                            <?php $id_status=$row['id_status']; if($id_status==1){?>
                                            <form action="" method="POST">
                                                <input type="hidden" name="id-pembelian" value="<?= $row['id_pembelian']?>">
                                                <button type="submit" name="bayar-pembelian" class="btn btn-sm text-white" <?= $style_btn?>>Bayar</button>
                                            </form>
                                            <?php }else if($id_status==2){?>
                                            <p class="text-success font-weight-bold">Pembelian anda telah selesai, silakan lakukan pengambilan barang ditempat dan tunjukan bukti pembayaran anda. Terima kasih sudah berbelanja.</p>
                                            <?php }}?>
                                            <p class="card-text text-dark"><small class="text-muted">Tanggal beli <?= $row['tgl_pembelian']?></small></p>
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