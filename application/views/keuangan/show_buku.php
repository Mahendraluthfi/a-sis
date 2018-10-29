<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Akun <?php  echo $nama; ?></h3>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Uraian</th>
                            <th class="text-right">Debet</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $total = 0;
                        foreach ($datadebet as $key1) { 
                        $total = $key1->debet + $total;
                            ?>
                        <tr>
                            <td><?php echo $key1->waktu ?></td>
                            <td><?php echo $key1->uraian ?></td>
                            <td class="text-right"><?php echo "Rp. ".number_format($key1->debet); ?></td>
                        </tr>
                    <?php } ?>
                        <tr>
                            <th>Jumlah Debet</th>
                            <td></td>
                            <th class="text-right"><?php echo "Rp. ".number_format($total); ?></th>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Uraian</th>
                            <th class="text-right">Kredit</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $total1 = 0;
                    foreach ($datakredit as $key2) { 
                    $total1 = $key2->kredit + $total1;                        
                        ?>
                        <tr>
                            <td><?php  echo $key2->waktu ?></td>
                            <td><?php  echo $key2->uraian ?></td>
                            <td class="text-right"><?php  echo "Rp. ".number_format($key2->kredit) ?></td>
                        </tr>
                    <?php } ?>
                        <tr>
                            <th>Jumlah Kredit</th>
                            <td></td>
                            <th class="text-right"><?php echo "Rp. ".number_format($total1); ?></th>                            
                        </tr>
                    </tbody>
                </table>
                                        
            </div>
        </div>
    </div>
    <div class="panel-footer">
        <?php if ($total > $total1) {
            $sel = $total - $total1;
            $text = 'Debet';
        }elseif ($total < $total1) {
            $sel = $total1 - $total;
            $text = 'Kredit';
        }else{
            $sel = $total1 - $total;
            $text = 'Balance';
        } ?>
        <h4>Total <?php echo "Rp. ".number_format($sel)." (".$text.")"; ?> </h4>
    </div>
</div>