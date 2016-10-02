/*
Plugin para subir imagenes

Uso:
	$("#foto").subirImagen();

opcional
	$("#foto").subirImagen({
		textBuscar: 'Buscar imagen',
		textEliminar: 'Eliminar imagen',
		classBuscar: 'btn_buscar',
		classEliminar: 'btn_eliminar',
		classVista: 'div_vista_previa',
	});

 */
(function($){
	
	var params = {};
	var input_file;

	$.fn.extend({


		// funcion a llamar
		subirImagen: function(opciones)
		{
			// validar que es un input file
			if( $(this).attr('type') === 'file')
			{
				// variables
				input_file 		= $(this);
				var tmp_params 	= opciones || {};

				// setear parametros del plugin
				setParametros(tmp_params);

				// agregar wrapper
				var wrapper = $(document.createElement('div'));
				wrapper.addClass('simg_wrapper_subir_imagen');
				input_file.wrap(wrapper);

				crearNuevoContenido( $(".simg_wrapper_subir_imagen") );
				
				// crear vista previa
				crearVistaPrevia();

				// trigger boton subir imagen
				$("."+params.classBuscar).on('click', function(){
					input_file.trigger('click');
				});

				input_file.change(function(){
					var arr = input_file.val().split('\\');
					console.log(arr[arr.length - 1]);
				});


			}else{
				return false;
			}
		}

	});

	function crearNuevoContenido( div )
	{

		// crear div de botones
		var div_botones = $(document.createElement('div'));
		div_botones.addClass('simg_content_botones');
		div.find('input[type="file"]').css('display', 'none');

		var form_imagen = $(document.createElement('form'));
		form_imagen.attr('class', 'simg_form_imagen');
		form_imagen.attr('method', 'post');
		form_imagen.attr('action', '#');
		form_imagen.attr('enctype', 'multipart/form-data');

		div_botones.html(form_imagen);

		div.find('input[type="file"]').wrap(div_botones);

		// crear boton de subida
		var btn_buscar = $(document.createElement('button'));
		btn_buscar.css('background-color', '#51b255');
		btn_buscar.css('border', '1px solid #3e8c42');
		btn_buscar.css('border-radius', '3px');
		btn_buscar.css('box-shadow', '1px 1px 2px #9e9494');
		btn_buscar.css('color', '#fff');
		btn_buscar.attr('type', 'button');
		btn_buscar.addClass('simg_btn');
		btn_buscar.addClass(params.classBuscar);
		btn_buscar.html(params.textBuscar);

		// crear boton eliminar
		var btn_eliminar = $(document.createElement('button'));
		btn_eliminar.css('margin-left', '3px');
		btn_eliminar.css('background-color', '#d9534f');
		btn_eliminar.css('border', '1px solid #d43f3a');
		btn_eliminar.css('border-radius', '3px');
		btn_eliminar.css('box-shadow', '1px 1px 2px #9e9494');
		btn_eliminar.css('color', '#fff');
		btn_eliminar.attr('type', 'button');
		btn_eliminar.addClass('simg_btn');
		btn_eliminar.addClass(params.classEliminar);
		btn_eliminar.html(params.textEliminar);

		$(".simg_content_botones").append(btn_buscar);
		$(".simg_content_botones").append(btn_eliminar);

		return true;
	}

	function crearVistaPrevia()
	{
		if(params.classVista === false)
		{
			var div_vista = $(document.createElement('div'));
			div_vista.css('margin-top', '5px');
			div_vista.addClass('simg_vista_previa');

			var div_vista_imagen = $(document.createElement('div'));
			div_vista_imagen.css('width', '250px');
			div_vista_imagen.css('height', '250px');
			div_vista_imagen.css('background-color', '#e4e9f0');
			div_vista_imagen.css('border', '4px dashed #c7c5c5');

			$(".simg_wrapper_subir_imagen").append(div_vista);

			// $(".simg_vista_previa").append(div_vista_nombre);
			$(".simg_vista_previa").append(div_vista_imagen);
			
		}else{

			var div_vista_imagen = $(document.createElement('div'));
			div_vista_imagen.css('width', '100%');
			div_vista_imagen.css('height', '100%');
			div_vista_imagen.css('background-color', '#e4e9f0');
			div_vista_imagen.css('border', '4px dashed #c7c5c5');

			// $("."+params.classVista).append(div_vista_nombre);
			$("."+params.classVista).append(div_vista_imagen);
		}
	}

	function setParametros(opciones)
	{
		// textos
		var text_buscar 	= opciones.textBuscar 	|| 'Seleccionar Imagen';
		var text_eliminar 	= opciones.textEliminar || 'Eliminar';

		// clases
		var class_buscar 	= opciones.classBuscar 		|| 'simg_btn_buscar';
		var class_eliminar 	= opciones.classEliminar 	|| 'simg_btn_eliminar';
		var class_vista 	= opciones.classVista 		|| false;

		// setear
		params = {
			textBuscar: 	text_buscar,
			textEliminar: 	text_eliminar,

			classBuscar: 	class_buscar,
			classEliminar: 	class_eliminar,
			classVista: 	class_vista,
		}
		// console.log(texto_buscar);
	}

})(jQuery)