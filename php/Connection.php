<?php 
class Connection{
    private $server = "localhost";
    private $user = "root";
    private $password = "";
    private $db = "taskmanager";

    public function getConnection(){
        return $conexion = new mysqli(
            $this->server,
            $this->user,
            $this->password,
            $this->db);
    }
    
}

?>