<?php
	$strona_naglowek="Rejestracja";
	$strona_tresc="
		<form action='' method='post'>
			<h2>Zarejestruj się</h2>
			<p>
				<input type='text' name='uzytkownik' placeholder='Użytkownik' required>
				<br/>
			</p>
			<p>
				<input type='password' name='haslo' placeholder='Hasło' required>
				<br/>
			</p>
			<p>
				<input type='email' name='email' placeholder='Email' required>
				<br/>
			</p>
			<p>
				<button type='submit' name='wybrana_strona' value='rejestracja/zarejestruj_uzytkownika'>Zarejestruj się</button>
			</p>
		</form>
		<form action='' method='post'>
			<h2>Masz już konto?</h2>
			<p>
				<input type='text' name='uzytkownik' placeholder='Użytkownik' required>
				<br/>
			</p>
			<p>
				<input type='password' name='haslo' placeholder='Hasło' required>
				<br/>
			</p>
			<p>
				<button type='submit' name='wybrana_strona' value='rejestracja/zaloguj_uzytkownika'>Zaloguj się</button>
			</p>
		</form>
		<form action='' method='post'>
			<h2>Wyloguj się</h2>
			<p>
				<button type='submit' name='wybrana_strona' value='rejestracja/wyloguj_uzytkownika'>Wyloguj się</button>
			</p>
		</form>
	";
?>