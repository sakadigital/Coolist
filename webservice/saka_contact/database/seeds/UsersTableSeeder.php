<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
		DB::table('users')->insert([
			'id'=>1,
			'email'=>'agus@sakadigital.id',
			'first_name'=>'agus',
			'last_name'=>'wahyudi',
			'profile_picture'=>'upload/users/11-1.jpg',
			'password'=>'agus',
			'phone'=>'081368713112',
			'twitter'=>'Mistiawanagus',
			'facebook'=>'Agus Mistiawan',
			'linkedin'=>'Mistiawan',
			'registered'=>1,
			'roles_id'=>7,
			'companies_id'=>1,
			'status_types_id'=>2,
			'status_description'=>'Blok S',

		]);
		// DB::table('users')->insert([
		// 	'id'=>1,
		// 	'email'=>'agus@sakadigital.id',
		// 	'first_name'=>'',
		// 	'last_name'=>'',
		// 	'profile_picture'=>'',
		// 	'password'=>'',
		// 	'phone'=>'',
		// 	'twitter'=>'',
		// 	'facebook'=>'',
		// 	'linkedin'=>'',
		// 	'registered'=>,
		// 	'role_id'=>,
		// 	'company_id'=>,
		// 	'status_id'=>,
		// 	'status_description'=>'',

		// ]);
		// DB::table('users')->insert([
		// 	'id'=>1,
		// 	'email'=>'agus@sakadigital.id',
		// 	'first_name'=>'',
		// 	'last_name'=>'',
		// 	'profile_picture'=>'',
		// 	'password'=>'',
		// 	'phone'=>'',
		// 	'twitter'=>'',
		// 	'facebook'=>'',
		// 	'linkedin'=>'',
		// 	'registered'=>,
		// 	'role_id'=>,
		// 	'company_id'=>,
		// 	'status_id'=>,
		// 	'status_description'=>'',

		// ]);
		
    }
}
