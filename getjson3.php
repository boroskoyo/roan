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

// json output - insert table name below after "FROM"
$query = 'SELECT COUNT(`resolved`) AS `count`, `resolved` 
FROM `geoshow3` 
GROUP BY `resolved`';
$dbquery = mysql_query($query);

if(! $dbquery )
{
  die('Could not get data: ' . mysql_error());
}

// Parse the dbquery into geojson 
// ================================================
// ================================================
// Return markers as GeoJSON

$final = array();
while($row = mysql_fetch_assoc($dbquery)) {
    $feature = array(
        'count' => $row['count'], 
        'resolved' => $row['resolved']


        );
    array_push($final,$feature);
};
mysql_close($connection);

// // Return routing result
    header("Content-Type:application/json",true);
    echo json_encode($final);
?>