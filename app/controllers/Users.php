<?php
    class Users extends Controller{
        public function __construct(){
            $this->userModel = $this->model('M_Users');

        }

        public function register(){
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                //FORM IS SUBMITTING
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                //INPUT DATA
                $data = [
                    'name' => trim($_POST['name']),
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                    'confirm_password' => trim($_POST['confirm_password']),


                    'name_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => ''
                ];

                //VALIDATE EACH INPUTS
                //VALIDATE NAME

                if(empty($data['name'])){
                    $data['name_err'] = 'please enter a name';
                }

                //VALIDATE EMAIL AND CHECK DUPLICATE

                if(empty($data['email'])){
                    $data['email_err'] = 'please enter a email';
                }
                else{   
                    //CHECK EMAIL REGISTERED OR NOT
                    if($this->userModel->findUserByEmail($data['email'])){
                        $data['email_err'] = "Email is already registered";
                    }
                }

                if(empty($data['password'])){
                    $data['password_err'] = "please enter a password";
                }
                if($data['password']!= $data['confirm_password']){
                    $data['confirm_password_err'] = "passwords are not matching";
                }

                if(empty($data['name_err']) && empty($data['email_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])){
                    //HASH PASSWORD
                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                    if($this->userModel->register($data)){
                        //create a flash message
                        flash('reg_flash', 'You are successfully registered!');
                        redirect('Users/login');
                    }
                    else{
                        die('something went wrong');
                    }

                }
                else{
                    //load view
                    $this->view('users/v_register', $data);
                }
            }

            else {
                $data = [
                    'name' => '',
                    'email' => '',
                    'password' => '',
                    'confirm_password' => '',

                    'name_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => '',
                ];

                $this->view('users/v_register', $data);

            }
        }

        public function login(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                //form is submitting
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),

                    'email_err' => '',
                    'password_err' => ''
                ];

                //validate email

                if(empty($data['email'])){
                    $data['email_err'] = "please enter the email";
                }
                else{
                    if($this->userModel->findUserByEmail($data['email'])){
                        //user is found
                    }
                    else{
                        $data['email_err'] = "user not found";
                    }
                }

                if(empty($data['password'])){
                    $data['password_err'] = "please enter the password";
                }

                if(empty($data['email_err']) && empty($data['password_err'])){
                    //log the user
                    $loggedUser = $this->userModel->login($data['email'], $data['password']);

                    if($loggedUser){
                        //user is authenticated
                        //create user sesssions
                        $this->createUserSession($loggedUser);
                    }else{
                        $data['password_err'] = "the password entered is incorrect";

                        //load the view with the errors
                        $this->view('users/v_login', $data);
                    }

                }else{
                    //load view with errors
                    $this->view('users/v_login', $data);
                }

            }
            else
            {
                $data = [
                    'email' => '',
                    'password' => '',

                    'email_err' => '',
                    'password_err' => ''
                ];

                $this->view('users/v_login', $data);
            }

            
        }

        public function createUserSession($user){
            $_SESSION['user_id'] = $user->id;
            $_SESSION['user_email']=$user->email;
            $_SESSION['user_name']=$user->name;

            redirect('Pages/index');
        }

        public function logout(){
            unset($_SESSION['user_id']);
            unset($_SESSION['user_email']);
            unset($_SESSION['user_name']);
            session_destroy();

            redirect('Users/login');
        }

        public function isLoggedIn(){

            if(isset($_SESSION['user_id'])){
                return true;
            }else{
                return false;
            }
        }
    }
?>