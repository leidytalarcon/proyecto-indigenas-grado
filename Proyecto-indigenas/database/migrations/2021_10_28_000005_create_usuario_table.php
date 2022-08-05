<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuarioTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'usuario';

    /**
     * Run the migrations.
     * @table usuario
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id_usuario');
            $table->integer('documento')->nullable()->default(null);
            $table->string('nombre', 45)->nullable()->default(null);
            $table->integer('telefono')->nullable()->default(null);
            $table->string('username', 45)->nullable()->default(null);
            $table->string('contrasena', 45)->nullable()->default(null);
            $table->integer('fk_id_rol');
            $table->integer('fk_id_tipo_documento')->nullable();

            $table->index(["fk_id_rol"], 'usuario_rol_idx');

            $table->index(["fk_id_tipo_documento"], 'usuario_tipo_documento_idx');


            $table->foreign('fk_id_rol', 'usuario_rol_idx')
                ->references('id_rol')->on('rol')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('fk_id_tipo_documento', 'usuario_tipo_documento_idx')
                ->references('id_tipo_documento')->on('tipo_documento')
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
