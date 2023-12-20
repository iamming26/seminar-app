<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Fake;
use Illuminate\Support\Facades\DB;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Fake::create('id_ID');
        foreach (range(1, 10) as $index) {
            $num = rand(4, 12);
            DB::table('events')->insert([
                'title' => 'Seminar Teknik Informatika Event ' . $index,
                'location' => 'Gedung Aula Lt. ' . rand(2,7),
                'start' => Carbon::now()->addDay($num), 
                'end' => Carbon::now()->addDay($num),
                'keynote_speaker' => $faker->name(),
                'description' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quibusdam ullam quaerat laudantium ipsa. Neque doloribus ipsam quidem amet, mollitia illum officia debitis odit hic voluptatum consequatur laudantium. Nesciunt eligendi nemo, nihil nam magni a ab soluta esse perspiciatis voluptate eveniet non quae odit, incidunt impedit magnam consequuntur dolor eaque sed.',
            ]);
        }
    }
}
