<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbAlbergueLocalizacionesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'tb_albergue_localizaciones';

    /**
     * Run the migrations.
     * @table tb_albergue_localizaciones
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('fl_id_localizacion');
            $table->string('fl_localizacion_es', 45)->nullable()->default(null);
            $table->integer('fl_aforo')->nullable()->default(null);
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
