<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('eventos')->insert([
            [
                'nome' => 'Evento Teste 1',
                'descricao' => 'Teste 1 para evento 1',
                'data_inicial' => '2023-07-10 09:00:00',
                'data_final' => '2023-07-10 17:00:00',
            ],
            [
                'nome' => 'Evento Teste 2',
                'descricao' => 'Teste 1 para evento 2 tbm',
                'data_inicial' => '2023-07-11 10:00:00',
                'data_final' => '2023-07-11 18:00:00',
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
