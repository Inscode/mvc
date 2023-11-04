<?php 
    class Pages extends Controller{
        public function __construct(){
            //echo 'this is pages controller';
            $this->pagesModel = $this->model('M_pages');
        }

        public function index(){
            $data = [];
            $this->view('pages/v_index', $data);
        }

        public function about(){
            $users = $this->pagesModel->getUsers();
            $data = [
                'users'=>$users
        ];
            $this->view('v_about', $data);

        }

     
    }
?>