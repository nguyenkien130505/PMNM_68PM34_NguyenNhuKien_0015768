<?php
require_once '../app/core/DB.php';
class sinhvienModel {
    private $conn;
    public function __construct() {
        $this->conn = ConnectDB::Connect();
    }
    public function getAllSinhVien() {
        $query = "SELECT * FROM tbl_sinhviens";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function create(){
        $query = "INSERT INTO tbl_sinhviens (hoten, gioitinh, mssv) VALUES (:hoten, :gioitinh, :mssv)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':hoten', $_POST['hoten']);
        $stmt->bindParam(':gioitinh', $_POST['gioitinh']);
        $stmt->bindParam(':mssv', $_POST['mssv']);
        return $stmt->execute();
    }
    public function store() {
        if ($this->create()) {
            header("Location: /sinhvien/index");
            exit();
        } else {
            echo "Error creating sinhvien.";
        }
    }
}
