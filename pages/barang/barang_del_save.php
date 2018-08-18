<?php
		//$skrg = date('Y-m-d');
        include_once '../../lib/config.php';
		$id_barang = $_GET['id_barang'];
		# HAPUS DATA 
		$hapusbarang = "DELETE FROM t_barang WHERE id_barang='$id_barang'";
   		mysql_query( $hapusbarang );
?>
