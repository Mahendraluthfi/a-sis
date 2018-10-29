<section class="content-header">
  <h1>
    Laporan Pembayaran
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo base_url('dashboard') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="<?php echo base_url('lapbayar') ?>">Laporan Pembayaran</a></li>
    <li><a href="" onclick="cetak()">Cetak</a></li>
  </ol>
</section>

<section class="content">
    <div class="row">
      <div class="col-xs-12">
          <div class="box">              
            <!-- /.box-header -->
              <div class="box-body">
                    <div class="text-center">
                      <h4>Rekap Laporan Transaksi Tabungan</h4>
                      <?php foreach ($rombel as $key) { ?>
                      <h4><?php echo $key->nama_rombel ?></h4>
                      <?php } ?>
                      <h4><?php echo "Periode ".$ta." s/d ".$tb ?></h4>
                    </div>    	
                    <div class="row">
                      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
                        <table class="table table-bordered" style="font-size: 12px;">
                          <thead>
                            <tr class="active">
                              <th width="1%">No</th>
                              <th>Date</th>
                              <th>ID_TF</th>                              
                              <th>Nama Siswa</th>
                              <th>debit</th>
                              <th>kredit</th>
                              <th>current_saldo</th>
                              <th>keterangan</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $no=1; $td = 0; $tk= 0;
                             foreach ($get as $data) {
                              $td = $data->debit + $td;
                              $tk = $data->kredit + $tk;
                              ?>
                            <tr>
                              <td><?php echo $no++ ?></td>
                              <td><?php echo $data->date ?></td>
                              <td><?php echo $data->id_tf ?></td>
                              <td><?php echo $data->nama ?></td>                              
                              <td class="text-right"><?php echo number_format($data->debit) ?></td>
                              <td class="text-right"><?php echo number_format($data->kredit) ?></td>
                              <td class="text-right"><?php echo number_format($data->saldo_r) ?></td>
                              <td><?php echo $data->ket ?></td>
                            </tr>
                            <?php } ?>
                            <tr class="active">
                              <td colspan="4"><b>Total</b></td>
                              <td class="text-right"><b><?php echo number_format($td); ?></b></td>
                              <td class="text-right"><b><?php echo number_format($tk); ?></b></td>
                              <td></td>
                              <td></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
              </div>
              </div>
            </div>
        </div>
    </div>
    <!-- /.box -->
</section>

<script>
  function cetak() {
    window.print();
  }
</script>