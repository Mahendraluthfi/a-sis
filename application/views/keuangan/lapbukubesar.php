<section class="content-header">
  <h1>
  Laporan Buku Besar
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo base_url('dashboard') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>    
    <li class="active">Laporan Buku Besar</li>
  </ol>
</section>

<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
        	<h3 class="box-title">Akun</h3>
        	<div class="pull-right">
        		<a href="<?php echo base_url('lapbukubesar') ?>"><span class="glyphicon glyphicon-refresh"></span></a>
        	</div>
        </div>
      <!-- /.box-header -->
        <div class="box-body">
        	<form action="" method="POST" class="form-inline" role="form">        	
        		<div class="form-group">
        			<select name="akun" class="form-control">
        				<option value="">Pilih</option> 
        				<?php foreach ($get as $akun) { ?>
        				<option value="<?php echo $akun->id_akun ?>"><?php echo $akun->nama_akun ?></option>
        				<?php } ?>       				
        			</select>
        		</div>        	
        		<button type="submit" class="btn btn-primary">Tampilkan</button>
        	</form>
        	<br>
			<?php if (!empty($page)) {
				$this->load->view($page);
			} ?>
        	
        </div>
      </div>
    </div>
  </div>
    <!-- /.box -->    
</section>