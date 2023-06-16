<?php
	$nazwaSerwera = 'localhost';
	$uzytkownik = 'root';
	$haslo = '';
	$nazwaBazy = 'dozrobienia';

	$polaczenie = mysqli_connect($nazwaSerwera, $uzytkownik, $haslo, $nazwaBazy);
	$liczba = $_GET['etap']+1;
	$wezElement = 'UPDATE listazadan SET etapZadania = '.$liczba.' WHERE idZadania ='.$_GET['id'];

	if ($polaczenie->query($wezElement) === TRUE) {
		header('Location: index.php?przesunieto=true');
	}else{
		header('Location: index.php?przesunieto=false');
	}
?>