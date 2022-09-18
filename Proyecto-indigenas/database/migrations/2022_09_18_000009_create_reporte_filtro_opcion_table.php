<?php

namespace Database\Migrations;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReporteFiltroOpcionTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'reporte_filtro_opcion';

    /**
     * Run the migrations.
     * @table reporte_filtro_opcion
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id_reporte_filtro_opcion');
            $table->integer('fk_id_reporte');
            $table->integer('fk_id_filtro_opcion');
            $table->integer('fk_id_usuario')->nullable();
            $table->timestamp('fecha_creacion')->nullable();

            $table->index(["fk_id_filtro_opcion"], 'filtro_opcion_idx');

            $table->index(["fk_id_reporte"], 'reporte_idx');


            $table->foreign('fk_id_filtro_opcion', 'filtro_opcion_idx')
                ->references('id_filtro_opcion')->on('filtro_opcion')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('fk_id_reporte', 'reporte_idx')
                ->references('id_reporte')->on('reporte')
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
