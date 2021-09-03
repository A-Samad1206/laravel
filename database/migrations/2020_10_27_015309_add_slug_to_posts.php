<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class AddSlugToPosts extends Migration
{
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->string('slug')->unique()->after("body");
            
        });
    }
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            Schema::table("posts",function($table){
                $table->dropColumn("slug");
            });
        });
    }
}