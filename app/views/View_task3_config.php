<div class="page-header"><h1>Настройки</h1></div> 
<form method="post" action="/task2/config" >
<strong>Параметры базы данных</strong>
	<p>
	<div class="row myrow">
		<div class="input-group col-md-9">
			<label  class="input-group-addon my-addon">MySQL cервер:</label>
			<input size="30" type="text" name="db_host" value="<?=$data['db_host']?>" class="form-control" />
		</div>
	</div>
	</p><p>
	<div class="row myrow">
		<div class="input-group col-md-9">
			<label  class="input-group-addon my-addon">MySQL порт:</label>
			<input size="30" type="text" name="db_port" value="<?=$data['db_port'];?>" class="form-control" />
		</div>
	</div>
	</p><p>
		<div class="row myrow">
		<div class="input-group col-md-9">
			<label  class="input-group-addon my-addon">Логин для базы данных::</label>
			<input size="30" type="text" name="db_user" value="<?=$data['db_user']?>" class="form-control" />
		</div>
	</div>
	</p><p>
		<div class="row myrow">
		<div class="input-group col-md-9">
			<label  class="input-group-addon my-addon">Пароль для базы данных:</label>
			<input size="30" type="text" name="db_password" value="<?=$data['db_password']?>" class="form-control" />
		</div>
	</div>
	</p><p>
		<div class="row myrow">
		<div class="input-group col-md-9">
			<label  class="input-group-addon my-addon">База данных MySQL:</label>
			<input size="30" type="text" name="db_name" value="<?=$data['db_name']?>" class="form-control" />
		</div>
	</div>
	</p><p>
<strong>Отчет</strong>
	<div class="row myrow">
		<div class="input-group col-md-9">
			<label  class="input-group-addon my-addon">Месяцев по умолчанию:</label>
			<input size="30" type="text" name="repot_m" value="<?=$data['repot_m']?>" class="form-control" />
		</div>
	</div>
	</p><p>
	</p><p>
	<div class="row text-center">
	
		<button class="btn btn-primary" type="submit">Сохранить настройки</button>

	</div>
	</form>
