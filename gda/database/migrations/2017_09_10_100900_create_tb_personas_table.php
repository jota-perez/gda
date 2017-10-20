<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbPersonasTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'tb_personas';

    /**
     * Run the migrations.
     * @table tb_personas
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('fl_id_persona');
            $table->string('fl_id', 45)->nullable()->default(null);
            $table->string('fl_nombre', 255)->nullable()->default(null);
            $table->string('fl_apellidos', 255)->nullable()->default(null);
            $table->string('fl_direccion', 255)->nullable()->default(null);
            $table->string('fl_cp', 5)->nullable()->default(null);
            $table->string('fl_provincia', 255)->nullable()->default(null);
            $table->string('fl_localidad', 255)->nullable()->default(null);
            $table->string('fl_pais', 45)->nullable()->default("España");
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
