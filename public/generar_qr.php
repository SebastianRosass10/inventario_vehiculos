<?php
// require '../librerias/phpqrcode/qrlib.php'; // Cargar la librería
require '../librerias/phpqrcode-master/qrlib.php';

// URL que quieres codificar en el QR (ajusta según la ruta en tu localhost)
$url = "http://192.168.1.102/INVENTARIO_VEHÍCULOS/vista/mini_login.php?qr=1";

// Generar el QR y guardarlo en un archivo temporal
$archivoQR = 'codigo_qr.png';
QRcode::png($url, $archivoQR, QR_ECLEVEL_L, 5, 2);

// Mostrar la imagen del QR
header('Content-Type: image/png');
readfile($archivoQR);
?>
