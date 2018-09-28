<?php
/**
 * Created by PhpStorm.
 * User: huanld
 * Date: 9/26/18
 * Time: 8:27 AM
 */

namespace Model;

use PDO;

class PostDB
{
    public $conn;

    /** ket noi voi database
     * PostDB constructor.
     * @param PDO $conn
     */

    public function __construct(PDO $conn)
    {
        $this->conn = $conn;
    }

    public function getAll()
    {
        $sql = "SELECT * FROM transaction_history ORDER BY id DESC ";
        $query = $this->conn->query($sql);
        $result = $query->fetchAll();
        $posts = [];
        foreach ($result as $row) {
            $post = new Atm($row['id'], $row['target_id'], $row['source_id'], $row['amount'], $row['content'], $row['datetime'], $row['success']);
            $posts[] = $post;
        }
        return $posts;
    }

    /** lay ten, so tien khach hang
     * @return array
     */

    public function getAllUser()
    {
        $sql = "SELECT * FROM user_account";
        $query = $this->conn->query($sql);
        $result = $query->fetchAll();
        $posts = [];
        foreach ($result as $row) {
            $post = new User($row['id'], $row['user_name'], $row['password'], $row['balance']);
            $posts[] = $post;
        }
        return $posts;

    }

//    public function getById($id)
//    {
//        $sql = "SELECT * FROM user_account WHERE id = '$id' ";
//        $query = $this->conn->prepare($sql);
//        $query->execute();
//        $data = $query->fetchAll(PDO::FETCH_ASSOC);
//        return $data;
//    }

    /** giao dich chuyen tien
     * @param $user1
     * @param $amount
     * @param $user2
     * @param $date
     * @param $content
     */

    public function create($user1, $amount, $user2, $date, $content)
    {
        $this->conn->beginTransaction();

        $sql = "SELECT balance FROM user_account WHERE id = ?";
        $query = $this->conn->prepare($sql);
        $query->execute([$user1]);
        $availableAmount = (int)$query->fetchColumn();
        $result = $query->fetchAll();


        if ($availableAmount > $amount) {

            $sqlUpdateUser1 = "UPDATE user_account SET balance=balance - ? WHERE id = ?";
            $query = $this->conn->prepare($sqlUpdateUser1);
            $query->execute([$amount, $user1]);

            $sqlUpdateUser2 = "UPDATE user_account SET balance=balance + ? WHERE id = ?";
            $query = $this->conn->prepare($sqlUpdateUser2);
            $query->execute([$amount, $user2]);

            $success = 1;

        } else {
            echo "Not enought monney ";

            $success = 0;
        };

        $update = "INSERT INTO transaction_history(target_id, source_id, amount, content, datetime, success) VALUES (?,?,?,?,?,?)";
        $query = $this->conn->prepare($update);
        $query->execute([$user1, $user2, $amount, "$content", "$date", $success]);
        $this->conn->commit();

    }

    /**kiem tra dang nhap tai khoan
     * @param $account
     * @param $password
     */

    public function check($account, $password)
    {
        $sqlAcc = "SELECT user_name FROM user_account WHERE user_name ='$account'";
        $query = $this->conn->query($sqlAcc);
        $result = $query->fetchAll(PDO::FETCH_ASSOC);

        if ($result == NULL) {
            header('Location: index.php?page=login');
        } else {
            $sqlAll = "SELECT user_name,password  FROM user_account WHERE user_name ='$account'  AND password='$password'";
            $query = $this->conn->query($sqlAll);
            $result = $query->fetchAll(PDO::FETCH_ASSOC);

            if ($result == NULL) {
                header("HTTP/1.0 405 Not Found");
            } else {
                header('Location: index.php?page=index');
            }
        }
    }




}