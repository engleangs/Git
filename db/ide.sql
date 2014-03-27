/*
SQLyog Enterprise - MySQL GUI v8.18 
MySQL - 5.5.8-log : Database - ide
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`ide` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `ide`;

/*Table structure for table `cavendors` */

DROP TABLE IF EXISTS `cavendors`;

CREATE TABLE `cavendors` (
  `ca_code` varchar(100) NOT NULL,
  `vendor_code` varchar(100) NOT NULL,
  PRIMARY KEY (`ca_code`,`vendor_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `cavendors` */

insert  into `cavendors`(`ca_code`,`vendor_code`) values ('CA0001','A001'),('CA0001','VD0002'),('CA0001','VD0003'),('CA0002','VD0002'),('CA0003','A001');

/*Table structure for table `clientfielddays` */

DROP TABLE IF EXISTS `clientfielddays`;

CREATE TABLE `clientfielddays` (
  `client_field_id` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` varchar(255) DEFAULT NULL,
  `nonclient_id` varchar(255) DEFAULT NULL,
  `field_day_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`client_field_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

/*Data for the table `clientfielddays` */

insert  into `clientfielddays`(`client_field_id`,`client_id`,`nonclient_id`,`field_day_id`) values (16,'A001.001',NULL,5),(17,NULL,'NC0001',5);

/*Table structure for table `clientmeetings` */

DROP TABLE IF EXISTS `clientmeetings`;

CREATE TABLE `clientmeetings` (
  `clientmeeting_id` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` varchar(255) DEFAULT NULL,
  `meeting_id` int(11) DEFAULT NULL,
  `vendor_code` varchar(255) DEFAULT NULL,
  `nonclient_id` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`clientmeeting_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

/*Data for the table `clientmeetings` */

insert  into `clientmeetings`(`clientmeeting_id`,`client_id`,`meeting_id`,`vendor_code`,`nonclient_id`) values (19,'A001.001',2,NULL,NULL),(20,NULL,2,NULL,'NC0001'),(21,NULL,2,'CA0001',NULL);

/*Table structure for table `clients` */

DROP TABLE IF EXISTS `clients`;

CREATE TABLE `clients` (
  `client_id` varchar(50) NOT NULL,
  `client_name_kh` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `client_date_of_birth` date DEFAULT NULL,
  `client_datestarted` date DEFAULT NULL,
  `client_name_en` varchar(255) DEFAULT NULL,
  `client_gender` varchar(50) DEFAULT NULL,
  `client_phone` varchar(100) DEFAULT NULL,
  `phum_code` varchar(100) DEFAULT NULL,
  `client_date_ended` date DEFAULT NULL,
  `state` int(11) DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `modified_by` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`client_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `clients` */

insert  into `clients`(`client_id`,`client_name_kh`,`client_date_of_birth`,`client_datestarted`,`client_name_en`,`client_gender`,`client_phone`,`phum_code`,`client_date_ended`,`state`,`created`,`modified`,`created_by`,`modified_by`) values ('A001.001','ស្រីលក្ខ័','1947-04-08','2014-02-05','Sreyleak','Female','0764322342','A001',NULL,1,NULL,'2014-03-20 04:14:47',NULL,'A001'),('A001.002','សុនលី','1985-02-04','2014-03-24','Sunly','Male','098765442','A001','2014-03-24',1,'2014-03-24 02:55:52','2014-03-24 02:55:52','A001',NULL),('A002.001','អេងលាង','1991-04-03','2014-02-04','Engleang','Male','098567346','A001',NULL,1,NULL,'2014-02-27 07:54:07',NULL,'A001'),('A002.002','ឃុនឡាង','1993-06-08','2014-02-03','khornlang','Male','070564322','A002',NULL,1,NULL,NULL,NULL,NULL),('A002.003','44','2014-03-20','2014-03-20','44','Female','44','A002','2014-03-20',0,'2014-03-20 10:27:02','2014-03-20 10:27:02','A001',NULL),('A002.004','1','2014-03-24','2014-03-24','1','Female','1','A002','2014-03-24',1,'2014-03-24 02:03:39','2014-03-24 02:03:39','A001',NULL),('A002.005','2','2014-03-24','2014-03-24','2','Female','2','A002','2014-03-24',0,'2014-03-24 02:55:12','2014-03-24 02:55:12','A001',NULL),('A003.001','លក្ខិណា','2014-02-03','2014-02-01','Leakena','Female','015672424','A003',NULL,1,NULL,NULL,NULL,NULL),('A003.003','','1990-07-02','2014-03-24','Tong Sreymom','Female','069666950','A003','2014-03-24',1,'2014-03-24 02:05:30','2014-03-24 02:05:30','A001',NULL);

/*Table structure for table `clienttrainings` */

DROP TABLE IF EXISTS `clienttrainings`;

CREATE TABLE `clienttrainings` (
  `clienttraining_id` int(11) NOT NULL AUTO_INCREMENT,
  `training_id` int(11) DEFAULT NULL,
  `client_id` varchar(255) DEFAULT NULL,
  `vendor_code` varchar(255) DEFAULT NULL,
  `nonclient_id` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`clienttraining_id`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=latin1;

/*Data for the table `clienttrainings` */

insert  into `clienttrainings`(`clienttraining_id`,`training_id`,`client_id`,`vendor_code`,`nonclient_id`) values (63,6,'A001.001',NULL,NULL),(64,6,'A002.002',NULL,NULL),(65,6,NULL,NULL,'NC0003'),(66,6,NULL,NULL,'NC0001'),(67,6,NULL,'CA0001',NULL),(68,6,NULL,'CA0002',NULL);

/*Table structure for table `clientvendors` */

DROP TABLE IF EXISTS `clientvendors`;

CREATE TABLE `clientvendors` (
  `client_id` varchar(100) NOT NULL,
  `vendor_code` varchar(100) NOT NULL,
  `clientvendor_datestarted` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `clientvendors` */

insert  into `clientvendors`(`client_id`,`vendor_code`,`clientvendor_datestarted`) values ('A002.001','FBA0003','2014-03-20'),('A002.002','FBA0003','2014-03-20'),('A002.003','FBA0001','2014-03-21'),('A002.004','FBA0003','2014-03-05'),('A003.003','FBA0001','2014-03-24'),('A002.005','FBA0003','2014-03-24'),('A001.002','FBA0001','2014-03-24');

/*Table structure for table `commercialagronomists` */

DROP TABLE IF EXISTS `commercialagronomists`;

CREATE TABLE `commercialagronomists` (
  `ca_code` varchar(100) NOT NULL,
  PRIMARY KEY (`ca_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `commercialagronomists` */

insert  into `commercialagronomists`(`ca_code`) values ('1'),('CA0001'),('CA0002'),('CA0003');

/*Table structure for table `crops` */

DROP TABLE IF EXISTS `crops`;

CREATE TABLE `crops` (
  `crop_code` varchar(50) NOT NULL,
  `crop_name_en` varchar(100) DEFAULT NULL,
  `crop_name_kh` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `crop_season` varchar(255) DEFAULT NULL,
  `crop_type` varchar(100) DEFAULT NULL,
  `product_code` varchar(100) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `modified_by` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`crop_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `crops` */

insert  into `crops`(`crop_code`,`crop_name_en`,`crop_name_kh`,`crop_season`,`crop_type`,`product_code`,`created`,`modified`,`created_by`,`modified_by`) values ('1','1','1','','vegetable','1','2014-03-13 07:34:39','2014-03-13 07:59:49','A001','A001'),('C0001','Rice','ស្រូវ','wetseason','rice','P00001','0000-00-00 00:00:00','2014-02-27 07:14:59','','A001'),('C0002','Corn','',NULL,'rice','20PEST-Actara','0000-00-00 00:00:00','2014-02-27 07:15:04','','A001'),('C0004','Cucumber ','',NULL,'vegetable','20PEST-Actara','0000-00-00 00:00:00','2014-02-27 07:15:16','','A001'),('C0005','Lemon','',NULL,'vegetable','20PEST-Actara','2014-02-24 00:00:00','2014-02-24 00:00:00',NULL,NULL);

/*Table structure for table `fbas` */

DROP TABLE IF EXISTS `fbas`;

CREATE TABLE `fbas` (
  `fba_code` varchar(100) NOT NULL,
  `ca_code` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`fba_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `fbas` */

insert  into `fbas`(`fba_code`,`ca_code`) values ('2','1'),('FBA0001','CA0001'),('FBA0002','CA0003'),('FBA0003','CA0003');

/*Table structure for table `fbavendors` */

DROP TABLE IF EXISTS `fbavendors`;

CREATE TABLE `fbavendors` (
  `fba_code` varchar(100) NOT NULL,
  `vendor_code` varchar(100) NOT NULL,
  PRIMARY KEY (`fba_code`,`vendor_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `fbavendors` */

insert  into `fbavendors`(`fba_code`,`vendor_code`) values ('FBA0001','VD0001');

/*Table structure for table `fielddays` */

DROP TABLE IF EXISTS `fielddays`;

CREATE TABLE `fielddays` (
  `field_day_id` int(11) NOT NULL AUTO_INCREMENT,
  `responsible_staff` varchar(255) DEFAULT NULL,
  `type_of_events` varchar(255) DEFAULT NULL,
  `field_day_date` date DEFAULT NULL,
  `field_day_subject` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `modified_by` varchar(255) DEFAULT NULL,
  `plot_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`field_day_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `fielddays` */

/*Table structure for table `harvestrices` */

DROP TABLE IF EXISTS `harvestrices`;

CREATE TABLE `harvestrices` (
  `harvestrice_id` int(11) NOT NULL AUTO_INCREMENT,
  `harvestrice_date` date DEFAULT NULL,
  `harvestrice_quadrat_size_m2` float DEFAULT NULL,
  `harvestrice_price` float DEFAULT NULL,
  `harvestrice_q1_weight_kg` float DEFAULT NULL,
  `harvestrice_q1_moisture_%` float DEFAULT NULL,
  `harvestrice_q2_weight_kg` float DEFAULT NULL,
  `harvestrice_q2_moisture_%` float DEFAULT NULL,
  `harvestrice_q3_weight_kg` float DEFAULT NULL,
  `harvestrice_q3_moisture_%` float DEFAULT NULL,
  `harvestrice_completed` tinyint(1) DEFAULT NULL,
  `plot_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `modified_by` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`harvestrice_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `harvestrices` */

insert  into `harvestrices`(`harvestrice_id`,`harvestrice_date`,`harvestrice_quadrat_size_m2`,`harvestrice_price`,`harvestrice_q1_weight_kg`,`harvestrice_q1_moisture_%`,`harvestrice_q2_weight_kg`,`harvestrice_q2_moisture_%`,`harvestrice_q3_weight_kg`,`harvestrice_q3_moisture_%`,`harvestrice_completed`,`plot_id`,`created`,`modified`,`created_by`,`modified_by`) values (4,'2014-02-01',9,5,10,10,10,10,10,10,0,1,'2014-02-26 07:49:19','2014-03-03 06:42:19','A001','A001');

/*Table structure for table `harvestvegetables` */

DROP TABLE IF EXISTS `harvestvegetables`;

CREATE TABLE `harvestvegetables` (
  `harvestvegetable_id` int(11) NOT NULL AUTO_INCREMENT,
  `harvestvegetable_quantity_kg` float DEFAULT NULL,
  `harvestvegetable_price_usd` float DEFAULT NULL,
  `harvestvegetable_surface_m2` float DEFAULT NULL,
  `harvestvegetable_date` date DEFAULT NULL,
  `harvestvegetable_completed` tinyint(1) DEFAULT NULL,
  `plot_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `modified_by` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`harvestvegetable_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `harvestvegetables` */

insert  into `harvestvegetables`(`harvestvegetable_id`,`harvestvegetable_quantity_kg`,`harvestvegetable_price_usd`,`harvestvegetable_surface_m2`,`harvestvegetable_date`,`harvestvegetable_completed`,`plot_id`,`created`,`modified`,`created_by`,`modified_by`) values (5,100,100,1000,'2014-03-05',0,3,'2014-03-05 09:10:36','2014-03-05 09:10:36','A001',NULL);

/*Table structure for table `khets` */

DROP TABLE IF EXISTS `khets`;

CREATE TABLE `khets` (
  `khet_code` varchar(50) NOT NULL,
  `khet_name_en` varchar(50) DEFAULT NULL,
  `khet_name_kh` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `modified_by` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`khet_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `khets` */

insert  into `khets`(`khet_code`,`khet_name_en`,`khet_name_kh`,`created`,`modified`,`created_by`,`modified_by`) values ('A004','KompongCham','កំពង់ចាម',NULL,'2014-02-27 03:40:12',NULL,'A001'),('A005','Svay Reang','ស្វាយរៀង',NULL,'2014-02-27 03:39:58',NULL,'A001'),('A006','Kondal','កណ្តាល',NULL,NULL,NULL,NULL);

/*Table structure for table `khums` */

DROP TABLE IF EXISTS `khums`;

CREATE TABLE `khums` (
  `khum_code` varchar(20) NOT NULL,
  `khum_name_en` varchar(50) DEFAULT NULL,
  `khum_name_kh` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `srok_code` varchar(50) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `modified_by` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`khum_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `khums` */

insert  into `khums`(`khum_code`,`khum_name_en`,`khum_name_kh`,`srok_code`,`created`,`modified`,`created_by`,`modified_by`) values ('A001','prey chhor','ព្រៃឈរ','A001',NULL,NULL,NULL,NULL),('A002','peam brotnos','ពាមប្រធ្នោះ','A002',NULL,NULL,NULL,NULL),('A003','kroual kou','ក្រោលគោ','A003',NULL,NULL,NULL,NULL),('A004','tontle touch','ទន្លេរតូច','A004',NULL,NULL,NULL,NULL);

/*Table structure for table `laborexpenses` */

DROP TABLE IF EXISTS `laborexpenses`;

CREATE TABLE `laborexpenses` (
  `laborexpense_id` int(11) NOT NULL AUTO_INCREMENT,
  `laborexpense_date` date DEFAULT NULL,
  `laborexpense_quantity` int(11) DEFAULT NULL,
  `laborexpense_price_usd` float DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `modified_by` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`laborexpense_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `laborexpenses` */

insert  into `laborexpenses`(`laborexpense_id`,`laborexpense_date`,`laborexpense_quantity`,`laborexpense_price_usd`,`created`,`modified`,`created_by`,`modified_by`) values (5,'2014-03-03',100,10,'2014-03-03 07:47:49','2014-03-03 07:48:20','A001','A001'),(6,'2014-03-03',100,10,'2014-03-03 07:52:14','2014-03-03 07:52:14','A001',NULL);

/*Table structure for table `labors` */

DROP TABLE IF EXISTS `labors`;

CREATE TABLE `labors` (
  `labor_code` varchar(50) NOT NULL,
  `labor_name_en` varchar(100) DEFAULT NULL,
  `labor_name_kh` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `labor_unit` int(11) DEFAULT NULL,
  `labor_costper_unit_usd` float DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `modified_by` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`labor_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `labors` */

insert  into `labors`(`labor_code`,`labor_name_en`,`labor_name_kh`,`labor_unit`,`labor_costper_unit_usd`,`created`,`modified`,`created_by`,`modified_by`) values ('LA0001','Saren','',100,10,NULL,NULL,NULL,NULL),('LA0002','Rita','រីតា',50,100,NULL,NULL,NULL,NULL);

/*Table structure for table `materialexpenses` */

DROP TABLE IF EXISTS `materialexpenses`;

CREATE TABLE `materialexpenses` (
  `materialexpense_id` int(11) NOT NULL AUTO_INCREMENT,
  `materialexpense_date` date DEFAULT NULL,
  `materialexpense_quantity` int(11) DEFAULT NULL,
  `materialexpense_price_usd` float DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_by` varchar(254) DEFAULT NULL,
  `modified_by` varchar(254) DEFAULT NULL,
  PRIMARY KEY (`materialexpense_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `materialexpenses` */

insert  into `materialexpenses`(`materialexpense_id`,`materialexpense_date`,`materialexpense_quantity`,`materialexpense_price_usd`,`created`,`modified`,`created_by`,`modified_by`) values (11,'2014-03-04',50,7.8,'2014-03-03 08:04:24','2014-03-03 08:05:29','A001','A001'),(12,'2014-03-03',100,0.312,'2014-03-03 08:06:01','2014-03-03 08:06:01','A001',NULL);

/*Table structure for table `meetings` */

DROP TABLE IF EXISTS `meetings`;

CREATE TABLE `meetings` (
  `meeting_id` int(11) NOT NULL AUTO_INCREMENT,
  `meeting_responsible_staff` varchar(100) DEFAULT NULL,
  `meeting_subject` varchar(255) DEFAULT NULL,
  `meeting_date` date DEFAULT NULL,
  `phum_code` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `modified_by` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`meeting_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `meetings` */

insert  into `meetings`(`meeting_id`,`meeting_responsible_staff`,`meeting_subject`,`meeting_date`,`phum_code`,`created`,`modified`,`created_by`,`modified_by`) values (2,'1','1','2014-03-25','A003','2014-03-25 02:09:20','2014-03-25 03:52:49','A001','A001');

/*Table structure for table `nonclients` */

DROP TABLE IF EXISTS `nonclients`;

CREATE TABLE `nonclients` (
  `nonclient_id` varchar(100) NOT NULL,
  `nonclient_name_kh` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `nonclient_date_of_birth` date DEFAULT NULL,
  `nonclient_name_en` varchar(100) DEFAULT NULL,
  `nonclient_gender` varchar(100) DEFAULT NULL,
  `nonclient_status` int(11) DEFAULT '1',
  `nonclient_phone` varchar(100) DEFAULT NULL,
  `phum_code` varchar(100) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `modified_by` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`nonclient_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `nonclients` */

insert  into `nonclients`(`nonclient_id`,`nonclient_name_kh`,`nonclient_date_of_birth`,`nonclient_name_en`,`nonclient_gender`,`nonclient_status`,`nonclient_phone`,`phum_code`,`created`,`modified`,`created_by`,`modified_by`) values ('NC0001','កនីកា','1970-09-16','Kanika','Female',1,'012676544','A001',NULL,NULL,NULL,NULL),('NC0002','សុនលី','1985-02-04','Sunly','Male',0,'098765442','A001',NULL,'2014-03-24 02:55:52',NULL,'A001'),('NC0003','ប្រីយ៉ា','1990-08-14','Briya','Male',1,'011223232','A003',NULL,NULL,NULL,NULL),('NC0004','','1990-07-02','Tong Sreymom','Female',0,'069666950','A003','2014-02-27 08:42:34','2014-03-24 02:05:30','A001',NULL);

/*Table structure for table `phums` */

DROP TABLE IF EXISTS `phums`;

CREATE TABLE `phums` (
  `phum_code` varchar(20) NOT NULL,
  `phum_name_en` varchar(50) DEFAULT NULL,
  `phum_name_kh` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `khum_code` varchar(50) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `modified_by` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`phum_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `phums` */

insert  into `phums`(`phum_code`,`phum_name_en`,`phum_name_kh`,`khum_code`,`created`,`modified`,`created_by`,`modified_by`) values ('4','4','4','A001','2014-03-18 10:45:41','2014-03-18 10:45:59','A001','A001'),('A001','svay chhek','ស្វាយចេក','A001',NULL,NULL,NULL,NULL),('A002','thmey','ថ្មី','A002',NULL,NULL,NULL,NULL),('A003','rokar','រការ','A003',NULL,'2014-03-05 02:47:32',NULL,'A001');

/*Table structure for table `plotlaborexpenses` */

DROP TABLE IF EXISTS `plotlaborexpenses`;

CREATE TABLE `plotlaborexpenses` (
  `laborexpense_id` int(11) NOT NULL,
  `plot_id` int(11) NOT NULL,
  `labor_code` varchar(100) NOT NULL,
  PRIMARY KEY (`laborexpense_id`,`plot_id`,`labor_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `plotlaborexpenses` */

insert  into `plotlaborexpenses`(`laborexpense_id`,`plot_id`,`labor_code`) values (5,3,'LA0001'),(6,3,'LA0001');

/*Table structure for table `plotmaterialexpenses` */

DROP TABLE IF EXISTS `plotmaterialexpenses`;

CREATE TABLE `plotmaterialexpenses` (
  `product_code` varchar(100) NOT NULL,
  `plot_id` int(11) NOT NULL,
  `materialexpense_id` int(11) NOT NULL,
  PRIMARY KEY (`product_code`,`plot_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `plotmaterialexpenses` */

insert  into `plotmaterialexpenses`(`product_code`,`plot_id`,`materialexpense_id`) values ('20PEST-Actara',3,12),('P00001',3,11);

/*Table structure for table `plots` */

DROP TABLE IF EXISTS `plots`;

CREATE TABLE `plots` (
  `plot_id` int(11) NOT NULL AUTO_INCREMENT,
  `plot_size_m2` float DEFAULT NULL,
  `plot_dateplanting` date DEFAULT NULL,
  `plot_centroid_x` float DEFAULT NULL,
  `plot_datestart` date DEFAULT NULL,
  `plot_centroid_y` float DEFAULT NULL,
  `plot_crop_cycle` varchar(255) DEFAULT NULL,
  `plot_type_treatment` varchar(255) DEFAULT NULL,
  `client_id` varchar(100) DEFAULT NULL,
  `crop_code` varchar(100) DEFAULT NULL,
  `project_id` int(11) DEFAULT NULL,
  `vendor_code` varchar(100) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `modified_by` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`plot_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `plots` */

insert  into `plots`(`plot_id`,`plot_size_m2`,`plot_dateplanting`,`plot_centroid_x`,`plot_datestart`,`plot_centroid_y`,`plot_crop_cycle`,`plot_type_treatment`,`client_id`,`crop_code`,`project_id`,`vendor_code`,`created`,`modified`,`created_by`,`modified_by`) values (6,100,'2014-03-25',11111,'2014-03-25',11111,'1','Broadcasting','A003.003','C0002',2,NULL,'2014-03-25 06:30:03','2014-03-25 06:30:03','A001',NULL),(7,1000,'2014-03-25',111112,'2014-03-25',111112,'1','FDP',NULL,'C0001',2,'FBA0003','2014-03-25 07:17:30','2014-03-25 07:17:30','A001',NULL);

/*Table structure for table `productcategorys` */

DROP TABLE IF EXISTS `productcategorys`;

CREATE TABLE `productcategorys` (
  `productcategory_code` varchar(50) NOT NULL,
  `productcategory_name_en` varchar(100) DEFAULT NULL,
  `productcategory_name_kh` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `modified_by` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`productcategory_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `productcategorys` */

insert  into `productcategorys`(`productcategory_code`,`productcategory_name_en`,`productcategory_name_kh`,`created`,`modified`,`created_by`,`modified_by`) values ('20Drip','Drip Irrigation','',NULL,NULL,NULL,NULL),('20FERT','Fertilizer','ចំំណីបំប៉នសត្វ',NULL,NULL,NULL,NULL),('20PEST','Pesticide','ថ្នាំសំលាប់សត្វល្អិត',NULL,'2014-02-25 03:23:48',NULL,'A001'),('20RICE','Seed','គ្រាប់ពូជ',NULL,NULL,NULL,NULL);

/*Table structure for table `products` */

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `product_code` varchar(50) NOT NULL,
  `product_brand` varchar(100) DEFAULT NULL,
  `product_unit` int(11) DEFAULT NULL,
  `product_priceperunit_fab_usd` float DEFAULT NULL,
  `product_priceperunit_general_usd` float DEFAULT NULL,
  `product_status` varchar(255) DEFAULT NULL,
  `product_photo` varchar(255) DEFAULT NULL,
  `productcategory_code` varchar(100) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `modified_by` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`product_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `products` */

insert  into `products`(`product_code`,`product_brand`,`product_unit`,`product_priceperunit_fab_usd`,`product_priceperunit_general_usd`,`product_status`,`product_photo`,`productcategory_code`,`created`,`modified`,`created_by`,`modified_by`) values ('1','1',1,1,1,'1',NULL,'20Drip','2014-03-04 02:55:45','2014-03-04 02:55:45','A001',NULL),('2','2',2,2,2,'2','products/d5036e774fa71445f0e418592cf201cb004aa286.jpg','20FERT','2014-03-03 09:18:29','2014-03-03 09:34:49','A001','A001'),('20PEST-Actara','Syngenta',30,0.3,0.312,'','products/b423a7bd514a064687a4a3c469d5350894f4a65d.JPG','20RICE',NULL,'2014-03-03 09:08:26',NULL,'A001'),('P00001','Agrotech',500,7.5,7.8,'','products/4ba83be718fa926b7b24058002d7b32e48882304.JPG','20PEST',NULL,NULL,NULL,NULL);

/*Table structure for table `projects` */

DROP TABLE IF EXISTS `projects`;

CREATE TABLE `projects` (
  `project_id` int(11) NOT NULL AUTO_INCREMENT,
  `project_name_en` varchar(100) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `modified_by` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`project_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `projects` */

insert  into `projects`(`project_id`,`project_name_en`,`created`,`modified`,`created_by`,`modified_by`) values (2,'Harvest',NULL,NULL,NULL,NULL),(3,'test','2014-02-26 07:37:43','2014-02-26 07:37:43','A001',NULL);

/*Table structure for table `riceweekharvestrices` */

DROP TABLE IF EXISTS `riceweekharvestrices`;

CREATE TABLE `riceweekharvestrices` (
  `riceweekharvestrice_client_id` varchar(100) NOT NULL,
  `riceweekharvestrice_harvestrice_id` int(11) NOT NULL,
  `riceweekharvestrice_riceweek_id` int(11) NOT NULL,
  `riceweekharvestrice_week_8` int(11) NOT NULL,
  `riceweekharvestrice_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `riceweekharvestrices` */

insert  into `riceweekharvestrices`(`riceweekharvestrice_client_id`,`riceweekharvestrice_harvestrice_id`,`riceweekharvestrice_riceweek_id`,`riceweekharvestrice_week_8`,`riceweekharvestrice_date`) values ('A002.001',3,4,8,'2014-02-21'),('A002.001',4,4,8,'2014-02-26'),('A002.001',5,4,8,'2014-02-26'),('A002.002',6,4,8,'0000-00-00'),('A002.002',7,4,8,'2014-03-03'),('A003.002',8,3,8,'2014-03-05');

/*Table structure for table `riceweeks` */

DROP TABLE IF EXISTS `riceweeks`;

CREATE TABLE `riceweeks` (
  `riceweek_id` int(11) NOT NULL AUTO_INCREMENT,
  `week` int(11) DEFAULT NULL,
  `week_date` date DEFAULT NULL,
  `week_trainer` varchar(100) DEFAULT NULL,
  `week_topic1` varchar(100) DEFAULT NULL,
  `week_topic2` varchar(100) DEFAULT NULL,
  `week_topic3` varchar(100) DEFAULT NULL,
  `week_topic4` varchar(100) DEFAULT NULL,
  `week_client_attend` tinyint(1) DEFAULT NULL,
  `training_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `modified_by` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`riceweek_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `riceweeks` */

insert  into `riceweeks`(`riceweek_id`,`week`,`week_date`,`week_trainer`,`week_topic1`,`week_topic2`,`week_topic3`,`week_topic4`,`week_client_attend`,`training_id`,`created`,`modified`,`created_by`,`modified_by`) values (2,7,'2014-02-05','Sreyleak Hang','Seed Germination','Prepare land','FDP','Clean Rice Seed',1,6,NULL,NULL,NULL,NULL),(3,8,'2014-02-13','Sreyleak Hang','Clean Rice Seed','Seed Germination','Drum Seeder','FDP',0,6,NULL,'2014-02-25 07:52:22',NULL,'A001'),(4,8,'2014-02-20','Sreyleak Hang','Clean Rice Seed','Seed Germination','Prepare land','FDP',0,7,NULL,NULL,NULL,NULL);

/*Table structure for table `sales` */

DROP TABLE IF EXISTS `sales`;

CREATE TABLE `sales` (
  `sale_id` int(11) NOT NULL AUTO_INCREMENT,
  `sale_date` date DEFAULT NULL,
  `sale_comment` text CHARACTER SET utf8,
  `sale_value_usd` float DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `modified_by` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`sale_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `sales` */

insert  into `sales`(`sale_id`,`sale_date`,`sale_comment`,`sale_value_usd`,`created`,`modified`,`created_by`,`modified_by`) values (1,'2014-03-24','Mucle',1000,'2014-03-24 02:04:23','2014-03-24 02:56:03','A001','A001'),(2,'2014-03-24','PFD',10000,'2014-03-24 02:07:55','2014-03-24 02:57:10','A001','A001');

/*Table structure for table `sroks` */

DROP TABLE IF EXISTS `sroks`;

CREATE TABLE `sroks` (
  `srok_code` varchar(20) NOT NULL,
  `srok_name_en` varchar(50) DEFAULT NULL,
  `srok_name_kh` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `khet_code` varchar(50) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `modified_by` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`srok_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `sroks` */

insert  into `sroks`(`srok_code`,`srok_name_en`,`srok_name_kh`,`khet_code`,`created`,`modified`,`created_by`,`modified_by`) values ('A001','kompong trabek','កំពង់ត្របែក','A005',NULL,'2014-03-03 04:27:48',NULL,'A001'),('A002','kohsotin','កោះសូទិន','A004',NULL,NULL,NULL,NULL),('A003','svay chhum','ស្វាយជុំ','A005',NULL,NULL,NULL,NULL),('A004','kohthom','កោះធំ','A006',NULL,NULL,NULL,NULL),('A005','test1','','A001','2014-02-27 03:41:23','2014-02-27 03:41:23','A001',NULL);

/*Table structure for table `surveys` */

DROP TABLE IF EXISTS `surveys`;

CREATE TABLE `surveys` (
  `survey_id` int(11) NOT NULL AUTO_INCREMENT,
  `farmer_spend_income` varchar(255) DEFAULT NULL,
  `proportion_produce_sold` double DEFAULT NULL,
  `proportion_produce_consumed` decimal(10,0) DEFAULT NULL,
  `estimated_amount_time_saved` double DEFAULT NULL,
  `farmers_spend_additional_times` varchar(255) DEFAULT NULL,
  `survey_harvest_id` int(11) DEFAULT NULL,
  `harvest_type` varchar(100) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `modified_by` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`survey_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

/*Data for the table `surveys` */

insert  into `surveys`(`survey_id`,`farmer_spend_income`,`proportion_produce_sold`,`proportion_produce_consumed`,`estimated_amount_time_saved`,`farmers_spend_additional_times`,`survey_harvest_id`,`harvest_type`,`created`,`modified`,`created_by`,`modified_by`) values (14,'Household necessities',1,'10',1,'1',5,'HarvestVegetable','2014-03-05 10:47:09','2014-03-05 10:47:09','A001',NULL),(15,'Children',2,'2',2,'2',4,'HarvestRice','2014-03-05 10:47:22','2014-03-05 10:47:22','A001',NULL);

/*Table structure for table `topics` */

DROP TABLE IF EXISTS `topics`;

CREATE TABLE `topics` (
  `topic_id` int(11) NOT NULL AUTO_INCREMENT,
  `topic` varchar(100) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `modified_by` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`topic_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

/*Data for the table `topics` */

insert  into `topics`(`topic_id`,`topic`,`type`,`created`,`modified`,`created_by`,`modified_by`) values (3,'Agriculture','vegetabletopic',NULL,NULL,NULL,NULL),(4,'2 Plow Land','vegetabletopic',NULL,'2014-02-25 06:42:04',NULL,'A001'),(5,'Clean Rice Seed','ricetopic',NULL,NULL,NULL,NULL),(6,'Seed Germination','ricetopic',NULL,NULL,NULL,NULL),(7,'Vegetable Bed','vegetabletopic',NULL,NULL,NULL,NULL),(8,'Plastic Mulch','vegetabletopic',NULL,NULL,NULL,NULL),(9,'Fertilizer','vegetabletopic',NULL,NULL,NULL,NULL),(10,'Prepare land','ricetopic',NULL,NULL,NULL,NULL),(11,'FDP','ricetopic',NULL,NULL,NULL,NULL),(12,'Drum Seeder','ricetopic',NULL,NULL,NULL,NULL),(13,'53tesr','vegetabletopic','2014-02-26 07:22:00','2014-02-26 07:22:00','A001',NULL);

/*Table structure for table `trainings` */

DROP TABLE IF EXISTS `trainings`;

CREATE TABLE `trainings` (
  `training_id` int(11) NOT NULL AUTO_INCREMENT,
  `training_datestart` date DEFAULT NULL,
  `training_datefinish` date DEFAULT NULL,
  `crop_code` varchar(100) DEFAULT NULL,
  `phum_code` varchar(255) DEFAULT NULL,
  `training_responsible_staff` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `modified_by` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`training_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `trainings` */

insert  into `trainings`(`training_id`,`training_datestart`,`training_datefinish`,`crop_code`,`phum_code`,`training_responsible_staff`,`created`,`modified`,`created_by`,`modified_by`) values (6,'2014-03-24','2014-03-24','C0002','A001','enleang Sam','2014-03-24 07:45:23','2014-03-24 08:58:47','A001','A001');

/*Table structure for table `userlogs` */

DROP TABLE IF EXISTS `userlogs`;

CREATE TABLE `userlogs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` varchar(100) DEFAULT NULL,
  `log` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `action` varchar(100) DEFAULT NULL,
  `context` varchar(100) DEFAULT NULL,
  `ip` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=357 DEFAULT CHARSET=latin1;

/*Data for the table `userlogs` */

insert  into `userlogs`(`id`,`userid`,`log`,`created`,`modified`,`action`,`context`,`ip`) values (266,'A001','[]','2014-03-19 08:35:45','2014-03-19 08:35:45',' EDIT :A001','Vendor','127.0.0.1'),(267,'A001','{\"vendor_code\":\"CA0002\",\"vendor_name_en\":\"Sreyleak Hang\",\"vendor_name_kh\":\"\",\"vendor_gender\":\"Female\",\"vendor_type\":\"ca\",\"branch_manager\":\"Om Sopheap\",\"ca_code\":\"2\",\"vendor_date_of_birth\":\"2014-03-19\",\"vendor_phone\":\"098 567 287\",\"vendor_email\":\"sreyleak099@yahoo.com\",\"vendor_datestarted\":\"2014-03-19\",\"vendor_date_ended\":\"2014-03-19\",\"khet_code\":\"A005\",\"srok_code\":\"A001\",\"khum_code\":\"A001\",\"phum_code\":\"A001\",\"client_id\":\"A001.001\",\"clientvender_datestarted\":\"2014-03-19\",\"created_by\":\"A001\",\"id\":null}','2014-03-19 08:35:45','2014-03-19 08:35:45',' CREATE NEW :','Vendor','127.0.0.1'),(268,'A001','{\"vendor_code\":\"CA0002\",\"vendor_name_en\":\"Sreyleak Hang\",\"vendor_name_kh\":\"\",\"vendor_gender\":\"Female\",\"vendor_type\":\"ca\",\"branch_manager\":\"Om Sopheap\",\"ca_code\":\"2\",\"vendor_date_of_birth\":\"2014-03-19\",\"vendor_phone\":\"098 567 287\",\"vendor_email\":\"sreyleak099@yahoo.com\",\"vendor_datestarted\":\"2014-03-19\",\"vendor_date_ended\":\"2014-03-19\",\"khet_code\":\"A005\",\"srok_code\":\"A001\",\"khum_code\":\"A001\",\"phum_code\":\"A001\",\"client_id\":\"A001.001\",\"clientvender_datestarted\":\"2014-03-19\",\"created_by\":\"A001\",\"id\":\"CA0002\"}','2014-03-19 08:35:45','2014-03-19 08:35:45',' CREATE NEW :CA0002','Vendor','127.0.0.1'),(269,'A001','[]','2014-03-19 08:39:14','2014-03-19 08:39:14',' EDIT :A001','Vendor','127.0.0.1'),(270,'A001','{\"vendor_code\":\"CA0003\",\"vendor_name_en\":\"Khornlang Sam\",\"vendor_name_kh\":\"\",\"vendor_gender\":\"Female\",\"vendor_type\":\"ca\",\"branch_manager\":\"Chan Sarom\",\"ca_code\":\"2\",\"vendor_date_of_birth\":\"2014-03-19\",\"vendor_phone\":\"070 345 366\",\"vendor_email\":\"khornlang@yahoo.com\",\"vendor_datestarted\":\"2014-03-19\",\"vendor_date_ended\":\"2014-03-19\",\"khet_code\":\"A004\",\"srok_code\":\"A002\",\"khum_code\":\"A002\",\"phum_code\":\"A002\",\"client_id\":\"A001.001\",\"clientvender_datestarted\":\"2014-03-19\",\"created_by\":\"A001\",\"id\":null}','2014-03-19 08:39:14','2014-03-19 08:39:14',' CREATE NEW :','Vendor','127.0.0.1'),(271,'A001','{\"vendor_code\":\"CA0003\",\"vendor_name_en\":\"Khornlang Sam\",\"vendor_name_kh\":\"\",\"vendor_gender\":\"Female\",\"vendor_type\":\"ca\",\"branch_manager\":\"Chan Sarom\",\"ca_code\":\"2\",\"vendor_date_of_birth\":\"2014-03-19\",\"vendor_phone\":\"070 345 366\",\"vendor_email\":\"khornlang@yahoo.com\",\"vendor_datestarted\":\"2014-03-19\",\"vendor_date_ended\":\"2014-03-19\",\"khet_code\":\"A004\",\"srok_code\":\"A002\",\"khum_code\":\"A002\",\"phum_code\":\"A002\",\"client_id\":\"A001.001\",\"clientvender_datestarted\":\"2014-03-19\",\"created_by\":\"A001\",\"id\":\"CA0003\"}','2014-03-19 08:39:14','2014-03-19 08:39:14',' CREATE NEW :CA0003','Vendor','127.0.0.1'),(272,'A001','[]','2014-03-19 08:41:52','2014-03-19 08:41:52',' EDIT :A001','Vendor','127.0.0.1'),(273,'A001','{\"vendor_code\":\"FBA0001\",\"vendor_name_en\":\"Leakena Hang\",\"vendor_name_kh\":\"\",\"vendor_gender\":\"Female\",\"vendor_type\":\"fba\",\"ca_code\":\"CA0002\",\"vendor_date_of_birth\":\"2014-03-19\",\"vendor_phone\":\"096 3043514\",\"vendor_email\":\"leankena.hang@gmail.com\",\"vendor_datestarted\":\"2014-03-19\",\"vendor_date_ended\":\"2014-03-19\",\"khet_code\":\"A005\",\"srok_code\":\"A001\",\"khum_code\":\"A001\",\"phum_code\":\"A001\",\"client_id\":\"A001.001\",\"clientvender_datestarted\":\"2014-03-19\",\"created_by\":\"A001\",\"id\":null}','2014-03-19 08:41:52','2014-03-19 08:41:52',' CREATE NEW :','Vendor','127.0.0.1'),(274,'A001','{\"vendor_code\":\"FBA0001\",\"vendor_name_en\":\"Leakena Hang\",\"vendor_name_kh\":\"\",\"vendor_gender\":\"Female\",\"vendor_type\":\"fba\",\"ca_code\":\"CA0002\",\"vendor_date_of_birth\":\"2014-03-19\",\"vendor_phone\":\"096 3043514\",\"vendor_email\":\"leankena.hang@gmail.com\",\"vendor_datestarted\":\"2014-03-19\",\"vendor_date_ended\":\"2014-03-19\",\"khet_code\":\"A005\",\"srok_code\":\"A001\",\"khum_code\":\"A001\",\"phum_code\":\"A001\",\"client_id\":\"A001.001\",\"clientvender_datestarted\":\"2014-03-19\",\"created_by\":\"A001\",\"id\":\"FBA0001\"}','2014-03-19 08:41:53','2014-03-19 08:41:53',' CREATE NEW :FBA0001','Vendor','127.0.0.1'),(275,'A001','{\"vendor_code\":\"FBA0002\",\"vendor_name_en\":\"Chamreoun Hang\",\"vendor_name_kh\":\"\",\"vendor_gender\":\"Male\",\"vendor_type\":\"fba\",\"ca_code\":\"CA0001\",\"vendor_date_of_birth\":\"2014-03-19\",\"vendor_phone\":\"015 787 686\",\"vendor_email\":\"chamreoung@yahoo.com\",\"vendor_datestarted\":\"2014-03-19\",\"vendor_date_ended\":\"2014-03-19\",\"khet_code\":\"A005\",\"srok_code\":\"A001\",\"khum_code\":\"A001\",\"phum_code\":\"A001\",\"client_id\":\"A001.001\",\"clientvender_datestarted\":\"2014-03-19\",\"created_by\":\"A001\",\"id\":null}','2014-03-19 08:53:21','2014-03-19 08:53:21',' CREATE NEW :','Vendor','127.0.0.1'),(276,'A001','{\"vendor_code\":\"FBA0002\",\"vendor_name_en\":\"Chamreoun Hang\",\"vendor_name_kh\":\"\",\"vendor_gender\":\"Male\",\"vendor_type\":\"fba\",\"ca_code\":\"CA0001\",\"vendor_date_of_birth\":\"2014-03-19\",\"vendor_phone\":\"015 787 686\",\"vendor_email\":\"chamreoung@yahoo.com\",\"vendor_datestarted\":\"2014-03-19\",\"vendor_date_ended\":\"2014-03-19\",\"khet_code\":\"A005\",\"srok_code\":\"A001\",\"khum_code\":\"A001\",\"phum_code\":\"A001\",\"client_id\":\"A001.001\",\"clientvender_datestarted\":\"2014-03-19\",\"created_by\":\"A001\",\"id\":\"FBA0002\"}','2014-03-19 08:53:21','2014-03-19 08:53:21',' CREATE NEW :FBA0002','Vendor','127.0.0.1'),(277,'A001','[{\"Fba\":{\"fba_code\":\"FBA0001\",\"ca_code\":\"CA0002\"},\"CommercialAgronomist\":{\"ca_code\":\"CA0002\"},\"Vendor\":{\"vendor_code\":\"FBA0001\",\"vendor_name_en\":\"Leakena Hang\",\"vendor_name_kh\":\"\\u17a0\\u1784\",\"vendor_gender\":\"Female\",\"vendor_date_of_birth\":\"2014-03-19\",\"vendor_phone\":\"096 3043514\",\"vendor_email\":\"leankena.hang@gmail.com\",\"vendor_photo\":null,\"vendor_datestarted\":\"2014-03-19\",\"phum_code\":\"A001\",\"branch_manager\":null,\"vendor_date_ended\":\"2014-03-19\",\"vendor_type\":\"fba\",\"vendor_status\":\"1\",\"created\":\"2014-03-19 08:41:52\",\"modified\":\"2014-03-19 08:54:16\",\"created_by\":\"A001\",\"modified_by\":\"A001\"}}]','2014-03-19 08:54:16','2014-03-19 08:54:16',' EDIT :A001','Vendor','127.0.0.1'),(278,'A001','[{\"Fba\":{\"fba_code\":\"FBA0001\",\"ca_code\":\"CA0001\"},\"CommercialAgronomist\":{\"ca_code\":\"CA0001\"},\"Vendor\":{\"vendor_code\":\"FBA0001\",\"vendor_name_en\":\"Leakena Hang\",\"vendor_name_kh\":\"\\u17a0\\u1784\\u17cb\\u200b \\u179b\\u1780\\u17d2\\u1781\\u17b7\\u178e\\u17b6\",\"vendor_gender\":\"Female\",\"vendor_date_of_birth\":\"2014-03-19\",\"vendor_phone\":\"096 3043514\",\"vendor_email\":\"leankena.hang@gmail.com\",\"vendor_photo\":null,\"vendor_datestarted\":\"2014-03-19\",\"phum_code\":\"A001\",\"branch_manager\":null,\"vendor_date_ended\":\"2014-03-19\",\"vendor_type\":\"fba\",\"vendor_status\":\"1\",\"created\":\"2014-03-19 08:41:52\",\"modified\":\"2014-03-19 08:54:38\",\"created_by\":\"A001\",\"modified_by\":\"A001\"}}]','2014-03-19 08:54:38','2014-03-19 08:54:38',' EDIT :A001','Vendor','127.0.0.1'),(279,'A001','[{\"Fba\":{\"fba_code\":\"FBA0002\",\"ca_code\":\"CA0001\"},\"CommercialAgronomist\":{\"ca_code\":\"CA0001\"},\"Vendor\":{\"vendor_code\":\"FBA0002\",\"vendor_name_en\":\"Chamreoun Hang\",\"vendor_name_kh\":\"\",\"vendor_gender\":\"Male\",\"vendor_date_of_birth\":\"2014-03-19\",\"vendor_phone\":\"015 787 686\",\"vendor_email\":\"chamreoung@yahoo.com\",\"vendor_photo\":null,\"vendor_datestarted\":\"2014-03-19\",\"phum_code\":\"A001\",\"branch_manager\":null,\"vendor_date_ended\":\"2014-03-19\",\"vendor_type\":\"fba\",\"vendor_status\":\"1\",\"created\":\"2014-03-19 08:53:20\",\"modified\":\"2014-03-19 08:55:21\",\"created_by\":\"A001\",\"modified_by\":\"A001\"}}]','2014-03-19 08:55:21','2014-03-19 08:55:21',' EDIT :A001','Vendor','127.0.0.1'),(280,'A001','[{\"Vendor\":{\"vendor_code\":\"FBA0001\",\"vendor_name_en\":\"Leakena Hang\",\"vendor_name_kh\":\"\\u17a0\\u1784\\u17cb\\u200b \\u179b\\u1780\\u17d2\\u1781\\u17b7\\u178e\\u17b6\",\"vendor_gender\":\"Female\",\"vendor_date_of_birth\":\"2014-03-19\",\"vendor_phone\":\"096 3043514\",\"vendor_email\":\"leankena.hang@gmail.com\",\"vendor_photo\":null,\"vendor_datestarted\":\"2014-03-19\",\"phum_code\":\"A001\",\"branch_manager\":null,\"vendor_date_ended\":\"2014-03-19\",\"vendor_type\":\"fba\",\"vendor_status\":\"1\",\"created\":\"2014-03-19 08:41:52\",\"modified\":\"2014-03-19 08:54:38\",\"created_by\":\"A001\",\"modified_by\":\"A001\"},\"Phum\":{\"phum_code\":\"A001\",\"phum_name_en\":\"svay chhek\",\"phum_name_kh\":\"\\u179f\\u17d2\\u179c\\u17b6\\u1799\\u1785\\u17c1\\u1780\",\"khum_code\":\"A001\",\"created\":null,\"modified\":null,\"created_by\":null,\"modified_by\":null},\"Fba\":[{\"fba_code\":\"FBA0001\",\"ca_code\":\"CA0001\"}],\"CommercialAgronomist\":[],\"ClientVendor\":[]}]','2014-03-19 08:59:24','2014-03-19 08:59:24',' EDIT :FBA0001','Vendor','127.0.0.1'),(281,'A001','[{\"Fba\":{\"fba_code\":\"FBA0001\",\"ca_code\":\"CA0001\"},\"CommercialAgronomist\":{\"ca_code\":\"CA0001\"},\"Vendor\":{\"vendor_code\":\"FBA0001\",\"vendor_name_en\":\"Leakena Hang\",\"vendor_name_kh\":\"\\u17a0\\u1784\\u17cb\\u200b \\u179b\\u1780\\u17d2\\u1781\\u17b7\\u178e\\u17b6\",\"vendor_gender\":\"Female\",\"vendor_date_of_birth\":\"2014-03-19\",\"vendor_phone\":\"096 3043514\",\"vendor_email\":\"leankena.hang@gmail.com\",\"vendor_photo\":\"vendors\\/b079ade167e0a35a0a6a92eda4afad9aa51eb17a.png\",\"vendor_datestarted\":\"2014-03-19\",\"phum_code\":\"A001\",\"branch_manager\":null,\"vendor_date_ended\":\"2014-03-19\",\"vendor_type\":\"fba\",\"vendor_status\":\"1\",\"created\":\"2014-03-19 08:41:52\",\"modified\":\"2014-03-19 08:59:24\",\"created_by\":\"A001\",\"modified_by\":\"A001\"}}]','2014-03-19 08:59:24','2014-03-19 08:59:24',' EDIT :A001','Vendor','127.0.0.1'),(282,'A001','{\"vendor_code\":\"1\",\"vendor_name_en\":\"1\",\"vendor_name_kh\":\"\",\"vendor_gender\":\"Male\",\"vendor_type\":\"ca\",\"branch_manager\":\"Lim Naluch\",\"ca_code\":\"CA0001\",\"vendor_date_of_birth\":\"2014-03-19\",\"vendor_phone\":\"1\",\"vendor_email\":\"sreyleak099@yahoo.com\",\"vendor_datestarted\":\"2014-03-19\",\"vendor_date_ended\":\"2014-03-19\",\"khet_code\":\"A004\",\"srok_code\":\"A002\",\"khum_code\":\"A002\",\"phum_code\":\"\",\"client_id\":\"A001.001\",\"clientvender_datestarted\":\"2014-03-19\",\"created_by\":\"A001\",\"id\":null}','2014-03-19 09:04:09','2014-03-19 09:04:09',' CREATE NEW :','Vendor','127.0.0.1'),(283,'A001','{\"vendor_code\":\"1\",\"vendor_name_en\":\"1\",\"vendor_name_kh\":\"\",\"vendor_gender\":\"Male\",\"vendor_type\":\"ca\",\"branch_manager\":\"Lim Naluch\",\"ca_code\":\"CA0001\",\"vendor_date_of_birth\":\"2014-03-19\",\"vendor_phone\":\"1\",\"vendor_email\":\"sreyleak099@yahoo.com\",\"vendor_datestarted\":\"2014-03-19\",\"vendor_date_ended\":\"2014-03-19\",\"khet_code\":\"A004\",\"srok_code\":\"A002\",\"khum_code\":\"A002\",\"phum_code\":\"\",\"client_id\":\"A001.001\",\"clientvender_datestarted\":\"2014-03-19\",\"created_by\":\"A001\",\"id\":\"1\"}','2014-03-19 09:04:10','2014-03-19 09:04:10',' CREATE NEW :1','Vendor','127.0.0.1'),(284,'A001','{\"vendor_code\":\"2\",\"vendor_name_en\":\"2\",\"vendor_name_kh\":\"2\",\"vendor_gender\":\"Male\",\"vendor_type\":\"fba\",\"ca_code\":\"1\",\"vendor_date_of_birth\":\"2014-03-19\",\"vendor_phone\":\"2\",\"vendor_email\":\"sreyleak099@yahoo.com\",\"vendor_datestarted\":\"2014-03-19\",\"vendor_date_ended\":\"2014-03-19\",\"khet_code\":\"A004\",\"srok_code\":\"A002\",\"khum_code\":\"A002\",\"phum_code\":\"\",\"client\":[\"A001.001\",\"A002.001\"],\"datestarted\":[\"2014-03-19\",\"2014-03-19\"],\"client_id\":\"A002.001\",\"clientvender_datestarted\":\"2014-03-19\",\"created_by\":\"A001\",\"id\":null}','2014-03-19 09:05:17','2014-03-19 09:05:17',' CREATE NEW :','Vendor','127.0.0.1'),(285,'A001','{\"vendor_code\":\"2\",\"vendor_name_en\":\"2\",\"vendor_name_kh\":\"2\",\"vendor_gender\":\"Male\",\"vendor_type\":\"fba\",\"ca_code\":\"1\",\"vendor_date_of_birth\":\"2014-03-19\",\"vendor_phone\":\"2\",\"vendor_email\":\"sreyleak099@yahoo.com\",\"vendor_datestarted\":\"2014-03-19\",\"vendor_date_ended\":\"2014-03-19\",\"khet_code\":\"A004\",\"srok_code\":\"A002\",\"khum_code\":\"A002\",\"phum_code\":\"\",\"client\":[\"A001.001\",\"A002.001\"],\"datestarted\":[\"2014-03-19\",\"2014-03-19\"],\"client_id\":\"A002.001\",\"clientvender_datestarted\":\"2014-03-19\",\"created_by\":\"A001\",\"id\":\"2\"}','2014-03-19 09:05:18','2014-03-19 09:05:18',' CREATE NEW :2','Vendor','127.0.0.1'),(286,'A001','[{\"Vendor\":{\"vendor_code\":\"1\",\"vendor_name_en\":\"1\",\"vendor_name_kh\":\"\",\"vendor_gender\":\"Male\",\"vendor_date_of_birth\":\"2014-03-19\",\"vendor_phone\":\"1\",\"vendor_email\":\"sreyleak099@yahoo.com\",\"vendor_photo\":null,\"vendor_datestarted\":\"2014-03-19\",\"phum_code\":\"\",\"branch_manager\":\"Lim Naluch\",\"vendor_date_ended\":\"2014-03-19\",\"vendor_type\":\"ca\",\"vendor_status\":\"1\",\"created\":\"2014-03-19 09:04:09\",\"modified\":\"2014-03-19 09:04:09\",\"created_by\":\"A001\",\"modified_by\":null},\"Phum\":{\"phum_code\":\"\",\"phum_name_en\":\"1\",\"phum_name_kh\":\"1\",\"khum_code\":\"A002\",\"created\":\"2014-03-18 09:04:50\",\"modified\":\"2014-03-18 09:04:50\",\"created_by\":\"A001\",\"modified_by\":null},\"Fba\":[],\"CommercialAgronomist\":[{\"ca_code\":\"1\"}],\"ClientVendor\":[]}]','2014-03-19 09:50:25','2014-03-19 09:50:25',' UPDATE STATE : 0','Vendor','127.0.0.1'),(287,'A001','[{\"Vendor\":{\"vendor_code\":\"1\",\"vendor_name_en\":\"1\",\"vendor_name_kh\":\"\",\"vendor_gender\":\"Male\",\"vendor_date_of_birth\":\"2014-03-19\",\"vendor_phone\":\"1\",\"vendor_email\":\"sreyleak099@yahoo.com\",\"vendor_photo\":null,\"vendor_datestarted\":\"2014-03-19\",\"phum_code\":\"\",\"branch_manager\":\"Lim Naluch\",\"vendor_date_ended\":\"2014-03-19\",\"vendor_type\":\"ca\",\"vendor_status\":\"1\",\"created\":\"2014-03-19 09:04:09\",\"modified\":\"2014-03-19 09:50:25\",\"created_by\":\"A001\",\"modified_by\":null},\"Phum\":{\"phum_code\":\"\",\"phum_name_en\":\"1\",\"phum_name_kh\":\"1\",\"khum_code\":\"A002\",\"created\":\"2014-03-18 09:04:50\",\"modified\":\"2014-03-18 09:04:50\",\"created_by\":\"A001\",\"modified_by\":null},\"Fba\":[],\"CommercialAgronomist\":[{\"ca_code\":\"1\"}],\"ClientVendor\":[]}]','2014-03-19 09:50:53','2014-03-19 09:50:53',' UPDATE STATE : 0','Vendor','127.0.0.1'),(288,'A001','[{\"Vendor\":{\"vendor_code\":\"1\",\"vendor_name_en\":\"1\",\"vendor_name_kh\":\"\",\"vendor_gender\":\"Male\",\"vendor_date_of_birth\":\"2014-03-19\",\"vendor_phone\":\"1\",\"vendor_email\":\"sreyleak099@yahoo.com\",\"vendor_photo\":null,\"vendor_datestarted\":\"2014-03-19\",\"phum_code\":\"\",\"branch_manager\":\"Lim Naluch\",\"vendor_date_ended\":\"2014-03-19\",\"vendor_type\":\"ca\",\"state\":\"1\",\"created\":\"2014-03-19 09:04:09\",\"modified\":\"2014-03-19 09:50:53\",\"created_by\":\"A001\",\"modified_by\":null},\"Phum\":{\"phum_code\":\"\",\"phum_name_en\":\"1\",\"phum_name_kh\":\"1\",\"khum_code\":\"A002\",\"created\":\"2014-03-18 09:04:50\",\"modified\":\"2014-03-18 09:04:50\",\"created_by\":\"A001\",\"modified_by\":null},\"Fba\":[],\"CommercialAgronomist\":[{\"ca_code\":\"1\"}],\"ClientVendor\":[]}]','2014-03-19 09:54:21','2014-03-19 09:54:21',' UPDATE STATE : 0','Vendor','127.0.0.1'),(289,'A001','[{\"Vendor\":{\"vendor_code\":\"1\",\"vendor_name_en\":\"1\",\"vendor_name_kh\":\"\",\"vendor_gender\":\"Male\",\"vendor_date_of_birth\":\"2014-03-19\",\"vendor_phone\":\"1\",\"vendor_email\":\"sreyleak099@yahoo.com\",\"vendor_photo\":null,\"vendor_datestarted\":\"2014-03-19\",\"phum_code\":\"\",\"branch_manager\":\"Lim Naluch\",\"vendor_date_ended\":\"2014-03-19\",\"vendor_type\":\"ca\",\"state\":\"0\",\"created\":\"2014-03-19 09:04:09\",\"modified\":\"2014-03-19 09:54:21\",\"created_by\":\"A001\",\"modified_by\":null},\"Phum\":{\"phum_code\":\"\",\"phum_name_en\":\"1\",\"phum_name_kh\":\"1\",\"khum_code\":\"A002\",\"created\":\"2014-03-18 09:04:50\",\"modified\":\"2014-03-18 09:04:50\",\"created_by\":\"A001\",\"modified_by\":null},\"Fba\":[],\"CommercialAgronomist\":[{\"ca_code\":\"1\"}],\"ClientVendor\":[]}]','2014-03-19 10:01:58','2014-03-19 10:01:58',' UPDATE STATE : 1','Vendor','127.0.0.1'),(290,'A001','[{\"Vendor\":{\"vendor_code\":\"1\",\"vendor_name_en\":\"1\",\"vendor_name_kh\":\"\",\"vendor_gender\":\"Male\",\"vendor_date_of_birth\":\"2014-03-19\",\"vendor_phone\":\"1\",\"vendor_email\":\"sreyleak099@yahoo.com\",\"vendor_photo\":null,\"vendor_datestarted\":\"2014-03-19\",\"phum_code\":\"\",\"branch_manager\":\"Lim Naluch\",\"vendor_date_ended\":\"2014-03-19\",\"vendor_type\":\"ca\",\"state\":\"1\",\"created\":\"2014-03-19 09:04:09\",\"modified\":\"2014-03-19 10:01:58\",\"created_by\":\"A001\",\"modified_by\":null},\"Phum\":{\"phum_code\":\"\",\"phum_name_en\":\"1\",\"phum_name_kh\":\"1\",\"khum_code\":\"A002\",\"created\":\"2014-03-18 09:04:50\",\"modified\":\"2014-03-18 09:04:50\",\"created_by\":\"A001\",\"modified_by\":null},\"Fba\":[],\"CommercialAgronomist\":[{\"ca_code\":\"1\"}],\"ClientVendor\":[]}]','2014-03-19 10:02:51','2014-03-19 10:02:51','DELETE : 1','Vendor','127.0.0.1'),(291,'A001','[{\"Vendor\":{\"vendor_code\":\"2\",\"vendor_name_en\":\"2\",\"vendor_name_kh\":\"2\",\"vendor_gender\":\"Male\",\"vendor_date_of_birth\":\"2014-03-19\",\"vendor_phone\":\"2\",\"vendor_email\":\"sreyleak099@yahoo.com\",\"vendor_photo\":null,\"vendor_datestarted\":\"2014-03-19\",\"phum_code\":\"\",\"branch_manager\":null,\"vendor_date_ended\":\"2014-03-19\",\"vendor_type\":\"fba\",\"state\":\"1\",\"created\":\"2014-03-19 09:05:17\",\"modified\":\"2014-03-19 09:05:17\",\"created_by\":\"A001\",\"modified_by\":null},\"Phum\":{\"phum_code\":\"\",\"phum_name_en\":\"1\",\"phum_name_kh\":\"1\",\"khum_code\":\"A002\",\"created\":\"2014-03-18 09:04:50\",\"modified\":\"2014-03-18 09:04:50\",\"created_by\":\"A001\",\"modified_by\":null},\"Fba\":[{\"fba_code\":\"2\",\"ca_code\":\"1\"}],\"CommercialAgronomist\":[],\"ClientVendor\":[{\"client_id\":\"A001.001\",\"vendor_code\":\"2\",\"clientvendor_datestarted\":\"2014-03-19\"},{\"client_id\":\"A002.001\",\"vendor_code\":\"2\",\"clientvendor_datestarted\":\"2014-03-19\"}]}]','2014-03-19 10:03:00','2014-03-19 10:03:00','DELETE : 2','Vendor','127.0.0.1'),(292,'A001','{\"project_name_en\":\"2\",\"id\":\"4\",\"created_by\":\"A001\"}','2014-03-20 04:07:35','2014-03-20 04:07:35',' CREATE NEW :4','Project','127.0.0.1'),(293,'A001','[{\"Project\":{\"project_id\":\"4\",\"project_name_en\":\"2\",\"created\":\"2014-03-20 04:07:34\",\"modified\":\"2014-03-20 04:07:34\",\"created_by\":\"A001\",\"modified_by\":null}}]','2014-03-20 04:07:53','2014-03-20 04:07:53','DELETE : 4','Project','127.0.0.1'),(294,'A001','[{\"Client\":{\"client_id\":\"A001.001\",\"client_name_kh\":\"\\u179f\\u17d2\\u179a\\u17b8\\u179b\\u1780\\u17d2\\u1781\\u17d0\",\"client_date_of_birth\":\"1947-04-08\",\"client_datestarted\":\"2014-02-05\",\"client_name_en\":\"Sreyleak\",\"client_gender\":\"Female\",\"client_phone\":\"0764322342\",\"phum_code\":\"A001\",\"client_date_ended\":null,\"state\":\"1\",\"created\":null,\"modified\":\"2014-03-03 05:57:42\",\"created_by\":null,\"modified_by\":\"A001\"},\"Phum\":{\"phum_code\":\"A001\",\"phum_name_en\":\"svay chhek\",\"phum_name_kh\":\"\\u179f\\u17d2\\u179c\\u17b6\\u1799\\u1785\\u17c1\\u1780\",\"khum_code\":\"A001\",\"created\":null,\"modified\":null,\"created_by\":null,\"modified_by\":null}}]','2014-03-20 04:14:42','2014-03-20 04:14:42',' UPDATE STATE : 0','Client','127.0.0.1'),(295,'A001','[{\"Client\":{\"client_id\":\"A001.001\",\"client_name_kh\":\"\\u179f\\u17d2\\u179a\\u17b8\\u179b\\u1780\\u17d2\\u1781\\u17d0\",\"client_date_of_birth\":\"1947-04-08\",\"client_datestarted\":\"2014-02-05\",\"client_name_en\":\"Sreyleak\",\"client_gender\":\"Female\",\"client_phone\":\"0764322342\",\"phum_code\":\"A001\",\"client_date_ended\":null,\"state\":\"0\",\"created\":null,\"modified\":\"2014-03-20 04:14:42\",\"created_by\":null,\"modified_by\":\"A001\"},\"Phum\":{\"phum_code\":\"A001\",\"phum_name_en\":\"svay chhek\",\"phum_name_kh\":\"\\u179f\\u17d2\\u179c\\u17b6\\u1799\\u1785\\u17c1\\u1780\",\"khum_code\":\"A001\",\"created\":null,\"modified\":null,\"created_by\":null,\"modified_by\":null}}]','2014-03-20 04:14:47','2014-03-20 04:14:47',' UPDATE STATE : 1','Client','127.0.0.1'),(296,'A001','{\"vendor_code\":\"FBA0003\",\"vendor_name_en\":\"Chhay Rambo\",\"vendor_name_kh\":\"\",\"vendor_gender\":\"Male\",\"vendor_type\":\"fba\",\"ca_code\":\"CA0002\",\"vendor_date_of_birth\":\"2014-03-20\",\"vendor_phone\":\"016 22 32 78\",\"vendor_email\":\"rambo.cute@gmail.com\",\"vendor_datestarted\":\"2014-03-20\",\"vendor_date_ended\":\"2014-03-20\",\"khet_code\":\"A005\",\"srok_code\":\"A001\",\"khum_code\":\"A001\",\"phum_code\":\"A001\",\"client\":[\"A002.001\",\"A002.002\"],\"datestarted\":[\"2014-03-20\",\"2014-03-20\"],\"client_id\":\"A002.002\",\"clientvender_datestarted\":\"2014-03-20\",\"created_by\":\"A001\",\"id\":null}','2014-03-20 07:47:44','2014-03-20 07:47:44',' CREATE NEW :','Vendor','127.0.0.1'),(297,'A001','{\"vendor_code\":\"FBA0003\",\"vendor_name_en\":\"Chhay Rambo\",\"vendor_name_kh\":\"\",\"vendor_gender\":\"Male\",\"vendor_type\":\"fba\",\"ca_code\":\"CA0002\",\"vendor_date_of_birth\":\"2014-03-20\",\"vendor_phone\":\"016 22 32 78\",\"vendor_email\":\"rambo.cute@gmail.com\",\"vendor_datestarted\":\"2014-03-20\",\"vendor_date_ended\":\"2014-03-20\",\"khet_code\":\"A005\",\"srok_code\":\"A001\",\"khum_code\":\"A001\",\"phum_code\":\"A001\",\"client\":[\"A002.001\",\"A002.002\"],\"datestarted\":[\"2014-03-20\",\"2014-03-20\"],\"client_id\":\"A002.002\",\"clientvender_datestarted\":\"2014-03-20\",\"created_by\":\"A001\",\"id\":\"FBA0003\"}','2014-03-20 07:47:45','2014-03-20 07:47:45',' CREATE NEW :FBA0003','Vendor','127.0.0.1'),(298,'A001','[{\"Vendor\":{\"vendor_code\":\"FBA0003\",\"vendor_name_en\":\"Chhay Rambo\",\"vendor_name_kh\":\"\",\"vendor_gender\":\"Male\",\"vendor_date_of_birth\":\"2014-03-20\",\"vendor_phone\":\"016 22 32 78\",\"vendor_email\":\"rambo.cute@gmail.com\",\"vendor_photo\":null,\"vendor_datestarted\":\"2014-03-20\",\"phum_code\":\"A001\",\"branch_manager\":null,\"vendor_date_ended\":\"2014-03-20\",\"vendor_type\":\"fba\",\"state\":\"1\",\"created\":\"2014-03-20 07:47:44\",\"modified\":\"2014-03-20 07:47:44\",\"created_by\":\"A001\",\"modified_by\":null},\"Phum\":{\"phum_code\":\"A001\",\"phum_name_en\":\"svay chhek\",\"phum_name_kh\":\"\\u179f\\u17d2\\u179c\\u17b6\\u1799\\u1785\\u17c1\\u1780\",\"khum_code\":\"A001\",\"created\":null,\"modified\":null,\"created_by\":null,\"modified_by\":null},\"Fba\":[{\"fba_code\":\"FBA0003\",\"ca_code\":\"CA0002\"}],\"CommercialAgronomist\":[],\"ClientVendor\":[{\"client_id\":\"A002.001\",\"vendor_code\":\"FBA0003\",\"clientvendor_datestarted\":\"2014-03-20\"},{\"client_id\":\"A002.002\",\"vendor_code\":\"FBA0003\",\"clientvendor_datestarted\":\"2014-03-20\"}]}]','2014-03-20 07:58:32','2014-03-20 07:58:32',' UPDATE STATE : 0','Vendor','127.0.0.1'),(299,'A001','[{\"Vendor\":{\"vendor_code\":\"FBA0003\",\"vendor_name_en\":\"Chhay Rambo\",\"vendor_name_kh\":\"\",\"vendor_gender\":\"Male\",\"vendor_date_of_birth\":\"2014-03-20\",\"vendor_phone\":\"016 22 32 78\",\"vendor_email\":\"rambo.cute@gmail.com\",\"vendor_photo\":null,\"vendor_datestarted\":\"2014-03-20\",\"phum_code\":\"A001\",\"branch_manager\":null,\"vendor_date_ended\":\"2014-03-20\",\"vendor_type\":\"fba\",\"state\":\"0\",\"created\":\"2014-03-20 07:47:44\",\"modified\":\"2014-03-20 07:58:33\",\"created_by\":\"A001\",\"modified_by\":null},\"Phum\":{\"phum_code\":\"A001\",\"phum_name_en\":\"svay chhek\",\"phum_name_kh\":\"\\u179f\\u17d2\\u179c\\u17b6\\u1799\\u1785\\u17c1\\u1780\",\"khum_code\":\"A001\",\"created\":null,\"modified\":null,\"created_by\":null,\"modified_by\":null},\"Fba\":[{\"fba_code\":\"FBA0003\",\"ca_code\":\"CA0002\"}],\"CommercialAgronomist\":[],\"ClientVendor\":[{\"client_id\":\"A002.001\",\"vendor_code\":\"FBA0003\",\"clientvendor_datestarted\":\"2014-03-20\"},{\"client_id\":\"A002.002\",\"vendor_code\":\"FBA0003\",\"clientvendor_datestarted\":\"2014-03-20\"}]}]','2014-03-20 07:59:59','2014-03-20 07:59:59',' UPDATE STATE : 1','Vendor','127.0.0.1'),(300,'A001','[{\"Vendor\":{\"vendor_code\":\"FBA0002\",\"vendor_name_en\":\"Chamreoun Hang\",\"vendor_name_kh\":\"\",\"vendor_gender\":\"Male\",\"vendor_date_of_birth\":\"2014-03-19\",\"vendor_phone\":\"015 787 686\",\"vendor_email\":\"chamreoung@yahoo.com\",\"vendor_photo\":null,\"vendor_datestarted\":\"2014-03-19\",\"phum_code\":\"A001\",\"branch_manager\":null,\"vendor_date_ended\":\"2014-03-19\",\"vendor_type\":\"fba\",\"state\":\"1\",\"created\":\"2014-03-19 08:53:20\",\"modified\":\"2014-03-19 08:55:21\",\"created_by\":\"A001\",\"modified_by\":\"A001\"},\"Phum\":{\"phum_code\":\"A001\",\"phum_name_en\":\"svay chhek\",\"phum_name_kh\":\"\\u179f\\u17d2\\u179c\\u17b6\\u1799\\u1785\\u17c1\\u1780\",\"khum_code\":\"A001\",\"created\":null,\"modified\":null,\"created_by\":null,\"modified_by\":null},\"Fba\":[{\"fba_code\":\"FBA0002\",\"ca_code\":\"CA0003\"}],\"CommercialAgronomist\":[],\"ClientVendor\":[]}]','2014-03-20 08:00:08','2014-03-20 08:00:08',' UPDATE STATE : 0','Vendor','127.0.0.1'),(301,'A001','{\"client_name_en\":\"1\",\"client_name_kh\":\"1\",\"client_gender\":\"Male\",\"client_date_of_birth\":\"2014-03-20\",\"client_phone\":\"1\",\"client_datestarted\":\"2014-03-20\",\"client_date_ended\":\"2014-03-20\",\"khet_code\":\"A004\",\"srok_code\":\"A002\",\"khum_code\":\"A002\",\"phum_code\":\"A002\",\"created_by\":\"A001\",\"client_id\":\"A002.004\",\"id\":\"A002.004\"}','2014-03-20 09:24:11','2014-03-20 09:24:11',' CREATE NEW :A002.004','Client','127.0.0.1'),(302,'A001','{\"client_name_en\":\"\",\"client_name_kh\":\"\",\"client_gender\":\"Female\",\"client_date_of_birth\":\"2014-03-20\",\"client_phone\":\"\",\"client_datestarted\":\"2014-03-20\",\"phum_code\":\"\",\"client_id\":\".003\",\"id\":null}','2014-03-20 09:37:06','2014-03-20 09:37:06',' CREATE NEW :','Client','127.0.0.1'),(303,'A001','{\"client_name_en\":\"\",\"client_name_kh\":\"\",\"client_gender\":\"Female\",\"client_date_of_birth\":\"2014-03-20\",\"client_phone\":\"\",\"client_datestarted\":\"2014-03-20\",\"phum_code\":\"\",\"client_id\":\".003\",\"id\":null}','2014-03-20 09:38:11','2014-03-20 09:38:11',' CREATE NEW :','Client','127.0.0.1'),(304,'A001','{\"client_name_en\":\"2\",\"client_name_kh\":\"2\",\"client_gender\":\"Female\",\"client_date_of_birth\":\"2014-03-20\",\"client_phone\":\"2\",\"client_datestarted\":\"2014-03-20\",\"client_date_ended\":\"2014-03-20\",\"phum_code\":\"A002\",\"client_id\":\"A002.005\",\"id\":null}','2014-03-20 09:58:54','2014-03-20 09:58:54',' CREATE NEW :','Client','127.0.0.1'),(305,'A001','[{\"Client\":{\"client_id\":\".003\",\"client_name_kh\":\"\",\"client_date_of_birth\":\"2014-03-20\",\"client_datestarted\":\"2014-03-20\",\"client_name_en\":\"\",\"client_gender\":\"Female\",\"client_phone\":\"\",\"phum_code\":\"\",\"client_date_ended\":null,\"state\":\"1\",\"created\":\"2014-03-20 09:37:06\",\"modified\":\"2014-03-20 09:38:11\",\"created_by\":null,\"modified_by\":null},\"Phum\":{\"phum_code\":\"\",\"phum_name_en\":\"1\",\"phum_name_kh\":\"1\",\"khum_code\":\"A002\",\"created\":\"2014-03-18 09:04:50\",\"modified\":\"2014-03-18 09:04:50\",\"created_by\":\"A001\",\"modified_by\":null}}]','2014-03-20 10:01:53','2014-03-20 10:01:53','DELETE : .003','Client','127.0.0.1'),(306,'A001','[{\"Client\":{\"client_id\":\"A002.004\",\"client_name_kh\":\"1\",\"client_date_of_birth\":\"2014-03-20\",\"client_datestarted\":\"2014-03-20\",\"client_name_en\":\"1\",\"client_gender\":\"Male\",\"client_phone\":\"1\",\"phum_code\":\"A002\",\"client_date_ended\":\"2014-03-20\",\"state\":\"1\",\"created\":\"2014-03-20 09:24:11\",\"modified\":\"2014-03-20 09:24:11\",\"created_by\":\"A001\",\"modified_by\":null},\"Phum\":{\"phum_code\":\"A002\",\"phum_name_en\":\"thmey\",\"phum_name_kh\":\"\\u1790\\u17d2\\u1798\\u17b8\",\"khum_code\":\"A002\",\"created\":null,\"modified\":null,\"created_by\":null,\"modified_by\":null}}]','2014-03-20 10:03:41','2014-03-20 10:03:41','DELETE : A002.004','Client','127.0.0.1'),(307,'A001','[{\"Client\":{\"client_id\":\"A002.005\",\"client_name_kh\":\"2\",\"client_date_of_birth\":\"2014-03-20\",\"client_datestarted\":\"2014-03-20\",\"client_name_en\":\"2\",\"client_gender\":\"Female\",\"client_phone\":\"2\",\"phum_code\":\"A002\",\"client_date_ended\":\"2014-03-20\",\"state\":\"1\",\"created\":\"2014-03-20 09:58:54\",\"modified\":\"2014-03-20 09:58:54\",\"created_by\":null,\"modified_by\":null},\"Phum\":{\"phum_code\":\"A002\",\"phum_name_en\":\"thmey\",\"phum_name_kh\":\"\\u1790\\u17d2\\u1798\\u17b8\",\"khum_code\":\"A002\",\"created\":null,\"modified\":null,\"created_by\":null,\"modified_by\":null}}]','2014-03-20 10:03:48','2014-03-20 10:03:48','DELETE : A002.005','Client','127.0.0.1'),(308,'A001','[{\"Client\":{\"client_id\":\"A002.003\",\"client_name_kh\":\"1\",\"client_date_of_birth\":\"2014-03-12\",\"client_datestarted\":\"2014-03-12\",\"client_name_en\":\"1\",\"client_gender\":\"Male\",\"client_phone\":\"1\",\"phum_code\":\"A002\",\"client_date_ended\":\"2014-03-12\",\"state\":\"1\",\"created\":\"2014-03-12 06:44:45\",\"modified\":\"2014-03-12 06:44:45\",\"created_by\":\"A001\",\"modified_by\":null},\"Phum\":{\"phum_code\":\"A002\",\"phum_name_en\":\"thmey\",\"phum_name_kh\":\"\\u1790\\u17d2\\u1798\\u17b8\",\"khum_code\":\"A002\",\"created\":null,\"modified\":null,\"created_by\":null,\"modified_by\":null}}]','2014-03-20 10:03:55','2014-03-20 10:03:55','DELETE : A002.003','Client','127.0.0.1'),(309,'A001','{\"client_name_en\":\"1\",\"client_name_kh\":\"1\",\"client_gender\":\"Female\",\"client_date_of_birth\":\"2014-03-20\",\"client_phone\":\"1\",\"client_datestarted\":\"2014-03-20\",\"client_date_ended\":\"2014-03-20\",\"phum_code\":\"A002\",\"created_by\":\"A001\",\"client_id\":\"A002.003\",\"id\":null}','2014-03-20 10:04:31','2014-03-20 10:04:31',' CREATE NEW :','Client','127.0.0.1'),(310,'A001','[{\"Client\":{\"client_id\":\"A002.003\",\"client_name_kh\":\"1\",\"client_date_of_birth\":\"2014-03-20\",\"client_datestarted\":\"2014-03-20\",\"client_name_en\":\"1\",\"client_gender\":\"Female\",\"client_phone\":\"1\",\"phum_code\":\"A002\",\"client_date_ended\":\"2014-03-20\",\"state\":\"1\",\"created\":\"2014-03-20 10:04:31\",\"modified\":\"2014-03-20 10:04:31\",\"created_by\":\"A001\",\"modified_by\":null},\"Phum\":{\"phum_code\":\"A002\",\"phum_name_en\":\"thmey\",\"phum_name_kh\":\"\\u1790\\u17d2\\u1798\\u17b8\",\"khum_code\":\"A002\",\"created\":null,\"modified\":null,\"created_by\":null,\"modified_by\":null}}]','2014-03-20 10:05:15','2014-03-20 10:05:15','DELETE : A002.003','Client','127.0.0.1'),(311,'A001','{\"client_name_en\":\"44\",\"client_name_kh\":\"44\",\"client_gender\":\"Female\",\"client_date_of_birth\":\"2014-03-20\",\"client_phone\":\"44\",\"client_datestarted\":\"2014-03-20\",\"client_date_ended\":\"2014-03-20\",\"phum_code\":\"\",\"vendor_code\":\"undefined\",\"created_by\":\"A001\",\"client_id\":\".003\",\"id\":\".003\"}','2014-03-20 10:14:41','2014-03-20 10:14:41',' CREATE NEW :.003','Client','127.0.0.1'),(312,'A001','{\"client_name_en\":\"44\",\"client_name_kh\":\"44\",\"client_gender\":\"Female\",\"client_date_of_birth\":\"2014-03-20\",\"client_phone\":\"44\",\"client_datestarted\":\"2014-03-20\",\"client_date_ended\":\"2014-03-20\",\"phum_code\":\"A002\",\"vendor_code\":\"FBA0001\",\"clientvendor_datestarted\":\"2014-03-21\",\"created_by\":\"A001\",\"client_id\":\"A002.003\",\"id\":\"A002.003\"}','2014-03-20 10:27:02','2014-03-20 10:27:02',' CREATE NEW :A002.003','Client','127.0.0.1'),(313,'A001','{\"client_name_en\":\"1\",\"client_name_kh\":\"1\",\"client_gender\":\"Female\",\"client_date_of_birth\":\"2014-03-24\",\"client_phone\":\"1\",\"client_datestarted\":\"2014-03-24\",\"client_date_ended\":\"2014-03-24\",\"phum_code\":\"A002\",\"vendor_code\":\"FBA0003\",\"clientvendor_datestarted\":\"2014-03-05\",\"created_by\":\"A001\",\"client_id\":\"A002.004\",\"id\":\"A002.004\"}','2014-03-24 02:03:39','2014-03-24 02:03:39',' CREATE NEW :A002.004','Client','127.0.0.1'),(314,'A001','{\"nonclient_id\":\"NC0004\",\"client_datestarted\":\"2014-03-24\",\"client_date_ended\":\"2014-03-24\",\"clientvendor_datestarted\":\"2014-03-24\",\"created_by\":\"A001\",\"phum_code\":\"A003\",\"client_id\":\"A003.003\",\"client_name_en\":\"Tong Sreymom\",\"client_name_kh\":\"\",\"client_date_of_birth\":\"1990-07-02\",\"client_gender\":\"Female\",\"client_phone\":\"069666950\",\"id\":\"A003.003\"}','2014-03-24 02:05:30','2014-03-24 02:05:30',' CREATE NEW :A003.003','Client','127.0.0.1'),(315,'A001','{\"client_name_en\":\"2\",\"client_name_kh\":\"2\",\"client_gender\":\"Female\",\"client_date_of_birth\":\"2014-03-24\",\"client_phone\":\"2\",\"client_datestarted\":\"2014-03-24\",\"client_date_ended\":\"2014-03-24\",\"phum_code\":\"A002\",\"vendor_code\":\"FBA0003\",\"clientvendor_datestarted\":\"2014-03-24\",\"created_by\":\"A001\",\"client_id\":\"A002.005\",\"id\":\"A002.005\"}','2014-03-24 02:55:12','2014-03-24 02:55:12',' CREATE NEW :A002.005','Client','127.0.0.1'),(316,'A001','{\"nonclient_id\":\"NC0002\",\"client_datestarted\":\"2014-03-24\",\"client_date_ended\":\"2014-03-24\",\"clientvendor_datestarted\":\"2014-03-24\",\"created_by\":\"A001\",\"phum_code\":\"A001\",\"client_id\":\"A001.002\",\"client_name_en\":\"Sunly\",\"client_name_kh\":\"\\u179f\\u17bb\\u1793\\u179b\\u17b8\",\"client_date_of_birth\":\"1985-02-04\",\"client_gender\":\"Male\",\"client_phone\":\"098765442\",\"id\":\"A001.002\"}','2014-03-24 02:55:52','2014-03-24 02:55:52',' CREATE NEW :A001.002','Client','127.0.0.1'),(317,'A001','[{\"Sale\":{\"sale_id\":\"1\",\"sale_date\":\"2014-03-24\",\"sale_comment\":\"Mucle\",\"sale_value_usd\":\"1000\",\"created\":\"2014-03-24 02:04:23\",\"modified\":\"2014-03-24 02:04:23\",\"created_by\":\"A001\",\"modified_by\":null},\"VendorClientSale\":{\"vendor_code\":\"FBA0003\",\"client_id\":\"A002.004\",\"sale_id\":\"1\"}}]','2014-03-24 02:56:03','2014-03-24 02:56:03',' EDIT :1','Sale','127.0.0.1'),(318,'A001','[{\"Sale\":{\"sale_id\":\"2\",\"sale_date\":\"2014-03-24\",\"sale_comment\":\"PFD\",\"sale_value_usd\":\"10000\",\"created\":\"2014-03-24 02:07:55\",\"modified\":\"2014-03-24 02:07:55\",\"created_by\":\"A001\",\"modified_by\":null},\"VendorClientSale\":{\"vendor_code\":\"FBA0001\",\"client_id\":\"A003.003\",\"sale_id\":\"2\"}}]','2014-03-24 02:57:10','2014-03-24 02:57:10',' EDIT :2','Sale','127.0.0.1'),(319,'A001','{\"training_datestart\":\"2014-03-24\",\"training_datefinish\":\"2014-03-24\",\"training_responsible_staff\":\"enleang Sam\",\"crop_code\":\"C0004\",\"crop_type\":\"vegetable\",\"khet_code\":\"A005\",\"srok_code\":\"A003\",\"khum_code\":\"A003\",\"phum_code\":\"A003\",\"client\":[\"A001.001\"],\"clientname\":[\"Sreyleak : A001.001\"],\"client_id\":\"A001.001\",\"nonclient\":[\"NC0001\"],\"nonclientname\":[\"Kanika : NC0001\"],\"nonclient_id\":\"NC0001\",\"vendor\":[\"CA0001\"],\"vendorName\":[\"Engleang Sam : CA0001\"],\"vendor_code\":\"CA0001\",\"id\":\"17\",\"created_by\":\"A001\"}','2014-03-24 04:12:28','2014-03-24 04:12:28',' CREATE NEW :0','Training','127.0.0.1'),(320,'A001','{\"training_datestart\":\"2014-03-24\",\"training_datefinish\":\"2014-03-24\",\"training_responsible_staff\":\"Sreyleak \",\"crop_code\":\"C0002\",\"crop_type\":\"rice\",\"khet_code\":\"A004\",\"srok_code\":\"A002\",\"khum_code\":\"A002\",\"phum_code\":\"A002\",\"client\":[\"A001.001\"],\"clientname\":[\"Sreyleak : A001.001\"],\"client_id\":\"A001.001\",\"nonclient\":[\"NC0001\"],\"nonclientname\":[\"Kanika : NC0001\"],\"nonclient_id\":\"NC0001\",\"vendor\":[\"CA0003\"],\"vendorName\":[\"Khornlang Sam : CA0003\"],\"vendor_code\":\"CA0003\",\"id\":\"18\",\"created_by\":\"A001\"}','2014-03-24 04:18:57','2014-03-24 04:18:57',' CREATE NEW :0','Training','127.0.0.1'),(321,'A001','[{\"ClientTraining\":{\"clienttraining_id\":\"18\",\"training_id\":\"18\",\"client_id\":\"A001.001\",\"vendor_code\":null,\"nonclient_id\":null},\"Training\":{\"training_id\":\"18\",\"training_datestart\":\"2014-03-24\",\"training_datefinish\":\"2014-03-24\",\"crop_code\":\"C0002\",\"phum_code\":\"A002\",\"training_responsible_staff\":\"Sreyleak \",\"created\":\"2014-03-24 04:18:57\",\"modified\":\"2014-03-24 04:18:57\",\"created_by\":\"A001\",\"modified_by\":null},\"Client\":{\"client_id\":\"A001.001\",\"client_name_kh\":\"\\u179f\\u17d2\\u179a\\u17b8\\u179b\\u1780\\u17d2\\u1781\\u17d0\",\"client_date_of_birth\":\"1947-04-08\",\"client_datestarted\":\"2014-02-05\",\"client_name_en\":\"Sreyleak\",\"client_gender\":\"Female\",\"client_phone\":\"0764322342\",\"phum_code\":\"A001\",\"client_date_ended\":null,\"state\":\"1\",\"created\":null,\"modified\":\"2014-03-20 04:14:47\",\"created_by\":null,\"modified_by\":\"A001\"},\"NonClient\":{\"nonclient_id\":null,\"nonclient_name_kh\":null,\"nonclient_date_of_birth\":null,\"nonclient_name_en\":null,\"nonclient_gender\":null,\"nonclient_status\":null,\"nonclient_phone\":null,\"phum_code\":null,\"created\":null,\"modified\":null,\"created_by\":null,\"modified_by\":null},\"Vendor\":{\"vendor_code\":null,\"vendor_name_en\":null,\"vendor_name_kh\":null,\"vendor_gender\":null,\"vendor_date_of_birth\":null,\"vendor_phone\":null,\"vendor_email\":null,\"vendor_photo\":null,\"vendor_datestarted\":null,\"phum_code\":null,\"branch_manager\":null,\"vendor_date_ended\":null,\"vendor_type\":null,\"state\":null,\"created\":null,\"modified\":null,\"created_by\":null,\"modified_by\":null}}]','2014-03-24 04:41:08','2014-03-24 04:41:08','DELETE : 18','ClientTraining','127.0.0.1'),(322,'A001','[{\"Training\":{\"training_id\":\"18\",\"training_datestart\":\"2014-03-24\",\"training_datefinish\":\"2014-03-24\",\"crop_code\":\"C0002\",\"phum_code\":\"A002\",\"training_responsible_staff\":\"Sreyleak \",\"created\":\"2014-03-24 04:18:57\",\"modified\":\"2014-03-24 04:18:57\",\"created_by\":\"A001\",\"modified_by\":null},\"Crop\":{\"crop_code\":\"C0002\",\"crop_name_en\":\"Corn\",\"crop_name_kh\":\"\",\"crop_season\":null,\"crop_type\":\"rice\",\"product_code\":\"20PEST-Actara\",\"created\":\"0000-00-00 00:00:00\",\"modified\":\"2014-02-27 07:15:04\",\"created_by\":\"\",\"modified_by\":\"A001\"},\"Phum\":{\"phum_code\":\"A002\",\"phum_name_en\":\"thmey\",\"phum_name_kh\":\"\\u1790\\u17d2\\u1798\\u17b8\",\"khum_code\":\"A002\",\"created\":null,\"modified\":null,\"created_by\":null,\"modified_by\":null},\"ClientTraining\":[{\"clienttraining_id\":\"19\",\"training_id\":\"18\",\"client_id\":null,\"vendor_code\":null,\"nonclient_id\":\"NC0001\"},{\"clienttraining_id\":\"20\",\"training_id\":\"18\",\"client_id\":null,\"vendor_code\":\"CA0003\",\"nonclient_id\":null}]}]','2014-03-24 07:35:32','2014-03-24 07:35:32',' EDIT :18','Training','127.0.0.1'),(323,'A001','[{\"Training\":{\"training_id\":\"18\",\"training_datestart\":\"2014-03-24\",\"training_datefinish\":\"2014-03-24\",\"crop_code\":\"Corn\",\"phum_code\":\"A002\",\"training_responsible_staff\":\"Sreyleak \",\"created\":\"2014-03-24 04:18:57\",\"modified\":\"2014-03-24 07:35:32\",\"created_by\":\"A001\",\"modified_by\":\"A001\"},\"Crop\":{\"crop_code\":null,\"crop_name_en\":null,\"crop_name_kh\":null,\"crop_season\":null,\"crop_type\":null,\"product_code\":null,\"created\":null,\"modified\":null,\"created_by\":null,\"modified_by\":null},\"Phum\":{\"phum_code\":\"A002\",\"phum_name_en\":\"thmey\",\"phum_name_kh\":\"\\u1790\\u17d2\\u1798\\u17b8\",\"khum_code\":\"A002\",\"created\":null,\"modified\":null,\"created_by\":null,\"modified_by\":null},\"ClientTraining\":[{\"clienttraining_id\":\"21\",\"training_id\":\"18\",\"client_id\":\"A001.001\",\"vendor_code\":null,\"nonclient_id\":null},{\"clienttraining_id\":\"22\",\"training_id\":\"18\",\"client_id\":\"A001.002\",\"vendor_code\":null,\"nonclient_id\":null},{\"clienttraining_id\":\"23\",\"training_id\":\"18\",\"client_id\":null,\"vendor_code\":null,\"nonclient_id\":\"NC0001\"},{\"clienttraining_id\":\"24\",\"training_id\":\"18\",\"client_id\":null,\"vendor_code\":null,\"nonclient_id\":\"NC0003\"},{\"clienttraining_id\":\"25\",\"training_id\":\"18\",\"client_id\":null,\"vendor_code\":\"CA0003\",\"nonclient_id\":null},{\"clienttraining_id\":\"26\",\"training_id\":\"18\",\"client_id\":null,\"vendor_code\":\"CA0001\",\"nonclient_id\":null}]}]','2014-03-24 07:37:44','2014-03-24 07:37:44',' EDIT :18','Training','127.0.0.1'),(324,'A001','{\"training_datestart\":\"2014-03-24\",\"training_datefinish\":\"2014-03-24\",\"training_responsible_staff\":\"enleang Sam\",\"crop_code\":\"C0002\",\"crop_type\":\"rice\",\"khet_code\":\"A004\",\"srok_code\":\"A002\",\"khum_code\":\"A002\",\"phum_code\":\"A002\",\"client\":[\"A001.001\",\"A001.002\"],\"clientname\":[\"Sreyleak : A001.001\",\"Sunly : A001.002\"],\"client_id\":\"A001.002\",\"nonclient\":[\"NC0003\"],\"nonclientname\":[\"Briya : NC0003\"],\"nonclient_id\":\"NC0003\",\"vendor\":[\"CA0003\",\"FBA0001\"],\"vendorName\":[\"Khornlang Sam : CA0003\",\"Leakena Hang : FBA0001\"],\"vendor_code\":\"FBA0001\",\"id\":\"19\",\"created_by\":\"A001\"}','2014-03-24 07:45:23','2014-03-24 07:45:23',' CREATE NEW :0','Training','127.0.0.1'),(325,'A001','[{\"Training\":{\"training_id\":\"19\",\"training_datestart\":\"2014-03-24\",\"training_datefinish\":\"2014-03-24\",\"crop_code\":\"C0002\",\"phum_code\":\"A002\",\"training_responsible_staff\":\"enleang Sam\",\"created\":\"2014-03-24 07:45:23\",\"modified\":\"2014-03-24 07:45:23\",\"created_by\":\"A001\",\"modified_by\":null},\"Crop\":{\"crop_code\":\"C0002\",\"crop_name_en\":\"Corn\",\"crop_name_kh\":\"\",\"crop_season\":null,\"crop_type\":\"rice\",\"product_code\":\"20PEST-Actara\",\"created\":\"0000-00-00 00:00:00\",\"modified\":\"2014-02-27 07:15:04\",\"created_by\":\"\",\"modified_by\":\"A001\"},\"Phum\":{\"phum_code\":\"A002\",\"phum_name_en\":\"thmey\",\"phum_name_kh\":\"\\u1790\\u17d2\\u1798\\u17b8\",\"khum_code\":\"A002\",\"created\":null,\"modified\":null,\"created_by\":null,\"modified_by\":null},\"ClientTraining\":[{\"clienttraining_id\":\"33\",\"training_id\":\"19\",\"client_id\":\"A001.001\",\"vendor_code\":null,\"nonclient_id\":null},{\"clienttraining_id\":\"34\",\"training_id\":\"19\",\"client_id\":\"A001.002\",\"vendor_code\":null,\"nonclient_id\":null},{\"clienttraining_id\":\"35\",\"training_id\":\"19\",\"client_id\":null,\"vendor_code\":null,\"nonclient_id\":\"NC0003\"},{\"clienttraining_id\":\"36\",\"training_id\":\"19\",\"client_id\":null,\"vendor_code\":\"CA0003\",\"nonclient_id\":null},{\"clienttraining_id\":\"37\",\"training_id\":\"19\",\"client_id\":null,\"vendor_code\":\"FBA0001\",\"nonclient_id\":null}]}]','2014-03-24 07:59:50','2014-03-24 07:59:50',' EDIT :19','Training','127.0.0.1'),(326,'A001','[{\"Training\":{\"training_id\":\"19\",\"training_datestart\":\"2014-03-24\",\"training_datefinish\":\"2014-03-24\",\"crop_code\":\"C0002\",\"phum_code\":\"A003\",\"training_responsible_staff\":\"enleang Sam\",\"created\":\"2014-03-24 07:45:23\",\"modified\":\"2014-03-24 07:59:50\",\"created_by\":\"A001\",\"modified_by\":\"A001\"},\"Crop\":{\"crop_code\":\"C0002\",\"crop_name_en\":\"Corn\",\"crop_name_kh\":\"\",\"crop_season\":null,\"crop_type\":\"rice\",\"product_code\":\"20PEST-Actara\",\"created\":\"0000-00-00 00:00:00\",\"modified\":\"2014-02-27 07:15:04\",\"created_by\":\"\",\"modified_by\":\"A001\"},\"Phum\":{\"phum_code\":\"A003\",\"phum_name_en\":\"rokar\",\"phum_name_kh\":\"\\u179a\\u1780\\u17b6\\u179a\",\"khum_code\":\"A003\",\"created\":null,\"modified\":\"2014-03-05 02:47:32\",\"created_by\":null,\"modified_by\":\"A001\"},\"ClientTraining\":[{\"clienttraining_id\":\"33\",\"training_id\":\"19\",\"client_id\":\"A001.001\",\"vendor_code\":null,\"nonclient_id\":null},{\"clienttraining_id\":\"34\",\"training_id\":\"19\",\"client_id\":\"A001.002\",\"vendor_code\":null,\"nonclient_id\":null},{\"clienttraining_id\":\"35\",\"training_id\":\"19\",\"client_id\":null,\"vendor_code\":null,\"nonclient_id\":\"NC0003\"},{\"clienttraining_id\":\"36\",\"training_id\":\"19\",\"client_id\":null,\"vendor_code\":\"CA0003\",\"nonclient_id\":null},{\"clienttraining_id\":\"37\",\"training_id\":\"19\",\"client_id\":null,\"vendor_code\":\"FBA0001\",\"nonclient_id\":null}]}]','2014-03-24 08:24:32','2014-03-24 08:24:32',' EDIT :19','Training','127.0.0.1'),(327,'A001','[{\"Training\":{\"training_id\":\"19\",\"training_datestart\":\"2014-03-24\",\"training_datefinish\":\"2014-03-24\",\"crop_code\":\"C0002\",\"phum_code\":\"A003\",\"training_responsible_staff\":\"enleang Sam\",\"created\":\"2014-03-24 07:45:23\",\"modified\":\"2014-03-24 08:24:32\",\"created_by\":\"A001\",\"modified_by\":\"A001\"},\"Crop\":{\"crop_code\":\"C0002\",\"crop_name_en\":\"Corn\",\"crop_name_kh\":\"\",\"crop_season\":null,\"crop_type\":\"rice\",\"product_code\":\"20PEST-Actara\",\"created\":\"0000-00-00 00:00:00\",\"modified\":\"2014-02-27 07:15:04\",\"created_by\":\"\",\"modified_by\":\"A001\"},\"Phum\":{\"phum_code\":\"A003\",\"phum_name_en\":\"rokar\",\"phum_name_kh\":\"\\u179a\\u1780\\u17b6\\u179a\",\"khum_code\":\"A003\",\"created\":null,\"modified\":\"2014-03-05 02:47:32\",\"created_by\":null,\"modified_by\":\"A001\"},\"ClientTraining\":[{\"clienttraining_id\":\"33\",\"training_id\":\"19\",\"client_id\":\"A001.001\",\"vendor_code\":null,\"nonclient_id\":null},{\"clienttraining_id\":\"34\",\"training_id\":\"19\",\"client_id\":\"A001.002\",\"vendor_code\":null,\"nonclient_id\":null},{\"clienttraining_id\":\"35\",\"training_id\":\"19\",\"client_id\":null,\"vendor_code\":null,\"nonclient_id\":\"NC0003\"},{\"clienttraining_id\":\"36\",\"training_id\":\"19\",\"client_id\":null,\"vendor_code\":\"CA0003\",\"nonclient_id\":null},{\"clienttraining_id\":\"37\",\"training_id\":\"19\",\"client_id\":null,\"vendor_code\":\"FBA0001\",\"nonclient_id\":null}]}]','2014-03-24 08:25:07','2014-03-24 08:25:07',' EDIT :19','Training','127.0.0.1'),(328,'A001','[{\"ClientTraining\":{\"clienttraining_id\":\"33\",\"training_id\":\"19\",\"client_id\":\"A001.001\",\"vendor_code\":null,\"nonclient_id\":null},\"Training\":{\"training_id\":\"19\",\"training_datestart\":\"2014-03-24\",\"training_datefinish\":\"2014-03-24\",\"crop_code\":\"C0002\",\"phum_code\":\"A003\",\"training_responsible_staff\":\"enleang Sam\",\"created\":\"2014-03-24 07:45:23\",\"modified\":\"2014-03-24 08:25:07\",\"created_by\":\"A001\",\"modified_by\":\"A001\"},\"Client\":{\"client_id\":\"A001.001\",\"client_name_kh\":\"\\u179f\\u17d2\\u179a\\u17b8\\u179b\\u1780\\u17d2\\u1781\\u17d0\",\"client_date_of_birth\":\"1947-04-08\",\"client_datestarted\":\"2014-02-05\",\"client_name_en\":\"Sreyleak\",\"client_gender\":\"Female\",\"client_phone\":\"0764322342\",\"phum_code\":\"A001\",\"client_date_ended\":null,\"state\":\"1\",\"created\":null,\"modified\":\"2014-03-20 04:14:47\",\"created_by\":null,\"modified_by\":\"A001\"},\"NonClient\":{\"nonclient_id\":null,\"nonclient_name_kh\":null,\"nonclient_date_of_birth\":null,\"nonclient_name_en\":null,\"nonclient_gender\":null,\"nonclient_status\":null,\"nonclient_phone\":null,\"phum_code\":null,\"created\":null,\"modified\":null,\"created_by\":null,\"modified_by\":null},\"Vendor\":{\"vendor_code\":null,\"vendor_name_en\":null,\"vendor_name_kh\":null,\"vendor_gender\":null,\"vendor_date_of_birth\":null,\"vendor_phone\":null,\"vendor_email\":null,\"vendor_photo\":null,\"vendor_datestarted\":null,\"phum_code\":null,\"branch_manager\":null,\"vendor_date_ended\":null,\"vendor_type\":null,\"state\":null,\"created\":null,\"modified\":null,\"created_by\":null,\"modified_by\":null}}]','2014-03-24 08:37:18','2014-03-24 08:37:18','DELETE : 33','ClientTraining','127.0.0.1'),(329,'A001','[{\"Training\":{\"training_id\":\"19\",\"training_datestart\":\"2014-03-24\",\"training_datefinish\":\"2014-03-24\",\"crop_code\":\"C0002\",\"phum_code\":\"A003\",\"training_responsible_staff\":\"enleang Sam\",\"created\":\"2014-03-24 07:45:23\",\"modified\":\"2014-03-24 08:25:07\",\"created_by\":\"A001\",\"modified_by\":\"A001\"},\"Crop\":{\"crop_code\":\"C0002\",\"crop_name_en\":\"Corn\",\"crop_name_kh\":\"\",\"crop_season\":null,\"crop_type\":\"rice\",\"product_code\":\"20PEST-Actara\",\"created\":\"0000-00-00 00:00:00\",\"modified\":\"2014-02-27 07:15:04\",\"created_by\":\"\",\"modified_by\":\"A001\"},\"Phum\":{\"phum_code\":\"A003\",\"phum_name_en\":\"rokar\",\"phum_name_kh\":\"\\u179a\\u1780\\u17b6\\u179a\",\"khum_code\":\"A003\",\"created\":null,\"modified\":\"2014-03-05 02:47:32\",\"created_by\":null,\"modified_by\":\"A001\"},\"ClientTraining\":[{\"clienttraining_id\":\"34\",\"training_id\":\"19\",\"client_id\":\"A001.002\",\"vendor_code\":null,\"nonclient_id\":null},{\"clienttraining_id\":\"35\",\"training_id\":\"19\",\"client_id\":null,\"vendor_code\":null,\"nonclient_id\":\"NC0003\"},{\"clienttraining_id\":\"36\",\"training_id\":\"19\",\"client_id\":null,\"vendor_code\":\"CA0003\",\"nonclient_id\":null},{\"clienttraining_id\":\"37\",\"training_id\":\"19\",\"client_id\":null,\"vendor_code\":\"FBA0001\",\"nonclient_id\":null}]}]','2014-03-24 08:37:22','2014-03-24 08:37:22',' EDIT :19','Training','127.0.0.1'),(330,'A001','[{\"Training\":{\"training_id\":\"19\",\"training_datestart\":\"2014-03-24\",\"training_datefinish\":\"2014-03-24\",\"crop_code\":\"C0002\",\"phum_code\":\"A003\",\"training_responsible_staff\":\"enleang Sam\",\"created\":\"2014-03-24 07:45:23\",\"modified\":\"2014-03-24 08:37:23\",\"created_by\":\"A001\",\"modified_by\":\"A001\"},\"Crop\":{\"crop_code\":\"C0002\",\"crop_name_en\":\"Corn\",\"crop_name_kh\":\"\",\"crop_season\":null,\"crop_type\":\"rice\",\"product_code\":\"20PEST-Actara\",\"created\":\"0000-00-00 00:00:00\",\"modified\":\"2014-02-27 07:15:04\",\"created_by\":\"\",\"modified_by\":\"A001\"},\"Phum\":{\"phum_code\":\"A003\",\"phum_name_en\":\"rokar\",\"phum_name_kh\":\"\\u179a\\u1780\\u17b6\\u179a\",\"khum_code\":\"A003\",\"created\":null,\"modified\":\"2014-03-05 02:47:32\",\"created_by\":null,\"modified_by\":\"A001\"},\"ClientTraining\":[{\"clienttraining_id\":\"34\",\"training_id\":\"19\",\"client_id\":\"A001.002\",\"vendor_code\":null,\"nonclient_id\":null},{\"clienttraining_id\":\"35\",\"training_id\":\"19\",\"client_id\":null,\"vendor_code\":null,\"nonclient_id\":\"NC0003\"},{\"clienttraining_id\":\"36\",\"training_id\":\"19\",\"client_id\":null,\"vendor_code\":\"CA0003\",\"nonclient_id\":null},{\"clienttraining_id\":\"37\",\"training_id\":\"19\",\"client_id\":null,\"vendor_code\":\"FBA0001\",\"nonclient_id\":null}]}]','2014-03-24 08:37:43','2014-03-24 08:37:43',' EDIT :19','Training','127.0.0.1'),(331,'A001','[{\"ClientTraining\":{\"clienttraining_id\":\"35\",\"training_id\":\"19\",\"client_id\":null,\"vendor_code\":null,\"nonclient_id\":\"NC0003\"},\"Training\":{\"training_id\":\"19\",\"training_datestart\":\"2014-03-24\",\"training_datefinish\":\"2014-03-24\",\"crop_code\":\"C0002\",\"phum_code\":\"A003\",\"training_responsible_staff\":\"enleang Sam\",\"created\":\"2014-03-24 07:45:23\",\"modified\":\"2014-03-24 08:37:43\",\"created_by\":\"A001\",\"modified_by\":\"A001\"},\"Client\":{\"client_id\":null,\"client_name_kh\":null,\"client_date_of_birth\":null,\"client_datestarted\":null,\"client_name_en\":null,\"client_gender\":null,\"client_phone\":null,\"phum_code\":null,\"client_date_ended\":null,\"state\":null,\"created\":null,\"modified\":null,\"created_by\":null,\"modified_by\":null},\"NonClient\":{\"nonclient_id\":\"NC0003\",\"nonclient_name_kh\":\"\\u1794\\u17d2\\u179a\\u17b8\\u1799\\u17c9\\u17b6\",\"nonclient_date_of_birth\":\"1990-08-14\",\"nonclient_name_en\":\"Briya\",\"nonclient_gender\":\"Male\",\"nonclient_status\":\"1\",\"nonclient_phone\":\"011223232\",\"phum_code\":\"A003\",\"created\":null,\"modified\":null,\"created_by\":null,\"modified_by\":null},\"Vendor\":{\"vendor_code\":null,\"vendor_name_en\":null,\"vendor_name_kh\":null,\"vendor_gender\":null,\"vendor_date_of_birth\":null,\"vendor_phone\":null,\"vendor_email\":null,\"vendor_photo\":null,\"vendor_datestarted\":null,\"phum_code\":null,\"branch_manager\":null,\"vendor_date_ended\":null,\"vendor_type\":null,\"state\":null,\"created\":null,\"modified\":null,\"created_by\":null,\"modified_by\":null}}]','2014-03-24 08:47:04','2014-03-24 08:47:04','DELETE : 35','ClientTraining','127.0.0.1'),(332,'A001','[{\"ClientTraining\":{\"clienttraining_id\":\"36\",\"training_id\":\"19\",\"client_id\":null,\"vendor_code\":\"CA0003\",\"nonclient_id\":null},\"Training\":{\"training_id\":\"19\",\"training_datestart\":\"2014-03-24\",\"training_datefinish\":\"2014-03-24\",\"crop_code\":\"C0002\",\"phum_code\":\"A003\",\"training_responsible_staff\":\"enleang Sam\",\"created\":\"2014-03-24 07:45:23\",\"modified\":\"2014-03-24 08:37:43\",\"created_by\":\"A001\",\"modified_by\":\"A001\"},\"Client\":{\"client_id\":null,\"client_name_kh\":null,\"client_date_of_birth\":null,\"client_datestarted\":null,\"client_name_en\":null,\"client_gender\":null,\"client_phone\":null,\"phum_code\":null,\"client_date_ended\":null,\"state\":null,\"created\":null,\"modified\":null,\"created_by\":null,\"modified_by\":null},\"NonClient\":{\"nonclient_id\":null,\"nonclient_name_kh\":null,\"nonclient_date_of_birth\":null,\"nonclient_name_en\":null,\"nonclient_gender\":null,\"nonclient_status\":null,\"nonclient_phone\":null,\"phum_code\":null,\"created\":null,\"modified\":null,\"created_by\":null,\"modified_by\":null},\"Vendor\":{\"vendor_code\":\"CA0003\",\"vendor_name_en\":\"Khornlang Sam\",\"vendor_name_kh\":\"\",\"vendor_gender\":\"Female\",\"vendor_date_of_birth\":\"2014-03-19\",\"vendor_phone\":\"070 345 366\",\"vendor_email\":\"khornlang@yahoo.com\",\"vendor_photo\":null,\"vendor_datestarted\":\"2014-03-19\",\"phum_code\":\"A002\",\"branch_manager\":\"Chan Sarom\",\"vendor_date_ended\":\"2014-03-19\",\"vendor_type\":\"ca\",\"state\":\"1\",\"created\":\"2014-03-19 08:39:13\",\"modified\":\"2014-03-19 08:39:13\",\"created_by\":\"A001\",\"modified_by\":null}}]','2014-03-24 08:51:05','2014-03-24 08:51:05','DELETE : 36','ClientTraining','127.0.0.1'),(333,'A001','[{\"ClientTraining\":{\"clienttraining_id\":\"37\",\"training_id\":\"19\",\"client_id\":null,\"vendor_code\":\"FBA0001\",\"nonclient_id\":null},\"Training\":{\"training_id\":\"19\",\"training_datestart\":\"2014-03-24\",\"training_datefinish\":\"2014-03-24\",\"crop_code\":\"C0002\",\"phum_code\":\"A003\",\"training_responsible_staff\":\"enleang Sam\",\"created\":\"2014-03-24 07:45:23\",\"modified\":\"2014-03-24 08:37:43\",\"created_by\":\"A001\",\"modified_by\":\"A001\"},\"Client\":{\"client_id\":null,\"client_name_kh\":null,\"client_date_of_birth\":null,\"client_datestarted\":null,\"client_name_en\":null,\"client_gender\":null,\"client_phone\":null,\"phum_code\":null,\"client_date_ended\":null,\"state\":null,\"created\":null,\"modified\":null,\"created_by\":null,\"modified_by\":null},\"NonClient\":{\"nonclient_id\":null,\"nonclient_name_kh\":null,\"nonclient_date_of_birth\":null,\"nonclient_name_en\":null,\"nonclient_gender\":null,\"nonclient_status\":null,\"nonclient_phone\":null,\"phum_code\":null,\"created\":null,\"modified\":null,\"created_by\":null,\"modified_by\":null},\"Vendor\":{\"vendor_code\":\"FBA0001\",\"vendor_name_en\":\"Leakena Hang\",\"vendor_name_kh\":\"\\u17a0\\u1784\\u17cb\\u200b \\u179b\\u1780\\u17d2\\u1781\\u17b7\\u178e\\u17b6\",\"vendor_gender\":\"Female\",\"vendor_date_of_birth\":\"2014-03-19\",\"vendor_phone\":\"096 3043514\",\"vendor_email\":\"leankena.hang@gmail.com\",\"vendor_photo\":\"vendors\\/b079ade167e0a35a0a6a92eda4afad9aa51eb17a.png\",\"vendor_datestarted\":\"2014-03-19\",\"phum_code\":\"A001\",\"branch_manager\":null,\"vendor_date_ended\":\"2014-03-19\",\"vendor_type\":\"fba\",\"state\":\"1\",\"created\":\"2014-03-19 08:41:52\",\"modified\":\"2014-03-19 08:59:24\",\"created_by\":\"A001\",\"modified_by\":\"A001\"}}]','2014-03-24 08:51:29','2014-03-24 08:51:29','DELETE : 37','ClientTraining','127.0.0.1'),(334,'A001','[{\"ClientTraining\":{\"clienttraining_id\":\"34\",\"training_id\":\"19\",\"client_id\":\"A001.002\",\"vendor_code\":null,\"nonclient_id\":null},\"Training\":{\"training_id\":\"19\",\"training_datestart\":\"2014-03-24\",\"training_datefinish\":\"2014-03-24\",\"crop_code\":\"C0002\",\"phum_code\":\"A003\",\"training_responsible_staff\":\"enleang Sam\",\"created\":\"2014-03-24 07:45:23\",\"modified\":\"2014-03-24 08:37:43\",\"created_by\":\"A001\",\"modified_by\":\"A001\"},\"Client\":{\"client_id\":\"A001.002\",\"client_name_kh\":\"\\u179f\\u17bb\\u1793\\u179b\\u17b8\",\"client_date_of_birth\":\"1985-02-04\",\"client_datestarted\":\"2014-03-24\",\"client_name_en\":\"Sunly\",\"client_gender\":\"Male\",\"client_phone\":\"098765442\",\"phum_code\":\"A001\",\"client_date_ended\":\"2014-03-24\",\"state\":\"1\",\"created\":\"2014-03-24 02:55:52\",\"modified\":\"2014-03-24 02:55:52\",\"created_by\":\"A001\",\"modified_by\":null},\"NonClient\":{\"nonclient_id\":null,\"nonclient_name_kh\":null,\"nonclient_date_of_birth\":null,\"nonclient_name_en\":null,\"nonclient_gender\":null,\"nonclient_status\":null,\"nonclient_phone\":null,\"phum_code\":null,\"created\":null,\"modified\":null,\"created_by\":null,\"modified_by\":null},\"Vendor\":{\"vendor_code\":null,\"vendor_name_en\":null,\"vendor_name_kh\":null,\"vendor_gender\":null,\"vendor_date_of_birth\":null,\"vendor_phone\":null,\"vendor_email\":null,\"vendor_photo\":null,\"vendor_datestarted\":null,\"phum_code\":null,\"branch_manager\":null,\"vendor_date_ended\":null,\"vendor_type\":null,\"state\":null,\"created\":null,\"modified\":null,\"created_by\":null,\"modified_by\":null}}]','2014-03-24 08:51:33','2014-03-24 08:51:33','DELETE : 34','ClientTraining','127.0.0.1'),(335,'A001','[{\"Training\":{\"training_id\":\"19\",\"training_datestart\":\"2014-03-24\",\"training_datefinish\":\"2014-03-24\",\"crop_code\":\"C0002\",\"phum_code\":\"A003\",\"training_responsible_staff\":\"enleang Sam\",\"created\":\"2014-03-24 07:45:23\",\"modified\":\"2014-03-24 08:37:43\",\"created_by\":\"A001\",\"modified_by\":\"A001\"},\"Crop\":{\"crop_code\":\"C0002\",\"crop_name_en\":\"Corn\",\"crop_name_kh\":\"\",\"crop_season\":null,\"crop_type\":\"rice\",\"product_code\":\"20PEST-Actara\",\"created\":\"0000-00-00 00:00:00\",\"modified\":\"2014-02-27 07:15:04\",\"created_by\":\"\",\"modified_by\":\"A001\"},\"Phum\":{\"phum_code\":\"A003\",\"phum_name_en\":\"rokar\",\"phum_name_kh\":\"\\u179a\\u1780\\u17b6\\u179a\",\"khum_code\":\"A003\",\"created\":null,\"modified\":\"2014-03-05 02:47:32\",\"created_by\":null,\"modified_by\":\"A001\"},\"ClientTraining\":[]}]','2014-03-24 08:53:03','2014-03-24 08:53:03',' EDIT :19','Training','127.0.0.1'),(336,'A001','[{\"Training\":{\"training_id\":\"19\",\"training_datestart\":\"2014-03-24\",\"training_datefinish\":\"2014-03-24\",\"crop_code\":\"C0002\",\"phum_code\":\"A001\",\"training_responsible_staff\":\"enleang Sam\",\"created\":\"2014-03-24 07:45:23\",\"modified\":\"2014-03-24 08:53:03\",\"created_by\":\"A001\",\"modified_by\":\"A001\"},\"Crop\":{\"crop_code\":\"C0002\",\"crop_name_en\":\"Corn\",\"crop_name_kh\":\"\",\"crop_season\":null,\"crop_type\":\"rice\",\"product_code\":\"20PEST-Actara\",\"created\":\"0000-00-00 00:00:00\",\"modified\":\"2014-02-27 07:15:04\",\"created_by\":\"\",\"modified_by\":\"A001\"},\"Phum\":{\"phum_code\":\"A001\",\"phum_name_en\":\"svay chhek\",\"phum_name_kh\":\"\\u179f\\u17d2\\u179c\\u17b6\\u1799\\u1785\\u17c1\\u1780\",\"khum_code\":\"A001\",\"created\":null,\"modified\":null,\"created_by\":null,\"modified_by\":null},\"ClientTraining\":[]}]','2014-03-24 08:58:47','2014-03-24 08:58:47',' EDIT :19','Training','127.0.0.1'),(337,'A001','{\"meeting_date\":\"2014-03-25\",\"meeting_subject\":\"1\",\"meeting_responsible_staff\":\"1\",\"khet_code\":\"A004\",\"srok_code\":\"A002\",\"khum_code\":\"A002\",\"phum_code\":\"A002\",\"client\":[\"A001.001\"],\"clientname\":[\"Sreyleak : A001.001\"],\"client_id\":\"A001.001\",\"nonclient\":[\"NC0003\"],\"nonclientname\":[\"Briya : NC0003\"],\"nonclient_id\":\"NC0003\",\"vendor\":[\"FBA0001\"],\"vendorName\":[\"Leakena Hang : FBA0001\"],\"vendor_code\":\"FBA0001\",\"id\":\"0\",\"created_by\":\"A001\"}','2014-03-25 02:04:17','2014-03-25 02:04:17',' CREATE NEW :0','Meeting','127.0.0.1'),(338,'A001','{\"meeting_date\":\"2014-03-25\",\"meeting_subject\":\"1\",\"meeting_responsible_staff\":\"1\",\"khet_code\":\"A004\",\"srok_code\":\"A002\",\"khum_code\":\"A002\",\"phum_code\":\"A002\",\"client\":[\"A001.001\"],\"clientname\":[\"Sreyleak : A001.001\"],\"client_id\":\"A001.001\",\"nonclient\":[\"NC0001\"],\"nonclientname\":[\"Kanika : NC0001\"],\"nonclient_id\":\"NC0001\",\"vendor\":[\"CA0001\"],\"vendorName\":[\"Engleang Sam : CA0001\"],\"vendor_code\":\"CA0001\",\"id\":\"1\",\"created_by\":\"A001\"}','2014-03-25 02:07:26','2014-03-25 02:07:26',' CREATE NEW :0','Meeting','127.0.0.1'),(339,'A001','{\"meeting_date\":\"2014-03-25\",\"meeting_subject\":\"1\",\"meeting_responsible_staff\":\"1\",\"khet_code\":\"A004\",\"srok_code\":\"A002\",\"khum_code\":\"A002\",\"phum_code\":\"A002\",\"client\":[\"A001.001\"],\"clientname\":[\"Sreyleak : A001.001\"],\"client_id\":\"A001.001\",\"nonclient\":[\"NC0001\"],\"nonclientname\":[\"Kanika : NC0001\"],\"nonclient_id\":\"NC0001\",\"vendor\":[\"CA0001\"],\"vendorName\":[\"Engleang Sam : CA0001\"],\"vendor_code\":\"CA0001\",\"id\":\"2\",\"created_by\":\"A001\"}','2014-03-25 02:09:20','2014-03-25 02:09:20',' CREATE NEW :0','Meeting','127.0.0.1'),(340,'A001','[{\"ClientMeeting\":{\"clientmeeting_id\":\"8\",\"client_id\":null,\"meeting_id\":\"2\",\"vendor_code\":null,\"nonclient_id\":\"NC0001\"},\"Meeting\":{\"meeting_id\":\"2\",\"meeting_responsible_staff\":\"1\",\"meeting_subject\":\"1\",\"meeting_date\":\"2014-03-25\",\"phum_code\":\"A002\",\"created\":\"2014-03-25 02:09:20\",\"modified\":\"2014-03-25 02:09:20\",\"created_by\":\"A001\",\"modified_by\":null},\"Client\":{\"client_id\":null,\"client_name_kh\":null,\"client_date_of_birth\":null,\"client_datestarted\":null,\"client_name_en\":null,\"client_gender\":null,\"client_phone\":null,\"phum_code\":null,\"client_date_ended\":null,\"state\":null,\"created\":null,\"modified\":null,\"created_by\":null,\"modified_by\":null},\"NonClient\":{\"nonclient_id\":\"NC0001\",\"nonclient_name_kh\":\"\\u1780\\u1793\\u17b8\\u1780\\u17b6\",\"nonclient_date_of_birth\":\"1970-09-16\",\"nonclient_name_en\":\"Kanika\",\"nonclient_gender\":\"Female\",\"nonclient_status\":\"1\",\"nonclient_phone\":\"012676544\",\"phum_code\":\"A001\",\"created\":null,\"modified\":null,\"created_by\":null,\"modified_by\":null},\"Vendor\":{\"vendor_code\":null,\"vendor_name_en\":null,\"vendor_name_kh\":null,\"vendor_gender\":null,\"vendor_date_of_birth\":null,\"vendor_phone\":null,\"vendor_email\":null,\"vendor_photo\":null,\"vendor_datestarted\":null,\"phum_code\":null,\"branch_manager\":null,\"vendor_date_ended\":null,\"vendor_type\":null,\"state\":null,\"created\":null,\"modified\":null,\"created_by\":null,\"modified_by\":null}}]','2014-03-25 02:30:59','2014-03-25 02:30:59','DELETE : 8','ClientMeeting','127.0.0.1'),(341,'A001','[{\"ClientMeeting\":{\"clientmeeting_id\":\"9\",\"client_id\":null,\"meeting_id\":\"2\",\"vendor_code\":\"CA0001\",\"nonclient_id\":null},\"Meeting\":{\"meeting_id\":\"2\",\"meeting_responsible_staff\":\"1\",\"meeting_subject\":\"1\",\"meeting_date\":\"2014-03-25\",\"phum_code\":\"A002\",\"created\":\"2014-03-25 02:09:20\",\"modified\":\"2014-03-25 02:09:20\",\"created_by\":\"A001\",\"modified_by\":null},\"Client\":{\"client_id\":null,\"client_name_kh\":null,\"client_date_of_birth\":null,\"client_datestarted\":null,\"client_name_en\":null,\"client_gender\":null,\"client_phone\":null,\"phum_code\":null,\"client_date_ended\":null,\"state\":null,\"created\":null,\"modified\":null,\"created_by\":null,\"modified_by\":null},\"NonClient\":{\"nonclient_id\":null,\"nonclient_name_kh\":null,\"nonclient_date_of_birth\":null,\"nonclient_name_en\":null,\"nonclient_gender\":null,\"nonclient_status\":null,\"nonclient_phone\":null,\"phum_code\":null,\"created\":null,\"modified\":null,\"created_by\":null,\"modified_by\":null},\"Vendor\":{\"vendor_code\":\"CA0001\",\"vendor_name_en\":\"Engleang Sam\",\"vendor_name_kh\":\"\",\"vendor_gender\":\"Male\",\"vendor_date_of_birth\":\"2014-03-19\",\"vendor_phone\":\"098 567 346\",\"vendor_email\":\"engleang@gmail.com\",\"vendor_photo\":null,\"vendor_datestarted\":\"2014-03-19\",\"phum_code\":\"A002\",\"branch_manager\":\"Sieng Vansitha\",\"vendor_date_ended\":\"2014-03-19\",\"vendor_type\":\"ca\",\"state\":\"1\",\"created\":\"2014-03-19 08:31:25\",\"modified\":\"2014-03-19 08:31:54\",\"created_by\":\"A001\",\"modified_by\":null}}]','2014-03-25 02:31:45','2014-03-25 02:31:45','DELETE : 9','ClientMeeting','127.0.0.1'),(342,'A001','[{\"Meeting\":{\"meeting_id\":\"2\",\"meeting_responsible_staff\":\"1\",\"meeting_subject\":\"1\",\"meeting_date\":\"2014-03-25\",\"phum_code\":\"A002\",\"created\":\"2014-03-25 02:09:20\",\"modified\":\"2014-03-25 02:09:20\",\"created_by\":\"A001\",\"modified_by\":null},\"Phum\":{\"phum_code\":\"A002\",\"phum_name_en\":\"thmey\",\"phum_name_kh\":\"\\u1790\\u17d2\\u1798\\u17b8\",\"khum_code\":\"A002\",\"created\":null,\"modified\":null,\"created_by\":null,\"modified_by\":null},\"ClientMeeting\":[{\"clientmeeting_id\":\"7\",\"client_id\":\"A001.001\",\"meeting_id\":\"2\",\"vendor_code\":null,\"nonclient_id\":null}]}]','2014-03-25 02:51:36','2014-03-25 02:51:36',' EDIT :2','Meeting','127.0.0.1'),(343,'A001','[{\"Meeting\":{\"meeting_id\":\"2\",\"meeting_responsible_staff\":\"1\",\"meeting_subject\":\"1\",\"meeting_date\":\"2014-03-25\",\"phum_code\":\"A002\",\"created\":\"2014-03-25 02:09:20\",\"modified\":\"2014-03-25 02:51:36\",\"created_by\":\"A001\",\"modified_by\":\"A001\"},\"Phum\":{\"phum_code\":\"A002\",\"phum_name_en\":\"thmey\",\"phum_name_kh\":\"\\u1790\\u17d2\\u1798\\u17b8\",\"khum_code\":\"A002\",\"created\":null,\"modified\":null,\"created_by\":null,\"modified_by\":null},\"ClientMeeting\":[{\"clientmeeting_id\":\"7\",\"client_id\":\"A001.001\",\"meeting_id\":\"2\",\"vendor_code\":null,\"nonclient_id\":null}]}]','2014-03-25 02:58:40','2014-03-25 02:58:40',' EDIT :2','Meeting','127.0.0.1'),(344,'A001','[{\"Meeting\":{\"meeting_id\":\"2\",\"meeting_responsible_staff\":\"1\",\"meeting_subject\":\"1\",\"meeting_date\":\"2014-03-25\",\"phum_code\":\"A002\",\"created\":\"2014-03-25 02:09:20\",\"modified\":\"2014-03-25 02:58:40\",\"created_by\":\"A001\",\"modified_by\":\"A001\"},\"Phum\":{\"phum_code\":\"A002\",\"phum_name_en\":\"thmey\",\"phum_name_kh\":\"\\u1790\\u17d2\\u1798\\u17b8\",\"khum_code\":\"A002\",\"created\":null,\"modified\":null,\"created_by\":null,\"modified_by\":null},\"ClientMeeting\":[{\"clientmeeting_id\":\"7\",\"client_id\":\"A001.001\",\"meeting_id\":\"2\",\"vendor_code\":null,\"nonclient_id\":null}]}]','2014-03-25 03:05:55','2014-03-25 03:05:55',' EDIT :2','Meeting','127.0.0.1'),(345,'A001','[{\"ClientMeeting\":{\"clientmeeting_id\":\"7\",\"client_id\":\"A001.001\",\"meeting_id\":\"2\",\"vendor_code\":null,\"nonclient_id\":null},\"Meeting\":{\"meeting_id\":\"2\",\"meeting_responsible_staff\":\"1\",\"meeting_subject\":\"1\",\"meeting_date\":\"2014-03-25\",\"phum_code\":\"A002\",\"created\":\"2014-03-25 02:09:20\",\"modified\":\"2014-03-25 03:05:56\",\"created_by\":\"A001\",\"modified_by\":\"A001\"},\"Client\":{\"client_id\":\"A001.001\",\"client_name_kh\":\"\\u179f\\u17d2\\u179a\\u17b8\\u179b\\u1780\\u17d2\\u1781\\u17d0\",\"client_date_of_birth\":\"1947-04-08\",\"client_datestarted\":\"2014-02-05\",\"client_name_en\":\"Sreyleak\",\"client_gender\":\"Female\",\"client_phone\":\"0764322342\",\"phum_code\":\"A001\",\"client_date_ended\":null,\"state\":\"1\",\"created\":null,\"modified\":\"2014-03-20 04:14:47\",\"created_by\":null,\"modified_by\":\"A001\"},\"NonClient\":{\"nonclient_id\":null,\"nonclient_name_kh\":null,\"nonclient_date_of_birth\":null,\"nonclient_name_en\":null,\"nonclient_gender\":null,\"nonclient_status\":null,\"nonclient_phone\":null,\"phum_code\":null,\"created\":null,\"modified\":null,\"created_by\":null,\"modified_by\":null},\"Vendor\":{\"vendor_code\":null,\"vendor_name_en\":null,\"vendor_name_kh\":null,\"vendor_gender\":null,\"vendor_date_of_birth\":null,\"vendor_phone\":null,\"vendor_email\":null,\"vendor_photo\":null,\"vendor_datestarted\":null,\"phum_code\":null,\"branch_manager\":null,\"vendor_date_ended\":null,\"vendor_type\":null,\"state\":null,\"created\":null,\"modified\":null,\"created_by\":null,\"modified_by\":null}}]','2014-03-25 03:26:40','2014-03-25 03:26:40','DELETE : 7','ClientMeeting','127.0.0.1'),(346,'A001','[{\"Meeting\":{\"meeting_id\":\"2\",\"meeting_responsible_staff\":\"1\",\"meeting_subject\":\"1\",\"meeting_date\":\"2014-03-25\",\"phum_code\":\"A002\",\"created\":\"2014-03-25 02:09:20\",\"modified\":\"2014-03-25 03:05:56\",\"created_by\":\"A001\",\"modified_by\":\"A001\"},\"Phum\":{\"phum_code\":\"A002\",\"phum_name_en\":\"thmey\",\"phum_name_kh\":\"\\u1790\\u17d2\\u1798\\u17b8\",\"khum_code\":\"A002\",\"created\":null,\"modified\":null,\"created_by\":null,\"modified_by\":null},\"ClientMeeting\":[]}]','2014-03-25 03:33:10','2014-03-25 03:33:10',' EDIT :2','Meeting','127.0.0.1'),(347,'A001','[{\"Meeting\":{\"meeting_id\":\"2\",\"meeting_responsible_staff\":\"1\",\"meeting_subject\":\"1\",\"meeting_date\":\"2014-03-25\",\"phum_code\":\"A003\",\"created\":\"2014-03-25 02:09:20\",\"modified\":\"2014-03-25 03:33:10\",\"created_by\":\"A001\",\"modified_by\":\"A001\"},\"Phum\":{\"phum_code\":\"A003\",\"phum_name_en\":\"rokar\",\"phum_name_kh\":\"\\u179a\\u1780\\u17b6\\u179a\",\"khum_code\":\"A003\",\"created\":null,\"modified\":\"2014-03-05 02:47:32\",\"created_by\":null,\"modified_by\":\"A001\"},\"ClientMeeting\":[]}]','2014-03-25 03:52:49','2014-03-25 03:52:49',' EDIT :2','Meeting','127.0.0.1'),(348,'A001','[{\"Plot\":{\"plot_id\":\"5\",\"plot_size_m2\":\"1000\",\"plot_dateplanting\":\"2014-03-12\",\"plot_centroid_x\":\"1000\",\"plot_datestart\":\"2014-03-12\",\"plot_centroid_y\":\"1000\",\"plot_crop_cycle\":\"2\",\"plot_type_treatment\":\"FDP\",\"client_id\":\"A002.002\",\"crop_code\":\"C0002\",\"project_id\":\"2\",\"vendor_code\":null,\"created\":\"2014-03-12 07:21:56\",\"modified\":\"2014-03-12 07:21:56\",\"created_by\":\"A001\",\"modified_by\":null},\"Client\":{\"client_id\":\"A002.002\",\"client_name_kh\":\"\\u1783\\u17bb\\u1793\\u17a1\\u17b6\\u1784\",\"client_date_of_birth\":\"1993-06-08\",\"client_datestarted\":\"2014-02-03\",\"client_name_en\":\"khornlang\",\"client_gender\":\"Male\",\"client_phone\":\"070564322\",\"phum_code\":\"A002\",\"client_date_ended\":null,\"state\":\"1\",\"created\":null,\"modified\":null,\"created_by\":null,\"modified_by\":null},\"Crop\":{\"crop_code\":\"C0002\",\"crop_name_en\":\"Corn\",\"crop_name_kh\":\"\",\"crop_season\":null,\"crop_type\":\"rice\",\"product_code\":\"20PEST-Actara\",\"created\":\"0000-00-00 00:00:00\",\"modified\":\"2014-02-27 07:15:04\",\"created_by\":\"\",\"modified_by\":\"A001\"},\"Project\":{\"project_id\":\"2\",\"project_name_en\":\"Harvest\",\"created\":null,\"modified\":null,\"created_by\":null,\"modified_by\":null},\"Vendor\":{\"vendor_code\":null,\"vendor_name_en\":null,\"vendor_name_kh\":null,\"vendor_gender\":null,\"vendor_date_of_birth\":null,\"vendor_phone\":null,\"vendor_email\":null,\"vendor_photo\":null,\"vendor_datestarted\":null,\"phum_code\":null,\"branch_manager\":null,\"vendor_date_ended\":null,\"vendor_type\":null,\"state\":null,\"created\":null,\"modified\":null,\"created_by\":null,\"modified_by\":null}}]','2014-03-25 04:14:36','2014-03-25 04:14:36','DELETE : 5','Plot','127.0.0.1'),(349,'A001','[{\"Plot\":{\"plot_id\":\"4\",\"plot_size_m2\":\"5000\",\"plot_dateplanting\":\"2014-03-05\",\"plot_centroid_x\":\"11111\",\"plot_datestart\":\"2014-03-05\",\"plot_centroid_y\":\"11111\",\"plot_crop_cycle\":null,\"plot_type_treatment\":null,\"client_id\":null,\"crop_code\":\"C0001\",\"project_id\":\"2\",\"vendor_code\":\"VD001\",\"created\":\"2014-03-05 08:10:41\",\"modified\":\"2014-03-05 08:10:41\",\"created_by\":\"A001\",\"modified_by\":null},\"Client\":{\"client_id\":null,\"client_name_kh\":null,\"client_date_of_birth\":null,\"client_datestarted\":null,\"client_name_en\":null,\"client_gender\":null,\"client_phone\":null,\"phum_code\":null,\"client_date_ended\":null,\"state\":null,\"created\":null,\"modified\":null,\"created_by\":null,\"modified_by\":null},\"Crop\":{\"crop_code\":\"C0001\",\"crop_name_en\":\"Rice\",\"crop_name_kh\":\"\\u179f\\u17d2\\u179a\\u17bc\\u179c\",\"crop_season\":\"wetseason\",\"crop_type\":\"rice\",\"product_code\":\"P00001\",\"created\":\"0000-00-00 00:00:00\",\"modified\":\"2014-02-27 07:14:59\",\"created_by\":\"\",\"modified_by\":\"A001\"},\"Project\":{\"project_id\":\"2\",\"project_name_en\":\"Harvest\",\"created\":null,\"modified\":null,\"created_by\":null,\"modified_by\":null},\"Vendor\":{\"vendor_code\":null,\"vendor_name_en\":null,\"vendor_name_kh\":null,\"vendor_gender\":null,\"vendor_date_of_birth\":null,\"vendor_phone\":null,\"vendor_email\":null,\"vendor_photo\":null,\"vendor_datestarted\":null,\"phum_code\":null,\"branch_manager\":null,\"vendor_date_ended\":null,\"vendor_type\":null,\"state\":null,\"created\":null,\"modified\":null,\"created_by\":null,\"modified_by\":null}}]','2014-03-25 04:14:51','2014-03-25 04:14:51','DELETE : 4','Plot','127.0.0.1'),(350,'A001','[{\"Plot\":{\"plot_id\":\"3\",\"plot_size_m2\":\"500\",\"plot_dateplanting\":\"2014-03-05\",\"plot_centroid_x\":\"111\",\"plot_datestart\":\"2014-03-05\",\"plot_centroid_y\":\"111\",\"plot_crop_cycle\":null,\"plot_type_treatment\":null,\"client_id\":null,\"crop_code\":\"C0005\",\"project_id\":\"2\",\"vendor_code\":\"VD002\",\"created\":\"2014-03-05 08:04:26\",\"modified\":\"2014-03-05 08:04:26\",\"created_by\":\"A001\",\"modified_by\":null},\"Client\":{\"client_id\":null,\"client_name_kh\":null,\"client_date_of_birth\":null,\"client_datestarted\":null,\"client_name_en\":null,\"client_gender\":null,\"client_phone\":null,\"phum_code\":null,\"client_date_ended\":null,\"state\":null,\"created\":null,\"modified\":null,\"created_by\":null,\"modified_by\":null},\"Crop\":{\"crop_code\":\"C0005\",\"crop_name_en\":\"Lemon\",\"crop_name_kh\":\"\",\"crop_season\":null,\"crop_type\":\"vegetable\",\"product_code\":\"20PEST-Actara\",\"created\":\"2014-02-24 00:00:00\",\"modified\":\"2014-02-24 00:00:00\",\"created_by\":null,\"modified_by\":null},\"Project\":{\"project_id\":\"2\",\"project_name_en\":\"Harvest\",\"created\":null,\"modified\":null,\"created_by\":null,\"modified_by\":null},\"Vendor\":{\"vendor_code\":null,\"vendor_name_en\":null,\"vendor_name_kh\":null,\"vendor_gender\":null,\"vendor_date_of_birth\":null,\"vendor_phone\":null,\"vendor_email\":null,\"vendor_photo\":null,\"vendor_datestarted\":null,\"phum_code\":null,\"branch_manager\":null,\"vendor_date_ended\":null,\"vendor_type\":null,\"state\":null,\"created\":null,\"modified\":null,\"created_by\":null,\"modified_by\":null}}]','2014-03-25 04:14:58','2014-03-25 04:14:58','DELETE : 3','Plot','127.0.0.1'),(351,'A001','[{\"Plot\":{\"plot_id\":\"1\",\"plot_size_m2\":\"1000\",\"plot_dateplanting\":\"2014-03-05\",\"plot_centroid_x\":\"1111\",\"plot_datestart\":\"2014-03-05\",\"plot_centroid_y\":\"1111\",\"plot_crop_cycle\":null,\"plot_type_treatment\":null,\"client_id\":\"A001.001\",\"crop_code\":\"C0001\",\"project_id\":\"2\",\"vendor_code\":null,\"created\":\"2014-03-05 07:54:53\",\"modified\":\"2014-03-05 07:54:53\",\"created_by\":\"A001\",\"modified_by\":null},\"Client\":{\"client_id\":\"A001.001\",\"client_name_kh\":\"\\u179f\\u17d2\\u179a\\u17b8\\u179b\\u1780\\u17d2\\u1781\\u17d0\",\"client_date_of_birth\":\"1947-04-08\",\"client_datestarted\":\"2014-02-05\",\"client_name_en\":\"Sreyleak\",\"client_gender\":\"Female\",\"client_phone\":\"0764322342\",\"phum_code\":\"A001\",\"client_date_ended\":null,\"state\":\"1\",\"created\":null,\"modified\":\"2014-03-20 04:14:47\",\"created_by\":null,\"modified_by\":\"A001\"},\"Crop\":{\"crop_code\":\"C0001\",\"crop_name_en\":\"Rice\",\"crop_name_kh\":\"\\u179f\\u17d2\\u179a\\u17bc\\u179c\",\"crop_season\":\"wetseason\",\"crop_type\":\"rice\",\"product_code\":\"P00001\",\"created\":\"0000-00-00 00:00:00\",\"modified\":\"2014-02-27 07:14:59\",\"created_by\":\"\",\"modified_by\":\"A001\"},\"Project\":{\"project_id\":\"2\",\"project_name_en\":\"Harvest\",\"created\":null,\"modified\":null,\"created_by\":null,\"modified_by\":null},\"Vendor\":{\"vendor_code\":null,\"vendor_name_en\":null,\"vendor_name_kh\":null,\"vendor_gender\":null,\"vendor_date_of_birth\":null,\"vendor_phone\":null,\"vendor_email\":null,\"vendor_photo\":null,\"vendor_datestarted\":null,\"phum_code\":null,\"branch_manager\":null,\"vendor_date_ended\":null,\"vendor_type\":null,\"state\":null,\"created\":null,\"modified\":null,\"created_by\":null,\"modified_by\":null}}]','2014-03-25 04:37:34','2014-03-25 04:37:34',' DELETE LIST','Plot','127.0.0.1'),(352,'A001','[{\"Plot\":{\"plot_id\":\"2\",\"plot_size_m2\":\"1000\",\"plot_dateplanting\":\"2014-03-05\",\"plot_centroid_x\":\"11111\",\"plot_datestart\":\"2014-03-05\",\"plot_centroid_y\":\"11111\",\"plot_crop_cycle\":\"3\",\"plot_type_treatment\":\"FDP\",\"client_id\":\"A003.001\",\"crop_code\":\"C0004\",\"project_id\":\"3\",\"vendor_code\":null,\"created\":\"2014-03-05 08:03:38\",\"modified\":\"2014-03-05 08:03:38\",\"created_by\":\"A001\",\"modified_by\":null},\"Client\":{\"client_id\":\"A003.001\",\"client_name_kh\":\"\\u179b\\u1780\\u17d2\\u1781\\u17b7\\u178e\\u17b6\",\"client_date_of_birth\":\"2014-02-03\",\"client_datestarted\":\"2014-02-01\",\"client_name_en\":\"Leakena\",\"client_gender\":\"Female\",\"client_phone\":\"015672424\",\"phum_code\":\"A003\",\"client_date_ended\":null,\"state\":\"1\",\"created\":null,\"modified\":null,\"created_by\":null,\"modified_by\":null},\"Crop\":{\"crop_code\":\"C0004\",\"crop_name_en\":\"Cucumber \",\"crop_name_kh\":\"\",\"crop_season\":null,\"crop_type\":\"vegetable\",\"product_code\":\"20PEST-Actara\",\"created\":\"0000-00-00 00:00:00\",\"modified\":\"2014-02-27 07:15:16\",\"created_by\":\"\",\"modified_by\":\"A001\"},\"Project\":{\"project_id\":\"3\",\"project_name_en\":\"test\",\"created\":\"2014-02-26 07:37:43\",\"modified\":\"2014-02-26 07:37:43\",\"created_by\":\"A001\",\"modified_by\":null},\"Vendor\":{\"vendor_code\":null,\"vendor_name_en\":null,\"vendor_name_kh\":null,\"vendor_gender\":null,\"vendor_date_of_birth\":null,\"vendor_phone\":null,\"vendor_email\":null,\"vendor_photo\":null,\"vendor_datestarted\":null,\"phum_code\":null,\"branch_manager\":null,\"vendor_date_ended\":null,\"vendor_type\":null,\"state\":null,\"created\":null,\"modified\":null,\"created_by\":null,\"modified_by\":null}}]','2014-03-25 04:37:35','2014-03-25 04:37:35',' DELETE LIST','Plot','127.0.0.1'),(353,'A001','{\"project_id\":\"2\",\"plot_dateplanting\":\"2014-03-25\",\"plot_datestart\":\"2014-03-25\",\"crop_code\":\"C0002\",\"plot_size_m2\":\"100\",\"plot_centroid_x\":\"11111\",\"plot_centroid_y\":\"11111\",\"plot_crop_cycle\":\"1\",\"plot_type_treatment\":\"Broadcasting\",\"client_id\":\"A003.003\",\"created_by\":\"A001\",\"id\":\"6\"}','2014-03-25 06:30:03','2014-03-25 06:30:03',' CREATE NEW :6','Plot','127.0.0.1'),(354,'A001','{\"project_id\":\"2\",\"vendor_code\":\"FBA0003\",\"fba_check\":\"on\",\"plot_dateplanting\":\"2014-03-25\",\"plot_datestart\":\"2014-03-25\",\"crop_code\":\"C0001\",\"plot_size_m2\":\"1000\",\"plot_centroid_x\":\"111112\",\"plot_centroid_y\":\"111112\",\"plot_crop_cycle\":\"1\",\"plot_type_treatment\":\"FDP\",\"created_by\":\"A001\",\"id\":\"7\"}','2014-03-25 07:17:30','2014-03-25 07:17:30',' CREATE NEW :7','Plot','127.0.0.1'),(355,'A001','{\"project_id\":\"2\",\"plot_dateplanting\":\"2014-03-25\",\"plot_datestart\":\"2014-03-25\",\"crop_code\":\"1\",\"plot_size_m2\":\"1\",\"plot_centroid_x\":\"1\",\"plot_centroid_y\":\"1\",\"plot_crop_cycle\":\"1\",\"plot_type_treatment\":\"Drumseeding\",\"created_by\":\"A001\",\"id\":\"8\"}','2014-03-25 07:44:57','2014-03-25 07:44:57',' CREATE NEW :8','Plot','127.0.0.1'),(356,'A001','[{\"Plot\":{\"plot_id\":\"8\",\"plot_size_m2\":\"1\",\"plot_dateplanting\":\"2014-03-25\",\"plot_centroid_x\":\"1\",\"plot_datestart\":\"2014-03-25\",\"plot_centroid_y\":\"1\",\"plot_crop_cycle\":\"1\",\"plot_type_treatment\":\"Drumseeding\",\"client_id\":null,\"crop_code\":\"1\",\"project_id\":\"2\",\"vendor_code\":null,\"created\":\"2014-03-25 07:44:57\",\"modified\":\"2014-03-25 07:44:57\",\"created_by\":\"A001\",\"modified_by\":null},\"Client\":{\"client_id\":null,\"client_name_kh\":null,\"client_date_of_birth\":null,\"client_datestarted\":null,\"client_name_en\":null,\"client_gender\":null,\"client_phone\":null,\"phum_code\":null,\"client_date_ended\":null,\"state\":null,\"created\":null,\"modified\":null,\"created_by\":null,\"modified_by\":null},\"Crop\":{\"crop_code\":\"1\",\"crop_name_en\":\"1\",\"crop_name_kh\":\"1\",\"crop_season\":\"\",\"crop_type\":\"vegetable\",\"product_code\":\"1\",\"created\":\"2014-03-13 07:34:39\",\"modified\":\"2014-03-13 07:59:49\",\"created_by\":\"A001\",\"modified_by\":\"A001\"},\"Project\":{\"project_id\":\"2\",\"project_name_en\":\"Harvest\",\"created\":null,\"modified\":null,\"created_by\":null,\"modified_by\":null},\"Vendor\":{\"vendor_code\":null,\"vendor_name_en\":null,\"vendor_name_kh\":null,\"vendor_gender\":null,\"vendor_date_of_birth\":null,\"vendor_phone\":null,\"vendor_email\":null,\"vendor_photo\":null,\"vendor_datestarted\":null,\"phum_code\":null,\"branch_manager\":null,\"vendor_date_ended\":null,\"vendor_type\":null,\"state\":null,\"created\":null,\"modified\":null,\"created_by\":null,\"modified_by\":null}}]','2014-03-25 07:45:10','2014-03-25 07:45:10','DELETE : 8','Plot','127.0.0.1');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `user_id` varchar(100) NOT NULL,
  `user_name_en` varchar(100) DEFAULT NULL,
  `user_name_kh` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `user_permission` varchar(100) DEFAULT NULL,
  `user_password` varchar(100) DEFAULT NULL,
  `user_username` varchar(100) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `modified_by` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`user_id`,`user_name_en`,`user_name_kh`,`user_permission`,`user_password`,`user_username`,`created`,`modified`,`created_by`,`modified_by`) values ('A001','Sreyleak Hang','ស្រីលក្ខ័','superadmin','bf18a12e65a2c74cec7f1b4434eeae76203e6b869606df585e9d7218556ef565','leak123',NULL,'2014-02-25 08:39:55',NULL,'A001'),('A002','Engleang','','admin','fd5d6d4bf3f971e7b74a1474001ecfce9812eb1546dc18a0a911b22080c0b849','eangleang','2014-02-25 08:38:47','2014-02-25 09:01:30','A001','A001');

/*Table structure for table `vegetableweekharvestvegetables` */

DROP TABLE IF EXISTS `vegetableweekharvestvegetables`;

CREATE TABLE `vegetableweekharvestvegetables` (
  `vegetableweekharvestvegetable_client_id` varchar(100) NOT NULL,
  `vegetableweekharvestvegetable_harvestvegetable_id` int(11) DEFAULT NULL,
  `vegetableweekharvestvegetable_vegetableweek_id` int(11) DEFAULT NULL,
  `vegetableweekharvestvegetable_week_6_10` int(11) DEFAULT NULL,
  `vegetableweekharvestvegetable_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `vegetableweekharvestvegetables` */

insert  into `vegetableweekharvestvegetables`(`vegetableweekharvestvegetable_client_id`,`vegetableweekharvestvegetable_harvestvegetable_id`,`vegetableweekharvestvegetable_vegetableweek_id`,`vegetableweekharvestvegetable_week_6_10`,`vegetableweekharvestvegetable_date`) values ('A002.001',1,6,10,'2014-02-18'),('A002.001',2,9,6,'2014-02-19'),('A002.001',3,9,6,'2014-02-19'),('A003.001',2,11,8,'2014-03-06'),('A003.001',3,11,8,'0000-00-00'),('A003.001',3,11,8,'2014-03-04'),('A002.005',4,NULL,NULL,'2014-03-04'),('A003.001',5,11,8,'2014-03-04'),('A003.002',6,12,8,'2014-03-05');

/*Table structure for table `vegetableweeks` */

DROP TABLE IF EXISTS `vegetableweeks`;

CREATE TABLE `vegetableweeks` (
  `vegetableweek_id` int(11) NOT NULL AUTO_INCREMENT,
  `week` int(11) DEFAULT NULL,
  `week_date` date DEFAULT NULL,
  `week_trainer` varchar(100) DEFAULT NULL,
  `week_topic1` varchar(100) DEFAULT NULL,
  `week_topic2` varchar(100) DEFAULT NULL,
  `week_topic3` varchar(100) DEFAULT NULL,
  `week_topic4` varchar(100) DEFAULT NULL,
  `week_client_attend` tinyint(1) DEFAULT NULL,
  `training_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `modified_by` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`vegetableweek_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `vegetableweeks` */

insert  into `vegetableweeks`(`vegetableweek_id`,`week`,`week_date`,`week_trainer`,`week_topic1`,`week_topic2`,`week_topic3`,`week_topic4`,`week_client_attend`,`training_id`,`created`,`modified`,`created_by`,`modified_by`) values (6,7,'2014-02-18','Engleang Sam','2 Plow Land','Vegetable Bed','Plastic Mulch','Fertilizer',1,4,NULL,'2014-02-25 07:43:58',NULL,'A001'),(7,1,'2014-02-18','Sreyleak Hang','Agriculture','2 Plow Land','Plastic Mulch','Vegetable Bed',1,7,NULL,NULL,NULL,NULL),(8,1,'2014-02-26','Sreyleak Hang','2 Plow Land','Plastic Mulch','Vegetable Bed','Agriculture',0,8,'2014-02-26 07:35:10','2014-02-26 07:35:10','A001',NULL),(9,6,'2014-02-26','Engleang Sam','Agriculture','2 Plow Land','Vegetable Bed','Plastic Mulch',0,11,'2014-02-26 07:42:24','2014-02-26 07:42:46','A001','A001'),(11,8,'2014-03-03','Engleang Sam','Agriculture','2 Plow Land','Vegetable Bed','53tesr',0,13,'2014-03-03 07:02:59','2014-03-03 07:02:59','A001',NULL),(12,8,'2014-03-01','Sreyleak Hang','2 Plow Land','Vegetable Bed','Plastic Mulch','Agriculture',0,6,'2014-03-03 08:30:31','2014-03-03 08:30:31','A001',NULL);

/*Table structure for table `vendorclientsales` */

DROP TABLE IF EXISTS `vendorclientsales`;

CREATE TABLE `vendorclientsales` (
  `vendor_code` varchar(100) NOT NULL,
  `client_id` varchar(100) NOT NULL,
  `sale_id` int(11) NOT NULL,
  PRIMARY KEY (`sale_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `vendorclientsales` */

insert  into `vendorclientsales`(`vendor_code`,`client_id`,`sale_id`) values ('FBA0001','A001.002',1),('FBA0003','A002.001',2);

/*Table structure for table `vendors` */

DROP TABLE IF EXISTS `vendors`;

CREATE TABLE `vendors` (
  `vendor_code` varchar(20) NOT NULL,
  `vendor_name_en` varchar(50) DEFAULT NULL,
  `vendor_name_kh` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `vendor_gender` varchar(20) DEFAULT NULL,
  `vendor_date_of_birth` date DEFAULT NULL,
  `vendor_phone` varchar(20) DEFAULT NULL,
  `vendor_email` varchar(50) DEFAULT NULL,
  `vendor_photo` varchar(255) DEFAULT NULL,
  `vendor_datestarted` date DEFAULT NULL,
  `phum_code` varchar(100) DEFAULT NULL,
  `branch_manager` varchar(255) DEFAULT NULL,
  `vendor_date_ended` date DEFAULT NULL,
  `vendor_type` varchar(255) DEFAULT NULL,
  `state` int(11) DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `modified_by` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`vendor_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `vendors` */

insert  into `vendors`(`vendor_code`,`vendor_name_en`,`vendor_name_kh`,`vendor_gender`,`vendor_date_of_birth`,`vendor_phone`,`vendor_email`,`vendor_photo`,`vendor_datestarted`,`phum_code`,`branch_manager`,`vendor_date_ended`,`vendor_type`,`state`,`created`,`modified`,`created_by`,`modified_by`) values ('CA0001','Engleang Sam','','Male','2014-03-19','098 567 346','engleang@gmail.com',NULL,'2014-03-19','A002','Sieng Vansitha','2014-03-19','ca',1,'2014-03-19 08:31:25','2014-03-19 08:31:54','A001',NULL),('CA0002','Sreyleak Hang','','Female','2014-03-19','098 567 287','sreyleak099@yahoo.com',NULL,'2014-03-19','A001','Om Sopheap','2014-03-19','ca',1,'2014-03-19 08:35:45','2014-03-19 08:35:45','A001',NULL),('CA0003','Khornlang Sam','','Female','2014-03-19','070 345 366','khornlang@yahoo.com',NULL,'2014-03-19','A002','Chan Sarom','2014-03-19','ca',1,'2014-03-19 08:39:13','2014-03-19 08:39:13','A001',NULL),('FBA0001','Leakena Hang','ហង់​ លក្ខិណា','Female','2014-03-19','096 3043514','leankena.hang@gmail.com','vendors/b079ade167e0a35a0a6a92eda4afad9aa51eb17a.png','2014-03-19','A001',NULL,'2014-03-19','fba',1,'2014-03-19 08:41:52','2014-03-19 08:59:24','A001','A001'),('FBA0002','Chamreoun Hang','','Male','2014-03-19','015 787 686','chamreoung@yahoo.com',NULL,'2014-03-19','A001',NULL,'2014-03-19','fba',1,'2014-03-19 08:53:20','2014-03-20 08:00:08','A001','A001'),('FBA0003','Chhay Rambo','','Male','2014-03-20','016 22 32 78','rambo.cute@gmail.com',NULL,'2014-03-20','A001',NULL,'2014-03-20','fba',1,'2014-03-20 07:47:44','2014-03-20 07:59:59','A001',NULL);

/*Table structure for table `vw_cademos` */

DROP TABLE IF EXISTS `vw_cademos`;

/*!50001 DROP VIEW IF EXISTS `vw_cademos` */;
/*!50001 DROP TABLE IF EXISTS `vw_cademos` */;

/*!50001 CREATE TABLE  `vw_cademos`(
 `vendor_code` varchar(20) ,
 `vendor_name_en` varchar(50) ,
 `vendor_name_kh` varchar(50) ,
 `vendor_gender` varchar(20) ,
 `vendor_date_of_birth` date ,
 `vendor_phone` varchar(20) ,
 `vendor_email` varchar(50) ,
 `vendor_photo` varchar(255) ,
 `vendor_datestarted` date ,
 `phum_code` varchar(100) ,
 `branch_manager` varchar(255) ,
 `vendor_date_ended` date ,
 `vendor_type` varchar(255) ,
 `state` int(11) ,
 `created` datetime ,
 `modified` datetime ,
 `created_by` varchar(255) ,
 `modified_by` varchar(255) ,
 `fba_date_started` date ,
 `fb_date_end` date 
)*/;

/*Table structure for table `vw_fbademos` */

DROP TABLE IF EXISTS `vw_fbademos`;

/*!50001 DROP VIEW IF EXISTS `vw_fbademos` */;
/*!50001 DROP TABLE IF EXISTS `vw_fbademos` */;

/*!50001 CREATE TABLE  `vw_fbademos`(
 `vendor_code` varchar(20) ,
 `vendor_name_en` varchar(50) ,
 `vendor_name_kh` varchar(50) ,
 `vendor_gender` varchar(20) ,
 `vendor_date_of_birth` date ,
 `vendor_phone` varchar(20) ,
 `vendor_email` varchar(50) ,
 `vendor_photo` varchar(255) ,
 `vendor_datestarted` date ,
 `phum_code` varchar(100) ,
 `branch_manager` varchar(255) ,
 `vendor_date_ended` date ,
 `vendor_type` varchar(255) ,
 `state` int(11) ,
 `created` datetime ,
 `modified` datetime ,
 `created_by` varchar(255) ,
 `modified_by` varchar(255) ,
 `khet_name_en` varchar(50) ,
 `srok_name_en` varchar(50) ,
 `khum_name_en` varchar(50) ,
 `phum_name_en` varchar(50) 
)*/;

/*Table structure for table `vw_location` */

DROP TABLE IF EXISTS `vw_location`;

/*!50001 DROP VIEW IF EXISTS `vw_location` */;
/*!50001 DROP TABLE IF EXISTS `vw_location` */;

/*!50001 CREATE TABLE  `vw_location`(
 `phum_code` varchar(20) ,
 `phum_name_en` varchar(50) ,
 `khum_code` varchar(20) ,
 `khum_name_en` varchar(50) ,
 `srok_code` varchar(20) ,
 `srok_name_en` varchar(50) ,
 `khet_code` varchar(50) ,
 `khet_name_en` varchar(50) 
)*/;

/*Table structure for table `vw_meeting` */

DROP TABLE IF EXISTS `vw_meeting`;

/*!50001 DROP VIEW IF EXISTS `vw_meeting` */;
/*!50001 DROP TABLE IF EXISTS `vw_meeting` */;

/*!50001 CREATE TABLE  `vw_meeting`(
 `meeting_id` int(11) ,
 `meeting_date` date ,
 `meeting_responsible_staff` varchar(100) ,
 `meeting_subject` varchar(255) ,
 `meeting_location` varchar(209) ,
 `participant_name_en` varchar(255) ,
 `participant_gender` varchar(100) ,
 `ftype` varchar(9) ,
 `phum_code` varchar(20) ,
 `phum_name_en` varchar(50) ,
 `khum_name_en` varchar(50) ,
 `srok_name_en` varchar(50) ,
 `khet_name_en` varchar(50) ,
 `fba` varchar(50) 
)*/;

/*Table structure for table `vw_ricedemos` */

DROP TABLE IF EXISTS `vw_ricedemos`;

/*!50001 DROP VIEW IF EXISTS `vw_ricedemos` */;
/*!50001 DROP TABLE IF EXISTS `vw_ricedemos` */;

/*!50001 CREATE TABLE  `vw_ricedemos`(
 `p_client_id` varchar(100) ,
 `plot_centroid_x` float ,
 `plot_crop_cycle` varchar(255) ,
 `plot_dateplanting` date ,
 `plot_datestart` date ,
 `plot_type_treatment` varchar(255) ,
 `plot_size_m2` float ,
 `p_vendor_code` varchar(100) ,
 `pr_project_name_en` varchar(100) ,
 `cv_vendor_code` varchar(100) ,
 `v_vendor_name_en` varchar(50) ,
 `v_vendor_code` varchar(20) ,
 `v_vendor_gender` varchar(20) ,
 `v_branch_manager` varchar(255) ,
 `v_phum_code` varchar(100) ,
 `c_client_id` varchar(50) ,
 `c_client_name_en` varchar(255) ,
 `c_client_gender` varchar(50) ,
 `c_phum_code` varchar(100) ,
 `co_crop_code` varchar(50) ,
 `co_crop_name_en` varchar(100) ,
 `co_crop_season` varchar(255) ,
 `co_crop_type` varchar(100) ,
 `co_product_code` varchar(100) ,
 `ph_phum_code` varchar(20) ,
 `ph_phum_name_en` varchar(50) ,
 `ph_khum_code` varchar(50) ,
 `kh_srok_code` varchar(50) ,
 `kh_khum_code` varchar(20) ,
 `khum_name_en` varchar(50) ,
 `sr_srok_code` varchar(20) ,
 `srok_name_en` varchar(50) ,
 `sr_khet_code` varchar(50) ,
 `kt_khet_code` varchar(50) ,
 `khet_name_en` varchar(50) ,
 `ven_client_vendor_code` varchar(20) ,
 `ven_client_vendor_name_en` varchar(50) ,
 `ven_client_vendor_gender` varchar(20) ,
 `ven_client_branch_manager` varchar(255) ,
 `ven_ca_vendor_code` varchar(20) ,
 `ven_ca_vendor_name_en` varchar(50) ,
 `ven_ca_vendor_gender` varchar(20) ,
 `ven_ca_branch_manager` varchar(255) ,
 `ven_v_name_en` varchar(50) ,
 `ven_v_gender` varchar(20) ,
 `ven_v_branch_manager` varchar(255) 
)*/;

/*Table structure for table `vw_training` */

DROP TABLE IF EXISTS `vw_training`;

/*!50001 DROP VIEW IF EXISTS `vw_training` */;
/*!50001 DROP TABLE IF EXISTS `vw_training` */;

/*!50001 CREATE TABLE  `vw_training`(
 `training_id` int(11) ,
 `training_responsible_staff` varchar(255) ,
 `participant_name` varchar(255) ,
 `participant_gender` varchar(100) ,
 `riceweek_id` int(11) ,
 `vegetableweek_id` int(11) ,
 `crop_code` varchar(50) ,
 `crop_type` varchar(100) ,
 `training_datestart` date ,
 `training_datefinish` date ,
 `ftype` varchar(9) ,
 `week_trainer` varchar(100) ,
 `week_topic1` varchar(100) ,
 `week_topic2` varchar(100) ,
 `week_topic3` varchar(100) ,
 `week_topic4` varchar(100) ,
 `week_date` date ,
 `training_location` varchar(203) ,
 `phum_code` varchar(20) ,
 `phum_name_en` varchar(50) ,
 `khum_name_en` varchar(50) ,
 `srok_name_en` varchar(50) ,
 `khet_name_en` varchar(50) ,
 `fba` varchar(50) 
)*/;

/*Table structure for table `vw_vegetabledemos` */

DROP TABLE IF EXISTS `vw_vegetabledemos`;

/*!50001 DROP VIEW IF EXISTS `vw_vegetabledemos` */;
/*!50001 DROP TABLE IF EXISTS `vw_vegetabledemos` */;

/*!50001 CREATE TABLE  `vw_vegetabledemos`(
 `p_client_id` varchar(100) ,
 `plot_centroid_x` float ,
 `plot_crop_cycle` varchar(255) ,
 `plot_dateplanting` date ,
 `plot_datestart` date ,
 `plot_type_treatment` varchar(255) ,
 `plot_size_m2` float ,
 `p_vendor_code` varchar(100) ,
 `pr_project_name_en` varchar(100) ,
 `cv_vendor_code` varchar(100) ,
 `v_vendor_name_en` varchar(50) ,
 `v_vendor_code` varchar(20) ,
 `v_vendor_gender` varchar(20) ,
 `v_branch_manager` varchar(255) ,
 `v_phum_code` varchar(100) ,
 `c_client_id` varchar(50) ,
 `c_client_name_en` varchar(255) ,
 `c_client_gender` varchar(50) ,
 `c_phum_code` varchar(100) ,
 `co_crop_code` varchar(50) ,
 `co_crop_name_en` varchar(100) ,
 `co_crop_season` varchar(255) ,
 `co_crop_type` varchar(100) ,
 `co_product_code` varchar(100) ,
 `ph_phum_code` varchar(20) ,
 `ph_phum_name_en` varchar(50) ,
 `ph_khum_code` varchar(50) ,
 `kh_srok_code` varchar(50) ,
 `kh_khum_code` varchar(20) ,
 `khum_name_en` varchar(50) ,
 `sr_srok_code` varchar(20) ,
 `srok_name_en` varchar(50) ,
 `sr_khet_code` varchar(50) ,
 `kt_khet_code` varchar(50) ,
 `khet_name_en` varchar(50) ,
 `ven_client_vendor_code` varchar(20) ,
 `ven_client_vendor_name_en` varchar(50) ,
 `ven_client_vendor_gender` varchar(20) ,
 `ven_client_branch_manager` varchar(255) ,
 `ven_ca_vendor_code` varchar(20) ,
 `ven_ca_vendor_name_en` varchar(50) ,
 `ven_ca_vendor_gender` varchar(20) ,
 `ven_ca_branch_manager` varchar(255) ,
 `ven_v_name_en` varchar(50) ,
 `ven_v_gender` varchar(20) ,
 `ven_v_branch_manager` varchar(255) 
)*/;

/*View structure for view vw_cademos */

/*!50001 DROP TABLE IF EXISTS `vw_cademos` */;
/*!50001 DROP VIEW IF EXISTS `vw_cademos` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_cademos` AS (select `ca`.`vendor_code` AS `vendor_code`,`ca`.`vendor_name_en` AS `vendor_name_en`,`ca`.`vendor_name_kh` AS `vendor_name_kh`,`ca`.`vendor_gender` AS `vendor_gender`,`ca`.`vendor_date_of_birth` AS `vendor_date_of_birth`,`ca`.`vendor_phone` AS `vendor_phone`,`ca`.`vendor_email` AS `vendor_email`,`ca`.`vendor_photo` AS `vendor_photo`,`ca`.`vendor_datestarted` AS `vendor_datestarted`,`ca`.`phum_code` AS `phum_code`,`ca`.`branch_manager` AS `branch_manager`,`ca`.`vendor_date_ended` AS `vendor_date_ended`,`ca`.`vendor_type` AS `vendor_type`,`ca`.`state` AS `state`,`ca`.`created` AS `created`,`ca`.`modified` AS `modified`,`ca`.`created_by` AS `created_by`,`ca`.`modified_by` AS `modified_by`,`fba`.`vendor_date_ended` AS `fba_date_started`,`fba`.`vendor_date_ended` AS `fb_date_end` from ((`vendors` `ca` left join `fbas` `fbav` on((`ca`.`vendor_code` = `fbav`.`ca_code`))) left join `vendors` `fba` on((`fba`.`vendor_code` = `fbav`.`fba_code`))) where (`ca`.`vendor_type` = 'ca') group by `ca`.`vendor_code`) */;

/*View structure for view vw_fbademos */

/*!50001 DROP TABLE IF EXISTS `vw_fbademos` */;
/*!50001 DROP VIEW IF EXISTS `vw_fbademos` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_fbademos` AS (select `v`.`vendor_code` AS `vendor_code`,`v`.`vendor_name_en` AS `vendor_name_en`,`v`.`vendor_name_kh` AS `vendor_name_kh`,`v`.`vendor_gender` AS `vendor_gender`,`v`.`vendor_date_of_birth` AS `vendor_date_of_birth`,`v`.`vendor_phone` AS `vendor_phone`,`v`.`vendor_email` AS `vendor_email`,`v`.`vendor_photo` AS `vendor_photo`,`v`.`vendor_datestarted` AS `vendor_datestarted`,`v`.`phum_code` AS `phum_code`,`v`.`branch_manager` AS `branch_manager`,`v`.`vendor_date_ended` AS `vendor_date_ended`,`v`.`vendor_type` AS `vendor_type`,`v`.`state` AS `state`,`v`.`created` AS `created`,`v`.`modified` AS `modified`,`v`.`created_by` AS `created_by`,`v`.`modified_by` AS `modified_by`,`loc`.`khet_name_en` AS `khet_name_en`,`loc`.`srok_name_en` AS `srok_name_en`,`loc`.`khum_name_en` AS `khum_name_en`,`loc`.`phum_name_en` AS `phum_name_en` from (`vendors` `v` left join `vw_location` `loc` on((`v`.`phum_code` = `loc`.`phum_code`))) where (`v`.`vendor_type` = 'fba')) */;

/*View structure for view vw_location */

/*!50001 DROP TABLE IF EXISTS `vw_location` */;
/*!50001 DROP VIEW IF EXISTS `vw_location` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_location` AS (select `p`.`phum_code` AS `phum_code`,`p`.`phum_name_en` AS `phum_name_en`,`kh`.`khum_code` AS `khum_code`,`kh`.`khum_name_en` AS `khum_name_en`,`sr`.`srok_code` AS `srok_code`,`sr`.`srok_name_en` AS `srok_name_en`,`kt`.`khet_code` AS `khet_code`,`kt`.`khet_name_en` AS `khet_name_en` from (((`phums` `p` join `khums` `kh` on((`p`.`khum_code` = `kh`.`khum_code`))) join `sroks` `sr` on((`sr`.`srok_code` = `kh`.`srok_code`))) join `khets` `kt` on((`sr`.`khet_code` = `kt`.`khet_code`)))) */;

/*View structure for view vw_meeting */

/*!50001 DROP TABLE IF EXISTS `vw_meeting` */;
/*!50001 DROP VIEW IF EXISTS `vw_meeting` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_meeting` AS (select `m`.`meeting_id` AS `meeting_id`,`m`.`meeting_date` AS `meeting_date`,`m`.`meeting_responsible_staff` AS `meeting_responsible_staff`,`m`.`meeting_subject` AS `meeting_subject`,concat(`loc`.`khet_name_en`,' , ',`loc`.`srok_name_en`,' , ',`loc`.`khum_name_en`,' , ',`loc`.`phum_name_en`) AS `meeting_location`,ifnull(`c`.`client_name_en`,ifnull(`v`.`vendor_name_en`,`nc`.`nonclient_name_en`)) AS `participant_name_en`,ifnull(`c`.`client_gender`,ifnull(`v`.`vendor_gender`,`nc`.`nonclient_gender`)) AS `participant_gender`,if(isnull(`c`.`client_id`),if(isnull(`v`.`vendor_code`),if(isnull(`nc`.`nonclient_id`),NULL,'nonclient'),'fba'),'client') AS `ftype`,ifnull(`ven_loc`.`phum_code`,`c_loc`.`phum_code`) AS `phum_code`,ifnull(`ven_loc`.`phum_name_en`,`c_loc`.`phum_name_en`) AS `phum_name_en`,ifnull(`ven_loc`.`khum_name_en`,`c_loc`.`khum_name_en`) AS `khum_name_en`,ifnull(`ven_loc`.`srok_name_en`,`c_loc`.`srok_name_en`) AS `srok_name_en`,ifnull(`ven_loc`.`khet_name_en`,`c_loc`.`khet_name_en`) AS `khet_name_en`,ifnull(`ven_c`.`vendor_name_en`,`v`.`vendor_name_en`) AS `fba` from ((((((((((`meetings` `m` left join `clientmeetings` `cm` on((`m`.`meeting_id` = `cm`.`meeting_id`))) left join `clients` `c` on((`c`.`client_id` = `cm`.`client_id`))) left join `vendors` `v` on((`v`.`vendor_code` = `cm`.`vendor_code`))) left join `nonclients` `nc` on((`nc`.`nonclient_id` = `cm`.`nonclient_id`))) left join `clientvendors` `cv` on((`cv`.`client_id` = `c`.`client_id`))) left join `vendors` `ven_c` on((`ven_c`.`vendor_code` = `cv`.`vendor_code`))) left join `vw_location` `loc` on((`loc`.`phum_code` = `m`.`phum_code`))) left join `vw_location` `ven_loc` on((`ven_loc`.`phum_code` = `v`.`phum_code`))) left join `vw_location` `c_loc` on((`c_loc`.`phum_code` = `c`.`phum_code`))) left join `vw_location` `vl` on((`vl`.`phum_code` = `m`.`phum_code`)))) */;

/*View structure for view vw_ricedemos */

/*!50001 DROP TABLE IF EXISTS `vw_ricedemos` */;
/*!50001 DROP VIEW IF EXISTS `vw_ricedemos` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_ricedemos` AS (select `p`.`client_id` AS `p_client_id`,`p`.`plot_centroid_x` AS `plot_centroid_x`,`p`.`plot_crop_cycle` AS `plot_crop_cycle`,`p`.`plot_dateplanting` AS `plot_dateplanting`,`p`.`plot_datestart` AS `plot_datestart`,`p`.`plot_type_treatment` AS `plot_type_treatment`,`p`.`plot_size_m2` AS `plot_size_m2`,`p`.`vendor_code` AS `p_vendor_code`,`pr`.`project_name_en` AS `pr_project_name_en`,`cv`.`vendor_code` AS `cv_vendor_code`,`v`.`vendor_name_en` AS `v_vendor_name_en`,`v`.`vendor_code` AS `v_vendor_code`,`v`.`vendor_gender` AS `v_vendor_gender`,`v`.`branch_manager` AS `v_branch_manager`,`v`.`phum_code` AS `v_phum_code`,`c`.`client_id` AS `c_client_id`,`c`.`client_name_en` AS `c_client_name_en`,`c`.`client_gender` AS `c_client_gender`,`c`.`phum_code` AS `c_phum_code`,`co`.`crop_code` AS `co_crop_code`,`co`.`crop_name_en` AS `co_crop_name_en`,`co`.`crop_season` AS `co_crop_season`,`co`.`crop_type` AS `co_crop_type`,`co`.`product_code` AS `co_product_code`,`ph`.`phum_code` AS `ph_phum_code`,`ph`.`phum_name_en` AS `ph_phum_name_en`,`ph`.`khum_code` AS `ph_khum_code`,`kh`.`srok_code` AS `kh_srok_code`,`kh`.`khum_code` AS `kh_khum_code`,`kh`.`khum_name_en` AS `khum_name_en`,`sr`.`srok_code` AS `sr_srok_code`,`sr`.`srok_name_en` AS `srok_name_en`,`sr`.`khet_code` AS `sr_khet_code`,`kt`.`khet_code` AS `kt_khet_code`,`kt`.`khet_name_en` AS `khet_name_en`,`ven_client`.`vendor_code` AS `ven_client_vendor_code`,`ven_client`.`vendor_name_en` AS `ven_client_vendor_name_en`,`ven_client`.`vendor_gender` AS `ven_client_vendor_gender`,`ven_client`.`branch_manager` AS `ven_client_branch_manager`,`ven_ca`.`vendor_code` AS `ven_ca_vendor_code`,`ven_ca`.`vendor_name_en` AS `ven_ca_vendor_name_en`,`ven_ca`.`vendor_gender` AS `ven_ca_vendor_gender`,`ven_ca`.`branch_manager` AS `ven_ca_branch_manager`,`ven_v`.`vendor_name_en` AS `ven_v_name_en`,`ven_v`.`vendor_gender` AS `ven_v_gender`,`ven_v`.`branch_manager` AS `ven_v_branch_manager` from ((((((((((((((`plots` `p` left join `vendors` `v` on((`p`.`vendor_code` = `v`.`vendor_code`))) left join `clients` `c` on((`p`.`client_id` = `c`.`client_id`))) left join `clientvendors` `cv` on((`cv`.`client_id` = `c`.`client_id`))) left join `vendors` `ven_client` on((`ven_client`.`vendor_code` = `cv`.`vendor_code`))) left join `fbas` `fba` on((`fba`.`fba_code` = `ven_client`.`vendor_code`))) left join `vendors` `ven_ca` on((`ven_ca`.`vendor_code` = `fba`.`ca_code`))) left join `fbas` `fbav` on((`fbav`.`fba_code` = `v`.`vendor_code`))) left join `vendors` `ven_v` on((`ven_v`.`vendor_code` = `fbav`.`ca_code`))) left join `crops` `co` on((`p`.`crop_code` = `co`.`crop_code`))) left join `projects` `pr` on((`pr`.`project_id` = `p`.`project_id`))) join `phums` `ph` on(((`ph`.`phum_code` = `c`.`phum_code`) or (`v`.`phum_code` = `ph`.`phum_code`)))) join `khums` `kh` on((`ph`.`khum_code` = `kh`.`khum_code`))) join `sroks` `sr` on((`sr`.`srok_code` = `kh`.`srok_code`))) join `khets` `kt` on((`kt`.`khet_code` = `sr`.`khet_code`))) where (`co`.`crop_type` = 'rice')) */;

/*View structure for view vw_training */

/*!50001 DROP TABLE IF EXISTS `vw_training` */;
/*!50001 DROP VIEW IF EXISTS `vw_training` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_training` AS (select `t`.`training_id` AS `training_id`,`t`.`training_responsible_staff` AS `training_responsible_staff`,ifnull(ifnull(`c`.`client_name_en`,`v`.`vendor_name_en`),`n`.`nonclient_name_en`) AS `participant_name`,ifnull(ifnull(`c`.`client_gender`,`v`.`vendor_gender`),`n`.`nonclient_gender`) AS `participant_gender`,`rw`.`riceweek_id` AS `riceweek_id`,`vw`.`vegetableweek_id` AS `vegetableweek_id`,`cr`.`crop_code` AS `crop_code`,`cr`.`crop_type` AS `crop_type`,`t`.`training_datestart` AS `training_datestart`,`t`.`training_datefinish` AS `training_datefinish`,if(isnull(`c`.`client_id`),if(isnull(`v`.`vendor_code`),if(isnull(`n`.`nonclient_id`),NULL,'nonclient'),'fba'),'client') AS `ftype`,ifnull(`rw`.`week_trainer`,`vw`.`week_trainer`) AS `week_trainer`,ifnull(`rw`.`week_topic1`,`vw`.`week_topic1`) AS `week_topic1`,ifnull(`rw`.`week_topic2`,`vw`.`week_topic2`) AS `week_topic2`,ifnull(`rw`.`week_topic3`,`vw`.`week_topic3`) AS `week_topic3`,ifnull(`rw`.`week_topic4`,`vw`.`week_topic4`) AS `week_topic4`,ifnull(`rw`.`week_date`,`vw`.`week_date`) AS `week_date`,concat(`vw_loc`.`khet_name_en`,',',`vw_loc`.`srok_name_en`,',',`vw_loc`.`khum_name_en`,',',`vw_loc`.`phum_name_en`) AS `training_location`,ifnull(`cl_loc`.`phum_code`,`vn_loc`.`phum_code`) AS `phum_code`,ifnull(`cl_loc`.`phum_name_en`,`vn_loc`.`phum_name_en`) AS `phum_name_en`,ifnull(`cl_loc`.`khum_name_en`,`vn_loc`.`khum_name_en`) AS `khum_name_en`,ifnull(`cl_loc`.`srok_name_en`,`vn_loc`.`srok_name_en`) AS `srok_name_en`,ifnull(`cl_loc`.`khet_name_en`,`vn_loc`.`khet_name_en`) AS `khet_name_en`,ifnull(`ven_c`.`vendor_name_en`,`v`.`vendor_name_en`) AS `fba` from ((((((((((((`trainings` `t` left join `crops` `cr` on((`t`.`crop_code` = `cr`.`crop_code`))) left join `riceweeks` `rw` on(((`rw`.`training_id` = `t`.`training_id`) and (`cr`.`crop_type` = 'rice')))) left join `vegetableweeks` `vw` on(((`vw`.`training_id` = `t`.`training_id`) and (`cr`.`crop_code` = 'vegetable')))) left join `clienttrainings` `ct` on((`t`.`training_id` = `ct`.`training_id`))) left join `clients` `c` on((`ct`.`client_id` = `c`.`client_id`))) left join `nonclients` `n` on((`ct`.`nonclient_id` = `n`.`nonclient_id`))) left join `vendors` `v` on((`v`.`vendor_code` = `ct`.`vendor_code`))) left join `clientvendors` `cv` on((`cv`.`client_id` = `c`.`client_id`))) left join `vendors` `ven_c` on((`ven_c`.`vendor_code` = `cv`.`vendor_code`))) left join `vw_location` `vw_loc` on((`t`.`phum_code` = `vw_loc`.`phum_code`))) left join `vw_location` `cl_loc` on((`cl_loc`.`phum_code` = `c`.`phum_code`))) left join `vw_location` `vn_loc` on((`vn_loc`.`phum_code` = `v`.`phum_code`)))) */;

/*View structure for view vw_vegetabledemos */

/*!50001 DROP TABLE IF EXISTS `vw_vegetabledemos` */;
/*!50001 DROP VIEW IF EXISTS `vw_vegetabledemos` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_vegetabledemos` AS (select `p`.`client_id` AS `p_client_id`,`p`.`plot_centroid_x` AS `plot_centroid_x`,`p`.`plot_crop_cycle` AS `plot_crop_cycle`,`p`.`plot_dateplanting` AS `plot_dateplanting`,`p`.`plot_datestart` AS `plot_datestart`,`p`.`plot_type_treatment` AS `plot_type_treatment`,`p`.`plot_size_m2` AS `plot_size_m2`,`p`.`vendor_code` AS `p_vendor_code`,`pr`.`project_name_en` AS `pr_project_name_en`,`cv`.`vendor_code` AS `cv_vendor_code`,`v`.`vendor_name_en` AS `v_vendor_name_en`,`v`.`vendor_code` AS `v_vendor_code`,`v`.`vendor_gender` AS `v_vendor_gender`,`v`.`branch_manager` AS `v_branch_manager`,`v`.`phum_code` AS `v_phum_code`,`c`.`client_id` AS `c_client_id`,`c`.`client_name_en` AS `c_client_name_en`,`c`.`client_gender` AS `c_client_gender`,`c`.`phum_code` AS `c_phum_code`,`co`.`crop_code` AS `co_crop_code`,`co`.`crop_name_en` AS `co_crop_name_en`,`co`.`crop_season` AS `co_crop_season`,`co`.`crop_type` AS `co_crop_type`,`co`.`product_code` AS `co_product_code`,`ph`.`phum_code` AS `ph_phum_code`,`ph`.`phum_name_en` AS `ph_phum_name_en`,`ph`.`khum_code` AS `ph_khum_code`,`kh`.`srok_code` AS `kh_srok_code`,`kh`.`khum_code` AS `kh_khum_code`,`kh`.`khum_name_en` AS `khum_name_en`,`sr`.`srok_code` AS `sr_srok_code`,`sr`.`srok_name_en` AS `srok_name_en`,`sr`.`khet_code` AS `sr_khet_code`,`kt`.`khet_code` AS `kt_khet_code`,`kt`.`khet_name_en` AS `khet_name_en`,`ven_client`.`vendor_code` AS `ven_client_vendor_code`,`ven_client`.`vendor_name_en` AS `ven_client_vendor_name_en`,`ven_client`.`vendor_gender` AS `ven_client_vendor_gender`,`ven_client`.`branch_manager` AS `ven_client_branch_manager`,`ven_ca`.`vendor_code` AS `ven_ca_vendor_code`,`ven_ca`.`vendor_name_en` AS `ven_ca_vendor_name_en`,`ven_ca`.`vendor_gender` AS `ven_ca_vendor_gender`,`ven_ca`.`branch_manager` AS `ven_ca_branch_manager`,`ven_v`.`vendor_name_en` AS `ven_v_name_en`,`ven_v`.`vendor_gender` AS `ven_v_gender`,`ven_v`.`branch_manager` AS `ven_v_branch_manager` from ((((((((((((((`plots` `p` left join `vendors` `v` on((`p`.`vendor_code` = `v`.`vendor_code`))) left join `clients` `c` on((`p`.`client_id` = `c`.`client_id`))) left join `clientvendors` `cv` on((`cv`.`client_id` = `c`.`client_id`))) left join `vendors` `ven_client` on((`ven_client`.`vendor_code` = `cv`.`vendor_code`))) left join `fbas` `fba` on((`fba`.`fba_code` = `ven_client`.`vendor_code`))) left join `vendors` `ven_ca` on((`ven_ca`.`vendor_code` = `fba`.`ca_code`))) left join `fbas` `fbav` on((`fbav`.`fba_code` = `v`.`vendor_code`))) left join `vendors` `ven_v` on((`ven_v`.`vendor_code` = `fbav`.`ca_code`))) left join `crops` `co` on((`p`.`crop_code` = `co`.`crop_code`))) left join `projects` `pr` on((`pr`.`project_id` = `p`.`project_id`))) join `phums` `ph` on(((`ph`.`phum_code` = `c`.`phum_code`) or (`v`.`phum_code` = `ph`.`phum_code`)))) join `khums` `kh` on((`ph`.`khum_code` = `kh`.`khum_code`))) join `sroks` `sr` on((`sr`.`srok_code` = `kh`.`srok_code`))) join `khets` `kt` on((`kt`.`khet_code` = `sr`.`khet_code`))) where (`co`.`crop_type` = 'vegetable')) */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
