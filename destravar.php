<?php
$L2JBS_config["mysql_host"]="localhost";	// MySQL IP
$L2JBS_config["mysql_port"]=3306;		// MySQP port
$L2JBS_config["mysql_db"]="l2j";		// l2jdb or your lineage 2 server database name
$L2JBS_config["mysql_login"]="root";		// MySQL Login name	
$L2JBS_config["mysql_password"]="";		// MySQL Password

error_reporting(0);
?>
<?php
$L2JBS_config["javascript_sort_method"]="bubble";
  $link = mysql_connect($L2JBS_config['mysql_host'].":".$L2JBS_config['mysql_port'], $L2JBS_config['mysql_login'], $L2JBS_config['mysql_password']);
  if (!$link)
    die("Couldn't connect to MySQL");
  @mysql_select_db($L2JBS_config['mysql_db'], $link)
    or die ('Error '.mysql_errno().': '.mysql_error());

?>
<style type="text/css">
body {
	background-color: #000000;
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	color: #FFFFFF;
}
body,td,th {
	font-family: Verdana, Geneva, sans-serif;
	font-size: 12px;
}
a {
	font-family: Verdana, Geneva, sans-serif;
	font-size: 12px;
	color: #FC0;
	font-weight: bold;
}
a:visited {
	color: #CCC;
}
a:hover {
	color: #F30;
}
a:active {
	color: #FC3;
}
</style>
<div align="center">
  <p><a href="reg.php">Registrar</a>
</h33>
    <script type="text/javascript">//<![CDATA[
function isAlphaNumeric(value)
{
  if (value.match(/^[a-zA-Z0-9]+$/))
    return true;
  else
    return false;
}
function checkform(f)
{
  if (f.account.value=="")
  {
    alert("Preencha todos os campos!");
    return false;
  }
  if (!isAlphaNumeric(f.account.value))
  {
    alert("Preencha todos os campos!");
    return false;
  }
  if (f.password.value=="")
  {
    alert("Sem Senha ");
    return false;
  }
  if (!isAlphaNumeric(f.password.value))
  {
    alert("444444");
    return false;
  }
  if (f.password2.value=="")
  {
    alert("Voc&ecirc; n&atilde;o repetiu a senha");
    return false;
  }
  if (f.password.value!=f.password2.value)
  {
    alert("Senhas n&atilde;o s&atilde;o iguais ");
    return false; 
  }
  return true;
}
//]]></script>
  | <a href="pssword.php">Trocar Senha</a> | <a href="destravar.php">Destravar Char</a> |</a></p>
  <p align="center">DESTRAVAR CHAR</p>
</div>
<div align="center">
  <script type="text/javascript">//<![CDATA[
function isAlphaNumeric(value)
{
  if (value.match(/^[a-zA-Z0-9]+$/))
    return true;
  else
    return false;
}
function checkform(f)
{
  if (f.account.value=="")
  {
    alert("Preencha todos os campos!");
    return false;
  }
  if (!isAlphaNumeric(f.account.value))
  {
    alert("Preencha todos os campos!");
    return false;
  }
  if (f.password.value=="")
  {
    alert("Sem Senha ");
    return false;
  }
  if (!isAlphaNumeric(f.password.value))
  {
    alert("444444");
    return false;
  }
  if (f.char.value=="")
  {
    alert("Indique o nome do Char");
    return false;
  }
  if (!isAlphaNumeric(f.char.value))
  {
    alert("444444");
    return false;
  }
  return true;
}
//]]></script>
</div>
<form method="post" action="destravar.php" onsubmit="return checkform(this)">
  <div align="center">
    <table>
     <tr>
      <td><b><font face="Trebuchet MS" size="1">Login</font></b></td>
      <td><font face="Trebuchet MS" size="1"><b>
      <input type="text" name="account" maxlength="15" size="20" /></b></font></td>
     </tr>
     <tr>
      <td><b><font face="Trebuchet MS" size="1">Senha</font></b></td>
      <td><font face="Trebuchet MS" size="1"><b>
      <input type="password" name="password" maxlength="150" size="20" /></b></font></td>
     </tr>
     <tr>
      <td><b><font face="Trebuchet MS" size="1">Char</font></b></td>
      <td><font face="Trebuchet MS" size="1"><b>
      <input type="text" name="char" maxlength="150" size="20" /></b></font></td>
     </tr>
     <tr>
      <td colspan="2" style="text-align: center;">
      <font size="1" face="Trebuchet MS"><b><br />
      <input type="submit" name="submit" value="Destravar" /></b></font></td>
     </tr>
    </table>
  </div>
</form>
<div align="center">
  <?php
if(ereg("^([a-zA-Z0-9_-])*$", $_POST['account']) && ereg("^([a-zA-Z0-9_-])*$", $_POST['password']))
{
	if ($page='destravar.php' && $_POST['account'] && strlen($_POST['account'])<16 && $_POST['password'])
	{
  	$result=mysql_query("SELECT login,password FROM accounts WHERE login='".@mysql_real_escape_string($_POST['account'])."' AND password='".base64_encode(pack('H*', sha1($_POST['password'])))."'", $link) or die ("Error: ".mysql_error());
	$result1=mysql_num_rows($result);
	$result2=mysql_query("SELECT * FROM characters WHERE account_name='".$_POST['account']."' AND char_name='".$_POST['char']."'") or die ("Erro");
	$result3=mysql_num_rows($result2);
	if ($result1<1)
	{
		echo "<p><b>Conta incorreta.</b></p>";
	}
  	elseif ($result3<1)
	{
		echo "<p><b>Char não encontrado.</b></p>";
	}
	else
  	{
    	mysql_query("UPDATE characters SET x=82551,y=147943,z=-3404 WHERE account_name='".$_POST['account']."' AND char_name='".$_POST['char']."'", $link) or die ("Erro");
	    print "<p style=\"font-weight: bold;\">Char Destravado</p>";
  	}
	}
}
?>
</div>
