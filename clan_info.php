<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="PT-BR" lang="PT-BR">
<head>
<style type="text/css">
<!--
.style1 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 10px;
	font-weight: bold;
	color: #FF9900;
}
-->
</style></head>
<body><center>
<table width="560" border=" ">
<tr>
<td>
<div align="center">
  <table width="520">
<tr>
<td align="center">
  <a href="dbnemesis.php" class="style1">Voltar</a><br>
  <font color="#ffffff" face="Verdana" size="4">Unidos por uma razão: Dominar o Mundo de Aden!
</td>
</tr>
<tr>
<td align="center">
  <div align="center">
    <?php 
$host1 = "localhost"; // your database location
$data1 = "l2j";
$user1 = "root"; // your database user
$pass1 = ""; // your database password

error_reporting($error_in_script);

$id = $_GET['id'];

if($id <= '1') {

echo "Wrong URL<br>";

}

else {

mysql_connect($host1,$user1,$pass1) or die("Coudn't connect to MySQL Server"); 
mysql_select_db($data1) or die("Coudn't connect to MySQL Database");

$result1 = mysql_query("SELECT `clan_name`,`leader_id`,`clan_level` FROM `clan_data` WHERE `clan_id`='$id'");
$row1 = mysql_fetch_row($result1);

$result2 = mysql_query("SELECT * FROM `characters` WHERE `clanid`='$id'");
$row2 = mysql_num_rows($result2);

$timer=$row1[3]/1000;
$createtime = gmstrftime("%d.%m.%Y", $timer);

echo "<table border='0'><tr>";
echo "<th class='Stil5' colspan='2'><center><u><font color='white' size='2' face='arial'>Clan Name</font></u></center></th>";
echo "</tr><tr>";
echo "<th class='Stil5' colspan='2'><center><b><font color='white' size='2' face='arial'>$row1[0]</font></b></center></th>";
echo "</tr><tr>";
echo "<th class='Stil5' colspan='2'><center><font color='white' size='2' face='arial'>Clan Level : $row1[2]</font></center></th>";
echo "</tr><tr>";
echo "<th class='Stil5' colspan='2'><center><font color='white' size='2' face='arial'>Clan has $row2 Member(s)</font></center></th>";
echo "</tr></table><br><br><table border='1'><tr>";
echo "<th class='Stil5'><center><font color='white' size='2' face='arial'>Pos.</font></center></th>";
echo "<th class='Stil5'><center><font color='white' size='2' face='arial'>Member</font></center></th>";
echo "<th class='Stil5'><center><font color='white' size='2' face='arial'>Level</font></center></th>";
echo "</tr>";

$result3 = mysql_query("SELECT `charId`,`char_name`,`level` FROM `characters` WHERE `clanid`='$id' ORDER by `level` DESC") or die(mysql_error());

$i=1;

while($row3=mysql_fetch_row($result3))
{
if($row1[1] == $row3[0]) {

echo "<tr><td class='Stil5'><center><font color='white' size='2' face='arial'>$i</font></center></td>";
echo "<td class='Stil5'><center><font color='white' size='2' face='arial'>$row3[1]</font></center></td>";
echo "<td class='Stil5'><center><font color='white' size='2' face='arial'>$row3[2]</font></center></td></tr>";

}

else {

echo "<tr><td class='Stil5'><center><font color='white' size='2' face='arial'>$i</font></center></td>";
echo "<td class='Stil5'><center><font color='white' size='2' face='arial'>$row3[1]</font></center></td>";
echo "<td class='Stil5'><center><font color='white' size='2' face='arial'>$row3[2]</font></center></td></tr>";

}

$i++;

}
}
echo "</table>";

mysql_close();


?>
  </div>
</body>
</html>