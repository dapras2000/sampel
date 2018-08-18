<!-- general form elements disabled -->
   <?php
    include_once '../../lib/config.php';
    include_once '../../lib/fungsi.php';
    $id_status_pegawai = $_GET['id_status_pegawai'];
    $sqlemp = "SELECT * FROM m_status_pegawai WHERE id_status_pegawai='$id_status_pegawai'";
    $resemp = mysql_query( $sqlemp );
    $emp = mysql_fetch_array( $resemp );
  ?>
<div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hid_status_pegawai="true">&times;</span></button>
                        <h4 class="modal-title" id_status_pegawai="myModalLabel">Edit Data status_pegawai</h4>
                    </div>

                     <div class="modal-body">
				            <form class="form-horizontal" enctype="multipart/form-data" novalidate id="formstatus_pegawai">
                        <div class="form-group">
                          <div class="col-sm-3">
                          <label for="kodestatus_pegawai">Kode Status Pegawai</label>
                        </div>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" id="id_status_pegawai" name="id_status_pegawai" value="<?php echo $emp['id_status_pegawai'];?>" readonly>
                          </div>
                        </div>
				                <div class="form-group">
                            <div class="col-sm-3">
				                  <label for="nama_status_pegawaistatus_pegawailabel" >Nama Status Pegawai</label>
                        </div>
				                  <div class="col-sm-8">
				                    <input type="text" class="form-control" id="nama_status_pegawai" name="nama_status_pegawai" value="<?php echo $emp['nama_status_pegawai'];?>" required>
				                  </div>
				                </div>
				                <div class="form-group">
                                  <div class="modal-footer">
				                  <div class="col-sm-8"> 
				                  	<button type="submit" class="btn btn-primary save_submit" name="Submit" value="SIMPAN">Simpan</button>
                                    <button type="button" class="btn btn-primary" data-dismiss="modal" aria-hid_status_pegawai="true">&nbsp;Batal&nbsp;</button>
				                  </div>
                                </div>
				                </div>
				            </form>
			         </div>
				</div>

</div>
<script type="text/javascript">
	$(document).ready(function (){
                      $("#formstatus_pegawai").on('submit', function(e){
                          e.preventDefault();
                           						$.ajax({
                                                  type: 'POST',
                                                  url: 'status_pegawai/status_pegawai_edit_save.php',
                                                  data: new FormData(this),
                                                  contentType: false,
                                                  cache: false,
                                                  processData:false,
                                                  success: function(data){
                                                        //alert(data.trim());
			                                                $("#tablestatus_pegawai").load('status_pegawai/status_pegawai_load.php');
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