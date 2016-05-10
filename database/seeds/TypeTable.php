<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;


class TypeTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
