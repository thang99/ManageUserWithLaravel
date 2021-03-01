<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
         
            [
                'name'=> 'Ngô Văn Thắng',
                'birthday' => '1999-11-11',
                'address' => 'Hà Nội',
                'telephone' => '0123654789',
                'email' => 'thang@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 0,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name'=> 'Hà Văn Dương',
                'birthday' => '1999-01-02',
                'address' => 'Thanh Hóa',
                'telephone' => '0123654789',
                'email' => 'duong@gmail.com',
                'password' => Hash::make('11111111'),
                'role' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]
        ]
    );
    }
}
