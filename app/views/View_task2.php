<p>
<form method="post" action="/task2" >

<strong>N-ое значение</strong>
<div class="row form-group">
	  <div class="col-md-2">
			  <input type="text" name="n"  class="form-control" value="<? echo $data['value'];?>">
	  </div>
 <div class="col-md-3">		
		<button class="btn btn-primary" type="submit">Определить</button>
		</div>
	</div>
</form>
</p>
<?if($data['error']){	?>
<div id='msg_task2' class='alert alert-danger'><strong>Введите в поле число больше 0</strong></div>
<?}
if(intval($data['value'])>0){?>
<div id='msg_task2' class='alert alert-success'><strong><? echo $data['value'];?>-ое число ряда Фибоначчи равно <? echo $data['out'];?></strong></div>
<?}?> 