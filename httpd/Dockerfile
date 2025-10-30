ARG WERSJA_HTTPD=""
FROM httpd:${WERSJA_HTTPD}-alpine

COPY httpd_mod.conf /usr/local/apache2/conf/httpd_mod.conf
RUN echo "Include /usr/local/apache2/conf/httpd_mod.conf" >> /usr/local/apache2/conf/httpd.conf