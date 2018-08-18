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
                        <h4 class="modal-title" id="myModalLabel" style="text-align: center;padding-right: 0px">Data Sales Order <button type="button" class="close" aria-label="Close" onclick="$('#ModalShow').modal('hide');"><span>&times;</span></button></h4>                    
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
                      <div class="modal-title-detail">Sales Order</div>
                      <div class="row">
                       <div class="col-sm-6">
                       <table id="estimasishow" class="table table-condensed table-bordered table-striped table-hover">
                       <td>
                         <th class="col-sm-6">
                        <tr> <th>No Sales Order</th> <td ><?php echo $catat['id_penjualan'];?></td></tr>
                        <tr> <th>Tgl Masuk</th> <td ><?php echo date('d-m-Y' , strtotime($catat['tgl']));?></td></tr>
                        <tr> <th>Nama Customer</th>  <td ><?php echo $catat['nama'];?></td></tr>
                        </th>
                       </td>
                      </table>
                           </div>                            

                      </div>

                       <div class="modal-title-detail">NILAI SALES ORDER</div>
                      <div class="row">
                       <div class="col-sm-12">
                       <table id="estimasishow" class="table table-condensed table-bordered table-striped table-hover">
                       <td >
                         <th class="col-sm-2">
                         
                        <tr class="total"> 
                          <th>Total Gross</th>
                          <th>Total Diskon</th>
                          <th>Total Netto</th>
                        </tr>
                        <tr>
                            <td><?php echo rupiah2($catat['total_gross_jual_barang']);?></td>
                             <td><?php echo rupiah2($catat['total_diskon_jual_barang']);?></td>
                              <td><?php echo rupiah2($catat['total_netto_jual_barang']);?></td>
                        </tr>

                        </th>
                       </td>
                      </table>
                           </div>
                      </div>

                                          
                       <div class="form-group">
                      <div class="modal-footer">
                      <div class="but">
                        <button type="button" class="btn btn-primary" name="close" onclick="barangshow('<?php echo $idso;?>')">Barang</button><p></p>
                                    <button type="button" class="btn btn-primary" name="close" onclick="$('#ModalShow').modal('hide');">Close</button>
                     </div>
                     </div>
                     </div>
               </div>
           </div>
           </div>      
           <div id="ModalBarangShow" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>
<script type="text/javascript">
   
            function barangshow(y){
              $.ajax({
                    url: "so/barang_show_tab.php?idsone="+y,
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