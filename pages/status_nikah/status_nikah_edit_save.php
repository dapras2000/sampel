<?php
        include_once '../../lib/config.php';
         //$ip = ; // Ambil IP Address dari User
        $id_status_nikah = trim($_POST['id_status_nikah']);
        $nama_status_nikah = trim($_POST['nama_status_nikah']);
       
        $sqltbemp = "UPDATE m_status_nikah SET nama_status_nikah='$nama_status_nikah' WHERE id_status_nikah='$id_status_nikah'";
        mysql_query($sqltbemp);?>