<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actions', function (Blueprint $table) {
            $table->id();
            $table->string('action_name');
            $table->string('action_description')->nullable();
            $table->string('controller_name');
            $table->boolean('is_delete')->nullable();
            $table->boolean('is_active')->nullable();
            $table->string('parent');
            $table->string('level');
            $table->string('menu');
            $table->string('order_by');
            $table->string('icon_name');
            $table->string('url');
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
        Schema::dropIfExists('action');
    }
}
