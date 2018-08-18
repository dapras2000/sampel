<!-- general form elements disabled -->
   <?php
    include_once '../../lib/sess.php';
    include_once '../../lib/config.php';
    include_once '../../lib/fungsi.php';
    $idpo = $_GET['idpo'];
    echo $idpo;
    $sqlpem= "SELECT  * FROM t_pembelian p 
              LEFT JOIN t_supplier c on p.fk_supplier=c.id_supplier
              WHERE id_pembelian='$idpo'";
    $catat= mysql_fetch_array(mysql_query($sqlpem));
   ?>
<div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel" style="text-align: center;padding-right: 0px">Edit Data Purchase Order <button type="button" class="close" aria-label="Close" onclick="$('#ModalEdit').modal('hide');"><span>&times;</span></button></h4>  
                    </div>
                   
                    <div class="modal-body">
                    <form class="form-horizontal" enctype="multipart/form-data" novalidate id="formeditpo">
                        <div class="form-group">
                          <div class="col-sm-3">
                            <label for="tglpo">Tgl PO</label>
                          </div>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" id="tgl1" name="tgl1" value="<?php echo tampilTanggal(date('Y-m-d' , strtotime($catat['tgl'])));?>" readonly>
                            <input type="hidden" class="form-control" id="tgl" name="tgl" value="<?php echo $harinow;?>" readonly>
                          </div>
                        </div>
                        
                        <div class="form-group">
                          <div class="col-sm-3">
                            <label for="supplier">Supplier</label>
                          </div>
                          <div class="col-sm-7">
                            <input type="text" class="form-control" id="Esuppliernm" name="Esuppliernm" readonly value="<?php echo ($catat['nama'])?>">
                            <input type="hidden" class="form-control" id="Esupplier" name="Esupplier" readonly value="<?php echo ($catat['fk_supplier'])?>">
                          </div>
                          <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#myModal" onclick="EselectSupplier();">Pilih</button>
                        </div>

                           <div class="form-group">
                          <div class="col-sm-3">
                            <label for="nodelivery">No Delivery Order</label>
                          </div>
                          <div class="col-sm-7">
                           <input type="text" class="form-control" id="Enodelivery" name="Enodelivery"  value="<?php echo ($catat['no_delivery_order'])?>">
                            
                          </div>
                          
                        </div>
                        

                        <div class="form-group">
                          <div class="col-sm-3">
                            <label for="keterangan">Keterangan</label>
                          </div>
                          <div class="col-sm-7">
                            <textarea id="Eketerangan" name="Eketerangan" class="form-control"><?php echo ($catat['keterangan'])?></textarea>
                            
                          </div>
                          
                        </div>
                        
                         <input type="hidden" class="form-control" id="idpo" name="idpo" value="<?php echo $idpo;?>" readonly>
                          <input type="hidden" class="form-control" id="uname" name="uname" value="<?php echo $sesuname;?>" readonly>                        
                        <div class="form-group">
                           <div class="modal-footer">
                          <div class="col-sm-8">
                            <button type="submit" class="btn btn-primary save_submit" name="Submit" value="SIMPAN">Simpan</button>
                                   <button type="button" class="btn btn-primary" onclick="$('#ModalEdit').modal('hide');">&nbsp;Batal&nbsp;</button>
                          </div>
                        </div>
                        </div>

                    </form>
                
        </div>
</div>
<?php include_once 'po_supplier_edit_tab.php';?>
<script type="text/javascript">
  function EselectSupplier(){ 
    $("#ModalSupplierEdit").modal({backdrop: 'static',keyboard:false});   
  }
  $(document).ready(function (){

                      $("#formeditpo").on('submit', function(e){

                          var chs= $("#Esuppliernm").val();
                          
                          if (chs==''){
                            alert('Data ada yang belum diisi');
                            return false;
                          }
                          e.preventDefault();
                            //alert(disposisine)  
                                      $.ajax({
                                                  type: 'POST',
                                                  url: 'po/po_edit_save.php',
                                                  data: new FormData(this),
                                                  contentType: false,
                                                  cache: false,
                                                  processData:false,
                                                  success: function(data){
                                                        $("#tablepo").load('po/po_load.php');
                                                        $('.modal-body').css('opacity', '');

                                                            alert('Data Berhasil Disimpan');
                                                            $('#ModalEdit').modal('hide'); 
                                                            var hsl=data.trim();     

                                                             $.ajax({
                                                                url: "po/po_detail.php?idpo="+hsl,
                                                                type: "GET",
                                                                  success: function (ajaxData){
                                                                    $("#ModalPoDet").html(ajaxData);
                                                                    $("#ModalPoDet").modal({backdrop: 'static', keyboard:false});
                                                                  }
                                                                }); 

                                                  }
                                                      
                                                });

                                      
              
                      });
    });

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
  .modal-content {
    /*height: auto;
     width: 700px;*/
  }
  .modal-dialog {
    margin-bottom: 0px;
    border: 3px;
  }
</style>