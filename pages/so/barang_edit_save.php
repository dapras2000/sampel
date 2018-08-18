<?php
        include_once '../../lib/config.php';
        include_once '../../lib/fungsi.php';
		 //$ip = ; // Ambil IP Address dari User
		$id = trim($_POST['idE']);
        $idsoe = trim($_POST['idsoE']);
        $id_barang = trim($_POST['barangE']);
        $diskon = trim($_POST['diskonE']);
        $hargajual= trim($_POST['hargapokokE']);
        $qty= trim($_POST['qtyE']);
        $hargadiskon= ($diskon*$hargajual)/100;
        $total= trim($_POST['hargatotalE']);

         $updatebarang = "UPDATE t_penjualan_detail SET fk_barang='$id_barang',qty='$qty',gross_jual_barang='$hargajual', diskon_jual_barang='$hargadiskon',netto_jual_barang='$total' WHERE id='$id'";
            mysql_query($updatebarang);
            //echo $updatebarang;

           $sqlbarang= "SELECT sum(gross_jual_barang*qty) AS totjualbarang,sum(diskon_jual_barang*qty) AS totdiskonbarang, sum(netto_jual_barang) AS totpenjualanbarang FROM t_penjualan_detail WHERE fk_penjualan = '$idsoe'";
            $hbarang= mysql_fetch_array(mysql_query($sqlbarang));
            //jml barang

            $totgrosbarang=$hbarang['totjualbarang'];
            $totdiskonbarang=$hbarang['totdiskonbarang'];
            $totnettobarang=$hbarang['totpenjualanbarang'];

            $updatebarang = "UPDATE t_penjualan set total_gross_jual_barang='$totgrosbarang', total_diskon_jual_barang='$totdiskonbarang', total_netto_jual_barang='$totnettobarang' WHERE id_penjualan='$idsoe'";
            mysql_query($updatebarang);

?>