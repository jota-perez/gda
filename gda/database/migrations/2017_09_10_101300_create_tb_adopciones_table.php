<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbAdopcionesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'tb_adopciones';

    /**
     * Run the migrations.
     * @table tb_adopciones
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('fl_id_adopciones');
            $table->unsignedinteger('fl_id_animal');
            $table->unsignedinteger('fl_id_persona');
            $table->unsignedinteger('fl_id_voluntario');
            $table->date('fl_fecha');
            $table->mediumText('fl_observaciones')->nullable()->default(null);
            $table->datetime('fl_created')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->datetime('fl_updated')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));

            $table->index(["fl_id_animal"], 'fk_tb_adopciones_tb_animales1_idx');
            $table->index(["fl_id_persona"], 'fk_tb_adopciones_tb_personas1_idx');
        });
        Schema::table($this->set_schema_table, function(Blueprint $table) {
            $table->foreign('fl_id_animal', 'fk_tb_adopciones_tb_animales1_idx')
                ->references('fl_id_animal')->on('tb_animales')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('fl_id_persona', 'fk_tb_adopciones_tb_personas1_idx')
                ->references('fl_id_persona')->on('tb_personas')
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
