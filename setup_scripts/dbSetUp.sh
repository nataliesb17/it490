sudo apt-get upgrade -y

sudo apt install git
sudo apt install net-tools

git clone https://github.com/nataliesb17/it490.git FantasyPokemon

sudo apt-get install mysql-server
mysql_secure_installation

sudo apt install openssh-server
sudo systemctl status ssh
sudo ufw allow ssh

sudo apt install php
sudo apt install php-mbstring

sudo apt install composer
composer require php-amqplib/php-amqplib
