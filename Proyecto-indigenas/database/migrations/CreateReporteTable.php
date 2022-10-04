<?php

namespace Database\Migrations;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReporteTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'reporte';

    /**
     * Run the migrations.
     * @table reporte
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id_reporte');
            $table->string('respuesta')->nullable()->default(null);
            $table->string('fecha_creacion', 45)->nullable()->default(null);
            $table->integer('fk_id_usuario');

            $table->index(["fk_id_usuario"], 'respuesta_usuario_idx');


            $table->foreign('fk_id_usuario', 'respuesta_usuario_idx')
                ->references('id_usuario')->on('user')
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
