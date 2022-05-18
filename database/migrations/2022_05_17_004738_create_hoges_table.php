<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHogesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hoges', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name', 64);
            $table->date('date');
                $table->text('content');
                $table->timestamp('created_at')->useCurrent()->nullable();
                $table->timestamp('updated_at')->useCurrent()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hoges');
    }
}
