<?php
	$nazwaSerwera = 'localhost';
	$uzytkownik = 'root';
	$haslo = '';
	$nazwaBazy = 'dozrobienia';

	$polaczenie = mysqli_connect($nazwaSerwera, $uzytkownik, $haslo, $nazwaBazy);

	if (!$polaczenie) {
		die('Invalid query: ' . mysql_error());
	}

	$tytul = $_POST['tytul'];
	$tresc = $_POST['tresc'];
	switch ($_POST['waznosc']) {
		case 'racz':
			$waznosc = 1;
			break;
		case 'spac':
			$waznosc = 2;
			break;
		case 'truc':
			$waznosc = 3;
			break;
		case 'spri':
			$waznosc = 4;
			break;
		case 'doda':
			$waznosc = 5;
			break;
	}

	$dodajZadanie = 'INSERT INTO `listazadan` (tytul, tresc, dataPowst, poziomWazno, etapZadania) VALUES ("'.$tytul.'", "'.$tresc.'", "'.date('Y-m-d').'", '.$waznosc.', 1)';
	if ($polaczenie->query($dodajZadanie) === TRUE) {
		header("Location: ../index.php?sukces=true");
	} else {
		header("Location: ../index.php?sukces=false");
	}
?>