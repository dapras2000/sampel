<!-- general form elements disabled -->
   <?php
   // include_once '../../lib/sess.php';
    include_once '../../lib/config.php';
    include_once '../../lib/fungsi.php';
    $idpo = $_GET['idpone'];
   ?>
<div class="modal-dialog">
           <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel" style="text-align: center;padding-right: 0px">Data Estimasi Part <button type="button" class="close" aria-label="Close" onclick="$('#ModalBarangShow').modal('hide');"><span>&times;</span></button></h4>                    
                    </div>
               
                    <div class="modal-body">
                     

                      <div class="row">
                      <table id="estimasipart" class="table table-condensed table-bordered table-striped table-hover">
                <thead class="thead-light">
                <tr>
                          <th>Nama</th>
                          <th>Harga Beli</th>
                          <th>Diskon</th>
                          <th>Qty</th> 
                          <th>Harga Netto</th>                          
                          
                </tr>
                </thead>
                <tbody>
                <?php
                                    $j=1;
                                    $sqlcatat = "SELECT p.*,b.nama FROM t_pembelian_detail p
                                    LEFT JOIN t_barang b ON p.fk_barang=b.id_barang
                                    WHERE p.fk_pembelian='$idpo' ORDER BY p.id ASC";
                                    $rescatat = mysql_query( $sqlcatat );
                                    while($catat = mysql_fetch_array( $rescatat )){
                                ?>
                        <tr>
                          <td ><?php echo $catat['nama'];?></td>
                          <td ><?php echo rupiah2($catat['gross_beli_barang']);?></td>
                          <td ><?php echo rupiah2($catat['diskon_beli_barang']);?></td>
                            <td ><?php echo rupiah2($catat['qty']);?></td>
                          <td ><?php echo rupiah2($catat['netto_beli_barang']);?></td>
                          
                        </tr>
                    <?php }?>
                   
                </tfoot>
              </table>
               
               </div>
                  <div class="form-group">
                      <div class="modal-footer">
                      <div class="but">
                                    <button type="button" class="btn btn-primary" name="close" onclick="$('#ModalBarangShow').modal('hide');">Close</button>
                     </div>
                     </div>
                     </div>
           </div>
           </div>      
     

<style type="text/css">
  .modal-footer {
    padding-top: 10px;
    padding-bottom: 0px;
    padding-left: 0px;
    padding-right: 0px;
  }
  .modal-title {
    font-style: italic;
    background-color: lightcoral;
    text-align: center;
    font-weight: bold;
  }
  .total {
  font-weight: bold;border-top:   inset;
  }
    .but {
    text-align: center;
  }
  .modal-title-detail {
    font-style: italic;
    background-color: lightblue;
    text-align: center;
    font-weight: bold;
  }
  .modal-dialog {
    margin-bottom: 0px;
    border: 3px;
    width: 800px;
  }
</style>