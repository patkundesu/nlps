<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDismissDateToCrimecommittedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('crime_committed', function (Blueprint $table) {
            $table->datetime('dismiss_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('crime_committed', function (Blueprint $table) {
            $table->dropColumn('dismiss_date');
        });
    }
}