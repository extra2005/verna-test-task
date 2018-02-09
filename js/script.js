$(document).ready(function(){
var click_coutn = 1; //сюда записываем количество кликов по кнопке
 
 
 $("#msg_task1").click(function() {
	$( "#msg_task1" ).fadeOut( "slow", function() {
		location.reload();
	});
});


$("#task_1_button").click(function() { 
   if(click_coutn==1)
	   tdcolor();
   else if(click_coutn>1 && click_coutn<=5){
        //добавляем новую строку
		$('#table_task_color').append("<tr id='tr"+click_coutn+"'><td id='a1'>*</td><td id='a2'>*</td><td id='a3'>*</td><td id='a4'>*</td><td id='a5'>*</td></tr>");
		tdcolor();  
   } 
	else
		$("#msg_task1").show();	 

	click_coutn++;
});

function tdcolor() { 
		//подкрашиваем ячейку, меняем содержимое
		$("#table_task_color #tr"+click_coutn+" #a"+click_coutn).css('background', 'red');
	    $("#table_task_color #tr"+click_coutn+" #a"+click_coutn).text('+');   
}


	
jQuery.datetimepicker.setLocale('ru');
 $("#datetimepicker1").datetimepicker({format:'Y:m:d',timepicker:false,startDate:new Date()});
 $("#datetimepicker2").datetimepicker({format:'Y:m:d',timepicker:false});
 $("#datetimepicker3").datetimepicker({format:'Y:m:d',timepicker:false});
  $("#datetimepicker4").datetimepicker({format:'Y:m:d',timepicker:false});


$(function(){
    $('#addModalFormSubmit').on('click', function(e){
        $('#addModal').modal('hide');
		e.preventDefault();
        $.ajax({
            url: '/task3/edit', //this is the submit URL
            type: 'POST', //or POST
			dataType : 'html',
            data: $('#addModalForm').serialize(),
            success: function(data){
				$('#MainContent').empty();
				$("#MainContent").append(data);
            },
			error: function (data) {
            },
        });
    });
	
});

$(function(){
$('#editLineModal').on('show.bs.modal', function (event) {
  // получить кнопку, которая его открыла
  var button = $(event.relatedTarget) 
  
	$(this).find("input[name='agency_id']").val(button.data('agency_id'));
	$(this).find("input[name='user_id']").val(button.data('user_id'));
	$(this).find("input[name='date']").val(button.data('date'));
	$(this).find("input[name='amount']").val(button.data('amount'));
	$(this).find("input[name='id']").val(button.data('id'));
})
});

$(function(){
    var url = window.location;
        $('ul.nav a[href="'+ url +'"]').parent().addClass('active');
        $('ul.nav a').filter(function() {
             return this.href == url;
        }).parent().addClass('active');
});

$(function(){
    $('#editLineModalFormSubmit').on('click', function(e){
        $('#editLineModal').modal('hide');
		e.preventDefault();
        $.ajax({
            url: '/task3/edit', //this is the submit URL
            type: 'POST', //or POST
			dataType : 'html',
            data: $('#editLineModalForm').serialize(),
            success: function(data){
				$('#addModal').modal('hide');
				$('#MainContent').empty();
				$("#MainContent").append(data);
				//$('#addModal').modal('hide');
            },
			error: function (data) {
            },
        });
    });
	
});

	});
	function deleteLine(id) { 
		$.ajax({
            url: '/task3/edit', //this is the submit URL
            type: 'POST', //or POST
			dataType : 'html',
			data: "id="+id+"&type=delete",
            success: function(data){
				$('#MainContent').empty();
				$("#MainContent").append(data);
            },
			error: function (data) {
            },
        });
    }