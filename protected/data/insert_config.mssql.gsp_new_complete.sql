GO
SET IDENTITY_INSERT [dbo].[tbl_conf_photo_type] ON 
GO
INSERT [dbo].[tbl_conf_photo_type] ([idPhotoType], [name], [insert_timestamp], [update_timestamp]) VALUES (1, N'High-Quality', CAST(0x0000A0540036D260 AS DateTime), CAST(0x0000A0540036D260 AS DateTime))
GO
INSERT [dbo].[tbl_conf_photo_type] ([idPhotoType], [name], [insert_timestamp], [update_timestamp]) VALUES (2, N'Breaking News', CAST(0x0000A0540036D260 AS DateTime), CAST(0x0000A0540036D260 AS DateTime))
GO
SET IDENTITY_INSERT [dbo].[tbl_conf_photo_type] OFF


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
INSERT [dbo].[tbl_user] ([idUser], [idUserStatus], [idUserProfile], [idLanguage], [username], [password], [email], [name], [surname], [fee], [creditsBought], [creditsEarned], [submitBonus], [photoProfile], [lat], [lng], [town], [country], [mobilePhone], [verificationCode], [mailingList], [acceptTerms], [insert_timestamp], [update_timestamp], [lastLogin_timestamp], [nextBonusUpdate_timestamp]) VALUES (1, 2, 1, N'en', N'super.gsp', N'aab53e33623d983aa05101269f30ea8cc36ee37c2b7d9144d67f7f4d54f8edbb0279348cdfc4a55f9be1204d22aad5fcfb630ec97b8dd65152f6ab3511be2e5d', N'info@geostockphoto.com', N'Marco', N'Cannizzaro', CAST(0.00 AS Numeric(3, 2)), CAST(0.00 AS Numeric(6, 2)), CAST(0.00 AS Numeric(6, 2)), -1, 0, NULL, NULL, NULL, NULL, NULL, N'verificCod', 1, 1, CAST(0x0000A0540036D38C AS DateTime), CAST(0x0000A0540036D38C AS DateTime), CAST(0x0000A0540036D38C AS DateTime), CAST(0x0000A0540036D38C AS DateTime))
GO
SET IDENTITY_INSERT [dbo].[tbl_user] OFF
GO

INSERT [dbo].[tbl_photographer] ([idUser], [CVSummary], [insert_timestamp], [update_timestamp]) VALUES (1, NULL, CAST(0x0000A0540036D4B8 AS DateTime), CAST(0x0000A0540036D4B8 AS DateTime))
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



/*ALL INSERT, DELETE UPDATE here */
SET IDENTITY_INSERT [dbo].[tbl_conf_size] ON
GO
insert INTO tbl_conf_size (idSize, code) VALUES (0, 'Original');
GO
SET IDENTITY_INSERT [dbo].[tbl_conf_size] OFF
GO

UPDATE tbl_conf_shopping_opt_default_gsp SET idSize=0 WHERE idLicense=2
GO
INSERT INTO [dbo].[tbl_conf_product_status]([name]) VALUES ('Pre Pending');
GO
INSERT INTO [dbo].[tbl_conf_roles]  ([name]) VALUES ('Admin');
GO
INSERT INTO [dbo].[tbl_conf_roles]  ([name]) VALUES ('Editor');
GO


INSERT INTO tbl_conf_review_motivations (motivation) VALUES ('Dust/Sensor spots');
GO
INSERT INTO tbl_conf_review_motivations (motivation) VALUES ('CA/Fringing');
GO
INSERT INTO tbl_conf_review_motivations (motivation) VALUES ('Overfiltered/Overprocessed');
GO

INSERT INTO tbl_conf_duration_rm (duration) VALUES ('3 months');
GO
INSERT INTO tbl_conf_duration_rm (duration) VALUES ('6 months');
GO
/****** ENDT RELEASE ConfParameters 11/11/2012 ********************************************************************************************************************************/

