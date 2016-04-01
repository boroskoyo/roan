e<html>
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
      	#canvas-holder{
				width:30%;
			}
      #map {
        height:100%;
      }
      #sidebar {
	      height: 100%;
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
            <a href="index.php" target="" class="btn btn-info pull-right" style="margin-top:10px;">Main Page</a>
          </div>
        </div>
      </div>

      
    
    <div class="container">
  <h2>Dashboard</h2>
  <ul class="nav nav-pills">
    <li class="active"><a data-toggle="pill" href="#home">Map</a></li>
    <li><a data-toggle="pill" href="#menu1">Tables</a></li>
    <li><a data-toggle="pill" href="#menu2">Statistics</a></li>
    <li><a data-toggle="pill" href="#menu3">News</a></li>
  </ul>
  
  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <h3>HOME</h3>
  <div id ="map" class="col-md-8">Let there be map</div>
  <div id="sidebar" class="col-md-4">
	  <p id="p1">Click on any market to see its properties!</p>
	  <p id="pipileyta">-</p>
      <p id="p2">-</p>
      <p id="p3"></p>
      <p id="p4"></p>
      <p id="p5"></p>

        <div class="form-group">
    <label for="title">Title:</label>
    <input type="text" class="form-control" id="title2">
  </div>
  <div class="form-group">
    <label for="desc">Description:</label>
    <input type="text" class="form-control" id="desc2">
  </div>
      <input id="set2" type="button" value="set">
      <input id="delete" type="button" value="delete">
          <div id="floating-panel">
      <input id="address" type="textbox" value="Bilkent, Ankara">
      <input id="submit" type="button" value="Geocode">
    </div>
      
      
      </div>

        </div>
    <div id="menu1" class="tab-pane fade">
      <h3>Tables</h3>
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
$query = 'SELECT * FROM geoshow3';
$dbquery = mysql_query($query);

if(! $dbquery )
{
  die('Could not get data: ' . mysql_error());
}




echo "<table border='2' class='table table-hover'>";
echo "<th>id</th><th>title</th><th>description</th><th>lat</th><th>lng</th><th>date</th><th>time</th><th>resolved</th><th>shape</th><th>cons</th><th>resolve</th><th>delete</th>";
while($row=mysql_fetch_array($dbquery))
{ echo "<tr>";
$league_name=$row['id'];
$league_id5=$row['title'];
$country=$row['description'];
$league_id=$row['ltd'];
$league_id2=$row['lon'];
$league_id3=$row['date'];
$league_id4=$row['resolved'];
$league_id6=$row['shape'];
$league_id7=$row['time'];
$league_id8=$row['cons'];
echo "<td>".$league_name." </td>";
   echo "<td>".$league_id5."</td>";
 echo "<td>".$country." </td>";
   echo "<td>".$league_id."</td>";
echo "<td>".$league_id2."</td>";
echo "<td>".$league_id3."</td>";
echo "<td>".$league_id7."</td>";
echo "<td>".$league_id4."</td>";
echo "<td>".$league_id6."</td>";
echo "<td>".$league_id8."</td>";
   echo "<td><a href='resolve.php?id=$league_name' onclick='popitup(\"#menu3' >resolve</a></td>";
   echo "<td><a href='deleteSpe.php?id=$league_name' onclick='popitup(\"deleteSpe.php?id=$league_name)' >delete</a></td>";
  echo "</tr>";
  }
echo "</table>";



mysql_close($connection);

?>


</div>


<div><form class="form-inline" role="form">
<h3>add new</h3>
  <div class="form-group">
    <label for="title">Title:</label>
    <input type="text" class="form-control" id="title">
  </div>
  <div class="form-group">
    <label for="desc">Describtion:</label>
    <input type="text" class="form-control" id="desc">
  </div>
  <div class="form-group">
    <label for="lat">Latitude:</label>
    <input type="text" class="form-control" id="lat">
  </div>
  <div class="form-group">
    <label for="lon">Longtitude:</label>
    <input type="text" class="form-control" id="long">
  </div>
    <div class="form-group">
    <label for="dat">Date:</label>
    <input type="text" class="form-control" id="dat">
  </div>
      <div class="form-group">
    <label for="shape">Shape:</label>
    <input type="text" class="form-control" id="shape">
  </div>
      <div class="form-group">
    <label for="time">Time:</label>
    <input type="text" class="form-control" id="time">
  </div>
      <div class="form-group">
    <label for="cons">Cons:</label>
    <input type="text" class="form-control" id="cons">
  </div>

  <button id="sub" type="submit" class="btn btn-default">Submit</button>
