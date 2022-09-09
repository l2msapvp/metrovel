<?php
  $link = mysql_connect($L2JBS_config['mysql_host'].":".$L2JBS_config['mysql_port'], $L2JBS_config['mysql_login'], $L2JBS_config['mysql_password']);
  if (!$link)
die("Couldn't connect to MySQL");
  @mysql_select_db($L2JBS_config['mysql_db'], $link);
error_reporting(0);

?>

