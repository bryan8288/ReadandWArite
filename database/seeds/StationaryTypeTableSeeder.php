<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StationaryTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('stationary_types')->insert(array(
            array(
                'name' => 'pencil',
                'image' => 'Image/pencilMain.jpg'
            ),
            array(
                'name' => 'pen',
                'image' => 'Image/penMain.jpg'
            ),
            array(
                'name' => 'notebook',
                'image' => 'Image/notebookMain.jpg'
            ),
            array(
                'name' => 'dictionary',
                'image' => 'Image/dictionaryMain.jpg'
            ),
            array(
                'name' => 'eraser',
                'image' => 'Image/eraserMain.jpg'
            ),
            array(
                'name' => 'ruler',
                'image' => 'Image/rulerMain.jpg'
            ),
        ));
    }
}
