<?php

class mysql
{
    public $connection;

    public function __construct()
    {
        $host = "localhost";
        $username = "root";
        $password = "@madhav123";
        $db = "online_examination";

        $this->connection = new mysqli($host, $username, $password, $db);

        if ($this->connection->connect_error) {
            throw new Exception("Database Connection Failed.");
        }
    }

    public function execute($sql, $first = false)
    {
        $list = $this->connection->query($sql);
        if ($list && $list->num_rows > 0) {
            $response = [];
            while ($item = $list->fetch_assoc()) {
                array_push($response, $item);
            }

            mysqli_free_result($list);
            
            if ($first) {
                return $response[0];
            }
            return $response;

        } 
        else 
        {
            return false;
        }
    }

    public function close()
    {
        if ($this->connection)
            $this->connection->close();
    }

}
?>