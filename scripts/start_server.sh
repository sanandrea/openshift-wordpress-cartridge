#!/bin/bash
service httpd start
service mysqld start
curl http://169.254.169.254/latest/user-data -o udata.sh
chmod +x udata.sh
source udata.sh
