      <?php
            include_once '../../lib/config.php';
            include_once '../../lib/fungsi.php';
      ?>
      <table id="tunjangan_jabatan1" class="table table-condensed table-bordered table-striped table-hover">
                <thead class="thead-light">
                <tr>
                          <th>Jabatan</th>
                          <th>Tunjangan Jabatan</th>
                           <th>Tunjangan Kinerja</th>
                          <th><button type="button" class="btn btn btn-default btn-circle open_add"><span>Tambah</span></button></th>
                         
                </tr>
                </thead>
                <tbody>
                <?php
                                    $j=1;
                                    $sqlcatat = "SELECT * FROM m_tunjangan_jabatan tjab
                                    LEFT JOIN m_jabatan jab ON tjab.fk_jabatan=jab.id_jabatan
                                    ORDER BY tjab.id_tunjangan_jabatan ASC";
                                    $rescatat = mysql_query( $sqlcatat );
                                    while($catat = mysql_fetch_array( $rescatat )){
                                ?>
                        <tr>
                          <td ><?php echo $catat['nama_jabatan'];?></td>
                          <td ><?php echo rupiah2($catat['tunjangan_jabatan']);?></td>
                          <td ><?php echo rupiah2($catat['tunjangan_kinerja']);?></td>
                          <td >
                                        <button type="button" class="btn btn btn-default btn-circle" id="<?php echo $catat['id_tunjangan_jabatan']; ?>" onclick="open_modal(idedittunjangan_jabatan='<?php echo $catat['id_tunjangan_jabatan']; ?>');"><span>Edit</span></button>
                                         <button type="button" class="btn btn btn-default btn-circle" id="<?php echo $catat['id_tunjangan_jabatan']; ?>" onclick="open_del(iddeltunjangan_jabatan='<?php echo $catat['id_tunjangan_jabatan']; ?>');"><span>Hapus</span></button>

                                    </td>
                        </tr>
                    <?php }?>
                </tfoot>
              </table>
              <script>
             $('#tunjangan_jabatan1').DataTable();
            $(".open_add").click(function (e){
                                //var m = $(this).attr("id_tunjangan_jabatan");
                    $.ajax({
                    url: "tunjangan_jabatan/tunjangan_jabatan_add.php",
                    type: "GET",
                      success: function (ajaxData){
                        $("#ModalAdd").html(ajaxData);
                        $("#ModalAdd").modal({backdrop: 'static',keyboard: false});
                      }
                    });
            });
           function open_del(){
                                $.ajax({
                                    url: "tunjangan_jabatan/tunjangan_jabatan_del.php?id_tunjangan_jabatan="+iddeltunjangan_jabatan,
                                    type: "GET",
                                    success: function (ajaxData){
                                        $("#ModalDelete").html(ajaxData);
                                        $("#ModalDelete").modal({backdrop: 'static',keyboard: false});
                                    }
                                });
            };
            function open_modal(){
                              $.ajax({
                                  url: "tunjangan_jabatan/tunjangan_jabatan_edit.php?id_tunjangan_jabatan="+idedittunjangan_jabatan,

                                  type: "GET",
                                  success: function (ajaxData){
                                      $("#ModalEdit").html(ajaxData);
                                      $("#ModalEdit").modal({backdrop: 'static',keyboard: false});
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