<section class="content-header">
  <h1>
    Input NIS Siswa
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo base_url('dashboard') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>    
    <li><a href="<?php echo base_url('siswa') ?>">Data Siswa</a></li>    
    <li class="active">Input NIS Siswa</li>
  </ol>
</section>

<section class="content">
  	<div class="row">
    	<div class="col-xs-12">
        	<div class="box box-primary">
            	<div class="box-header">
            		
            	</div>
            	<div class="box-body">
            		<div class="row">
            			<?php echo form_open('siswa/save_nis'); ?>
            			<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">            			            		
            				<table class="table table-condensed table-hover">	            			
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
				                      </tr>
	                   			</thead>
	            				<tbody>
	            				<?php 
	            					$no = 1; 
	            					foreach ($siswa as $row) { ?>
	            					<tr>
	            						<td><?php echo $no++; ?></td>                        
				                        <td><?php echo $row->nama_rombel ?></td>                        
				                        <td>
				                        	<input type="text" name="nis[<?php echo $row->id_siswa ?>]" class="form-control" size="8" value="<?php echo $row->nis ?>" placeholder="NIS Siswa">
				                        </td>                        
				                        <td><?php echo $row->nama ?></td>                        
				                        <td><?php echo $row->jekel ?></td>                        
				                        <td><?php echo $row->tempat_lahir ?></td>                        
				                        <td><?php echo $row->tgl_lahir ?></td>                        
				                        <td><?php echo $row->alamat_tinggal ?></td>				                        
	            					</tr>
	            				<?php	} ?>
	            				</tbody>            				
	            			</table>
            			</div>
            			<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
            				<!-- <input type="hidden" name="idr" value="<?php echo $idr ?>"> -->
            				<button type="submit" class="btn btn-primary" onclick="return confirm('Simpan Data ?')">Simpan</button>
            			</div>
            			<?php echo form_close(); ?>
            		</div>
            	</div>
            </div>
        </div>
    </div>    
</section>