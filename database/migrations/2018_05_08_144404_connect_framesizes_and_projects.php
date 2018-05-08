<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConnectFramesizesAndProjects extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {

            # Add a new INT field called `framesize_id` that has to be unsigned (i.e. positive)
            $table->integer('framesize_id')->unsigned();

            # This field `framesize_id` is a foreign key that connects to the `id` field in the `projects` table
            $table->foreign('framesize_id')->references('id')->on('projects');

        });
    }

    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {

            # ref: http://laravel.com/docs/migrations#dropping-indexes
            # combine tablename + fk field name + the word "foreign"
            $table->dropForeign('projects_framesize_id_foreign');

            $table->dropColumn('framesize_id');
        });
    }
}
