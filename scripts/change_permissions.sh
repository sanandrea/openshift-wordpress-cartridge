#!/bin/bash
chown -R ec2-user:apache /var/www/html/WordPress
find /var/www/html -type f -exec chmod -R 644 {} \;
find /var/www/html -type d -exec chmod -R 754 {} \;
chown -R root:root /var/www/html/scripts
chmod -R 750 /var/www/html/scripts 
