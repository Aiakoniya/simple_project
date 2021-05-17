<?php

class Database
{
    var $host = "localhost";
    var $user = "root";
    var $pass = "blablabla";
    var $database = "cs_362";

    public $link;

    /**
     * Database constructor.
     * @param string $host
     * @param string $user
     * @param string $pass
     * @param string $database
     */


    public function __construct($host, $user, $pass, $database)
    {
        $this->host = $host;
        $this->user = $user;
        $this->pass = $pass;
        $this->database = $database;
    }


    public function connect()
    {
        $this->link = new mysqli($this->host, $this->user, $this->pass, $this->database);
        if (mysqli_connect_error()) {
            return null;
        } else
            return $this->link;
    }

}