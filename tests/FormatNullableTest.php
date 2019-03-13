<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Pnoexz\Diem;

class FormatNullableTest extends TestCase
{
    /**
     * @test
     */
    public function formatsDate()
    {
        $date = new \DateTime();
        $expectedFormat = $date->format(DATE_ATOM);

        $formatted = Diem::formatNullable($date, DATE_ATOM);

        $this->assertIsString($formatted);
        $this->assertEquals($expectedFormat, $formatted);
    }

    /**
     * @test
     */
    public function doesntFormatNull()
    {
        $formatted = Diem::formatNullable(null);

        $this->assertNull($formatted);
    }
}
