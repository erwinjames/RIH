<?php

require __DIR__ . "/../autoload.php";

use PayMaya\Model\Checkout\Buyer;
use PayMaya\Model\Checkout\Address;
use PayMaya\Model\Checkout\Contact;

class User
{
	private $firstName;
	private $middleName;
	private $lastName;
	private $contact;
	private $shippingAddress;
	private $billingAddress;

	public function __construct()
	{
		$this->firstName = "ej";
		$this->middleName = "manugas";
		$this->lastName = "man";

		// Contact
		$this->contact = new Contact();
		$this->contact->phone = "+63(2)987654321";
		$this->contact->email = "manugasewinjames@gmail.com";

		// Address
		$address = new Address();
		$address->line1 = "9F Robinsons Cybergate 3";
		$address->line2 = "Pioneer Street";
		$address->city = "Mandaluyong City";
		$address->state = "Metro Manila";
		$address->zipCode = "12345";
		$address->countryCode = "PH";
		$this->shippingAddress = $address;
		$this->billingAddress = $address;
	}
	
	public function buyerInfo()
	{
		$buyer = new Buyer();
		$buyer->firstName = $this->firstName;
		$buyer->middleName = $this->middleName;
		$buyer->lastName = $this->lastName;
		$buyer->contact = $this->contact;
		$buyer->shippingAddress = $this->shippingAddress;
		$buyer->billingAddress = $this->billingAddress;
		return $buyer;
	}
}
