<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "l2j";
$sql=MYSQL_CONNECT($servidor,$usuario,$senha) or die ("Erro na conexão Tente mais tarde");
 MYSQL_SELECT_DB($banco) or die ("Data Base Não Existe");
 $hserver = "127.0.0.1";
  $portlogin= "7777";
?>

<!- NÃO MODIFICAR DAKI PRA BAIXO -!>
<?php
$L2JBS_config["mysql_host"]="$servidor";	// MySQL IP
$L2JBS_config["mysql_port"]=3306;		// MySQP port
$L2JBS_config["mysql_db"]="$banco";		// l2jdb or your lineage 2 server database name
$L2JBS_config["mysql_login"]="$usuario";		// MySQL Login name	
$L2JBS_config["mysql_password"]="$senha";		// MySQL Password

error_reporting(0);
?>
