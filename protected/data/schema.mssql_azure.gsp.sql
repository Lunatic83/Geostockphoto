
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[tbl_conf_buy_credits](
	[idCreditsPacket] [int] NOT NULL,
	[description] [varchar](50) NOT NULL,
	[amount] [numeric](5, 2) NOT NULL,
	[insert_timestamp] [datetime] NOT NULL,
	[update_timestamp] [datetime] NOT NULL,
 CONSTRAINT [PK_tbl_conf_buy_credits_idCreditsPacket] PRIMARY KEY CLUSTERED 
(
	[idCreditsPacket] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF) 
) 

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[tbl_conf_category]    Script Date: 25/05/2012 00:51:43 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[tbl_conf_category](
	[idCategory] [bigint] IDENTITY(29,1) NOT NULL,
	[name] [varchar](24) NOT NULL,
	[idPhotoType] [bigint] NOT NULL,
	[insert_timestamp] [datetime] NOT NULL,
	[update_timestamp] [datetime] NOT NULL,
 CONSTRAINT [PK_tbl_conf_category_idCategory] PRIMARY KEY CLUSTERED 
(
	[idCategory] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF) 
) 

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[tbl_conf_duration_rm]    Script Date: 25/05/2012 00:51:43 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[tbl_conf_duration_rm](
	[idDuration] [bigint] IDENTITY(6,1) NOT NULL,
	[duration] [varchar](30) NULL,
	[insert_timestamp] [datetime] NOT NULL,
	[update_timestamp] [datetime] NOT NULL,
 CONSTRAINT [PK_tbl_conf_duration_rm_idDuration] PRIMARY KEY CLUSTERED 
(
	[idDuration] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF) 
) 

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[tbl_conf_language]    Script Date: 25/05/2012 00:51:43 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[tbl_conf_language](
	[idLanguage] [varchar](2) NOT NULL,
	[name] [varchar](20) NOT NULL,
	[insert_timestamp] [datetime] NOT NULL,
	[update_timestamp] [datetime] NOT NULL,
 CONSTRAINT [PK_tbl_conf_language_idLanguage] PRIMARY KEY CLUSTERED 
(
	[idLanguage] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF) 
) 

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[tbl_conf_license]    Script Date: 25/05/2012 00:51:43 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[tbl_conf_license](
	[idLicense] [bigint] IDENTITY(4,1) NOT NULL,
	[licenseType] [varchar](30) NOT NULL,
	[name] [varchar](30) NULL,
	[insert_timestamp] [datetime] NOT NULL,
	[update_timestamp] [datetime] NOT NULL,
 CONSTRAINT [PK_tbl_conf_license_idLicense] PRIMARY KEY CLUSTERED 
(
	[idLicense] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF) 
) 

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[tbl_conf_license_rm_details]    Script Date: 25/05/2012 00:51:43 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[tbl_conf_license_rm_details](
	[idRMdetails] [bigint] IDENTITY(32,1) NOT NULL,
	[nameRMdetails] [varchar](30) NULL,
	[idRMtype] [bigint] NULL,
	[insert_timestamp] [datetime] NOT NULL,
	[update_timestamp] [datetime] NOT NULL,
 CONSTRAINT [PK_tbl_conf_license_rm_details_idRMdetails] PRIMARY KEY CLUSTERED 
(
	[idRMdetails] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF) 
) 

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[tbl_conf_license_rm_type]    Script Date: 25/05/2012 00:51:43 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[tbl_conf_license_rm_type](
	[idRMtype] [bigint] IDENTITY(5,1) NOT NULL,
	[nameRMtype] [varchar](30) NULL,
	[insert_timestamp] [datetime] NOT NULL,
	[update_timestamp] [datetime] NOT NULL,
 CONSTRAINT [PK_tbl_conf_license_rm_type_idRMtype] PRIMARY KEY CLUSTERED 
(
	[idRMtype] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF) 
) 

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[tbl_conf_license_type]    Script Date: 25/05/2012 00:51:43 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[tbl_conf_license_type](
	[licenseType] [varchar](30) NOT NULL,
	[insert_timestamp] [datetime] NOT NULL,
	[update_timestamp] [datetime] NOT NULL,
 CONSTRAINT [PK_tbl_conf_license_type_licenseType] PRIMARY KEY CLUSTERED 
(
	[licenseType] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF) 
) 

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[tbl_conf_parameters]    Script Date: 25/05/2012 00:51:43 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[tbl_conf_parameters](
	[parameter] [varchar](50) NOT NULL,
	[value] [varchar](50) NOT NULL,
	[description] [varchar](250) NOT NULL,
	[insert_timestamp] [datetime] NOT NULL,
	[update_timestamp] [datetime] NOT NULL,
 CONSTRAINT [PK_tbl_conf_parameters_parameter] PRIMARY KEY CLUSTERED 
(
	[parameter] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF) 
) 

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[tbl_conf_paypal]    Script Date: 25/05/2012 00:51:43 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[tbl_conf_paypal](
	[environment] [varchar](10) NOT NULL,
	[apiUserName] [varchar](100) NOT NULL,
	[apiPassword] [varchar](20) NOT NULL,
	[apiSignature] [varchar](100) NOT NULL,
	[version] [varchar](5) NOT NULL,
	[endPoint] [varchar](150) NOT NULL,
	[redirectUrl] [varchar](150) NOT NULL,
	[urlJSdigitalGoods] [varchar](150) NOT NULL,
	[insert_timestamp] [datetime] NOT NULL,
	[update_timestamp] [datetime] NOT NULL,
 CONSTRAINT [PK_tbl_conf_paypal_environment] PRIMARY KEY CLUSTERED 
(
	[environment] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF) 
) 

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[tbl_conf_photo_type]    Script Date: 25/05/2012 00:51:43 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[tbl_conf_photo_type](
	[idPhotoType] [bigint] IDENTITY(3,1) NOT NULL,
	[name] [varchar](24) NOT NULL,
	[insert_timestamp] [datetime] NOT NULL,
	[update_timestamp] [datetime] NOT NULL,
 CONSTRAINT [PK_tbl_conf_photo_type_idPhotoType] PRIMARY KEY CLUSTERED 
(
	[idPhotoType] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF) 
) 

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[tbl_conf_product_status]    Script Date: 25/05/2012 00:51:43 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[tbl_conf_product_status](
	[idProductStatus] [bigint] IDENTITY(8,1) NOT NULL,
	[name] [varchar](50) NOT NULL,
	[insert_timestamp] [datetime] NOT NULL,
	[update_timestamp] [datetime] NOT NULL,
 CONSTRAINT [PK_tbl_conf_product_status_idProductStatus] PRIMARY KEY CLUSTERED 
(
	[idProductStatus] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF) 
) 

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[tbl_conf_review_motivations]    Script Date: 25/05/2012 00:51:43 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[tbl_conf_review_motivations](
	[idMotivation] [bigint] IDENTITY(7,1) NOT NULL,
	[motivation] [varchar](64) NOT NULL,
	[insert_timestamp] [datetime] NOT NULL,
	[update_timestamp] [datetime] NOT NULL,
 CONSTRAINT [PK_tbl_conf_review_motivations_idMotivation] PRIMARY KEY CLUSTERED 
(
	[idMotivation] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF) 
) 

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[tbl_conf_shopping_opt_default_gsp]    Script Date: 25/05/2012 00:51:43 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tbl_conf_shopping_opt_default_gsp](
	[idLicense] [bigint] NOT NULL,
	[idSize] [bigint] NOT NULL,
	[price] [numeric](6, 2) NULL,
	[insert_timestamp] [datetime] NOT NULL,
	[update_timestamp] [datetime] NOT NULL,
 CONSTRAINT [PK_tbl_conf_shopping_opt_default_gsp_idLicense] PRIMARY KEY CLUSTERED 
(
	[idLicense] ASC,
	[idSize] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF) 
) 

