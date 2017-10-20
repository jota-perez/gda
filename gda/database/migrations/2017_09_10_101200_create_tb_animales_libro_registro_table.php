<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbAnimalesLibroRegistroTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'tb_animales_libro_registro';

    /**
     * Run the migrations.
     * @table tb_animales_libro_registro
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('fl_id_libro_registro');
            $table->unsignedinteger('fl_id_animal');
            $table->date('fl_fecha');
            $table->string('fl_tipo', 45);
            $table->string('fl_ori_des', 45);
            $table->text('fl_observaciones')->nullable()->default(null);
            $table->datetime('fl_created')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->datetime('fl_updated')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));

            $table->index(["fl_fecha"], 'idx_fechas');
            $table->index(["fl_id_animal"], 'fk_tb_libro_registro_1_idx');
        });
        Schema::table($this->set_schema_table, function(Blueprint $table) {
            $table->foreign('fl_id_animal', 'fk_tb_libro_registro_1_idx')
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
