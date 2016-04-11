<?php

use Illuminate\Database\Seeder;

class CompanyDomainsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('company_domains')->delete();
		DB::table('company_domains')->insert([
			'id'=>1,
			'companies_id'=>1,
			'domain'=>'sakadigital.id',
		]);
		DB::table('company_domains')->insert([
			'id'=>2,
			'companies_id'=>2,
			'domain'=>'flipbox.co.id',
		]);

	}
}
