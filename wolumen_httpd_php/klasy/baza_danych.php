<?php
class Baza_danych {
	private $polaczenie;

	public function __construct($host, $uzytkownik, $haslo, $nazwa_bazy) {
		$this->polaczenie = mysqli_connect($host, $uzytkownik, $haslo);
		$this->stworz_baze($nazwa_bazy);
	}
	
	public function stworz_baze($nazwa_bazy){
		mysqli_multi_query(
			$this->polaczenie,
			"CREATE DATABASE IF NOT EXISTS {$nazwa_bazy};
			USE {$nazwa_bazy};
			
			CREATE TABLE IF NOT EXISTS dane (
				id int NOT NULL AUTO_INCREMENT,
				email varchar(100) NOT NULL,
				imie varchar(100) NOT NULL,
				nazwisko varchar(255) NOT NULL,
				telefon varchar(20) NOT NULL,
				PRIMARY KEY (id)
			);

			CREATE TABLE IF NOT EXISTS uzytkownicy (
				id int NOT NULL AUTO_INCREMENT,
				uzytkownik varchar(100) NOT NULL,
				email varchar(100) NOT NULL,
				haslo varchar(255) NOT NULL,
				PRIMARY KEY (id)
			);"

		);
		do{
			$this->polaczenie->use_result();
		}while($this->polaczenie->next_result());
	}

	public function zarejestruj_uzytkownika($uzytkownik, $haslo, $email) {
		mysqli_query($this->polaczenie, "INSERT INTO uzytkownicy (uzytkownik, email, haslo) VALUES ('$uzytkownik', '$email', '$haslo');");
		mysqli_close($this->polaczenie);
		$_SESSION['zalogowany'] = $uzytkownik;
			return "Zarejestrowano i zalogowano nowego użytkownika!";
	}

	public function zaloguj_uzytkownika($uzytkownik, $haslo) {
		unset($_SESSION['zalogowany']);
		$czy_uzytkownik_istnieje = mysqli_query($this->polaczenie, "SELECT id FROM uzytkownicy WHERE uzytkownik='$uzytkownik' AND haslo='$haslo';")->num_rows;
		mysqli_close($this->polaczenie);
		if($czy_uzytkownik_istnieje){
			$_SESSION['zalogowany'] = $uzytkownik;
			return "Dane logowania są poprawne!";
		}
		else
			return "Dane logowania są niepoprawne!";
	}

	public static function wyloguj_uzytkownika() {
		if(isset($_SESSION['zalogowany'])){
			unset($_SESSION['zalogowany']);
			session_destroy();
			return "Użytkownik został wylogowany!";
		}
		else
			return "Użytkownik nie był i nie jest zalogowany!";
	}
	
	public function zapisz_dane($email, $imie, $nazwisko, $telefon) {
		mysqli_query($this->polaczenie, "INSERT INTO dane (email, imie, nazwisko, telefon) VALUES ('$email', '$imie', '$nazwisko', '$telefon');");
		mysqli_close($this->polaczenie);
		return "Dodano nowe dane!";
	}
	
	public function pokaz_dane() {
		$wynik = mysqli_query($this->polaczenie, "SELECT * FROM dane;");
		mysqli_close($this->polaczenie);
		if ($wynik->num_rows == 0)
			return "Tabela nie zawiera danych!";
		else{
			$tabela = "
				<table>
					<tr>
						<th>Email</th>
						<th>Imie</th>
						<th>Nazwisko</th>
						<th>Telefon</th>
					</tr>
			";
			while($rekord = mysqli_fetch_assoc($wynik)) {
				$tabela .= "
					<tr>
						<td>".$rekord['email']."</td>
						<td>".$rekord['imie']."</td>
						<td>".$rekord['nazwisko']."</td>
						<td>".$rekord['telefon']."</td>
					</tr>
				";
			}
			$tabela .= "</table>";
			return $tabela;
		}
	}
	
	public function edytuj_dane($email, $imie, $nazwisko, $telefon) {
		$wynik = mysqli_query($this->polaczenie, "UPDATE dane SET imie='$imie', nazwisko='$nazwisko', telefon='$telefon' WHERE email='$email';");
		mysqli_close($this->polaczenie);
		if($wynik)
			return "Dane zostały zmienione!";
		return "Błąd w trakcie edytowania danych!";
	}
	
	public function usun_dane() {
		$wynik = mysqli_query($this->polaczenie, "DELETE FROM dane;");
		mysqli_close($this->polaczenie);
		if($wynik)
			return "Dane zostały usunięte!";
		return "Błąd w trakcie usuwania danych!";
	}
}
?>
