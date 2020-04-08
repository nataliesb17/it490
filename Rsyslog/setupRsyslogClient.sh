#start rsyslog on boot up of the VM
sudo systemctl start rsyslog
sudo systemctl enable rsyslog

#copies the client configuration
sudo cp rsyslogClient.conf /etc/rsyslog.conf

sudo systemctl restart rsyslog
