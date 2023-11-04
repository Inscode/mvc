<?php 
    //url format -> controller/methods/param1/param2/....
    class Core{
        protected $currentController = "Pages";
        protected $currentMethod = "index";
        protected $params = [];

        public function __construct(){
            //print_r($this->getURL()); -> printing the url as associated array 

            $url = $this->getURL();

            //checking is the url controller part contains the controllers inside the controllers folder

            if(file_exists('../app/controllers/'.ucwords($url[0]).'.php')){
                //storing the controller
                $this->currentController = ucwords($url[0]);

                //unset the controller from it
                unset($url[0]);

                //call the controller

                require_once '../app/controllers/'.$this->currentController.'.php';

                //Instantiate the controller

                $this->currentController = new $this->currentController;


            }

            if(isset($url[1])){
                if(method_exists($this->currentController, $url[1])){
                    $this->currentMethod = $url[1];

                    unset($url[1]);
                }
            }

            $this->params = $url ? array_values($url) : [];

            call_user_func_array([$this->currentController, $this->currentMethod], $this->params);

            

        }

        public function getURL(){
            //breaking the url and getting it into pieces in a associated array
            if(isset($_GET["url"])){
                $url = rtrim($_GET['url'], '/');
                $url = filter_var($url, FILTER_SANITIZE_URL);
                $url = explode('/', $url);

                return $url;
            }
        }

       


    }
?>