<?php

    require 'function.php';

    if(isset($_SESSION['pegawai'])){
        //sudah log
    }else{
        //belum log
        header('location: login.php');
    }

?>