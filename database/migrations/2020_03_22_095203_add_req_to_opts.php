<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddReqToOpts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('options', function (Blueprint $table) {
            $table->string('requirements')->nullable();
            $table->decimal('amount')->nullable();
        });
        
        Schema::table('complains', function (Blueprint $table) {
            $table->string('plot_no')->nullable();
            $table->string('requirements')->nullable();
            $table->decimal('amount')->nullable();
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('options', function (Blueprint $table) {
            //
        });
    }
}
