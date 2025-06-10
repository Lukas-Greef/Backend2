<?php
	$returnText = 'Je hebt nog niet gespeeld. Kies je wapen en druk op de Speel-knop.';
	if (heeftGebruikerGeldigeKeuzeGemaakt()) {
		$gebruikersKeuze = $_GET['gebruikerKeuze'];
		//Laat de computer een keuze maken
		$computerKeuze = laatComputerKiezen();
		//Speel het spel en geef het resultaat terug
		$returnText = "De server koos $computerKeuze. ";
		$resultaat = vergelijk($gebruikersKeuze, $computerKeuze);
		if($resultaat == 0) {
			$returnText .= 'Het resultaat is een Gelijkspel!';
		} else if($resultaat == 1) {
			$returnText .= 'Je hebt gewonnen!';
		} else {
			$returnText .= 'De server heeft gewonnen!';
		}
	}
?>

<!DOCTYPE html>
<html>
	<head><title>Experiment</title></head>
	<body>
		<h1>Steen, Papier, Schaar in PHP</h1>
		<form method="GET">
			<select name="gebruikerKeuze">
				<option value="rock" <?php echo isGeselecteerd('rock'); ?> >Steen</option>
				<option value="paper" <?php echo isGeselecteerd('paper'); ?> >Papier</option>
				<option value="scissors" <?php echo isGeselecteerd('scissors'); ?> >Schaar</option>
			</select>
			<input type="submit" value="Speel"></input>
		</form>
		<p><?php echo $returnText; ?></p>
	</body>
</html>

<?php
/**
 * Geeft TRUE terug als de gebruiker een geldige keuze heeft gemaakt
 */
function heeftGebruikerGeldigeKeuzeGemaakt() {
    return isset($_GET['gebruikerKeuze']) && in_array($_GET['gebruikerKeuze'], ["rock", "paper", "scissors"]);
}

/**
 * Geeft 'selected' terug als de gebruiker deze keuze heeft gemaakt
 */
function isGeselecteerd($keuze) {
	if (isset($_GET['gebruikerKeuze']) && $_GET['gebruikerKeuze'] === $keuze) {
		return 'selected';
	}
}

/**
 * Laat de computer een keuze maken
 * Geeft willekeurig: "rock", "paper" of "scissors" terug
 */
function laatComputerKiezen() {
    $nummerKeuze = rand(0, 2);
    if ($nummerKeuze == 0) {
        return "rock";
    }
    if ($nummerKeuze == 1) {
        return "paper";
    }
    return "scissors";
}

/**
 * Vergelijkt twee keuzes en geeft een getal terug dat het resultaat weergeeft:
 * 0 = Gelijkspel
 * 1 = $keuze1 wint
 * 2 = $keuze2 wint
 */
function vergelijk($keuze1, $keuze2) {
	if ($keuze1 === $keuze2) {
		return 0;
	}
	if ($keuze1 === 'rock') {
		if ($keuze2 === 'scissors') {
			return 1;
		} else {
			return 2;
		}
	}
	if ($keuze1 === 'paper') {
		if ($keuze2 === 'rock') {
			return 1;
		} else {
			return 2;
		}
	}
	if ($keuze1 === 'scissors') {
		if ($keuze2 === 'paper') {
			return 1;
		} else {
			return 2;
		}
	}
}
?>
