<section class="content-header">
  <h1>
    Dashboard
    <small>Halaman Utama</small>
  </h1>
  <ol class="breadcrumb">
    <li class="active"><i class="fa fa-dashboard"></i> Dashboard</li>    
  </ol>
</section>

    <!-- Main content -->
<section class="content">
  <!-- MENU ALL -->
      <!-- MENU ALL -->
  <!-- ROW 2 -->
  <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $jsiswa; ?></h3>

              <p>Jumlah Siswa</p>
            </div>
            <div class="icon">
              <i class="fa fa-user"></i>
            </div>
            <a href="<?php echo base_url('siswa') ?>" class="small-box-footer">
              Detail <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo $jcsiswa; ?></h3>

              <p>Jumlah Calon Siswa Baru</p>
            </div>
            <div class="icon">
              <i class="fa fa-user-plus"></i>
            </div>
            <a href="<?php echo base_url('daftar') ?>" class="small-box-footer">
              Detail <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo $peminjaman; ?></h3>

              <p>Jumlah Peminjaman hari ini</p>
            </div>
            <div class="icon">
              <i class="fa fa-book"></i>
            </div>
            <a href="<?php echo base_url('peminjaman') ?>" class="small-box-footer">
              Detail <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo $anggota ?></h3>

              <p>Jumlah Anggota</p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <a href="<?php echo base_url('anggota') ?>" class="small-box-footer">
              Detail <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
      </div>
  <!-- ROW 2 -->
    <div class="row">
      <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
          <div id="chart_div">            
          </div>
      </div>  
      <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-calendar-check-o"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Tahun Ajaran Aktif</span>
              <?php foreach ($ta as $key) { ?>
                <span class="info-box-number"><?php echo $key->nama_angkatan ?></span>
              <?php } ?>
            </div>
            <!-- /.info-box-content -->
          </div>
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-file-text-o"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Rencana Anggaran Aktif</span>
              <?php foreach ($anggaran as $key1) { ?>
                <span class="info-box-number"><?php echo $key1->nm_anggaran ?></span>
              <?php } ?>
            </div>
            <!-- /.info-box-content -->
          </div>
      </div>  
    </div>
    <div class="row">
      <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
        
      </div>
      <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
        
      </div>
      <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-briefcase"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Total Tabungan Hari ini</span>
              
            </div>
            <!-- /.info-box-content -->
          </div>
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-money"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Total pembayaran Hari ini</span>

            </div>
            <!-- /.info-box-content -->
          </div>
      </div>
    </div>
</section>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          <?php foreach ($chart as $datachart) { ?>
          ['Month', 'Jumlah Peminjaman Buku'],
          ['Jan',  <?php echo $datachart->januari; ?>],
          ['Feb',  <?php echo $datachart->februari; ?>],
          ['Mar',  <?php echo $datachart->maret; ?>],
          ['Apr',  <?php echo $datachart->april; ?>],
          ['Mei',  <?php echo $datachart->mei; ?>],
          ['Jun',  <?php echo $datachart->juni; ?>],
          ['Jul',  <?php echo $datachart->juli; ?>],
          ['Aug',  <?php echo $datachart->agustus; ?>],
          ['Sep',  <?php echo $datachart->september; ?>],
          ['Oct',  <?php echo $datachart->oktober; ?>],
          ['Nov',  <?php echo $datachart->november; ?>],
          ['Dec',  <?php echo $datachart->desember; ?>]
        ]);
          <?php } ?>
        var options = {
          title: <?php echo "'Statistik Peminjaman Buku $year'"; ?>,
          hAxis: {title: 'Bulan',  titleTextStyle: {color: '#333'}},
          vAxis: {minValue: 0}
        };

        var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>