/****** START RELEASE ConfTicketException 28/06/2013 ********************************************************************************************************************************/

INSERT INTO [dbo].[tbl_conf_parameters]([parameter],[value],[description],[insert_timestamp],[update_timestamp]) VALUES ('System-exception','system-exception@geostockphoto.com','Email for exception reporting error', SYSDATETIME(), SYSDATETIME())

/****** END RELEASE ConfTicketException 28/06/2013 ********************************************************************************************************************************/


/****** START RELEASE EnableSales 28/06/2013 ********************************************************************************************************************************/

INSERT INTO [dbo].[tbl_conf_parameters]([parameter],[value],[description],[insert_timestamp],[update_timestamp]) VALUES ('EnableSales',0,'Block all sales when value is 0. Only Admins can still buy photos.', SYSDATETIME(), SYSDATETIME())

/****** END RELEASE EnableSales 28/06/2013 ********************************************************************************************************************************/


/****** START RELEASE AddStandardFee 21/09/2013 ********************************************************************************************************************************/

update tbl_conf_user_profile set fee=0.5 where idUserProfile=2
update tbl_conf_user_profile set fee=0.6 where idUserProfile=3
update tbl_conf_user_profile set fee=0.7 where idUserProfile=4
update tbl_conf_user_profile set fee=0.8 where idUserProfile=5

/****** END RELEASE AddStandardFee 21/09/2013 ********************************************************************************************************************************/


/****** START RELEASE AddPromotion 21/09/2013 ********************************************************************************************************************************/
insert tbl_conf_promotions(name, feePromotion, duration, enable) values('100x100x100', 1, 'December 31th 2013', 1)
/****** END RELEASE AddPromotion 21/09/2013 ********************************************************************************************************************************/


/****** START CHANGE EURO TO DOLLAR 15/09/2013 ********************************************************************************************************************************/

BEGIN TRANSACTION
GO
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO


update tbl_conf_buy_credits set description='0.01    Geostockphoto Credits  10.00 $' where idCreditsPacket=1;
update tbl_conf_buy_credits set description='10    Geostockphoto Credits  10.00 $' where idCreditsPacket=10;
update tbl_conf_buy_credits set description='20    Geostockphoto Credits  18.00 $' where idCreditsPacket=20;
update tbl_conf_buy_credits set description='50    Geostockphoto Credits  44.00 $' where idCreditsPacket=50;
update tbl_conf_buy_credits set description='100   Geostockphoto Credits  85.00 $' where idCreditsPacket=100;
update tbl_conf_buy_credits set description='150   Geostockphoto Credits 110.00 $' where idCreditsPacket=150;
update tbl_conf_buy_credits set description='200   Geostockphoto Credits 180.00 $' where idCreditsPacket=200;


COMMIT

/****** END CHANGE EURO TO DOLLAR 15/09/2013  ********************************************************************************************************************************/
-- DONE: LOCAL, AZURE


/****** START CHANGE EURO TO DOLLAR AND PAYMENTS 20/09/2013 ********************************************************************************************************************************/

BEGIN TRANSACTION
GO
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO

INSERT INTO [dbo].[tbl_conf_parameters]([parameter],[value],[description],[insert_timestamp],[update_timestamp]) VALUES ('AdminConvertPaymentEmail','info@geostockphoto.com','Email for notify Convert CreditsPayment', SYSDATETIME(), SYSDATETIME())
INSERT INTO [dbo].[tbl_conf_parameters]([parameter],[value],[description],[insert_timestamp],[update_timestamp]) VALUES ('Currency','USD','Settings currency for Payments', SYSDATETIME(), SYSDATETIME())

COMMIT

/****** END CHANGE EURO TO DOLLAR AND PAYMENTS 20/09/2013  ********************************************************************************************************************************/
-- DONE: LOCAL, AZURE



/****** START CHANGE PRICES 18/09/2013 ********************************************************************************************************************************/

BEGIN TRANSACTION
GO
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO

