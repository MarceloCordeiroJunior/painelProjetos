<?php

namespace Database\Seeders;

use App\Models\macro;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class macrosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        macro::create([
            'nome'=>'',
            'descrição'=>'',
        ]);
    }
}
