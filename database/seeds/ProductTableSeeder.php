<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert(array(
            array(
                'name' => 'Ballpoint',
                'image' => 'Image/pen1.jpg',
                'typeId' => 2,
                'stock' => 100,
                'price' => 6000,
                'description' => 'Ordinary pen that have a round and blunt iron ball then at the end the ink is stored in a tube and thick'
            ),
            array(
                'name' => '2B Pencil',
                'image' => 'Image/pencil1.jpg',
                'typeId' => 1,
                'stock' => 200,
                'price' => 3000,
                'description' => 'Ordinary pencil that used on exam'
            ),
            array(
                'name' => 'Notebook Loose-Leaf Binding',
                'image' => 'Image/notebook1.jpg',
                'typeId' => 3,
                'stock' => 50,
                'price' => 25000,
                'description' => "Notebook's paper can be refilled as needed"
            ),
            array(
                'name' => 'English-Indonesian Dictionary',
                'image' => 'Image/dictionary1.jpg',
                'typeId' => 4,
                'stock' => 70,
                'price' => 45000,
                'description' => "Translating from english to indonesian"
            ),
            array(
                'name' => 'Joyko EB-30 Eraser',
                'image' => 'Image/eraser1.jpg',
                'typeId' => 5,
                'stock' => 250,
                'price' => 3500,
                'description' => "Erase pensil's handwriting"
            ),
            array(
                'name' => 'Straight Ruler',
                'image' => 'Image/ruler1.jpg',
                'typeId' => 6,
                'stock' => 250,
                'price' => 5500,
                'description' => "ruler with 20 to 30 cm long"
            ),
        ));	
    }
}
