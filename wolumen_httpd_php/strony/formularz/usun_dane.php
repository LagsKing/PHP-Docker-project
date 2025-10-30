<?php
	require_once("klasy/baza_danych.php");
	$baza_danych = new Baza_danych("172.0.0.2", "root", "root", "uzytkownicy");
	require_once("strony/formularz.php");
	$strona_wynik = $baza_danych->usun_dane();
?>