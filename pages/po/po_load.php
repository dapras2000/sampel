      <?php
            include_once '../../lib/config.php';
            include_once '../../lib/fungsi.php';
      ?>
      <table id="poLoad" class="table table-condensed table-bordered table-striped table-hover">
                <thead class="thead-light">
                <tr>
                          <th>No</th>
                          <th>Tgl</th>
                          <th>Supplier</th>
                          <th>No DO</th>
                          <th>Total Purchase Order</th>

                     
                          <th><button type="button" class="btn btn btn-default btn-circle" onclick="open_add();"><span>Tambah</span></button></th>
                </tr>
                </thead>
                <tbody>
                <?php
                                    $j=1;
                                    $sqlcatat = "SELECT  * FROM t_pembelian p 
                                    LEFT JOIN t_supplier s on p.fk_supplier=s.id_supplier
                                    WHERE tgl_batal='0000-00-00 00:00:00' ORDER BY id_pembelian DESC";
                                    $rescatat = mysql_query( $sqlcatat );
                                    while($catat = mysql_fetch_array( $rescatat )){

                                ?>
                        <tr>
                          <td><button type="button" class="btn btn-link" id="<?php echo $catat['id_pembelian']; ?>" onclick="open_po(idpo='<?php echo $catat['id_pembelian']; ?>');"><span><?php echo ($catat['id_pembelian']);?></span></button></td>
                       
                          <td ><?php echo date('d-m-Y' , strtotime($catat['tgl']));?></td>
                          <td ><?php echo $catat['nama'];?></td>
                          <td ><?php echo $catat['no_delivery_order'];?></td>
                           <td ><?php echo rupiah2($catat['total_netto_beli_barang']);?></td>
                          <td >
                                        <button type="button" class="btn btn btn-default btn-circle" id="<?php echo $catat['id_pembelian']; ?>" onclick="open_modal(idpo='<?php echo $catat['id_pembelian']; ?>');"><span>Edit</span></button>

                                         

                                         <button type="button" class="btn btn btn-default btn-circle" id="<?php echo $catat['id_pembelian']; ?>" onclick="open_del(idpo='<?php echo $catat['id_pembelian']; ?>');"><span>Batal</span></button> 

                                         

                                         <button type="button" class="btn btn btn-default btn-circle" id="<?php echo $catat['id_pembelian']; ?>" onclick="cetak_est(idpo='<?php echo $catat['id_pembelian']; ?>');"><span>Cetak</span></button>

                                    </td>
                        </tr>
                    <?php }?>
                </tfoot>
              </table>
              <script>
            $('#poLoad').DataTable({
              "language": {
                      "search": "Cari",
                      "lengthMenu": "Lihat _MENU_ baris per halaman",
                      "zeroRecords": "Maaf, Tidak di temukan - data",
                      "info": "Terlihat halaman _PAGE_ of _PAGES_",
                      "infoEmpty": "Tidak ada data di database"
                  }
            });
           
           function open_add(){
              $.ajax({
                    url: "po/po_add.php",
                    type: "GET",
                      success: function (ajaxData){
                        $("#ModalAdd").html(ajaxData);
                        $("#ModalAdd").modal({backdrop: 'static',keyboard: false});
                      }
                    });
              }
              
           function open_del(x){
                                $.ajax({
                                    url: "po/po_del.php?idpo="+x,
                                    type: "GET",
                                    success: function (ajaxData){
                                        $("#ModalDelete").html(ajaxData);
                                        $("#ModalDelete").modal({backdrop: 'static',keyboard: false});
                                    }
                                });
            };
            function open_modal(y){
                              $.ajax({
                                  url: "po/po_edit.php?idpo="+y,
                                  type: "GET",
                                  success: function (ajaxData){
                                      $("#ModalEdit").html(ajaxData);
                                      $("#ModalEdit").modal({backdrop: 'static',keyboard: false});
                                  }
                              });
            };
              
            function open_po(z){
                              $.ajax({
                                  url: "po/po_show.php?idpo="+z,
                                  type: "GET",
                                  success: function (ajaxData){
                                      $("#ModalShow").html(ajaxData);
                                      $("#ModalShow").modal({backdrop: 'static',keyboard: false});
                                  }
                              });
            };

            function cetak_est(q){
                              $.ajax({
                                  url: "po/po_print.php?idpo="+q,
                                  type: "GET",
                                  success: function (ajaxData){
                                      $("#ModalEstPrint").html(ajaxData);
                                      $("#ModalEstPrint").modal({backdrop: 'static',keyboard: false});
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