<?php
//$ACCOUNT_SID = 'AC877bfda2457808ef1730e26c927e08cd'; 
//$API_KEY = 'SK6477ccec45c09d9f476dcc2b92b49c0e';
//$API_KEY_SECRET = '9KU9HRPJ3b6RXXbBXkLOt29ghVPkCUhn';
//$PUSH_CREDENTIAL_SID = 'CRc62674116d636c79a4e14f5858c0158e';
//$APP_SID = 'AP4b094f2ff0e05347303b34e69e8bcac0';
$ACCOUNT_SID = 'AC3d1de74dcd2cf7937d48a2f7b3b8ddf5';
$API_KEY = 'SK79da8f31d26412438a3fd50b94a8236b';
$API_KEY_SECRET = 'cceNlnHZHj6HEbxK2PHxqtM6lhA8ms7x';
$PUSH_CREDENTIAL_SID = 'CRe1791a6c31e7e7036ff849b3c561b699';
$APP_SID = 'AP4b094f2ff0e05347303b34e69e8bcac0';
$connection = pg_connect("host=ec2-184-72-239-186.compute-1.amazonaws.com dbname=dfkcsq047ej0lu user=fzxqjsjlxieohl password=fbdfcaa97415b4062f460a6f3abda63d4bd1565766cdf382d536c4e66a67cf27")
    or die('Could not connect: ' . pg_last_error());
?>
