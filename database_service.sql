/*
SQLyog Ultimate v10.41 
MySQL - 5.5.27 : Database - db_service
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `service` */

DROP TABLE IF EXISTS `service`;

CREATE TABLE `service` (
  `ttr` varchar(30) NOT NULL,
  `id_user` int(20) DEFAULT NULL,
  `nama_konsumen` varchar(60) DEFAULT NULL,
  `tanggal_masuk` date DEFAULT NULL,
  `tanggal_estimasi` date DEFAULT NULL,
  `tanggal_setuju` date DEFAULT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `tanggal_ambil` date DEFAULT NULL,
  `merek` text,
  `model` varchar(30) DEFAULT NULL,
  `serial_number` varchar(40) DEFAULT NULL,
  `status_barang` varchar(20) DEFAULT NULL,
  `status_perbaikan` varchar(30) DEFAULT NULL,
  `tgl_estimasi_selesai` date DEFAULT NULL,
  `teknisi` text,
  `kelengkapan` text,
  PRIMARY KEY (`ttr`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `service` */

insert  into `service`(`ttr`,`id_user`,`nama_konsumen`,`tanggal_masuk`,`tanggal_estimasi`,`tanggal_setuju`,`tanggal_selesai`,`tanggal_ambil`,`merek`,`model`,`serial_number`,`status_barang`,`status_perbaikan`,`tgl_estimasi_selesai`,`teknisi`,`kelengkapan`) values ('TR0005',1,'Bejo',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('TR00024',1,'Bejo','0000-00-00','0000-00-00','0000-00-00','0000-00-00','0000-00-00','SONY','','','','BARU DITERIMA',NULL,'',''),('TR00023',1,'Andika','2013-06-04','0000-00-00','0000-00-00','0000-00-00','0000-00-00','SAMSUNG','','','','BARU DITERIMA',NULL,'','');

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id_user` int(20) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(20) NOT NULL,
  `password` varchar(20) DEFAULT NULL,
  `nama_user` varchar(60) DEFAULT NULL,
  `alamat_user` text,
  `telepon_user` varchar(60) DEFAULT NULL,
  `level` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id_user`,`user_name`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`id_user`,`user_name`,`password`,`nama_user`,`alamat_user`,`telepon_user`,`level`) values (1,'admin','admin','Andika','Jl.Depok Raya No.5','08988450694','1'),(3,'andika','andika','Andika Sulis Pratama','','','2'),(4,'Bejo','bejo','Bejo','','','2');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
