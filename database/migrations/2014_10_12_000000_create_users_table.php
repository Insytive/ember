<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\User;

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
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->rememberToken();
            $table->string('verified')->default(User::UNVERIFIED_USER);
            $table->string('verification_token')->nullable();
            $table->string('admin')->default(User::REGULAR_USER);
            $table->string('id_number');
            $table->date('birth_date')->nullable();
            $table->tinyInteger('gender_id')->nullable();
            $table->string('phone');
            $table->string('address');
            $table->string('town')->nullable();
            $table->string('city')->nullable();
            $table->string('post_code')->nullable();
            $table->integer('province_id')->nullable();
            $table->integer('station_id');
            $table->string('reported_station')->nullable();
            $table->string('terms_conditions')->default(User::DECLINE_TERMS);
            $table->string('parent_id')->nullable();
            $table->string('first_time_voter')->default(User::ROOKIE_VOTER);
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
