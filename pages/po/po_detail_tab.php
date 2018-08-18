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
                  $idpo= $_GET['idpo'];
                  $sqlpo= "SELECT * FROM t_pembelian WHERE id_pembelian = '$idpo'";
                  $hest= mysql_fetch_array(mysql_query($sqlpo));
                ?>              
                        <tr>
                          <td>Barang</td>
                          <td><?php echo rupiah2($hest['total_gross_beli_barang']);?></td>
                          <td><?php echo rupiah2($hest['total_diskon_beli_barang']);?></td>
                          <td><?php echo rupiah2($hest['total_netto_beli_barang']);?></td>
                        </tr>
                </tfoot>
              </table>
              <script>
            $('#estimasixx').DataTable();
        </script>