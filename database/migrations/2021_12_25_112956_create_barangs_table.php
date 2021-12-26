<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barangs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_barang');
            $table->text('deskripsi_barang');
            $table->string('foto_barang')->nullable();
            $table->unsignedBigInteger('stok_barang')->default(0);
            $table->unsignedBigInteger('harga_barang');
            $table->foreignId('kategori_id')->nullable();
            $table->foreign('kategori_id')->references('id')->on('categories')->onDelete('set null')->onUpdate('cascade');
            $table->foreignId('pembuat_id')->constrained('users');
            $table->foreignId('perubah_id')->constrained('users');
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
        Schema::dropIfExists('barangs');
    }
}
