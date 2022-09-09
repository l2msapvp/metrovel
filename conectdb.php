<?
//Conexao com L2JDB Servidor 50X
$servidor = "localhost";
$usuario  = "root";
$senha 	  = "";
$banco	  = "l2j";
//Montando a conexao
$l2j = mysql_connect("$servidor", "$usuario", "$senha");
mysql_select_db($banco, $l2j);
?>
