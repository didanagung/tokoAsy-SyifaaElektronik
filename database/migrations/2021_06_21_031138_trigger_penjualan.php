<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class TriggerPenjualan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
        CREATE TRIGGER penjualan_barang
        AFTER INSERT
            ON penjualan FOR EACH ROW
        BEGIN
            UPDATE barang SET jumlah = jumlah - NEW.terjual
            WHERE id = NEW.barang_id;
        END
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER penjualan_barang');
    }
}