GO
/****** Object:  Table [dbo].[tbl_conf_size]    Script Date: 25/05/2012 00:51:43 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[tbl_conf_size](
	[idSize] [bigint] IDENTITY(7,1) NOT NULL,
	[code] [varchar](10) NULL,
	[maxSize] [bigint] NOT NULL,
	[insert_timestamp] [datetime] NOT NULL,
	[update_timestamp] [datetime] NOT NULL,
 CONSTRAINT [PK_tbl_conf_size_idSize] PRIMARY KEY CLUSTERED 
(
	[idSize] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF) 
) 

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[tbl_conf_ticket_status]    Script Date: 25/05/2012 00:51:43 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[tbl_conf_ticket_status](
	[idTicketStatus] [bigint] IDENTITY(4,1) NOT NULL,
	[name] [varchar](24) NOT NULL,
	[insert_timestamp] [datetime] NOT NULL,
	[update_timestamp] [datetime] NOT NULL,
 CONSTRAINT [PK_tbl_conf_ticket_status_idTicketStatus] PRIMARY KEY CLUSTERED 
(
	[idTicketStatus] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF) 
) 

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[tbl_conf_ticket_type]    Script Date: 25/05/2012 00:51:43 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[tbl_conf_ticket_type](
	[idTicketType] [bigint] IDENTITY(5,1) NOT NULL,
	[name] [varchar](24) NOT NULL,
	[insert_timestamp] [datetime] NOT NULL,
	[update_timestamp] [datetime] NOT NULL,
 CONSTRAINT [PK_tbl_conf_ticket_type_idTicketType] PRIMARY KEY CLUSTERED 
(
	[idTicketType] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF) 
) 

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[tbl_conf_transaction_type]    Script Date: 25/05/2012 00:51:43 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[tbl_conf_transaction_type](
	[idTransactionType] [bigint] IDENTITY(4,1) NOT NULL,
	[name] [varchar](24) NOT NULL,
	[insert_timestamp] [datetime] NOT NULL,
	[update_timestamp] [datetime] NOT NULL,
 CONSTRAINT [PK_tbl_conf_transaction_type_idTransactionType] PRIMARY KEY CLUSTERED 
(
	[idTransactionType] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF) 
) 

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[tbl_conf_user_profile]    Script Date: 25/05/2012 00:51:43 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[tbl_conf_user_profile](
	[idUserProfile] [bigint] IDENTITY(6,1) NOT NULL,
	[name] [varchar](50) NOT NULL,
	[multiplication_factor_sb] [numeric](2, 1) NOT NULL,
	[weight_review] [numeric](2, 1) NOT NULL,
	[insert_timestamp] [datetime] NOT NULL,
	[update_timestamp] [datetime] NOT NULL,
 CONSTRAINT [PK_tbl_conf_user_profile_idUserProfile] PRIMARY KEY CLUSTERED 
(
	[idUserProfile] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF) 
) 

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[tbl_conf_user_status]    Script Date: 25/05/2012 00:51:43 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[tbl_conf_user_status](
	[idUserStatus] [bigint] IDENTITY(5,1) NOT NULL,
	[name] [varchar](50) NOT NULL,
	[insert_timestamp] [datetime] NOT NULL,
	[update_timestamp] [datetime] NOT NULL,
 CONSTRAINT [PK_tbl_conf_user_status_idUserStatus] PRIMARY KEY CLUSTERED 
(
	[idUserStatus] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF) 
) 

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[tbl_contest]    Script Date: 25/05/2012 00:51:43 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[tbl_contest](
	[email] [varchar](255) NOT NULL,
	[idPhoto] [bigint] IDENTITY(1,1) NOT NULL,
	[insert_timestamp] [datetime] NOT NULL,
	[update_timestamp] [datetime] NOT NULL,
 CONSTRAINT [PK_tbl_contest_email] PRIMARY KEY CLUSTERED 
(
	[email] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF) ,
 CONSTRAINT [tbl_contest$idPhoto] UNIQUE NONCLUSTERED 
(
	[idPhoto] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF) 
) 

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[tbl_dictionary]    Script Date: 25/05/2012 00:51:43 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[tbl_dictionary](
	[keyword] [varchar](35) NOT NULL,
	[fromUser] [bigint] NOT NULL,
	[insert_timestamp] [datetime] NOT NULL,
	[update_timestamp] [datetime] NOT NULL,
 CONSTRAINT [PK_tbl_dictionary_keyword] PRIMARY KEY CLUSTERED 
(
	[keyword] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF) 
) 

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[tbl_equipments]    Script Date: 25/05/2012 00:51:43 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[tbl_equipments](
	[description] [varchar](35) NOT NULL,
	[fromUser] [bigint] NOT NULL,
	[insert_timestamp] [datetime] NOT NULL,
	[update_timestamp] [datetime] NOT NULL,
 CONSTRAINT [PK_tbl_equipments_description] PRIMARY KEY CLUSTERED 
(
	[description] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF) 
) 

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[tbl_error]    Script Date: 25/05/2012 00:51:43 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[tbl_error](
	[idError]   [bigint] IDENTITY(1,1) NOT NULL,
	[idSession] [bigint] NULL,
	[idTicket] [bigint] NULL,
	[message] [varchar](max) NULL,
	[type] [varchar](24) NULL,
	[filepath] [varchar](128) NULL,
	[line] [varchar](6) NULL,
	[trace] [varchar](max) NULL,
	[source] [varchar](max) NULL,
	[isAjaxRequest] [bigint] NOT NULL,
	[insert_timestamp] [datetime] NOT NULL
CONSTRAINT [PK_tbl_error_idError] PRIMARY KEY CLUSTERED 
(
	[idError] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF) 	
)  

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[tbl_ftp_account]    Script Date: 25/05/2012 00:51:43 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[tbl_ftp_account](
	[username] [varchar](15) NOT NULL,
	[password] [varchar](8) NOT NULL,
	[idUser] [bigint] NULL,
	[insert_timestamp] [datetime] NOT NULL,
	[update_timestamp] [datetime] NOT NULL,
 CONSTRAINT [PK_tbl_ftp_account_username] PRIMARY KEY CLUSTERED 
(
	[username] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF) 
) 

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[tbl_gsp_profit]    Script Date: 25/05/2012 00:51:43 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tbl_gsp_profit](
	[idProfit] [bigint] IDENTITY(1,1) NOT NULL,
	[idUser] [bigint] NOT NULL,
	[idTransaction] [bigint] NOT NULL,
	[idTransactionPhoto] [bigint] NULL,
	[amount] [numeric](6, 2) NOT NULL,
	[insert_timestamp] [datetime] NOT NULL,
	[update_timestamp] [datetime] NOT NULL,
 CONSTRAINT [PK_tbl_gsp_profit_idProfit] PRIMARY KEY CLUSTERED 
(
	[idProfit] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF) 
) 

GO
/****** Object:  Table [dbo].[tbl_keyword]    Script Date: 25/05/2012 00:51:43 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[tbl_keyword](
	[idProduct] [bigint] NOT NULL,
	[keyword] [varchar](35) NOT NULL,
	[insert_timestamp] [datetime] NOT NULL,
	[update_timestamp] [datetime] NOT NULL,
 CONSTRAINT [PK_tbl_keyword_idProduct] PRIMARY KEY CLUSTERED 
(
	[idProduct] ASC,
	[keyword] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF) 
) 

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[tbl_landing_page]    Script Date: 25/05/2012 00:51:43 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[tbl_landing_page](
	[email] [varchar](255) NOT NULL,
	[isPhotographer] [bigint] NOT NULL,
	[language] [varchar](2) NOT NULL,
	[localId] [varchar](7) NOT NULL,
	[verificationCode] [varchar](10) NOT NULL,
	[isVerified] [bigint] NOT NULL,
	[idUserProfile] [bigint] NOT NULL,
	[insert_timestamp] [datetime] NOT NULL,
	[update_timestamp] [datetime] NOT NULL,
 CONSTRAINT [PK_tbl_landing_page_email] PRIMARY KEY CLUSTERED 
(
	[email] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF) 
) 

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[tbl_log]    Script Date: 25/05/2012 00:51:43 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[tbl_log](
	[idLog] [bigint] IDENTITY(1,1) NOT NULL,
	[idSession] [bigint] NOT NULL,
	[level] [varchar](128) NOT NULL,
	[message] [varchar](max) NOT NULL,
	[log_timestamp] [datetime] NOT NULL,
 CONSTRAINT [PK_tbl_log_idLog] PRIMARY KEY CLUSTERED 
(
	[idLog] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF) 
)  

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[tbl_own_equipment]    Script Date: 25/05/2012 00:51:43 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[tbl_own_equipment](
	[idUser] [bigint] NOT NULL,
	[description] [varchar](35) NOT NULL,
	[insert_timestamp] [datetime] NOT NULL,
	[update_timestamp] [datetime] NOT NULL,
 CONSTRAINT [PK_tbl_own_equipment_idUser] PRIMARY KEY CLUSTERED 
(
	[idUser] ASC,
	[description] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF) 
) 

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[tbl_own_photo_equipment]    Script Date: 25/05/2012 00:51:43 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[tbl_own_photo_equipment](
	[idProduct] [bigint] NOT NULL,
	[description] [varchar](35) NOT NULL,
	[insert_timestamp] [datetime] NOT NULL,
	[update_timestamp] [datetime] NOT NULL,
 CONSTRAINT [PK_tbl_own_photo_equipment_idProduct] PRIMARY KEY CLUSTERED 
(
	[idProduct] ASC,
	[description] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF) 
) 

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[tbl_paypal_gsp_integration]    Script Date: 25/05/2012 00:51:43 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[tbl_paypal_gsp_integration](
	[token] [varchar](20) NOT NULL,
	[idTransaction] [int] NULL,
	[idCreditsPacket] [int] NULL,
	[idUser] [bigint] NOT NULL,
	[pi0Amt] [numeric](6, 2) NULL,
	[payerID] [varchar](20) NULL,
	[insert_timestamp] [datetime] NOT NULL,
	[update_timestamp] [datetime] NOT NULL,
 CONSTRAINT [PK_tbl_paypal_gsp_integration_token] PRIMARY KEY CLUSTERED 
(
	[token] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF) 
) 

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[tbl_paypal_transaction_failure]    Script Date: 25/05/2012 00:51:43 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[tbl_paypal_transaction_failure](
	[idPPTransaction] [bigint] NOT NULL,
	[idUser] [bigint] NOT NULL,
	[method] [varchar](50) NOT NULL,
	[token] [varchar](20) NULL,
	[correlationID] [varchar](20) NULL,
	[payerID] [varchar](20) NULL,
	[ppTimestamp] [varchar](50) NULL,
	[lErrorCode0] [varchar](10) NULL,
	[lShortMessage0] [varchar](50) NULL,
	[lLongMessage0] [varchar](max) NULL,
	[lSeverityCode0] [varchar](20) NULL,
	[insert_timestamp] [datetime] NOT NULL,
	[update_timestamp] [datetime] NOT NULL,
 CONSTRAINT [PK_tbl_paypal_transaction_failure_idPPTransaction] PRIMARY KEY CLUSTERED 
(
	[idPPTransaction] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF) ,
 CONSTRAINT [tbl_paypal_transaction_failure$idUser] UNIQUE NONCLUSTERED 
(
	[idUser] ASC,
	[method] ASC,
	[token] ASC,
	[correlationID] ASC,
	[payerID] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF) 
)  

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[tbl_paypal_transaction_final]    Script Date: 25/05/2012 00:51:43 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[tbl_paypal_transaction_final](
	[idPPTransaction] [bigint] NOT NULL,
	[idUser] [bigint] NOT NULL,
	[method] [varchar](50) NOT NULL,
	[token] [varchar](20) NULL,
	[correlationID] [varchar](20) NULL,
	[payerID] [varchar](20) NULL,
	[ack] [varchar](20) NULL,
	[successPageRedirectRequested] [varchar](150) NULL,
	[ppTimestamp] [varchar](50) NULL,
	[version] [varchar](5) NULL,
	[build] [varchar](10) NULL,
	[insuranceOptionSelected] [varchar](10) NULL,
	[shoppingOptionIsDefault] [varchar](10) NULL,
	[pi0TransactionID] [varchar](20) NULL,
	[pi0TransactionType] [varchar](20) NULL,
	[pi0PaymentType] [varchar](20) NULL,
	[pi0OrderType] [varchar](50) NULL,
	[pi0Amt] [numeric](6, 2) NULL,
	[pi0TaxAmt] [numeric](6, 2) NULL,
	[pi0CurrencyCode] [varchar](3) NULL,
	[pi0PaymentStatus] [varchar](20) NULL,
	[pi0PendingReason] [varchar](20) NULL,
	[pi0ReasonCode] [varchar](20) NULL,
	[pi0ProtectionElegibility] [varchar](20) NULL,
	[pi0ProtectionElegibilityType] [varchar](20) NULL,
	[pi0SecureMerchantAccountID] [varchar](20) NULL,
	[pi0ErrorCode] [varchar](20) NULL,
	[pi0Ack] [varchar](20) NULL,
	[insert_timestamp] [datetime] NOT NULL,
	[update_timestamp] [datetime] NOT NULL,
 CONSTRAINT [PK_tbl_paypal_transaction_final_idPPTransaction] PRIMARY KEY CLUSTERED 
(
	[idPPTransaction] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF) ,
 CONSTRAINT [tbl_paypal_transaction_final$idUser] UNIQUE NONCLUSTERED 
(
	[idUser] ASC,
	[method] ASC,
	[token] ASC,
	[correlationID] ASC,
	[payerID] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF) 
) 

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[tbl_paypal_transaction_flow]    Script Date: 25/05/2012 00:51:43 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[tbl_paypal_transaction_flow](
	[idPPTransaction] [bigint] IDENTITY(1,1) NOT NULL,
	[idUser] [bigint] NOT NULL,
	[method] [varchar](50) NOT NULL,
	[token] [varchar](20) NULL,
	[correlationID] [varchar](20) NULL,
	[payerID] [varchar](20) NULL,
	[ack] [varchar](20) NULL,
	[returnUrl] [varchar](150) NULL,
	[cancelUrl] [varchar](150) NULL,
	[version] [varchar](5) NULL,
	[build] [varchar](10) NULL,
	[checkOutStatus] [varchar](50) NULL,
	[pr0NotifyUrl] [varchar](150) NULL,
	[pr0CurrencyCode] [varchar](3) NULL,
	[pr0Amt] [numeric](6, 2) NULL,
	[pr0ItemAmt] [numeric](6, 2) NULL,
	[pr0TaxAmt] [numeric](6, 2) NULL,
	[pr0Desc] [varchar](50) NULL,
	[pr0PaymentAction] [varchar](20) NULL,
	[lpr0ItemCategory0] [varchar](20) NULL,
	[lpr0Name0] [varchar](150) NULL,
	[lpr0Number0] [numeric](6, 2) NULL,
	[lpr0Qty0] [int] NULL,
	[lpr0TaxAmt0] [numeric](6, 2) NULL,
	[lpr0Amt0] [numeric](6, 2) NULL,
	[lpr0Desc] [varchar](50) NULL,
	[landingPage] [varchar](50) NULL,
	[solutionType] [varchar](50) NULL,
	[ppTimestamp] [varchar](50) NULL,
	[insert_timestamp] [datetime] NOT NULL,
	[update_timestamp] [datetime] NOT NULL,
 CONSTRAINT [PK_tbl_paypal_transaction_flow_idPPTransaction] PRIMARY KEY CLUSTERED 
(
	[idPPTransaction] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF) ,
 CONSTRAINT [tbl_paypal_transaction_flow$idUser] UNIQUE NONCLUSTERED 
(
	[idUser] ASC,
	[method] ASC,
	[token] ASC,
	[correlationID] ASC,
	[payerID] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF) 
) 

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[tbl_paypal_transaction_people]    Script Date: 25/05/2012 00:51:43 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[tbl_paypal_transaction_people](
	[idPPTransaction] [bigint] NOT NULL,
	[idUser] [bigint] NOT NULL,
	[method] [varchar](50) NOT NULL,
	[token] [varchar](20) NULL,
	[correlationID] [varchar](20) NULL,
	[payerID] [varchar](20) NULL,
	[email] [varchar](100) NULL,
	[payerstatus] [varchar](20) NULL,
	[firstName] [varchar](50) NULL,
	[lastName] [varchar](50) NULL,
	[countryCode] [varchar](2) NULL,
	[currencyCode] [varchar](3) NULL,
	[amt] [numeric](6, 2) NULL,
	[itemAmt] [numeric](6, 2) NULL,
	[shippingAmt] [numeric](6, 2) NULL,
	[handlingAmt] [numeric](6, 2) NULL,
	[taxAmt] [numeric](6, 2) NULL,
	[desc] [varchar](50) NULL,
	[notifyurl] [varchar](150) NULL,
	[insuranceAmt] [numeric](6, 2) NULL,
	[shipdiscAmt] [numeric](6, 2) NULL,
	[lname0] [varchar](50) NULL,
	[lNumber0] [numeric](6, 2) NULL,
	[lQty0] [int] NULL,
	[lTaxAmt0] [numeric](6, 2) NULL,
	[lAmt0] [numeric](6, 2) NULL,
	[lDesc0] [varchar](50) NULL,
	[lItemWeightValue0] [varchar](50) NULL,
	[lItemLenghtValue0] [varchar](50) NULL,
	[lItemWidthValue0] [varchar](50) NULL,
	[lItemHeightValue0] [varchar](50) NULL,
	[lItemCategory0] [varchar](50) NULL,
	[pr0currencyCode] [varchar](3) NULL,
	[pr0Amt] [numeric](6, 2) NULL,
	[pr0ItemAmt] [numeric](6, 2) NULL,
	[pr0shippingAmt] [numeric](6, 2) NULL,
	[pr0handlingAmt] [numeric](6, 2) NULL,
	[pr0taxAmt] [numeric](6, 2) NULL,
	[pr0desc] [varchar](50) NULL,
	[pr0notifyurl] [varchar](150) NULL,
	[pr0insuranceAmt] [numeric](6, 2) NULL,
	[pr0shipDiscAmt] [numeric](6, 2) NULL,
	[pr0insuranceOptionOfferred] [varchar](10) NULL,
	[lpr0name0] [varchar](50) NULL,
	[lprNumber0] [numeric](6, 2) NULL,
	[lprQty0] [int] NULL,
	[lprTaxAmt0] [numeric](6, 2) NULL,
	[lprAmt0] [numeric](6, 2) NULL,
	[lprDesc0] [varchar](50) NULL,
	[lprItemWeightValue0] [varchar](50) NULL,
	[lprItemLenghtValue0] [varchar](50) NULL,
	[lprItemWidthValue0] [varchar](50) NULL,
	[lprItemHeightValue0] [varchar](50) NULL,
	[lprItemCategory0] [varchar](50) NULL,
	[pri0ErrorCode0] [varchar](10) NULL,
	[insert_timestamp] [datetime] NOT NULL,
	[update_timestamp] [datetime] NOT NULL,
 CONSTRAINT [PK_tbl_paypal_transaction_people_idPPTransaction] PRIMARY KEY CLUSTERED 
(
	[idPPTransaction] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF) ,
 CONSTRAINT [tbl_paypal_transaction_people$idUser] UNIQUE NONCLUSTERED 
(
	[idUser] ASC,
	[method] ASC,
	[token] ASC,
	[correlationID] ASC,
	[payerID] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF) 
) 

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[tbl_photo]    Script Date: 25/05/2012 00:51:43 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[tbl_photo](
	[idProduct] [bigint] NOT NULL,
	[idCategory1] [bigint] NOT NULL,
	[idCategory2] [bigint] NULL,
	[lat] [numeric](10, 6) NOT NULL,
	[lng] [numeric](10, 6) NOT NULL,
	[ratio] [numeric](6, 5) NOT NULL,
	[maxSize] [bigint] NOT NULL,
	[rate] [int] NULL,
	[nVotes] [bigint] NULL,
	[idPhotoType] [bigint] NOT NULL,
	[shootingDate] [datetime] NULL,
	[approvedDate] [datetime] NOT NULL,
	[isExclusive] [bigint] NOT NULL,
	[exposureTime] [varchar](10) NULL,
	[aperture] [varchar](10) NULL,
	[iso] [varchar](10) NULL,
	[histogram] [varchar](max) NULL,
	[insert_timestamp] [datetime] NOT NULL,
	[update_timestamp] [datetime] NOT NULL,
 CONSTRAINT [PK_tbl_photo_idProduct] PRIMARY KEY CLUSTERED 
(
	[idProduct] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF) 
)  

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[tbl_photo_pre_post]    Script Date: 25/05/2012 00:51:43 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[tbl_photo_pre_post](
	[idProduct] [bigint] NOT NULL,
	[idCategory1] [bigint] NULL,
	[idCategory2] [bigint] NULL,
	[lat] [numeric](10, 6) NULL,
	[lng] [numeric](10, 6) NULL,
	[ratio] [numeric](6, 5) NOT NULL,
	[maxSize] [bigint] NOT NULL,
	[rate] [int] NULL,
	[nVotes] [bigint] NULL,
	[idPhotoType] [bigint] NOT NULL,
	[shootingDate] [datetime] NULL,
	[approvedDate] [datetime] NULL,
	[isExclusive] [bigint] NOT NULL,
	[exposureTime] [varchar](10) NULL,
	[aperture] [varchar](10) NULL,
	[iso] [varchar](10) NULL,
	[histogram] [varchar](max) NULL,
	[insert_timestamp] [datetime] NOT NULL,
	[update_timestamp] [datetime] NOT NULL,
 CONSTRAINT [PK_tbl_photo_pre_post_idProduct] PRIMARY KEY CLUSTERED 
(
	[idProduct] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF) 
)  

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[tbl_photographer]    Script Date: 25/05/2012 00:51:43 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[tbl_photographer](
	[idUser] [bigint] NOT NULL,
	[numPhotos] [bigint] NOT NULL,
	[rate] [numeric](3, 2) NULL,
	[CVSummary] [varchar](max) NULL,
	[idCategory1] [bigint] NOT NULL,
	[idCategory2] [bigint] NOT NULL,
	[insert_timestamp] [datetime] NOT NULL,
	[update_timestamp] [datetime] NOT NULL,
 CONSTRAINT [PK_tbl_photographer_idUser] PRIMARY KEY CLUSTERED 
(
	[idUser] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF) 
) 

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[tbl_product]    Script Date: 25/05/2012 00:51:43 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[tbl_product](
	[idProduct] [bigint] NOT NULL,
	[idUser] [bigint] NOT NULL,
	[title] [varchar](64) NOT NULL,
	[description] [varchar](128) NULL,
	[insert_timestamp] [datetime] NOT NULL,
	[update_timestamp] [datetime] NOT NULL,
 CONSTRAINT [PK_tbl_product_idProduct] PRIMARY KEY CLUSTERED 
(
	[idProduct] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF) 
) 

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[tbl_product_pre_post]    Script Date: 25/05/2012 00:51:43 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[tbl_product_pre_post](
	[idProduct] [bigint] IDENTITY(1,1) NOT NULL,
	[idUser] [bigint] NOT NULL,
	[idProductStatus] [bigint] NOT NULL,
	[title] [varchar](64) NULL,
	[description] [varchar](128) NULL,
	[visits] [bigint] NOT NULL,
	[insert_timestamp] [datetime] NOT NULL,
	[update_timestamp] [datetime] NOT NULL,
 CONSTRAINT [PK_tbl_product_pre_post_idProduct] PRIMARY KEY CLUSTERED 
(
	[idProduct] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF) 
) 

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[tbl_review_motivations]    Script Date: 25/05/2012 00:51:43 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tbl_review_motivations](
	[idReview] [bigint] NOT NULL,
	[idMotivation] [bigint] NOT NULL,
	[insert_timestamp] [datetime] NOT NULL,
	[update_timestamp] [datetime] NOT NULL,
 CONSTRAINT [PK_tbl_review_motivations_idReview] PRIMARY KEY CLUSTERED 
(
	[idReview] ASC,
	[idMotivation] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF) 
) 

GO
/****** Object:  Table [dbo].[tbl_reviews]    Script Date: 25/05/2012 00:51:43 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tbl_reviews](
	[idReview] [bigint] IDENTITY(1,1) NOT NULL,
	[idProduct] [bigint] NOT NULL,
	[idUser] [bigint] NOT NULL,
	[rate] [int] NOT NULL,
	[reviewedPhoto] [int] NOT NULL,
	[updatedSB] [int] NOT NULL,
	[insert_timestamp] [datetime] NOT NULL,
	[update_timestamp] [datetime] NOT NULL,
 CONSTRAINT [PK_tbl_reviews_idReview] PRIMARY KEY CLUSTERED 
(
	[idReview] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF) ,
 CONSTRAINT [tbl_reviews$idProduct] UNIQUE NONCLUSTERED 
(
	[idProduct] ASC,
	[idUser] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF) 
) 

GO
/****** Object:  Table [dbo].[tbl_session]    Script Date: 25/05/2012 00:51:43 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[tbl_session](
	[idSession] [bigint] IDENTITY(1,1) NOT NULL,
	[route] [varchar](128) NOT NULL,
	[idUser] [bigint] NULL,
	[isAjaxRequest] [bigint] NULL,
	[insert_timestamp] [datetime] NOT NULL,
 CONSTRAINT [PK_tbl_session_idSession] PRIMARY KEY CLUSTERED 
(
	[idSession] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF) 
) 

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[tbl_shopping_cart]    Script Date: 25/05/2012 00:51:43 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tbl_shopping_cart](
	[idUser] [bigint] NOT NULL,
	[idProduct] [bigint] NOT NULL,
	[insert_timestamp] [datetime] NOT NULL,
	[update_timestamp] [datetime] NOT NULL,
 CONSTRAINT [PK_tbl_shopping_cart_idUser] PRIMARY KEY CLUSTERED 
(
	[idUser] ASC,
	[idProduct] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF) 
) 

GO
/****** Object:  Table [dbo].[tbl_shopping_opt_photo]    Script Date: 25/05/2012 00:51:43 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tbl_shopping_opt_photo](
	[idProduct] [bigint] NOT NULL,
	[idSize] [bigint] NOT NULL,
	[idLicense] [bigint] NOT NULL,
	[price] [numeric](6, 2) NOT NULL,
	[insert_timestamp] [datetime] NOT NULL,
	[update_timestamp] [datetime] NOT NULL,
 CONSTRAINT [PK_tbl_shopping_opt_photo_idProduct] PRIMARY KEY CLUSTERED 
(
	[idProduct] ASC,
	[idLicense] ASC,
	[idSize] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF) 
) 

GO
/****** Object:  Table [dbo].[tbl_shopping_opt_photo_rm]    Script Date: 25/05/2012 00:51:43 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tbl_shopping_opt_photo_rm](
	[idProduct] [bigint] NOT NULL,
	[idRMdetails] [bigint] NOT NULL,
	[idSize] [bigint] NOT NULL,
	[idDuration] [bigint] NOT NULL,
	[price] [numeric](6, 2) NOT NULL,
	[insert_timestamp] [datetime] NOT NULL,
	[update_timestamp] [datetime] NOT NULL,
 CONSTRAINT [PK_tbl_shopping_opt_photo_rm_idProduct] PRIMARY KEY CLUSTERED 
(
	[idProduct] ASC,
	[idRMdetails] ASC,
	[idSize] ASC,
	[idDuration] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF) 
) 

GO
/****** Object:  Table [dbo].[tbl_shopping_photo_type]    Script Date: 25/05/2012 00:51:43 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[tbl_shopping_photo_type](
	[idProduct] [bigint] NOT NULL,
	[licenseType] [varchar](30) NOT NULL,
	[insert_timestamp] [datetime] NOT NULL,
	[update_timestamp] [datetime] NOT NULL,
 CONSTRAINT [PK_tbl_shopping_photo_type_idProduct] PRIMARY KEY CLUSTERED 
(
	[idProduct] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF) 
) 

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[tbl_ticket]    Script Date: 25/05/2012 00:51:43 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[tbl_ticket](
	[idTicket] [bigint] IDENTITY(1,1) NOT NULL,
	[idUser] [bigint] NULL,
	[idProduct] [bigint] NULL,
	[idTicketType] [bigint] NOT NULL,
	[idTicketStatus] [bigint] NOT NULL,
	[sourceActor] [varchar](24) NOT NULL,
	[subject] [varchar](24) NOT NULL,
	[message] [varchar](max) NULL,
	[insert_timestamp] [datetime] NOT NULL,
	[update_timestamp] [datetime] NOT NULL,
 CONSTRAINT [PK_tbl_ticket_idTicket] PRIMARY KEY CLUSTERED 
(
	[idTicket] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF) 
) 

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[tbl_transaction]    Script Date: 25/05/2012 00:51:43 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tbl_transaction](
	[idTransaction] [bigint] IDENTITY(1,1) NOT NULL,
	[idTransactionType] [bigint] NOT NULL,
	[idUser] [bigint] NOT NULL,
	[total] [numeric](6, 2) NOT NULL,
	[pending] [bigint] NOT NULL,
	[insert_timestamp] [datetime] NOT NULL,
	[update_timestamp] [datetime] NOT NULL,
 CONSTRAINT [PK_tbl_transaction_idTransaction] PRIMARY KEY CLUSTERED 
(
	[idTransaction] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF) 
) 

GO
/****** Object:  Table [dbo].[tbl_transaction_photo]    Script Date: 25/05/2012 00:51:43 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[tbl_transaction_photo](
	[idTransactionPhoto] [bigint] IDENTITY(1,1) NOT NULL,
	[idTransaction] [bigint] NULL,
	[idProduct] [bigint] NULL,
	[licenseType] [varchar](30) NOT NULL,
	[insert_timestamp] [datetime] NOT NULL,
	[update_timestamp] [datetime] NOT NULL,
 CONSTRAINT [PK_tbl_transaction_photo_idTransactionPhoto] PRIMARY KEY CLUSTERED 
(
	[idTransactionPhoto] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF) ,
 CONSTRAINT [tbl_transaction_photo$idTransaction] UNIQUE NONCLUSTERED 
(
	[idTransaction] ASC,
	[idProduct] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF) 
) 

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[tbl_transaction_photo_rf]    Script Date: 25/05/2012 00:51:43 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tbl_transaction_photo_rf](
	[idTransactionPhoto] [bigint] NOT NULL,
	[idSize] [bigint] NOT NULL,
	[idLicense] [bigint] NOT NULL,
	[price] [numeric](6, 2) NOT NULL,
	[fee] [numeric](3, 2) NOT NULL,
	[insert_timestamp] [datetime] NOT NULL,
	[update_timestamp] [datetime] NOT NULL,
 CONSTRAINT [PK_tbl_transaction_photo_rf_idTransactionPhoto] PRIMARY KEY CLUSTERED 
(
	[idTransactionPhoto] ASC,
	[idSize] ASC,
	[idLicense] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF) 
) 

GO
/****** Object:  Table [dbo].[tbl_transaction_photo_rm]    Script Date: 25/05/2012 00:51:43 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tbl_transaction_photo_rm](
	[idTransactionPhoto] [bigint] NOT NULL,
	[idSize] [bigint] NOT NULL,
	[idRMdetails] [bigint] NOT NULL,
	[idDuration] [bigint] NOT NULL,
	[price] [numeric](6, 2) NOT NULL,
	[fee] [numeric](3, 2) NOT NULL,
	[insert_timestamp] [datetime] NOT NULL,
	[update_timestamp] [datetime] NOT NULL,
 CONSTRAINT [PK_tbl_transaction_photo_rm_idTransactionPhoto] PRIMARY KEY CLUSTERED 
(
	[idTransactionPhoto] ASC,
	[idSize] ASC,
	[idRMdetails] ASC,
	[idDuration] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF) 
) 

GO
/****** Object:  Table [dbo].[tbl_user]    Script Date: 25/05/2012 00:51:43 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[tbl_user](
	[idUser] [bigint] IDENTITY(5,1) NOT NULL,
	[idUserStatus] [bigint] NOT NULL,
	[idUserProfile] [bigint] NOT NULL,
	[idLanguage] [varchar](2) NOT NULL,
	[username] [varchar](32) NOT NULL,
	[password] [varchar](512) NOT NULL,
	[challenge] [varchar](512) NULL,
	[email] [varchar](255) NOT NULL,
	[name] [varchar](32) NULL,
	[surname] [varchar](32) NULL,
	[fee] [numeric](3, 2) NOT NULL,
	[creditsBought] [numeric](6, 2) NOT NULL,
	[creditsEarned] [numeric](6, 2) NOT NULL,
	[submitBonus] [int] NOT NULL,
	[photoProfile] [bigint] NOT NULL,
	[lat] [numeric](10, 6) NULL,
	[lng] [numeric](10, 6) NULL,
	[street] [varchar](64) NULL,
	[zip] [varchar](16) NULL,
	[town] [varchar](30) NULL,
	[region] [varchar](30) NULL,
	[country] [varchar](30) NULL,
	[phone1] [varchar](32) NULL,
	[phone2] [varchar](32) NULL,
	[mobilePhone] [varchar](32) NULL,
	[verificationCode] [varchar](10) NOT NULL,
	[mailingList] [bigint] NOT NULL,
	[acceptTerms] [bigint] NOT NULL,
	[fbUserId] [bigint] NULL,
	[fbCode] [varchar](512) NULL,
	[fbAccessToken] [varchar](512) NULL,
	[insert_timestamp] [datetime] NOT NULL,
	[update_timestamp] [datetime] NOT NULL,
	[lastLogin_timestamp] [datetime] NOT NULL,
	[nextBonusUpdate_timestamp] [datetime] NOT NULL,
 CONSTRAINT [PK_tbl_user_idUser] PRIMARY KEY CLUSTERED 
(
	[idUser] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF) ,
 CONSTRAINT [tbl_user$email] UNIQUE NONCLUSTERED 
(
	[email] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF) ,
 CONSTRAINT [tbl_user$username] UNIQUE NONCLUSTERED 
(
	[username] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF) 
) 

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[YiiSession]    Script Date: 25/05/2012 00:51:43 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[YiiSession](
	[id] [char](32) NOT NULL,
	[expire] [int] NULL,
	[data] [text] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF) 
)  

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Index [idPhotoType]    Script Date: 25/05/2012 00:51:43 ******/
CREATE NONCLUSTERED INDEX [idPhotoType] ON [dbo].[tbl_conf_category]
(
	[idPhotoType] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, DROP_EXISTING = OFF, ONLINE = OFF) 
