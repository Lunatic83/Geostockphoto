rmdir /S /Q C:\inetpub\wwwroot\workspace\geostockphoto_emu\PhpOnAzure.Web\css\
rmdir /S /Q C:\inetpub\wwwroot\workspace\geostockphoto_emu\PhpOnAzure.Web\framework\
rmdir /S /Q C:\inetpub\wwwroot\workspace\geostockphoto_emu\PhpOnAzure.Web\images\
rmdir /S /Q C:\inetpub\wwwroot\workspace\geostockphoto_emu\PhpOnAzure.Web\js\
rmdir /S /Q C:\inetpub\wwwroot\workspace\geostockphoto_emu\PhpOnAzure.Web\Microsoft\
rmdir /S /Q C:\inetpub\wwwroot\workspace\geostockphoto_emu\PhpOnAzure.Web\PIE\
rmdir /S /Q C:\inetpub\wwwroot\workspace\geostockphoto_emu\PhpOnAzure.Web\protected\
rmdir /S /Q C:\inetpub\wwwroot\workspace\geostockphoto_emu\PhpOnAzure.Web\themes\

rmdir /S /Q C:\inetpub\wwwroot\workspace\geostockphoto_emu\PhpOnAzure.Web\jsSuapa\
rmdir /S /Q C:\inetpub\wwwroot\workspace\geostockphoto_emu\PhpOnAzure.Web\cssSuapa\


xcopy C:\inetpub\wwwroot\workspace\geostockphoto\css\*.* C:\inetpub\wwwroot\workspace\geostockphoto_emu\PhpOnAzure.Web\css\*.*  /E/S
xcopy C:\inetpub\wwwroot\workspace\geostockphoto\framework\*.* C:\inetpub\wwwroot\workspace\geostockphoto_emu\PhpOnAzure.Web\framework\*.*  /E/S
xcopy C:\inetpub\wwwroot\workspace\geostockphoto\images\*.* C:\inetpub\wwwroot\workspace\geostockphoto_emu\PhpOnAzure.Web\images\*.*  /E/S
xcopy C:\inetpub\wwwroot\workspace\geostockphoto\js\*.* C:\inetpub\wwwroot\workspace\geostockphoto_emu\PhpOnAzure.Web\js\*.*  /E/S
xcopy C:\inetpub\wwwroot\workspace\geostockphoto\Microsoft\*.* C:\inetpub\wwwroot\workspace\geostockphoto_emu\PhpOnAzure.Web\Microsoft\*.*  /E/S
xcopy C:\inetpub\wwwroot\workspace\geostockphoto\PIE\*.* C:\inetpub\wwwroot\workspace\geostockphoto_emu\PhpOnAzure.Web\PIE\*.*  /E/S
xcopy C:\inetpub\wwwroot\workspace\geostockphoto\protected\*.* C:\inetpub\wwwroot\workspace\geostockphoto_emu\PhpOnAzure.Web\protected\*.*  /E/S
xcopy C:\inetpub\wwwroot\workspace\geostockphoto\themes\*.* C:\inetpub\wwwroot\workspace\geostockphoto_emu\PhpOnAzure.Web\themes\*.*  /E/S

rmdir /S /Q C:\inetpub\wwwroot\workspace\geostockphoto_emu\PhpOnAzure.Web\protected\data\
rmdir /S /Q C:\inetpub\wwwroot\workspace\geostockphoto_emu\PhpOnAzure.Web\protected\extensions\geoip\

xcopy C:\inetpub\wwwroot\workspace\geostockphoto\jsSuapa\*.* C:\inetpub\wwwroot\workspace\geostockphoto_emu\PhpOnAzure.Web\jsSuapa\*.*  /E/S
xcopy C:\inetpub\wwwroot\workspace\geostockphoto\cssSuapa\*.* C:\inetpub\wwwroot\workspace\geostockphoto_emu\PhpOnAzure.Web\cssSuapa\*.*  /E/S

copy C:\inetpub\wwwroot\workspace\geostockphoto\utility-deploy\azure\ServiceConfiguration.cscfg C:\inetpub\wwwroot\workspace\geostockphoto_emu\ServiceConfiguration.cscfg
copy C:\inetpub\wwwroot\workspace\geostockphoto\utility-deploy\azure\Web.config C:\inetpub\wwwroot\workspace\geostockphoto_emu\PhpOnAzure.Web\Web.config