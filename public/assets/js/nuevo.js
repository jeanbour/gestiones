$(document).ready(function() {
		
	function checkapoyo(ide)
	{
		if(ide == 1)
		{
			$('#monto').prop('disabled', false);
		}else{
			$('#monto').prop('disabled', true);
		}
	}

	$('#apoyo').on('change', function()
	{
		checkapoyo($(this).val());
	});

	
    var namesArray = [];
	$.ajax({
      url: 'nuevo-rfc-autocomplete',
      type: 'get',
      dataType: 'json', 
      success: function(data)
      {
        for(var i=0; i<data.length; i++)
        {
        	namesArray.push({
        		id: data[i].id,
        		nombre: data[i].nombre, 
        		label: data[i].nombre+' '+data[i].apellido_paterno+' '+data[i].apellido_materno,        		
        		appat: data[i].apellido_paterno,
        		apmat: data[i].apellido_materno,
        		telefono: data[i].telefono,
        		celular: data[i].celular
        	});
        }
      }
    });   

    $('#nombre').autocomplete({
    	source: namesArray,
    	select: function(event, ui){
    		$('#nombre').val(ui.item.nombre);
    		$('#apellido_paterno').val(ui.item.appat);
    		$('#apellido_materno').val(ui.item.apmat);
    		$('#telefono').val(ui.item.telefono);
    		$('#celular').val(ui.item.celular);
    		return false;
    	}
	});

    var numApoyo = 1;
	$('#agregar').on('click', function() {
		if(numApoyo<5){
			numApoyo++;
			console.log(numApoyo);
			$('#apoyo'+(numApoyo-1)).children().children('.quitar').css({'visibility':'hidden'});
			$('#apoyo'+numApoyo).css({'visibility':'visible'});
		}else{
			alert('El máximo número de apoyos por orden es de 5');
		}			
	});

	$('.quitar').on('click', function() {
		if(numApoyo>2){
			$(this).parent().parent().css({'visibility':'hidden'});				
			console.log(numApoyo);
			$('#apoyo'+(numApoyo-1)).children().children('.quitar').css({'visibility':'visible'});				
			numApoyo--;
		}else if(numApoyo==2){
			console.log(numApoyo);
			$(this).parent().parent().css({'visibility':'hidden'});	
		}{
			alert('ya no hay nada que quitar');
		}
		
	});
		
});