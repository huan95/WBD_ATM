<?php
/**
 * Created by PhpStorm.
 * User: huanld
 * Date: 9/26/18
 * Time: 8:06 AM
 */

namespace Model;

use PDO;
use PDOException;

class Database
{

    private $url;
    private $userName;
    private $passWord;
    public $conn;

    public function connect()
    {
        $this->userName = "root";
        $this->passWord = "123456";
        $this->url = "mysql:host=localhost;dbname=atmmodels";
        $this->conn = null;
        try {
            $this->conn = new PDO($this->url, $this->userName, $this->passWord);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $e) {
            echo "connection failed" . $e->getMessage();

        }
        return $this->conn;

    }
}

