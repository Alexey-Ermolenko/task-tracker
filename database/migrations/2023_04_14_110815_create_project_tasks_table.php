<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_tasks', function (Blueprint $table) {
            $table->id();
            $table->integer('project_id')->default(0);
            $table->integer('company_id')->default(0);
            $table->string('name');
            $table->string('code', 255)->unique();
            $table->text('description')->nullable();
            $table->integer('stage_id')->default(0);
            $table->string('priority_color')->nullable();
            $table->integer('priority')->default(1);
            $table->jsonb('likes')->nullable();                     //Лайки от пользователей (может быть несколько лайков в задаче, один пользователь может проставить один лайк)
            $table->jsonb('followers')->nullable();                 //Наблюдатель может быть несколько
            $table->integer('assign_to')->nullable();               //Исполнитель только один
            $table->integer('created_by');                          //Автор задачи только один
            $table->integer('is_complete')->default(0);       //Завершена ли задача 0 - Нет, 1 - Да
            $table->string('progress', 5)->default(0);
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
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
        Schema::dropIfExists('project_tasks');
    }
}
