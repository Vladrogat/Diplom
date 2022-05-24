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
        Schema::create('results', function (Blueprint $table) {
            $table->foreignId("user_id")->constrained("users")
                ->cascadeOnUpdate()
                ->restrictOnDelete();
            $table->foreignId("section_id")->constrained("sections")
                ->cascadeOnUpdate()
                ->restrictOnDelete();
            $table->integer("time");
            $table->integer("grade");
            $table->string("points");
            $table->json("result");
            $table->timestamps();
            $table->primary(["user_id", "section_id"]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('results');
    }
};
