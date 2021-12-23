<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableProduk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produk', function (Blueprint $table) {
            $table->id();
            $table->string('no_part');
            $table->string('nama_barang');
            $table->integer('harga_modal');
            $table->integer('harga_modal_1');
            $table->integer('harga_jual');
            $table->integer('harga_jual_1');
            $table->integer('harga_jual_2');
            $table->integer('diskon_1');
            $table->integer('diskon_2');
            $table->integer('diskon_3');
            $table->integer('bonus');
            $table->integer('stok');
            $table->string('satuan');
            $table->string('keterangan');
            $table->integer('minimum');
            $table->integer('maximum');
            $table->integer('supplier_id');
            $table->integer('merk_id');
            $table->integer('merk_kategori_id');
            $table->integer('merk_subkategori_id');
            $table->integer('rak_id');
            $table->timestamp('created_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produk');
    }
}
