<?php

class authorization{
    private $db;

    public function __construct(){
        $this->db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE);
    }

    public function signin($email, $password) {
        $link = $this->db->connect();
        $stmt = $link->prepare("SELECT name, surname, email FROM users WHERE email = ? AND password = ? LIMIT 1");
        $stmt->bind_param("ss", $email, $password);
        /* execute query */
        $stmt->execute();

        /* Get the result */
        $result = $stmt->get_result();

        $row = $result->fetch_assoc();

        if ($row == null) return null;
        $user = new User();
        $user->setName($row['name']);
        $user->setSurname($row['surname']);
        $user->setEmail($row['email']);
        $stmt->close();
        return $user;
    }
}