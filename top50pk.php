<style type="text/css">
<!--
body,td,th {
	font-family: Verdana, Geneva, sans-serif;
	font-size: 10px;
	color: #FC0;
}
body {
	background-color: #000;
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style>
<center>
<a href="?ir=top50pk"><img src="images/title_50pk.jpg" alt="Top 50 PK" width="200" height="28" border="0" /></a><br>

<?php include("configf.php"); ?>
<?php
if ($title) {
print("<head><title>$title</title></head>");
}
else {
print("<head><title>No Page Title</title></head>");
}
if($type == '1'){
$result = mysql_query("SELECT char_name,pkkills FROM characters where pkkills>0 and accesslevel=0 order by pkkills desc")
or die(mysql_error());
echo "<table border=0 align=center width=65%><tr><td><font color=FFFF>Pos</font></td><td align=center><font color=FFFF>Character</font></td></tr>";
$sum1=0;
$i = 1;
while($row = mysql_fetch_array( $result )) {
		$img = $i."";
		$name = $row['char_name'];
		$pvpkills = $row['pkkills'];
		if ($sum1<$top) {
		echo "<tr><td align=left cellspacing=8 cellpadding=8><font color=FFFF>$img</font></td><td align=left cellspacing=8 cellpadding=8><font color=FFFF>$name</font></td></tr>";
		$sum1++;
		$i++;
		}
	}
}

else {
echo "<center>Please config the variable $type. Make it <b>1</b> for Top Status</center>";
}
?>
</center>