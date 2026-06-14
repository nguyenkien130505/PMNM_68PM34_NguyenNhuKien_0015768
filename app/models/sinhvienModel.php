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
        $query = "INSERT INTO tbl_sinhviens (hoten, gioitinh, mssv, malop) VALUES (:hoten, :gioitinh, :mssv, :malop)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':hoten', $_POST['hoten']);
        $stmt->bindParam(':gioitinh', $_POST['gioitinh']);
        $stmt->bindParam(':mssv', $_POST['mssv']);
        $stmt->bindParam(':malop', $_POST['malop']);
        return $stmt->execute();
    }

    public function checkMssvExists($mssv, $excludeId = null) {
        $query = "SELECT COUNT(*) FROM tbl_sinhviens WHERE mssv = :mssv";
        if ($excludeId !== null) {
            $query .= " AND id != :id";
        }
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':mssv', $mssv);
        if ($excludeId !== null) {
            $stmt->bindParam(':id', $excludeId, PDO::PARAM_INT);
        }
        $stmt->execute();
        return $stmt->fetchColumn() > 0;
    }


    public function paging($limit = 5, $offset = 0, $search = '', $class_filter = '', $sort_by = '') {
        $limit = max(1, (int)$limit);
        $offset = max(0, (int)$offset);
        
        $whereClauses = ["s.hoten LIKE :search"];
        if (!empty($class_filter)) {
            $whereClauses[] = "s.malop = :class_filter";
        }
        $whereSql = implode(' AND ', $whereClauses);

        $orderSql = "s.id DESC"; // default
        if ($sort_by === 'mssv_asc') {
            $orderSql = "s.mssv ASC";
        } elseif ($sort_by === 'name_asc') {
            $orderSql = "s.hoten ASC";
        }

        $query = "SELECT s.*, l.tenlop FROM tbl_sinhviens s LEFT JOIN tbl_lophoc l ON s.malop = l.malop WHERE $whereSql ORDER BY $orderSql LIMIT :limit OFFSET :offset";
        $stmt = $this->conn->prepare($query);
        $searchParam = '%' . $search . '%';
        $stmt->bindParam(':search', $searchParam, PDO::PARAM_STR);
        if (!empty($class_filter)) {
            $stmt->bindParam(':class_filter', $class_filter, PDO::PARAM_STR);
        }
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        $countQuery = "SELECT COUNT(*) FROM tbl_sinhviens s WHERE $whereSql";
        $countStmt = $this->conn->prepare($countQuery);
        $countStmt->bindParam(':search', $searchParam, PDO::PARAM_STR);
        if (!empty($class_filter)) {
            $countStmt->bindParam(':class_filter', $class_filter, PDO::PARAM_STR);
        }
        $countStmt->execute();
        $totalrecord = (int)$countStmt->fetchColumn();
        $totalpage = $totalrecord > 0 ? ceil($totalrecord / $limit) : 0;
        
        return [
            'data' => $result,
            'totalrecord' => $totalrecord,
            'totalpage' => $totalpage
        ];
    }

    // ==========================================
    // PHẦN THÊM MỚI CHO CHỨC NĂNG SỬA & XÓA
    // ==========================================

    // 1. Lấy thông tin sinh viên theo mã lớp
    public function getSinhVienByMaLop($malop) {
        $query = "SELECT * FROM tbl_sinhviens WHERE malop = :malop";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':malop', $malop, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // 2. Lấy thông tin 1 sinh viên theo ID để đổ ra form sửa
    public function getSinhVienById($id) {
        $query = "SELECT * FROM tbl_sinhviens WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // 2. Cập nhật dữ liệu vào DB
    public function updateSinhVien($data) {
        $query = "UPDATE tbl_sinhviens SET hoten = :hoten, gioitinh = :gioitinh, mssv = :mssv, malop = :malop WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':hoten', $data['hoten']);
        $stmt->bindParam(':gioitinh', $data['gioitinh']);
        $stmt->bindParam(':mssv', $data['mssv']);
        $stmt->bindParam(':malop', $data['malop']);
        $stmt->bindParam(':id', $data['id'], PDO::PARAM_INT);
        return $stmt->execute();
    }

    // 3. Xóa sinh viên khỏi DB
    public function deleteSinhVien($id) {
        $query = "DELETE FROM tbl_sinhviens WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
?>