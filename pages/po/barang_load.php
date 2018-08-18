      <?php
            include_once '../../lib/config.php';
            include_once '../../lib/fungsi.php';
            $idpo=$_GET['idpo'];
      ?>
      <table id="pobarang" class="table table-condensed table-bordered table-striped table-hover">
                <thead class="thead-light">
                <tr>
                          <th>Nama</th>
                          <th>Harga</th>
                          <th>Diskon</th>
                          <th>Qty</th>
                          <th>Harga Netto</th>                          
                          <th><button type="button" class="btn btn btn-default btn-circle" onclick="open_addbarang(idpo='<?php echo $idpo;?>');"><span>Tambah</span></button></th>
                </tr>
                </thead>
                <tbody>
                <?php
                                    $j=1;
                                    $sqlcatat = "SELECT ep.*,p.nama FROM t_pembelian_detail ep
                                    LEFT JOIN t_barang p ON ep.fk_barang=p.id_barang
                                    WHERE fk_pembelian='$idpo' ORDER BY id ASC";
                                    $rescatat = mysql_query( $sqlcatat );
                                    while($catat = mysql_fetch_array( $rescatat )){
                                ?>
                        <tr>
                          <td ><?php echo $catat['nama'];?></td>
                          <td ><?php echo rupiah2($catat['gross_beli_barang']);?></td>
                          <td ><?php echo rupiah2($catat['diskon_beli_barang']);?></td>
                          <td ><?php echo $catat['qty'];?></td>
                          <td ><?php echo rupiah2($catat['netto_beli_barang']);?></td>
                          <td >
                                        <button type="button" class="btn btn btn-default btn-circle" id="<?php echo $catat['id'];?>" onclick="open_modalbarang(id='<?php echo $catat['id'];?>');"><span>Edit</span></button>
                                         <button type="button" class="btn btn btn-default btn-circle" id="<?php echo $catat['id'];?>" onclick="open_delbarang(id='<?php echo $catat['id'];?>');"><span>Hapus</span></button>

                                    </td>
                        </tr>
                    <?php }?>
                   
                </tfoot>
              </table>
              <script>
            $('#pobarang').DataTable();
          
           function open_addbarang(x){
              $.ajax({
                    url: "po/barang_add.php?idpo="+x,
                    type: "GET",
                      success: function (ajaxData){
                        $("#ModalAddBarang").html(ajaxData);
                        $("#ModalAddBarang").modal({backdrop: 'static', keyboard:false});
                      }
                    });
              }
           function open_delbarang(y){
                                $.ajax({
                                    url: "po/barang_del.php?id="+y,
                                    type: "GET",
                                    success: function (ajaxData){
                                        $("#ModalDeleteBarang").html(ajaxData);
                                        $("#ModalDeleteBarang").modal({backdrop: 'static', keyboard:false});
                                    }
                                });
            };
            function open_modalbarang(z){
                              $.ajax({
                                  url: "po/barang_edit.php?idpo=<?php echo $idpo;?>&id="+z,
                                  type: "GET",
                                  success: function (ajaxData){
                                      $("#ModalEditBarang").html(ajaxData);
                                      $("#ModalEditBarang").modal({backdrop: 'static', keyboard:false});
                                  }
                              });
            };
      </script>

<style type="text/css">
  .table {
    border-spacing: 0;
    border-collapse: collapse;
    margin-bottom: 0px;
  }
  .thead-light{
    background-color: lightgrey;
  }
  .btn {
    font-weight: bold;
    padding-bottom: 0px;
    padding-top: 3px;
    padding-left: 4px;
    padding-right: 4px;
  }
</style>