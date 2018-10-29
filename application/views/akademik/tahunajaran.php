<section class="content-header">
  <h1>
    Tahun Ajaran  
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo base_url('dashboard') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>    
    <li class="active">Tahun Ajaran</li>
  </ol>
</section>

    <!-- Main content -->
<section class="content">
  	<div class="row">
    	<div class="col-sm-12 col-md-12">
        	<div class="box">
            	<div class="box-header">
              		<h3 class="box-title">Data Tahun Ajaran</h3>
              		<div class="pull-right">
              			<!-- <a href="" class="btn btn-success btn-sm" ><i class="fa fa-plus"></i> Tambah</a> -->                    
              			<button type="button" class="btn btn-success btn-sm" onclick="add_ta()"><i class="fa fa-plus"></i> Tambah</button>
              		</div>
            	</div>
            <!-- /.box-header -->
            	<div class="box-body">
            		<table class="table table-bordered table-hover" id="example1">
            			<thead>
            				<tr class="active">
            					<th width="1%">No</th>
            					<th>Kode_TahunAjaran</th>
                      <th>Nama</th>
                      <th>Awal Periode</th>
            					<th>Akhir Periode</th>
                      <th>Keterangan</th>
            					<th>Status</th>
            					<th>Aksi</th>
            				</tr>
            			</thead>
            			<tbody>
            				<?php 
            				$no =1 ;
            				foreach ($get as $data) { ?>
            				<tr>
            					<td><?php echo $no++; ?></td>
            					<td><?php echo $data->kd_angkatan; ?></td>
            					<td><?php echo $data->nama_angkatan; ?></td>
                      <td><?php echo date('d M Y', strtotime($data->tgl_a)); ?></td>
                      <td><?php echo date('d M Y', strtotime($data->tgl_b)); ?></td>
                      <td><?php echo $data->keterangan; ?></td>
            					<td><?php if ($data->aktif=="0") {
                        echo "Nonaktif";
                      }else{
                        echo "Aktif";
                      } ?></td>
            					<td>
                        <?php if ($data->aktif=="0"): ?>
                        <a href="<?php echo base_url('tahunajaran/set/'.$data->id_angkatan) ?>" class="btn btn-success btn-sm" onclick="return confirm('Set Aktif Tahun Ajaran ?')"><i class="glyphicon glyphicon-check"></i> Set Aktif</a>
                        <?php endif ?>
            						<button type="button" class="btn btn-primary btn-sm" onclick="edit_ta('<?php echo $data->id_angkatan ?>')"><i class="fa fa-edit"></i> Edit</button>
            						<a href="<?php echo base_url('tahunajaran/hapus/'.$data->id_angkatan) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Hapus Data ?')"><i class="fa fa-trash"></i> Hapus</a>
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
        		<h3 class="modal-title">Form Input Tahun Ajaran</h3>
      		</div>
      		<div class="modal-body form">
        		<form action="#" id="form" class="form-horizontal">
          			<div class="form-body">
            			<div class="form-group">
              				<label class="control-label col-md-3">Kode Tahun Ajaran</label>
              				<div class="col-md-9">
                				<input name="kd_angkatan" id="kd" placeholder="Kode Tahun Ajaran" class="form-control" type="text" required="">
              				</div>
            			</div>
            			<div class="form-group">
              				<label class="control-label col-md-3">Nama</label>
          					<div class="col-md-9">
                				<input name="nama_angkatan" placeholder="Nama Tahun Ajaran" class="form-control" type="text" required="">
              				</div>
            			</div>
                  <div class="form-group">
                      <label class="control-label col-md-3">Periode</label>
                    <div class="col-md-9">
                        <input name="periode" placeholder="Periode Tanggal" class="form-control" type="text" required="" id="kampret2">
                      </div>
                  </div>
            			<div class="form-group">
              				<label class="control-label col-md-3">Keterangan</label>
              				<div class="col-md-9">
								<input name="keterangan" placeholder="Keterangan" class="form-control" type="text">
              				</div>
            			</div>						
          			</div>
        		</form>
          </div>
          <div class="modal-footer">
            <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <script>
    var save_method; //for save method string
    var table;
    var gid;
    function add_ta()
    {
      save_method = 'add';
      $('#form')[0].reset(); // reset form on modals
      $('#modal_form').modal('show'); // show bootstrap modal      

    //$('.modal-title').text('Add Person'); // Set Title to Bootstrap modal title
    }
    function edit_ta(id)
    {
      save_method = 'update';
      gid = id;
      $('#form')[0].reset(); // reset form on modals

      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('index.php/tahunajaran/get')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            
            $('[name="kd_angkatan"]').val(data.kd_angkatan);
            $('[name="nama_angkatan"]').val(data.nama_angkatan);
            $('[name="keterangan"]').val(data.keterangan);            
            $('[name="periode"]').val(data.tgl_a+" - "+data.tgl_b);            
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Tahun Ajaran'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
    }
    function save(){
      var url;      
      if(save_method == 'add'){
          url = "<?php echo site_url('index.php/tahunajaran/simpan')?>";         	
      }else{      	  
          url = "<?php echo site_url('index.php/tahunajaran/edit/')?>" + gid;        	
      }

       // ajax adding data to database
          $.ajax({
            url : url,
            type: "POST",
            data: $('#form').serialize(),
            dataType: "JSON",
            success: function(data)
            {
               //if success close modal and reload ajax table
               $('#modal_form').modal('hide');
              location.reload();// for reload a page
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
    }

   

    </script>