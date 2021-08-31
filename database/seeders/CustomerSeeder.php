<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1 ; $i <= 20 ; $i++){
            DB::table('customers')->insert([
                'name' => Str::random(10),
                'email' => Str::random(10).'@gmail.com',
                'address' => Str::random(10),
                'gender' => '1',
                'date_of_birth' => Carbon::now(),
                'phone' => '000000000',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),

            ]);
        }
    }
}
