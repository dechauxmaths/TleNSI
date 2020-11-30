#! /bin/bash

apt install apache2 postgresql php7.4 curl -y
apt-get install php-pgsql
# demarrage automatique des services
systemctl enable apache2@.service
systemctl enable postgresql@

#
# Setup pgadmin
#

# Install the public key for the repository (if not done previously):
curl https://www.pgadmin.org/static/packages_pgadmin_org.pub | sudo apt-key add

# Create the repository configuration file:
sudo sh -c 'echo "deb https://ftp.postgresql.org/pub/pgadmin/pgadmin4/apt/$(lsb_release -cs) pgadmin4 main" > /etc/apt/sources.list.d/pgadmin4.list && apt update'

#
# Install pgAdmin
#

# Install for desktop mode only:
sudo apt install pgadmin4-desktop

# Install vscode
sudo snap install --classic code

mkdir /var/www/html/projet
chmod 777 /var/www/html/projet

sudo -u postgres psql -c  "ALTER USER postgres WITH PASSWORD 'nsi'"


