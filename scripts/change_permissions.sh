#!/bin/bash

#Write credentials from user data to wp-config
sudo curl http://169.254.169.254/latest/user-data > ec2-user_data.txt
sudo chmod +x scripts/write_credentials_to_conf.pl 
sudo scripts/write_credentials_to_conf.pl /var/www/html/wp-config.php
sudo rm ec2-user_data.txt

#Fix file permissions
sudo chown -R apache /var/www
sudo chgrp -R apache /var/www
sudo chmod 2775 /var/www
find /var/www -type d -exec sudo chmod 2775 {} \;
find /var/www -type f -exec sudo chmod 0664 {} \;
