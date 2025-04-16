<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user')->nullable();
            $table->integer('id_layanan')->nullable();
            $table->float('total_bayar', 20);
            $table->enum('metode_pembayaran', ['BCA', 'MANDIRI', 'GOPAY']);
            $table->enum('status', ['pending', 'completed', 'failed', 'expired'])->default('pending');
            $table->date('tanggal_transaksi');
            $table->date('expired_date');
            $table->timestamps();

            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            // $table->foreign('id_layanan')->references('id')->on('layanans')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
