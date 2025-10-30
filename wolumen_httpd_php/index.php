<?php
	require_once("klasy/strona.php");
	if(!isset($_SESSION)) session_start();
	$strona = new Strona();
	$wybrana_strona = filter_input(INPUT_POST, 'wybrana_strona');

	if( file_exists("strony/$wybrana_strona.php") )
		require_once("strony/$wybrana_strona.php");
	else
		require_once("strony/".$strona->get_strona_domyslna().".php");
	
	$strona->set_naglowek($strona_naglowek);
	$strona->set_tresc($strona_tresc);
	if(isset($strona_wynik))
		$strona->set_wynik($strona_wynik);
	if(isset($_SESSION["zalogowany"]))
		$strona->set_zalogowany("Zalogowano jako ".$_SESSION['zalogowany']);
	$strona->pokaz_html();
?>