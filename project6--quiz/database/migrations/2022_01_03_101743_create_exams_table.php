<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exams', function (Blueprint $table) {

                $table->bigIncrements('exam_id');
                $table->string('exam_name');
                $table->string('exam_description');
                $table->unsignedBigInteger('category_id');
                $table->timestamps();

        });
        Schema::table('exams', function (Blueprint $table) {
            $table->foreign('category_id')
            ->references('category_id')
            ->on('categories')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exams');
    }
}
