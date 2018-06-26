/*
SQLyog Enterprise - MySQL GUI v7.14 
MySQL - 5.6.25 : Database - db_penjualancecep
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_penjualancecep` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `db_penjualancecep`;

/*Table structure for table `tb_detservice` */

DROP TABLE IF EXISTS `tb_detservice`;

CREATE TABLE `tb_detservice` (
  `iddetailservice` int(11) NOT NULL AUTO_INCREMENT,
  `idservice` varchar(10) DEFAULT NULL,
  `idsparepart` varchar(5) DEFAULT NULL,
  `jumlahitem` int(11) DEFAULT NULL,
  `harga` double DEFAULT NULL,
  PRIMARY KEY (`iddetailservice`),
  KEY `FK_tb_detservice` (`idsparepart`),
  KEY `FK_tb_detservice1` (`idservice`),
  CONSTRAINT `FK_tb_detservice1` FOREIGN KEY (`idservice`) REFERENCES `tb_service` (`idservice`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tb_detservice_ibfk_1` FOREIGN KEY (`idsparepart`) REFERENCES `tb_sparepart` (`idsparepart`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `tb_detservice` */

insert  into `tb_detservice`(`iddetailservice`,`idservice`,`idsparepart`,`jumlahitem`,`harga`) values (5,'S00001','R0003',1,350000);

/*Table structure for table `tb_order` */

DROP TABLE IF EXISTS `tb_order`;

CREATE TABLE `tb_order` (
  `idorder` varchar(10) NOT NULL,
  `tglorder` date DEFAULT NULL,
  `idpelanggan` varchar(4) DEFAULT NULL,
  `ketkerusakan` text,
  `statusorder` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`idorder`),
  KEY `FK_tb_order` (`idpelanggan`),
  CONSTRAINT `FK_tb_order` FOREIGN KEY (`idpelanggan`) REFERENCES `tb_pelanggan` (`idpelanggan`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_order` */

insert  into `tb_order`(`idorder`,`tglorder`,`idpelanggan`,`ketkerusakan`,`statusorder`) values ('O0001','2016-11-18','P001','Tidak tampil gambarnya','SELESAI'),('O0002','2016-11-19','P001','Sering mati mendadak laptopnya','PROSES');

/*Table structure for table `tb_pelanggan` */

DROP TABLE IF EXISTS `tb_pelanggan`;

CREATE TABLE `tb_pelanggan` (
  `idpelanggan` char(4) NOT NULL,
  `nmpelanggan` varchar(30) DEFAULT NULL,
  `noktp` varchar(30) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `telp` varchar(12) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`idpelanggan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_pelanggan` */

insert  into `tb_pelanggan`(`idpelanggan`,`nmpelanggan`,`noktp`,`alamat`,`telp`,`email`,`password`) values ('P001','ASA','12345','Balam','123','m@mail','1'),('P002',NULL,'123','asd',NULL,'anisa.japal@gmail.com','123');

/*Table structure for table `tb_pengguna` */

DROP TABLE IF EXISTS `tb_pengguna`;

CREATE TABLE `tb_pengguna` (
  `idpengguna` char(4) NOT NULL,
  `nmpengguna` varchar(30) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `telp` varchar(12) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`idpengguna`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_pengguna` */

insert  into `tb_pengguna`(`idpengguna`,`nmpengguna`,`alamat`,`telp`,`email`,`password`) values ('U001','ccc','ccc','222','ccc','123');

/*Table structure for table `tb_penjualan` */

DROP TABLE IF EXISTS `tb_penjualan`;

CREATE TABLE `tb_penjualan` (
  `idpenjualan` varchar(10) NOT NULL,
  `tglpenjualan` date DEFAULT NULL,
  `idsparepart` varchar(5) NOT NULL,
  `jumlahitem` int(11) DEFAULT NULL,
  `harga` double DEFAULT NULL,
  PRIMARY KEY (`idpenjualan`,`idsparepart`),
  KEY `FK_tb_penjualan` (`idsparepart`),
  CONSTRAINT `tb_penjualan_ibfk_1` FOREIGN KEY (`idsparepart`) REFERENCES `tb_sparepart` (`idsparepart`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_penjualan` */

insert  into `tb_penjualan`(`idpenjualan`,`tglpenjualan`,`idsparepart`,`jumlahitem`,`harga`) values ('J00001','2016-11-19','R0001',1,80000),('J00002','2016-11-19','R0002',4,720000),('J00003','2016-11-19','R0005',10,1500000);

/*Table structure for table `tb_service` */

DROP TABLE IF EXISTS `tb_service`;

CREATE TABLE `tb_service` (
  `idservice` varchar(10) NOT NULL,
  `tglmulaiservice` date DEFAULT NULL,
  `tglselesaiservice` date DEFAULT NULL,
  `idorder` varchar(10) DEFAULT NULL,
  `idteknisi` char(4) DEFAULT NULL,
  `biaya` double DEFAULT NULL,
  PRIMARY KEY (`idservice`),
  KEY `FK_tb_service` (`idorder`),
  KEY `FK_tb_service1` (`idteknisi`),
  CONSTRAINT `FK_tb_service` FOREIGN KEY (`idorder`) REFERENCES `tb_order` (`idorder`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_tb_service1` FOREIGN KEY (`idteknisi`) REFERENCES `tb_teknisi` (`idteknisi`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_service` */

insert  into `tb_service`(`idservice`,`tglmulaiservice`,`tglselesaiservice`,`idorder`,`idteknisi`,`biaya`) values ('S00001','2016-11-01','2016-11-16','O0002','T001',300000);

/*Table structure for table `tb_sparepart` */

DROP TABLE IF EXISTS `tb_sparepart`;

CREATE TABLE `tb_sparepart` (
  `idsparepart` varchar(5) NOT NULL,
  `nmsparepart` varchar(30) DEFAULT NULL,
  `hargajual` double DEFAULT NULL,
  `gambar` text,
  `spesifikasi` text,
  PRIMARY KEY (`idsparepart`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_sparepart` */

insert  into `tb_sparepart`(`idsparepart`,`nmsparepart`,`hargajual`,`gambar`,`spesifikasi`) values ('R0001','Keyboard',80000,'20161119113133.jpeg','Keyboard QWERTY'),('R0002','Mouse',180000,'20161119113155.jpeg','Mouse Gaming'),('R0003','Motherboard',350000,'20161119113225.jpeg','Motherboard Asus'),('R0004','Flashdisk',80000,'20161119113327.jpeg','16 GB'),('R0005','LAN CARD',150000,'20161119113405.jpeg','Lan CARD CISCO'),('R0006','LCD',650000,'20161119113452.jpeg','LCD 14inch');

/*Table structure for table `tb_teknisi` */

DROP TABLE IF EXISTS `tb_teknisi`;

CREATE TABLE `tb_teknisi` (
  `idteknisi` char(4) NOT NULL,
  `nmteknisi` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`idteknisi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_teknisi` */

insert  into `tb_teknisi`(`idteknisi`,`nmteknisi`) values ('T001','ASACOM');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
