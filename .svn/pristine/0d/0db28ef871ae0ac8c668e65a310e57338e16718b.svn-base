SET foreign_key_checks = 0;


-- commentare il drop e create successivi in caso di import su server dreamhost
drop database if exists `geostockphoto_dev`;

create database `geostockphoto_dev`;

SET storage_engine=InnoDB;
/*
CONFIGURATION TABLES
*/


CREATE TABLE geostockphoto_dev.tbl_conf_buy_credits (
	`idCreditsPacket` INT(6) PRIMARY KEY,
	`description` VARCHAR(50) NOT NULL,
	`amount` FLOAT(5,2) UNSIGNED NOT NULL,
	`insert_timestamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`update_timestamp` TIMESTAMP NOT NULL
) ENGINE=InnoDB;
INSERT INTO geostockphoto_dev.tbl_conf_buy_credits (`idCreditsPacket`, `description`, `amount`, `insert_timestamp`, `update_timestamp`) 
VALUES (1, '0.01    Geostockphoto Credits  10.00 €','0.01', CURRENT_TIMESTAMP, '0000-00-00 00:00:00'), 
	   (10, '10    Geostockphoto Credits  10.00 €','10.00', CURRENT_TIMESTAMP, '0000-00-00 00:00:00'), 
	   (20, '20    Geostockphoto Credits  18.00 €','18.00', CURRENT_TIMESTAMP, '0000-00-00 00:00:00'), 
	   (50, '50    Geostockphoto Credits  44.00 €','44.00', CURRENT_TIMESTAMP, '0000-00-00 00:00:00'),
	   (100, '100   Geostockphoto Credits  85.00 €','85.00', CURRENT_TIMESTAMP, '0000-00-00 00:00:00'),
	   (150, '150   Geostockphoto Credits 110.00 €','110.00', CURRENT_TIMESTAMP, '0000-00-00 00:00:00'),
	   (200, '200   Geostockphoto Credits 180.00 €','180.00', CURRENT_TIMESTAMP, '0000-00-00 00:00:00');
update geostockphoto_dev.tbl_conf_buy_credits
set update_timestamp = CURRENT_TIMESTAMP;	   
	   
CREATE TABLE geostockphoto_dev.tbl_conf_language (
	`idLanguage` VARCHAR(2) PRIMARY KEY,
	`name` VARCHAR(20) NOT NULL,
	`insert_timestamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`update_timestamp` TIMESTAMP NOT NULL
) ENGINE=InnoDB;

INSERT INTO geostockphoto_dev.tbl_conf_language (`idLanguage`, `name`, `insert_timestamp`, `update_timestamp`) 
VALUES ('en', 'English', CURRENT_TIMESTAMP, '0000-00-00 00:00:00'), 
       ('it', 'Italiano', CURRENT_TIMESTAMP, '0000-00-00 00:00:00');
update geostockphoto_dev.tbl_conf_language
set update_timestamp = CURRENT_TIMESTAMP;

CREATE TABLE geostockphoto_dev.tbl_conf_license_type (
	`licenseType` VARCHAR( 30 ) NOT NULL PRIMARY KEY,
	`insert_timestamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`update_timestamp` TIMESTAMP NOT NULL
) ENGINE=InnoDB;
INSERT INTO geostockphoto_dev.tbl_conf_license_type (`licenseType`) 
VALUES ('RF'), ('RM');
update geostockphoto_dev.tbl_conf_license_type
set update_timestamp = CURRENT_TIMESTAMP;


CREATE TABLE geostockphoto_dev.tbl_conf_license (
	`idLicense` INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	`licenseType` VARCHAR( 30 ) NOT NULL,
	`name` VARCHAR( 30 ) NULL,
	`insert_timestamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`update_timestamp` TIMESTAMP NOT NULL,
	FOREIGN KEY (licenseType) REFERENCES tbl_conf_license_type(licenseType)
) ENGINE=InnoDB;
INSERT INTO geostockphoto_dev.tbl_conf_license (`licenseType`, `name`) 
VALUES ('RF', 'RFs'), ('RF', 'RFe'), ('RM', 'RM');
update geostockphoto_dev.tbl_conf_license
set update_timestamp = CURRENT_TIMESTAMP;



CREATE TABLE geostockphoto_dev.tbl_conf_license_rm_type (
	`idRMtype` INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	`nameRMtype` VARCHAR( 30 ),
	`insert_timestamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`update_timestamp` TIMESTAMP NOT NULL
) ENGINE=InnoDB;
INSERT INTO geostockphoto_dev.tbl_conf_license_rm_type (`nameRMtype`) 
VALUES ('Advertising'), ('Editorial'), ('Corporate'), ('Consumer goods');
update geostockphoto_dev.tbl_conf_license_rm_type
set update_timestamp = CURRENT_TIMESTAMP;



CREATE TABLE geostockphoto_dev.tbl_conf_license_rm_details (
	`idRMdetails` INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	`nameRMdetails` VARCHAR( 30 ),
	`idRMtype` INT(10) UNSIGNED,
	`insert_timestamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`update_timestamp` TIMESTAMP NOT NULL,
FOREIGN KEY (idRMtype) REFERENCES tbl_conf_license_rm_type(idRMtype)
) ENGINE=InnoDB;
INSERT INTO geostockphoto_dev.tbl_conf_license_rm_details (`nameRMdetails`, `idRMtype`) 
VALUES ('Web page', '1'), ('Web banner', '1'), ('Brochure CD-ROM', '1'), ('Brochure print', '1'), ('Television', '1'), ('Catalog print', '1'), ('Catalog CD-ROM', '1'),
	('Screen saver', '1'), ('Billboard/Transit', '1'), ('Magazine', '1'), ('Newspaper', '1'), ('Point of sale', '1'), ('Direct Mail', '1'), ('Film', '1'), 
	('Book cover', '2'), ('Book interior', '2'), ('Film', '2'), ('Newspaper', '2'), ('Magazine cover', '2'), ('Magazine interior', '2'), ('Television', '2'), 
	('Internal print', '3'), ('Internal digital', '3'), ('Calendar cover', '4'), ('Calendar interior', '4'), ('Posters', '4'), ('Puzzles', '4'), ('Postcards', '4'), 
	('E-cards', '4'), ('Greeting Cards', '4'), ('Packaging', '4');
