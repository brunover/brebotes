<?php
date_default_timezone_set('America/Recife');
echo(date('Y-m-d'));

$contentFolder = str_replace("//", "/", "/conteudo/");

$success = file_put_contents ( $contentFolder."/teste.json" , "agora substituiu" );

if ($success) {
	echo "<br><br>Salvou arquivo!";
} else {
	echo "<br><br>Deu ruim...";
}

?>