<?php
    include_once '../../lib/config.php';
    //include_once '../../lib/fungsi.php';
    $id = $_GET['idpo'];
    $sqlemp = "SELECT * FROM t_pembelian WHERE id_pembelian='$id'";
    $resemp = mysql_query( $sqlemp );
    $emp = mysql_fetch_array( $resemp );

?>

            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel" style="text-align: center;padding-right: 0px">Batal Data Purchase Order <button type="button" class="close" aria-label="Close" onclick="$('#ModalDelete').modal('hide');"><span>&times;</span></button></h4> 
                    </div>
                        <div class="panel-body">

                            <div class="row">
                                <div class="col-lg-12">
                                    <form>
                                    <div class="alert alert-danger">Apakah anda yakin ingin membatalkan data ini ( <?php echo $id;?>) ?</div>
                                       <div class="form-group">
                                      <div class="col-sm-4">
                                        <label for="keteranganbatal"> Keterangan Batal</label>
                                      </div>
                                      <div class="col-sm-8">
                                        <input type="text" class="form-control" id="keteranganbatal" name="keteranganbatal" required>
                                      </div>
                                    </div>
                                        <div class="form-group">
                                            <input type="hidden" id="id" name="id" value="<?php echo $id;?>">
                                            <button type="button" class="btn btn-primary save_submit" name="Submit" value="SIMPAN">&nbsp;&nbsp;&nbsp;Ya&nbsp;&nbsp;&nbsp;</button>
                                            <button type="button" class="btn btn-primary" onclick="$('#ModalDelete').modal('hide');" >&nbsp;Batal&nbsp;</button>
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
                             var keteranganbatal = $('#keteranganbatal').val();
                           $.ajax({
                                  url: 'po/po_del_save.php?idpo=<?php echo $id;?>     &keteranganbatal='+keteranganbatal,
                                type: 'GET',
                                success: function (response){
                                      //alert('panel/panel_del_save.php?id_panel='+id_panel);
                                     $("#tablepo").load('po/po_load.php');
                                     $('.modal-body').css('opacity', '');
                                      alert('Data Berhasil Dibatalkan');
                                      $('#ModalDelete').modal('hide');
                                  }
                            });

                    });
                });
              </script> 