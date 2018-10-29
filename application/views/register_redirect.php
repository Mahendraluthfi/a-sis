<div id="pesan" align="center"></div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>
    var url = "<?php echo base_url() ?>"; // url tujuan
    var count = 5; // dalam detik
    function countDown() {
        if (count > 0) {
            count--;
            var waktu = count + 1;
            $('#pesan').html('Registrasi Berhasil<br>Anda akan di redirect dalam ' + waktu + ' detik.');
            setTimeout("countDown()", 1000);
        } else {
            window.location.href = url;
        }
    }
    countDown();
</script>