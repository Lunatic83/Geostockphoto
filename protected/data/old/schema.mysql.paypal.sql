CREATE TABLE geostockphoto_dev.tbl_conf_paypal (
	`environment` VARCHAR( 10 ) NOT NULL PRIMARY KEY,
	`apiUserName` VARCHAR( 100 ) NOT NULL,
	`apiPassword` VARCHAR( 20 ) NOT NULL,
	`apiSignature` VARCHAR( 100 ) NOT NULL,
	`version` VARCHAR( 5 ) NOT NULL,
	`endPoint` VARCHAR( 150 ) NOT NULL,
	`redirectUrl` VARCHAR( 150 ) NOT NULL,
	`urlJSdigitalGoods` VARCHAR( 150 ) NOT NULL,
	`insert_timestamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`update_timestamp` TIMESTAMP NOT NULL
) ENGINE=InnoDB;
INSERT INTO `geostockphoto_dev`.`tbl_conf_paypal` (`environment`, `apiUserName`, `apiPassword`, `apiSignature`, `version`, `endPoint`, `redirectUrl`,`urlJSdigitalGoods`, `insert_timestamp`, `update_timestamp`) 
VALUES ('SANDBOX', 'marco_1327721282_biz_api1.geostockphoto.com', '1327721322', 'ACeF78uYbWw5PAqdQGdsZ23o4BqpAAfse6f-QZvdF7pMu7WTyVl3wAmM', '84.0', 'https://api-3t.sandbox.paypal.com/nvp', 'https://www.sandbox.paypal.com/incontext?token=', 'https://www.paypalobjects.com/js/external/dg.js' ,CURRENT_TIMESTAMP, '0000-00-00 00:00:00'),
	   ('SANDBOX2', 'gaspar_1328711041_biz_api1.geostockphoto.com', '1328711070', 'AR.6TiNhoQHY.EYlugF36nIbXM51Axo3NqB-S1ChOd6zCdEJRJByEZZi', '84.0', 'https://api-3t.sandbox.paypal.com/nvp', 'https://www.sandbox.paypal.com/incontext?token=', 'https://www.paypalobjects.com/js/external/dg.js' ,CURRENT_TIMESTAMP, '0000-00-00 00:00:00'),
	   ('LIVE', 'paypal_api1.geostockphoto.com', 'KGAMKD96DFAFXKEY', 'A7KZ2bA0jt3Wgp38vM9RP.OSyvPWA.0JPdnYDHfF99iNdcG3bjhx6ZzR', '84.0', 'https://api-3t.paypal.com/nvp', 'https://www.paypal.com/incontext?token=', 'https://www.paypalobjects.com/js/external/dg.js' ,CURRENT_TIMESTAMP, '0000-00-00 00:00:00');
update geostockphoto_dev.tbl_conf_paypal
set update_timestamp = CURRENT_TIMESTAMP;
-- TODO PROD Aggiungere l'environment LIVE

CREATE TABLE geostockphoto_dev.tbl_paypal_transaction_flow (
	`idPPTransaction` INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	
	`idUser` INT(10) UNSIGNED NOT NULL,
	`method` VARCHAR( 50 ) NOT NULL,
	`token` VARCHAR( 20 ) NULL,
	`correlationID` VARCHAR( 20 ) NULL,
	`payerID` VARCHAR( 20 ) NULL,
	
	`ack` VARCHAR( 20 ) NULL,
	`returnUrl` VARCHAR( 150 ) NULL,
	`cancelUrl` VARCHAR( 150 ) NULL,
	`version` VARCHAR( 5 )  NULL,
	`build` VARCHAR( 10 ) NULL,
	`checkOutStatus` VARCHAR( 50 ) NULL,
	`pr0NotifyUrl` VARCHAR( 150 ) NULL,
	`pr0CurrencyCode` VARCHAR( 3 ) NULL,
	`pr0Amt`  FLOAT(6, 2) NULL,
	`pr0ItemAmt` FLOAT(6, 2) NULL,
	`pr0TaxAmt` FLOAT(6, 2) NULL,
	`pr0Desc` VARCHAR( 50 ) NULL,
	`pr0PaymentAction` VARCHAR( 20 ) NULL,
	`lpr0ItemCategory0` VARCHAR( 20 ) NULL,
	`lpr0Name0` VARCHAR( 150 ) NULL,
	`lpr0Number0` FLOAT(6, 2) NULL,
	`lpr0Qty0` INT ( 10 ) NULL,
	`lpr0TaxAmt0` FLOAT(6, 2) NULL,
	`lpr0Amt0` FLOAT(6, 2) NULL,
	`lpr0Desc` VARCHAR( 50 ) NULL,
	`landingPage` VARCHAR( 50 ) NULL,
	`solutionType` VARCHAR( 50 ) NULL,
	`ppTimestamp` VARCHAR( 50 ) NULL,
	`insert_timestamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`update_timestamp` TIMESTAMP NOT NULL,
	UNIQUE KEY (idUser, method, token, correlationID, payerID),
	FOREIGN KEY (idUser) REFERENCES tbl_user(idUser)
) ENGINE=InnoDB;
 
 
CREATE TABLE geostockphoto_dev.tbl_paypal_transaction_final (
	`idPPTransaction` INT(10) UNSIGNED PRIMARY KEY,
	`idUser` INT(10) UNSIGNED NOT NULL,
	`method` VARCHAR( 50 ) NOT NULL,
	`token` VARCHAR( 20 ) NULL,
	`correlationID` VARCHAR( 20 ) NULL,
	`payerID` VARCHAR( 20 ) NULL,
	
	`ack` VARCHAR( 20 ) NULL,
	`successPageRedirectRequested` VARCHAR( 150 ) NULL,
	`ppTimestamp` VARCHAR( 50 ) NULL,
	`version` VARCHAR( 5 )  NULL,
	`build` VARCHAR( 10 ) NULL,
	`insuranceOptionSelected` VARCHAR( 10 )  NULL,
	`shoppingOptionIsDefault` VARCHAR( 10 )  NULL,
	`pi0TransactionID` VARCHAR( 20 )  NULL,
	`pi0TransactionType` VARCHAR( 20 )  NULL,
	`pi0PaymentType` VARCHAR( 20 )  NULL,
	`pi0OrderType` VARCHAR( 50 )  NULL,
	`pi0Amt`  FLOAT(6, 2) NULL,
	`pi0TaxAmt`  FLOAT(6, 2) NULL,
	`pi0CurrencyCode`   VARCHAR( 3 ) NULL,
	`pi0PaymentStatus`   VARCHAR( 20 ) NULL,
	`pi0PendingReason`   VARCHAR( 20 ) NULL,
	`pi0ReasonCode`   VARCHAR( 20 ) NULL,
	`pi0ProtectionElegibility`   VARCHAR( 20 ) NULL,
	`pi0ProtectionElegibilityType`   VARCHAR( 20 ) NULL,
	`pi0SecureMerchantAccountID`   VARCHAR( 20 ) NULL,
	`pi0ErrorCode`   VARCHAR( 20 ) NULL,
	`pi0Ack`   VARCHAR( 20 ) NULL,
	`insert_timestamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`update_timestamp` TIMESTAMP NOT NULL,
	UNIQUE KEY (idUser, method, token, correlationID, payerID),
	FOREIGN KEY (idPPTransaction) REFERENCES tbl_paypal_transaction_flow(idPPTransaction)
) ENGINE=InnoDB;



CREATE TABLE geostockphoto_dev.tbl_paypal_transaction_failure (
	`idPPTransaction` INT(10) UNSIGNED PRIMARY KEY,
	`idUser` INT(10) UNSIGNED NOT NULL,
	`method` VARCHAR( 50 ) NOT NULL,
	`token` VARCHAR( 20 ) NULL,
	`correlationID` VARCHAR( 20 ) NULL,
	`payerID` VARCHAR( 20 ) NULL,
	
	`ppTimestamp` VARCHAR( 50 ) NULL,
	`lErrorCode0` VARCHAR( 10 ) NULL,
	`lShortMessage0` VARCHAR( 50 ) NULL,
	`lLongMessage0` TEXT NULL,
	`lSeverityCode0` VARCHAR( 20 ) NULL,
	`insert_timestamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`update_timestamp` TIMESTAMP NOT NULL,
	UNIQUE KEY (idUser, method, token, correlationID, payerID),
	FOREIGN KEY (idPPTransaction) REFERENCES tbl_paypal_transaction_flow(idPPTransaction)
) ENGINE=InnoDB;


