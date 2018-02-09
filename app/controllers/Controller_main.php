<?php
class Controller_main extends Controller
{
   public function index($name='')
   {
      
	  	$this->out=$this->view('View_template.php',array(
		  'content'=>$this->view('View_main.php',array())
		  ));
   }
 
   public function test()
   {
     echo 'test method by main Controller';
   }
}