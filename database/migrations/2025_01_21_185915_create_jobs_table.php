<?php

use App\Models\Job;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->text("description");
            $table->unsignedInteger("salary"); // Just positive number
            $table->string("location");
            $table->string("category");
            $table->enum("experience",Job::$experience);

            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
