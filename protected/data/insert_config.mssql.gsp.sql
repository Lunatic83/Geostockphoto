USE [geostockphoto_prod]
GO
SET IDENTITY_INSERT [dbo].[tbl_conf_photo_type] ON 

GO
INSERT [dbo].[tbl_conf_photo_type] ([idPhotoType], [name], [insert_timestamp], [update_timestamp]) VALUES (1, N'High-Quality', CAST(0x0000A0540036D260 AS DateTime), CAST(0x0000A0540036D260 AS DateTime))
GO
INSERT [dbo].[tbl_conf_photo_type] ([idPhotoType], [name], [insert_timestamp], [update_timestamp]) VALUES (2, N'Breaking News', CAST(0x0000A0540036D260 AS DateTime), CAST(0x0000A0540036D260 AS DateTime))
GO
SET IDENTITY_INSERT [dbo].[tbl_conf_photo_type] OFF
GO
SET IDENTITY_INSERT [dbo].[tbl_conf_category] ON 

GO 
INSERT [dbo].[tbl_conf_category] ([idCategory], [name], [idPhotoType], [insert_timestamp], [update_timestamp]) VALUES (1, N'Animals', 1, CAST(0x0000A0540036D260 AS DateTime), CAST(0x0000A0540036D260 AS DateTime))
GO
INSERT [dbo].[tbl_conf_category] ([idCategory], [name], [idPhotoType], [insert_timestamp], [update_timestamp]) VALUES (2, N'Arts', 1, CAST(0x0000A0540036D260 AS DateTime), CAST(0x0000A0540036D260 AS DateTime))
GO
INSERT [dbo].[tbl_conf_category] ([idCategory], [name], [idPhotoType], [insert_timestamp], [update_timestamp]) VALUES (3, N'Buildings', 1, CAST(0x0000A0540036D260 AS DateTime), CAST(0x0000A0540036D260 AS DateTime))
GO
INSERT [dbo].[tbl_conf_category] ([idCategory], [name], [idPhotoType], [insert_timestamp], [update_timestamp]) VALUES (4, N'Celebrities', 1, CAST(0x0000A0540036D260 AS DateTime), CAST(0x0000A0540036D260 AS DateTime))
GO
INSERT [dbo].[tbl_conf_category] ([idCategory], [name], [idPhotoType], [insert_timestamp], [update_timestamp]) VALUES (5, N'Editorial', 1, CAST(0x0000A0540036D260 AS DateTime), CAST(0x0000A0540036D260 AS DateTime))
GO
INSERT [dbo].[tbl_conf_category] ([idCategory], [name], [idPhotoType], [insert_timestamp], [update_timestamp]) VALUES (6, N'Fashion', 1, CAST(0x0000A0540036D260 AS DateTime), CAST(0x0000A0540036D260 AS DateTime))
GO
INSERT [dbo].[tbl_conf_category] ([idCategory], [name], [idPhotoType], [insert_timestamp], [update_timestamp]) VALUES (7, N'Food/Drink', 1, CAST(0x0000A0540036D260 AS DateTime), CAST(0x0000A0540036D260 AS DateTime))
GO
INSERT [dbo].[tbl_conf_category] ([idCategory], [name], [idPhotoType], [insert_timestamp], [update_timestamp]) VALUES (8, N'Holidays', 1, CAST(0x0000A0540036D260 AS DateTime), CAST(0x0000A0540036D260 AS DateTime))
GO
INSERT [dbo].[tbl_conf_category] ([idCategory], [name], [idPhotoType], [insert_timestamp], [update_timestamp]) VALUES (9, N'Interiors', 1, CAST(0x0000A0540036D260 AS DateTime), CAST(0x0000A0540036D260 AS DateTime))
GO
INSERT [dbo].[tbl_conf_category] ([idCategory], [name], [idPhotoType], [insert_timestamp], [update_timestamp]) VALUES (10, N'Landscape', 1, CAST(0x0000A0540036D260 AS DateTime), CAST(0x0000A0540036D260 AS DateTime))
GO
INSERT [dbo].[tbl_conf_category] ([idCategory], [name], [idPhotoType], [insert_timestamp], [update_timestamp]) VALUES (11, N'Nature', 1, CAST(0x0000A0540036D260 AS DateTime), CAST(0x0000A0540036D260 AS DateTime))
GO
INSERT [dbo].[tbl_conf_category] ([idCategory], [name], [idPhotoType], [insert_timestamp], [update_timestamp]) VALUES (12, N'Objects', 1, CAST(0x0000A0540036D260 AS DateTime), CAST(0x0000A0540036D260 AS DateTime))
GO
INSERT [dbo].[tbl_conf_category] ([idCategory], [name], [idPhotoType], [insert_timestamp], [update_timestamp]) VALUES (13, N'People', 1, CAST(0x0000A0540036D260 AS DateTime), CAST(0x0000A0540036D260 AS DateTime))
GO
INSERT [dbo].[tbl_conf_category] ([idCategory], [name], [idPhotoType], [insert_timestamp], [update_timestamp]) VALUES (14, N'Religion', 1, CAST(0x0000A0540036D260 AS DateTime), CAST(0x0000A0540036D260 AS DateTime))
GO
INSERT [dbo].[tbl_conf_category] ([idCategory], [name], [idPhotoType], [insert_timestamp], [update_timestamp]) VALUES (15, N'Signs/Symbols', 1, CAST(0x0000A0540036D260 AS DateTime), CAST(0x0000A0540036D260 AS DateTime))
GO
INSERT [dbo].[tbl_conf_category] ([idCategory], [name], [idPhotoType], [insert_timestamp], [update_timestamp]) VALUES (16, N'Sports/Recreations', 1, CAST(0x0000A0540036D260 AS DateTime), CAST(0x0000A0540036D260 AS DateTime))
GO
INSERT [dbo].[tbl_conf_category] ([idCategory], [name], [idPhotoType], [insert_timestamp], [update_timestamp]) VALUES (17, N'Technology', 1, CAST(0x0000A0540036D260 AS DateTime), CAST(0x0000A0540036D260 AS DateTime))
GO
INSERT [dbo].[tbl_conf_category] ([idCategory], [name], [idPhotoType], [insert_timestamp], [update_timestamp]) VALUES (18, N'Transportation', 1, CAST(0x0000A0540036D260 AS DateTime), CAST(0x0000A0540036D260 AS DateTime))
GO
INSERT [dbo].[tbl_conf_category] ([idCategory], [name], [idPhotoType], [insert_timestamp], [update_timestamp]) VALUES (19, N'Other', 1, CAST(0x0000A0540036D260 AS DateTime), CAST(0x0000A0540036D260 AS DateTime))
GO
INSERT [dbo].[tbl_conf_category] ([idCategory], [name], [idPhotoType], [insert_timestamp], [update_timestamp]) VALUES (20, N'Crime', 2, CAST(0x0000A0540036D260 AS DateTime), CAST(0x0000A0540036D260 AS DateTime))
GO
INSERT [dbo].[tbl_conf_category] ([idCategory], [name], [idPhotoType], [insert_timestamp], [update_timestamp]) VALUES (21, N'Politic', 2, CAST(0x0000A0540036D260 AS DateTime), CAST(0x0000A0540036D260 AS DateTime))
GO
INSERT [dbo].[tbl_conf_category] ([idCategory], [name], [idPhotoType], [insert_timestamp], [update_timestamp]) VALUES (22, N'Gossip', 2, CAST(0x0000A0540036D260 AS DateTime), CAST(0x0000A0540036D260 AS DateTime))
GO
INSERT [dbo].[tbl_conf_category] ([idCategory], [name], [idPhotoType], [insert_timestamp], [update_timestamp]) VALUES (23, N'Sport', 2, CAST(0x0000A0540036D260 AS DateTime), CAST(0x0000A0540036D260 AS DateTime))
GO
INSERT [dbo].[tbl_conf_category] ([idCategory], [name], [idPhotoType], [insert_timestamp], [update_timestamp]) VALUES (24, N'Entertainment', 2, CAST(0x0000A0540036D260 AS DateTime), CAST(0x0000A0540036D260 AS DateTime))
GO
INSERT [dbo].[tbl_conf_category] ([idCategory], [name], [idPhotoType], [insert_timestamp], [update_timestamp]) VALUES (25, N'Technology', 2, CAST(0x0000A0540036D260 AS DateTime), CAST(0x0000A0540036D260 AS DateTime))
GO
INSERT [dbo].[tbl_conf_category] ([idCategory], [name], [idPhotoType], [insert_timestamp], [update_timestamp]) VALUES (26, N'Science', 2, CAST(0x0000A0540036D260 AS DateTime), CAST(0x0000A0540036D260 AS DateTime))
GO
INSERT [dbo].[tbl_conf_category] ([idCategory], [name], [idPhotoType], [insert_timestamp], [update_timestamp]) VALUES (27, N'Social', 2, CAST(0x0000A0540036D260 AS DateTime), CAST(0x0000A0540036D260 AS DateTime))
GO
INSERT [dbo].[tbl_conf_category] ([idCategory], [name], [idPhotoType], [insert_timestamp], [update_timestamp]) VALUES (28, N'Other', 2, CAST(0x0000A0540036D260 AS DateTime), CAST(0x0000A0540036D260 AS DateTime))
GO
INSERT [dbo].[tbl_conf_category] ([idCategory], [name], [idPhotoType], [insert_timestamp], [update_timestamp]) VALUES (29, N'Heritage', 2, CAST(0x0000A0540036D260 AS DateTime), CAST(0x0000A0540036D260 AS DateTime))
GO
INSERT [dbo].[tbl_conf_category] ([idCategory], [name], [idPhotoType], [insert_timestamp], [update_timestamp]) VALUES (30, N'Science', 2, CAST(0x0000A0540036D260 AS DateTime), CAST(0x0000A0540036D260 AS DateTime))
GO
INSERT [dbo].[tbl_conf_category] ([idCategory], [name], [idPhotoType], [insert_timestamp], [update_timestamp]) VALUES (31, N'Music', 2, CAST(0x0000A0540036D260 AS DateTime), CAST(0x0000A0540036D260 AS DateTime))
GO
SET IDENTITY_INSERT [dbo].[tbl_conf_category] OFF
GO
SET IDENTITY_INSERT [dbo].[tbl_conf_product_status] ON 

