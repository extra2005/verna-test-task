<?php
class Controller
{
  public static $out =''; 
   public function model($model)
   {
     require_once('app/models/'.$model.'.php');
     return new $model();
   }
    
  		/**
		 * Мини шаблонизатор
		 *
		 * @param $tpl - путь до файла шаблона
		 * @param $data - ассоциативный массив значений переданных в шаблон
		 * @return - результат работы шаблона
		 */ 
   public function view($tpl,$data=[])
   {

		  extract($data,EXTR_SKIP);
		  ob_start();
		  include('app/views/'.$tpl);
		  return ob_get_clean();
	}    	
	

}