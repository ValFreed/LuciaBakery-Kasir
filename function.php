<?php

    session_start();


    // membuat koneksi
    $conn = mysqli_connect('127.0.0.1:3308','root','','luciabakery');

    //login
    if(isset($_POST['login'])){
        //inisiasi variabel
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        $check = mysqli_query($conn, "SELECT * FROM user WHERE username='$username' and password='$password'");
        $hitung = mysqli_num_rows($check);
        $row = mysqli_fetch_array($check);

        if($hitung>0){
            //data ditemukan
            
            if($row['level'] == 1){ // admin berdasarkan level, jika level 1 berarti admin
                $_SESSION['admin']=$username;
                echo '<script language="javascript">alert("Anda berhasil Login Admin!"); 
                document.location="transaksi.php";
                </script>';
            }else{
                if($row['level']==2){
                $_SESSION['pegawai']=$username; //berdasarkan kolom user
                   echo '<script language="javascript">alert("Anda berhasil Login Sebagai Pegawai!"); 
                   document.location="pegawaitransaksi.php";
                   </script>';
                }
            }
        }else{
            //data tidak ditemukan
            echo '
            <script>alert("Username atau Password salah");
            window.location.href="login.php";
            </script>
            ';
        }
    }

    //Tambah Jajan
    if(isset($_POST['tambahjajan'])){
        $kode_jajan = $_POST['kode_jajan'];
        $nama_jajan = $_POST['nama_jajan'];
        $harga_jajan = $_POST['harga_jajan'];
        $stok = $_POST['stok'];
        $id_tipe_jajan = $_POST['id_tipe_jajan'];
        $data = $_POST['file'];

        if($data== null){
            $tambah = mysqli_query($conn,"insert into jajan (kode_jajan,nama_jajan,harga_jajan,stok,id_tipe_jajan) 
            values ('$kode_jajan','$nama_jajan','$harga_jajan','$stok','$id_tipe_jajan')");

            if($tambah){
            header('location: jajan.php');
            }else{
            echo '
            <script>alert("Gagal menambah jajan baru");
            window.location.href="jajan.php";
            </script>
            ';
            }
        }else{
            //soal gambar
            $allowed_exstension = array('png','jpg');
            $nama = $_FILES['file']['name']; //ngambil nama gambar
            $dot = explode('.',$nama);
            $ekstensi = strtolower(end($dot));//ngambil ekstensinya
            $ukuran = $_FILES['file']['size'];//ngambil size file
            $file_tmp = $_FILES['file']['tmp_name'];//ngambil lokasi file

            //penamaan file -> Enkripsi
            $image = md5(uniqid($nama,true) . time()).'.'.$ekstensi; //menggabungkan nama file yang di enkripsi dengan ekstensinya

            //proses upload gambar
            if(in_array($ekstensi, $allowed_exstension) === true){
                //validasi ukuran
                if($ukuran < 15000000){
                    move_uploaded_file($file_tmp,'image/'.$image);

                    $tambah = mysqli_query($conn,"insert into jajan (kode_jajan,nama_jajan,harga_jajan,stok,id_tipe_jajan, gambar) 
                                        values ('$kode_jajan','$nama_jajan','$harga_jajan','$stok','$id_tipe_jajan','$image')");

                    if($tambah){
                        header('location: jajan.php');
                    }else{
                        echo '
                        <script>alert("Gagal menambah jajan baru");
                        window.location.href="jajan.php";
                        </script>
                        ';
                    }
                }else{
                    //kalau size lebih dari 15mb
                    echo '
                        <script>alert("Ukuran File terlalu besar");
                        window.location.href="jajan.php";
                        </script>
                        ';
                }
            }else{
                //kalau gambarnya bukan jpg/png
                echo '
                        <script>alert("File harus PNG / JPG");
                        window.location.href="jajan.php";
                        </script>
                        ';
            }
        }

        
    }

    //Tambah Pegawai
    if(isset($_POST['tambahpegawai'])){
        $nip = $_POST['nip'];
        $nama_pegawai = $_POST['nama_pegawai'];
        $tanggal_lahir = $_POST['tanggal_lahir'];
        $id_jenis_kelamin = $_POST['id_jenis_kelamin'];
        $id_status = $_POST['id_status'];
        $id_tipe_pegawai = $_POST['id_tipe_pegawai'];

        $tambah = mysqli_query($conn,"insert into pegawai (nip, nama_pegawai, tanggal_lahir, id_jenis_kelamin, id_status, id_tipe_pegawai) 
                                        values ('$nip','$nama_pegawai','$tanggal_lahir','$id_jenis_kelamin','$id_status','$id_tipe_pegawai')");

        if($tambah){
            header('location: pegawai.php');
        }else{
            echo '
            <script>alert("Gagal menambah pegawai baru");
            window.location.href="pegawai.php";
            </script>
            ';
        }
    }

    //Tambah Pelanggan
    if(isset($_POST['tambahpelanggan'])){
        $id_pelanggan = $_POST['id_pelanggan'];
        $nama_pelanggan = $_POST['nama_pelanggan'];
        $id_jenis_kelamin = $_POST['id_jenis_kelamin'];
        $id_status = $_POST['id_status'];

        $tambah = mysqli_query($conn,"insert into pelanggan (id_pelanggan,nama_pelanggan,id_jenis_kelamin,id_status) values ('$id_pelanggan','$nama_pelanggan','$id_jenis_kelamin','$id_status')");

        if($tambah){
            header('location: pelanggan.php');
        }else{
            echo '
            <script>alert("Gagal menambah pelanggan baru");
            window.location.href="pelanggan.php";
            </script>
            ';
        }
    } 

    //Tambah Pelanggan Menu Pegawai
    if(isset($_POST['tambahpelanggan2'])){
        $id_pelanggan = $_POST['id_pelanggan'];
        $nama_pelanggan = $_POST['nama_pelanggan'];
        $id_jenis_kelamin = $_POST['id_jenis_kelamin'];
        $id_status = $_POST['id_status'];

        $tambah = mysqli_query($conn,"insert into pelanggan (id_pelanggan,nama_pelanggan,id_jenis_kelamin,id_status) values ('$id_pelanggan','$nama_pelanggan','$id_jenis_kelamin','$id_status')");

        if($tambah){
            header('location: pegawaipelanggan.php');
        }else{
            echo '
            <script>alert("Gagal menambah pelanggan baru");
            window.location.href="pegawaipelanggan.php";
            </script>
            ';
        }
    } 

    //Tambah Faktur
    if(isset($_POST['tambahfaktur'])){
        $id_pelanggan = $_POST['id_pelanggan'];
        $kode_faktur = $_POST['kode_faktur'];
        $nip = $_POST['nip'];

        $tambah = mysqli_query($conn,"insert into faktur (id_pelanggan, kode_faktur, nip) values ('$id_pelanggan','$kode_faktur','$nip')");

        if($tambah){
            header('location: transaksi.php');
        }else{
            echo '
            <script>alert("Gagal menambah Transaksi baru");
            window.location.href="transaksi.php";
            </script>
            ';
        }
    }

    //Tambah Faktur Menu Pegawai
    if(isset($_POST['tambahfaktur2'])){
        $id_pelanggan = $_POST['id_pelanggan'];
        $kode_faktur = $_POST['kode_faktur'];
        $nip = $_POST['nip'];

        $tambah = mysqli_query($conn,"insert into faktur (id_pelanggan, kode_faktur, nip) values ('$id_pelanggan','$kode_faktur','$nip')");

        if($tambah){
            header('location: pegawaitransaksi.php');
        }else{
            echo '
            <script>alert("Gagal menambah Transaksi baru");
            window.location.href="pegawaitransaksi.php";
            </script>
            ';
        }
    }

    //Tambah Jajan dipilih pada transaksi view.php
    if(isset($_POST['tambahjajanpembeli'])){
        $kode_jajan = $_POST['kode_jajan'];
        $kuantitas = $_POST['kuantitas']; //Jumlah yang akan dikeluarin
        $kodef = $_POST['kodef']; 
        
        
        //hitung stok sekarang
        $hitung1 = mysqli_query($conn,"select * from jajan where kode_jajan='$kode_jajan'");
        $hitung2 = mysqli_fetch_array($hitung1);
        $stoksekarang = $hitung2['stok']; //stok jajan saat ini
        
         //Hitung Sub Total
        $hitung3  = mysqli_query($conn,"select * from jajan where kode_jajan='$kode_jajan'");
        $hitung4 = mysqli_fetch_array($hitung3);
        $hargajajan = $hitung4['harga_jajan'];

        if($stoksekarang>=$kuantitas){

            //kurangi stok dengan jumlah yang dikeluarkan
            $selisih = $stoksekarang - $kuantitas;

            //Menghitung Sub-total
            $sub_total = $kuantitas * $hargajajan;
            
            $tambah = mysqli_query($conn,"insert into transaksi (kode_faktur, kode_jajan, kuantitas, sub_total) values ('$kodef','$kode_jajan','$kuantitas', '$sub_total')");
            $update = mysqli_query($conn,"update jajan set stok='$selisih' where kode_jajan='$kode_jajan'");
            if($tambah&&$update){
                header('location: view.php?kodef='.$kodef);
            }else{
                echo '
                <script>alert("Gagal menambah jajan pembeli baru");
                window.location.href="view.php?kodef='.$kodef.'"
                </script>
                ';
            }

        }else{
            //Stok tidak cukup
            echo '
                <script>alert("Stok Jajan tidak cukup");
                window.location.href="view.php?kodef='.$kodef.'"
                </script>
                ';
        }  
    }

    //Tambah Jajan dipilih pada transaksi view Menu Pegawai
    if(isset($_POST['tambahjajanpembeli2'])){
        $kode_jajan = $_POST['kode_jajan'];
        $kuantitas = $_POST['kuantitas']; //Jumlah yang akan dikeluarin
        $kodef = $_POST['kodef']; 
        
        
        //hitung stok sekarang
        $hitung1 = mysqli_query($conn,"select * from jajan where kode_jajan='$kode_jajan'");
        $hitung2 = mysqli_fetch_array($hitung1);
        $stoksekarang = $hitung2['stok']; //stok jajan saat ini
        
         //Hitung Sub Total
        $hitung3  = mysqli_query($conn,"select * from jajan where kode_jajan='$kode_jajan'");
        $hitung4 = mysqli_fetch_array($hitung3);
        $hargajajan = $hitung4['harga_jajan'];

        if($stoksekarang>=$kuantitas){

            //kurangi stok dengan jumlah yang dikeluarkan
            $selisih = $stoksekarang - $kuantitas;

            //Menghitung Sub-total
            $sub_total = $kuantitas * $hargajajan;
            
            $tambah = mysqli_query($conn,"insert into transaksi (kode_faktur, kode_jajan, kuantitas, sub_total) values ('$kodef','$kode_jajan','$kuantitas', '$sub_total')");
            $update = mysqli_query($conn,"update jajan set stok='$selisih' where kode_jajan='$kode_jajan'");
            if($tambah&&$update){
                header('location: pegawaiview.php?kodef='.$kodef);
            }else{
                echo '
                <script>alert("Gagal menambah jajan pembeli baru");
                window.location.href="pegawaiview.php?kodef='.$kodef.'"
                </script>
                ';
            }

        }else{
            //Stok tidak cukup
            echo '
                <script>alert("Stok Jajan tidak cukup");
                window.location.href="pegawaiview.php?kodef='.$kodef.'"
                </script>
                ';
        }  
    }

    //Edit Jajan
    if(isset($_POST['editjajan'])){
        $kode_jajan = $_POST['kode_jajan'];
        $nama_jajan = $_POST['nama_jajan'];
        $harga_jajan = $_POST['harga_jajan'];
        $stok = $_POST['stok'];
        $id_tipe_jajan = $_POST['id_tipe_jajan'];
        
        //soal gambar
        $allowed_exstension = array('png','jpg');
        $nama = $_FILES['file']['name']; //ngambil nama gambar
        $dot = explode('.',$nama);
        $ekstensi = strtolower(end($dot));//ngambil ekstensinya
        $ukuran = $_FILES['file']['size'];//ngambil size file
        $file_tmp = $_FILES['file']['tmp_name'];//ngambil lokasi file

        //penamaan file -> Enkripsi
        $image = md5(uniqid($nama,true) . time()).'.'.$ekstensi; //menggabungkan nama file yang di enkripsi dengan ekstensinya

        if($ukuran==0){
            //jika tidak ingin upload gambar
            $apdet = mysqli_query($conn,"update jajan set harga_jajan='$harga_jajan', stok='$stok', id_tipe_jajan='$id_tipe_jajan' where kode_jajan='$kode_jajan'");

            if($apdet){
                echo '
                <script>alert("Berhasil mengedit jajan!!");
                window.location.href="jajan.php";
                </script>
                ';
            }else{
                echo '
                <script>alert("Gagal mengedit jajan");
                window.location.href="jajan.php";
                </script>
                ';
            }
        }else{
            //jika ingin

            $gambar = mysqli_query($conn, "select * from jajan where kode_jajan='$kode_jajan'");
            $get = mysqli_fetch_array($gambar);
            if($get==null){
                //kalau belum pernah upload gambar
                move_uploaded_file($file_tmp,'image/'.$image);
                $apdet = mysqli_query($conn,"update jajan set harga_jajan='$harga_jajan', stok='$stok', id_tipe_jajan='$id_tipe_jajan', gambar='$image' where kode_jajan='$kode_jajan'");

                if($apdet){
                    echo '
                    <script>alert("Berhasil mengedit jajan!!");
                    window.location.href="jajan.php";
                    </script>
                    ';

                }else{
                    echo '
                    <script>alert("Gagal mengedit jajan");
                    window.location.href="jajan.php";
                    </script>
                    ';
                }
            }else{
                //kalau sudah pernah upload gambar
                $img = 'image/'.$get['gambar'];
                unlink($img);

                $gambar = mysqli_query($conn, "select * from jajan where kode_jajan='$kode_jajan'");
                $get = mysqli_fetch_array($gambar);
                move_uploaded_file($file_tmp,'image/'.$image);
                $apdet = mysqli_query($conn,"update jajan set harga_jajan='$harga_jajan', stok='$stok', id_tipe_jajan='$id_tipe_jajan', gambar='$image' where kode_jajan='$kode_jajan'");
    
                if($apdet){
                    echo '
                    <script>alert("Berhasil mengedit jajan!!");
                    window.location.href="jajan.php";
                    </script>
                    ';
                }else{
                    echo '
                    <script>alert("Gagal mengedit jajan");
                    window.location.href="jajan.php";
                    </script>
                    ';
                }
            }
        } 
    }

    //Hapus Jajan
    if(isset($_POST['hapusjajan'])){
        $kode_jajan = $_POST['kode_jajan'];
        $kodejajantransaksi = mysqli_query($conn,"select * from transaksi where kode_jajan='$kode_jajan'");
        
        $gambar = mysqli_query($conn, "select * from jajan where kode_jajan='$kode_jajan'");
        $get = mysqli_fetch_array($gambar);
        $img = 'image/'.$get['gambar'];
        unlink($img);

        if($kodejajantransaksi = NULL){
            $hapus = mysqli_query($conn,"delete from jajan where kode_jajan='$kode_jajan'");
            if($hapus){
                echo '
                <script>alert("Berhasil menghapus jajan!!");
                window.location.href="jajan.php";
                </script>
                ';
            }else{
                echo '
                <script>alert("Gagal menghapus jajan");
                window.location.href="jajan.php";
                </script>
                ';
            }
        }else{
            $hapustrs =  mysqli_query($conn,"delete from transaksi where kode_jajan='$kode_jajan'");
            $hapus = mysqli_query($conn,"delete from jajan where kode_jajan='$kode_jajan'");
            if($hapus&&$hapustrs){
                echo '
                <script>alert("Berhasil menghapus jajan!!");
                window.location.href="jajan.php";
                </script>
                ';
            }else{
                echo '
                <script>alert("Gagal menghapus jajan");
                window.location.href="jajan.php";
                </script>
                ';
            }
        }  
    }

    //Edit Pegawai
    if(isset($_POST['editpegawai'])){
        $nip = $_POST['nip'];
        $nama_pegawai = $_POST['nama_pegawai'];
        $tanggal_lahir = $_POST['tanggal_lahir'];
        $id_jenis_kelamin = $_POST['id_jenis_kelamin'];
        $id_status = $_POST['id_status'];
        $id_tipe_pegawai = $_POST['id_tipe_pegawai'];

        $apdet = mysqli_query($conn,"update pegawai set nama_pegawai='$nama_pegawai', tanggal_lahir='$tanggal_lahir', id_jenis_kelamin='$id_jenis_kelamin', id_status='$id_status',
                                id_tipe_pegawai='$id_tipe_pegawai' where nip='$nip'");

        if($apdet){
            echo '
            <script>alert("Berhasil Mengedit Data Pegawai!!");
            window.location.href="pegawai.php";
            </script>
            ';

        }else{
            echo '
            <script>alert("Gagal Mengedit Data pegawai");
            window.location.href="pegawai.php";
            </script>
            ';
        }
    }

    //Hapus Pegawai
    if(isset($_POST['hapuspegawai'])){
        $nip = $_POST['nip'];
        $nipfaktur = mysqli_query($conn,"select * from faktur where nip='$nip'");
        
        if($nipfaktur = NULL){
            $hapus = mysqli_query($conn,"delete from pegawai where nip='$nip'");
            if($hapus){
                echo '
                <script>alert("Berhasil menghapus Data Pegawai!!");
                window.location.href="pegawai.php";
                </script>
                ';
            }else{
                echo '
                <script>alert("Gagal menghapus Data Pegawai");
                window.location.href="pegawai.php";
                </script>
                ';
            }
        }else{
            $hapusfktr =  mysqli_query($conn,"update faktur set nip = NULL where nip='$nip'");
            $hapus = mysqli_query($conn,"delete from pegawai where nip='$nip'");
            if($hapus&&$hapusfktr){
                echo '
                <script>alert("Berhasil menghapus Data Pegawai!!");
                window.location.href="pegawai.php";
                </script>
                ';
            }else{
                echo '
                <script>alert("Gagal menghapus Data Pegawai");
                window.location.href="pegawai.php";
                </script>
                ';
            }
        }
    }

    //Edit Pelanggan
    if(isset($_POST['editpelanggan'])){
        $id_pelanggan = $_POST['id_pelanggan'];
        $nama_pelanggan = $_POST['nama_pelanggan'];
        $id_jenis_kelamin = $_POST['id_jenis_kelamin'];
        $id_status = $_POST['id_status'];

        $apdet = mysqli_query($conn,"update pelanggan set nama_pelanggan='$nama_pelanggan', id_jenis_kelamin='$id_jenis_kelamin', id_status='$id_status' where id_pelanggan='$id_pelanggan'");

        if($apdet){
            echo '
            <script>alert("Berhasil Mengedit Data Pelanggan!!");
            window.location.href="pelanggan.php";
            </script>
            ';

        }else{
            echo '
            <script>alert("Gagal Mengedit Data Pelanggan");
            window.location.href="pelanggan.php";
            </script>
            ';
        }
    }

    //Hapus Pelanggan 
    if(isset($_POST['hapuspelanggan'])){
        $id_pelanggan = $_POST['id_pelanggan'];
        $idpelfaktur = mysqli_query($conn,"select * from faktur where id_pelanggan='$id_pelanggan'");
        $kode_faktur = mysqli_query($conn,"select kode_faktur from faktur where id_pelanggan='$id_pelanggan'");
        $get = mysqli_fetch_array($kode_faktur);
        $kodefaktur = $get['kode_faktur'];
        
        if($idpelfaktur = NULL){
            $hapus = mysqli_query($conn,"delete from pelanggan where id_pelanggan='$id_pelanggan'");
            if($hapus){
                echo '
                <script>alert("Berhasil menghapus Data Pelanggan!!");
                window.location.href="pelanggan.php";
                </script>
                ';
            }else{
                echo '
                <script>alert("Gagal menghapus Data Pelanggan");
                window.location.href="pelanggan.php";
                </script>
                ';
            }
        }else{
            $hapustrs =  mysqli_query($conn,"delete from transaksi where kode_faktur='$kodefaktur'");
            $hapusfktr =  mysqli_query($conn,"delete from faktur where id_pelanggan='$id_pelanggan'");
            $hapus = mysqli_query($conn,"delete from pelanggan where id_pelanggan='$id_pelanggan'");
            if($hapus&&$hapusfktr&&$hapustrs){
                echo '
                <script>alert("Berhasil menghapus Data Pelanggan!!");
                window.location.href="pelanggan.php";
                </script>
                ';
            }else{
                echo '
                <script>alert("Gagal menghapus Data Pelanggan");
                window.location.href="pelanggan.php";
                </script>
                ';
            }
        }
    }

    //Hapus Faktur
    if(isset($_POST['hapusfaktur'])){
        $kode_faktur = $_POST['kode_faktur'];
        $kodefakturtransaksi = mysqli_query($conn,"select * from transaksi where kode_faktur='$kode_faktur'");
        
        if($kodefakturtransaksi = NULL){
            $hapus = mysqli_query($conn,"delete from faktur where kode_faktur='$kode_faktur'");
            if($hapus){
                echo '
                <script>alert("Berhasil menghapus faktur!!");
                window.location.href="transaksi.php";
                </script>
                ';
            }else{
                echo '
                <script>alert("Gagal menghapus faktur");
                window.location.href="transaksi.php";
                </script>
                ';
            }
        }else{
            $hapustrs =  mysqli_query($conn,"delete from transaksi where kode_faktur='$kode_faktur'");
            $hapus = mysqli_query($conn,"delete from faktur where kode_faktur='$kode_faktur'");
            if($hapus&&$hapustrs){
                echo '
                <script>alert("Berhasil menghapus faktur!!");
                window.location.href="transaksi.php";
                </script>
                ';
            }else{
                echo '
                <script>alert("Gagal menghapus faktur");
                window.location.href="transaksi.php";
                </script>
                ';
            }
        }  
    }

    //edit jajan yang dibeli pembeli
    if(isset($_POST['editjajanpembeli'])){
        $kode_jajan = $_POST['kode_jajan'];
        $no = $_POST['no'];
        $kodef = $_POST['kodef'];
        $kuantitas = $_POST['kuantitass'];

        //cek kuantitas sekarang
        $cek1 = mysqli_query($conn,"select * from transaksi where no='$no'");
        $cek2 = mysqli_fetch_array($cek1);
        $kuantitassekarang = $cek2['kuantitas'];

        //cek stok sekarang
        $cek3 = mysqli_query($conn,"select * from jajan where kode_jajan='$kode_jajan'");
        $cek4 = mysqli_fetch_array($cek3);
        $stoksekarang = $cek4['stok'];

        if($kuantitas>$kuantitassekarang){
            $selisih = $kuantitas - $kuantitassekarang;
            $newstok = $stoksekarang - $selisih;
            $update1 = mysqli_query($conn,"update jajan set stok='$newstok'where kode_jajan='$kode_jajan' ");
            $update2 = mysqli_query($conn,"update transaksi set kuantitas='$kuantitas' where kode_jajan='$kode_jajan' ");
            if($update1&&$update2){
                echo '
                <script>alert("Berhasil Mengedit Jajan Pelanggan!!");
                window.location.href="view.php?kodef='.$kodef.'";
                </script>
                ';
    
            }else{
                echo '
                <script>alert("Gagal Mengedit Jajan Pelanggan");
                window.location.href="view.php?kodef='.$kodef.'";
                </script>
                ';
            }
        }else if($kuantitas<$kuantitassekarang){
            $selisih = $kuantitassekarang-$kuantitas;
            $newstok = $stoksekarang + $selisih;
            $update1 = mysqli_query($conn,"update jajan set stok='$newstok'where kode_jajan='$kode_jajan' ");
            $update2 = mysqli_query($conn,"update transaksi set kuantitas='$kuantitas' where kode_jajan='$kode_jajan' ");
            if($update1&&$update2){
                echo '
                <script>alert("Berhasil Mengedit Jajan Pelanggan!!");
                window.location.href="view.php?kodef='.$kodef.'";
                </script>
                ';
    
            }else{
                echo '
                <script>alert("Gagal Mengedit Jajan Pelanggan");
                window.location.href="view.php?kodef='.$kodef.'";
                </script>
                ';
            }
        }
        

        
    }

    //edit jajan yang dibeli pembeli Menu Pegawai
    if(isset($_POST['editjajanpembeli2'])){
        $kode_jajan = $_POST['kode_jajan'];
        $no = $_POST['no'];
        $kodef = $_POST['kodef'];
        $kuantitas = $_POST['kuantitass'];

        //cek kuantitas sekarang
        $cek1 = mysqli_query($conn,"select * from transaksi where no='$no'");
        $cek2 = mysqli_fetch_array($cek1);
        $kuantitassekarang = $cek2['kuantitas'];

        //cek stok sekarang
        $cek3 = mysqli_query($conn,"select * from jajan where kode_jajan='$kode_jajan'");
        $cek4 = mysqli_fetch_array($cek3);
        $stoksekarang = $cek4['stok'];

        if($kuantitas>$kuantitassekarang){
            $selisih = $kuantitas - $kuantitassekarang;
            $newstok = $stoksekarang - $selisih;
            $update1 = mysqli_query($conn,"update jajan set stok='$newstok'where kode_jajan='$kode_jajan' ");
            $update2 = mysqli_query($conn,"update transaksi set kuantitas='$kuantitas' where kode_jajan='$kode_jajan' ");
            if($update1&&$update2){
                echo '
                <script>alert("Berhasil Mengedit Jajan Pelanggan!!");
                window.location.href="pegawaiview.php?kodef='.$kodef.'";
                </script>
                ';
    
            }else{
                echo '
                <script>alert("Gagal Mengedit Jajan Pelanggan");
                window.location.href="pegawaiview.php?kodef='.$kodef.'";
                </script>
                ';
            }
        }else if($kuantitas<$kuantitassekarang){
            $selisih = $kuantitassekarang-$kuantitas;
            $newstok = $stoksekarang + $selisih;
            $update1 = mysqli_query($conn,"update jajan set stok='$newstok'where kode_jajan='$kode_jajan' ");
            $update2 = mysqli_query($conn,"update transaksi set kuantitas='$kuantitas' where kode_jajan='$kode_jajan' ");
            if($update1&&$update2){
                echo '
                <script>alert("Berhasil Mengedit Jajan Pelanggan!!");
                window.location.href="pegawaiview.php?kodef='.$kodef.'";
                </script>
                ';
    
            }else{
                echo '
                <script>alert("Gagal Mengedit Jajan Pelanggan");
                window.location.href="pegawaiview.php?kodef='.$kodef.'";
                </script>
                ';
            }
        }  
    }

    //Hapus jajan yang dibeli pembeli
    if(isset($_POST['hapusjajanpembeli'])){
        $kode_jajan = $_POST['kode_jajan'];
        $no = $_POST['no'];
        $kodef = $_POST['kodef'];

        //cek kuantitas sekarang
        $cek1 = mysqli_query($conn,"select * from transaksi where no='$no'");
        $cek2 = mysqli_fetch_array($cek1);
        $kuantitassekarang = $cek2['kuantitas'];

        //cek stok sekarang
        $cek3 = mysqli_query($conn,"select * from jajan where kode_jajan='$kode_jajan'");
        $cek4 = mysqli_fetch_array($cek3);
        $stoksekarang = $cek4['stok'];

        $hitungg = $stoksekarang + $kuantitassekarang;

        $update = mysqli_query($conn,"update jajan set stok='$hitungg' where kode_jajan='$kode_jajan'");
        $hapus = mysqli_query($conn,"delete from transaksi where no='$no' and kode_jajan='$kode_jajan'");

        if($update&&$hapus){
            echo '
            <script>alert("Data Berhasil dihapus!!");
            window.location.href="view.php?kodef='.$kodef.'";
            </script>
            ';

        }else{
            echo '
            <script>alert("Data Gagal dihapus");
            window.location.href="view.php?kodef='.$kodef.'";
            </script>
            ';
        }
    }

    //Hapus jajan yang dibeli pembeli Menu Pegawai
    if(isset($_POST['hapusjajanpembeli2'])){
        $kode_jajan = $_POST['kode_jajan'];
        $no = $_POST['no'];
        $kodef = $_POST['kodef'];

        //cek kuantitas sekarang
        $cek1 = mysqli_query($conn,"select * from transaksi where no='$no'");
        $cek2 = mysqli_fetch_array($cek1);
        $kuantitassekarang = $cek2['kuantitas'];

        //cek stok sekarang
        $cek3 = mysqli_query($conn,"select * from jajan where kode_jajan='$kode_jajan'");
        $cek4 = mysqli_fetch_array($cek3);
        $stoksekarang = $cek4['stok'];

        $hitungg = $stoksekarang + $kuantitassekarang;

        $update = mysqli_query($conn,"update jajan set stok='$hitungg' where kode_jajan='$kode_jajan'");
        $hapus = mysqli_query($conn,"delete from transaksi where no='$no' and kode_jajan='$kode_jajan'");

        if($update&&$hapus){
            echo '
            <script>alert("Data Berhasil dihapus!!");
            window.location.href="pegawaiview.php?kodef='.$kodef.'";
            </script>
            ';

        }else{
            echo '
            <script>alert("Data Gagal dihapus");
            window.location.href="pegawaiview.php?kodef='.$kodef.'";
            </script>
            ';
        }
    }

    //Bayar
    if(isset($_POST['bayar'])){
        $id_tipe_pembayaran = $_POST['id_tipe_pembayaran'];
        $total = $_POST['total'];
        $jumlah_bayar = $_POST['jumlah_bayar'];
        $kodef = $_POST['kodef'];

        //menghitung kembalian
        $kembalian = $jumlah_bayar - $total;

        $tambah = mysqli_query($conn,"update faktur set total='$total', jumlah_bayar='$jumlah_bayar', id_tipe_pembayaran='$id_tipe_pembayaran', kembalian='$kembalian' 
                                where kode_faktur='$kodef'");

        if($tambah){
            echo '
            <script>alert("Berhasil Membayar!! kembalian = Rp.'.$kembalian.'");
            window.location.href="transaksi.php";
            </script>
            ';
        }else{
            echo '
            <script>alert("Gagal Bayar");
            window.location.href="transaksi.php";
            </script>
            ';
        }
    }

    //Bayar Menu Pegawai
    if(isset($_POST['bayar2'])){
        $id_tipe_pembayaran = $_POST['id_tipe_pembayaran'];
        $total = $_POST['total'];
        $jumlah_bayar = $_POST['jumlah_bayar'];
        $kodef = $_POST['kodef'];

        //menghitung kembalian
        $kembalian = $jumlah_bayar - $total;

        $tambah = mysqli_query($conn,"update faktur set total='$total', jumlah_bayar='$jumlah_bayar', id_tipe_pembayaran='$id_tipe_pembayaran', kembalian='$kembalian' 
                                where kode_faktur='$kodef'");

        if($tambah){
            echo '
            <script>alert("Berhasil Membayar!! kembalian = Rp.'.$kembalian.'");
            window.location.href="pegawaitransaksi.php";
            </script>
            ';
        }else{
            echo '
            <script>alert("Gagal Bayar");
            window.location.href="pegawaitransaksi.php";
            </script>
            ';
        }
    }
?>