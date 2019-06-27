<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkersProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workers_projects', function (Blueprint $table) {
            $table->bigIncrements('id',true);
            $table->integer('worker_id')->unsigned();
            $table->integer('project_id')->unsigned();
            $table->timestamps();
        });
        Schema::table('workers_projects', function (Blueprint $table) {
            $table->foreign('worker_id')->references('id')->on('workers');
            $table->foreign('project_id')->references('id')->on('projects');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('workers_projects');
    }
}
