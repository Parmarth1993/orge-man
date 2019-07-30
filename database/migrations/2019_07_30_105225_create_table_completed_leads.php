<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCompletedLeads extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('completed_leads', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('lead_id')->unsigned();
            $table->integer('franchises')->unsigned();
            $table->foreign('lead_id')->references('id')->on('quotes');
            $table->foreign('franchises')->references('id')->on('users');
            $table->string('employees_name');
            $table->string('hours_worked');
            $table->string('hourly_wage');
            $table->string('paid_amount');
            $table->string('invoice_image');
            $table->longText('job_images');
            $table->longText('supplies');
            $table->string('job_notes')->nullable();
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
        Schema::dropIfExists('completed_leads');
    }
}
