/****** START RELEASE You Do Nothing 20/12/2012 ********************************************************************************************************************************/

-- CREARE tbl_you_do_nothing (idUser, nPhotos, link1, link2, flagCategory, flagPosition, upperBound, device, confCode, insert_timestamp_ update_timestamp)
BEGIN TRANSACTION
/****** Object:  Table [dbo].[tbl_you_do_nothing]    Script Date: 20/12/2012 16:28:43 ******/
GO
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tbl_you_do_nothing](
	[idUser] [bigint] NOT NULL,
	[nPhotos] [bigint] NOT NULL,
	[link1] [varchar](128) NOT NULL,
	[link2] [varchar](128) NULL,
	[flagCategory] [bigint] NULL,
	[flagPosition] [bigint] NULL,
	[upperBound] [bigint] NULL,
	[device] [varchar](32) NOT NULL,
	[flagSendBackDevice] [bigint] NULL,
	[confCode] [varchar](8) NULL,
	[acceptTerms] [bigint] NOT NULL,
	[insert_timestamp] [datetime] NOT NULL,
	[update_timestamp] [datetime] NOT NULL,
	CONSTRAINT [PK_tbl_you_do_nothing] PRIMARY KEY CLUSTERED 
	(
		[idUser]
	)WITH (STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF)
) 

ALTER TABLE [dbo].[tbl_you_do_nothing] ADD  DEFAULT (getdate()) FOR [insert_timestamp]
GO
ALTER TABLE [dbo].[tbl_you_do_nothing] ADD  DEFAULT (getdate()) FOR [update_timestamp]
GO

ALTER TABLE [dbo].[tbl_you_do_nothing]  WITH NOCHECK ADD  CONSTRAINT [tbl_you_do_nothing$tbl_you_do_nothing_ibfk_1] FOREIGN KEY([idUser])
REFERENCES [dbo].[tbl_user] ([idUser])
GO

COMMIT

/****** END RELEASE You Do Nothing 20/12/2012 ********************************************************************************************************************************/
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



COMMIT

/****** END RELEASE ALL INSERT, DELETE UPDATE  ********************************************************************************************************************************/
-- DONE:  