<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateProfilePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile_posts', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('profile_id');

            $table->string('photo', 255)->nullable();
            $table->string('post_url', 255);
            $table->string('caption', 255)->nullable();
            $table->integer('likes')->default(0)->comment('number of likes');
            $table->integer('comments')->default(0)->comment('number of comments/reply');
            $table->integer('shares')->default(0)->comment('number of shares');

            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->softDeletes();
            $table->collation = 'utf8_unicode_ci';

            $table->foreign('profile_id')->references('id')->on('profiles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profile_posts');
    }
}
