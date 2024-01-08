<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
<?php
$llavePublica = $_POST['contenidoKey'];

$textoOriginal = $_POST['textoOriginal'];

$encriptado = '';

if (!empty($_FILES['textoCifrado']['tmp_name'])) {
    $archivoCifrado = $_FILES['textoCifrado']['tmp_name'];

    if (!openssl_public_encrypt(file_get_contents($archivoCifrado), $encriptado, $llavePublica)) {
        die("Hubo un problema en la encriptacion");
    }
} else {
    if (!openssl_public_encrypt($textoOriginal, $encriptado, $llavePublica)) {
        die("Hubo un problema en la encriptacion");
    }
}

$segundoEncriptado = base64_encode($encriptado);

file_put_contents('textoencriptado.txt', $segundoEncriptado);

echo "Texto encriptado correctamente";
?>
<h1>Descifrar</h1>
  <a href="decifrado_cargar.html">Ir a la página de descifrado</a>
</body>
</html>
