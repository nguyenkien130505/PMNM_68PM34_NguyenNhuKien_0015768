<?php
require_once '../app/core/controller.php';

class sinhvien extends Controller {
    
    public function index() {
        $limit = (int)($_GET['limit'] ?? 5);
        $offset = (int)($_GET['offset'] ?? 0);
        $search = trim($_GET['search'] ?? '');
        
        $model = $this->model('sinhvienModel');
        $result = $model->paging($limit, $offset, $search);
        
        $data['sinhviens'] = $result['data'];
        $data['totalpage'] = $result['totalpage'];
        $data['totalrecord'] = $result['totalrecord'];
        $data['currentpage'] = ($offset / $limit) + 1;
        $data['limit'] = $limit;
        $data['search'] = $search;
        
        $data['contentview'] = 'sinhvien/index';
        $this->view('layout/masterlayout', $data);
    }

    public function create() {
        $data['contentview'] = 'sinhvien/create';
        $this->view('layout/masterlayout', $data);
    }

    public function store() {
        $model = $this->model('sinhvienModel');
        $model->store();
    }

    public function paging() {
        $limit = $_GET['limit'] ?? 5;
        $offset = $_GET['offset'] ?? 0;
        $search = $_GET['search'] ?? '';
        $model = $this->model('sinhvienModel');
        $result = $model->paging($limit, $offset, $search);
        header('Content-Type: application/json');
        echo json_encode($result);
    }

    // ==========================================
    // PHẦN THÊM MỚI CHO CHỨC NĂNG SỬA & XÓA
    // ==========================================

    // 1. Hàm hiển thị form Sửa (Edit)
    public function edit() {
        if (isset($_GET['id'])) {
            $id = (int)$_GET['id'];
            $model = $this->model('sinhvienModel');
            
            // Lấy dữ liệu sinh viên cũ truyền sang View
            $data['sinhvien'] = $model->getSinhVienById($id); 
            $data['contentview'] = 'sinhvien/edit'; 
            
            $this->view('layout/masterlayout', $data);
        } else {
            header("Location: /sinhvien/index");
            exit();
        }
    }

}
?>