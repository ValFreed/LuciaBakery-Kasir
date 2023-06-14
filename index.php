<?php
    require 'fungsi.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Lucia Bakery</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/logoluciabakery.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles2.css" rel="stylesheet" />
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
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="#page-top">Lucia Bakery</a>
                <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#portfolio" >List Jajan</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#about">About</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#kontak">Kontak</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead bg-primary text-white text-center">
            <div class="container d-flex align-items-center flex-column">
                <!-- Masthead Avatar Image-->
                <img class="masthead-avatar mb-4" src="assets/img/luciabakery.png" alt="..." />
                <!-- Masthead Heading-->
                <h1 class="masthead-heading text-uppercase mb-0">Makan Kue Setiap Hari</h1>
                <!-- Icon Divider-->
                <div class="divider-custom divider-light">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- Masthead Subheading-->
                <p class="masthead-subheading font-weight-light mb-10">Makan enak - Nikmati Segarnya - Makanan Adalah Cinta</p>
            </div>
        </header>
        <!-- Portfolio Section-->
        <section class="page-section portfolio" id="portfolio">
            <div class="container">
                <!-- Portfolio Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">List Jajan</h2>
                <!-- Icon Divider-->
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- Portfolio Grid Items-->
                <div class="row justify-content-center">
                    <!-- Portfolio Item 1-->
                    <div class="col-md-6 col-lg-4 mb-5">
                        <div class="portfolio-item mx-auto" data-bs-toggle="modal" data-bs-target="#jajanmodern">
                            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                <div class="portfolio-item-caption-content text-center text-white"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="assets/img/portfolio/jajanmodern.png" alt="..." />
                        </div>
                    </div>
                    <!-- Portfolio Item 2-->
                    <div class="col-md-6 col-lg-4 mb-5">
                        <div class="portfolio-item mx-auto" data-bs-toggle="modal" data-bs-target="#jajanpasar">
                            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                <div class="portfolio-item-caption-content text-center text-white"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="assets/img/portfolio/jajanpasar.png" alt="..." />
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- About Section-->
        <section class="page-section bg-primary text-white mb-0" id="about">
            <div class="container">
                <!-- About Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-white">About Us</h2>
                <!-- Icon Divider-->
                <div class="divider-custom divider-light">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- About Section Content-->
                <div class="row">
                    <div class="col-lg-4 ms-auto"><p class="lead">Seluruh produk pesanan selalu dibuat paling lama 24 jam. Roti kami tahan 2-3 hari dari pembelian Anda. Kami secara rutin menambah varian produk baru kami tiap beberapa bulan.</p></div>
                    <div class="col-lg-4 ms-auto"><p class="lead">Tidak menerima pesanan secara online.</p></div>
                    <div class="col-lg-4 me-auto"><p class="lead">Lucia bakery senantiasa menjaga kualitas produk dan layanan untuk pelanggan setia kami. Kami memberi garansi uang kembali hingga 100% jika Anda tidak puas dengan produk atau layanan kami.</p></div>
                </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="footer text-center" id="kontak">
            <div class="container">
                <div class="row">
                    <!-- Footer Location-->
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <h4 class="text-uppercase mb-4">Lokasi</h4>
                        <p class="lead mb-0">
                            Jl. Makanenak No. 007
                            <br />
                            Osaka | Jepang
                        </p>
                    </div>
                    <!-- Footer Social Icons-->
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <h4 class="text-uppercase mb-4">Kontak Kami</h4>
                        <a class="btn btn-outline-light btn-social mx-1" href="https://www.facebook.com/val.freed.71"><i class="fab fa-fw fa-facebook-f" ></i></a>
                        <a class="btn btn-outline-light btn-social mx-1" href="https://www.instagram.com/itsuki.id_/?hl=en"><i class="fab fa-fw fa-instagram"></i></a>
                        <a class="btn btn-outline-light btn-social mx-1" href="https://wa.me/qr/HTFBI3KQMKOWN1"><i class="fab fa-fw fa-whatsapp"></i></a>
                    </div>
                    <!-- Footer About Text-->
                    <div class="col-lg-4">
                        <h4 class="text-uppercase mb-4">Jam Operasional</h4>
                        <p class="lead mb-0">
                            Senin - Jum'at: 07.00 s/d 21.00
                            <br/>
                            Sabtu - Minggu: 07.00 s/d 18.00
                        </p>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Copyright Section-->
        <div class="copyright py-4 text-center text-white">
            <div class="container"><small>Copyright &copy; Lucia Bakery 2022</small></div>
        </div>
        <!-- Portfolio Modals-->
        <!-- Jajan Modern -->
        <div class="portfolio-modal modal fade" id="jajanmodern" tabindex="-1" aria-labelledby="jajanmodern" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header border-0"><button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button></div>
                    <div class="modal-body text-center pb-5">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <!-- Portfolio Modal - Title-->
                                    <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">List Jajanan Modern</h2>
                                    <!-- Icon Divider-->
                                    <div class="divider-custom">
                                        <div class="divider-custom-line"></div>
                                        <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                        <div class="divider-custom-line"></div>
                                    </div>
                                    <!-- tabel -->
                                    <div class="modal-body table-responsive">
                                        <table class="table table-bordered table-striped" id="table">
                                            <thead>
                                                <tr>
                                                    <td>No</td>
                                                    <td>Nama Jajan</td>
                                                    <td>Harga Jajan</td>
                                                    <td>Gambar</td>
                                                    <td>Stok</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                                $get = mysqli_query($conn,"select * from jajan where id_tipe_jajan='JM01'");
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
                                                <td><?=$nama_jajan;?></td>
                                                <td>Rp.<?=number_format($harga_jajan);?></td>
                                                <td><?=$img;?></td>
                                                <td><?=$stok;?></td>
                                            </tr>
                                            <?php
                                                };//end of while
                                            ?>
                                            </tbody>
                                        </table>
                                    </div>

                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">
                                        <i class="fas fa-times fa-fw"></i>
                                        Close Window
                                    </button>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        


        <!-- Jajanan Pasar -->
        <div class="portfolio-modal modal fade" id="jajanpasar" tabindex="-1" aria-labelledby="jajanpasar" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header border-0"><button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button></div>
                    <div class="modal-body text-center pb-5">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <!-- Portfolio Modal - Title-->
                                    <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">List Jajanan Pasar</h2>
                                    <!-- Icon Divider-->
                                    <div class="divider-custom">
                                        <div class="divider-custom-line"></div>
                                        <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                        <div class="divider-custom-line"></div>
                                    </div>
                                    <div class="modal-body table-responsive">
                                        <table class="table table-bordered table-striped" id="table">
                                            <thead>
                                                <tr>
                                                    <td>No</td>
                                                    <td>Nama Jajan</td>
                                                    <td>Harga Jajan</td>
                                                    <td>Gambar</td>
                                                    <td>Stok</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                                $get = mysqli_query($conn,"select * from jajan where id_tipe_jajan='JP01'");
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
                                                <td><?=$nama_jajan;?></td>
                                                <td>Rp.<?=number_format($harga_jajan);?></td>
                                                <td><?=$img;?></td>
                                                <td><?=$stok;?></td>
                                            </tr>
                                            <?php
                                                };//end of while
                                            ?>
                                            </tbody>
                                        </table>
                                    </div>

                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">
                                        <i class="fas fa-times fa-fw"></i>
                                        Close Window
                                    </button>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
