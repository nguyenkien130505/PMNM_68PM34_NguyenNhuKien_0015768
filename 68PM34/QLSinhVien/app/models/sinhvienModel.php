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

    public function paging($limit = 5, $offset = 0, $search = '') {
        $limit = max(1, (int)$limit);
        $offset = max(0, (int)$offset);
        
        $query = "SELECT * FROM tbl_sinhviens WHERE hoten LIKE :search LIMIT :limit OFFSET :offset";
        $stmt = $this->conn->prepare($query);
        $searchParam = '%' . $search . '%';
        $stmt->bindParam(':search', $searchParam, PDO::PARAM_STR);
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        $countQuery = "SELECT COUNT(*) FROM tbl_sinhviens WHERE hoten LIKE :search";
        $countStmt = $this->conn->prepare($countQuery);
        $countStmt->bindParam(':search', $searchParam, PDO::PARAM_STR);
        $countStmt->execute();
        $totalrecord = (int)$countStmt->fetchColumn();
        $totalpage = $totalrecord > 0 ? ceil($totalrecord / $limit) : 0;
        
        return [
            'data' => $result,
            'totalrecord' => $totalrecord,
            'totalpage' => $totalpage
        ];
    }

}
?>