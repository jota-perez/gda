<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbAnimalesFichaSanitariaTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'tb_animales_ficha_sanitaria';

    /**
     * Run the migrations.
     * @table tb_animales_ficha sanitaria
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('fl_id_veterinaria');
            $table->unsignedinteger('fl_id_animal');
            $table->unsignedinteger('fl_id_persona');
            $table->date('fl_fecha');
            $table->string('fl_tratamiento', 250);
            $table->datetime('fl_created')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->datetime('fl_updated')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));

            $table->index(["fl_id_persona"], 'fk_tb_animales_ficha sanitaria_tb_personas1_idx');
            $table->index(["fl_id_animal"], 'fk_tb_veterinaria_1_idx');
        });
        Schema::table($this->set_schema_table, function(Blueprint $table) {
            $table->foreign('fl_id_persona', 'fk_tb_animales_ficha sanitaria_tb_personas1_idx')
                ->references('fl_id_persona')->on('tb_personas')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('fl_id_animal', 'fk_tb_veterinaria_1_idx')
                ->references('fl_id_animal')->on('tb_animales')
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
