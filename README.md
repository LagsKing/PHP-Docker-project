Projekt składa się z następujących folderów i plików:
	httpd - folder zawierający konfigurację kontenera 'httpd'
		Dockerfile - plik Dockerfile budujący obraz kontenera 'httpd'
		httpd_mod.conf - konfiguracja serwera WWW
	mysql - folder zawierający konfigurację kontenera 'mysql'
		Dockerfile - plik Dockerfile budujący obraz kontenera 'mysql'
	php - folder zawierający konfigurację kontenera 'php'
		Dockerfile - plik Dockerfile budujący obraz kontenera 'php'
	wolumen_httpd_php - folder/wolumen podłączony do kontenerów 'httpd' oraz 'php', przechowuje strony WWW oraz skrypty PHP; tworzony automatycznie jeśli go nie ma
		index.php - strona testująca działanie usługi LAMP
	wolumen_mysql - folder/wolumen podłączony do kontenera 'mysql', przechowuje zawartość bazy danych; tworzony automatycznie jeśli go nie ma
	.env - zmienne używane przez plik 'docker-compose.yml'
	docker-compose.yml - konfiguracja docker-compose

Użyte obrazy bazowe:
	httpd - httpd:2.4-alpine
	mysql - mysql:8.0
	php - php:8.0-fpm-alpine

Uwagi:
	Zamiast portu 6666, 'httpd' wystawia port 8080, ponieważ port 6666 to jeden z portów używanych przez usługę IRC i jest domyślnie blokowany przez przeglądarki.
	Połączenie się z serwerem WWW jest możliwe poprzez adresy 'http://localhost:8080/' oraz 'http://172.0.0.1'