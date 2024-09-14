<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIterationToCentroidsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('centroids', function (Blueprint $table) {
            $table->integer('iteration')->default(1); // Menambahkan kolom iteration
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('centroids', function (Blueprint $table) {
            $table->dropColumn('iteration'); // Menghapus kolom iteration jika rollback
        });
    }
}