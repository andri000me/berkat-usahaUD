<?php if(!isset($_SESSION)){session_start();}
    if(isset($_SESSION['v'])){
        function daftar_user($daftar){
            global $conn;
            $nama=$daftar['nama'];
            $email=$daftar['email'];
            $pass=$daftar['password'];
            $alamat=$daftar['alamat'];
            $no_hp=$daftar['no-hp'];
            $tgl_buat=date('Y-m-d');
            $password=password_hash($pass, PASSWORD_DEFAULT);
            mysqli_query($conn, "INSERT INTO users(nama_user,email,password,alamat,no_hp,tgl_buat) VALUES('$nama','$email','$password','$alamat','$no_hp','$tgl_buat')");
            return mysqli_affected_rows($conn);
        }
    }
    if(isset($_SESSION['id-user'])){
        if($_SESSION['id-role']==1){
            function item_insert($in){
                global $conn;
                $nama_barang=$in['nama-barang'];
                $stok=$in['stok'];
                $img=item_img($nama_barang);
                mysqli_query($conn, "INSERT INTO barang(img,nama_barang,stok) VALUES('$img','$nama_barang','$stok')");
                return mysqli_affected_rows($conn);
            }
            function ubah_item($ubah){
                global $conn;
                $id_barang=$ubah['id-barang'];
                $nama_barang=$ubah['nama-barang'];
                $stok=$ubah['stok'];
                $gambar=$_FILES["gambar"]["tmp_name"];
                if(!empty($gambar)){
                    $img_lama=$ubah['img'];
                    $files2=glob("assets/img/barang/".$img_lama);
                    foreach($files2 as $file){
                        if(is_file($file))
                        unlink($file);
                    }
                    $img=item_img($nama_barang);
                    mysqli_query($conn, "UPDATE barang SET img='$img', nama_barang='$nama_barang', stok='$stok' WHERE id_barang='$id_barang'");
                }else if(empty($gambar)){
                    mysqli_query($conn, "UPDATE barang SET nama_barang='$nama_barang', stok='$stok' WHERE id_barang='$id_barang'");
                }
                return mysqli_affected_rows($conn);
            }
            function item_img($nama_barang){
                $tmpName=$_FILES["gambar"]["tmp_name"];
                $gambar=$nama_barang.".jpg";
                move_uploaded_file($tmpName,'assets/img/barang/'.$gambar);
                return $gambar;
            }
            function hapus_item($hapus){
                global $conn;
                $id_barang=$hapus['id-barang'];
                $img=$hapus['img'];
                $files2=glob("assets/img/barang/".$img);
                foreach($files2 as $file){
                    if(is_file($file)){
                        unlink($file);
                    }
                }
                $penjualan=mysqli_query($conn, "SELECT * FROM penjualan WHERE id_barang='$id_barang'");
                if(mysqli_num_rows($penjualan)>0){
                    mysqli_query($conn, "DELETE FROM penjualan WHERE id_barang='$id_barang'");
                }
                mysqli_query($conn, "DELETE FROM barang WHERE id_barang='$id_barang'");
                return mysqli_affected_rows($conn);
            }
            function item_sell($sell){
                global $conn;
                $id_barang=$sell['id-barang'];
                $barang=mysqli_query($conn, "SELECT * FROM barang WHERE id_barang='$id_barang'");
                $row=mysqli_fetch_assoc($barang);
                $tgl_penjualan=date('Y-m-d');
                $id_kategori=$sell['id-kategori'];
                $harga_jual=$sell['harga-jual'];
                mysqli_query($conn, "INSERT INTO penjualan(id_barang,tgl_penjualan,id_kategori,harga_jual) VALUES('$id_barang','$tgl_penjualan','$id_kategori','$harga_jual')");
                return mysqli_affected_rows($conn);
            }
            function hapus_sell($hapus){
                global $conn;
                $id_penjualan=$hapus['id-penjualan'];
                mysqli_query($conn, "DELETE FROM penjualan WHERE id_penjualan='$id_penjualan'");
                return mysqli_affected_rows($conn);
            }
            function hapus_buy($hapus){
                global $conn;
                $id_pembelian=$hapus['id-pembelian'];
                mysqli_query($conn, "DELETE FROM pembelian WHERE id_pembelian='$id_pembelian'");
                return mysqli_affected_rows($conn);
            }
            function masuk_laporan($masuk){
                global $conn;
                $id_pembelian=$masuk['id-pembelian'];
                $id_user=$masuk['id-user'];
                $id_barang=$masuk['id-barang'];
                $jumlah=$masuk['jumlah'];
                $barang=mysqli_query($conn, "SELECT * FROM barang WHERE id_barang='$id_barang'");
                $row=mysqli_fetch_assoc($barang);
                $stok=$row['stok']-$jumlah;
                $transaksi=$row['transaksi']+1;
                $total=$masuk['total'];
                $tgl_beli=date('Y-m-d');
                mysqli_query($conn, "UPDATE barang SET stok='$stok', transaksi='$transaksi' WHERE id_barang='$id_barang'");
                mysqli_query($conn, "INSERT INTO laporan(id_user,id_barang,jumlah,total,tgl_beli) VALUES('$id_user','$id_barang','$jumlah','$total','$tgl_beli')");
                mysqli_query($conn, "DELETE FROM pembelian WHERE id_pembelian='$id_pembelian'");
                return mysqli_affected_rows($conn);
            }
            function hapus_laporan($hapus){
                global $conn;
                $id_laporan=$hapus['id-laporan'];
                mysqli_query($conn, "DELETE FROM laporan WHERE id_laporan='$id_laporan'");
                return mysqli_affected_rows($conn);
            }
        }else if($_SESSION['id-role']==2){
            $id_user=$_SESSION['id-user'];
            function beli_item($beli){
                global $conn,$id_user;
                $id_penjualan=$beli['id-penjualan'];
                $tgl_beli=date('Y-m-d');
                mysqli_query($conn, "INSERT INTO pembelian(id_penjualan,tgl_pembelian,id_supplier) VALUES('$id_penjualan','$tgl_beli','$id_user')");
                return mysqli_affected_rows($conn);
            }
            function edit_buy($edit){
                global $conn;
                $id_pembelian=$edit['id-pembelian'];
                $ket=$edit['ket'];
                $jumlah=$edit['jumlah'];
                $harga_jual=$edit['harga'];
                $total_beli=$harga_jual*$jumlah;
                mysqli_query($conn, "UPDATE pembelian SET keterangan='$ket', jumlah='$jumlah', total_beli='$total_beli' WHERE id_pembelian='$id_pembelian'");
                return mysqli_affected_rows($conn);
            }
            function membayar($bayar){
                global $conn;
                $id_pembelian=$bayar['id-pembelian'];
                mysqli_query($conn, "UPDATE pembelian SET id_status='2' WHERE id_pembelian='$id_pembelian'");
                return mysqli_affected_rows($conn);
            }
        }
    }