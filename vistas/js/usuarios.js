$(document).ready(function () {
	var tablaUsuarios = $(".tablaUsuarios").DataTable({
		"ajax": "ajax/tablaUsuarios.ajax.php",
		"deferRender": true,
		"retrieve": true,
		"procesing": true,
		"language": {
	
			"sProcessing":     "Procesando...",
			"sLengthMenu":     "Mostrar _MENU_",
			"sZeroRecords":    "No hay resultados para esa búsqueda",
			"sEmptyTable":     "No hay datos disponibles",
			"sInfo":           "Total _START_ / _END_",
			"sInfoEmpty":      "0 al 0",
			"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
			"sInfoPostFix":    "",
			"sSearch":         "Buscar:",
			"sUrl":            "",
			"sInfoThousands":  ",",
			"sLoadingRecords": "Cargando...",
			"oPaginate": {
				"sFirst":    "Primero",
				"sLast":     "Último",
				"sNext":     ">",
				"sPrevious": "<"
			},
			"oAria": {
				"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
				"sSortDescending": ": Activar para ordenar la columna de manera descendente"
			}
	
		}
	
	});

	//Editar Usuario
	$(document).on("click", ".editarUsuario", function(){
		var idUsuario = $(this).attr("idUsuario");
		console.log(idUsuario);

		var datos = new FormData();
		datos.append("idUsuario", idUsuario);

		//La solicitud ajax se hace desde aqui porque el otro ajax ya esta retornando algo
		//Sirve para llenar los campos con el id seleccionado en el actual
		$.ajax({
			url:"ajax/updateUsuarios.ajax.php",
			method: "POST",
			data: datos,
			cache: false,
			contentType: false,
			processData: false,
			dataType: "json",
			success:function (respuesta) {
				console.log(respuesta);
				$('input[name="editarId"]').val(respuesta["id"]);
				$('input[name="editarNombre"]').val(respuesta["nombre"]);
				$('input[name="editarUsuario"]').val(respuesta["usuario"]);
				$('input[name="editarPassword"]').val(respuesta["password"]);
				
				$('.editarPerfilOption').val(respuesta["idRol"]);
				$('.editarPerfilOption').html(respuesta["rol"]);
			}
		})

	});

	//Eliminar Usuario
	$(document).on("click", ".btnEliminar", function () {
		var idUsuario = $(this).attr("id-usuario");

		Swal.fire({

			title: 'Estás seguro?',
			text: "No podrás revertir esta acción!",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Sí, elimínalo!',
			cancelButtonText: 'Cancelar'

		}).then((result) => {

			if (result.isConfirmed) {

				if(idUsuario == 1) {

					Swal.fire({
						icon: 'error',
						title: 'Oops...',
						text: 'Este usuario no puede ser eliminado!'
					})

					return;
				}

				var datos = new FormData();
				datos.append("idEliminar", idUsuario);

				$.ajax({

					url:"ajax/updateUsuarios.ajax.php",
					method: "POST",
					data: datos,
					cache: false,
					contentType: false,
					processData: false,
					success: function(respuesta){

						if(respuesta == 'ok'){

							Swal.fire({
								position: 'center',
								icon: 'success',
								title: 'Registro Eliminado Correctamente',
								showConfirmButton: false,
								timer: 2000
							})

							tablaUsuarios.ajax.reload(null, false);

						}

					}

				})
				
			}

		})

	});

});