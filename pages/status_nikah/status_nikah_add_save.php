<?php
        include_once '../../lib/config.php';
        include_once '../../lib/fungsi.php';
		 //$ip = ; // Ambil IP Address dari User
		$id_status_nikah = trim($_POST['id_status_nikah']);
        $nama_status_nikah = trim($_POST['nama_status_nikah']);
        //message_back($id_status_nikah);
		 #cek idsurat
        $sqlcek = "SELECT * FROM m_status_nikah WHERE nama_status_nikah='$nama_status_nikah' OR id_status_nikah='$id_status_nikah'";
        $qrycek = mysql_query($sqlcek);
        $row = mysql_fetch_array($qrycek);

        if ($row){
            echo 'y';
        }else{
		    $sqltbemp = "INSERT INTO m_status_nikah (id_status_nikah,nama_status_nikah) VALUES ('$id_status_nikah','$nama_status_nikah')";
            mysql_query($sqltbemp);
            //echo 'n';
        }
?>