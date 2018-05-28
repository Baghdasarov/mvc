<?php
/* 
* App Core Class  / Creates URL / Load controller
* URL format - /controller/method/params 
*/

class Core {

  protected $currentController = 'Pages';
  protected $currentMethod = 'index';
  protected $params = [];

  public function __construct() {
    $url = $this->getUrl();
    //Look for controller
    if (file_exists('../app/controllers/' . ucwords($url[0]) . '.php')) {
      $this->currentController = ucwords($url[0]);
      unset($url[0]);
    }
    require_once('../app/controllers/' . $this->currentController . '.php');
    $this->currentController = new $this->currentController;
    //Look for method
    if (isset($url[1])) {
      if (method_exists($this->currentController, $url[1])) {
        $this->currentMethod = $url[1];
        unset($url[1]);
      }
    }
    //Look for params
    $this->params = $url ? array_values($url) : [] ;
    //Call a callback 
    call_user_func_array([$this->currentController, $this->currentMethod ], $this->params);
  }

  public function getUrl() {
    if (isset($_GET['url'])) {
      $url = rtrim($_GET['url'], '/');
      $url = filter_var($url, FILTER_SANITIZE_URL);
      $url = explode('/', $url);
      return $url;
    }
  }
  
}
  