<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Pnoexz\Diem;

class CreateNullableImmutableFromMixedTest extends TestCase
{
    /**
     * @test
     */
    public function createsNullableFromNullInput()
    {
        $new = Diem::createNullableImmutableFromMixed(null);

        $this->assertNull($new);
    }

    /**
     * @test
     */
    public function callsCreateImmutableFromMixed()
    {
        $date = new \DateTimeImmutable();

        $fromNotNullable =  Diem::createImmutableFromMixed($date);
        $fromNullable = Diem::createNullableImmutableFromMixed($date);

        $this->assertEquals($fromNotNullable, $fromNullable);
    }
}