GO
INSERT [dbo].[tbl_conf_product_status] ([idProductStatus], [name], [insert_timestamp], [update_timestamp]) VALUES (1, N'Pending', CAST(0x0000A0540036D260 AS DateTime), CAST(0x0000A0540036D260 AS DateTime))
GO
INSERT [dbo].[tbl_conf_product_status] ([idProductStatus], [name], [insert_timestamp], [update_timestamp]) VALUES (2, N'Wait Review', CAST(0x0000A0540036D260 AS DateTime), CAST(0x0000A0540036D260 AS DateTime))
GO
INSERT [dbo].[tbl_conf_product_status] ([idProductStatus], [name], [insert_timestamp], [update_timestamp]) VALUES (3, N'Approved', CAST(0x0000A0540036D260 AS DateTime), CAST(0x0000A0540036D260 AS DateTime))
GO
INSERT [dbo].[tbl_conf_product_status] ([idProductStatus], [name], [insert_timestamp], [update_timestamp]) VALUES (4, N'Rejected', CAST(0x0000A0540036D260 AS DateTime), CAST(0x0000A0540036D260 AS DateTime))
GO
INSERT [dbo].[tbl_conf_product_status] ([idProductStatus], [name], [insert_timestamp], [update_timestamp]) VALUES (5, N'Pending Submit', CAST(0x0000A0540036D260 AS DateTime), CAST(0x0000A0540036D260 AS DateTime))
GO
INSERT [dbo].[tbl_conf_product_status] ([idProductStatus], [name], [insert_timestamp], [update_timestamp]) VALUES (6, N'Deleted', CAST(0x0000A0540036D260 AS DateTime), CAST(0x0000A0540036D260 AS DateTime))
GO
INSERT [dbo].[tbl_conf_product_status] ([idProductStatus], [name], [insert_timestamp], [update_timestamp]) VALUES (7, N'Abuse Reported', CAST(0x0000A0540036D260 AS DateTime), CAST(0x0000A0540036D260 AS DateTime))
GO
SET IDENTITY_INSERT [dbo].[tbl_conf_product_status] OFF
GO
INSERT [dbo].[tbl_conf_language] ([idLanguage], [name], [insert_timestamp], [update_timestamp]) VALUES (N'en', N'English', CAST(0x0000A0540036D134 AS DateTime), CAST(0x0000A0540036D260 AS DateTime))
GO
INSERT [dbo].[tbl_conf_language] ([idLanguage], [name], [insert_timestamp], [update_timestamp]) VALUES (N'it', N'Italiano', CAST(0x0000A0540036D134 AS DateTime), CAST(0x0000A0540036D260 AS DateTime))
GO
SET IDENTITY_INSERT [dbo].[tbl_conf_user_profile] ON 

