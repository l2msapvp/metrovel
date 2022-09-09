<?

function nobless($id) {
	$sql = mysql_query("SELECT * FROM characters WHERE charId = '".$id."'") or die(mysql_error());
	$c = mysql_fetch_array($sql);
	$c['nobless'] = $c['nobless'] == '1' ? 'Sim' : 'Não';
	return $c['nobless'];
}

function online($id) {
	$sql = mysql_query("SELECT * FROM characters WHERE charId = '".$id."'") or die(mysql_error());
	$c = mysql_fetch_array($sql);
	$c['online'] = $c['online'] == '1' ? 'Sim' : 'Não';
	return $c['online'];
}

function items($s) {
	//$s = $s == 'PAPERDOLL' ? 'EQUIPADO' : 'GUARDADO NO INVENTARIO';
	if($s == 'PAPERDOLL') {
		return 'EQUIPADO';
		}elseif($s == 'INVENTORY') {
			return 'GUARDADO NO INVENTÓRIO';
			}elseif($s == 'CLANWH') {
				return 'GUARDADO NA WAREHOUSE CLAN';
				}else{
				return 'GUARDADO NA WAREHOUSE';
	}
}