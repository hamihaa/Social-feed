<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feed', function (Blueprint $table) {
            $table->increments('id');
            $table->string('uid'); // id from twitter / ig, used for verification
            $table->text('description')->nullable(); // IG post can have no description
            $table->text('image')->nullable(); //for Twitter is null
            $table->boolean('post_type'); // 0 - Instagram, 1 - Twitter
            $table->string('username'); //could be hardcoded
            $table->timestamp('added_at'); //when displaying, sort by this
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('feed');
    }
}
