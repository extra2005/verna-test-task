		<a href="/task3" class="btn btn-primary">Cводный отчет</a>
		<a href="/task3/edit" class="btn btn-primary">Редактор</a>
		
		<a href="/task3/importTxt/agency.txt" class="btn btn-primary">Импорт данных из agency.txt</a>
		<a href="/task3/importTxt/billing.txt" class="btn btn-primary">Импорт данных из biling.txt</a>
<p></p>
<?if($data['error']!=''){?>
	<div id='msg_task2' class='alert alert-danger'><strong><?=$data['error']?></strong></div>
<?}?>
<?if($data['msg']!=''){?>
	<div id='msg_task2' class='alert alert-info'><strong><?=$data['msg']?></strong></div>
<?}?>
<?=$out?>

<? if(count($table_report)>0) {?>
<div class="page-header"><h1>Сводный отчет</h1></div>
<form method="post" action="/task3" >
<div class="form-group row myrow">

  <div class="col-xs-3">

	  <label>Период </label>
 	<label for="ex4">&nbsp;</label><br>
<div class="form-group">
    <div class="input-group">
        <input type="text" class="form-control" name='date' id="datetimepicker1" value="<?=$date['date']?>"/>
            <span class="input-group-addon">
                <i class="glyphicon glyphicon-calendar"></i>
            </span>
        </div>
</div> 
  
  
  </div>

  <div class="col-xs-3">
 	<label for="ex4">&nbsp;</label><br>
<div class="form-group">
    <div class="input-group">
        <input type="text" class="form-control" name='dateFinish' id="datetimepicker2" value="<?=$date['dateFinish']?>"/>
            <span class="input-group-addon">
                <i class="glyphicon glyphicon-calendar"></i>
            </span>
        </div> 
</div> 

  </div>
    <div class="col-xs-2"> 
	<label for="ex4">&nbsp;</label>
<button type="submit" id="search_docs_btn" class="btn btn-info form-control">Выбрать</button>
  </div>
</div>
</form>
		<div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>ID сети</th>
                  <th>Наименование агентства</th>
                  <th>Сумма по агенству</th>
                </tr>
              </thead>
              <tbody>
<? foreach ($table_report as $row) {?>
        <tr>
		<td><?=$row['agency_network_id']?></td>
		<td><?=$row['agency_name']?></td>
		<td><?=$row['SUM( b.amount )']?></td>
		</tr>
<?$total +=$row['SUM( b.amount )']; }?>
		<td></td>
		<td><strong>Итого:</strong></td>
		<td><?=$total?></td>
	
                </tr>
              </tbody>
            </table>

          </div>
		  <?}?>

<? if(count($table_edit)>0) {?>
<div class="page-header"><h1>Редактор биллинга
  <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#addModal"> <span class="glyphicon glyphicon-plus"></span> Добавить запись</a>
 </h1></div>
    <table class="table table-striped">
              <thead>
                <tr>
                  <th>ID агенства</th>
                  <th>ID пользователя</th>
                  <th>Дата взноса</th>
			   <th>Сумма по пользователю</th>
			   <th>Редактирование</th>
                </tr>
              </thead>
              <tbody>
<? foreach ($table_edit as $row) {?>
        <tr>
		<td><?=$row['agency_id']?></td>
		<td><?=$row['user_id']?></td>
		<td><?=$row['date']?></td>
		<td><?=$row['amount']?></td>
		<td>
		
		<button type="button" id = "editLine" class="btn btn-default btn-lg" data-toggle="modal" data-target="#editLineModal" data-id="<?=$row['id']?>" data-agency_id="<?=$row['agency_id']?>" data-user_id="<?=$row['user_id']?>" data-date="<?=$row['date']?>" data-amount="<?=$row['amount']?>"><span class="glyphicon glyphicon-pencil"></span></button>
		<button type="button" class="btn btn-default btn-lg" onclick="deleteLine(<?=$row['id']?>);"><span class="glyphicon glyphicon-trash" data-agency_id="<?=$row['id']?>" ></span></button>	
		</td>
		</tr>
		 <?}?>
              </tbody>
            </table>
			
			

    </div>

<?}?>
