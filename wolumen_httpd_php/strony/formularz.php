<?php
	$strona_naglowek="";
	$strona_tresc="";
	if(isset($_SESSION['zalogowany'])){
		$strona_naglowek="Formularz";
		$strona_tresc="
			<article class='srodek'>
				<form method='post' id='A'>
					Email:<br/>
						<input type='email' name='email' id='email' placeholder='email@email.com' required/>
					<br/>Imię:<br/>
						<input type='text' name='imie' id='imie' pattern='[a-zA-ZąćęłńóśżźĄĆĘŁŃÓŚŻŹ]+(-+[a-zA-ZąćęłńóśżźĄĆĘŁŃÓŚŻŹ]+)?' required/>
					<br/>Nazwisko:<br/>
						<input type='text' name='nazwisko' id='nazwisko' pattern='[a-zA-ZąćęłńóśżźĄĆĘŁŃÓŚŻŹ]+(-+[a-zA-ZąćęłńóśżźĄĆĘŁŃÓŚŻŹ]+)?' required/>
					<br/>Telefon:<br/>
						<input type='number' name='telefon' id='telefon' placeholder='123123123' required/>
					<br/><br/>
						<button type='submit' name='wybrana_strona' value='formularz/zapisz_dane'>Zapisz</button>
						<button type='submit' name='wybrana_strona' value='formularz/edytuj_dane'>Edytuj dane</button>
				</form>
				<form method='post'>
						<button type='submit' name='wybrana_strona' value='formularz/pokaz_dane'>Pokaż wszystkie</button>
						<button type='submit' name='wybrana_strona' value='formularz/usun_dane'>Usuń dane</button>
				</form>
			</article>
		";
	}
	else
		require_once("strony/rejestracja.php");
?>