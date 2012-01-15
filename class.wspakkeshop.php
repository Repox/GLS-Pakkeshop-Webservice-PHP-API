<?php
	error_reporting(-1);
	header("Content-Type: text/plain; charset=UTF-8");

	/**
	 * This class will enable access to the GLS Pakkeshop webservcie.
	 * The service descriptio is located at http://www.gls.dk/webservices_v2/wsPakkeshop.asmx
	 * Methods available in this class matches technical documentation v.1.0.0.2 from GLS.
	 *
	 * Requirements:
	 * PHP 5 with
	 * --enable-libxml
	 * --enable-soap
	 * 
	 * @author Dan Storm
	 * @created 15/01/2012
	 * @info http://catalystcode.net
	 * @version 1.0
	 */

	class wsPakkeshop
	{
		private $client;
		public $error;
		
		/**
		 * This is the constructor method.
		 * This starts the SoapClient to GLS wsPakkeshop SOAP service.
		 * The __construct takes no parameters.
		 */
		public function __construct()
		{
			$this->client = new SoapClient("http://www.gls.dk/webservices_v2/wsPakkeshop.asmx?WSDL");
		}	
		
		/**
		 * This method returns an array of objects with all
		 * registrered parcel shops.
		 *
		 * @access	public
		 * @return	mixed	An array of objects or boolean false if service call failed.
		 */
		public function GetAllParcelShops()
		{
			try
			{	
				$shops = $this->client->GetAllParcelShops(array());
				return $shops->GetAllParcelShopsResult->PakkeshopData;		
			}
			catch(Exception $e)
			{
				$this->error = __METHOD__.': '.$e->getMessage();
				return false;
			}			
		}
		
		
		/**
		 * This method returns an array of objects with parcel shops
		 * near the exact address specfied. The street name and number
		 * needs to be provided for this to work.
		 * The service call will fail is address doesn't exist.
		 *
		 * @acess	public
		 * @param	string	Exact street address with streetnumber
		 * @param	int	The zipcode for the provided address
		 * @param	int	The amount of parcel shops returned - default is 5.
		 * @return	mixed	An array of objects or boolean false if service call failed.
		 */
		public function GetNearstParcelShops( $street, $zipcode, $amount = 5)
		{
			try
			{
				$shops = $this->client->GetNearstParcelShops(array('street' => $street, 'zipcode' => $zipcode, 'Amount' => $amount));
				return $shops->GetNearstParcelShopsResult->parcelshops->PakkeshopData;
			}
			catch(Exception $e)
			{
				$this->error = __METHOD__.': '.$e->getMessage();
				return false;
			}
		}
		
		/**
		 * This method returns an object for the specific parcel shop from it's
		 * parcel shop number.
		 *
		 * @access	public
		 * @param	int	The number of the parcel shop.
		 * @return	mixed	An object of the parcel shop or boolean false if service call failed.
		 */
		public function GetOneParcelShop( $ParcelShopNumber )
		{
			try
			{	
				$shop = $this->client->GetOneParcelShop(array('ParcelShopNumber' => $ParcelShopNumber));
				return $shop->GetOneParcelShopResult;
			}
			catch(Exception $e)
			{
				$this->error = __METHOD__.': '.$e->getMessage();
				return false;
			}
			
		}

		/**
		 * This method returns an array of objects with parcel shops
		 * near in the specified zipcode.
		 *
		 * @access	public
		 * @param	int	The zipcode to find parcel shops in.
		 * @return	mixed	An array of objects or boolean false if service call failed.
		 */
		public function GetParcelShopsInZipcode( $zipcode )
		{
			try
			{	
				$shops = $this->client->GetParcelShopsInZipcode(array('zipcode' => $zipcode));
				if(isset($shops->GetParcelShopsInZipcodeResult->PakkeshopData))
					return $shops->GetParcelShopsInZipcodeResult->PakkeshopData;
				else
					return array();
			}
			catch(Exception $e)
			{
				$this->error = __METHOD__.': '.$e->getMessage();
				return false;
			}
			
		}	

		/**
		 * This method returns an array of objects with parcel shops
		 * near the exact address specfied OR the zipcode provided.
		 * If the streetname and number cannot be found in the provided zipcode
		 * the search for nearest parcel shops is expanded and limited to parcel 
		 * shops in the  provided zipcode.
		 *
		 * @access	public
		 * @param	string	Exact street address with streetnumber
		 * @param	int	The zipcode for the provided address
		 * @param	int	The amount of parcel shops returned - default is 5.
		 * @return	mixed	An array of objects or boolean false if service call failed.
		 */		
		public function SearchNearestParcelShops( $street, $zipcode, $amount = 5)
		{
			try
			{
				$shops = $this->client->SearchNearestParcelShops(array('street' => $street, 'zipcode' => $zipcode, 'Amount' => $amount));
				return $shops->SearchNearestParcelShops->parcelshops->PakkeshopData;
			}
			catch(Exception $e)
			{
				$this->error = __METHOD__.': '.$e->getMessage();
				return false;
			}			
		}
		
	}
	
?>