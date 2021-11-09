<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAboutmeToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('gender')->after('email');
            $table->string('address')->nullable()->after('email');
            $table->string('ttl')->nullable()->after('email');
            $table->string('phone')->nullable()->after('email');
            $table->longText('note')->nullable()->after('last_login_at');
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
            $table->dropColumn('gender');
            $table->dropColumn('address');
            $table->dropColumn('ttl');
            $table->dropColumn('phone');
            $table->dropColumn('note');
        });
    }
}
