#!/bin/bash

#Write credentials from user data to wp-config
curl http://169.254.169.254/latest/user-data > ec2-user_data.txt
scripts/write_credentials_to_conf.pl wp-config.php
rm ec2-user_data.txt

#Fix file permissions
sudo chown -R apache /var/www
sudo chgrp -R apache /var/www
sudo chmod 2775 /var/www
find /var/www -type d -exec sudo chmod 2775 {} \;
find /var/www -type f -exec sudo chmod 0664 {} \;
