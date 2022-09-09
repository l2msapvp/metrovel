<?php
$title="L2 MSA";
$type="1";
$server="localhost";
$user="root";
$password="";
$database="l2j";
$top="5"; 
$top2="5"; 
$conexao = mysql_connect("$server", "$user", "$password") or die(mysql_error());
mysql_select_db("$database") or die(mysql_error());
?>