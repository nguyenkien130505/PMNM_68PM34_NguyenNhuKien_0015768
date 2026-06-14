<?php
require_once '../app/core/controller.php';

class lophoc extends Controller {
    
    public function index() {
        $limit = (int)($_GET['limit'] ?? 5);
        $offset = (int)($_GET['offset'] ?? 0);
        $search = trim($_GET['search'] ?? '');
        
        $model = $this->model('lophocModel');
        $result = $model->paging($limit, $offset, $search);
        
        $data['lophocs'] = $result['data'];
        $data['totalpage'] = $result['totalpage'];
        $data['totalrecord'] = $result['totalrecord'];
        $data['currentpage'] = ($offset / $limit) + 1;
        $data['limit'] = $limit;
        $data['offset'] = $offset;
        $data['search'] = $search;
        
        $data['contentview'] = 'lophoc/index';
        $this->view('layout/masterlayout', $data);
    }

    public function danhsach() {
        if (isset($_GET['malop'])) {
            $malop = trim($_GET['malop']);
            $sinhvienModel = $this->model('sinhvienModel');
            $data['sinhviens'] = $sinhvienModel->getSinhVienByMaLop($malop);
            $data['malop'] = $malop;
            $data['contentview'] = 'lophoc/danhsach';
            $this->view('layout/masterlayout', $data);
        } else {
            header("Location: " . BASE_URL . "lophoc/index");
            exit();
        }
    }

    public function create() {
        $data['contentview'] = 'lophoc/create';
        $this->view('layout/masterlayout', $data);
    }

    public function store() {
        $model = $this->model('lophocModel');
        $malop = trim($_POST['malop'] ?? '');
        
        if ($model->checkMalopExists($malop)) {
            $data['contentview'] = 'lophoc/create';
            $data['error'] = "Mã lớp '{$malop}' đã tồn tại trong hệ thống!";
            // Retain old values
            $data['old_data'] = $_POST;
            $this->view('layout/masterlayout', $data);
            return;
        }

        if ($model->create()) {
            header("Location: " . BASE_URL . "lophoc/index");
            exit();
        } else {
            echo "Lỗi khi tạo lớp học.";
        }
    }

    public function paging() {
        $limit = $_GET['limit'] ?? 5;
        $offset = $_GET['offset'] ?? 0;
        $search = $_GET['search'] ?? '';
        $model = $this->model('lophocModel');
        $result = $model->paging($limit, $offset, $search);
        header('Content-Type: application/json');
        echo json_encode($result);
    }

    public function edit() {
        if (isset($_GET['id'])) {
            $id = (int)$_GET['id'];
            $model = $this->model('lophocModel');
            
            $data['lophoc'] = $model->getLopHocById($id); 
            $data['contentview'] = 'lophoc/edit'; 
            
            $this->view('layout/masterlayout', $data);
        } else {
            header("Location: " . BASE_URL . "lophoc/index");
            exit();
        }
    }

    public function update() {
        if (isset($_POST['id'])) {
            $model = $this->model('lophocModel');
            $id = (int)$_POST['id'];
            $malop = trim($_POST['malop'] ?? '');
            
            if ($model->checkMalopExists($malop, $id)) {
                $data['contentview'] = 'lophoc/edit';
                $data['error'] = "Mã lớp '{$malop}' đã tồn tại trong hệ thống!";
                // Fake existing object format for the view
                $data['lophoc'] = [
                    'id' => $id,
                    'malop' => $malop,
                    'tenlop' => $_POST['tenlop'] ?? '',
                    'ghichu' => $_POST['ghichu'] ?? ''
                ];
                $this->view('layout/masterlayout', $data);
                return;
            }

            if ($model->updateLopHoc($_POST)) {
                header("Location: " . BASE_URL . "lophoc/index");
                exit();
            } else {
                echo "Lỗi khi cập nhật lớp học.";
            }
        }
    }

    public function delete() {
        if (isset($_GET['id'])) {
            $id = (int)$_GET['id'];
            $model = $this->model('lophocModel');
            
            $lophoc = $model->getLopHocById($id);
            if ($lophoc) {
                $sinhvienModel = $this->model('sinhvienModel');
                $students = $sinhvienModel->getSinhVienByMaLop($lophoc['malop']);
                
                if (count($students) > 0) {
                    // Cannot delete because there are students in this class
                    header("Location: " . BASE_URL . "lophoc/index?error=has_students");
                    exit();
                }
                
                $model->deleteLopHoc($id);
            }
        }
        header("Location: " . BASE_URL . "lophoc/index");
        exit();
    }
}
?>
