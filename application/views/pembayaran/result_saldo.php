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
                      <h4>Rekap Laporan Saldo Tabungan Siswa</h4>
                      <?php foreach ($rombel as $key) { ?>
                      <h4><?php echo $key->nama_rombel ?></h4>
                      <?php } ?>                      
                    </div>    	
                    <div class="row">
                      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 ">
                        <table class="table table-bordered" style="font-size: 12px;">
                          <thead>
                            <tr class="active">
                              <th width="1%">No</th>                                                
                              <th>NIS</th>
                              <th>Nama Siswa</th>                              
                              <th class="text-right">Saldo Akhir</th>                              
                            </tr>
                          </thead>
                          <tbody>
                            <?php $no=1;
                             foreach ($get as $data) {?>
                            <tr>
                              <td><?php echo $no++ ?></td>
                              <td><?php echo $data->nis ?></td>                              
                              <td><?php echo $data->nama ?></td>                                                            
                              <td class="text-right"><?php echo number_format($data->saldo_tabungan) ?></td>                              
                            </tr>
                            <?php } ?>
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