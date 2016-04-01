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



$query = "DELETE FROM `mtbilken_roan`.`news` ;";

$dbquery = mysql_query($query);

if(! $dbquery )
{
  die('Could not send data: ' . mysql_error());
}



$query = 'SELECT * FROM geoshow';
$dbquery = mysql_query($query);

if(! $dbquery )
{
  die('Could not get data: ' . mysql_error());
}


$final = array();
while($row = mysql_fetch_assoc($dbquery)) {
    $feature = array(

        'news' => $row['news'], 



        );
    array_push($final,$feature);
};
mysql_close($connection);

// // Return routing result
    header("Content-Type:application/json",true);
    echo json_encode($final);
?>