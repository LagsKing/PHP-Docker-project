<?php
	class Strona {
		//pola klasy:
		protected $strona_domyslna = "podstawy_gry";
		protected $naglowek = "";
		protected $tresc = "";
		protected $wynik = "";
		protected $zalogowany = "";
		protected $nawigacja = array( 
			"Podstawy gry" => "podstawy_gry",
			"Galeria" => "galeria",
			"Formularz" => "formularz",
			"Rejestracja"=>"rejestracja"
		);
		
		//settery
		public function set_naglowek($naglowek){
			$this->naglowek = $naglowek;
		}
		
		public function set_tresc($tresc){
			$this->tresc = $tresc;
		}
		
		public function set_wynik($wynik){
			$this->wynik = $wynik;
		}
		
		public function set_zalogowany($zalogowany){
			$this->zalogowany = $zalogowany;
		}
		
		//gettery
		public function get_strona_domyslna(){
			return $this->strona_domyslna;
		}
		
		//funkcje wyświetlające stronę
		public function pokaz_html() {
			echo "
				<html>
					".$this->pokaz_head()
					.$this->pokaz_body()."
				</html>
			";
		}
		
		public function pokaz_head() {
			echo "
				<head>
					<meta charset='UTF-8'>
					<meta name='viewport' content='width=device-width, initial-scale=1.0'>
					<title>Szachy - królewska gra</title>
					<link rel='stylesheet' href='css/index.css' type='text/css'/>
				</head>
			";
		}
		
		public function pokaz_body() {
			echo "
				<body>
					<h2>$this->zalogowany</h2>
					".$this->pokaz_header()."
					$this->tresc
					<div id='wynik'>$this->wynik</div>
				</body>
			";
		}
		
		public function pokaz_header(){
			echo "
				<header>
					<h1>$this->naglowek</h1>
					".$this->pokaz_nav()."
				</header>
			";
		}
		
		public function pokaz_nav() {
			$przyciski = "";
			foreach($this->nawigacja as $napis => $wartosc){ 
				$przyciski .= "<button type='submit' name='wybrana_strona' value='$wartosc'>$napis</button>";
			}
			echo "
				<nav>
					<form action='' method='post'>
						$przyciski
					</form>
				</nav>
			";
		}
	}
?>