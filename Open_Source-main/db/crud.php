<?php
class crud
{
    private $db;
    function __construct($conn)
    {
        $this->db = $conn;
    }
    public function insertclient($username, $date, $email, $phone)
    {
        try {
            $sql = "INSERT INTO client(username, dat, email, phone) VALUES (:username, :dat, :email, :phone)";
            $st =  $this->db->prepare($sql);
            $st->bindparam(':username', $username);
            $st->bindparam(':dat', $date);
            $st->bindparam(':email', $email);
            $st->bindparam(':phone', $phone);
            $st->execute();
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage());
        }
    }
    public function viewonerecordclient($id)
    {
        try {
            $sql = "select * from client where id=:id";
            $st =  $this->db->prepare($sql);
            $st->bindparam(':id', $id);
            $st->execute();
            $res = $st->fetch(PDO::FETCH_ASSOC);
            return $res;
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage());
        }
    }
    public function viewrecordclient()
    {
        try {
            $sql = "select * from client";
            $res = $this->db->query($sql);
            return $res;
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage());
        }
    }
    public function viewonerecordproduct($id)
    {

        try {
            $sql = "select * from product where id = :id";
            $st = $this->db->prepare($sql);
            $st->bindparam(':id', $id);
            $st->execute();
            $res = $st->fetch(PDO::FETCH_ASSOC); // Fetches a single record as an associative array
            return $res;
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage());
        }
    }
    public function viewrecordproduct()
    {

        try {
            $sql = "select * from product";
            $res = $this->db->query($sql);
            return $res;
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage());
        }
    }
    public function insertproduct($productname, $expiredate, $amount)
    {
        try {
            $sql = "INSERT INTO product(productname, expiredat, amount) VALUES (:productname,:expiredat,:amount)";
            $st = $this->db->prepare($sql);
            $st->bindparam(':productname', $productname);
            $st->bindparam(':expiredat', $expiredate);
            $st->bindparam(':amount', $amount);
            $st->execute();
        } catch (PDOException $th) {
            throw new PDOException($th->getMessage());
        }
    }
    public function deletepro($id)
    {
        $sql = "DELETE FROM product where id = :id";
        $st = $this->db->prepare($sql);
        $st->bindparam(':id', $id);
        $st->execute();
        return true;
    }
    public function deleteclient($id)
    {
        $sql = "DELETE FROM client where id = :id";
        $st = $this->db->prepare($sql);
        $st->bindparam(':id', $id);
        $st->execute();
        return true;
    }
    public function searchproductname($productname)
    {
        $sql = "SELECT * FROM product WHERE productname = :productname";
        $st = $this->db->prepare($sql);
        $st->bindparam(':productname', $productname);
        $st->execute();
        $res = $st->fetchAll(); // Use fetchAll() to get the results
        return $res;
    }
    // public function search($productname = "", $expiredat = 0) {

    //     // $productname = "%" . $productname . "%";
    //     // $expiredat = "%" . $expiredat . "%";
    //     $sql = "SELECT * FROM product WHERE productname = :productname OR YEAR(expiredat) <= :expiredat";
    //     $st = $this->db->prepare($sql);
    //     $st->bindParam(':productname', $productname, PDO::PARAM_STR);
    //     $st->bindParam(':expiredat', $expiredat, PDO::PARAM_INT);
    //     $st->execute();
    //     $res = $st->fetchAll();
    //     return $res;   
    // }
    public function search($searchTerm)
    {
        // $searchTerm = "%" . $searchTerm . "%";  // Adding the % for LIKE
        $sql = "
        SELECT 'client' AS source, id, username AS name, email AS detail
        FROM client
        WHERE username = :searchTerm OR email = :searchTerm OR phone = :searchTerm
        UNION
        SELECT 'product' AS source, id, productname AS name, expiredat AS detail
        FROM product
        WHERE productname = :searchTerm OR YEAR(expiredat) <= :searchTerm
    ";
        $st = $this->db->prepare($sql);
        $st->bindParam(':searchTerm', $searchTerm, PDO::PARAM_STR);
        $st->execute();
        $res = $st->fetchAll();
        return $res;
    }
    public function inserttoexda($id)
    {
        try {
            $res = $this->viewonerecordproduct($id);
            $productname = $res['productname'];
            $expiredat = $res['expiredat'];
            $amount = $res['amount'];
            
            $sql = "INSERT INTO expiret (productname, expiredat, amount) VALUES (:productname, :expiredat, :amount)";
            $st = $this->db->prepare($sql);
            $st->bindParam(':productname', $productname);
            $st->bindParam(':expiredat', $expiredat);
            $st->bindParam(':amount', $amount);
            $st->execute();
            $this->deletepro($id);
            return true;
        } catch (PDOException $th) {
            throw new PDOException($th->getMessage());
        }
    }
    public function viewrecordexpire()
    {

        try {
            $sql = "select * from expiret";
            $res = $this->db->query($sql);
            return $res;
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage());
        }
    }
    public function getProductsExpiringSoon()
{
    try {
        // Get today's date and the date three months from now
        $today = date('Y-m-d');
        $threeMonthsLater = date('Y-m-d', strtotime("+3 months"));
        // Prepare SQL to find products expiring within the next three months
        $sql = "SELECT * FROM product WHERE expiredat BETWEEN :today AND :threeMonthsLater";
        $st = $this->db->prepare($sql);
        $st->bindParam(':today', $today);
        $st->bindParam(':threeMonthsLater', $threeMonthsLater);
        $st->execute();
        $res = $st->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    } catch (PDOException $e) {
        throw new PDOException($e->getMessage());
    }
}

    
}
