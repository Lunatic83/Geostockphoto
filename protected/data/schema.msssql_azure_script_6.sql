

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

/****** START RELEASE Panoramio 15/03/2013 ********************************************************************************************************************************/
ALTER TABLE [dbo].[tbl_user] ADD [idUserPanoramio] [bigint] NULL
GO
ALTER TABLE [dbo].[tbl_user] ADD [enablePanoramio] [bigint] NULL DEFAULT 0
GO
ALTER TABLE [dbo].[tbl_product_pre_post] ADD [idPanoramio] [bigint] NULL
GO
ALTER TABLE tbl_product_pre_post ALTER COLUMN title [varchar](128) NULL
GO
ALTER TABLE tbl_product ALTER COLUMN title [varchar](128) NULL
GO
/****** END RELEASE Panoramio 15/03/2013 ********************************************************************************************************************************/

COMMIT

-- DONE:  AZURE



/****** START RELEASE OwnEquipment clear 20/04/2013 ********************************************************************************************************************************/

BEGIN TRANSACTION

GO
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
/****** Object:  Table [dbo].[tbl_own_equipment]    Script Date: 20/04/2013 03:40:26 ******/
DROP TABLE [dbo].[tbl_own_equipment]

COMMIT

-- DONE:  AZURE

