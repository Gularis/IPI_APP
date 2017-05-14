<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->integer('est_duration')->nullable()->unsigned();
            $table->integer('act_duration')->nullable()->unsigned();
            $table->boolean('completed')->default(0);
            $table->text('feedback')->nullable();
            $table->integer('assignee_id')->nullable();
            $table->integer('owner_id');
            $table->timestamps();
        });
 

/*
       Schema::create('assignee_task', function (Blueprint $table) {
            $table->integer('task_id');
            $table->integer('assignee_id');  
            $table->primary(['task_id', 'assignee_id']);
        });

        Schema::create('owner_task', function (Blueprint $table) {
            $table->integer('task_id');
            $table->integer('owner_id');  
            $table->primary(['task_id', 'owner_id']);
        });
*/
   }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
