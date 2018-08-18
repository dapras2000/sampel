<!-- general form elements disabled -->
   <?php
   // include_once '../../lib/sess.php';
    include_once '../../lib/config.php';
    include_once '../../lib/fungsi.php';
    $idso= $_GET['idso'];
    //   $sqlpan= "SELECT * FROM t_penjualan WHERE id_penjualan='$idso'";
 //  $catat= mysql_fetch_array(mysql_query($sqlpan));
  
   ?>
<div class="modal-dialog">
           <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel" style="text-align: center;padding-right: 0px">Data Sales Order <button type="button" class="close" aria-label="Close" onclick="$('#ModalSoPrint').modal('hide');"><span>&times;</span></button></h4>                    
                    </div>
                  <?php
                                    $j=1;
                                    $sqlcatat = "SELECT * FROM t_penjualan e 
                                                  left join t_customer c
                                                  on e.fk_customer=c.id_customer
                                                  where e.id_penjualan='$idso'";
                                    $rescatat = mysql_query( $sqlcatat );
                                    $catat = mysql_fetch_array( $rescatat )
                                ?>
                    <div class="modal-body">
                      <div class="modal-title-detail" align="center"><h4><u>Detail Sales Order</u></h4><h5><?php echo $catat['id_penjualan'];?></h5></div>
                      <div class="row">
                       <div class="col-sm-10">
                           <table id="estimasishow" class="">
                           <td>
                             <th class="col-sm-8">
                            <tr> <th>No Sales Order</th> <td > : <?php echo $catat['id_penjualan'];?></td></tr>
                            <tr> <th>Tanggal</th> <td > : <?php echo $catat['tgl'];?></td></tr>
                            <tr> <th>Nama Customer</th>  <td > : <?php echo $catat['nama'];?></td></tr>
                            </th>
                           </td>
                          </table>
                        </div>
                        <table id="showbarang" class="table table-condensed table-bordered table-striped table-hover">
                <thead class="thead-light">
                <tr>
                          <th>Nama</th>
                          <th>Harga</th>
                          <th>Diskon</th>
                          <th>Qty</th>
                          <th>Harga Netto</th>    
                </tr>
                </thead>
                <tbody>
                <?php
                                    $j=1;
                                    $jml=0;
                                    $sqlcatat = "SELECT ep.*,p.nama FROM t_penjualan_detail  ep
                                    LEFT JOIN t_barang p ON ep.fk_barang=p.id_barang
                                    WHERE fk_penjualan='$idso' ORDER BY id ASC";
                                    $rescatat = mysql_query( $sqlcatat );
                                    while($catat = mysql_fetch_array( $rescatat )){
                                      $jml=$jml+$catat['netto_jual_barang'];
                                ?>
                        <tr>
                          <td ><?php echo $catat['nama'];?></td>
                          <td ><?php echo rupiah2($catat['gross_jual_barang']);?></td>
                          <td ><?php echo rupiah2($catat['diskon_jual_barang']);?></td>
                          <td ><?php echo $catat['qty'];?></td>
                          <td ><?php echo rupiah2($catat['netto_jual_barang']);?></td>                          
                        </tr>
                    <?php }?>
                        <tr><td colspan="4" align="right">Total</td><td><?php echo rupiah2($jml);?></td></tr>
                        <!--<tr><td colspan="4" align="right">PPN</td><td>0</td></tr>
                        <tr><td colspan="4" align="right">Total</td><td><?php //echo rupiah2($jml);?></td></tr>-->
                   
                </tfoot>
              </table>
                          
                      </div>
                       
                
                       <div class="form-group">
                      <div class="modal-footer">
                      <div class="but"><a href="so/so_cetak.php?idso=<?php echo $idso;?>" target="blank"><button type="button" class="btn btn-primary" name="close" onclick="cetak();">Print</button></a>
                                    <button type="button" class="btn btn-primary" name="close" onclick="$('#ModalSoPrint').modal('hide');">Close</button>
                     </div>
                     </div>
                     </div>
               </div>
           </div>
           </div>      
           

