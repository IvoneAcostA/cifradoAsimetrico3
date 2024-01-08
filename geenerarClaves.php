<?php
	$detalles= array(
		"digest_alg" => "sha512",
		"private_key_bits" => 4096,
		"private_key_type" => OPENSSL_KEYTYPE_RSA, 
	);

	$RecursoLLavePrivada= openssl_pkey_new($detalles);


	if(!$RecursoLLavePrivada){
		die('Error al generar la llave privada');
	}

	openssl_pkey_export($RecursoLLavePrivada, $llavePrivada);

	$detalleLlave = openssl_pkey_get_details($RecursoLLavePrivada);

	$llavePublica = $detalleLlave["key"];

	file_put_contents('privada.key', $llavePrivada);

	file_put_contents('publica.key', $llavePublica);

	echo 'LLaves generadas con exito';

?>