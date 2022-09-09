<?php
require_once("conectdb.php");
//pegando do banco de dados 
$hserver="localhost"; 
$portlogin="9014";
$portgame="7777";
$hserver2="localhost"; 
$portgame2="7777";
$portlogin2="9014";

# Stats scripts
$fp = @fsockopen($hserver, $portlogin, $errno, $errstr, 1);
if($fp >= 1){
$loginonline = '<font color=green size=3 face=verdana>On</font>';}
else{ $loginonline = '<font color=red size=3 face=verdana>Off</font>'; }
$fp = @fsockopen($hserver, $portgame, $errno, $errstr, 1);
if($fp >= 1){
$gameonline = '<font color=green size=3 face=verdana>On</font>';}
else{ $gameonline = '<font color=red size=3 face=verdana>Off</font>'; }
$sql = mysql_query("SELECT count(*) FROM characters WHERE online = 1");
if( mysql_result($sql, 0, 0) <= 80){
$playsonline = "<font color=green>" . mysql_result($sql, 0, 0) . "</font>";}
elseif( mysql_result($sql, 0, 0) >= 80 AND mysql_result($sql, 0, 0) <= 150){
$playsonline = "<font color=orange>" . mysql_result($sql, 0, 0) . "</font>";}
elseif( mysql_result($sql, 0, 0) > 150){
$playsonline = "<font color=red>" . mysql_result($sql, 0, 0) . "</font>";}
$sql = mysql_query("SELECT count(*) FROM accounts");
$sql = mysql_query("SELECT count(*) FROM characters WHERE online ='1' AND accesslevel>50");
if( mysql_result($sql, 0, 0) <= 80){
$gmonline = "<font color=red>" . mysql_result($sql, 0, 0) . "</font>";}
$sql = mysql_query("SELECT count(*) FROM accounts");
$accountsnum = mysql_result($sql, 0, 0);
$sql = mysql_query("SELECT count(*) FROM characters");
$charnum = mysql_result($sql, 0, 0);
$sql = mysql_query("SELECT count(*) FROM clan_data");
$clannum = mysql_result($sql, 0, 0);
$sql = mysql_query("SELECT count(*) FROM characters Where accesslevel > 99");
$gmnum = mysql_result($sql, 0, 0);

# Stats scripts
$fp = @fsockopen($hserver2, $portlogin2, $errno, $errstr, 1);
if($fp >= 1){
$loginonline2 = '<font color=green size=3 face=verdana>On</font>';}
else{ $loginonline2 = '<font color=red size=3 face=verdana>Off</font>'; }
$fp = @fsockopen($hserver2, $portgame2, $errno, $errstr, 1);
if($fp >= 1){
$gameonline2 = '<font color=green size=3 face=verdana>On</font>';}
else{ $gameonline2 = '<font color=red size=3 face=verdana>Off</font>'; }
$sql = mysql_query("SELECT count(*) FROM characters WHERE online = 1");
if( mysql_result($sql, 0, 0) <= 80){
$playsonline2 = "<font color=green>" . mysql_result($sql, 0, 0) . "</font>";}
elseif( mysql_result($sql, 0, 0) >= 80 AND mysql_result($sql, 0, 0) <= 150){
$playsonline2 = "<font color=orange>" . mysql_result($sql, 0, 0) . "</font>";}
elseif( mysql_result($sql, 0, 0) > 150){
$playsonline2 = "<font color=red>" . mysql_result($sql, 0, 0) . "</font>";}
$sql = mysql_query("SELECT count(*) FROM accounts");
$sql = mysql_query("SELECT count(*) FROM characters WHERE online ='1' AND accesslevel>50");
if( mysql_result($sql, 0, 0) <= 80){
$gmonline = "<font color=red>" . mysql_result($sql, 0, 0) . "</font>";}
$sql = mysql_query("SELECT count(*) FROM accounts");
$accountsnum = mysql_result($sql, 0, 0);
$sql = mysql_query("SELECT count(*) FROM characters");
$charnum = mysql_result($sql, 0, 0);
$sql = mysql_query("SELECT count(*) FROM clan_data");
$clannum = mysql_result($sql, 0, 0);
$sql = mysql_query("SELECT count(*) FROM characters Where accesslevel > 99");
$gmnum = mysql_result($sql, 0, 0);

echo "<b>Login Server:</b> $loginonline<br />";
echo "<b>FARIS:</b> $gameonline <br />";
echo "<b>Nemesis:</b> $gameonline2 <br />";
echo "<b>Players:</b> $playsonline<br />";
echo "<b>GM:</b> $gmonline<br />";
echo "<b>Characters:</b> $charnum<br />";
?>