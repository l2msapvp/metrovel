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
if (f.oldpassword.value=="")
{
alert("Você colocou sua senha antiga");
return false;
}
if (f.newpassword.value=="")
{
alert("Nenhuma senha detectada no campo");
return false;
}
if (!isAlphaNumeric(f.newpassword.value))
{
alert("44444");
return false;
}
if (f.newpassword2.value=="")
{
alert("Você não repetiu a senha");
return false;
}
if (f.newpassword.value!=f.newpassword2.value)
{
alert(" Senha não é igual! ");
return false; 
}
return true;
}
//]]></script>
<title>Trocar Senha</title></head>
<body>
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
    | <a href="password.php">Trocar Senha</a> | <a href="destravar.php">Destravar Char</a> | </a></p>
  <p>TROCAR SENHA</p>
</div>
<br>

<form method="post" action="" onSubmit="return checkform(this)">
<table align="center">
 <tr>
  <td><b><font face="Trebuchet MS" size="1">Login</font></b></td>
  <td><font face="Trebuchet MS" size="1"><b>
  <input type="text" name="account" maxlength="15" size="20" /></b></font></td>
 </tr>
 <tr>
  <td><b><font face="Trebuchet MS" size="1">Senha Atual</font></b></td>
  <td><font face="Trebuchet MS" size="1"><b>
  <input type="password" name="oldpassword" maxlength="150" size="20" /></b></font></td>
 </tr>
 <tr>
  <td><b><font face="Trebuchet MS" size="1">Nova Senha</font></b></td>
  <td><font face="Trebuchet MS" size="1"><b>
  <input type="password" name="newpassword" maxlength="15" size="20" /></b></font></td>
 </tr>
 <tr>
  <td><b><font face="Trebuchet MS" size="1">Repetir Senha</font></b></td>
  <td><font face="Trebuchet MS" size="1"><b>
  <input type="password" name="newpassword2" maxlength="15" size="20" /></b></font></td>
 </tr>
 <tr>
  <td colspan="2" style="text-align: center;">
  <font size="1" face="Trebuchet MS"><b><br />
  <input type="submit" name="submit" value="Trocar Senha" /></b></font></td>
 </tr>
</table>
</form>

<?php
if(ereg("^([a-zA-Z0-9_-])*$", $_POST['account']) && ereg("^([a-zA-Z0-9_-])*$", $_POST['oldpassword']) && ereg("^([a-zA-Z0-9_-])*$", $_POST['newpassword']) && ereg("^([a-zA-Z0-9_-])*$", $_POST['newpassword2']))
{
if ($page='index.php' && $_POST['account'] && strlen($_POST['account'])<16 && $_POST['oldpassword'] && $_POST['newpassword'] && $_POST['newpassword']==$_POST['newpassword2'])
{
$result=mysql_query("SELECT login,password FROM accounts WHERE login='".@mysql_real_escape_string($_POST['account'])."' AND password='".base64_encode(pack('H*', sha1($_POST['oldpassword'])))."'", $link)
or die ("Error: ".mysql_error());
if (mysql_num_rows($result))
{
mysql_query("UPDATE accounts SET password='".base64_encode(pack('H*', sha1($_POST['newpassword'])))."' WHERE login='".mysql_real_escape_string($_POST['account'])."'", $link)
or die ("Error: ".mysql_error());
print "<b>Senha modificada com sucesso.</b></p>";
}
else
print "<p class=\"error\"><b><font color=red>Ops. Ocorreu um erro, tente novamente mais tarde!<br>Conta não existe!</font></b></p>";
mysql_close($link);
}
}
else
{
echo "<font size=1 color=black>As limitações não foram testadas para a segurança. Se você for confiável que tido a informação correta, consultar por favor à administração.</font>";
}
?>