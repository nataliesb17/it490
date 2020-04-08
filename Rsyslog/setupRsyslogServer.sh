#installs rsyslog
sudo apt install rsyslog

#configures rsyslog to start at the beginning
sudo systemctl start rsyslog
sudo systemctl enable rsyslog
#sudo systemctl status rsyslog


#copies the already set up file for the RabbitMQ server
sudo cp rsyslogServer.conf /etc/rsyslog.conf

#restarting the the rsyslog daemon
sudo systemctl restart rsyslog
