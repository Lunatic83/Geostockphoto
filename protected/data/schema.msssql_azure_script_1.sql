/****** START RELEASE ShoppingOptUserDefaultRF/RM 22/10/2012 ********************************************************************************************************************************/

/****** Object:  Table [dbo].[tbl_shopping_opt_user_default_rf]    Script Date: 22/10/2012 00:51:43 ******/
GO
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tbl_shopping_opt_user_default_rf](
	[idUser] [bigint] NOT NULL,
	[idLicense] [bigint] NOT NULL,
	[idSize] [bigint] NOT NULL,
	[price] [numeric](6, 2) NULL,
	[insert_timestamp] [datetime] NOT NULL,
	[update_timestamp] [datetime] NOT NULL,
	CONSTRAINT [PK_tbl_shopping_opt_user_default_rf_idUser] PRIMARY KEY CLUSTERED 
(
	[idUser] ASC,
	[idLicense] ASC,
	[idSize] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF) 
) 

CREATE NONCLUSTERED INDEX [idLicense] ON [dbo].[tbl_shopping_opt_user_default_rf]
(
	[idLicense] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, DROP_EXISTING = OFF, ONLINE = OFF) 
GO
CREATE NONCLUSTERED INDEX [idSize] ON [dbo].[tbl_shopping_opt_user_default_rf]
(
	[idSize] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, DROP_EXISTING = OFF, ONLINE = OFF) 
GO



ALTER TABLE [dbo].[tbl_shopping_opt_user_default_rf] ADD  DEFAULT ((0)) FOR [idLicense]
GO
ALTER TABLE [dbo].[tbl_shopping_opt_user_default_rf] ADD  DEFAULT ((0)) FOR [idSize]
GO
ALTER TABLE [dbo].[tbl_shopping_opt_user_default_rf] ADD  DEFAULT (NULL) FOR [price]
GO
ALTER TABLE [dbo].[tbl_shopping_opt_user_default_rf] ADD  DEFAULT (getdate()) FOR [insert_timestamp]
GO
ALTER TABLE [dbo].[tbl_shopping_opt_user_default_rf] ADD  DEFAULT (getdate()) FOR [update_timestamp]
GO


ALTER TABLE [dbo].[tbl_shopping_opt_user_default_rf]  WITH NOCHECK ADD  CONSTRAINT [tbl_shopping_opt_user_default_rf$tbl_shopping_opt_user_default_rf_ibfk_1] FOREIGN KEY([idUser])
REFERENCES [dbo].[tbl_user] ([idUser])
GO
ALTER TABLE [dbo].[tbl_shopping_opt_user_default_rf] CHECK CONSTRAINT [tbl_shopping_opt_user_default_rf$tbl_shopping_opt_user_default_rf_ibfk_1]
GO
ALTER TABLE [dbo].[tbl_shopping_opt_user_default_rf]  WITH NOCHECK ADD  CONSTRAINT [tbl_shopping_opt_user_default_rf$tbl_shopping_opt_user_default_rf_ibfk_2] FOREIGN KEY([idLicense])
REFERENCES [dbo].[tbl_conf_license] ([idLicense])
GO
ALTER TABLE [dbo].[tbl_shopping_opt_user_default_rf] CHECK CONSTRAINT [tbl_shopping_opt_user_default_rf$tbl_shopping_opt_user_default_rf_ibfk_2]
GO
ALTER TABLE [dbo].[tbl_shopping_opt_user_default_rf]  WITH NOCHECK ADD  CONSTRAINT [tbl_shopping_opt_user_default_rf$tbl_shopping_opt_user_default_rf_ibfk_3] FOREIGN KEY([idSize])
REFERENCES [dbo].[tbl_conf_size] ([idSize])
GO
ALTER TABLE [dbo].[tbl_shopping_opt_user_default_rf] CHECK CONSTRAINT [tbl_shopping_opt_user_default_rf$tbl_shopping_opt_user_default_rf_ibfk_3]
GO


