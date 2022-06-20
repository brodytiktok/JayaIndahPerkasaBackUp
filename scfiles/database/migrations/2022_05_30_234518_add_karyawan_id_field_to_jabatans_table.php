<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddKaryawanIdFieldToJabatansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('jabatans', function (Blueprint $table) {
            //
            /* $table->foreignId('karyawan_id')->after('jabatan')->constrained()
            ->onDelete('cascade')->onUpdate('cascade'); */

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jabatans', function (Blueprint $table) {
            //
            /* $table->dropForeign('jabatans_karyawan_id_foreign');
            $table->dropColumn('karyawan_id'); */

        });
    }
}
