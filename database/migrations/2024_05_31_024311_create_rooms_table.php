<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Schema::create('rooms', function (Blueprint $table) {
        //     $table->id();
        //     $table->unsignedBigInteger('kost_id');
        //     $table->unsignedBigInteger('class_id');
        //     // $table->enum('status', ['available', 'rented'])->default('available');
        //     $table->string('rooms_name');

        //     $table->string('slug');
        //     $table->enum('status', ['available', 'rented'])->default('available');
        //     $table->text('description')->nullable();
        //     $table->text('facilities')->nullable();
        //     $table->integer('clicks')->default(0);
        //     $table->text('rooms_media')->nullable();
        //     $table->timestamps();

        //     $table->foreign('kost_id')->references('id')->on('kosts')->onDelete('cascade');
        //     $table->foreign('class_id')->references('id')->on('room_classes')->onDelete('cascade');
        // });

        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kost_id');
            $table->unsignedBigInteger('class_id');
            $table->string('rooms_name');
            $table->string('slug')->unique();
            $table->enum('status', ['available', 'rented'])->default('available');
            $table->text('description')->nullable();
            $table->text('facilities')->nullable();
            $table->integer('clicks')->default(0);
            $table->text('rooms_media')->nullable();
            $table->timestamps();

            $table->foreign('kost_id')->references('id')->on('kosts')->onDelete('cascade');
            $table->foreign('class_id')->references('id')->on('room_classes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
