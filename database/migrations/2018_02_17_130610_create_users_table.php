<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id', 11);
            $table->string('email')->unique();
            $table->string('password');
            $table->string('first_name', 100);
            $table->string('last_name', 100);
            $table->enum('gender', [0, 1]);
            $table->date('dob');
            $table->string('phone', 45);
            $table->string('photo', 255)->nullable();
            // $table->unsignedInteger('country_id');
            // $table->unsignedInteger('province_id');
            // $table->unsignedInteger('city_id');
            // $table->string('address', 100);
            // $table->string('postal_code', 10);

            $table->rememberToken();

            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));

            $table->softDeletes();
            $table->collation = 'utf8_unicode_ci';

            // $table->foreign('country_id')->references('id')->on('countries');
            // $table->foreign('province_id')->references('id')->on('provinces');
            // $table->foreign('city_id')->references('id')->on('cities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
