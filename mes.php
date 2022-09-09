<link rel="stylesheet" href="css/template.css" type="text/css">
<link rel="stylesheet" href="css/typo.css" type="text/css">
<style type="text/css">
<!--
.style5 {
	font-size: 11px;
	font-family: Arial, Helvetica, sans-serif;
	font-weight: bold;
	background-color: #FFFFFF;
}
.style8 {
	font-size: 11px;
	font-family: Arial, Helvetica, sans-serif;
}

.pvptop {

	color: #CC3300;
	text-decoration: blink;
	font-weight: bolder;
	text-align: right;
}
.style9 {font-family: Tahoma}
.style10 {color: #FFFFFF;}
.style11 {font-size: 9px}
.style12 {
	font-weight: bold;
	font-size: 8px;
}
-->
</style>
<body oncontextmenu='return false' onselectstart='return false' ondragstart='return false'>
<?
$server = 'localhost';
$user   = 'root';
$senha  = '';
$db     = 'l2jdb';

$con = mysql_connect($server, $user, $senha) or die(mysql_error());
mysql_select_db($db, $con) or die(mysql_error());

$item = "4366";

?>
<table width="100%" border="0">
<?
$sql = mysql_query("SELECT * FROM items I, characters C WHERE I.owner_id = C.obj_Id and I.item_id = '".$item."' ORDER BY count DESC, char_name ASC LIMIT 5") or die("Falha ao conectar!");

$i = 1;
$cor = 0;
while($ch = mysql_fetch_array($sql)) {
      $et = mysql_query("SELECT * FROM etcitem WHERE item_id = '".$item."'") or die(mysql_error());
      $etc = mysql_fetch_array($et);
	  $cor++;
	  $bg  = ($cor % 2 == 0) ? '' : '';

switch ($i)
        {
		case 1: $img = "<img src=\"images/1.gif\" alt=\"1&ordm; Lugar\">"; break;
		case 2: $img = "<img src=\"images/2.gif\" alt=\"2&ordm; Lugar\">"; break;
		case 3: $img = "<img src=\"images/3.gif\" alt=\"3&ordm; Lugar\">"; break;
		case 4: $img = "<img src=\"images/4.gif\" alt=\"4&ordm; Lugar\">"; break;
		case 5: $img = "<img src=\"images/4.gif\" alt=\"5&ordm; Lugar\">"; break;
		default: $img = "[".$i."#]"; break;
}
?>

    <tr bordercolor="<?php echo $bg; ?>" bgcolor="<?php echo $bg; ?>" class="style8">
    <td width="24%"><div align="center" ><span class="style10"><?php echo $img; ?></span></div></td>
    <td width="52%"><div align="center" ><span class="style10"><font class="style1"><?php echo $ch['char_name']; ?></font></span></div></td>
    <td width="24%"><div align="center" ><span class="pvptop"><strong><?php echo $ch['count']; ?></strong></span></div></td>
<?php
	$i++;
}
?>
</table>
</body>