update geostockphoto_dev.tbl_conf_license_rm_details
set update_timestamp = CURRENT_TIMESTAMP;



CREATE TABLE geostockphoto_dev.tbl_conf_duration_rm (
	`idDuration` INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	`duration` VARCHAR( 30 ),
	`insert_timestamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`update_timestamp` TIMESTAMP NOT NULL
) ENGINE=InnoDB;
INSERT INTO geostockphoto_dev.tbl_conf_duration_rm (`duration`) 
VALUES ('1 year'), ('3 year'), ('5 year'), ('10 year'), ('15 year');
update geostockphoto_dev.tbl_conf_duration_rm
set update_timestamp = CURRENT_TIMESTAMP;



CREATE TABLE geostockphoto_dev.tbl_conf_size (
	`idSize` INT(10)  UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	`code` VARCHAR( 10 ),
	`maxSize` INT(6) UNSIGNED NOT NULL,
	`insert_timestamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`update_timestamp` TIMESTAMP NOT NULL
) ENGINE=InnoDB;
INSERT INTO geostockphoto_dev.tbl_conf_size (`idSize`, `code`, `maxSize`, `insert_timestamp`, `update_timestamp`) 
VALUES (NULL, 'XS' , '300'  , CURRENT_TIMESTAMP, '0000-00-00 00:00:00'),
       (NULL, 'S'  , '430'  , CURRENT_TIMESTAMP, '0000-00-00 00:00:00'),
       (NULL, 'M'  , '1000' , CURRENT_TIMESTAMP, '0000-00-00 00:00:00'),
       (NULL, 'L'  , '3000' , CURRENT_TIMESTAMP, '0000-00-00 00:00:00'),
       (NULL, 'XL' , '6000' , CURRENT_TIMESTAMP, '0000-00-00 00:00:00'),
       (NULL, 'XXL', '15000', CURRENT_TIMESTAMP, '0000-00-00 00:00:00');
update geostockphoto_dev.tbl_conf_size
set update_timestamp = CURRENT_TIMESTAMP;


CREATE TABLE geostockphoto_dev.tbl_conf_category (
	`idCategory` INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY ,
	`name` VARCHAR(24) NOT NULL ,
	`idPhotoType` INT(10) UNSIGNED NOT NULL ,
	`insert_timestamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`update_timestamp` TIMESTAMP NOT NULL,
	FOREIGN KEY (idPhotoType) REFERENCES tbl_conf_photo_type(idPhotoType)
) ENGINE=InnoDB;
INSERT INTO geostockphoto_dev.tbl_conf_category (`name`, `idPhotoType`)
VALUES ('Animals', '1'), ('Arts', '1'), ('Buildings', '1'), ('Celebrities', '1'), ('Editorial', '1'), ('Fashion', '1'), ('Food/Drink', '1'), ('Holidays', '1'),
	('Interiors', '1'), ('Landscape', '1'), ('Nature', '1'), ('Objects', '1'), ('People', '1'), ('Religion', '1'), ('Signs/Symbols', '1'), ('Sports/Recreations', '1'),
	('Technology', '1'), ('Transportation', '1'), ('Other', '1');
INSERT INTO geostockphoto_dev.tbl_conf_category (`name`, `idPhotoType`)
VALUES ('Crime', '2'), ('Politic', '2'), ('Gossip', '2'), ('Sport', '2'), ('Entertainment', '2'), ('Technology', '2'), ('Science', '2'), ('Social', '2'), ('Other', '2');
update geostockphoto_dev.tbl_conf_category
set update_timestamp = CURRENT_TIMESTAMP;



CREATE TABLE geostockphoto_dev.tbl_conf_photo_type (
	`idPhotoType` INT(10)  UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	`name` VARCHAR(24) NOT NULL ,
	`insert_timestamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`update_timestamp` TIMESTAMP NOT NULL
) ENGINE=InnoDB;
INSERT INTO geostockphoto_dev.tbl_conf_photo_type (`name`) VALUES ('High-Quality'), ('Breaking News');
update geostockphoto_dev.tbl_conf_photo_type
set update_timestamp = CURRENT_TIMESTAMP;


CREATE TABLE geostockphoto_dev.tbl_conf_product_status (
	`idProductStatus` INT(10) UNSIGNED  AUTO_INCREMENT PRIMARY KEY,
	`name` VARCHAR(50) NOT NULL ,
	`insert_timestamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`update_timestamp` TIMESTAMP NOT NULL
) ENGINE=InnoDB;
INSERT INTO geostockphoto_dev.tbl_conf_product_status (`name`) VALUES ('Pending'), ('Wait Review'), ('Approved'), ('Rejected'), ('Pending Delete'),('Deleted'),('Abuse Reported');
update geostockphoto_dev.tbl_conf_product_status
set update_timestamp = CURRENT_TIMESTAMP;

/*
KEYWORDS
*/

CREATE TABLE geostockphoto_dev.tbl_keyword (
	`idProduct` INT(10) UNSIGNED ,
	`keyword` VARCHAR(35) ,
	`insert_timestamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`update_timestamp` TIMESTAMP NOT NULL,
	PRIMARY KEY (idProduct, keyword),
	FOREIGN KEY (idProduct) REFERENCES tbl_product_pre_post(idProduct),
	FOREIGN KEY (keyword) REFERENCES tbl_dictionary(keyword)
) ENGINE=InnoDB;

