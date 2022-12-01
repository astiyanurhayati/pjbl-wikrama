<?php

namespace Database\Seeders;

use App\Models\Teacher;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'username' => 'asti',
            'password' => bcrypt('asti'),
            'is_teacher' => true
        ]);

        Teacher::create([
            'name' => 'adminrpl',
            'nip' => '1111111111',
            'user_id' => $user->id
        ]);
    }
}
