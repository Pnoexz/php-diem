<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Pnoexz\Diem;
use Pnoexz\DiemException;

class CreateImmutableFromMixedTest extends TestCase
{
    /**
     * @test
     */
    public function createsFromDateTimeImmutable()
    {
        $date = new \DateTimeImmutable();
        $new = Diem::createImmutableFromMixed($date);

        $this->assertInstanceOf(\DateTimeImmutable::class, $new);
        $this->assertEquals($date, $new);
    }

    /**
     * @test
     */
    public function createsFromDateTime()
    {
        $date = new \DateTime();
        $new = Diem::createImmutableFromMixed($date);

        $this->assertInstanceOf(\DateTimeImmutable::class, $new);
        $this->assertEquals($date, $new);
    }

    /**
     * @test
     */
    public function createsFromTimestamp()
    {
        $date = new \DateTimeImmutable();
        $new = Diem::createImmutableFromMixed($date->getTimestamp());

        $this->assertInstanceOf(\DateTimeImmutable::class, $new);
        $this->assertEquals($date->getTimestamp(), $new->getTimestamp());
    }

    /**
     * @test
     */
    public function throwsExceptionOnError()
    {
        $this->expectException(DiemException::class);

        Diem::createImmutableFromMixed('erroneous string');
    }
}
