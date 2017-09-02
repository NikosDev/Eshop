<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product= new \App\Product([
            'imagePath' => 'images/ps4.jpg',
            'title' => 'Playstasion4',
            'description' => 'PlayStation 4 is a home video game console developed by Sony Computer Entertainment. ',
            'price' => '30'
        ]);
        $product->save();
        
        $product= new \App\Product([
            'imagePath' => 'images/xbox.jpg',
            'title' => 'Xbox one',
            'description' => 'Xbox One is a home video game console developed by Microsoft.',
            'price' => '200'
        ]);
        $product->save();
        
        $product= new \App\Product([
            'imagePath' => 'images/wii.jpg',
            'title' => 'Wii',
            'description' => 'Wii is a home video game console released by Nintendo.',
            'price' => '150'
        ]);
        $product->save();
        
        $product= new \App\Product([
            'imagePath' => 'images/nintendo.png',
            'title' => 'Nintendo DS',
            'description' => 'Nintendo DS is a 32-bit dual-screen handheld game console developed and released by Nintendo.',
            'price' => '250'
        ]);
        $product->save();
        
        $product= new \App\Product([
            'imagePath' => 'images/psp.jpg',
            'title' => 'PSP',
            'description' => 'PlayStation Portable (PSP) is a handheld game console developed by Sony.Development of the handheld was announced during E3 2003',
            'price' => '350'
        ]);
        $product->save();
    }
}
