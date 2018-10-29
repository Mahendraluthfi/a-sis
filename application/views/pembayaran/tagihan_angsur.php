<?php echo form_open('inputbayar/save_tagihan', array('class' => 'form-horizontal')); ?>
        <?php foreach ($row as $data) { ?>
        <div class="form-group">
        <label class="control-label col-md-2">Nama</label>
        <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
        <p class="form-control-static"><?php echo $data->nama ?></p>
        </div>
        <label class="control-label col-md-2">Rombel</label>
        <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
        <p class="form-control-static"><?php echo $data->nama_rombel ?></p>
        </div>
        <label class="control-label col-md-2">Jenis Tagihan</label>
        <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
        <p class="form-control-static"><?php echo $data->nama_pilihan ?></p>
        </div>
        <label class="control-label col-md-2">Tagihan</label>
        <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
        <p class="form-control-static"><?php echo "Rp. ".number_format($data->tagihan) ?></p>
        </div>
        <label class="control-label col-md-2">Sisa</label>
        <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
        <p class="form-control-static"><?php echo "Rp. ".number_format($data->sisa) ?></p>
        <input type="hidden" name="tagihan" value="<?php echo $data->sisa ?>">
        <input type="hidden" name="idjenis" value="<?php echo $data->nama_pilihan ?>">
        <input type="hidden" name="tipe" value="2">        
        <input type="hidden" name="ids" value="<?php echo $this->uri->segment(3) ?>">        
        </div>
        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
        <button type="submit" class="btn btn-primary btn-sm">Insert Tagihan</button>
        </div>
        </div>                          
        <?php } ?>
</form>