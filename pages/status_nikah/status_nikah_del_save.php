<?php
		//$skrg = date('Y-m-d');
        include_once '../../lib/config.php';
		$id_status_nikah = $_GET['id_status_nikah'];
		$sqlhapussatuan = "DELETE FROM m_status_nikah WHERE id_status_nikah='$id_status_nikah'";
   		mysql_query( $sqlhapussatuan );
?>
