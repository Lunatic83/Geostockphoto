/****** START RELEASE User Switch 02/12/2012 ********************************************************************************************************************************/

-- CREARE tbl_own_switch_user (idUserMaster, idUserSlave, insert_timestamp_ update_timestamp)
BEGIN TRANSACTION
/****** Object:  Table [dbo].[tbl_own_switch_user]    Script Date: 02/12/2012 00:51:43 ******/
GO
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tbl_own_switch_user](
	[idUserMaster] [bigint] NOT NULL,
	[idUserSlave] [bigint] NOT NULL,
	[insert_timestamp] [datetime] NOT NULL,
	[update_timestamp] [datetime] NOT NULL,
	CONSTRAINT [PK_tbl_own_switch_user] PRIMARY KEY CLUSTERED 
(
	[idUserMaster] ASC,
	[idUserSlave] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF)
) 

ALTER TABLE [dbo].[tbl_own_switch_user] ADD  DEFAULT (getdate()) FOR [insert_timestamp]
GO
ALTER TABLE [dbo].[tbl_own_switch_user] ADD  DEFAULT (getdate()) FOR [update_timestamp]
GO

ALTER TABLE [dbo].[tbl_own_switch_user]  WITH NOCHECK ADD  CONSTRAINT [tbl_own_switch_user$tbl_own_switch_user_ibfk_1] FOREIGN KEY([idUserMaster])
REFERENCES [dbo].[tbl_user] ([idUser])
GO
ALTER TABLE [dbo].[tbl_own_switch_user]  WITH NOCHECK ADD  CONSTRAINT [tbl_own_switch_user$tbl_own_switch_user_ibfk_2] FOREIGN KEY([idUserSlave])
REFERENCES [dbo].[tbl_user] ([idUser])
GO

COMMIT

/****** END RELEASE User Switch 02/12/2012 ********************************************************************************************************************************/
-- DONE: LOCAL, AZURE



/****** START RELEASE User alter personal  02/12/2012 ********************************************************************************************************************************/
-- AGGIUNGERE CAMPO tbl_user.vote_weight 
ALTER TABLE tbl_user ADD vote_weight numeric(6, 2) NULL;
/****** END RELEASE User Switch 02/12/2012 ********************************************************************************************************************************/
-- DONE: LOCAL, AZURE


/****** START RELEASE tbl_master_action 06/12/2012 ********************************************************************************************************************************/

-- CREARE tbl_master_action (idUserMaster, idProduct, title, idCategory, idLatitude, idLongitude, insert_timestamp update_timestamp)
BEGIN TRANSACTION
/****** Object:  Table [dbo].[tbl_master_action]    Script Date: 02/12/2012 00:51:43 ******/
GO
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tbl_master_action](
	[idUserMaster] [bigint] NOT NULL,
	[idProduct] [bigint] NOT NULL,
	[title] [varchar](64) NULL,
	[idCategory1] [bigint] NULL,
	[lat] [numeric](10, 6) NULL,
	[lng] [numeric](10, 6) NULL,
	[insert_timestamp] [datetime] NOT NULL,
	[update_timestamp] [datetime] NOT NULL,
	CONSTRAINT [PK_tbl_master_action] PRIMARY KEY CLUSTERED 
(
	[idUserMaster] ASC,
	[idProduct] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF)
)

ALTER TABLE [dbo].[tbl_master_action] ADD  DEFAULT (getdate()) FOR [insert_timestamp]
GO
ALTER TABLE [dbo].[tbl_master_action] ADD  DEFAULT (getdate()) FOR [update_timestamp]
GO


ALTER TABLE [dbo].[tbl_master_action]  WITH NOCHECK ADD  CONSTRAINT [tbl_master_action$tbl_master_action_ibfk_1] FOREIGN KEY([idCategory1])
REFERENCES [dbo].[tbl_conf_category] ([idCategory])
GO

ALTER TABLE [dbo].[tbl_master_action]  WITH NOCHECK ADD  CONSTRAINT [tbl_master_action$tbl_master_action_ibfk_2] FOREIGN KEY([idUserMaster])
REFERENCES [dbo].[tbl_user] ([idUser])
GO

ALTER TABLE [dbo].[tbl_master_action]  WITH NOCHECK ADD  CONSTRAINT [tbl_master_action$tbl_master_action_ibfk_3] FOREIGN KEY([idProduct])
REFERENCES [dbo].[tbl_product_pre_post] ([idProduct])
GO

COMMIT

/****** END RELEASE tbl_master_action 06/12/2012 ********************************************************************************************************************************/
-- DONE: LOCAL, AZURE

/****** START RELEASE Conf Originale 06/12/2012 ********************************************************************************************************************************/

SET IDENTITY_INSERT tbl_conf_size ON
ALTER TABLE tbl_conf_size ALTER COLUMN maxSize bigint NULL

/****** END RELEASE Conf Originale 06/12/2012 ********************************************************************************************************************************/
-- DONE: LOCAL, AZURE


/****** START RELEASE Roles with Editors 10/12/2012 ********************************************************************************************************************************/



-- CREARE tbl_conf_roles (idRole, name)
BEGIN TRANSACTION
/****** Object:  Table [dbo].[tbl_conf_roles]    Script Date: 02/12/2012 00:51:43 ******/
GO
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tbl_conf_roles](
	[idRole] [bigint] IDENTITY NOT NULL,
	[name] [varchar](24) NOT NULL,
	[insert_timestamp] [datetime] NOT NULL,
	[update_timestamp] [datetime] NOT NULL,
	CONSTRAINT [PK_tbl_conf_roles] PRIMARY KEY CLUSTERED 
(
	[idRole] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF)
)

ALTER TABLE [dbo].[tbl_conf_roles] ADD  DEFAULT (getdate()) FOR [insert_timestamp]
GO
ALTER TABLE [dbo].[tbl_conf_roles] ADD  DEFAULT (getdate()) FOR [update_timestamp]
GO

COMMIT


ALTER TABLE tbl_own_switch_user ADD idRole bigint NULL;

ALTER TABLE [dbo].[tbl_own_switch_user]  WITH NOCHECK ADD  CONSTRAINT [tbl_own_switch_user$tbl_own_switch_user_ibfk_3] FOREIGN KEY([idRole])
REFERENCES [dbo].[tbl_conf_roles] ([idRole])
GO
ALTER TABLE [dbo].[tbl_own_switch_user] CHECK CONSTRAINT [tbl_own_switch_user$tbl_own_switch_user_ibfk_3]
GO





/****** END RELEASE Roles with Editors 10/12/2012 ********************************************************************************************************************************/
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
insert INTO tbl_conf_size (idSize, code) VALUES (0, 'Original');
update tbl_conf_shopping_opt_default_gsp set idSize=0 where idLicense=2

INSERT INTO [dbo].[tbl_conf_product_status]([name]) VALUES ('Pre Pending');


INSERT INTO [dbo].[tbl_conf_roles]  ([name]) VALUES ('Admin');
INSERT INTO [dbo].[tbl_conf_roles]  ([name]) VALUES ('Editor');


COMMIT

/****** END RELEASE ALL INSERT, DELETE UPDATE  ********************************************************************************************************************************/
-- DONE:  LOCAL, AZURE