#!/bin/sh

##sudo -s

apt install apache2 -y



apt install php libapache2-mod-php -y

systemctl restart apache2

rm main.zip

wget https://github.com/kevacointoolkit/kpress/archive/refs/heads/main.zip --no-check-certificate

rm -rf kpress-main/*

apt install unzip

rm -rf /var/www/html/*

unzip main.zip

cp kpress-main/* /var/www/html/ -r

sudo apt-get install php-bcmath -y

sudo apt-get install php-curl -y

service apache2 reload

cd /var/www/

chmod 777 * -R

