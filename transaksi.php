<?php
    require 'cekloginadmin.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Transaksi</title>
        <link rel="icon" type="image/x-icon" href="assets/logoluciabakery.ico" />
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.php" target="blank">Lucia Bakery</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar-->
            <a class="navbar-brand"><?php echo $_SESSION['admin'];?></a>
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
            <a class="navbar-brand"><?php echo "Hari ini Tanggal ". date("d-M-Y"). "<br>";?></a>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <!-- ini bagian menu -->
                            <div class="sb-sidenav-menu-heading">Menu</div>
                            <a class="nav-link" href="pegawai.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-hard-hat"></i></div>
                                Pegawai
                            </a>
                            <a class="nav-link" href="pelanggan.php">
                                <div class="sb-nav-link-icon"><i class="far fa-handshake"></i></div>
                                Pelanggan
                            </a>
                            <a class="nav-link" href="jajan.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-shopping-basket"></i></div>
                                Jajan
                            </a>
                            <a class="nav-link" href="transaksi.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-dolly"></i></div>
                                Transaksi
                            </a>
                        </div>
                    </div>
                    
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Transaksi</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Welcome</li>
                        </ol>
                        <!--Jumlah Transaksi-->
                        <?php
                            $datatransaksi = mysqli_query($conn,"select * from faktur");
                            $jumlahtransaksi = mysqli_num_rows($datatransaksi);
                        ?>


                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Total Transaksi: <?php echo $jumlahtransaksi ?></div>
                                </div>
                            </div>
                        </div>

                        <!-- Tombol Tambah -->
                        <button type="button" class="btn btn-info mb-4 " data-bs-toggle="modal" data-bs-target="#myModal">
                            Tambah Transaksi
                        </button>

                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Data Transaksi
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Kode Faktur</th>
                                            <th>Tanggal</th>
                                            <th>Nama Pelanggan</th>
                                            <th>Pegawai yang Melayani</th>
                                            <th>Jumlah Macam Jajan</th>
                                            <th>Total dibeli</th>
                                            <th>Jumlah yang bayar</th>
                                            <th>Tipe Pembayaran</th>
                                            <th>Kembalian</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    
                                    <?php
                                        $get = mysqli_query($conn,"select * from faktur f, pelanggan pl, pegawai pg
                                                        where f.id_pelanggan=pl.id_pelanggan and f.nip=pg.nip ");

                                        while($trk=mysqli_fetch_array($get)){
                                        $kode_faktur = $trk['kode_faktur'];
                                        $tanggal = $trk['tanggal'];
                                        $nama_pelanggan = $trk['nama_pelanggan'];
                                        $nama_pegawai = $trk['nama_pegawai'];
                                        $total = $trk['total'];
                                        $jumlah_bayar = $trk['jumlah_bayar'];
                                        $id_tipe_pembayaran = $trk['id_tipe_pembayaran'];
                                        $kembalian = $trk['kembalian'];
                                        
                                        //Hitung Jumlah 
                                        $hitungjumlah = mysqli_query($conn,"select * from transaksi where kode_faktur='$kode_faktur'");
                                        $jumlah = mysqli_num_rows($hitungjumlah);

                                    ?>

                                        <tr>
                                            <td><?=$kode_faktur;?></td>
                                            <td><?=$tanggal;?></td>
                                            <td><?=$nama_pelanggan;?></td>
                                            <td><?=$nama_pegawai;?></td>
                                            <td><?=$jumlah;?></td>
                                            <td>Rp.<?=number_format($total);?></td>
                                            <td>Rp.<?=number_format($jumlah_bayar);?></td>
                                            <td><?=$id_tipe_pembayaran;?></td>
                                            <td>Rp.<?=number_format($kembalian);?></td>
                                            <td>
                                                <a href="view.php?kodef=<?=$kode_faktur;?>" class="btn btn-primary" target="blank">Lihat</a>
                                                <a href="cetak.php?kodef=<?=$kode_faktur;?>" class="btn btn-info" target="blank">Cetak</a> 
                                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapus<?=$kode_faktur;?>">Hapus</button>
                                            </td>
                                        </tr>
                                        
                                            <!-- The Modal Hapus Pegawai -->
                                            <div class="modal fade" id="hapus<?=$kode_faktur;?>">
                                        <div class="modal-dialog">
                                            <div class="modal-content">

                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title">Apakah Anda Yakin Ingin Menghapus Transaksi Faktur <?=$kode_faktur?>?</h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>

                                            <form method="post">

                                            <!-- Modal body -->
                                            <div class="modal-body">
                                                Apakah Anda Yakin Ingin Menghapus Transaksi Faktur <?=$kode_faktur?>?
                                                <input type="hidden" name="kode_faktur" value="<?=$kode_faktur;?>"> 
                                            </div>

                                            <!-- Modal footer -->
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-success" name="hapusfaktur">Ya</button>
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">tidak</button>
                                            </div>
                                            
                                            </form>

                                            </div>
                                        </div>
                                        </div>

                                    <?php
                                        };//end of while
                                    ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2021</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>

    <!-- The Modal -->
<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Tambah Transaksi Baru</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

    <form method="post">

      <!-- Modal body -->
      <div class="modal-body">
        <?php
            $auto = mysqli_query($conn,"select max(kode_faktur) as max_code from faktur");
            $data = mysqli_fetch_array($auto);
            $code = $data['max_code'];
            $urutan = (int)substr($code, 2, 7);
            $urutan++;
            $angka = "13";
            $id_pel = $angka . sprintf("%07s", $urutan);
        ?>
        Pilih Pelanggan
        <select name="id_pelanggan" class="form-control">
            
        <?php
            $getpelanggan = mysqli_query($conn,"select * from pelanggan");
            while($pel=mysqli_fetch_array($getpelanggan)){
                $nama_pelanggan = $pel['nama_pelanggan'];
                $id_pelanggan = $pel['id_pelanggan'];
        ?>

        <option value="<?=$id_pelanggan;?>"><?=$nama_pelanggan;?></option>


        <?php
            };
        ?>

        </select>
        Pegawai Yang Melayani?
        <select name="nip" class="form-control">
            
            <?php
                $getpeg = mysqli_query($conn,"select * from pegawai");
                while($peg=mysqli_fetch_array($getpeg)){
                    $nama_pegawai= $peg['nama_pegawai'];
                    $nip = $peg['nip'];
            ?>
            
            <option value="<?=$nip;?>"><?=$nip;?>   - <?=$nama_pegawai;?></option>
    
    
            <?php
                };
            ?>
    
            </select>
        <input type="hidden" name="kode_faktur" value="<?=$id_pel?>" class="form-control">
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="submit" class="btn btn-success" name="tambahfaktur">Tambahkan</button> <!-- Masuk Faktur-->
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>
      
    </form>

    </div>
  </div>
</div>


</html>
