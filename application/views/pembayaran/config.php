<section class="content-header">
  <h1>
    Edit Set Pembayaran
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo base_url('dashboard') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="<?php echo base_url('setbayar') ?>"> Set Pembayaran</a></li>
    <li class="active">Edit Set Pembayaran</li>
  </ol>
</section>

<section class="content">
    <div class="row">
      <div class="col-xs-12">
          <div class="box">
              <div class="box-header">
                  <h3 class="box-title">Data Set Pembayaran</h3>
                  <div class="pull-right">
                    <!-- <a href="" class="btn btn-success btn-sm" ><i class="fa fa-plus"></i> Tambah</a> -->
                    <!-- <button type="button" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Pembayaran</button> -->
                  </div>
              </div>
            <!-- /.box-nama -->
              <div class="box-body">
              	<div class="row">
              		<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8" style="height: 500px; overflow: auto;">
              			<table class="table table-condensed table-hover">
              				<thead>
              					<tr>
              						<th width="1%">No</th>
              						<th>Nama</th>
              						<th>Opsi A</th>
              						<th>Opsi B</th>
              						<th>Opsi C</th>              						
              						<th>Opsi D</th>              						
              					</tr>
              				</thead>
              				<tbody>
              					<?php 
              					echo form_open('setbayar/simpan');
              					$no = 1; 
              					foreach ($siswa as $datasiswa) { ?>
              					<tr>
              						<td><?php echo $no++; ?></td>
              						<td><?php echo $datasiswa->nama ?></td>
              						<td><input type="radio" name="opsi[<?php echo $datasiswa->id_siswa ?>]" value="<?php echo $a ?>" required></td>
              						<td><input type="radio" name="opsi[<?php echo $datasiswa->id_siswa ?>]" value="<?php echo $b ?>"></td>
              						<td><input type="radio" name="opsi[<?php echo $datasiswa->id_siswa ?>]" value="<?php echo $c ?>"></td>
              						<td><input type="radio" name="opsi[<?php echo $datasiswa->id_siswa ?>]" value="<?php echo $d ?>"></td>
              					</tr>
              					<?php } ?>
              				</tbody>
              			</table>
              		</div>
              		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
              			<?php foreach ($pilih as $datapilih) { 
                      $jenis = $datapilih->tipe_jenis;
              				$id_set = $datapilih->id;
              			?>
              			<h3><?php echo $datapilih->nama_pilihan ?></h3>
              			<table class="table table-striped">              				
              				<tbody>
              					<tr><td>Pilihan A</td><td><?php echo number_format($datapilih->opsi_a) ?></td></tr>
              					<tr><td>Pilihan B</td><td><?php echo number_format($datapilih->opsi_b) ?></td></tr>
              					<tr><td>Pilihan C</td><td><?php echo number_format($datapilih->opsi_c) ?></td></tr>              
              					<tr><td>Pilihan D</td><td><?php echo number_format($datapilih->opsi_d) ?></td></tr>              
              				</tbody>
              			</table>
              			<?php } ?>
                    <input type="hidden" name="jenis" value="<?php echo $jenis; ?>">              			
              			<input type="hidden" name="idpilihan" value="<?php echo $this->uri->segment(3); ?>">
              			<button type="submit" class="btn btn-primary" onclick="return confirm('Yakin simpan ?')">Simpan</button>
              			<?php echo form_close(); ?>
              		</div>
              	</div>
              </div>
            </div>
        </div>
    </div>
    <!-- /.box -->
</section>
