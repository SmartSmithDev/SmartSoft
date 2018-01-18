<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
          Schema::table('users', function(Blueprint $table)
          {
               $table->foreign('company_selected', 'fk_users_company_selected')->references('id')->on('companies')->onUpdate('CASCADE')->onDelete('CASCADE');
          });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
         Schema::table('users', function(Blueprint $table)
        {
             $table->dropForeign('fk_users_company_selected');
        });
    }
}
