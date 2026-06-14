<?php
class Controller {
    public function model($model){
        require_once '../app/models/' . $model . '.php';
        return new $model();
    }
 public function view($view, $data = []) {
        // Convert view name to file path
        // e.g., 'sinhvien/index' becomes 'app/views/sinhvien/index.php'
        $viewFile = '../app/views/' . $view . '.php';
        if (file_exists($viewFile)) {
            // Extract array as variables for the view
            $data['viewname'] = $view;
            extract($data);
            require_once($viewFile);
        } else {
            echo "View file not found: " . $viewFile;
        }
    }}

