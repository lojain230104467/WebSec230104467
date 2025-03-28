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
    Schema::create('tasks', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->boolean('status')->default(0); // 0 for pending, 1 for completed
        $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Authenticated user
        $table->timestamps();
    });
}

};
