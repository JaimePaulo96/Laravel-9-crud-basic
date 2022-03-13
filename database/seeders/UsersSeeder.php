<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       User::create ([
           'user' => 'jaime.paulo',
           'password' => bcrypt('jgt1996fec'),
           'name' => 'Jaime Paulo',
           'occupation' => 'Desenvolvedor',
           'level' => '4'
       ]);
    }
}
