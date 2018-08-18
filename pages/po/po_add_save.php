<?php
        include_once '../../lib/config.php';
        include_once '../../lib/fungsi.php';
   
        $supplier = trim($_POST['supplier']);;
        $tgl = trim($_POST['tgl']);
        $nodelivery = trim($_POST['nodelivery']);
        $keterangan = trim($_POST['keterangan']);

        $hrn2= date('dmy' , strtotime($hrini));

        $kodeawal2 = 'PO_MH.';
        $kodeawal = 'PO_MH.'.$hrn2.'.';

        $sqljur = "SELECT * FROM t_pembelian WHERE id_pembelian LIKE '$kodeawal2%' ORDER BY id_pembelian DESC";
        $resultjur = mysql_query( $sqljur );
        $jur = mysql_fetch_array( $resultjur );
        if (empty($jur['id_pembelian'])){
            $kodeakhir = '000001';
        }else{
            # GENERATE
            $kode = $jur['id_pembelian'];
            $pecah = explode('.',$kode);
            $nilbaru = $pecah[2] + 1;
            $panj = strlen($nilbaru);

            switch($panj){
                default : break;
                case '1' : $kodeakhir='00000'.$nilbaru; break;
                case '2' : $kodeakhir='0000'.$nilbaru; break;
                case '3' : $kodeakhir='000'.$nilbaru; break;
                case '4' : $kodeakhir='00'.$nilbaru; break;
                case '5' : $kodeakhir='0'.$nilbaru; break;
                case '6' : $kodeakhir=$nilbaru; break;
            }
        }
        
        $kodebaru = $kodeawal.$kodeakhir;     

        
            $sqltbemp = "INSERT INTO t_pembelian (id_pembelian,tgl,no_delivery_order,fk_supplier,keterangan) VALUES ('$kodebaru','$tgl','$nodelivery','$supplier','$keterangan')";
            mysql_query($sqltbemp);
            echo $kodebaru;        
?>