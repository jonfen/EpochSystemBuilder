
<?php
require_once('utils.php');
// For security place, config.ini outsite of browseable files and change the path
$config_file = '../../config.ini';
$open_config_file = @file($config_file) or
        die ("Failed opening config file: $php_errormsg");
$config = parse_ini_file($config_file);
$prefix = $config['prefix'];

// Database Connection
try {
  $db = new \PDO(   "mysql:host=".$config['servername'].";port=".$config['port'].";dbname=".$config['database'].";charset=utf8",
                        $config['username'],
                        $config['password'],
                        array(
                            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                            \PDO::ATTR_PERSISTENT => false
                        )
                    );
} catch (PDOException $e) {
  echo 'Connection failed: ' . $e->getMessage();
  exit;
}
echo  '<?xml version="1.0" encoding="utf-8"?>';
?>
<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>Epoch System Builder</title>
  <link href="css/style.css" rel="stylesheet" type="text/css">
  <link href="css/normalize.css" rel="stylesheet" type="text/css">
  <meta charset="UTF-8">
  <meta name="viewport" content="user-scalable=yes, initial-scale=1.0, maximum-scale=2.0, width=device-width" />
</head>
<body>
  <div>
<form action="<?=$_SERVER['PHP_SELF'];?>" method="post" name="createSystem" id="createSystem">

<br /><input type="button" name="system" value="New System" onclick="window.location.href='system.php';">&nbsp;<input type="button" name="transmitter" value="Reorder Transmitters" onclick="window.location.href='reorder_tx.php';">
</form>
</div>


<section  class="section-images">
<a href="https://github.com/jonfen/EpochSystemBuilder"><img src="images/GitHub-Mark-Light-120px-plus.png"></a>
</section>

</body>
</html>
