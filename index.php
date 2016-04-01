<!DOCTYPE html>
<html>
  <head>
    <title>Seyisco - Roan Example</title>
    <meta name="viewport" content="initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <meta charset="utf-8">
    <style>
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #map {
        height: 80%;
      }
      #sidebar {
	      height: 80%;
        background-color: #f2f2f2;
      }
            #footer {
	      height: 10%;
        background-color: rgba(212, 212, 212, 0.81);
      }
    </style>
  </head>
  <body>
      <div class="container" style="background-color:#FFF !important; height:80px; padding-top:15px;">
        <div class="row">
          <div class="col-lg-9 pull-left">
            <img src="roan-trs.png" alt="#">
          </div>
          <div class="col-lg-3 pull-right">
            <img src="seyis-logo.png" style="margin-top:10px;" class="pull-left" alt="#">
            <a href="http://seyis.co/roan/dashboard.php" target="" class="btn btn-info pull-right" style="margin-top:10px;">Dashboard</a>
          </div>
        </div>
      </div>

      

  <div id ="map" class="col-md-8">Map is missing</div>
  <div id="sidebar" class="col-md-4">
	  <p id="p1">Click on any marker to see its properties!</p>
      <p id="p2"></p>
      <p id="p3"></p>
      <p id="p4"></p>
      <div>
      <?php

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
$query = 'SELECT * FROM news';
$dbquery = mysql_query($query);

if(! $dbquery )
{
  die('Could not get data: ' . mysql_error());
}




echo "<table border='2' class='table table-hover'>";
echo "<th>news</th>";
while($row=mysql_fetch_array($dbquery))
{ echo "<tr>";
$league_name=$row['news'];
echo "<td>".$league_name." </td>";

  echo "</tr>";
  }
echo "</table>";



mysql_close($connection);

?>


</div>
      
      
      
      </div>

<div class="col-md-12" id="footer"><p > co co co copyright shoow</p></div>
    
    <script>

      function initMap() {


      var la = 32;
      var le = 32;
      var myCenter=new google.maps.LatLng(la,le);

      var myLatLng = myCenter;

      var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 4,
        center: myLatLng
      });

setInterval(function(){
      var url = "http://seyis.co/roan/getjson.php";
      var request = new XMLHttpRequest();
      request.open("GET", url, false);
      request.send(null)
      var my_JSON_object = JSON.parse(request.responseText);
      //alert (my_JSON_object[6].title);


	  var markers =[];
	  var i = 0;
      for (; i < my_JSON_object.length; i++) {
        tit = my_JSON_object[i].title;

         var marker = new google.maps.Marker({
             position: new google.maps.LatLng(parseFloat(my_JSON_object[i].lat), parseFloat(my_JSON_object[i].lng)),
             map: map,
             title: tit,
             description: my_JSON_object[i].description
             
        });
          marker.addListener('click', function() {
		  //map.setZoom(8);
		  //map.setCenter(marker.getPosition());
		  document.getElementById("p1").innerHTML = "title: "+this.title;
document.getElementById("p2").innerHTML = "position: "+this.position;

document.getElementById("p3").innerHTML = "description: "+this.description;
  		});
        markers.push(marker);

      }
      },1000);
      
      //document.getElementById("p1").innerHTML = markers[i-1].title;

	  //alert(markers[i-1].title);
      }
    </script>
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBcIbmoW92AMasv2eOZefVY8RRc6-FI7vI&callback=initMap"></script>

      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>