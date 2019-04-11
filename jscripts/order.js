$(document).ready(function() {
	
	//$('#loader').hide();
	
	$('.parent').livequery('change', function() {
		
		$(this).nextAll('.parent').remove();
		$(this).nextAll('label').remove();
		
		$('#show_sub_categories').append('<img src="loader.gif" style="float:left; margin-top:7px;" id="loader" alt="" />');
		
		$.post("get_meal_course.php", {
			parent_id: $(this).val(),
		},function(response){
		  setTimeout("finishAjax('show_sub_categories', '"+escape(response)+"')", 400);
		});
		
		return false;
	});
});

function finishAjax(id, response){
  $('#loader').remove();

  $('#'+id).append(unescape(response));
} 