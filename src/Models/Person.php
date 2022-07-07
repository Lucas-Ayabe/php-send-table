<?php

namespace Lucas\App\Models;

use PDO;

class Person
{
    private PDO $connection;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    public function findAll(): array
    {
        $statement = $this->connection->query("SELECT * FROM people");
        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function create(string $name, int $age): void
    {
        $query = "INSERT INTO people(name, age) VALUES (?, ?)";
        $statement = $this->connection->prepare($query);
        $statement->execute([$name, $age]);
    }
}
