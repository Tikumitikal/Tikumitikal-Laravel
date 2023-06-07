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
         Schema::create('reservasi', function (Blueprint $table) {
             $table->id_meja();
             $table->string("nama");
             $table->string("email");
             $table->string("phone");
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
         Schema::dropIfExists('reservasi');
     }
 };
