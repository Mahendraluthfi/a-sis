<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
	<?php echo form_open('mutasi/simpan'); ?>
	<table class="table table-bordered table-hover" id="example5">
		<thead>
			<tr class="active">
				<th width="1%"><input type="checkbox" id="call"></th>
				<th>Rombel</th>
				<th>NIS</th>
				<th>Nama</th>
				<th>Jekel</th>
				<th>TTL</th>
				<th>Alamat</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($siswa as $key) { 
				$idr = $key->id_rombel; 
			?>
			<tr>
				<td><input type="checkbox" class="cb" name="cb[<?php echo $key->id_daftar ?>]"></td>
				<td><?php echo $key->nama_rombel ?></td>
				<td><?php echo $key->nis ?></td>
				<td><?php echo $key->nama ?></td>
				<td><?php echo $key->jekel ?></td>
				<td><?php echo $key->tempat_lahir." / ".$key->tgl_lahir ?></td>
				<td><?php echo $key->alamat_tinggal ?></td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
</div>
<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
	<legend>Mutasi Siswa</legend>	
		<div class="form-group">
			<label class="control-label col-md-2">Jenis</label>
			<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
				<select name="jenis" class="form-control" id="jenis" required="">
					<option value="" selected="">Pilih</option>
					<option value="1">Naik Kelas</option>
					<option value="2">Pindah Kelas</option>
					<option value="3">Pindah Sekolah</option>
					<option value="4">Lulus</option>
				</select>
			</div>
		</div>
		<div>
			&nbsp;
		</div>
		<div class="form-group" style="display: none;" id="choice">
			<label class="control-label col-md-2">Kelas</label>
			<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
				<select name="idr" class="form-control" style="width: 100%">
					<?php foreach ($rombel2 as $data2) { ?>
                    <option value="<?php echo $data2->id_rombel ?>"><?php echo $data2->nama_rombel." / ".$data2->nama_kelas ?></option>
                    <?php } ?>
				</select>
			</div>
		</div>
		<div class="form-group" style="display: none;" id="lulus">
			<label class="control-label col-md-2">Tgl Lulus</label>
			<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
				<input type="text" name="lulus" class="form-control" id="datepicker" placeholder="Tanggal Lulus">
				<input type="hidden" name="id_rombel" value="<?php echo $idr; ?>">
			</div>
		</div>
		<div class="form-group" style="display: none;" id="pindah">
			<label class="control-label col-md-2">Nama Sekolah</label>
			<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
				<input type="text" name="nmsekolah" class="form-control" placeholder="Nama Sekolah">
			</div>
		</div>
		<div>
			&nbsp;
		</div>
		<div class="form-group">
			<div class="col-sm-10 col-sm-offset-2">
				<button type="submit" class="btn btn-primary">Simpan</button>
			</div>
		</div>
	<?php echo form_close(); ?>
</div>
