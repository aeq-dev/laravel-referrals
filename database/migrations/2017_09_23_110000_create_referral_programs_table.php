<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReferralProgramsTable extends Migration
{
    const DEFAULT_LIFETIME = 7 * 24 * 60;

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('referral_programs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('uri');
            $table->text('title')->nullable();
            $table->text('description')->nullable();
            $table->integer('lifetime_minutes')->default(self::DEFAULT_LIFETIME);
            $table->foreignId('store_id')->on('stores')->nullable()->index();
            $table->boolean('default')->default(false);
            $table->boolean('active')->default(true);
            $table->timestamp('starts_at')->nullable();
            $table->timestamp('expires_at')->nullable();

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
        Schema::drop('referral_programs');
    }
}
