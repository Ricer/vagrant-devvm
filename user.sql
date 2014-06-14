CREATE USER 'uwcarpool'@'localhost' IDENTIFIED BY 'Thisispassword';
CREATE DATABASE carpoolfinder;
GRANT ALL ON carpoolfinder.* TO 'uwcarpool'@'localhost' IDENTIFIED BY 'Thisispassword';