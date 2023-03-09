<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class ArtikelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        for ($i = 1; $i <= 50; $i++) {
            $date = Carbon::now()->subYear()->addDays($faker->numberBetween(-365, 0))->addMinutes($faker->numberBetween(0, 1440));
            DB::table('artikel')->insert([
                'artikel_tanggal' => $date,
                'artikel_judul' => $faker->name,
                'artikel_slug' => Str::slug($faker->name),
                'artikel_konten' => $faker->name,
                'artikel_sampul' => $faker->name,
                'artikel_author' => $faker->name,
                'artikel_kategori' => $faker->name,
                'artikel_status' => $faker->name,

            ]);
        }
    }
}