delete from tbl_conf_shopping_opt_default_gsp where idSize=1
delete from tbl_shopping_opt_photo where idSize=1
delete from tbl_shopping_opt_photo_rm where idSize=1
delete from tbl_transaction_photo_rf where idSize=1
delete from tbl_transaction_photo_rm where idSize=1
delete from tbl_shopping_opt_user_default_rf where idSize=1
delete from tbl_shopping_opt_user_default_rm where idSize=1
delete from tbl_conf_size where idSize=1
update tbl_conf_size set code='XS' where idSize=2;
update tbl_conf_size set code='S' where idSize=3;
update tbl_conf_size set code='M' where idSize=4;
update tbl_conf_size set code='L' where idSize=5;
update tbl_conf_size set code='XL' where idSize=6;
update tbl_conf_shopping_opt_default_gsp set price=3 where idSize=3
update tbl_conf_shopping_opt_default_gsp set price=5 where idSize=4
update tbl_conf_shopping_opt_default_gsp set price=7 where idSize=5
update tbl_conf_shopping_opt_default_gsp set price=9 where idSize=6
update tbl_conf_shopping_opt_default_gsp set price=20 where idSize=0
/* Update existing photos */
update tbl_shopping_opt_photo set price=3 where idSize=3 and price=2
update tbl_shopping_opt_photo set price=5 where idSize=4 and price=4
update tbl_shopping_opt_photo set price=7 where idSize=5 and price=6
update tbl_shopping_opt_photo set price=9 where idSize=6 and price=8
update tbl_shopping_opt_photo set price=20 where idSize=0 and price=10


COMMIT

/****** END RELEASE CHANGE PRICES 18/09/2013 ********************************************************************************************************************************/
-- DONE: LOCAL, PROD


/****** START CONF PERSONAL CONTACTS CONF 28/09/2013 ********************************************************************************************************************************/


BEGIN TRANSACTION
GO
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO


INSERT INTO [dbo].[tbl_conf_user_contact_type]([name],[uriStandard],[regexpr]) VALUES ('Facebook','https://www.facebook.com/' ,'/(https?:\/\/)?(www\.)?(facebook)([a-zA-Z0-9_%]*)\b\.[a-z]{2,4}(\.[a-z]{2})?((\/[a-zA-Z0-9_%]*)+)?(\.[a-z]*)?/i')
INSERT INTO [dbo].[tbl_conf_user_contact_type]([name] ,[uriStandard] ,[regexpr]) VALUES ('Twitter','https://twitter.com/' ,'/(https?:\/\/)?(www\.)?(twitter)([a-zA-Z0-9_%]*)\b\.[a-z]{2,4}(\.[a-z]{2})?((\/[a-zA-Z0-9_%]*)+)?(\.[a-z]*)?/i')  
INSERT INTO [dbo].[tbl_conf_user_contact_type]([name] ,[uriStandard] ,[regexpr]) VALUES ('Linkedin','https://www.linkedin.com/' ,'/(https?:\/\/)?(www\.)?(linkedin)([a-zA-Z0-9_%]*)\b\.[a-z]{2,4}(\.[a-z]{2})?((\/[a-zA-Z0-9_%]*)+)?(\.[a-z]*)?/i')  
INSERT INTO [dbo].[tbl_conf_user_contact_type]([name] ,[uriStandard] ,[regexpr]) VALUES ('Flickr','https://www.flickr.com' ,'/(https?:\/\/)?(www\.)?(flickr)([a-zA-Z0-9_%]*)\b\.[a-z]{2,4}(\.[a-z]{2})?((\/[a-zA-Z0-9_%]*)+)?(\.[a-z]*)?/i')  
INSERT INTO [dbo].[tbl_conf_user_contact_type]([name] ,[uriStandard] ,[regexpr]) VALUES ('Panoramio','http://www.panoramio.com/' ,'/(https?:\/\/)?(www\.)?(panoramio)([a-zA-Z0-9_%]*)\b\.[a-z]{2,4}(\.[a-z]{2})?((\/[a-zA-Z0-9_%]*)+)?(\.[a-z]*)?/i')  
INSERT INTO [dbo].[tbl_conf_user_contact_type]([name] ,[uriStandard] ,[regexpr]) VALUES ('Pinterest','https://www.pinterest.com/' ,'/(https?:\/\/)?(www\.)?(pinterest)([a-zA-Z0-9_%]*)\b\.[a-z]{2,4}(\.[a-z]{2})?((\/[a-zA-Z0-9_%]*)+)?(\.[a-z]*)?/i') 
INSERT INTO [dbo].[tbl_conf_user_contact_type]([name] ,[uriStandard] ,[regexpr]) VALUES ('Personal Blog','' ,'/(https?:\/\/)?(www\.)?([a-zA-Z0-9_%]*)\b\.[a-z]{2,4}(\.[a-z]{2})?((\/[a-zA-Z0-9_%]*)+)?(\.[a-z]*)?/i')  
INSERT INTO [dbo].[tbl_conf_user_contact_type]([name] ,[uriStandard] ,[regexpr]) VALUES ('Google','https://plus.google.com' ,'/(https?:\/\/)?(www\.)?(plus.google)([a-zA-Z0-9_%]*)\b\.[a-z]{2,4}(\.[a-z]{2})?((\/[a-zA-Z0-9_%]*)+)?(\.[a-z]*)?/i')  
INSERT INTO [dbo].[tbl_conf_user_contact_type]([name] ,[uriStandard] ,[regexpr]) VALUES ('Email','' ,'/[a-zA-Z0-9-]{1,}@([a-zA-Z\.])?[a-zA-Z]{1,}\.[a-zA-Z]{1,4}/i')  

