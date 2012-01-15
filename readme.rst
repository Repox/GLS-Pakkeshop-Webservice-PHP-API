##############
Hvad er dette?
##############

Denne klasse er til dig som gerne vil introducere GLS Pakkeshop som en del af dine ydelser.
Det giver dig muligheden for at søge efter pakkeshops ud fra adresser og postnumre.
Du kan også finde oplysninger om specifikke pakkeshops.

****************
Eksempel på brug
****************


	<?php
		require_once 'class.wspakkeshop.php';
		$gls = new wsPakkeshop();
		      
		// Find nærmeste pakkeshops nær Skyggevej 1 i 4600 Køge
		$shops = $gls->SearchNearestParcelShops('Skyggevej 1', 4600);
		foreach($shops as $shop)
		{
			// Udskriver pakkeshoppenes nummer og navn
			echo $shop->Number.": ".$shop->CompanyName."<br>";	
		}
	?>


***********
Server Krav
***********

- PHP version 5.1.6 eller nyere
- PHP med --enable-libxml samt --enable-soap

*****
To-do
*****

-	Klassen skal gøres kompatibel med nuSOAP
- Udarbejde eksempler på brug af klassen