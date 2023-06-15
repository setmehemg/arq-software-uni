<?php

namespace Database\Seeders;

use App\Models\Eventos;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eventos::create([
            'nome' => 'Evento 1',
            'descricao' => 'evento 1 desc',
            'data_inicial' => date("2022-10-02"),
            'data_final' => date("2022-10-03"),
        ]);
        Eventos::create([
            'nome' => 'Evento 2',
            'descricao' => 'evento 2 desc',
            'data_inicial' => date("2022-11-10"),
            'data_final' => date("2022-11-15"),
        ]);
        Eventos::create([
            'nome' => 'Evento 3',
            'descricao' => 'evento 3 desc',
            'data_inicial' => date("2023-02-02"),
            'data_final' => date("2023-02-18"),
        ]);
        Eventos::create([
            'nome' => 'Evento 4',
            'descricao' => 'evento 4 desc',
            'data_inicial' => date("2022-12-01"),
            'data_final' => date("2022-12-30"),
        ]);
        Eventos::create([
            'nome' => 'Evento 5',
            'descricao' => 'evento 5 desc',
            'data_inicial' => date("2023-02-10"),
            'data_final' => date("2023-02-13"),
        ]);
        Eventos::create([
            'nome' => 'Evento 6',
            'descricao' => 'evento 6 desc',
            'data_inicial' => date("2023-03-01"),
            'data_final' => date("2023-03-02"),
        ]);
        Eventos::create([
            'nome' => 'Evento 7',
            'descricao' => 'evento 7 desc',
            'data_inicial' => date("2023-04-10"),
            'data_final' => date("2023-04-20"),
        ]);
        Eventos::create([
            'nome' => 'Evento 8',
            'descricao' => 'evento 8 desc',
            'data_inicial' => date("2023-04-11"),
            'data_final' => date("2023-04-14"),
        ]);
        Eventos::create([
            'nome' => 'Evento 9',
            'descricao' => 'evento 9 desc',
            'data_inicial' => date("2023-04-18"),
            'data_final' => date("2023-04-20"),
        ]);
    }
}
