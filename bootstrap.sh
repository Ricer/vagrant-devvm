#!/usr/bin/env bash
echo "creating UWCarpool User"
mysql -u root --password="root" -h localhost < /vagrant/user.sql
echo "importing SQL dump"
mysql -u root --password="root" -h localhost carpoolfinder < /var/www/dump.sql