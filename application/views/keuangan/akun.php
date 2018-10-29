<section class="content-header">
  <h1>
    Akun
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo base_url('dashboard') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active">Akun</li>
  </ol>
</section>

    <!-- Main content -->
<section class="content">
    <div class="row">
      <div class="col-xs-12">
          <div class="box">
              <div class="box-header">
                  <h3 class="box-title">Data Akun</h3>
                  <div class="pull-right">
                    <!-- <a href="" class="btn btn-success btn-sm" ><i class="fa fa-plus"></i> Tambah</a> -->
                    <button type="button" class="btn btn-success btn-sm" onclick="add_akun()"><i class="fa fa-plus"></i> Tambah</button>
                  </div>
              </div>
            <!-- /.box-header -->
              <div class="box-body">
                <table class="table table-bordered table-hover" id="example1">
                  <thead>
                    <tr class="active">
                      <th width="1%">No</th>
                      <th>ID Akun</th>
                      <th>Nama Akun</th>
                      <th>Jenis Akun</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no =1 ;
                    foreach ($get as $data) { ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $data->id_akun; ?></td>
                      <td><?php echo $data->nama_akun; ?></td>
                      <td><?php echo $data->jenis_akun; ?></td>
                      <td>
                        <button type="button" class="btn btn-primary btn-sm" onclick="edit_jm('<?php echo $data->id_akun ?>')"><i class="fa fa-edit"></i> Edit</button>
                        <a href="<?php echo base_url('akun/hapus/'.$data->id_akun) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Hapus Data ?')"><i class="fa fa-trash"></i> Hapus</a>
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
            <h3 class="modal-title">Form Input Akun</h3>
          </div>
          <div class="modal-body form">
            <form action="#" id="form" class="form-horizontal">
                <div class="form-body">
                   <div class="form-group">
                      <label class="control-label col-md-3">ID Akun</label>
                    <div class="col-md-9">
                        <input name="id_akun" placeholder="ID Akun" class="form-control" type="text">
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="control-label col-md-3">Nama Akun</label>
                    <div class="col-md-9">
                        <input name="nama_akun" placeholder="Nama Akun" class="form-control" type="text">
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="control-label col-md-3">Jenis Akun</label>
                    <div class="col-md-9">
                        <select name="jenis_akun" class="form-control" style="width: 100%;">
                          <option value="">Pilih</option>
                          <option value="Aset">Aset</option>
                          <option value="Modal">Modal</option>
                          <option value="Kewajiban">Kewajiban</option>
                          <option value="Beban">Beban</option>
                          <option value="Pendapatan">Pendapatan</option>
                        </select>
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
    function add_akun()
    {
      save_method = 'add';
      $('#form')[0].reset(); // reset form on modals
      $('#modal_form').modal('show'); // show bootstrap modal

    //$('.modal-title').text('Add Person'); // Set Title to Bootstrap modal title
    }
    function edit_jm(id)
    {
      save_method = 'update';
      gid = id;
      $('#form')[0].reset(); // reset form on modals

      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('index.php/akun/get')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

            $('[name="id_akun"]').val(data.id_akun);
            $('[name="id_akun"]').attr('readonly','readonly');
            $('[name="nama_akun"]').val(data.nama_akun);
            $('[name="jenis_akun"]').val(data.jenis_akun);
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Akun'); // Set title to Bootstrap modal title
            $('[name="jenis_akun"]').trigger('change');

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
          url = "<?php echo site_url('index.php/akun/simpan')?>";
      }else{
          url = "<?php echo site_url('index.php/akun/edit/')?>" + gid;
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
