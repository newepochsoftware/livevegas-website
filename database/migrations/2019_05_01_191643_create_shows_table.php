<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shows', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('name')
            $table->text('performer')
            $table->text('hero')
            $table->longtext('featured_image')
            $table->longtext('video')
            $table->text('eventStatus')
            $table->text('price')
            $table->text('bio')
            $table->text('description')
            $table->text('venue')
            $table->text('type')
            $table->date('startDate')
            $table->date('availabilityStarts')
            $table->text('streetAddress')
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
        Schema::dropIfExists('shows');
    }
}
