<?php if(!isset($_SESSION)){session_start();}
    require_once("connect.php");require_once("functions.php");
    $style_btn="style='background: #0981C9'";
    $barang=mysqli_query($conn, "SELECT * FROM barang");
    $kategori=mysqli_query($conn, "SELECT * FROM kategori");
    $penjualan=mysqli_query($conn, "SELECT * FROM penjualan
        JOIN kategori ON penjualan.id_kategori=kategori.id_kategori
        JOIN barang ON penjualan.id_barang=barang.id_barang
    ");
    if(isset($_POST['pilih-kategori'])){
        $id_kategori=$_POST['id-kategori'];
        $penjualan=mysqli_query($conn, "SELECT * FROM penjualan
            JOIN kategori ON penjualan.id_kategori=kategori.id_kategori
            JOIN barang ON penjualan.id_barang=barang.id_barang
            WHERE penjualan.id_kategori='$id_kategori'
        ");
    }
    $pembelian=mysqli_query($conn, "SELECT * FROM pembelian
        JOIN penjualan ON pembelian.id_penjualan=penjualan.id_penjualan
        JOIN users ON pembelian.id_supplier=users.id_user
        JOIN barang ON penjualan.id_barang=barang.id_barang
    ");
    if(isset($_SESSION['v'])){
        if(isset($_POST['daftar'])){
            if(daftar_user($_POST)>0){
                header("Location: masuk.php");
                exit;
            }
        }
        if(isset($_POST['masuk'])){
            $email=$_POST['email'];
            $password=$_POST['password'];
            $users=mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
            if(mysqli_num_rows($users)>0){
                $row=mysqli_fetch_assoc($users);
                $pass=$row['password'];
                if(password_verify($password,$pass)){
                    unset($_SESSION['v']);
                    unset($_SESSION['auth']);
                    $_SESSION['id-user']=$row['id_user'];
                    $_SESSION['nama-user']=$row['nama_user'];
                    $_SESSION['id-role']=$row['id_role'];
                    header("Location: ../");
                    exit;
                }
            }
        }
    }
    if(isset($_SESSION['id-user'])){
        $id_user=$_SESSION['id-user'];
        if($_SESSION['id-role']==1){
            if(isset($_POST['input-barang'])){
                if(item_insert($_POST)>0){
                    header("Location: ./");
                    exit;
                }
            }
            if(isset($_POST['ubah-barang'])){
                if(ubah_item($_POST)>0){
                    header("Location: ./");
                    exit;
                }
            }
            if(isset($_POST['hapus-barang'])){
                if(hapus_item($_POST)>0){
                    header("Location: ./");
                    exit;
                }
            }
            if(isset($_POST['insert-penjualan'])){
                if(item_sell($_POST)>0){
                    header("Location: ./");
                    exit;
                }
            }
            if(isset($_POST['hapus-penjualan'])){
                if(hapus_sell($_POST)>0){
                    header("Location: ./");
                    exit;
                }
            }
            if(isset($_POST['hapus-pembelian'])){
                if(hapus_buy($_POST)>0){
                    header("Location: ./");
                    exit;
                }
            }
            $laporan=mysqli_query($conn, "SELECT * FROM laporan
                JOIN users ON laporan.id_user=users.id_user
                JOIN barang ON laporan.id_barang=barang.id_barang
            ");
            if(isset($_POST['masuk-laporan'])){
                if(masuk_laporan($_POST)>0){
                    header("Location: ./");
                    exit;
                }
            }
            if(isset($_POST['hapus-laporan'])){
                if(hapus_laporan($_POST)>0){
                    header("Location: ./");
                    exit;
                }
            }
        }else if($_SESSION['id-role']==2){
            if(isset($_POST['beli-item'])){
                if(beli_item($_POST)>0){
                    header("Location: keranjang.php");
                    exit;
                }
            }
            $pembelian=mysqli_query($conn, "SELECT * FROM pembelian
                JOIN penjualan ON pembelian.id_penjualan=penjualan.id_penjualan
                JOIN users ON pembelian.id_supplier=users.id_user
                JOIN barang ON penjualan.id_barang=barang.id_barang
                WHERE pembelian.id_supplier=$id_user
            ");
            if(isset($_POST['edit-pembelian'])){
                if(edit_buy($_POST)>0){
                    header("Location: keranjang.php");
                    exit;
                }
            }
            if(isset($_POST['bayar-pembelian'])){
                if(membayar($_POST)>0){
                    header("Location: keranjang.php");
                    exit;
                }
            }
            $laporan=mysqli_query($conn, "SELECT * FROM laporan
                JOIN users ON laporan.id_user=users.id_user
                JOIN barang ON laporan.id_barang=barang.id_barang
                WHERE laporan.id_user=$id_user
            "); 
        }
    }