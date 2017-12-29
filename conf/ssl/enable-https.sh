#!bin/bash

# Convert web site from http to https
# Here, certificate is selfsigned

# Reference : www.digitalocean.com/community/tutorials/how-to-create-an-ssl-certificate-on-apache-for-centos-7

sudo systemctl enable httpd.service
sudo yum install mod_ssl

if [ ! -d "/etc/ssl/private" ]; then
  sudo mkdir /etc/ssl/private
fi

sudo cp ./apache-selfsigned.key /etc/ssl/private/apache-selfsigned.key
sudo cp ./apache-selfsigned.crt /etc/ssl/certs/apache-selfsigned.crt
sudo cp ./dhparam.pem /etc/ssl/certs/dhparam.pem

sudo cp ./ssl.conf /etc/httpd/conf.d/ssl.conf
sudo cp ./non-ssl.conf /etc/httpd/conf.d/non-ssl.conf

sudo systemctl restart httpd.service


