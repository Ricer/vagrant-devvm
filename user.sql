# UWCarpool database and user
CREATE USER 'uwcarpool'@'localhost' IDENTIFIED BY 'Thisispassword';
CREATE DATABASE carpoolfinder;
GRANT ALL ON carpoolfinder.* TO 'uwcarpool'@'localhost' IDENTIFIED BY 'Thisispassword';

# UWScheduler database and user
# CREATE USER 'uwscheduler'@'localhost' IDENTIFIED BY 'Thisispassword';
# CREATE DATABASE scheduler;
# GRANT ALL ON scheduler.* TO 'uwscheduler'@'localhost' IDENTIFIED BY 'Thisispassword';
