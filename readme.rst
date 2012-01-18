##############
Hvad er dette?
##############

Denne klasse er til dig som gerne vil introducere GLS Pakkeshop som en del af dine ydelser.
Klassen anvender GLS SOAP Service ved hjælp af PHP's indbyggede SOAP klient.

Det giver dig muligheden for at søge efter pakkeshops ud fra adresser og postnumre.
Du kan også finde oplysninger om specifikke pakkeshops.

***********
Server Krav
***********

- PHP version 5.1.6 eller nyere
- PHP med --enable-libxml samt --enable-soap

*********
Eksempler
*********

I kildekoden medfølger nogle eksempler.

- Et banalt eksempel på en søgning (basic)
- Et banalt eksempel på en søgning ud fra postnummer (zipcode)
- Et banalt eksempel på en søgning med bestemmelse af antal søgeresultater (basic_extended)
- Et eksempel på anvendelse med AJAX (ajax)
- Et eksempel på en fuld liste med detaljevisning (full_list)