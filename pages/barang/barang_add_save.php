<?php
        include_once '../../lib/config.php';
        include_once '../../lib/fungsi.php';
		 //$ip = ; // Ambil IP Address dari User
		$id_barang = trim($_POST['id_barang']);
        $nama = trim($_POST['nama']);
        $harga_pokok = trim($_POST['hargapokok']);
        $harga_jual= trim($_POST['hargajual']);
        $diskon = trim($_POST['diskon']);
        $ppn = trim($_POST['ppn']);

        $sqlcek = "SELECT * FROM t_barang WHERE nama='$nama' OR id_barang='$id_barang'";
        $qrycek = mysql_query($sqlcek);
        $row = mysql_fetch_array($qrycek);

        if ($row){
            echo 'y';
        }else{
		    $sqltbemp = "INSERT INTO t_barang (id_barang,nama,harga_pokok,harga_jual,diskon,ppn) VALUES ('$id_barang','$nama','$harga_pokok','$harga_jual','$diskon','$ppn')";
            mysql_query($sqltbemp);
            //echo 'n';
        }
?>