</form></div>
    </div>
    <div id="menu2" class="tab-pane fade">
      <h3>Statistics</h3>
       <h2 id="ekmek">total potholes detected:</h2>
      		<div id="canvas-holder">
			<canvas id="chart-area" class="col-md-4" width="500" height="500"/>
		</div>
		      		<div id="canvas-holder2">
			<canvas id="chart-area2" class="col-md-4" width="500" height="500"/>
		</div>
    </div>
    <div id="menu3" class="tab-pane fade">
    
      <h3>News</h3>
      <div><form class="form-inline" role="form">
<h3>add new</h3>
  <div class="form-group">
    <label for="news">news:</label>
    <input type="text" class="form-control" id="news">
  </div>
    <button id="sub2" type="submit" class="btn btn-default">Submit</button>
        <button id="delete2" type="submit" class="btn btn-default">delete all</button>

</form></div>
      
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
echo "<th>id</th><th>news</th><th>delete</th>";
while($row=mysql_fetch_array($dbquery))
{ echo "<tr>";
$league_name=$row['news'];
$league_name2=$row['id'];
echo "<td>".$league_name2." </td>";
echo "<td>".$league_name." </td>";
   echo "<td><a href='deleteNewsSpe.php?id=$league_name2' onclick='popitup(\"deleteSpe.php?id=$league_name2)' >delete</a></td>";

  echo "</tr>";
  }
echo "</table>";



mysql_close($connection);

?>


</div>
      

    </div>

  </div>