CREATE TABLE geostockphoto_dev.tbl_dictionary (
	`keyword` VARCHAR(35) PRIMARY KEY,
	`fromUser` INT( 1 ) UNSIGNED NOT NULL DEFAULT '0',
	`insert_timestamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`update_timestamp` TIMESTAMP NOT NULL
) ENGINE=InnoDB;

/*
EQUIPMENT
*/

CREATE TABLE geostockphoto_dev.tbl_own_equipment (
	`idUser` INT(10) UNSIGNED ,
	`description` VARCHAR(35) ,
	`insert_timestamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`update_timestamp` TIMESTAMP NOT NULL,
	PRIMARY KEY (idUser, description),
	FOREIGN KEY (idUser) REFERENCES tbl_photographer(idUser),
	FOREIGN KEY (description) REFERENCES tbl_equipments(description)
) ENGINE=InnoDB;


CREATE TABLE geostockphoto_dev.tbl_own_photo_equipment (
	`idProduct` INT(10) UNSIGNED ,
	`description` VARCHAR(35) ,
	`insert_timestamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`update_timestamp` TIMESTAMP NOT NULL,
	PRIMARY KEY (idProduct, description),
	FOREIGN KEY (idProduct) REFERENCES tbl_product_pre_post(idProduct),
	FOREIGN KEY (description) REFERENCES tbl_equipments(description)
) ENGINE=InnoDB;

CREATE TABLE geostockphoto_dev.tbl_equipments (
	`description` VARCHAR(35) PRIMARY KEY,
	`fromUser` INT( 1 ) UNSIGNED NOT NULL DEFAULT '0',
	`insert_timestamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`update_timestamp` TIMESTAMP NOT NULL
) ENGINE=InnoDB;

/*
PHOTO and PRODUCT (PRE e POST)
*/

CREATE TABLE geostockphoto_dev.tbl_product_pre_post (
	`idProduct` INT(10)  UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	`idUser` INT(10) UNSIGNED NOT NULL,
	`idProductStatus` INT(10) UNSIGNED NOT NULL  DEFAULT '1'  ,
	`title` VARCHAR( 32 ),
	`description` VARCHAR( 128 ),
	`visits` INT(10) UNSIGNED NOT NULL DEFAULT '0',
	`insert_timestamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`update_timestamp` TIMESTAMP NOT NULL,
	FOREIGN KEY (idProductStatus) REFERENCES tbl_conf_product_status(idProductStatus),
	FOREIGN KEY (idUser) REFERENCES tbl_user(idUser)
) ENGINE=InnoDB;

CREATE TABLE geostockphoto_dev.tbl_photo_pre_post (
	`idProduct` INT(10)  UNSIGNED PRIMARY KEY,
	`idCategory1` INT(10) UNSIGNED ,
	`idCategory2` INT(10) UNSIGNED ,
	`lat` FLOAT(10, 6),
	`lng` FLOAT(10, 6),
	`ratio` FLOAT(6,5) UNSIGNED NOT NULL ,
	`maxSize` INT(6) UNSIGNED NOT NULL ,
	`rate` INT(1),
	`nVotes` INT(10) UNSIGNED ,
	`idPhotoType` INT(10) UNSIGNED NOT NULL DEFAULT '1',
	`shootingDate` TIMESTAMP NULL ,
	`approvedDate` TIMESTAMP NULL ,
	`isExclusive` INT(1) UNSIGNED NOT NULL DEFAULT '0',
	`exposureTime` VARCHAR(10) NULL,
	`aperture` VARCHAR(10) NULL,
	`iso` VARCHAR(10) NULL,
	`histogram` VARCHAR(4096),
	`insert_timestamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`update_timestamp` TIMESTAMP NOT NULL,
	FOREIGN KEY (idProduct) REFERENCES tbl_product_pre_post(idProduct),
	FOREIGN KEY (idCategory1) REFERENCES tbl_conf_category(idCategory),
	FOREIGN KEY (idCategory2) REFERENCES tbl_conf_category(idCategory),
	FOREIGN KEY (idPhotoType) REFERENCES tbl_conf_photo_type(idPhotoType)
) ENGINE=InnoDB;

/*
PHOTO and PRODUCT
*/

