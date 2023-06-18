<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Eventos;

class EventoTest extends TestCase
{
    /**
     * Test if event data is saved correctly.
     *
     * @return void
     */
    public function testEventDataIsSaved()
    {
        $eventData = [
            'nome' => 'Test Event',
            'descricao' => 'This is a test event.',
            'data_inicial' => '2023-06-18',
            'data_final' => '2023-06-20',
            //'lugares' => 15,
        ];

        $event = Eventos::create($eventData);

        $this->assertEquals($eventData['nome'], $event->nome);
        $this->assertEquals($eventData['descricao'], $event->descricao);
        $this->assertEquals($eventData['data_inicial'], $event->data_inicial);
        $this->assertEquals($eventData['data_final'], $event->data_final);
        //$this->assertEquals($eventData['lugares'], $event->lugares);
    }
}