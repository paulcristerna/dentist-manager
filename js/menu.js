$(document).ready(function(){
	
	//opciones del menu

	var ventana = $("#ventana").val();
	  $("#"+ventana).parent().addClass("active");

	  if( ventana == 'administraciones' || 
	      ventana == 'usuarios' || 
	      ventana == 'doctores-comunitarios' || 
	      ventana == 'departamentos' || 
	      ventana == 'comunidades' || 
	      ventana == 'comunidades-asignar' ||
	      ventana == 'areas' ||
	      ventana == 'puestos' ||
	      ventana == 'impuestos' ||
          ventana == 'materias' ||
          ventana == 'descuentos' ||
          ventana == 'conceptos' ||
	      ventana == 'actualizar-precios')
            { $(".administracion").show(); }

	  if( ventana == 'entradas-material' || 
	      ventana == 'solicitud-material' || 
	      ventana == 'autorizar-solicitudes' || 
	      ventana == 'salidas-material' || 
	      ventana == 'materiales' || 
	      ventana == 'proveedores' || 
	      ventana == 'devolucion-material' ||
	      ventana == 'stock-minimo' ||
	      ventana == 'fechas-caducidad' ||
	      ventana == 'materiales-caducados') 
            { $(".almacen").show(); }
    
      if(  ventana == 'asignacion-parejas-clinica' ||
           ventana == 'formato-indice-preventivo-operatoria' ||
           ventana == 'formato-historia-clinica-endodoncia' ||
           ventana == 'formato-historia-clinica-exodoncia' ||
           ventana == 'formato-historia-clinica-operatoria' ||
           ventana == 'formato-historia-clinica-protesis-parcial-removible' ||
           ventana == 'formato-historia-clinica-protesis-fija' ||
           ventana == 'formato-historia-clinica-seminario' ||
           ventana == 'formato-historia-clinica-operatoria-2011b' ||
           ventana == 'formato-historia-periodoncia' ||
           ventana == 'formato-historia-general' ||
           ventana == 'formato-historia-protesis-total' ||
	   ventana == 'formato-historia-pediatrica' ||
	   ventana == 'formato-historia-comunitaria')
            { $(".clinica").show(); }
	
	  if( ventana == 'pacientes' ||
		  ventana == 'cobros')
            { $(".caja").show(); }

	  if( ventana == 'estadisticas-salida' || 
	      ventana == 'dinero-entregado-departamentos' || 
	      ventana == 'estadistico-total-materiales' || 
	      ventana == 'salidas-material-reporte' ||
	      ventana == 'total-egresos' ||
          ventana == 'total-pacientes-historias-clinicas' ||
		  ventana == 'corte-caja')
            { $(".reportes").show(); }

  // Cierra los listados del menu
  function Reset(){
    if($(".administracion").is(':visible')){
			$(".administracion").slideToggle();
		}
    else if($(".almacen").is(':visible')){
			$(".almacen").slideToggle();
		}
		else if($(".clinica").is(':visible')){
			$(".clinica").slideToggle();
		}
	    else if($(".caja").is(':visible')){
			$(".caja").slideToggle();
		}
		else if($(".reportes").is(':visible')){
			$(".reportes").slideToggle();
		}
	}
	
	// Abre/cierra los listados del menu al accionarlos
	
	$("#administracion").click(function() {
    if($(".administracion").is(':visible')){
      Reset();
    }else{
      Reset();
      $(".administracion").slideToggle();
		}
	});
	
	$("#almacen").click(function() {
    if($(".almacen").is(':visible')){
      Reset();
    }else{
      Reset();
      $(".almacen").slideToggle();
		}
	});
	
	$("#clinica").click(function() {
    if($(".clinica").is(':visible')){
      Reset();
    }else{
      Reset();
      $(".clinica").slideToggle();
		}
	});
	
	$("#caja").click(function() {
    if($(".caja").is(':visible')){
      Reset();
    }else{
      Reset();
      $(".caja").slideToggle();
		}
	});
	
	$("#reportes").click(function() {
    if($(".reportes").is(':visible')){
      Reset();
    }else{
      Reset();
      $(".reportes").slideToggle();
		}
	});	
});