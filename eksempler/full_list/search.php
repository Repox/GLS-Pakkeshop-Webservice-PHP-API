<?php
	/**
	 * Inkluder klassefilen og lav en instans af klassen
	 */
	include '../../class.wspakkeshop.php';
	$gls = new wsPakkeshop();
	
	/**
	 * Ved at angive nummeret på den pakkeshop du gerne vil have oplysninger om
	 * kan du bruge følgende metode til at hente oplysningerne.
	 */
	$shop = $gls->GetOneParcelShop($_GET['ParcelShopNumber']);
		
?>
<!DOCTYPE html>
<html>
	<head>
		<title>GLS Pakkeshop SOAP Service eksempel: Full list - detaljevisning</title>
		<style type="text/css">
		body { font-family: Calibri, Verdana, "Sans Serif"; }
		label { display: block; }		
		</style>
		
		
    <script type="text/javascript"
      src="http://maps.googleapis.com/maps/api/js?key=AIzaSyA17rB2oNLyDqhkQByg38XGFqbWGB9Q2zA&sensor=true">
    </script>
    <script type="text/javascript">
      function initialize() {
      	var myLatlng = new google.maps.LatLng(<?php echo trim($shop->Latitude); ?>, <?php echo trim($shop->Longitude); ?>);
        var myOptions = {
          center: myLatlng,
          zoom: 16,
          mapTypeId: google.maps.MapTypeId.ROADMAP          
        };
        var map = new google.maps.Map(document.getElementById("map_canvas"),
            myOptions);
            
				var marker = new google.maps.Marker({
				      position: myLatlng,
				      map: map,
				      title:"<?php echo trim($shop->CompanyName); ?>"
				  });            
      }
      
    </script>
		
		
	</head>
	<body onload="initialize()">

	<h2>Detaljevisning</h2>
	
	<p>
		Herunder udskrives en detaljeret visning over en angivet pakkeshop.<br>
		Alle detaljerne er også tilgængelige på de andre søgemetoder.
	</p>
	
	
	<p>
		<strong><?php echo $shop->Number; ?></strong><br>
		<?php echo $shop->CompanyName; ?><br>
		<?php echo $shop->Streetname; ?><br>
		<?php echo $shop->Streetname2; ?><br>
		<?php echo $shop->ZipCode; ?> <?php echo $shop->CityName; ?><br>
		<?php echo $shop->Telephone; ?><br><br>		
		Latitude: <?php echo $shop->Latitude; ?><br>		
		Longitude: <?php echo $shop->Longitude; ?>
	</p>
		
	<div id="map_canvas" style="width:350px; height:350px;"></div>		
	
	<p>
		<strong>Åbningstider</strong>
		
		<ul>
		<?php foreach($shop->OpeningHours->Weekday as $day): ?>
		<li><?php echo $day->day; ?>: <?php echo $day->openAt->From; ?> - <?php echo $day->openAt->To; ?></li>
		
		<?php endforeach; ?>
	</ul>
		
	</p>
	
	
	
	<p>
		<a href="index.php">Vis liste igen</a>
		
	</body>
</html>