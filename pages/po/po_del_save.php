<?php
		//$skrg = date('Y-m-d');
        include_once '../../lib/config.php';
        $idpo = $_GET['idpo'];
        $keterangan_batal = $_GET['keteranganbatal'];
        
            $datapo = "UPDATE t_pembelian SET tgl_batal='$hrini',keterangan_batal='$keterangan_batal' WHERE id_pembelian ='$idpo'";
            mysql_query($datapo);
?>
