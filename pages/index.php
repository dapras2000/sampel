<?php include_once 'header.php';?>
<?php include_once 'header_menu.php';?>
        <?php
            if(!empty($_GET["p"])){
                $pag = $_GET["p"];}else{
                    $pag="";
                }
                //echo $h;
                switch($pag){
                        default : include_once 'middle.php'; break;
                        ## AREA ##
                        case 'jabatan' : include_once 'jabatan/jabatan_tab.php'; break;
                        case 'status' : include_once 'status_pegawai/status_pegawai_tab.php'; break;
                        case 'statusnikah' : include_once 'status_nikah/status_nikah_tab.php'; break;
                        case 'tunjanganjabatan' : include_once 'tunjangan_jabatan/tunjangan_jabatan_tab.php'; break;
                        case 'pegawai' : include_once 'pegawai/pegawai_tab.php'; break;

                        case 'barang' : include_once 'barang/barang_tab.php'; break;
                        case 'customer' : include_once 'customer/customer_tab.php'; break;
                        case 'partnerbank' : include_once 'partnerbank/partnerbank_tab.php'; break;
                        case 'customer' : include_once 'customer/customer_tab.php'; break;
                        case 'kwitansi' : include_once 'kwitansi/kwitansi_tab.php'; break;
                        case 'cash' : include_once 'cash/cash_tab.php'; break;
                        case 'bank' : include_once 'bank/bank_tab.php'; break;
                        case 'laporan' : include_once 'laporan/laporan_tab.php'; break;
                        ##BARANG##
                        case 'sales' : include_once 'so/so_tab.php'; break;
                        case 'purchase' : include_once 'po/po_tab.php'; break;
                        case 'delivery' : include_once 'do/do_tab.php'; break;
                      }
        ?>

<?php include_once 'footer.php';?>


