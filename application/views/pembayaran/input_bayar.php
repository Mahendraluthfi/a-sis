<section class="content-header">
  <h1>
    Input Pembayaran
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo base_url('dashboard') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active">Input Pembayaran</li>
  </ol>
</section>

<section class="content">
    <div class="row">
      <div class="col-xs-12">
          <div class="box">
              <div class="box-header">
                  <h3 class="box-title">Data Input Pembayaran</h3>
                  <div class="pull-right">
                    <a href="<?php echo base_url('inputbayar/view') ?>" class="btn btn-success btn-sm" ><i class="glyphicon glyphicon-copy"></i> Data Tagihan</a>
                    <!-- <button type="button" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Pembayaran</button> -->
                  </div>
              </div>
            <!-- /.box-nama -->
              <div class="box-body">
                <table class="table table-bordered table-hover" id="example1">
                  <thead>
                    <tr class="active">
                      <th width="1%">No</th>
                      <th>Nama Pilihan</th>
                      <th>Jenjang</th>
                      <th>Kode Jenis</th>
                      <th>Opsi_a</th>
                      <th>Opsi_b</th>
                      <th>Opsi_c</th>                      
                      <th>Opsi_d</th>                      
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    foreach ($get as $data) { ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $data->nama_pilihan; ?></td>
                      <td><?php echo $data->nama_kelas; ?></td>
                      <td><?php echo $data->kode_jenis; ?></td>
                      <td><?php echo number_format($data->opsi_a); ?></td>
                      <td><?php echo number_format($data->opsi_b); ?></td>
                      <td><?php echo number_format($data->opsi_c); ?></td>                                      
                      <td><?php echo number_format($data->opsi_d); ?></td>                                      
                      <td>
                          <button class="btn btn-primary btn-sm" onclick="view(<?php echo $data->id ?>,<?php echo $data->tipe_jenis ?>)"><span class="glyphicon glyphicon-zoom-in"></span> View</button>
                      </td>
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

<div class="modal fade" id="modal_form" role="dialog">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h3 class="modal-title">Data Input Pembayaran</h3>
          </div>
          <div class="modal-body form">
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <h3 id="title"></h3>
                <table class="table table-bordered table-hover" id="tb">
                    <thead>
                      <tr class="info">
                        <th>No</th>
                        <th>Nama Siswa</th>
                        <th>Rombel</th>
                        <th>Tagihan</th>                        
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody id="show_data">
                        
                    </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="modal-footer">            
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
<script>
function view(id,jns){        
    $.ajax({
      url : "<?php echo site_url('index.php/inputbayar/get1')?>/" +id,
      type: "GET",
      dataType: "JSON",
      success: function(data){
          $("#title").text(data.nama_pilihan);                     
      },
        error: function (jqXHR, textStatus, errorThrown){
          alert('Error get data from ajax');
      }
    });
    var a = $('#tb').DataTable();           
        a.clear().draw();
        a.destroy();
    $.ajax({
      url : "<?php echo site_url('index.php/inputbayar/get2')?>/" + id+"/"+jns,
      type: "GET",
      dataType: "JSON",
      success: function(data){
          var html = '';
          var i;
          var no = 1;

          for(i=0; i<data.length; i++){
          var bilangan = data[i].tagihan;
          var number_string = bilangan.toString(),
          sisa  = number_string.length % 3,
          rupiah  = number_string.substr(0, sisa),
          ribuan  = number_string.substr(sisa).match(/\d{3}/g);
            
          if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
          }
              html += "<tr>"+                        
                  "<td width='1%'>"+no+++"</td>"+
                  "<td>"+data[i].nama+"</td>"+
                  "<td>"+data[i].nama_rombel+"</td>"+
                  "<td>"+rupiah+"</td>"+
                  "<td><a href='inputbayar/set/"+data[i].id+"/"+data[i].id_siswa+"/"+data[i].tipe+"' class='btn btn-primary btn-sm' onclick='return confirm(Hapus Data)'><span class='glyphicon glyphicon-chevron-right'></span> Input Pembayaran</a></td>"+
                  "</tr>";
              }
          $('#show_data').html(html);
          $('#tb').DataTable();
          $('#modal_form').modal('show');          
      },
        error: function (jqXHR, textStatus, errorThrown){
          alert('Error get data from ajax');
      }
    });
}
</script>