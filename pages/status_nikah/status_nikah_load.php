      <?php
            include_once '../../lib/config.php';
      ?>
      <table id="status_nikah1" class="table table-condensed table-bordered table-striped table-hover">
                <thead class="thead-light">
                <tr>
                          <th>Kode Status Nikah</th>
                          <th>Nama Status Nikah</th>
                          <th><button type="button" class="btn btn btn-default btn-circle open_add" ><span>Tambah</span></button></th>
                </tr>
                </thead>
                <tbody>
                <?php
                                    $j=1;
                                    $sqlcatat = "SELECT * FROM m_status_nikah ORDER BY id_status_nikah ASC";
                                    $rescatat = mysql_query( $sqlcatat );
                                    while($catat = mysql_fetch_array( $rescatat )){
                                ?>
                        <tr>
                          <td ><?php echo $catat['id_status_nikah'];?></td>
                          <td ><?php echo $catat['nama_status_nikah'];?></td>
                          <td >
                                        <button type="button" class="btn btn btn-default btn-circle" id="<?php echo $catat['id_status_nikah']; ?>" onclick="open_modal(ideditstatus_nikah='<?php echo $catat['id_status_nikah']; ?>');"><span>Edit</span></button>
                                         <button type="button" class="btn btn btn-default btn-circle" id="<?php echo $catat['id_status_nikah']; ?>" onclick="open_del(iddelstatus_nikah='<?php echo $catat['id_status_nikah']; ?>');"><span>Hapus</span></button>

                                    </td>
                        </tr>
                    <?php }?>
                </tfoot>
              </table>
              <script>
             $('#status_nikah1').DataTable();
            $(".open_add").click(function (e){
                    $.ajax({
                    url: "status_nikah/status_nikah_add.php",
                    type: "GET",
                      success: function (ajaxData){
                        $("#ModalAdd").html(ajaxData);
                        $("#ModalAdd").modal({backdrop: 'static',keyboard: false});
                        $("#id_status_nikah").focus();
                      }
                    });
            });
           function open_del(){
                                $.ajax({
                                    url: "status_nikah/status_nikah_del.php?id_status_nikah="+iddelstatus_nikah,
                                    type: "GET",
                                    success: function (ajaxData){
                                        $("#ModalDelete").html(ajaxData);
                                        $("#ModalDelete").modal({backdrop: 'static',keyboard: false});
                                    }
                                });
            };
            function open_modal(){
                              $.ajax({
                                  url: "status_nikah/status_nikah_edit.php?id_status_nikah="+ideditstatus_nikah,

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