INSERT INTO [dbo].[tbl_conf_parameters] ([parameter], [value], [description]) VALUES ('PersonalStatisticsPhotoNumberThreshold', '10','Number of approved photos owned by photographers for showing Personal Statistics')
INSERT INTO [dbo].[tbl_conf_parameters] ([parameter], [value], [description]) VALUES ('PersonalInfoPhotoNumberThreshold', '100','Number of approved photos owned by photographers for showing Personal Info')
INSERT INTO [dbo].[tbl_conf_parameters] ([parameter], [value], [description]) VALUES ('PersonalContactsPhotoNumberThreshold', '1000','Number of approved photos owned by photographers for showing Personal Contacts')


COMMIT
/****** END CONF PERSONAL CONTACTS CONF 28/09/2013 ********************************************************************************************************************************/
-- DONE: LOCAL, AZURE


/****** START CONF PERSONAL CONTACTS CONF 28/09/2013 ********************************************************************************************************************************/


BEGIN TRANSACTION
GO
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO


INSERT INTO [dbo].[tbl_conf_user_contact_type]([name],[uriStandard],[regexpr]) VALUES ('Facebook','https://www.facebook.com/' ,'/(https?:\/\/)?(www\.)?(facebook)([a-zA-Z0-9_%]*)\b\.[a-z]{2,4}(\.[a-z]{2})?((\/[a-zA-Z0-9_%]*)+)?(\.[a-z]*)?/i')
INSERT INTO [dbo].[tbl_conf_user_contact_type]([name] ,[uriStandard] ,[regexpr]) VALUES ('Twitter','https://twitter.com/' ,'/(https?:\/\/)?(www\.)?(twitter)([a-zA-Z0-9_%]*)\b\.[a-z]{2,4}(\.[a-z]{2})?((\/[a-zA-Z0-9_%]*)+)?(\.[a-z]*)?/i')  
INSERT INTO [dbo].[tbl_conf_user_contact_type]([name] ,[uriStandard] ,[regexpr]) VALUES ('Linkedin','https://www.linkedin.com/' ,'/(https?:\/\/)?(www\.)?(linkedin)([a-zA-Z0-9_%]*)\b\.[a-z]{2,4}(\.[a-z]{2})?((\/[a-zA-Z0-9_%]*)+)?(\.[a-z]*)?/i')  
INSERT INTO [dbo].[tbl_conf_user_contact_type]([name] ,[uriStandard] ,[regexpr]) VALUES ('Flickr','https://www.flickr.com' ,'/(https?:\/\/)?(www\.)?(flickr)([a-zA-Z0-9_%]*)\b\.[a-z]{2,4}(\.[a-z]{2})?((\/[a-zA-Z0-9_%]*)+)?(\.[a-z]*)?/i')  
INSERT INTO [dbo].[tbl_conf_user_contact_type]([name] ,[uriStandard] ,[regexpr]) VALUES ('Panoramio','http://www.panoramio.com/' ,'/(https?:\/\/)?(www\.)?(panoramio)([a-zA-Z0-9_%]*)\b\.[a-z]{2,4}(\.[a-z]{2})?((\/[a-zA-Z0-9_%]*)+)?(\.[a-z]*)?/i')  
INSERT INTO [dbo].[tbl_conf_user_contact_type]([name] ,[uriStandard] ,[regexpr]) VALUES ('Pinterest','https://www.pinterest.com/' ,'/(https?:\/\/)?(www\.)?(pinterest)([a-zA-Z0-9_%]*)\b\.[a-z]{2,4}(\.[a-z]{2})?((\/[a-zA-Z0-9_%]*)+)?(\.[a-z]*)?/i') 
INSERT INTO [dbo].[tbl_conf_user_contact_type]([name] ,[uriStandard] ,[regexpr]) VALUES ('Personal Blog','' ,'/(https?:\/\/)?(www\.)?([a-zA-Z0-9_%]*)\b\.[a-z]{2,4}(\.[a-z]{2})?((\/[a-zA-Z0-9_%]*)+)?(\.[a-z]*)?/i')  
INSERT INTO [dbo].[tbl_conf_user_contact_type]([name] ,[uriStandard] ,[regexpr]) VALUES ('Google','https://plus.google.com' ,'/(https?:\/\/)?(www\.)?(plus.google)([a-zA-Z0-9_%]*)\b\.[a-z]{2,4}(\.[a-z]{2})?((\/[a-zA-Z0-9_%]*)+)?(\.[a-z]*)?/i')  
INSERT INTO [dbo].[tbl_conf_user_contact_type]([name] ,[uriStandard] ,[regexpr]) VALUES ('Email','' ,'/[a-zA-Z0-9-]{1,}@([a-zA-Z\.])?[a-zA-Z]{1,}\.[a-zA-Z]{1,4}/i')  

