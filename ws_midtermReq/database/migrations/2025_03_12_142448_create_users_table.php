<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // Auto-incrementing ID
            $table->string('fname'); // First name
            $table->string('lname'); // Last name
            $table->string('email')->unique(); // Email (must be unique)
            $table->string('password'); // Password
            $table->unsignedBigInteger('roleId'); // Role ID (foreign key)
           
        });
    }

    public function down() {
        Schema::dropIfExists('users');
    }

};
