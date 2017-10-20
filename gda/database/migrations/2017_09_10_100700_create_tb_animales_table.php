<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbAnimalesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'tb_animales';

    /**
     * Run the migrations.
     * @table tb_animales
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('fl_id_animal');
            $table->string('fl_nombre', 100);
            $table->unsignedinteger('fl_id_especie');
            $table->unsignedinteger('fl_id_raza');
            $table->unsignedinteger('fl_id_tamano');
            $table->unsignedinteger('fl_id_color');
            $table->unsignedinteger('fl_id_pelo');
            $table->string('fl_chip', 250)->nullable()->default(null);
            $table->string('fl_registro', 45);

            $table->index(["fl_id_tamano"], 'fk_tb_animales_4_idx');
            $table->index(["fl_id_especie"], 'fk_tb_animales_2_idx');
            $table->index(["fl_id_raza"], 'fk_tb_animales_3_idx');
            $table->index(["fl_id_color"], 'fk_tb_animales_1_idx');
            $table->datetime('fl_created')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->datetime('fl_updated')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });
        Schema::table($this->set_schema_table, function(Blueprint $table) {
            $table->foreign('fl_id_color', 'fk_tb_animales_1_idx')
                ->references('fl_id_color')->on('tb_animales_colores')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('fl_id_especie', 'fk_tb_animales_2_idx')
                ->references('fl_id_especie')->on('tb_animales_especies')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('fl_id_raza', 'fk_tb_animales_3_idx')
                ->references('fl_id_raza')->on('tb_animales_razas')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('fl_id_tamano', 'fk_tb_animales_4_idx')
                ->references('fl_id_tamano')->on('tb_animales_tamanos')
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
