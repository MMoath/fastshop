<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->require();
            $table->enum('gender', ['Null','Female', 'Male'])->nullable();
            $table->string('email')->unique()->require();
            $table->unsignedBigInteger('mobile')->unique()->require();
            $table->string('password')->require();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('picture')->nullable();
            $table->integer('role')->default(2);
            $table->boolean('account_status')->default(1); //1-Enabled 0-disabled 
            $table->integer('created_by')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
