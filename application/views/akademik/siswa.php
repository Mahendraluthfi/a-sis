<section class="content-header">
  <h1>
    Data Siswa
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo base_url('dashboard') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>    
    <li class="active">Data Siswa</li>
  </ol>
</section>

<section class="content">
  	<div class="row">
    	<div class="col-xs-12">
        	<div class="box box-primary">
            	<div class="box-header">
              		<h3 class="box-title">Data Siswa</h3> 
              		<div class="pull-right">
              			<button type="button" class="btn btn-warning" onclick="exp()"><i class="fa fa-download"></i> Export Data</button>
              			<button type="button" class="btn btn-primary" onclick="nis()"><i class="glyphicon glyphicon-star"></i> Input NIS Siswa</button>
              			<button type="button" class="btn btn-success" onclick="show()"><i class="fa fa-search"></i> Tampilkan Data</button>
            		</div>            
                </div>
            	<div class="box-body">
            		<div class="row">  
            			<div class="col-md-12">
            				<table class="table table-bordered table-hover" id="example1">	            			
	            				 <thead>
				                      <tr class="active">				                      	                       
				                        <th width="1%">No</th>                        
				                        <th>Rombel</th>                        
				                        <th>NIS</th>                        
				                        <th>Nama</th>                        
				                        <th>Jekel</th>                        
				                        <th>Tmpt_lahir</th>                        
				                        <th>Tgl_lahir</th>                        
				                        <th>Alamat</th>
				                        <th width="8%">Aksi</th>                        				            
				                      </tr>
	                   			</thead>
	            				<tbody>
	            				<?php 
	            					$no = 1; 
	            					foreach ($siswa as $row) { ?>
	            					<tr>
	            						<td><?php echo $no++; ?></td>                        
				                        <td><?php echo $row->nama_rombel ?></td>                        
				                        <td><?php echo $row->nis ?></td>                        
				                        <td><?php echo $row->nama ?></td>                        
				                        <td><?php echo $row->jekel ?></td>                        
				                        <td><?php echo $row->tempat_lahir ?></td>                        
				                        <td><?php echo $row->tgl_lahir ?></td>                        
				                        <td><?php echo $row->alamat_tinggal ?></td>
				                        <td>
				                        	<a href="<?php echo base_url('siswa/edit/'.$row->id_siswa.'/'.$row->id_jenjang) ?>" class="btn btn-primary btn-xs" title="Edit"><i class="fa fa-edit"></i></a>
					                        <button type="button" class="btn btn-warning btn-xs" onclick="detail('<?php echo $row->id_daftar ?>')" title="Detail"><span class="glyphicon glyphicon-zoom-in"></span></button>
					                        <a href="<?php echo base_url('siswa/hapus/'.$row->id_daftar) ?>" class="btn btn-danger btn-xs" title="Hapus" onclick="return confirm('Yakin Hapus ?')"><i class="fa fa-trash"></i></a>
				                        </td>
	            					</tr>
	            				<?php	} ?>
	            				</tbody>            				
	            			</table>
            			</div>
            		</div>
            	</div>
            </div>
        </div>
    </div>    
</section>

<div class="modal fade" id="modal_form" role="dialog">
	<div class="modal-dialog">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        		<h3 class="modal-title"></h3>
      		</div>
      		<div class="modal-body form">
        		<?php echo form_open('', array('class' => 'form-horizontal', 'id' => 'form')); ?>
          			<div class="form-body">
            			<div class="form-group">
              				<label class="control-label col-md-3">Nama Kelas</label>
          					<div class="col-md-9">
                				<select class="form-control" style="width: 100%;" name="id_kelas">
		                        <?php foreach ($rombel as $data) { ?>
		                        <option value="<?php echo $data->id_rombel ?>"><?php echo $data->nama_rombel." / ".$data->nama_kelas ?></option>
		                        <?php } ?>
		                        </select>
              				</div>
            			</div>	                              							
          			</div>
          		</div>
          	<div class="modal-footer">
            <button type="submit" class="btn btn-primary btntitle"></button>
        		<?php echo form_close(); ?>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
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
			$("#nisn").text(data.nisn);           
			$("#tahunajaran").text(data.kd_angkatan);
			$("#jenjang").text(data.kd_jenjang);           
			$("#tgldaftar").text(data.tgl_daftar);           
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

 	function show(){      
      $('#form')[0].reset(); // reset form on modals
      $('#form').attr('action','<?php echo base_url("siswa") ?>');
      $('.modal-title').text('Tampilkan Data Siswa'); 
      $('.btntitle').text('Tampilkan'); 
      $('#modal_form').modal('show'); 
    }

    function nis(){      
      $('#form')[0].reset(); // reset form on modals
      $('#form').attr('action','<?php echo base_url("siswa/nis") ?>');
      $('.modal-title').text('Input Data NIS Siswa'); 
      $('.btntitle').text('Tampilkan'); 
      $('#modal_form').modal('show'); 
    }

    function exp() {
	  $('#form')[0].reset(); // reset form on modals
      $('#form').attr('action','<?php echo base_url("siswa/export") ?>');
      $('.modal-title').text('Export Data Siswa'); 
      $('.btntitle').text('Export');       
      $('#modal_form').modal('show'); 
    }
</script>