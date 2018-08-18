<?php
    include_once '../../lib/config.php';
    //include_once '../../lib/fungsi.php';
    $id_barang = $_GET['id_barang'];
    $sqlemp = "SELECT * FROM t_barang WHERE id_barang='$id_barang'";
    $resemp = mysql_query( $sqlemp );
    $emp = mysql_fetch_array( $resemp );
?>

            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hid_barangden="true">&times;</span></button>
                        <h4 class="modal-title" id_barang="myModalLabel">Hapus Data Barang</h4>
                    </div>
                        <div class="barang-body">

                            <div class="row">
                                <div class="col-lg-6">
                                    <form>
                                    <div class="alert alert-danger">Apakah anda yakin ingin menghapus data ini ( <?php echo $emp['nama'];?>) ?</div>
                                        <div class="form-group">
                                            <input type="hidden" id="id_barang" name="id_barang" value="<?php echo $id_barang;?>">
                                            <button type="button" class="btn btn-primary save_submit" name="Submit" value="SIMPAN">&nbsp;&nbsp;&nbsp;Ya&nbsp;&nbsp;&nbsp;</button>
                                            <button type="button" class="btn btn-primary" data-dismiss="modal" aria-hid_barangden="true">&nbsp;Batal&nbsp;</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                        <!-- /.barang-body -->
                    </div>
                    <!-- /.barang -->
                </div>

                <script type="text/javascript">
                  $(document).ready(function (){
                        $(".save_submit").click(function (e){
                            var id_barang = $('#id_barang').val();
                           $.ajax({
                                url: 'barang/barang_del_save.php?id_barang='+id_barang,
                                type: 'GET',
                                success: function (response){
                                      //alert('barang/barang_del_save.php?id_barang='+id_barang);
                                      $("#tablebarang").load('barang/barang_load.php');
                                      alert('Data Berhasil Dihapus');
                                      $('#ModalDelete').modal('hide');
                                }
                            });

                    });
                });
              </script> 