# Projekt LAMP (PHP + Apache + MySQL) na Docker-Compose

Prosta konfiguracja [Docker-Compose](https://docs.docker.com/compose/) do szybkiego uruchomienia środowiska deweloperskiego LAMP (Linux, **A**pache, **M**ySQL, **P**HP).

## Struktura Projektu 📂

Projekt wykorzystuje oddzielne kontenery dla każdej usługi (Apache, PHP-FPM, MySQL) i łączy je za pomocą `docker-compose`.

### Wolumeny

* `wolumen_httpd_php`: Współdzielony wolumen dla kontenerów `httpd` oraz `php`. Przechowuje strony WWW i skrypty PHP.
* `wolumen_mysql`: Wolumen podłączony do kontenera `mysql`. Przechowuje fizyczne pliki bazy danych.

*Uwaga: Oba wolumeny są tworzone automatycznie przez Docker-Compose przy pierwszym uruchomieniu, jeśli nie istnieją.*

---

## Konfiguracja ⚙️

### Użyte Obrazy Bazowe

* **Apache (httpd):** `httpd:2.4-alpine`
* **MySQL:** `mysql:8.0`
* **PHP:** `php:8.0-fpm-alpine`

### Zmienne Środowiskowe

W pliku `.env` definiowane są wrażliwe dane, takie jak hasło roota dla bazy MySQL, które są następnie wstrzykiwane do kontenerów przez `docker-compose.yml`.

---

## Uruchomienie 🚀

Upewnij się, że masz zainstalowanego Dockera oraz Docker-Compose.

1.  Sklonuj repozytorium (lub pobierz pliki).
2.  Przejdź do głównego katalogu projektu.
3.  Uruchom środowisko w tle:

    ```bash
    docker-compose up -d
    ```

Aby zatrzymać i usunąć kontenery:

```bash
docker-compose down
```
Dostęp 🌐
Po poprawnym uruchomieniu kontenerów, serwer WWW jest dostępny pod adresem:

http://localhost:8080/

Otworzenie tego adresu w przeglądarce powinno wyświetlić stronę index.php (domyślnie phpinfo()).
