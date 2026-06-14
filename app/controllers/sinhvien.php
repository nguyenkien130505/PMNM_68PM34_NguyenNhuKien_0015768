<?php
require_once '../app/core/controller.php';

class sinhvien extends Controller {
    
    public function index() {
        $limit = (int)($_GET['limit'] ?? 5);
        $offset = (int)($_GET['offset'] ?? 0);
        $search = trim($_GET['search'] ?? '');
        $class_filter = trim($_GET['class_filter'] ?? '');
        $sort_by = trim($_GET['sort_by'] ?? '');
        
        $model = $this->model('sinhvienModel');
        $result = $model->paging($limit, $offset, $search, $class_filter, $sort_by);
        
        $lophocModel = $this->model('lophocModel');
        $data['lophocs'] = $lophocModel->getAllLopHoc();

        $data['sinhviens'] = $result['data'];
        $data['totalpage'] = $result['totalpage'];
        $data['totalrecord'] = $result['totalrecord'];
        $data['currentpage'] = ($offset / $limit) + 1;
        $data['limit'] = $limit;
        $data['offset'] = $offset;
        $data['search'] = $search;
        $data['class_filter'] = $class_filter;
        $data['sort_by'] = $sort_by;
        
        $data['contentview'] = 'sinhvien/index';
        $this->view('layout/masterlayout', $data);
    }

    public function create() {
        $lophocModel = $this->model('lophocModel');
        $data['lophocs'] = $lophocModel->getAllLopHoc();
        $data['contentview'] = 'sinhvien/create';
        $this->view('layout/masterlayout', $data);
    }

    public function store() {
        $model = $this->model('sinhvienModel');
        $mssv = trim($_POST['mssv'] ?? '');
        
        if ($model->checkMssvExists($mssv)) {
            $lophocModel = $this->model('lophocModel');
            $data['lophocs'] = $lophocModel->getAllLopHoc();
            $data['contentview'] = 'sinhvien/create';
            $data['error'] = "Mã số sinh viên '{$mssv}' đã tồn tại trong hệ thống!";
            // Retain old values
            $data['old_data'] = $_POST;
            $this->view('layout/masterlayout', $data);
            return;
        }
        
        if ($model->create()) {
            header("Location: " . BASE_URL . "sinhvien/index");
            exit();
        } else {
            echo "Lỗi khi tạo sinh viên.";
        }
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
            $lophocModel = $this->model('lophocModel');
            $data['lophocs'] = $lophocModel->getAllLopHoc();
            $data['contentview'] = 'sinhvien/edit'; 
            
            $this->view('layout/masterlayout', $data);
        } else {
            header("Location: " . BASE_URL . "sinhvien/index");
            exit();
        }
    }

    // 2. Hàm xử lý lưu dữ liệu Sửa (Update)
    public function update() {
        if (isset($_POST['id'])) {
            $model = $this->model('sinhvienModel');
            $id = (int)$_POST['id'];
            $mssv = trim($_POST['mssv'] ?? '');
            
            if ($model->checkMssvExists($mssv, $id)) {
                $lophocModel = $this->model('lophocModel');
                $data['lophocs'] = $lophocModel->getAllLopHoc();
                $data['contentview'] = 'sinhvien/edit';
                $data['error'] = "Mã số sinh viên '{$mssv}' đã tồn tại trong hệ thống!";
                // Fake existing object format for the view
                $data['sinhvien'] = [
                    'id' => $id,
                    'hoten' => $_POST['hoten'] ?? '',
                    'gioitinh' => $_POST['gioitinh'] ?? '',
                    'mssv' => $mssv,
                    'malop' => $_POST['malop'] ?? ''
                ];
                $this->view('layout/masterlayout', $data);
                return;
            }

            if ($model->updateSinhVien($_POST)) {
                header("Location: " . BASE_URL . "sinhvien/index");
                exit();
            } else {
                echo "Lỗi khi cập nhật sinh viên.";
            }
        }
    }

    // 3. Hàm xử lý Xóa (Delete)
    public function delete() {
        if (isset($_GET['id'])) {
            $id = (int)$_GET['id'];
            $model = $this->model('sinhvienModel');
            $model->deleteSinhVien($id);
        }
        // Xóa xong tự động quay về trang danh sách
        header("Location: " . BASE_URL . "sinhvien/index");
        exit();
    }
}
?>
