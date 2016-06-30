$(document).ready(function() {
	$('#crearUsuario').click(function(){
		window.location.href = base_url+'index.php/usuario/manejo_usuario/';
	}); 
	$('button[name = "botonEliminar"]').click(function(){
		var comfirmar = confirm('Desea eliminar este usuario?');
		if(comfirmar){
			window.location.href = base_url+'index.php/usuario/eliminar_usuario/'+$(this).attr('idUsuario');
		}
	}); 
 });
