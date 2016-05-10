<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
    {
    	DB::table('users')->insert([
    		'id' => '1',
    		'email' => 'admin@admin.com',
    		'password' => bcrypt('123456'),
    		'realName' => 'Admin',
    		'role' => '0'
    	]);
    	DB::table('users')->insert([
    		'id' => '2',
    		'email' => 'partner@partner.com',
    		'password' => bcrypt('123456'),
    		'realName' => 'Công ty vận chuyển ABC',
    		'role' => '1'
    	]);
        DB::table('types')->insert([
            'id' => '1',
            'name' => 'Nhỏ',
            'fee' => '4000'
        ]);
        DB::table('types')->insert([
            'id' => '2',
            'name' => 'Vừa',
            'fee' => '7000'
        ]);
        DB::table('types')->insert([
            'id' => '3',
            'name' => 'Lớn',
            'fee' => '10000'
        ]);
    }
}
