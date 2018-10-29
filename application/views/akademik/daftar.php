<section class="content-header">
  <h1>
    Pendaftaran Siswa
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo base_url('dashboard') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>    
    <li class="active">Pendaftaran</li>
  </ol>
</section>

<section class="content">
  	<div class="row">
    	<div class="col-xs-12">
        	<div class="box">
            	<div class="box-header">
              		<h3 class="box-title">Pendaftaran Siswa</h3>              		
              </div>              
            <!-- /.box-header -->
              <div class="box-body">
                <div class="row">
                  <div class="col-md-2 pull-right">
                    <select name="" class="form-control" onchange="window.location=this.options[this.selectedIndex].value">
                        <option value="">Filter</option>
                        <option value="<?php echo base_url('daftar') ?>">Semua Data</option>
                        <?php foreach ($jenjang as $b) { ?>
                        <option value="<?php echo base_url('daftar/index/'.$b->id_jenjang) ?>"><?php echo $b->nama_jenjang ?></option>    
                        <?php } ?>       
                    </select>
                  </div>
                  <div class="col-md-2">
                    <button type="button" class="btn btn-success btn-sm" onclick="upload()"><i class="fa fa-upload"></i> Upload</button>
              			<a href="<?php echo base_url('daftar/form_daftar') ?>" class="btn btn-success btn-sm" ><i class="fa fa-plus"></i> Tambah</a>
                  </div>
                </div>         <br>     

                <table class="table table-bordered table-hover" id="scrollh" width="100%">
                    <thead>
                      <tr>
                        <th width="1%">No</th>
                        <th>No_reg</th>
                        <th>Tahun Ajaran</th>
                        <th width="1%">Jenjang</th>
                        <th>Nama</th>
                        <th width="1%">Jekel</th>
                        <th>Tempat Lahir</th>
                        <th>Tgl Lahir</th>                        
                        <th>Alamat tinggal</th>                        
                        <th>Aksi</th>                        
                      </tr>
                    </thead>
                    <tbody>
                      <?php $no = 1;
                      foreach ($calon as $row) { ?>
                      <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $row->no_reg ?></td>
                        <td><?php echo $row->kd_angkatan ?></td>
                        <td><?php echo $row->nama_jenjang ?></td>
                        <td><?php echo $row->nama ?></td>
                        <td><?php echo $row->jekel ?></td>
                        <td><?php echo $row->tempat_lahir ?></td>
                        <td><?php echo $row->tgl_lahir ?></td>                        
                        <td><?php echo $row->alamat_tinggal ?></td>                        
                        <td>
                          <a href="<?php echo base_url('daftar/edit_daftar/'.$row->id_daftar) ?>" class="btn btn-primary" title="Edit"><i class="fa fa-edit"></i></a>
                          <button type="button" class="btn btn-warning" onclick="detail('<?php echo $row->id_daftar ?>')" title="Detail"><span class="glyphicon glyphicon-zoom-in"></span></button>
                          <a href="<?php echo base_url('daftar/hapus/'.$row->id_daftar) ?>" class="btn btn-danger" title="Hapus" onclick="return confirm('Yakin Hapus ?')"><i class="fa fa-trash"></i></a>
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

<div class="modal modal-success fade" id="upload" role="dialog">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h3 class="modal-title">Upload Pendaftaran Siswa</h3>
          </div>
          <div class="modal-body">
            <h4>Download template excel dahulu untuk mengisi data siswa yang akan diupload.</h4>
            <a href="<?php echo base_url('asset/sample.xls') ?>" class="btn btn-warning"><i class="fa fa-download"></i> Download Template</a><br><br>
            <?php echo form_open_multipart('daftar/upload_file',array('class'=>'form-horizontal','id'=>'upload_form','name'=>'upload_form')); ?>
            <div class="form-group">
                <label class="col-md-3 control-label">Tahun Ajaran</label>
                <div class="col-md-9">
                   <input type="text" class="form-control" value="<?php echo $aktif ?>" readonly>
                    <input type="hidden" class="form-control" value="<?php echo $id_aktif ?>" name="tahunajaran">
                  </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label">Jenjang</label>
                <div class="col-md-9">
                    <select name="jenjang" class="form-control" required="" style="width: 100%;">
                      <option value="" selected="">Pilih</option>                             
                        <?php foreach ($jenjang as $b) { ?>
                        <option value="<?php echo $b->id_jenjang ?>"><?php echo $b->nama_jenjang ?></option>    
                        <?php } ?>       
                    </select>
                </div> 
            </div> 
            <div class="form-group">
                <label class="col-md-3 control-label">Upload</label>
                <div class="col-md-9">
                    <input type="file" name="file">
                    <p class="help-block" style="color: white;">Type File Upload .*xls</p>
                </div> 
            </div>        
          </div>
          <div class="modal-footer">            
            <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-outline" name="submit"><i class="fa fa-upload"></i> Upload</button>
            <?php echo form_close(); ?>
          </div>
      </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade bs-example-modal-lg" id="modal_detail" role="dialog">
  <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h3 class="modal-title">Detail Data Pendaftar</h3>
          </div>
          <div class="modal-body form">
            <form action="" method="POST" class="form-horizontal" role="form">
              <div class="form-group">
                <label class="col-sm-2 control-label">No Reg</label>
                  <div class="col-sm-1">
                  <p class="form-control-static" id="noreg"></p>      
                  </div>
                <label class="col-sm-2 control-label">Tahun Ajaran</label>
                  <div class="col-sm-1">
                  <p class="form-control-static" id="tahunajaran"></p>                      
                  </div>
                  <label class="col-sm-1 control-label">Jenjang</label>
                  <div class="col-sm-1">
                  <p class="form-control-static" id="jenjang"></p>      
                  </div>
                  <label class="col-sm-2 control-label">Tanggal Daftar</label>
                  <div class="col-sm-2">
                  <p class="form-control-static" id="tgldaftar"></p>      
                  </div>
            </div>            
                <div class="form-group">
                   <label class="col-sm-2 control-label">NISN</label>
                      <div class="col-sm-4">
                      <p class="form-control-static" id="nisn"></p>      
                      </div>
                    <label class="col-sm-2 control-label">Agama</label>
                      <div class="col-sm-4">
                      <p class="form-control-static" id="agama"></p>      
                      </div>                    
                </div>
                  <div class="form-group">
                      <label class="col-sm-2 control-label">Nama Lengkap</label>
                      <div class="col-sm-4">
                      <p class="form-control-static" id="nama"></p>     
                      </div>
                      <label class="col-sm-2 control-label">Warga Negara</label>
                      <div class="col-sm-4">
                      <p class="form-control-static" id="wn"></p>                                 
                      </div>
                  </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Jenis Kelamin</label>
                      <div class="col-sm-4">
                      <p class="form-control-static" id="jekel"></p>                     
                      </div>
                      <label class="col-sm-2 control-label">Anak Ke</label>
                      <div class="col-sm-1">
                      <p class="form-control-static" id="anak_ke"></p>      
                      </div>
                </div>  
                <div class="form-group">
                    <label class="col-sm-2 control-label">Tempat Lahir</label>
                      <div class="col-sm-4">
                      <p class="form-control-static" id="tempatlahir"></p>      
                      </div>
                      <label class="col-sm-2 control-label">Sdr Kandung</label>
                      <div class="col-sm-1">
                      <p class="form-control-static" id="sdr_kandung"></p>      
                      </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Tanggal Lahir</label>
                      <div class="col-sm-4">
                      <p class="form-control-static" id="tgllahir"></p>     
                      </div>
                      <label class="col-sm-2 control-label">Sdr Angkat</label>
                      <div class="col-sm-1">
                      <p class="form-control-static" id="sdr_angkat"></p>     
                      </div>
                </div>   
                <div class="form-group">
                    <label class="col-sm-2 control-label">Alamat Tinggal</label>
                      <div class="col-sm-4">
                      <p class="form-control-static" id="alamat_tinggal"></p>     
                      </div>
                      <label class="col-sm-2 control-label">Foto</label>
                      <div class="col-sm-4">
                        <img src="" height="200" width="150" class="img-thumbnail" id="foto">
                      </div>
                </div>                   
          <div class="form-group">
                      <label class="col-sm-2 control-label">Alamat Domisili</label>
                      <div class="col-sm-4">
                      <p class="form-control-static" id="alamat_domisili"></p>      
                      </div>  
                      <label class="col-sm-2 control-label">Tinggal Dengan</label>
                      <div class="col-sm-4">
                      <p class="form-control-static" id="tinggal_dengan"></p>     
                      </div>                
          </div>
          <div class="form-group">
                      <label class="col-sm-2 control-label">No Telepon/HP</label>
                      <div class="col-sm-4">
                      <p class="form-control-static" id="telepon"></p>      
                      </div>                
          </div>          
          <div class="form-group">
            <label class="col-sm-2 control-label">Gol Darah</label>
                      <div class="col-sm-4">
                      <p class="form-control-static" id="goldarah"></p>     
                      </div>      
                      <label class="col-sm-2 control-label">Berat Badan</label>
                      <div class="col-sm-1">
                      <p class="form-control-static" id="berat"></p>      
                      </div>
          </div>  
          <div class="form-group">
              <label class="col-sm-2 control-label">Penyakit yg pernah diderita</label>
                      <div class="col-md-4">
                      <p class="form-control-static" id="penyakit"></p>     
                    </div>                    
                      <label class="col-sm-2 control-label">Tinggi Badan</label>
                      <div class="col-sm-1">
                      <p class="form-control-static" id="tinggi"></p>     
                      </div>
                    </div>                     
          <div class="form-group">
            <label class="col-sm-2 control-label">Nama Ayah</label>
                      <div class="col-sm-4">
                      <p class="form-control-static" id="ayah"></p>     
                      </div>      
                      <label class="col-sm-2 control-label">Alamat Orang Tua</label>
                      <div class="col-sm-4">
                      <p class="form-control-static" id="alamat_orangtua"></p>      
                      </div>
          </div>  
          <div class="form-group">
              <label class="col-sm-2 control-label">Nama Ibu</label>
                      <div class="col-md-4">
                      <p class="form-control-static" id="ibu"></p>      
                    </div>                    
                      <label class="col-sm-2 control-label">Alamat Wali</label>
                      <div class="col-sm-4">
                      <p class="form-control-static" id="alamat_wali"></p>      
                      </div>
                    </div>  
                    <div class="form-group">
              <label class="col-sm-2 control-label">Nama Wali</label>
                      <div class="col-md-4">
                      <p class="form-control-static" id="wali"></p>     
                    </div>                    
                      <label class="col-sm-2 control-label">Pendapatan</label>
                      <div class="col-sm-4">
                      <p class="form-control-static" id="pendapatan"></p>     
                      </div>
                  </div>
            </form>
          </div>
          <div class="modal-footer"> 
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div>

<script>
      
  function upload() {    
    $('#upload_form')[0].reset();  
    $('#upload').modal('show');
  }

  function validateForm(){
      
      function hasExtension(inputID, exts) {
          var fileName = document.getElementById(inputID).value;
          return (new RegExp('(' + exts.join('|').replace(/\./g, '\\.') + ')$')).test(fileName);
      }
      
      if(!hasExtension('filesiswa', ['.xls'])){
          alert("Hanya file XLS (Excel 2003) yang diijinkan.");
          return false;
      }
  }

  function detail(id){      
  var ffoto;  
    $.ajax({
        url : "<?php echo site_url('index.php/pembagian/get')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
          if (data.foto == "" || data.foto == null) {
            ffoto = 'asset/foto/empty.png';
          }else{
            ffoto = 'asset/foto/' + data.foto;
          }
      $("#noreg").text(data.no_reg);           
      $("#tahunajaran").text(data.kd_angkatan);
      $("#jenjang").text(data.nama_jenjang);           
      $("#tgldaftar").text(data.tgl_daftar);           
      $("#nisn").text(data.nisn);           
      $("#nama").text(data.nama);           
      $("#wn").text(data.wn);           
      $("#jekel").text(data.jekel);           
      $("#anak_ke").text(data.anak_ke);           
      $("#tempatlahir").text(data.tempat_lahir);           
      $("#tgllahir").text(data.tgl_lahir);           
      $("#sdr_kandung").text(data.sdr_kandung);           
      $("#sdr_angkat").text(data.sdr_angkat);
      $("#alamat_tinggal").text(data.alamat_tinggal);           
      $("#alamat_domisili").text(data.alamat_domisili);           
      $("#agama").text(data.agama);           
      $("#tinggal_dengan").text(data.tinggal_dengan);           
      $("#ayah").text(data.ayah);           
      $("#ibu").text(data.ibu);           
      $("#wali").text(data.wali);           
      $("#alamat_orangtua").text(data.alamat_orangtua);           
      $("#alamat_wali").text(data.alamat_wali);           
      $("#penyakit").text(data.penyakit);           
      $("#foto").attr("src", ffoto);           
      $("#berat").text(data.berat + " kg");           
      $("#tinggi").text(data.tinggi + " cm");           
      $("#telepon").text(data.telepon);           
      $("#goldarah").text(data.gol_darah);           
      $("#pendapatan").text(data.pendapatan);           
            $('#modal_detail').modal('show'); // show bootstrap modal when complete loaded                        

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}
</script>
