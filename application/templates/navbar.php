<div class="header">
    <nav class="navbar navbar-light shadow" style="background:#0981C9">
        <a class="font-weight-bold text-decoration-none text-white" href="#page-top" style="font-size: 18px; letter-spacing: 1px">Berkat Usaha</a>
        <form class="form-inline">
            <a class="nav-link text-white text-decoration-none font-weight-bold fa-1x mr-3" href="<?php if(isset($_SESSION['auth'])){echo "../";}?>./">Beranda</a>
            <?php if(isset($_SESSION['v'])){?>
                <a class="btn btn-light shadow text-decoration-none font-weight-bold fa-1x mr-3" href="auth/masuk.php" style="color: #0981C9">Masuk</a>
            <?php }if(isset($_SESSION['id-user'])){if($_SESSION['id-role']==2){?>
                <a class="nav-link text-decoration-none text-white" href="keranjang.php"><i class="fas fa-shopping-cart"></i></a>
                <a class="nav-link text-decoration-none text-white mr-3" href="transaksi.php"><i class="fas fa-truck-loading"></i></a>
            <?php }?>
                <a class="btn btn-light shadow text-decoration-none font-weight-bold fa-1x mr-3" href="auth/keluar.php" style="color: #0981C9">Keluar</a>
            <?php }?>
        </form>
    </nav>
</div>
<div class="col-md-12 d-sm-flex justify-content-center m-0 p-0" style="background:#009FFF">
    <form action="" method="POST">
        <?php if(isset($_SESSION['v'])){?>
            <button type="submit" name="all-item" class="btn btn-link btn-sm text-decoration-none text-white font-weight-bold">semua</button>
        <?php }if(isset($_SESSION['id-user'])){if($_SESSION['id-role']==1){?>
            <button type="button" class="btn btn-link text-decoration-none btn-sm font-weight-bold text-white" data-toggle="modal" data-target="#upload-produk">Upload Produk</button>
            <button class="btn btn-link text-decoration-none text-white btn-sm font-weight-bold" type="button" data-toggle="collapse" data-target="#pembelian" aria-expanded="false" aria-controls="pembelian">Pembelian</button>
            <button class="btn btn-link text-decoration-none text-white btn-sm font-weight-bold" type="button" data-toggle="collapse" data-target="#laporan-pembelian" aria-expanded="false" aria-controls="laporan-pembelian">Laporan Pembelian</button>
        <?php }else if($_SESSION['id-role']==2){?>
            <button type="submit" name="all-item" class="btn btn-link btn-sm text-decoration-none text-white font-weight-bold">semua</button>
            <button type="button" name="kategori" class="btn btn-link btn-sm text-decoration-none text-white font-weight-bold" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">kategori</button>
        <?php }}?>
    </form>
</div>
