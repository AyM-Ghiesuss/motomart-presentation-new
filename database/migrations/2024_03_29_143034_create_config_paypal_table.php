<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('config_paypal', function (Blueprint $table) {
            $table->id();


            $table->unsignedBigInteger('user_id')->index();
            $table->text('account')->nullable();
            $table->text('client_id')->nullable();
            $table->text('secret')->nullable();
            $table->boolean('sandbox')->nullable()->default(true)->comment('1=TEST,0=LIVE');

            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('config_paypal');
    }
};