GO
SET ANSI_PADDING ON

GO
/****** Object:  Index [licenseType]    Script Date: 25/05/2012 00:51:43 ******/
CREATE NONCLUSTERED INDEX [licenseType] ON [dbo].[tbl_conf_license]
(
	[licenseType] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, DROP_EXISTING = OFF, ONLINE = OFF) 
GO
/****** Object:  Index [idRMtype]    Script Date: 25/05/2012 00:51:43 ******/
CREATE NONCLUSTERED INDEX [idRMtype] ON [dbo].[tbl_conf_license_rm_details]
(
	[idRMtype] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, DROP_EXISTING = OFF, ONLINE = OFF) 
GO
/****** Object:  Index [idSize]    Script Date: 25/05/2012 00:51:43 ******/
CREATE NONCLUSTERED INDEX [idSize] ON [dbo].[tbl_conf_shopping_opt_default_gsp]
(
	[idSize] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, DROP_EXISTING = OFF, ONLINE = OFF) 
GO
/****** Object:  Index [idSession]    Script Date: 25/05/2012 00:51:43 ******/
CREATE NONCLUSTERED INDEX [idSession] ON [dbo].[tbl_error]
(
	[idSession] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, DROP_EXISTING = OFF, ONLINE = OFF) 
GO
/****** Object:  Index [idTicket]    Script Date: 25/05/2012 00:51:43 ******/
CREATE NONCLUSTERED INDEX [idTicket] ON [dbo].[tbl_error]
(
	[idTicket] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, DROP_EXISTING = OFF, ONLINE = OFF) 
GO
/****** Object:  Index [idTransaction]    Script Date: 25/05/2012 00:51:43 ******/
CREATE NONCLUSTERED INDEX [idTransaction] ON [dbo].[tbl_gsp_profit]
(
	[idTransaction] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, DROP_EXISTING = OFF, ONLINE = OFF) 
GO
/****** Object:  Index [idTransactionPhoto]    Script Date: 25/05/2012 00:51:43 ******/
CREATE NONCLUSTERED INDEX [idTransactionPhoto] ON [dbo].[tbl_gsp_profit]
(
	[idTransactionPhoto] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, DROP_EXISTING = OFF, ONLINE = OFF) 
GO
/****** Object:  Index [idUser]    Script Date: 25/05/2012 00:51:43 ******/
CREATE NONCLUSTERED INDEX [idUser] ON [dbo].[tbl_gsp_profit]
(
	[idUser] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, DROP_EXISTING = OFF, ONLINE = OFF) 
GO
SET ANSI_PADDING ON

GO
/****** Object:  Index [keyword]    Script Date: 25/05/2012 00:51:43 ******/
CREATE NONCLUSTERED INDEX [keyword] ON [dbo].[tbl_keyword]
(
	[keyword] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, DROP_EXISTING = OFF, ONLINE = OFF) 
GO
/****** Object:  Index [idUserProfile]    Script Date: 25/05/2012 00:51:43 ******/
CREATE NONCLUSTERED INDEX [idUserProfile] ON [dbo].[tbl_landing_page]
(
	[idUserProfile] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, DROP_EXISTING = OFF, ONLINE = OFF) 
GO
/****** Object:  Index [idSession]    Script Date: 25/05/2012 00:51:43 ******/
CREATE NONCLUSTERED INDEX [idSession] ON [dbo].[tbl_log]
(
	[idSession] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, DROP_EXISTING = OFF, ONLINE = OFF) 
GO
SET ANSI_PADDING ON

GO
/****** Object:  Index [description]    Script Date: 25/05/2012 00:51:43 ******/
CREATE NONCLUSTERED INDEX [description] ON [dbo].[tbl_own_equipment]
(
	[description] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, DROP_EXISTING = OFF, ONLINE = OFF) 
GO
SET ANSI_PADDING ON

GO
/****** Object:  Index [description]    Script Date: 25/05/2012 00:51:43 ******/
CREATE NONCLUSTERED INDEX [description] ON [dbo].[tbl_own_photo_equipment]
(
	[description] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, DROP_EXISTING = OFF, ONLINE = OFF) 
GO
/****** Object:  Index [idUser]    Script Date: 25/05/2012 00:51:43 ******/
CREATE NONCLUSTERED INDEX [idUser] ON [dbo].[tbl_paypal_gsp_integration]
(
	[idUser] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, DROP_EXISTING = OFF, ONLINE = OFF) 
GO
/****** Object:  Index [idCategory1]    Script Date: 25/05/2012 00:51:43 ******/
CREATE NONCLUSTERED INDEX [idCategory1] ON [dbo].[tbl_photo]
(
	[idCategory1] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, DROP_EXISTING = OFF, ONLINE = OFF) 
GO
/****** Object:  Index [idCategory2]    Script Date: 25/05/2012 00:51:43 ******/
CREATE NONCLUSTERED INDEX [idCategory2] ON [dbo].[tbl_photo]
(
	[idCategory2] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, DROP_EXISTING = OFF, ONLINE = OFF) 
GO
/****** Object:  Index [idPhotoType]    Script Date: 25/05/2012 00:51:43 ******/
CREATE NONCLUSTERED INDEX [idPhotoType] ON [dbo].[tbl_photo]
(
	[idPhotoType] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, DROP_EXISTING = OFF, ONLINE = OFF) 
GO
/****** Object:  Index [idCategory1]    Script Date: 25/05/2012 00:51:43 ******/
CREATE NONCLUSTERED INDEX [idCategory1] ON [dbo].[tbl_photo_pre_post]
(
	[idCategory1] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, DROP_EXISTING = OFF, ONLINE = OFF) 
GO
/****** Object:  Index [idCategory2]    Script Date: 25/05/2012 00:51:43 ******/
CREATE NONCLUSTERED INDEX [idCategory2] ON [dbo].[tbl_photo_pre_post]
(
	[idCategory2] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, DROP_EXISTING = OFF, ONLINE = OFF) 
GO
/****** Object:  Index [idPhotoType]    Script Date: 25/05/2012 00:51:43 ******/
CREATE NONCLUSTERED INDEX [idPhotoType] ON [dbo].[tbl_photo_pre_post]
(
	[idPhotoType] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, DROP_EXISTING = OFF, ONLINE = OFF) 
GO
/****** Object:  Index [idCategory1]    Script Date: 25/05/2012 00:51:43 ******/
CREATE NONCLUSTERED INDEX [idCategory1] ON [dbo].[tbl_photographer]
(
	[idCategory1] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, DROP_EXISTING = OFF, ONLINE = OFF) 
GO
/****** Object:  Index [idCategory2]    Script Date: 25/05/2012 00:51:43 ******/
CREATE NONCLUSTERED INDEX [idCategory2] ON [dbo].[tbl_photographer]
(
	[idCategory2] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, DROP_EXISTING = OFF, ONLINE = OFF) 
GO
/****** Object:  Index [idUser]    Script Date: 25/05/2012 00:51:43 ******/
CREATE NONCLUSTERED INDEX [idUser] ON [dbo].[tbl_product]
(
	[idUser] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, DROP_EXISTING = OFF, ONLINE = OFF) 
GO
/****** Object:  Index [idProductStatus]    Script Date: 25/05/2012 00:51:43 ******/
CREATE NONCLUSTERED INDEX [idProductStatus] ON [dbo].[tbl_product_pre_post]
(
	[idProductStatus] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, DROP_EXISTING = OFF, ONLINE = OFF) 
GO
/****** Object:  Index [idUser]    Script Date: 25/05/2012 00:51:43 ******/
CREATE NONCLUSTERED INDEX [idUser] ON [dbo].[tbl_product_pre_post]
(
	[idUser] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, DROP_EXISTING = OFF, ONLINE = OFF) 
GO
/****** Object:  Index [idMotivation]    Script Date: 25/05/2012 00:51:43 ******/
CREATE NONCLUSTERED INDEX [idMotivation] ON [dbo].[tbl_review_motivations]
(
	[idMotivation] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, DROP_EXISTING = OFF, ONLINE = OFF) 
GO
/****** Object:  Index [idUser]    Script Date: 25/05/2012 00:51:43 ******/
CREATE NONCLUSTERED INDEX [idUser] ON [dbo].[tbl_reviews]
(
	[idUser] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, DROP_EXISTING = OFF, ONLINE = OFF) 
GO
/****** Object:  Index [idUser]    Script Date: 25/05/2012 00:51:43 ******/
CREATE NONCLUSTERED INDEX [idUser] ON [dbo].[tbl_session]
(
	[idUser] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, DROP_EXISTING = OFF, ONLINE = OFF) 
GO
/****** Object:  Index [idProduct]    Script Date: 25/05/2012 00:51:43 ******/
CREATE NONCLUSTERED INDEX [idProduct] ON [dbo].[tbl_shopping_cart]
(
	[idProduct] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, DROP_EXISTING = OFF, ONLINE = OFF) 
GO
/****** Object:  Index [idLicense]    Script Date: 25/05/2012 00:51:43 ******/
CREATE NONCLUSTERED INDEX [idLicense] ON [dbo].[tbl_shopping_opt_photo]
(
	[idLicense] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, DROP_EXISTING = OFF, ONLINE = OFF) 
GO
/****** Object:  Index [idSize]    Script Date: 25/05/2012 00:51:43 ******/
CREATE NONCLUSTERED INDEX [idSize] ON [dbo].[tbl_shopping_opt_photo]
(
	[idSize] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, DROP_EXISTING = OFF, ONLINE = OFF) 
