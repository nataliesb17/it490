#sets up rabbitMQ server with the software that it needs
sudo apt-get upgrade -y
sudo apt-get update -y

sudo apt install -y php php-mbstring php-bcmath composer rsyslog git rabbitmq-server
