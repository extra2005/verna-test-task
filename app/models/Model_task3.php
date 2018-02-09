<?
class Model_task3
{
	public $db;
	private $conf;
 	function __construct (){
			require_once ('app/config.php');
			$this->conf = $conf;
			try {
			$this->db = new PDO("mysql:host=".$conf['db_host'].";port=".$conf['db_port'].";dbname=".$conf['db_name'],$conf['db_user'],$conf['db_password']); 
			$this->db->exec("SET CHARACTER SET utf8");      // Sets encoding UTF-8
			} catch (PDOException $e) {
				echo 'Подключение к базе данных '.$conf['db_name'].' не удалось: ' . $e->getMessage();
				exit;
			}
	}
	
	public function conn(){
			try {
			$conn = new PDO("mysql:host=".$this->conf['db_host'].";port=".$this->conf['db_port'].";dbname=".$this->conf['db_name'],$this->conf['db_user'],$this->conf['db_password']); 
			$conn->exec("SET CHARACTER SET utf8");      // Sets encoding UTF-8
			} catch (PDOException $e) {
				echo 'Подключение к базе данных '.$conf['db_name'].' не удалось: ' . $e->getMessage();
				exit;
			}
			return $conn;
		
	}
	
	public function getReport($date,$dateFinish){
		$conn = $this->conn();
		$sql = "SELECT a.agency_network_id, a.agency_name, b.agency_id, SUM( b.amount ) FROM billing b INNER JOIN agency a ON a.agency_id = b.agency_id WHERE b.date BETWEEN ".$conn->quote($date)." AND  ".$conn->quote($dateFinish)." GROUP BY agency_id";
			
		$return = $conn->query($sql);
		return $return;

	}
	
	public function setBilling(){
		
		$agency_id = intval(trim($_POST['agency_id']));
		$user_id = intval(trim($_POST['user_id']));
		$date = trim($_POST['date']);
		$amount = intval(trim($_POST['amount']));
		
		$conn = $this->conn();
		$sql = 'INSERT INTO `billing` (agency_id, user_id, date, amount) VALUES ('.$conn->quote($agency_id).', '.$conn->quote($user_id).', '.$conn->quote($date).', '.$conn->quote($amount).' )';
	
			if ($conn->query($sql) !== false)
				return array('msg'=>'Запись была добавленна успешно');
			else 
				return array('error'=>'Ошибка добавления записи в MySQL');
		
	}	
	
		public function updateBilling(){
		$id = intval(trim($_POST['id']));
		$agency_id = intval(trim($_POST['agency_id']));
		$user_id = intval(trim($_POST['user_id']));
		$date = trim($_POST['date']);
		$amount = intval(trim($_POST['amount']));
		
		$conn = $this->conn();
		$sql = 'UPDATE billing SET  agency_id = '.$conn->quote($agency_id).', user_id = '.$conn->quote($user_id).', date = '.$conn->quote($date).', amount = '.$conn->quote($amount).' WHERE id = '.$conn->quote($id).'';
		
			if ($conn->query($sql) !== false)
				return array('msg'=>'Запись обновлена успешно');
			else 
				return array('error'=>'Ошибка обновления записи в MySQL');
		
	}	
	
		public function deleteBilling(){
		
		$id = intval(trim($_POST['id']));

		
		$conn = $this->conn();
		$sql = 'DELETE FROM billing WHERE id = '.$conn->quote($id).'';
		
			if ($conn->query($sql) !== false)
				return array('msg'=>'Запись удалена успешно');
			else 
				return array('error'=>'Ошибка удаления записи в MySQL');
		
	}	
	public function  getEditBilling(){

		$conn = $this->conn();
		$sql = "SELECT * FROM billing";
		$return = $conn->query($sql);
		return $return;	
	}
	
	public function importTxt($file){
		if(file_exists($file))
			$content = file_get_contents($file);
		else
			return array('error'=>'не найден файл '.$file.' в корне сайта');
		$string =  explode("\n", $content);
		$countString = count($string);
		
		if($countString==0)
			return array('error'=>'в файле '.$file.' 0 записей');
		
		$insertValues = '';
		for ($i=0;$i<$countString;$i++){
			if($i==0){
				//Наименования полей
				$filds = explode("\t", $string[$i]);
				$insertFilds="(";
				for ($j=0;$j<count($filds);$j++){
					$insertFilds.="`".trim($filds[$j])."`,";
				}
				$insertFilds=substr_replace($insertFilds,")",-1);

			}else{
				//Значение полей
				$values = explode("\t", $string[$i]);
				$insertValues.="(";
				for ($j=0;$j<count($values);$j++){
					$insertValues.="'".$values[$j]."',";
				}
				$insertValues=substr_replace($insertValues,"),",-1);
			}	
		}

	$conn = $this->conn();
	$table = str_replace(array(".txt",".TXT"),"",$file);
	$sql = 'INSERT INTO `'.$table.'` '.$insertFilds.' VALUES '.substr_replace($insertValues,";",-1);

	
if ($conn->query($sql) !== false) {
    return array('msg'=>'Импорт файла '.$file.' выполнен успешно');
} else {
    return array('error'=>'Ошибка импорта данных из '.$file.' в MySQL');
}

	}
}