$(document).ready(function(){
	
	//opciones del odontograma

	var padecimiento = "N/A";
	var valor = "N/A";
	var tipo = "N/A";

	function reset_opciones_operatoria() {
		if($(".boton").hasClass("active"))
		{
			$(".boton").removeClass("active");
		}		
	}

	$("#diente-ausente").click(function() {
		reset_opciones_operatoria();
		$(this).addClass("active");
		padecimiento = "A";
	});

	$("#caries").click(function() {
		reset_opciones_operatoria();
		$(this).addClass("active");
		padecimiento = "C";
	});

	$("#dolor").click(function() {
		reset_opciones_operatoria();
		$(this).addClass("active");
		padecimiento = "D";
	});

	$("#extraccion").click(function() {
		reset_opciones_operatoria();
		$(this).addClass("active");
		padecimiento = "X";
	});

	$("#movilidad").click(function() {
		reset_opciones_operatoria();
		$(this).addClass("active");
		padecimiento = "M";
	});

	$("#protesis-parcial-removible").click(function() {
		reset_opciones_operatoria();
		$(this).addClass("active");
		padecimiento = "PPR";
	});

	$("#restauracion").click(function() {
		reset_opciones_operatoria();
		$(this).addClass("active");
		padecimiento = "R";
	});

	$("#traumatismo").click(function() {
		reset_opciones_operatoria();
		$(this).addClass("active");
		padecimiento = "T";
	});

	$("#maloclusion").click(function() {
		reset_opciones_operatoria();
		$(this).addClass("active");
		padecimiento = "#";
	});

	$("#restauracion-defectuosa").click(function() {
		reset_opciones_operatoria();
		$(this).addClass("active");
		padecimiento = "RD";
	});

	$("#protesis-fija").click(function() {
		reset_opciones_operatoria();
		$(this).addClass("active");
		padecimiento = "PF";
	});

	$("#area-impacto-alimento").click(function() {
		reset_opciones_operatoria();
		$(this).addClass("active");
		padecimiento = "=";
	});	

	$("#protesis").click(function() {
		reset_opciones_operatoria();
		$(this).addClass("active");
		padecimiento = "PR";
	});	

	$("#diente-perdido").click(function() {
		reset_opciones_operatoria();
		$(this).addClass("active");
		padecimiento = "P";
	});	

	$("#extraccion-indicada").click(function() {
		reset_opciones_operatoria();
		$(this).addClass("active");
		padecimiento = "PI";
	});	

	$("#obturacion").click(function() {
		reset_opciones_operatoria();
		$(this).addClass("active");
		padecimiento = "O";
	});	

	$("#obturacion-defectuosa").click(function() {
		reset_opciones_operatoria();
		$(this).addClass("active");
		padecimiento = "OD";
	});

	$("#endodoncia-indicada").click(function() {
		reset_opciones_operatoria();
		$(this).addClass("active");
		padecimiento = "E";
	});

        $("#descalcificacion").click(function() {
		reset_opciones_operatoria();
		$(this).addClass("active");
		padecimiento = "D";
	});

        $("#patologia-pulpar").click(function() {
		reset_opciones_operatoria();
		$(this).addClass("active");
		padecimiento = "PP";
	});

        $("#fractura").click(function() {
		reset_opciones_operatoria();
		$(this).addClass("active");
		padecimiento = "F";
	});

	$("#sano").click(function() {
		reset_opciones_operatoria();
		$(this).addClass("active");
		padecimiento = "S";
	});
    
    tipo = $("#tipo-odontograma").val();

	/**  DIENTES  **/

	$(".diente").click(function() {
        
        if(tipo == "exodoncia")
        {
            if($(this).hasClass("seleccionado"))
            {
                campo_id = $(this).attr('id');
                //$("#campo-"+campo_id).val("1");
                num_campo = campo_id.substr(campo_id.length - 2);

		$("#campo-seleccionado-arriba-"+num_campo).val("0");
                $("#campo-seleccionado-izquierda-"+num_campo).val("0");
                $("#campo-seleccionado-derecha-"+num_campo).val("0");
                $("#campo-seleccionado-centro-"+num_campo).val("0");
                $("#campo-seleccionado-abajo-"+num_campo).val("0");
                
                $("#seleccionado-arriba-"+num_campo).removeClass("seleccionado");
                $("#seleccionado-izquierda-"+num_campo).removeClass("seleccionado");
                $("#seleccionado-derecha-"+num_campo).removeClass("seleccionado");
                $("#seleccionado-centro-"+num_campo).removeClass("seleccionado");
                $("#seleccionado-abajo-"+num_campo).removeClass("seleccionado");
            }
            else
            {
                campo_id = $(this).attr('id');
                //$("#campo-"+campo_id).val("1");
                num_campo = campo_id.substr(campo_id.length - 2);

		$("#campo-seleccionado-arriba-"+num_campo).val("1");
                $("#campo-seleccionado-izquierda-"+num_campo).val("1");
                $("#campo-seleccionado-derecha-"+num_campo).val("1");
                $("#campo-seleccionado-centro-"+num_campo).val("1");
                $("#campo-seleccionado-abajo-"+num_campo).val("1");
                
                $("#seleccionado-arriba-"+num_campo).addClass("seleccionado");
                $("#seleccionado-izquierda-"+num_campo).addClass("seleccionado");
                $("#seleccionado-derecha-"+num_campo).addClass("seleccionado");
                $("#seleccionado-centro-"+num_campo).addClass("seleccionado");
                $("#seleccionado-abajo-"+num_campo).addClass("seleccionado");
            }  
        }
        
        else if(tipo == "normal")
        {
            if(padecimiento != "N/A")
            {
                if(padecimiento == "A" || padecimiento == "X")
                {  
                    if($(this).hasClass("seleccionado"))
                    {
                        campo_id = $(this).attr('id');
                        num_campo = campo_id.substr(campo_id.length - 2);
                        
                        $num_seleccionados = parseInt($("#numero-seleccionados-"+num_campo).val())-1;
                        $("#numero-seleccionados-"+num_campo).val($num_seleccionados);
                        
                        if($num_seleccionados <= 0)
                        {
                            $("#padecimiento-"+num_campo).val("0");
                        }
                        
                        $("#campo-seleccionado-arriba-"+num_campo).val("0");
                        $("#campo-seleccionado-izquierda-"+num_campo).val("0");
                        $("#campo-seleccionado-derecha-"+num_campo).val("0");
                        $("#campo-seleccionado-centro-"+num_campo).val("0");
                        $("#campo-seleccionado-abajo-"+num_campo).val("0");
                        
                        $("#seleccionado-arriba-"+num_campo).removeClass("seleccionado");
                        $("#seleccionado-izquierda-"+num_campo).removeClass("seleccionado");
                        $("#seleccionado-derecha-"+num_campo).removeClass("seleccionado");
                        $("#seleccionado-centro-"+num_campo).removeClass("seleccionado");
                        $("#seleccionado-abajo-"+num_campo).removeClass("seleccionado");
                        
                        $("#titulo-padecimiento-"+num_campo).html("&nbsp;");
                    }
                    else
                    {
                        //$(this).addClass("seleccionado");
                        campo_id = $(this).attr('id');
                        num_campo = campo_id.substr(campo_id.length - 2);
                        
                        $("#padecimiento-"+num_campo).val(padecimiento);
                        $num_seleccionados = parseInt($("#numero-seleccionados-"+num_campo).val());
                        $("#numero-seleccionados-"+num_campo).val($num_seleccionados+1);
                        
                        $("#campo-seleccionado-arriba-"+num_campo).val("1");
                        $("#campo-seleccionado-izquierda-"+num_campo).val("1");
                        $("#campo-seleccionado-derecha-"+num_campo).val("1");
                        $("#campo-seleccionado-centro-"+num_campo).val("1");
                        $("#campo-seleccionado-abajo-"+num_campo).val("1");
                        
                        $("#seleccionado-arriba-"+num_campo).addClass("seleccionado");
                        $("#seleccionado-izquierda-"+num_campo).addClass("seleccionado");
                        $("#seleccionado-derecha-"+num_campo).addClass("seleccionado");
                        $("#seleccionado-centro-"+num_campo).addClass("seleccionado");
                        $("#seleccionado-abajo-"+num_campo).addClass("seleccionado");
                        
                        $("#titulo-padecimiento-"+num_campo).html(padecimiento);
                    }                     
                }
                else
                {
                    if($(this).hasClass("seleccionado"))
                    {
                        campo_id = $(this).attr('id');
                        num_campo = campo_id.substr(campo_id.length - 2);
                        
                        $num_seleccionados = parseInt($("#numero-seleccionados-"+num_campo).val())-1;
                        $("#numero-seleccionados-"+num_campo).val($num_seleccionados);
                        
                        if($num_seleccionados <= 0)
                        {
                            $("#padecimiento-"+num_campo).val("0");
                            $("#titulo-padecimiento-"+num_campo).html("&nbsp;");
                        }
                        
                        $("#campo-"+campo_id).val("0");
                        
                        $(this).removeClass("seleccionado");                        
                    }
                    else
                    {
                        campo_id = $(this).attr('id');
                        num_campo = campo_id.substr(campo_id.length - 2);
                        
                        $("#padecimiento-"+num_campo).val(padecimiento);
                        $num_seleccionados = parseInt($("#numero-seleccionados-"+num_campo).val());
                        $("#numero-seleccionados-"+num_campo).val($num_seleccionados+1);
                        
                        $("#titulo-padecimiento-"+num_campo).html(padecimiento);
                        
                        $("#campo-"+campo_id).val("1");
                        
                        $(this).addClass("seleccionado");
                    }                     
                }
            }else{
                alert("Seleccione uno de los padecimiento de la parte de arriba antes de marcar la zonal dental.")
            }
        }
	});	

});