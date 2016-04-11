<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Model::unguard();

        $this->call('CompaniesTableSeeder');
        $this->call('CompanyDomainsTableSeeder');
        $this->call('RolesTableSeeder');
        $this->call('StatusTypesTableSeeder');
        $this->call('UsersTableSeeder');

        Model::reguard();
    }
}
