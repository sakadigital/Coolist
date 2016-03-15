<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyDomainsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('company_domains', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('companies_id')->unsigned();
			$table->string('domain', 225)->unique();
			$table->softDeletes();
			$table->timestamps();
		});

		Schema::table('company_domains', function (Blueprint $table) {
			$table->foreign('companies_id')->references('id')->on('companies');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('company_domains');
	}
}
