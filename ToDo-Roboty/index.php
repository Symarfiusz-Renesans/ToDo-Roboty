<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Lista Zadań</title>
	<link rel="stylesheet" href="styl.css">
</head>
<body>
	<?php

		function sprawdz($etap){
			$nazwaSerwera = 'localhost';
			$uzytkownik = 'root';
			$haslo = '';
			$nazwaBazy = 'dozrobienia';

			$polaczenie = mysqli_connect($nazwaSerwera, $uzytkownik, $haslo, $nazwaBazy);

			if (!$polaczenie) {
				die('Invalid query: ' . mysql_error());
			}

			//------------------------------------

			$WezWszystkieDane = 'SELECT * FROM `listazadan`';
			
			$wykonajWWD = $polaczenie->query($WezWszystkieDane);

			if ($wykonajWWD->num_rows > 0) {
				while ($wiersz = $wykonajWWD->fetch_assoc()) {
					$styl;

				switch ($wiersz['poziomWazno']) {
					case 1:
						$styl = 'racz';
						break;
				
					case 2:
						$styl = 'spac';
						break;

					case 3:
						$styl = 'truc';
						break;
					
					case 4:
						$styl = 'spri';
						break;

					case 5:
						$styl = 'doda';
					}

					if ($wiersz["etapZadania"] == $etap) {
						echo '<div class="elem '.$styl.'">
							<h2 class="tytul">'.$wiersz["tytul"].'</h2>
							<p>'.$wiersz["tresc"].'</p>
							<div class="opcje">	
								<a href="przenies.php?id='.$wiersz["idZadania"].'&etap='.$wiersz["etapZadania"].'">Przenieś</a>
								<a href="usun.php?id='.$wiersz["idZadania"].'">Usuń</a>
							</div>
						</div>';
					}
				}
			}
		}
	?>
	<header>
		<h1>ToDo Roboty!</h1>
	</header>
	<div id="glowna">
		<section id="menu" class="wGlownym">
			<form id="dodaj" action="nowy.php" method="post">
				<h3>Dodaj Zadanie</h3>
				<input type="text" name="tytul" max=50 min=1 placeholder="Tytuł">
				<input type="text" name="tresc" placeholder="Treść">
				<select name="waznosc">
					<option disabled selected>Wybierz ważność</option>
					<option value="racz">Raczkowanie</option>
					<option value="spac">Spacer</option>
					<option value="truc">Trucht</option>
					<option value="spri">Sprint</option>
					<option value="doda">Dodatek</option>
				</select><br>
				<button>POTWIERDŹ</button>
			</form>
			<?php
				if (isset($_GET['sukces'])) {
					if ($_GET['sukces'] == 'true') {
						echo "<p>Zadanie pomyślnie dodano!</p>";
					} else {
						echo"<p>Coś poszło nie tak. Spróbuj ponownie później.</p>";
					}
				}

				if (isset($_GET['usunieto'])) {
					if ($_GET['usunieto'] == 'true') {
						echo "<p>Zadanie pomyślnie usunięto!</p>";
					} else {
						echo"<p>Coś poszło nie tak. Spróbuj ponownie później.</p>";
					}
				}

				if (isset($_GET['przesunieto'])) {
					if ($_GET['przesunieto'] == 'true') {
						echo "<p>Zadanie pomyślnie przesunięto!</p>";
					} else {
						echo"<p>Coś poszło nie tak. Spróbuj ponownie później.</p>";
					}
				}
			?>
		</section>
		<section id="doZrobienia" class="wGlownym">
			<input type="text" placeholder="Szukaj Zadania" id="szukaj" onkeyup="szukaj(this.value)">
			<section id="etapy">
				<section class="etapZadania">
					<div class="etap"><h3>Do Zrobienia</h3></div>
					<div class="elementy">
						<?php
							sprawdz(1);
						?>
					</div>
				</section>
				<section class="etapZadania">
					<div class="etap"><h3>W trakcie</h3></div>
					<div class="elementy">
						<?php
							sprawdz(2);						
						?>
					</div>
				</section>
				<section class="etapZadania">
					<div class="etap"><h3>Sprawdzenie</h3></div>
					<div class="elementy">
						<?php
							sprawdz(3);
						?>
					</div>
				</section>
				<section class="etapZadania">
					<div class="etap"><h3>Ukończone</h3></div>
					<div class="elementy">
						<?php
							sprawdz(4);
						?>
					</div>
				</section>
			</section>
		</section>
	</div>

	<script type="text/javascript">
		
		function szukaj(str){
			if (str.length == 0) {
    		    document.querySelectorAll(".elem").forEach(a=>a.style.display = "block");
		    } else {
		    	document.querySelectorAll(".elem").forEach(a=>a.style.display = "none");

		    	let elem = document.getElementsByClassName("elem");
		    	for (var i = 0; i < elem.length; i++) {
		    		let tytul = document.getElementsByClassName("tytul")[i].innerHTML;
		    		console.log(tytul.value,elem,str);
		    		for (var j = 0; j < tytul.length-str.length; j++) {
		    			let t = String(tytul).substring(str.length, j);
		    			if (t.toLowerCase() == String(str).toLowerCase()) {
		    				elem[i].style.display = "block";
		    			}
		    		}
		    	}
		    }   
	    }
	</script>
</body>
</html>