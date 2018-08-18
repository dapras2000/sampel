<!-- general form elements disabled -->
   <?php
    include_once '../../lib/config.php';
    $id_tunjangan_jabatan=$_GET['id_tunjangan_jabatan'];
    $sql="SELECT * FROM m_tunjangan_jabatan tjab
          LEFT JOIN m_jabatan jab ON tjab.fk_jabatan=jab.id_jabatan
    WHERE tjab.id_tunjangan_jabatan='$id_tunjangan_jabatan'";
    $catat=mysql_fetch_array(mysql_query($sql));
   ?>
<div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Edit Data Tunjangan Jabatan</h4>
                    </div>
                    <!--<div class="box-header with-border">
                      <h3 class="box-title">Horizontal Form</h3>
                    </div>
                     /.box-header -->
                    <!-- form start -->
                    <div class="modal-body">
                    <form class="form-horizontal" enctype="multipart/form-data" novalidate id="formtunjangan_jabatanE">
                      <div class="form-group">
                          <div class="col-sm-3">
                            <label for="namatunjangan_jabatan">Jabatan</label>
                          </div>
                          <div class="col-sm-7">
                            <input type="hidden" class="form-control" id="jabatan2" name="jabatan2" readonly value="<?php echo $catat['fk_jabatan'];?>">
                            <input type="text" class="form-control" id="jabatannm2" name="jabatannm2" readonly value="<?php echo $catat['nama_jabatan'];?>">
                          </div>
                        <button type="button" class="btn btn-primary btn-md data-toggle="modal" data-target="#myModal" onclick="pilihjabatan2();">Pilih</button>
                        </div>

                        <div class="form-group">
                          <div class="col-sm-3">
                            <label for="kodetunjangan_jabatan">Tunjangan Jabatan</label>
                          </div>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" id="tunjanganjabatan2" name="tunjanganjabatan2" required value="<?php echo $catat['tunjangan_jabatan'];?>">
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-sm-3">
                            <label for="namatunjangan_jabatan">Tunjangan Kinerja</label>
                          </div>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" id="tunjangankinerja2" name="tunjangankinerja2" required value="<?php echo $catat['tunjangan_kinerja'];?>">

                          </div>
                        </div>                        
                        
                        <div class="form-group">
                           <div class="modal-footer">
                          <div class="col-sm-8">
                            <input type="hidden" name="idhid" id="idhid" value="<?php echo $catat['fk_jabatan'];?>">
                            <button type="submit" class="btn btn-primary save_submit" name="Submit" value="SIMPAN">Simpan</button>
                                    <button type="button" class="btn btn-primary" data-dismiss="modal" aria-hidden="true">&nbsp;Batal&nbsp;</button>
                          </div>
                        </div>
                        </div>

                    </form>
                  </div>
        </div>
</div>
<?php include_once 'pilih_jabatan_tab2.php';?>
<script type="text/javascript">
  
  function pilihjabatan2(){  
    $("#ModalJabatan2").modal({backdrop: 'static',keyboard: false});   
  }
  $(document).ready(function (){
    //$("#tunjanganjabatan2").maskMoney();
    //$("#tunjangankinerja2").maskMoney();

                      $("#formtunjangan_jabatanE").on('submit', function(e){
                          e.preventDefault();
                            //alert( $("#tunjanganjabatan").val());
                            //return false;
                                      $.ajax({
                                                  type: 'POST',
                                                  url: 'tunjangan_jabatan/tunjangan_jabatan_edit_save.php',
                                                  data: new FormData(this),
                                                  contentType: false,
                                                  cache: false,
                                                  processData:false,
                                                  success: function(data){
                                                        //alert('lolos');
                                                        var hsl=data.trim();
                                                        //alert(hsl);
                                                        //return false;
                                                        if (hsl=='y'){
                                                      alert('Data Sudah ada');
                                                      return false;
                                                      exit();
                                                    }else{

                                                      $("#tabletunjangan_jabatan").load('tunjangan_jabatan/tunjangan_jabatan_load.php');
                                                                      $('.modal-body').css('opacity', '');

                                                            alert('Data Berhasil Disimpan');
                                                            $('#ModalEdit').modal('hide');
                                                  }
                                                      }
                                                });
                      });
    });

</script>

<style type="text/css">
  .modal-footer {
    padding-top: 10px;
    padding-bottom: 0px;
    padding-left: 0px;
    padding-right: 0px;
  }
  .modal-title {
    font-style: italic;
    background-color: lightcoral;
    text-align: center;
    font-weight: bold;
  }
  .modal-dialog {
    margin-bottom: 0px;
    border: 3px;
  }
</style>