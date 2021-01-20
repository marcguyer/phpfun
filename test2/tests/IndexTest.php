<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class IndexTest extends TestCase
{
    public function testSample(): void
    {
        $index = new Index();
        $sample = $index->sampleMethod('hi');

        $this->assertEquals($sample, 'hi');
    }
}
