<section class="content-header">
  <h1>
    Seleksi dan Pembagian Kelas
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo base_url('dashboard') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>    
    <li><a href="<?php echo base_url('pembagian') ?>">Seleksi Siswa</a></li>
    <li class="active">Pembagian Kelas</li>
  </ol>
</section>

<section class="content">
  	<div class="row">
    	<div class="col-xs-12">
        	<div class="box box-primary">
            	<div class="box-header">
              		<h3 class="box-title">Pembagian kelas</h3>
              		<div class="pull-right">
              			<div class="btn-group">
	                  		<button type="button" class="btn btn-info">Jenjang</button>
		                  	<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
		                    	<span class="caret"></span>
		                    	<span class="sr-only">Toggle Dropdown</span>
		                  	</button>
		                  	<ul class="dropdown-menu pull-right" role="menu">
		                    	<?php foreach ($jenjang as $key) { ?>
		                    	<li><a href="#" onclick="tampil_data('<?php echo $key->id_jenjang ?>')"><?php echo $key->kd_jenjang; ?></a></li>		                    	
		                    	<?php } ?>
		                  	</ul>
		                </div>
              		</div>
            	</div>            
            	<div class="box-body">
				<?php echo form_open('pembagian/simpan_kelas',array('class'=> 'form-inline')); ?>
            		<div class="row">
            			<div class="col-md-12">        				
            					<div class="form-group">            					
            						<select name="rombel" required="" style="width: 200px;">
            							<option value="" selected="">Pilih Rombel</option>
            							<?php foreach ($rombel as $d ) { 
            								$s = $d->kuota - $d->jml;
            								?>
            							<option value="<?php echo $d->id_rombel ?>"><?php echo $d->nama_rombel." / ".$d->nama_kelas." (".$s.")" ?></option>
            							<?php } ?>
            						</select>
            					</div>
            					<button type="submit" class="btn btn-primary">Simpan</button>
            			</div>
            		</div><br>
            		<div class="row">
            			<div class="col-md-12">
            			<table class="table table-bordered table-hover" id="tb">
            				 <thead>
			                      <tr class="active">
			                      	<th width="1%"><input type="checkbox" id="checkAll"></th>			                        
			                        <th width="1%">No_reg</th>
			                        <th width="10%">Tahun Ajaran</th>
			                        <th width="1%">Jenjang</th>
			                        <th>Nama</th>
			                        <th width="1%">Jekel</th>
			                        <th>Tempat Lahir</th>
			                        <th>Tgl Lahir</th>                        
			                        <th>Alamat tinggal</th>                        
			                      </tr>
                   			</thead>
            				<tbody id="show_data">
            					
            				</tbody>            				
            			</table>
            			</div>
            		</div>
				</form>
            	</div>
            </div>
        </div>
    </div>    
</section>
<script>
	function tampil_data(id){
		var a = $('#tb').DataTable();           
        a.clear().draw();
        a.destroy();
	    $.ajax({
	        type  : 'ajax',
	        url   : '<?php echo base_url()?>pembagian/get_jenjang/' + id,
	        async : false,
	        dataType : 'json',
	        success : function(data){
	            var html = '';
	            var i;
	            for(i=0; i<data.length; i++){
	                html += "<tr>"+
	                		"<td><input type='checkbox' class='cb' name='cb["+data[i].id_daftar+"]'></td>"+
	                  		"<td>"+data[i].no_reg+"</td>"+
	                        "<td>"+data[i].kd_angkatan+"</td>"+
	                        "<td>"+data[i].kd_jenjang+"</td>"+
	                        "<td>"+data[i].nama+"</td>"+
	                        "<td>"+data[i].jekel+"</td>"+
	                        "<td>"+data[i].tempat_lahir+"</td>"+
	                        "<td>"+data[i].tgl_lahir+"</td>"+
	                        "<td>"+data[i].alamat_tinggal+"</td>"+
	                        "</tr>";
	            }
	            $('#show_data').html(html);
	            $('#tb').DataTable({
			        "columnDefs": [
			          { "orderable": false, "targets": 0 }
			        ]        
			      });
				$("#checkAll").click(function () {
					$('.cb').prop('checked',$(this).prop('checked'))
				});
				$('#tb').on('click','.cb',function(){
					var ca = true
					$('.cb').each(function(){
						if(!$(this).prop('checked')){
							ca =false
						}
					})
					$("#checkAll").prop('checked',ca)

				})

	        }

	    });
	}
</script>