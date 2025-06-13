<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('sub_categories', function (Illuminate\Database\Schema\Blueprint $table) {
            $table->string('name')->after('id');
            $table->string('slug')->unique()->after('name');
            $table->unsignedBigInteger('category_id')->after('slug');

            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('sub_categories', function (Illuminate\Database\Schema\Blueprint $table) {
            $table->dropForeign(['category_id']);
            $table->dropColumn(['name', 'slug', 'category_id']);
        });
    }
};
