<section class="content-header">
  <h1>
    Form Edit Siswa
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo base_url('dashboard') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>    
    <li><a href="<?php echo base_url('siswa') ?>"><i class="fa fa-indent"></i> Data Siswa</a></li>    
    <li class="active">Form Edit Siswa</li>
  </ol>
</section>

<section class="content">
  	<div class="row">
    	<div class="col-xs-12">
        	<div class="box box-primary">        	            
            	<div class="box-body">
            		<?php
            		foreach ($isi as $row) {
            		echo form_open_multipart('siswa/edit_simpan/'.$row->id_daftar.'/'.$row->foto, array('class' => 'form-horizontal')); 
            		?>
		            	<div class="box-body">
		                	<div class="form-group">
		                  		<label class="col-sm-2 control-label">Tahun Ajaran</label>
			                  	<div class="col-sm-2">
			                    	<select name="tahunajaran" class="form-control" required="">
			                    		<option value="">Pilih</option>
			                    		<?php foreach ($ta as $a) { ?>
			                    		<option value="<?php echo $a->id_angkatan ?>" <?php if ($row->id_angkatan == $a->id_angkatan) {	echo "selected=''";	} ?>><?php echo $a->nama_angkatan ?></option>		
			                    		<?php } ?>          		
			                    	</select>
			                  	</div>
			                  	<label class="col-sm-1 control-label">Jenjang</label>
			                  	<div class="col-sm-2">
			                    	<select name="jenjang" class="form-control" required="" id="jenjang">
			                    		<option value="" >Pilih</option>			                    		
			                    		<?php foreach ($jenjang as $b) { ?>
			                    		<option value="<?php echo $b->id_jenjang ?>" <?php if ($row->id_jenjang == $b->id_jenjang) {	echo "selected=''";	} ?>><?php echo $b->kd_jenjang ?></option>		
			                    		<?php } ?>       
			                    	</select>
			                  	</div>
			                  	<label class="col-sm-2 control-label">Rombel</label>
			                  	<div class="col-sm-2">
			                    	<select name="rombel" class="form-control" id="rombel" required="">
			                    	<option value="" >Pilih</option>			                    		
			                    		<?php foreach ($rombel as $c) { ?>
			                    		<option value="<?php echo $c->id_rombel ?>" <?php if ($row->id_rombel == $c->id_rombel) {	echo "selected=''";	} ?>><?php echo $c->nama_rombel ?></option>		
			                    		<?php } ?>                     					                    		
			                    	</select>
			                  	</div>
		                	</div>
		                	<div class="form-group">
								<legend>Keterangan Calon Siswa</legend>
							</div>  
							<div class="form-group">
		                  		<label class="col-sm-2 control-label">NIS</label>
		                  		<div class="col-md-4">
		                  			<input type="text" class="form-control" name="nis" placeholder="Nomor Induk Siswa" required="" value="<?php echo $row->nis ?>">
		                  		</div>
		                  		<label class="col-sm-2 control-label">No Registrasi</label>
		                  		<div class="col-md-4">
		                  			<p class="form-control-static"><b><?php echo $row->no_reg ?></b></p>
		                  		</div>
		                	</div>
		                	<div class="form-group">
			                  	<label class="col-sm-2 control-label">NISN</label>
			                  	<div class="col-sm-4">
			                    	<input type="text" class="form-control" name="nisn" maxlength="10" placeholder="Nomor Induk Siswa Nasional" value="<?php echo $row->nisn ?>">
			                  	</div>
			                  	<label class="col-sm-2 control-label">Warga Negara</label>
			                  	<div class="col-sm-4">
			                    	<input type="radio" name="cekwn" value="WNI" class="flat-red" <?php if ($row->wn == "WNI") {
			                    	echo "checked=''"; } ?>> WNI&nbsp;&nbsp;&nbsp;
			                    	<input type="radio" name="cekwn" value="WNA" class="flat-red" <?php if ($row->wn == "WNA") {
			                    	echo "checked=''"; } ?>> WNA
			                  	</div>
		                	</div>
		                	<div class="form-group">
		                  		<label class="col-sm-2 control-label">Nama Lengkap</label>
			                  	<div class="col-sm-4">
			                    	<input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" required="" value="<?php echo $row->nama ?>">
			                  	</div>
			                  	<label class="col-sm-2 control-label">Anak Ke</label>
			                  	<div class="col-sm-1">
			                    	<input type="number" name="anakke" class="form-control" min="1" max="20" placeholder="1" value="<?php echo $row->anak_ke ?>">
			                  	</div>
		                	</div>	
		                	<div class="form-group">
		                  		<label class="col-sm-2 control-label">Jenis Kelamin</label>
			                  	<div class="col-sm-4">
			                    	<input type="radio" name="cekjekel" value="L" class="flat-red" <?php if ($row->jekel == "L") {
			                    	echo "checked=''"; } ?>> Laki-Laki&nbsp;&nbsp;&nbsp;
			                    	<input type="radio" name="cekjekel" value="P" class="flat-red" <?php if ($row->wn == "P") {
			                    	echo "checked=''"; } ?>> Perempuan
			                  	</div>
			                  	<label class="col-sm-2 control-label">Sdr Kandung</label>
			                  	<div class="col-sm-1">
			                    	<input type="number" name="sdrkandung" class=" form-control" min="0" max="20" placeholder="0" value="<?php echo $row->sdr_kandung ?>">
			                  	</div>
		                	</div>
		                	<div class="form-group">
		                  		<label class="col-sm-2 control-label">Tempat Lahir</label>
			                  	<div class="col-sm-4">
			                    	<input type="text" name="tempatlahir" class="form-control" placeholder="Tempat Lahir" value="<?php echo $row->tempat_lahir ?>">
			                  	</div>
			                  	<label class="col-sm-2 control-label">Sdr Angkat</label>
			                  	<div class="col-sm-1">
			                    	<input type="number" name="sdrangkat" class="form-control" min="0" max="20" placeholder="0" value="<?php echo $row->sdr_angkat ?>">
			                  	</div>
		                	</div>	 
		                	<div class="form-group">
		                  		<label class="col-sm-2 control-label">Tanggal Lahir</label>
			                  	<div class="col-sm-4">
			                    	<input type="text" name="tgllahir" class="form-control" placeholder="Tanggal Lahir" id="datepicker1" value="<?php echo $row->tgl_lahir ?>">
			                  	</div>
		                  		<label class="col-sm-2 control-label">Agama</label>
			                  	<div class="col-sm-4">
			                    	<select name="agama" class="form-control">
			                    		<option value="">-Pilih-</option>
			                    		<option value="ISLAM" <?php if ($row->agama == "ISLAM") { echo "selected=''"; } ?>>Islam</option>
			                    		<option value="KRISTEN" <?php if ($row->agama == "KRISTEN") { echo "selected=''"; } ?>>Kristen</option>
			                    		<option value="KATHOLIK" <?php if ($row->agama == "KATHOLIK") { echo "selected=''"; } ?>>Katholik</option>
			                    		<option value="BUDHA" <?php if ($row->agama == "BUDHA") { echo "selected=''"; } ?>>Budha</option>
			                    		<option value="HINDU" <?php if ($row->agama == "HINDU") { echo "selected=''"; } ?>>Hindu</option>			                    		
			                    	</select>
			                  	</div>

		                	</div>
		                	<div class="form-group">
		                  		<label class="col-sm-2 control-label">Alamat Tinggal</label>
			                  	<div class="col-sm-4">
			                    	<textarea name="alamattinggal" class="form-control" placeholder="Alamat Tinggal"><?php echo $row->alamat_tinggal ?></textarea>
			                  	</div>
			                  	<label class="col-sm-2 control-label">Foto</label>
			                  	<div class="col-sm-4">
			                  		<?php if (!empty($row->foto)) { ?>
										<img src="<?php echo base_url('asset/foto/'.$row->foto) ?>" height="200" width="150" class="img-thumbnail">
									<?php }else{ ?>
										<img src="<?php echo base_url() ?>asset/foto/empty.png" height="200" width="150" class="img-thumbnail">
									<?php } ?>
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
			                    	<textarea name="alamatdomisili" class="form-control" placeholder="Alamat Domisili"><?php echo $row->alamat_domisili ?></textarea>
			                  	</div>	
			                  	<label class="col-sm-2 control-label">Tinggal Dengan</label>
			                  	<div class="col-sm-4">
			                    	<input type="radio" name="cektinggal" value="Orang Tua" class="flat-red" <?php if ($row->tinggal_dengan == "Orang Tua") { echo "checked=''"; } ?>> Orang Tua &nbsp;&nbsp;
			                    	<input type="radio" name="cektinggal" value="Saudara" class="flat-red" <?php if ($row->tinggal_dengan == "Saudara") {echo "checked=''"; } ?>> Saudara <br>		
			                    	<input type="radio" name="cektinggal" value="Di Asrama" class="flat-red" <?php if ($row->tinggal_dengan == "Di Asrama") {echo "checked=''"; } ?>> Di Asrama &nbsp;&nbsp;
			                    	<input type="radio" name="cektinggal" value="Kost" class="flat-red" <?php if ($row->tinggal_dengan == "Kost") { echo "checked=''"; } ?>> Kost 
			                  	</div>								
							</div>
							<div class="form-group">
			                  	<label class="col-sm-2 control-label">No Telepon/HP</label>
			                  	<div class="col-sm-4">
			                    	<input type="text" name="notelepon" class="form-control" placeholder="Telepon" value="<?php echo $row->telepon ?>">
			                  	</div>								
							</div>
							<div class="form-group">
								<legend>Keterangan Kesehatan</legend>
							</div> 
							<div class="form-group">
								<label class="col-sm-2 control-label">Gol Darah</label>
			                  	<div class="col-sm-4">
			                    	<select name="goldarah" class="form-control">
			                    		<option value="">Pilih</option>
			                    		<option value="A" <?php if ($row->gol_darah == "A") { echo "selected=''"; } ?>>A</option>
			                    		<option value="B" <?php if ($row->gol_darah == "B") { echo "selected=''"; } ?>>B</option>
			                    		<option value="O" <?php if ($row->gol_darah == "O") { echo "selected=''"; } ?>>O</option>
			                    		<option value="AB" <?php if ($row->gol_darah == "AB") { echo "selected=''"; } ?>>AB</option>
			                    		<option value="-" <?php if ($row->gol_darah == "-") { echo "selected=''"; } ?>>-</option>			                    		
			                    	</select>
			                  	</div>			
			                  	<label class="col-sm-2 control-label">Berat Badan</label>
			                  	<div class="col-sm-1">
			                    	<input type="text" name="beratbadan" class="form-control" placeholder="Kg" value="<?php echo $row->berat ?>">
			                  	</div>
			                  	kg
							</div>  
							<div class="form-group">
							   	<label class="col-sm-2 control-label">Penyakit yg pernah diderita</label>
	   		                	<div class="col-md-4">
	   		                		 <textarea name="penyakit" class="form-control" placeholder="Penyakit yang pernah diderita"><?php echo $row->penyakit ?></textarea>
    		                	</div>	                	
			                  	<label class="col-sm-2 control-label">Tinggi Badan</label>
			                  	<div class="col-sm-1">
			                    	<input type="text" name="tinggibadan" class="form-control" placeholder="cm" value="<?php echo $row->tinggi ?>">		
			                  	</div>
			                    cm	                  	
	   		                </div>  
	   		                <div class="form-group">
								<legend>Keterangan Orang Tua</legend>
							</div>  
							<div class="form-group">
								<label class="col-sm-2 control-label">Nama Ayah</label>
			                  	<div class="col-sm-4">
			                    	<input type="text" name="namaayah" class="form-control" placeholder="Nama Ayah" value="<?php echo $row->ayah ?>">
			                  	</div>			
			                  	<label class="col-sm-2 control-label">Alamat Orang Tua</label>
			                  	<div class="col-sm-4">
			                    	<textarea name="alamatorangtua" class="form-control" placeholder="Alamat Orang Tua"><?php echo $row->alamat_orangtua ?></textarea>
			                  	</div>
							</div>  
							<div class="form-group">
							   	<label class="col-sm-2 control-label">Nama Ibu</label>
	   		                	<div class="col-md-4">
			                    	<input type="text" name="namaibu" class="form-control" placeholder="Nama Ibu" value="<?php echo $row->ibu ?>">			
    		                	</div>	                	
			                  	<label class="col-sm-2 control-label">Alamat Wali</label>
			                  	<div class="col-sm-4">
			                    	<textarea name="alamatwali" class="form-control" placeholder="Alamat Wali"><?php echo $row->alamat_wali ?></textarea>			
			                  	</div>
	   		                </div>  
	   		                <div class="form-group">
							   	<label class="col-sm-2 control-label">Nama Wali</label>
	   		                	<div class="col-md-4">
			                    	<input type="text" name="namawali" class="form-control" placeholder="Nama Wali" value="<?php echo $row->wali ?>">			
    		                	</div>	                	
			                  	<label class="col-sm-2 control-label">Pendapatan</label>
			                  	<div class="col-sm-4">
			                    	<select name="pendapatan" class="form-control">
			                    		<option value="">-Pilih-</option>
			                    		<option value="< 1.500.000" <?php if ($row->pendapatan == "< 1.500.000") { echo "selected=''"; } ?>>< 1.500.000</option>
			                    		<option value="1.500.000 - 3.000.000" <?php if ($row->pendapatan == "1.500.000 - 3.000.000") { echo "selected=''"; } ?>>1.500.000 - 3.000.000</option>
			                    		<option value="3.000.000 - 5.000.000" <?php if ($row->pendapatan == "3.000.000 - 5.000.000") { echo "selected=''"; } ?>>3.000.000 - 5.000.000</option>
			                    		<option value="> 5.000.000" <?php if ($row->pendapatan == "> 5.000.000") { echo "selected=''"; } ?>>> 5.000.000</option>
			                    	</select>
			                  	</div>
	   		                </div>
		              </div>
		              <?php } ?>
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
<script>	
		$(document).ready(function(){
			$('#jenjang').change(function(){
				var id=$(this).val();
				$.ajax({
					url : "<?php echo base_url();?>siswa/get_rombel",
					method : "POST",
					data : {id: id},
					async : false,
			        dataType : 'json',
					success: function(data){
						var html = '';
			            var i;
			            for(i=0; i<data.length; i++){
			                html += "<option value='"+data[i].id_rombel+"'>"+data[i].nama_rombel+"</option>";
			            }
			            $('#rombel').html(html);
						
					}
				});
			});
		});
</script>