<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'productName' => 'Frijoles',
            'productPrice' => 7500,
            'ProductDescription' => 'Plato de frijoles rancheros con garra',
            'productQualication' => 5,
            'img' => '/productos/frijoles.jpg',
        ]);

        Product::create([
            'productName' => 'Lentejas',
            'productPrice' => 6500,
            'ProductDescription' => 'Plato de lentejas con carne picada',
            'productQualication' => 4,
            'img' => '/productos/lentejas.jpg',
        ]);

        Product::create([
            'productName' => 'Arroz mixto',
            'productPrice' => 5000,
            'ProductDescription' => 'Plato de arroz mixto con carnes picadas y maduritos',
            'productQualication' => 4,
            'img' => '/productos/arrozMixto.jpg',
        ]);

        Product::create([
            'productName' => 'Crema de verduras',
            'productPrice' => 5000,
            'ProductDescription' => 'Porción de crema de verduras con crema de leche y papas a la francesa',
            'productQualication' => 5,
            'img' => '/productos/cremaVerduras.jpg',
        ]);

        Product::create([
            'productName' => 'Arvejas',
            'productPrice' => 5500,
            'ProductDescription' => 'Porción de arvejas con carne picada',
            'productQualication' => 4,
            'img' => '/productos/arvejas.jpg',
        ]);

        Product::create([
            'productName' => 'Sancocho',
            'productPrice' => 6000,
            'ProductDescription' => 'Plato de sancocho con mazorca, papa, platano, yuca y porción de carne',
            'productQualication' => 5,
            'img' => '/productos/sancocho.jpg', 
        ]);

        Product::create([
            'productName' => 'Crema de pescado',
            'productPrice' => 4800,
            'ProductDescription' => 'Plato de crema de pescado, trozos de pescado y papitas',
            'productQualication' => 4,
            'img' => '/productos/cremaDePescado.jpg',
        ]);
    }
}
