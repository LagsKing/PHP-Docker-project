<?php
	require_once("klasy/baza_danych.php");
	$strona_wynik = Baza_danych::wyloguj_uzytkownika();
	require_once("strony/podstawy_gry.php");
?>