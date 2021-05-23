<?php
// Comando para creacion de PDF de todos los pedidos
require "../../vendor/autoload.php";
use Dompdf\Dompdf;
$pdf = new Dompdf();
ob_start();
include_once "contenidoTablaPDF.php";
$html=ob_get_clean();
$pdf->loadHtml($html);
$pdf->setPaper("A3", "landscape");
$pdf->render();
$pdf->stream('my.pdf',array('Attachment'=>0));