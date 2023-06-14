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
        <title>Data Jajan</title>
        <link rel="icon" type="image/x-icon" href="assets/logoluciabakery.ico" />
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <style>
            .zoomable{
                width: 150px;
            }
            .zoomable:hover{
                transform: scale(2);
                transition: 0.3s ease;
            }
        </style>

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
                        <h1 class="mt-4">Data Jajan</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Welcome</li>
                        </ol>

                        <?php
                            $datajajan = mysqli_query($conn,"select * from jajan");
                            $jumlahjajan = mysqli_num_rows($datajajan);
                        ?>


                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Jumlah Jajan: <?php echo $jumlahjajan ?></div>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-info mb-4 " data-bs-toggle="modal" data-bs-target="#myModal">
                            Tambah Jajan
                        </button>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Data Jajan
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Nomer</th>
                                            <th>Kode Jajan</th>
                                            <th>Nama Jajan</th>
                                            <th>Gambar</th>
                                            <th>Harga Jajan</th>
                                            <th>Stok</th>
                                            <th>ID Tipe Jajan</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    
                                    <?php
                                        $get = mysqli_query($conn,"select * from jajan");
                                        $i = 1;

                                        while($jjn=mysqli_fetch_array($get)){
                                        $kode_jajan = $jjn['kode_jajan'];
                                        $kodef = $jjn['kode_jajan'];
                                        $nama_jajan = $jjn['nama_jajan'];
                                        $harga_jajan = $jjn['harga_jajan'];
                                        $stok = $jjn['stok'];
                                        $id_tipe_jajan = $jjn['id_tipe_jajan'];
                                        
                                        //cek gambar ada atau tidak
                                        $gambar = $jjn['gambar']; //ambil gambar
                                        if($gambar==null){
                                            //jika tidak ada gambar
                                            $img = "No Photo";
                                        }else{
                                            //jika ada gambar
                                            $img = '<img src="image/'.$gambar.'" class="zoomable">';
                                        }

                                    ?>

                                        <tr>
                                            <td><?=$i++;?></td>
                                            <td><?=$kode_jajan;?></td>
                                            <td><?=$nama_jajan;?></td>
                                            <td><?=$img;?></td>
                                            <td>Rp.<?=number_format($harga_jajan);?></td>
                                            <td><?=$stok;?></td>
                                            <td><?=$id_tipe_jajan;?></td>
                                            <td><button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit<?=$kode_jajan;?>">Edit</button>
                                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapus<?=$kode_jajan;?>">Hapus</button>
                                            </td>
                                        </tr>
                                    
                                            <!-- The Modal Edit Jajan-->
                                        <div class="modal fade" id="edit<?=$kode_jajan;?>">
                                        <div class="modal-dialog">
                                            <div class="modal-content">

                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title">Edit Data Jajan</h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>

                                            <form method="post" enctype="multipart/form-data">

                                            <!-- Modal body -->
                                            <div class="modal-body">
                                                Kode Jajan
                                                <input type="text" name="kode_jajan" class="form-control mb-2" placeholder="Kode_Jajan" value="<?=$kode_jajan;?>" readonly>
                                                Nama Jajan
                                                <input type="text" name="nama_jajan" class="form-control mb-2" placeholder="Nama Jajan" value="<?=$nama_jajan;?>">
                                                Harga Jajan
                                                <input type="num" name="harga_jajan" class="form-control mb-2" placeholder="Harga Jajan" value="<?=$harga_jajan;?>">
                                                Stok Jajan
                                                <input type="num" name="stok" class="form-control mb-2" placeholder="Stok" value="<?=$stok?>">
                                                ID Tipe Jajan
                                                <input type="text" name="id_tipe_jajan" class="form-control mb-2" placeholder="ID Tipe Jajan" value="<?=$id_tipe_jajan?>">
                                                Tambah Gambar
                                                <br>
                                                    <input type="file" name="file" class="form-control" >
                                                <br>
                                            </div>

                                            <!-- Modal footer -->
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-success" name="editjajan">Edit</button>
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                            </div>
                                            
                                            </form>

                                            </div>
                                        </div>
                                        </div>

                                            <!-- The Modal Hapus Jajan -->
                                        <div class="modal fade" id="hapus<?=$kode_jajan;?>">
                                        <div class="modal-dialog">
                                            <div class="modal-content">

                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title">Apakah Anda Yakin Ingin Menghapus Jajan Ini?</h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>

                                            <form method="post">

                                            <!-- Modal body -->
                                            <div class="modal-body">
                                                Apakah Anda Yakin Ingin Menghapus Jajan Ini?
                                                <input type="hidden" name="kode_jajan" value="<?=$kode_jajan;?>"> 
                                            </div>

                                            <!-- Modal footer -->
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-success" name="hapusjajan">Ya</button>
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

<!-------------------------------------------------------------------------------------------------------------------------------------------------------------->

    <!-- The Modal -->
<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Tambah Jajan</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

    <form method="post" enctype="multipart/form-data">

      <!-- Modal body -->
      <div class="modal-body" >
        ID Jajan
        <select name="id_tipe_jajan" class="form-control">
            
            <?php
                $gettipejajan = mysqli_query($conn,"select * from tipe_jajan");
                while($tp=mysqli_fetch_array($gettipejajan)){
                    $nama_tipe_jajan = $tp['nama_tipe_jajan'];
                    $id_tipe_jajan = $tp['id_tipe_jajan'];
            ?>
    
            <option value="<?=$id_tipe_jajan;?>"><?=$id_tipe_jajan;?>   - <?=$nama_tipe_jajan;?></option>
    
    
            <?php
                };
            ?>

            
        </select>
        Kode jajan
        <input type="text" name="kode_jajan" class="form-control " placeholder="Kode Jajan">  
        Nama Jajan  
        <input type="text" name="nama_jajan" class="form-control " placeholder="Nama Jajan">
        Harga Jajan
        <input type="num" name="harga_jajan" class="form-control " placeholder="Harga Jajan">
        Masukkan Gambar
        <br>
        <input type="file" name="file" class="form-control" >
        <br>
        Stok
        <input type="num" name="stok" class="form-control " placeholder="Stok">
        
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="submit" class="btn btn-success" name="tambahjajan">Tambahkan</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>
      
    </form>

    </div>
  </div>
</div>

<!-------------------------------------------------------------------------------------------------------------------------------------------------------------->

</html>
