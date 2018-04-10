$(document).ready(function(){

	var blanco = 0;
	var azul = 0;
	var amarillo = 0;
	var verde = 0;
	var negro = 0;
	var rojo = 0;

	function reset_opciones() {
		blanco = 0;
		azul = 0;
		amarillo = 0;
		verde = 0;
		negro = 0;
		rojo = 0;

		$("#blanco").removeClass("active");
		$("#azul").removeClass("active");
		$("#amarillo").removeClass("active");
		$("#verde").removeClass("active");
		$("#negro").removeClass("active");
		$("#rojo").removeClass("active");
	}

	/** IZQUIERDA **/

	function reset_diente_izq_1(){
		$(".diente-izq-1").removeClass("diente-izq-1-azul");
		$(".diente-izq-1").removeClass("diente-izq-1-amarillo");
		$(".diente-izq-1").removeClass("diente-izq-1-verde");
		$(".diente-izq-1").removeClass("diente-izq-1-negro");
		$(".diente-izq-1").removeClass("diente-izq-1-rojo");
	}

	function reset_diente_izq_2(){
		$(".diente-izq-2").removeClass("diente-izq-2-azul");
		$(".diente-izq-2").removeClass("diente-izq-2-amarillo");
		$(".diente-izq-2").removeClass("diente-izq-2-verde");
		$(".diente-izq-2").removeClass("diente-izq-2-negro");
		$(".diente-izq-2").removeClass("diente-izq-2-rojo");
	}

	function reset_diente_izq_3(){
		$(".diente-izq-3").removeClass("diente-izq-3-azul");
		$(".diente-izq-3").removeClass("diente-izq-3-amarillo");
		$(".diente-izq-3").removeClass("diente-izq-3-verde");
		$(".diente-izq-3").removeClass("diente-izq-3-negro");
		$(".diente-izq-3").removeClass("diente-izq-3-rojo");
	}

	function reset_diente_izq_4(){
		$(".diente-izq-4").removeClass("diente-izq-4-azul");
		$(".diente-izq-4").removeClass("diente-izq-4-amarillo");
		$(".diente-izq-4").removeClass("diente-izq-4-verde");
		$(".diente-izq-4").removeClass("diente-izq-4-negro");
		$(".diente-izq-4").removeClass("diente-izq-4-rojo");
	}

	function reset_diente_izq_5(){
		$(".diente-izq-5").removeClass("diente-izq-5-azul");
		$(".diente-izq-5").removeClass("diente-izq-5-amarillo");
		$(".diente-izq-5").removeClass("diente-izq-5-verde");
		$(".diente-izq-5").removeClass("diente-izq-5-negro");
		$(".diente-izq-5").removeClass("diente-izq-5-rojo");
	}

	function reset_diente_izq_6(){
		$(".diente-izq-6").removeClass("diente-izq-6-azul");
		$(".diente-izq-6").removeClass("diente-izq-6-amarillo");
		$(".diente-izq-6").removeClass("diente-izq-6-verde");
		$(".diente-izq-6").removeClass("diente-izq-6-negro");
		$(".diente-izq-6").removeClass("diente-izq-6-rojo");
	}

	function reset_diente_izq_7(){
		$(".diente-izq-7").removeClass("diente-izq-7-azul");
		$(".diente-izq-7").removeClass("diente-izq-7-amarillo");
		$(".diente-izq-7").removeClass("diente-izq-7-verde");
		$(".diente-izq-7").removeClass("diente-izq-7-negro");
		$(".diente-izq-7").removeClass("diente-izq-7-rojo");
	}

	function reset_diente_izq_8(){
		$(".diente-izq-8").removeClass("diente-izq-8-azul");
		$(".diente-izq-8").removeClass("diente-izq-8-amarillo");
		$(".diente-izq-8").removeClass("diente-izq-8-verde");
		$(".diente-izq-8").removeClass("diente-izq-8-negro");
		$(".diente-izq-8").removeClass("diente-izq-8-rojo");
	}

	function reset_diente_izq_9(){
		$(".diente-izq-9").removeClass("diente-izq-9-azul");
		$(".diente-izq-9").removeClass("diente-izq-9-amarillo");
		$(".diente-izq-9").removeClass("diente-izq-9-verde");
		$(".diente-izq-9").removeClass("diente-izq-9-negro");
		$(".diente-izq-9").removeClass("diente-izq-9-rojo");
	}

	function reset_diente_izq_10(){
		$(".diente-izq-10").removeClass("diente-izq-10-azul");
		$(".diente-izq-10").removeClass("diente-izq-10-amarillo");
		$(".diente-izq-10").removeClass("diente-izq-10-verde");
		$(".diente-izq-10").removeClass("diente-izq-10-negro");
		$(".diente-izq-10").removeClass("diente-izq-10-rojo");
	}

	function reset_diente_izq_11(){
		$(".diente-izq-11").removeClass("diente-izq-11-azul");
		$(".diente-izq-11").removeClass("diente-izq-11-amarillo");
		$(".diente-izq-11").removeClass("diente-izq-11-verde");
		$(".diente-izq-11").removeClass("diente-izq-11-negro");
		$(".diente-izq-11").removeClass("diente-izq-11-rojo");
	}

	function reset_diente_izq_12(){
		$(".diente-izq-12").removeClass("diente-izq-12-azul");
		$(".diente-izq-12").removeClass("diente-izq-12-amarillo");
		$(".diente-izq-12").removeClass("diente-izq-12-verde");
		$(".diente-izq-12").removeClass("diente-izq-12-negro");
		$(".diente-izq-12").removeClass("diente-izq-12-rojo");
	}

	function reset_diente_izq_13(){
		$(".diente-izq-13").removeClass("diente-izq-13-azul");
		$(".diente-izq-13").removeClass("diente-izq-13-amarillo");
		$(".diente-izq-13").removeClass("diente-izq-13-verde");
		$(".diente-izq-13").removeClass("diente-izq-13-negro");
		$(".diente-izq-13").removeClass("diente-izq-13-rojo");
	}

	function reset_diente_izq_14(){
		$(".diente-izq-14").removeClass("diente-izq-14-azul");
		$(".diente-izq-14").removeClass("diente-izq-14-amarillo");
		$(".diente-izq-14").removeClass("diente-izq-14-verde");
		$(".diente-izq-14").removeClass("diente-izq-14-negro");
		$(".diente-izq-14").removeClass("diente-izq-14-rojo");
	}

	/** DERECHA **/

	function reset_diente_der_1(){
		$(".diente-der-1").removeClass("diente-der-1-azul");
		$(".diente-der-1").removeClass("diente-der-1-amarillo");
		$(".diente-der-1").removeClass("diente-der-1-verde");
		$(".diente-der-1").removeClass("diente-der-1-negro");
		$(".diente-der-1").removeClass("diente-der-1-rojo");
	}

	function reset_diente_der_2(){
		$(".diente-der-2").removeClass("diente-der-2-azul");
		$(".diente-der-2").removeClass("diente-der-2-amarillo");
		$(".diente-der-2").removeClass("diente-der-2-verde");
		$(".diente-der-2").removeClass("diente-der-2-negro");
		$(".diente-der-2").removeClass("diente-der-2-rojo");
	}

	function reset_diente_der_3(){
		$(".diente-der-3").removeClass("diente-der-3-azul");
		$(".diente-der-3").removeClass("diente-der-3-amarillo");
		$(".diente-der-3").removeClass("diente-der-3-verde");
		$(".diente-der-3").removeClass("diente-der-3-negro");
		$(".diente-der-3").removeClass("diente-der-3-rojo");
	}

	function reset_diente_der_4(){
		$(".diente-der-4").removeClass("diente-der-4-azul");
		$(".diente-der-4").removeClass("diente-der-4-amarillo");
		$(".diente-der-4").removeClass("diente-der-4-verde");
		$(".diente-der-4").removeClass("diente-der-4-negro");
		$(".diente-der-4").removeClass("diente-der-4-rojo");
	}

	function reset_diente_der_5(){
		$(".diente-der-5").removeClass("diente-der-5-azul");
		$(".diente-der-5").removeClass("diente-der-5-amarillo");
		$(".diente-der-5").removeClass("diente-der-5-verde");
		$(".diente-der-5").removeClass("diente-der-5-negro");
		$(".diente-der-5").removeClass("diente-der-5-rojo");
	}

	function reset_diente_der_6(){
		$(".diente-der-6").removeClass("diente-der-6-azul");
		$(".diente-der-6").removeClass("diente-der-6-amarillo");
		$(".diente-der-6").removeClass("diente-der-6-verde");
		$(".diente-der-6").removeClass("diente-der-6-negro");
		$(".diente-der-6").removeClass("diente-der-6-rojo");
	}

	function reset_diente_der_7(){
		$(".diente-der-7").removeClass("diente-der-7-azul");
		$(".diente-der-7").removeClass("diente-der-7-amarillo");
		$(".diente-der-7").removeClass("diente-der-7-verde");
		$(".diente-der-7").removeClass("diente-der-7-negro");
		$(".diente-der-7").removeClass("diente-der-7-rojo");
	}

	function reset_diente_der_8(){
		$(".diente-der-8").removeClass("diente-der-8-azul");
		$(".diente-der-8").removeClass("diente-der-8-amarillo");
		$(".diente-der-8").removeClass("diente-der-8-verde");
		$(".diente-der-8").removeClass("diente-der-8-negro");
		$(".diente-der-8").removeClass("diente-der-8-rojo");
	}

	function reset_diente_der_9(){
		$(".diente-der-9").removeClass("diente-der-9-azul");
		$(".diente-der-9").removeClass("diente-der-9-amarillo");
		$(".diente-der-9").removeClass("diente-der-9-verde");
		$(".diente-der-9").removeClass("diente-der-9-negro");
		$(".diente-der-9").removeClass("diente-der-9-rojo");
	}

	function reset_diente_der_10(){
		$(".diente-der-10").removeClass("diente-der-10-azul");
		$(".diente-der-10").removeClass("diente-der-10-amarillo");
		$(".diente-der-10").removeClass("diente-der-10-verde");
		$(".diente-der-10").removeClass("diente-der-10-negro");
		$(".diente-der-10").removeClass("diente-der-10-rojo");
	}

	function reset_diente_der_11(){
		$(".diente-der-11").removeClass("diente-der-11-azul");
		$(".diente-der-11").removeClass("diente-der-11-amarillo");
		$(".diente-der-11").removeClass("diente-der-11-verde");
		$(".diente-der-11").removeClass("diente-der-11-negro");
		$(".diente-der-11").removeClass("diente-der-11-rojo");
	}

	function reset_diente_der_12(){
		$(".diente-der-12").removeClass("diente-der-12-azul");
		$(".diente-der-12").removeClass("diente-der-12-amarillo");
		$(".diente-der-12").removeClass("diente-der-12-verde");
		$(".diente-der-12").removeClass("diente-der-12-negro");
		$(".diente-der-12").removeClass("diente-der-12-rojo");
	}

	function reset_diente_der_13(){
		$(".diente-der-13").removeClass("diente-der-13-azul");
		$(".diente-der-13").removeClass("diente-der-13-amarillo");
		$(".diente-der-13").removeClass("diente-der-13-verde");
		$(".diente-der-13").removeClass("diente-der-13-negro");
		$(".diente-der-13").removeClass("diente-der-13-rojo");
	}

	function reset_diente_der_14(){
		$(".diente-der-14").removeClass("diente-der-14-azul");
		$(".diente-der-14").removeClass("diente-der-14-amarillo");
		$(".diente-der-14").removeClass("diente-der-14-verde");
		$(".diente-der-14").removeClass("diente-der-14-negro");
		$(".diente-der-14").removeClass("diente-der-14-rojo");
	}

	/** OPCIONES DE COLORES **/

	$("#blanco").click(function(){
		reset_opciones();
		blanco = 1;
		$(this).addClass("active");
	});

	$("#azul").click(function(){
		reset_opciones();
		azul = 1;
		$(this).addClass("active");
	});

	$("#amarillo").click(function(){
		reset_opciones();
		amarillo = 1;
		$(this).addClass("active");
	});

	$("#verde").click(function(){
		reset_opciones();
		verde = 1;
		$(this).addClass("active");
	});

	$("#negro").click(function(){
		reset_opciones();
		negro = 1;
		$(this).addClass("active");
	});

	$("#rojo").click(function(){
		reset_opciones();
		rojo = 1;
		$(this).addClass("active");
	});

	/** DIENTES IZQUIERDA **/

	$(".diente-izq-1").click(function(){
		
		if(blanco == 1){
			reset_diente_izq_1();
            $("#campo-diente-izq-1").val("0");
		}

		if(azul == 1){
			reset_diente_izq_1();
			$(this).addClass("diente-izq-1-azul");
            $("#campo-diente-izq-1").val("1");
		}

		if(amarillo == 1){
			reset_diente_izq_1();
			$(this).addClass("diente-izq-1-amarillo");
            $("#campo-diente-izq-1").val("2");
		}

		if(verde == 1){
			reset_diente_izq_1();
			$(this).addClass("diente-izq-1-verde");
            $("#campo-diente-izq-1").val("3");
		}

		if(negro == 1){
			reset_diente_izq_1();
			$(this).addClass("diente-izq-1-negro");
            $("#campo-diente-izq-1").val("4");
		}

		if(rojo == 1){
			reset_diente_izq_1();
			$(this).addClass("diente-izq-1-rojo");
            $("#campo-diente-izq-1").val("5");
		}
	});

	$(".diente-izq-2").click(function(){
		
		if(blanco == 1){
			reset_diente_izq_2();
            $("#campo-diente-izq-2").val("0");
		}

		if(azul == 1){
			reset_diente_izq_2();
			$(this).addClass("diente-izq-2-azul");
            $("#campo-diente-izq-2").val("1");
		}

		if(amarillo == 1){
			reset_diente_izq_2();
			$(this).addClass("diente-izq-2-amarillo");
            $("#campo-diente-izq-2").val("2");
		}

		if(verde == 1){
			reset_diente_izq_2();
			$(this).addClass("diente-izq-2-verde");
            $("#campo-diente-izq-2").val("3");
		}

		if(negro == 1){
			reset_diente_izq_2();
			$(this).addClass("diente-izq-2-negro");
            $("#campo-diente-izq-2").val("4");
		}

		if(rojo == 1){
			reset_diente_izq_2();
			$(this).addClass("diente-izq-2-rojo");
            $("#campo-diente-izq-2").val("5");
		}
	});

	$(".diente-izq-3").click(function(){
		
		if(blanco == 1){
			reset_diente_izq_3();
            $("#campo-diente-izq-3").val("0");
		}

		if(azul == 1){
			reset_diente_izq_3();
			$(this).addClass("diente-izq-3-azul");
            $("#campo-diente-izq-3").val("1");
		}

		if(amarillo == 1){
			reset_diente_izq_3();
			$(this).addClass("diente-izq-3-amarillo");
            $("#campo-diente-izq-3").val("2");
		}

		if(verde == 1){
			reset_diente_izq_3();
			$(this).addClass("diente-izq-3-verde");
            $("#campo-diente-izq-1").val("3");
		}

		if(negro == 1){
			reset_diente_izq_3();
			$(this).addClass("diente-izq-3-negro");
            $("#campo-diente-izq-3").val("4");
		}

		if(rojo == 1){
			reset_diente_izq_3();
			$(this).addClass("diente-izq-3-rojo");
            $("#campo-diente-izq-3").val("5");
		}
	});

	$(".diente-izq-4").click(function(){
		
		if(blanco == 1){
			reset_diente_izq_4();
            $("#campo-diente-izq-4").val("0");
		}

		if(azul == 1){
			reset_diente_izq_4();
			$(this).addClass("diente-izq-4-azul");
            $("#campo-diente-izq-4").val("1");
		}

		if(amarillo == 1){
			reset_diente_izq_4();
			$(this).addClass("diente-izq-4-amarillo");
            $("#campo-diente-izq-4").val("2");
		}

		if(verde == 1){
			reset_diente_izq_4();
			$(this).addClass("diente-izq-4-verde");
            $("#campo-diente-izq-4").val("3");
		}

		if(negro == 1){
			reset_diente_izq_4();
			$(this).addClass("diente-izq-4-negro");
            $("#campo-diente-izq-4").val("4");
		}

		if(rojo == 1){
			reset_diente_izq_4();
			$(this).addClass("diente-izq-4-rojo");
            $("#campo-diente-izq-4").val("5");
		}
	});

	$(".diente-izq-5").click(function(){
		
		if(blanco == 1){
			reset_diente_izq_5();
            $("#campo-diente-izq-5").val("0");
		}

		if(azul == 1){
			reset_diente_izq_5();
			$(this).addClass("diente-izq-5-azul");
            $("#campo-diente-izq-5").val("1");
		}

		if(amarillo == 1){
			reset_diente_izq_5();
			$(this).addClass("diente-izq-5-amarillo");
            $("#campo-diente-izq-5").val("2");
		}

		if(verde == 1){
			reset_diente_izq_5();
			$(this).addClass("diente-izq-5-verde");
            $("#campo-diente-izq-5").val("3");
		}

		if(negro == 1){
			reset_diente_izq_5();
			$(this).addClass("diente-izq-5-negro");
            $("#campo-diente-izq-5").val("4");
		}

		if(rojo == 1){
			reset_diente_izq_5();
			$(this).addClass("diente-izq-5-rojo");
            $("#campo-diente-izq-5").val("5");
		}
	});

	$(".diente-izq-6").click(function(){
		
		if(blanco == 1){
			reset_diente_izq_6();
            $("#campo-diente-izq-6").val("0");
		}

		if(azul == 1){
			reset_diente_izq_6();
			$(this).addClass("diente-izq-6-azul");
            $("#campo-diente-izq-6").val("1");
		}

		if(amarillo == 1){
			reset_diente_izq_6();
			$(this).addClass("diente-izq-6-amarillo");
            $("#campo-diente-izq-6").val("2");
		}

		if(verde == 1){
			reset_diente_izq_6();
			$(this).addClass("diente-izq-6-verde");
            $("#campo-diente-izq-6").val("3");
		}

		if(negro == 1){
			reset_diente_izq_6();
			$(this).addClass("diente-izq-6-negro");
            $("#campo-diente-izq-6").val("4");
		}

		if(rojo == 1){
			reset_diente_izq_6();
			$(this).addClass("diente-izq-6-rojo");
            $("#campo-diente-izq-6").val("5");
		}
	});

	$(".diente-izq-7").click(function(){
		
		if(blanco == 1){
			reset_diente_izq_7();
            $("#campo-diente-izq-7").val("0");
		}

		if(azul == 1){
			reset_diente_izq_7();
			$(this).addClass("diente-izq-7-azul");
            $("#campo-diente-izq-7").val("1");
		}

		if(amarillo == 1){
			reset_diente_izq_7();
			$(this).addClass("diente-izq-7-amarillo");
            $("#campo-diente-izq-7").val("2");
		}

		if(verde == 1){
			reset_diente_izq_7();
			$(this).addClass("diente-izq-7-verde");
            $("#campo-diente-izq-7").val("3");
		}

		if(negro == 1){
			reset_diente_izq_7();
			$(this).addClass("diente-izq-7-negro");
            $("#campo-diente-izq-7").val("4");
		}

		if(rojo == 1){
			reset_diente_izq_7();
			$(this).addClass("diente-izq-7-rojo");
            $("#campo-diente-izq-7").val("5");
		}
	});

	$(".diente-izq-8").click(function(){
		
		if(blanco == 1){
			reset_diente_izq_8();
            $("#campo-diente-izq-8").val("0");
		}

		if(azul == 1){
			reset_diente_izq_8();
			$(this).addClass("diente-izq-8-azul");
            $("#campo-diente-izq-8").val("1");
		}

		if(amarillo == 1){
			reset_diente_izq_8();
			$(this).addClass("diente-izq-8-amarillo");
            $("#campo-diente-izq-8").val("2");
		}

		if(verde == 1){
			reset_diente_izq_8();
			$(this).addClass("diente-izq-8-verde");
            $("#campo-diente-izq-8").val("3");
		}

		if(negro == 1){
			reset_diente_izq_8();
			$(this).addClass("diente-izq-8-negro");
            $("#campo-diente-izq-8").val("4");
		}

		if(rojo == 1){
			reset_diente_izq_8();
			$(this).addClass("diente-izq-8-rojo");
            $("#campo-diente-izq-8").val("5");
		}
	});

	$(".diente-izq-9").click(function(){
		
		if(blanco == 1){
			reset_diente_izq_9();
            $("#campo-diente-izq-9").val("0");
		}

		if(azul == 1){
			reset_diente_izq_9();
			$(this).addClass("diente-izq-9-azul");
            $("#campo-diente-izq-9").val("1");
		}

		if(amarillo == 1){
			reset_diente_izq_9();
			$(this).addClass("diente-izq-9-amarillo");
            $("#campo-diente-izq-9").val("2");
		}

		if(verde == 1){
			reset_diente_izq_9();
			$(this).addClass("diente-izq-9-verde");
            $("#campo-diente-izq-9").val("3");
		}

		if(negro == 1){
			reset_diente_izq_9();
			$(this).addClass("diente-izq-9-negro");
            $("#campo-diente-izq-9").val("4");
		}

		if(rojo == 1){
			reset_diente_izq_9();
			$(this).addClass("diente-izq-9-rojo");
            $("#campo-diente-izq-9").val("5");
		}
	});

	$(".diente-izq-10").click(function(){
		
		if(blanco == 1){
			reset_diente_izq_10();
            $("#campo-diente-izq-10").val("0");
		}

		if(azul == 1){
			reset_diente_izq_10();
			$(this).addClass("diente-izq-10-azul");
            $("#campo-diente-izq-10").val("1");
		}

		if(amarillo == 1){
			reset_diente_izq_10();
			$(this).addClass("diente-izq-10-amarillo");
            $("#campo-diente-izq-10").val("2");
		}

		if(verde == 1){
			reset_diente_izq_10();
			$(this).addClass("diente-izq-10-verde");
            $("#campo-diente-izq-10").val("3");
		}

		if(negro == 1){
			reset_diente_izq_10();
			$(this).addClass("diente-izq-10-negro");
            $("#campo-diente-izq-10").val("4");
		}

		if(rojo == 1){
			reset_diente_izq_10();
			$(this).addClass("diente-izq-10-rojo");
            $("#campo-diente-izq-10").val("5");
		}
	});

	$(".diente-izq-11").click(function(){
		
		if(blanco == 1){
			reset_diente_izq_11();
            $("#campo-diente-izq-11").val("0");
		}

		if(azul == 1){
			reset_diente_izq_11();
			$(this).addClass("diente-izq-11-azul");
            $("#campo-diente-izq-11").val("1");
		}

		if(amarillo == 1){
			reset_diente_izq_11();
			$(this).addClass("diente-izq-11-amarillo");
            $("#campo-diente-izq-11").val("2");
		}

		if(verde == 1){
			reset_diente_izq_11();
			$(this).addClass("diente-izq-11-verde");
            $("#campo-diente-izq-11").val("3");
		}

		if(negro == 1){
			reset_diente_izq_11();
			$(this).addClass("diente-izq-11-negro");
            $("#campo-diente-izq-11").val("4");
		}

		if(rojo == 1){
			reset_diente_izq_11();
			$(this).addClass("diente-izq-11-rojo");
            $("#campo-diente-izq-11").val("5");
		}
	});

	$(".diente-izq-12").click(function(){
		
		if(blanco == 1){
			reset_diente_izq_12();
            $("#campo-diente-izq-12").val("0");
		}

		if(azul == 1){
			reset_diente_izq_12();
			$(this).addClass("diente-izq-12-azul");
            $("#campo-diente-izq-12").val("1");
		}

		if(amarillo == 1){
			reset_diente_izq_12();
			$(this).addClass("diente-izq-12-amarillo");
            $("#campo-diente-izq-12").val("2");
		}

		if(verde == 1){
			reset_diente_izq_12();
			$(this).addClass("diente-izq-12-verde");
            $("#campo-diente-izq-12").val("3");
		}

		if(negro == 1){
			reset_diente_izq_12();
			$(this).addClass("diente-izq-12-negro");
            $("#campo-diente-izq-12").val("4");
		}

		if(rojo == 1){
			reset_diente_izq_12();
			$(this).addClass("diente-izq-12-rojo");
            $("#campo-diente-izq-12").val("5");
		}
	});

	$(".diente-izq-13").click(function(){
		
		if(blanco == 1){
			reset_diente_izq_13();
            $("#campo-diente-izq-13").val("0");
		}

		if(azul == 1){
			reset_diente_izq_13();
			$(this).addClass("diente-izq-13-azul");
            $("#campo-diente-izq-13").val("1");
		}

		if(amarillo == 1){
			reset_diente_izq_13();
			$(this).addClass("diente-izq-13-amarillo");
            $("#campo-diente-izq-13").val("2");
		}

		if(verde == 1){
			reset_diente_izq_13();
			$(this).addClass("diente-izq-13-verde");
            $("#campo-diente-izq-13").val("3");
		}

		if(negro == 1){
			reset_diente_izq_13();
			$(this).addClass("diente-izq-13-negro");
            $("#campo-diente-izq-13").val("4");
		}

		if(rojo == 1){
			reset_diente_izq_13();
			$(this).addClass("diente-izq-13-rojo");
            $("#campo-diente-izq-13").val("5");
		}
	});

	$(".diente-izq-14").click(function(){
		
		if(blanco == 1){
			reset_diente_izq_14();
            $("#campo-diente-izq-14").val("0");
		}

		if(azul == 1){
			reset_diente_izq_14();
			$(this).addClass("diente-izq-14-azul");
            $("#campo-diente-izq-14").val("1");
		}

		if(amarillo == 1){
			reset_diente_izq_14();
			$(this).addClass("diente-izq-14-amarillo");
            $("#campo-diente-izq-14").val("2");
		}

		if(verde == 1){
			reset_diente_izq_14();
			$(this).addClass("diente-izq-14-verde");
            $("#campo-diente-izq-14").val("3");
		}

		if(negro == 1){
			reset_diente_izq_14();
			$(this).addClass("diente-izq-14-negro");
            $("#campo-diente-izq-14").val("4");
		}

		if(rojo == 1){
			reset_diente_izq_14();
			$(this).addClass("diente-izq-14-rojo");
            $("#campo-diente-izq-14").val("5");
		}
	});

	/** DIENTES DERECHA **/

	$(".diente-der-1").click(function(){
		
		if(blanco == 1){
			reset_diente_der_1();
            $("#campo-diente-der-1").val("0");
		}

		if(azul == 1){
			reset_diente_der_1();
			$(this).addClass("diente-der-1-azul");
            $("#campo-diente-der-1").val("1");
		}

		if(amarillo == 1){
			reset_diente_der_1();
			$(this).addClass("diente-der-1-amarillo");
            $("#campo-diente-der-1").val("2");
		}

		if(verde == 1){
			reset_diente_der_1();
			$(this).addClass("diente-der-1-verde");
            $("#campo-diente-der-1").val("3");
		}

		if(negro == 1){
			reset_diente_der_1();
			$(this).addClass("diente-der-1-negro");
            $("#campo-diente-der-1").val("4");
		}

		if(rojo == 1){
			reset_diente_der_1();
			$(this).addClass("diente-der-1-rojo");
            $("#campo-diente-der-1").val("5");
		}
	});

	$(".diente-der-2").click(function(){
		
		if(blanco == 1){
			reset_diente_der_2();
            $("#campo-diente-der-2").val("0");
		}

		if(azul == 1){
			reset_diente_der_2();
			$(this).addClass("diente-der-2-azul");
            $("#campo-diente-der-2").val("1");
		}

		if(amarillo == 1){
			reset_diente_der_2();
			$(this).addClass("diente-der-2-amarillo");
            $("#campo-diente-der-2").val("2");
		}

		if(verde == 1){
			reset_diente_der_2();
			$(this).addClass("diente-der-2-verde");
            $("#campo-diente-der-2").val("3");
		}

		if(negro == 1){
			reset_diente_der_2();
			$(this).addClass("diente-der-2-negro");
            $("#campo-diente-der-2").val("4");
		}

		if(rojo == 1){
			reset_diente_der_2();
			$(this).addClass("diente-der-2-rojo");
            $("#campo-diente-der-2").val("5");
		}
	});

	$(".diente-der-3").click(function(){
		
		if(blanco == 1){
			reset_diente_der_3();
            $("#campo-diente-der-3").val("0");
		}

		if(azul == 1){
			reset_diente_der_3();
			$(this).addClass("diente-der-3-azul");
            $("#campo-diente-der-3").val("1");
		}

		if(amarillo == 1){
			reset_diente_der_3();
			$(this).addClass("diente-der-3-amarillo");
            $("#campo-diente-der-3").val("2");
		}

		if(verde == 1){
			reset_diente_der_3();
			$(this).addClass("diente-der-3-verde");
            $("#campo-diente-der-3").val("3");
		}

		if(negro == 1){
			reset_diente_der_3();
			$(this).addClass("diente-der-3-negro");
            $("#campo-diente-der-3").val("4");
		}

		if(rojo == 1){
			reset_diente_der_3();
			$(this).addClass("diente-der-3-rojo");
            $("#campo-diente-der-3").val("5");
		}
	});

	$(".diente-der-4").click(function(){
		
		if(blanco == 1){
			reset_diente_der_4();
            $("#campo-diente-der-4").val("0");
		}

		if(azul == 1){
			reset_diente_der_4();
			$(this).addClass("diente-der-4-azul");
            $("#campo-diente-der-4").val("1");
		}

		if(amarillo == 1){
			reset_diente_der_4();
			$(this).addClass("diente-der-4-amarillo");
            $("#campo-diente-der-4").val("2");
		}

		if(verde == 1){
			reset_diente_der_4();
			$(this).addClass("diente-der-4-verde");
            $("#campo-diente-der-4").val("3");
		}

		if(negro == 1){
			reset_diente_der_4();
			$(this).addClass("diente-der-4-negro");
            $("#campo-diente-der-4").val("4");
		}

		if(rojo == 1){
			reset_diente_der_4();
			$(this).addClass("diente-der-4-rojo");
            $("#campo-diente-der-4").val("5");
		}
	});

	$(".diente-der-5").click(function(){
		
		if(blanco == 1){
			reset_diente_der_5();
            $("#campo-diente-der-5").val("0");
		}

		if(azul == 1){
			reset_diente_der_5();
			$(this).addClass("diente-der-5-azul");
            $("#campo-diente-der-5").val("1");
		}

		if(amarillo == 1){
			reset_diente_der_5();
			$(this).addClass("diente-der-5-amarillo");
            $("#campo-diente-der-5").val("2");
		}

		if(verde == 1){
			reset_diente_der_5();
			$(this).addClass("diente-der-5-verde");
            $("#campo-diente-der-5").val("3");
		}

		if(negro == 1){
			reset_diente_der_5();
			$(this).addClass("diente-der-5-negro");
            $("#campo-diente-der-5").val("4");
		}

		if(rojo == 1){
			reset_diente_der_5();
			$(this).addClass("diente-der-5-rojo");
            $("#campo-diente-der-5").val("5");
		}
	});

	$(".diente-der-6").click(function(){
		
		if(blanco == 1){
			reset_diente_der_6();
            $("#campo-diente-der-6").val("0");
		}

		if(azul == 1){
			reset_diente_der_6();
			$(this).addClass("diente-der-6-azul");
            $("#campo-diente-der-6").val("1");
		}

		if(amarillo == 1){
			reset_diente_der_6();
			$(this).addClass("diente-der-6-amarillo");
            $("#campo-diente-der-6").val("2");
		}

		if(verde == 1){
			reset_diente_der_6();
			$(this).addClass("diente-der-6-verde");
            $("#campo-diente-der-6").val("3");
		}

		if(negro == 1){
			reset_diente_der_6();
			$(this).addClass("diente-der-6-negro");
            $("#campo-diente-der-6").val("4");
		}

		if(rojo == 1){
			reset_diente_der_6();
			$(this).addClass("diente-der-6-rojo");
            $("#campo-diente-der-6").val("5");
		}
	});

	$(".diente-der-7").click(function(){
		
		if(blanco == 1){
			reset_diente_der_7();
            $("#campo-diente-der-7").val("0");
		}

		if(azul == 1){
			reset_diente_der_7();
			$(this).addClass("diente-der-7-azul");
            $("#campo-diente-der-7").val("1");
		}

		if(amarillo == 1){
			reset_diente_der_7();
			$(this).addClass("diente-der-7-amarillo");
            $("#campo-diente-der-7").val("2");
		}

		if(verde == 1){
			reset_diente_der_7();
			$(this).addClass("diente-der-7-verde");
            $("#campo-diente-der-7").val("3");
		}

		if(negro == 1){
			reset_diente_der_7();
			$(this).addClass("diente-der-7-negro");
            $("#campo-diente-der-7").val("4");
		}

		if(rojo == 1){
			reset_diente_der_7();
			$(this).addClass("diente-der-7-rojo");
            $("#campo-diente-der-7").val("4");
		}
	});

	$(".diente-der-8").click(function(){
		
		if(blanco == 1){
			reset_diente_der_8();
            $("#campo-diente-der-8").val("0");
		}

		if(azul == 1){
			reset_diente_der_8();
			$(this).addClass("diente-der-8-azul");
            $("#campo-diente-der-8").val("1");
		}

		if(amarillo == 1){
			reset_diente_der_8();
			$(this).addClass("diente-der-8-amarillo");
            $("#campo-diente-der-8").val("2");
		}

		if(verde == 1){
			reset_diente_der_8();
			$(this).addClass("diente-der-8-verde");
            $("#campo-diente-der-8").val("3");
		}

		if(negro == 1){
			reset_diente_der_8();
			$(this).addClass("diente-der-8-negro");
            $("#campo-diente-der-8").val("4");
		}

		if(rojo == 1){
			reset_diente_der_8();
			$(this).addClass("diente-der-8-rojo");
            $("#campo-diente-der-8").val("5");
		}
	});

	$(".diente-der-9").click(function(){
		
		if(blanco == 1){
			reset_diente_der_9();
            $("#campo-diente-der-9").val("0");
		}

		if(azul == 1){
			reset_diente_der_9();
			$(this).addClass("diente-der-9-azul");
            $("#campo-diente-der-9").val("1");
		}

		if(amarillo == 1){
			reset_diente_der_9();
			$(this).addClass("diente-der-9-amarillo");
            $("#campo-diente-der-9").val("2");
		}

		if(verde == 1){
			reset_diente_der_9();
			$(this).addClass("diente-der-9-verde");
            $("#campo-diente-der-9").val("3");
		}

		if(negro == 1){
			reset_diente_der_9();
			$(this).addClass("diente-der-9-negro");
            $("#campo-diente-der-9").val("4");
		}

		if(rojo == 1){
			reset_diente_der_9();
			$(this).addClass("diente-der-9-rojo");
            $("#campo-diente-der-9").val("5");
		}
	});

	$(".diente-der-10").click(function(){
		
		if(blanco == 1){
			reset_diente_der_10();
            $("#campo-diente-der-10").val("0");
		}

		if(azul == 1){
			reset_diente_der_10();
			$(this).addClass("diente-der-10-azul");
            $("#campo-diente-der-10").val("1");
		}

		if(amarillo == 1){
			reset_diente_der_10();
			$(this).addClass("diente-der-10-amarillo");
            $("#campo-diente-der-10").val("2");
		}

		if(verde == 1){
			reset_diente_der_10();
			$(this).addClass("diente-der-10-verde");
            $("#campo-diente-der-10").val("3");
		}

		if(negro == 1){
			reset_diente_der_10();
			$(this).addClass("diente-der-10-negro");
            $("#campo-diente-der-10").val("4");
		}

		if(rojo == 1){
			reset_diente_der_10();
			$(this).addClass("diente-der-10-rojo");
            $("#campo-diente-der-10").val("5");
		}
	});

	$(".diente-der-11").click(function(){
		
		if(blanco == 1){
			reset_diente_der_11();
            $("#campo-diente-der-11").val("0");
		}

		if(azul == 1){
			reset_diente_der_11();
			$(this).addClass("diente-der-11-azul");
            $("#campo-diente-der-11").val("1");
		}

		if(amarillo == 1){
			reset_diente_der_11();
			$(this).addClass("diente-der-11-amarillo");
            $("#campo-diente-der-11").val("2");
		}

		if(verde == 1){
			reset_diente_der_11();
			$(this).addClass("diente-der-11-verde");
            $("#campo-diente-der-11").val("3");
		}

		if(negro == 1){
			reset_diente_der_11();
			$(this).addClass("diente-der-11-negro");
            $("#campo-diente-der-11").val("4");
		}

		if(rojo == 1){
			reset_diente_der_11();
			$(this).addClass("diente-der-11-rojo");
            $("#campo-diente-der-11").val("5");
		}
	});

	$(".diente-der-12").click(function(){
		
		if(blanco == 1){
			reset_diente_der_12();
            $("#campo-diente-der-12").val("0");
		}

		if(azul == 1){
			reset_diente_der_12();
			$(this).addClass("diente-der-12-azul");
            $("#campo-diente-der-12").val("1");
		}

		if(amarillo == 1){
			reset_diente_der_12();
			$(this).addClass("diente-der-12-amarillo");
            $("#campo-diente-der-12").val("2");
		}

		if(verde == 1){
			reset_diente_der_12();
			$(this).addClass("diente-der-12-verde");
            $("#campo-diente-der-12").val("3");
		}

		if(negro == 1){
			reset_diente_der_12();
			$(this).addClass("diente-der-12-negro");
            $("#campo-diente-der-12").val("4");
		}

		if(rojo == 1){
			reset_diente_der_12();
			$(this).addClass("diente-der-12-rojo");
            $("#campo-diente-der-12").val("5");
		}
	});

	$(".diente-der-13").click(function(){
		
		if(blanco == 1){
			reset_diente_der_13();
            $("#campo-diente-der-13").val("0");
		}

		if(azul == 1){
			reset_diente_der_13();
			$(this).addClass("diente-der-13-azul");
            $("#campo-diente-der-13").val("1");
		}

		if(amarillo == 1){
			reset_diente_der_13();
			$(this).addClass("diente-der-13-amarillo");
            $("#campo-diente-der-13").val("2");
		}

		if(verde == 1){
			reset_diente_der_13();
			$(this).addClass("diente-der-13-verde");
            $("#campo-diente-der-13").val("3");
		}

		if(negro == 1){
			reset_diente_der_13();
			$(this).addClass("diente-der-13-negro");
            $("#campo-diente-der-13").val("4");
		}

		if(rojo == 1){
			reset_diente_der_13();
			$(this).addClass("diente-der-13-rojo");
            $("#campo-diente-der-13").val("5");
		}
	});

	$(".diente-der-14").click(function(){
		
		if(blanco == 1){
			reset_diente_der_14();
            $("#campo-diente-der-14").val("0");
		}

		if(azul == 1){
			reset_diente_der_14();
			$(this).addClass("diente-der-14-azul");
            $("#campo-diente-der-14").val("1");
		}

		if(amarillo == 1){
			reset_diente_der_14();
			$(this).addClass("diente-der-14-amarillo");
            $("#campo-diente-der-14").val("2");
		}

		if(verde == 1){
			reset_diente_der_14();
			$(this).addClass("diente-der-14-verde");
            $("#campo-diente-der-14").val("3");
		}

		if(negro == 1){
			reset_diente_der_14();
			$(this).addClass("diente-der-14-negro");
            $("#campo-diente-der-14").val("4");
		}

		if(rojo == 1){
			reset_diente_der_14();
			$(this).addClass("diente-der-14-rojo");
            $("#campo-diente-der-14").val("5");
		}
	});
});