<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbTratamientosTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'tb_tratamientos';

    /**
     * Run the migrations.
     * @table tb_tratamientos
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('fl_id_tratamientos');
            $table->string('fl_id_especie', 45)->nullable()->default(null);
            $table->string('fl_tratamiento_es', 45)->nullable()->default(null);
            $table->string('fl_recurente_veces', 45)->nullable()->default(null);
            $table->string('fl_recurrente_plazo_numero', 45)->nullable()->default(null);
            $table->string('fl_recurente_tipo', 45)->nullable()->default(null);
            $table->datetime('fl_created')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->datetime('fl_updated')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       Schema::dropIfExists($this->set_schema_table);
     }
}
