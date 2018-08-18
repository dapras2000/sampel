<!-- general form elements disabled -->
   <?php
    include_once '../../lib/config.php';
    include_once '../../lib/fungsi.php';
    $id_status_nikah = $_GET['id_status_nikah'];
    $sqlemp = "SELECT * FROM m_status_nikah WHERE id_status_nikah='$id_status_nikah'";
    $resemp = mysql_query( $sqlemp );
    $emp = mysql_fetch_array( $resemp );
  ?>
<div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hid_status_nikah="true">&times;</span></button>
                        <h4 class="modal-title" id_status_nikah="myModalLabel">Edit Data Status Nikah</h4>
                    </div>

                     <div class="modal-body">
				            <form class="form-horizontal" enctype="multipart/form-data" novalidate id="formstatus_nikah">
                        <div class="form-group">
                          <div class="col-sm-3">
                          <label for="kodestatus_nikah">Kode Status Nikah</label>
                        </div>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" id="id_status_nikah" name="id_status_nikah" value="<?php echo $emp['id_status_nikah'];?>" readonly>
                          </div>
                        </div>
				                <div class="form-group">
                            <div class="col-sm-3">
				                  <label for="nama_status_nikahstatus_nikahlabel" >Nama Status nikah</label>
                        </div>
				                  <div class="col-sm-8">
				                    <input type="text" class="form-control" id="nama_status_nikah" name="nama_status_nikah" value="<?php echo $emp['nama_status_nikah'];?>" required>
				                  </div>
				                </div>
				                <div class="form-group">
                                  <div class="modal-footer">
				                  <div class="col-sm-8"> 
				                  	<button type="submit" class="btn btn-primary save_submit" name="Submit" value="SIMPAN">Simpan</button>
                                    <button type="button" class="btn btn-primary" data-dismiss="modal" aria-hid_status_nikah="true">&nbsp;Batal&nbsp;</button>
				                  </div>
                                </div>
				                </div>
				            </form>
			         </div>
				</div>

</div>
<script type="text/javascript">
	$(document).ready(function (){
                      $("#formstatus_nikah").on('submit', function(e){
                          e.preventDefault();
                           						$.ajax({
                                                  type: 'POST',
                                                  url: 'status_nikah/status_nikah_edit_save.php',
                                                  data: new FormData(this),
                                                  contentType: false,
                                                  cache: false,
                                                  processData:false,
                                                  success: function(data){
                                                        //alert(data.trim());
			                                                $("#tablestatus_nikah").load('status_nikah/status_nikah_load.php');
                                                            alert('Data Berhasil Disimpan');
                                                            $('#ModalEdit').modal('hide');
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