GO
/****** Object:  Index [idDuration]    Script Date: 25/05/2012 00:51:43 ******/
CREATE NONCLUSTERED INDEX [idDuration] ON [dbo].[tbl_shopping_opt_photo_rm]
(
	[idDuration] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, DROP_EXISTING = OFF, ONLINE = OFF) 
GO
/****** Object:  Index [idRMdetails]    Script Date: 25/05/2012 00:51:43 ******/
CREATE NONCLUSTERED INDEX [idRMdetails] ON [dbo].[tbl_shopping_opt_photo_rm]
(
	[idRMdetails] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, DROP_EXISTING = OFF, ONLINE = OFF) 
GO
/****** Object:  Index [idSize]    Script Date: 25/05/2012 00:51:43 ******/
CREATE NONCLUSTERED INDEX [idSize] ON [dbo].[tbl_shopping_opt_photo_rm]
(
	[idSize] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, DROP_EXISTING = OFF, ONLINE = OFF) 
GO
SET ANSI_PADDING ON

GO
/****** Object:  Index [licenseType]    Script Date: 25/05/2012 00:51:43 ******/
CREATE NONCLUSTERED INDEX [licenseType] ON [dbo].[tbl_shopping_photo_type]
(
	[licenseType] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, DROP_EXISTING = OFF, ONLINE = OFF) 
GO
/****** Object:  Index [idProduct]    Script Date: 25/05/2012 00:51:43 ******/
CREATE NONCLUSTERED INDEX [idProduct] ON [dbo].[tbl_ticket]
(
	[idProduct] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, DROP_EXISTING = OFF, ONLINE = OFF) 
GO
/****** Object:  Index [idTicketStatus]    Script Date: 25/05/2012 00:51:43 ******/
CREATE NONCLUSTERED INDEX [idTicketStatus] ON [dbo].[tbl_ticket]
(
	[idTicketStatus] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, DROP_EXISTING = OFF, ONLINE = OFF) 
GO
/****** Object:  Index [idTicketType]    Script Date: 25/05/2012 00:51:43 ******/
CREATE NONCLUSTERED INDEX [idTicketType] ON [dbo].[tbl_ticket]
(
	[idTicketType] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, DROP_EXISTING = OFF, ONLINE = OFF) 
GO
/****** Object:  Index [idUser]    Script Date: 25/05/2012 00:51:43 ******/
CREATE NONCLUSTERED INDEX [idUser] ON [dbo].[tbl_ticket]
(
	[idUser] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, DROP_EXISTING = OFF, ONLINE = OFF) 
GO
/****** Object:  Index [idTransactionType]    Script Date: 25/05/2012 00:51:43 ******/
CREATE NONCLUSTERED INDEX [idTransactionType] ON [dbo].[tbl_transaction]
(
	[idTransactionType] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, DROP_EXISTING = OFF, ONLINE = OFF) 
GO
/****** Object:  Index [idUser]    Script Date: 25/05/2012 00:51:43 ******/
CREATE NONCLUSTERED INDEX [idUser] ON [dbo].[tbl_transaction]
(
	[idUser] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, DROP_EXISTING = OFF, ONLINE = OFF) 
GO
/****** Object:  Index [idProduct]    Script Date: 25/05/2012 00:51:43 ******/
CREATE NONCLUSTERED INDEX [idProduct] ON [dbo].[tbl_transaction_photo]
(
	[idProduct] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, DROP_EXISTING = OFF, ONLINE = OFF) 
GO
SET ANSI_PADDING ON

GO
/****** Object:  Index [licenseType]    Script Date: 25/05/2012 00:51:43 ******/
CREATE NONCLUSTERED INDEX [licenseType] ON [dbo].[tbl_transaction_photo]
(
	[licenseType] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, DROP_EXISTING = OFF, ONLINE = OFF) 
GO
/****** Object:  Index [idLicense]    Script Date: 25/05/2012 00:51:43 ******/
CREATE NONCLUSTERED INDEX [idLicense] ON [dbo].[tbl_transaction_photo_rf]
(
	[idLicense] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, DROP_EXISTING = OFF, ONLINE = OFF) 
GO
/****** Object:  Index [idSize]    Script Date: 25/05/2012 00:51:43 ******/
CREATE NONCLUSTERED INDEX [idSize] ON [dbo].[tbl_transaction_photo_rf]
(
	[idSize] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, DROP_EXISTING = OFF, ONLINE = OFF) 
GO
/****** Object:  Index [idDuration]    Script Date: 25/05/2012 00:51:43 ******/
CREATE NONCLUSTERED INDEX [idDuration] ON [dbo].[tbl_transaction_photo_rm]
(
	[idDuration] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, DROP_EXISTING = OFF, ONLINE = OFF) 
GO
/****** Object:  Index [idRMdetails]    Script Date: 25/05/2012 00:51:43 ******/
CREATE NONCLUSTERED INDEX [idRMdetails] ON [dbo].[tbl_transaction_photo_rm]
(
	[idRMdetails] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, DROP_EXISTING = OFF, ONLINE = OFF) 
GO
/****** Object:  Index [idSize]    Script Date: 25/05/2012 00:51:43 ******/
CREATE NONCLUSTERED INDEX [idSize] ON [dbo].[tbl_transaction_photo_rm]
(
	[idSize] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, DROP_EXISTING = OFF, ONLINE = OFF) 
GO
SET ANSI_PADDING ON

GO
/****** Object:  Index [idLanguage]    Script Date: 25/05/2012 00:51:43 ******/
CREATE NONCLUSTERED INDEX [idLanguage] ON [dbo].[tbl_user]
(
	[idLanguage] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, DROP_EXISTING = OFF, ONLINE = OFF) 
GO
/****** Object:  Index [idUserProfile]    Script Date: 25/05/2012 00:51:43 ******/
CREATE NONCLUSTERED INDEX [idUserProfile] ON [dbo].[tbl_user]
(
	[idUserProfile] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, DROP_EXISTING = OFF, ONLINE = OFF) 
GO
/****** Object:  Index [idUserStatus]    Script Date: 25/05/2012 00:51:43 ******/
CREATE NONCLUSTERED INDEX [idUserStatus] ON [dbo].[tbl_user]
(
	[idUserStatus] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, DROP_EXISTING = OFF, ONLINE = OFF) 
