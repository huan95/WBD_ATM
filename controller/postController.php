<?php
/**
 * Created by PhpStorm.
 * User: huanld
 * Date: 9/26/18
 * Time: 10:06 AM
 */

namespace Controller;

use Model\Database;
use Model\PostDB;
use Model\User;
use Model\Atm;

class PostController
{
    public $postDB;

    /**ket noi voi database
     * PostController constructor.
     */

    public function __construct()
    {
        $database = new Database();
        $this->postDB = new PostDB($database->connect());

    }

    /**form index hien thi danh sach khach hang
     *
     */

    public function index()
    {
        $posts = $this->postDB->getAllUser();
        include 'view/list.php';
    }

    /**
     * form hien thi lich su giao dich
     */

    public function history()
    {
        $posts = $this->postDB->getAll();
        include 'view/history.php';
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            include 'view/add.php';
        } else {
            $date = date('Y-m-d H:i:s');
            $this->postDB->create($_POST['user1'], $_POST['amount'], $_POST['user2'], $date, $_POST['content']);
            include 'view/history.php';
        }
    }

    /**
     * form kiem tra dang nhap
     */

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            include 'login.php';
        } else {
            $username = $_POST['name'];
            $password = $_POST['password'];

            $this->postDB->check($username, $password);

        }
    }
}