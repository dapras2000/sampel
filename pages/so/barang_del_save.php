<?php
		//$skrg = date('Y-m-d');
        include_once '../../lib/config.php';
        $idso = $_GET['idso'];
        $id = $_GET['id'];

        $sqlhapusasuransi = "DELETE FROM t_penjualan_detail WHERE id='$id'";
        mysql_query( $sqlhapusasuransi );

       $sqlbarang= "SELECT sum(gross_jual_barang*qty) AS totjualbarang,sum(diskon_jual_barang*qty) AS totdiskonbarang, sum(netto_jual_barang) AS totestimasibarang FROM t_penjualan_detail WHERE fk_penjualan = '$idso'";
            $hbarang= mysql_fetch_array(mysql_query($sqlbarang));
            //jml barang

            $totgrosbarang=$hbarang['totjualbarang'];
            $totdiskonbarang=$hbarang['totdiskonbarang'];
            $totnettobarang=$hbarang['totestimasibarang'];

            $updatebarang = "UPDATE t_penjualan set total_gross_jual_barang='$totgrosbarang', total_diskon_jual_barang='$totdiskonbarang', total_netto_jual_barang='$totnettobarang' WHERE id_penjualan='$idso'";
            mysql_query($updatebarang);

		
?>
