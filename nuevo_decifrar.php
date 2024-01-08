<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $llavePrivadaString = file_get_contents('privada.key');
        $llavePrivada = openssl_get_privatekey($llavePrivadaString);
        //linea agregada comprobar la llave
        //var_dump($llavePrivada);

        if (!$llavePrivada) {
            die('La clave privada no es válida');
        }

        $textoCifrado = base64_decode(file_get_contents($_FILES['textoCifrado']['tmp_name']));

        $descifrado = '';

        if (!openssl_private_decrypt($textoCifrado, $descifrado, $llavePrivada)) {
            die("Fallo al descifrar");
        }

        echo "Texto descifrado: " . $descifrado;

        file_put_contents('textoOriginal.txt', $descifrado);
    }
?>



