<section class="content-header">
  <h1>
    Tabungan
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo base_url('dashboard') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active">Tabungan</li>
  </ol>
</section>

<section class="content">
    <div class="row">
      <div class="col-xs-12">
          <div class="box">
              <div class="box-header">
                  <h3 class="box-title">History Transaksi Tabungan</h3>
                  <div class="pull-right">
                    <!-- <a href="" class="btn btn-success btn-sm" ><i class="fa fa-plus"></i> Tambah</a> -->
                    <a href="<?php echo base_url('tabungan/add') ?>" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Tambah</a>
        			<a href="<?php echo base_url('tabungan/view') ?>" class="btn btn-success"><span class="glyphicon glyphicon-search"></span> Cari</a>
                  </div>
              </div>
            <!-- /.box-header -->
              <div class="box-body">
                <table class="table table-bordered table-hover">
                  <thead>
                    <tr class="active">                      
                      <th>No_TF</th>
                      <th>Date</th>
                      <th>Nama</th>
                      <th>Debit</th>
                      <th>Kredit</th>
                      <th>Ket</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    foreach ($get as $data) { ?>
                    <tr style="font-style: italic;">                      
                      <td><?php echo $data->id_tf; ?></td>
                      <td><?php echo $data->date; ?></td>
                      <td><?php echo $data->nama; ?></td>
                      <td><?php echo number_format($data->debit); ?></td>
                      <td><?php echo number_format($data->kredit); ?></td>
                      <td><?php echo $data->ket; ?></td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
        </div>
    </div>
    <!-- /.box -->
</section>