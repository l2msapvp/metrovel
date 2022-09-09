<?
 //////////////////////////////////////
 // Statistik Script by I-Web Design //
 // -------------------------------- //
 // Contact: webmaster@michieru.de   //
 // Homepage: www.michieru.de        //
 //                                  //
 // Using:                           //
 // You can use the Script for free  //
 // and edit it in all places. Only  //
 // keep this head-copyright on each //
 // site of this script.             //
 // See info.txt for more details!!! //
 //////////////////////////////////////

 //Database
 //////////
 $dbhost="localhost"; //Host/IP from the MySQL Database
 $dbname="l2j";     //Name of Database (in many times it is 'l2j')
 $dbuser="root";      //Username to the MySQL Database
 $dbpass="";          //Passwort to the MySQL Database
$servidor = 'localhost'; 				//IP
$usuario  = 'root'; 					//Usuário DB
$senhadb  = ''; 					//Senha DB
$senha    = ''; 					//Repetir Senha DB
$db       = 'l2j'; 					//Nome da DB
$banco    = "l2j"; 				//Nome da DB

$con = mysql_connect($servidor, $usuario, $senhadb) or die(mysql_error());
mysql_select_db($db, $con) or die(mysql_error());

 $config['config_startpage']="home.php"; //The site where should displayed first
                                         //Home       = "home.php"


 //Config-Server variable
 ////////////////////////
 $config['server_path']="c:/interlude/gameserver/data/announcements.txt"; //Full path to the announcements.txt.
                                                                                     //example:
                                                                                     //Windows = C:/server/l2j-server/data/announcements.txt
                                                                                     //Linux = /usr/server/l2j-server/data/announcements.txt

 $config['server_ip']=$_SERVER["HTTP_HOST"]; //IP adress from the Server. $_SERVER["HTTP_HOST"] = IP from HTTP-server
                                      //example:
                                      //HTTP-Server IP = $config['server_ip']=$_SERVER["HTTP_HOST"];
                                      //External IP    = $config['server_ip']="127.0.0.1";

 //Controll displaying each site
 ///////////////////////////////
 //This options are experimental. You should test it to disable any Site before you make it public.
 //Problem that can be happen when a linked Site are disabled.
 //Example: Statistik->Player = disabled. Now you can Click on Statistik->Top100 on a name and you get a empty Site!
 $config['config_display_home']      ="yes"; //Display Home (yes, no)
 $config['config_display_home_game'] ="yes"; //Display Home->Game (yes, no)
 $config['config_display_home_faq']  ="yes"; //Display Home->FAQ (yes, no)
 $config['config_display_status']        ="yes"; //Display Status (yes, no)
 $config['config_display_status_server'] ="yes"; //Display Status->Server (yes, no)
 $config['config_display_status_online'] ="yes"; //Display Status->Online-Players (yes, no)
 $config['config_display_statistik']        ="yes"; //Display Statistik (yes, no)
 $config['config_display_statistik_top100'] ="yes"; //Display Statistik->Top100 (yes, no)
 $config['config_display_statistik_player'] ="yes"; //Display Statistik->Player (yes, no)
 $config['config_display_statistik_clan']   ="yes"; //Display Statistik->Clan (yes, no)
 $config['config_display_search_db']         ="yes"; //Display Search-DB (yes, no)
 $config['config_display_search_db_item']    ="yes"; //Display Search-DB->Item (yes, no)
 $config['config_display_search_db_armor']   ="yes"; //Display Search-DB->Armor (yes, no)
 $config['config_display_search_db_weapon']  ="yes"; //Display Search-DB->Weapon (yes, no)
 $config['config_display_search_db_monster'] ="yes"; //Display Search-DB->Monster (yes, no)
 $config['config_display_player_map']        ="yes"; //Display Player-Map (yes, no)
 $config['config_display_player_map_whole']  ="yes"; //Display Player-Map->Whole-Map (yes, no)
 $config['config_display_player_map_aden']   ="yes"; //Display Player-Map->Aden (yes, no)
 $config['config_display_player_map_elmore'] ="yes"; //Display Player-Map->Elmore (yes, no)

 ///////////////////////////////////////////////////////////////////////////////////////////////////
 //Dont edit behind this line///////////////////////////////////////////////////////////////////////
 ///////////////////////////////////////////////////////////////////////////////////////////////////

 $verbindung=MYSQL_CONNECT($dbhost,$dbuser,$dbpass) or die ("Datenbankserver nicht erreichbar");
 MYSQL_SELECT_DB($dbname) or die ("Datenbank nicht vorhanden");

 $get_config_data="SELECT online FROM characters WHERE online>0";
 $config_data=MYSQL_QUERY($get_config_data);
 $config['num_online']=mysql_num_rows($config_data);

 error_reporting(0);
 $IP = array(
  "login_server" => $config['server_ip'].":9014",
  "game_server" => $config['server_ip'].":7777",
 );
 while(list($ServerName,$Host)=each($IP))
 {
  list($IPAddress,$Port)=explode(":",$Host);
  if($fp=fsockopen($IPAddress,$Port,$ERROR_NO,$ERROR_STR,(float)0.5))
  {
   $config[$ServerName]="<font color=\"#00ff00\">Online</font>";
   fclose($fp);
  }else{
   $config[$ServerName]="<font color=\"#ff0000\">Offline</font>";
  }
 }

 mysql_close($verbindung);
?>
