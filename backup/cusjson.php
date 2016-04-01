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

$idp= $_REQUEST['query'];

$idp2= $_REQUEST['att1'];

$idp3= $_REQUEST['att2'];

$idp4= $_REQUEST['att3'];

$idp5= $_REQUEST['att4'];

$idp6= $_REQUEST['att4'];

// json output - insert table name below after "FROM"
$query = $idp;
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
        $idp2  => $row[$idp2], 
        $idp3  => $row[$idp3],
        $idp4  => $row[$idp4],
        $idp5  => $row[$idp5],
        $idp6  => $row[$idp6],


        );
    array_push($final,$feature);
};
mysql_close($connection);

// // Return routing result
    header("Content-Type:application/json",true);
    echo json_encode($final);
?>