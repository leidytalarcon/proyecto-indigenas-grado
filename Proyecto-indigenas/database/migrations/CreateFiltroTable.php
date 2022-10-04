<?php

namespace Database\Migrations;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFiltroTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'filtro';

    /**
     * Run the migrations.
     * @table filtro
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id_filtro');
            $table->string('nombre', 45)->nullable()->default(null);
            $table->string('contenido')->nullable()->default(null);
            $table->dateTime('fecha_creacion')->nullable();
            $table->integer('fk_id_usuario');

            $table->index(["fk_id_usuario"], 'foro_usuario_crea_idx');


            $table->foreign('fk_id_usuario', 'foro_usuario_crea_idx')
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
