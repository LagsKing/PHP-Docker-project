<?php
	function stworz_galerie($liczba_kolumn, $liczba_wierszy){
		$galeria = "<table>";
		for($i=1; $i<=$liczba_wierszy; $i++){
			$galeria .= "<tr>";
			for($j=1; $j<=$liczba_kolumn; $j++){
				$numer = $i + $j;
				$galeria .= "<td><img src='obrazy/obraz$numer.jpg' alt='obraz numer $numer.'></td>";
			}
			$galeria .= "</tr>";
		}
		$galeria .= "</table>";
		return $galeria;
	}
	
	$strona_naglowek="Galeria";
	$strona_tresc=stworz_galerie(3, 3);
?>