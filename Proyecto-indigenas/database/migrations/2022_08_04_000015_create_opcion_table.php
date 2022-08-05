<?php

namespace Database\Migrations;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOpcionTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'opcion';

    /**
     * Run the migrations.
     * @table opcion
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id_opcion');
            $table->string('valor', 45)->nullable();
            $table->string('descripcion')->nullable()->default(null);
            $table->string('fecha_creacion', 45)->nullable()->default(null);
            $table->integer('fk_id_filtro')->nullable()->default(null);
            $table->integer('fk_id_usuario');

            $table->index(["fk_id_usuario"], 'usuario_comentario_idx');

            $table->index(["fk_id_filtro"], 'foro_comentario_idx');


            $table->foreign('fk_id_usuario', 'usuario_comentario_idx')
                ->references('id_usuario')->on('user')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('fk_id_filtro', 'foro_comentario_idx')
                ->references('id_filtro')->on('filtro')
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
