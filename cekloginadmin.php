<?php

    require 'function.php';

    if(isset($_SESSION['admin'])){
        //sudah log
    }else{
        //belum log
        header('location: login.php');
    }

?>