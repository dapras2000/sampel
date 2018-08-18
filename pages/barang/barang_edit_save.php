<?php
        include_once '../../lib/config.php';
		 //$ip = ; // Ambil IP Address dari User
    	$id_barang = trim($_POST['id_barang']);
        $id_baranghid = trim($_POST['id_baranghid']);
		$nama = trim($_POST['nama']);
        $namahid = trim($_POST['namahid']);  
        $harga_pokok = trim($_POST['hargapokok']);
        $harga_jual = trim($_POST['hargajual']); 
        $diskon = trim($_POST['diskon']); 
        $ppn = trim($_POST['ppn']); 
		 #cek id_barangsurat
        //$sqlcek = "SELECT * FROM t_barang WHERE (id_barang='$id_barang' AND id_barang<>'$id_baranghid') OR (nama='$nama' AND nama<>'$namahid')";
        $sqlcek = "SELECT * FROM t_barang WHERE id_barang='$id_barang' AND id_barang<>'$id_baranghid'";
        $qrycek = mysql_query($sqlcek);
        $row = mysql_fetch_array($qrycek);
        if ($row){
            echo 'y';
        }else{
		        $sqltbemp = "UPDATE t_barang SET id_barang='$id_barang',nama='$nama',harga_pokok='$harga_pokok',harga_jual='$harga_jual',diskon='$diskon', ppn='$ppn' WHERE id_barang='$id_barang'";
        		mysql_query($sqltbemp);
           // echo 'n';
        }
?>