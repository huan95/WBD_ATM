<?php
/**
 * Created by PhpStorm.
 * User: huanld
 * Date: 9/27/18
 * Time: 8:36 AM
 */

namespace Model;

class User
{
    public $id;
    public $userName;
    public $passWord;
    public $balance;

    public function __construct($id, $userName, $passWord, $balance)
    {
        $this->id = $id;
        $this->userName = $userName;
        $this->passWord = $passWord;
        $this->balance = $balance;
    }
}