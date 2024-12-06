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
        Schema::create('school_details', function (Blueprint $table) {
            $table->id();
            $table->string('name'); 
            $table->string('logo')->nullable(); 
            $table->string('email')->nullable(); 
            $table->string('contact_numbers')->nullable(); 
            $table->string('address')->nullable();  
            $table->year('establishment_year')->nullable(); 
            $table->text('description')->nullable();  
            $table->string('phone_numbers')->nullable();  
            $table->string('website_url')->nullable();  
            $table->integer('number_of_students')->nullable(); 
            $table->integer('number_of_staffs')->nullable(); 
            $table->text('programs_offered')->nullable(); 
            $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('school_details');
    }
};
