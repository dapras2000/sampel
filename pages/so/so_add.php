<!-- general form elements disabled -->
   <?php

    include_once '../../lib/sess.php';
    include_once '../../lib/config.php';
    include_once '../../lib/fungsi.php';
    
   ?>
<div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel" style="text-align: center;padding-right: 0px">Tambah Data Sales Order <button type="button" class="close" aria-label="Close" onclick="$('#ModalAdd').modal('hide');"><span>&times;</span></button></h4>  
                    </div>
                    <!--<div class="box-header with-border">
                      <h3 class="box-title">Horizontal Form</h3>
                    </div>
                     /.box-header -->
                    <!-- form start -->
                    <div class="modal-body">
                    <form class="form-horizontal" enctype="multipart/form-data" novalidate id="formso">
                        <div class="form-group">
                          <div class="col-sm-3">
                            <label for="kodeestimasi">Tgl Masuk</label>
                          </div>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" id="tgl1" name="tgl1" value="<?php echo tampilTanggal($harinow);?>" readonly>
                            <input type="hidden" class="form-control" id="tgl" name="tgl" value="<?php echo $harinow;?>" readonly>
                          </div>
                        </div>
                        
                        <div class="form-group">
                          <div class="col-sm-3">
                            <label for="namaestimasi">Customer</label>
                          </div>
                          <div class="col-sm-7">
                            <input type="text" class="form-control" id="customernm" name="customernm" readonly>
                            <input type="hidden" class="form-control" id="customer" name="customer" readonly>
                          </div>
                          <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#myModal" onclick="selectCustomer();">Pilih</button>
                        </div>
                        <div class="form-group">
                          <div class="col-sm-3">
                            <label for="namaestimasi">Keterangan</label>
                          </div>
                          <div class="col-sm-7">
                            <textarea id="keterangan" name="keterangan" class="form-control"></textarea>
                            
                          </div>
                          
                        </div>
                        
                         
                          <input type="hidden" class="form-control" id="uname" name="uname" value="<?php echo $sesuname;?>" readonly>                        
                        <div class="form-group">
                           <div class="modal-footer">
                          <div class="col-sm-8">
                            <button type="submit" class="btn btn-primary save_submit" name="Submit" value="SIMPAN">Simpan</button>
                                   <button type="button" class="btn btn-primary" onclick="$('#ModalAdd').modal('hide');">&nbsp;Batal&nbsp;</button>
                          </div>
                        </div>
                        </div>

                    </form>
                      <!--<table width="100%" border="1">
                        <tr>
                          <td>Panel</td>
                          <td>Part</td>
                        </tr>
                        <tr>
                          <td><div id="tablepanel"></div></td>
                          <td><div id="tablepart"></div></td>
                        </tr>
                      </table>
                  </div>-->
        </div>
</div>
<?php include_once 'so_customer_tab.php';?>
<script type="text/javascript">
  function selectCustomer(){ 
    $("#ModalCustomer").modal({backdrop: 'static',keyboard:false});   
  }
  $(document).ready(function (){

                      $("#formso").on('submit', function(e){
                          var chs= $("#customernm").val();
                          
                          if (chs==''){
                            alert('Data ada yang belum diisi');
                            return false;
                          }
                          e.preventDefault();
                            //alert(disposisine)  
                                      $.ajax({
                                                  type: 'POST',
                                                  url: 'so/so_add_save.php',
                                                  data: new FormData(this),
                                                  contentType: false,
                                                  cache: false,
                                                  processData:false,
                                                  success: function(data){                                                        
                                                        $('.modal-body').css('opacity', '');

                                                            alert('Data Berhasil Disimpan');
                                                            $('#ModalAdd').modal('hide'); 
                                                            var hsl=data.trim();     
                                                            $("#tableso").load('so/so_load.php');
                                                             $.ajax({
                                                                url: "so/so_detail.php?idso="+hsl,
                                                                type: "GET",
                                                                  success: function (ajaxData){
                                                                    $("#ModalSoDet").html(ajaxData);
                                                                    $("#ModalSoDet").modal({backdrop: 'static', keyboard:false});
                                                                  }
                                                                }); 

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
  .modal-content {
    /*height: auto;
     width: 700px;*/
  }
  .modal-dialog {
    margin-bottom: 0px;
    border: 3px;
  }
</style>