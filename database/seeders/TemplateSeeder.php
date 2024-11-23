<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('templates')->insert([
            [
                'nom' => 'Template 1',
                'file_path' => '/temp1',
                'imagePrev' => '/images/back1.jpg',
            ],
            [
                'nom' => 'Template 2',
                'file_path' => '/temp2',
                'imagePrev' => '/images/back2.jpg',
            ],
            [
                'nom' => 'Template 3',
                'file_path' => '/temp3',
                'imagePrev' => '/images/back3.jpg',
            ],
        ]);
    }
}
