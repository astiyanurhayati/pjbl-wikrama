<?php

namespace Database\Seeders;

use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'username' => 'siswa',
            'password' => bcrypt('siswa'),
        ]);

        // Student::create([
        //     'name' => 'cika',
        //     'nip' => '1200761612',
        //     'user_id' => $user->id
        // ]);
    }
}
