#!/usr/bin/env bash

# Vagrant VM provision script

provisioningStartTime=`date +%s`
echo ""
echo "Starting Vagrant provision script"

## Pre-requesites
# Since we have 512mb RAM it's recommended to enable swap before we run any command.
/vagrant/vagrant/scripts/swap.sh

# All environments should be running in one timezone, use Europe/Moscow as default.
sudo bash -c 'echo "Europe/Moscow" > /etc/timezone'
sudo dpkg-reconfigure -f noninteractive tzdata

# /vagrant directory is a synced folder (see config.vm.synced_folder in Vagrantfile)
# Let's store all important info in this driectory.
cd /vagrant

# First of all, upgrade system packages.
sudo apt-get update
sudo apt-get dist-upgrade -y

# Add required repositories
sudo LC_ALL=C.UTF-8 add-apt-repository ppa:ondrej/php -y
sudo apt-get update

## Install core packages.
sudo apt-get install software-properties-common python-software-properties -y
sudo apt-get install unzip -y
sudo apt-get install git-core -y
sudo apt-get install nginx -y
sudo apt-get install memcached -y

# MySQL Server
# We're generating random string here that will be used as MySQL's root user password.
# It will be stored in /vagrant/mysql-password.txt.
MYSQL_ROOT_PWD=$(cat /dev/urandom | tr -dc 'a-zA-Z0-9' | fold -w 32 | head -n 1)
sudo echo $MYSQL_ROOT_PWD>./mysql-password.txt
sudo debconf-set-selections <<< "mysql-server mysql-server/root_password password $MYSQL_ROOT_PWD"
sudo debconf-set-selections <<< "mysql-server mysql-server/root_password_again password $MYSQL_ROOT_PWD"
sudo apt-get install mysql-server -y

# PHP 7.0 is our primary PHP version.
sudo apt-get install php7.0-fpm -y
sudo apt-get install php7.0-dev -y

# PHP's curl & memcached extensions.
sudo apt-get install php7.0-mysql -y
sudo apt-get install php7.0-curl -y
sudo apt-get install php7.0-memcached -y
sudo apt-get install php7.0-mbstring -y
sudo apt-get install php7.0-xml -y
sudo apt-get install php7.0-gd -y
sudo apt-get install php7.0-zip -y

# Additional extensions.
sudo pecl channel-update pecl.php.net
sudo pecl install zip
sudo pear install Mail
sudo pear install Net_SMTP

# PHPUnit for testing our code.
wget https://phar.phpunit.de/phpunit.phar
chmod +x phpunit.phar
sudo mv phpunit.phar /usr/local/bin/phpunit

# Composer is our dependency manager.
curl -sS https://getcomposer.org/installer | sudo php -- --install-dir=/usr/local/bin --filename=composer

# php-cs-fixer is used to fix PHP code styles in our sources before commit.
wget http://get.sensiolabs.org/php-cs-fixer.phar -O php-cs-fixer
sudo chmod a+x php-cs-fixer
sudo mv php-cs-fixer /usr/local/bin/php-cs-fixer

# As of June 9, 2016 there's a bug on sensiolabs.org:
# instead of installing stable release of php-cs-fixer
# it installs 2.0-DEV version.
# Use php-cs-fixer selfupdate to install stable release.
# https://github.com/FriendsOfPHP/PHP-CS-Fixer/issues/1925#issuecomment-224208657
php-cs-fixer selfupdate

# NVM installation script
/vagrant/vagrant/scripts/install-nvm.sh

## Configs
# Add nginx vhosts.
sudo rm /etc/nginx/sites-enabled/default
sudo rm /etc/nginx/sites-available/default
sudo ln -s /vagrant/vagrant/configs/nginx/nenaprasno.ru.conf /etc/nginx/sites-enabled/nenaprasno.ru.conf
sudo ln -s /vagrant/vagrant/configs/nginx/media.nenaprasno.ru.conf /etc/nginx/sites-enabled/media.nenaprasno.ru.conf
sudo ln -s /vagrant/vagrant/configs/nginx/mediadev.nenaprasno.ru.conf /etc/nginx/sites-enabled/mediadev.nenaprasno.ru.conf
sudo ln -s /vagrant/vagrant/configs/nginx/hso.nenaprasno.ru.conf /etc/nginx/sites-enabled/hso.nenaprasno.ru.conf

# bitrix symlinks
ln -s /vagrant/nenaprasno.ru/public/bitrix/ /vagrant/media.nenaprasno.ru/public/bitrix
ln -s /vagrant/nenaprasno.ru/public/upload/ /vagrant/media.nenaprasno.ru/public/upload

ln -s /vagrant/nenaprasno.ru/public/bitrix/ /vagrant/mediadev.nenaprasno.ru/public/bitrix
ln -s /vagrant/nenaprasno.ru/public/upload/ /vagrant/mediadev.nenaprasno.ru/public/upload

ln -s /vagrant/nenaprasno.ru/public/bitrix/ /vagrant/hso.nenaprasno.ru/public/bitrix
ln -s /vagrant/nenaprasno.ru/public/upload/ /vagrant/hso.nenaprasno.ru/public/upload

# Add some php.ini tweak.
sudo ln -s /vagrant/vagrant/configs/php.ini /etc/php/7.0/fpm/conf.d/00-php.ini
sudo ln -s /vagrant/vagrant/configs/php.ini /etc/php/7.0/cli/conf.d/00-php.ini

# Export some paths to $PATH env variable.
echo 'export PATH="$PATH:/usr/local/bin"' >> ~/.bashrc
echo 'export PATH="$PATH:$HOME/.composer/vendor/bin"' >> ~/.bashrc
source ~/.bashrc

## Init scripts
# Create default MySQL user & database.
mysql -u root -p$MYSQL_ROOT_PWD < ./vagrant/startup/init-mysql.sql

## Node JS install
curl -sL https://deb.nodesource.com/setup_8.x | sudo -E bash -
sudo apt-get install -y nodejs

## Finish
# Cleanup unused packages.
sudo apt-get autoremove -y

# Restart services.
sudo service nginx restart
sudo service php7.0-fpm restart

# Ok, we're ready.
provisioningEndTime=`date +%s`
provisioningRunTime=$((provisioningEndTime-provisioningStartTime))
provisioningMinutes=$((provisioningRunTime/60))
echo ""
echo "Provisioned in $provisioningMinutes minutes"
