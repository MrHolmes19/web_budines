<!--Comando para creacion de PDF del pedido individual -->

<?php
require "../../vendor/autoload.php";
use Dompdf\Dompdf;
$pdf = new Dompdf();
ob_start();
include_once "contenidoPedidoPDF.php";
$html=ob_get_clean();
$pdf->loadHtml($html);
$pdf->setPaper("A4", "portrait");
$pdf->render();
$pdf->stream('my.pdf',array('Attachment'=>0));