GO
INSERT [dbo].[tbl_conf_user_profile] ([idUserProfile], [name], [multiplication_factor_sb], [weight_review], [insert_timestamp], [update_timestamp]) VALUES (1, N'Admin', CAST(0.0 AS Numeric(2, 1)), CAST(1.0 AS Numeric(2, 1)), CAST(0x0000A0540036D38C AS DateTime), CAST(0x0000A0540036D38C AS DateTime))
GO
INSERT [dbo].[tbl_conf_user_profile] ([idUserProfile], [name], [multiplication_factor_sb], [weight_review], [insert_timestamp], [update_timestamp]) VALUES (2, N'User', CAST(0.2 AS Numeric(2, 1)), CAST(0.2 AS Numeric(2, 1)), CAST(0x0000A0540036D38C AS DateTime), CAST(0x0000A0540036D38C AS DateTime))
GO
INSERT [dbo].[tbl_conf_user_profile] ([idUserProfile], [name], [multiplication_factor_sb], [weight_review], [insert_timestamp], [update_timestamp]) VALUES (3, N'Newbie', CAST(0.4 AS Numeric(2, 1)), CAST(0.2 AS Numeric(2, 1)), CAST(0x0000A0540036D38C AS DateTime), CAST(0x0000A0540036D38C AS DateTime))
GO
INSERT [dbo].[tbl_conf_user_profile] ([idUserProfile], [name], [multiplication_factor_sb], [weight_review], [insert_timestamp], [update_timestamp]) VALUES (4, N'Professional', CAST(0.6 AS Numeric(2, 1)), CAST(0.8 AS Numeric(2, 1)), CAST(0x0000A0540036D38C AS DateTime), CAST(0x0000A0540036D38C AS DateTime))
GO
INSERT [dbo].[tbl_conf_user_profile] ([idUserProfile], [name], [multiplication_factor_sb], [weight_review], [insert_timestamp], [update_timestamp]) VALUES (5, N'Power', CAST(5.0 AS Numeric(2, 1)), CAST(0.8 AS Numeric(2, 1)), CAST(0x0000A0540036D38C AS DateTime), CAST(0x0000A0540036D38C AS DateTime))
GO
SET IDENTITY_INSERT [dbo].[tbl_conf_user_profile] OFF
GO
SET IDENTITY_INSERT [dbo].[tbl_conf_user_status] ON 

GO
INSERT [dbo].[tbl_conf_user_status] ([idUserStatus], [name], [insert_timestamp], [update_timestamp]) VALUES (1, N'Pending', CAST(0x0000A0540036D38C AS DateTime), CAST(0x0000A0540036D38C AS DateTime))
GO
INSERT [dbo].[tbl_conf_user_status] ([idUserStatus], [name], [insert_timestamp], [update_timestamp]) VALUES (2, N'Actived', CAST(0x0000A0540036D38C AS DateTime), CAST(0x0000A0540036D38C AS DateTime))
GO
INSERT [dbo].[tbl_conf_user_status] ([idUserStatus], [name], [insert_timestamp], [update_timestamp]) VALUES (3, N'Locked', CAST(0x0000A0540036D38C AS DateTime), CAST(0x0000A0540036D38C AS DateTime))
GO
INSERT [dbo].[tbl_conf_user_status] ([idUserStatus], [name], [insert_timestamp], [update_timestamp]) VALUES (4, N'Deleted', CAST(0x0000A0540036D38C AS DateTime), CAST(0x0000A0540036D38C AS DateTime))
GO
SET IDENTITY_INSERT [dbo].[tbl_conf_user_status] OFF
GO
SET IDENTITY_INSERT [dbo].[tbl_user] ON 

GO
INSERT [dbo].[tbl_user] ([idUser], [idUserStatus], [idUserProfile], [idLanguage], [username], [password], [email], [name], [surname], [fee], [creditsBought], [creditsEarned], [submitBonus], [photoProfile], [lat], [lng], [street], [zip], [town], [region], [country], [phone1], [phone2], [mobilePhone], [verificationCode], [mailingList], [acceptTerms], [insert_timestamp], [update_timestamp], [lastLogin_timestamp], [nextBonusUpdate_timestamp]) VALUES (1, 2, 1, N'en', N'super-gsp', N'7b0303950799495f96a54e411cf2e308020cf279a3e57f7599e897cdc9dfc4c15bcce42c89712add70863d34aff6cad5b1ac294c7bc274058f50844149dd111b', N'info@geostockphoto.com', N'Marco', N'Cannizzaro', CAST(0.00 AS Numeric(3, 2)), CAST(0.00 AS Numeric(6, 2)), CAST(0.00 AS Numeric(6, 2)), -1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, N'verificCod', 1, 1, CAST(0x0000A0540036D38C AS DateTime), CAST(0x0000A0540036D38C AS DateTime), CAST(0x0000A0540036D38C AS DateTime), CAST(0x0000A0540036D38C AS DateTime))
																																																																																																																																																																																															
GO
SET IDENTITY_INSERT [dbo].[tbl_user] OFF
GO
INSERT [dbo].[tbl_photographer] ([idUser], [numPhotos], [rate], [CVSummary], [idCategory1], [idCategory2], [insert_timestamp], [update_timestamp]) VALUES (1, 0, NULL, NULL, 2, 4, CAST(0x0000A0540036D4B8 AS DateTime), CAST(0x0000A0540036D4B8 AS DateTime))
GO
INSERT [dbo].[tbl_photographer] ([idUser], [numPhotos], [rate], [CVSummary], [idCategory1], [idCategory2], [insert_timestamp], [update_timestamp]) VALUES (2, 0, NULL, NULL, 4, 9, CAST(0x0000A0540036D4B8 AS DateTime), CAST(0x0000A0540036D4B8 AS DateTime))
GO
INSERT [dbo].[tbl_photographer] ([idUser], [numPhotos], [rate], [CVSummary], [idCategory1], [idCategory2], [insert_timestamp], [update_timestamp]) VALUES (3, 0, NULL, NULL, 4, 9, CAST(0x0000A0540036D4B8 AS DateTime), CAST(0x0000A0540036D4B8 AS DateTime))
GO
SET IDENTITY_INSERT [dbo].[tbl_conf_duration_rm] ON 

GO
INSERT [dbo].[tbl_conf_duration_rm] ([idDuration], [duration], [insert_timestamp], [update_timestamp]) VALUES (1, N'1 year', CAST(0x0000A0540036D260 AS DateTime), CAST(0x0000A0540036D260 AS DateTime))
GO
INSERT [dbo].[tbl_conf_duration_rm] ([idDuration], [duration], [insert_timestamp], [update_timestamp]) VALUES (2, N'3 year', CAST(0x0000A0540036D260 AS DateTime), CAST(0x0000A0540036D260 AS DateTime))
GO
INSERT [dbo].[tbl_conf_duration_rm] ([idDuration], [duration], [insert_timestamp], [update_timestamp]) VALUES (3, N'5 year', CAST(0x0000A0540036D260 AS DateTime), CAST(0x0000A0540036D260 AS DateTime))
GO
INSERT [dbo].[tbl_conf_duration_rm] ([idDuration], [duration], [insert_timestamp], [update_timestamp]) VALUES (4, N'10 year', CAST(0x0000A0540036D260 AS DateTime), CAST(0x0000A0540036D260 AS DateTime))
GO
INSERT [dbo].[tbl_conf_duration_rm] ([idDuration], [duration], [insert_timestamp], [update_timestamp]) VALUES (5, N'15 year', CAST(0x0000A0540036D260 AS DateTime), CAST(0x0000A0540036D260 AS DateTime))
GO
SET IDENTITY_INSERT [dbo].[tbl_conf_duration_rm] OFF
GO
SET IDENTITY_INSERT [dbo].[tbl_conf_license_rm_type] ON 