CREATE TABLE geostockphoto_dev.tbl_product (
	`idProduct` INT(10) UNSIGNED  PRIMARY KEY,
	`idUser` INT(10) UNSIGNED NOT NULL ,
	`title` VARCHAR( 32 ) NOT NULL ,
	`description` VARCHAR( 128 ) NULL ,
	`insert_timestamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`update_timestamp` TIMESTAMP NOT NULL,
	FOREIGN KEY (idProduct) REFERENCES tbl_product_pre_post(idProduct),
	FOREIGN KEY (idUser) REFERENCES tbl_user(idUser)
) ENGINE=InnoDB;

CREATE TABLE geostockphoto_dev.tbl_photo (
	`idProduct` INT(10)  UNSIGNED PRIMARY KEY ,
	`idCategory1` INT(10) UNSIGNED NOT NULL ,
	`idCategory2` INT(10) UNSIGNED ,
	`lat` FLOAT(10, 6) NOT NULL,
	`lng` FLOAT(10, 6) NOT NULL,
	`ratio` FLOAT(6,5) UNSIGNED NOT NULL  ,
	`maxSize` INT(6) UNSIGNED NOT NULL ,
	`rate` INT(1) NULL,
	`nVotes` INT(10) UNSIGNED NULL,
	`idPhotoType` INT(10) UNSIGNED NOT NULL,
	`shootingDate` TIMESTAMP NULL ,
	`approvedDate` TIMESTAMP NOT NULL ,
	`isExclusive` INT(1) UNSIGNED NOT NULL,
	`exposureTime` VARCHAR(10) NULL,
	`aperture` VARCHAR(10) NULL,
	`iso` VARCHAR(10) NULL,
	`histogram` VARCHAR(4096),
	`insert_timestamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`update_timestamp` TIMESTAMP NOT NULL,
	FOREIGN KEY (idCategory1) REFERENCES tbl_conf_category(idCategory),
	FOREIGN KEY (idCategory2) REFERENCES tbl_conf_category(idCategory),
	FOREIGN KEY (idProduct) REFERENCES tbl_product(idProduct),
	FOREIGN KEY (idPhotoType) REFERENCES tbl_conf_photo_type(idPhotoType)
) ENGINE=InnoDB;

/*
REVIEWS
*/

CREATE TABLE geostockphoto_dev.tbl_reviews (
	`idReview` INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY ,
	`idProduct` INT(10) UNSIGNED NOT NULL ,
	`idUser` INT(10) UNSIGNED NOT NULL ,
	`rate` INT(1) NOT NULL,
	`reviewedPhoto` INT( 1 ) NOT NULL DEFAULT '0',
	`updatedSB` INT( 1 ) NOT NULL DEFAULT '0',
	`insert_timestamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`update_timestamp` TIMESTAMP NOT NULL,
	UNIQUE (idProduct, idUser),
	FOREIGN KEY (idProduct) REFERENCES tbl_product_pre_post(idProduct),
	FOREIGN KEY (idUser) REFERENCES tbl_user(idUser)
) ENGINE=InnoDB;

CREATE TABLE geostockphoto_dev.tbl_conf_review_motivations (
	`idMotivation` INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY ,
	`motivation` VARCHAR(64) NOT NULL ,
	`insert_timestamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`update_timestamp` TIMESTAMP NOT NULL
) ENGINE=InnoDB;
INSERT INTO geostockphoto_dev.tbl_conf_review_motivations (`motivation`) VALUES ('Composition'), ('Noise'), ('Price'), ('Focus'), ('Trademark'), ('Lighting');

CREATE TABLE geostockphoto_dev.tbl_review_motivations (
	`idReview` INT(10) UNSIGNED ,
	`idMotivation` INT(10) UNSIGNED ,
	`insert_timestamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`update_timestamp` TIMESTAMP NOT NULL,
	PRIMARY KEY (idReview, idMotivation),
	FOREIGN KEY (idReview) REFERENCES tbl_reviews(idReview),
	FOREIGN KEY (idMotivation) REFERENCES tbl_conf_review_motivations(idMotivation)
) ENGINE=InnoDB;

CREATE TABLE geostockphoto_dev.tbl_conf_user_status (
	`idUserStatus` INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY ,
	`name` VARCHAR(50) NOT NULL ,
	`insert_timestamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`update_timestamp` TIMESTAMP NOT NULL
) ENGINE=InnoDB;
INSERT INTO geostockphoto_dev.tbl_conf_user_status (`name`) VALUES ('Pending'), ('Actived'), ('Locked'), ('Deleted');
update geostockphoto_dev.tbl_conf_user_status
set update_timestamp = CURRENT_TIMESTAMP;

