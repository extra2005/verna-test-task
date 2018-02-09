<?php
#Настройка маршрутизатора
 
class Route 
{
   protected $controller = "Controller_main"; // По умолчанию
   protected $method = "index";
   protected $params = [];
  
   public function __construct()
   {
      
	  require_once('app/controllers/Controller.php');
	  $url = $this->parseUrl();

 
      if (file_exists('app/controllers/Controller_'.$url[0].'.php'))
      {
         $this->controller='Controller_'.$url[0];
         unset($url[0]);
      }

      require_once('app/controllers/'.$this->controller.'.php');
      $this->controller = new $this->controller;
 
      if (isset($url[1]))
      {
         if (method_exists($this->controller,$url[1]))
         {
            $this->method=$url[1];
            unset($url[1]);
         }
      }
 
      $this->params=$url ? array_values($url) : [];
   }
 
   public function run(){
		call_user_func_array([$this->controller,$this->method],$this->params);
		echo $this->controller->out;
   }
   
   public function parseUrl()
   {
      if (isset($_GET['url']))
      {
        return explode('/',filter_var(rtrim($_GET['url'],'/'),FILTER_SANITIZE_URL));
      }
      return [];
   }
}