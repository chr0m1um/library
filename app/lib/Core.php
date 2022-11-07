<?php 

class Core 
{
    // construction of the url entered in the browser
    protected $controller = 'account';
    protected $method = 'index';
    protected $params = [];
    
    //url constructor
    public function __construct() 
    {
        $url = $this->getUrl();
        if(isset($url)) {
            // searching in controllers if controller exists
            if(file_exists('../app/controllers/' . ucwords($url[0]) . '.php')) {
                $this->controller = ucwords($url[0]);
                unset($url[0]);
            }
        }  

        require_once '../app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;
        
        // checking method - the second part of the url
        if(isset($url[1])) {
            if(method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }
        // get the parameters
        $this->params = $url ? array_values($url) : [];
        // call a callback with the array of parameters
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    // get url with all filter parameters
    public function getUrl() 
    {
        if(isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }
}

?>