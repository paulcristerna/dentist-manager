<?php
	// get the HTML
    ob_start();
    include(dirname(__FILE__).'/total-egresos-generar.php');
    $content = ob_get_clean();

    // convert in PDF
    require_once(dirname(__FILE__).'/../../html2pdf.class.php');
    try
    {
        $html2pdf = new HTML2PDF('P', 'A4', 'es');
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
        $html2pdf->Output('total-egresos-fouas.pdf');
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }
