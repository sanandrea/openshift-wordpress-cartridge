#!/bin/bash
chown -R ec2-user:apache /var/www/html/WordPress
find /var/www/html/WordPress -type f -exec chmod -R 644 {} \;
find /var/www/html/WordPress -type d -exec chmod -R 754 {} \;
#chmod -R 644 /var/www/html/WordPress
chown -R root:root /var/www/html/WordPress/scripts
chmod -R 750 /var/www/html/WordPress/scripts 
