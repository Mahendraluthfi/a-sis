<section class="content-header">
  <h1>
    Input Nilai
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo base_url('dashboard') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>    
    <li class="active">Input Nilai</li>
  </ol>
</section>

<section class="content">
	<div class="row">
    	<div class="col-xs-12">
        	<div class="box box-primary">
            	<div class="box-header">
              		<h3 class="box-title">Pilih Mapel & Rombel</h3>
            	</div>            
            	<div class="box-body">
            		<div class="row">
            			<div class="col-md-6">                            
        				    <legend>Mata Pelajaran yang diampu</legend>
            				<table class="table table-bordered table-hover" id="example5">
            					<thead>
            						<tr class="info">
                                        <th width="1%">No</th>							            					
                                        <th>Mapel</th>							            					
                                        <th width="1%">Aksi</th>							            					
            						</tr>
            					</thead>
            					<tbody>
            						<?php $no=1; 
            						foreach ($get as $data) { ?>
            						<tr>
            							<td><?php echo $no++; ?></td>
            							<td><?php echo $data->nama_mapel ?></td>
            							<td>
            								<button type="button" class="btn btn-default" onclick="show('<?php echo $data->id_mapel ?>')"><i class="glyphicon glyphicon-chevron-right"></i></button>
            							</td>
            						</tr>            					
                                    <?php } ?>	
            					</tbody>
            				</table>
            			</div>
            			<div class="col-md-6">            				 
                            <legend>Alokasi Rombel</legend>                            
            				<table class="table table-bordered table-hover" id="tb">
            					<thead>
            						<tr class="info">            				
            							<th width="1%">No</th>
            							<th>Rombel</th>
            							<th>Aksi</th>
            						</tr>
            					</thead>
            					<tbody id="show">                                    				
            						
            						
            					</tbody>
            				</table>
            			</div>
            		</div>
            	</div>
            </div>
        </div>
    </div>    
</section>

<script>
	function show(id) {
		var a = $('#tb').DataTable();           
        a.clear().draw();
        a.destroy();
		 $.ajax({
        url : "<?php echo site_url('index.php/nilai/get_rombel')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
	        {
	            var html = '';
	            var i;
	            var no = 1;
	            for(i=0; i<data.length; i++){
	                html += "<tr>"+
	              "<td>"+no+++"</td>"+
	              "<td>"+data[i].nama_rombel+"</td>"+
	              "<td><a href='nilai/session/"+data[i].id_rombel+"/"+data[i].id_mapel+"/1' class='btn btn-success btn-sm'>Ganjil</a>&nbsp;<a href='nilai/session/"+data[i].id_rombel+"/"+data[i].id_mapel+"/2' class='btn btn-success btn-sm'>Genap</a></td>"+                  
	              "</tr>";
        		}
	            $('#show').html(html); 
                $('#tb').DataTable({
                    "columnDefs": [
                      { "orderable": false, "targets": 0 }
                    ]        
                  });          
	            $('#modal_detail').modal('show');                         
        	},
        	error: function (jqXHR, textStatus, errorThrown){
	            alert('Error get data from ajax');
	        }
    	});
	}
</script>