<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbAnimalesLocalizacionTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'tb_animales_localizacion';

    /**
     * Run the migrations.
     * @table tb_animales_localizacion
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('fl_id_localizaciones');
            $table->unsignedinteger('fl_id_localizacion');
            $table->unsignedinteger('fl_id_animal')->nullable()->default(null);

            $table->index(["fl_id_localizacion"], 'localidad');
            $table->index(["fl_id_animal"], 'animal');
            $table->datetime('fl_created')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->datetime('fl_updated')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });

        Schema::table($this->set_schema_table, function(Blueprint $table) {
            $table->foreign('fl_id_localizacion')
                ->references('fl_id_localizacion')->on('tb_albergue_localizaciones')
                ->onDelete('no action')
                ->onUpdate('no action');
            $table->foreign('fl_id_animal')
                ->references('fl_id_animal')->on('tb_animales')
                ->onDelete('no action')
                ->onUpdate('no action');
        });
    }

//    ALTER TABLE `albergue`.`tb_animales_localizacion` 
//    ADD CONSTRAINT `fk_tb_animales_localizacion_1`
//      FOREIGN KEY (`fl_id_localizacion`)
//      REFERENCES `albergue`.`tb_albergue_localizaciones` (`fl_id_localizacion`)
//      ON DELETE NO ACTION
//      ON UPDATE NO ACTION;

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
