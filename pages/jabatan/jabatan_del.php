<?php
    include_once '../../lib/config.php';
    //include_once '../../lib/fungsi.php';
    $id_jabatan = $_GET['id_jabatan'];
    $sqljabatan = "SELECT * FROM m_jabatan WHERE id_jabatan='$id_jabatan'";
    $jabatanar = mysql_query( $sqljabatan );
    $emp = mysql_fetch_array( $jabatanar );
?>

            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hid_jabatan="true">&times;</span></button>
                        <h4 class="modal-title" id_jabatan="myModalLabel">Hapus Data Jabatan</h4>
                    </div>
                        <div class="panel-body">

                            <div class="row">
                                <div class="col-lg-6">
                                    <form>
                                    <div class="alert alert-danger">Apakah anda yakin ingin menghapus data ini ( <?php echo $emp['nama_jabatan'];?>) ?</div>
                                        <div class="form-group">
                                            <input type="hidden" id="id_jabatan" name="id_jabatan" value="<?php echo $id_jabatan;?>">
                                            <button type="button" class="btn btn-primary save_submit" name="Submit" value="SIMPAN">&nbsp;&nbsp;&nbsp;Ya&nbsp;&nbsp;&nbsp;</button>
                                            <button type="button" class="btn btn-primary" data-dismiss="modal" aria-hid_jabatan="true">&nbsp;Batal&nbsp;</button>
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
                            var id_jabatan = $('#id_jabatan').val();
                           $.ajax({
                                url: 'jabatan/jabatan_del_save.php?id_jabatan='+id_jabatan,
                                type: 'GET',
                                success: function (response){
                                      //alert('asuransi/asuransi_del_save.php?$id_jabatan='+$id_jabatan);
                                      $("#tablejabatan").load('jabatan/jabatan_load.php');
                                      alert('Data Berhasil Dihapus');
                                      $('#ModalDelete').modal('hide');
                                }
                            });

                    });
                });
              </script> 