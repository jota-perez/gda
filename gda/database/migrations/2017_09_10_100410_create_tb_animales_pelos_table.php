<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbAnimalesPelosTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'tb_animales_pelos';

    /**
     * Run the migrations.
     * @table tb_animales_pelos
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('fl_id_pelo');
            $table->unsignedinteger('fl_id_especie');
            $table->string('fl_pelo_es', 120);
            $table->string('fl_pelo_al', 120)->nullable()->default(null);
            $table->string('fl_pelo_in', 120)->nullable()->default(null);
            $table->index(["fl_id_especie"], 'idx_id_especie');
            $table->datetime('fl_created')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->datetime('fl_updated')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });
        Schema::table($this->set_schema_table, function(Blueprint $table) {
            $table->foreign('fl_id_especie')
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