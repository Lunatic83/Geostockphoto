/****** START RELEASE User Profile and clean 13/11/2012 ********************************************************************************************************************************/

-- CANCELLARE tbl_contest  model fatto
/****** Object:  Table [dbo].[tbl_contest]    Script Date: 14/11/2012 00:44:04 ******/
DROP TABLE [dbo].[tbl_contest]
GO
-- CANCELLARE tbl_landing_page model fatto
/****** Object:  Table [dbo].[tbl_landing_page]    Script Date: 14/11/2012 00:45:24 ******/
DROP TABLE [dbo].[tbl_landing_page]
GO

-- CANCELLARE CAMPO tbl_user.street model fatto
ALTER TABLE tbl_user DROP CONSTRAINT DF__tbl_user__street__39E294A9;
ALTER TABLE tbl_user DROP COLUMN street;

-- CANCELLARE CAMPO tbl_user.zip model fatto
ALTER TABLE tbl_user DROP CONSTRAINT DF__tbl_user__zip__3AD6B8E2;
ALTER TABLE tbl_user DROP COLUMN zip;

-- CANCELLARE CAMPO tbl_user.region model fatto
ALTER TABLE tbl_user DROP CONSTRAINT DF__tbl_user__region__3CBF0154;
ALTER TABLE tbl_user DROP COLUMN region;

-- CANCELLARE CAMPO tbl_user.phone1 model fatto
ALTER TABLE tbl_user DROP CONSTRAINT DF__tbl_user__phone1__3EA749C6;
ALTER TABLE tbl_user DROP COLUMN phone1;

-- CANCELLARE CAMPO tbl_user.phone2 model fatto
ALTER TABLE tbl_user DROP CONSTRAINT DF__tbl_user__phone2__3F9B6DFF;
ALTER TABLE tbl_user DROP COLUMN phone2;

-- AGGIUNGERE CAMPO tbl_photographer.awards  Awards & Publications
ALTER TABLE tbl_photographer ADD awards_publications [varchar](max) NULL;


-- CREARE tbl_conf_referral (idReferral, name, url, insert_timestamp_ update_timestamp)
BEGIN TRANSACTION
/****** Object:  Table [dbo].[tbl_conf_referral]    Script Date: 22/10/2012 00:51:43 ******/
GO
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tbl_conf_referral](
	[idReferral] [bigint]  IDENTITY(1,1) NOT NULL,
	[name] [varchar](100) NOT NULL,
	[insert_timestamp] [datetime] NOT NULL,
	[update_timestamp] [datetime] NOT NULL,
	CONSTRAINT [PK_tbl_conf_referral] PRIMARY KEY CLUSTERED 
(
	[idReferral] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF) ,
 CONSTRAINT [UK_conf_referral$referral] UNIQUE NONCLUSTERED 
(
	[name] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF) 
) 

ALTER TABLE [dbo].[tbl_conf_referral] ADD  DEFAULT (getdate()) FOR [insert_timestamp]
GO
ALTER TABLE [dbo].[tbl_conf_referral] ADD  DEFAULT (getdate()) FOR [update_timestamp]
GO
COMMIT



BEGIN TRANSACTION

-- CREARE tbl_own_user_referral (idUser,idReferral,insert_timestamp_ update_timestamp)
/****** Object:  Table [dbo].[tbl_own_user_referral]    Script Date: 22/10/2012 00:51:43 ******/
GO
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tbl_own_user_referral](
	[idUser] [bigint] NOT NULL,
	[idReferral] [bigint] NOT NULL,
	[uri] [varchar](150) NOT NULL,
	[insert_timestamp] [datetime] NOT NULL,
	[update_timestamp] [datetime] NOT NULL,
	CONSTRAINT [PK_tbl_own_user_referral] PRIMARY KEY CLUSTERED 
(
	[idUser] ASC,
	[idReferral] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF) 
) 

ALTER TABLE [dbo].[tbl_own_user_referral] ADD  DEFAULT (getdate()) FOR [insert_timestamp]
GO
ALTER TABLE [dbo].[tbl_own_user_referral] ADD  DEFAULT (getdate()) FOR [update_timestamp]
GO

ALTER TABLE [dbo].[tbl_own_user_referral]  WITH NOCHECK ADD  CONSTRAINT [tbl_own_user_referral$tbl_own_user_referral_ibfk_1] FOREIGN KEY([idUser])
REFERENCES [dbo].[tbl_user] ([idUser])
GO
ALTER TABLE [dbo].[tbl_own_user_referral] CHECK CONSTRAINT [tbl_own_user_referral$tbl_own_user_referral_ibfk_1]
GO
ALTER TABLE [dbo].[tbl_own_user_referral]  WITH NOCHECK ADD  CONSTRAINT [tbl_own_user_referral$tbl_own_user_referral_ibfk_2] FOREIGN KEY([idReferral])
REFERENCES [dbo].[tbl_conf_referral] ([idReferral])
GO
ALTER TABLE [dbo].[tbl_own_user_referral] CHECK CONSTRAINT [tbl_own_user_referral$tbl_own_user_referral_ibfk_2]
GO
COMMIT

/****** END RELEASE ShoppingOptUserDefault 13/11/2012 ********************************************************************************************************************************/
-- DONE: LOCAL, AZURE



/****** START RELEASE Photogrepher and clean column 20/11/2012 ********************************************************************************************************************************/
-- CANCELLARE CAMPO tbl_photographer.numPhotos
ALTER TABLE tbl_photographer DROP CONSTRAINT DF__tbl_photo__numPh__640DD89F;
ALTER TABLE tbl_photographer DROP COLUMN numPhotos;

-- CANCELLARE CAMPO tbl_photographer.rate
ALTER TABLE tbl_photographer DROP CONSTRAINT DF__tbl_photog__rate__6501FCD8;
ALTER TABLE tbl_photographer DROP COLUMN rate;

-- CANCELLARE CAMPO tbl_photographer.idCategory1
ALTER TABLE [dbo].[tbl_photographer] DROP CONSTRAINT [tbl_photographer$tbl_photographer_ibfk_2]
DROP INDEX [idCategory1] ON [dbo].[tbl_photographer]
ALTER TABLE tbl_photographer DROP COLUMN idCategory1;

-- CANCELLARE CAMPO tbl_photographer.idCategory2
ALTER TABLE [dbo].[tbl_photographer] DROP CONSTRAINT [tbl_photographer$tbl_photographer_ibfk_3]
DROP INDEX [idCategory2] ON [dbo].[tbl_photographer]
ALTER TABLE tbl_photographer DROP COLUMN idCategory2;

-- AGGIUNGERE CAMPO tbl_user.birthday
ALTER TABLE tbl_user ADD birthdate [date] NULL;

/****** END RELEASE Photogrepher and clean 20/11/2012 ********************************************************************************************************************************/
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

COMMIT

/****** END RELEASE ALL INSERT, DELETE UPDATE  ********************************************************************************************************************************/
-- DONE: 