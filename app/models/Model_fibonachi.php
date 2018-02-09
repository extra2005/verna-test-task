<?
class Model_fibonachi
{
 	public function calc($n, $pre = 1, $pre_pre = 0){
		if ($n == 1) return 0;
		if ($n < 1) return false;
		if ($n == 2) // начинали с 3го, поэтому выходим, когда осталось посчитать два.
			return $pre;
		
		return $this->calc($n - 1, $pre + $pre_pre, $pre);
	}
}