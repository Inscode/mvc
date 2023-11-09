<?php 
    class Posts extends Controller{
        public function __construct(){
            $this->postsModel = $this->model('M_Posts');
        }

        public function index(){
            $posts = $this->postsModel->getPosts();
            $data=[
                'posts' => $posts
            ];
            $this->view('posts/v_index', $data);
        }
        public function create(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [
                    'title' => trim($_POST['title']),
                    'body' => trim($_POST['body']),
                    'title_err' => '',
                    'body_err' => ''
                ];

                if(empty($data['title'])){
                    $data['title_err'] = "please enter a title";
                }

                if(empty($data['body'])){
                    $data['body_err'] = "Please enter body content";
                }

                if(empty($data['title_err']) && empty($data['body_err'])){
                    if($this->postsModel->create($data)){
                        flash('post_msg', 'post is published');
                        redirect('Posts/index');
                    }
                    else{
                        die('something went wrong');
                    }
                }

                else{
                    //loading the view with errors
                    $this->view('posts/v_create', $data);
                }

            }

            else{
                $data = [
                    'title'=>'',
                    'body'=>'',
                    'title_err'=>'',
                    'body_err'=>'',
                ];

                $this->view('posts/v_create', $data);
            }
        }

            public function edit($postId){
                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    
                    $data = [
                        'post_id'=>$postId,
                        'title' => trim($_POST['title']),
                        'body' => trim($_POST['body']),
                        'title_err' => '',
                        'body_err' => ''
                    ];
    
                    if(empty($data['title'])){
                        $data['title_err'] = "please enter a title";
                    }
    
                    if(empty($data['body'])){
                        $data['body_err'] = "Please enter body content";
                    }
    
                    if(empty($data['title_err']) && empty($data['body_err'])){
                        if($this->postsModel->edit($data)){
                            flash('post_msg', 'post is edited');
                            redirect('Posts/index');
                        }
                        else{
                            die('something went wrong');
                        }
                    }
    
                    else{
                        //loading the view with errors
                        $this->view('posts/v_edit', $data);
                    }
    
                }
    
                else{
                    $post = $this->postsModel->getPostById($postId);

                    if($post->user_id != $_SESSION['user_id']){
                        redirect('posts/v_index');
                    }
                    $data = [
                        'post_id'=>$postId,
                        'title'=> $post->title,
                        'body'=>$post->body,
                        'title_err'=>'',
                        'body_err'=>'',
                    ];
    
                    $this->view('posts/v_edit', $data);
                }
            }

            public function delete($postId){
                // if($_SERVER['REQUEST_METHOD']=='POST'){
                    $post = $this->postsModel->getPostById($postId);

                    if($post->user_id != $_SESSION['user_id']){
                        redirect('Posts/index');
                    }
                    else{
                        if($this->postsModel->delete($postId)){
                            flash('post_msg','Post is deleted');
                            redirect('Posts/index');
                        }else{
                            die('something went wrong');
                        }
                    }

                
            }
    
    }
?>