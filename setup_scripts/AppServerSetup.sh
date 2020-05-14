#sets up app side server 

#run quick updates just in case
sudo apt-get upgrade -y
sudo apt-get upgrade -y


#Cover our bases just in case
sudo apt install git 
sudo apt install net-tools

#clone git repos 
git clone https://github.com/nataliesb17/it490.git FantasyPokemon
git clone https://github.com/MattToegel/IT490.git IT490Copy


#Apache handling
sudo apt install apache2
sudo ufw allow 'Apache'
sudo ufw status
sudo systemctl status apache2 

#ssh
sudo apt install openssh-server
sudo systemctl status ssh
sudo ufw allow ssh

#php
sudo apt install php
sudo apt install php-mbstring
sudo apt install php libapache2-mod-php
sudo systemctl restart apache2

#composer
sudo apt install composer
composer require php-amqplib/php-amqplib

#Handling rsyslog for you 
cd FantasyPokemon
cd Rsyslog
chmod +x setupRsyslogClient.sh
./setupRsyslogClient.sh


