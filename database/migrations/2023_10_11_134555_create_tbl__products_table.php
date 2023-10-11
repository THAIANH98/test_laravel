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
        Schema::create('tbl__products', function (Blueprint $table) {
            $table->id();
            $table->string('ma_sp');
            $table->string('ten_sp');
            $table->string('donvi_sp');
            $table->string('gia_sp');
            $table->unsignedBigInteger('id_nhom');
            $table->foreign('id_nhom')
            ->references('id')
            ->on('tbl__categories')
            ->onDelete('cascade');
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
        Schema::dropIfExists('tbl__products');
    }
};
