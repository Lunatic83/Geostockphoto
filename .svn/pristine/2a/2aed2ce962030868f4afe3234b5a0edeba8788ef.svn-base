/****** START RELEASE API KEY 20/01/2013 ********************************************************************************************************************************/

-- CREARE tbl_api_key (idUser, apiKeys, link1, acceptTerms, insert_timestamp_ update_timestamp)
BEGIN TRANSACTION
/****** Object:  Table [dbo].[tbl_api_key]    Script Date: 20/01/2013 16:28:43 ******/
GO
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tbl_api_key](
	[idUser] [bigint] NOT NULL,
	[apiKey] [varchar](8) NOT NULL,
	[link1] [varchar](128) NULL,
	[acceptTerms] [bigint] NOT NULL,
	[isPartner] [bigint] NOT NULL,
	[insert_timestamp] [datetime] NOT NULL,
	[update_timestamp] [datetime] NOT NULL,
	CONSTRAINT [PK_tbl_api_key] PRIMARY KEY CLUSTERED 
	(
		[idUser]
	)WITH (STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF)
) 

ALTER TABLE [dbo].[tbl_api_key] ADD  DEFAULT (getdate()) FOR [insert_timestamp]
GO
ALTER TABLE [dbo].[tbl_api_key] ADD  DEFAULT (getdate()) FOR [update_timestamp]
GO

ALTER TABLE [dbo].[tbl_api_key]  WITH NOCHECK ADD  CONSTRAINT [tbl_api_key$tbl_api_key_ibfk_1] FOREIGN KEY([idUser])
REFERENCES [dbo].[tbl_user] ([idUser])
GO

COMMIT

/****** END RELEASE API key 20/01/2013 ********************************************************************************************************************************/
-- DONE: 





/****** START RELEASE Groups 22/01/2013 ********************************************************************************************************************************/

BEGIN TRANSACTION
/****** Object:  Table [dbo].[tbl_conf_groups]    Script Date: 22/01/2013 00:51:43 ******/
GO
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tbl_conf_groups](
	[idGroup] [bigint]  IDENTITY(1,1) NOT NULL,
	[name] [varchar](64) NOT NULL,
	[photoProfile] [bigint] NOT NULL,
	[lat] [numeric](10, 6) NULL,
	[lng] [numeric](10, 6) NULL,
	[town] [varchar](30) NULL,
	[country] [varchar](30) NULL,
	[description] [varchar](256) NULL,
	[commission] [numeric](3, 2) NOT NULL,
	[idUserAdmin] [bigint] NOT NULL,
	[idPromotion] [bigint] NULL,
	[isReserved] [bigint] NOT NULL,
	[insert_timestamp] [datetime] NOT NULL,
	[update_timestamp] [datetime] NOT NULL,
	CONSTRAINT [PK_tbl_conf_groups] PRIMARY KEY CLUSTERED 
(
	[idGroup] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF) ,
 CONSTRAINT [UK_conf_groups$groups] UNIQUE NONCLUSTERED 
(
	[name] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF) 
) 

ALTER TABLE [dbo].[tbl_conf_groups] ADD  DEFAULT (getdate()) FOR [insert_timestamp]
GO
ALTER TABLE [dbo].[tbl_conf_groups] ADD  DEFAULT (getdate()) FOR [update_timestamp]
GO

ALTER TABLE [dbo].[tbl_conf_groups]  WITH NOCHECK ADD  CONSTRAINT [tbl_conf_groups$tbl_conf_groups_ibfk_1] FOREIGN KEY([idUserAdmin])
REFERENCES [dbo].[tbl_user] ([idUser])
GO

ALTER TABLE [dbo].[tbl_conf_groups]  WITH NOCHECK ADD  CONSTRAINT [tbl_conf_groups$tbl_conf_groups_ibfk_2] FOREIGN KEY([idPromotion])
REFERENCES [dbo].[tbl_conf_promotions] ([idPromotion])
GO
COMMIT



BEGIN TRANSACTION
/****** Object:  Table [dbo].[tbl_user_groups]    Script Date: 22/01/2013 00:51:43 ******/
GO
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tbl_user_groups](
	[idUser] [bigint] NOT NULL,
	[idGroup] [bigint] NOT NULL,
	[flagGroupCommission] [bigint] NOT NULL,
	[insert_timestamp] [datetime] NOT NULL,
	[update_timestamp] [datetime] NOT NULL,
	CONSTRAINT [PK_tbl_user_groups] PRIMARY KEY CLUSTERED 
(
	[idUser] ASC,
	[idGroup] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF) 
) 

ALTER TABLE [dbo].[tbl_user_groups] ADD  DEFAULT (getdate()) FOR [insert_timestamp]
GO
ALTER TABLE [dbo].[tbl_user_groups] ADD  DEFAULT (getdate()) FOR [update_timestamp]
GO

