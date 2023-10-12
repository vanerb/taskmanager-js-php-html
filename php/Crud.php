<?php

class Crud{
    //General
    public function getinfo($sql){
        $sqlConnection = new Connection();

        $mysql = $sqlConnection->getConnection();

        $result = $mysql->query($sql);
        return $result;
    }



    //Users

    public function addUser($data){
        $sqlConnection = new Connection();
        $mysql = $sqlConnection->getConnection();

        $sql = "INSERT INTO users(name, email, password) VALUES ('$data[0]','$data[1]', '$data[2]')";

        $mysql->query($sql);
    }

    public function editUser($data, $id){
        $sqlConnection = new Connection();
        $mysql = $sqlConnection->getConnection();

        $sql = "UPDATE users SET name='$data[0]', email='$data[1]', password='$data[2]' WHERE id='$id'";

        $mysql->query($sql);
    }


    public function deleteUser($id){
        $sqlConnection = new Connection();
        $mysql = $sqlConnection->getConnection();

        $sql = "DELETE FROM users WHERE id='$id'";

        $mysql->query($sql);
    }


    //Tasks

    public function addTask($data){
        $sqlConnection = new Connection();
        $mysql = $sqlConnection->getConnection();

        $sql = "INSERT INTO tasks(title, content, category_id, user_id) VALUES ('$data[0]','$data[1]', '$data[2]', '$data[3]')";

        $mysql->query($sql);
    }

    public function editTask($data, $id){
        $sqlConnection = new Connection();
        $mysql = $sqlConnection->getConnection();

        $sql = "UPDATE tasks SET title='$data[0]', content='$data[1]', category_id='$data[2]', user_id='$data[3]' WHERE id='$id'";

        $mysql->query($sql);
    }


    public function deleteTask($id){
        $sqlConnection = new Connection();
        $mysql = $sqlConnection->getConnection();

        $sql = "DELETE FROM tasks WHERE id='$id'";

        $mysql->query($sql);
    }



    //Categories


    public function addCategories($data){
        $sqlConnection = new Connection();
        $mysql = $sqlConnection->getConnection();

        $sql = "INSERT INTO category(name, user_id) VALUES ('$data[0]', '$data[1]')";

        $mysql->query($sql);
    }

    public function editCategories($data, $id){
        $sqlConnection = new Connection();
        $mysql = $sqlConnection->getConnection();

        $sql = "UPDATE category SET name='$data[0]', user_id='$data[1]' WHERE id='$id'";

        $mysql->query($sql);
    }


    public function deleteCategories($id){
        $sqlConnection = new Connection();
        $mysql = $sqlConnection->getConnection();

        $sql = "DELETE FROM category WHERE id='$id'";

        $mysql->query($sql);
    }
}


?>