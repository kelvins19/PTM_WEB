<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUpdatedAtAllTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('produk', function (Blueprint $table) {
            $table->timestamp('updated_at')->nullable();
        });

        Schema::table('pelanggan', function (Blueprint $table) {
            $table->timestamp('updated_at')->nullable();
        });

        Schema::table('rak', function (Blueprint $table) {
            $table->timestamp('updated_at')->nullable();
        });

        Schema::table('merk', function (Blueprint $table) {
            $table->timestamp('updated_at')->nullable();
        });

        Schema::table('merk_kategori', function (Blueprint $table) {
            $table->timestamp('updated_at')->nullable();
        });
        
        Schema::table('merk_subkategori', function (Blueprint $table) {
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
