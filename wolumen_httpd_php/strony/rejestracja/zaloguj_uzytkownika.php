<?php
	require_once("klasy/baza_danych.php");
	$baza_danych = new Baza_danych("172.0.0.2", "root", "root", "uzytkownicy");
	$strona_wynik = $baza_danych->zaloguj_uzytkownika($_POST['uzytkownik'], $_POST['haslo']);
	require_once("strony/formularz.php");
?>