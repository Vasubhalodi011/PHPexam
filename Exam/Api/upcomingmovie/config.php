<?php

class Config
{
    private $HOSTNAME = "localhost";
    private $USERNAME = "root";
    private $PASSWORD = "";
    private $DB_DATA = "movie";

    private $runningmovie = "runningmovie";



    public $connection;

    public function connect()
    {
        $this->connection = mysqli_connect($this->HOSTNAME, $this->USERNAME, $this->PASSWORD, $this->DB_DATA);
        return $this->connection;
    }

    
    public function insertuser($Name,$Email,$Contact)
    {

        $this->connect();

        $query = "INSERT INTO userdata (Name, Email, Contact) VALUES('$Name','$Email', '$Contact');";

        return mysqli_query($this->connection, $query); 

    }

    public function fetchuser()
    {
        $this->connect();
        $query = "SELECT * FROM userdata;";
        $res = mysqli_query($this->connection, $query);

        return $res;
    }
    public function deleteuser($id)
    {
        $this->connect();
        $query = "DELETE FROM userdata WHERE Id = $id ;";
        $res = mysqli_query($this->connection, $query);
        return $res;
    }

    public function fetchingSingleuser($id)
    {
        $this->connect();

        $query = "SELECT * FROM userdata WHERE Id = $id ;";

        $res = mysqli_query($this->connection, $query);
        
        return $res;
    }

    public function updateuser($Name,$Email, $Contact,$id)
    {
        $this->connect();
        $query = "UPDATE userdata SET Name = '$Name', Email = '$Email', Contact = '$Contact' WHERE Id = $id ;";
        $res = mysqli_query($this->connection, $query);
        return $res;
    }
    public function insertmovie($name)
    {
        $this->connect();

        $isDepartment = $this->fetchingSingleuser($name);

        if ($isDepartment) {
            $query = "INSERT INTO $this->runningmovie (name) VALUES('$name');";

            return mysqli_query($this->connection, $query);
        } else {
            return false;
        }
    }


}

?>