GO
ALTER TABLE [dbo].[tbl_conf_buy_credits] ADD  DEFAULT (getdate()) FOR [insert_timestamp]
GO
ALTER TABLE [dbo].[tbl_conf_buy_credits] ADD  DEFAULT (getdate()) FOR [update_timestamp]
GO
ALTER TABLE [dbo].[tbl_conf_category] ADD  DEFAULT (getdate()) FOR [insert_timestamp]
GO
ALTER TABLE [dbo].[tbl_conf_category] ADD  DEFAULT (getdate()) FOR [update_timestamp]
GO
ALTER TABLE [dbo].[tbl_conf_duration_rm] ADD  DEFAULT (NULL) FOR [duration]
GO
ALTER TABLE [dbo].[tbl_conf_duration_rm] ADD  DEFAULT (getdate()) FOR [insert_timestamp]
GO
ALTER TABLE [dbo].[tbl_conf_duration_rm] ADD  DEFAULT (getdate()) FOR [update_timestamp]
GO
ALTER TABLE [dbo].[tbl_conf_language] ADD  DEFAULT (getdate()) FOR [insert_timestamp]
GO
ALTER TABLE [dbo].[tbl_conf_language] ADD  DEFAULT (getdate()) FOR [update_timestamp]
GO
ALTER TABLE [dbo].[tbl_conf_license] ADD  DEFAULT (NULL) FOR [name]
GO
ALTER TABLE [dbo].[tbl_conf_license] ADD  DEFAULT (getdate()) FOR [insert_timestamp]
GO
ALTER TABLE [dbo].[tbl_conf_license] ADD  DEFAULT (getdate()) FOR [update_timestamp]
GO
ALTER TABLE [dbo].[tbl_conf_license_rm_details] ADD  DEFAULT (NULL) FOR [nameRMdetails]
GO
ALTER TABLE [dbo].[tbl_conf_license_rm_details] ADD  DEFAULT (NULL) FOR [idRMtype]
GO
ALTER TABLE [dbo].[tbl_conf_license_rm_details] ADD  DEFAULT (getdate()) FOR [insert_timestamp]
GO
ALTER TABLE [dbo].[tbl_conf_license_rm_details] ADD  DEFAULT (getdate()) FOR [update_timestamp]
GO
ALTER TABLE [dbo].[tbl_conf_license_rm_type] ADD  DEFAULT (NULL) FOR [nameRMtype]
GO
ALTER TABLE [dbo].[tbl_conf_license_rm_type] ADD  DEFAULT (getdate()) FOR [insert_timestamp]
GO
ALTER TABLE [dbo].[tbl_conf_license_rm_type] ADD  DEFAULT (getdate()) FOR [update_timestamp]
GO
ALTER TABLE [dbo].[tbl_conf_license_type] ADD  DEFAULT (getdate()) FOR [insert_timestamp]
GO
ALTER TABLE [dbo].[tbl_conf_license_type] ADD  DEFAULT (getdate()) FOR [update_timestamp]
GO
ALTER TABLE [dbo].[tbl_conf_parameters] ADD  DEFAULT (getdate()) FOR [insert_timestamp]
GO
ALTER TABLE [dbo].[tbl_conf_parameters] ADD  DEFAULT (getdate()) FOR [update_timestamp]
GO
ALTER TABLE [dbo].[tbl_conf_paypal] ADD  DEFAULT (getdate()) FOR [insert_timestamp]
GO
ALTER TABLE [dbo].[tbl_conf_paypal] ADD  DEFAULT (getdate()) FOR [update_timestamp]
GO
ALTER TABLE [dbo].[tbl_conf_photo_type] ADD  DEFAULT (getdate()) FOR [insert_timestamp]
GO
ALTER TABLE [dbo].[tbl_conf_photo_type] ADD  DEFAULT (getdate()) FOR [update_timestamp]
GO
ALTER TABLE [dbo].[tbl_conf_product_status] ADD  DEFAULT (getdate()) FOR [insert_timestamp]
GO
ALTER TABLE [dbo].[tbl_conf_product_status] ADD  DEFAULT (getdate()) FOR [update_timestamp]
GO
ALTER TABLE [dbo].[tbl_conf_review_motivations] ADD  DEFAULT (getdate()) FOR [insert_timestamp]
GO
ALTER TABLE [dbo].[tbl_conf_review_motivations] ADD  DEFAULT (getdate()) FOR [update_timestamp]
GO
ALTER TABLE [dbo].[tbl_conf_shopping_opt_default_gsp] ADD  DEFAULT ((0)) FOR [idLicense]
GO
ALTER TABLE [dbo].[tbl_conf_shopping_opt_default_gsp] ADD  DEFAULT ((0)) FOR [idSize]
GO
ALTER TABLE [dbo].[tbl_conf_shopping_opt_default_gsp] ADD  DEFAULT (NULL) FOR [price]
GO
ALTER TABLE [dbo].[tbl_conf_shopping_opt_default_gsp] ADD  DEFAULT (getdate()) FOR [insert_timestamp]
GO
ALTER TABLE [dbo].[tbl_conf_shopping_opt_default_gsp] ADD  DEFAULT (getdate()) FOR [update_timestamp]
GO
ALTER TABLE [dbo].[tbl_conf_size] ADD  DEFAULT (NULL) FOR [code]
GO
ALTER TABLE [dbo].[tbl_conf_size] ADD  DEFAULT (getdate()) FOR [insert_timestamp]
GO
ALTER TABLE [dbo].[tbl_conf_size] ADD  DEFAULT (getdate()) FOR [update_timestamp]
GO
ALTER TABLE [dbo].[tbl_conf_ticket_status] ADD  DEFAULT (getdate()) FOR [insert_timestamp]
GO
ALTER TABLE [dbo].[tbl_conf_ticket_status] ADD  DEFAULT (getdate()) FOR [update_timestamp]
GO
ALTER TABLE [dbo].[tbl_conf_ticket_type] ADD  DEFAULT (getdate()) FOR [insert_timestamp]
GO
ALTER TABLE [dbo].[tbl_conf_ticket_type] ADD  DEFAULT (getdate()) FOR [update_timestamp]
GO
ALTER TABLE [dbo].[tbl_conf_transaction_type] ADD  DEFAULT (getdate()) FOR [insert_timestamp]
GO
ALTER TABLE [dbo].[tbl_conf_transaction_type] ADD  DEFAULT (getdate()) FOR [update_timestamp]
GO
ALTER TABLE [dbo].[tbl_conf_user_profile] ADD  DEFAULT (getdate()) FOR [insert_timestamp]
GO
ALTER TABLE [dbo].[tbl_conf_user_profile] ADD  DEFAULT (getdate()) FOR [update_timestamp]
GO
ALTER TABLE [dbo].[tbl_conf_user_status] ADD  DEFAULT (getdate()) FOR [insert_timestamp]
GO
ALTER TABLE [dbo].[tbl_conf_user_status] ADD  DEFAULT (getdate()) FOR [update_timestamp]
GO
ALTER TABLE [dbo].[tbl_contest] ADD  DEFAULT (getdate()) FOR [insert_timestamp]
GO
ALTER TABLE [dbo].[tbl_contest] ADD  DEFAULT (getdate()) FOR [update_timestamp]
GO
ALTER TABLE [dbo].[tbl_dictionary] ADD  DEFAULT ((0)) FOR [fromUser]
GO
ALTER TABLE [dbo].[tbl_dictionary] ADD  DEFAULT (getdate()) FOR [insert_timestamp]
GO
ALTER TABLE [dbo].[tbl_dictionary] ADD  DEFAULT (getdate()) FOR [update_timestamp]
GO
ALTER TABLE [dbo].[tbl_equipments] ADD  DEFAULT ((0)) FOR [fromUser]
GO
ALTER TABLE [dbo].[tbl_equipments] ADD  DEFAULT (getdate()) FOR [insert_timestamp]
GO
ALTER TABLE [dbo].[tbl_equipments] ADD  DEFAULT (getdate()) FOR [update_timestamp]
GO
ALTER TABLE [dbo].[tbl_error] ADD  DEFAULT (NULL) FOR [idSession]
GO
ALTER TABLE [dbo].[tbl_error] ADD  DEFAULT (NULL) FOR [idTicket]
GO
ALTER TABLE [dbo].[tbl_error] ADD  DEFAULT (NULL) FOR [type]
GO
ALTER TABLE [dbo].[tbl_error] ADD  DEFAULT (NULL) FOR [filepath]
GO
ALTER TABLE [dbo].[tbl_error] ADD  DEFAULT (NULL) FOR [line]
GO
ALTER TABLE [dbo].[tbl_error] ADD  DEFAULT ((0)) FOR [isAjaxRequest]
GO
ALTER TABLE [dbo].[tbl_error] ADD  DEFAULT (getdate()) FOR [insert_timestamp]
GO
ALTER TABLE [dbo].[tbl_ftp_account] ADD  DEFAULT (NULL) FOR [idUser]
GO
ALTER TABLE [dbo].[tbl_ftp_account] ADD  DEFAULT (getdate()) FOR [insert_timestamp]
GO
ALTER TABLE [dbo].[tbl_ftp_account] ADD  DEFAULT (getdate()) FOR [update_timestamp]
GO
ALTER TABLE [dbo].[tbl_gsp_profit] ADD  DEFAULT (NULL) FOR [idTransactionPhoto]
GO
ALTER TABLE [dbo].[tbl_gsp_profit] ADD  DEFAULT (getdate()) FOR [insert_timestamp]
GO
ALTER TABLE [dbo].[tbl_gsp_profit] ADD  DEFAULT (getdate()) FOR [update_timestamp]
GO
ALTER TABLE [dbo].[tbl_keyword] ADD  DEFAULT ((0)) FOR [idProduct]
GO
ALTER TABLE [dbo].[tbl_keyword] ADD  DEFAULT (N'') FOR [keyword]
GO
ALTER TABLE [dbo].[tbl_keyword] ADD  DEFAULT (getdate()) FOR [insert_timestamp]
GO
ALTER TABLE [dbo].[tbl_keyword] ADD  DEFAULT (getdate()) FOR [update_timestamp]
GO
ALTER TABLE [dbo].[tbl_landing_page] ADD  DEFAULT ((0)) FOR [isPhotographer]
GO
ALTER TABLE [dbo].[tbl_landing_page] ADD  DEFAULT (N'en') FOR [language]
GO
ALTER TABLE [dbo].[tbl_landing_page] ADD  DEFAULT (N'en_en') FOR [localId]
GO
ALTER TABLE [dbo].[tbl_landing_page] ADD  DEFAULT ((0)) FOR [isVerified]
GO
ALTER TABLE [dbo].[tbl_landing_page] ADD  DEFAULT (getdate()) FOR [insert_timestamp]
GO
ALTER TABLE [dbo].[tbl_landing_page] ADD  DEFAULT (getdate()) FOR [update_timestamp]
GO
ALTER TABLE [dbo].[tbl_log] ADD  DEFAULT (getdate()) FOR [log_timestamp]
GO
ALTER TABLE [dbo].[tbl_own_equipment] ADD  DEFAULT ((0)) FOR [idUser]
GO
ALTER TABLE [dbo].[tbl_own_equipment] ADD  DEFAULT (N'') FOR [description]
GO
ALTER TABLE [dbo].[tbl_own_equipment] ADD  DEFAULT (getdate()) FOR [insert_timestamp]
GO
ALTER TABLE [dbo].[tbl_own_equipment] ADD  DEFAULT (getdate()) FOR [update_timestamp]
GO
ALTER TABLE [dbo].[tbl_own_photo_equipment] ADD  DEFAULT ((0)) FOR [idProduct]
GO
ALTER TABLE [dbo].[tbl_own_photo_equipment] ADD  DEFAULT (N'') FOR [description]
GO
ALTER TABLE [dbo].[tbl_own_photo_equipment] ADD  DEFAULT (getdate()) FOR [insert_timestamp]
GO
ALTER TABLE [dbo].[tbl_own_photo_equipment] ADD  DEFAULT (getdate()) FOR [update_timestamp]
GO
ALTER TABLE [dbo].[tbl_paypal_gsp_integration] ADD  DEFAULT (NULL) FOR [idTransaction]
GO
ALTER TABLE [dbo].[tbl_paypal_gsp_integration] ADD  DEFAULT (NULL) FOR [idCreditsPacket]
GO
ALTER TABLE [dbo].[tbl_paypal_gsp_integration] ADD  DEFAULT (NULL) FOR [pi0Amt]
GO
ALTER TABLE [dbo].[tbl_paypal_gsp_integration] ADD  DEFAULT (NULL) FOR [payerID]
GO
ALTER TABLE [dbo].[tbl_paypal_gsp_integration] ADD  DEFAULT (getdate()) FOR [insert_timestamp]
GO
ALTER TABLE [dbo].[tbl_paypal_gsp_integration] ADD  DEFAULT (getdate()) FOR [update_timestamp]
GO
ALTER TABLE [dbo].[tbl_paypal_transaction_failure] ADD  DEFAULT (NULL) FOR [token]
GO
ALTER TABLE [dbo].[tbl_paypal_transaction_failure] ADD  DEFAULT (NULL) FOR [correlationID]
GO
ALTER TABLE [dbo].[tbl_paypal_transaction_failure] ADD  DEFAULT (NULL) FOR [payerID]
GO
ALTER TABLE [dbo].[tbl_paypal_transaction_failure] ADD  DEFAULT (NULL) FOR [ppTimestamp]
GO
ALTER TABLE [dbo].[tbl_paypal_transaction_failure] ADD  DEFAULT (NULL) FOR [lErrorCode0]
GO
ALTER TABLE [dbo].[tbl_paypal_transaction_failure] ADD  DEFAULT (NULL) FOR [lShortMessage0]
GO
ALTER TABLE [dbo].[tbl_paypal_transaction_failure] ADD  DEFAULT (NULL) FOR [lSeverityCode0]
GO
ALTER TABLE [dbo].[tbl_paypal_transaction_failure] ADD  DEFAULT (getdate()) FOR [insert_timestamp]
GO
ALTER TABLE [dbo].[tbl_paypal_transaction_failure] ADD  DEFAULT (getdate()) FOR [update_timestamp]
GO
ALTER TABLE [dbo].[tbl_paypal_transaction_final] ADD  DEFAULT (NULL) FOR [token]
GO
ALTER TABLE [dbo].[tbl_paypal_transaction_final] ADD  DEFAULT (NULL) FOR [correlationID]
GO
ALTER TABLE [dbo].[tbl_paypal_transaction_final] ADD  DEFAULT (NULL) FOR [payerID]
GO
ALTER TABLE [dbo].[tbl_paypal_transaction_final] ADD  DEFAULT (NULL) FOR [ack]
GO
ALTER TABLE [dbo].[tbl_paypal_transaction_final] ADD  DEFAULT (NULL) FOR [successPageRedirectRequested]
GO
ALTER TABLE [dbo].[tbl_paypal_transaction_final] ADD  DEFAULT (NULL) FOR [ppTimestamp]
GO
ALTER TABLE [dbo].[tbl_paypal_transaction_final] ADD  DEFAULT (NULL) FOR [version]
GO
ALTER TABLE [dbo].[tbl_paypal_transaction_final] ADD  DEFAULT (NULL) FOR [build]
GO
ALTER TABLE [dbo].[tbl_paypal_transaction_final] ADD  DEFAULT (NULL) FOR [insuranceOptionSelected]
GO
ALTER TABLE [dbo].[tbl_paypal_transaction_final] ADD  DEFAULT (NULL) FOR [shoppingOptionIsDefault]
GO
ALTER TABLE [dbo].[tbl_paypal_transaction_final] ADD  DEFAULT (NULL) FOR [pi0TransactionID]
GO
ALTER TABLE [dbo].[tbl_paypal_transaction_final] ADD  DEFAULT (NULL) FOR [pi0TransactionType]
GO
ALTER TABLE [dbo].[tbl_paypal_transaction_final] ADD  DEFAULT (NULL) FOR [pi0PaymentType]
GO
ALTER TABLE [dbo].[tbl_paypal_transaction_final] ADD  DEFAULT (NULL) FOR [pi0OrderType]
GO
ALTER TABLE [dbo].[tbl_paypal_transaction_final] ADD  DEFAULT (NULL) FOR [pi0Amt]
GO
ALTER TABLE [dbo].[tbl_paypal_transaction_final] ADD  DEFAULT (NULL) FOR [pi0TaxAmt]
GO
ALTER TABLE [dbo].[tbl_paypal_transaction_final] ADD  DEFAULT (NULL) FOR [pi0CurrencyCode]
GO
ALTER TABLE [dbo].[tbl_paypal_transaction_final] ADD  DEFAULT (NULL) FOR [pi0PaymentStatus]
GO
ALTER TABLE [dbo].[tbl_paypal_transaction_final] ADD  DEFAULT (NULL) FOR [pi0PendingReason]
GO
ALTER TABLE [dbo].[tbl_paypal_transaction_final] ADD  DEFAULT (NULL) FOR [pi0ReasonCode]
GO
ALTER TABLE [dbo].[tbl_paypal_transaction_final] ADD  DEFAULT (NULL) FOR [pi0ProtectionElegibility]
GO
ALTER TABLE [dbo].[tbl_paypal_transaction_final] ADD  DEFAULT (NULL) FOR [pi0ProtectionElegibilityType]
GO
ALTER TABLE [dbo].[tbl_paypal_transaction_final] ADD  DEFAULT (NULL) FOR [pi0SecureMerchantAccountID]
GO
ALTER TABLE [dbo].[tbl_paypal_transaction_final] ADD  DEFAULT (NULL) FOR [pi0ErrorCode]
GO
ALTER TABLE [dbo].[tbl_paypal_transaction_final] ADD  DEFAULT (NULL) FOR [pi0Ack]
GO
ALTER TABLE [dbo].[tbl_paypal_transaction_final] ADD  DEFAULT (getdate()) FOR [insert_timestamp]
GO
ALTER TABLE [dbo].[tbl_paypal_transaction_final] ADD  DEFAULT (getdate()) FOR [update_timestamp]
GO
ALTER TABLE [dbo].[tbl_paypal_transaction_flow] ADD  DEFAULT (NULL) FOR [token]
GO
ALTER TABLE [dbo].[tbl_paypal_transaction_flow] ADD  DEFAULT (NULL) FOR [correlationID]
GO
ALTER TABLE [dbo].[tbl_paypal_transaction_flow] ADD  DEFAULT (NULL) FOR [payerID]
GO
ALTER TABLE [dbo].[tbl_paypal_transaction_flow] ADD  DEFAULT (NULL) FOR [ack]
GO
ALTER TABLE [dbo].[tbl_paypal_transaction_flow] ADD  DEFAULT (NULL) FOR [returnUrl]
GO
ALTER TABLE [dbo].[tbl_paypal_transaction_flow] ADD  DEFAULT (NULL) FOR [cancelUrl]
GO
ALTER TABLE [dbo].[tbl_paypal_transaction_flow] ADD  DEFAULT (NULL) FOR [version]
GO
ALTER TABLE [dbo].[tbl_paypal_transaction_flow] ADD  DEFAULT (NULL) FOR [build]
GO
ALTER TABLE [dbo].[tbl_paypal_transaction_flow] ADD  DEFAULT (NULL) FOR [checkOutStatus]
GO
ALTER TABLE [dbo].[tbl_paypal_transaction_flow] ADD  DEFAULT (NULL) FOR [pr0NotifyUrl]
GO
ALTER TABLE [dbo].[tbl_paypal_transaction_flow] ADD  DEFAULT (NULL) FOR [pr0CurrencyCode]
GO
ALTER TABLE [dbo].[tbl_paypal_transaction_flow] ADD  DEFAULT (NULL) FOR [pr0Amt]
GO
ALTER TABLE [dbo].[tbl_paypal_transaction_flow] ADD  DEFAULT (NULL) FOR [pr0ItemAmt]
GO
ALTER TABLE [dbo].[tbl_paypal_transaction_flow] ADD  DEFAULT (NULL) FOR [pr0TaxAmt]
GO
ALTER TABLE [dbo].[tbl_paypal_transaction_flow] ADD  DEFAULT (NULL) FOR [pr0Desc]
GO
ALTER TABLE [dbo].[tbl_paypal_transaction_flow] ADD  DEFAULT (NULL) FOR [pr0PaymentAction]
GO
ALTER TABLE [dbo].[tbl_paypal_transaction_flow] ADD  DEFAULT (NULL) FOR [lpr0ItemCategory0]
GO
ALTER TABLE [dbo].[tbl_paypal_transaction_flow] ADD  DEFAULT (NULL) FOR [lpr0Name0]
GO
ALTER TABLE [dbo].[tbl_paypal_transaction_flow] ADD  DEFAULT (NULL) FOR [lpr0Number0]
GO
ALTER TABLE [dbo].[tbl_paypal_transaction_flow] ADD  DEFAULT (NULL) FOR [lpr0Qty0]
GO
ALTER TABLE [dbo].[tbl_paypal_transaction_flow] ADD  DEFAULT (NULL) FOR [lpr0TaxAmt0]
GO
ALTER TABLE [dbo].[tbl_paypal_transaction_flow] ADD  DEFAULT (NULL) FOR [lpr0Amt0]
GO
ALTER TABLE [dbo].[tbl_paypal_transaction_flow] ADD  DEFAULT (NULL) FOR [lpr0Desc]
GO
ALTER TABLE [dbo].[tbl_paypal_transaction_flow] ADD  DEFAULT (NULL) FOR [landingPage]
GO
ALTER TABLE [dbo].[tbl_paypal_transaction_flow] ADD  DEFAULT (NULL) FOR [solutionType]
GO
ALTER TABLE [dbo].[tbl_paypal_transaction_flow] ADD  DEFAULT (NULL) FOR [ppTimestamp]
GO
ALTER TABLE [dbo].[tbl_paypal_transaction_flow] ADD  DEFAULT (getdate()) FOR [insert_timestamp]
GO
ALTER TABLE [dbo].[tbl_paypal_transaction_flow] ADD  DEFAULT (getdate()) FOR [update_timestamp]
GO
ALTER TABLE [dbo].[tbl_paypal_transaction_people] ADD  DEFAULT (NULL) FOR [token]
GO
ALTER TABLE [dbo].[tbl_paypal_transaction_people] ADD  DEFAULT (NULL) FOR [correlationID]
GO
ALTER TABLE [dbo].[tbl_paypal_transaction_people] ADD  DEFAULT (NULL) FOR [payerID]
GO
ALTER TABLE [dbo].[tbl_paypal_transaction_people] ADD  DEFAULT (NULL) FOR [email]
GO
ALTER TABLE [dbo].[tbl_paypal_transaction_people] ADD  DEFAULT (NULL) FOR [payerstatus]
GO
ALTER TABLE [dbo].[tbl_paypal_transaction_people] ADD  DEFAULT (NULL) FOR [firstName]
GO
ALTER TABLE [dbo].[tbl_paypal_transaction_people] ADD  DEFAULT (NULL) FOR [lastName]
GO
ALTER TABLE [dbo].[tbl_paypal_transaction_people] ADD  DEFAULT (NULL) FOR [countryCode]
GO
ALTER TABLE [dbo].[tbl_paypal_transaction_people] ADD  DEFAULT (NULL) FOR [currencyCode]
GO
ALTER TABLE [dbo].[tbl_paypal_transaction_people] ADD  DEFAULT (NULL) FOR [amt]
GO
ALTER TABLE [dbo].[tbl_paypal_transaction_people] ADD  DEFAULT (NULL) FOR [itemAmt]
GO
ALTER TABLE [dbo].[tbl_paypal_transaction_people] ADD  DEFAULT (NULL) FOR [shippingAmt]
GO
ALTER TABLE [dbo].[tbl_paypal_transaction_people] ADD  DEFAULT (NULL) FOR [handlingAmt]
GO
ALTER TABLE [dbo].[tbl_paypal_transaction_people] ADD  DEFAULT (NULL) FOR [taxAmt]
GO
ALTER TABLE [dbo].[tbl_paypal_transaction_people] ADD  DEFAULT (NULL) FOR [desc]
GO
ALTER TABLE [dbo].[tbl_paypal_transaction_people] ADD  DEFAULT (NULL) FOR [notifyurl]
GO
ALTER TABLE [dbo].[tbl_paypal_transaction_people] ADD  DEFAULT (NULL) FOR [insuranceAmt]
GO
ALTER TABLE [dbo].[tbl_paypal_transaction_people] ADD  DEFAULT (NULL) FOR [shipdiscAmt]
GO
ALTER TABLE [dbo].[tbl_paypal_transaction_people] ADD  DEFAULT (NULL) FOR [lname0]
GO
ALTER TABLE [dbo].[tbl_paypal_transaction_people] ADD  DEFAULT (NULL) FOR [lNumber0]
GO
ALTER TABLE [dbo].[tbl_paypal_transaction_people] ADD  DEFAULT (NULL) FOR [lQty0]
GO
ALTER TABLE [dbo].[tbl_paypal_transaction_people] ADD  DEFAULT (NULL) FOR [lTaxAmt0]
GO
ALTER TABLE [dbo].[tbl_paypal_transaction_people] ADD  DEFAULT (NULL) FOR [lAmt0]
GO
ALTER TABLE [dbo].[tbl_paypal_transaction_people] ADD  DEFAULT (NULL) FOR [lDesc0]
GO
ALTER TABLE [dbo].[tbl_paypal_transaction_people] ADD  DEFAULT (NULL) FOR [lItemWeightValue0]
GO
ALTER TABLE [dbo].[tbl_paypal_transaction_people] ADD  DEFAULT (NULL) FOR [lItemLenghtValue0]
GO
ALTER TABLE [dbo].[tbl_paypal_transaction_people] ADD  DEFAULT (NULL) FOR [lItemWidthValue0]
GO
ALTER TABLE [dbo].[tbl_paypal_transaction_people] ADD  DEFAULT (NULL) FOR [lItemHeightValue0]
GO
ALTER TABLE [dbo].[tbl_paypal_transaction_people] ADD  DEFAULT (NULL) FOR [lItemCategory0]
GO
ALTER TABLE [dbo].[tbl_paypal_transaction_people] ADD  DEFAULT (NULL) FOR [pr0currencyCode]
GO
ALTER TABLE [dbo].[tbl_paypal_transaction_people] ADD  DEFAULT (NULL) FOR [pr0Amt]
GO
ALTER TABLE [dbo].[tbl_paypal_transaction_people] ADD  DEFAULT (NULL) FOR [pr0ItemAmt]
GO
ALTER TABLE [dbo].[tbl_paypal_transaction_people] ADD  DEFAULT (NULL) FOR [pr0shippingAmt]
GO
ALTER TABLE [dbo].[tbl_paypal_transaction_people] ADD  DEFAULT (NULL) FOR [pr0handlingAmt]
GO
ALTER TABLE [dbo].[tbl_paypal_transaction_people] ADD  DEFAULT (NULL) FOR [pr0taxAmt]
GO
ALTER TABLE [dbo].[tbl_paypal_transaction_people] ADD  DEFAULT (NULL) FOR [pr0desc]
GO
ALTER TABLE [dbo].[tbl_paypal_transaction_people] ADD  DEFAULT (NULL) FOR [pr0notifyurl]
GO
ALTER TABLE [dbo].[tbl_paypal_transaction_people] ADD  DEFAULT (NULL) FOR [pr0insuranceAmt]
GO
ALTER TABLE [dbo].[tbl_paypal_transaction_people] ADD  DEFAULT (NULL) FOR [pr0shipDiscAmt]
GO
ALTER TABLE [dbo].[tbl_paypal_transaction_people] ADD  DEFAULT (NULL) FOR [pr0insuranceOptionOfferred]
GO
ALTER TABLE [dbo].[tbl_paypal_transaction_people] ADD  DEFAULT (NULL) FOR [lpr0name0]
GO
ALTER TABLE [dbo].[tbl_paypal_transaction_people] ADD  DEFAULT (NULL) FOR [lprNumber0]
GO
ALTER TABLE [dbo].[tbl_paypal_transaction_people] ADD  DEFAULT (NULL) FOR [lprQty0]
GO
ALTER TABLE [dbo].[tbl_paypal_transaction_people] ADD  DEFAULT (NULL) FOR [lprTaxAmt0]
GO
ALTER TABLE [dbo].[tbl_paypal_transaction_people] ADD  DEFAULT (NULL) FOR [lprAmt0]
GO
ALTER TABLE [dbo].[tbl_paypal_transaction_people] ADD  DEFAULT (NULL) FOR [lprDesc0]
GO
ALTER TABLE [dbo].[tbl_paypal_transaction_people] ADD  DEFAULT (NULL) FOR [lprItemWeightValue0]
GO
ALTER TABLE [dbo].[tbl_paypal_transaction_people] ADD  DEFAULT (NULL) FOR [lprItemLenghtValue0]
GO
ALTER TABLE [dbo].[tbl_paypal_transaction_people] ADD  DEFAULT (NULL) FOR [lprItemWidthValue0]
GO
ALTER TABLE [dbo].[tbl_paypal_transaction_people] ADD  DEFAULT (NULL) FOR [lprItemHeightValue0]
GO
ALTER TABLE [dbo].[tbl_paypal_transaction_people] ADD  DEFAULT (NULL) FOR [lprItemCategory0]
GO
ALTER TABLE [dbo].[tbl_paypal_transaction_people] ADD  DEFAULT (NULL) FOR [pri0ErrorCode0]
GO
ALTER TABLE [dbo].[tbl_paypal_transaction_people] ADD  DEFAULT (getdate()) FOR [insert_timestamp]
GO
ALTER TABLE [dbo].[tbl_paypal_transaction_people] ADD  DEFAULT (getdate()) FOR [update_timestamp]
GO
ALTER TABLE [dbo].[tbl_photo] ADD  DEFAULT (NULL) FOR [idCategory2]
GO
ALTER TABLE [dbo].[tbl_photo] ADD  DEFAULT (NULL) FOR [rate]
GO
ALTER TABLE [dbo].[tbl_photo] ADD  DEFAULT (NULL) FOR [nVotes]
GO
ALTER TABLE [dbo].[tbl_photo] ADD  DEFAULT (NULL) FOR [shootingDate]
GO
ALTER TABLE [dbo].[tbl_photo] ADD  DEFAULT (getdate()) FOR [approvedDate]
GO
ALTER TABLE [dbo].[tbl_photo] ADD  DEFAULT (NULL) FOR [exposureTime]
GO
ALTER TABLE [dbo].[tbl_photo] ADD  DEFAULT (NULL) FOR [aperture]
GO
ALTER TABLE [dbo].[tbl_photo] ADD  DEFAULT (NULL) FOR [iso]
GO
ALTER TABLE [dbo].[tbl_photo] ADD  DEFAULT (NULL) FOR [histogram]
GO
ALTER TABLE [dbo].[tbl_photo] ADD  DEFAULT (getdate()) FOR [insert_timestamp]
GO
ALTER TABLE [dbo].[tbl_photo] ADD  DEFAULT (getdate()) FOR [update_timestamp]
GO
ALTER TABLE [dbo].[tbl_photo_pre_post] ADD  DEFAULT (NULL) FOR [idCategory1]
GO
ALTER TABLE [dbo].[tbl_photo_pre_post] ADD  DEFAULT (NULL) FOR [idCategory2]
GO
ALTER TABLE [dbo].[tbl_photo_pre_post] ADD  DEFAULT (NULL) FOR [lat]
GO
ALTER TABLE [dbo].[tbl_photo_pre_post] ADD  DEFAULT (NULL) FOR [lng]
GO
ALTER TABLE [dbo].[tbl_photo_pre_post] ADD  DEFAULT (NULL) FOR [rate]
GO
ALTER TABLE [dbo].[tbl_photo_pre_post] ADD  DEFAULT (NULL) FOR [nVotes]
GO
ALTER TABLE [dbo].[tbl_photo_pre_post] ADD  DEFAULT ((1)) FOR [idPhotoType]
GO
ALTER TABLE [dbo].[tbl_photo_pre_post] ADD  DEFAULT (NULL) FOR [shootingDate]
GO
ALTER TABLE [dbo].[tbl_photo_pre_post] ADD  DEFAULT (NULL) FOR [approvedDate]
GO
ALTER TABLE [dbo].[tbl_photo_pre_post] ADD  DEFAULT ((0)) FOR [isExclusive]
GO
ALTER TABLE [dbo].[tbl_photo_pre_post] ADD  DEFAULT (NULL) FOR [exposureTime]
GO
ALTER TABLE [dbo].[tbl_photo_pre_post] ADD  DEFAULT (NULL) FOR [aperture]
GO
ALTER TABLE [dbo].[tbl_photo_pre_post] ADD  DEFAULT (NULL) FOR [iso]
GO
ALTER TABLE [dbo].[tbl_photo_pre_post] ADD  DEFAULT (NULL) FOR [histogram]
GO
ALTER TABLE [dbo].[tbl_photo_pre_post] ADD  DEFAULT (getdate()) FOR [insert_timestamp]
GO
ALTER TABLE [dbo].[tbl_photo_pre_post] ADD  DEFAULT (getdate()) FOR [update_timestamp]
GO
ALTER TABLE [dbo].[tbl_photographer] ADD  DEFAULT ((0)) FOR [numPhotos]
GO
ALTER TABLE [dbo].[tbl_photographer] ADD  DEFAULT (NULL) FOR [rate]
GO
ALTER TABLE [dbo].[tbl_photographer] ADD  DEFAULT (NULL) FOR [CVSummary]
GO
ALTER TABLE [dbo].[tbl_photographer] ADD  DEFAULT (getdate()) FOR [insert_timestamp]
GO
ALTER TABLE [dbo].[tbl_photographer] ADD  DEFAULT (getdate()) FOR [update_timestamp]
GO
ALTER TABLE [dbo].[tbl_product] ADD  DEFAULT (NULL) FOR [description]
GO
ALTER TABLE [dbo].[tbl_product] ADD  DEFAULT (getdate()) FOR [insert_timestamp]
GO
ALTER TABLE [dbo].[tbl_product] ADD  DEFAULT (getdate()) FOR [update_timestamp]
GO
ALTER TABLE [dbo].[tbl_product_pre_post] ADD  DEFAULT ((1)) FOR [idProductStatus]
GO
ALTER TABLE [dbo].[tbl_product_pre_post] ADD  DEFAULT (NULL) FOR [title]
GO
ALTER TABLE [dbo].[tbl_product_pre_post] ADD  DEFAULT (NULL) FOR [description]
GO
ALTER TABLE [dbo].[tbl_product_pre_post] ADD  DEFAULT ((0)) FOR [visits]
GO
ALTER TABLE [dbo].[tbl_product_pre_post] ADD  DEFAULT (getdate()) FOR [insert_timestamp]
GO
ALTER TABLE [dbo].[tbl_product_pre_post] ADD  DEFAULT (getdate()) FOR [update_timestamp]
GO
ALTER TABLE [dbo].[tbl_review_motivations] ADD  DEFAULT ((0)) FOR [idReview]
GO
ALTER TABLE [dbo].[tbl_review_motivations] ADD  DEFAULT ((0)) FOR [idMotivation]
GO
ALTER TABLE [dbo].[tbl_review_motivations] ADD  DEFAULT (getdate()) FOR [insert_timestamp]
GO
ALTER TABLE [dbo].[tbl_review_motivations] ADD  DEFAULT (getdate()) FOR [update_timestamp]
GO
ALTER TABLE [dbo].[tbl_reviews] ADD  DEFAULT ((0)) FOR [reviewedPhoto]
GO
ALTER TABLE [dbo].[tbl_reviews] ADD  DEFAULT ((0)) FOR [updatedSB]
GO
ALTER TABLE [dbo].[tbl_reviews] ADD  DEFAULT (getdate()) FOR [insert_timestamp]
GO
ALTER TABLE [dbo].[tbl_reviews] ADD  DEFAULT (getdate()) FOR [update_timestamp]
GO
ALTER TABLE [dbo].[tbl_session] ADD  DEFAULT (NULL) FOR [idUser]
GO
ALTER TABLE [dbo].[tbl_session] ADD  DEFAULT (NULL) FOR [isAjaxRequest]
GO
ALTER TABLE [dbo].[tbl_session] ADD  DEFAULT (getdate()) FOR [insert_timestamp]
GO
ALTER TABLE [dbo].[tbl_shopping_cart] ADD  DEFAULT (getdate()) FOR [insert_timestamp]
GO
ALTER TABLE [dbo].[tbl_shopping_cart] ADD  DEFAULT (getdate()) FOR [update_timestamp]
GO
ALTER TABLE [dbo].[tbl_shopping_opt_photo] ADD  DEFAULT ((0)) FOR [idProduct]
GO
ALTER TABLE [dbo].[tbl_shopping_opt_photo] ADD  DEFAULT ((0)) FOR [idSize]
GO
ALTER TABLE [dbo].[tbl_shopping_opt_photo] ADD  DEFAULT ((0)) FOR [idLicense]
GO
ALTER TABLE [dbo].[tbl_shopping_opt_photo] ADD  DEFAULT (getdate()) FOR [insert_timestamp]
GO
ALTER TABLE [dbo].[tbl_shopping_opt_photo] ADD  DEFAULT (getdate()) FOR [update_timestamp]
GO
ALTER TABLE [dbo].[tbl_shopping_opt_photo_rm] ADD  DEFAULT ((0)) FOR [idProduct]
GO
ALTER TABLE [dbo].[tbl_shopping_opt_photo_rm] ADD  DEFAULT ((0)) FOR [idRMdetails]
GO
ALTER TABLE [dbo].[tbl_shopping_opt_photo_rm] ADD  DEFAULT ((0)) FOR [idSize]
GO
ALTER TABLE [dbo].[tbl_shopping_opt_photo_rm] ADD  DEFAULT ((0)) FOR [idDuration]
GO
ALTER TABLE [dbo].[tbl_shopping_opt_photo_rm] ADD  DEFAULT (getdate()) FOR [insert_timestamp]
GO
ALTER TABLE [dbo].[tbl_shopping_opt_photo_rm] ADD  DEFAULT (getdate()) FOR [update_timestamp]
GO
ALTER TABLE [dbo].[tbl_shopping_photo_type] ADD  DEFAULT ((0)) FOR [idProduct]
GO
ALTER TABLE [dbo].[tbl_shopping_photo_type] ADD  DEFAULT (getdate()) FOR [insert_timestamp]
GO
ALTER TABLE [dbo].[tbl_shopping_photo_type] ADD  DEFAULT (getdate()) FOR [update_timestamp]
GO
ALTER TABLE [dbo].[tbl_ticket] ADD  DEFAULT (NULL) FOR [idUser]
GO
ALTER TABLE [dbo].[tbl_ticket] ADD  DEFAULT (NULL) FOR [idProduct]
GO
ALTER TABLE [dbo].[tbl_ticket] ADD  DEFAULT (NULL) FOR [message]
GO
ALTER TABLE [dbo].[tbl_ticket] ADD  DEFAULT (getdate()) FOR [insert_timestamp]
GO
ALTER TABLE [dbo].[tbl_ticket] ADD  DEFAULT (getdate()) FOR [update_timestamp]
GO
ALTER TABLE [dbo].[tbl_transaction] ADD  DEFAULT ((0)) FOR [pending]
GO
ALTER TABLE [dbo].[tbl_transaction] ADD  DEFAULT (getdate()) FOR [insert_timestamp]
GO
ALTER TABLE [dbo].[tbl_transaction] ADD  DEFAULT (getdate()) FOR [update_timestamp]
GO
ALTER TABLE [dbo].[tbl_transaction_photo] ADD  DEFAULT (NULL) FOR [idTransaction]
GO
ALTER TABLE [dbo].[tbl_transaction_photo] ADD  DEFAULT (NULL) FOR [idProduct]
GO
ALTER TABLE [dbo].[tbl_transaction_photo] ADD  DEFAULT (getdate()) FOR [insert_timestamp]
GO
ALTER TABLE [dbo].[tbl_transaction_photo] ADD  DEFAULT (getdate()) FOR [update_timestamp]
GO
ALTER TABLE [dbo].[tbl_transaction_photo_rf] ADD  DEFAULT ((0)) FOR [idTransactionPhoto]
GO
ALTER TABLE [dbo].[tbl_transaction_photo_rf] ADD  DEFAULT ((0)) FOR [idSize]
GO
ALTER TABLE [dbo].[tbl_transaction_photo_rf] ADD  DEFAULT ((0)) FOR [idLicense]
GO
ALTER TABLE [dbo].[tbl_transaction_photo_rf] ADD  DEFAULT (getdate()) FOR [insert_timestamp]
GO
ALTER TABLE [dbo].[tbl_transaction_photo_rf] ADD  DEFAULT (getdate()) FOR [update_timestamp]
GO
ALTER TABLE [dbo].[tbl_transaction_photo_rm] ADD  DEFAULT ((0)) FOR [idTransactionPhoto]
GO
ALTER TABLE [dbo].[tbl_transaction_photo_rm] ADD  DEFAULT ((0)) FOR [idSize]
GO
ALTER TABLE [dbo].[tbl_transaction_photo_rm] ADD  DEFAULT ((0)) FOR [idRMdetails]
GO
ALTER TABLE [dbo].[tbl_transaction_photo_rm] ADD  DEFAULT ((0)) FOR [idDuration]
GO
ALTER TABLE [dbo].[tbl_transaction_photo_rm] ADD  DEFAULT (getdate()) FOR [insert_timestamp]
GO
ALTER TABLE [dbo].[tbl_transaction_photo_rm] ADD  DEFAULT (getdate()) FOR [update_timestamp]
GO
ALTER TABLE [dbo].[tbl_user] ADD  DEFAULT (NULL) FOR [name]
GO
ALTER TABLE [dbo].[tbl_user] ADD  DEFAULT (NULL) FOR [surname]
GO
ALTER TABLE [dbo].[tbl_user] ADD  DEFAULT ((0.00)) FOR [creditsBought]
GO
ALTER TABLE [dbo].[tbl_user] ADD  DEFAULT ((0.00)) FOR [creditsEarned]
GO
ALTER TABLE [dbo].[tbl_user] ADD  DEFAULT ((0.00)) FOR [submitBonus]
GO
ALTER TABLE [dbo].[tbl_user] ADD  DEFAULT ((0)) FOR [photoProfile]
GO
ALTER TABLE [dbo].[tbl_user] ADD  DEFAULT (NULL) FOR [lat]
GO
ALTER TABLE [dbo].[tbl_user] ADD  DEFAULT (NULL) FOR [lng]
GO
ALTER TABLE [dbo].[tbl_user] ADD  DEFAULT (NULL) FOR [street]
GO
ALTER TABLE [dbo].[tbl_user] ADD  DEFAULT (NULL) FOR [zip]
GO
ALTER TABLE [dbo].[tbl_user] ADD  DEFAULT (NULL) FOR [town]
GO
ALTER TABLE [dbo].[tbl_user] ADD  DEFAULT (NULL) FOR [region]
GO
ALTER TABLE [dbo].[tbl_user] ADD  DEFAULT (NULL) FOR [country]
GO
ALTER TABLE [dbo].[tbl_user] ADD  DEFAULT (NULL) FOR [phone1]
GO
ALTER TABLE [dbo].[tbl_user] ADD  DEFAULT (NULL) FOR [phone2]
GO
ALTER TABLE [dbo].[tbl_user] ADD  DEFAULT (NULL) FOR [mobilePhone]
GO
ALTER TABLE [dbo].[tbl_user] ADD  DEFAULT ((0)) FOR [mailingList]
GO
ALTER TABLE [dbo].[tbl_user] ADD  DEFAULT (getdate()) FOR [insert_timestamp]
GO
ALTER TABLE [dbo].[tbl_user] ADD  DEFAULT (getdate()) FOR [update_timestamp]
GO
ALTER TABLE [dbo].[tbl_user] ADD  DEFAULT (getdate()) FOR [lastLogin_timestamp]
GO
ALTER TABLE [dbo].[tbl_user] ADD  DEFAULT (getdate()) FOR [nextBonusUpdate_timestamp]
GO
ALTER TABLE [dbo].[tbl_conf_category]  WITH NOCHECK ADD  CONSTRAINT [tbl_conf_category$tbl_conf_category_ibfk_1] FOREIGN KEY([idPhotoType])
REFERENCES [dbo].[tbl_conf_photo_type] ([idPhotoType])
GO
ALTER TABLE [dbo].[tbl_conf_category] CHECK CONSTRAINT [tbl_conf_category$tbl_conf_category_ibfk_1]
GO
ALTER TABLE [dbo].[tbl_conf_license]  WITH NOCHECK ADD  CONSTRAINT [tbl_conf_license$tbl_conf_license_ibfk_1] FOREIGN KEY([licenseType])
REFERENCES [dbo].[tbl_conf_license_type] ([licenseType])
GO
ALTER TABLE [dbo].[tbl_conf_license] CHECK CONSTRAINT [tbl_conf_license$tbl_conf_license_ibfk_1]
GO
ALTER TABLE [dbo].[tbl_conf_license_rm_details]  WITH NOCHECK ADD  CONSTRAINT [tbl_conf_license_rm_details$tbl_conf_license_rm_details_ibfk_1] FOREIGN KEY([idRMtype])
REFERENCES [dbo].[tbl_conf_license_rm_type] ([idRMtype])
GO
ALTER TABLE [dbo].[tbl_conf_license_rm_details] CHECK CONSTRAINT [tbl_conf_license_rm_details$tbl_conf_license_rm_details_ibfk_1]
GO
ALTER TABLE [dbo].[tbl_conf_shopping_opt_default_gsp]  WITH NOCHECK ADD  CONSTRAINT [tbl_conf_shopping_opt_default_gsp$tbl_conf_shopping_opt_default_gsp_ibfk_1] FOREIGN KEY([idLicense])
REFERENCES [dbo].[tbl_conf_license] ([idLicense])
GO
ALTER TABLE [dbo].[tbl_conf_shopping_opt_default_gsp] CHECK CONSTRAINT [tbl_conf_shopping_opt_default_gsp$tbl_conf_shopping_opt_default_gsp_ibfk_1]
GO
ALTER TABLE [dbo].[tbl_conf_shopping_opt_default_gsp]  WITH NOCHECK ADD  CONSTRAINT [tbl_conf_shopping_opt_default_gsp$tbl_conf_shopping_opt_default_gsp_ibfk_2] FOREIGN KEY([idSize])
REFERENCES [dbo].[tbl_conf_size] ([idSize])
GO
ALTER TABLE [dbo].[tbl_conf_shopping_opt_default_gsp] CHECK CONSTRAINT [tbl_conf_shopping_opt_default_gsp$tbl_conf_shopping_opt_default_gsp_ibfk_2]
GO
ALTER TABLE [dbo].[tbl_contest]  WITH NOCHECK ADD  CONSTRAINT [tbl_contest$tbl_contest_ibfk_1] FOREIGN KEY([email])
REFERENCES [dbo].[tbl_landing_page] ([email])
GO
ALTER TABLE [dbo].[tbl_contest] CHECK CONSTRAINT [tbl_contest$tbl_contest_ibfk_1]
GO
ALTER TABLE [dbo].[tbl_error]  WITH NOCHECK ADD  CONSTRAINT [tbl_error$tbl_error_ibfk_1] FOREIGN KEY([idTicket])
REFERENCES [dbo].[tbl_ticket] ([idTicket])
GO
ALTER TABLE [dbo].[tbl_error] CHECK CONSTRAINT [tbl_error$tbl_error_ibfk_1]
GO
ALTER TABLE [dbo].[tbl_error]  WITH NOCHECK ADD  CONSTRAINT [tbl_error$tbl_error_ibfk_2] FOREIGN KEY([idSession])
REFERENCES [dbo].[tbl_session] ([idSession])
GO
ALTER TABLE [dbo].[tbl_error] CHECK CONSTRAINT [tbl_error$tbl_error_ibfk_2]
GO
ALTER TABLE [dbo].[tbl_ftp_account]  WITH NOCHECK ADD  CONSTRAINT [tbl_ftp_account$tbl_ftp_account_ibfk_1] FOREIGN KEY([idUser])
REFERENCES [dbo].[tbl_user] ([idUser])
GO
ALTER TABLE [dbo].[tbl_ftp_account] CHECK CONSTRAINT [tbl_ftp_account$tbl_ftp_account_ibfk_1]
GO
ALTER TABLE [dbo].[tbl_gsp_profit]  WITH NOCHECK ADD  CONSTRAINT [tbl_gsp_profit$tbl_gsp_profit_ibfk_1] FOREIGN KEY([idUser])
REFERENCES [dbo].[tbl_user] ([idUser])
GO
ALTER TABLE [dbo].[tbl_gsp_profit] CHECK CONSTRAINT [tbl_gsp_profit$tbl_gsp_profit_ibfk_1]
GO
ALTER TABLE [dbo].[tbl_gsp_profit]  WITH NOCHECK ADD  CONSTRAINT [tbl_gsp_profit$tbl_gsp_profit_ibfk_2] FOREIGN KEY([idTransaction])
REFERENCES [dbo].[tbl_transaction] ([idTransaction])
GO
ALTER TABLE [dbo].[tbl_gsp_profit] CHECK CONSTRAINT [tbl_gsp_profit$tbl_gsp_profit_ibfk_2]
GO
ALTER TABLE [dbo].[tbl_gsp_profit]  WITH NOCHECK ADD  CONSTRAINT [tbl_gsp_profit$tbl_gsp_profit_ibfk_3] FOREIGN KEY([idTransactionPhoto])
REFERENCES [dbo].[tbl_transaction_photo] ([idTransactionPhoto])
GO
ALTER TABLE [dbo].[tbl_gsp_profit] CHECK CONSTRAINT [tbl_gsp_profit$tbl_gsp_profit_ibfk_3]
GO
ALTER TABLE [dbo].[tbl_keyword]  WITH NOCHECK ADD  CONSTRAINT [tbl_keyword$tbl_keyword_ibfk_1] FOREIGN KEY([idProduct])
REFERENCES [dbo].[tbl_product_pre_post] ([idProduct])
GO
ALTER TABLE [dbo].[tbl_keyword] CHECK CONSTRAINT [tbl_keyword$tbl_keyword_ibfk_1]
GO
ALTER TABLE [dbo].[tbl_keyword]  WITH NOCHECK ADD  CONSTRAINT [tbl_keyword$tbl_keyword_ibfk_2] FOREIGN KEY([keyword])
REFERENCES [dbo].[tbl_dictionary] ([keyword])
GO
ALTER TABLE [dbo].[tbl_keyword] CHECK CONSTRAINT [tbl_keyword$tbl_keyword_ibfk_2]
GO
ALTER TABLE [dbo].[tbl_landing_page]  WITH NOCHECK ADD  CONSTRAINT [tbl_landing_page$tbl_landing_page_ibfk_1] FOREIGN KEY([idUserProfile])
REFERENCES [dbo].[tbl_conf_user_profile] ([idUserProfile])
GO
ALTER TABLE [dbo].[tbl_landing_page] CHECK CONSTRAINT [tbl_landing_page$tbl_landing_page_ibfk_1]
GO
ALTER TABLE [dbo].[tbl_log]  WITH NOCHECK ADD  CONSTRAINT [tbl_log$tbl_log_ibfk_1] FOREIGN KEY([idSession])
REFERENCES [dbo].[tbl_session] ([idSession])
GO
ALTER TABLE [dbo].[tbl_log] CHECK CONSTRAINT [tbl_log$tbl_log_ibfk_1]
GO
ALTER TABLE [dbo].[tbl_own_equipment]  WITH NOCHECK ADD  CONSTRAINT [tbl_own_equipment$tbl_own_equipment_ibfk_1] FOREIGN KEY([idUser])
REFERENCES [dbo].[tbl_photographer] ([idUser])
GO
ALTER TABLE [dbo].[tbl_own_equipment] CHECK CONSTRAINT [tbl_own_equipment$tbl_own_equipment_ibfk_1]
GO
ALTER TABLE [dbo].[tbl_own_equipment]  WITH NOCHECK ADD  CONSTRAINT [tbl_own_equipment$tbl_own_equipment_ibfk_2] FOREIGN KEY([description])
REFERENCES [dbo].[tbl_equipments] ([description])
GO
ALTER TABLE [dbo].[tbl_own_equipment] CHECK CONSTRAINT [tbl_own_equipment$tbl_own_equipment_ibfk_2]
GO
ALTER TABLE [dbo].[tbl_own_photo_equipment]  WITH NOCHECK ADD  CONSTRAINT [tbl_own_photo_equipment$tbl_own_photo_equipment_ibfk_1] FOREIGN KEY([idProduct])
REFERENCES [dbo].[tbl_product_pre_post] ([idProduct])
GO
ALTER TABLE [dbo].[tbl_own_photo_equipment] CHECK CONSTRAINT [tbl_own_photo_equipment$tbl_own_photo_equipment_ibfk_1]
GO
ALTER TABLE [dbo].[tbl_own_photo_equipment]  WITH NOCHECK ADD  CONSTRAINT [tbl_own_photo_equipment$tbl_own_photo_equipment_ibfk_2] FOREIGN KEY([description])
REFERENCES [dbo].[tbl_equipments] ([description])
GO
ALTER TABLE [dbo].[tbl_own_photo_equipment] CHECK CONSTRAINT [tbl_own_photo_equipment$tbl_own_photo_equipment_ibfk_2]
GO
ALTER TABLE [dbo].[tbl_paypal_gsp_integration]  WITH NOCHECK ADD  CONSTRAINT [tbl_paypal_gsp_integration$tbl_paypal_gsp_integration_ibfk_1] FOREIGN KEY([idUser])
REFERENCES [dbo].[tbl_user] ([idUser])
GO
ALTER TABLE [dbo].[tbl_paypal_gsp_integration] CHECK CONSTRAINT [tbl_paypal_gsp_integration$tbl_paypal_gsp_integration_ibfk_1]
GO
ALTER TABLE [dbo].[tbl_paypal_transaction_failure]  WITH NOCHECK ADD  CONSTRAINT [tbl_paypal_transaction_failure$tbl_paypal_transaction_failure_ibfk_1] FOREIGN KEY([idPPTransaction])
REFERENCES [dbo].[tbl_paypal_transaction_flow] ([idPPTransaction])
GO
ALTER TABLE [dbo].[tbl_paypal_transaction_failure] CHECK CONSTRAINT [tbl_paypal_transaction_failure$tbl_paypal_transaction_failure_ibfk_1]
GO
ALTER TABLE [dbo].[tbl_paypal_transaction_final]  WITH NOCHECK ADD  CONSTRAINT [tbl_paypal_transaction_final$tbl_paypal_transaction_final_ibfk_1] FOREIGN KEY([idPPTransaction])
REFERENCES [dbo].[tbl_paypal_transaction_flow] ([idPPTransaction])
GO
ALTER TABLE [dbo].[tbl_paypal_transaction_final] CHECK CONSTRAINT [tbl_paypal_transaction_final$tbl_paypal_transaction_final_ibfk_1]
GO
ALTER TABLE [dbo].[tbl_paypal_transaction_flow]  WITH NOCHECK ADD  CONSTRAINT [tbl_paypal_transaction_flow$tbl_paypal_transaction_flow_ibfk_1] FOREIGN KEY([idUser])
REFERENCES [dbo].[tbl_user] ([idUser])
GO
ALTER TABLE [dbo].[tbl_paypal_transaction_flow] CHECK CONSTRAINT [tbl_paypal_transaction_flow$tbl_paypal_transaction_flow_ibfk_1]
GO
ALTER TABLE [dbo].[tbl_paypal_transaction_people]  WITH NOCHECK ADD  CONSTRAINT [tbl_paypal_transaction_people$tbl_paypal_transaction_people_ibfk_1] FOREIGN KEY([idPPTransaction])
REFERENCES [dbo].[tbl_paypal_transaction_flow] ([idPPTransaction])
GO
ALTER TABLE [dbo].[tbl_paypal_transaction_people] CHECK CONSTRAINT [tbl_paypal_transaction_people$tbl_paypal_transaction_people_ibfk_1]
GO
ALTER TABLE [dbo].[tbl_photo]  WITH NOCHECK ADD  CONSTRAINT [tbl_photo$tbl_photo_ibfk_1] FOREIGN KEY([idCategory1])
REFERENCES [dbo].[tbl_conf_category] ([idCategory])
GO
ALTER TABLE [dbo].[tbl_photo] CHECK CONSTRAINT [tbl_photo$tbl_photo_ibfk_1]
GO
ALTER TABLE [dbo].[tbl_photo]  WITH NOCHECK ADD  CONSTRAINT [tbl_photo$tbl_photo_ibfk_2] FOREIGN KEY([idCategory2])
REFERENCES [dbo].[tbl_conf_category] ([idCategory])
GO
ALTER TABLE [dbo].[tbl_photo] CHECK CONSTRAINT [tbl_photo$tbl_photo_ibfk_2]
GO
ALTER TABLE [dbo].[tbl_photo]  WITH NOCHECK ADD  CONSTRAINT [tbl_photo$tbl_photo_ibfk_3] FOREIGN KEY([idProduct])
REFERENCES [dbo].[tbl_product] ([idProduct])
GO
ALTER TABLE [dbo].[tbl_photo] CHECK CONSTRAINT [tbl_photo$tbl_photo_ibfk_3]
GO
ALTER TABLE [dbo].[tbl_photo]  WITH NOCHECK ADD  CONSTRAINT [tbl_photo$tbl_photo_ibfk_4] FOREIGN KEY([idPhotoType])
REFERENCES [dbo].[tbl_conf_photo_type] ([idPhotoType])
GO
ALTER TABLE [dbo].[tbl_photo] CHECK CONSTRAINT [tbl_photo$tbl_photo_ibfk_4]
GO
ALTER TABLE [dbo].[tbl_photo_pre_post]  WITH NOCHECK ADD  CONSTRAINT [tbl_photo_pre_post$tbl_photo_pre_post_ibfk_1] FOREIGN KEY([idProduct])
REFERENCES [dbo].[tbl_product_pre_post] ([idProduct])
GO
ALTER TABLE [dbo].[tbl_photo_pre_post] CHECK CONSTRAINT [tbl_photo_pre_post$tbl_photo_pre_post_ibfk_1]
GO
ALTER TABLE [dbo].[tbl_photo_pre_post]  WITH NOCHECK ADD  CONSTRAINT [tbl_photo_pre_post$tbl_photo_pre_post_ibfk_2] FOREIGN KEY([idCategory1])
REFERENCES [dbo].[tbl_conf_category] ([idCategory])
GO
ALTER TABLE [dbo].[tbl_photo_pre_post] CHECK CONSTRAINT [tbl_photo_pre_post$tbl_photo_pre_post_ibfk_2]
GO
ALTER TABLE [dbo].[tbl_photo_pre_post]  WITH NOCHECK ADD  CONSTRAINT [tbl_photo_pre_post$tbl_photo_pre_post_ibfk_3] FOREIGN KEY([idCategory2])
REFERENCES [dbo].[tbl_conf_category] ([idCategory])
GO
ALTER TABLE [dbo].[tbl_photo_pre_post] CHECK CONSTRAINT [tbl_photo_pre_post$tbl_photo_pre_post_ibfk_3]
GO
ALTER TABLE [dbo].[tbl_photo_pre_post]  WITH NOCHECK ADD  CONSTRAINT [tbl_photo_pre_post$tbl_photo_pre_post_ibfk_4] FOREIGN KEY([idPhotoType])
REFERENCES [dbo].[tbl_conf_photo_type] ([idPhotoType])
GO
ALTER TABLE [dbo].[tbl_photo_pre_post] CHECK CONSTRAINT [tbl_photo_pre_post$tbl_photo_pre_post_ibfk_4]
GO
ALTER TABLE [dbo].[tbl_photographer]  WITH NOCHECK ADD  CONSTRAINT [tbl_photographer$tbl_photographer_ibfk_1] FOREIGN KEY([idUser])
REFERENCES [dbo].[tbl_user] ([idUser])
GO
ALTER TABLE [dbo].[tbl_photographer] CHECK CONSTRAINT [tbl_photographer$tbl_photographer_ibfk_1]
GO
ALTER TABLE [dbo].[tbl_photographer]  WITH NOCHECK ADD  CONSTRAINT [tbl_photographer$tbl_photographer_ibfk_2] FOREIGN KEY([idCategory1])
REFERENCES [dbo].[tbl_conf_category] ([idCategory])
GO
ALTER TABLE [dbo].[tbl_photographer] CHECK CONSTRAINT [tbl_photographer$tbl_photographer_ibfk_2]
GO
ALTER TABLE [dbo].[tbl_photographer]  WITH NOCHECK ADD  CONSTRAINT [tbl_photographer$tbl_photographer_ibfk_3] FOREIGN KEY([idCategory2])
REFERENCES [dbo].[tbl_conf_category] ([idCategory])
GO
ALTER TABLE [dbo].[tbl_photographer] CHECK CONSTRAINT [tbl_photographer$tbl_photographer_ibfk_3]
GO
ALTER TABLE [dbo].[tbl_product]  WITH NOCHECK ADD  CONSTRAINT [tbl_product$tbl_product_ibfk_1] FOREIGN KEY([idProduct])
REFERENCES [dbo].[tbl_product_pre_post] ([idProduct])
GO
ALTER TABLE [dbo].[tbl_product] CHECK CONSTRAINT [tbl_product$tbl_product_ibfk_1]
GO
ALTER TABLE [dbo].[tbl_product]  WITH NOCHECK ADD  CONSTRAINT [tbl_product$tbl_product_ibfk_2] FOREIGN KEY([idUser])
REFERENCES [dbo].[tbl_user] ([idUser])
GO
ALTER TABLE [dbo].[tbl_product] CHECK CONSTRAINT [tbl_product$tbl_product_ibfk_2]
GO
ALTER TABLE [dbo].[tbl_product_pre_post]  WITH NOCHECK ADD  CONSTRAINT [tbl_product_pre_post$tbl_product_pre_post_ibfk_1] FOREIGN KEY([idProductStatus])
REFERENCES [dbo].[tbl_conf_product_status] ([idProductStatus])
GO
ALTER TABLE [dbo].[tbl_product_pre_post] CHECK CONSTRAINT [tbl_product_pre_post$tbl_product_pre_post_ibfk_1]
GO
ALTER TABLE [dbo].[tbl_product_pre_post]  WITH NOCHECK ADD  CONSTRAINT [tbl_product_pre_post$tbl_product_pre_post_ibfk_2] FOREIGN KEY([idUser])
REFERENCES [dbo].[tbl_user] ([idUser])
GO
ALTER TABLE [dbo].[tbl_product_pre_post] CHECK CONSTRAINT [tbl_product_pre_post$tbl_product_pre_post_ibfk_2]
GO
ALTER TABLE [dbo].[tbl_review_motivations]  WITH NOCHECK ADD  CONSTRAINT [tbl_review_motivations$tbl_review_motivations_ibfk_1] FOREIGN KEY([idReview])
REFERENCES [dbo].[tbl_reviews] ([idReview])
GO
ALTER TABLE [dbo].[tbl_review_motivations] CHECK CONSTRAINT [tbl_review_motivations$tbl_review_motivations_ibfk_1]
GO
ALTER TABLE [dbo].[tbl_review_motivations]  WITH NOCHECK ADD  CONSTRAINT [tbl_review_motivations$tbl_review_motivations_ibfk_2] FOREIGN KEY([idMotivation])
REFERENCES [dbo].[tbl_conf_review_motivations] ([idMotivation])
GO
ALTER TABLE [dbo].[tbl_review_motivations] CHECK CONSTRAINT [tbl_review_motivations$tbl_review_motivations_ibfk_2]
GO
ALTER TABLE [dbo].[tbl_reviews]  WITH NOCHECK ADD  CONSTRAINT [tbl_reviews$tbl_reviews_ibfk_1] FOREIGN KEY([idProduct])
REFERENCES [dbo].[tbl_product_pre_post] ([idProduct])
GO
ALTER TABLE [dbo].[tbl_reviews] CHECK CONSTRAINT [tbl_reviews$tbl_reviews_ibfk_1]
GO
ALTER TABLE [dbo].[tbl_reviews]  WITH NOCHECK ADD  CONSTRAINT [tbl_reviews$tbl_reviews_ibfk_2] FOREIGN KEY([idUser])
REFERENCES [dbo].[tbl_user] ([idUser])
GO
ALTER TABLE [dbo].[tbl_reviews] CHECK CONSTRAINT [tbl_reviews$tbl_reviews_ibfk_2]
GO
ALTER TABLE [dbo].[tbl_session]  WITH NOCHECK ADD  CONSTRAINT [tbl_session$tbl_session_ibfk_1] FOREIGN KEY([idUser])
REFERENCES [dbo].[tbl_user] ([idUser])
GO
ALTER TABLE [dbo].[tbl_session] CHECK CONSTRAINT [tbl_session$tbl_session_ibfk_1]
GO
ALTER TABLE [dbo].[tbl_shopping_cart]  WITH NOCHECK ADD  CONSTRAINT [tbl_shopping_cart$tbl_shopping_cart_ibfk_1] FOREIGN KEY([idProduct])
REFERENCES [dbo].[tbl_product_pre_post] ([idProduct])
GO
ALTER TABLE [dbo].[tbl_shopping_cart] CHECK CONSTRAINT [tbl_shopping_cart$tbl_shopping_cart_ibfk_1]
GO
ALTER TABLE [dbo].[tbl_shopping_cart]  WITH NOCHECK ADD  CONSTRAINT [tbl_shopping_cart$tbl_shopping_cart_ibfk_2] FOREIGN KEY([idUser])
REFERENCES [dbo].[tbl_user] ([idUser])
GO
ALTER TABLE [dbo].[tbl_shopping_cart] CHECK CONSTRAINT [tbl_shopping_cart$tbl_shopping_cart_ibfk_2]
GO
ALTER TABLE [dbo].[tbl_shopping_opt_photo]  WITH NOCHECK ADD  CONSTRAINT [tbl_shopping_opt_photo$tbl_shopping_opt_photo_ibfk_1] FOREIGN KEY([idProduct])
REFERENCES [dbo].[tbl_shopping_photo_type] ([idProduct])
GO
ALTER TABLE [dbo].[tbl_shopping_opt_photo] CHECK CONSTRAINT [tbl_shopping_opt_photo$tbl_shopping_opt_photo_ibfk_1]
GO
ALTER TABLE [dbo].[tbl_shopping_opt_photo]  WITH NOCHECK ADD  CONSTRAINT [tbl_shopping_opt_photo$tbl_shopping_opt_photo_ibfk_2] FOREIGN KEY([idLicense])
REFERENCES [dbo].[tbl_conf_license] ([idLicense])
GO
ALTER TABLE [dbo].[tbl_shopping_opt_photo] CHECK CONSTRAINT [tbl_shopping_opt_photo$tbl_shopping_opt_photo_ibfk_2]
GO
ALTER TABLE [dbo].[tbl_shopping_opt_photo]  WITH NOCHECK ADD  CONSTRAINT [tbl_shopping_opt_photo$tbl_shopping_opt_photo_ibfk_3] FOREIGN KEY([idSize])
REFERENCES [dbo].[tbl_conf_size] ([idSize])
GO
ALTER TABLE [dbo].[tbl_shopping_opt_photo] CHECK CONSTRAINT [tbl_shopping_opt_photo$tbl_shopping_opt_photo_ibfk_3]
GO
ALTER TABLE [dbo].[tbl_shopping_opt_photo_rm]  WITH NOCHECK ADD  CONSTRAINT [tbl_shopping_opt_photo_rm$tbl_shopping_opt_photo_rm_ibfk_1] FOREIGN KEY([idProduct])
REFERENCES [dbo].[tbl_shopping_photo_type] ([idProduct])
GO
ALTER TABLE [dbo].[tbl_shopping_opt_photo_rm] CHECK CONSTRAINT [tbl_shopping_opt_photo_rm$tbl_shopping_opt_photo_rm_ibfk_1]
GO
ALTER TABLE [dbo].[tbl_shopping_opt_photo_rm]  WITH NOCHECK ADD  CONSTRAINT [tbl_shopping_opt_photo_rm$tbl_shopping_opt_photo_rm_ibfk_2] FOREIGN KEY([idRMdetails])
REFERENCES [dbo].[tbl_conf_license_rm_details] ([idRMdetails])
GO
ALTER TABLE [dbo].[tbl_shopping_opt_photo_rm] CHECK CONSTRAINT [tbl_shopping_opt_photo_rm$tbl_shopping_opt_photo_rm_ibfk_2]
GO
ALTER TABLE [dbo].[tbl_shopping_opt_photo_rm]  WITH NOCHECK ADD  CONSTRAINT [tbl_shopping_opt_photo_rm$tbl_shopping_opt_photo_rm_ibfk_3] FOREIGN KEY([idSize])
REFERENCES [dbo].[tbl_conf_size] ([idSize])
GO
ALTER TABLE [dbo].[tbl_shopping_opt_photo_rm] CHECK CONSTRAINT [tbl_shopping_opt_photo_rm$tbl_shopping_opt_photo_rm_ibfk_3]
GO
ALTER TABLE [dbo].[tbl_shopping_opt_photo_rm]  WITH NOCHECK ADD  CONSTRAINT [tbl_shopping_opt_photo_rm$tbl_shopping_opt_photo_rm_ibfk_4] FOREIGN KEY([idDuration])
REFERENCES [dbo].[tbl_conf_duration_rm] ([idDuration])
GO
ALTER TABLE [dbo].[tbl_shopping_opt_photo_rm] CHECK CONSTRAINT [tbl_shopping_opt_photo_rm$tbl_shopping_opt_photo_rm_ibfk_4]
GO
ALTER TABLE [dbo].[tbl_shopping_photo_type]  WITH NOCHECK ADD  CONSTRAINT [tbl_shopping_photo_type$tbl_shopping_photo_type_ibfk_1] FOREIGN KEY([idProduct])
REFERENCES [dbo].[tbl_product_pre_post] ([idProduct])
GO
ALTER TABLE [dbo].[tbl_shopping_photo_type] CHECK CONSTRAINT [tbl_shopping_photo_type$tbl_shopping_photo_type_ibfk_1]
GO
ALTER TABLE [dbo].[tbl_shopping_photo_type]  WITH NOCHECK ADD  CONSTRAINT [tbl_shopping_photo_type$tbl_shopping_photo_type_ibfk_2] FOREIGN KEY([licenseType])
REFERENCES [dbo].[tbl_conf_license_type] ([licenseType])
GO
ALTER TABLE [dbo].[tbl_shopping_photo_type] CHECK CONSTRAINT [tbl_shopping_photo_type$tbl_shopping_photo_type_ibfk_2]
GO
ALTER TABLE [dbo].[tbl_ticket]  WITH NOCHECK ADD  CONSTRAINT [tbl_ticket$tbl_ticket_ibfk_1] FOREIGN KEY([idUser])
REFERENCES [dbo].[tbl_user] ([idUser])
GO
ALTER TABLE [dbo].[tbl_ticket] CHECK CONSTRAINT [tbl_ticket$tbl_ticket_ibfk_1]
GO
ALTER TABLE [dbo].[tbl_ticket]  WITH NOCHECK ADD  CONSTRAINT [tbl_ticket$tbl_ticket_ibfk_2] FOREIGN KEY([idProduct])
REFERENCES [dbo].[tbl_product_pre_post] ([idProduct])
GO
ALTER TABLE [dbo].[tbl_ticket] CHECK CONSTRAINT [tbl_ticket$tbl_ticket_ibfk_2]
GO
ALTER TABLE [dbo].[tbl_ticket]  WITH NOCHECK ADD  CONSTRAINT [tbl_ticket$tbl_ticket_ibfk_3] FOREIGN KEY([idTicketType])
REFERENCES [dbo].[tbl_conf_ticket_type] ([idTicketType])
GO
ALTER TABLE [dbo].[tbl_ticket] CHECK CONSTRAINT [tbl_ticket$tbl_ticket_ibfk_3]
GO
ALTER TABLE [dbo].[tbl_ticket]  WITH NOCHECK ADD  CONSTRAINT [tbl_ticket$tbl_ticket_ibfk_4] FOREIGN KEY([idTicketStatus])
REFERENCES [dbo].[tbl_conf_ticket_status] ([idTicketStatus])
GO
ALTER TABLE [dbo].[tbl_ticket] CHECK CONSTRAINT [tbl_ticket$tbl_ticket_ibfk_4]
GO
ALTER TABLE [dbo].[tbl_transaction]  WITH NOCHECK ADD  CONSTRAINT [tbl_transaction$tbl_transaction_ibfk_1] FOREIGN KEY([idUser])
REFERENCES [dbo].[tbl_user] ([idUser])
GO
ALTER TABLE [dbo].[tbl_transaction] CHECK CONSTRAINT [tbl_transaction$tbl_transaction_ibfk_1]
GO
ALTER TABLE [dbo].[tbl_transaction]  WITH NOCHECK ADD  CONSTRAINT [tbl_transaction$tbl_transaction_ibfk_2] FOREIGN KEY([idTransactionType])
REFERENCES [dbo].[tbl_conf_transaction_type] ([idTransactionType])
GO
ALTER TABLE [dbo].[tbl_transaction] CHECK CONSTRAINT [tbl_transaction$tbl_transaction_ibfk_2]
GO
ALTER TABLE [dbo].[tbl_transaction_photo]  WITH NOCHECK ADD  CONSTRAINT [tbl_transaction_photo$tbl_transaction_photo_ibfk_1] FOREIGN KEY([idTransaction])
REFERENCES [dbo].[tbl_transaction] ([idTransaction])
GO
ALTER TABLE [dbo].[tbl_transaction_photo] CHECK CONSTRAINT [tbl_transaction_photo$tbl_transaction_photo_ibfk_1]
GO
ALTER TABLE [dbo].[tbl_transaction_photo]  WITH NOCHECK ADD  CONSTRAINT [tbl_transaction_photo$tbl_transaction_photo_ibfk_2] FOREIGN KEY([idProduct])
REFERENCES [dbo].[tbl_product_pre_post] ([idProduct])
GO
ALTER TABLE [dbo].[tbl_transaction_photo] CHECK CONSTRAINT [tbl_transaction_photo$tbl_transaction_photo_ibfk_2]
GO
ALTER TABLE [dbo].[tbl_transaction_photo]  WITH NOCHECK ADD  CONSTRAINT [tbl_transaction_photo$tbl_transaction_photo_ibfk_3] FOREIGN KEY([licenseType])
REFERENCES [dbo].[tbl_conf_license_type] ([licenseType])
GO
ALTER TABLE [dbo].[tbl_transaction_photo] CHECK CONSTRAINT [tbl_transaction_photo$tbl_transaction_photo_ibfk_3]
GO
ALTER TABLE [dbo].[tbl_transaction_photo_rf]  WITH NOCHECK ADD  CONSTRAINT [tbl_transaction_photo_rf$tbl_transaction_photo_rf_ibfk_1] FOREIGN KEY([idTransactionPhoto])
REFERENCES [dbo].[tbl_transaction_photo] ([idTransactionPhoto])
GO
ALTER TABLE [dbo].[tbl_transaction_photo_rf] CHECK CONSTRAINT [tbl_transaction_photo_rf$tbl_transaction_photo_rf_ibfk_1]
GO
ALTER TABLE [dbo].[tbl_transaction_photo_rf]  WITH NOCHECK ADD  CONSTRAINT [tbl_transaction_photo_rf$tbl_transaction_photo_rf_ibfk_2] FOREIGN KEY([idSize])
REFERENCES [dbo].[tbl_conf_size] ([idSize])
GO
ALTER TABLE [dbo].[tbl_transaction_photo_rf] CHECK CONSTRAINT [tbl_transaction_photo_rf$tbl_transaction_photo_rf_ibfk_2]
GO
ALTER TABLE [dbo].[tbl_transaction_photo_rf]  WITH NOCHECK ADD  CONSTRAINT [tbl_transaction_photo_rf$tbl_transaction_photo_rf_ibfk_3] FOREIGN KEY([idLicense])
REFERENCES [dbo].[tbl_conf_license] ([idLicense])
GO
ALTER TABLE [dbo].[tbl_transaction_photo_rf] CHECK CONSTRAINT [tbl_transaction_photo_rf$tbl_transaction_photo_rf_ibfk_3]
GO
ALTER TABLE [dbo].[tbl_transaction_photo_rm]  WITH NOCHECK ADD  CONSTRAINT [tbl_transaction_photo_rm$tbl_transaction_photo_rm_ibfk_1] FOREIGN KEY([idTransactionPhoto])
REFERENCES [dbo].[tbl_transaction_photo] ([idTransactionPhoto])
GO
ALTER TABLE [dbo].[tbl_transaction_photo_rm] CHECK CONSTRAINT [tbl_transaction_photo_rm$tbl_transaction_photo_rm_ibfk_1]
GO
ALTER TABLE [dbo].[tbl_transaction_photo_rm]  WITH NOCHECK ADD  CONSTRAINT [tbl_transaction_photo_rm$tbl_transaction_photo_rm_ibfk_2] FOREIGN KEY([idRMdetails])
REFERENCES [dbo].[tbl_conf_license_rm_details] ([idRMdetails])
GO
ALTER TABLE [dbo].[tbl_transaction_photo_rm] CHECK CONSTRAINT [tbl_transaction_photo_rm$tbl_transaction_photo_rm_ibfk_2]
GO
ALTER TABLE [dbo].[tbl_transaction_photo_rm]  WITH NOCHECK ADD  CONSTRAINT [tbl_transaction_photo_rm$tbl_transaction_photo_rm_ibfk_3] FOREIGN KEY([idSize])
REFERENCES [dbo].[tbl_conf_size] ([idSize])
GO
ALTER TABLE [dbo].[tbl_transaction_photo_rm] CHECK CONSTRAINT [tbl_transaction_photo_rm$tbl_transaction_photo_rm_ibfk_3]
GO
ALTER TABLE [dbo].[tbl_transaction_photo_rm]  WITH NOCHECK ADD  CONSTRAINT [tbl_transaction_photo_rm$tbl_transaction_photo_rm_ibfk_4] FOREIGN KEY([idDuration])
REFERENCES [dbo].[tbl_conf_duration_rm] ([idDuration])
GO
ALTER TABLE [dbo].[tbl_transaction_photo_rm] CHECK CONSTRAINT [tbl_transaction_photo_rm$tbl_transaction_photo_rm_ibfk_4]
GO
ALTER TABLE [dbo].[tbl_user]  WITH NOCHECK ADD  CONSTRAINT [tbl_user$tbl_user_ibfk_1] FOREIGN KEY([idUserStatus])
REFERENCES [dbo].[tbl_conf_user_status] ([idUserStatus])
GO
ALTER TABLE [dbo].[tbl_user] CHECK CONSTRAINT [tbl_user$tbl_user_ibfk_1]
GO
ALTER TABLE [dbo].[tbl_user]  WITH NOCHECK ADD  CONSTRAINT [tbl_user$tbl_user_ibfk_2] FOREIGN KEY([idUserProfile])
REFERENCES [dbo].[tbl_conf_user_profile] ([idUserProfile])
GO
ALTER TABLE [dbo].[tbl_user] CHECK CONSTRAINT [tbl_user$tbl_user_ibfk_2]
GO
ALTER TABLE [dbo].[tbl_user]  WITH NOCHECK ADD  CONSTRAINT [tbl_user$tbl_user_ibfk_3] FOREIGN KEY([idLanguage])
REFERENCES [dbo].[tbl_conf_language] ([idLanguage])
GO
ALTER TABLE [dbo].[tbl_user] CHECK CONSTRAINT [tbl_user$tbl_user_ibfk_3]
GO
