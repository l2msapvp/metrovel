<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <style type="text/css">
<!--
body,td,th {
	font-family: Trebuchet MS, Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #53FCFE;
}
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-color: transparent;
}
.font1 {
    font-family: Trebuchet MS, Arial, Helvetica, sans-serif;
	font-size: 12px;
	font-weight: bold;
	color: #FF3300;
}
.font2 {
    font-family: Trebuchet MS, Arial, Helvetica, sans-serif;
	font-size: 12px;
	font-weight: normal;
	color: #FF0000;
}
.font3 {
	font-family: Trebuchet MS, Arial, Helvetica, sans-serif;
	font-size: 12px;
	font-weight: normal;
	color: #FFCC00;
}
.font4 {
	font-family: Trebuchet MS, Arial, Helvetica, sans-serif;
	font-size: 12px;
	font-weight: normal;
	color: #9F0;
}
.font5 {
	font-family: Trebuchet MS, Arial, Helvetica, sans-serif;
	font-size: 12px;
	font-weight: normal;
	color: #0CF;
}
a {
	font-family: Trebuchet MS, Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #C1C1A2;
}
a:visited {
	color: #C00;
}
a:hover {
	color: #F30;
}
a:active {
	color: #F00;
}
a:link {
	color: #53FCFE;
}

-->
</style>

    </head>
    <body>
        <?php
//---------CONFIGS---------//
$title="L2 Clean PvP Server";  // Page Title Here
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
$result = mysql_query("SELECT char_name,count FROM heroes where count>0  order by count desc")
or die(mysql_error());
echo "<center><h3>Top $top Heroes Players</h3></center><table border=0 align=center><tr> <th>Character</th> <th>Time</th> </tr>";
$sum1=0;
while($row = mysql_fetch_array( $result )) {
		$name = $row['char_name'];
		$drogata = $row['count'];
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