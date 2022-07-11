<?php

namespace Database\Seeders;

use App\Models\Room;
use Illuminate\Database\Seeder;

class CreateRoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $room = [
                [
                'name' => 'khamsee',
                'roomtype_id' => '1',
                'member_id' => '1',
                'village' => 'khamhoung',
                'district ' => 'xaythany',
                'province' => 'vientaine',
                'horm' => 'horm 03',
                'far_from' => '200 m',
                'status' => 'empty',
                'location' => 'https://goo.gl/maps/59EHMzjpDuharyD16',
                'price' => '150000',
                'details' => 'every thins convenient for you.',
                'images' => 'jjjj.jpg',
                ],
                [
                    'name' => 'ddddd',
                    'roomtype_id' => '2',
                    'member_id' => '1',
                    'village' => 'khamhoung',
                    'district ' => 'xaythany',
                    'province' => 'vientaine',
                    'horm' => 'horm 04',
                    'far_from' => '100 m',
                    'status' => 'empty',
                    'location' => 'https://goo.gl/maps/59EHMzjpDuharyD16',
                    'price' => '150000',
                    'details' => 'every thins convenient for you.',
                    'images' => 'pppp.jpg',
                    ],
        ];
        foreach ($room as $key => $value) {
            Room::create($value);
        }
    }
}
