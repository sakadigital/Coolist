<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->delete();
		DB::table('roles')->insert([
			'id'=>1,
			'name'=>'CEO',
		]);
		DB::table('roles')->insert([
			'id'=>2,
			'name'=>'CTO',
		]); 
		DB::table('roles')->insert([
			'id'=>3,
			'name'=>'CUX',
		]); 
		DB::table('roles')->insert([
			'id'=>4,
			'name'=>'Senior Production',
		]); 
		DB::table('roles')->insert([
			'id'=>5,
			'name'=>'Producer',
		]); 
		DB::table('roles')->insert([
			'id'=>6,
			'name'=>'UX Designer',
		]); 
		DB::table('roles')->insert([
			'id'=>7,
			'name'=>'Mobile Developer',
		]); 
		DB::table('roles')->insert([
			'id'=>8,
			'name'=>'Web Developer',
		]);     
	}
}
