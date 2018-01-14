#!bin/bash

# This script launch all commands to install files in conf/
cd $(dirname $(readlink -f $0))

#Insallation 
sudo rm -rf /var/www/html
sudo cp -R html/ /var/www/html

sudo cp ./databases/database.sqlite /var/www/databases/

sudo chown -R sti:apache /var/www/html
sudo chmod 775 -R /var/www/html
sudo /sbin/restorecon -R /var/www/html

# Make localhost in https
sudo bash ./conf/ssl/enable-https.sh

# Modification were made in conf file 
sudo rm /etc/httpd/conf/httpd.conf
sudo cp ./conf/httpd.conf /etc/httpd/conf/

# Requirements for captcha 
sudo yum install gd gd-devel php-gd

sudo systemctl enable httpd.service