GO
INSERT [dbo].[tbl_conf_license_rm_type] ([idRMtype], [nameRMtype], [insert_timestamp], [update_timestamp]) VALUES (1, N'Advertising', CAST(0x0000A0540036D260 AS DateTime), CAST(0x0000A0540036D260 AS DateTime))
GO
INSERT [dbo].[tbl_conf_license_rm_type] ([idRMtype], [nameRMtype], [insert_timestamp], [update_timestamp]) VALUES (2, N'Editorial', CAST(0x0000A0540036D260 AS DateTime), CAST(0x0000A0540036D260 AS DateTime))
GO
INSERT [dbo].[tbl_conf_license_rm_type] ([idRMtype], [nameRMtype], [insert_timestamp], [update_timestamp]) VALUES (3, N'Corporate', CAST(0x0000A0540036D260 AS DateTime), CAST(0x0000A0540036D260 AS DateTime))
GO
INSERT [dbo].[tbl_conf_license_rm_type] ([idRMtype], [nameRMtype], [insert_timestamp], [update_timestamp]) VALUES (4, N'Consumer goods', CAST(0x0000A0540036D260 AS DateTime), CAST(0x0000A0540036D260 AS DateTime))
GO
SET IDENTITY_INSERT [dbo].[tbl_conf_license_rm_type] OFF
GO
SET IDENTITY_INSERT [dbo].[tbl_conf_license_rm_details] ON 

GO
INSERT [dbo].[tbl_conf_license_rm_details] ([idRMdetails], [nameRMdetails], [idRMtype], [insert_timestamp], [update_timestamp]) VALUES (1, N'Web page', 1, CAST(0x0000A0540036D260 AS DateTime), CAST(0x0000A0540036D260 AS DateTime))
GO
INSERT [dbo].[tbl_conf_license_rm_details] ([idRMdetails], [nameRMdetails], [idRMtype], [insert_timestamp], [update_timestamp]) VALUES (2, N'Web banner', 1, CAST(0x0000A0540036D260 AS DateTime), CAST(0x0000A0540036D260 AS DateTime))
GO
INSERT [dbo].[tbl_conf_license_rm_details] ([idRMdetails], [nameRMdetails], [idRMtype], [insert_timestamp], [update_timestamp]) VALUES (3, N'Brochure CD-ROM', 1, CAST(0x0000A0540036D260 AS DateTime), CAST(0x0000A0540036D260 AS DateTime))
GO
INSERT [dbo].[tbl_conf_license_rm_details] ([idRMdetails], [nameRMdetails], [idRMtype], [insert_timestamp], [update_timestamp]) VALUES (4, N'Brochure print', 1, CAST(0x0000A0540036D260 AS DateTime), CAST(0x0000A0540036D260 AS DateTime))
GO
INSERT [dbo].[tbl_conf_license_rm_details] ([idRMdetails], [nameRMdetails], [idRMtype], [insert_timestamp], [update_timestamp]) VALUES (5, N'Television', 1, CAST(0x0000A0540036D260 AS DateTime), CAST(0x0000A0540036D260 AS DateTime))
GO
INSERT [dbo].[tbl_conf_license_rm_details] ([idRMdetails], [nameRMdetails], [idRMtype], [insert_timestamp], [update_timestamp]) VALUES (6, N'Catalog print', 1, CAST(0x0000A0540036D260 AS DateTime), CAST(0x0000A0540036D260 AS DateTime))
GO
INSERT [dbo].[tbl_conf_license_rm_details] ([idRMdetails], [nameRMdetails], [idRMtype], [insert_timestamp], [update_timestamp]) VALUES (7, N'Catalog CD-ROM', 1, CAST(0x0000A0540036D260 AS DateTime), CAST(0x0000A0540036D260 AS DateTime))
GO
INSERT [dbo].[tbl_conf_license_rm_details] ([idRMdetails], [nameRMdetails], [idRMtype], [insert_timestamp], [update_timestamp]) VALUES (8, N'Screen saver', 1, CAST(0x0000A0540036D260 AS DateTime), CAST(0x0000A0540036D260 AS DateTime))
GO
INSERT [dbo].[tbl_conf_license_rm_details] ([idRMdetails], [nameRMdetails], [idRMtype], [insert_timestamp], [update_timestamp]) VALUES (9, N'Billboard/Transit', 1, CAST(0x0000A0540036D260 AS DateTime), CAST(0x0000A0540036D260 AS DateTime))
GO
INSERT [dbo].[tbl_conf_license_rm_details] ([idRMdetails], [nameRMdetails], [idRMtype], [insert_timestamp], [update_timestamp]) VALUES (10, N'Magazine', 1, CAST(0x0000A0540036D260 AS DateTime), CAST(0x0000A0540036D260 AS DateTime))
GO
INSERT [dbo].[tbl_conf_license_rm_details] ([idRMdetails], [nameRMdetails], [idRMtype], [insert_timestamp], [update_timestamp]) VALUES (11, N'Newspaper', 1, CAST(0x0000A0540036D260 AS DateTime), CAST(0x0000A0540036D260 AS DateTime))
GO
INSERT [dbo].[tbl_conf_license_rm_details] ([idRMdetails], [nameRMdetails], [idRMtype], [insert_timestamp], [update_timestamp]) VALUES (12, N'Point of sale', 1, CAST(0x0000A0540036D260 AS DateTime), CAST(0x0000A0540036D260 AS DateTime))
GO
INSERT [dbo].[tbl_conf_license_rm_details] ([idRMdetails], [nameRMdetails], [idRMtype], [insert_timestamp], [update_timestamp]) VALUES (13, N'Direct Mail', 1, CAST(0x0000A0540036D260 AS DateTime), CAST(0x0000A0540036D260 AS DateTime))
GO
INSERT [dbo].[tbl_conf_license_rm_details] ([idRMdetails], [nameRMdetails], [idRMtype], [insert_timestamp], [update_timestamp]) VALUES (14, N'Film', 1, CAST(0x0000A0540036D260 AS DateTime), CAST(0x0000A0540036D260 AS DateTime))
GO
INSERT [dbo].[tbl_conf_license_rm_details] ([idRMdetails], [nameRMdetails], [idRMtype], [insert_timestamp], [update_timestamp]) VALUES (15, N'Book cover', 2, CAST(0x0000A0540036D260 AS DateTime), CAST(0x0000A0540036D260 AS DateTime))
GO
INSERT [dbo].[tbl_conf_license_rm_details] ([idRMdetails], [nameRMdetails], [idRMtype], [insert_timestamp], [update_timestamp]) VALUES (16, N'Book interior', 2, CAST(0x0000A0540036D260 AS DateTime), CAST(0x0000A0540036D260 AS DateTime))
GO
INSERT [dbo].[tbl_conf_license_rm_details] ([idRMdetails], [nameRMdetails], [idRMtype], [insert_timestamp], [update_timestamp]) VALUES (17, N'Film', 2, CAST(0x0000A0540036D260 AS DateTime), CAST(0x0000A0540036D260 AS DateTime))
GO
INSERT [dbo].[tbl_conf_license_rm_details] ([idRMdetails], [nameRMdetails], [idRMtype], [insert_timestamp], [update_timestamp]) VALUES (18, N'Newspaper', 2, CAST(0x0000A0540036D260 AS DateTime), CAST(0x0000A0540036D260 AS DateTime))
GO
INSERT [dbo].[tbl_conf_license_rm_details] ([idRMdetails], [nameRMdetails], [idRMtype], [insert_timestamp], [update_timestamp]) VALUES (19, N'Magazine cover', 2, CAST(0x0000A0540036D260 AS DateTime), CAST(0x0000A0540036D260 AS DateTime))
GO
INSERT [dbo].[tbl_conf_license_rm_details] ([idRMdetails], [nameRMdetails], [idRMtype], [insert_timestamp], [update_timestamp]) VALUES (20, N'Magazine interior', 2, CAST(0x0000A0540036D260 AS DateTime), CAST(0x0000A0540036D260 AS DateTime))
GO
INSERT [dbo].[tbl_conf_license_rm_details] ([idRMdetails], [nameRMdetails], [idRMtype], [insert_timestamp], [update_timestamp]) VALUES (21, N'Television', 2, CAST(0x0000A0540036D260 AS DateTime), CAST(0x0000A0540036D260 AS DateTime))
GO
INSERT [dbo].[tbl_conf_license_rm_details] ([idRMdetails], [nameRMdetails], [idRMtype], [insert_timestamp], [update_timestamp]) VALUES (22, N'Internal print', 3, CAST(0x0000A0540036D260 AS DateTime), CAST(0x0000A0540036D260 AS DateTime))
GO
INSERT [dbo].[tbl_conf_license_rm_details] ([idRMdetails], [nameRMdetails], [idRMtype], [insert_timestamp], [update_timestamp]) VALUES (23, N'Internal digital', 3, CAST(0x0000A0540036D260 AS DateTime), CAST(0x0000A0540036D260 AS DateTime))
GO
INSERT [dbo].[tbl_conf_license_rm_details] ([idRMdetails], [nameRMdetails], [idRMtype], [insert_timestamp], [update_timestamp]) VALUES (24, N'Calendar cover', 4, CAST(0x0000A0540036D260 AS DateTime), CAST(0x0000A0540036D260 AS DateTime))
GO
INSERT [dbo].[tbl_conf_license_rm_details] ([idRMdetails], [nameRMdetails], [idRMtype], [insert_timestamp], [update_timestamp]) VALUES (25, N'Calendar interior', 4, CAST(0x0000A0540036D260 AS DateTime), CAST(0x0000A0540036D260 AS DateTime))
GO
INSERT [dbo].[tbl_conf_license_rm_details] ([idRMdetails], [nameRMdetails], [idRMtype], [insert_timestamp], [update_timestamp]) VALUES (26, N'Posters', 4, CAST(0x0000A0540036D260 AS DateTime), CAST(0x0000A0540036D260 AS DateTime))
GO
INSERT [dbo].[tbl_conf_license_rm_details] ([idRMdetails], [nameRMdetails], [idRMtype], [insert_timestamp], [update_timestamp]) VALUES (27, N'Puzzles', 4, CAST(0x0000A0540036D260 AS DateTime), CAST(0x0000A0540036D260 AS DateTime))
GO
INSERT [dbo].[tbl_conf_license_rm_details] ([idRMdetails], [nameRMdetails], [idRMtype], [insert_timestamp], [update_timestamp]) VALUES (28, N'Postcards', 4, CAST(0x0000A0540036D260 AS DateTime), CAST(0x0000A0540036D260 AS DateTime))
GO
INSERT [dbo].[tbl_conf_license_rm_details] ([idRMdetails], [nameRMdetails], [idRMtype], [insert_timestamp], [update_timestamp]) VALUES (29, N'E-cards', 4, CAST(0x0000A0540036D260 AS DateTime), CAST(0x0000A0540036D260 AS DateTime))
GO
INSERT [dbo].[tbl_conf_license_rm_details] ([idRMdetails], [nameRMdetails], [idRMtype], [insert_timestamp], [update_timestamp]) VALUES (30, N'Greeting Cards', 4, CAST(0x0000A0540036D260 AS DateTime), CAST(0x0000A0540036D260 AS DateTime))
GO
INSERT [dbo].[tbl_conf_license_rm_details] ([idRMdetails], [nameRMdetails], [idRMtype], [insert_timestamp], [update_timestamp]) VALUES (31, N'Packaging', 4, CAST(0x0000A0540036D260 AS DateTime), CAST(0x0000A0540036D260 AS DateTime))
GO
SET IDENTITY_INSERT [dbo].[tbl_conf_license_rm_details] OFF
GO
SET IDENTITY_INSERT [dbo].[tbl_conf_size] ON 

