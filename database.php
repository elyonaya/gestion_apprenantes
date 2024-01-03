<?php
class Database
{
    private $host = "localhost";
    private $user = "exo_apprenantes";
    private $password = "exo_apprenantes";
    private $database = "exo_apprenantes";

    public function connect()
    {
        $conn = new mysqli($this->host, $this->user, $this->password, $this->database);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        return $conn;
    }
}

function databaseIncluded()
{
    return true;
}