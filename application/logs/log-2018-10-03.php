<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2018-10-03 14:51:24 --> Query error: Table 'sisdemo.sis_bayar' doesn't exist - Invalid query: SELECT *
FROM `sis_bayar`
WHERE `id_transaksi` = '181003145124'
ERROR - 2018-10-03 14:51:24 --> Severity: Error --> Call to a member function result() on boolean C:\xampp\htdocs\CI_sis\application\controllers\Bayar.php 51
ERROR - 2018-10-03 14:52:15 --> Query error: Table 'sisdemo.sis_bayar' doesn't exist - Invalid query: SELECT *
FROM `sis_bayar`
WHERE `id_transaksi` = '181003145124'
ERROR - 2018-10-03 14:52:15 --> Severity: Error --> Call to a member function result() on boolean C:\xampp\htdocs\CI_sis\application\controllers\Bayar.php 51
ERROR - 2018-10-03 14:52:20 --> Severity: Notice --> Undefined variable: show C:\xampp\htdocs\CI_sis\application\views\keuangan\bayar_form.php 87
ERROR - 2018-10-03 14:52:20 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CI_sis\application\views\keuangan\bayar_form.php 87
ERROR - 2018-10-03 16:49:13 --> Severity: Notice --> Undefined variable: data C:\xampp\htdocs\CI_sis\application\views\keuangan\bayar_cetak.php 48
ERROR - 2018-10-03 16:49:13 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\CI_sis\application\views\keuangan\bayar_cetak.php 48
ERROR - 2018-10-03 11:51:01 --> Severity: Parsing Error --> syntax error, unexpected ';' C:\xampp\htdocs\CI_sis\application\controllers\Bayar.php 86
ERROR - 2018-10-03 21:03:30 --> Query error: No tables used - Invalid query: SELECT *
ERROR - 2018-10-03 21:03:30 --> Severity: Error --> Call to a member function result() on boolean C:\xampp\htdocs\CI_sis\application\controllers\Bayar.php 34
ERROR - 2018-10-03 21:04:50 --> Severity: Parsing Error --> syntax error, unexpected '?>', expecting identifier (T_STRING) or variable (T_VARIABLE) or '{' or '$' C:\xampp\htdocs\CI_sis\application\views\keuangan\bayar.php 28
ERROR - 2018-10-03 21:05:56 --> Severity: Notice --> Undefined variable: history C:\xampp\htdocs\CI_sis\application\views\keuangan\bayar.php 24
ERROR - 2018-10-03 21:05:56 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CI_sis\application\views\keuangan\bayar.php 24
ERROR - 2018-10-03 21:13:33 --> Query error: Unknown column 'sis_siswa.id_id_siswa' in 'on clause' - Invalid query: SELECT `sis_spp`.*, `sis_daftar`.`nama`, `sis_rombel`.`nama_rombel`
FROM `sis_spp`
JOIN `sis_siswa` ON `sis_siswa`.`id_id_siswa` = `sis_spp`.`id_siswa`
JOIN `sis_daftar` ON `sis_siswa`.`id_daftar` = `sis_daftar`.`id_daftar`
JOIN `sis_rombel` ON `sis_rombel`.`id_rombel` = `sis_siswa`.`id_rombel`
ORDER BY `sis_spp`.`id` DESC
ERROR - 2018-10-03 21:13:34 --> Severity: Error --> Call to a member function result() on boolean C:\xampp\htdocs\CI_sis\application\controllers\Bayar.php 34
ERROR - 2018-10-03 22:23:16 --> Severity: Notice --> Undefined variable: kelas C:\xampp\htdocs\CI_sis\application\views\keuangan\bayar_add.php 24
ERROR - 2018-10-03 22:23:16 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CI_sis\application\views\keuangan\bayar_add.php 24
ERROR - 2018-10-03 22:23:30 --> Severity: Notice --> Undefined variable: kelas C:\xampp\htdocs\CI_sis\application\views\keuangan\bayar_cari.php 24
ERROR - 2018-10-03 22:23:30 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CI_sis\application\views\keuangan\bayar_cari.php 24
