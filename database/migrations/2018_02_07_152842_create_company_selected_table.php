<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanySelectedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_selected', function (Blueprint $table) {
            $table->integer('user_id');
            $table->integer('company_id');
            $table->string('user_type');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->timestamps();
            $table->primary(['user_id', 'company_id', 'user_type']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company_selected');
    }
}
