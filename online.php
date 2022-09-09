<?php
$servidor = 'localhost';
$usuario  = 'root';
$senha    = '';
$banco    = "l2j";

$conexao = mysql_connect($servidor, $usuario, $senha) or die(mysql_error());
mysql_select_db($banco, $conexao) or die(mysql_error());


function total($tab, $cond = NULL) {
	$sql = mysql_query("SELECT COUNT(*) AS total FROM ".$tab." ".$cond."") or die(mysql_error());
	$c = mysql_fetch_array($sql);
	return $c['total'];
}


$loginserver = @fsockopen($servidor, 9014, $errno, $errstr, 2);
$gameserver = @fsockopen($servidor, 7777, $errno2, $errstr2, 2);
?>
<style type="text/css">
<!--
body,td,th {
	font-family: Verdana, Geneva, sans-serif;
	font-size: 16px;
	font-style:normal;
	font-weight:bold;
	color:#0C3;
}
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style>
<?php echo total('characters', 'WHERE online = 0'); ?>