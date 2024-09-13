<?php

declare(strict_types=1);

use Lucite\Utils\Db;
use Lucite\Utils\DbInterface;
use PHPUnit\Framework\TestCase;

class DbTest extends TestCase
{
    public string $mock_table = <<<SQL
CREATE TABLE books (
	id INT,
	title TEXT
);

INSERT INTO BOOKS
	(id, title)
VALUES
	(5, 'The C Programming Language'),
	(8, 'Algorithms + Data Structures = Programs');
SQL;

    public function _setupDb(): DbInterface
    {
        $db = new Db('sqlite::memory:');
        $db->pdo->exec($this->mock_table);
        return $db;
    }

    public function testExecute(): void
    {
        $db = $this->_setupDb();
        $response = $db->execute('UPDATE books SET id = 6 WHERE id = 5;');
        $this->assertEquals(true, $response);

        $response = $db->query('SELECT * FROM books WHERE id = 6 LIMIT 1')->fetchOne();
        $this->assertEquals(6, $response['id']);
        $this->assertEquals('The C Programming Language', $response['title']);
    }

    public function testFetchAll(): void
    {
        $db = $this->_setupDb();
        $response = $db->query('SELECT * FROM books ORDER BY id')->fetchAll();
        $this->assertEquals(2, count($response));
        $this->assertEquals(5, $response[0]['id']);
        $this->assertEquals('The C Programming Language', $response[0]['title']);
        $this->assertEquals(8, $response[1]['id']);
        $this->assertEquals('Algorithms + Data Structures = Programs', $response[1]['title']);
    }

    public function testFetchOne(): void
    {
        $db = $this->_setupDb();
        $response = $db->query('SELECT * FROM books ORDER BY id DESC LIMIT 1')->fetchOne();
        $this->assertEquals(8, $response['id']);
        $this->assertEquals('Algorithms + Data Structures = Programs', $response['title']);
    }

    public function testFetchColumn(): void
    {
        $db = $this->_setupDb();
        $response = $db->query('SELECT count(*) as mycount FROM books LIMIT 1')->fetchColumn();
        $this->assertEquals(2, $response);
    }

    public function testMixOfCalls(): void
    {
        $db = $this->_setupDb();

        $response = $db->query('SELECT * FROM books')->fetchAll();
        $this->assertEquals(2, count($response));
        $this->assertEquals(5, $response[0]['id']);
        $this->assertEquals('The C Programming Language', $response[0]['title']);
        $this->assertEquals(8, $response[1]['id']);
        $this->assertEquals('Algorithms + Data Structures = Programs', $response[1]['title']);

        $response = $db->query('SELECT * FROM books ORDER BY id DESC LIMIT 1')->fetchOne();
        $this->assertEquals(8, $response['id']);
        $this->assertEquals('Algorithms + Data Structures = Programs', $response['title']);

        $response = $db->query('SELECT count(*) as mycount FROM books LIMIT 1')->fetchColumn();
        $this->assertEquals(2, $response);
    }
}
