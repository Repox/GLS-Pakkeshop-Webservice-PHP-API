<!DOCTYPE html>
<html>
	<head>
		<title>GLS Pakkeshop SOAP Service eksempel: AJAX</title>
		<style type="text/css">
		body { font-family: Calibri, Verdana, "Sans Serif"; }
		label { display: block; }			
		</style>
		<!-- Inkludering af jQuery -->
		<script style="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	</head>
	<body>

	<!-- AJAX kaldet og behandlingen af data -->
	<script type="text/javascript">
		
		function searchParcels()
		{
			$.post("search.php", { address: $('#address').val(), zipcode: $('#zipcode').val() },
   			function(data) {
   				var shops = $.parseJSON(data);
   				$('#shops_output').html('');
   				
   				for(i in shops)
   				{
   					var html = '<p>'
   					+ shops[i]['CompanyName'] + '<br>'
   					+ shops[i]['Streetname'] + '<br>'
   					+ shops[i]['ZipCode'] + ' ' + shops[i]['CityName'] + '<br>'
   					+ shops[i]['Telephone'] + '<br>'
   					+ '</p>';
   					$('#shops_output').append(html);
   				}
	
   		});			
		}
		
	</script>

	<h2>Indhentning af pakkeshops gennem AJAX (ved brug af jQuery)</h2>
	
	<p>
		Dette eksempel viser hvordan du kan søge efter nærmeste GLS Pakkeshops ved hjælp af AJAX.
	</p>
	
	<form method="post" action="search.php">
		<p>
			<label for="address">Adresse:</label>
			<input type="text" name="address" id="address">
		</p>
		
		<p>
			<label for="zipcode">Postnummer:</label>
			<input type="text" name="zipcode" id="zipcode">
		</p>		

		<p>
			<input type="button" onclick="javascript: searchParcels();" name="search" value="Søg">
		</p>		
	</form>
	
	<div id="shops_output">
	</div>
		
	</body>
</html>