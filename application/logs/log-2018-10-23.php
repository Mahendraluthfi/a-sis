<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2018-10-23 03:48:03 --> Severity: Error --> Maximum execution time of 30 seconds exceeded C:\xampp\htdocs\CI_sis\application\libraries\dompdf\lib\html5lib\Parser.php 3
ERROR - 2018-10-23 04:03:53 --> Severity: Warning --> mysqli::real_connect(): (HY000/2002): No connection could be made because the target machine actively refused it.
 C:\xampp\htdocs\CI_sis\system\database\drivers\mysqli\mysqli_driver.php 201
ERROR - 2018-10-23 04:03:54 --> Unable to connect to the database
ERROR - 2018-10-23 04:04:10 --> Severity: Error --> Maximum execution time of 30 seconds exceeded C:\xampp\htdocs\CI_sis\system\core\Loader.php 328
ERROR - 2018-10-23 04:04:48 --> Severity: Warning --> mysqli::real_connect(): (HY000/2002): No connection could be made because the target machine actively refused it.
 C:\xampp\htdocs\CI_sis\system\database\drivers\mysqli\mysqli_driver.php 201
ERROR - 2018-10-23 04:04:51 --> Unable to connect to the database
ERROR - 2018-10-23 04:04:53 --> Severity: Warning --> mysqli::real_connect(): (HY000/2002): No connection could be made because the target machine actively refused it.
 C:\xampp\htdocs\CI_sis\system\database\drivers\mysqli\mysqli_driver.php 201
ERROR - 2018-10-23 04:04:55 --> Unable to connect to the database
ERROR - 2018-10-23 04:04:56 --> Query error: No connection could be made because the target machine actively refused it.
 - Invalid query: SELECT *
FROM `sis_reg_user`
ERROR - 2018-10-23 04:04:56 --> Severity: Error --> Call to a member function num_rows() on boolean C:\xampp\htdocs\CI_sis\application\controllers\Login.php 10
ERROR - 2018-10-23 04:56:32 --> Severity: Warning --> mysqli::real_connect(): (HY000/2002): No connection could be made because the target machine actively refused it.
 C:\xampp\htdocs\CI_sis\system\database\drivers\mysqli\mysqli_driver.php 201
ERROR - 2018-10-23 04:56:32 --> Unable to connect to the database
ERROR - 2018-10-23 04:56:36 --> Severity: Warning --> mysqli::real_connect(): (HY000/2002): No connection could be made because the target machine actively refused it.
 C:\xampp\htdocs\CI_sis\system\database\drivers\mysqli\mysqli_driver.php 201
ERROR - 2018-10-23 04:56:36 --> Unable to connect to the database
ERROR - 2018-10-23 04:56:36 --> Query error: No connection could be made because the target machine actively refused it.
 - Invalid query: SELECT *
FROM `sis_reg_user`
ERROR - 2018-10-23 04:56:36 --> Severity: Error --> Call to a member function num_rows() on boolean C:\xampp\htdocs\CI_sis\application\controllers\Routes.php 15
ERROR - 2018-10-23 06:06:50 --> Query error: Table 'sisdemo.sis_reg_user' doesn't exist in engine - Invalid query: SELECT *
FROM `sis_reg_user`
ERROR - 2018-10-23 06:06:51 --> Severity: Error --> Call to a member function num_rows() on boolean C:\xampp\htdocs\ci_sis\application\controllers\Routes.php 15
ERROR - 2018-10-23 09:31:52 --> Query error: Unknown column 'status' in 'where clause' - Invalid query: SELECT *
FROM `sis_jenisbayar`
WHERE `status` = 1
ERROR - 2018-10-23 09:31:52 --> Severity: Error --> Call to a member function result() on boolean C:\xampp\htdocs\ci_sis\application\controllers\Jenisbayar.php 30
ERROR - 2018-10-23 14:57:12 --> Query error: Unknown column 'sis_pembayaran.id' in 'order clause' - Invalid query: SELECT `sis_pembayaran`.*, `sis_jenisbayar`.`kode_jenis`
FROM `sis_pembayaran`
JOIN `sis_jenisbayar` ON `sis_pembayaran`.`id_jenis` = `sis_jenisbayar`.`id`
WHERE `sis_pembayaran`.`id_siswa` = '1'
AND `sis_pembayaran`.`id_ta` = '1'
ORDER BY `sis_pembayaran`.`id` DESC
ERROR - 2018-10-23 14:57:12 --> Severity: Error --> Call to a member function result() on boolean C:\xampp\htdocs\ci_sis\application\controllers\Inputbayar.php 78
ERROR - 2018-10-23 15:12:12 --> Severity: Notice --> Undefined property: stdClass::$saldo_tabungan C:\xampp\htdocs\ci_sis\application\controllers\Tabungan.php 67
ERROR - 2018-10-23 15:12:12 --> Query error: Unknown column 'saldo_r' in 'field list' - Invalid query: INSERT INTO `sis_tabungandetail` (`id_tf`, `date`, `id_siswa`, `id_ta`, `debit`, `kredit`, `saldo_r`, `ket`) VALUES ('TB_181023151159', '2018-10-23', '2', '1', '0', '20000', 20000, '')
ERROR - 2018-10-23 15:12:12 --> Query error: Unknown column 'saldo_tabungan' in 'field list' - Invalid query: UPDATE `sis_siswa` SET `saldo_tabungan` = 20000
WHERE `id_siswa` = '2'
ERROR - 2018-10-23 15:12:13 --> Severity: Notice --> Undefined property: stdClass::$saldo_tabungan C:\xampp\htdocs\ci_sis\application\views\pembayaran\tabungan_view.php 32
ERROR - 2018-10-23 15:13:09 --> Query error: Unknown column 'saldo_r' in 'field list' - Invalid query: INSERT INTO `sis_tabungandetail` (`id_tf`, `date`, `id_siswa`, `id_ta`, `debit`, `kredit`, `saldo_r`, `ket`) VALUES ('TB_181023151257', '2018-10-23', '2', '1', '0', '20000', 20000, '')
ERROR - 2018-10-23 11:18:32 --> Severity: Parsing Error --> syntax error, unexpected '' (T_ENCAPSED_AND_WHITESPACE), expecting identifier (T_STRING) or variable (T_VARIABLE) or number (T_NUM_STRING) C:\xampp\htdocs\ci_sis\application\controllers\Inputbayar.php 187
ERROR - 2018-10-23 16:19:55 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ' 25, 0' at line 1 - Invalid query: SELECT sis_pembayaran.*, sis_jenisbayar.kode_jenis FROM sis_pembayaran JOIN sis_jenisbayar ON sis_pembayaran.id_jenis=sis_jenisbayar.id WHERE sis_pembayaran.id_siswa='2' AND sis_pembayaran.id_ta='1', 25, 0
ERROR - 2018-10-23 16:19:55 --> Severity: Error --> Call to a member function result() on boolean C:\xampp\htdocs\ci_sis\application\controllers\Inputbayar.php 187
ERROR - 2018-10-23 16:22:04 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ' LIMIT 25, 0' at line 1 - Invalid query: SELECT sis_pembayaran.*, sis_jenisbayar.kode_jenis FROM sis_pembayaran JOIN sis_jenisbayar ON sis_pembayaran.id_jenis=sis_jenisbayar.id WHERE sis_pembayaran.id_siswa='2' AND sis_pembayaran.id_ta='1', LIMIT 25, 0
ERROR - 2018-10-23 16:22:04 --> Severity: Error --> Call to a member function result() on boolean C:\xampp\htdocs\ci_sis\application\controllers\Inputbayar.php 187
