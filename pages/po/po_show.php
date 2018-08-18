<!-- general form elements disabled -->
   <?php
   // include_once '../../lib/sess.php';
    include_once '../../lib/config.php';
    include_once '../../lib/fungsi.php';
    $idpo= $_GET['idpo'];

   ?>
<div class="modal-dialog">
           <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel" style="text-align: center;padding-right: 0px">Data Purchase Order <button type="button" class="close" aria-label="Close" onclick="$('#ModalShow').modal('hide');"><span>&times;</span></button></h4>                    
                    </div>
                  <?php
                                    $j=1;
                                    $sqlcatat = "SELECT p.*,c.nama FROM t_pembelian p 
                                                  LEFT JOIN t_supplier c
                                                  ON p.fk_supplier=c.id_supplier
                                                  WHERE p.id_pembelian='$idpo'";
                                    $rescatat = mysql_query( $sqlcatat );
                                    while($catat = mysql_fetch_array( $rescatat )){
                                ?>
                    <div class="modal-body">
                      <div class="modal-title-detail">Purchase Order</div>
                      <div class="row">
                       <div class="col-sm-12">
                       <table id="purchaseshow" class="table table-condensed table-bordered table-striped table-hover">
                       <td>
                         <th class="col-sm-8">
                        <tr> <th>No Purchase</th> <td ><?php echo $catat['id_pembelian'];?></td></tr>
                        <tr> <th>Tgl PO</th> <td ><?php echo $catat['tgl'];?></td></tr>
                        <tr> <th>No Delivery Order</th>  <td ><?php echo $catat['no_delivery_order'];?></td></tr>
                        <tr> <th>Supplier</th> <td ><?php echo $catat['nama'];?></td></tr>
                    
                        </th>
                       </td>
                      </table>
                           </div>

                   

                      </div>

                       <div class="modal-title-detail">NILAI PURCHASE </div>
                      <div class="row">
                       <div class="col-sm-12">
                       <table id="purchaseshow" class="table table-condensed table-bordered table-striped table-hover">
                       <td >
                         <th class="col-sm-2">
 
                        <tr class="total"> 
                          <th>Total Gross</th><td><?php echo rupiah2($catat['total_gross_beli_barang']);?></td>
                          <th>Total Diskon</th> <td><?php echo rupiah2($catat['total_diskon_beli_barang']);?></td>
                          <th>Total Netto</th> <td><?php echo rupiah2($catat['total_netto_beli_barang']);?></td>
                        </tr>

                        </th>
                       </td>
                      </table>
                      <?php }?>
                           </div>
                      </div>
                        <div class="form-group">
                     <div class="modal-footer">
                     <div class="but">
                                    <button type="button" class="btn btn-primary" name="panel" onclick="barangshow('<?php echo $idpo;?>');">Barang</button>
                     </div>
                     </div>
                     </div>
                       <div class="form-group">
                      <div class="modal-footer">
                      <div class="but">
                                    <button type="button" class="btn btn-primary" name="close" onclick="$('#ModalShow').modal('hide');">Close</button>
                     </div>
                     </div>
                     </div>
               </div>
           </div>
           </div>      
           <div id="ModalBarangShow" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>
        
<script type="text/javascript">
  
      
              function barangshow(z){
              $.ajax({
                    url: "po/barang_show_tab.php?idpone="+z,
                    type: "GET",
                      success: function (ajaxData){
                        $("#ModalBarangShow").html(ajaxData);
                        $("#ModalBarangShow").modal({backdrop: 'static', keyboard:false});
                      }
                    });
              }

  
</script>        

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