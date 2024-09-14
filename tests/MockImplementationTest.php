<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Lucite\Utils\MockRequest;
use Lucite\Utils\MockResponse;
use Lucite\Utils\MockServerRequest;
use Lucite\Utils\MockStream;
use Lucite\Utils\MockUri;
use Lucite\Utils\MockDb;
use Lucite\Utils\MockDbQuery;

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

    public function testCanInstantiateMockServerRequest(): void
    {
        $request = new MockServerRequest();
        $this->assertTrue(true);
    }

    public function testCanInstantiateMockResponse(): void
    {
        $response = new MockResponse();
        $this->assertTrue(true);
    }

    public function testCanInstantiateMockDb(): void
    {
        $request = new MockDb();
        $this->assertTrue(true);
    }

    public function testCanInstantiateMockDbQueryt(): void
    {
        $request = new MockDbQuery();
        $this->assertTrue(true);
    }
}
