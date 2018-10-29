<section class="content-header">
  <h1>
    Form Pendaftaran
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo base_url('dashboard') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>    
    <li><a href="<?php echo base_url('daftar') ?>"><i class="fa fa-indent"></i> Pendaftaran Siswa</a></li>    
    <li class="active">Form Pendaftaran</li>
  </ol>
</section>

<section class="content">
  	<div class="row">
    	<div class="col-xs-12">
        	<div class="box box-primary">        	
            <!-- /.box-header -->
            	<div class="box-body">
            		<?php echo form_open_multipart('daftar/form_simpan',array('class' => 'form-horizontal')); ?>
		            	<div class="box-body">
		                	<div class="form-group">
		                  		<label class="col-sm-2 control-label">Tahun Ajaran</label>
			                  	<div class="col-sm-2">
			                    	<input type="text" class="form-control" value="<?php echo $aktif ?>" readonly>
			                    	<input type="hidden" class="form-control" value="<?php echo $id_aktif ?>" name="tahunajaran">
			                  	</div>
			                  	<label class="col-sm-1 control-label">Jenjang</label>
			                  	<div class="col-sm-2">
			                    	<select name="jenjang" class="form-control" required="">
			                    		<option value="" selected="">Pilih</option>			                    		
			                    		<?php foreach ($jenjang as $b) { ?>
			                    		<option value="<?php echo $b->id_jenjang ?>"><?php echo $b->kd_jenjang ?></option>		
			                    		<?php } ?>       
			                    	</select>
			                  	</div>
			                  	<label class="col-sm-2 control-label">Tanggal Daftar</label>
			                  	<div class="col-sm-2">
			                    	<input type="text" name="tgldaftar" class="form-control" id="datepicker" placeholder="Tanggal Daftar" required="">
			                  	</div>
		                	</div>
		                	<div class="form-group">
								<legend>Keterangan Calon Siswa</legend>
							</div>  
		                	<div class="form-group">
	                  			<label class="col-sm-2 control-label">NISN</label>
			                  	<div class="col-sm-4">
			                    	<input type="text" class="form-control" name="nisn" placeholder="Nomer Induk Siswa Nasional" maxlength="10">
			                  	</div>
		                  		<label class="col-sm-2 control-label">Agama</label>
			                  	<div class="col-sm-4">
			                    	<select name="agama" class="form-control">
			                    		<option value="" selected="">-Pilih-</option>
			                    		<option value="ISLAM">Islam</option>
			                    		<option value="KRISTEN">Kristen</option>
			                    		<option value="KATHOLIK">Katholik</option>
			                    		<option value="BUDHA">Budha</option>
			                    		<option value="HINDU">Hindu</option>			                    		
			                    	</select>
			                  	</div>
		                	</div>  
		                	<div class="form-group">
		                  		<label class="col-sm-2 control-label">Nama Lengkap</label>
			                  	<div class="col-sm-4">
			                    	<input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" data-validation="required">
			                  	</div>
			                  	<label class="col-sm-2 control-label">Warga Negara</label>
			                  	<div class="col-sm-4">
			                    	<input type="radio" name="cekwn" value="WNI" class="flat-red"> WNI&nbsp;&nbsp;&nbsp;
			                    	<input type="radio" name="cekwn" value="WNA" class="flat-red"> WNA
			                  	</div>
		                	</div>
		                	<div class="form-group">
		                  		<label class="col-sm-2 control-label">Jenis Kelamin</label>
			                  	<div class="col-sm-4">
			                    	<input type="radio" name="cekjekel" value="L" class="flat-red"> Laki-Laki&nbsp;&nbsp;&nbsp;
			                    	<input type="radio" name="cekjekel" value="P" class="flat-red"> Perempuan
			                  	</div>
			                  	<label class="col-sm-2 control-label">Anak Ke</label>
			                  	<div class="col-sm-1">
			                    	<input type="number" name="anakke" class="form-control" min="1" max="20" placeholder="1">
			                  	</div>
		                	</div>	
		                	<div class="form-group">
		                  		<label class="col-sm-2 control-label">Tempat Lahir</label>
			                  	<div class="col-sm-4">
			                    	<input type="text" name="tempatlahir" class="form-control" placeholder="Tempat Lahir">
			                  	</div>
			                  	<label class="col-sm-2 control-label">Sdr Kandung</label>
			                  	<div class="col-sm-1">
			                    	<input type="number" name="sdrkandung" class=" form-control" min="0" max="20" placeholder="0">
			                  	</div>
		                	</div>
		                	<div class="form-group">
		                  		<label class="col-sm-2 control-label">Tanggal Lahir</label>
			                  	<div class="col-sm-4">
			                    	<input type="text" name="tgllahir" class="form-control" placeholder="Tanggal Lahir" id="datepicker1">
			                  	</div>
			                  	<label class="col-sm-2 control-label">Sdr Angkat</label>
			                  	<div class="col-sm-1">
			                    	<input type="number" name="sdrangkat" class="form-control" min="0" max="20" placeholder="0">
			                  	</div>
		                	</div>	 
		                	<div class="form-group">
		                  		<label class="col-sm-2 control-label">Alamat Tinggal</label>
			                  	<div class="col-sm-4">
			                    	<textarea name="alamattinggal" class="form-control" placeholder="Alamat Tinggal"></textarea>
			                  	</div>
		                  		<label class="col-sm-2 control-label">Foto</label>
			                  	<div class="col-sm-4">
			                  		<input type="file" name="foto">
			                  		<p class="help-block">Upload Pas Foto Siswa</p>
			                  	</div>
		                	</div>
		                	<div class="form-group">
								<legend>Keterangan Tempat Tinggal</legend>
							</div> 
							<div class="form-group">
			                  	<label class="col-sm-2 control-label">Alamat Domisili</label>
			                  	<div class="col-sm-4">
			                    	<textarea name="alamatdomisili" class="form-control" placeholder="Alamat Domisili"></textarea>
			                  	</div>	
			                  	<label class="col-sm-2 control-label">Tinggal Dengan</label>
			                  	<div class="col-sm-4">
			                    	<input type="radio" name="cektinggal" value="Orang Tua" class="flat-red"> Orang Tua &nbsp;&nbsp;
			                    	<input type="radio" name="cektinggal" value="Saudara" class="flat-red"> Saudara <br>		
			                    	<input type="radio" name="cektinggal" value="Di Asrama" class="flat-red"> Di Asrama &nbsp;&nbsp;
			                    	<input type="radio" name="cektinggal" value="Kost" class="flat-red"> Kost 
			                  	</div>								
							</div>
							<div class="form-group">
			                  	<label class="col-sm-2 control-label">No Telepon/HP</label>
			                  	<div class="col-sm-4">
			                    	<input type="text" name="notelepon" class="form-control" placeholder="Telepon">
			                  	</div>								
							</div>
							<div class="form-group">
								<legend>Keterangan Kesehatan</legend>
							</div> 
							<div class="form-group">
								<label class="col-sm-2 control-label">Gol Darah</label>
			                  	<div class="col-sm-4">
			                    	<select name="goldarah" class="form-control">
			                    		<option value="" selected="">Pilih</option>
			                    		<option value="A">A</option>
			                    		<option value="B">B</option>
			                    		<option value="O">O</option>
			                    		<option value="AB">AB</option>
			                    		<option value="-">-</option>			                    		
			                    	</select>
			                  	</div>			
			                  	<label class="col-sm-2 control-label">Berat Badan</label>
			                  	<div class="col-sm-1">
			                    	<input type="text" name="beratbadan" class="form-control" placeholder="Kg">
			                  	</div>
							</div>  
							<div class="form-group">
							   	<label class="col-sm-2 control-label">Penyakit yg pernah diderita</label>
	   		                	<div class="col-md-4">
	   		                		 <textarea name="penyakit" class="form-control" placeholder="Penyakit yang pernah diderita"></textarea>
    		                	</div>	                	
			                  	<label class="col-sm-2 control-label">Tinggi Badan</label>
			                  	<div class="col-sm-1">
			                    	<input type="text" name="tinggibadan" class="form-control" placeholder="cm">			                  	
			                  	</div>
	   		                </div>  
	   		                <div class="form-group">
								<legend>Keterangan Orang Tua</legend>
							</div>  
							<div class="form-group">
								<label class="col-sm-2 control-label">Nama Ayah</label>
			                  	<div class="col-sm-4">
			                    	<input type="text" name="namaayah" class="form-control" placeholder="Nama Ayah">			                  	
			                  	</div>			
			                  	<label class="col-sm-2 control-label">Alamat Orang Tua</label>
			                  	<div class="col-sm-4">
			                    	<textarea name="alamatorangtua" class="form-control" placeholder="Alamat Orang Tua"></textarea>
			                  	</div>
							</div>  
							<div class="form-group">
							   	<label class="col-sm-2 control-label">Nama Ibu</label>
	   		                	<div class="col-md-4">
			                    	<input type="text" name="namaibu" class="form-control" placeholder="Nama Ibu">			
    		                	</div>	                	
			                  	<label class="col-sm-2 control-label">Alamat Wali</label>
			                  	<div class="col-sm-4">
			                    	<textarea name="alamatwali" class="form-control" placeholder="Alamat Orang Tua"></textarea>			
			                  	</div>
	   		                </div>  
	   		                <div class="form-group">
							   	<label class="col-sm-2 control-label">Nama Wali</label>
	   		                	<div class="col-md-4">
			                    	<input type="text" name="namawali" class="form-control" placeholder="Nama Wali">			
    		                	</div>	                	
			                  	<label class="col-sm-2 control-label">Pendapatan</label>
			                  	<div class="col-sm-4">
			                    	<select name="pendapatan" class="form-control">
			                    		<option value="">-Pilih-</option>
			                    		<option value="< 1.500.000">< 1.500.000</option>
			                    		<option value="1.500.000 - 3.000.000">1.500.000 - 3.000.000</option>
			                    		<option value="3.000.000 - 5.000.000">3.000.000 - 5.000.000</option>
			                    		<option value="> 5.000.000">> 5.000.000</option>
			                    	</select>
			                  	</div>
	   		                </div>
		              </div>
		              
		              <div class="box-footer">
		                <button type="submit" class="btn btn-info pull-right">Simpan</button>
		              </div>
		              <!-- /.box-footer -->
		            <?php echo form_close(); ?>
            	</div>                        	
            </div>
        </div>
    </div>
    <!-- /.box -->
</section>