CREATE TABLE geostockphoto_dev.tbl_conf_user_profile (
	`idUserProfile` INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY ,
	`name` VARCHAR(50) NOT NULL ,
	`multiplication_factor_sb` FLOAT( 2, 1 ) NOT NULL,
	`weight_review` FLOAT( 2, 1 ) NOT NULL,
	`insert_timestamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`update_timestamp` TIMESTAMP NOT NULL
) ENGINE=InnoDB;
INSERT INTO geostockphoto_dev.tbl_conf_user_profile (`name`, `multiplication_factor_sb`, `weight_review`) VALUES
('Admin', '0.0', '1.0'),('User', '0.2', '0.2'), ('Newbie', '0.4', '0.2'), ('Professional', '0.6', '0.8'),('Power', '5.0', '0.8');
update geostockphoto_dev.tbl_conf_user_profile
set update_timestamp = CURRENT_TIMESTAMP;

CREATE TABLE geostockphoto_dev.tbl_user (
	`idUser` INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	`idUserStatus` INT(10) UNSIGNED NOT NULL ,
	`idUserProfile` INT(10) UNSIGNED NOT NULL ,
	`idLanguage` VARCHAR(2) NOT NULL,
	`username` VARCHAR(32) NOT NULL UNIQUE KEY,
	`password` VARCHAR(512) NOT NULL,
	`email` VARCHAR(255) NOT NULL UNIQUE KEY,
	`name` VARCHAR(32) NULL ,
	`surname` VARCHAR(32) NULL ,
	`fee` FLOAT(3,2) UNSIGNED NOT NULL,
	`creditsBought` FLOAT(6, 2) UNSIGNED NOT NULL DEFAULT '0',
	`creditsEarned` FLOAT(6, 2) UNSIGNED NOT NULL DEFAULT '0',
	`submitBonus` INT( 4 ) NOT NULL,
	`photoProfile` int(1) UNSIGNED NOT NULL DEFAULT '0',
	`lat` FLOAT(10, 6) NULL,
	`lng` FLOAT(10, 6) NULL,
	`street` VARCHAR(64) ,
	`zip` VARCHAR(16) ,
	`town` VARCHAR(30) ,
	`region` VARCHAR(30) ,
	`country` VARCHAR(30) ,
	`phone1` VARCHAR(32) ,
	`phone2` VARCHAR(32) ,
	`mobilePhone` VARCHAR(32) ,
	`verificationCode` VARCHAR(10) NOT NULL ,
	`mailingList` int(1) UNSIGNED NOT NULL DEFAULT '0',
	`acceptTerms` int(1) UNSIGNED NOT NULL ,
	`insert_timestamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`update_timestamp` TIMESTAMP NOT NULL,
	`lastLogin_timestamp` TIMESTAMP NOT NULL,
	`nextBonusUpdate_timestamp` TIMESTAMP NOT NULL,
	FOREIGN KEY (idUserStatus) REFERENCES tbl_conf_user_status(idUserStatus),
	FOREIGN KEY (idUserProfile) REFERENCES tbl_conf_user_profile(idUserProfile),
	FOREIGN KEY (idLanguage) REFERENCES tbl_conf_language(idLanguage)
) ENGINE=InnoDB;
INSERT INTO `geostockphoto_dev`.`tbl_user` (`idUserStatus`, `idUserProfile`,`idLanguage`, `fee`, `username`, `password`, `email`, `name`, `surname`, `creditsBought`, `creditsEarned`, `submitBonus`, `photoProfile`, `verificationCode`, `mailingList`, `acceptTerms`, `update_timestamp`, `lastLogin_timestamp`, `nextBonusUpdate_timestamp`) VALUES
(2, 1, 'en', '0.30', 'admin', '035cb66750ee8bde58bba27c7bb6d5a767b9c55f1352908808829203227bfa3d0e964d5c56d19a184cc2b3bf4674a6d5e9b9898702bf55fb467be2e545e86645', 'info@geostockphoto.it', 'Marco', 'Cannizzaro', 100, 100, 100, 1, 'verificCod', 1, 1, NULL, NULL, NULL),
(2, 5, 'en', '0.30', 'marco', '04b4a82d5d4de58402a739dd4d663f1c29ce3e544b1dda9983e6b84c2035d41632179a12fdb2892624e1d03e23c902c8c2407a74bbcd7a1434a0f8acb8c75b0a', 'marco@geostockphoto.it', 'Marco', 'Cannizzaro', 100, 100, 100, 1, 'verificCod', 1, 1, NULL, NULL, NULL),
(2, 2, 'en', '0.30', 'gaspare', 'c3daced717a38ecc44f8c74e195148d71f42ab80bd063fc3ba0df050b13ad530144eb669c9d3e2c408bdace5f77cae08ace85e0ffd01f73f25ad1d9ae3034868', 'gaspare@geostockphoto.it', 'Gaspare', 'Scherma', 100, 100, 100, 1, 'verificCod', 1, 1, NULL, NULL, NULL),
(2, 2, 'en', '0.30', 'doers', 'e102cfe3f2736622c76f29dd36f217cbb021c70ec9830283494d114480e9ca028bce9f4c5f9fa345da4ae65cf9768575291684a8f591ae42fe95312eee242cc6', 'irene@geostockphoto.it', 'Irene', 'Cassarino', 100, 100, 100, 1, 'verificCod', 1, 1, NULL, NULL, NULL);
update geostockphoto_dev.tbl_user
set update_timestamp = CURRENT_TIMESTAMP;

CREATE TABLE geostockphoto_dev.tbl_photographer (
	`idUser` INT(10) UNSIGNED PRIMARY KEY,
	`numPhotos` INT(10) UNSIGNED NOT NULL DEFAULT 0,
	`rate` FLOAT(3, 2) UNSIGNED,
	`CVSummary` VARCHAR(512),
	`idCategory1` INT(10) UNSIGNED NOT NULL,
	`idCategory2` INT(10) UNSIGNED NOT NULL,
	`insert_timestamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`update_timestamp` TIMESTAMP NOT NULL,
	FOREIGN KEY (idUser) REFERENCES tbl_user(idUser),
	FOREIGN KEY (idCategory1) REFERENCES tbl_conf_category(idCategory),
	FOREIGN KEY (idCategory2) REFERENCES tbl_conf_category(idCategory)
) ENGINE=InnoDB;
INSERT INTO `geostockphoto_dev`.`tbl_photographer` (`idUser`, `numPhotos`, `rate`, `CVSummary`, `idCategory1`, `idCategory2`, `insert_timestamp`, `update_timestamp`) VALUES
('1', '0', NULL, NULL, '2', '4', CURRENT_TIMESTAMP, '0000-00-00 00:00:00'),
('2', '0', NULL, NULL, '4', '9', CURRENT_TIMESTAMP, '0000-00-00 00:00:00'),
('3', '0', NULL, NULL, '4', '9', CURRENT_TIMESTAMP, '0000-00-00 00:00:00');
update geostockphoto_dev.tbl_photographer
set update_timestamp = CURRENT_TIMESTAMP;


CREATE TABLE geostockphoto_dev.tbl_conf_shopping_opt_default_gsp  (
	`idLicense` INT(10) UNSIGNED ,
	`idSize` INT(10) UNSIGNED,
	`price` FLOAT(6, 2) UNSIGNED  ,
	`insert_timestamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`update_timestamp` TIMESTAMP NOT NULL,
	PRIMARY KEY (idLicense,idSize),
	FOREIGN KEY (idLicense) REFERENCES tbl_conf_license(idLicense),
	FOREIGN KEY (idSize) REFERENCES tbl_conf_size(idSize)
) ENGINE=InnoDB;
INSERT INTO `geostockphoto_dev`.`tbl_conf_shopping_opt_default_gsp` (`idLicense` ,`idSize` ,`price` ,`insert_timestamp` ,`update_timestamp` )VALUES
('1', '1', '0.50', CURRENT_TIMESTAMP , '0000-00-00 00:00:00'),
('1', '2', '1.00', CURRENT_TIMESTAMP , '0000-00-00 00:00:00'),
('1', '3', '2.00', CURRENT_TIMESTAMP , '0000-00-00 00:00:00'),
('1', '4', '4.00', CURRENT_TIMESTAMP , '0000-00-00 00:00:00'),
('1', '5', '6.00', CURRENT_TIMESTAMP , '0000-00-00 00:00:00'),
('1', '6', '8.00', CURRENT_TIMESTAMP , '0000-00-00 00:00:00'),
('2', '6', '10.00', CURRENT_TIMESTAMP , '0000-00-00 00:00:00');
update geostockphoto_dev.tbl_conf_shopping_opt_default_gsp
set update_timestamp = CURRENT_TIMESTAMP;


