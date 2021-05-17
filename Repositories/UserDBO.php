<?php

class UserDBO{
    private $db;

    public function __construct(){
        $this -> db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE);
    }

    public function getUserByEmail($email){
        $link = $this -> db -> connect();
        $stmt = $link-> prepare("SELECT * FROM users WHERE email = ? LIMIT 1");
        $stmt -> bind_param("s", $email);

        $stmt -> execute();

        $result = $stmt -> get_result();

        $row = $result-> fetch_assoc();
        if($row == null) return null;
        $user = new User();
        $user -> setId($row['id']);
        $user -> setName($row['name']);
        $user -> setSurname($row['surname']);
        $user -> setEmail($row['email']);
        $user -> setPassword($row['password']);

        return $user;
    }
}