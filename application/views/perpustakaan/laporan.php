<section class="content-header">
  <h1>
    Laporan Perpustakaan
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo base_url('dashboard') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>    
    <li class="active">Laporan Perpustakaan</li>
  </ol><br>
  <?php echo form_open('laperpus/cari',array('class' => 'form-inline')); ?>             
    <div class="form-group">
       <input type="text" name="bulan" class="form-control" id="bulan" placeholder="Periode">                   
    </div>
    <div class="form-group">
      <select name="jenis" class="form-control">                
        <option value="1">Laporan Peminjaman</option>
        <option value="2">Laporan Pengembalian</option>               
      </select>
    </div>
    <button type="submit" class="btn btn-primary">Tampilkan</button>
    <button type="button" class="btn btn-default pull-right" onclick="window.print()"><span class="glyphicon glyphicon-print"></span> Print</button>
  <?php echo form_close(); ?>                  
</section>

<section class="content">
  	<div class="row">
      <div class="col-xs-12">
          <div class="box">
            	<div class="box-body">
            		<?php $this->load->view($page); ?>
            	</div>
            </div>
        </div>
    </div>
    <!-- /.box -->
</section>