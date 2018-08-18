<!-- general form elements disabled -->
   <?php
    include_once '../../lib/config.php';
   ?>
<div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Tambah Data Tunjangan Jabatan</h4>
                    </div>
                    <!--<div class="box-header with-border">
                      <h3 class="box-title">Horizontal Form</h3>
                    </div>
                     /.box-header -->
                    <!-- form start -->
                    <div class="modal-body">
                    <form class="form-horizontal" enctype="multipart/form-data" novalidate id="formtunjangan_jabatan">
                      <div class="form-group">
                          <div class="col-sm-3">
                            <label for="namatunjangan_jabatan">Jabatan</label>
                          </div>
                          <div class="col-sm-7">
                            <input type="hidden" class="form-control" id="jabatan" name="jabatan" readonly>
                            <input type="text" class="form-control" id="jabatannm" name="jabatannm" readonly>
                          </div>
                        <button type="button" class="btn btn-primary btn-md data-toggle="modal" data-target="#myModal" onclick="pilihjabatan();">Pilih</button>
                        </div>

                        <div class="form-group">
                          <div class="col-sm-3">
                            <label for="kodetunjangan_jabatan">Tunjangan Jabatan</label>
                          </div>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" id="tunjanganjabatan" name="tunjanganjabatan" required value="0">
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-sm-3">
                            <label for="namatunjangan_jabatan">Tunjangan Kinerja</label>
                          </div>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" id="tunjangankinerja" name="tunjangankinerja" required value="0">

                          </div>
                        </div>                        
                        
                        <div class="form-group">
                           <div class="modal-footer">
                          <div class="col-sm-8">
                            <button type="submit" class="btn btn-primary save_submit" name="Submit" value="SIMPAN">Simpan</button>
                                    <button type="button" class="btn btn-primary" data-dismiss="modal" aria-hidden="true">&nbsp;Batal&nbsp;</button>
                          </div>
                        </div>
                        </div>

                    </form>
                  </div>
        </div>
</div>
<?php include_once 'pilih_jabatan_tab.php';?>
<script type="text/javascript">
  
  function pilihjabatan(){  
    $("#ModalJabatan").modal({backdrop: 'static',keyboard: false});   
  }
  $(document).ready(function (){
    //$("#tunjanganjabatan").maskMoney({precision:0});
    //$("#tunjangankinerja").maskMoney({precision:0});

                      $("#formtunjangan_jabatan").on('submit', function(e){
                          e.preventDefault();
                            //alert( $("#tunjanganjabatan").val());
                            //return false;
                                      $.ajax({
                                                  type: 'POST',
                                                  url: 'tunjangan_jabatan/tunjangan_jabatan_add_save.php',
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
                                                            $('#ModalAdd').modal('hide');
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