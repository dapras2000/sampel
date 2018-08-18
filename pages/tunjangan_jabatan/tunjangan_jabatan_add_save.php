<?php
        include_once '../../lib/config.php';
        include_once '../../lib/fungsi.php';
		 //$ip = ; // Ambil IP Address dari User
		$jabatan = trim($_POST['jabatan']);
        $tunjanganjabatan = trim($_POST['tunjanganjabatan']);
        $tunjangankinerja = trim($_POST['tunjangankinerja']);
        //$tunjanganjabatan = trim(str_replace(".","",$_POST['tunjanganjabatan']));
        //$tunjangankinerja = trim(str_replace(".","",$_POST['tunjangankinerja']));
        //message_back($id_tipe_kendaraan);
		//CEK
        $hsql=mysql_fetch_array(mysql_query("SELECT fk_jabatan FROM m_tunjangan_jabatan WHERE fk_jabatan='$jabatan'"));
        if($hsql['fk_jabatan']){
            echo "y";
        }else{
		    $sqltbemp = "INSERT INTO m_tunjangan_jabatan (fk_jabatan,tunjangan_jabatan,tunjangan_kinerja) VALUES ('$jabatan','$tunjanganjabatan','$tunjangankinerja')";
            mysql_query($sqltbemp);
            echo "n";
        }
?>