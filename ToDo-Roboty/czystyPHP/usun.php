<?php
	$nazwaSerwera = 'localhost';
	$uzytkownik = 'root';
	$haslo = '';
	$nazwaBazy = 'dozrobienia';

	$polaczenie = mysqli_connect($nazwaSerwera, $uzytkownik, $haslo, $nazwaBazy);

	$UsunZadanie = 'DELETE FROM `listazadan` WHERE idZadania = '.$_GET['id'];

	if ($polaczenie->query($UsunZadanie) === TRUE) {
		header('Location: ../index.php?usunieto=true');
	}else{
		header('Location: ../index.php?usunieto=false');
	}
?>