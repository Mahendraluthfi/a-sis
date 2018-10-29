<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2018-10-24 05:47:25 --> Query error: Unknown column 'status' in 'where clause' - Invalid query: SELECT *
FROM `sis_jenisbayar`
WHERE `status` = 1
ERROR - 2018-10-24 05:47:25 --> Severity: Error --> Call to a member function result() on boolean C:\xampp\htdocs\ci_sis\application\controllers\Jenisbayar.php 30
ERROR - 2018-10-24 05:53:14 --> Severity: Notice --> Undefined variable: id C:\xampp\htdocs\ci_sis\application\controllers\Pilihbayar.php 36
ERROR - 2018-10-24 11:11:45 --> Query error: Unknown column 'date' in 'field list' - Invalid query: INSERT INTO `sis_pembayaran` (`id_tf`, `date`, `id_siswa`, `id_ta`, `id_jenis`, `bayar`, `ket`) VALUES ('INV10244VB1145', '2018-10-24', '1', '1', '1', '125000', 'Spp Jul')
ERROR - 2018-10-24 15:16:21 --> Severity: Notice --> Undefined property: Inputbayar::$m_anggota C:\xampp\htdocs\ci_sis\application\controllers\Inputbayar.php 77
ERROR - 2018-10-24 15:16:21 --> Severity: Error --> Call to a member function get_kelas() on null C:\xampp\htdocs\ci_sis\application\controllers\Inputbayar.php 77
