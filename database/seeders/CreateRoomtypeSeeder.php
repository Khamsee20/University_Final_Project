<?php

namespace Database\Seeders;

use App\Models\Roomtype;
use Illuminate\Database\Seeder;

class CreateRoomtypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roomtype = [
            [
                'name' => '1 ຊັ້ນ',
            ],
            [
                'name' => '2 ຊັ້ນ',
            ],
            [
                'name' => '3 ຊັ້ນ',
            ],
        ];
        foreach ($roomtype as $key => $value) {
            Roomtype::create($value);
        }
    }
}
