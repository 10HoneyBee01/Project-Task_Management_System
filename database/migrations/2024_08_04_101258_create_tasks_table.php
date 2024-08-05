<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->text('description');
            $table->enum('status', ['Pending', 'In Progress', 'Completed'])->default('Pending');
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null'); // Added user_id for assignment
            $table->date('assigned_date')->nullable(); // Added assigned_date
            $table->date('due_date')->nullable(); // Added due_date
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}