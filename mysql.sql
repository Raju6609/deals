-- cPanel mysql backup
GRANT USAGE ON *.* TO 'desideal'@'localhost' IDENTIFIED BY PASSWORD '*1F26B4A8614525B095EE7D7382E91277D1EA24EE';
GRANT ALL PRIVILEGES ON `desideal\_deals`.* TO 'desideal'@'localhost';
GRANT ALL PRIVILEGES ON `desideal\_01`.* TO 'desideal'@'localhost';
GRANT ALL PRIVILEGES ON `desideal\_%`.* TO 'desideal'@'localhost';
GRANT USAGE ON *.* TO 'desideal_01'@'localhost' IDENTIFIED BY PASSWORD '*226BED249F780F898C4ADC4EE541B5D41236EAA2';
GRANT ALL PRIVILEGES ON `desideal\_01`.* TO 'desideal_01'@'localhost';
GRANT USAGE ON *.* TO 'desideal_deal'@'localhost' IDENTIFIED BY PASSWORD '*DFEE2B91FD105B4876D3A5316B4CF5428E1DC456';
GRANT ALL PRIVILEGES ON `desideal\_deals`.* TO 'desideal_deal'@'localhost';
