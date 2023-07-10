<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class DBCheckTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testDatabaseExists()
    {
        $databaseName = 'henriquedb10';

        try {
            $databaseExists = DB::connection()->getPdo()->query("SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = '$databaseName'")->rowCount() > 0;
        } catch (\Exception $e) {
            $databaseExists = false;
        }

        $this->assertTrue($databaseExists, "The database '$databaseName' does not exist.");
    }
}
