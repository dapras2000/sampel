<!-- general form elements disabled -->
   <?php
    include_once '../../lib/config.php';
    include_once '../../lib/fungsi.php';
    $id_jabatan = $_GET['id_jabatan'];
    $sqlemp = "SELECT * FROM m_jabatan WHERE id_jabatan='$id_jabatan'";
    $resemp = mysql_query( $sqlemp );
    $emp = mysql_fetch_array( $resemp );
  ?>
<div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hid_jabatan="true">&times;</span></button>
                        <h4 class="modal-title" id_jabatan="myModalLabel">Edit Data Jabatan</h4>
                    </div>

                     <div class="modal-body">
				            <form class="form-horizontal" enctype="multipart/form-data" novalidate id="formjabatan">
                        <div class="form-group">
                          <div class="col-sm-3">
                          <label for="kodejabatan">Kode Jabatan</label>
                        </div>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" id="id_jabatan" name="id_jabatan" value="<?php echo $emp['id_jabatan'];?>" readonly>
                          </div>
                        </div>
				                <div class="form-group">
                            <div class="col-sm-3">
				                  <label for="nama_jabatanjabatanlabel" >Nama Jabatan</label>
                        </div>
				                  <div class="col-sm-8">
				                    <input type="text" class="form-control" id="nama_jabatan" name="nama_jabatan" value="<?php echo $emp['nama_jabatan'];?>" required>
				                  </div>
				                </div>
				                <div class="form-group">
                                  <div class="modal-footer">
				                  <div class="col-sm-8"> 
				                  	<button type="submit" class="btn btn-primary save_submit" name="Submit" value="SIMPAN">Simpan</button>
                                    <button type="button" class="btn btn-primary" data-dismiss="modal" aria-hid_jabatan="true">&nbsp;Batal&nbsp;</button>
				                  </div>
                                </div>
				                </div>
				            </form>
			         </div>
				</div>

</div>
<script type="text/javascript">
	$(document).ready(function (){
                      $("#formjabatan").on('submit', function(e){
                          e.preventDefault();
                           						$.ajax({
                                                  type: 'POST',
                                                  url: 'jabatan/jabatan_edit_save.php',
                                                  data: new FormData(this),
                                                  contentType: false,
                                                  cache: false,
                                                  processData:false,
                                                  success: function(data){
                                                        //alert(data.trim());
			                                                $("#tablejabatan").load('jabatan/jabatan_load.php');
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