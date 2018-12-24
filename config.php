<?php
$ACCOUNT_SID = 'AC877bfda2457808ef1730e26c927e08cd';
$API_KEY = 'SKd06e37ab01f0c855ffa85ab6d0cccbc7';
$API_KEY_SECRET = '3XwEC81PIpBtRkvpdTKusgWlSTfkofd4';
$PUSH_CREDENTIAL_SID = 'CRe1791a6c31e7e7036ff849b3c561b699';
$APP_SID = 'AP4b094f2ff0e05347303b34e69e8bcac0';
$connection = pg_connect("host=ec2-184-72-239-186.compute-1.amazonaws.com dbname=dfkcsq047ej0lu user=fzxqjsjlxieohl password=fbdfcaa97415b4062f460a6f3abda63d4bd1565766cdf382d536c4e66a67cf27")
    or die('Could not connect: ' . pg_last_error());
?>
