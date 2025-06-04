<?php

namespace App;

class Address
{
    public string $country = 'ZZ';
    public string $city = '';
    public string $street = '';
    public string $number = '';
    public string $zip = '00000';
    public float $latitude = 0;
    public float $longitude = 0;

    public function __construct($country, $city, $street, $number, $zip, $latitude = 0, $longitude = 0)
    {
        $this->country = $country;
        $this->city = $city;
        $this->street = $street;
        $this->number = $number;
        $this->zip = $zip;
        $this->latitude = $latitude;
        $this->longitude = $longitude;
    }
}
