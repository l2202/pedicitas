<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Carbon\Carbon;
class EdadTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_example(): void
    {
        $this->assertTrue(true);
    }

    public function test_calcula_la_edad_correctamente()
    {
        $fechaNacimiento = '2020-06-04';

        $edad = Carbon::parse($fechaNacimiento)->age;

        $this->assertEquals(6, $edad);
    }
}
