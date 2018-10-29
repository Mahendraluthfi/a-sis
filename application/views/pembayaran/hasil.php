<table class="table table-bordered table-hover" id="example">
    <thead>
        <tr>
            <th>Tanggal</th>
            <th>IDTransaksi</th>
            <th>Nama/Rombel</th>
            <th>Jenis_Bayar</th>
            <th>Keterangan</th>
            <th>Nominal</th>
            <th>User</th>                           
        </tr>
    </thead>
    <tbody>
        <?php foreach ($row as $rows) { ?>
        
            <tr>
                <td><?php echo $rows->tgl ?></td>
                <td><?php echo $rows->id_transaksi ?></td>
                <td><?php echo $rows->nama.'/'.$rows->nama_rombel ?></td>
                <td><?php echo $rows->jenis ?></td>
                <td><?php echo $rows->keterangan ?></td>
                <td><?php echo number_format($rows->nominal) ?></td>
                <td><?php echo $rows->user ?></td>
            </tr>
        
        <?php } ?>
    </tbody>
</table>