<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDefaultValueToImagesFieldsFromPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn(['thumb', 'image']);

            $table->string('thumb')->default('')->after('meta_title');
            $table->string('image')->default('')->after('meta_title');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn(['thumb', 'image']);

            $table->string('thumb')->after('meta_title');
            $table->string('image')->after('meta_title');
        });
    }
}
