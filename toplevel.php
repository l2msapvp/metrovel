<style type="text/css">
<!--
body,td,th {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #FFFFFF;
}
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style><meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /><body>
<center>
<table width="100%" border="0" cellspacing="5" cellpadding="5">
  <tr>
    <td><h1>
      <?
$servidor = "localhost";
$usuario  = "root";
$senha    = "";
$banco    = "l2jdb";


$conexao = mysql_connect($servidor, $usuario, $senha) or die(mysql_error());
mysql_select_db($banco, $conexao) or die(mysql_error());


$ordem = empty($_GET['o']) ? 'level' : base64_decode($_GET['o']);
$sql = mysql_query("SELECT * FROM characters WHERE accesslevel !='50' ORDER BY ".$ordem." DESC LIMIT 50") or die(mysql_error());



$array = array('level' => 'Level',
			  );
?>
    </h1>
        <table width="100%" border="0" bordercolor="#272727">
          <tr bordercolor="#272727 bgcolor="#272727">
            <td><center class="style1">
                <span class="style5 style1"><font color="#FFB90F"><b>Posi&ccedil;&atilde;o</font></b></span>
            </center></td>
            <td><center class="style1">
                <span class="style5 style1"><font color="#FFB90F"><b>Nome do Char </font></b></span>
            </center></td>
            <td><span class="style1">
              <center>
                <b><font color="#FFB90F"><?php echo $array[$ordem] ?></font></b>
              </center>
            </span></td>
            <td><span class="style1">
              <center>
                <b><font color="#FFB90F">Clan</font></b>
              </center>
            </span></td>
          </tr>
          <?
$i = 1;
$cor = 0;
while($a = mysql_fetch_object($sql)) {
$cor = $cor + 1;
$bg  = $cor % 2 == 0 ? '#535F6D' : '#535F6D';

if($i == 1) {
$img = "<img src=\"top1.gif\" alt=\"1&ordm; \">";
}elseif($i == 2) {
$img = "<img src=\"top2.gif\" alt=\"2&ordm; \">";
}elseif($i == 3) {
$img = "<img src=\"top3.gif\" alt=\"3&ordm; \">";
}else{
$img = $i."&ordm; ";
}

$clan = mysql_query("SELECT * FROM clan_data WHERE clan_id = '".$a->clanid."'") or die(mysql_error());
$clans = mysql_fetch_object($clan);


$clans->clan_name = empty($clans->clan_name) ? 'Sem Clan' : $clans->clan_name;
?>
          <tr bordercolor="<?php echo $bg; ?>" bgcolor="<?php echo $bg; ?>" class="style2">
            <td bgcolor="<?php echo $bg; ?>"><center class="style2">
                <?php echo $img; ?>
            </center></td>
            <td><center>
                <?php echo $a->char_name; ?>
            </center></td>
            <td><center>
                <?php echo $a->$ordem; ?>
            </center></td>
            <td><center>
                <?php echo $clans->clan_name; ?>
            </center></td>
          </tr>
          <?
$i++;
}
?>
      </table></td>
  </tr>
</table>
</center>
</body>