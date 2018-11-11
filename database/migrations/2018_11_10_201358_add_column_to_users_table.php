<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->string('education')->nullable();
            $table->string('location')->nullable();
            $table->string('skills')->nullable();
            $table->string('notes')->nullable();
            $table->string('profession')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->dropColumn('education');
            $table->dropColumn('location');
            $table->dropColumn('skills');
            $table->dropColumn('notes');
            $table->dropColumn('profession');
        });
    }
}
