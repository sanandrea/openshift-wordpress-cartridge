#!/bin/bash

HTDOCS_DIR="/opt/bitnami/apps/wordpress/htdocs/"


#Write credentials from user data to wp-config
sudo curl http://169.254.169.254/latest/user-data > "${HTDOCS_DIR}scripts/ec2-user_data.txt"
sudo chmod +x "${HTDOCS_DIR}scripts/write_credentials_to_conf.pl"
sudo "${HTDOCS_DIR}/scripts/write_credentials_to_conf.pl" "${HTDOCS_DIR}wp-config.php"
sudo rm "${HTDOCS_DIR}scripts/ec2-user_data.txt"

#Fix file permissions
sudo chown -R bitnami $HTDOCS_DIR
sudo chgrp -R daemon $HTDOCS_DIR
sudo chmod 2775 $HTDOCS_DIR
find $HTDOCS_DIR -type d -exec sudo chmod 2775 {} \;
find $HTDOCS_DIR -type f -exec sudo chmod 0664 {} \;