INSERT INTO [dbo].[tbl_conf_parameters] ([parameter], [value], [description]) VALUES ('PersonalStatisticsPhotoNumberThreshold', '10','Number of approved photos owned by photographers for showing Personal Statistics')
INSERT INTO [dbo].[tbl_conf_parameters] ([parameter], [value], [description]) VALUES ('PersonalInfoPhotoNumberThreshold', '100','Number of approved photos owned by photographers for showing Personal Info')
INSERT INTO [dbo].[tbl_conf_parameters] ([parameter], [value], [description]) VALUES ('PersonalContactsPhotoNumberThreshold', '1000','Number of approved photos owned by photographers for showing Personal Contacts')


COMMIT
/****** END CONF PERSONAL CONTACTS CONF 28/09/2013 ********************************************************************************************************************************/
-- DONE: LOCAL, AZURE



/****** START ADD SO DEFAULT GSP RM 05/10/2013 ********************************************************************************************************************************/

BEGIN TRANSACTION
GO
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO

delete from tbl_shopping_opt_photo_rm where idDuration=2 or idDuration=3 or idDuration=4 or idDuration=5
update tbl_shopping_opt_photo_rm set idDuration=3 where idDuration=1
update tbl_shopping_opt_photo_rm set idDuration=1 where idDuration=6
update tbl_shopping_opt_photo_rm set idDuration=2 where idDuration=7
delete from tbl_shopping_opt_photo_rm where idRMdetails=2 or idRMdetails=4 or idRMdetails=6 or idRMdetails=7 or
	idRMdetails=8 or idRMdetails=10 or idRMdetails=14 or idRMdetails=17 or idRMdetails=30

