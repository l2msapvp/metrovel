<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
//---------CONFIGS---------//
$title="L2 kosaki PvP Server";  // Page Title Here
$type="1"; //Type 1 
$server="localhost"; // MySQL IP
$user="root"; //MySQL Username
$password=""; //MySQL Password
$database="l2jdb"; //MySQL Database
$top="100"; 
//-----END OF CONFIGS-----//



if ($title) {
print("<head><title>$title</title></head>");
}
else {
print("<head><title>No Page Title</title></head>");
}
mysql_connect("$server", "$user", "$password") or die(mysql_error());
mysql_select_db("$database") or die(mysql_error());

if($type == '1'){
$result = mysql_query("SELECT char_name,olympiad_points FROM olympiad_nobles where olympiad_points>0 order by olympiad_points desc")
or die(mysql_error());
echo "<center><h3>Top $top Olympiad Points</h3></center><table border=0 align=center><tr> <th>Character</th> <th>Top Points</th> </tr>";
$sum1=0;
while($row = mysql_fetch_array( $result )) {
		$name = $row['char_name'];
		$drogata = $row['olympiad_points'];
		if ($sum1<$top) {
		echo "<tr><td align=center>$name</td><td align=center>$drogata</td></tr>";
		$sum1++;
		}
	}
}

else {
echo "<center>Please config the variable $type. Make it <b>1</b> for Top Status</center>";
}
?>
    </body>
</html>