GO
INSERT [dbo].[tbl_conf_size] ([idSize], [code], [maxSize], [insert_timestamp], [update_timestamp]) VALUES (1, N'XS', 300, CAST(0x0000A0540036D260 AS DateTime), CAST(0x0000A0540036D260 AS DateTime))
GO
INSERT [dbo].[tbl_conf_size] ([idSize], [code], [maxSize], [insert_timestamp], [update_timestamp]) VALUES (2, N'S', 430, CAST(0x0000A0540036D260 AS DateTime), CAST(0x0000A0540036D260 AS DateTime))
GO
INSERT [dbo].[tbl_conf_size] ([idSize], [code], [maxSize], [insert_timestamp], [update_timestamp]) VALUES (3, N'M', 1000, CAST(0x0000A0540036D260 AS DateTime), CAST(0x0000A0540036D260 AS DateTime))
GO
INSERT [dbo].[tbl_conf_size] ([idSize], [code], [maxSize], [insert_timestamp], [update_timestamp]) VALUES (4, N'L', 3000, CAST(0x0000A0540036D260 AS DateTime), CAST(0x0000A0540036D260 AS DateTime))
GO
INSERT [dbo].[tbl_conf_size] ([idSize], [code], [maxSize], [insert_timestamp], [update_timestamp]) VALUES (5, N'XL', 6000, CAST(0x0000A0540036D260 AS DateTime), CAST(0x0000A0540036D260 AS DateTime))
GO
INSERT [dbo].[tbl_conf_size] ([idSize], [code], [maxSize], [insert_timestamp], [update_timestamp]) VALUES (6, N'XXL', 15000, CAST(0x0000A0540036D260 AS DateTime), CAST(0x0000A0540036D260 AS DateTime))
GO
SET IDENTITY_INSERT [dbo].[tbl_conf_size] OFF
GO
INSERT [dbo].[tbl_conf_license_type] ([licenseType], [insert_timestamp], [update_timestamp]) VALUES (N'RF', CAST(0x0000A0540036D260 AS DateTime), CAST(0x0000A0540036D260 AS DateTime))
GO
INSERT [dbo].[tbl_conf_license_type] ([licenseType], [insert_timestamp], [update_timestamp]) VALUES (N'RM', CAST(0x0000A0540036D260 AS DateTime), CAST(0x0000A0540036D260 AS DateTime))
GO
SET IDENTITY_INSERT [dbo].[tbl_conf_transaction_type] ON 

