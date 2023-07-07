<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            //$table->unsignedBigInteger('role_id');
            //$table->unsignedBigInteger('user_id');
            $table->string('permission_name');
            $table->integer('permission_code');
            $table->boolean('is_delete')->nullable();
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
        Schema::dropIfExists('permission');
    }
}
