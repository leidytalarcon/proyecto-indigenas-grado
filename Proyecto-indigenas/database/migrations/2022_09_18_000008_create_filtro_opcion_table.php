<?php

namespace Database\Migrations;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFiltroOpcionTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'filtro_opcion';

    /**
     * Run the migrations.
     * @table filtro_opcion
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id_filtro_opcion');
            $table->integer('fk_id_filtro')->nullable();
            $table->integer('fk_id_opcion')->nullable();
            $table->integer('fk_id_usuario');
            $table->timestamp('fecha_creacion');

            $table->index(["fk_id_filtro"], 'filtro_opcion_reporte_idx');

            $table->index(["fk_id_opcion"], 'opcion_filtro_reporte_idx');


            $table->foreign('fk_id_filtro', 'filtro_opcion_reporte_idx')
                ->references('id_filtro')->on('filtro')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('fk_id_opcion', 'opcion_filtro_reporte_idx')
                ->references('id_opcion')->on('opcion')
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
        Schema::dropIfExists($this->tableName);
    }
}
