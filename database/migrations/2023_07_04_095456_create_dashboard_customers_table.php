<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDashboardCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dashboard_customers', function (Blueprint $table) {
            $table->id();
            $table->string('dashboard_type')->nullable(); //Ex: web control
            $table->string('dashboard_name')->nullable(); //Ex: Little me, Skyla dashboard
            $table->string('host_name')->nullable(); //Ex: shoplittle.me, lyskyla.com
            $table->unsignedBigInteger('user_id');

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('dashboard_customers');
    }
}
