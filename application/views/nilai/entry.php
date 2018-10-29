<section class="content-header">
  <h1>
    Entry
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo base_url('dashboard') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>    
    <li><a href="<?php echo base_url('nilai') ?>">Input Nilai</a></li>
    <li class="active">Entry</li>
  </ol>
</section>

<section class="content">
	<div class="row">
    	<div class="col-xs-12">
        	<div class="box box-primary">            	         
            	<div class="box-body">
            		<?php foreach ($mapel as $key): ?>
            		<h4><?php echo $key->nama_mapel ?></h4>
            		<?php endforeach ?>
            		<?php foreach ($rombel as $key1): ?>
            		<h4><?php echo $key1->nama_rombel." (Semester ".$this->session->userdata('smt').")" ?></h4>
            		<?php endforeach ?>
            		<div class="row">
            			<div class="col-xs-6 col-sm-6 col-md-6">
		            		<table class="table table-hover" id="nilai">
		            			<thead>
		            				<tr class="active">
		            					<th width="1%">No</th>
		            					<th>NIS</th>
		            					<th>Nama Siswa</th> 
		            					<th></th>           					         					
		            				</tr>
		            			</thead>
		            			<tbody>
		            				<?php $no = 1; 
		            				foreach ($row as $data) { ?>
		            				<tr>
		            					<td><?php echo $no++; ?></td>
		            					<td><?php echo $data->nis ?></td>
		            					<td><?php echo $data->nama ?></td>            					
		            					<td>
		            						<button type="button" class="btn btn-danger btn-sm" onclick="lempar1('<?php echo $data->id_siswa ?>','<?php echo $this->session->userdata("idm") ?>','<?php echo $this->session->userdata("idr") ?>','<?php echo $this->session->userdata("smt") ?>')"><i class="glyphicon glyphicon-chevron-right"></i></button>
		            					</td>
		            				</tr>
		            				<?php } ?>
		            			</tbody>
		            		</table>		            		    
            			</div>
            			<div class="col-xs-6 col-sm-6 col-md-6">
						<!-- <div id="show_form">            				 -->
							<form action="#" method="POST" id="form" class="form-horizontal" role="form">
								<div class="form-group">
									<label class="control-label col-md-2">Nama</label>
									<div class="col-md-10">
										<p class="form-control-static" id="name"></p>									
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-2">NIS</label>
									<div class="col-md-10">
										<p class="form-control-static" id="nis"></p>
									</div>
								</div>								
								<div class="form-group">
									<label class="control-label col-md-2">NUH1</label>
									<div class="col-md-4">
										<input type="text" class="form-control" name="nuh1" maxlength="2" onkeyup="validAngka(this)" placeholder="Nilai Ulangan Harian 1">
									</div>
									<label class="control-label col-md-2">NT1</label>
									<div class="col-md-4">
										<input type="text" class="form-control" name="nt1" maxlength="2" onkeyup="validAngka(this)" placeholder="Nilai Tugas 1">
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-2">NUH2</label>
									<div class="col-md-4">
										<input type="text" class="form-control" name="nuh2" maxlength="2" onkeyup="validAngka(this)" placeholder="Nilai Ulangan Harian 2">
									</div>
									<label class="control-label col-md-2">NT2</label>
									<div class="col-md-4">
										<input type="text" class="form-control" name="nt2" maxlength="2" onkeyup="validAngka(this)" placeholder="Nilai Tugas 2">
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-2">NUH3</label>
									<div class="col-md-4">
										<input type="text" class="form-control" name="nuh3" maxlength="2" onkeyup="validAngka(this)" placeholder="Nilai Ulangan Harian 3">
									</div>
									<label class="control-label col-md-2">NT3</label>
									<div class="col-md-4">
										<input type="text" class="form-control" name="nt3" maxlength="2" onkeyup="validAngka(this)" placeholder="Nilai Tugas 3">
									</div>
								</div>		
								<div class="form-group">
									<label class="control-label col-md-2">MID</label>
									<div class="col-md-4">
										<input type="text" class="form-control" name="mid" maxlength="2" onkeyup="validAngka(this)" placeholder="Nilai UTS">
									</div>
									<label class="control-label col-md-2">SMT</label>
									<div class="col-md-4">
										<input type="text" class="form-control" name="smt" maxlength="2" onkeyup="validAngka(this)" placeholder="Nilai US">
									</div>
								</div>			
								<div class="form-group">
									<label class="control-label col-md-2">RNUH</label>
									<div class="col-md-4">
										<input type="text" class="form-control" id="rnuh" readonly="" placeholder="Rata Nilai Ulangan Harian">
									</div>
									<label class="control-label col-md-2">RNT</label>
									<div class="col-md-4">
										<input type="text" class="form-control" id="rnt" readonly="" placeholder="Rata Nilai Tugas">						
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-2">NH</label>
									<div class="col-md-4">
										<input type="text" class="form-control" id="nh" readonly="" placeholder="Nilai Harian">						
									</div>
									<label class="control-label col-md-2">NAR</label>
									<div class="col-md-4">
										<input type="text" class="form-control" id="nar" readonly="" placeholder="Nilai Akhir Raport">
									</div>
								</div>	
								<div class="form-group">
									 <div class="col-sm-offset-2 col-sm-10">										
									<button type="submit" class="btn btn-primary""><i class="glyphicon glyphicon-save"></i> Simpan</button>
									</div>
								</div>												
						</form>
            			<!-- </div> -->
						</div>
            		</div>
            	</div>
            </div>
        </div>
    </div>    