CREATE TABLE geostockphoto_dev.tbl_shopping_cart (
	`idUser` INT(10)  UNSIGNED NOT NULL,
	`idProduct` INT(10)  UNSIGNED NOT NULL,
	`insert_timestamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`update_timestamp` TIMESTAMP NOT NULL,
	PRIMARY KEY (idUser,idProduct),
	FOREIGN KEY (idProduct) REFERENCES tbl_product_pre_post(idProduct),
	FOREIGN KEY (idUser) REFERENCES tbl_user(idUser)
) ENGINE=InnoDB;


CREATE TABLE geostockphoto_dev.tbl_transaction (
	`idTransaction` INT(10)  UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	`idTransactionType` INT(10)  UNSIGNED NOT NULL,
	`idUser` INT(10) UNSIGNED NOT NULL,
	`total` FLOAT(6,2) UNSIGNED NOT NULL,
	`pending` INT(1) UNSIGNED NOT NULL DEFAULT '0',
	`insert_timestamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`update_timestamp` TIMESTAMP NOT NULL,
	FOREIGN KEY (idUser) REFERENCES tbl_user(idUser),
	FOREIGN KEY (idTransactionType) REFERENCES tbl_conf_transaction_type(idTransactionType)
) ENGINE=InnoDB;

CREATE TABLE geostockphoto_dev.tbl_transaction_photo (
	`idTransactionPhoto` INT(10)  UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	`idTransaction` INT(10)  UNSIGNED,
	`idProduct` INT(10) UNSIGNED,
	`licenseType` VARCHAR( 30 ) NOT NULL,
	`insert_timestamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`update_timestamp` TIMESTAMP NOT NULL,
	FOREIGN KEY (idTransaction) REFERENCES tbl_transaction(idTransaction),
	FOREIGN KEY (idProduct) REFERENCES tbl_product_pre_post(idProduct),
	FOREIGN KEY (licenseType) REFERENCES tbl_conf_license_type(licenseType),
	UNIQUE (`idTransaction`, `idProduct`)
) ENGINE=InnoDB;

CREATE TABLE geostockphoto_dev.tbl_transaction_photo_rf (
	`idTransactionPhoto` INT(10)  UNSIGNED,
	`idSize` INT(10) UNSIGNED,
	`idLicense` INT(10) UNSIGNED,
	`price` FLOAT(6,2) UNSIGNED NOT NULL,
	`fee` FLOAT(3,2) UNSIGNED NOT NULL,
	`insert_timestamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`update_timestamp` TIMESTAMP NOT NULL,
	PRIMARY KEY (`idTransactionPhoto`, `idSize`, `idLicense`),
	FOREIGN KEY (idTransactionPhoto) REFERENCES tbl_transaction_photo(idTransactionPhoto),
	FOREIGN KEY (idSize) REFERENCES tbl_conf_size(idSize),
	FOREIGN KEY (idLicense) REFERENCES tbl_conf_license(idLicense)
) ENGINE=InnoDB;

CREATE TABLE geostockphoto_dev.tbl_transaction_photo_rm (
	`idTransactionPhoto` INT(10)  UNSIGNED,
	`idSize` INT(10) UNSIGNED,
	`idRMdetails` INT(10) UNSIGNED,
	`idDuration` INT(10) UNSIGNED,
	`price` FLOAT(6, 2) UNSIGNED NOT NULL,
	`fee` FLOAT(3,2) UNSIGNED NOT NULL,
	`insert_timestamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`update_timestamp` TIMESTAMP NOT NULL,
	PRIMARY KEY (idTransactionPhoto, idSize, idRMdetails, idDuration),
	FOREIGN KEY (idTransactionPhoto) REFERENCES tbl_transaction_photo(idTransactionPhoto),
	FOREIGN KEY (idRMdetails) REFERENCES tbl_conf_license_rm_details(idRMdetails),
	FOREIGN KEY (idSize) REFERENCES tbl_conf_size(idSize),
	FOREIGN KEY (idDuration) REFERENCES tbl_conf_duration_rm(idDuration)
) ENGINE=InnoDB;


CREATE TABLE geostockphoto_dev.tbl_conf_transaction_type (
	`idTransactionType` INT(10)  UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	`name` VARCHAR(24) NOT NULL ,
	`insert_timestamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`update_timestamp` TIMESTAMP NOT NULL
) ENGINE=InnoDB;
INSERT INTO geostockphoto_dev.tbl_conf_transaction_type (`name`) VALUES ('Sale'), ('Payout'), ('Payin');
update geostockphoto_dev.tbl_conf_transaction_type
set update_timestamp = CURRENT_TIMESTAMP;

