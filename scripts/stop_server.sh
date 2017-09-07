#!/bin/bash
isExistApp=`pgrep httpd`
if [[ -n  $isExistApp ]]; then
   service httpd stop
else 
	echo "The httpd service is not running. No action taken"
fi

isExistApp=`pgrep mysqld`
if [[ -n  $isExistApp ]]; then
    service mysqld stop
else 
	echo "The mysqld service is not running. No action taken"
fi
