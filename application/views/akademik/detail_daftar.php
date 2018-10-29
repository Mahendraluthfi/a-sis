<section class="content-header">
  <h1>
    Detail Data Pendaftaran
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo base_url('dashboard') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>    
    <li><a href="<?php echo base_url('daftar') ?>"><i class="fa fa-indent"></i> Pendaftaran Siswa</a></li>    
    <li class="active">Detail Data Pendaftar</li>
  </ol>
</section>

<section class="content">
  	<div class="row">
    	<div class="col-xs-12">
        	<div class="box box-primary">        	
            <!-- /.box-header -->
            	<div class="box-body">
            		<?php echo form_open('',array('class' => 'form-horizontal')); 
            		foreach ($isi as $row) {
            		?>
		            	<div class="box-body">
		                	<div class="form-group">
		                  		<label class="col-sm-2 control-label">No Reg</label>
			                  	<div class="col-sm-1">
			                		<p class="form-control-static"><?php echo $row->no_reg ?></p>    	
			                  	</div>
		                  		<label class="col-sm-2 control-label">Tahun Ajaran</label>
			                  	<div class="col-sm-1">
			                		<p class="form-control-static"><?php echo $row->kd_angkatan ?></p>                      
			                  	</div>
			                  	<label class="col-sm-1 control-label">Jenjang</label>
			                  	<div class="col-sm-1">
			                		<p class="form-control-static"><?php echo $row->kd_jenjang ?></p>    	
			                  	</div>
			                  	<label class="col-sm-2 control-label">Tanggal Daftar</label>
			                  	<div class="col-sm-2">
			                		<p class="form-control-static"><?php $tdf = strtotime($row->tgl_daftar);
			                		 echo date('d M Y', $tdf); ?></p>    	
			                  	</div>
		                	</div>
		                	<div class="form-group">
								<legend>Keterangan Calon Siswa</legend>
							</div>  
		                	<div class="form-group">
		                  		<label class="col-sm-2 control-label">Nama Lengkap</label>
			                  	<div class="col-sm-4">
			                		<p class="form-control-static"><?php echo $row->nama ?></p>    	
			                  	</div>
			                  	<label class="col-sm-2 control-label">Warga Negara</label>
			                  	<div class="col-sm-4">
			                		<p class="form-control-static"><?php echo $row->wn ?></p>    				                    	
			                  	</div>
		                	</div>
		                	<div class="form-group">
		                  		<label class="col-sm-2 control-label">Jenis Kelamin</label>
			                  	<div class="col-sm-4">
			                		<p class="form-control-static"><?php echo $row->jekel ?></p>    				         
			                  	</div>
			                  	<label class="col-sm-2 control-label">Anak Ke</label>
			                  	<div class="col-sm-1">
			                		<p class="form-control-static"><?php echo $row->anak_ke ?></p>    	
			                  	</div>
		                	</div>	
		                	<div class="form-group">
		                  		<label class="col-sm-2 control-label">Tempat Lahir</label>
			                  	<div class="col-sm-4">
			                		<p class="form-control-static"><?php echo $row->tempat_lahir ?></p>    	
			                  	</div>
			                  	<label class="col-sm-2 control-label">Sdr Kandung</label>
			                  	<div class="col-sm-1">
			                		<p class="form-control-static"><?php echo $row->sdr_kandung ?></p>    	
			                  	</div>
		                	</div>
		                	<div class="form-group">
		                  		<label class="col-sm-2 control-label">Tanggal Lahir</label>
			                  	<div class="col-sm-4">
			                		<p class="form-control-static"><?php echo $row->tgl_lahir ?></p>    	
			                  	</div>
			                  	<label class="col-sm-2 control-label">Sdr Angkat</label>
			                  	<div class="col-sm-1">
			                		<p class="form-control-static"><?php echo $row->sdr_angkat ?></p>    	
			                  	</div>
		                	</div>	 
		                	<div class="form-group">
		                  		<label class="col-sm-2 control-label">Agama</label>
			                  	<div class="col-sm-4">
			                		<p class="form-control-static"><?php echo $row->agama ?></p>    	
			                  	</div>
		                  		
		                	</div>
		                	<div class="form-group">
		                  		<label class="col-sm-2 control-label">Alamat Tinggal</label>
			                  	<div class="col-sm-4">
			                		<p class="form-control-static"><?php echo $row->alamat_tinggal ?></p>    	
			                  	</div>
			                  	<label class="col-sm-2 control-label">Foto</label>
			                  	<div class="col-sm-4">
			                  		<?php if (!empty($row->foto)) { ?>
										<img src="<?php echo base_url('asset/foto/'.$row->foto) ?>" height="200" width="150" class="img-thumbnail">
									<?php }else{ ?>
										<img src="<?php echo base_url() ?>asset/foto/empty.png" height="200" width="150" class="img-thumbnail">
									<?php } ?>
			                  	</div>
		                	</div>  
		                	<div class="form-group">
								<legend>Keterangan Tempat Tinggal</legend>
							</div> 
							<div class="form-group">
			                  	<label class="col-sm-2 control-label">Alamat Domisili</label>
			                  	<div class="col-sm-4">
			                		<p class="form-control-static"><?php echo $row->alamat_domisili ?></p>    	
			                  	</div>	
			                  	<label class="col-sm-2 control-label">Tinggal Dengan</label>
			                  	<div class="col-sm-4">
			                		<p class="form-control-static"><?php echo $row->tinggal_dengan ?></p>    	
			                  	</div>								
							</div>
							<div class="form-group">
			                  	<label class="col-sm-2 control-label">No Telepon/HP</label>
			                  	<div class="col-sm-4">
			                		<p class="form-control-static"><?php echo $row->telepon ?></p>    	
			                  	</div>								
							</div>
							<div class="form-group">
								<legend>Keterangan Kesehatan</legend>
							</div> 
							<div class="form-group">
								<label class="col-sm-2 control-label">Gol Darah</label>
			                  	<div class="col-sm-4">
			                		<p class="form-control-static"><?php echo $row->gol_darah ?></p>    	
			                  	</div>			
			                  	<label class="col-sm-2 control-label">Berat Badan</label>
			                  	<div class="col-sm-1">
			                		<p class="form-control-static"><?php echo $row->berat ?> kg</p>    	
			                  	</div>
							</div>  
							<div class="form-group">
							   	<label class="col-sm-2 control-label">Penyakit yg pernah diderita</label>
	   		                	<div class="col-md-4">
			                		<p class="form-control-static"><?php echo $row->penyakit ?></p>    	
    		                	</div>	                	
			                  	<label class="col-sm-2 control-label">Tinggi Badan</label>
			                  	<div class="col-sm-1">
			                		<p class="form-control-static"><?php echo $row->tinggi ?> cm</p>    	
			                  	</div>
	   		                </div>  
	   		                <div class="form-group">
								<legend>Keterangan Orang Tua</legend>
							</div>  
							<div class="form-group">
								<label class="col-sm-2 control-label">Nama Ayah</label>
			                  	<div class="col-sm-4">
			                		<p class="form-control-static"><?php echo $row->ayah ?></p>    	
			                  	</div>			
			                  	<label class="col-sm-2 control-label">Alamat Orang Tua</label>
			                  	<div class="col-sm-4">
			                		<p class="form-control-static"><?php echo $row->alamat_orangtua ?></p>    	
			                  	</div>
							</div>  
							<div class="form-group">
							   	<label class="col-sm-2 control-label">Nama Ibu</label>
	   		                	<div class="col-md-4">
			                		<p class="form-control-static"><?php echo $row->ibu ?></p>    	
    		                	</div>	                	
			                  	<label class="col-sm-2 control-label">Alamat Wali</label>
			                  	<div class="col-sm-4">
			                		<p class="form-control-static"><?php echo $row->alamat_wali ?></p>    	
			                  	</div>
	   		                </div>  
	   		                <div class="form-group">
							   	<label class="col-sm-2 control-label">Nama Wali</label>
	   		                	<div class="col-md-4">
			                		<p class="form-control-static"><?php echo $row->wali ?></p>    	
    		                	</div>	                	
			                  	<label class="col-sm-2 control-label">Pendapatan</label>
			                  	<div class="col-sm-4">
			                		<p class="form-control-static"><?php echo $row->pendapatan ?></p>    	
			                  	</div>
	   		                </div>
		              </div>
		              <?php } ?>
		              <div class="box-footer">
		                <a href="<?php echo base_url('daftar') ?>" class="btn btn-info">Kembali</a>
		              </div>
		              <!-- /.box-footer -->
		            <?php echo form_close(); ?>
            	</div>                        	
            </div>
        </div>
    </div>
    <!-- /.box -->
</section>