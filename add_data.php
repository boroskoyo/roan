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

$idp= $_REQUEST['tit'];
$idp2= $_REQUEST['ltd'];
$idp3= $_REQUEST['lon'];
$idp4= $_REQUEST['des'];
$idp5= $_REQUEST['date'];
$idp6= $_REQUEST['shape'];
$idp7= $_REQUEST['time'];
$idp8= $_REQUEST['cons'];



$query = "INSERT INTO `mtbilken_roan`.`geoshow3` (`title`, `ltd`, `lon`, `description`, `date`, `shape`, `time`, `cons`) VALUES ('$idp', '$idp2', '$idp3', '$idp4','$idp5','$idp6','$idp7','$idp8');";
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
	'time' => $row['time'], 
	'cons' => $row['cons']
	
        );
    array_push($final,$feature);
};
mysql_close($connection);

// // Return routing result
    header("Content-Type:application/json",true);
    echo json_encode($final);
?>