GO
INSERT [dbo].[tbl_conf_transaction_type] ([idTransactionType], [name], [insert_timestamp], [update_timestamp]) VALUES (1, N'Sale', CAST(0x0000A0540036D4B8 AS DateTime), CAST(0x0000A0540036D4B8 AS DateTime))
GO
INSERT [dbo].[tbl_conf_transaction_type] ([idTransactionType], [name], [insert_timestamp], [update_timestamp]) VALUES (2, N'Payout', CAST(0x0000A0540036D4B8 AS DateTime), CAST(0x0000A0540036D4B8 AS DateTime))
GO
INSERT [dbo].[tbl_conf_transaction_type] ([idTransactionType], [name], [insert_timestamp], [update_timestamp]) VALUES (3, N'Payin', CAST(0x0000A0540036D4B8 AS DateTime), CAST(0x0000A0540036D4B8 AS DateTime))
GO
SET IDENTITY_INSERT [dbo].[tbl_conf_transaction_type] OFF
GO
SET IDENTITY_INSERT [dbo].[tbl_conf_license] ON 

GO
INSERT [dbo].[tbl_conf_license] ([idLicense], [licenseType], [name], [insert_timestamp], [update_timestamp]) VALUES (1, N'RF', N'RFs', CAST(0x0000A0540036D260 AS DateTime), CAST(0x0000A0540036D260 AS DateTime))
GO
INSERT [dbo].[tbl_conf_license] ([idLicense], [licenseType], [name], [insert_timestamp], [update_timestamp]) VALUES (2, N'RF', N'RFe', CAST(0x0000A0540036D260 AS DateTime), CAST(0x0000A0540036D260 AS DateTime))
GO
INSERT [dbo].[tbl_conf_license] ([idLicense], [licenseType], [name], [insert_timestamp], [update_timestamp]) VALUES (3, N'RM', N'RM', CAST(0x0000A0540036D260 AS DateTime), CAST(0x0000A0540036D260 AS DateTime))
GO
SET IDENTITY_INSERT [dbo].[tbl_conf_license] OFF
GO
INSERT [dbo].[tbl_conf_shopping_opt_default_gsp] ([idLicense], [idSize], [price], [insert_timestamp], [update_timestamp]) VALUES (1, 1, CAST(0.50 AS Numeric(6, 2)), CAST(0x0000A0540036D4B8 AS DateTime), CAST(0x0000A0540036D4B8 AS DateTime))
GO
INSERT [dbo].[tbl_conf_shopping_opt_default_gsp] ([idLicense], [idSize], [price], [insert_timestamp], [update_timestamp]) VALUES (1, 2, CAST(1.00 AS Numeric(6, 2)), CAST(0x0000A0540036D4B8 AS DateTime), CAST(0x0000A0540036D4B8 AS DateTime))
GO
INSERT [dbo].[tbl_conf_shopping_opt_default_gsp] ([idLicense], [idSize], [price], [insert_timestamp], [update_timestamp]) VALUES (1, 3, CAST(2.00 AS Numeric(6, 2)), CAST(0x0000A0540036D4B8 AS DateTime), CAST(0x0000A0540036D4B8 AS DateTime))
GO
INSERT [dbo].[tbl_conf_shopping_opt_default_gsp] ([idLicense], [idSize], [price], [insert_timestamp], [update_timestamp]) VALUES (1, 4, CAST(4.00 AS Numeric(6, 2)), CAST(0x0000A0540036D4B8 AS DateTime), CAST(0x0000A0540036D4B8 AS DateTime))
GO
INSERT [dbo].[tbl_conf_shopping_opt_default_gsp] ([idLicense], [idSize], [price], [insert_timestamp], [update_timestamp]) VALUES (1, 5, CAST(6.00 AS Numeric(6, 2)), CAST(0x0000A0540036D4B8 AS DateTime), CAST(0x0000A0540036D4B8 AS DateTime))
GO
INSERT [dbo].[tbl_conf_shopping_opt_default_gsp] ([idLicense], [idSize], [price], [insert_timestamp], [update_timestamp]) VALUES (1, 6, CAST(8.00 AS Numeric(6, 2)), CAST(0x0000A0540036D4B8 AS DateTime), CAST(0x0000A0540036D4B8 AS DateTime))
GO
INSERT [dbo].[tbl_conf_shopping_opt_default_gsp] ([idLicense], [idSize], [price], [insert_timestamp], [update_timestamp]) VALUES (2, 6, CAST(10.00 AS Numeric(6, 2)), CAST(0x0000A0540036D4B8 AS DateTime), CAST(0x0000A0540036D4B8 AS DateTime))
GO
SET IDENTITY_INSERT [dbo].[tbl_conf_ticket_status] ON 

GO
INSERT [dbo].[tbl_conf_ticket_status] ([idTicketStatus], [name], [insert_timestamp], [update_timestamp]) VALUES (1, N'Pending', CAST(0x0000A0540036D5E4 AS DateTime), CAST(0x0000A0540036D5E4 AS DateTime))
GO
INSERT [dbo].[tbl_conf_ticket_status] ([idTicketStatus], [name], [insert_timestamp], [update_timestamp]) VALUES (2, N'In Progress', CAST(0x0000A0540036D5E4 AS DateTime), CAST(0x0000A0540036D5E4 AS DateTime))
GO
INSERT [dbo].[tbl_conf_ticket_status] ([idTicketStatus], [name], [insert_timestamp], [update_timestamp]) VALUES (3, N'Closed', CAST(0x0000A0540036D5E4 AS DateTime), CAST(0x0000A0540036D5E4 AS DateTime))
GO
SET IDENTITY_INSERT [dbo].[tbl_conf_ticket_status] OFF
GO
SET IDENTITY_INSERT [dbo].[tbl_conf_ticket_type] ON 

GO
INSERT [dbo].[tbl_conf_ticket_type] ([idTicketType], [name], [insert_timestamp], [update_timestamp]) VALUES (1, N'Report Abuse', CAST(0x0000A0540036D5E4 AS DateTime), CAST(0x0000A0540036D5E4 AS DateTime))
GO
INSERT [dbo].[tbl_conf_ticket_type] ([idTicketType], [name], [insert_timestamp], [update_timestamp]) VALUES (2, N'Contact Us', CAST(0x0000A0540036D5E4 AS DateTime), CAST(0x0000A0540036D5E4 AS DateTime))
GO
INSERT [dbo].[tbl_conf_ticket_type] ([idTicketType], [name], [insert_timestamp], [update_timestamp]) VALUES (3, N'Bug', CAST(0x0000A0540036D5E4 AS DateTime), CAST(0x0000A0540036D5E4 AS DateTime))
GO
INSERT [dbo].[tbl_conf_ticket_type] ([idTicketType], [name], [insert_timestamp], [update_timestamp]) VALUES (4, N'Error', CAST(0x0000A0540036D5E4 AS DateTime), CAST(0x0000A0540036D5E4 AS DateTime))
GO
SET IDENTITY_INSERT [dbo].[tbl_conf_ticket_type] OFF
GO
SET IDENTITY_INSERT [dbo].[tbl_conf_review_motivations] ON 