/****** Object:  Table [dbo].[tbl_shopping_opt_user_default_rm]    Script Date: 22/10/2012 00:51:43 ******/
GO
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tbl_shopping_opt_user_default_rm](
	[idUser] [bigint] NOT NULL,
	[idRMdetails] [bigint] NOT NULL,
	[idSize] [bigint] NOT NULL,
	[price] [numeric](6, 2) NULL,
	[idDuration] [bigint] NOT NULL,
	[insert_timestamp] [datetime] NOT NULL,
	[update_timestamp] [datetime] NOT NULL,
	CONSTRAINT [PK_tbl_shopping_opt_user_default_rm_idUser] PRIMARY KEY CLUSTERED 
(
	[idUser] ASC,
	[idRMdetails] ASC,
	[idSize] ASC,
	[idDuration] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF) 
) 



CREATE NONCLUSTERED INDEX [idRMdetails] ON [dbo].[tbl_shopping_opt_user_default_rm]
(
	[idRMdetails] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, DROP_EXISTING = OFF, ONLINE = OFF) 
GO
CREATE NONCLUSTERED INDEX [idSize] ON [dbo].[tbl_shopping_opt_user_default_rm]
(
	[idSize] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, DROP_EXISTING = OFF, ONLINE = OFF) 
GO
CREATE NONCLUSTERED INDEX [idDuration] ON [dbo].[tbl_shopping_opt_user_default_rm]
(
	[idDuration] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, DROP_EXISTING = OFF, ONLINE = OFF) 
GO


ALTER TABLE [dbo].[tbl_shopping_opt_user_default_rm] ADD  DEFAULT ((0)) FOR [idRMdetails]
GO
ALTER TABLE [dbo].[tbl_shopping_opt_user_default_rm] ADD  DEFAULT ((0)) FOR [idSize]
GO
ALTER TABLE [dbo].[tbl_shopping_opt_user_default_rm] ADD  DEFAULT (NULL) FOR [price]
GO
ALTER TABLE [dbo].[tbl_shopping_opt_user_default_rm] ADD  DEFAULT ((0)) FOR [idDuration]
GO
ALTER TABLE [dbo].[tbl_shopping_opt_user_default_rm] ADD  DEFAULT (getdate()) FOR [insert_timestamp]
GO
ALTER TABLE [dbo].[tbl_shopping_opt_user_default_rm] ADD  DEFAULT (getdate()) FOR [update_timestamp]
GO


ALTER TABLE [dbo].[tbl_shopping_opt_user_default_rm]  WITH NOCHECK ADD  CONSTRAINT [tbl_shopping_opt_user_default_rm$tbl_shopping_opt_user_default_rm_ibfk_1] FOREIGN KEY([idUser])
REFERENCES [dbo].[tbl_user] ([idUser])
GO
ALTER TABLE [dbo].[tbl_shopping_opt_user_default_rm] CHECK CONSTRAINT [tbl_shopping_opt_user_default_rm$tbl_shopping_opt_user_default_rm_ibfk_1]
GO
ALTER TABLE [dbo].[tbl_shopping_opt_user_default_rm]  WITH NOCHECK ADD  CONSTRAINT [tbl_shopping_opt_user_default_rm$tbl_shopping_opt_user_default_rm_ibfk_2] FOREIGN KEY([idRMdetails])
REFERENCES [dbo].[tbl_conf_license_rm_details] ([idRMdetails])
GO
ALTER TABLE [dbo].[tbl_shopping_opt_user_default_rm] CHECK CONSTRAINT [tbl_shopping_opt_user_default_rm$tbl_shopping_opt_user_default_rm_ibfk_2]
GO
ALTER TABLE [dbo].[tbl_shopping_opt_user_default_rm]  WITH NOCHECK ADD  CONSTRAINT [tbl_shopping_opt_user_default_rm$tbl_shopping_opt_user_default_rm_ibfk_3] FOREIGN KEY([idSize])
REFERENCES [dbo].[tbl_conf_size] ([idSize])
GO
ALTER TABLE [dbo].[tbl_shopping_opt_user_default_rm] CHECK CONSTRAINT [tbl_shopping_opt_user_default_rm$tbl_shopping_opt_user_default_rm_ibfk_3]
GO
ALTER TABLE [dbo].[tbl_shopping_opt_user_default_rm]  WITH NOCHECK ADD  CONSTRAINT [tbl_shopping_opt_user_default_rm$tbl_shopping_opt_user_default_rm_ibfk_4] FOREIGN KEY([idDuration])
REFERENCES [dbo].[tbl_conf_duration_rm] ([idDuration])
GO
ALTER TABLE [dbo].[tbl_shopping_opt_user_default_rm] CHECK CONSTRAINT [tbl_shopping_opt_user_default_rm$tbl_shopping_opt_user_default_rm_ibfk_4]
GO



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
ALTER TABLE dbo.tbl_user ADD
	preferredLicenseType varchar(30) NULL
