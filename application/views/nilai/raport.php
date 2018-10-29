<section class="content-header">
  <h1>
    Cetak Raport
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo base_url('dashboard') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>    
    <li class="active">Cetak Raport</li>
  </ol>
</section>

<section class="content">	
		<div class="row">
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
				<div class="list-group">
				<?php foreach ($rombel as $key) { ?>
				  	<button class="list-group-item list-group-item-success" onclick="show_siswa(<?php echo $key->id_rombel ?>)"><h4><?php echo $key->nama_rombel." / ".$key->nama_kelas." / ".$key->jml." Siswa" ?></h4></button>	  
				<?php } ?>
				</div>
			</div>
		<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9" id="box">
    	
    	 	
    	</div>
	</div>
</section>

<script>
	
	function show_siswa(id) {
		// body...
		$.ajax({
        url : "<?php echo site_url('index.php/cetaknilai/get_siswa')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
	        {
	            var html = '';
	            var html2 = '';
	            var html3 = '';
	            var i;
	            var no = 1;
	            html3 += "<div class='box box-primary'>" +            	         
            	"<div class='box-body'>" +
					"<div class='row'>" +
						"<div class='col-xs-12 col-sm-12 col-md-12 col-lg-12' id='table'>" +

						"</div>" +						
					"</div>" +
				"</div>" +
				"</div>";
			
	        	html2 += "<table class='table table-bordered table-hover' id='exa'>" +
	            	"<thead>" +
	            		"<tr class='active'>" +
	            			"<th width='1%'>No</th>" +
	            			"<th>NIS</th>" +
	            			"<th>Nama</th>" +	            			
	            			"<th width='25%'>Smt</th>" +	            			
	            		"</tr>"+
	            	"</thead>" +
	            	"<tbody id='show'>" +
	            		
	            	"</tbody>" +
	            "</table>";
	            for(i = 0; i < data.length; i++){
	            html += "<tr>"+
	              "<td>"+no+++"</td>"+
	              "<td>"+data[i].nis+"</td>"+	              
	              "<td>"+data[i].nama+"</td>"+	              
	              "<td>"+
	              "<div class='btn-group'><button type='button' class='btn btn-success'>Ganjil</button><button type='button' class='btn btn-success dropdown-toggle' data-toggle='dropdown'><span class='caret'></span><span class='sr-only'>Toggle Dropdown</span></button><ul class='dropdown-menu' role='menu'><li><a href='cetaknilai/raportpdf/"+data[i].id_siswa+"/"+data[i].id_rombel+"/1/pdf'><i class='glyphicon glyphicon-print'></i> Cetak PDF</a></li><li><a href='cetaknilai/raportpdf/"+data[i].id_siswa+"/"+data[i].id_rombel+"/1/excel'><i class='glyphicon glyphicon-print'></i> Cetak Excel</a></li></ul></div>&nbsp;"+
	              "<div class='btn-group'><button type='button' class='btn btn-success'>Genap</button><button type='button' class='btn btn-success dropdown-toggle' data-toggle='dropdown'><span class='caret'></span><span class='sr-only'>Toggle Dropdown</span></button><ul class='dropdown-menu' role='menu'><li><a href='cetaknilai/raportpdf/"+data[i].id_siswa+"/"+data[i].id_rombel+"/2/pdf'><i class='glyphicon glyphicon-print'></i> Cetak PDF</a></li><li><a href='cetaknilai/raportpdf/"+data[i].id_siswa+"/"+data[i].id_rombel+"/2/excel'><i class='glyphicon glyphicon-print'></i> Cetak Excel</a></li></ul></div>"+
	              "</td>"+ 
	              "</tr>";
        		}	       	                   	           
	            $('#box').html(html3);           	                    		     				
	            $('#table').html(html2);           	                    		     				
	            $('#show').html(html);   
      			$('#exa').DataTable();

        	},
        	error: function (jqXHR, textStatus, errorThrown){
	            alert('Error get data from ajax');
	        }
    	});
	}	

</script>