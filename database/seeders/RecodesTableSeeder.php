<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Recode;

class RecodesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 12個のランダムなデータの作成
        Recode::factory()->count(12)->create();
    }
}