<?php
$conexion = mysqli_connect('localhost:3307','root','12345','googlemap') or die("No se ha conectado a la base de datos");
$query= 'select * from locales';
$resultado = mysqli_query($conexion, $query);

?>

<!DOCTYPE html>
<html>
  <head>
    <title>Actividad 6</title>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <style type="text/css">
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 50%;
        width:50;
      }

      /* Optional: Makes the sample page fill the window. */
      html,
      body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
    <script>
      let map;

      function initMap() {
        map = new google.maps.Map(document.getElementById("map"), {
          center: { lat: 41.3879, lng: 2.16992 },
          zoom: 12,
        });

        let misLugares = [];

        <?php
        while($fila = mysqli_fetch_array($resultado)){
            extract($fila);
            echo "misLugares.push([".$coordenadas.", '".$nombre."']);";
        }

        ?>

  // Create an info window to share between markers.
  const infoWindow = new google.maps.InfoWindow();
  // Create the markers.
  misLugares.forEach(([position, title], i) => {
    const marker = new google.maps.Marker({
      position,
      map,
      title: `${i + 1}. ${title}`,
      optimized: false,
    });
    // Add a click listener for each marker, and set up the info window.
    marker.addListener("click", () => {
      infoWindow.close();
      infoWindow.setContent(marker.getTitle());
      infoWindow.open(marker.getMap(), marker);
    });
  });

      }
    </script>
  </head>
  <body>
    <h1>Google Map</h1><br/>
    <div id="map"></div>

  <!--He elegido todos mis locales estan ubicados en Barcelona-->
  
  <h1>El tiempo en Barcelona</h1>

  <?php

  $ciudad = 'Barcelona';
  $apiKey = '96582b09752571812698d715faeb8440';
  $api_url = 'http://api.openweathermap.org/data/2.5/weather?q='.$ciudad.'&appid='.$apiKey;
  $weather_data = json_decode(file_get_contents($api_url),true);

  $temperature = $weather_data['main']['temp'];
  $temperature_in_celcius = $temperature -273.15;

  echo round($temperature_in_celcius)."grados.";
?>  

    <!-- Async script executes immediately and must be after any DOM elements used in callback. -->
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyASwle2EO-8c9hPdQlLvQ1BuY9LGQbIzLc&callback=initMap&libraries=&v=weekly"
      async
    ></script>
  </body>
</html>