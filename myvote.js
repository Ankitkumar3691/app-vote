$(document).ready(function(){
	$(".total").click(function(e){
		//e.stopPropagation();
		var code = $(this).find('.number').attr('id');
	$.ajax({
		type: "GET",
		url: "https://poll-upvoting.herokuapp.com/getting-count.php",
		data: ({'txtcode' : code}),
		success: function(data){	
		var myvar = data;
		//alert (myvar);	
		//location.reload();
		//$(this).find('.number').html(myvar);
			}	
		});
	});

	var flag=false;
	$(".toggle").click(function(e){
		e.stopPropagation();
		var costVal = parseInt($(this).find('.number').text(), 10);
		if(flag)
		{
			$(this).find('.number').text(costVal-1);
			$(this).removeClass('toggled');
			$(this).css("background", "#fff");
			$(this).css("border-color", "#6e6e71");			
		}
		else
		{
			$(this).find('.number').text(costVal+1);
			$(this).addClass('toggled');
			$(this).css("background", "#f4511c");
			$(this).css("border-color", "#f4511c");
		}
		   flag=!flag;
	});	
	
});
