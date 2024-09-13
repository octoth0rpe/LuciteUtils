<?php

declare(strict_types=1);

use Lucite\Utils\MockDb;
use PHPUnit\Framework\TestCase;

class MockDbTest extends TestCase
{
    public function testExecute(): void
    {
        $db = new MockDb();
        $db->addMockResponse(true);
        $response = $db->execute('UPDATE books SET title = \'Principles of Operating Systems\' WHERE id = 5');
        $this->assertEquals(true, $response);
    }

    public function testFetchAll(): void
    {
        $db = new MockDb();
        $db->addMockResponse([['id' => 5, 'title' => 'The C Programming Language']]);
        $response = $db->query('SELECT * FROM books')->fetchAll();
        $this->assertEquals(1, count($response));
        $this->assertEquals(5, $response[0]['id']);
        $this->assertEquals('The C Programming Language', $response[0]['title']);
    }

    public function testFetchOne(): void
    {
        $db = new MockDb();
        $db->addMockResponse(['id' => 8, 'title' => 'Algorithms + Data Structures = Programs']);
        $response = $db->query('SELECT * FROM books LIMIT 1')->fetchOne();
        $this->assertEquals(8, $response['id']);
        $this->assertEquals('Algorithms + Data Structures = Programs', $response['title']);
    }

    public function testFetchColumn(): void
    {
        $db = new MockDb();
        $db->addMockResponse(5);
        $response = $db->query('SELECT count(*) as mycount FROM books LIMIT 1')->fetchColumn();
        $this->assertEquals(5, $response);
    }

    public function testMixOfCalls(): void
    {
        $db = new MockDb();
        $db->addMockResponse([['id' => 5, 'title' => 'The C Programming Language']]);
        $db->addMockResponse(['id' => 8, 'title' => 'Algorithms + Data Structures = Programs']);
        $db->addMockResponse(5);

        $response = $db->query('SELECT * FROM books')->fetchAll();
        $this->assertEquals(1, count($response));
        $this->assertEquals(5, $response[0]['id']);
        $this->assertEquals('The C Programming Language', $response[0]['title']);

        $response = $db->query('SELECT * FROM books LIMIT 1')->fetchOne();
        $this->assertEquals(8, $response['id']);
        $this->assertEquals('Algorithms + Data Structures = Programs', $response['title']);

        $response = $db->query('SELECT count(*) as mycount FROM books LIMIT 1')->fetchColumn();
        $this->assertEquals(5, $response);
    }
}
