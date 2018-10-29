<section class="content-header">
  <h1>
    Mutasi Siswa 
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo base_url('dashboard') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>    
    <li class="active">Mutasi Siswa</li>
  </ol>
</section>
<br>
<section class="content">
  	<div class="row">
  		<div class="col-xs-12">
        	<div class="box box-success">
            	<div class="box-header">
              		<div class="pull-left">                  
                    <?php echo form_open('mutasi/view', array('class' => 'form-inline')); ?>
                      <div class="form-group">
                        <label class="control-label" for="">Pilih Kelas&nbsp;</label>
                        <select class="form-control" name="id_rombel">
                          <?php foreach ($rombel as $data) { ?>
                          <option value="<?php echo $data->id_rombel ?>"><?php echo $data->nama_rombel." / ".$data->nama_kelas ?></option>
                          <?php } ?>
                        </select>
                      </div>
                      <button type="submit" class="btn btn-primary">Tampilkan</button>
                    <?php echo form_close(); ?>    
                  </div>
                  <div class="pull-right">
                      <div class="btn-group">
                        <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
                          Lihat Data 
                          <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-right" role="menu">
                          <li><a href="<?php echo base_url('mutasi/data/'.base64_encode('lulus')) ?>">Lulus</a></li>
                          <li><a href="<?php echo base_url('mutasi/data/'.base64_encode('pindah')) ?>">Pindah</a></li>
                        </ul>
                      </div>
                  </div>          		
            	</div>
            	<!-- /.box-header -->
            	<div class="box-body">
            		<div class="row">
            		<?php $this->load->view($page); ?>
            		</div>
            	</div>
            </div>
        </div>
  	</div>    
</section>
