CREATE USER 'nenaprasno'@'localhost' IDENTIFIED BY 'nenaprasno';
CREATE DATABASE nenaprasno CHARACTER SET utf8 COLLATE utf8_general_ci;
GRANT ALL PRIVILEGES ON nenaprasno.* TO 'nenaprasno'@'localhost';
FLUSH PRIVILEGES;