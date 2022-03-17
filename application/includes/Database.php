<?php

namespace application\includes;

use PDO;

include "application/includes/errors.php";

class Database
{
    protected $host     = 'localhost';
    protected $dbname   = 'php_site_howdyho';
    protected $username = 'root1';
    protected $password = 'root';
    protected $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ];

    protected $connection;

    public function __construct()
    {
        $this->connection = new PDO(
            "mysql:host=$this->host;
            dbname=$this->dbname",
            $this->username,
            $this->password,
            $this->options);
    }

    public function dbCheckError($query)
    {
        $errInfo = $query->errorInfo();
        if($errInfo[0] !== PDO::ERR_NONE){
            echo $errInfo[2];
            exit();
        }
    }

    public function selectAll($table, $wheres = [])
    {
        $bindings = [];
        $sql = "SELECT * FROM $table";
        if(!empty($wheres)){
            $whereSql = [];
            foreach($wheres AS $k => $v) {
                $bindings[] = $v;
                $whereSql[] = "`$k` = ?";
            }
            $sql .= ' WHERE ' . implode(' AND ', $whereSql);
        }
        $query = $this->connection->prepare($sql);
        $query->execute($bindings);
        $this->dbCheckError($query);

        return $query->fetchAll();
    }
}