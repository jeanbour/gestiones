$(document).ready(function()
{
	$('body').on('click', '.detalles', function()
	{
		if($(this).hasClass('btn-success'))
		{
			$(this).removeClass('btn-success').addClass('btn-danger');
			$(this).children().removeClass('glyphicon-plus').addClass('glyphicon-minus');			
		}else if($(this).hasClass('btn-danger'))
		{
			$(this).removeClass('btn-danger').addClass('btn-success');
			$(this).children().removeClass('glyphicon-minus').addClass('glyphicon-plus');						
		}		
	});
});