delete from tbl_shopping_opt_user_default_rm where idDuration=2 or idDuration=3 or idDuration=4 or idDuration=5
update tbl_shopping_opt_user_default_rm set idDuration=3 where idDuration=1
update tbl_shopping_opt_user_default_rm set idDuration=1 where idDuration=6
update tbl_shopping_opt_user_default_rm set idDuration=2 where idDuration=7
delete from tbl_shopping_opt_user_default_rm where idRMdetails=2 or idRMdetails=4 or idRMdetails=6 or idRMdetails=7 or
	idRMdetails=8 or idRMdetails=10 or idRMdetails=14 or idRMdetails=17 or idRMdetails=30

update tbl_conf_duration_rm set duration='3 months' where idDuration=1;
update tbl_conf_duration_rm set duration='6 months' where idDuration=2;
update tbl_conf_duration_rm set duration='1 year' where idDuration=3;
update tbl_conf_duration_rm set duration='2 years' where idDuration=4;
delete from tbl_conf_duration_rm where idDuration=5 or idDuration=6 or idDuration=7

update tbl_conf_license_rm_details set nameRMdetails='Web' where idRMdetails=1
delete from tbl_conf_license_rm_details where idRMdetails=2
update tbl_conf_license_rm_details set nameRMdetails='CD-ROM' where idRMdetails=3
delete from tbl_conf_license_rm_details where idRMdetails=4
delete from tbl_conf_license_rm_details where idRMdetails=6
delete from tbl_conf_license_rm_details where idRMdetails=7
delete from tbl_conf_license_rm_details where idRMdetails=8
delete from tbl_conf_license_rm_details where idRMdetails=10
update tbl_conf_license_rm_details set nameRMdetails='Newspaper/Magazine' where idRMdetails=11
delete from tbl_conf_license_rm_details where idRMdetails=14
delete from tbl_conf_license_rm_details where idRMdetails=17
delete from tbl_conf_license_rm_details where idRMdetails=30