</section>

<script>
	var gids;
	var gidm;
	var gsmt;
	var idr;
    function lempar1(ids,idm,idr,smt) {
    	// body...
      	// reset form on modals  
    	var gids = ids;
    	var gidm = idm;
    	var gsmt = smt;
    	var action = '<?php echo base_url('nilai/simpan') ?>';
    	$.ajax({
         url : "<?php echo site_url('index.php/nilai/entry_where')?>/" + ids + "/" + idm + "/" + idr + "/" + smt,
         type: "GET",
         dataType: "JSON",
         success: function(data)
         {
          console.log(data)    
          var idr = data.id_rombel;     
      		$('#form')[0].reset();  	
             $('#name').text(data.nama);
             $('#nis').text(data.nis);
             $('#rnuh').val(data.rnuh);
             $('#nh').val(data.nh);
             $('#rnt').val(data.rnt);
             $('#nar').val(data.nar);
             $('[name="nuh2"]').val(data.nuh2);                        
             $('[name="nuh3"]').val(data.nuh3);                        
             $('[name="nuh1"]').val(data.nuh1);                        
             $('[name="nt1"]').val(data.nt1);                        
             $('[name="nt2"]').val(data.nt2);                        
             $('[name="nt3"]').val(data.nt3);                        
             $('[name="mid"]').val(data.mid);                        
             $('[name="smt"]').val(data.smt);                        
             // $('[name="id_siswa"]').val(data.id_siswa);                        
             // $('[name="id_rombel"]').val(data.id_rombel);                        
             // $('[name="id_mapel"]').val(data.id_mapel);    
             $('#form').attr('action', action);                    

        },
         error: function (jqXHR, textStatus, errorThrown)
         {
             alert('Error get data from ajax');
         }
     });	
    }
   //   function save(){
   //    		var url;                             
   //        url = "<?php echo site_url('index.php/nilai/simpan/')?>" + gids + "/" + gidm + "/" + gsmt + "/" + idr;                   
   //     // ajax adding data to database
   //        $.ajax({
   //          url : url,
   //          type: "POST",
   //          data: $('#form').serialize(),
   //          dataType: "JSON",
   //          success: function(data)
   //          {
   //             //if success close modal and reload ajax table
   //             //$('#modal_form').modal('hide');
   //            location.reload();// for reload a page
   //          },
   //          error: function (jqXHR, textStatus, errorThrown)
   //          {
   //              alert('Error adding / update data');
   //          }
   //      });      
   // }
</script>

