<?php

namespace Database\Migrations;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReporteFactorTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'reporte_factor';

    /**
     * Run the migrations.
     * @table reporte_factor
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id_reporte_factor');
            $table->integer('fk_id_reporte');
            $table->integer('fk_id_factor');
            $table->decimal('coeficiente', 15, 4);

            $table->index(["fk_id_reporte"], 'reporte_factor_idx');

            $table->index(["fk_id_factor"], 'factor_reporte_idx');


            $table->foreign('fk_id_reporte', 'reporte_factor_idx')
                ->references('id_reporte')->on('reporte')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('fk_id_factor', 'factor_reporte_idx')
                ->references('id_factor')->on('factor')
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
