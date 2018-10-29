<section class="content-header">
  <h1>
    Laporan Pembayaran
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo base_url('dashboard') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active">Laporan Pembayaran</li>
  </ol>
</section>

<section class="content">
    <div class="row">
      <div class="col-xs-12">
          <div class="box">              
            <!-- /.box-header -->
              <div class="box-body">
              	<div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab">Pembayaran</a></li>
              <li><a href="#tab_2" data-toggle="tab">Tabungan</a></li>              
              <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
              	<div class="row">
              		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
              			<form action="<?php echo base_url('lapbayar/create_session') ?>" method="POST" class="form-horizontal" role="form">
          					<div class="form-group">
          						<label class="control-label col-md-4">Tanggal</label>
          						<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
          							<input type="text" name="tgla" class="form-control" id="datepicker" placeholder="Tanggal Awal">
          						</div>
          					</div>
          					<div class="form-group">
          						<label class="control-label col-md-4">s/d Tanggal</label>
          						<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
          							<input type="text" name="tglb" class="form-control" id="datepicker1" placeholder="Tanggal Akhir">
          							<input type="hidden" name="tipe" value="1">
          						</div>
          					</div>
          					<div class="form-group">
          						<label class="control-label col-md-4">Rombel</label>
          						<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
          							<select name="idk" class="form-control">          								
          							<?php foreach ($rombel as $key) { ?>
          								<option value="<?php echo $key->id_rombel ?>"><?php echo $key->nama_rombel ?></option>
          							<?php } ?>
          							</select>
          						</div>
          					</div>
                    <div class="form-group">
                      <label class="control-label col-md-4">Jenis Pembayaran</label>
                      <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                        <select name="jenis" class="form-control">                          
                          <option value="0">Semua Jenis Pembayaran</option>
                        <?php foreach ($get as $data) { ?>
                          <option value="<?php echo $data->id ?>"><?php echo $data->nama_jenis ?></option>
                        <?php } ?>
                        </select>
                      </div>
                    </div>
          					<div class="form-group">
          						<div class="col-sm-8 col-sm-offset-4">
          							<button type="submit" class="btn btn-primary">Tampilkan</button>
          						</div>
          					</div>
              			</form>
              		</div>
              	</div>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2">
              	<div class="row">
              		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">              		
              			<form action="<?php echo base_url('lapbayar/create_session') ?>" method="POST" class="form-horizontal" role="form">
          					<div class="form-group">
          						<label class="control-label col-md-4">Tanggal</label>
          						<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
          							<input type="text" name="tgla" class="form-control" id="datepicker2" placeholder="Tanggal Awal">
          						</div>
          					</div>
          					<div class="form-group">
          						<label class="control-label col-md-4">s/d Tanggal</label>
          						<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
          							<input type="text" name="tglb" class="form-control" id="datepicker3" placeholder="Tanggal Akhir">          							
          						</div>
          					</div>
          					<div class="form-group">
          						<label class="control-label col-md-4">Rombel</label>
          						<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
          							<select name="idk" class="form-control" style="width: 100%">          						
          							<?php foreach ($rombel as $key) { ?>
          								<option value="<?php echo $key->id_rombel ?>"><?php echo $key->nama_rombel ?></option>
          							<?php } ?>
          							</select>
          						</div>
          					</div>
          					<div class="form-group">
          						<label class="control-label col-md-4">Jenis</label>
          						<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
          							<select name="tipe" class="form-control" style="width: 100%">          						
          								<option value="2">Transaksi</option>          						
          								<option value="3">Saldo Akhir</option>          						
          							</select>
          						</div>
          					</div>
          					<div class="form-group">
          						<div class="col-sm-8 col-sm-offset-4">
          							<button type="submit" class="btn btn-primary">Tampilkan</button>
          						</div>
          					</div>
              			</form>
              			
              		</div>
              	</div>
              </div>                                       
              </div>   

              <!-- /.tab-pane -->                               
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
              </div>
            </div>
        </div>
    </div>
    <!-- /.box -->
</section>