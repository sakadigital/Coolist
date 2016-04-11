<?php

use Illuminate\Database\Seeder;

class StatusTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('status_types')->delete();
		DB::table('status_types')->insert([
			'id'=>1,
			'name'=>'Depok',
		]);
		DB::table('status_types')->insert([
			'id'=>2,
			'name'=>'Blok S',
		]); 
    }
}
