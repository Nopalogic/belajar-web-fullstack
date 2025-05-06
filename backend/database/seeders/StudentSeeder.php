<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('students')->insert([
            [
                'nama' => 'Ahmad Rizki',
                'nim' => '2201001',
                'jurusan' => 'Informatika'
            ],
            [
                'nama' => 'Budi Santoso',
                'nim' => '2201002',
                'jurusan' => 'Sistem Informasi'
            ],
            [
                'nama' => 'Citra Dewi',
                'nim' => '2201003',
                'jurusan' => 'Teknik Komputer'
            ],
            [
                'nama' => 'Dimas Pratama',
                'nim' => '2201004',
                'jurusan' => 'Informatika'
            ],
            [
                'nama' => 'Eka Ramadhani',
                'nim' => '2201005',
                'jurusan' => 'Sistem Informasi'
            ],
            [
                'nama' => 'Fajar Setiawan',
                'nim' => '2201006',
                'jurusan' => 'Teknik Komputer'
            ],
            [
                'nama' => 'Gita Permata',
                'nim' => '2201007',
                'jurusan' => 'Informatika'
            ],
            [
                'nama' => 'Hadi Saputra',
                'nim' => '2201008',
                'jurusan' => 'Sistem Informasi'
            ],
            [
                'nama' => 'Indah Lestari',
                'nim' => '2201009',
                'jurusan' => 'Teknik Komputer'
            ],
            [
                'nama' => 'Joko Susilo',
                'nim' => '2201010',
                'jurusan' => 'Informatika'
            ],
        ]);
    }
}
