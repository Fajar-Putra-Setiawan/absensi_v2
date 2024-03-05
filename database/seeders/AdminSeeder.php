<?php

namespace Database\Seeders;

use App\Models\Kelas;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = [
            [
                'name'=>"Rusman As'ari",
                'email'=>"rusmanasari75@gmail.com",
                'role'=>"admin",
                'password'=>bcrypt('rusmanyuli12'),
            ],
            [
                'name'=>"Anas",
                'email'=>"anas01@gmail.com",
                'role'=>"guru",
                'password'=>bcrypt('aisyah123'),
            ],
            [
                'name'=>"guru1",
                'email'=>"guru1@gmail.com",
                'role'=>"guru",
                'password'=>bcrypt('guru'),
            ],
            [
                'name'=>"guru2",
                'email'=>"guru2@gmail.com",
                'role'=>"guru",
                'password'=>bcrypt('guru'),
            ],
            [
                'name'=>"guru3",
                'email'=>"guru3@gmail.com",
                'role'=>"guru",
                'password'=>bcrypt('guru'),
            ]
        ];
        $user = [
            ['name_teacher' => "Rusman As'ari",],
            ['name_teacher' => "Anas",],
            ['name_teacher' => "guru1",],
            ['name_teacher' => "guru2",],
            ['name_teacher' => "guru3",],
        ];

        $mapel = [
            ['name_subject' => 'Matematika',],
            ['name_subject' => 'Bahasa Indonesia',],
            ['name_subject' => 'Bahasa Inggris',],
            ['name_subject' => 'Pendidikan Jasmani',],
            ['name_subject' => 'Pendidikan Agama',],
        ];

        $kelas = [
            ['class_name' => 'X',],
            ['class_name' => 'XI',],
            ['class_name' => 'XII',],
        ];

        foreach ($user as $key => $val) {
            Teacher::create($val);
        }

        foreach ($admin as $key => $val) {
            User::create($val);
        }

        foreach ($mapel as $key => $val) {
            Subject::create($val);
        }

        foreach ($kelas as $key => $val) {
            Kelas::create($val);
        }
    }


}
