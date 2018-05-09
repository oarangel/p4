<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectTagTable extends Migration
{
    public function up()
    {
        Schema::create('project_tag', function (Blueprint $table) {

            $table->increments('id');
            $table->timestamps();

            # `project_id` and `tag_id` will be foreign keys, so they have to be unsigned
            # `project_id` will reference the `projects table` and `tag_id` will reference the `tags` table.
            $table->integer('project_id')->unsigned();
            $table->integer('tag_id')->unsigned();

            # Make foreign keys
            $table->foreign('project_id')->references('id')->on('projects');
            $table->foreign('tag_id')->references('id')->on('tags');
        });
    }

    public function down()
    {
        Schema::dropIfExists('project_tag');
    }
}