GO


ALTER TABLE dbo.tbl_user ADD CONSTRAINT
	tbl_user$tbl_user_ibfk4 FOREIGN KEY
	(
	preferredLicenseType
	) REFERENCES dbo.tbl_conf_license_type
	(
	licenseType
	) ON UPDATE  NO ACTION 
	 ON DELETE  NO ACTION 
	
GO
COMMIT
/****** END RELEASE ShoppingOptUserDefault 22/10/2012 ********************************************************************************************************************************/
-- DONE: LOCAL, AZURE




/****** START RELEASE User Promotions 31/10/2012 ********************************************************************************************************************************/

BEGIN TRANSACTION
/****** Object:  Table [dbo].[tbl_conf_promotions]    Script Date: 22/10/2012 00:51:43 ******/
GO
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tbl_conf_promotions](
	[idPromotion] [bigint]  IDENTITY(1,1) NOT NULL,
	[name] [varchar](100) NOT NULL,
	[feePromotion] [numeric](3, 2) NOT NULL,
	[duration] [varchar](30) NULL,
	[enable] [bigint] NOT NULL,
	[insert_timestamp] [datetime] NOT NULL,
	[update_timestamp] [datetime] NOT NULL,
	CONSTRAINT [PK_tbl_conf_promotions] PRIMARY KEY CLUSTERED 
(
	[idPromotion] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF) ,
 CONSTRAINT [UK_conf_promotions$promotions] UNIQUE NONCLUSTERED 
(
	[name] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF) 
) 

ALTER TABLE [dbo].[tbl_conf_promotions] ADD  DEFAULT (getdate()) FOR [insert_timestamp]
GO
ALTER TABLE [dbo].[tbl_conf_promotions] ADD  DEFAULT (getdate()) FOR [update_timestamp]
GO
COMMIT



BEGIN TRANSACTION
/****** Object:  Table [dbo].[tbl_own_user_promotions]    Script Date: 22/10/2012 00:51:43 ******/
GO
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tbl_own_user_promotions](
	[idUser] [bigint] NOT NULL,
	[idPromotion] [bigint] NOT NULL,
	[start_timestamp] [datetime] NOT NULL,
	[end_timestamp] [datetime] NOT NULL,
	[insert_timestamp] [datetime] NOT NULL,
	[update_timestamp] [datetime] NOT NULL,
	CONSTRAINT [PK_tbl_own_user_promotions] PRIMARY KEY CLUSTERED 
(
	[idUser] ASC,
	[idPromotion] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF) 
) 

ALTER TABLE [dbo].[tbl_own_user_promotions] ADD  DEFAULT (getdate()) FOR [insert_timestamp]
GO
ALTER TABLE [dbo].[tbl_own_user_promotions] ADD  DEFAULT (getdate()) FOR [update_timestamp]
GO

