<?php
    require 'cekloginadmin.php';

    if(isset($_GET['kodef'])){
        $kodef = $_GET['kodef'];

        $ambilnamapelanggan = mysqli_query($conn,"select * from faktur f, pelanggan pl where f.id_pelanggan = pl.id_pelanggan and f.kode_faktur = '$kodef'");
        $namapel = mysqli_fetch_array($ambilnamapelanggan);
        $namapelanggan = $namapel['nama_pelanggan'];
    }else{
        header('location: transaksi.php');
    }

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Transaksi - <?=$namapelanggan;?></title>
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
                        <h1 class="mt-4">Data Transaksi: <?=$kodef;?></h1>
                        <h4 class="mt-4">Nama Pelanggan: <?=$namapelanggan;?></h4>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Welcome</li>
                        </ol>

                        <?php
                            $datatransaksi = mysqli_query($conn,"select * from transaksi");
                            $jumlahtransaksi = mysqli_num_rows($datatransaksi);
                        ?>

                        <!-- Tombol Tambah -->
                        <button type="button" class="btn btn-info mb-4 " data-bs-toggle="modal" data-bs-target="#myModal">
                            Tambah Jajan
                        </button>
                        <button type="button" class="btn btn-primary mb-4 " data-bs-toggle="modal" data-bs-target="#bayar">
                            Bayar 
                        </button>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Data Keranjang
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama jajan</th>
                                            <th>Harga Satuan</th>
                                            <th>Jumlah</th>
                                            <th>Sub-Total</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    
                                    <?php
                                        $get = mysqli_query($conn,"select * from transaksi t, jajan jn where t.kode_jajan = jn.kode_jajan and t.kode_faktur='$kodef'");
                                        $i = 1;

                                        while($tr=mysqli_fetch_array($get)){
                                        $no = $tr['no'];
                                        $kode_jajan = $tr['kode_jajan'];
                                        $nama_jajan = $tr['nama_jajan'];
                                        $harga_jajan = $tr['harga_jajan'];
                                        $kuantitas = $tr['kuantitas'];
                                        $subtotal = $tr['sub_total'];
                                    ?>

                                        <tr>
                                            <td><?=$i++;?></td>
                                            <td><?=$nama_jajan;?></td>
                                            <td>Rp.<?=number_format($harga_jajan);?></td>
                                            <td><?=number_format($kuantitas);?></td>
                                            <td>Rp.<?=number_format($subtotal);?></td>
                                            <td><button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#ganti<?=$kode_jajan;?>">Edit</button>
                                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapuss<?=$kode_jajan;?>">Hapus</button>
                                            </td>
                                        </tr>

                                            <!-- The Modal Edit Jajan-->
                                            <div class="modal fade" id="ganti<?=$kode_jajan;?>">
                                        <div class="modal-dialog">
                                            <div class="modal-content">

                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title">Edit Data Jajan</h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>

                                            <form method="post">

                                            <!-- Modal body -->
                                        <div class="modal-body">
                                                Nama Jajan
                                                <input type="text" name="nama_jajan" class="form-control" placeholder="Nama Jajan" value="<?=$nama_jajan;?>" readonly>
                                                Jumlah Jajan
                                                <input type="number" name="kuantitass" class="form-control " placeholder="Jumlah Jajan" min="1" required>
                                                <input type="hidden" name="kode_jajan" value="<?=$kode_jajan;?>">
                                                <input type="hidden" name="kodef" value="<?=$kodef;?>">
                                                <input type="hidden" name="no" value="<?=$no;?>">
                                            </div>

                                            <!-- Modal footer -->
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-success" name="editjajanpembeli">Edit</button>
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                            </div>
                                            
                                            </form>

                                            </div>
                                        </div>
                                        </div>

                                            <!-- The Modal Hapus Jajan -->
                                        <div class="modal fade" id="hapuss<?=$kode_jajan;?>">
                                        <div class="modal-dialog">
                                            <div class="modal-content">

                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title">Apakah Anda Yakin?</h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>

                                            <form method="post">

                                            <!-- Modal body -->
                                            <div class="modal-body">
                                                Tidak Jadi beli <?=$nama_jajan?>?
                                                <input type="hidden" name="kode_jajan" value="<?=$kode_jajan;?>">
                                                <input type="hidden" name="kodef" value="<?=$kodef;?>">
                                                <input type="hidden" name="no" value="<?=$no;?>">
                                            </div>

                                            <!-- Modal footer -->
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-success" name="hapusjajanpembeli">Ya</button>
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
        <h4 class="modal-title">Tambah Jajan</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

    <form method="post">

      <!-- Modal body -->
      <div class="modal-body">
        Pilih Jajan 
        <select name="kode_jajan" class="form-control">
            
        <?php
            $getjajan = mysqli_query($conn,"select * from jajan where kode_jajan not in (select kode_jajan from transaksi where kode_faktur='$kodef')");
            
            while($jjn=mysqli_fetch_array($getjajan)){
                $nama_jajan = $jjn['nama_jajan'];
                $stok = $jjn['stok'];
                $kode_jajan = $jjn['kode_jajan'];
        ?>

        <option value="<?=$kode_jajan;?>"><?=$kode_jajan;?> - <?=$nama_jajan;?> - <?=$stok;?></option>


        <?php
            }
        ?>
        </select>
        Jumlah Jajan
        <input type="number" name="kuantitas" class="form-control" placeholder="Jumlah Jajan" min="1" required>
        <input type="hidden" name="kodef" value="<?=$kodef;?>">
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="submit" class="btn btn-success" name="tambahjajanpembeli">Tambahkan</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>
      
    </form>

    </div>
  </div>
</div>

<!---------------------------------------------------------------------------------------------------------------------------------------------------------->
            <!-- The Modal Bayar -->
    <div class="modal fade" id="bayar">
    <div class="modal-dialog">
        <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title">Pembayaran</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <form method="post">

        <!-- Modal body -->
        <div class="modal-body">
            <?php
            $auto = mysqli_query($conn,"select sum(sub_total) as total from transaksi where kode_faktur='$kodef'");
            $data = mysqli_fetch_array($auto);
            $total = $data['total'];
            ?>

            Pilih Tipe Pembayaran
            <select name="id_tipe_pembayaran" class="form-control">
                
            <?php
                $getpembayaran = mysqli_query($conn,"select * from tipe_pembayaran");
                
                while($tpm=mysqli_fetch_array($getpembayaran)){
                    $nama_tipe_pembayaran = $tpm['nama_tipe_pembayaran'];
                    $id_tipe_pembayaran = $tpm['id_tipe_pembayaran'];
            ?>

            <option value="<?=$id_tipe_pembayaran;?>"><?=$id_tipe_pembayaran;?> - <?= $nama_tipe_pembayaran;?></option>


            <?php
                }
            ?>
            </select>
            Total Pembelian
            <input type="hidden" name="total" class="form-control" value="<?=$total;?>">
            <input type="text" class="form-control" value="<?=number_format($total);?>" readonly>
            Jumlah Yang Dibayar
            <input type="number" name="jumlah_bayar" class="form-control " placeholder="Jumlah dibayar">
            <input type="hidden" name="kodef" value="<?=$kodef;?>">
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
            <button type="submit" class="btn btn-success" name="bayar">Bayar</button>
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        </div>
        
        </form>

        </div>
    </div>
    </div>

</html>
