<?php
        include_once '../../lib/config.php';
        include_once '../../lib/fungsi.php';
		 //$ip = ; // Ambil IP Address dari User
		$id_jabatan = trim($_POST['id_jabatan']);
        $nama_jabatan = trim($_POST['nama_jabatan']);
        //message_back($id_jabatan);
		 #cek idsurat
        $sqlcek = "SELECT * FROM m_jabatan WHERE nama_jabatan='$nama_jabatan' OR id_jabatan='$id_jabatan'";
        $qrycek = mysql_query($sqlcek);
        $row = mysql_fetch_array($qrycek);

        if ($row){
            echo 'y';
        }else{
		    $sqltbemp = "INSERT INTO m_jabatan (id_jabatan,nama_jabatan) VALUES ('$id_jabatan','$nama_jabatan')";
            mysql_query($sqltbemp);
            //echo 'n';
        }
?>