INSERT [dbo].[tbl_conf_shopping_opt_default_gsp_rm] ([idRMdetails], [idSize], [idDuration], [price]) VALUES (1, 0, 1, CAST(100.00 AS Numeric(6, 2)))
INSERT [dbo].[tbl_conf_shopping_opt_default_gsp_rm] ([idRMdetails], [idSize], [idDuration], [price]) VALUES (3, 0, 1, CAST(170.00 AS Numeric(6, 2)))
INSERT [dbo].[tbl_conf_shopping_opt_default_gsp_rm] ([idRMdetails], [idSize], [idDuration], [price]) VALUES (5, 0, 1, CAST(2000.00 AS Numeric(6, 2)))
INSERT [dbo].[tbl_conf_shopping_opt_default_gsp_rm] ([idRMdetails], [idSize], [idDuration], [price]) VALUES (9, 0, 1, CAST(3750.00 AS Numeric(6, 2)))
INSERT [dbo].[tbl_conf_shopping_opt_default_gsp_rm] ([idRMdetails], [idSize], [idDuration], [price]) VALUES (11, 0, 1, CAST(4000.00 AS Numeric(6, 2)))
INSERT [dbo].[tbl_conf_shopping_opt_default_gsp_rm] ([idRMdetails], [idSize], [idDuration], [price]) VALUES (12, 0, 1, CAST(3500.00 AS Numeric(6, 2)))
INSERT [dbo].[tbl_conf_shopping_opt_default_gsp_rm] ([idRMdetails], [idSize], [idDuration], [price]) VALUES (13, 0, 1, CAST(780.00 AS Numeric(6, 2)))
INSERT [dbo].[tbl_conf_shopping_opt_default_gsp_rm] ([idRMdetails], [idSize], [idDuration], [price]) VALUES (15, 0, 1, CAST(600.00 AS Numeric(6, 2)))
INSERT [dbo].[tbl_conf_shopping_opt_default_gsp_rm] ([idRMdetails], [idSize], [idDuration], [price]) VALUES (16, 0, 1, CAST(170.00 AS Numeric(6, 2)))
INSERT [dbo].[tbl_conf_shopping_opt_default_gsp_rm] ([idRMdetails], [idSize], [idDuration], [price]) VALUES (18, 0, 1, CAST(500.00 AS Numeric(6, 2)))
INSERT [dbo].[tbl_conf_shopping_opt_default_gsp_rm] ([idRMdetails], [idSize], [idDuration], [price]) VALUES (19, 0, 1, CAST(800.00 AS Numeric(6, 2)))
INSERT [dbo].[tbl_conf_shopping_opt_default_gsp_rm] ([idRMdetails], [idSize], [idDuration], [price]) VALUES (20, 0, 1, CAST(450.00 AS Numeric(6, 2)))
INSERT [dbo].[tbl_conf_shopping_opt_default_gsp_rm] ([idRMdetails], [idSize], [idDuration], [price]) VALUES (21, 0, 1, CAST(350.00 AS Numeric(6, 2)))
INSERT [dbo].[tbl_conf_shopping_opt_default_gsp_rm] ([idRMdetails], [idSize], [idDuration], [price]) VALUES (22, 0, 1, CAST(350.00 AS Numeric(6, 2)))
INSERT [dbo].[tbl_conf_shopping_opt_default_gsp_rm] ([idRMdetails], [idSize], [idDuration], [price]) VALUES (23, 0, 1, CAST(500.00 AS Numeric(6, 2)))
INSERT [dbo].[tbl_conf_shopping_opt_default_gsp_rm] ([idRMdetails], [idSize], [idDuration], [price]) VALUES (24, 0, 1, CAST(700.00 AS Numeric(6, 2)))
INSERT [dbo].[tbl_conf_shopping_opt_default_gsp_rm] ([idRMdetails], [idSize], [idDuration], [price]) VALUES (25, 0, 1, CAST(500.00 AS Numeric(6, 2)))
INSERT [dbo].[tbl_conf_shopping_opt_default_gsp_rm] ([idRMdetails], [idSize], [idDuration], [price]) VALUES (26, 0, 1, CAST(1150.00 AS Numeric(6, 2)))
INSERT [dbo].[tbl_conf_shopping_opt_default_gsp_rm] ([idRMdetails], [idSize], [idDuration], [price]) VALUES (27, 0, 1, CAST(700.00 AS Numeric(6, 2)))
INSERT [dbo].[tbl_conf_shopping_opt_default_gsp_rm] ([idRMdetails], [idSize], [idDuration], [price]) VALUES (28, 0, 1, CAST(400.00 AS Numeric(6, 2)))
INSERT [dbo].[tbl_conf_shopping_opt_default_gsp_rm] ([idRMdetails], [idSize], [idDuration], [price]) VALUES (29, 0, 1, CAST(450.00 AS Numeric(6, 2)))
INSERT [dbo].[tbl_conf_shopping_opt_default_gsp_rm] ([idRMdetails], [idSize], [idDuration], [price]) VALUES (31, 0, 1, CAST(450.00 AS Numeric(6, 2)))
GO

update tbl_conf_duration_rm set multFact=1 where idDuration=1
update tbl_conf_duration_rm set multFact=1.2 where idDuration=2
update tbl_conf_duration_rm set multFact=1.5 where idDuration=6
update tbl_conf_duration_rm set multFact=1.7 where idDuration=7

COMMIT

/****** END RELEASE ADD SO DEFAULT GSP RM 05/10/2013 ********************************************************************************************************************************/
-- DONE: LOCAL, PROD