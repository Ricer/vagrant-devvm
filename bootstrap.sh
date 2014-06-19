#!/usr/bin/env bash

uwcarpool_dump = /var/www/dump.sql
uwschedule_dump = /var/www/dump.sql

#create databases and users  
echo "creating UWCarpool User"
mysql -u root --password="root" -h localhost < /vagrant/user.sql


#import dump
echo "importing SQL dump"
mysql -u root --password="root" -h localhost carpoolfinder < $uwcarpool_dump
mysql -u root --password="root" -h localhost carpoolfinder < $uwschedule_dump