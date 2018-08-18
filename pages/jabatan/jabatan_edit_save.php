<?php
        include_once '../../lib/config.php';
         //$ip = ; // Ambil IP Address dari User
        $id_jabatan = trim($_POST['id_jabatan']);
        $nama_jabatan = trim($_POST['nama_jabatan']);
       
        $sqltbemp = "UPDATE m_jabatan SET nama_jabatan='$nama_jabatan' WHERE id_jabatan='$id_jabatan'";
        mysql_query($sqltbemp);