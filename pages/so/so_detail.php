<!-- general form elements disabled -->
   <?php

    include_once '../../lib/sess.php';
    include_once '../../lib/config.php';
    include_once '../../lib/fungsi.php';

    $idso=$_GET['idso'];

    $sqles = "SELECT  * FROM t_penjualan p 
              LEFT JOIN t_customer c on p.fk_customer=c.id_customer
              WHERE id_penjualan='$idso'";
    $hes = mysql_fetch_array(mysql_query($sqles));
   ?>
<div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel" style="text-align: center;padding-right: 0px">Data Sales Order <button type="button" class="close" aria-label="Close" onclick="$('#ModalSoDet').modal('hide');"><span>&times;</span></button></h4>   
                    </div>
                    
                    <div class="modal-body">

                   <div class="row">
                     <div class="col-sm-12">
                        <table id="estimasishow" class="table table-condensed table-bordered table-striped table-hover">
                          <td>
                         <th class="col-sm-6">
                        <tr> <th>Tgl Masuk</th> <td ><?php echo tampilTanggal(substr($hes['tgl'],0,10));?></td></tr>
                        <tr> <th>Customer</th>  <td ><?php echo $hes['nama'];?></td></tr>
                        <tr> <th>Keterangan</th> <td ><?php echo $hes['keterangan'];?></td></tr>
                        </th>
                       </td>
                        </table>

                     </div>
                   </div>
                    <hr>
                                           
                  </div>                  
                <div id="tablesodetail"></div>                
                <div class="form-group">
                           <div class="modal-footer">
                                <div class="but">
                                    <button type="button" class="btn btn-primary" name="part" onclick="barange('<?php echo $idso;?>');">&nbsp;Barang&nbsp;</button>
                                </div>
                            </div>
                </div> 
                <div class="form-group">
                           <div class="modal-footer">
                                <div class="but">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal" aria-hidden="true">&nbsp;Simpan&nbsp;</button>
                                </div>
                            </div>
                </div>   
                <br>
        </div>
</div>
        <div id="ModalAddBarangx" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>

        <script type="text/javascript">
            $(document).ready(function (){
                 var idsoe='<?php echo $idso;?>';
                 $("#tablesodetail").load('so/so_detail_tab.php?idso='+idsoe);
            });

           
            function barange(y){
              $.ajax({
                    url: "so/barang_tab.php?idsone="+y,
                    type: "GET",
                      success: function (ajaxData){
                        $("#ModalAddBarangx").html(ajaxData);
                        $("#ModalAddBarangx").modal('show',{backdrop: 'true'});
                      }
                    });
              }
        </script>

<style type="text/css">
.modal-open .modal {
    overflow-y: scroll;
   /* overflow-x: scroll;
*/
  }
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
  .modal-content {
    height: 600px;
  }
  .but {
    text-align: center;
  }
  .modal-dialog {
    margin-bottom: 0px;
    border: 3px;
    width: 750px;
  }
</style>