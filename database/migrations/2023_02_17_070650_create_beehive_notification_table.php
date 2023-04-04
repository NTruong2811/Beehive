<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beehive_notification', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ByUser');
            $table->foreign('ByUser')->references('id')->on('users');
            $table->unsignedBigInteger('ToUser');
            $table->foreign('ToUser')->references('id')->on('users');
            $table->unsignedBigInteger('TypeNotifi');
            $table->foreign('TypeNotifi')->references('id')->on('type_notification');
            $table->integer('status')->default(0);
            $table->string('url')->default('null');
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
        //
    }
};
