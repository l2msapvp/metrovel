<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>L2 MSA - Status</title>
<style type="text/css">
<!--
body,td,th {
	font-family: Verdana;
	font-size: 9pt;
	color: #FC6;
}
body {
	background-color: #000;
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.style27 {font-size: 9pt}
-->
</style>
</head>

<body>
<table width="100%" border="0" align="center" cellpadding="1" cellspacing="1">
  <tr>
    <td width="90"><img src="login.jpg" width="89" height="24" /></td>
    <td><?php
				//Server Auth
				$CONFIG['auth_address'] = "127.0.0.1";
				$CONFIG['auth_port'] = 2106;
				$auth = @fsockopen ($CONFIG['auth_address'],$CONFIG['auth_port'], $ERROR_NO, $ERROR_STR, (float)1.5);
				if ($auth){echo '<img src=on.gif>';}
				else{echo '<img src=off.gif>';}

	
?></td>
  </tr>
  <tr>
    <td width="90" height="21"><img src="kastien.jpg" width="89" height="24" />
    </td>
    <td height="21"><?php
				//Server 
				$CONFIG['game_address'] = "127.0.0.1";
				$CONFIG['game_port'] = 7879;
				$game = @fsockopen ($CONFIG['game_address'],$CONFIG['game_port'], $ERROR_NO, $ERROR_STR, (float)1.5);
				if ($game){echo '<img src=on.gif>';}
				else{echo '<img src=off.gif>';}
?></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><div align="left">

<?php
 ///////////////////////////CODIGO POR CALPASSOS///////////////////////////
 ///////////////////////////PARTE CONFIGURAVEL///////////////////////////
 error_reporting(O);
  $servidor = 'localhost'; // MySQL HOST
  $usuario = 'root'; // MySQL Login 
  $senha = ''; // MySQL Senha 
  $db = 'l2jdb'; // Banco de dados do seu l2
  $gameserverip = 'localhost'; // game server IP
  $corserveroff = '#F00'; // cor do numero com server off (#F00 = vermelho)
  $corserveron = '#009900'; // cor do numero com server on (#009900 = verde)
  ///////////////////////////FIM DA PARTE CONFIGURAVEL///////////////////////////
  ?>
<?php
 ///////////////////////////NAO EDITE AQUI///////////////////////////
 $con = mysql_connect($servidor, $usuario, $senha) or die(mysql_error()); mysql_select_db($db, $con) or die(mysql_error());
 ///////////////////////////NAO EDITE AQUI///////////////////////////
 ?>
<?php

 ///////////////////////////NAO EDITE AQUI///////////////////////////
function total($tab, $cond = NULL) {
        $sql = mysql_query("SELECT COUNT(*) AS total FROM ".$tab." ".$cond."") or die(mysql_error());
        $c = mysql_fetch_array($sql);
        return $c['total'];
}
 ///////////////////////////NAO EDITE AQUI///////////////////////////
?>
<?php
///////////////////////////NAO EDITE AQUI///////////////////////////
$gs = @fsockopen($gameserverip, 7777, $errno, $errstr, 1);
if($gs >= 1){
$playersonline = total('characters', 'WHERE online = 1');
        $playerscomvinteamais = $playersonline+$numerodasoma;
        $resultadodosonline = "<font color='$corserveron'>".bcmul($playerscomvinteamais, $numerodamultiplicacao).'</font>';
}
else{ 
$resultadodosonline = "<font color='$corserveroff'>0</font>";
}
///////////////////////////NAO EDITE AQUI///////////////////////////
?>
<span class="style27">PLAYERS ON</span>: <?php echo "$resultadodosonline"; ?></div></td>
  </tr>
</table>
</body>
</html>
