<?php
        include_once '../../lib/config.php';
        include_once '../../lib/fungsi.php';
         //$ip = ; // Ambil IP Address dari User
        $idpo = trim($_POST['idpo']);
        $supplier = trim($_POST['Esupplier']);
        $nodelivery = trim($_POST['Enodelivery']);
        $keterangan = trim($_POST['Eketerangan']);

        $updatePo = "UPDATE t_pembelian SET fk_supplier='$supplier',no_delivery_order='$nodelivery',keterangan='$keterangan' WHERE id_pembelian='$idpo'";
        mysql_query($updatePo);
        echo $idpo;
    
?>