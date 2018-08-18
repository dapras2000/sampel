<?php
    include_once '../../lib/config.php';
    //include_once '../../lib/fungsi.php';
    $id_status_pegawai = $_GET['id_status_pegawai'];
    $sqlstatus_pegawai = "SELECT * FROM m_status_pegawai WHERE id_status_pegawai='$id_status_pegawai'";
    $status_pegawaiar = mysql_query( $sqlstatus_pegawai );
    $emp = mysql_fetch_array( $status_pegawaiar );
?>

            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hid_status_pegawai="true">&times;</span></button>
                        <h4 class="modal-title" id_status_pegawai="myModalLabel">Hapus Data Status Pegawai</h4>
                    </div>
                        <div class="panel-body">

                            <div class="row">
                                <div class="col-lg-6">
                                    <form>
                                    <div class="alert alert-danger">Apakah anda yakin ingin menghapus data ini ( <?php echo $emp['nama_status_pegawai'];?>) ?</div>
                                        <div class="form-group">
                                            <input type="hidden" id="id_status_pegawai" name="id_status_pegawai" value="<?php echo $id_status_pegawai;?>">
                                            <button type="button" class="btn btn-primary save_submit" name="Submit" value="SIMPAN">&nbsp;&nbsp;&nbsp;Ya&nbsp;&nbsp;&nbsp;</button>
                                            <button type="button" class="btn btn-primary" data-dismiss="modal" aria-hid_status_pegawai="true">&nbsp;Batal&nbsp;</button>
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
                            var id_status_pegawai = $('#id_status_pegawai').val();
                           $.ajax({
                                url: 'status_pegawai/status_pegawai_del_save.php?id_status_pegawai='+id_status_pegawai,
                                type: 'GET',
                                success: function (response){
                                      //alert('asuransi/asuransi_del_save.php?$id_status_pegawai='+$id_status_pegawai);
                                      $("#tablestatus_pegawai").load('status_pegawai/status_pegawai_load.php');
                                      alert('Data Berhasil Dihapus');
                                      $('#ModalDelete').modal('hide');
                                }
                            });

                    });
                });
              </script> 