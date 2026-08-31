<?php
class user
{
    private $db;
    function __construct($conn)
    {
        $this->db = $conn;
    }
    public function insertuser($username, $pass)
    {
        try {
            $res = $this->getuserbyusername($username);
            if ($res['num'] > 0) {
                echo "This username used type different one";
                return false;
            } else {
                $newpass = md5($pass . $username);
                $sql = "INSERT INTO user(username,pass) Values (:username,:pass)";
                $st = $this->db->prepare($sql);
                $st->bindparam(':username', $username);
                $st->bindparam(':pass', $newpass);
                $st->execute();
                return true;
            }
        } catch (PDOException $th) {
            echo $th->getMessage();
        }
    }

    public function getuser($username, $pass)
    {

        try {
            $sql = "select * from user where username = :username and pass = :pass";
            $st = $this->db->prepare($sql);
            $st->bindparam(':username', $username);
            $st->bindparam(':pass', $pass);
            $st->execute();
            $res = $st->fetch();
            return $res;
        } catch (PDOException $th) {
            echo $th->getMessage();
        }
    }
    public function getuserbyusername($username)
    {

        try {
            $sql = "select count(*) as num from user where username = :username";
            $st = $this->db->prepare($sql);
            $st->bindparam(':username', $username);
            $st->execute();
            $res = $st->fetch();
            return $res;
        } catch (PDOException $th) {
            echo $th->getMessage();
            // return false;
        }
    }
}
