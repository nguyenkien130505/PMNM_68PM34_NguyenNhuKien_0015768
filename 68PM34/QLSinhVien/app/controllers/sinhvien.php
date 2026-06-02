<?php
require_once '../app/core/controller.php';
class sinhvien extends Controller {
    public function index() {
        $model = $this->model('sinhvienModel');
        $sinhviens = $model->getAllSinhVien();
        $data['sinhviens'] = $sinhviens;
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
}
?> 