function validacion_entrada_material()
{
        if($("#sltproveedor").val()=="0")
	{
		$("#campo-error").html("<div class='alert alert-danger' id='error'>El <strong>Proveedor</strong> esta vacio, favor de llenarlo.</div>");
		$("#sltproveedor").focus();
		return false;
	}
        else if($("#folio-factura").val()=="")
	{
		$("#campo-error").html("<div class='alert alert-danger' id='error'>El <strong>Folio de Factura</strong> esta vacio, favor de llenarlo.</div>");
		$("#folio-factura").focus();
		return false;
	}
}