<section class="content-header">
  <h1>
    Cetak Data Tagihan
    <small><button type="button" class="btn btn-default" onclick="cetak()"><span class="glyphicon glyphicon-print"></span> Cetak</button></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo base_url('dashboard') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="<?php echo base_url('inputbayar') ?>">Input Pembayaran</a></li>
    <li><a href="<?php echo base_url('inputbayar/view') ?>">Tagihan</a></li>
    <li><a href="<?php echo base_url('inputbayar/view/'.$this->uri->segment(3)) ?>">Data Tagihan</a></li>
    <li class="active">Cetak Data Tagihan</li>    
  </ol>
</section>
<style>
	hr {
  -moz-border-bottom-colors: none;
  -moz-border-image: none;
  -moz-border-left-colors: none;
  -moz-border-right-colors: none;
  -moz-border-top-colors: none;
  border-color: #EEEEEE -moz-use-text-color #FFFFFF;
  border-style: solid none;
  border-width: 1px 0;
  margin: 18px 0;
}
</style>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <!-- <div class="box-header"></div>             -->
                <div class="box-body">
                	<?php foreach ($info as $datainfo) { ?>
                	<div class="row">
                		<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                			<img src="<?php echo base_url('asset/logo/'.$datainfo->logo) ?>" width="100">	
                		</div>
                		<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
                			<h4><?php echo $datainfo->nama_sekolah ?></h4>
                			<?php echo $datainfo->alamat ?> <br>
                			<?php echo $datainfo->notelp ?> <br>
                			<?php echo $datainfo->email ?> <br>
            			</div>	
                	</div><hr>
                	<?php } ?>
                	<div class="row">
                		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                			<table>
                				<tr>
                					<td>Nomor</td>
                					<td>: &nbsp;&nbsp;</td>
                					<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/<?php echo date('m') ?>/<?php echo date('Y') ?></td>
                				</tr>
                				<tr>
                					<td>Lampiran &nbsp;</td>
                					<td>:</td>
                					<td>-</td>
                				</tr>
                				<tr>
                					<td>Hal</td>
                					<td>:</td>
                					<td><b>Kewajiban</b></td>
                				</tr>
                			</table><p></p>
                			<?php foreach ($siswa as $dsiswa) { ?>
                			Kepada <br>
                			Bapak Ibu Orang Tua / Wali Siswa <br>
                			Atas Nama : <?php echo $dsiswa->nama ?><br>
                			di Tempat <p></p>
                			Dengan Hormat,<br>
                			Diberitahukan kepada orang tua/ wali siswa <?php echo $dsiswa->nama."(".$dsiswa->nama_rombel.")" ?> bahwa masih ada kewajiban keuangan yang harus segera diselesaikan.<br>
                			Adapun kewajibannya sebagai berikut:<p></p>                			
                			<?php } ?>
                		</div>
                	</div>
                	<div class="row">
                		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                			<table class="table table-condensed">
                			<thead>
                                <tr>
                                    <th width="1%">No</th>
                                    <th>Nama Tagihan</th>
                                    <th>Nominal</th>                            
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no =1 ; $total = 0; foreach ($showtagihan as $key) { 
                                	$total = $total + $key->tagihan;	
                                ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $key->nm_tagihan ?></td>
                                    <td><?php echo number_format($key->tagihan) ?></td>                                    
                                </tr>
                                <?php } ?>
                            </tbody>
                			</table>
                			<h4><b>Total : <?php echo "Rp. ".number_format($total); ?></b></h4>
                		</div>
                	</div>
                </div>                               
            </div>
        </div>
    </div>
</section>
<script>
	function cetak() {
		window.print();
	}
</script>