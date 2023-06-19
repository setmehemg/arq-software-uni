<?php

namespace Tests\Unit;

use App\Models\Inscricao;
use Tests\TestCase;

class InscritoTest extends TestCase
{
    /**
     * Test if event data is saved correctly.
     *
     * @return void
     */
    public function testInscricaoDataIsSaved()
    {
        $inscricaoData = [
            'eventos_id' => 1,
            'users_id' => 2,
        ];

        $inscrito = Inscricao::create($inscricaoData);

        $this->assertEquals($inscricaoData['eventos_id'], $inscrito->eventos_id);
        $this->assertEquals($inscricaoData['users_id'], $inscrito->users_id);
    }
}