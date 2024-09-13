<?php

declare(strict_types=1);

use Lucite\Utils\MockRequest;
use Lucite\Utils\MockStream;
use Lucite\Utils\MockUri;
use PHPUnit\Framework\TestCase;

class MockImplementationTest extends TestCase
{
    public function testCanInstantiateMockUri(): void
    {
        $uri = new MockUri();
        $this->assertTrue(true);
    }

    public function testCanInstantiateMockStream(): void
    {
        $stream = new MockStream();
        $this->assertTrue(true);
    }
    public function testCanInstantiateMockRequest(): void
    {
        $request = new MockRequest();
        $this->assertTrue(true);
    }
}