ALTER TABLE [dbo].[tbl_own_user_promotions]  WITH NOCHECK ADD  CONSTRAINT [tbl_own_user_promotions$tbl_own_user_promotions_ibfk_1] FOREIGN KEY([idUser])
REFERENCES [dbo].[tbl_user] ([idUser])
GO
ALTER TABLE [dbo].[tbl_own_user_promotions] CHECK CONSTRAINT [tbl_own_user_promotions$tbl_own_user_promotions_ibfk_1]
GO
ALTER TABLE [dbo].[tbl_own_user_promotions]  WITH NOCHECK ADD  CONSTRAINT [tbl_own_user_promotions$tbl_own_user_promotions_ibfk_2] FOREIGN KEY([idPromotion])
REFERENCES [dbo].[tbl_conf_promotions] ([idPromotion])
GO
ALTER TABLE [dbo].[tbl_own_user_promotions] CHECK CONSTRAINT [tbl_own_user_promotions$tbl_own_user_promotions_ibfk_2]
GO
COMMIT





/****** END RELEASE User Promotions  31/10/2012 ********************************************************************************************************************************/
-- DONE: LOCAL, AZURE



/****** START RELEASE AdminPromotion 06/11/2012 ********************************************************************************************************************************/
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
ALTER TABLE dbo.tbl_conf_promotions ADD
	idUserAdmin bigint NULL
GO


ALTER TABLE dbo.tbl_conf_promotions ADD CONSTRAINT
	tbl_conf_promotions$tbl_conf_promotions_ibfk4 FOREIGN KEY
	(
	idUserAdmin
	) REFERENCES dbo.tbl_user
	(
	idUser
	) ON UPDATE  NO ACTION 
	 ON DELETE  NO ACTION 
	
GO
COMMIT
/****** END RELEASE AdminPromotion 06/11/2012 ********************************************************************************************************************************/
-- DONE: LOCAL, AZURE



/****** START RELEASE equipment focalLength 14/11/2012 ********************************************************************************************************************************/
ALTER TABLE tbl_photo_pre_post ADD focalLength [bigint] NULL;
ALTER TABLE tbl_own_photo_equipment ADD equipmentType [varchar](30) NULL;
ALTER TABLE tbl_equipments ADD equipmentType [varchar](30) NULL;
/****** END RELEASE equipment focalLength 14/11/2012 ********************************************************************************************************************************/
-- DONE: LOCAL, AZURE


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

INSERT INTO [dbo].[tbl_conf_buy_credits]([idCreditsPacket],[description],[amount]) VALUES (-1,'shopping cart credits',0.00);
GO


/****** START RELEASE ConfParameters 11/11/2012 ********************************************************************************************************************************/
INSERT [dbo].[tbl_conf_parameters] ([parameter], [value], [description]) VALUES (N'ProcessedFtpFilesLimit', N'10', N'The number of photos processed by the CronJobFtpFiles')
GO
INSERT [dbo].[tbl_conf_parameters] ([parameter], [value], [description]) VALUES (N'MaxMarkers', N'250', N'Total number of photos showed on the map')
GO
INSERT [dbo].[tbl_conf_parameters] ([parameter], [value], [description]) VALUES (N'MaxMarkersInner', N'50', N'Total number of photos showed in a region of the map')
GO
INSERT [dbo].[tbl_conf_parameters] ([parameter], [value], [description]) VALUES (N'Xgrid', N'8', N'Number of columns on the map')
GO
INSERT [dbo].[tbl_conf_parameters] ([parameter], [value], [description]) VALUES (N'Ygrid', N'4', N'Number of rowss on the map')
GO
/****** START RELEASE ConfParameters 11/11/2012 ********************************************************************************************************************************/


COMMIT

/****** END RELEASE ALL INSERT, DELETE UPDATE  ********************************************************************************************************************************/
-- DONE: LOCAL
