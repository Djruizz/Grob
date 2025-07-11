<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $products = [
            'Abrasadera',
            'Amortiguadores',
            'Barras',
            'Bases de amortiguador',
            'Bujes',
            'Elevador de barra de torsión',
            'Excéntricos',
            'Gomas estabilizadoras',
            'Horquilla',
            'Hules de tirante',
            'Pasadores',
            'Resortes',
            'Rótula',
            'Topes de amortiguador',
            'Tornillos estabilizadores',
        ];

        foreach ($products as $productName) {
            $imageName = strtolower(str_replace(' ', '_', $productName)) . '.jpg';

            Product::updateOrCreate(
                ['name' => $productName],
                [
                    'image' => 'Suspension/' . $imageName,
                    'category' => 'Suspensión',
                ]
            );
        }
        $tractionProducts = [
            'balero',
            'balero doble',
            'cubre polvo',
            'juntas v.c',
            'mazas de rueda 1a. generación',
            'mazas de rueda 2a. generación',
            'mazas de rueda 3a. generación',
            'tripodes',
        ];
        foreach ($tractionProducts as $productName) {
            $imageName = strtolower(
                str_replace(
                    [' ', '.', 'Á', 'É', 'Í', 'Ó', 'Ú', 'Ñ'],
                    ['_', '', 'a', 'e', 'i', 'o', 'u', 'n'],
                    $productName
                )
            ) . '.jpg';

            Product::updateOrCreate(
                ['name' => $productName],
                [
                    'image' => 'Traccion/' . $imageName,
                    'category' => 'Tracción Delantera',
                ]
            );
        }
        $DirectionProducts = [
            'brazo auxiliar',
            'brazo pitman',
            'cremalleras',
            'cubre polvo',
            'gomas de cremallera',
            'pernos',
            'terminales',
            'tubo unión',
            'varilla',
            'varilla lateral',
            'vieletas',
        ];

        foreach ($DirectionProducts as $productName) {
            $imageName = strtolower(
                str_replace(
                    [' ', '.', 'á', 'é', 'í', 'ó', 'ú', 'ñ'],
                    ['_', '', 'a', 'e', 'i', 'o', 'u', 'n'],
                    $productName
                )
            ) . '.jpg';

            Product::updateOrCreate(
                ['name' => $productName],
                [
                    'image' => 'Direccion/' . $imageName,
                    'category' => 'Dirección',
                ]
            );
        }
        $soportesProducts = [
            'soporte motor',
            'soporte motor (torsión)',
            'soporte transmisión',
        ];

        foreach ($soportesProducts as $productName) {
            $imageName = strtolower(
                str_replace(
                    [' ', '.', 'á', 'é', 'í', 'ó', 'ú', 'ñ'],
                    ['_', '', 'a', 'e', 'i', 'o', 'u', 'n'],
                    $productName
                )
            ) . '.jpg';

            Product::updateOrCreate(
                ['name' => $productName],
                [
                    'image' => 'Soportes/' . $imageName,
                    'category' => 'Soporte',
                ]
            );
        }
    }
}
