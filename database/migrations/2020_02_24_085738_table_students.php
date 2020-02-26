<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableStudents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students',function(Blueprint $table){
            $table->increments('id');
            $table->string('name');
            $table->string('jurusan');
            $table->string('kelas');
            $table->text("address");             
            $table->string("phone");  
            $table->enum("status", ["ACTIVE", "INACTIVE"]);
            $table->integer("updated_by")->nullable();         
            $table->integer("deleted_by")->nullable();
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
        Schema::dropIfExists('students');
    }
}
