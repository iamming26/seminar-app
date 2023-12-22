<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Fake;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use function Laravel\Prompts\table;

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
                'title' => 'Pelatihan Dan Sertifikasi ' . $index,
                'location' => 'R. Pelatihan Lt. ' . rand(2,7),
                'start' => Carbon::now()->addDay($num), 
                'end' => Carbon::now()->addDay($num),
                'date' => Carbon::now()->addDay($num+3),
                'keynote_speaker' => $faker->name(),
                'description' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quibusdam ullam quaerat laudantium ipsa. Neque doloribus ipsam quidem amet, mollitia illum officia debitis odit hic voluptatum consequatur laudantium. Nesciunt eligendi nemo.',
            ]);
        }

        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@email.com',
            'password' => Hash::make('1'),
            'type' => 1,
        ]);

        DB::table('users')->insert([
            'name' => 'Bagus Adi P.',
            'email' => 'bagus@email.com',
            'password' => Hash::make('1'),
        ]);

        DB::table('users')->insert([
            'name' => 'Cahya Ning T..',
            'email' => 'caha@email.com',
            'password' => Hash::make('1'),
        ]);

        DB::table('users')->insert([
            'name' => 'Rendi Juliansyah',
            'email' => 'rendi@email.com',
            'password' => Hash::make('1'),
        ]);

        DB::table('users')->insert([
            'name' => 'Amar Husaen',
            'email' => 'amar@email.com',
            'password' => Hash::make('1'),
        ]);

        DB::table('users')->insert([
            'name' => 'Yoda Adi P.',
            'email' => 'yoga@email.com',
            'password' => Hash::make('1'),
        ]);

        DB::table('users')->insert([
            'name' => 'Diningsih',
            'email' => 'dini@email.com',
            'password' => Hash::make('1'),
        ]);
        DB::table('users')->insert([
            'name' => 'Sekar Aji Dwi Astusi',
            'email' => 'sekar@email.com',
            'password' => Hash::make('1'),
        ]);

        DB::table('users')->insert([
            'name' => 'Wahyu Pangestu',
            'email' => 'wahyu@email.com',
            'password' => Hash::make('1'),
        ]);

        DB::table('users')->insert([
            'name' => 'Kiki Baskoro',
            'email' => 'kiki@email.com',
            'password' => Hash::make('1'),
        ]);

        DB::table('users')->insert([
            'name' => 'Rivaldi',
            'email' => 'rival@email.com',
            'password' => Hash::make('1'),
        ]);

        foreach(range(2, 6) as $index){
            DB::table('register_events')->insert([
                'student_id' => rand(2, 10),
                'event_id' => $index,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
