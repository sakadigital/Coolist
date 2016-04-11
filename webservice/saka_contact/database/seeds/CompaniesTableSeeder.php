<?php

use Illuminate\Database\Seeder;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('companies')->delete();
        DB::table('companies')->insert([
            'id'=>1,
            'name'=>'Saka Digital Arsana',
            'address'=>'PXw7pfbyt7',
            'token'=>'fFDn',
		]);
		DB::table('companies')->insert([
            'id'=>2,
            'name'=>'Flipbox',
            'address'=>'LGfkjwecS3',
            'token'=>'8mvj',
		]);
    }
}
