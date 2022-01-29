<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->text('name')->nullable();
            $table->text('owner')->nullable();
            $table->boolean('active')->default(1);
            $table->text('preview_text')->nullable();
            $table->text('detail_text')->nullable();
            $table->string('photo')->nullable();
            $table->string('lat')->nullable();
            $table->string('lon')->nullable();
            $table->foreignId('region_id')->constrained()->onDelete('restrict');
            $table->foreignId('project_type_id')->constrained()->onDelete('restrict');
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
        Schema::dropIfExists('projects');
    }
}
