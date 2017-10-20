<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbAnimalesEspeciesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'tb_animales_especies';

    /**
     * Run the migrations.
     * @table tb_animales_especies
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('fl_id_especie');
            $table->string('fl_especie_es', 45)->nullable()->default(null);
            $table->string('fl_especie_al', 45)->nullable()->default(null);
            $table->string('fl_especie_in', 45)->nullable()->default(null);
            $table->datetime('fl_created')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
			
            $table->datetime('fl_update')->nullable()->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
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
