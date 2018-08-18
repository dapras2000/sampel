<?php
		//$skrg = date('Y-m-d');
        include_once '../../lib/config.php';
		$id_status_pegawai = $_GET['id_status_pegawai'];
		$sqlhapussatuan = "DELETE FROM m_status_pegawai WHERE id_status_pegawai='$id_status_pegawai'";
   		mysql_query( $sqlhapussatuan );
?>
