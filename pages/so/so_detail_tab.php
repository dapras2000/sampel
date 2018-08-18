		      <?php
            include_once '../../lib/config.php';
            include_once '../../lib/fungsi.php';
      ?>

        <table id="estimasixx2" class="table table-condensed table-bordered table-striped table-hover">
                <thead class="thead-light">
                <tr>
                          <th>Item</th>
                          <th>Gros</th>
                          <th>Disc</th>
                          <th>Netto</th>                          
                </tr>
                </thead>
                <tbody>  
                <?php 
                  $idso= $_GET['idso'];
                  $sqlest= "SELECT * FROM t_penjualan WHERE id_penjualan = '$idso'";
                  $hest= mysql_fetch_array(mysql_query($sqlest));
                ?>              
                        <tr>
                          <td>Barang</td>
                          <td><?php echo rupiah2($hest['total_gross_jual_barang']);?></td>
                          <td><?php echo rupiah2($hest['total_diskon_jual_barang']);?></td>
                          <td><?php echo rupiah2($hest['total_netto_jual_barang']);?></td>
                        </tr>
                </tfoot>
              </table>
              <script>
            $('#estimasixx').DataTable();
        </script>