</div>
    
    
    
    
    
    
    <script>

      function initMap() {

      var url2 = "http://seyis.co/roan/getjson2.php";
      var request = new XMLHttpRequest();
      request.open("GET", url2, false);
      request.send(null)
      var my_JSON_object = JSON.parse(request.responseText);
      //alert (my_JSON_object[6].title);


	var obj = {
	        value: 300,
        color:"#F7464A",
        highlight: "#FF5A5E",
        label: "Red"
	};  

	  var data =[];
	  

	  var colors = ["#1abc9c", "#2ecc71", "#3498db", "#9b59b6", "#34495e", "#f1c40f", "#e67e22", "#e74c3c", "#2980b9", "#2ecc71", "#3498db", "#9b59b6", "#34495e", "#f1c40f", "#e67e22", "#e74c3c", "#2980b9", "#2ecc71", "#3498db", "#9b59b6", "#34495e", "#f1c40f", "#e67e22", "#e74c3c", "#2980b9", "#2ecc71", "#3498db", "#9b59b6", "#34495e", "#f1c40f", "#e67e22", "#e74c3c", "#2980b9", "#2ecc71", "#3498db", "#9b59b6", "#34495e", "#f1c40f", "#e67e22", "#e74c3c", "#2980b9"];
	
	  var i = 0;
      for (; i < my_JSON_object.length; i++) {
        tit = my_JSON_object[i].title;
        
		obj = {
	    value: my_JSON_object[i].count,
        color:colors[i],
        highlight: "#FF5A5E",
        label: tit
		};  
        
        
        data.push(obj);


      }
	var ctx = document.getElementById("chart-area").getContext("2d");
	myDoughnut = new Chart(ctx).Doughnut(data);
			




      var url3 = "http://seyis.co/roan/getjson3.php";
      var request = new XMLHttpRequest();
      request.open("GET", url3, false);
      request.send(null)
      var my_JSON_object = JSON.parse(request.responseText);
      //alert (my_JSON_object[6].title);


	var obj = {
	        value: 300,
        color:"#F7464A",
        highlight: "#FF5A5E",
        label: "Red"
	};  

	  var data =[];
	  

	  var colors = ["#1abc9c", "#2ecc71", "#3498db", "#9b59b6", "#34495e", "#f1c40f", "#e67e22", "#e74c3c", "#2980b9", "#2ecc71", "#3498db", "#9b59b6", "#34495e", "#f1c40f", "#e67e22", "#e74c3c", "#2980b9", "#2ecc71", "#3498db", "#9b59b6", "#34495e", "#f1c40f", "#e67e22", "#e74c3c", "#2980b9", "#2ecc71", "#3498db", "#9b59b6", "#34495e", "#f1c40f", "#e67e22", "#e74c3c", "#2980b9", "#2ecc71", "#3498db", "#9b59b6", "#34495e", "#f1c40f", "#e67e22", "#e74c3c", "#2980b9"];
	  
	  var i = 0;
      for (; i < my_JSON_object.length; i++) {
        tit = my_JSON_object[i].resolved;
        
		obj = {
	    value: my_JSON_object[i].count,
        color:colors[i],
        highlight: "#FF5A5E",
        label: tit
		};  
        
        
        data.push(obj);


      }
      			
				var ctx = document.getElementById("chart-area2").getContext("2d");
				window.myPie = new Chart(ctx).Pie(data);




      var la = 23;
      var le = 23
      var myCenter=new google.maps.LatLng(la,le);

      var myLatLng = myCenter;

      var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 4,
        center: myLatLng
      });
  var geocoder = new google.maps.Geocoder();

  document.getElementById('submit').addEventListener('click', function() {
    geocodeAddress(geocoder, map);
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
	  var pon = 0;
      for (; i < my_JSON_object.length; i++) {
        tit = my_JSON_object[i].title;
pon++;
         var marker = new google.maps.Marker({
             position: new google.maps.LatLng(parseFloat(my_JSON_object[i].lat), parseFloat(my_JSON_object[i].lng)),
             map: map,
             title: tit,
             id: my_JSON_object[i].id,
             desc: my_JSON_object[i].description
        });
          marker.addListener('click', function() {
		  //map.setZoom(8);
		  //map.setCenter(marker.getPosition());
		   document.getElementById("pipileyta").innerHTML = this.id;
		  document.getElementById("p2").innerHTML = this.position.lat();
		  document.getElementById("p3").innerHTML = this.position.lng();		  
		document.getElementById("p4").innerHTML = this.title;	
		document.getElementById("p5").innerHTML = this.desc;
  		});
        markers.push(marker);
	      		document.getElementById("ekmek").innerHTML = "Total potholes detected: " + pon;	

      }
         },1000);
      
        google.maps.event.addListener(map, 'click', function(event) {
  	marker=null;
    marker = new google.maps.Marker({position: event.latLng, map: map});
          marker.addListener('click', function() {
		  //map.setZoom(8);
		  //map.setCenter(marker.getPosition());
		  
		  document.getElementById("p2").innerHTML = this.position.lat();
		  document.getElementById("p3").innerHTML = this.position.lng();
document.getElementById("p4").innerHTML = "";
document.getElementById("p5").innerHTML = "";
  		});

  });
      
      
      //document.getElementById("p1").innerHTML = markers[i-1].title;

	  //alert(markers[i-1].title);

      
      

      
      	        document.getElementById('sub').addEventListener('click', function() {
      var url = "http://seyis.co/roan/add_data.php?tit="+document.getElementById('title').value+"&ltd="+document.getElementById('lat').value+"&lon="+document.getElementById('long').value+"&date="+document.getElementById('dat').value+"&des="+document.getElementById('desc').value;
      
      var request = new XMLHttpRequest();
      request.open("GET", url, false);
      request.send(null);
      
  });
  
  
        	        document.getElementById('sub2').addEventListener('click', function() {
      var url = "http://seyis.co/roan/add_news.php?news="+document.getElementById('news').value;
      
      var request = new XMLHttpRequest();
      request.open("GET", url, false);
      request.send(null);
      
  });
  
  
        	        document.getElementById('delete').addEventListener('click', function() {
      var url = "http://seyis.co/roan/deleteSpe.php?id="+document.getElementById("pipileyta").innerHTML;
      
      var request = new XMLHttpRequest();
      request.open("GET", url, false);
      request.send(null);
      location.reload();
  });
          	        document.getElementById('delete2').addEventListener('click', function() {
      var url = "http://seyis.co/roan/delete_news.php";
      
      var request = new XMLHttpRequest();
      request.open("GET", url, false);
      request.send(null);
      location.reload();
  });
  
  
     document.getElementById('set2').addEventListener('click', function() {
      var url = "http://seyis.co/roan/add_data.php?tit="+document.getElementById('title2').value+"&ltd="+document.getElementById("p2").innerHTML+"&lon="+document.getElementById("p3").innerHTML+"&des="+document.getElementById('desc2').value;
      
      var request = new XMLHttpRequest();
      request.open("GET", url, false);
      request.send(null);
          document.getElementById("p2").innerHTML = "-";
    document.getElementById("p3").innerHTML = "-";
     document.getElementById("p4").innerHTML = "";
     document.getElementById("p5").innerHTML = "";

      
  });
  
  function geocodeAddress(geocoder, resultsMap) {
  var address = document.getElementById('address').value;
  geocoder.geocode({'address': address}, function(results, status) {
    if (status === google.maps.GeocoderStatus.OK) {
      resultsMap.setCenter(results[0].geometry.location);
      var marker = new google.maps.Marker({
        map: resultsMap,
        position: results[0].geometry.location
      });
      marker.addListener('click', function() {

		  document.getElementById("p2").innerHTML = this.position.lat();
		  document.getElementById("p3").innerHTML = this.position.lng();
document.getElementById("p4").innerHTML = "";
document.getElementById("p5").innerHTML = "";

  		});
    } else {
      alert('Geocode was not successful for the following reason: ' + status);
    }
  });
}
}





  
  
    </script>
    
    
		
    
    
    <script src="src/Chart.Core.js"></script>
    <script src="src/Chart.js"></script>
		<script src="src/Chart.Doughnut.js"></script>
    
    
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBcIbmoW92AMasv2eOZefVY8RRc6-FI7vI&callback=initMap"></script>

      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>