CREATE TABLE geostockphoto_dev.tbl_conf_parameters (
	`parameter` VARCHAR(50) NOT NULL PRIMARY KEY ,
	`value` VARCHAR(50) NOT NULL ,
	`description` VARCHAR(250) NOT NULL ,
	`insert_timestamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`update_timestamp` TIMESTAMP NOT NULL
) ENGINE=InnoDB;
INSERT INTO geostockphoto_dev.tbl_conf_parameters (`parameter`,`value`,`description`) VALUES 
('PayoutThreshold','50','The minimum credit value that allows user to get credit from GSP'),
('NumberPhotoNewbiePhotographer','10','The minimum number of approved photos in order to become a newbie-photographer'),
('RatePhotoNewbiePhotographer','3','The minum rate of approved foto in order to become a newbie-photographer'),
('NumberPhotoProfessionalPhotographer','100','The minimum number of approved photos in order to become a professional-photographer'),
('RatePhotoProfessionalPhotographer','4','The minum rate of approved foto in order to become a professional-photographer'),
('NumberPhotoPowerPhotographer','1000','The minimum number of approved photos in order to become a power-photographer'),
('RatePhotoPowerPhotographer','5','The minum rate of approved foto in order to become a power-photographer'),
('SubmitCost','1','The GSP submitBonus value for single photo submitted'),
('CreditCost','0.1','The GSP credit value for single photo submitted'),
-- ('ReviewCostValue','1','The GSP submitBonus value for single photo reviewed'),
('DefaultSubmitBonus','100','The SubmitBonus for a new user'),
('DefaultFee','0.30','The fee for a new user. The fee is the commission that the user pays to GSP in each sold photo.'),
('TimeWindowBonusUpdate','1296000','The number of seconds (15 days) between the update of the submit bonus'),
('TimeWindowPhotoDownload','1209600','The number of seconds (2 weeks) that allow the user to download purchased photo'),
('RepeatedWordsCountForApproval','100','The number of words repeated and added by users into autocomplete fields'),
('ReportAbuseMailTo','info@geostockphoto.com','Email to send if a report abuse is added'),
('TimeTakenBNphoto','86400','Time interval (24 hours) in which a Breaking News Photo must be submitted after it has been taken');
update geostockphoto_dev.tbl_conf_parameters
set update_timestamp = CURRENT_TIMESTAMP;


CREATE TABLE geostockphoto_dev.tbl_session (
	`idSession` INT(20) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	`file` VARCHAR(128) NOT NULL ,
	`idUser` INT(10) UNSIGNED NULL ,
	`isAjaxRequest` int(1) UNSIGNED NULL DEFAULT NULL,
	`insert_timestamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	FOREIGN KEY (idUser) REFERENCES tbl_user(idUser)
) ENGINE=InnoDB;

CREATE TABLE geostockphoto_dev.tbl_ticket (
	`idTicket` INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	`idUser` INT(10) UNSIGNED NULL ,
	`idProduct` INT(10) UNSIGNED NULL ,
	`idTicketType` INT(10) UNSIGNED NOT NULL,
	`idTicketStatus` INT(10)  UNSIGNED NOT NULL,
	`sourceActor` VARCHAR(24) NOT NULL ,
	`subject` VARCHAR(24) NOT NULL ,
	`message` VARCHAR(516) NULL ,
	`insert_timestamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`update_timestamp` TIMESTAMP NOT NULL,
	FOREIGN KEY (idUser) REFERENCES tbl_user(idUser),
	FOREIGN KEY (idProduct) REFERENCES tbl_product_pre_post(idProduct),
	FOREIGN KEY (idTicketType) REFERENCES tbl_conf_ticket_type(idTicketType),
	FOREIGN KEY (idTicketStatus) REFERENCES tbl_conf_ticket_status(idTicketStatus)
) ENGINE=InnoDB;

CREATE TABLE geostockphoto_dev.tbl_conf_ticket_type (
	`idTicketType` INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	`name` VARCHAR(24) NOT NULL ,
	`insert_timestamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`update_timestamp` TIMESTAMP NOT NULL
) ENGINE=InnoDB;
INSERT INTO geostockphoto_dev.tbl_conf_ticket_type (`name`) VALUES ('Report Abuse'), ('Contact Us'), ('Bug'),('Error');
update geostockphoto_dev.tbl_conf_ticket_type
set update_timestamp = CURRENT_TIMESTAMP;

CREATE TABLE geostockphoto_dev.tbl_conf_ticket_status (
	`idTicketStatus` INT(10) UNSIGNED  AUTO_INCREMENT PRIMARY KEY,
	`name` VARCHAR(24) NOT NULL ,
	`insert_timestamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`update_timestamp` TIMESTAMP NOT NULL
) ENGINE=InnoDB;
INSERT INTO geostockphoto_dev.tbl_conf_ticket_status (`name`) VALUES ('Pending'), ('In Progress'), ('Closed');
update geostockphoto_dev.tbl_conf_ticket_status
set update_timestamp = CURRENT_TIMESTAMP;


CREATE TABLE geostockphoto_dev.tbl_error (
	`idSession` INT(20) UNSIGNED, 
	`idTicket` INT(10) UNSIGNED,
	`message` TEXT NULL ,
	`type` VARCHAR(24) NULL ,
	`file` VARCHAR(128) NULL ,
	`line` VARCHAR(6) NULL ,
	`trace` TEXT NULL ,
	`source` TEXT NULL ,
	`isAjaxRequest` int(1) UNSIGNED NOT NULL DEFAULT '0',
	`insert_timestamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	FOREIGN KEY (idTicket) REFERENCES tbl_ticket(idTicket),
	FOREIGN KEY (idSession) REFERENCES tbl_session(idSession)
) ENGINE=InnoDB;