GO
INSERT [dbo].[tbl_conf_review_motivations] ([idMotivation], [motivation], [insert_timestamp], [update_timestamp]) VALUES (1, N'Composition', CAST(0x0000A0540036D38C AS DateTime), CAST(0x0000A0540036D38C AS DateTime))
GO
INSERT [dbo].[tbl_conf_review_motivations] ([idMotivation], [motivation], [insert_timestamp], [update_timestamp]) VALUES (2, N'Noise', CAST(0x0000A0540036D38C AS DateTime), CAST(0x0000A0540036D38C AS DateTime))
GO
INSERT [dbo].[tbl_conf_review_motivations] ([idMotivation], [motivation], [insert_timestamp], [update_timestamp]) VALUES (3, N'Price', CAST(0x0000A0540036D38C AS DateTime), CAST(0x0000A0540036D38C AS DateTime))
GO
INSERT [dbo].[tbl_conf_review_motivations] ([idMotivation], [motivation], [insert_timestamp], [update_timestamp]) VALUES (4, N'Focus', CAST(0x0000A0540036D38C AS DateTime), CAST(0x0000A0540036D38C AS DateTime))
GO
INSERT [dbo].[tbl_conf_review_motivations] ([idMotivation], [motivation], [insert_timestamp], [update_timestamp]) VALUES (5, N'Trademark', CAST(0x0000A0540036D38C AS DateTime), CAST(0x0000A0540036D38C AS DateTime))
GO
INSERT [dbo].[tbl_conf_review_motivations] ([idMotivation], [motivation], [insert_timestamp], [update_timestamp]) VALUES (6, N'Lighting', CAST(0x0000A0540036D38C AS DateTime), CAST(0x0000A0540036D38C AS DateTime))
GO
SET IDENTITY_INSERT [dbo].[tbl_conf_review_motivations] OFF
GO

