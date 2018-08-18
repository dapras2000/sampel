<?php
        include_once '../../lib/config.php';
        include_once '../../lib/fungsi.php';
         //$ip = ; // Ambil IP Address dari User
        //$id_penjualan = trim($_POST['id_penjualan']);
        $customer = trim($_POST['customer']);;
        $tgl = trim($_POST['tgl']);
        $keterangan = trim($_POST['keterangan']);
        
        //message_back($id_penjualan);
        //$kodeawal = 'est_'.$hrini.'_';
        $hrn2= date('dmy' , strtotime($hrini));
  //EST.BR.020818.000001
        $kodeawal2 = 'SO_MH.';
        $kodeawal = 'SO_MH.'.$hrn2.'.';
        //$sqljur = "SELECT * FROM t_penjualan WHERE id_penjualan LIKE '$kodeawal%' ORDER BY id_penjualan DESC";
        $sqljur = "SELECT * FROM t_penjualan WHERE id_penjualan LIKE '$kodeawal2%' ORDER BY id_penjualan DESC";
        $resultjur = mysql_query( $sqljur );
        $jur = mysql_fetch_array( $resultjur );
        if (empty($jur['id_penjualan'])){
            $kodeakhir = '000001';
        }else{
            # GENERATE
            $kode = $jur['id_penjualan'];
            $pecah = explode('.',$kode);
            $nilbaru = $pecah[2] + 1;
            $panj = strlen($nilbaru);
            //message_back($panj);
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

        
            $sqltbemp = "INSERT INTO t_penjualan (id_penjualan,fk_customer,keterangan,tgl) VALUES ('$kodebaru','$customer','$keterangan','$tgl')";
            mysql_query($sqltbemp);
            echo $kodebaru;        
?>