<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('proposals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Untuk menyimpan ID mahasiswa
            $table->string('title'); // Judul proposal
            $table->text('description'); // Deskripsi proposal
            $table->enum('status', ['draft', 'submitted', 'accepted', 'rejected', 'revised'])->default('draft'); // Status proposal
            $table->timestamps();

            // Menambahkan foreign key
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

};
