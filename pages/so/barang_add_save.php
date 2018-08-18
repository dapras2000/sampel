<?php
        include_once '../../lib/config.php';
        include_once '../../lib/fungsi.php';
		 //$ip = ; // Ambil IP Address dari User
		$id_barang = trim($_POST['barang']);
        $idso = trim($_POST['idso']);
        $diskon = trim($_POST['diskon']);
        $hargajual= trim($_POST['hargapokok']);
        $qty= trim($_POST['qty']);
        $hargadiskon= ($diskon*$hargajual)/100;
        $total= trim($_POST['hargatotal']);
      
		    $sqltbemp = "INSERT INTO t_penjualan_detail (fk_penjualan,fk_barang,gross_jual_barang,diskon_jual_barang,netto_jual_barang,qty) VALUES ('$idso','$id_barang','$hargajual','$hargadiskon','$total','$qty')";
            mysql_query($sqltbemp);
            
            //echo 'n';
            //jml barang
            $sqlbarang= "SELECT sum(gross_jual_barang*qty) AS totjualbarang,sum(diskon_jual_barang*qty) AS totdiskonbarang,sum(netto_jual_barang) AS totestimasibarang FROM t_penjualan_detail WHERE fk_penjualan = '$idso'";
            $hbarang= mysql_fetch_array(mysql_query($sqlbarang));
            //jml barang

            $totgrosbarang=$hbarang['totjualbarang'];
            $totdiskonbarang=$hbarang['totdiskonbarang'];
            $totnettobarang=$hbarang['totestimasibarang'];

            $updatebarang = "UPDATE t_penjualan set total_gross_jual_barang='$totgrosbarang', total_diskon_jual_barang='$totdiskonbarang', total_netto_jual_barang='$totnettobarang' WHERE id_penjualan='$idso'";
            mysql_query($updatebarang);

?>