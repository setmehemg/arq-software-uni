<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TableInscritoExistTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testTableExists()
    {
        $tableName = 'inscricoes';
    
        $tableExists = \Schema::hasTable($tableName);
    
        $this->assertTrue($tableExists, "The table '$tableName' does not exist.");
    }
}
