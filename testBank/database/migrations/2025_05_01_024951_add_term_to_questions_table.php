<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('questions', function (Blueprint $table) {
            $table->string('term')->nullable(); // Adding the term column
        });
    }
    
    public function down()
    {
        Schema::table('questions', function (Blueprint $table) {
            $table->dropColumn('term'); // Dropping the term column if rolled back
        });
    }
    
    

};