SET IDENTITY_INSERT [dbo].[tbl_log] OFF
GO
INSERT [dbo].[tbl_conf_buy_credits] ([idCreditsPacket], [description], [amount], [insert_timestamp], [update_timestamp]) VALUES (1, N'0.01    Geostockphoto Credits  10.00 €', CAST(0.01 AS Numeric(5, 2)), CAST(0x0000A0540036D134 AS DateTime), CAST(0x0000A0540036D134 AS DateTime))
GO
INSERT [dbo].[tbl_conf_buy_credits] ([idCreditsPacket], [description], [amount], [insert_timestamp], [update_timestamp]) VALUES (10, N'10    Geostockphoto Credits  10.00 €', CAST(10.00 AS Numeric(5, 2)), CAST(0x0000A0540036D134 AS DateTime), CAST(0x0000A0540036D134 AS DateTime))
GO
INSERT [dbo].[tbl_conf_buy_credits] ([idCreditsPacket], [description], [amount], [insert_timestamp], [update_timestamp]) VALUES (20, N'20    Geostockphoto Credits  18.00 €', CAST(18.00 AS Numeric(5, 2)), CAST(0x0000A0540036D134 AS DateTime), CAST(0x0000A0540036D134 AS DateTime))
GO
INSERT [dbo].[tbl_conf_buy_credits] ([idCreditsPacket], [description], [amount], [insert_timestamp], [update_timestamp]) VALUES (50, N'50    Geostockphoto Credits  44.00 €', CAST(44.00 AS Numeric(5, 2)), CAST(0x0000A0540036D134 AS DateTime), CAST(0x0000A0540036D134 AS DateTime))
GO
INSERT [dbo].[tbl_conf_buy_credits] ([idCreditsPacket], [description], [amount], [insert_timestamp], [update_timestamp]) VALUES (100, N'100   Geostockphoto Credits  85.00 €', CAST(85.00 AS Numeric(5, 2)), CAST(0x0000A0540036D134 AS DateTime), CAST(0x0000A0540036D134 AS DateTime))
GO
INSERT [dbo].[tbl_conf_buy_credits] ([idCreditsPacket], [description], [amount], [insert_timestamp], [update_timestamp]) VALUES (150, N'150   Geostockphoto Credits 110.00 €', CAST(110.00 AS Numeric(5, 2)), CAST(0x0000A0540036D134 AS DateTime), CAST(0x0000A0540036D134 AS DateTime))
GO
INSERT [dbo].[tbl_conf_buy_credits] ([idCreditsPacket], [description], [amount], [insert_timestamp], [update_timestamp]) VALUES (200, N'200   Geostockphoto Credits 180.00 €', CAST(180.00 AS Numeric(5, 2)), CAST(0x0000A0540036D134 AS DateTime), CAST(0x0000A0540036D134 AS DateTime))
GO
INSERT [dbo].[tbl_conf_parameters] ([parameter], [value], [description], [insert_timestamp], [update_timestamp]) VALUES (N'CreditCost', N'0.1', N'The GSP credit value for single photo submitted', CAST(0x0000A0540036D4B8 AS DateTime), CAST(0x0000A0540036D5E4 AS DateTime))
GO
INSERT [dbo].[tbl_conf_parameters] ([parameter], [value], [description], [insert_timestamp], [update_timestamp]) VALUES (N'DefaultFee', N'0.50', N'The fee for a new user. The fee is the commission that the user pays to GSP in each sold photo.', CAST(0x0000A0540036D4B8 AS DateTime), CAST(0x0000A0540036D5E4 AS DateTime))
GO
INSERT [dbo].[tbl_conf_parameters] ([parameter], [value], [description], [insert_timestamp], [update_timestamp]) VALUES (N'DefaultSubmitBonus', N'-1', N'The SubmitBonus for a new user', CAST(0x0000A0540036D4B8 AS DateTime), CAST(0x0000A0540036D5E4 AS DateTime))
GO
INSERT [dbo].[tbl_conf_parameters] ([parameter], [value], [description], [insert_timestamp], [update_timestamp]) VALUES (N'NumberPhotoNewbiePhotographer', N'100', N'The minimum number of approved photos in order to become a newbie-photographer', CAST(0x0000A0540036D4B8 AS DateTime), CAST(0x0000A0540036D5E4 AS DateTime))
GO
INSERT [dbo].[tbl_conf_parameters] ([parameter], [value], [description], [insert_timestamp], [update_timestamp]) VALUES (N'NumberPhotoPowerPhotographer', N'10000', N'The minimum number of approved photos in order to become a power-photographer', CAST(0x0000A0540036D4B8 AS DateTime), CAST(0x0000A0540036D5E4 AS DateTime))
GO
INSERT [dbo].[tbl_conf_parameters] ([parameter], [value], [description], [insert_timestamp], [update_timestamp]) VALUES (N'NumberPhotoProfessionalPhotographer', N'1000', N'The minimum number of approved photos in order to become a professional-photographer', CAST(0x0000A0540036D4B8 AS DateTime), CAST(0x0000A0540036D5E4 AS DateTime))
GO
INSERT [dbo].[tbl_conf_parameters] ([parameter], [value], [description], [insert_timestamp], [update_timestamp]) VALUES (N'PayoutThreshold', N'50', N'The minimum credit value that allows user to get credit from GSP', CAST(0x0000A0540036D4B8 AS DateTime), CAST(0x0000A0540036D5E4 AS DateTime))
GO
INSERT [dbo].[tbl_conf_parameters] ([parameter], [value], [description], [insert_timestamp], [update_timestamp]) VALUES (N'RatePhotoNewbiePhotographer', N'3', N'The minum rate of approved foto in order to become a newbie-photographer', CAST(0x0000A0540036D4B8 AS DateTime), CAST(0x0000A0540036D5E4 AS DateTime))
GO
INSERT [dbo].[tbl_conf_parameters] ([parameter], [value], [description], [insert_timestamp], [update_timestamp]) VALUES (N'RatePhotoPowerPhotographer', N'5', N'The minum rate of approved foto in order to become a power-photographer', CAST(0x0000A0540036D4B8 AS DateTime), CAST(0x0000A0540036D5E4 AS DateTime))
GO
INSERT [dbo].[tbl_conf_parameters] ([parameter], [value], [description], [insert_timestamp], [update_timestamp]) VALUES (N'RatePhotoProfessionalPhotographer', N'4', N'The minum rate of approved foto in order to become a professional-photographer', CAST(0x0000A0540036D4B8 AS DateTime), CAST(0x0000A0540036D5E4 AS DateTime))
GO
INSERT [dbo].[tbl_conf_parameters] ([parameter], [value], [description], [insert_timestamp], [update_timestamp]) VALUES (N'RepeatedWordsCountForApproval', N'100', N'The number of words repeated and added by users into autocomplete fields', CAST(0x0000A0540036D4B8 AS DateTime), CAST(0x0000A0540036D5E4 AS DateTime))
GO
INSERT [dbo].[tbl_conf_parameters] ([parameter], [value], [description], [insert_timestamp], [update_timestamp]) VALUES (N'ReportAbuseMailTo', N'report-abuse@geostockphoto.com', N'Email to send if a report abuse is added', CAST(0x0000A0540036D4B8 AS DateTime), CAST(0x0000A0540036D5E4 AS DateTime))
GO
INSERT [dbo].[tbl_conf_parameters] ([parameter], [value], [description], [insert_timestamp], [update_timestamp]) VALUES (N'SubmitCost', N'1', N'The GSP submitBonus value for single photo submitted', CAST(0x0000A0540036D4B8 AS DateTime), CAST(0x0000A0540036D5E4 AS DateTime))
GO
INSERT [dbo].[tbl_conf_parameters] ([parameter], [value], [description], [insert_timestamp], [update_timestamp]) VALUES (N'TimeTakenBNphoto', N'86400', N'Time interval (24 hours) in which a Breaking News Photo must be submitted after it has been taken', CAST(0x0000A0540036D4B8 AS DateTime), CAST(0x0000A0540036D5E4 AS DateTime))
GO
INSERT [dbo].[tbl_conf_parameters] ([parameter], [value], [description], [insert_timestamp], [update_timestamp]) VALUES (N'TimeWindowBonusUpdate', N'1296000', N'The number of seconds (15 days) between the update of the submit bonus', CAST(0x0000A0540036D4B8 AS DateTime), CAST(0x0000A0540036D5E4 AS DateTime))
GO
INSERT [dbo].[tbl_conf_parameters] ([parameter], [value], [description], [insert_timestamp], [update_timestamp]) VALUES (N'TimeWindowPhotoDownload', N'1209600', N'The number of seconds (2 weeks) that allow the user to download purchased photo', CAST(0x0000A0540036D4B8 AS DateTime), CAST(0x0000A0540036D5E4 AS DateTime))
GO
INSERT [dbo].[tbl_conf_parameters] ([parameter], [value], [description], [insert_timestamp], [update_timestamp]) VALUES (N'FbAppId', N'402630783131751', N'Facebook Application ID', CAST(0x0000A0540036D4B8 AS DateTime), CAST(0x0000A0540036D5E4 AS DateTime))
GO
INSERT [dbo].[tbl_conf_parameters] ([parameter], [value], [description], [insert_timestamp], [update_timestamp]) VALUES (N'FbSecret', N'd04bb793bb9d2962d6728028fc4d25fd', N'Facebook secret', CAST(0x0000A0540036D4B8 AS DateTime), CAST(0x0000A0540036D5E4 AS DateTime))
GO
INSERT [dbo].[tbl_conf_paypal] ([environment], [apiUserName], [apiPassword], [apiSignature], [version], [endPoint], [redirectUrl], [urlJSdigitalGoods], [insert_timestamp], [update_timestamp]) VALUES (N'LIVE', N'paypal_api1.geostockphoto.com', N'KGAMKD96DFAFXKEY', N'A7KZ2bA0jt3Wgp38vM9RP.OSyvPWA.0JPdnYDHfF99iNdcG3bjhx6ZzR', N'84.0', N'https://api-3t.paypal.com/nvp', N'https://www.paypal.com/incontext?token=', N'https://www.paypalobjects.com/js/external/dg.js', CAST(0x0000A0540036FA38 AS DateTime), CAST(0x0000A0540036FA38 AS DateTime))
GO
INSERT [dbo].[tbl_conf_paypal] ([environment], [apiUserName], [apiPassword], [apiSignature], [version], [endPoint], [redirectUrl], [urlJSdigitalGoods], [insert_timestamp], [update_timestamp]) VALUES (N'SANDBOX', N'marco_1327721282_biz_api1.geostockphoto.com', N'1327721322', N'ACeF78uYbWw5PAqdQGdsZ23o4BqpAAfse6f-QZvdF7pMu7WTyVl3wAmM', N'84.0', N'https://api-3t.sandbox.paypal.com/nvp', N'https://www.sandbox.paypal.com/incontext?token=', N'https://www.paypalobjects.com/js/external/dg.js', CAST(0x0000A0540036FA38 AS DateTime), CAST(0x0000A0540036FA38 AS DateTime))
GO
INSERT [dbo].[tbl_conf_paypal] ([environment], [apiUserName], [apiPassword], [apiSignature], [version], [endPoint], [redirectUrl], [urlJSdigitalGoods], [insert_timestamp], [update_timestamp]) VALUES (N'SANDBOX2', N'gaspar_1328711041_biz_api1.geostockphoto.com', N'1328711070', N'AR.6TiNhoQHY.EYlugF36nIbXM51Axo3NqB-S1ChOd6zCdEJRJByEZZi', N'84.0', N'https://api-3t.sandbox.paypal.com/nvp', N'https://www.sandbox.paypal.com/incontext?token=', N'https://www.paypalobjects.com/js/external/dg.js', CAST(0x0000A0540036FA38 AS DateTime), CAST(0x0000A0540036FA38 AS DateTime))
GO
