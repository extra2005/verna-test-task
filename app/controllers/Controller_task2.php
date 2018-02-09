<?php
class Controller_task2 extends Controller
{
   public function index($name='')
   {
      $f=$this->model('Model_fibonachi');
		if (!empty($_POST)){
				if(intval($_POST['n'])>0)
					$out=$f->calc($_POST['n']);
				else
					$error = true;
		}
		
	  	$this->out=$this->view('View_template.php',array(
		  'content'=>$this->view('View_task2.php',array('value'=>$_POST["n"], 'out'=>$out,'error'=>$error))
		  ));
   }
 
}