<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Тестовое задание</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
	<link href="/css/style.css" rel="stylesheet">
  </head>
<body role="document">
   

    <!-- Fixed navbar -->
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
     <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

          <a href="/" class="navbar-brand">Тестовый проект</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="/">Задача 1</a></li>
            <li><a href="/task2">Задача 2</a></li>
            <li class="dropdown">
            <li><a href="/task3">Задача 3</a></li>
			
        </div>
      </div>
    </div>
   
<div class="container theme-showcase" role="main">


 <p>
      <!-- Main jumbotron for a primary marketing message or call to action -->
      <div id='MainContent'>
        <?=$content?>
	  </div>
</p>



<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel">Добавление новой записи</h4>
          </div>
          <div class="modal-body">
<form id="addModalForm">
	<p>
		<div class="input-group col-md-9">
			<label  class="input-group-addon my-addon">ID агенства:</label>
			<input size="30" type="text" name="agency_id" value="<?=$data['agency_id']?>" class="form-control" />
		</div>
	</p><p>
		<div class="input-group col-md-9">
			<label  class="input-group-addon my-addon">ID пользователя:</label>
			<input size="30" type="text" name="user_id" value="<?=$data['user_id'];?>" class="form-control" />
		</div>
	</p><p>
		<div class="input-group col-md-9">
			<label  class="input-group-addon my-addon">Дата взноса:</label>
			<input size="30" type="text" name="date" value="<?=$data['date']?>" class="form-control" id="datetimepicker3" />
		</div>
	</p><p>
		<div class="input-group col-md-9">
			<label  class="input-group-addon my-addon">Сумма взноса:</label>
			<input size="30" type="text" name="amount" value="<?=$data['amount']?>" class="form-control" />
		</div>
</div>

	
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>
            <button id="addModalFormSubmit" type="button" class="btn btn-primary" type="submit">Добавить запись</button>
          </div>
	</form>
	</div>
	</form>
      </div>
    </div>
	
<div class="modal fade" id="editLineModal" tabindex="-1" role="dialog" aria-labelledby="editLineModal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel">Редактирование записи</h4>
          </div>
          <div class="modal-body">
<form id="editLineModalForm">
	<p>
		<div class="input-group col-md-9">
			<label  class="input-group-addon my-addon">ID агенства:</label>
			<input size="30" type="text" name="agency_id" value="<?=$data['agency_id']?>" class="form-control" />
		</div>
	</p><p>
		<div class="input-group col-md-9">
			<label  class="input-group-addon my-addon">ID пользователя:</label>
			<input size="30" type="text" name="user_id" value="<?=$data['user_id'];?>" class="form-control" />
		</div>
	</p><p>
		<div class="input-group col-md-9">
			<label  class="input-group-addon my-addon">Дата взноса:</label>
			<input size="30" type="text" name="date" value="<?=$data['date']?>" class="form-control" id="datetimepicker4" />
		</div>
	</p><p>
		<div class="input-group col-md-9">
			<label  class="input-group-addon my-addon">Сумма взноса:</label>
			<input size="30" type="text" name="amount" value="<?=$data['amount']?>" class="form-control" />
		</div>
</div>
		<input size="30" type="hidden" name="type" value="update" class="form-control" />
		<input size="30" type="hidden" name="id" value="<?=$data['id']?>" class="form-control" />
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>
            <button id="editLineModalFormSubmit" type="button" class="btn btn-primary" type="submit">Сохранить</button>
          </div>
	</form>
	</div>
	</form>
      </div>
    </div>	
	
	
    <script src="/js/jquery.js"></script>
    <script src="/js/bootstrap.min.js"></script>
	<script src="/js/bootstrap-datepicker.js"></script>
	<script src="/js/script.js"></script>
	
  </body>
</html>