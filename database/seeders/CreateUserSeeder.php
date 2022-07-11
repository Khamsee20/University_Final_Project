<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name' => 'Admin',
                'Lname' =>'Admin',
                'gender'=>'ຊາຍ',
                'email' => 'admin@gmail.com',
                'position_id' => '1',
                'roles' => 'Admin',
                'password' => bcrypt('12345678'),
            ],
            [
                'name' => 'employee',
                'Lname' =>'ນາມສະກຸນ',
                'gender'=>'ຊາຍ',
                'email' => 'emp@gmail.com',
                'position_id' => '2',
                'roles' => 'Employee',
                'password' => bcrypt('12345678'),
            ],
            [
                'name' => 'Member',
                'Lname' =>'ນາມສະກຸນ',
                'gender'=>'ຊາຍ',
                'email' => 'member@gmail.com',
                'position_id' => '3',
                'roles' => 'Member',
                'password' => bcrypt('12345678'),
            ],
            [
                'name' => 'user',
                'Lname' =>'ນາມສະກຸນ',
                'gender'=>'ຊາຍ',
                'email' => 'user@gmail.com',
                'position_id' => '4',
                'roles' => 'User',
                'password' => bcrypt('12345678'),
            ],
            [
                'name' => 'ຄຳສີ',
                'Lname' =>'ຮັດສະນີ',
                'gender'=>'ຊາຍ',
                'email' => 'see@gmail.com',
                'position_id' => '4',
                'roles' => 'User',
                'password' => bcrypt('12345678'),
            ],

        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
