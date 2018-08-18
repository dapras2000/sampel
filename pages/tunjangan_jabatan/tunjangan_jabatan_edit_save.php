<?php
        include_once '../../lib/config.php';
        include_once '../../lib/fungsi.php';
		 //$ip = ; // Ambil IP Address dari User
		$jabatan = trim($_POST['jabatan2']);
        //str_replace("world","Peter","Hello world!");
        $tunjanganjabatan = trim($_POST['tunjanganjabatan2']);
        $tunjangankinerja = trim($_POST['tunjangankinerja2']);
        //message_back($id_tipe_kendaraan);
        $idhid= trim($_POST['idhid']);
		//CEK
         
        $hsql=mysql_fetch_array(mysql_query("SELECT fk_jabatan FROM m_tunjangan_jabatan WHERE fk_jabatan='$jabatan' AND fk_jabatan<>'$idhid'"));
        if($hsql['fk_jabatan']){
            echo "y";
        }else{
		    $sqltbemp = "UPDATE m_tunjangan_jabatan SET fk_jabatan='$jabatan',tunjangan_jabatan='$tunjanganjabatan',tunjangan_kinerja='$tunjangankinerja' WHERE fk_jabatan='$idhid'";
            mysql_query($sqltbemp);
            echo "n";
        }
?>