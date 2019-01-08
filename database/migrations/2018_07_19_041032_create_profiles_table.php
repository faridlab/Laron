<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('kol_id');
            $table->string('username', 100);
            $table->string('fullname', 255);
            $table->string('website', 255)->nullable();

            $table->string('bio', 255)->nullable();
            $table->integer('posts')->comment('number of posts/tweets/vlog/othe according to social media platform');
            $table->integer('followers')->comment('number of followers or friends');
            $table->integer('following')->comment('number of following or friends');

            $table->enum('channel', ['instagram', 'facebook', 'twitter', 'youtube', 'other']);
            $table->string('photo', 255)->nullable();

            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->softDeletes();
            $table->collation = 'utf8_unicode_ci';

            $table->foreign('kol_id')->references('id')->on('kols');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}