CREATE TABLE geostockphoto_dev.tbl_paypal_transaction_people (
	`idPPTransaction` INT(10) UNSIGNED PRIMARY KEY,
	`idUser` INT(10) UNSIGNED NOT NULL,
	`method` VARCHAR( 50 ) NOT NULL,
	`token` VARCHAR( 20 ) NULL,
	`correlationID` VARCHAR( 20 ) NULL,
	`payerID` VARCHAR( 20 ) NULL,
	
	`email` VARCHAR( 100 ) NULL,
	`payerstatus` VARCHAR( 20 ) NULL,
	`firstName` VARCHAR( 50 ) NULL,
	`lastName` VARCHAR( 50 ) NULL,
	`countryCode` VARCHAR( 2 ) NULL,
	`currencyCode` VARCHAR( 3 ) NULL,
	`amt`  FLOAT(6, 2) NULL,
	`itemAmt`  FLOAT(6, 2) NULL,
	`shippingAmt`  FLOAT(6, 2) NULL,
	`handlingAmt`  FLOAT(6, 2) NULL,
	`taxAmt`  FLOAT(6, 2) NULL,
	`desc` VARCHAR( 50 ) NULL,
	`notifyurl` VARCHAR( 150 ) NULL,
	`insuranceAmt`  FLOAT(6, 2) NULL,
	`shipdiscAmt`  FLOAT(6, 2) NULL,
	`lname0` VARCHAR( 50 ) NULL,
	`lNumber0` FLOAT(6, 2) NULL,
	`lQty0` INT ( 10 ) NULL,
	`lTaxAmt0` FLOAT(6, 2) NULL,
	`lAmt0` FLOAT(6, 2) NULL,
	`lDesc0` VARCHAR( 50 ) NULL,
	`lItemWeightValue0` VARCHAR( 50 ) NULL,
	`lItemLenghtValue0` VARCHAR( 50 ) NULL,
	`lItemWidthValue0` VARCHAR( 50 ) NULL,
	`lItemHeightValue0` VARCHAR( 50 ) NULL,
	`lItemCategory0` VARCHAR( 50 ) NULL,
	`pr0currencyCode` VARCHAR( 3 ) NULL,
	`pr0Amt`  FLOAT(6, 2) NULL,
	`pr0ItemAmt` FLOAT(6, 2) NULL,
	`pr0shippingAmt`  FLOAT(6, 2) NULL,
	`pr0handlingAmt`  FLOAT(6, 2) NULL,
	`pr0taxAmt`  FLOAT(6, 2) NULL,
	`pr0desc` VARCHAR( 50 ) NULL,
	`pr0notifyurl` VARCHAR( 150 ) NULL,
	`pr0insuranceAmt`  FLOAT(6, 2) NULL,
	`pr0shipDiscAmt`  FLOAT(6, 2) NULL,
	`pr0insuranceOptionOfferred`  VARCHAR( 10 ) NULL,
	`lpr0name0` VARCHAR( 50 ) NULL,
	`lprNumber0` FLOAT(6, 2) NULL,
	`lprQty0` INT ( 10 ) NULL,
	`lprTaxAmt0` FLOAT(6, 2) NULL,
	`lprAmt0` FLOAT(6, 2) NULL,
	`lprDesc0` VARCHAR( 50 ) NULL,
	`lprItemWeightValue0` VARCHAR( 50 ) NULL,
	`lprItemLenghtValue0` VARCHAR( 50 ) NULL,
	`lprItemWidthValue0` VARCHAR( 50 ) NULL,
	`lprItemHeightValue0` VARCHAR( 50 ) NULL,
	`lprItemCategory0` VARCHAR( 50 ) NULL,
	`pri0ErrorCode0` VARCHAR( 10 ) NULL,
	`insert_timestamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`update_timestamp` TIMESTAMP NOT NULL,
	UNIQUE KEY (idUser, method, token, correlationID, payerID),
	FOREIGN KEY (idPPTransaction) REFERENCES tbl_paypal_transaction_flow(idPPTransaction)
) ENGINE=InnoDB;



CREATE TABLE geostockphoto_dev.tbl_paypal_gsp_integration (
	`token` VARCHAR( 20 ) PRIMARY KEY,
	`idTransaction` INT(10) NULL,
	`idCreditsPacket` INT(6) NULL,
	`idUser` INT(10) UNSIGNED NOT NULL,
	`pi0Amt`  FLOAT(6, 2) NULL,
	`payerID` VARCHAR( 20 ) NULL,
	`insert_timestamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`update_timestamp` TIMESTAMP NOT NULL,
	FOREIGN KEY (idUser) REFERENCES tbl_user(idUser)
) ENGINE=InnoDB;
 
  