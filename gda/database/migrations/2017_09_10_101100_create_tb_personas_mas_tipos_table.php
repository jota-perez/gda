<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbPersonasMasTiposTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'tb_personas_mas_tipos';

    /**
     * Run the migrations.
     * @table tb_personas_mas_tipos
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('fl_id');
            $table->unsignedinteger('fl_id_persona');
            $table->unsignedinteger('fl_id_tipo_persona');
            $table->datetime('fl_created')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->datetime('fl_updated')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));

            $table->index(["fl_id_persona"], 'fk_tb_personas_mas_tipos_tb_personas2_idx');
            $table->index(["fl_id_tipo_persona"], 'fk_tb_personas_mas_tipos_tb_personas_tipos2_idx');
        });
        
        Schema::table($this->set_schema_table, function(Blueprint $table) {
            $table->foreign('fl_id_persona', 'fk_tb_personas_mas_tipos_tb_personas2_idx')
                ->references('fl_id_persona')->on('tb_personas')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('fl_id_tipo_persona', 'fk_tb_personas_mas_tipos_tb_personas_tipos2_idx')
                ->references('fl_id_tipo_persona')->on('tb_personas_tipos')
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
