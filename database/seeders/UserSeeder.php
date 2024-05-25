<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User();
        $user->id = 1;
        $user->role_id = 1;
        $user->name = 'Syeich Khalil Annbiya';
        $user->email = 'syeichkhalil@gmail.com';
        $user->password = Hash::make('Rahasia123#');
        $user->phone = '+6281234567890';
        $user->address = 'Jl. Jalan Jalan No. 123';
        $user->nik = '1234567890123456';
        $user->save();

        $user = new User();
        $user->id = 2;
        $user->role_id = 2;
        $user->division_id = 3;
        $user->name = 'Khalil Annbiya';
        $user->email = 'khalilannbiya@gmailcom';
        $user->password = Hash::make('Rahasia123#');
        $user->phone = '+6281234567890';
        $user->address = 'Jl. Jalan Jalan No. 234';
        $user->nik = '1234567890123257';
        $user->save();

        $user = new User();
        $user->id = 3;
        $user->role_id = 3;
        $user->name = 'Indra Frimawan';
        $user->email = 'indrafri@gmailcom';
        $user->password = Hash::make('Rahasia123#');
        $user->phone = '+6281234567890';
        $user->address = 'Jl. Jalan Jalan No. 345';
        $user->nik = '1234567890123456';
        $user->save();
    }
}
