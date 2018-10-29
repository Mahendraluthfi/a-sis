<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2018-10-15 05:53:45 --> Query error: Column 'status' in where clause is ambiguous - Invalid query: SELECT `sis_pilihanbayar`.*, `sis_jenisbayar`.`kode_jenis`, `sis_kelas`.`nama_kelas`
FROM (`sis_pilihanbayar`, `sis_tahunajaran`)
JOIN `sis_jenisbayar` ON `sis_pilihanbayar`.`id_jenis` = `sis_jenisbayar`.`id`
JOIN `sis_kelas` ON `sis_pilihanbayar`.`id_kelas` = `sis_kelas`.`id_kelas`
WHERE `sis_pilihanbayar`.`status` = '1'
AND `status` = 'AKTIF'
ERROR - 2018-10-15 05:53:45 --> Severity: Error --> Call to a member function result() on boolean C:\xampp\htdocs\CI_sis\application\models\M_bayar.php 8
ERROR - 2018-10-15 05:55:12 --> Query error: Column 'status' in where clause is ambiguous - Invalid query: SELECT `sis_pilihanbayar`.*, `sis_jenisbayar`.`kode_jenis`, `sis_kelas`.`nama_kelas`
FROM (`sis_pilihanbayar`, `sis_tahunajaran`)
JOIN `sis_jenisbayar` ON `sis_pilihanbayar`.`id_jenis` = `sis_jenisbayar`.`id`
JOIN `sis_kelas` ON `sis_pilihanbayar`.`id_kelas` = `sis_kelas`.`id_kelas`
WHERE `sis_pilihanbayar`.`status` = '1'
AND `status` = 'AKTIF'
ERROR - 2018-10-15 05:55:12 --> Severity: Error --> Call to a member function result() on boolean C:\xampp\htdocs\CI_sis\application\models\M_bayar.php 8
ERROR - 2018-10-15 06:11:37 --> Query error: Column 'status' in where clause is ambiguous - Invalid query: SELECT `sis_pilihanbayar`.*, `sis_jenisbayar`.`kode_jenis`, `sis_kelas`.`nama_kelas`
FROM (`sis_pilihanbayar`, `sis_tahunajaran`)
JOIN `sis_jenisbayar` ON `sis_pilihanbayar`.`id_jenis` = `sis_jenisbayar`.`id`
JOIN `sis_kelas` ON `sis_pilihanbayar`.`id_kelas` = `sis_kelas`.`id_kelas`
WHERE `sis_pilihanbayar`.`status` = '1'
AND `status` = 'AKTIF'
ERROR - 2018-10-15 06:11:37 --> Severity: Error --> Call to a member function result() on boolean C:\xampp\htdocs\CI_sis\application\models\M_bayar.php 8
ERROR - 2018-10-15 06:13:02 --> Severity: Parsing Error --> syntax error, unexpected 'function' (T_FUNCTION), expecting ',' or ';' C:\xampp\htdocs\CI_sis\application\models\M_bayar.php 7
ERROR - 2018-10-15 06:18:58 --> Severity: Warning --> Missing argument 1 for M_bayar::get_pilihanbayar(), called in C:\xampp\htdocs\CI_sis\application\controllers\Setbayar.php on line 31 and defined C:\xampp\htdocs\CI_sis\application\models\M_bayar.php 65
ERROR - 2018-10-15 06:18:58 --> Severity: Notice --> Undefined variable: id C:\xampp\htdocs\CI_sis\application\models\M_bayar.php 72
ERROR - 2018-10-15 06:19:05 --> Severity: Error --> Class 'CI_Pdf' not found C:\xampp\htdocs\CI_sis\system\core\Common.php 196
ERROR - 2018-10-15 06:19:46 --> Severity: Warning --> Missing argument 1 for M_bayar::get_pilihanbayar(), called in C:\xampp\htdocs\CI_sis\application\controllers\Setbayar.php on line 31 and defined C:\xampp\htdocs\CI_sis\application\models\M_bayar.php 65
ERROR - 2018-10-15 06:19:46 --> Severity: Notice --> Undefined variable: id C:\xampp\htdocs\CI_sis\application\models\M_bayar.php 72
ERROR - 2018-10-15 08:24:58 --> Severity: Error --> Call to a member function result() on null C:\xampp\htdocs\CI_sis\application\controllers\Setbayar.php 52
ERROR - 2018-10-15 08:39:31 --> Query error: Unknown column 'sis_daftar.nama' in 'field list' - Invalid query: SELECT `sis_siswa`.*, `sis_daftar`.`nama`
FROM `sis_siswa`
JOIN `sis_rombel` ON `sis_rombel`.`id_rombel` = `sis_siswa`.`id_rombel`
JOIN `sis_kelas` ON `sis_rombel`.`id_kelas` = `sis_kelas`.`id_kelas`
WHERE `sis_kelas`.`id_kelas` = '1'
ERROR - 2018-10-15 08:39:31 --> Severity: Error --> Call to a member function result() on boolean C:\xampp\htdocs\CI_sis\application\controllers\Setbayar.php 52
ERROR - 2018-10-15 08:39:42 --> Query error: Unknown column 'sis_daftar.nama' in 'field list' - Invalid query: SELECT `sis_siswa`.*, `sis_daftar`.`nama`
FROM `sis_siswa`
JOIN `sis_rombel` ON `sis_rombel`.`id_rombel` = `sis_siswa`.`id_rombel`
JOIN `sis_kelas` ON `sis_rombel`.`id_kelas` = `sis_kelas`.`id_kelas`
WHERE `sis_kelas`.`id_kelas` = '1'
ERROR - 2018-10-15 08:39:42 --> Severity: Error --> Call to a member function result() on boolean C:\xampp\htdocs\CI_sis\application\controllers\Setbayar.php 52
ERROR - 2018-10-15 09:14:47 --> Severity: Parsing Error --> syntax error, unexpected '?>' C:\xampp\htdocs\CI_sis\application\views\pembayaran\config.php 43
ERROR - 2018-10-15 09:14:59 --> Severity: Parsing Error --> syntax error, unexpected '?>' C:\xampp\htdocs\CI_sis\application\views\pembayaran\config.php 43
ERROR - 2018-10-15 09:35:06 --> Severity: Notice --> Undefined variable: a C:\xampp\htdocs\CI_sis\application\views\pembayaran\config.php 43
ERROR - 2018-10-15 09:35:06 --> Severity: Notice --> Undefined variable: b C:\xampp\htdocs\CI_sis\application\views\pembayaran\config.php 44
ERROR - 2018-10-15 09:35:06 --> Severity: Notice --> Undefined variable: c C:\xampp\htdocs\CI_sis\application\views\pembayaran\config.php 45
ERROR - 2018-10-15 09:35:06 --> Severity: Notice --> Undefined variable: a C:\xampp\htdocs\CI_sis\application\views\pembayaran\config.php 43
ERROR - 2018-10-15 09:35:06 --> Severity: Notice --> Undefined variable: b C:\xampp\htdocs\CI_sis\application\views\pembayaran\config.php 44
ERROR - 2018-10-15 09:35:06 --> Severity: Notice --> Undefined variable: c C:\xampp\htdocs\CI_sis\application\views\pembayaran\config.php 45
ERROR - 2018-10-15 09:35:06 --> Severity: Notice --> Undefined variable: a C:\xampp\htdocs\CI_sis\application\views\pembayaran\config.php 43
ERROR - 2018-10-15 09:35:06 --> Severity: Notice --> Undefined variable: b C:\xampp\htdocs\CI_sis\application\views\pembayaran\config.php 44
ERROR - 2018-10-15 09:35:07 --> Severity: Notice --> Undefined variable: c C:\xampp\htdocs\CI_sis\application\views\pembayaran\config.php 45
ERROR - 2018-10-15 09:46:12 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\CI_sis\application\controllers\Setbayar.php 70
ERROR - 2018-10-15 09:46:12 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\CI_sis\application\controllers\Setbayar.php 70
ERROR - 2018-10-15 09:46:13 --> Severity: Notice --> Trying to get property of non-object C:\xampp\htdocs\CI_sis\application\controllers\Setbayar.php 70
ERROR - 2018-10-15 09:59:55 --> Severity: Error --> Call to undefined function print_f() C:\xampp\htdocs\CI_sis\application\controllers\Setbayar.php 70
ERROR - 2018-10-15 11:37:46 --> Severity: Parsing Error --> syntax error, unexpected end of file, expecting function (T_FUNCTION) C:\xampp\htdocs\CI_sis\application\controllers\Setbayar.php 83
ERROR - 2018-10-15 11:38:03 --> Severity: Parsing Error --> syntax error, unexpected end of file, expecting function (T_FUNCTION) C:\xampp\htdocs\CI_sis\application\controllers\Setbayar.php 83
ERROR - 2018-10-15 11:38:16 --> Severity: Parsing Error --> syntax error, unexpected end of file, expecting function (T_FUNCTION) C:\xampp\htdocs\CI_sis\application\controllers\Setbayar.php 83
ERROR - 2018-10-15 11:38:44 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CI_sis\application\controllers\Setbayar.php 73
ERROR - 2018-10-15 11:39:02 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CI_sis\application\controllers\Setbayar.php 73
ERROR - 2018-10-15 11:39:41 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\CI_sis\application\controllers\Setbayar.php 73
