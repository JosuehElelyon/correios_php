# Correios PHP SDK

Uma maneira fácil de interagir com as principais funcionalidades dos [Correios](https://correios.com.br).

## Funcionalidades

- [Calcular Preços e Prazos](#calcular-preços-e-prazos)

## Instalação

Via Composer

``` bash
$ composer require flyingluscas/correios-php
```

## Uso

### Calcular Preços e Prazos

Calcular preços e prazos de serviços de entrega (Sedex, PAC e etc), com **suporte a multiplos objetos** na mesma consulta.

``` php
use FlyingLuscas\Correios\Client;
use FlyingLuscas\Correios\Service;

require 'vendor/autoload.php';

$correios = new Client;

$correios->freight()
    ->origin('01001-000')
    ->destination('87047-230')
    ->services(Service::SEDEX, Service::PAC)
    ->item(16, 16, 16, .3, 1) // largura, altura, comprimento, peso e quantidade
    ->item(16, 16, 16, .3, 3) // largura, altura, comprimento, peso e quantidade
    ->item(16, 16, 16, .3, 2) // largura, altura, comprimento, peso e quantidade
    ->calculate();

/*

Resultados:

[
    [
        'name' => 'Sedex',
        'code' => 40010,
        'price' => 51,
        'deadline' => 4,
        'error' => [],
    ],
    [
        'name' => 'PAC',
        'code' => 41106,
        'price' => 22.5,
        'deadline' => 9,
        'error' => [],
    ],
]
*/
```

