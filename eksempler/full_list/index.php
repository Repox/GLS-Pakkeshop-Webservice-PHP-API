<?php
	/**
	 * Inkluder klassefilen og lav en instans af klassen
	 */
	include '../../class.wspakkeshop.php';
	$gls = new wsPakkeshop();
	
	/**
	 * Hent alle pakkeshops
	 */
	$shops = $gls->GetAllParcelShops();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>GLS Pakkeshop SOAP Service eksempel: Full list</title>
		<style type="text/css">
		body { font-family: Calibri, Verdana, "Sans Serif"; }
		label { display: block; }			
		</style>
	</head>
	<body>

	<h2>En liste visning over samtlige pakkeshops</h2>
	
	<p>
		Dette eksempel viser en overordnet liste over pakkeshops med et link til en visning af alle detaljer på en valgt pakkeshop.
	</p>
	

	<ol>
		<?php foreach($shops as $shop): ?>
		<li><a href="search.php?ParcelShopNumber=<?php echo trim($shop->Number); ?>"><?php echo trim($shop->Number); ?></a> - <?php echo trim($shop->CompanyName); ?></li>
		<?php endforeach; ?>
	</ol>
	

		
	</body>
</html>