<?php
require_once '../app/core/controller.php';
class sinhvien extends Controller {
    public function index() {
        $model = $this->model('sinhvienModel');
        $sinhviens = $model->getAllSinhVien();
        $data['sinhviens'] = $sinhviens;
        $this->view('sinhvien/index', $data);
    }
    public function create() {
        //trả về create
        $this->view('sinhvien/create');
    }
}
?>