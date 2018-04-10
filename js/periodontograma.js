$(document).ready(function(){
	
	//opciones del periodontograma

	if($("#tipo").val() == "periodontograma"){

		// Declaracion de variables
		var opcion = 0;
		var num_diente = 0;
		var num_frenillo = 0;

		// Reset datos		
		function reset_opciones() {

			if($(".boton").hasClass("active"))
			{
				$(".boton").removeClass("active");
			}		
		}	

		function reset_clases(num_diente){
			
			reset_diente(num_diente);

			reset_contenedor_lineas(num_diente);	

			reset_contenedor_corona(num_diente);					
		}

		function reset_diente(num_diente){

			if($(".diente-"+num_diente).hasClass("seleccionado"))
			{
				$(".diente-"+num_diente).removeClass("seleccionado");
			}

			if($(".diente-"+num_diente).hasClass("ausente-"+num_diente))
			{
				$(".diente-"+num_diente).removeClass("ausente-"+num_diente);
			}	
		}

		function reset_contenedor_lineas(num_diente) {
			
			if($(".contenedor-lineas-"+num_diente).hasClass("bolsa-parodontal-"+num_diente))
			{
				$(".contenedor-lineas-"+num_diente).removeClass("bolsa-parodontal-"+num_diente);
			}

			if($(".contenedor-lineas-"+num_diente).hasClass("abceso-"+num_diente))
			{
				$(".contenedor-lineas-"+num_diente).removeClass("abceso-"+num_diente);
			}
		}

		function reset_contenedor_corona(num_diente) {

			if($(".contenedor-corona").hasClass("reconstruccion-"+num_diente))
			{
				$(".contenedor-corona").removeClass("reconstruccion-"+num_diente);
			}

			if($(".contenedor-corona").hasClass("protesis-fija-"+num_diente))
			{
				$(".contenedor-corona").removeClass("protesis-fija-"+num_diente);
			}

			if($(".contenedor-corona").hasClass("protesis-removible-"+num_diente))
			{
				$(".contenedor-corona").removeClass("protesis-removible-"+num_diente);
			}

			if($(".contenedor-corona").hasClass("obt-mal-ajustada-"+num_diente))
			{
				$(".contenedor-corona").removeClass("obt-mal-ajustada-"+num_diente);
			}

			if($(".contenedor-corona").hasClass("faceta-desgaste-"+num_diente))
			{
				$(".contenedor-corona").removeClass("faceta-desgaste-"+num_diente);
			}	
		}

		function reset_lineas(num_diente){

			if($(".linea-"+num_diente).hasClass("linea-activa"))
			{
				$(".linea-"+num_diente).removeClass("linea-activa");
			}
		}	

		/** OPCIONES DEL MENU **/

		$(".boton").click(function() {
			reset_opciones();
			$(this).addClass("active");
		});

		// Margen Gingival
		$(".opcion-1").click(function() {
			opcion = 1;
		});

		// Ausencia
		$(".opcion-2").click(function() {
			opcion = 2;
		});

		// Abceso
		$(".opcion-3").click(function() {
			opcion = 3;
		});

		// Contacto Abierto
		$(".opcion-4").click(function() {
			opcion = 4;
		});

		// Frenillo Alto
		$(".opcion-5").click(function() {
			opcion = 5;
		});

		// Reconstruccion
		$(".opcion-6").click(function() {
			opcion = 6;
		});

		// Protesis Fija
		$(".opcion-7").click(function() {
			opcion = 7;
		});

		// Protesis Removible
		$(".opcion-8").click(function() {
			opcion = 8;
		});

		// Obturacion Mal Ajustada
		$(".opcion-9").click(function() {
			opcion = 9;
		});

		// Faceta de Desgaste
		$(".opcion-10").click(function() {
			opcion = 10;
		});

		// Bolsas Parodontales
		$(".opcion-11").click(function() {
			opcion = 11;
		});

		// FUNCIONES POR ENCIMA DEL MOUSE **/

		$(".diente").hover(
			function(){
				if(opcion == 2){
					$(this).addClass("seleccionado");
				}
			}, 
			function(){
				if(opcion == 2){
					$(this).removeClass("seleccionado");
				}
			}
		);

		$(".contenedor-lineas").hover(
			function(){
				if(opcion == 3 || opcion == 11){
					$(this).addClass("seleccionado");
				}
			}, 
			function(){
				if(opcion == 3 || opcion == 11){
					$(this).removeClass("seleccionado");
				}
			}
		);		

		$(".linea").hover(
			function(){
				if(opcion == 1){
					$(this).addClass("linea-seleccionada");
				}
			}, 
			function(){
				if(opcion == 1){
					$(this).removeClass("linea-seleccionada");
				}
			}
		);	

		$(".contenedor-corona").hover(
			function(){
				if(opcion == 6 || opcion == 7 || opcion == 8 || opcion == 9 || opcion == 10){
					$(this).addClass("seleccionado");
				}
			}, 
			function(){
				if(opcion == 6 || opcion == 7 || opcion == 8 || opcion == 9 || opcion == 10){
					$(this).removeClass("seleccionado");
				}
			}
		);

		$(".corona-izq").hover(
			function(){
				if(opcion == 4){
					$(this).addClass("seleccionado");
				}
			}, 
			function(){
				if(opcion == 4){
					$(this).removeClass("seleccionado");
				}
			}
		);	

		$(".corona-der").hover(
			function(){
				if(opcion == 4){
					$(this).addClass("seleccionado");
				}
			}, 
			function(){
				if(opcion == 4){
					$(this).removeClass("seleccionado");
				}
			}
		);

		$(".frenillo-alto-arriba").hover(
			function(){
				if(opcion == 5){
					$(this).addClass("frenillo-activo-arriba");
				}
			}, 
			function(){
				if(opcion == 5){
					$(this).removeClass("frenillo-activo-arriba");
				}
			}
		);

		$(".frenillo-alto-abajo").hover(
			function(){
				if(opcion == 5){
					$(this).addClass("frenillo-activo-abajo");
				}
			}, 
			function(){
				if(opcion == 5){
					$(this).removeClass("frenillo-activo-abajo");
				}
			}
		);				

		/** FUNCIONES DE CLIC **/

		$(".diente").click(function(){	

			//encontrar el diente seleccionado
			for(var i = 1; i <= 64; i++){
				if($(this).hasClass("diente-"+i)){
					num_diente = i;
				}
			}	

			if(opcion == 2){
				if(!$(this).hasClass("ausente-"+num_diente)){
					reset_clases(num_diente);
					$(this).addClass("ausente-"+num_diente);
                    $("#arriba-padecimiento-"+num_diente).val("ausente");
				}
				else
				{
					$(this).removeClass("ausente-"+num_diente);
                    $("#arriba-padecimiento-"+num_diente).val("0");
				}
			}
		});	

		$(".contenedor-lineas").click(function(){
			//encontrar el diente seleccionado
			for(var i = 1; i <= 64; i++){
				if($(this).hasClass("contenedor-lineas-"+i)){
					num_diente = i;
				}
			}

			if(opcion == 3){			

				if(!$(this).hasClass("abceso-"+num_diente))
				{
					reset_diente(num_diente);
					reset_contenedor_lineas(num_diente);
					$(this).addClass("abceso-"+num_diente);
                    $("#arriba-padecimiento-"+num_diente).val("abceso");
				}
				else
				{
					$(this).removeClass("abceso-"+num_diente);
                    $("#arriba-padecimiento-"+num_diente).val("0");
				}
			}	

			if(opcion == 11){

				if(!$(this).hasClass("bolsa-parodontal-"+num_diente))
				{
					reset_contenedor_lineas();
					$(this).addClass("bolsa-parodontal-"+num_diente);
                    $("#arriba-padecimiento-"+num_diente).val("bolsa-parodontal");
				}
				else
				{
					$(this).removeClass("bolsa-parodontal-"+num_diente);
                    $("#arriba-padecimiento-"+num_diente).val("0");
				}
			}
		});

		$(".linea").click(function()
		{
			//encontrar el diente seleccionado
			for(var i = 1; i <= 64; i++){
				if($(this).hasClass("linea-"+i)){
					num_diente = i;
				}				
			}

			if(opcion == 1)
			{
				reset_lineas(num_diente);
				$(this).addClass("linea-activa");	
                campo_id = $(this).attr('id');
                num_campo = campo_id.substr(campo_id.length - 2);
                $("#margen-"+num_diente).val(num_campo);
			}			
		});	

		$(".contenedor-corona").click(function(){

			//encontrar el diente seleccionado
			for(var i = 1; i <= 64; i++){
				if($(this).hasClass("contenedor-corona-"+i)){
					num_diente = i;
				}				
			}

			if(opcion == 6)
			{
				if(!$(this).hasClass("reconstruccion-"+num_diente))
				{
					reset_contenedor_corona(num_diente);
					$(this).addClass("reconstruccion-"+num_diente);	
                    $("#abajo-padecimiento-"+num_diente).val("reconstruccion");
				}
				else
				{
					$(this).removeClass("reconstruccion-"+num_diente);	
                    $("#abajo-padecimiento-"+num_diente).val("0");
				}
			}	

			if(opcion == 7)
			{
				if(!$(this).hasClass("protesis-fija-"+num_diente))
				{
					reset_contenedor_corona(num_diente);
					$(this).addClass("protesis-fija-"+num_diente);
                    $("#abajo-padecimiento-"+num_diente).val("protesis-fija");
				}
				else
				{
					$(this).removeClass("protesis-fija-"+num_diente);	
                    $("#abajo-padecimiento-"+num_diente).val("0");
				}
			}

			if(opcion == 8)
			{
				if(!$(this).hasClass("protesis-removible-"+num_diente))
				{
					reset_contenedor_corona(num_diente);
					$(this).addClass("protesis-removible-"+num_diente);	
                    $("#abajo-padecimiento-"+num_diente).val("protesis-removible");
				}
				else
				{
					$(this).removeClass("protesis-removible-"+num_diente);	
                    $("#abajo-padecimiento-"+num_diente).val("0");
				}
			}

			if(opcion == 9)
			{
				if(!$(this).hasClass("obt-mal-ajustada-"+num_diente))
				{
					reset_contenedor_corona(num_diente);
					$(this).addClass("obt-mal-ajustada-"+num_diente);
                    $("#abajo-padecimiento-"+num_diente).val("obt-mal-ajustada");
				}
				else
				{
					$(this).removeClass("obt-mal-ajustada-"+num_diente);
                    $("#abajo-padecimiento-"+num_diente).val("0");
				}
			}

			if(opcion == 10)
			{
				if(!$(this).hasClass("faceta-desgaste-"+num_diente))
				{
					reset_contenedor_corona(num_diente);
					$(this).addClass("faceta-desgaste-"+num_diente);
                    $("#abajo-padecimiento-"+num_diente).val("faceta-desgaste");
				}
				else
				{
					$(this).removeClass("faceta-desgaste-"+num_diente);	
                    $("#abajo-padecimiento-"+num_diente).val("0");
				}
			}
		});	

		$(".corona-izq").click(function()
		{
			//encontrar el diente seleccionado
			for(var i = 1; i <= 64; i++){
				if($(this).hasClass("corona-izq-"+i)){
					num_diente = i;
				}				
			}

			if(opcion == 4)
			{
				if(!$(".contenedor-corona-"+num_diente).hasClass("seleccionado-izq")) 
				{
					$(".contenedor-corona-"+num_diente).addClass("seleccionado-izq");
                    $("#izq-padecimiento-"+num_diente).val("1");
				}
				else
				{
					$(".contenedor-corona-"+num_diente).removeClass("seleccionado-izq");
                    $("#izq-padecimiento-"+num_diente).val("0");
				}			
			}
		});

		$(".corona-der").click(function(){

			//encontrar el diente seleccionado
			for(var i = 1; i <= 64; i++){
				if($(this).hasClass("corona-der-"+i)){
					num_diente = i;
				}				
			}

			if(opcion == 4){
				if(!$(".contenedor-corona-"+num_diente).hasClass("seleccionado-der")) {
					$(".contenedor-corona-"+num_diente).addClass("seleccionado-der");
                    $("#der-padecimiento-"+num_diente).val("1");
				}else{
					$(".contenedor-corona-"+num_diente).removeClass("seleccionado-der");
                    $("#der-padecimiento-"+num_diente).val("0");
				}			
			}
		});

		$(".frenillo-alto-arriba").click(function(){

			//encontrar el frenillo seleccionado
			for(var i = 1; i <= 64; i++){
				if($(this).hasClass("frenillo-alto-arriba-"+i)){
					num_frenillo = i;
				}				
			}

			if(opcion == 5){

				if($(this).hasClass("frenillo-seleccionado-arriba"))                 {
					$(this).removeClass("frenillo-seleccionado-arriba");
				}else{

					if($(".frenillo-alto-arriba-"+num_frenillo).hasClass("frenillo-seleccionado-arriba")) {
						$(".frenillo-alto-arriba-"+num_frenillo).removeClass("frenillo-seleccionado-arriba");
					}
					$(this).addClass("frenillo-seleccionado-arriba");
                    campo_id = $(this).attr('id');
                    num_campo = campo_id.substr(campo_id.length - 2);
                    $("#frenillo-"+num_frenillo).val(num_campo);
				}				
			}
		});

		$(".frenillo-alto-abajo").click(function(){

			//encontrar el frenillo seleccionado
			for(var i = 1; i <= 64; i++){
				if($(this).hasClass("frenillo-alto-abajo-"+i)){
					num_frenillo = i;
				}				
			}

			if(opcion == 5){
				
				if($(this).hasClass("frenillo-seleccionado-abajo")) {
					$(this).removeClass("frenillo-seleccionado-abajo");
				}	
				else{

					if($(".frenillo-alto-abajo-"+num_frenillo).hasClass("frenillo-seleccionado-abajo")) {
						$(".frenillo-alto-abajo-"+num_frenillo).removeClass("frenillo-seleccionado-abajo");
					}

					$(this).addClass("frenillo-seleccionado-abajo");
				}				
			}
		});		

	} // Fin Periodontograma
}); // Fin document ready