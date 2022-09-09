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
<table width="510" border="0">
<tr>
<td>
<table width="500">
<tr>
<td align="center">
<font color="white" face="arial" size="4">A Galera que não sai daqui</a>
</td>
</tr>
<tr>
<td align="center">
<?php 
$host1 = "localhost"; // your database location
$data1 = "l2jdb";
$user1 = "root"; // your database user
$pass1 = ""; // your database password

error_reporting($error_in_script);

mysql_connect($host1,$user1,$pass1) or die("Coudn't connect to MySQL Server"); 
mysql_select_db($data1) or die("Coudn't connect to MySQL Database");

$result = mysql_query("SELECT * FROM `characters` WHERE `onlinetime` > '1'") or die(mysql_error());
$row = mysql_num_rows($result);

if($row <= '0') {

echo "No Player Top Online.<br>";

}

else {

$result1 = mysql_query("SELECT `char_name`,`level`,`race`,`onlinetime`,`clanid` FROM `characters` WHERE `onlinetime` > '0' ORDER by `onlinetime` DESC limit 100");

echo "<table border='1'><tr>";
echo "<th class='Stil5'><center><font color='white' face='arial' size='2'>Pos.</font></center></th>";
echo "<th class='Stil5'><center><font color='white' face='arial' size='2'>Character Name</font></center></th>";
echo "<th class='Stil5'><center><font color='white' face='arial' size='2'>Level</font></center></th>";
echo "<th class='Stil5'><center><font color='white' face='arial' size='2'>Race</font></center></th>";
echo "<th class='Stil5'><center><font color='white' face='arial' size='2'>Clan</font></center></th>";
echo "<th class='Stil5'><center><font color='white' face='arial' size='2'>Online Time</font></center></th>";
echo "</tr>";

$i=1;

while ($row1 = mysql_fetch_row($result1)) 
{

if($row1[4] >= '1') {
$result2 = mysql_query("SELECT `clan_name` FROM `clan_data` WHERE `clan_id` = '$row1[4]'") or die(mysql_error());
$row2 = mysql_fetch_row($result2);
$clan_name = "<a href='clan_info.php?id=$row1[4]'>$row2[0]</a>"; }
else {
$clan_name = 'Sem Clan';
}

$time1 = $row1[3]/86400;
$time2 = round($time1,4);	
$time3 = bcdiv($time2,1,0); 	//Tage
$time4 = $time2-$time3;		//Übrige Zeit
$time5 = $time4*86400;
$time6 = $time5/3600;
$time7 = round($time6,2);
$time8 = bcdiv($time7,1,0);		//Stunden
$time9 = $time7-$time8;		//Übrige Zeit
$timea = $time9*3600;
$timeb = $timea/60;
$timec = round($timeb,1);	
$timed = bcdiv($timec,1,0); 	//Minuten

if($time3 >= '2') {
$day = 'Dias'; }
else {
$day = 'Dia'; }

if($time8 >= '2') {
$hour = 'Horas'; }
else {
$hour = 'Hora'; }

if($timed >= '2') {
$min = 'Minutos'; }
else {
$min = 'Minuto'; }

$race = array('0' => "Human", '1' => "Elf", '2' => "Dark Elf", '3' => "Orc", '4' => "Dwarf", '5' => "Kamael");

echo "<tr>";
echo "<td class='Stil5'><center><font color='white' face='arial' size='2'>$i</font></center></td>";
echo "<td class='Stil5'><center><font color='white' face='arial' size='2'>$row1[0]</font></center></td>";
echo "<td class='Stil5'><center><font color='white' face='arial' size='2'>$row1[1]</font></center></td>";
echo "<td class='Stil5'><center><font color='white' face='arial' size='2'>".$race[$row1[2]]."</font></center></td>";
echo "<td class='Stil5'><center><font color='white' face='arial' size='2'>$clan_name</font></center></td>";
echo "<td class='Stil5'><center><font color='white' face='arial' size='2'>$time3 $day $time8 $hour $timed $min</font></center></td>";
echo "</tr>";

$i++;

}
echo "</table>";

mysql_close();

}

?>
</center>

