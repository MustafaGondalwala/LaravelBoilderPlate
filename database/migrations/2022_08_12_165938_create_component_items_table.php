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
        Schema::create('component_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('component_id')->nullable()->constrained('components');
            $table->string('name');
            $table->integer('sr_no');
            $table->enum('type', ['link', 'image', 'text', 'video']);
            $table->string('value');
            $table->string('value1')->nullable();
            $table->string('value2')->nullable();
            $table->string('status')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('component_items');
    }
};
