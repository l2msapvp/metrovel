<?php include("config.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<body bgcolor="#FFFFFF" text="#996666" link="#FF0000" vlink="#663333" alink="#FF9999"><h3 align="center"><font color="#000000">Castle Siege</font></h3>

<div align="left">
  <table width="102%"0" align="center">
    <?php
/********  GIRAN  *************/
$giranOwner = "...";
$giranSiegeDate = " ... ";
$giranTax ="";
/*********  OREN  **************/
$orenOwner = "...";
$orenSiegeDate = " ... ";
$orenTax ="";
/**********  ADEN  **************/
$adenOwner = "...";
$adenSiegeDate = " ... ";
$adenTax ="";
/********  Gludio  **************/
$gludioOwner = "...";
$gludioSiegeDate = "...";
$gludioTax ="";
/**********  DION  ***************/
$dionOwner = "...";
$dionSiegeDate = " ... ";
$dionTax ="";
/********  INNADRIL  *************/
$innadrilOwner = "...";
$innadrilSiegeDate = " ... ";
$innadrilTax ="";
/********  GODDARD  *************/
$goddardOwner = "...";
$goddardSiegeDate = " ... ";
$goddardTax ="";
/*********************************/
/********  RUNE  *************/
$runeOwner = "...";
$runeSiegeDate = " ... ";
$runeTax ="";
/*********************************/
/********  SCHUTTGART  *************/
$schuttgartOwner = "...";
$schuttgartSiegeDate = " ... ";
$schuttgartTax ="";
/*********************************/
$result = mysql_query("SELECT name,taxPercent,siegeDate FROM castle");
while($row=mysql_fetch_array($result,MYSQL_ASSOC)){
switch($row['name']){
case 'Giran':$giranTax=$row['taxPercent'].'%';
$giranSiegeDate=date('d/m/Y',$row['siegeDate']/1000);
$giranSiegeHora=date('H\:i',$row['siegeDate']/1000);break;
case 'Oren':$orenTax=$row['taxPercent'].'%';
$orenSiegeDate=date('d/m/Y',$row['siegeDate']/1000);
$orenSiegeHora=date('H\:i',$row['siegeDate']/1000);break;
case 'Aden':$adenTax=$row['taxPercent'].'%';
$adenSiegeDate=date('d/m/Y',$row['siegeDate']/1000);
$adenSiegeHora=date('H\:i',$row['siegeDate']/1000);break;
case 'Gludio':$gludioTax=$row['taxPercent'].'%';
$gludioSiegeDate=date('d/m/Y',$row['siegeDate']/1000);
$gludioSiegeHora=date('H\:i',$row['siegeDate']/1000);break;
case 'Dion':$dionTax=$row['taxPercent'].'%';
$dionSiegeDate=date('d/m/Y',$row['siegeDate']/1000);
$dionSiegeHora=date('H\:i',$row['siegeDate']/1000);break;
case 'Innadril':$innadrilTax=$row['taxPercent'].'%';
$innadrilSiegeDate=date('d/m/Y',$row['siegeDate']/1000);
$innadrilSiegeHora=date('H\:i',$row['siegeDate']/1000);break;
case 'Goddard':$goddardTax=$row['taxPercent'].'%';
$goddardSiegeDate=date('d/m/Y',$row['siegeDate']/1000);
$goddardSiegeHora=date('H\:i',$row['siegeDate']/1000);break;
case 'Rune':$runeTax=$row['taxPercent'].'%';
$runeSiegeDate=date('d/m/Y',$row['siegeDate']/1000);
$runeSiegeHora=date('H\:i',$row['siegeDate']/1000);break;
case 'Schuttgart':$schuttgartTax=$row['taxPercent'].'%';
$schuttgartSiegeDate=date('d/m/Y',$row['siegeDate']/1000);
$schuttgartSiegeHora=date('H\:i',$row['siegeDate']/1000);break;		
}
}
$sql = mysql_query("SELECT castle.name, clan_data.clan_name FROM castle,clan_data WHERE clan_data.hasCastle=castle.id");
while($row= mysql_fetch_array($sql,MYSQL_ASSOC)){
switch($row['name']){
case 'Giran':$giranOwner=$row['clan_name'];break;
case 'Oren':$orenOwner=$row['clan_name'];break;
case 'Aden':$adenOwner=$row['clan_name'];break;
case 'Gludio':$gludioOwner=$row['clan_name'];break;
case 'Dion':$dionOwner=$row['clan_name'];break;
case 'Innadril':$innadrilOwner=$row['clan_name'];break;
case 'Goddard':$goddardOwner=$row['clan_name'];break;
case 'Rune':$runeOwner=$row['clan_name'];break;
case 'Schuttgart':$schuttgartOwner=$row['clan_name'];break;
}
}
?>
    <tr>
      <td width="12%" bgcolor=#202020 align=center><font color=FFFF>Castelo</font></td>
      <td width="21%" bgcolor=#202020 align=center><font color=FFFF>Dono</font></td>
      <td width="20%" bgcolor=#202020 align=center><font color=FFFF>Data</font></td>
      <td width="20%" bgcolor=#202020 align=center><font color=FFFF>Hora</font></td>
      <td width="27%" bgcolor=#202020 align=center><font color=FFFF>Taxa %</font></td>
    </tr>
    <tr>
      <td width="12%" bgcolor=#202020 align=center>Aden</td>
      <td width="21%" bgcolor=#202020 align=center><?php echo $adenOwner ; ?></td>
      <td width="20%" bgcolor=#202020 align=center><?php echo $adenSiegeDate ; ?></td>
      <td width="20%" bgcolor=#202020 align=center><?php echo $adenSiegeHora ; ?></td>
      <td width="27%" bgcolor=#202020 align=center><?php echo $adenTax ; ?></td>
    </tr>
    <tr>
      <td width="12%" bgcolor=#202020 align=center>Goddard</td>
      <td width="21%" bgcolor=#202020 align=center><?php echo $goddardOwner ; ?></td>
      <td width="20%" bgcolor=#202020 align=center><?php echo $goddardSiegeDate ; ?></td>
      <td width="20%" bgcolor=#202020 align=center><?php echo $goddardSiegeHora; ?></td>
      <td width="27%" bgcolor=#202020 align=center><?php echo $goddardTax ; ?></td>
    </tr>
    <tr>
      <td width="12%" bgcolor=#202020 align=center>Giran</b></td>
      <td width="21%" bgcolor=#202020 align=center><?php echo $giranOwner ; ?></td>
      <td width="20%" bgcolor=#202020 align=center><?php echo $giranSiegeDate ; ?></td>
      <td width="20%" bgcolor=#202020 align=center><?php echo $giranSiegeHora ; ?></td>
      <td width="27%" bgcolor=#202020 align=center><?php echo $giranTax ; ?></td>
    </tr>
    <tr>
      <td width="12%" bgcolor=#202020 align=center>Oren</td>
      <td width="21%" bgcolor=#202020 align=center><?php echo $orenOwner ; ?></td>
      <td width="20%" bgcolor=#202020 align=center><?php echo $orenSiegeDate ; ?></td>
      <td width="20%" bgcolor=#202020 align=center><?php echo $orenSiegeHora ; ?></td>
      <td width="27%" bgcolor=#202020 align=center><?php echo $orenTax ; ?></td>
    </tr>
    <tr>
      <td width="12%" height="21" align=center bgcolor=#202020>Gludio</td>
      <td width="21%" bgcolor=#202020 align=center><?php echo $gludioOwner ; ?></td>
      <td width="20%" bgcolor=#202020 align=center><?php echo $gludioSiegeDate ; ?></td>
      <td width="20%" bgcolor=#202020 align=center><?php echo $gludioSiegeHora ; ?></td>
      <td width="27%" bgcolor=#202020 align=center><?php echo $gludioTax ; ?></td>
    </tr>
    <tr>
      <td width="12%" bgcolor=#202020 align=center>Dion</td>
      <td width="21%" bgcolor=#202020 align=center><?php echo $dionOwner ; ?></td>
      <td width="20%" bgcolor=#202020 align=center><?php echo $dionSiegeDate ; ?></td>
      <td width="20%" bgcolor=#202020 align=center><?php echo $dionSiegeHora ; ?></td>
      <td width="27%" bgcolor=#202020 align=center><?php echo $dionTax ; ?></td>
    </tr>
    <tr>
      <td width="12%" bgcolor=#202020 align=center>Innadril</td>
      <td width="21%" bgcolor=#202020 align=center><?php echo $innadrilOwner ; ?></td>
      <td width="20%" bgcolor=#202020 align=center><?php echo $innadrilSiegeDate ; ?></td>
      <td width="20%" bgcolor=#202020 align=center><?php echo $innadrilSiegeHora ; ?></td>
      <td width="27%" bgcolor=#202020 align=center><?php echo $innadrilTax ; ?></td>
    </tr>
    <tr>
      <td width="12%" bgcolor=#202020 align=center>Rune</td>
      <td width="21%" bgcolor=#202020 align=center><?php echo $runeOwner ; ?></td>
      <td width="20%" bgcolor=#202020 align=center><?php echo $runeSiegeDate ; ?></td>
      <td width="20%" bgcolor=#202020 align=center><?php echo $runeSiegeHora ; ?></td>
      <td width="27%" bgcolor=#202020 align=center><?php echo $runeTax ; ?></td>
    </tr>
    <tr>
      <td width="12%" height="21" align=center bgcolor=#202020>Schuttgart</td>
      <td width="21%" bgcolor=#202020 align=center><?php echo $schuttgartOwner ; ?></td>
      <td width="20%" bgcolor=#202020 align=center><?php echo $schuttgartSiegeDate ; ?></td>
      <td width="20%" bgcolor=#202020 align=center><?php echo $schuttgartSiegeHora ; ?></td>
      <td width="27%" bgcolor=#202020 align=center><?php echo $schuttgartTax ; ?></td>
    </tr>
  </table>
</div>
