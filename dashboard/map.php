<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
        <style>
          #map {
        height:100%;
      }
    </style>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Map | Roan - Road Fault Analytics</title>
    <!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Morris Chart Styles-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />


</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">
                  <img src="assets/img/logo.png" alt="#"  />
                </a>
            </div>
        </nav>
        <!--/. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
		<div id="sideNav" href=""><i class="fa fa-caret-right"></i></div>
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">

                    <li>
                        <a class="active-menu" href="index.html"><i class="fa fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="map.php"><i class="fa fa-map"></i> Map</a>
                    </li>
					<li>
                        <a href="stats.html"><i class="fa fa-bar-chart-o"></i> Statistics</a>
                    </li>
                    <li>
                        <a href="table.php"><i class="fa fa-table"></i> Fault Table</a>
                    </li>
                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">


                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Dashboard <small>Summary of your Roads</small>
                        </h1>
                    </div>
                </div>
                <div class="row">
                    <div id ="map" class="col-md-8">Let there be map</div>
  <div id="sidebar" class="col-md-4">
	  <p id="p1">Click on any market to see its properties!</p>
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



				<footer><p>All right reserved. Template by: <a href="http://seyis.co">seyisco</a></p>


				</footer>
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    
     <script>

      function initMap() {


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



      var marker = new google.maps.Marker({
        position: myLatLng,
        map: map,
      });
	  var markers =[];
	  var i = 0;
      for (; i < my_JSON_object.length; i++) {
        tit = my_JSON_object[i].title;

         marker = new google.maps.Marker({
             position: new google.maps.LatLng(parseFloat(my_JSON_object[i].lat), parseFloat(my_JSON_object[i].lng)),
             map: map,
             title: tit,
             desc: my_JSON_object[i].description
        });
          marker.addListener('click', function() {
		  //map.setZoom(8);
		  //map.setCenter(marker.getPosition());
		  
		  document.getElementById("p2").innerHTML = this.position.lat();
		  document.getElementById("p3").innerHTML = this.position.lng();		  
		document.getElementById("p4").innerHTML = this.title;	
		document.getElementById("p5").innerHTML = this.desc;
  		});
        markers.push(marker);

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

      }
      	        document.getElementById('sub').addEventListener('click', function() {
      var url = "http://seyis.co/roan/add_data.php?tit="+document.getElementById('title').value+"&ltd="+document.getElementById('lat').value+"&lon="+document.getElementById('long').value+"&des="+document.getElementById('desc').value;
      
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
      var url = "http://seyis.co/roan/deleteSpe.php?tit="+document.getElementById("p4").innerHTML;
      
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
  
  
    </script>
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBcIbmoW92AMasv2eOZefVY8RRc6-FI7vI&callback=initMap"></script>

    
    
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>

    <!--  Chart Js -->

	<script src="assets/js/easypiechart.js"></script>
	<script src="assets/js/easypiechart-data.js"></script>

	 <script src="assets/js/Lightweight-Chart/jquery.chart.js"></script>

    <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>

    <!-- Morris Chart Js -->
    <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
   <script src="assets/js/morris/morris.js"></script>


</body>

</html>