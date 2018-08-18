<?php
    include_once '../../lib/config.php';
    //include_once '../../lib/fungsi.php';
    $id = $_GET['id'];
    $sqlemp = "SELECT * FROM t_penjualan_detail WHERE id='$id'";
    $resemp = mysql_query( $sqlemp );
    $emp = mysql_fetch_array( $resemp );
    $idso=$emp['fk_penjualan'];
    //echo $sqlemp;
    $nmbarang="SELECT * FROM t_barang WHERE id_barang='$emp[fk_barang]'";
    $hbarang=mysql_fetch_array(mysql_query($nmbarang));
?>

            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel" style="text-align: center;padding-right: 0px">Hapus Data Barang <button type="button" class="close" aria-label="Close" onclick="$('#ModalDeleteBarang').modal('hide');"><span>&times;</span></button></h4> 
                    </div>
                        <div class="barang-body">

                            <div class="row">
                                <div class="col-lg-6">
                                    <form>
                                    <div class="alert alert-danger">Apakah anda yakin ingin menghapus data ini ( <?php echo $hbarang['nama'];?>) ?</div>
                                        <div class="form-group">
                                            <input type="hidden" id="fk_barang" name="fk_barang" value="<?php echo $id;?>">
                                            <button type="button" class="btn btn-primary save_submit" name="Submit" value="SIMPAN">&nbsp;&nbsp;&nbsp;Ya&nbsp;&nbsp;&nbsp;</button>
                                            <button type="button" class="btn btn-primary" onclick="$('#ModalDeleteBarang').modal('hide');" >&nbsp;Batal&nbsp;</button>
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
                        	//alert('so/barang_del_save.php?id=<?php echo $id;?>&idso=<?php echo $idso;?>');
                        	//return false();
                           $.ajax({
                                url: 'so/barang_del_save.php?id=<?php echo $id;?>&idso=<?php echo $idso;?>',
                                type: 'GET',
                                success: function (response){
                                      //alert('barang/barang_del_save.php?id_barang='+id_barang);
                                     $("#sobarang").load('so/barang_load.php?idso=<?php echo $idso;?>');
                                     $('.modal-body').css('opacity', '');
                                      alert('Data Berhasil Dihapus');
                                      $('#ModalDeleteBarang').modal('hide');
                                      $("#tablesodetail").load('so/so_detail_tab.php?idso=<?php echo $idso;?>');
                                }
                            });

                    });
                });
              </script> 