<?php

namespace App\Library;

use FlyingLuscas\Correios\Client;
use FlyingLuscas\Correios\Service;

class ShippingLibrary
{

    public function calculaterShipping($ceporigen, $zipcode, $width, $height, $length, $weight, $quantity)
    {
        $correios = new Client;

       return $correios->freight()
        ->origin($ceporigen)
        ->destination($zipcode)
        ->services(Service::SEDEX, Service::PAC)
        ->item($width, $height, $length, $weight, $quantity) // largura, altura, comprimento, peso e quantidade
        //->item(0, 0, 0, 0, 0) // largura, altura, comprimento, peso e quantidade
        ->calculate();
    }

}