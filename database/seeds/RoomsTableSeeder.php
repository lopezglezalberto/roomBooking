<?php

use App\Models\Rooms;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class RoomsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $rooms = [];

        for ($i = 1; $i <= 10; $i++) {
            $rooms[] = [
                'id'          => $i,
                'name'        => 'Room ' . intval($i),
                'short_description'        => 'Room ' . intval($i),
                'description' => $faker->paragraph,
                'price_per_nigth'    => mt_rand(1, 10),
            ];
        }

        Rooms::insert($rooms);

    }
}
