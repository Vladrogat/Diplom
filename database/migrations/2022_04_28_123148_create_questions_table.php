<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->string("question");
            $table->foreignId('idTypeQuestion')->constrained('type_questions')
                ->cascadeOnUpdate()
                ->restrictOnDelete();
            $table->foreignId("idSection")->constrained("sections")
                ->cascadeOnUpdate()
                ->restrictOnDelete();
            $table->foreignId("idAnswer")->constrained("answers")
                ->cascadeOnUpdate()
                ->restrictOnDelete();
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
        Schema::dropIfExists('questions');
    }
};
