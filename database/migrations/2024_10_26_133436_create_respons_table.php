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
        Schema::create('respons', function (Blueprint $table) {
            $table->id();
            $table->string('responden');
            $table->string('usia');
            $table->string('jenkel');
            $table->integer('p1');
            $table->integer('p2');
            $table->integer('p3');
            $table->integer('p4');
            $table->integer('p5');
            $table->integer('p6');
            $table->integer('p7');
            $table->integer('p8');
            $table->integer('p9');
            $table->integer('p10');
            $table->integer('p11');
            $table->integer('p12');
            $table->integer('p13');
            $table->integer('p14');
            $table->integer('p15');
            $table->integer('p16');
            $table->integer('p17');
            $table->integer('p18');
            $table->integer('p19');
            $table->integer('p20');
            $table->integer('p21');
            $table->integer('p22');
            $table->integer('p23');
            $table->integer('p24');
            $table->integer('p25');
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
        Schema::dropIfExists('respons');
    }
};