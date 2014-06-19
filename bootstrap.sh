#!/usr/bin/env bash

UWCARPOOL_DUMP = /var/www/uwcarpool/dump.sql
UWSCHEDULER_DUMP = /var/www/uwscheduler/dump.sql

#create databases and users
echo "creating UWCarpool User"
mysql -u root --password="root" -h localhost < /vagrant/user.sql


#import dump
echo "importing SQL dump"
if [ -d "$UWCARPOOL_DUMP" ]; then
  mysql -u root --password="root" -h localhost carpoolfinder < $UWCARPOOL_DUMP
fi
if [ -d "$UWSCHEDULER_DUMP" ]; then
  mysql -u root --password="root" -h localhost carpoolfinder < $UWSCHEDULER_DUMP
fi
