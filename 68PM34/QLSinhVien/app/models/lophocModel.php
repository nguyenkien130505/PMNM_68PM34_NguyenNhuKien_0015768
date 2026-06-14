<?php
require_once '../app/core/DB.php';

class lophocModel {
    private $conn;

    public function __construct() {
        $this->conn = ConnectDB::Connect();
    }

    public function getAllLopHoc() {
        $query = "SELECT * FROM tbl_lophoc";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create(){
        $query = "INSERT INTO tbl_lophoc (malop, tenlop, ghichu) VALUES (:malop, :tenlop, :ghichu)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':malop', $_POST['malop']);
        $stmt->bindParam(':tenlop', $_POST['tenlop']);
        $stmt->bindParam(':ghichu', $_POST['ghichu']);
        return $stmt->execute();
    }

    public function checkMalopExists($malop, $excludeId = null) {
        $query = "SELECT COUNT(*) FROM tbl_lophoc WHERE malop = :malop";
        if ($excludeId !== null) {
            $query .= " AND id != :id";
        }
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':malop', $malop);
        if ($excludeId !== null) {
            $stmt->bindParam(':id', $excludeId, PDO::PARAM_INT);
        }
        $stmt->execute();
        return $stmt->fetchColumn() > 0;
    }


    public function paging($limit = 5, $offset = 0, $search = '') {
        $limit = max(1, (int)$limit);
        $offset = max(0, (int)$offset);
        
        $query = "SELECT * FROM tbl_lophoc WHERE tenlop LIKE :search OR malop LIKE :search LIMIT :limit OFFSET :offset";
        $stmt = $this->conn->prepare($query);
        $searchParam = '%' . $search . '%';
        $stmt->bindParam(':search', $searchParam, PDO::PARAM_STR);
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        $countQuery = "SELECT COUNT(*) FROM tbl_lophoc WHERE tenlop LIKE :search OR malop LIKE :search";
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

    public function getLopHocById($id) {
        $query = "SELECT * FROM tbl_lophoc WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateLopHoc($data) {
        $query = "UPDATE tbl_lophoc SET malop = :malop, tenlop = :tenlop, ghichu = :ghichu WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':malop', $data['malop']);
        $stmt->bindParam(':tenlop', $data['tenlop']);
        $stmt->bindParam(':ghichu', $data['ghichu']);
        $stmt->bindParam(':id', $data['id'], PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function deleteLopHoc($id) {
        $query = "DELETE FROM tbl_lophoc WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
?>
