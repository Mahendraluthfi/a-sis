<section class="content-header">
  <h1>
    <i class="fa fa-key"></i> Hak Akses  
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo base_url('dashboard') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>    
    <li><a href="<?php echo base_url('setting') ?>"><i class="glyphicon glyphicon-cog"></i>Setting</a></li>
    <li class="active">Hak Akses</li>
  </ol>
</section>

<section class="content">
	<div class="row">
		<div class="col-sm-12 col-md-12">
        	<div class="box">
        		<?php echo form_open('setting/hakakses/'.$this->uri->segment(3)); ?>
            	<div class="box-header">
              		<h3 class="box-title"><?php echo $this->uri->segment(3); ?></h3>
              		<div class="pull-right">
              			<button type="submit" class="btn btn-success">Simpan</button>
              		</div>
            	</div>
            <!-- /.box-header -->
            	<div class="box-body">
            		<ul class="list-unstyled">
        			 <?php 
            	 	 $sid = $this->uri->segment(3);        			 
        			 $main = $this->db->query("SELECT *, sis_modul.id_modul as idm FROM sis_modul left JOIN (SELECT * FROM sis_privilage WHERE id_akses='$sid') as jajal ON sis_modul.id_modul=jajal.id_modul where ktg='0'");        			 
                foreach ($main->result() as $m) {        	        
                    // chek ada submenu atau tidak
                    $sub = $this->db->query("SELECT *, sis_modul.id_modul as idm FROM sis_modul left JOIN (SELECT * FROM sis_privilage WHERE id_akses='$sid') as jajal ON sis_modul.id_modul=jajal.id_modul WHERE ktg = '$m->idm'");
                    // $s_array = $sub->result_array();
                    if ($sub->num_rows() > 0) { ?>
                        <!-- ini menu           -->
                        <li>
                        <?php echo $m->nama_span; ?>  
                          <ul>
                        <?php foreach ($sub->result() as $s) { ?>
                        <!-- ini submenu -->                        
                          <li><input type="checkbox" name="cb[<?php echo $s->idm ?>]" <?php if(!empty($s->id)){echo "checked=''";} ?>>
                        	<?php echo $s->nama_span; ?>                                    
                          </li>  
                       <?php }
                       echo "</ul></li>";
                     	} else { ?> 
                        <!-- in single menu --> 
                       <li><input type="checkbox" name="cb[<?php echo $m->id_modul ?>]" <?php if(!empty($m->id)){echo "checked=''";} ?>>
                        <?php echo $m->nama_span; ?>                         	
                       </li>                                                  
                      <?php }} ?>		                
		              </ul><?php echo form_close(); ?>
            	</div>
            </div>
        
		</div>
	</div>
</section>