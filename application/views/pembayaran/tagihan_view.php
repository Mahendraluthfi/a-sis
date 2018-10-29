<section class="content-header">
  <h1>
    Pencarian Data Tagihan
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo base_url('dashboard') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="<?php echo base_url('inputbayar') ?>">Input Pembayaran</a></li>
    <li><a href="<?php echo base_url('inputbayar/view') ?>">Tagihan</a></li>
    <li class="active">Data Tagihan</li>    
  </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <!-- <div class="box-header"></div>             -->
                <div class="box-body">
                	<div class="row">
                		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                			<legend>Data Tagihan</legend>
                			<table class="table table-bordered" id="example">
                				<thead>
                					<tr class="active">
                						<th width="1%">No</th>
                						<th>Nama Tagihan</th>                						
                						<th width="1%">Aksi</th>
                					</tr>
                				</thead>
                				<tbody>
                                    <?php $no = 1; 
                                    foreach ($tagihan1 as $data1) { ?>
                					<tr>
                						<td><?php echo $no++; ?></td>
                						<td><?php echo $data1->nama_pilihan ?></td>                						
                						<td>
                                            <a href="<?php echo base_url('inputbayar/ses/'.$data1->id.'/1/'.$this->uri->segment(3)) ?>"><span class="glyphicon glyphicon-chevron-right"></span></a>
                                        </td>
                					</tr>
                                    <?php } 
                                    foreach ($tagihan2 as $data2) { ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $data2->nama_pilihan ?></td>                                     
                                        <td>
                                            <a href="<?php echo base_url('inputbayar/ses/'.$data2->id.'/2/'.$this->uri->segment(3)) ?>"><span class="glyphicon glyphicon-chevron-right"></span></a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                				</tbody>
                			</table>
                		</div>
                		<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                            <?php if (!empty($this->session->userdata('jns'))){
                                $this->load->view($show);
                            } ?><br>
                        <table class="table table-condensed" id="example">
                            <thead>
                                <tr>
                                    <th width="1%">No</th>
                                    <th>Nama Tagihan</th>
                                    <th>Nominal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no =1 ; foreach ($showtagihan as $key) { ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $key->nm_tagihan ?></td>
                                    <td><?php echo number_format($key->tagihan) ?></td>
                                    <td>
                                        <a href="<?php echo base_url('inputbayar/hapus_t/'.$key->id.'/'.$this->uri->segment(3)) ?>" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span></a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>   
                        <a href="<?php echo base_url('inputbayar/cetak_tagihan/'.$this->uri->segment(3)) ?>" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-print"></span> Cetak Tagihan</a> 
                        </div>	                            
                		</div>
                	</div>
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">                            
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
