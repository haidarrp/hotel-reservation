<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('rooms')->insert([
            [
                'room_number'=>101,
                'type'=> '1 Single',
                'room_area'=> '15',
                'price'=>250000,
                'floor'=>'1'
            ],
            [
                'room_number'=>102,
                'type'=> '1 Queen',
                'room_area'=> '15',
                'price'=>350000,
                'floor'=>'1'
            ],
            [
                'room_number'=>103,
                'type'=> '2 Single',
                'room_area'=> '15',
                'price'=>300000,
                'floor'=>'1'
            ],
        ]);
    }
}
