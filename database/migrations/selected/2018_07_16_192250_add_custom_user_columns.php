<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCustomUserColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('second_name')->nullable();
            $table->string('nickname')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('avatar')->default('def_user_av.png');
            $table->enum('gender', ['male', 'female'])->nullable();
            $table->boolean('email_subscriber')->default(0);
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
            $table->dropColumn('second_name');
            $table->dropColumn('nickname');
            $table->dropColumn('phone_number');
            $table->dropColumn('avatar');
            $table->dropColumn('gender');
            $table->dropColumn('email_subscriber');
        });
    }
}
