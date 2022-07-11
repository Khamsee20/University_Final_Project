<?php

namespace Database\Seeders;

use App\Models\Position;
use Illuminate\Database\Seeder;

class CreatePositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $post = [
            [
                'name' => 'admin',
            ],
            [
                'name' => 'employee',
            ],
            [
                'name' => 'member',
            ],
            [
                'name' => 'user',
            ],
        ];
        foreach ($post as $key => $value) {
            Position::create($value);
        }
    }
}
