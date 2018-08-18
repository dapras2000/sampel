<!-- general form elements disabled -->
   <?php
    include_once '../../lib/config.php';
    $idpo=$_GET['idpo'];
   ?>
<div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel" style="text-align: center;padding-right: 0px">Tambah Purchase Order  <button type="button" class="close" aria-label="Close" onclick="$('#ModalAddBarang').modal('hide');"><span>&times;</span></button></h4>  
                    </div>
				          
                    <div class="modal-body">
				            <form class="form-horizontal" enctype="multibarang/form-data" novalidate id="formbarang">
                       
				                <div class="form-group">
                          <div class="col-sm-3">
                            <label for="namabarang">Nama</label>
                          </div>
				                  <div class="col-sm-6">
                            <input type="hidden" class="form-control" id="barang" name="barang" required>
				                    <input type="text" class="form-control" id="barangnm" name="barangnm" readonly required>
				                  </div><button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#myModal" onclick="pilihbarang();">Pilih</button>
				                </div>
                        <div class="form-group">
                            <div class="col-sm-3">
                          <label for="hargapokokbarang">Harga</label>
                        </div>
                          <div class="col-sm-8">
                         <input type="text" class="form-control" id="hargapokok" name="hargapokok" required  onchange="kalip();">
                          </div>
                        </div>
				                <div class="form-group">
                            <div class="col-sm-3">
				                  <label for="hargajualbarang">Diskon</label>
                        </div>
				                  <div class="col-sm-3">
				                    <input type="text" class="form-control" id="diskon" name="diskon" required onchange="kalip();">
				                  </div>%
				                </div>
                        <div class="form-group">
                            <div class="col-sm-3">
                          <label for="hargajualbarang">Qty</label>
                        </div>
                          <div class="col-sm-3">
                            <input type="text" class="form-control" id="qty" name="qty" required onchange="kalip();">
                          </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3">
                          <label for="ppn">Harga Total</label>
                        </div>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" id="hargatotal" name="hargatotal" required readonly>
                          </div>
                        </div>
                        
				                <div class="form-group">
                           <div class="modal-footer">
				                  <div class="col-sm-8">
                            <input type="hidden" class="form-control" id="idpo" name="idpo" value="<?php echo $idpo?>" required>
				                    <button type="submit" class="btn btn-primary save_submit" name="Submit" value="SIMPAN">Simpan</button>
                                    <button type="button" class="btn btn-primary" onclick="$('#ModalAddBarang').modal('hide');">&nbsp;Batal&nbsp;</button>
				                  </div>
                        </div>
				                </div>

				            </form>
				          </div>
				</div>
</div>
<?php include_once 'barang_pilih.php';?>

<script type="text/javascript">
  function pilihbarang(){ 
    $("#ModalPilihBarang").modal({backdrop: 'static', keyboard:false});   
  }
  function kalip(){
    var hasil= ($("#hargapokok").val()-($("#diskon").val()*$("#hargapokok").val()/100))*$("#qty").val();
    $("#hargatotal").val(hasil);
    //alert(hasil);
  }
	$(document).ready(function (){
                      $("#formbarang").on('submit', function(e){
                          e.preventDefault();
                            //alert(disposisine)                       ;
                           						$.ajax({
                                                  type: 'POST',
                                                  url: 'po/barang_add_save.php',
                                                  data: new FormData(this),
                                                  contentType: false,
                                                  cache: false,
                                                  processData:false,
                                                  success: function(data){  
                                                      //var hsl=data.trim();
                                                      //alert(hsl);
                                                      //alert('po/po_detail_tab.php?idpo=<?php //echo $idpo;?>');
                                                      $("#tablepo").load('po/po_load.php');
			                                                $("#pobarang").load('po/barang_load.php?idpo=<?php echo $idpo;?>');
                                                                      $('.modal-body').css('opacity', '');

                                                            alert('Data Berhasil Disimpan');
                                                            $('#ModalAddBarang').modal('hide');
                                                            $("#tablepodetail").load('po/po_detail_tab.php?idpo=<?php echo $idpo;?>');
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
  .modal-dialog {
    margin-bottom: 0px;
    border: 3px;
  }
</style>