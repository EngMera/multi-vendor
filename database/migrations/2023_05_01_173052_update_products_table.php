<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function($table){
            $table->enum('is_bestseller',['نعم','لا'])->after('is_featured');
            $table->float('product_old_price')->after('product_price');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function($table){
            $table->dropColumn('is_bestseller');
            $table->dropColumn('product_old_price');

        });
    }
};
