<?php
        include_once '../../lib/config.php';
        include_once '../../lib/fungsi.php';
		 //$ip = ; // Ambil IP Address dari User
		$id_status_pegawai = trim($_POST['id_status_pegawai']);
        $nama_status_pegawai = trim($_POST['nama_status_pegawai']);
        //message_back($id_status_pegawai);
		 #cek idsurat
        $sqlcek = "SELECT * FROM m_status_pegawai WHERE nama_status_pegawai='$nama_status_pegawai' OR id_status_pegawai='$id_status_pegawai'";
        $qrycek = mysql_query($sqlcek);
        $row = mysql_fetch_array($qrycek);

        if ($row){
            echo 'y';
        }else{
		    $sqltbemp = "INSERT INTO m_status_pegawai (id_status_pegawai,nama_status_pegawai) VALUES ('$id_status_pegawai','$nama_status_pegawai')";
            mysql_query($sqltbemp);
            //echo 'n';
        }
?>