<section class="content-header">
  <h1>
  Laporan Jurnal
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo base_url('dashboard') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>    
    <li class="active">Laporan Jurnal</li>
  </ol>
</section>

<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <?php foreach ($get_rencana as $key) { ?>
            <h3 class="box-title">Periode <?php echo date('d M Y', strtotime($key->awal_periode))." / ".date('d M Y', strtotime($key->akhir_periode)) ?></h3>            
          <?php } ?>     	
        </div>
      <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
              <form action="" method="POST" class="form-inline" role="form">              				
                <div class="form-group">
                  <input type="text" name="search" class="form-control" id="bulan" placeholder="Bulan" required="">
                </div>
                <button type="submit" class="btn btn-primary">Tampilkan</button>
              </form>
            </div>
          </div>
          <h3>Jurnal Keuangan Bulan <?php echo $month ?> Tahun <?php echo $year ?></h3>
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
              <table class="table table-bordered table-hover">
                <thead>
                  <tr class="active">
                    <th>Tanggal</th>
                    <th>Keterangan</th>
                    <th>Debet</th>
                    <th>Kredit</th>
                  </tr>
                </thead>
                <tbody>
                 <?php foreach ($jurnal as $datajurnal) { ?>
                  <tr>
                    <td rowspan="3"><?php echo $datajurnal->waktu ?></td>
                    <td colspan="3" style="font-size: 16px;"><b><i><u><?php echo $datajurnal->uraian ?></u></i></b></td>                    
                  </tr>
                  <?php                   
                  foreach ($datajurnal->detail as $data){  ?>
                  <tr>                                        
                    <td><?php echo $data->nama_akun; ?></td>
                    <td><?php echo number_format($data->debet); ?></td>
                    <td><?php echo number_format($data->kredit); ?></td>
                  </tr>                  
                  <?php } ?>
                <?php } ?>
                </tbody>
              </table>
              <div>
                <?php echo $halaman; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
    <!-- /.box -->    
</section>