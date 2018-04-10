$(document).ready(function(){
    
    //cursor en el campo de usuario al inciar sesion
    $("#usuario-login").focus();
    
    //funciones para agregar listados.
	
	//eliminar fila    
    $(document).on("click",".eliminar-fila",function(){
      var parent = $(this).parent().get(0);
      
	  $(parent).remove();
    });
	
	//agregar materiales a las entradas de materiales

    $("#btnagregar-entrada").click(function(){
      var collection = $(".material");
      var repetido = 0;
      collection.each(function() {
          if(parseFloat($(this).val())==parseFloat($("#sltmaterial").val()))
          {
            repetido = 1;
          }
      });
        
      if(repetido==1)
      {
        $("#campo-error").html("<div class='alert alert-danger' id='error'>El <strong>Material</strong> ya está en la lista.</div>");
        $("#sltmaterial").focus();
        return false;
      }
      else if($("#sltmaterial").val()==0 && $("#sltcodigomaterial").val()==0)
        {
            $("#campo-error").html("<div class='alert alert-danger' id='error'>El campo de <strong>Nombre del Material</strong> esta vacio, favor de llenarlo.</div>");
            $("#sltmaterial").focus();
            return false;
        }
        else if($("#txtcantidad").val()=='')
        {
            $("#campo-error").html("<div class='alert alert-danger' id='error'>El campo de <strong>Cantidad</strong> esta vacio, favor de llenarlo.</div>");
            $("#txtcantidad").focus();
            return false;            
        }
        else if(!$.isNumeric($("#txtcantidad").val()))
        {
            $("#campo-error").html("<div class='alert alert-danger' id='error'>El campo de <strong>Cantidad</strong> debe ser un valor numerico.</div>");
            $("#txtcantidad").focus();
            return false;            
        }
        else if(parseFloat($("#txtcantidad").val())<=0)
        {
            $("#campo-error").html("<div class='alert alert-danger' id='error'>El campo de <strong>Cantidad</strong> debe ser mayor a cero.</div>");
            $("#txtcantidad").focus();
            return false;
        }
        else if($("#txtprecio").val()=='')
        {
            $("#campo-error").html("<div class='alert alert-danger' id='error'>El campo de <strong>Precio</strong> esta vacio, favor de llenarlo.</div>");
            $("#txtprecio").focus();
            return false;
        }
        else if(!$.isNumeric($("#txtprecio").val()))
        {
            $("#campo-error").html("<div class='alert alert-danger' id='error'>El campo de <strong>Precio</strong> debe ser un valor numerico.</div>");
            $("#txtprecio").focus();
            return false;            
        }
        else if(parseFloat($("#txtprecio").val())<=0)
        {
            $("#campo-error").html("<div class='alert alert-danger' id='error'>El campo de <strong>Precio</strong> debe ser mayor a cero.</div>");
            $("#txtprecio").focus();
            return false;
        }
        else
          {        
              var nuevaFila="<tr>";
              nuevaFila+="<td><input type='hidden' name='material[]' value='"+$("#sltmaterial").val()+"' class='material'>"+$("#sltmaterial option:selected").text()+"</td>";
              nuevaFila+="<td><input type='text' style='width:50px' name='cantidad[]' value='"+$("#txtcantidad").val()+"'> "+$("#lblunidadmedida").html()+"</td>";
              nuevaFila+="<td>$ <input type='text' style='width:50px' name='precio[]' value='"+$("#txtprecio").val()+"'></td>";
              nuevaFila+="<td><input type='text' style='width:100px' name='fechacaducidad[]' value='"+$(".calendario").val()+"' placeholder='DD-MM-AAAA'></td>";
              nuevaFila+="<td class='eliminar-fila'><a class='btn btn-danger'>Eliminar</a></td>";
              nuevaFila+="</tr>";
              $("#tabla:first").first().append(nuevaFila);            

              //limpiar campos
              $("#sltmaterial").val('------');
              $("#sltcodigomaterial").val('------');
              $("#lblunidadmedida").html('------');
              $("#txtcantidad").val('1');
              $("#txtprecio").val('');
              $(".calendario").val('');
          }
    });
	
	//agregar materiales a la solicitudes de materiales

    $("#btnagregar-solicitud").click(function(){
        var collection = $(".material");
        var repetido = 0;
        collection.each(function() {
            //alert('valor de la tabla: '+parseFloat($(this).val())
            if(parseFloat($(this).val())==parseFloat($("#sltmaterial").val()))
            {
                repetido = 1;
            }
        });
        
        if(repetido==1)
        {
            $("#campo-error").html("<div class='alert alert-danger' id='error'>El <strong>Material</strong> ya está en la lista.</div>");
                $("#sltmaterial").focus();
                return false;
        }        
        else if($("#sltmaterial").val()==0 && $("#sltcodigomaterial").val()==0)
        {
            $("#campo-error").html("<div class='alert alert-danger' id='error'>El campo de <strong>Nombre del Material</strong> esta vacio, favor de llenarlo.</div>");
            $("#sltmaterial").focus();
            return false;
        }
        else if($("#txtcantidad").val()=='')
        {
            $("#campo-error").html("<div class='alert alert-danger' id='error'>El campo de <strong>Cantidad</strong> esta vacio, favor de llenarlo.</div>");
            $("#txtcantidad").focus();
            return false;            
        }
        else if(!$.isNumeric($("#txtcantidad").val()))
        {
            $("#campo-error").html("<div class='alert alert-danger' id='error'>El campo de <strong>Cantidad</strong> debe ser un valor numerico.</div>");
            $("#txtcantidad").focus();
            return false;            
        }
        else if(parseFloat($("#txtcantidad").val())<=0)
        {
            $("#campo-error").html("<div class='alert alert-danger' id='error'>El campo de <strong>Cantidad</strong> debe ser mayor a cero.</div>");
            $("#sltmaterial").focus();
            return false;
        }
        else
        {
          var nuevaFila="<tr>";
          nuevaFila+="<td><input type='hidden' name='material[]' value='"+$("#sltmaterial").val()+"' class='material'><input type='hidden' name='precio[]' value='"+$("#precio").val()+"'>"+$("#sltmaterial option:selected").text()+"</td>";
          nuevaFila+="<td><input type='text' name='cantidad[]' value='"+$("#txtcantidad").val()+"' style='width:50px'> "+$("#lblunidadmedida").html()+"</td>";
          nuevaFila+="<td class='eliminar-fila'><a class='btn btn-danger'>Eliminar</a></td>";
          nuevaFila+="</tr>";
          $("#tabla:first").first().append(nuevaFila);            

          //limpiar campos
          $("#sltmaterial").val('------');
          $("#sltcodigomaterial").val('------');
          $("#lblunidadmedida").html('------');
          $("#txtcantidad").val('1');
          $("#lblcantidadlimite").html('------');
          $("#cantidad-limite").val('');   
          $("#campo-error").html('');   
        }
    });

    $("#btnagregar-solicitud-aprobacion").click(function(){
        var collection = $(".material");
        var repetido = 0;
        collection.each(function() {
            //alert('valor de la tabla: '+parseFloat($(this).val())
            if(parseFloat($(this).val())==parseFloat($("#sltmaterial").val()))
            {
                repetido = 1;
            }
        });
        
        if(repetido==1)
        {
            $("#campo-error").html("<div class='alert alert-danger' id='error'>El <strong>Material</strong> ya está en la lista.</div>");
                $("#sltmaterial").focus();
                return false;
        }        
        else if($("#sltmaterial").val()==0 && $("#sltcodigomaterial").val()==0)
        {
            $("#campo-error").html("<div class='alert alert-danger' id='error'>El campo de <strong>Nombre del Material</strong> esta vacio, favor de llenarlo.</div>");
            $("#sltmaterial").focus();
            return false;
        }
        else if($("#txtcantidad").val()=='')
        {
            $("#campo-error").html("<div class='alert alert-danger' id='error'>El campo de <strong>Cantidad</strong> esta vacio, favor de llenarlo.</div>");
            $("#txtcantidad").focus();
            return false;            
        }
        else if(!$.isNumeric($("#txtcantidad").val()))
        {
            $("#campo-error").html("<div class='alert alert-danger' id='error'>El campo de <strong>Cantidad</strong> debe ser un valor numerico.</div>");
            $("#txtcantidad").focus();
            return false;            
        }
        else if(parseFloat($("#txtcantidad").val())<=0)
        {
            $("#campo-error").html("<div class='alert alert-danger' id='error'>El campo de <strong>Cantidad</strong> debe ser mayor a cero.</div>");
            $("#sltmaterial").focus();
            return false;
        }
        else
        {
	  var IdMaterial =  $("#sltmaterial").val();
	  //var Existencia = 0;

	  $.ajax({
	  type: 'GET',
          url: 'actualizar-campos-materiales.php',
          data: 'material='+IdMaterial,
          dataType: 'json',
          cache: false,
          success: function(result) {

	  Existencia = result[3];

	  var nuevaFila="<tr>";
          nuevaFila+="<td><input type='hidden' name='material[]' value='"+$("#sltmaterial").val()+"' class='material'><input type='hidden' name='precio[]' value='"+$("#precio").val()+"'>"+$("#sltmaterial option:selected").text()+"</td>";
          nuevaFila+="<td><input type='text' class='cantidad-material' name='cantidad[]' value='"+$("#txtcantidad").val()+"' style='width:50px'> "+$("#lblunidadmedida").html()+"</td>";
	  nuevaFila+="<td>"+Existencia+" <input type='hidden' class='existencia-material' value='"+Existencia+"'></td>";
          nuevaFila+="<td class='eliminar-fila'><a class='btn btn-danger'>Eliminar</a></td>";
          nuevaFila+="</tr>";
          $("#tabla:first").first().append(nuevaFila); 

	  //limpiar campos
          $("#sltmaterial").val('------');
          $("#sltcodigomaterial").val('------');
          $("#lblunidadmedida").html('------');
          $("#txtcantidad").val('1');
          $("#lblcantidadlimite").html('------');
          $("#cantidad-limite").val('');   
          $("#campo-error").html(''); 
		  }
	  });       

            
        }
    });
	
	//cobros de caja
	
	function CalcularTotalConceptos()
	{
		total = 0;
		collection = $(".campo-total-concepto");

		collection.each(function() {
			total = total + parseFloat($(this).val());
		});
		
		return total;
	}
	
	$("#btnagregar-concepto").click(function(){
      var collection = $(".campo-concepto");
      var repetido = 0;
		
      collection.each(function() {
          if(parseFloat($(this).val())==parseFloat($("#sltconcepto").val()))
          {
            repetido = 1;
          }
      });
        
      if(repetido==1)
      {
        $("#campo-error").html("<div class='alert alert-danger' id='error'>El <strong>Concepto</strong> ya está en la lista.</div>");
        $("#sltconcepto").focus();
        return false;
      }
	  else if($("#sltconcepto").val()=='0')
	  {
		$("#campo-error").html("<div class='alert alert-danger' id='error'>El <strong>Concepto</strong> esta vacio, favor de llenarlo.</div>");
		$("#sltconcepto").focus();
		return false;            
	  }
	  else if($("#txtcantidad").val()=='')
	  {
		$("#campo-error").html("<div class='alert alert-danger' id='error'>El campo de <strong>Cantidad</strong> esta vacio, favor de llenarlo.</div>");
		$("#txtcantidad").focus();
		return false;            
	  }
	  else
	  {        
		  var nuevaFila="<tr>";
		  
		  nuevaFila+="<td><input type='hidden' style='width:30px' name='cantidades[]' class='campo-cantidad' value='"+$("#txtcantidad").val()+"'>"+$("#txtcantidad").val()+" ";
		  
		  nuevaFila+="<input type='hidden' name='conceptos[]' class='campo-concepto' value='"+$("#sltconcepto").val()+"'>"+$("#sltconcepto option:selected").text()+"</td>";		  
		  
		  nuevaFila+="<td><input type='hidden' name='precios[]' class='campo-precio' value='"+$("#txtprecio").val()+"'>$ "+$("#txtprecio").val()+"</td>";
		  
		  nuevaFila+="<td class='total-concepto'><input type='hidden' class='campo-total-concepto' value='"+$("#txtprecio").val()*$("#txtcantidad").val()+"'>$ "+$("#txtprecio").val()*$("#txtcantidad").val()+"</td>";
		  
		  nuevaFila+="<td class='eliminar-fila'><a class='btn btn-danger'>Eliminar</a></td>";
		  
		  nuevaFila+="</tr>";
		  
		  $("#tabla:first").first().append(nuevaFila);  
		  
		  total_conceptos = CalcularTotalConceptos();
		  
		  if($("#txtporcentaje-descuento").val()!="0.00")
		  {
			  total_descuento = parseFloat(total_conceptos) * parseFloat($("#txtporcentaje-descuento").val())/100;
			  total = total_conceptos - total_descuento;
		  }

		  $("#total-pagar").html(total);
		  
		  recibi = parseFloat($("#txtrecibi").val());	
		  total = parseFloat($("#total-pagar").html());
		
		  $("#total-cambio").html(recibi-total);
		  
		  //limpiar campos
		  $("#sltconcepto").val('------');
		  $("#txtcantidad").val('1');
		  $("#txtprecio").val('0.00');
	  }
    });	
	
	$(document).on("keyup","#txtrecibi",function(){	
		if($("#txtrecibi").html() == "" || $("#total-pagar").html()!="" || $("#total-pagar").html()!="0")
		{
			var recibi = parseFloat($(this).val());	
			var total = parseFloat($("#total-pagar").html());
		
			$("#total-cambio").html(recibi-total);	
		}else{
			$("#total-cambio").html("0.00");
		}
    });
    
    //funciones de los select
    
    $("#sltproveedor").change(function(){
      location.href="entrada-material-nueva.php?proveedor="+$(this).val();
    });
    
    $("#sltdepartamento-solicitud").change(function(){
      location.href="solicitud-material-nueva.php?departamento="+$(this).val();
    });
    
    $("#sltcomunidad-solicitud").change(function(){
      location.href="solicitud-material-nueva.php?comunidad="+$(this).val();
    });
    
    $("#sltimpuesto").change(function(){
      var IdImpuesto = $("#sltimpuesto").val();

      if(IdImpuesto!=0)
      {
	  $.ajax({
	  type: 'GET',
          url: 'actualizar-campo-impuesto.php',
          data: 'impuesto='+IdImpuesto,
          dataType: 'json',
          cache: false,
          success: function(result) {
		      $('#porcentaje-impuesto').html(result[2]);
		      $('#porcentaje-impuesto-post').val(result[2]);
          },
	  });
      }else{
	  $('#porcentaje-impuesto').html(0);
	  $('#porcentaje-impuesto-post').val(0);
      }
      
    });

    $("#sltmaterial").change(function(){
      var IdProducto = $("#sltmaterial").val();

      if(IdProducto != 0)
      {
    	  $.ajax({
    		  type: 'GET',
    		      url: 'actualizar-campos-materiales.php',
    		      data: 'material='+IdProducto,
    		      dataType: 'json',
    		      cache: false,
    		      success: function(result) {
    		      $('#lblunidadmedida').html(result[0]);
    		      $('#sltcodigomaterial').val(result[1]);
    		      $('#txtprecio').val(result[2]);
    		      $('#precio').val(result[2]);
    		  },error: function(jqXHR,textStatus,errorThrown) {
              console.log("error en el proceso."+errorThrown);
            }
          }); 
      }else{
      	  $('#lblunidadmedida').html("------");
      	  $('#sltcodigomaterial').val(0);
      	  $('#txtprecio').val(0);
      	  $('#precio').val(0);
      }
    });

    $("#sltcodigomaterial").change(function(){
      var IdProducto = $("#sltcodigomaterial").val();

      if(IdProducto != 0)
      {
	  $.ajax({
		  type: 'GET',
		      url: 'actualizar-campos-materiales.php',
		      data: 'material='+IdProducto,
		      dataType: 'json',
		      cache: false,
		      success: function(result) {
		      $('#lblunidadmedida').html(result[0]);
		      $('#sltmaterial').val(result[1]);
		      $('#txtprecio').val(result[2]);
		      $('#precio').val(result[2]);
		  },
	  }); 
      }else{
	  $('#lblunidadmedida').html("------");
	  $('#sltmaterial').val(0);
	  $('#txtprecio').val(0);
	  $('#precio').val(0);
      }         
    });
	
    $("#sltconcepto").change(function(){
      var IdConcepto = $(this).val();
	  	
      $.ajax({
        type: 'GET',
        url: 'actualizar-campo-precio.php',
        data: 'concepto='+IdConcepto,
        dataType: 'json',
        cache: false,
        success: function(result) {
          $('#txtprecio').val(result[0]);
        },
      });
    });
	
	$("#sltdescuento").change(function(){
      var IdDescuento = $(this).val();
	  	
      $.ajax({
        type: 'GET',
        url: 'actualizar-campo-descuento.php',
        data: 'descuento='+IdDescuento,
        dataType: 'json',
        cache: false,
        success: function(result) {
          $('#txtporcentaje-descuento').val(result[0]);
			
		  if($('#txtporcentaje-descuento').val()!="0.00")
		  {		
			var total_descuento = parseFloat($("#total-pagar").html()) * parseFloat($("#txtporcentaje-descuento").val())/100;
			var total = parseFloat($("#total-pagar").html()) - total_descuento;

			$("#total-pagar").html(total);
			  
			if($("#total-cambio").html()!="0.00")
			{
				var recibi = parseFloat($("#txtrecibi").val());	
				var total = parseFloat($("#total-pagar").html());

				$("#total-cambio").html(recibi-total);
			}	
		  }else{
		  	var total = CalcularTotalConceptos();
			$("#total-pagar").html(total);
			  
			if($("#total-cambio").html()!="0.00")
			{
				var recibi = parseFloat($("#txtrecibi").val());	
				var total = parseFloat($("#total-pagar").html());

				$("#total-cambio").html(recibi-total);
			}			
		  }
        },
      });  
    });

    $("#reiniciar-folios").click(function(){
      var FolioInicio = "0000000";
      $("#folio-entradas").val(FolioInicio);
      $("#folio-solicitudes").val(FolioInicio);
      $("#folio-salidas").val(FolioInicio);
      $("#folio-devoluciones").val(FolioInicio);
      $("#folio-cobros-caja").val(FolioInicio);
    }); 
    
    //validacion de reportes
    
    $("#reporte-fecha").click(function(){
        if($("#fecha-inicio").val()=="")
        {
            $("#campo-error").html("<div class='alert alert-danger' id='error'>La <strong>Fecha de Inicio</strong> esta vacia, favor de llenarla.</div>");
            $("#fecha-inicio").focus();
            return false;
        }
        else if($("#fecha-fin").val()=="")
        {
            $("#campo-error").html("<div class='alert alert-danger' id='error'>La <strong>Fecha de Fin</strong> esta vacia, favor de llenarla.</div>");
            $("#fecha-fin").focus();
            return false;
        }
    });
    
    $("#reporte-administracion").click(function(){
        if($("#sltadministraciones").val()=="0")
        {
            $("#campo-error").html("<div class='alert alert-danger' id='error'>La <strong>Administración</strong> esta vacia, favor de llenarla.</div>");
            $("#sltadministraciones").focus();
            return false;
        }
    });
    
    $("#reporte-ciclo").click(function(){
        if($("#sltciclos").val()=="0")
        {
            $("#campo-error").html("<div class='alert alert-danger' id='error'>El <strong>Ciclo</strong> esta vacio, favor de llenarlo.</div>");
            $("#sltciclos").focus();
            return false;
        }
    });
    
    $("#reporte-semestre").click(function(){
        if($("#sltadministracion-semestre").val()=="0")
        {
            $("#campo-error").html("<div class='alert alert-danger' id='error'>La <strong>Administración</strong> esta vacia, favor de llenarla.</div>");
            $("#sltadministracion-semestre").focus();
            return false;
        }
        else if($("#sltsemestre").val()=="0")
        {
            $("#campo-error").html("<div class='alert alert-danger' id='error'>El <strong>Semestre</strong> esta vacio, favor de llenarlo.</div>");
            $("#sltsemestre").focus();
            return false;
        }
    });
    
    // reportes historias clinicas

    $("#sltadministracion-semestre").change(function(){
    
      $('#sltsemestre').empty().append('<option value="0">------</option>');
        
      var valor_administracion = $(this).val();
      fechas_administracion = valor_administracion.split("|");
        
      fecha1 = fechas_administracion[1];
      fecha2 = fechas_administracion[2];

      for(i=fecha1,i2=1,i3=1;i<=fecha2;i2++,i3++)
      {
        i4 = i;
        if(i2 == 1)
        {
            var fecha = new Date(i);
            fecha.setDate(fecha.getDate() + 200);
            
            var dia,mes;
            dia = fecha.getDay();
            mes = fecha.getMonth();
            
            dia = (dia == '0' ? 1:dia);
            mes = (mes == '0' ? 1:mes);
                        
            i = fecha.getFullYear()+'-'+
                (mes <= 9 ? '0'+mes:mes)+'-'+
                (dia <= 9 ? '0'+dia:dia);
        }

        if(i2 == 2)
        {            
            var fecha = new Date(i);
            fecha.setDate(fecha.getDate() + 217);
            
            var dia,mes;
            dia = fecha.getDay();
            mes = fecha.getMonth();
            
            dia = (dia == '0' ? 1:dia);
            mes = (mes == '0' ? 1:mes);
                        
            i = fecha.getFullYear()+'-'+
                (mes <= 9 ? '0'+mes:mes)+'-'+
                (dia <= 9 ? '0'+dia:dia);
        }
        
        $('#sltsemestre').append('<option value="'+i4+'|'+i+'">'+i3+' Semestre</option>');
          
        if(i2 == 1)
        {
            var fecha = new Date(i);
            fecha.setDate(fecha.getDate() + 47);
            
            var dia,mes;
            dia = fecha.getDay();
            mes = fecha.getMonth();
            
            dia = (dia == '0' ? 1:dia);
            mes = (mes == '0' ? 1:mes);
                        
            i = fecha.getFullYear()+'-'+
                (mes <= 9 ? '0'+mes:mes)+'-'+
                (dia <= 9 ? '0'+dia:dia);
        }

        if(i2 == 2)
        {
            var fecha = new Date(i);
            fecha.setDate(fecha.getDate() + 8);
            
            var dia,mes;
            dia = fecha.getDay();
            mes = fecha.getMonth();
            
            dia = (dia == '0' ? 1:dia);
            mes = (mes == '0' ? 1:mes);
                        
            i = fecha.getFullYear()+'-'+
                (mes <= 9 ? '0'+mes:mes)+'-'+
                (dia <= 9 ? '0'+dia:dia);
            
            i2 = 0;
        }
      }
    });
    
    //confirmacion de acciones
    
    $(".guardar").click(function(){
      var respuesta = confirm('Se guardarán los cambios ¿Desea Continuar?'); 
      if(!respuesta){return false;}
    });

    $(".cancelar").click(function(){
      var respuesta = confirm('Se cancelarán los cambios ¿Desea Continuar?'); 
      if(!respuesta){return false;}
    });

    $("#actualiza-precio").click(function(){
      var enlace_actual = $(this).attr("href");
      var parametro = $("#area-material").val();
      $(this).attr('href', enlace_actual+'?area='+parametro);
    }); 
    
    //desplegar calendarios
    
    $('.calendario').datepicker({
      format: 'dd-mm-yyyy',
      todayBtn: 'linked'
    });
    
    //validar solo numeros
    
    $('.solo-numeros').keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
             // Allow: Ctrl+A
            (e.keyCode == 65 && e.ctrlKey === true) || 
             // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
    
    // validar solo letras
    
    $('.solo-letras').keydown(function(e){
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
             // Allow: Ctrl+A
            (e.keyCode == 65 && e.ctrlKey === true) || 
             // Allow: home, end, left, right
            (e.keyCode >= 32 && e.keyCode <= 39)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if (e.keyCode < 65 || e.keyCode > 90) {
            e.preventDefault();
        }
    });
	
	// validar numero cuenta/empleado repetido
	
	$("#numero-cuenta-empleado").on('keyup', function() {
		
	  if($("#numero-cuenta-empleado").val() != "")
	  {
		  var NumCuentEmp = $("#numero-cuenta-empleado").val(); 
		
		  $('#numero-cuenta-empleado-repetido').html('<img src="../img/loading.gif">');

		  $.ajax({
			type: 'GET',
			url: 'numero-cuenta-empleado-repetido.php',
			data: 'num_cuenta_empleado='+NumCuentEmp,
			dataType: 'html',
			cache: false,
			success: function(result) {			
			  $('#numero-cuenta-empleado-repetido').html(result);
			},
		  });
	  }     
    });
	
	// validar usuario repetido
	var UsuarioCambiado = 0;
	
	$("#usuario").on('keyup click focus', function() {
		
	  if($("#nombre").val()!='' && $("#apellidopaterno").val()!='' && UsuarioCambiado == 0)
	  {
      	$(this).val($("#nombre").val()+'.'+$("#apellidopaterno").val());
		UsuarioCambiado = 1;
      }
		
	  if($("#usuario").val() != "")
	  {
		  var Usuario = $("#usuario").val(); 
		
		  $('#usuario-repetido').html('<img src="../img/loading.gif">');

		  $.ajax({
			type: 'GET',
			url: 'usuario-repetido.php',
			data: 'usuario='+Usuario,
			dataType: 'html',
			cache: false,
			success: function(result) {			
			  $('#usuario-repetido').html(result);
			},
		  });
	  }     
    });
    
    //buscar folios de salidas en las devoluciones
    
    $("#buscar-folio-salida").click(function(){
        FolioSalida = $("#txtfolio-salida").val();
        $(this).attr('href', 'devolucion-material-nueva.php?folio-salida='+FolioSalida);
    });  
    
    // desplegar las pestañas de los formatos
      $('#myTab a').click(function (e) {
        e.preventDefault();
        $(this).tab('show');
      });
    
    // clinica
    $("#sltpaciente-indice-preventivo-operatoria").change(function(){
      var valor = $(this).val();
      location.href="formatoindicepreventivooperatoria-nuevo.php?paciente="+valor;
    });
    
    $("#sltpaciente-endodoncia").change(function(){
      var valor = $(this).val();
      location.href="formatohistoriaclinicaendodoncia-nuevo.php?paciente="+valor;
    });
    
    $("#sltpaciente-exodoncia").change(function(){
      var valor = $(this).val();
      location.href="formatohistoriaclinicaexodoncia-nuevo.php?paciente="+valor;
    });
    
    $("#sltpaciente-operatoria").change(function(){
      var valor = $(this).val();
      location.href="formatohistoriaclinicaoperatoria-nuevo.php?paciente="+valor;
    });
    
    $("#sltpaciente-protesis-parcial-removible").change(function(){
      var valor = $(this).val();
      location.href="formatohistoriaclinicaprotesisparcialremovible-nuevo.php?paciente="+valor;
    });
    
    $("#sltpaciente-protesis-fija").change(function(){
      var valor = $(this).val();
      location.href="formatohistoriaclinicaprotesisfija-nuevo.php?paciente="+valor;
    });
    
    $("#sltpaciente-seminario").change(function(){
      var valor = $(this).val();
      location.href="formatohistoriaclinicaseminario-nuevo.php?paciente="+valor;
    });
    
    $("#sltpaciente-operatoria2011b").change(function(){
      var valor = $(this).val();
      location.href="formatohistoriaclinicaoperatoria2011b-nuevo.php?paciente="+valor;
    });
    
    $("#sltpaciente-periodoncia").change(function(){
      var valor = $(this).val();
      location.href="formatohistoriaperiodoncia-nuevo.php?paciente="+valor;
    });
    
    $("#sltpaciente-general").change(function(){
      var valor = $(this).val();
      location.href="formatohistoriageneral-nuevo.php?paciente="+valor;
    });
    
    $("#sltpaciente-protesis-total").change(function(){
      var valor = $(this).val();
      location.href="formatohistoriaprotesistotal-nuevo.php?paciente="+valor;
    });

    $("#sltpaciente-pediatrica").change(function(){
      var valor = $(this).val();
      location.href="formatohistoriaclinicapediatrica-nuevo.php?paciente="+valor;
    });

    $("#sltpaciente-comunitaria").change(function(){
      var valor = $(this).val();
      location.href="formatohistoriaclinicacomunitaria-nuevo.php?paciente="+valor;
    });
});