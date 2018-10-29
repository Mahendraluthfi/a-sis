<section class="content-header">
  <h1>
    Pembayaran
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo base_url('dashboard') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active">Pembayaran</li>
  </ol>
</section>

<section class="content">
  	<div class="row">
    	<div class="col-xs-12">
        	<div class="box">
            	<div class="box-header">
                  <h3 class="box-title">History Pembayaran</h3>            		
            		<div class="pull-right">
            			<a href="<?php echo base_url('bayar/add') ?>" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Tambah</a>
            			<a href="<?php echo base_url('bayar/cari') ?>" class="btn btn-success"><span class="glyphicon glyphicon-search"></span> Cari</a>
            		</div>
            	</div>            
            	<div class="box-body">
            		<table class="table table-striped table-hover" id="example">
            			<thead>
            				<th>Tanggal</th>
            				<th>IDTransaksi</th>
            				<th>Nama/Rombel</th>
            				<th>Jenis_Bayar</th>
            				<th>Keterangan</th>
            				<th>Nominal</th>
            				<th>User</th>            				
            			</thead>
            			<?php foreach ($get as $key) { ?>
            			<tbody>
            				<tr style="font-style: italic;">
            					<td><?php echo $key->tgl ?></td>
            					<td><?php echo $key->id_transaksi ?></td>
            					<td><?php echo $key->nama.'/'.$key->nama_rombel ?></td>
            					<td><?php echo $key->jenis ?></td>
            					<td><?php echo $key->keterangan ?></td>
            					<td><?php echo number_format($key->nominal) ?></td>
            					<td><?php echo $key->user ?></td>
            				</tr>
            			</tbody>
            			<?php } ?>
            		</table>
            	</div>
            </div>
        </div>
    </div>
    <!-- /.box -->
</section>