ALTER TABLE [dbo].[tbl_user_groups]  WITH NOCHECK ADD  CONSTRAINT [tbl_user_groups$tbl_user_groups_ibfk_1] FOREIGN KEY([idUser])
REFERENCES [dbo].[tbl_user] ([idUser])
GO
ALTER TABLE [dbo].[tbl_user_groups] CHECK CONSTRAINT [tbl_user_groups$tbl_user_groups_ibfk_1]
GO
ALTER TABLE [dbo].[tbl_user_groups]  WITH NOCHECK ADD  CONSTRAINT [tbl_user_groups$tbl_user_groups_ibfk_2] FOREIGN KEY([idGroup])
REFERENCES [dbo].[tbl_conf_groups] ([idGroup])
GO
ALTER TABLE [dbo].[tbl_user_groups] CHECK CONSTRAINT [tbl_user_groups$tbl_user_groups_ibfk_2]
GO
COMMIT

/****** END RELEASE Groups  22/01/2013 ********************************************************************************************************************************/
-- DONE: 



/* LEAVE AS LAST SECTION OF THE SCRIPT*/
/****** START RELEASE ALL INSERT, DELETE UPDATE  ********************************************************************************************************************************/
/* To prevent any potential data loss issues, you should review this script in detail before running it outside the context of the database designer.*/
BEGIN TRANSACTION
SET QUOTED_IDENTIFIER ON
SET ARITHABORT ON
SET NUMERIC_ROUNDABORT OFF
SET CONCAT_NULL_YIELDS_NULL ON
SET ANSI_NULLS ON
SET ANSI_PADDING ON
SET ANSI_WARNINGS ON
COMMIT
BEGIN TRANSACTION
GO

/*ALL INSERT, DELETE UPDATE here */

ALTER TABLE [dbo].[tbl_conf_promotions] ADD [isReserved] [bigint] DEFAULT 0 NOT NULL
GO

/****** START RELEASE Groups Update 04/02/2013 ********************************************************************************************************************************/
ALTER TABLE [dbo].[tbl_conf_groups] ADD [verificationCode] [varchar](8) NULL
GO
ALTER TABLE [dbo].[tbl_conf_groups] ADD [enable] [bigint] DEFAULT 0 NOT NULL
GO
ALTER TABLE [dbo].[tbl_conf_groups] ADD [acceptTerms] [bigint] DEFAULT 0 NOT NULL
GO
/****** END RELEASE Groups Update 04/02/2013 ********************************************************************************************************************************/


/****** START RELEASE Fee Update 09/02/2013 ********************************************************************************************************************************/
ALTER TABLE [dbo].[tbl_conf_user_profile] ADD [fee] [numeric](3, 2) NULL
GO
ALTER TABLE tbl_user ALTER COLUMN fee [numeric](3, 2) NULL
GO
update tbl_user set fee=NULL
GO
alter table tbl_transaction_photo_rf drop column fee
GO
alter table tbl_transaction_photo_rm drop column fee
GO
ALTER TABLE [dbo].[tbl_transaction_photo] ADD [creditsToUser] [numeric](6, 2) NULL
GO
ALTER TABLE [dbo].[tbl_transaction_photo] ADD [creditsToPartner] [numeric](6, 2) NULL
GO
ALTER TABLE [dbo].[tbl_transaction_photo] ADD [creditsToGroup] [numeric](6, 2) NULL
GO
ALTER TABLE [dbo].[tbl_transaction_photo] ADD [creditsToGsp] [numeric](6, 2) NULL
GO
ALTER TABLE [dbo].[tbl_transaction_photo] ADD [idPromotion] [bigint] NULL
GO
ALTER TABLE [dbo].[tbl_transaction_photo] ADD [idGroup] [bigint] NULL
GO

ALTER TABLE [dbo].[tbl_transaction_photo]  WITH NOCHECK ADD  CONSTRAINT [tbl_transaction_photo$tbl_transaction_photo_ibfk_4] FOREIGN KEY([idPromotion])
REFERENCES [dbo].[tbl_conf_promotions] ([idPromotion])
GO
ALTER TABLE [dbo].[tbl_transaction_photo]  WITH NOCHECK ADD  CONSTRAINT [tbl_transaction_photo$tbl_transaction_photo_ibfk_5] FOREIGN KEY([idGroup])
REFERENCES [dbo].[tbl_conf_groups] ([idGroup])
GO
/****** END RELEASE Fee Update 09/02/2013 ********************************************************************************************************************************/


/****** START RELEASE Secure Session ID Update 13/02/2013 ********************************************************************************************************************************/
ALTER TABLE [dbo].[tbl_user] ADD [sessionIdSecure] [char](32) NULL
GO
/****** END RELEASE Secure Session ID Update 13/02/2013 ********************************************************************************************************************************/


/****** START RELEASE Save Shopping Option Update 21/02/2013 ********************************************************************************************************************************/
ALTER TABLE [dbo].[tbl_shopping_cart] ADD [rowSelected] [int] NULL
GO
/****** END RELEASE Save Shopping Option Update 21/02/2013 ********************************************************************************************************************************/

COMMIT

-- DONE:  