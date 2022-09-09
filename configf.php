<?php
$title="L2MSA";
$type="1";
$server="localhost";
$user="root";
$password="";
$database="l2j";
$top="50"; 
$top2="50"; 
$conexao = mysql_connect("$server", "$user", "$password") or die(mysql_error());
mysql_select_db("$database") or die(mysql_error());
?>