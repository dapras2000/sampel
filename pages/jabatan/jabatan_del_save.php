<?php
		//$skrg = date('Y-m-d');
        include_once '../../lib/config.php';
		$id_jabatan = $_GET['id_jabatan'];
		$sqlhapussatuan = "DELETE FROM m_jabatan WHERE id_jabatan='$id_jabatan'";
   		mysql_query( $sqlhapussatuan );
?>
