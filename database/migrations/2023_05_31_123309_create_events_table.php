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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('event_name');
            $table->longText('event_description');
            $table->string('category_name');
            $table->string('event_date');
            $table->string('start_time');
            $table->string('end_time');
            $table->integer('total_ticket');
            $table->integer('available_ticket');
            $table->integer('event_price');
            $table->string('event_image');
            $table->string('event_address');
            $table->string('event_city');
            $table->string('event_state');
            $table->bigInteger('pincode');
            $table->tinyInteger('status')->default(1);
            $table->morphs('creatable');
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
        Schema::dropIfExists('events');
    }
};
