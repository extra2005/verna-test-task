<?php
class Controller_task3 extends Controller
{
   public function index()
   {
       $model=$this->model('Model_task3');
	   $date = ($_POST['date'])? $_POST['date']:'2015:01:01';
	   $dateFinish = ($_POST['dateFinish'])?$_POST['dateFinish']:date("Y:m:d");	
	   $table = $model->getReport($date,$dateFinish);	
	  	$this->out=$this->view('View_template.php',array(
		  'content'=>$this->view('View_task3.php',array('table_report'=>$table,'error'=>$error,'date'=>array('date'=>$date,'dateFinish'=>$dateFinish)))
		  ));
   }
       
	public function importTxt($name='')
   {
		$model=$this->model('Model_task3');
   if ($name!="agency.txt" || $name!="billing.txt")
	   	  	$this->out=$this->view('View_template.php',array(
		  'content'=>$this->view('View_task3.php',array('error'=>"Ошибка, указан не верный файл",'msg'=>$return['msg']))
		  ));
		$return=$model->importTxt($name);
	  	$this->out=$this->view('View_template.php',array(
		  'content'=>$this->view('View_task3.php',array('error'=>$return['error'],'msg'=>$return['msg']))
		  ));
   }
       public function edit(){
		       $model=$this->model('Model_task3');
				
				if(!empty($_POST)){
					if ($_POST['type']=='update')
						$return = $model->updateBilling();
					elseif($_POST['type']=='delete')
						$return = $model->deleteBilling();
					else
						$return = $model->setBilling();	

					$table = $model->getEditBilling();
					$this->out = $this->view('View_task3.php',array('table_edit'=>$table,'error'=>$return['error'],'msg'=>$return['msg']));

				}else{
				$table = $model->getEditBilling();
				$this->out=$this->view('View_template.php',array(
				  'content'=>$this->view('View_task3.php',array('table_edit'=>$table,'error'=>$return['error'],'msg'=>$return['msg']))
				  ));
				}
   }
}