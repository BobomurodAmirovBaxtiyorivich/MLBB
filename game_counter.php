<?php

class game_counter
{

    public $query;
    public $stmt;
    public $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function store($name, $count_of_games)
    {
        $this->query = "INSERT INTO game_counter(name, count_of_games) VALUES('{$name}', '{$count_of_games}')";
        $this->conn->query($this->query);
    }

    public function select()
    {
        $this->query = "SELECT * FROM game_counter ORDER BY id DESC";
        $this->stmt = $this->conn->query($this->query);

        return $this->stmt->fetchALL(PDO::FETCH_ASSOC);
    }

    public function plus($id)
    {
        $this->query = "UPDATE game_counter SET count_of_games = count_of_games + 1 WHERE id = {$id}";
        $this->conn->query($this->query);
    }

    public function minus($id)
    {
        $this->query = "UPDATE game_counter SET count_of_games = count_of_games - 1 WHERE id = {$id}";
        $this->conn->query($this->query);
    }
}
