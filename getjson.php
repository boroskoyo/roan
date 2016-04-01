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
$query = 'SELECT * FROM geoshow3';
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
    'id' => $row['id'],
        'title' => $row['title'], 
        'lat' => $row['ltd'], 
        'lng' => $row['lon'],
        'description' => $row['description'],
	'date' => $row['date'],
	'resolved' => $row['resolved'],
	'shape' => $row['shape'],
	'cons' => $row['cons']
	
        );
    array_push($final,$feature);
};
mysql_close($connection);

// // Return routing result
    header("Content-Type:application/json",true);
    echo json_encode($final);
?>