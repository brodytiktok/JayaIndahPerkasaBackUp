<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pelanggan')->nullable();
            $table->string('no_order')->nullable();
            $table->date('tanggal_pemesanan')->nullable();
            $table->date('tanggal_terima')->nullable();
            $table->integer('items')->nullable();
            $table->string('metode')->nullable();
            
            $table->integer('biaya')->nullable();

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
        Schema::dropIfExists('orders');
    }
}
