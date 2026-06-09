<?php
require_once '../app/core/controller.php';

class home extends Controller
{
    public function index()
    {
        $data['contentview'] = 'home/index';
        $this->view('layout/masterlayout', $data);
    }
    public function login()
    {
        require_once '../app/views/home/login.php';
    }
}
?>
