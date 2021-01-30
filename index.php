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
        <?php require_once('application/templates/navbar.php')?>
        <?php if(isset($_SESSION['v'])){?>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 mt-2">
                        <div class="row justify-content-start">
                            <?php foreach($penjualan as $row):?>
                            <div class="col-lg-3 mt-4">
                                <div class="card" style="width: 18rem;">
                                    <img src="assets/img/barang/<?= $row['img']?>" class="card-img-top" alt="<?= $row['nama_kategori']?>" style="height: 200px;">
                                    <div class="card-body">
                                        <h5 class="card-title"><?= $row['nama_barang']?></h5>
                                        <p class="card-text text-dark">Kategori : <?= $row['nama_kategori']?></p>
                                        <p class="card-text text-dark">Harga Rp. <?= number_format($row['harga_jual'])?></p>
                                        <a href="auth/masuk.php" class="btn btn-sm text-white text-decoration-none font-weight-bold" <?= $style_btn?>>Beli</a>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach;?>
                        </div>
                    </div>
                </div>
            </div>
        <?php }if(isset($_SESSION['id-role'])){if($_SESSION['id-role']==2){?>
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-12">
                        <div class="collapse show" id="collapseExample">
                            <div class="card card-body border-0 shadow mt-3 text-white" <?= $style_btn?>>
                                <div class="col-md-12">
                                    <div class="row justify-content-center">
                                        <?php foreach($kategori as $row):?>
                                            <form action="" method="POST">
                                                <input type="hidden" name="id-kategori" value="<?= $row['id_kategori']?>">
                                                <button type="submit" name="pilih-kategori" class="btn btn-link font-weight-bold text-white btn-sm ml-3 text-decoration-none"><?= $row['nama_kategori']?></button>
                                            </form>
                                        <?php endforeach;?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 mt-2">
                        <div class="row justify-content-start">
                            <?php foreach($penjualan as $row):?>
                            <div class="col-lg-3 mt-4">
                                <div class="card" style="width: 18rem;">
                                    <img src="assets/img/barang/<?= $row['img']?>" class="card-img-top" alt="<?= $row['nama_kategori']?>" style="height: 200px;">
                                    <div class="card-body">
                                        <h5 class="card-title"><?= $row['nama_barang']?></h5>
                                        <p class="card-text text-dark">Kategori : <?= $row['nama_kategori']?></p>
                                        <p class="card-text text-dark">Stok : <?= $row['stok']?></p>
                                        <p class="card-text text-dark">Harga Rp. <?= number_format($row['harga_jual'])?></p>
                                        <form action="" method="POST">
                                            <input type="hidden" name="id-penjualan" value="<?= $row['id_penjualan']?>">
                                            <button type="submit" name="beli-item" class="btn btn-sm text-white text-decoration-none font-weight-bold" <?= $style_btn?>>Beli</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach;?>
                        </div>
                    </div>

                </div>
            </div>
        <?php }}if(isset($_SESSION['id-user'])){if($_SESSION['id-role']==1){?>
            <div class="modal fade" id="upload-produk" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Upload Produk</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body text-center align-items-center">
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <input type="text" name="nama-barang" class="form-control text-center" placeholder="Nama Barang" required>
                                </div>
                                <div class="form-group">
                                    <input type="number" name="stok" class="form-control text-center" placeholder="Stok" required>
                                </div>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="gambar" class="custom-file-input" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" required>
                                        <label class="custom-file-label" for="inputGroupFile04">Pilih Gambar Produk</label>
                                    </div>
                                </div>
                                <div class="form-group mt-4">
                                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Tutup</button>
                                    <button type="submit" name="input-barang" class="btn btn-sm text-white" <?= $style_btn?>>Tambahkan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-12">

                        <div class="collapse" id="pembelian">
                            <div class="card border-0 text-center align-items-center shadow card-body mt-5" style="background: #0981C9;">
                                <h5 class="text-white font-weight-bold mb-4">Detail Pembelian Supplier</h5>
                                <table class="table table-sm text-center text-white align-items-center">
                                    <thead>
                                        <tr style="border-top: hidden">
                                            <th scope="col">#</th>
                                            <th scope="col">Tgl Beli</th>
                                            <th scope="col">Nama Supplier</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Alamat</th>
                                            <th scope="col">No HP</th>
                                            <th scope="col">Produk Beli</th>
                                            <th scope="col">Keterangan</th>
                                            <th scope="col">Jumlah</th>
                                            <th scope="col">Total Beli</th>
                                            <th colspan="2">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no=1;foreach($pembelian as $row):?>
                                        <tr>
                                            <th scope="row"><?= $no;?></th>
                                            <td><?= $row['tgl_pembelian']?></td>
                                            <td><?= $row['nama_user']?></td>
                                            <td><?= $row['email']?></td>
                                            <td><?= $row['alamat']?></td>
                                            <td><?= $row['no_hp']?></td>
                                            <td><?= $row['nama_barang']?></td>
                                            <td>
                                                <button type="button" class="btn btn-light btn-sm" data-toggle="modal" data-target="#liat-ket<?= $row['id_pembelian']?>"><i class="fas fa-eye"></i></button>
                                                <div class="modal fade" id="liat-ket<?= $row['id_pembelian']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Keterangan</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p><?= $row['keterangan']?></p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-sm text-white" <?= $style_btn?> data-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><?= $row['jumlah']?></td>
                                            <td>Rp.<?= number_format($row['total_beli'])?></td>
                                            <td><form action="" method="POST">
                                                <input type="hidden" name="id-pembelian" value="<?= $row['id_pembelian']?>">
                                                <input type="hidden" name="id-user" value="<?= $row['id_supplier']?>">
                                                <input type="hidden" name="id-barang" value="<?= $row['id_barang']?>">
                                                <input type="hidden" name="jumlah" value="<?= $row['jumlah']?>">
                                                <input type="hidden" name="total" value="<?= $row['total_beli']?>">
                                                <input type="hidden" name="tgl" value="<?= $row['tgl_pembelian']?>">
                                                <?php $id_status=$row['id_status']; if($id_status==1){?>
                                                <p class="btn btn-secondary btn-sm"><i class="fas fa-hourglass-half"></i></p>
                                                <?php }else if($id_status==2){?>
                                                <button type="submit" name="masuk-laporan" class="btn btn-success btn-sm"><i class="fas fa-check-double"></i></button>
                                                <?php }?>
                                            </form></td>
                                            <td><form action="" method="POST">
                                                <input type="hidden" name="id-pembelian" value="<?= $row['id_pembelian']?>">
                                                <button type="submit" name="hapus-pembelian" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                            </form></td>
                                        </tr>
                                        <?php $no++;endforeach;?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="collapse" id="laporan-pembelian">
                            <div class="card border-0 text-center align-items-center shadow card-body mt-5" style="background: #0981C9;">
                                <h5 class="text-white font-weight-bold mb-4">Laporan Pembelian Supplier</h5>
                                <table class="table table-sm text-center text-white align-items-center">
                                    <thead>
                                        <tr style="border-top: hidden">
                                            <th scope="col">#</th>
                                            <th scope="col">Tgl Beli</th>
                                            <th scope="col">Nama Supplier</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Alamat</th>
                                            <th scope="col">No HP</th>
                                            <th scope="col">Produk Beli</th>
                                            <th scope="col">Jumlah</th>
                                            <th scope="col">Total</th>
                                            <th colspan="1">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no=1;foreach($laporan as $row):?>
                                        <tr>
                                            <th scope="row"><?= $no;?></th>
                                            <td><?= $row['tgl_beli']?></td>
                                            <td><?= $row['nama_user']?></td>
                                            <td><?= $row['email']?></td>
                                            <td><?= $row['alamat']?></td>
                                            <td><?= $row['no_hp']?></td>
                                            <td><?= $row['nama_barang']?></td>
                                            <td><?= $row['jumlah']?></td>
                                            <td>Rp.<?= number_format($row['total'])?></td>
                                            <td><form action="" method="POST">
                                                <input type="hidden" name="id-laporan" value="<?= $row['id_laporan']?>">
                                                <button type="submit" name="hapus-laporan" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                            </form></td>
                                        </tr>
                                        <?php $no++;endforeach;?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-12 mt-5">
                        <div class="row">

                            <div class="col-lg-4">
                                <div class="card border-0 shadow" style="background: #0981C9;">
                                    <div class="card-body text-center align-items-center">
                                        <h5 class="text-white font-weight-bold mb-4">Insert Penjualan</h5>
                                        <form action="" method="POST">
                                            <div class="form-group">
                                                <select name="id-barang" class="form-control" required>
                                                    <option>Pilih Barang</option>
                                                    <?php foreach($barang as $row):?>
                                                    <option value="<?= $row['id_barang']?>"><?= $row['nama_barang']?></option>
                                                    <?php endforeach;?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <select name="id-kategori" class="form-control" required>
                                                    <option>Pilih Kategori</option>
                                                    <?php foreach($kategori as $row):?>
                                                    <option value="<?= $row['id_kategori']?>"><?= $row['nama_kategori']?></option>
                                                    <?php endforeach;?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <input type="number" name="harga-jual" placeholder="Harga Jual" class="form-control text-center" required>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" name="insert-penjualan" class="btn btn-light btn-sm font-weight-bold">Insert</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="card border-0 shadow mt-3" style="background: #0981C9;">
                                    <div class="card-body text-center align-items-center">
                                        <h5 class="text-white font-weight-bold mb-4">Data Penjualan</h5>
                                        <table class="table table-sm text-center text-white align-items-center">
                                            <thead>
                                                <tr style="border-top: hidden">
                                                    <th scope="col">#</th>
                                                    <th scope="col">Tgl Jual</th>
                                                    <th scope="col">Nama</th>
                                                    <th scope="col">Kategori</th>
                                                    <th scope="col">Harga Jual</th>
                                                    <th colspan="1">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no=1;foreach($penjualan as $row):?>
                                                <tr>
                                                    <th scope="row"><?= $no;?></th>
                                                    <td><?= $row['tgl_penjualan']?></td>
                                                    <td><?= $row['nama_barang']?></td>
                                                    <td><?= $row['nama_kategori']?></td>
                                                    <td>Rp.<?= number_format($row['harga_jual'])?></td>
                                                    <td><form action="" method="POST">
                                                        <input type="hidden" name="id-penjualan" value="<?= $row['id_penjualan']?>">
                                                        <button type="submit" name="hapus-penjualan" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                                    </form></td>
                                                </tr>
                                                <?php $no++;endforeach;?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-8">
                                <h3 class="text-dark font-weight-lighter">Selamat datang kembali <?php if(isset($_SESSION['nama-user'])){echo $_SESSION['nama-user'];}?></h3>
                                <div class="card border-0 shadow" style="background: #0981C9;color: white">
                                    <div class="card-body">
                                        <h5 class="text-white font-weight-bold">Data Barang</h5>
                                        <table class="table table-sm text-center text-white align-items-center">
                                            <thead>
                                                <tr style="border-top: hidden">
                                                    <th scope="col">#</th>
                                                    <th scope="col">Gambar</th>
                                                    <th scope="col">Nama</th>
                                                    <th scope="col">Stok</th>
                                                    <th scope="col">Transaksi</th>
                                                    <th colspan="2">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no=1;foreach($barang as $row):?>
                                                <tr>
                                                    <th class="m-auto" scope="row"><?= $no;?></th>
                                                    <td><img src="assets/img/barang/<?= $row['img']?>" class="img-fluid rounded-circle" alt="" style="width: 50px;height: 50px;"></td>
                                                    <td class="m-auto"><?= $row['nama_barang']?></td>
                                                    <td><?= $row['stok']?></td>
                                                    <td><?= $row['transaksi']?></td>
                                                    <td><form action="" method="POST">
                                                        <a data-toggle="collapse" role="button" aria-expanded="false" aria-controls="edit-barang<?= $row['id_barang']?>" href="#edit-barang<?= $row['id_barang']?>" class="btn btn-warning btn-sm"><i class="fas fa-pen"></i></a>
                                                    </form></td>
                                                    <td><form action="" method="POST">
                                                        <input type="hidden" name="id-barang" value="<?= $row['id_barang']?>">
                                                        <input type="hidden" name="img" value="<?= $row['img']?>">
                                                        <button type="submit" name="hapus-barang" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                                    </form></td>
                                                </tr>
                                                <tr style="border-top: hidden">
                                                    <td colspan="7">
                                                        <div class="collapse" id="edit-barang<?= $row['id_barang']?>">
                                                            <div class="card card-body">
                                                                <form action="" method="POST" enctype="multipart/form-data">
                                                                    <div class="form-group">
                                                                        <input type="text" name="nama-barang" class="form-control text-center" placeholder="Nama Barang" value="<?= $row['nama_barang']?>" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <input type="number" name="stok" class="form-control text-center" placeholder="Stok" value="<?= $row['stok']?>" required>
                                                                    </div>
                                                                    <div class="input-group">
                                                                        <div class="custom-file">
                                                                            <input type="file" name="gambar" class="custom-file-input" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04">
                                                                            <label class="custom-file-label" for="inputGroupFile04">Pilih Gambar Produk</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group mt-4">
                                                                        <input type="hidden" name="id-barang" value="<?= $row['id_barang']?>">
                                                                        <input type="hidden" name="img" value="<?= $row['img']?>">
                                                                        <button type="submit" name="ubah-barang" class="btn btn-sm text-white" <?= $style_btn?>>Ubah</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php $no++;endforeach;?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        <?php }}?>
        <?php require_once("application/akses/footer.php")?>
    </body>
</html>