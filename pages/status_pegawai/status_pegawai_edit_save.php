<?php
        include_once '../../lib/config.php';
         //$ip = ; // Ambil IP Address dari User
        $id_status_pegawai = trim($_POST['id_status_pegawai']);
        $nama_status_pegawai = trim($_POST['nama_status_pegawai']);
       
        $sqltbemp = "UPDATE m_status_pegawai SET nama_status_pegawai='$nama_status_pegawai' WHERE id_status_pegawai='$id_status_pegawai'";
        mysql_query($sqltbemp);?>