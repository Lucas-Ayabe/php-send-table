<?php
$connection = new PDO("sqlite:./people.db");

$query = <<<SQL
    CREATE TABLE people (
        id INTEGER PRIMARY KEY,
        name TEXT,
        age INTEGER
    )
SQL;

$connection->exec($query);