CREATE TABLE geostockphoto_dev.tbl_log (
	`idLog` INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	`idSession` INT(20) UNSIGNED NOT NULL,
	`level` VARCHAR(128) NOT NULL ,
	`message` TEXT NOT NULL ,
	`log_timestamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	FOREIGN KEY (idSession) REFERENCES tbl_session(idSession)
) ENGINE=InnoDB;

CREATE TABLE geostockphoto_dev.tbl_shopping_photo_type (
	`idProduct` INT(10) UNSIGNED ,
	`licenseType` VARCHAR( 30 ) NOT NULL,
	`insert_timestamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`update_timestamp` TIMESTAMP NOT NULL,
	PRIMARY KEY (idProduct),
	FOREIGN KEY (idProduct) REFERENCES tbl_product_pre_post(idProduct),
	FOREIGN KEY (licenseType) REFERENCES tbl_conf_license_type(licenseType)
) ENGINE=InnoDB;

CREATE TABLE geostockphoto_dev.tbl_shopping_opt_photo (
	`idProduct` INT(10) UNSIGNED ,
	`idSize` INT(10) UNSIGNED,
	`idLicense` INT(10) UNSIGNED ,
	`price` FLOAT(6, 2) UNSIGNED  NOT NULL,
	`insert_timestamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`update_timestamp` TIMESTAMP NOT NULL,
	PRIMARY KEY (idProduct,idLicense,idSize),
	FOREIGN KEY (idProduct) REFERENCES tbl_shopping_photo_type(idProduct),
	FOREIGN KEY (idLicense) REFERENCES tbl_conf_license(idLicense),
	FOREIGN KEY (idSize) REFERENCES tbl_conf_size(idSize)
) ENGINE=InnoDB;

CREATE TABLE geostockphoto_dev.tbl_shopping_opt_photo_rm (
	`idProduct` INT(10) UNSIGNED ,
	`idRMdetails` INT(10) UNSIGNED,
	`idSize` INT(10) UNSIGNED,
	`idDuration` INT(10) UNSIGNED,
	`price` FLOAT(6, 2) UNSIGNED NOT NULL,
	`insert_timestamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`update_timestamp` TIMESTAMP NOT NULL,
	PRIMARY KEY (idProduct,idRMdetails,idSize,idDuration),
	FOREIGN KEY (idProduct) REFERENCES tbl_shopping_photo_type(idProduct),
	FOREIGN KEY (idRMdetails) REFERENCES tbl_conf_license_rm_details(idRMdetails),
	FOREIGN KEY (idSize) REFERENCES tbl_conf_size(idSize),
	FOREIGN KEY (idDuration) REFERENCES tbl_conf_duration_rm(idDuration)
) ENGINE=InnoDB;

CREATE TABLE geostockphoto_dev.tbl_landing_page (
	`email` VARCHAR(255) PRIMARY KEY,
	`isPhotographer` int(1) UNSIGNED NOT NULL DEFAULT '0',
	`language` VARCHAR( 2 ) NOT NULL DEFAULT 'en',
	`localId` VARCHAR( 7 ) NOT NULL DEFAULT 'en_en',
	`verificationCode` VARCHAR(10) NOT NULL ,
	`isVerified` int(1) UNSIGNED NOT NULL DEFAULT '0',
	`idUserProfile` INT(10) UNSIGNED NOT NULL ,
	`insert_timestamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`update_timestamp` TIMESTAMP NOT NULL,
	FOREIGN KEY (idUserProfile) REFERENCES tbl_conf_user_profile(idUserProfile)
) ENGINE=InnoDB;

CREATE TABLE geostockphoto_dev.tbl_contest (
	`email` VARCHAR(255) PRIMARY KEY,
	`idPhoto` INT(10) UNSIGNED AUTO_INCREMENT UNIQUE,
	`insert_timestamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`update_timestamp` TIMESTAMP NOT NULL,
	FOREIGN KEY (email) REFERENCES tbl_landing_page(email)
) ENGINE=InnoDB;
-- ALTER TABLE geostockphoto_dev.tbl_contest AUTO_INCREMENT = 100;

CREATE TABLE geostockphoto_dev.tbl_gsp_profit (
	`idProfit` INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	`idUser` INT(10) UNSIGNED NOT NULL,
	`idTransaction` INT(10)  UNSIGNED NOT NULL,
	`idTransactionPhoto` INT(10)  UNSIGNED NULL,	
	`amount` FLOAT(6, 2) NOT NULL,
	`insert_timestamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`update_timestamp` TIMESTAMP NOT NULL,
	FOREIGN KEY (idUser) REFERENCES tbl_user(idUser),
	FOREIGN KEY (idTransaction) REFERENCES tbl_transaction(idTransaction),
	FOREIGN KEY (idTransactionPhoto) REFERENCES tbl_transaction_photo(idTransactionPhoto)
) ENGINE=InnoDB;

CREATE TABLE geostockphoto_dev.tbl_ftp_account(
	`username` VARCHAR(15) PRIMARY KEY,
	`password` VARCHAR(8) NOT NULL,
	`idUser` INT(10) UNSIGNED NULL UNIQUE,
	`insert_timestamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`update_timestamp` TIMESTAMP NOT NULL,
	FOREIGN KEY (idUser) REFERENCES tbl_user(idUser)
) ENGINE=InnoDB;

SET foreign_key_checks = 1;
