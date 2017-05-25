<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreatePostPostCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_post_category', function (Blueprint $table) {
            $table->integer('post_category_id')->unsigned();
            $table->integer('post_id')->unsigned();

            $table->foreign('post_category_id')
                  ->references('id')->on('post_categories')
                  ->onDelete('cascade');

            $table->foreign('post_id')
                  ->references('id')->on('posts')
                  ->onDelete('cascade');
        });

        $data = DB::table('posts')->get()->map(function ($post) {
            return [
                'post_category_id' => $post->post_category_id,
                'post_id' => $post->id,
            ];
        });

        DB::table('post_post_category')->insert($data->toArray());

        Schema::table('posts', function (Blueprint $table) {
            $table->dropForeign('posts_post_category_id_foreign');
            $table->dropColumn('post_category_id');
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
            $table->integer('post_category_id')->unsigned()->nullable()->after('id');
            $table->foreign('post_category_id')->references('id')->on('post_categories')->onDelete('cascade');
        });

        DB::table('post_post_category')->get()->each(function ($post) {
            DB::table('posts')->where('id', $post->post_id)->update(['post_category_id' => $post->post_category_id]);
        });

        Schema::drop('post_post_category');
    }
}
