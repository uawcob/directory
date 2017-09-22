<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // this recreates the table pulled from BASIS data warehouse
        // for testing purposes only
        Schema::create('employees', function (Blueprint $table) {
            $table->string('emp_id', 6)->nullable();
            $table->string('isisid', 9)->nullable();
            $table->string('w4_name', 35)->nullable();
            $table->string('prefname', 35)->nullable();
            $table->string('firstname', 25)->nullable();
            $table->string('middlename', 15)->nullable();
            $table->string('lastname', 30)->nullable();
            $table->string('BU_Code', 4)->nullable();
            $table->string('BU_Short_Name', 24)->nullable();
            $table->string('dir_addr', 40)->nullable();
            $table->string('dir_city', 25)->nullable();
            $table->string('dirstate', 8)->nullable();
            $table->string('dir_post', 10)->nullable();
            $table->string('dirphone', 12)->nullable();
            $table->string('camabldg', 4)->nullable();
            $table->string('camaroom', 5)->nullable();
            $table->string('camphone', 12)->nullable();
            $table->string('email', 40)->nullable();
            $table->string('empltype', 1)->nullable();
            $table->string('dptchair', 1)->nullable();
            $table->string('degreecd', 5)->nullable();
            $table->string('emp_priv', 1)->nullable();
            $table->date('lasthire')->nullable();
            $table->date('dbuasrvc')->nullable();
            $table->string('preftitl', 30)->nullable();
            $table->string('username', 8)->nullable();
            $table->string('studtitl', 1)->nullable();
            $table->string('emp_pos', 3)->nullable();
            $table->string('occtitle', 30)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
