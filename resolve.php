<?php
header('Content-type: text/plain');
$username = "mtbilken_roanceo";
$password = "laylaylom1";
$hostname = "localhost";	
$database = "mtbilken_roan";


// Opens a connection to a mySQL server
$connection=mysql_connect ($hostname, $username, $password);
if (!$connection) {
  die('Not connected : ' . mysql_error());
}

// Set the active mySQL database
$db_selected = mysql_select_db($database, $connection);
if (!$db_selected) {
  die ('Can\'t use db : ' . mysql_error());
}


// Parse the dbquery into geojson 
// ================================================
// ================================================
// Return markers as GeoJSON

$idp= $_REQUEST['id'];
;
$query = "UPDATE `mtbilken_roan`.`geoshow3` SET resolved='yes' WHERE  id = '$idp'";

$dbquery = mysql_query($query);

if(! $dbquery )
{
  die('Could not send data: ' . mysql_error());
}



$query = 'SELECT * FROM geoshow3';
$dbquery = mysql_query($query);

if(! $dbquery )
{
  die('Could not get data: ' . mysql_error());
}


mysql_close($connection);


?>