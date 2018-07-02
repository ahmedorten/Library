<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReturnStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('return_statuses', function (Blueprint $table) {
            $table->increments('return_id');
            $table->unsignedInteger('customer_id')->unsigned();
            $table->string('book_name');
            $table->integer('book_id');
            $table->date('return_date');
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
        Schema::dropIfExists('return_statuses');
    }
}
