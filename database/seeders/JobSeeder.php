<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Fake;
use Illuminate\Support\Facades\Hash;

use function Laravel\Prompts\table;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Fake::create('id_ID');
        foreach(range(1, 10) as $index){
            DB::table('jobs')->insert([
                'instation' => $faker->randomElement(['PT OTOMOTIF ', 'PT MAKANAN ', 'PT LOGISTIK ']) . $index,
                'desc' => '<ol><li>Pria ata uWanita</li><li>Pendidikan SMA (Khusus IPA) & SMK (SemuaJurusan)</li><li>Usia 18 tahun - 28 tahun</li><li>TB minimal(Pria: 160 & Wanita: 155)</li><li>Berat badan proporsional</li><li>Sudah Vaksin Booster</li><li>Sehat Mata</li></ol>',
                'position' => $faker->randomElement(['Operato Produksi', 'Admin PPIC', 'QC Inspection', 'Checker']),
                'start' => Carbon::now()->format('Y-m-d'),
                'end' => Carbon::now()->addDay(5, 10)->format('Y-m-d'),
                'selection' => $faker->randomElement([Carbon::now()->addDay(5, 10)->format('Y-m-d'), null]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }

        // DB::table('users')->insert([
        //     'name' => 'ROMI SANTOSO',
        //     'email' => 'r26santsoso@gmail.com',
        //     'password' => '$2y$12$CQ93Kfi.p6pdcMHqT7Vn1.NLmGhwwaJbPAFSWQcTg4GT2AF58jmlG',
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now(),
        // ]);
    }
}
