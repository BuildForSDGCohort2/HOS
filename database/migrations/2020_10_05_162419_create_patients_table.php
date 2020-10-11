<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nursename')->nullable();
            $table->string('nurse_id')->nullable();
            $table->string('Ref')->nullable();
            $table->string('cardid')->nullable();
            $table->string('fullname')->nullable();
            $table->string('contact')->nullable();
            $table->string('gender')->nullable();
            $table->string('temperature')->nullable();
            $table->string('height')->nullable();
            $table->string('PWeight')->nullable();
            $table->string('Bp')->nullable();
            $table->string('Age')->nullable();
            $table->string('room')->nullable();
            $table->string('Reason')->nullable();
            $table->string('Prescibe')->nullable();
            $table->string('DoctorsName')->nullable();
            $table->string('doc_id')->nullable();
            $table->string('bloodgrp')->nullable();
            $table->string('sicking')->nullable();
            $table->string('hbgenotype')->nullable();
            $table->string('Hivst')->nullable();
            $table->string('hypertS')->nullable();
            $table->string('Ucolor')->nullable();
            $table->string('Uappera')->nullable();
            $table->string('Ph')->nullable();
            $table->string('Uprote')->nullable();
            $table->string('Ugluc')->nullable();
            $table->string('UcliniT')->nullable();
            $table->string('UKet')->nullable();
            $table->string('Ubili')->nullable();
            $table->string('Ublod')->nullable();
            $table->string('Unitri')->nullable();
            $table->string('Urbc')->nullable();
            $table->string('Uwbc')->nullable();
            $table->string('Pharmacist')->nullable();
            $table->string('phar_id')->nullable();
            $table->string('Btc')->nullable();
            $table->string('Utc')->nullable();
            $table->string('Dc')->nullable();
            $table->string('Grndtotal')->nullable();
            $table->string('Cashier')->nullable();
            $table->string('cash_id')->nullable();
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
        Schema::dropIfExists('patients');
    }
}
