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
        Schema::create('parameter_master', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('parameter_name');
            $table->text('help_text');
            $table->string('slug');
            $table->enum('type',['0','1'])->default('0');
            $table->string('value');
            $table->string('created_by');
            $table->string('updated_by')->nullable();
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
        Schema::dropIfExists('parameter_master');
    }
};
