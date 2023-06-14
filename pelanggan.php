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
        <title>Data Pelanggan</title>
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
                        <h1 class="mt-4">Data Pelanggan</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Welcome</li>
                        </ol>
                        <button type="button" class="btn btn-info mb-4 " data-bs-toggle="modal" data-bs-target="#myModal">
                            Tambah Pelanggan
                        </button>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Data Pelanggan
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Nomer</th>
                                            <th>ID Pelanggan</th>
                                            <th>Nama Pelanggan</th>
                                            <th>ID Jenis Kelamin</th>
                                            <th>ID Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    
                                    <?php
                                        $get = mysqli_query($conn,"select * from pelanggan pl, jenis_kelamin jk, status st where pl.id_jenis_kelamin=jk.id_jenis_kelamin and
                                                            pl.id_status=st.id_status");
                                        $i = 1;

                                        while($pel=mysqli_fetch_array($get)){
                                        $id_pelanggan = $pel['id_pelanggan'];
                                        $nama_pelanggan = $pel['nama_pelanggan'];
                                        $nama_jenis_kelamin = $pel['nama_jenis_kelamin'];
                                        $nama_status = $pel['nama_status'];

                                    ?>

                                        <tr>
                                            <td><?=$i++;?></td>
                                            <td><?=$id_pelanggan;?></td>
                                            <td><?=$nama_pelanggan;?></td>
                                            <td><?=$nama_jenis_kelamin;?></td>
                                            <td><?=$nama_status;?></td>
                                            <td><button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit<?=$id_pelanggan;?>">Edit</button>
                                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapus<?=$id_pelanggan;?>">Hapus</button>
                                            </td>
                                        </tr>

                                            <!-- The Modal Edit Pegawai-->
                                            <div class="modal fade" id="edit<?=$id_pelanggan;?>">
                                        <div class="modal-dialog">
                                            <div class="modal-content">

                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title">Edit Data Pelanggan</h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>

                                            <form method="post">

                                            <!-- Modal body -->
                                            <div class="modal-body">
                                            ID Pelanggan
                                            <input type="text" name="id_pelanggan" value="<?=$id_pelanggan;?>" class="form-control mb-2" placeholder="id_pelanggan" readonly>  
                                            Nama Pelanggan 
                                            <input type="text" name="nama_pelanggan" class="form-control mb-2" placeholder="Nama Pelanggan" value="<?=$nama_pelanggan?>">
                                            ID Jenis Kelamin
                                                <select name="id_jenis_kelamin" class="form-control">
                                                
                                                <?php
                                                    $getjeniskelamin = mysqli_query($conn,"select * from jenis_kelamin");
                                                    while($pel=mysqli_fetch_array($getjeniskelamin)){
                                                        $nama_jenis_kelamin = $pel['nama_jenis_kelamin'];
                                                        $id_jenis_kelamin = $pel['id_jenis_kelamin'];
                                                ?>
                                                
                                                <option value="<?=$id_jenis_kelamin;?>"><?=$id_jenis_kelamin;?>   - <?=$nama_jenis_kelamin;?></option>
                                        
                                        
                                                <?php
                                                    };
                                                ?>
                                        
                                                </select>
                                            ID Status
                                                <select name="id_status" class="form-control">
                                                
                                                <?php
                                                    $getstatus = mysqli_query($conn,"select * from status");
                                                    while($pel=mysqli_fetch_array($getstatus)){
                                                        $nama_status= $pel['nama_status'];
                                                        $id_status = $pel['id_status'];
                                                ?>
                                                
                                                <option value="<?=$id_status;?>"><?=$id_status;?>   - <?=$nama_status;?></option>
                                        
                                        
                                                <?php
                                                    };
                                                ?>
                                        
                                                </select>
                                            </div>

                                            <!-- Modal footer -->
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-success" name="editpelanggan">Edit</button>
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                            </div>
                                            
                                            </form>

                                            </div>
                                        </div>
                                        </div>

                                            <!-- The Modal Hapus Pegawai -->
                                        <div class="modal fade" id="hapus<?=$id_pelanggan;?>">
                                        <div class="modal-dialog">
                                            <div class="modal-content">

                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title">Apakah Anda Yakin Ingin Menghapus Pelanggan <?=$nama_pelanggan?>?</h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>

                                            <form method="post">

                                            <!-- Modal body -->
                                            <div class="modal-body">
                                                Apakah Anda Yakin Ingin Menghapus Pelanggan <?=$nama_pelanggan?>?
                                                <input type="hidden" name="id_pelanggan" value="<?=$id_pelanggan;?>"> 
                                            </div>

                                            <!-- Modal footer -->
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-success" name="hapuspelanggan">Ya</button>
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
        <h4 class="modal-title">Pelanggan Baru</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

    <form method="post">

      <!-- Modal body -->
      <div class="modal-body">
        <?php
            $auto = mysqli_query($conn,"select max(id_pelanggan) as max_code from pelanggan");
            $data = mysqli_fetch_array($auto);
            $code = $data['max_code'];
            $urutan = (int)substr($code, 3, 5);
            $urutan++;
            $angka = "PEL";
            $id_pel = $angka . sprintf("%05s", $urutan);
        ?>
        ID Pelanggan
        <input type="text" name="id_pelanggan" value="<?=$id_pel?>" class="form-control" placeholder="ID Pelanggan" readonly> 
        Nama Pelanggan
        <input type="text" name="nama_pelanggan" class="form-control" placeholder="Nama Pelanggan">
        ID Jenis Kelamin
        <select name="id_jenis_kelamin" class="form-control">
            
            <?php
                $getjeniskelamin = mysqli_query($conn,"select * from jenis_kelamin");
                while($pel=mysqli_fetch_array($getjeniskelamin)){
                    $nama_jenis_kelamin = $pel['nama_jenis_kelamin'];
                    $id_jenis_kelamin = $pel['id_jenis_kelamin'];
            ?>
            
            <option value="<?=$id_jenis_kelamin;?>"><?=$id_jenis_kelamin;?>   - <?=$nama_jenis_kelamin;?></option>
    
    
            <?php
                };
            ?>
    
            </select>
        ID Status
            <select name="id_status" class="form-control">
            
            <?php
                $getstatus = mysqli_query($conn,"select * from status");
                while($pel=mysqli_fetch_array($getstatus)){
                    $nama_status= $pel['nama_status'];
                    $id_status = $pel['id_status'];
            ?>
            
            <option value="<?=$id_status;?>"><?=$id_status;?>   - <?=$nama_status;?></option>
    
    
            <?php
                };
            ?>
    
            </select>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="submit" class="btn btn-success" name="tambahpelanggan">Tambahkan</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>
    </form>

    </div>
  </div>
</div>


</html>
