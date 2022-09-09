<?
include("conectdb.php");
include("funcoes.php");

$np = 15; 
$pagina = intval($_GET["pagina"]); 

if (empty($pagina)) {
   $pagina = 1;
}

$pr = ($pagina*$np) - $np;

$palavra = addslashes(htmlentities($_POST['char']));
$com = !empty($_GET['act']) && $_GET['act'] == 'buscar' ? "WHERE char_name LIKE '%".$palavra."%'" : NULL;

$sql = mysql_query("SELECT * FROM characters ".$com." LIMIT $pr, $np") or die(mysql_error());
$sql2 = mysql_query("SELECT * FROM characters ".$com."") or die(mysql_error());

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Listando Chars</title>
<style type="text/css">
<!--
.style1 {
	font-size: 14px;
	font-weight: bold;
	font-family: Arial, Helvetica, sans-serif;
	color: #FFFFFF;
}
.style2 {
	font-size: 12px;
	font-family: Arial, Helvetica, sans-serif;
}
body {
	background-image: url(images/bg1.jpg);
}
-->
</style>
</head>

<body>
<form id="form1" name="form1" method="post" action="?act=buscar">
  <table width="100%" border="0" class="style2">
    <tr>
      <td width="45%" align="right">Nome do Char: </td>
      <td width="55%"><input name="char" type="text" class="style2" id="char" /></td>
    </tr>
    <tr>
      <td align="right">&nbsp;</td>
      <td><input name="Submit" type="submit" class="style2" value="Buscar" /></td>
    </tr>
  </table>
</form>
<?
if($_GET['act'] == 'buscar') {
?>
<br />
<hr />
<table width="100%" border="0">
  <tr bgcolor="#666666" class="style1">
    <td align="center">Nome:</td>
    <td align="center">Level:</td>
    <td align="center">Noblesse:</td>
    <td align="center">Acesso:</td>
    <td align="center">Informa&ccedil;&otilde;es:</td>
  </tr>

<?
$cor = 0;
while($c = mysql_fetch_array($sql)) {
	$cor = $cor + 1;
	$bg = $cor % 2 == 0 ? "#F7F7F7" : "#E7E7E7"; 
	$acesso = $c['accesslevel'] == '0' ? 'Player Normal' : 'Staff';

?>
  <tr class="style2" bgcolor="<?php echo $bg; ?>">
    <td align="center"><?php echo $c['char_name']; ?></td>
    <td align="center"><?php echo $c['level']; ?></td>
    <td align="center"><?php echo nobless($c['obj_id']); ?></td>
    <td align="center"><?php echo $c['accesslevel']; ?> (<?php echo $acesso; ?>)</td>
    <td align="center"><a href="infor.php?id=<?php echo $c['obj_Id']; ?>">Info +</a></td>
  </tr>
<?
}

//Iniciandoi Paginação
$total_paginas = ceil(mysql_num_rows($sql2)/$np);
$nu = '';
$ant = $pagina - 1;
$pro = $pagina + 1;

//Anterior
if($pagina > 1) { 
	$anterior = "<input class=\"style2\" onclick=\"Javascript:window.location='characters.php?pagina=".$ant."'\" type=\"button\" value=\"Anterior\" name=\"btnAnterior1\">";
	}else{ 
	$anterior = "<input class=\"style2\" type=\"button\" value=\"Anterior\" disabled>";
} 

//Correntes
for($i = 1; $i <= $total_paginas; $i++) {
	$di = $pagina == $i ? 'disabled' : NULL;
	$nu .= "<input class=\"style2\" ".$di." onclick=\"JavaScript:window.location='characters.php?pagina=". $i ."';\" type=\"button\" value=\"".$i."\">&nbsp;";
}

//Próximos
if($total_paginas > $pagina) {
	$proximo = "<input class=\"style2\" onclick=\"JavaScript:window.location='characters.php?pagina=".$pro."'\" type=\"button\" value=\"Pr&oacute;ximo\" name=\"btnAnterior1\">";
	}else{ 
	$proximo = "<input class=\"style2\" type=\"button\" value=\"Pr&oacute;ximo\" disabled>";
} 
?>
</table>
<br />
<table width="100%" border="0">
  <tr>
    <td align="center"><?php echo $anterior; ?> <?php echo $nu; ?> <?php echo $proximo; ?> </td>
  </tr>
</table>
<?
}
?>


</body>
</html>
