<?php
    include_once '../../lib/config.php';
    //include_once '../../lib/fungsi.php';
    $id_status_nikah = $_GET['id_status_nikah'];
    $sqlstatus_nikah = "SELECT * FROM m_status_nikah WHERE id_status_nikah='$id_status_nikah'";
    $status_nikahar = mysql_query( $sqlstatus_nikah );
    $emp = mysql_fetch_array( $status_nikahar );
?>

            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hid_status_nikah="true">&times;</span></button>
                        <h4 class="modal-title" id_status_nikah="myModalLabel">Hapus Data status_nikah</h4>
                    </div>
                        <div class="panel-body">

                            <div class="row">
                                <div class="col-lg-6">
                                    <form>
                                    <div class="alert alert-danger">Apakah anda yakin ingin menghapus data ini ( <?php echo $emp['nama_status_nikah'];?>) ?</div>
                                        <div class="form-group">
                                            <input type="hidden" id="id_status_nikah" name="id_status_nikah" value="<?php echo $id_status_nikah;?>">
                                            <button type="button" class="btn btn-primary save_submit" name="Submit" value="SIMPAN">&nbsp;&nbsp;&nbsp;Ya&nbsp;&nbsp;&nbsp;</button>
                                            <button type="button" class="btn btn-primary" data-dismiss="modal" aria-hid_status_nikah="true">&nbsp;Batal&nbsp;</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>

                <script type="text/javascript">
                  $(document).ready(function (){
                        $(".save_submit").click(function (e){
                            var id_status_nikah = $('#id_status_nikah').val();
                           $.ajax({
                                url: 'status_nikah/status_nikah_del_save.php?id_status_nikah='+id_status_nikah,
                                type: 'GET',
                                success: function (response){
                                      //alert('asuransi/asuransi_del_save.php?$id_status_nikah='+$id_status_nikah);
                                      $("#tablestatus_nikah").load('status_nikah/status_nikah_load.php');
                                      alert('Data Berhasil Dihapus');
                                      $('#ModalDelete').modal('hide');
                                }
                            });

                    });
                });
              </script> 