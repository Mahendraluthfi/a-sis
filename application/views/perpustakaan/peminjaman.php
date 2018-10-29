<section class="content-header">
  <h1>
    Transaksi Peminjaman Buku  
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo base_url('dashboard') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>    
    <li class="active">Transaksi Peminjaman Buku</li>
  </ol>
</section>

<section class="content">
  	<div class="row">
    	<div class="col-xs-12">
        	<div class="box">
            	<div class="box-header">
              		<h3 class="box-title">Data Peminjaman Buku</h3>
              		<div class="pull-right">
               			<a href="<?php echo base_url() ?>peminjaman/form" class="btn btn-success"><i class="fa fa-plus"></i> Input</a>
              		</div>
            	</div>
            <!-- /.box-header -->
            	<div class="box-body">
            		<table class="table table-bordered table-hover" id="example1">
            			<thead>
            				<tr class="active">            					
		                      <th width="1%">No</th>
		                      <th>No_Transaksi</th>
		                      <th>Nama Siswa</th>
		                      <th>Rombel</th>
		                      <th>Tgl Pinjam</th>
		                      <th>Tgl Kembali</th>		                     
		                      <th>Status</th>
		                      <th>Aksi</th>
            				</tr>
            			</thead>
            			<tbody>
            				<?php $no = 1;
            				foreach ($get as $data) { ?>
            				<tr>
            					<td><?php echo $no++; ?></td>
            					<td><?php echo $data->no_peminjaman ?></td>
            					<td><?php echo $data->nama ?></td>
            					<td><?php echo $data->nama_rombel ?></td>
            					<td><?php echo $data->tanggal_pinjam ?></td>
            					<td><?php echo $data->tanggal_kembali ?></td>
            					<td><?php echo $data->status ?></td>
            					<td>
                                   <button type="button" class="btn btn-primary btn-xs" onclick="detail('<?php echo $data->no_peminjaman ?>')"><span class="glyphicon glyphicon-zoom-in"></span></button>
            					   <?php if ($data->status == "PROSES"): ?>
                                   <a href="<?php echo base_url('peminjaman/hapusall/'.$data->no_peminjaman) ?>" onclick="return confirm('Yakimn Hapus Data ini ?')" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span></a>
                                   <?php endif ?>
                                </td>
            				<?php } ?>
            				</tr>
            			</tbody>
            		</table>
            	</div>
            </div>
        </div>
    </div>
    <!-- /.box -->
</section>

<div class="modal fade bs-example-modal-lg" id="modal_detail" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Detail Peminjaman Buku</h3>
            </div>
            <div class="modal-body form">
                <div class="container-fluid">
                    <form action="" method="POST" class="form-horizontal" role="form">            
                        <div class="form-group">
                            <label class="control-label col-md-2">No Peminjaman</label>
                            <div class="col-md-4">
                                <p class="form-control-static" id="no"></p>
                            </div>
                             <label class="control-label col-md-2">ID Anggota</label>
                            <div class="col-md-4">
                                <p class="form-control-static" id="id_anggota"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2">Nama / Rombel</label>
                            <div class="col-md-4">
                                <span id="nama"></span> / <span id="rombel"></span>
                            </div>
                            <label class="control-label col-md-2">Tanggal Pinjam</label>
                            <div class="col-md-4">
                                <p class="form-control-static" id="tglp"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2">Denda</label>
                            <div class="col-md-4">
                                <p class="form-control-static" id="denda"></p>
                            </div>
                            <label class="control-label col-md-2">Tanggal Kembali</label>
                            <div class="col-md-4">
                                <p class="form-control-static" id="tglk"></p>
                            </div>
                        </div>                        
                   </form>
                    <table class="table table-bordered table-hover" id="tb">
                        <thead>
                            <tr class="info">
                                <th>ID_Buku</th>
                                <th>Judul</th>
                                <th>Pengarang</th>
                                <th>Kategori</th>
                                <th>Rak</th>
                            </tr>
                        </thead>
                        <tbody id="show_data">
                            
                        </tbody>
                    </table>               
                </div>           
            </div>
            <div class="modal-footer">            
                <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<script>
    function detail(id) {
        // body...
        $.ajax({
            url : "<?php echo site_url('index.php/peminjaman/get1')?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data){
                $("#no").text(data.no_peminjaman);           
                $("#id_anggota").text(data.id_anggota);           
                $("#nama").text(data.nama);
                $("#rombel").text(data.nama_rombel);
                $("#tglp").text(data.tanggal_pinjam);           
                $("#tglk").text(data.tanggal_kembali);    
                $("#denda").text(data.ttl);    
        //        $('#modal_detail').modal('show'); // show bootstrap modal when complete loaded                        

            },
            error: function (jqXHR, textStatus, errorThrown){
                alert('Error get data from ajax');
            }
        });
        var a = $('#tb').DataTable();           
        a.clear().draw();
        a.destroy();
         $.ajax({
            url : "<?php echo site_url('index.php/peminjaman/get2')?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data){
                var html = '';
                var i;
                for(i=0; i<data.length; i++){
                    html += "<tr>"+                        
                        "<td>"+data[i].id_detailbuku+"</td>"+
                        "<td>"+data[i].judul+"</td>"+
                        "<td>"+data[i].pengarang+"</td>"+
                        "<td>"+data[i].nama_kategori+"</td>"+
                        "<td>"+data[i].nama_rak+"</td>"+
                        "</tr>";
                    }
                $('#show_data').html(html);
                $('#tb').DataTable();
                $('#modal_detail').modal('show'); // show bootstrap modal when complete loaded                        

            },
            error: function (jqXHR, textStatus, errorThrown){
                alert('Error get data from ajax');
            }
        }); 
    }
</script>