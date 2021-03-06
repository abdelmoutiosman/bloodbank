<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrdersTable extends Migration {

	public function up()
	{
		Schema::create('orders', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('blood_type_id')->unsigned();
			$table->integer('client_id')->unsigned();
			$table->integer('age');
			$table->integer('bags_number');
			$table->string('hospital_name');
			$table->string('hospital_address');
			$table->decimal('longitude', 10,8);
			$table->decimal('latitude', 10,8);
			$table->string('phone');
			$table->integer('city_id')->unsigned();
			$table->text('notice');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('orders');
	}
}