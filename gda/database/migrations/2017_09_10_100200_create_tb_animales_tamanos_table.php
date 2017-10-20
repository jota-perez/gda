<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbAnimalesTamanosTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'tb_animales_tamanos';

    /**
     * Run the migrations.
     * @table tb_animales_tamanos
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('fl_id_tamano');
            $table->unsignedinteger('fl_id_especie');
            $table->string('fl_tamano_es', 45);
            $table->string('fl_tamano_al', 45)->nullable()->default(null);
            $table->string('fl_tamano_in', 45)->nullable()->default(null);
            $table->index(["fl_id_especie"], 'idx_id_especie');
            $table->datetime('fl_created')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->datetime('fl_updated')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });
        Schema::table($this->set_schema_table, function(Blueprint $table) {
            $table->foreign('fl_id_especie', 'fk_tb_animales_tamanos_1_idx')
                ->references('fl_id_especie')->on('tb_animales_especies')
                ->onDelete('no action')
                ->onUpdate('no action');
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
