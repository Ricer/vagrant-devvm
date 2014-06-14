#!/usr/bin/env bash

mysql -u root -p -h localhost < user.sql
mysql -u root -p -h localhost < /var/www/dump.sql